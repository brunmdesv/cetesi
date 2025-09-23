/**
 * JavaScript específico do Header Sticky - Versão Simplificada
 * 
 * @package Cetesi-Theme
 * @since 1.0.0
 */

(function() {
    'use strict';

    // Aplicar CSS sticky imediatamente via JavaScript
    function forceStickyCSS() {
        var style = document.createElement('style');
        style.id = 'cetesi-sticky-inline';
        style.textContent = `
            .header {
                position: sticky !important;
                top: 0 !important;
                z-index: 1000 !important;
                background: rgba(255, 255, 255, 0.95) !important;
                backdrop-filter: blur(20px) !important;
                -webkit-backdrop-filter: blur(20px) !important;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
                transition: all 0.3s ease !important;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
            }
            .mobile-header {
                position: sticky !important;
                top: 0 !important;
                z-index: 1000 !important;
                background: rgba(255, 255, 255, 0.95) !important;
                backdrop-filter: blur(20px) !important;
                -webkit-backdrop-filter: blur(20px) !important;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
                transition: all 0.3s ease !important;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
            }
            @media (max-width: 768px) {
                .header { display: none !important; }
                .mobile-header { display: block !important; }
            }
            @media (min-width: 769px) {
                .header { display: block !important; }
                .mobile-header { display: none !important; }
            }
        `;
        document.head.appendChild(style);
    }

    // Aplicar CSS imediatamente
    forceStickyCSS();

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
            
            var self = this;
            
            // Tentar inicializar imediatamente
            this.cacheElements();
            if (this.elements.header || this.elements.mobileHeader) {
                this.bindEvents();
                this.forceSticky();
                this.isInitialized = true;
                return;
            }
            
            // Se não encontrou elementos, aguardar e tentar novamente
            setTimeout(function() {
                if (!self.isInitialized) {
                    self.cacheElements();
                    if (self.elements.header || self.elements.mobileHeader) {
                        self.bindEvents();
                        self.forceSticky();
                        self.isInitialized = true;
                    } else {
                        // Se ainda não encontrou, iniciar observer
                        self.observeElements();
                    }
                }
            }, 200);
        },

        // Cache de elementos DOM
        cacheElements: function() {
            this.elements.header = document.querySelector('.header');
            this.elements.mobileHeader = document.querySelector('.mobile-header');
        },

        // Observar quando os elementos estão realmente visíveis
        observeElements: function() {
            var self = this;
            
            // Função para tentar inicializar
            function tryInit() {
                if (!self.isInitialized) {
                    self.cacheElements();
                    if (self.elements.header || self.elements.mobileHeader) {
                        self.bindEvents();
                        self.forceSticky();
                        self.isInitialized = true;
                        return true;
                    }
                }
                return false;
            }
            
            // Observer para detectar quando elementos são adicionados ao DOM
            var mutationObserver = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'childList') {
                        var addedNodes = Array.from(mutation.addedNodes);
                        var hasHeader = addedNodes.some(function(node) {
                            return node.nodeType === 1 && (
                                node.classList && (
                                    node.classList.contains('header') ||
                                    node.classList.contains('mobile-header')
                                ) ||
                                node.querySelector && (
                                    node.querySelector('.header') ||
                                    node.querySelector('.mobile-header')
                                )
                            );
                        });
                        
                        if (hasHeader) {
                            setTimeout(tryInit, 50);
                        }
                    }
                });
            });
            
            // Observer para detectar quando header está visível
            var intersectionObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting && !self.isInitialized) {
                        setTimeout(tryInit, 100);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });
            
            // Observar mudanças no body
            mutationObserver.observe(document.body, {
                childList: true,
                subtree: true
            });
            
            // Tentar observar header quando disponível
            setTimeout(function() {
                var header = document.querySelector('.header');
                var mobileHeader = document.querySelector('.mobile-header');
                
                if (header) {
                    intersectionObserver.observe(header);
                }
                if (mobileHeader) {
                    intersectionObserver.observe(mobileHeader);
                }
            }, 100);
            
            // Parar observers após 10 segundos
            setTimeout(function() {
                mutationObserver.disconnect();
                intersectionObserver.disconnect();
            }, 10000);
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
            // Recarregar elementos caso não estejam disponíveis
            if (!this.elements.header && !this.elements.mobileHeader) {
                this.cacheElements();
            }
            
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
                mobileHeaderEl.style.setProperty('background', 'rgba(255, 255, 255, 0.95)', 'important');
                mobileHeaderEl.style.setProperty('backdrop-filter', 'blur(20px)', 'important');
                mobileHeaderEl.style.setProperty('-webkit-backdrop-filter', 'blur(20px)', 'important');
                mobileHeaderEl.style.setProperty('border-bottom', '1px solid rgba(0, 0, 0, 0.1)', 'important');
                mobileHeaderEl.style.setProperty('transition', 'all 0.3s ease', 'important');
                mobileHeaderEl.style.setProperty('box-shadow', '0 2px 4px rgba(0, 0, 0, 0.1)', 'important');
                
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
                headerEl.style.setProperty('background', 'rgba(255, 255, 255, 0.95)', 'important');
                headerEl.style.setProperty('backdrop-filter', 'blur(20px)', 'important');
                headerEl.style.setProperty('-webkit-backdrop-filter', 'blur(20px)', 'important');
                headerEl.style.setProperty('border-bottom', '1px solid rgba(0, 0, 0, 0.1)', 'important');
                headerEl.style.setProperty('transition', 'all 0.3s ease', 'important');
                headerEl.style.setProperty('box-shadow', '0 2px 4px rgba(0, 0, 0, 0.1)', 'important');
                
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
    
    // Inicialização robusta - múltiplas tentativas
    function robustInit() {
        // Tentar imediatamente
        initHeaderSticky();
        
        // Tentar quando DOM estiver pronto
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                if (!CetesiHeaderSticky.isInitialized) {
                    initHeaderSticky();
                }
            });
        }
        
        // Tentar quando página estiver completamente carregada
        window.addEventListener('load', function() {
            if (!CetesiHeaderSticky.isInitialized) {
                initHeaderSticky();
            }
        });
        
        // Tentar após delays progressivos para casos extremos
        setTimeout(function() {
            if (!CetesiHeaderSticky.isInitialized) {
                initHeaderSticky();
            }
        }, 500);
        
        setTimeout(function() {
            if (!CetesiHeaderSticky.isInitialized) {
                initHeaderSticky();
            }
        }, 1500);
        
        // Polling agressivo como último recurso
        var pollCount = 0;
        var pollInterval = setInterval(function() {
            pollCount++;
            if (pollCount > 20) { // Parar após 10 segundos (20 * 500ms)
                clearInterval(pollInterval);
                return;
            }
            
            if (!CetesiHeaderSticky.isInitialized) {
                initHeaderSticky();
            } else {
                clearInterval(pollInterval);
            }
        }, 500);
    }
    
    // Inicializar imediatamente
    robustInit();

    // Expor objeto globalmente
    window.CetesiHeaderSticky = CetesiHeaderSticky;

})();