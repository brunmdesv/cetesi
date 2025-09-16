/**
 * JavaScript para Hero Section Moderna
 * 
 * @package Cetesi
 * @since 1.0.0
 */

(function($) {
    'use strict';

    // ==========================================================================
    // HERO MODERNA - FUNCIONALIDADES PRINCIPAIS
    // ==========================================================================

    class HeroModern {
        constructor() {
            this.init();
        }

        init() {
            this.setupEventListeners();
            this.startAnimations();
            this.initCounters();
            this.initScrollIndicator();
            this.initParticles();
            this.initTypingEffect();
        }

        // ===== CONFIGURAÇÃO DE EVENTOS =====
        setupEventListeners() {
            // Botões com efeito ripple
            $(document).on('click', '.btn-modern', (e) => {
                this.createRippleEffect(e);
            });

            // Intersection Observer para animações
            this.setupIntersectionObserver();

            // Resize handler
            $(window).on('resize', () => {
                this.handleResize();
            });

            // Scroll handler para efeitos parallax
            $(window).on('scroll', () => {
                this.handleScroll();
            });
        }

        // ===== ANIMAÇÕES INICIAIS =====
        startAnimations() {
            // Animação de entrada dos elementos
            setTimeout(() => {
                $('.hero-badge').addClass('animate-in');
            }, 200);

            setTimeout(() => {
                $('.hero-title-modern').addClass('animate-in');
            }, 400);

            setTimeout(() => {
                $('.hero-subtitle-modern').addClass('animate-in');
            }, 600);

            setTimeout(() => {
                $('.hero-stats').addClass('animate-in');
            }, 800);

            setTimeout(() => {
                $('.hero-actions-modern').addClass('animate-in');
            }, 1000);

            setTimeout(() => {
                $('.hero-trust').addClass('animate-in');
            }, 1200);

            setTimeout(() => {
                $('.hero-visual').addClass('animate-in');
            }, 1400);
        }

        // ===== CONTADORES ANIMADOS =====
        initCounters() {
            const counters = document.querySelectorAll('.stat-number[data-count]');
            
            const animateCounter = (counter) => {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000; // 2 segundos
                const increment = target / (duration / 16); // 60fps
                let current = 0;

                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.textContent = Math.floor(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };

                updateCounter();
            };

            // Usar Intersection Observer para iniciar contadores quando visíveis
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(counter => {
                counterObserver.observe(counter);
            });
        }

        // ===== INDICADOR DE SCROLL =====
        initScrollIndicator() {
            const scrollIndicator = $('.scroll-indicator');
            
            // Mostrar/ocultar baseado no scroll
            $(window).on('scroll', () => {
                const scrollTop = $(window).scrollTop();
                const windowHeight = $(window).height();
                
                if (scrollTop > windowHeight * 0.8) {
                    scrollIndicator.addClass('hidden');
                } else {
                    scrollIndicator.removeClass('hidden');
                }
            });
        }

        // ===== SISTEMA DE PARTÍCULAS =====
        // Partículas removidas para design mais limpo

        // ===== EFEITO DE DIGITAÇÃO =====
        initTypingEffect() {
            const cursor = $('.title-cursor');
            if (cursor.length) {
                setInterval(() => {
                    cursor.toggleClass('visible');
                }, 500);
            }
        }

        // ===== INTERSECTION OBSERVER =====
        setupIntersectionObserver() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                    }
                });
            }, observerOptions);

            // Observar elementos que precisam de animação
            $('.hero-card, .float-card').each((index, element) => {
                observer.observe(element);
            });
        }

        // ===== EFEITO RIPPLE NOS BOTÕES =====
        createRippleEffect(event) {
            const button = $(event.currentTarget);
            const ripple = button.find('.btn-ripple');
            
            // Resetar animação
            ripple.removeClass('ripple-active');
            
            // Trigger reflow
            ripple[0].offsetHeight;
            
            // Ativar animação
            ripple.addClass('ripple-active');
        }

        // ===== SCROLL PARA PRÓXIMA SEÇÃO =====
        // Função removida - scroll indicator agora é apenas visual

        // ===== HANDLER DE RESIZE =====
        handleResize() {
            // Recalcular posições dos elementos flutuantes
            this.repositionFloatingElements();
        }

        // ===== HANDLER DE SCROLL =====
        handleScroll() {
            const scrollTop = $(window).scrollTop();
            const windowHeight = $(window).height();
            
            // Efeitos parallax removidos para design mais limpo
        }

        // ===== REPOSICIONAR ELEMENTOS FLUTUANTES =====
        repositionFloatingElements() {
            const windowWidth = $(window).width();
            
            if (windowWidth < 768) {
                $('.floating-cards').hide();
            } else {
                $('.floating-cards').show();
            }
        }
    }

    // ==========================================================================
    // UTILITÁRIOS E FUNÇÕES AUXILIARES
    // ==========================================================================

    // Função para adicionar easing personalizado
    $.easing.easeInOutCubic = function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b;
    };

    // Função para detectar se o dispositivo é móvel
    function isMobile() {
        return window.innerWidth <= 768;
    }

    // Função para debounce
    function debounce(func, wait, immediate) {
        let timeout;
        return function() {
            const context = this, args = arguments;
            const later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    // ==========================================================================
    // INICIALIZAÇÃO
    // ==========================================================================

    // Aguardar DOM estar pronto
    $(document).ready(function() {
        // Verificar se estamos na página inicial
        if ($('.hero-modern').length) {
            // Inicializar Hero Moderna
            new HeroModern();
            
            // Adicionar classes CSS para animações
            $('<style>')
                .prop('type', 'text/css')
                .html(`
                    .animate-in {
                        animation: slideInUp 0.8s ease-out forwards;
                    }
                    
                    .in-view {
                        animation: fadeInScale 0.6s ease-out forwards;
                    }
                    
                    .ripple-active {
                        animation: ripple 0.6s ease-out;
                    }
                    
                    .hidden {
                        opacity: 0;
                        pointer-events: none;
                    }
                    
                    .particle {
                        position: absolute;
                        background: rgba(255, 255, 255, 0.1);
                        border-radius: 50%;
                        animation: particleFloat linear infinite;
                    }
                    
                    @keyframes slideInUp {
                        0% {
                            opacity: 0;
                            transform: translateY(30px);
                        }
                        100% {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }
                    
                    @keyframes fadeInScale {
                        0% {
                            opacity: 0;
                            transform: scale(0.8);
                        }
                        100% {
                            opacity: 1;
                            transform: scale(1);
                        }
                    }
                    
                    @keyframes ripple {
                        0% {
                            width: 0;
                            height: 0;
                        }
                        100% {
                            width: 300px;
                            height: 300px;
                        }
                    }
                    
                    @keyframes particleFloat {
                        0% {
                            transform: translateY(100vh) rotate(0deg);
                            opacity: 0;
                        }
                        10% {
                            opacity: 1;
                        }
                        90% {
                            opacity: 1;
                        }
                        100% {
                            transform: translateY(-100px) rotate(360deg);
                            opacity: 0;
                        }
                    }
                `)
                .appendTo('head');
        }
    });

    // ==========================================================================
    // HANDLERS DE PERFORMANCE
    // ==========================================================================

    // Otimizar scroll com requestAnimationFrame
    let ticking = false;
    
    function updateOnScroll() {
        // Aqui você pode adicionar lógica de scroll se necessário
        ticking = false;
    }
    
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateOnScroll);
            ticking = true;
        }
    }

    // ==========================================================================
    // HANDLERS DE ACESSIBILIDADE
    // ==========================================================================

    // Suporte para prefers-reduced-motion
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        // Desabilitar animações para usuários que preferem movimento reduzido
        $('<style>')
            .prop('type', 'text/css')
            .html(`
                .hero-modern * {
                    animation: none !important;
                    transition: none !important;
                }
            `)
            .appendTo('head');
    }

})(jQuery);
