/**
 * CETESI Contact Form - Secure JavaScript
 * 
 * @package CETESI
 * @version 1.0.0
 */

(function($) {
    'use strict';
    
    // Configurações de segurança
    const SECURITY_CONFIG = {
        maxRetries: 3,
        retryDelay: 2000,
        timeout: 10000
    };
    
    // Cache de elementos DOM
    const elements = {
        form: null,
        submitBtn: null,
        loadingSpinner: null,
        errorContainer: null,
        successContainer: null
    };
    
    // Estado do formulário
    let formState = {
        isSubmitting: false,
        retryCount: 0,
        lastSubmission: 0
    };
    
    /**
     * Inicializar formulário de contato
     */
    function initContactForm() {
        elements.form = document.getElementById('contatoForm');
        if (!elements.form) return;
        
        elements.submitBtn = elements.form.querySelector('.submit-btn');
        elements.loadingSpinner = elements.form.querySelector('.loading-spinner');
        elements.errorContainer = elements.form.querySelector('.error-message');
        elements.successContainer = elements.form.querySelector('.success-message');
        
        // Adicionar event listeners
        elements.form.addEventListener('submit', handleFormSubmit);
        
        // Validação em tempo real
        addRealTimeValidation();
        
        // Proteção contra spam
        addSpamProtection();
    }
    
    /**
     * Manipular envio do formulário
     */
    function handleFormSubmit(e) {
        e.preventDefault();
        
        // Verificar rate limiting local
        if (isRateLimited()) {
            showError('Muitas tentativas. Aguarde alguns minutos.');
            return;
        }
        
        // Verificar se já está enviando
        if (formState.isSubmitting) {
            return;
        }
        
        // Validar formulário
        if (!validateForm()) {
            return;
        }
        
        // Verificar honeypot
        if (isHoneypotTriggered()) {
            showError('Acesso negado.');
            return;
        }
        
        // Enviar formulário
        submitForm();
    }
    
    /**
     * Validar formulário
     */
    function validateForm() {
        const formData = new FormData(elements.form);
        const errors = [];
        
        // Validar campos obrigatórios
        const requiredFields = ['nome', 'email', 'assunto', 'mensagem'];
        requiredFields.forEach(field => {
            const value = formData.get(field);
            if (!value || value.trim() === '') {
                errors.push(`${getFieldLabel(field)} é obrigatório.`);
            }
        });
        
        // Validar email
        const email = formData.get('email');
        if (email && !isValidEmail(email)) {
            errors.push('E-mail inválido.');
        }
        
        // Validar telefone se preenchido
        const telefone = formData.get('telefone');
        if (telefone && !isValidPhone(telefone)) {
            errors.push('Telefone inválido.');
        }
        
        // Validar comprimento dos campos
        const fieldLengths = {
            'nome': 100,
            'email': 100,
            'telefone': 20,
            'mensagem': 1000
        };
        
        Object.keys(fieldLengths).forEach(field => {
            const value = formData.get(field);
            if (value && value.length > fieldLengths[field]) {
                errors.push(`${getFieldLabel(field)} muito longo.`);
            }
        });
        
        // Validar caracteres perigosos
        const dangerousChars = ['<', '>', '"', "'", '&', 'script', 'javascript', 'vbscript'];
        Object.keys(fieldLengths).forEach(field => {
            const value = formData.get(field);
            if (value) {
                dangerousChars.forEach(char => {
                    if (value.toLowerCase().includes(char.toLowerCase())) {
                        errors.push(`${getFieldLabel(field)} contém caracteres não permitidos.`);
                    }
                });
            }
        });
        
        if (errors.length > 0) {
            showError(errors.join(' '));
            return false;
        }
        
        return true;
    }
    
    /**
     * Enviar formulário via AJAX
     */
    function submitForm() {
        formState.isSubmitting = true;
        formState.lastSubmission = Date.now();
        
        // Mostrar loading
        showLoading();
        
        // Preparar dados
        const formData = new FormData(elements.form);
        formData.append('action', 'cetesi_contact');
        formData.append('nonce', cetesi_ajax.nonce);
        
        // Configurar requisição
        const requestOptions = {
            method: 'POST',
            body: formData,
            timeout: SECURITY_CONFIG.timeout
        };
        
        // Enviar requisição
        fetch(cetesi_ajax.ajax_url, requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showSuccess(data.data);
                    resetForm();
                } else {
                    showError(data.data || 'Erro ao enviar mensagem.');
                }
            })
            .catch(error => {
                console.error('Erro no envio:', error);
                handleSubmissionError(error);
            })
            .finally(() => {
                formState.isSubmitting = false;
                hideLoading();
            });
    }
    
    /**
     * Manipular erro de envio
     */
    function handleSubmissionError(error) {
        formState.retryCount++;
        
        if (formState.retryCount < SECURITY_CONFIG.maxRetries) {
            // Tentar novamente após delay
            setTimeout(() => {
                submitForm();
            }, SECURITY_CONFIG.retryDelay);
        } else {
            showError('Erro de conexão. Tente novamente mais tarde.');
            formState.retryCount = 0;
        }
    }
    
    /**
     * Verificar rate limiting local
     */
    function isRateLimited() {
        const now = Date.now();
        const timeSinceLastSubmission = now - formState.lastSubmission;
        const rateLimitWindow = 60000; // 1 minuto
        
        return timeSinceLastSubmission < rateLimitWindow;
    }
    
    /**
     * Verificar honeypot
     */
    function isHoneypotTriggered() {
        const honeypot = elements.form.querySelector('#website');
        return honeypot && honeypot.value.trim() !== '';
    }
    
    /**
     * Validar email
     */
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    /**
     * Validar telefone
     */
    function isValidPhone(phone) {
        const phoneRegex = /^[0-9+\-\(\)\s]+$/;
        return phoneRegex.test(phone) && phone.length >= 10 && phone.length <= 20;
    }
    
    /**
     * Obter label do campo
     */
    function getFieldLabel(field) {
        const labels = {
            'nome': 'Nome',
            'email': 'E-mail',
            'telefone': 'Telefone',
            'assunto': 'Assunto',
            'mensagem': 'Mensagem'
        };
        return labels[field] || field;
    }
    
    /**
     * Mostrar loading
     */
    function showLoading() {
        if (elements.submitBtn) {
            elements.submitBtn.disabled = true;
            elements.submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
        }
    }
    
    /**
     * Esconder loading
     */
    function hideLoading() {
        if (elements.submitBtn) {
            elements.submitBtn.disabled = false;
            elements.submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Enviar Mensagem';
        }
    }
    
    /**
     * Mostrar erro
     */
    function showError(message) {
        hideMessages();
        
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.innerHTML = `
            <div class="alert alert-error">
                <i class="fas fa-exclamation-triangle"></i>
                ${escapeHtml(message)}
            </div>
        `;
        
        elements.form.insertBefore(errorDiv, elements.form.firstChild);
        
        // Auto-remover após 5 segundos
        setTimeout(() => {
            if (errorDiv.parentNode) {
                errorDiv.parentNode.removeChild(errorDiv);
            }
        }, 5000);
    }
    
    /**
     * Mostrar sucesso
     */
    function showSuccess(message) {
        hideMessages();
        
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.innerHTML = `
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                ${escapeHtml(message)}
            </div>
        `;
        
        elements.form.insertBefore(successDiv, elements.form.firstChild);
    }
    
    /**
     * Esconder mensagens
     */
    function hideMessages() {
        const existingMessages = elements.form.querySelectorAll('.error-message, .success-message');
        existingMessages.forEach(msg => {
            if (msg.parentNode) {
                msg.parentNode.removeChild(msg);
            }
        });
    }
    
    /**
     * Resetar formulário
     */
    function resetForm() {
        elements.form.reset();
        formState.retryCount = 0;
    }
    
    /**
     * Adicionar validação em tempo real
     */
    function addRealTimeValidation() {
        const inputs = elements.form.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            input.addEventListener('blur', validateField);
            input.addEventListener('input', clearFieldError);
        });
    }
    
    /**
     * Validar campo individual
     */
    function validateField(e) {
        const field = e.target;
        const value = field.value.trim();
        
        // Remover erro anterior
        clearFieldError(e);
        
        // Validar campo específico
        let isValid = true;
        let errorMessage = '';
        
        if (field.hasAttribute('required') && !value) {
            isValid = false;
            errorMessage = `${getFieldLabel(field.name)} é obrigatório.`;
        } else if (field.type === 'email' && value && !isValidEmail(value)) {
            isValid = false;
            errorMessage = 'E-mail inválido.';
        } else if (field.type === 'tel' && value && !isValidPhone(value)) {
            isValid = false;
            errorMessage = 'Telefone inválido.';
        }
        
        if (!isValid) {
            showFieldError(field, errorMessage);
        }
    }
    
    /**
     * Mostrar erro do campo
     */
    function showFieldError(field, message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error';
        errorDiv.textContent = message;
        
        field.classList.add('error');
        field.parentNode.appendChild(errorDiv);
    }
    
    /**
     * Limpar erro do campo
     */
    function clearFieldError(e) {
        const field = e.target;
        field.classList.remove('error');
        
        const errorDiv = field.parentNode.querySelector('.field-error');
        if (errorDiv) {
            errorDiv.remove();
        }
    }
    
    /**
     * Adicionar proteção contra spam
     */
    function addSpamProtection() {
        // Detectar preenchimento muito rápido (bot)
        let startTime = Date.now();
        
        elements.form.addEventListener('focus', () => {
            startTime = Date.now();
        });
        
        elements.form.addEventListener('submit', (e) => {
            const fillTime = Date.now() - startTime;
            if (fillTime < 3000) { // Menos de 3 segundos
                e.preventDefault();
                showError('Preenchimento muito rápido detectado.');
                return false;
            }
        });
    }
    
    /**
     * Escapar HTML
     */
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
    
    // Inicializar quando o DOM estiver pronto
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initContactForm);
    } else {
        initContactForm();
    }
    
})(jQuery);
