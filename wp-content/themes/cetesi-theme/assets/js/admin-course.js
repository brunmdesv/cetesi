/**
 * Script para funcionalidades do admin de cursos
 * CETESI Theme
 */

jQuery(document).ready(function($) {
    
    // Função para gerar texto padrão
    function generateDefaultText(fieldName, textareaId) {
        $.ajax({
            url: cetesi_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'cetesi_generate_default_text',
                field: fieldName,
                nonce: cetesi_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    $('#' + textareaId).val(response.data);
                    
                    // Mostrar feedback visual
                    var button = $('button[data-field="' + fieldName + '"]');
                    var originalText = button.text();
                    button.text('✓ Gerado!').addClass('generated');
                    
                    setTimeout(function() {
                        button.text(originalText).removeClass('generated');
                    }, 2000);
                }
            },
            error: function() {
                alert('Erro ao gerar texto padrão. Tente novamente.');
            }
        });
    }
    
    // Função mais simples para adicionar botões
    function addSimpleButtons() {
        // Lista de campos que devem ter botões
        var fieldMappings = {
            '_curso_prerequisitos': 'prerequisites',
            '_curso_documentos': 'documents', 
            '_curso_objetivos': 'objectives',
            '_curso_disciplinas': 'curriculum',
            '_curso_metodologia': 'methodology',
            '_curso_certificacao': 'certification',
            '_curso_mercado_trabalho': 'market',
            '_curso_areas_atuacao': 'areas',
            '_curso_forma_pagamento': 'payment',
            '_curso_parcelamento': 'installments'
        };
        
        // Para cada campo, adicionar botão se não existir
        $.each(fieldMappings, function(textareaId, fieldName) {
            var textarea = $('#' + textareaId);
            if (textarea.length > 0) {
                // Verificar se já tem botão
                if (textarea.siblings('.cetesi-generate-btn').length === 0) {
                    var button = $('<button type="button" class="button button-secondary cetesi-generate-btn" data-field="' + fieldName + '" data-textarea="' + textareaId + '" style="margin-left: 10px; font-size: 12px; padding: 4px 8px;">Gerar</button>');
                    textarea.before(button);
                    console.log('Botão adicionado para:', textareaId);
                }
            } else {
                console.log('Campo não encontrado:', textareaId);
            }
        });
    }
    
    // Função simplificada - os botões já estão no HTML
    
    // Event listener para os botões "Gerar"
    $(document).on('click', '.cetesi-generate-btn', function() {
        var field = $(this).data('field');
        var textarea = $(this).data('textarea');
        
        // Confirmar se o usuário quer substituir o conteúdo atual
        var currentValue = $('#' + textarea).val();
        if (currentValue.trim() !== '') {
            if (!confirm('Este campo já possui conteúdo. Deseja substituir pelo texto padrão?')) {
                return;
            }
        }
        
        generateDefaultText(field, textarea);
    });
    
    // Adicionar estilos CSS para os botões
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            .cetesi-generate-btn {
                margin-left: 10px !important;
                font-size: 12px !important;
                padding: 4px 8px !important;
                height: auto !important;
                line-height: 1.2 !important;
                background: #0073aa !important;
                color: white !important;
                border: 1px solid #0073aa !important;
                border-radius: 3px !important;
                cursor: pointer !important;
                transition: all 0.3s ease !important;
            }
            
            .cetesi-generate-btn:hover {
                background: #005a87 !important;
                border-color: #005a87 !important;
                transform: translateY(-1px) !important;
            }
            
            .cetesi-generate-btn.generated {
                background: #46b450 !important;
                border-color: #46b450 !important;
            }
            
            .cetesi-generate-btn:active {
                transform: translateY(0) !important;
            }
            
            .cetesi-field-section label {
                display: inline-block !important;
                margin-bottom: 5px !important;
            }
        `)
        .appendTo('head');
    
    // Os botões já estão no HTML, não precisamos adicionar dinamicamente
    console.log('Script de geração de textos carregado');
    
});
