/**
 * JavaScript para Correções de Responsividade Mobile - CETESI Theme
 * 
 * Este arquivo adiciona funcionalidades JavaScript para melhorar
 * a experiência mobile e corrigir problemas de responsividade.
 * 
 * @package CETESI
 * @since 1.0.0
 */

(function($) {
    'use strict';

    // Aguardar o documento estar pronto
    $(document).ready(function() {
        
        // Função para ajustar botões CTA em telas pequenas
        function adjustCTAButtons() {
            const ctaButtons = $('.cta-buttons .button');
            const windowWidth = $(window).width();
            
            ctaButtons.each(function() {
                const $button = $(this);
                const buttonText = $button.text().trim();
                
                // Em telas muito pequenas, ajustar texto dos botões
                if (windowWidth <= 420) {
                    // Verificar se o texto está muito longo
                    if (buttonText.length > 15) {
                        // Adicionar classe para texto menor
                        $button.addClass('mobile-small-text');
                        
                        // Ajustar ícones para telas pequenas
                        const $icon = $button.find('i');
                        if ($icon.length) {
                            $icon.css({
                                'font-size': '12px',
                                'margin-right': '6px'
                            });
                        }
                    }
                } else {
                    // Remover classe quando não necessário
                    $button.removeClass('mobile-small-text');
                    
                    // Restaurar ícones
                    const $icon = $button.find('i');
                    if ($icon.length) {
                        $icon.css({
                            'font-size': '',
                            'margin-right': ''
                        });
                    }
                }
            });
        }

        // Função para prevenir quebra de texto em elementos específicos
        function preventTextBreaking() {
            // Elementos que não devem quebrar
            const noBreakSelectors = [
                '.cta-buttons .button',
                '.mobile-btn-nav',
                '.mobile-btn-primary',
                '.btn-hero',
                '.btn-primary',
                '.btn-secondary',
                '.curso-btn',
                '.btn-matricule-se',
                '.btn-saiba-mais'
            ];
            
            noBreakSelectors.forEach(function(selector) {
                $(selector).css({
                    'white-space': 'nowrap',
                    'overflow': 'hidden',
                    'text-overflow': 'ellipsis'
                });
            });
        }

        // Função para ajustar containers em telas pequenas
        function adjustContainers() {
            const windowWidth = $(window).width();
            
            if (windowWidth <= 420) {
                // Ajustar padding dos containers
                $('.container').css('padding', '0 12px');
                $('.sobre-cta-content').css('padding', '0 20px');
                
                // Ajustar gap dos botões CTA
                $('.cta-buttons').css('gap', '12px');
                
            } else if (windowWidth <= 768) {
                // Ajustar para tablet
                $('.container').css('padding', '0 16px');
                $('.sobre-cta-content').css('padding', '0 40px');
                $('.cta-buttons').css('gap', '16px');
                
            } else {
                // Restaurar valores padrão
                $('.container').css('padding', '');
                $('.sobre-cta-content').css('padding', '');
                $('.cta-buttons').css('gap', '');
            }
        }

        // Função para detectar orientação do dispositivo
        function handleOrientationChange() {
            const isPortrait = window.innerHeight > window.innerWidth;
            
            if (isPortrait && window.innerWidth <= 768) {
                // Em modo retrato, ajustar espaçamentos
                $('.sobre-cta-section').css('padding', '30px 0');
                $('.cta-buttons').css('gap', '12px');
            } else {
                // Restaurar espaçamentos normais
                $('.sobre-cta-section').css('padding', '');
                $('.cta-buttons').css('gap', '');
            }
        }

        // Função para garantir que elementos não saiam da tela
        function preventOverflow() {
            // Verificar se há elementos com overflow horizontal
            const bodyWidth = $('body').width();
            const windowWidth = $(window).width();
            
            if (bodyWidth > windowWidth) {
                // Forçar overflow-x hidden
                $('body, html').css('overflow-x', 'hidden');
                
                // Ajustar elementos que podem estar causando overflow
                $('.cta-buttons').css('max-width', '100%');
                $('.container').css('max-width', '100%');
            }
        }

        // Função para ajustar descrições dos cursos
        function adjustCourseDescriptions() {
            const windowWidth = $(window).width();
            
            $('.curso-descricao').each(function() {
                const $desc = $(this);
                
                // Remover line-clamp em todos os tamanhos de tela
                $desc.css({
                    '-webkit-line-clamp': 'unset',
                    'line-clamp': 'unset',
                    '-webkit-box-orient': 'unset',
                    'display': 'block',
                    'overflow': 'visible',
                    'max-height': 'none'
                });
                
                // Ajustar padding baseado no tamanho da tela
                if (windowWidth <= 420) {
                    $desc.css('padding', '12px');
                } else if (windowWidth <= 768) {
                    $desc.css('padding', '16px');
                } else {
                    $desc.css('padding', '');
                }
            });
        }

        // Função para ajustar botões mobile CTA
        function adjustMobileCTAButtons() {
            const windowWidth = $(window).width();
            
            $('.mobile-btn-nav, .mobile-btn-primary').each(function() {
                const $btn = $(this);
                
                // Garantir que texto não seja cortado
                $btn.css({
                    'white-space': 'nowrap',
                    'overflow': 'visible',
                    'text-overflow': 'unset'
                });
                
                // Ajustar tamanhos baseado no tamanho da tela
                if (windowWidth <= 420) {
                    $btn.css({
                        'padding': '10px 12px',
                        'font-size': '0.8rem',
                        'min-height': '44px'
                    });
                    
                    $btn.find('span').css('font-size', '0.8rem');
                    $btn.find('i').css('font-size', '12px');
                    
                } else if (windowWidth <= 768) {
                    $btn.css({
                        'padding': '12px 16px',
                        'font-size': '0.85rem',
                        'min-height': '48px'
                    });
                    
                    $btn.find('span').css('font-size', '0.85rem');
                    $btn.find('i').css('font-size', '14px');
                    
                } else {
                    $btn.css({
                        'padding': '',
                        'font-size': '',
                        'min-height': ''
                    });
                    
                    $btn.find('span').css('font-size', '');
                    $btn.find('i').css('font-size', '');
                }
            });
        }

        // Executar funções iniciais
        adjustCTAButtons();
        preventTextBreaking();
        adjustContainers();
        preventOverflow();
        adjustCourseDescriptions();
        adjustMobileCTAButtons();

        // Executar funções no resize da janela
        $(window).on('resize', function() {
            adjustCTAButtons();
            adjustContainers();
            handleOrientationChange();
            preventOverflow();
            adjustCourseDescriptions();
            adjustMobileCTAButtons();
        });

        // Executar funções na mudança de orientação
        $(window).on('orientationchange', function() {
            setTimeout(function() {
                handleOrientationChange();
                adjustCTAButtons();
                adjustContainers();
                adjustCourseDescriptions();
                adjustMobileCTAButtons();
            }, 100);
        });

        // Adicionar classe CSS para dispositivos móveis
        if ($(window).width() <= 768) {
            $('body').addClass('mobile-device');
        }

        // Adicionar classe CSS para dispositivos muito pequenos
        if ($(window).width() <= 420) {
            $('body').addClass('mobile-small');
        }

        // Atualizar classes no resize
        $(window).on('resize', function() {
            if ($(window).width() <= 768) {
                $('body').addClass('mobile-device');
            } else {
                $('body').removeClass('mobile-device');
            }

            if ($(window).width() <= 420) {
                $('body').addClass('mobile-small');
            } else {
                $('body').removeClass('mobile-small');
            }
        });

        // Debug: Log informações sobre o dispositivo (apenas em desenvolvimento)
        if (window.location.hostname === 'localhost' || window.location.hostname.includes('cetesi')) {
            console.log('CETESI Mobile Responsive JS carregado');
            console.log('Largura da tela:', $(window).width());
            console.log('Altura da tela:', $(window).height());
            console.log('User Agent:', navigator.userAgent);
        }

    });

})(jQuery);
