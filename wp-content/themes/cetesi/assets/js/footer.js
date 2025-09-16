/**
 * JavaScript específico do Footer - COMPLETAMENTE ISOLADO
 * 
 * Este arquivo contém TODAS as funcionalidades JavaScript relacionadas ao footer.
 * Qualquer mudança aqui afetará APENAS o footer, não outras partes do site.
 * 
 * @package Cetesi
 * @since 1.0.0
 */

(function($) {
    'use strict';

    // Objeto Footer - Namespace isolado
    var CetesiFooter = {
        
        // Configurações
        config: {
            scrollThreshold: 300,
            animationDuration: 300,
            newsletterDelay: 2000
        },
        
        // Cache de elementos
        elements: {
            backToTopBtn: null,
            newsletterForm: null,
            footer: null,
            socialLinks: null
        },
        
        // Inicialização
        init: function() {
            this.cacheElements();
            this.bindEvents();
            this.initBackToTop();
            this.initNewsletter();
            this.initSocialLinks();
            this.initScrollAnimations();
        },

        // Cache de elementos DOM
        cacheElements: function() {
            this.elements.backToTopBtn = document.getElementById('back-to-top');
            this.elements.newsletterForm = document.querySelector('.newsletter-form');
            this.elements.footer = document.querySelector('.site-footer');
            this.elements.socialLinks = document.querySelectorAll('.social-link');
        },

        // Bind de eventos
        bindEvents: function() {
            // Scroll do window
            window.addEventListener('scroll', this.handleScroll.bind(this));
            
            // Newsletter form
            if (this.elements.newsletterForm) {
                this.elements.newsletterForm.addEventListener('submit', this.handleNewsletterSubmit.bind(this));
            }
            
            // Social links analytics
            this.elements.socialLinks.forEach(function(link) {
                link.addEventListener('click', this.trackSocialClick.bind(this));
            }.bind(this));
        },

        // Botão voltar ao topo
        initBackToTop: function() {
            if (!this.elements.backToTopBtn) return;
            
            // Smooth scroll para o topo
            this.elements.backToTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                this.scrollToTop();
            }.bind(this));
        },

        // Handle scroll
        handleScroll: function() {
            this.toggleBackToTop();
            this.animateOnScroll();
        },

        // Toggle botão voltar ao topo
        toggleBackToTop: function() {
            if (!this.elements.backToTopBtn) return;
            
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > this.config.scrollThreshold) {
                this.elements.backToTopBtn.classList.add('visible');
            } else {
                this.elements.backToTopBtn.classList.remove('visible');
            }
        },

        // Scroll suave para o topo
        scrollToTop: function() {
            const scrollStep = -window.scrollY / (this.config.animationDuration / 15);
            const scrollInterval = setInterval(function() {
                if (window.scrollY !== 0) {
                    window.scrollBy(0, scrollStep);
                } else {
                    clearInterval(scrollInterval);
                }
            }, 15);
        },

        // Newsletter
        initNewsletter: function() {
            if (!this.elements.newsletterForm) return;
            
            // Validação em tempo real
            const emailInput = this.elements.newsletterForm.querySelector('input[type="email"]');
            if (emailInput) {
                emailInput.addEventListener('blur', this.validateEmail.bind(this));
                emailInput.addEventListener('input', this.clearValidation.bind(this));
            }
        },

        // Handle newsletter submit
        handleNewsletterSubmit: function(e) {
            e.preventDefault();
            
            const form = e.target;
            const emailInput = form.querySelector('input[type="email"]');
            const submitBtn = form.querySelector('.newsletter-btn');
            const email = emailInput.value.trim();
            
            if (!this.isValidEmail(email)) {
                this.showValidationError(emailInput, 'Por favor, insira um e-mail válido.');
                return;
            }
            
            // Mostrar loading
            this.showLoading(submitBtn);
            
            // Simular envio (substituir por AJAX real)
            setTimeout(function() {
                this.hideLoading(submitBtn);
                this.showSuccessMessage(form, 'Obrigado! Você foi inscrito com sucesso.');
                emailInput.value = '';
            }.bind(this), this.config.newsletterDelay);
        },

        // Validar email
        validateEmail: function(e) {
            const email = e.target.value.trim();
            if (email && !this.isValidEmail(email)) {
                this.showValidationError(e.target, 'Por favor, insira um e-mail válido.');
            }
        },

        // Limpar validação
        clearValidation: function(e) {
            this.clearValidationError(e.target);
        },

        // Verificar se email é válido
        isValidEmail: function(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        },

        // Mostrar erro de validação
        showValidationError: function(input, message) {
            this.clearValidationError(input);
            
            input.style.borderColor = '#ef4444';
            input.style.boxShadow = '0 0 0 2px rgba(239, 68, 68, 0.2)';
            
            const errorDiv = document.createElement('div');
            errorDiv.className = 'newsletter-error';
            errorDiv.style.color = '#ef4444';
            errorDiv.style.fontSize = '0.75rem';
            errorDiv.style.marginTop = '0.5rem';
            errorDiv.textContent = message;
            
            input.parentNode.appendChild(errorDiv);
        },

        // Limpar erro de validação
        clearValidationError: function(input) {
            input.style.borderColor = '';
            input.style.boxShadow = '';
            
            const errorDiv = input.parentNode.querySelector('.newsletter-error');
            if (errorDiv) {
                errorDiv.remove();
            }
        },

        // Mostrar loading
        showLoading: function(btn) {
            const icon = btn.querySelector('i');
            const originalIcon = icon.className;
            
            btn.disabled = true;
            btn.style.opacity = '0.7';
            icon.className = 'fas fa-spinner fa-spin';
            
            // Armazenar ícone original para restaurar depois
            btn.dataset.originalIcon = originalIcon;
        },

        // Esconder loading
        hideLoading: function(btn) {
            const icon = btn.querySelector('i');
            const originalIcon = btn.dataset.originalIcon;
            
            btn.disabled = false;
            btn.style.opacity = '';
            icon.className = originalIcon;
            
            delete btn.dataset.originalIcon;
        },

        // Mostrar mensagem de sucesso
        showSuccessMessage: function(form, message) {
            const successDiv = document.createElement('div');
            successDiv.className = 'newsletter-success';
            successDiv.style.color = '#10b981';
            successDiv.style.fontSize = '0.85rem';
            successDiv.style.marginTop = '0.75rem';
            successDiv.style.padding = '0.5rem';
            successDiv.style.backgroundColor = 'rgba(16, 185, 129, 0.1)';
            successDiv.style.borderRadius = '6px';
            successDiv.style.border = '1px solid rgba(16, 185, 129, 0.2)';
            successDiv.innerHTML = '<i class="fas fa-check-circle"></i> ' + message;
            
            form.appendChild(successDiv);
            
            // Remover mensagem após 5 segundos
            setTimeout(function() {
                successDiv.remove();
            }, 5000);
        },

        // Social links
        initSocialLinks: function() {
            // Adicionar efeito de hover personalizado
            this.elements.socialLinks.forEach(function(link) {
                link.addEventListener('mouseenter', this.animateSocialLink.bind(this));
            }.bind(this));
        },

        // Animar social link
        animateSocialLink: function(e) {
            const link = e.target;
            const icon = link.querySelector('i');
            
            // Animação de rotação
            if (icon) {
                icon.style.transform = 'rotate(360deg)';
                icon.style.transition = 'transform 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                
                setTimeout(function() {
                    icon.style.transform = '';
                }, 600);
            }
        },

        // Track social click
        trackSocialClick: function(e) {
            const link = e.target.closest('.social-link');
            const network = link.className.match(/social-(\w+)/);
            
            if (network) {
                // Aqui você pode adicionar tracking do Google Analytics ou outro sistema
                console.log('Social link clicked:', network[1]);
                
                // Exemplo de tracking (descomente se usar Google Analytics)
                // gtag('event', 'social_click', {
                //     'social_network': network[1],
                //     'social_action': 'click',
                //     'social_target': link.href
                // });
            }
        },

        // Animações no scroll
        initScrollAnimations: function() {
            // Intersection Observer para animações
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-in');
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                });
                
                // Observar elementos do footer
                const footerElements = document.querySelectorAll('.footer-column, .footer-widget');
                footerElements.forEach(function(element) {
                    observer.observe(element);
                });
            }
        },

        // Animar elementos no scroll
        animateOnScroll: function() {
            const footerElements = document.querySelectorAll('.footer-column');
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const windowHeight = window.innerHeight;
            
            footerElements.forEach(function(element, index) {
                const elementTop = element.offsetTop;
                const elementVisible = 150;
                
                if (scrollTop + windowHeight > elementTop + elementVisible) {
                    element.style.animationDelay = (index * 0.1) + 's';
                    element.classList.add('animate-in');
                }
            });
        },

        // Método público para scroll suave para elemento
        scrollToElement: function(elementId) {
            const element = document.getElementById(elementId);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        },

        // Método público para mostrar/ocultar newsletter
        toggleNewsletter: function() {
            const newsletter = document.querySelector('.footer-newsletter');
            if (newsletter) {
                newsletter.style.display = newsletter.style.display === 'none' ? 'block' : 'none';
            }
        }
    };

    // Inicializar funcionalidades do footer quando DOM estiver pronto
    $(document).ready(function() {
        CetesiFooter.init();
    });

    // Expor objeto globalmente para uso externo se necessário
    window.CetesiFooter = CetesiFooter;

})(jQuery);
