/**
 * JavaScript específico do Header Sticky - Baseado no tema Cetesi que funciona
 * 
 * Este arquivo contém a funcionalidade JavaScript para o efeito de scroll no header.
 * 
 * @package Cetesi-Theme
 * @since 1.0.0
 */

(function() {
    'use strict';

    // Objeto Header Sticky - Namespace isolado
    var CetesiHeaderSticky = {
        
        // Configurações otimizadas para performance
        config: {
            scrollThreshold: 100,
            debounceDelay: 16
        },
        
        // Cache de elementos
        elements: {
            header: null,
            mobileHeader: null
        },
        
        // Inicialização
        init: function() {
            this.cacheElements();
            this.bindEvents();
            this.initHeaderScrollEffect();
            this.ensureStickyOrFallback();
            
            // Debug - verificar se inicializou
            console.log('CetesiHeaderSticky initialized');
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
            this.elements.header = document.querySelector('.header');
            this.elements.mobileHeader = document.querySelector('.mobile-header');
            
            // Debug - verificar se elementos foram encontrados
            console.log('Header Elements:', {
                header: this.elements.header,
                mobileHeader: this.elements.mobileHeader
            });
        },

        // Bind de eventos
        bindEvents: function() {
            // Scroll do header - Otimizado com debounce
            if (this.elements.header || this.elements.mobileHeader) {
                const debouncedScrollHandler = this.debounce(this.handleHeaderScroll.bind(this), this.config.debounceDelay);
                window.addEventListener('scroll', debouncedScrollHandler, { passive: true });
            }
        },

        // Efeito de scroll no header
        initHeaderScrollEffect: function() {
            // Throttle scroll events para performance
            this.scrollTimeout = null;
        },

        // Detecta se position: sticky está efetivo; se não, aplica fallback com fixed
        ensureStickyOrFallback: function() {
            var headerEl = this.elements.header || this.elements.mobileHeader;
            if (!headerEl) return;

            // Cria um sentinel acima do header para validar comportamento do sticky
            var sentinel = document.createElement('div');
            sentinel.style.height = '1px';
            sentinel.style.marginTop = '-1px';
            headerEl.parentNode.insertBefore(sentinel, headerEl);

            var isStickyWorking = false;
            try {
                // Usa IntersectionObserver para verificar se o header "gruda"
                var io = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        // Quando rolado, se o header permanece visível e o sentinel sai da viewport, sticky funciona
                        if (window.scrollY > 5 && entry.intersectionRatio === 0) {
                            isStickyWorking = true;
                        }
                    });
                }, { rootMargin: '0px 0px 0px 0px', threshold: [0] });

                io.observe(sentinel);
            } catch (e) {
                // Caso IO não esteja disponível, faz um teste simples de layout
                var initialTop = headerEl.getBoundingClientRect().top;
                window.scrollTo(0, 50);
                var afterTop = headerEl.getBoundingClientRect().top;
                window.scrollTo(0, 0);
                isStickyWorking = (afterTop === 0 || afterTop === initialTop);
            }

            // Teste determinístico: mede top antes/depois de rolar e decide
            var self = this;
            var initialTop = headerEl.getBoundingClientRect().top;
            var prevScrollY = window.scrollY;
            window.scrollTo(0, 100);
            setTimeout(function() {
                var afterTop = headerEl.getBoundingClientRect().top;
                window.scrollTo(0, prevScrollY);

                var stickyByMeasure = (afterTop === 0 || Math.abs(afterTop - 0) < 2);

                // Forçar fallback em páginas específicas conhecidas por problemas (equipe, sobre, contato)
                var forcePages = ['page-template-page-equipe', 'page-equipe', 'page-sobre', 'page-contato', 'page-id-'];
                var body = document.body;
                var forceByClass = forcePages.some(function(cls){ return Array.from(body.classList).some(function(c){ return c.indexOf(cls) === 0; }); });

                if (!(isStickyWorking || stickyByMeasure) || forceByClass) {
                    self.applyFixedFallback();
                }
            }, 150);
        },

        applyFixedFallback: function() {
            var headerEl = this.elements.header;
            var mobileHeaderEl = this.elements.mobileHeader;

            var activeEl = null;
            if (window.matchMedia('(max-width: 768px)').matches && mobileHeaderEl) {
                activeEl = mobileHeaderEl;
                mobileHeaderEl.classList.add('mobile-header--fixed');
            } else if (headerEl) {
                activeEl = headerEl;
                headerEl.classList.add('header--fixed');
            }

            if (activeEl) {
                var headerHeight = activeEl.getBoundingClientRect().height;
                document.documentElement.style.scrollPaddingTop = headerHeight + 'px';
                document.body.style.paddingTop = headerHeight + 'px';
                console.warn('[Cetesi] position: sticky falhou; aplicando fallback fixed.');
            }
        },

        // Handle scroll do header
        handleHeaderScroll: function() {
            if (this.scrollTimeout) {
                clearTimeout(this.scrollTimeout);
            }
            
            this.scrollTimeout = setTimeout(function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > this.config.scrollThreshold) {
                    if (this.elements.header) {
                        this.elements.header.classList.add('scrolled');
                    }
                    if (this.elements.mobileHeader) {
                        this.elements.mobileHeader.classList.add('scrolled');
                    }
                } else {
                    if (this.elements.header) {
                        this.elements.header.classList.remove('scrolled');
                    }
                    if (this.elements.mobileHeader) {
                        this.elements.mobileHeader.classList.remove('scrolled');
                    }
                }
            }.bind(this), 10);
        }
    };

    // Inicializar funcionalidades do header sticky quando DOM estiver pronto
    function initHeaderSticky() {
        CetesiHeaderSticky.init();
    }
    
    // Usar jQuery se disponível, senão usar DOMContentLoaded
    if (typeof $ !== 'undefined') {
        $(document).ready(initHeaderSticky);
    } else {
        document.addEventListener('DOMContentLoaded', initHeaderSticky);
    }

    // Expor objeto globalmente para uso externo se necessário
    window.CetesiHeaderSticky = CetesiHeaderSticky;

})();