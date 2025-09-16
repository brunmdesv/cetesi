/**
 * JavaScript principal do tema Cetesi
 * 
 * @package Cetesi
 * @since 1.0.0
 */

(function($) {
    'use strict';

    // Objeto principal do tema
    var CetesiTheme = {
        
        // Inicialização
        init: function() {
            this.mobileMenu();
            this.smoothScroll();
            this.lazyLoading();
            this.searchEnhancements();
            this.commentsEnhancements();
            this.accessibilityEnhancements();
            this.performanceOptimizations();
        },

        // Menu mobile
        mobileMenu: function() {
            var $menuToggle = $('.menu-toggle');
            var $menu = $('.menu');
            var $body = $('body');

            $menuToggle.on('click', function(e) {
                e.preventDefault();
                
                $(this).toggleClass('active');
                $menu.toggleClass('active');
                $body.toggleClass('menu-open');
                
                // Acessibilidade
                var expanded = $(this).hasClass('active');
                $(this).attr('aria-expanded', expanded);
            });

            // Fechar menu ao clicar fora
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.main-navigation').length) {
                    $menuToggle.removeClass('active');
                    $menu.removeClass('active');
                    $body.removeClass('menu-open');
                    $menuToggle.attr('aria-expanded', false);
                }
            });

            // Fechar menu ao pressionar ESC
            $(document).on('keydown', function(e) {
                if (e.keyCode === 27) { // ESC
                    $menuToggle.removeClass('active');
                    $menu.removeClass('active');
                    $body.removeClass('menu-open');
                    $menuToggle.attr('aria-expanded', false);
                }
            });
        },

        // Scroll suave
        smoothScroll: function() {
            $('a[href*="#"]:not([href="#"])').on('click', function() {
                if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && 
                    location.hostname === this.hostname) {
                    
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 80
                        }, 1000);
                        return false;
                    }
                }
            });
        },

        // Lazy loading para imagens
        lazyLoading: function() {
            if ('IntersectionObserver' in window) {
                var imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var image = entry.target;
                            image.src = image.dataset.src;
                            image.classList.remove('lazy');
                            imageObserver.unobserve(image);
                        }
                    });
                });

                $('.lazy').each(function() {
                    imageObserver.observe(this);
                });
            }
        },

        // Melhorias na busca
        searchEnhancements: function() {
            var $searchForm = $('.search-form');
            var $searchInput = $searchForm.find('input[type="search"]');

            // Foco automático no campo de busca
            $searchForm.on('submit', function() {
                if (!$searchInput.val().trim()) {
                    $searchInput.focus();
                    return false;
                }
            });

            // Sugestões de busca (se implementado no backend)
            if ($searchInput.length) {
                var searchTimeout;
                $searchInput.on('input', function() {
                    clearTimeout(searchTimeout);
                    var query = $(this).val();
                    
                    if (query.length > 2) {
                        searchTimeout = setTimeout(function() {
                            CetesiTheme.performSearch(query);
                        }, 300);
                    }
                });
            }
        },

        // Busca AJAX
        performSearch: function(query) {
            $.ajax({
                url: cetesi_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'cetesi_search',
                    query: query,
                    nonce: cetesi_ajax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        CetesiTheme.displaySearchResults(response.data);
                    }
                },
                error: function() {
                    console.log('Erro na busca');
                }
            });
        },

        // Exibir resultados da busca
        displaySearchResults: function(results) {
            // Implementar exibição de resultados
            console.log('Resultados:', results);
        },

        // Melhorias nos comentários
        commentsEnhancements: function() {
            // Auto-resize para textareas
            $('.comment-form textarea').on('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            // Validação de formulário de comentários
            $('.comment-form').on('submit', function(e) {
                var $form = $(this);
                var $email = $form.find('input[type="email"]');
                var $comment = $form.find('textarea[name="comment"]');

                if (!$email.val() || !CetesiTheme.validateEmail($email.val())) {
                    e.preventDefault();
                    CetesiTheme.showError('Por favor, insira um email válido.');
                    $email.focus();
                    return false;
                }

                if (!$comment.val().trim()) {
                    e.preventDefault();
                    CetesiTheme.showError('Por favor, insira um comentário.');
                    $comment.focus();
                    return false;
                }
            });
        },

        // Melhorias de acessibilidade
        accessibilityEnhancements: function() {
            // Skip links
            $('.skip-link').on('click', function(e) {
                var target = $(this).attr('href');
                if (target && $(target).length) {
                    $(target).attr('tabindex', '-1').focus();
                }
            });

            // Navegação por teclado em menus
            $('.menu a').on('keydown', function(e) {
                var $links = $('.menu a');
                var currentIndex = $links.index(this);

                if (e.keyCode === 37) { // Seta esquerda
                    e.preventDefault();
                    var prevIndex = currentIndex > 0 ? currentIndex - 1 : $links.length - 1;
                    $links.eq(prevIndex).focus();
                } else if (e.keyCode === 39) { // Seta direita
                    e.preventDefault();
                    var nextIndex = currentIndex < $links.length - 1 ? currentIndex + 1 : 0;
                    $links.eq(nextIndex).focus();
                }
            });

            // Indicadores de foco visíveis
            $('a, button, input, textarea, select').on('focus', function() {
                $(this).addClass('focus-visible');
            }).on('blur', function() {
                $(this).removeClass('focus-visible');
            });
        },

        // Otimizações de performance
        performanceOptimizations: function() {
            // Debounce para eventos de scroll
            var scrollTimeout;
            $(window).on('scroll', function() {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(function() {
                    CetesiTheme.handleScroll();
                }, 10);
            });

            // Debounce para eventos de resize
            var resizeTimeout;
            $(window).on('resize', function() {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(function() {
                    CetesiTheme.handleResize();
                }, 250);
            });
        },

        // Manipular scroll
        handleScroll: function() {
            var scrollTop = $(window).scrollTop();
            var $header = $('.site-header');

            if (scrollTop > 100) {
                $header.addClass('scrolled');
            } else {
                $header.removeClass('scrolled');
            }
        },

        // Manipular resize
        handleResize: function() {
            // Recalcular layouts se necessário
            var windowWidth = $(window).width();
            
            if (windowWidth > 768) {
                $('.menu').removeClass('active');
                $('.menu-toggle').removeClass('active').attr('aria-expanded', false);
                $('body').removeClass('menu-open');
            }
        },

        // Utilitários
        validateEmail: function(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        },

        showError: function(message) {
            // Implementar sistema de notificações
            console.log('Erro:', message);
        },

        showSuccess: function(message) {
            // Implementar sistema de notificações
            console.log('Sucesso:', message);
        }
    };

    // Inicializar quando o documento estiver pronto
    $(document).ready(function() {
        CetesiTheme.init();
    });

    // Inicializar quando a janela carregar
    $(window).on('load', function() {
        // Adicionar classe de carregamento completo
        $('body').addClass('loaded');
        
        // Animações de entrada
        $('.fade-in').addClass('fade-in-up');
    });

    // Expor objeto globalmente para uso em outros scripts
    window.CetesiTheme = CetesiTheme;

})(jQuery);
