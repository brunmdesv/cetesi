/**
 * JavaScript principal do tema CETESI
 * 
 * @package CETESI
 * @version 1.0.0
 */

(function($) {
    'use strict';

    // Aguardar o DOM estar pronto
    $(document).ready(function() {
        
        // Inicializar todas as funcionalidades
        initSmoothScroll();
        initStickyHeader();
        initMobileMenu();
        initAnimations();
        initContactForm();
        initStatsCounter();
        initWhatsAppButton();
        
    });

    /**
     * Scroll suave para âncoras
     */
    function initSmoothScroll() {
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
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
    }

    /**
     * Header fixo com efeito de scroll
     */
    function initStickyHeader() {
        var header = $('.header');
        var lastScrollTop = 0;
        var scrollThreshold = 100;

        $(window).scroll(function() {
            var scrollTop = $(this).scrollTop();
            
            if (scrollTop > scrollThreshold) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }
            
            lastScrollTop = scrollTop;
        });
    }

    /**
     * Menu mobile
     */
    function initMobileMenu() {
        var menuToggle = $('.menu-toggle');
        var navMenu = $('.nav-menu');
        var body = $('body');

        menuToggle.on('click', function() {
            navMenu.toggleClass('active');
            body.toggleClass('menu-open');
            
            var isExpanded = navMenu.hasClass('active');
            menuToggle.attr('aria-expanded', isExpanded);
        });

        // Fechar menu ao clicar em um link
        navMenu.find('a').on('click', function() {
            navMenu.removeClass('active');
            body.removeClass('menu-open');
            menuToggle.attr('aria-expanded', 'false');
        });

        // Fechar menu ao clicar fora
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length) {
                navMenu.removeClass('active');
                body.removeClass('menu-open');
                menuToggle.attr('aria-expanded', 'false');
            }
        });
    }

    /**
     * Animações de entrada
     */
    function initAnimations() {
        // Intersection Observer para animações
        if ('IntersectionObserver' in window) {
            var observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observar elementos para animação
            $('.curso-card, .diferencial-card, .stat-item').each(function() {
                observer.observe(this);
            });
        }

        // Animação de hover nos cards
        $('.curso-card, .diferencial-card').hover(
            function() {
                $(this).addClass('hovered');
            },
            function() {
                $(this).removeClass('hovered');
            }
        );
    }

    /**
     * Formulário de contato
     */
    function initContactForm() {
        var contactForm = $('#contact-form');
        
        if (contactForm.length) {
            contactForm.on('submit', function(e) {
                e.preventDefault();
                
                var formData = {
                    action: 'cetesi_contact',
                    nonce: cetesi_ajax.nonce,
                    nome: $('#nome').val(),
                    email: $('#email').val(),
                    telefone: $('#telefone').val(),
                    curso: $('#curso').val(),
                    mensagem: $('#mensagem').val()
                };

                // Validação básica
                if (!formData.nome || !formData.email || !formData.telefone) {
                    showMessage('Por favor, preencha todos os campos obrigatórios.', 'error');
                    return;
                }

                // Mostrar loading
                var submitBtn = $(this).find('button[type="submit"]');
                var originalText = submitBtn.text();
                submitBtn.text('Enviando...').prop('disabled', true);

                // Enviar AJAX
                $.ajax({
                    url: cetesi_ajax.ajax_url,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            showMessage(response.data, 'success');
                            contactForm[0].reset();
                        } else {
                            showMessage(response.data, 'error');
                        }
                    },
                    error: function() {
                        showMessage('Erro ao enviar mensagem. Tente novamente.', 'error');
                    },
                    complete: function() {
                        submitBtn.text(originalText).prop('disabled', false);
                    }
                });
            });
        }
    }

    /**
     * Contador de estatísticas
     */
    function initStatsCounter() {
        var statsSection = $('.stats-section');
        var animated = false;

        $(window).scroll(function() {
            if (!animated && statsSection.length) {
                var scrollTop = $(window).scrollTop();
                var elementTop = statsSection.offset().top;
                var elementHeight = statsSection.outerHeight();
                var windowHeight = $(window).height();

                if (scrollTop > (elementTop - windowHeight + elementHeight / 2)) {
                    animateStats();
                    animated = true;
                }
            }
        });
    }

    /**
     * Animar números das estatísticas
     */
    function animateStats() {
        $('.stat-number').each(function() {
            var $this = $(this);
            var countTo = $this.text().replace(/[^\d]/g, '');
            var duration = 2000;

            $({ countNum: 0 }).animate({
                countNum: countTo
            }, {
                duration: duration,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum) + ($this.text().includes('%') ? '%' : '+'));
                },
                complete: function() {
                    $this.text(countTo + ($this.text().includes('%') ? '%' : '+'));
                }
            });
        });
    }

    /**
     * Botão WhatsApp
     */
    function initWhatsAppButton() {
        var whatsappBtn = $('.floating-btn');
        
        if (whatsappBtn.length) {
            // Pausar animação no hover
            whatsappBtn.hover(
                function() {
                    $(this).css('animation-play-state', 'paused');
                },
                function() {
                    $(this).css('animation-play-state', 'running');
                }
            );
        }
    }

    /**
     * Mostrar mensagem de feedback
     */
    function showMessage(message, type) {
        var messageClass = type === 'success' ? 'success' : 'error';
        var messageHtml = '<div class="message ' + messageClass + '">' + message + '</div>';
        
        // Remover mensagens anteriores
        $('.message').remove();
        
        // Adicionar nova mensagem
        $('body').append(messageHtml);
        
        // Remover após 5 segundos
        setTimeout(function() {
            $('.message').fadeOut(function() {
                $(this).remove();
            });
        }, 5000);
    }

    /**
     * Máscara para telefone
     */
    function initPhoneMask() {
        $('input[type="tel"]').on('input', function() {
            var value = $(this).val().replace(/\D/g, '');
            var formattedValue = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            $(this).val(formattedValue);
        });
    }

    /**
     * Lazy loading para imagens
     */
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            $('img[data-src]').each(function() {
                imageObserver.observe(this);
            });
        }
    }

    /**
     * Debounce para performance
     */
    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    // Aplicar debounce em eventos de scroll
    $(window).on('scroll', debounce(function() {
        // Eventos de scroll otimizados
    }, 10));

    // Inicializar funcionalidades adicionais
    initPhoneMask();
    initLazyLoading();

})(jQuery);

// CSS para mensagens
var messageStyles = `
<style>
.message {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 15px 20px;
    border-radius: 8px;
    color: white;
    font-weight: 500;
    z-index: 9999;
    animation: slideInRight 0.3s ease;
}

.message.success {
    background: #10b981;
}

.message.error {
    background: #ef4444;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.menu-open {
    overflow: hidden;
}

.hovered {
    transform: translateY(-8px) !important;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
}
</style>
`;

// Adicionar estilos ao head
document.head.insertAdjacentHTML('beforeend', messageStyles);
