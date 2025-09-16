/**
 * JavaScript específico para a página inicial
 *
 * @package Cetesi
 * @since 1.0.0
 */

(function($) {
    'use strict';

    // Animação de contadores nas estatísticas
    function animateCounters() {
        $('.stat-number').each(function() {
            var $this = $(this);
            var countTo = $this.data('count');
            
            $({ countNum: $this.text() }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    }

    // Verificar se o elemento está visível
    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        var windowHeight = window.innerHeight || document.documentElement.clientHeight;
        var windowWidth = window.innerWidth || document.documentElement.clientWidth;
        
        return (
            rect.top < windowHeight &&
            rect.bottom > 0 &&
            rect.left < windowWidth &&
            rect.right > 0
        );
    }

    // Animação de entrada dos elementos
    function animateOnScroll() {
        $('.course-card, .teacher-card, .testimonial-card').each(function() {
            if (isElementInViewport(this)) {
                $(this).addClass('animate-in');
            }
        });
    }

    // Formulário de contato
    function initContactForm() {
        $('.contact-form').on('submit', function(e) {
            e.preventDefault();
            
            var $form = $(this);
            var $submitBtn = $form.find('button[type="submit"]');
            var originalText = $submitBtn.text();
            
            // Desabilitar botão e mostrar loading
            $submitBtn.prop('disabled', true).text('Enviando...');
            
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                success: function(response) {
                    if (response.success) {
                        $form.html('<div class="success-message"><h3>Mensagem enviada com sucesso!</h3><p>Entraremos em contato em breve.</p></div>');
                    } else {
                        alert('Erro ao enviar mensagem. Tente novamente.');
                        $submitBtn.prop('disabled', false).text(originalText);
                    }
                },
                error: function() {
                    alert('Erro ao enviar mensagem. Tente novamente.');
                    $submitBtn.prop('disabled', false).text(originalText);
                }
            });
        });
    }

    // Smooth scroll para links internos
    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            var target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800);
            }
        });
    }

    // Filtros de cursos (se existir)
    function initCourseFilters() {
        $('#level-filter, #category-filter').on('change', function() {
            var level = $('#level-filter').val();
            var category = $('#category-filter').val();
            
            $('.course-card').each(function() {
                var $card = $(this);
                var cardLevel = $card.data('level');
                var cardCategory = $card.data('category');
                
                var showCard = true;
                
                if (level && cardLevel !== level) {
                    showCard = false;
                }
                
                if (category && cardCategory !== category) {
                    showCard = false;
                }
                
                if (showCard) {
                    $card.fadeIn();
                } else {
                    $card.fadeOut();
                }
            });
        });
    }

    // Lazy loading para imagens
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

            document.querySelectorAll('img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    // Inicialização quando o documento estiver pronto
    $(document).ready(function() {
        // Verificar se estamos na página inicial
        if ($('body').hasClass('home')) {
            // Inicializar funcionalidades
            initContactForm();
            initSmoothScroll();
            initCourseFilters();
            initLazyLoading();
            
            // Animação de entrada
            animateOnScroll();
            
            // Observar scroll para animações
            $(window).on('scroll', function() {
                animateOnScroll();
                
                // Animar contadores quando a seção de estatísticas estiver visível
                if ($('.estatisticas-section').length && isElementInViewport($('.estatisticas-section')[0])) {
                    if (!$('.estatisticas-section').hasClass('animated')) {
                        $('.estatisticas-section').addClass('animated');
                        animateCounters();
                    }
                }
            });
            
            // Adicionar classes CSS para animações
            $('<style>')
                .prop('type', 'text/css')
                .html(`
                    .course-card, .teacher-card, .testimonial-card {
                        opacity: 0;
                        transform: translateY(30px);
                        transition: opacity 0.6s ease, transform 0.6s ease;
                    }
                    
                    .course-card.animate-in, .teacher-card.animate-in, .testimonial-card.animate-in {
                        opacity: 1;
                        transform: translateY(0);
                    }
                    
                    .success-message {
                        text-align: center;
                        padding: 40px;
                        background: #d4edda;
                        border: 1px solid #c3e6cb;
                        border-radius: 8px;
                        color: #155724;
                    }
                    
                    .success-message h3 {
                        margin-bottom: 10px;
                        color: #155724;
                    }
                    
                    img.lazy {
                        opacity: 0;
                        transition: opacity 0.3s;
                    }
                    
                    img.lazy.loaded {
                        opacity: 1;
                    }
                `)
                .appendTo('head');
        }
    });

})(jQuery);
