/**
 * JavaScript para Header Mobile - Baseado no tema Cetesi
 * 
 * @package Cetesi-Theme
 * @since 1.0.0
 */

(function($) {
    'use strict';

    // Aguardar o documento estar pronto
    $(document).ready(function() {
        
        // ===== HEADER MOBILE MATERIAL-UI =====
        
        // Elementos do header mobile
        const mobileMenuButton = $('#mobile-menu-button');
        const mobileMenuClose = $('#mobile-menu-close');
        const mobileMenuOverlay = $('#mobile-menu-overlay');
        const mobileMenuContent = $('.mobile-menu-content');
        const body = $('body');
        
        // Função para abrir menu mobile
        function openMobileMenu() {
            mobileMenuOverlay.addClass('active');
            mobileMenuContent.addClass('active');
            body.addClass('mobile-menu-open');
            
            // Prevenir scroll do body
            body.css({
                'overflow': 'hidden',
                'position': 'fixed',
                'width': '100%',
                'height': '100%'
            });
            
            // Focar no primeiro link do menu para acessibilidade
            setTimeout(function() {
                $('.mobile-menu-link').first().focus();
            }, 300);
        }
        
        // Função para fechar menu mobile
        function closeMobileMenu() {
            mobileMenuOverlay.removeClass('active');
            mobileMenuContent.removeClass('active');
            body.removeClass('mobile-menu-open');
            
            // Restaurar scroll do body
            body.css({
                'overflow': '',
                'position': '',
                'width': '',
                'height': ''
            });
        }
        
        // Toggle no mesmo botão (abrir/fechar)
        mobileMenuButton.on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            if (mobileMenuOverlay.hasClass('active')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
        
        // Event listeners para fechar menu
        mobileMenuClose.on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            closeMobileMenu();
        });
        
        // Fechar menu ao clicar no overlay
        mobileMenuOverlay.on('click', function(e) {
            if (e.target === this) {
                closeMobileMenu();
            }
        });
        
        // Fechar menu com ESC
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && mobileMenuOverlay.hasClass('active')) {
                closeMobileMenu();
            }
        });
        
        // ===== HEADER DESKTOP/TABLET =====
        
        // Elementos do header desktop/tablet
        const menuToggle = $('#menu-toggle');
        const navMenu = $('#nav-menu');
        const menuOverlay = $('#menu-overlay');
        
        // Função para toggle do menu desktop/tablet
        function toggleDesktopMenu() {
            const isActive = navMenu.hasClass('active');
            
            if (isActive) {
                // Fechar menu
                navMenu.removeClass('active');
                menuToggle.removeClass('active');
                menuOverlay.fadeOut(300);
                body.removeClass('menu-open');
            } else {
                // Abrir menu
                navMenu.addClass('active');
                menuToggle.addClass('active');
                menuOverlay.fadeIn(300);
                body.addClass('menu-open');
            }
        }
        
        // Event listener para toggle do menu desktop/tablet
        menuToggle.on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleDesktopMenu();
        });
        
        // Fechar menu desktop/tablet ao clicar no overlay
        menuOverlay.on('click', function() {
            navMenu.removeClass('active');
            menuToggle.removeClass('active');
            menuOverlay.fadeOut(300);
            body.removeClass('menu-open');
        });
        
        // ===== HEADER SCROLL EFFECT =====
        
        // Efeito de scroll no header
        let lastScrollTop = 0;
        const header = $('.header');
        const mobileHeader = $('.mobile-header');
        
        $(window).on('scroll', function() {
            const scrollTop = $(this).scrollTop();
            
            // Adicionar classe scrolled quando scroll > 50px
            if (scrollTop > 50) {
                header.addClass('scrolled');
                mobileHeader.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
                mobileHeader.removeClass('scrolled');
            }
            
            lastScrollTop = scrollTop;
        });
        
        // ===== RESPONSIVIDADE =====
        
        // Função para verificar breakpoint
        function getBreakpoint() {
            const width = $(window).width();
            if (width >= 1025) return 'desktop';
            if (width >= 769) return 'tablet';
            return 'mobile';
        }
        
        // Função para ajustar menu baseado no breakpoint
        function adjustMenuForBreakpoint() {
            const breakpoint = getBreakpoint();
            
            // Fechar todos os menus ao mudar breakpoint
            closeMobileMenu();
            navMenu.removeClass('active');
            menuToggle.removeClass('active');
            menuOverlay.fadeOut(0);
            body.removeClass('menu-open mobile-menu-open');
            
            // Ajustar visibilidade dos elementos
            if (breakpoint === 'mobile') {
                $('.header').hide();
                $('.mobile-header').show();
            } else {
                $('.header').show();
                $('.mobile-header').hide();
            }
        }
        
        // Ajustar menu ao redimensionar a janela
        $(window).on('resize', function() {
            adjustMenuForBreakpoint();
        });
        
        // Ajustar menu inicial
        adjustMenuForBreakpoint();
        
        // ===== ACESSIBILIDADE =====
        
        // Trap focus dentro do menu mobile
        function trapFocus(element) {
            const focusableElements = element.find(
                'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select'
            );
            const firstFocusableElement = focusableElements.first();
            const lastFocusableElement = focusableElements.last();
            
            element.on('keydown', function(e) {
                if (e.key === 'Tab') {
                    if (e.shiftKey) {
                        if (document.activeElement === firstFocusableElement[0]) {
                            lastFocusableElement.focus();
                            e.preventDefault();
                        }
                    } else {
                        if (document.activeElement === lastFocusableElement[0]) {
                            firstFocusableElement.focus();
                            e.preventDefault();
                        }
                    }
                }
            });
        }
        
        // Aplicar trap focus quando menu mobile abrir
        mobileMenuOverlay.on('DOMNodeInserted', function() {
            if (mobileMenuOverlay.hasClass('active')) {
                trapFocus(mobileMenuContent);
            }
        });
        
        // ===== PERFORMANCE =====
        
        // Debounce para eventos de scroll
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }
        
        // Aplicar debounce ao scroll
        const debouncedScroll = debounce(function() {
            const scrollTop = $(window).scrollTop();
            
            if (scrollTop > 50) {
                header.addClass('scrolled');
                mobileHeader.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
                mobileHeader.removeClass('scrolled');
            }
        }, 10);
        
        $(window).on('scroll', debouncedScroll);
        
        // ===== INICIALIZAÇÃO =====
        
        // Log de inicialização (apenas em desenvolvimento)
        if (window.location.hostname === 'localhost' || window.location.hostname.includes('dev')) {
            console.log('Header Mobile Cetesi inicializado com sucesso!');
        }
        
    });
    
})(jQuery);
