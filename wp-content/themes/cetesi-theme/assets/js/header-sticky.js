/**
 * JavaScript específico do Header Sticky - Versão Simplificada
 * 
 * @package Cetesi-Theme
 * @since 1.0.0
 */

(function() {
    'use strict';

    // Objeto Header Sticky Simplificado
    var CetesiHeaderSticky = {
        
        // Cache de elementos
        elements: {
            header: null,
            mobileHeader: null
        },
        
        // Estado atual
        currentMode: null,
        isInitialized: false,
        
        // Inicialização
        init: function() {
            if (this.isInitialized) {
                return;
            }
            
            this.cacheElements();
            this.bindEvents();
            this.forceSticky();
            this.isInitialized = true;
        },

        // Cache de elementos DOM
        cacheElements: function() {
            this.elements.header = document.querySelector('.header');
            this.elements.mobileHeader = document.querySelector('.mobile-header');
        },

        // Bind de eventos
        bindEvents: function() {
            // Scroll do header - adicionar classe scrolled
            window.addEventListener('scroll', this.handleScroll.bind(this), { passive: true });
            
            // Listener para mudanças de tamanho de tela (desktop/mobile)
            window.addEventListener('resize', this.handleResize.bind(this));
        },

        // Handle resize - detectar mudanças entre desktop e mobile
        handleResize: function() {
            var self = this;
            var isMobile = window.matchMedia('(max-width: 768px)').matches;
            var newMode = isMobile ? 'mobile' : 'desktop';
            
            // Só reaplica se o modo mudou
            if (this.currentMode !== newMode) {
                clearTimeout(this.resizeTimeout);
                this.resizeTimeout = setTimeout(function() {
                    self.currentMode = newMode;
                    self.forceSticky();
                }, 250);
            }
        },

        // Forçar sticky via JavaScript se necessário
        forceSticky: function() {
            var headerEl = this.elements.header;
            var mobileHeaderEl = this.elements.mobileHeader;
            var isMobile = window.matchMedia('(max-width: 768px)').matches;

            // Aplicar sticky apenas no header ativo (desktop ou mobile)
            if (isMobile && mobileHeaderEl) {
                // Modo mobile - aplicar no header mobile
                mobileHeaderEl.classList.add('header-sticky-active');
                mobileHeaderEl.style.setProperty('position', 'sticky', 'important');
                mobileHeaderEl.style.setProperty('top', '0', 'important');
                mobileHeaderEl.style.setProperty('z-index', '1000', 'important');
                
                // Testar se sticky funciona no mobile (apenas na primeira vez)
                if (this.currentMode === null || this.currentMode !== 'mobile') {
                    setTimeout(() => {
                        this.testStickyFunctionality(mobileHeaderEl, 'mobile');
                    }, 100);
                }
                
            } else if (!isMobile && headerEl) {
                // Modo desktop - aplicar no header desktop
                headerEl.classList.add('header-sticky-active');
                headerEl.style.setProperty('position', 'sticky', 'important');
                headerEl.style.setProperty('top', '0', 'important');
                headerEl.style.setProperty('z-index', '1000', 'important');
                
                // Testar se sticky funciona no desktop (apenas na primeira vez)
                if (this.currentMode === null || this.currentMode !== 'desktop') {
                    setTimeout(() => {
                        this.testStickyFunctionality(headerEl, 'desktop');
                    }, 100);
                }
            }
        },

        // Testar se sticky está funcionando
        testStickyFunctionality: function(headerEl, type) {
            var initialTop = headerEl.getBoundingClientRect().top;
            var initialScrollY = window.scrollY;
            
            // Rolar um pouco para testar
            window.scrollTo(0, 100);
            
            setTimeout(() => {
                var afterTop = headerEl.getBoundingClientRect().top;
                window.scrollTo(0, initialScrollY); // Voltar ao topo
                
                // Se o header não grudou (top não é 0), aplicar fixed
                if (afterTop !== 0 && Math.abs(afterTop - 0) > 5) {
                    this.applyFixedFallback(headerEl, type);
                }
            }, 50);
        },

        // Aplicar fallback com position fixed
        applyFixedFallback: function(headerEl, type) {
            // Remover classe sticky se existir
            headerEl.classList.remove('header-sticky-active');
            
            // Adicionar classe fixed
            headerEl.classList.add('header-fixed-active');
            
            // Aplicar estilos inline com !important via JavaScript
            headerEl.style.setProperty('position', 'fixed', 'important');
            headerEl.style.setProperty('top', '0', 'important');
            headerEl.style.setProperty('left', '0', 'important');
            headerEl.style.setProperty('right', '0', 'important');
            headerEl.style.setProperty('width', '100%', 'important');
            headerEl.style.setProperty('z-index', '1000', 'important');
            headerEl.style.setProperty('background', 'rgba(255, 255, 255, 0.95)', 'important');
            headerEl.style.setProperty('backdrop-filter', 'blur(20px)', 'important');
            
            // Adicionar padding ao body para compensar o header fixo
            var headerHeight = headerEl.offsetHeight;
            document.body.style.setProperty('padding-top', headerHeight + 'px', 'important');
            
            // Adicionar classe ao body para identificar que está usando fixed
            document.body.classList.add('header-fixed-mode');
        },

        // Handle scroll do header
        handleScroll: function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            var isMobile = window.matchMedia('(max-width: 768px)').matches;
            
            if (scrollTop > 50) {
                if (isMobile && this.elements.mobileHeader) {
                    this.elements.mobileHeader.classList.add('scrolled');
                } else if (!isMobile && this.elements.header) {
                    this.elements.header.classList.add('scrolled');
                }
            } else {
                if (isMobile && this.elements.mobileHeader) {
                    this.elements.mobileHeader.classList.remove('scrolled');
                } else if (!isMobile && this.elements.header) {
                    this.elements.header.classList.remove('scrolled');
                }
            }
        }
    };

    // Inicializar quando DOM estiver pronto
    function initHeaderSticky() {
        CetesiHeaderSticky.init();
    }
    
    // Usar jQuery se disponível, senão usar DOMContentLoaded
    if (typeof $ !== 'undefined') {
        $(document).ready(initHeaderSticky);
    } else {
        document.addEventListener('DOMContentLoaded', initHeaderSticky);
    }

    // Expor objeto globalmente
    window.CetesiHeaderSticky = CetesiHeaderSticky;

})();