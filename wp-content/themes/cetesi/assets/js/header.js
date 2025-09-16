/**
 * JavaScript específico do Header - COMPLETAMENTE ISOLADO
 * 
 * Este arquivo contém TODAS as funcionalidades JavaScript relacionadas ao header.
 * Qualquer mudança aqui afetará APENAS o header, não outras partes do site.
 * 
 * @package Cetesi
 * @since 1.0.0
 */

(function($) {
    'use strict';

    // Objeto Header - Namespace isolado
    var CetesiHeader = {
        
        // Configurações
        config: {
            scrollThreshold: 100,
            animationDelay: 100,
            menuTransitionDuration: 300
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
        },

        // Cache de elementos DOM
        cacheElements: function() {
            this.elements.menuToggle = document.getElementById('menu-toggle');
            this.elements.navMenu = document.getElementById('nav-menu');
            this.elements.header = document.querySelector('.header');
            this.elements.body = document.body;
        },

        // Bind de eventos
        bindEvents: function() {
            // Menu toggle
            if (this.elements.menuToggle) {
                this.elements.menuToggle.addEventListener('click', this.toggleMobileMenu.bind(this));
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
            
            // Scroll do header
            if (this.elements.header) {
                window.addEventListener('scroll', this.handleHeaderScroll.bind(this));
            }
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
        }
    };

    // Inicializar funcionalidades do header quando DOM estiver pronto
    $(document).ready(function() {
        CetesiHeader.init();
    });

    // Expor objeto globalmente para uso externo se necessário
    window.CetesiHeader = CetesiHeader;

})(jQuery);
