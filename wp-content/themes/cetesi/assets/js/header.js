/**
 * JavaScript específico do Header - COMPLETAMENTE ISOLADO
 * 
 * Este arquivo contém TODAS as funcionalidades JavaScript relacionadas ao header.
 * Qualquer mudança aqui afetará APENAS o header, não outras partes do site.
 * 
 * @package Cetesi
 * @since 1.0.0
 */

(function() {
    'use strict';

    // Objeto Header - Namespace isolado
    var CetesiHeader = {
        
        // Configurações otimizadas para performance
        config: {
            scrollThreshold: 100,
            animationDelay: 50,
            menuTransitionDuration: 200,
            focusDelay: 150,
            debounceDelay: 16
        },
        
        // Cache de elementos
        elements: {
            menuToggle: null,
            navMenu: null,
            header: null,
            body: null
        },
        
        // Inicialização
        init: function() {
            this.cacheElements();
            this.bindEvents();
            this.initMobileMenu();
            this.initHeaderScrollEffect();
            
            // Debug - verificar se inicializou
            console.log('CetesiHeader initialized');
        },

        // Função de debounce para otimizar performance
        debounce: function(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        },

        // Cache de elementos DOM
        cacheElements: function() {
            this.elements.menuToggle = document.getElementById('menu-toggle');
            this.elements.navMenu = document.getElementById('nav-menu');
            this.elements.header = document.querySelector('.header');
            this.elements.body = document.body;
            
            // Elementos mobile
            this.elements.mobileMenuBtn = document.getElementById('mobile-menu-button');
            this.elements.mobileMenuClose = document.getElementById('mobile-menu-close');
            this.elements.mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
            this.elements.mobileMenuContent = document.querySelector('.mobile-menu-content');
            
            // Debug - verificar se elementos foram encontrados
            console.log('Mobile Menu Elements:', {
                btn: this.elements.mobileMenuBtn,
                close: this.elements.mobileMenuClose,
                overlay: this.elements.mobileMenuOverlay,
                content: this.elements.mobileMenuContent
            });
        },

        // Bind de eventos
        bindEvents: function() {
            // Menu toggle desktop
            if (this.elements.menuToggle) {
                this.elements.menuToggle.addEventListener('click', this.toggleMobileMenu.bind(this));
            }
            
            // Menu toggle mobile
            if (this.elements.mobileMenuBtn) {
                this.elements.mobileMenuBtn.addEventListener('click', this.toggleMobileMenuOverlay.bind(this));
            }
            
            // Fechar menu mobile
            if (this.elements.mobileMenuClose) {
                this.elements.mobileMenuClose.addEventListener('click', this.closeMobileMenuOverlay.bind(this));
            }
            
            // Overlay click
            if (this.elements.mobileMenuOverlay) {
                this.elements.mobileMenuOverlay.addEventListener('click', this.handleOverlayClick.bind(this));
            }
            
            // Fechar menu ao clicar nos links de navegação mobile
            if (this.elements.mobileMenuContent) {
                const mobileMenuLinks = this.elements.mobileMenuContent.querySelectorAll('.mobile-menu-link');
                mobileMenuLinks.forEach(function(link) {
                    link.addEventListener('click', this.closeMobileMenuOverlay.bind(this));
                }.bind(this));
            }
            
            // Fechar menu ao clicar nos links
            if (this.elements.navMenu) {
                const menuLinks = this.elements.navMenu.querySelectorAll('a');
                menuLinks.forEach(function(link) {
                    link.addEventListener('click', this.closeMobileMenu.bind(this));
                }.bind(this));
                
                // Fechar menu ao clicar fora dele
                this.elements.navMenu.addEventListener('click', this.handleMenuClickOutside.bind(this));
            }
            
            // Scroll do header - Otimizado com debounce
            if (this.elements.header) {
                const debouncedScrollHandler = this.debounce(this.handleHeaderScroll.bind(this), this.config.debounceDelay);
                window.addEventListener('scroll', debouncedScrollHandler, { passive: true });
            }
            
            // Teclado para acessibilidade
            document.addEventListener('keydown', this.handleKeyboard.bind(this));
            
            // Resize da janela - Otimizado com debounce
            const debouncedResizeHandler = this.debounce(this.handleResize.bind(this), this.config.debounceDelay);
            window.addEventListener('resize', debouncedResizeHandler, { passive: true });
        },

        // Menu Mobile Criativo
        initMobileMenu: function() {
            // Adicionar método para animar itens do menu
            if (this.elements.menuToggle) {
                this.elements.menuToggle.animateMenuItems = this.animateMenuItems.bind(this);
            }
        },

        // Toggle do menu mobile
        toggleMobileMenu: function() {
            if (!this.elements.menuToggle || !this.elements.navMenu) return;
            
            this.elements.menuToggle.classList.toggle('active');
            this.elements.navMenu.classList.toggle('active');
                    
                    // Prevenir scroll do body quando menu estiver aberto
            if (this.elements.navMenu.classList.contains('active')) {
                this.elements.body.style.overflow = 'hidden';
                        this.animateMenuItems();
                    } else {
                this.elements.body.style.overflow = '';
            }
        },

        // Fechar menu mobile
        closeMobileMenu: function() {
            if (!this.elements.menuToggle || !this.elements.navMenu) return;
            
            this.elements.menuToggle.classList.remove('active');
            this.elements.navMenu.classList.remove('active');
            this.elements.body.style.overflow = '';
        },

        // Handle click outside menu
        handleMenuClickOutside: function(e) {
            if (e.target === this.elements.navMenu) {
                this.closeMobileMenu();
            }
        },

        // Animar itens do menu
        animateMenuItems: function() {
            if (!this.elements.navMenu) return;
            
            const menuItems = this.elements.navMenu.querySelectorAll('.nav-menu-list li');
                    menuItems.forEach(function(item, index) {
                item.style.animationDelay = (index * this.config.animationDelay) + 'ms';
                        item.style.animationPlayState = 'running';
            }.bind(this));
        },

        // Efeito de scroll no header
        initHeaderScrollEffect: function() {
            // Throttle scroll events para performance
            this.scrollTimeout = null;
        },

        // Handle scroll do header
        handleHeaderScroll: function() {
            if (this.scrollTimeout) {
                clearTimeout(this.scrollTimeout);
            }
            
            this.scrollTimeout = setTimeout(function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > this.config.scrollThreshold) {
                    this.elements.header.classList.add('scrolled');
                } else {
                    this.elements.header.classList.remove('scrolled');
                }
            }.bind(this), 10);
        },

        // Método público para fechar menu (pode ser chamado externamente)
        closeMenu: function() {
            this.closeMobileMenu();
        },

        // Método público para verificar se menu está aberto
        isMenuOpen: function() {
            return this.elements.navMenu && this.elements.navMenu.classList.contains('active');
        },

        // ===== FUNCIONALIDADES MOBILE =====
        
        // Toggle do menu mobile overlay - Otimizado para resposta rápida
        toggleMobileMenuOverlay: function() {
            if (!this.elements.mobileMenuOverlay) return;
            
            const isActive = this.elements.mobileMenuOverlay.classList.contains('active');
            
            // Usar requestAnimationFrame para resposta mais rápida
            requestAnimationFrame(() => {
                if (isActive) {
                    this.closeMobileMenuOverlay();
                } else {
                    this.openMobileMenuOverlay();
                }
            });
        },

        // Abrir menu mobile overlay - Otimizado
        openMobileMenuOverlay: function() {
            if (!this.elements.mobileMenuOverlay) return;
            
            // Aplicar mudanças imediatamente
            this.elements.mobileMenuOverlay.classList.add('active');
            this.elements.body.classList.add('mobile-menu-open');
            
            // Atualizar aria-expanded imediatamente
            if (this.elements.mobileMenuBtn) {
                this.elements.mobileMenuBtn.setAttribute('aria-expanded', 'true');
            }
            
            // Prevenir eventos de touch indesejados
            this.preventTouchEvents();
            
            // Ajustar layout para dispositivos móveis reais
            this.adjustMobileLayout();
            
            // Focar no primeiro link do menu com delay reduzido
            const firstLink = this.elements.mobileMenuContent?.querySelector('.mobile-menu-link');
            if (firstLink) {
                setTimeout(() => firstLink.focus(), 150);
            }
        },

        // Fechar menu mobile overlay - Otimizado
        closeMobileMenuOverlay: function() {
            if (!this.elements.mobileMenuOverlay) return;
            
            // Aplicar mudanças imediatamente
            this.elements.mobileMenuOverlay.classList.remove('active');
            this.elements.body.classList.remove('mobile-menu-open');
            
            // Atualizar aria-expanded imediatamente
            if (this.elements.mobileMenuBtn) {
                this.elements.mobileMenuBtn.setAttribute('aria-expanded', 'false');
            }
            
            // Restaurar eventos de touch
            this.restoreTouchEvents();
        },

        // Handle click no overlay
        handleOverlayClick: function(e) {
            // Fechar menu se clicar no overlay (fora do conteúdo)
            if (e.target === this.elements.mobileMenuOverlay) {
                this.closeMobileMenuOverlay();
            }
        },

        // Handle teclado para acessibilidade
        handleKeyboard: function(e) {
            // ESC para fechar menu
            if (e.key === 'Escape' && this.elements.mobileMenuOverlay?.classList.contains('active')) {
                this.closeMobileMenuOverlay();
            }
            
            // Tab trap no menu mobile
            if (this.elements.mobileMenuOverlay?.classList.contains('active')) {
                this.handleTabTrap(e);
            }
        },

        // Tab trap para acessibilidade
        handleTabTrap: function(e) {
            if (e.key !== 'Tab') return;
            
            const focusableElements = this.elements.mobileMenuContent?.querySelectorAll(
                'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
            );
            
            if (!focusableElements || focusableElements.length === 0) return;
            
            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];
            
            if (e.shiftKey) {
                if (document.activeElement === firstElement) {
                    e.preventDefault();
                    lastElement.focus();
                }
                } else {
                if (document.activeElement === lastElement) {
                    e.preventDefault();
                    firstElement.focus();
                }
            }
        },

        // Handle resize da janela
        handleResize: function() {
            // Fechar menu mobile se estiver aberto em telas maiores
            if (window.innerWidth > 768 && this.elements.mobileMenuOverlay?.classList.contains('active')) {
                this.closeMobileMenuOverlay();
            }
        },

        // Prevenir eventos de touch indesejados
        preventTouchEvents: function() {
            // Prevenir zoom com dois dedos
            document.addEventListener('touchstart', this.handleTouchStart, { passive: false });
            document.addEventListener('touchmove', this.handleTouchMove, { passive: false });
            document.addEventListener('touchend', this.handleTouchEnd, { passive: false });
            
            // Prevenir gestos de swipe
            document.addEventListener('gesturestart', this.handleGestureStart, { passive: false });
            document.addEventListener('gesturechange', this.handleGestureChange, { passive: false });
            document.addEventListener('gestureend', this.handleGestureEnd, { passive: false });
        },

        // Restaurar eventos de touch
        restoreTouchEvents: function() {
            document.removeEventListener('touchstart', this.handleTouchStart);
            document.removeEventListener('touchmove', this.handleTouchMove);
            document.removeEventListener('touchend', this.handleTouchEnd);
            document.removeEventListener('gesturestart', this.handleGestureStart);
            document.removeEventListener('gesturechange', this.handleGestureChange);
            document.removeEventListener('gestureend', this.handleGestureEnd);
        },

        // Handle touch start
        handleTouchStart: function(e) {
            if (e.touches.length > 1) {
                e.preventDefault();
            }
        },

        // Handle touch move
        handleTouchMove: function(e) {
            if (e.touches.length > 1) {
                e.preventDefault();
            }
        },

        // Handle touch end
        handleTouchEnd: function(e) {
            if (e.touches.length > 1) {
                e.preventDefault();
            }
        },

        // Handle gesture start
        handleGestureStart: function(e) {
            e.preventDefault();
        },

        // Handle gesture change
        handleGestureChange: function(e) {
            e.preventDefault();
        },

        // Handle gesture end
        handleGestureEnd: function(e) {
            e.preventDefault();
        },

        // Ajustar layout para dispositivos móveis reais
        adjustMobileLayout: function() {
            if (!this.elements.mobileMenuContent) return;
            
            const viewportHeight = window.innerHeight;
            const viewportWidth = window.innerWidth;
            
            // Detectar se é um dispositivo móvel real
            const isRealMobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
            
            // Aplicar ajustes para todos os dispositivos móveis
            if (isRealMobile) {
                // Forçar altura exata do viewport
                this.elements.mobileMenuContent.style.height = viewportHeight + 'px';
                this.elements.mobileMenuContent.style.maxHeight = viewportHeight + 'px';
                this.elements.mobileMenuContent.style.minHeight = viewportHeight + 'px';
                
                // Garantir que os botões CTA sejam sempre visíveis
                const ctaSection = this.elements.mobileMenuContent.querySelector('.mobile-cta');
                if (ctaSection) {
                    ctaSection.style.position = 'sticky';
                    ctaSection.style.bottom = '0';
                    ctaSection.style.zIndex = '20';
                    ctaSection.style.backgroundColor = '#ffffff';
                    ctaSection.style.paddingBottom = '8px';
                    ctaSection.style.marginBottom = '0';
                }
                
                // Ajustar navegação para não ocupar espaço demais
                const navigation = this.elements.mobileMenuContent.querySelector('.mobile-navigation');
                if (navigation) {
                    const reservedSpace = 220; // Mais espaço para header + CTA
                    navigation.style.maxHeight = (viewportHeight - reservedSpace) + 'px';
                    navigation.style.overflowY = 'auto';
                    navigation.style.marginBottom = '0';
                    navigation.style.paddingBottom = '0';
                }
                
                // Ajustar header para ocupar menos espaço
                const header = this.elements.mobileMenuContent.querySelector('.mobile-menu-header');
                if (header) {
                    header.style.minHeight = '45px';
                    header.style.padding = '6px 16px';
                }
                
                // Garantir que todos os botões sejam visíveis (usando classes CSS ao invés de estilos inline)
                const buttons = this.elements.mobileMenuContent.querySelectorAll('.mobile-btn-nav, .mobile-btn-primary');
                buttons.forEach(function(button) {
                    // Remover estilos inline que podem estar sobrescrevendo o CSS
                    button.style.minHeight = '';
                    button.style.padding = '';
                    button.style.fontSize = '';
                    button.style.marginBottom = '';
                    button.style.display = '';
                    button.style.visibility = '';
                    button.style.opacity = '';
                    
                    // Aplicar apenas as propriedades essenciais para visibilidade
                    button.style.display = 'flex';
                    button.style.visibility = 'visible';
                    button.style.opacity = '1';
                });
            }
            
            // Debug para dispositivos móveis
            if (isRealMobile) {
                console.log('Mobile Layout Adjusted:', {
                    viewportHeight: viewportHeight,
                    viewportWidth: viewportWidth,
                    userAgent: navigator.userAgent,
                    ctaVisible: ctaSection ? 'Yes' : 'No',
                    navigationHeight: navigation ? navigation.style.maxHeight : 'N/A'
                });
            }
        }
    };

    // Inicializar funcionalidades do header quando DOM estiver pronto
    function initHeader() {
        CetesiHeader.init();
    }
    
    // Usar jQuery se disponível, senão usar DOMContentLoaded
    if (typeof $ !== 'undefined') {
        $(document).ready(initHeader);
    } else {
        document.addEventListener('DOMContentLoaded', initHeader);
    }

    // Expor objeto globalmente para uso externo se necessário
    window.CetesiHeader = CetesiHeader;

})();
