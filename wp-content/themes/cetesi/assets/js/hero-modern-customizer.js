/**
 * JavaScript para Customizer da Hero Moderna
 * 
 * @package Cetesi
 * @since 1.0.0
 */

(function($) {
    'use strict';

    // ==========================================================================
    // PREVIEW EM TEMPO REAL
    // ==========================================================================

    wp.customize('hero_badge_text', function(value) {
        value.bind(function(newval) {
            $('.badge-text').text(newval);
        });
    });

    wp.customize('hero_title_line1', function(value) {
        value.bind(function(newval) {
            $('.title-line-1').text(newval);
        });
    });

    wp.customize('hero_title_line2', function(value) {
        value.bind(function(newval) {
            $('.title-highlight').text(newval);
        });
    });

    wp.customize('hero_title_line3', function(value) {
        value.bind(function(newval) {
            $('.title-line-3').text(newval);
        });
    });

    wp.customize('hero_subtitle', function(value) {
        value.bind(function(newval) {
            $('.hero-subtitle-modern').text(newval);
        });
    });

    // Estatísticas
    wp.customize('hero_stat1_number', function(value) {
        value.bind(function(newval) {
            $('.stat-item:nth-child(1) .stat-number').attr('data-count', newval).text(newval);
        });
    });

    wp.customize('hero_stat1_label', function(value) {
        value.bind(function(newval) {
            $('.stat-item:nth-child(1) .stat-label').text(newval);
        });
    });

    wp.customize('hero_stat2_number', function(value) {
        value.bind(function(newval) {
            $('.stat-item:nth-child(2) .stat-number').attr('data-count', newval).text(newval);
        });
    });

    wp.customize('hero_stat2_label', function(value) {
        value.bind(function(newval) {
            $('.stat-item:nth-child(2) .stat-label').text(newval);
        });
    });

    wp.customize('hero_stat3_number', function(value) {
        value.bind(function(newval) {
            $('.stat-item:nth-child(3) .stat-number').attr('data-count', newval).text(newval);
        });
    });

    wp.customize('hero_stat3_label', function(value) {
        value.bind(function(newval) {
            $('.stat-item:nth-child(3) .stat-label').text(newval);
        });
    });

    // Botões
    wp.customize('hero_button_text', function(value) {
        value.bind(function(newval) {
            $('.btn-primary-modern .btn-text').text(newval);
        });
    });

    wp.customize('hero_button_url', function(value) {
        value.bind(function(newval) {
            $('.btn-primary-modern').attr('href', newval);
        });
    });

    wp.customize('hero_button_secondary_text', function(value) {
        value.bind(function(newval) {
            $('.btn-secondary-modern .btn-text').text(newval);
        });
    });

    wp.customize('hero_button_secondary_url', function(value) {
        value.bind(function(newval) {
            $('.btn-secondary-modern').attr('href', newval);
        });
    });

    // Card principal
    wp.customize('hero_card_title', function(value) {
        value.bind(function(newval) {
            $('.card-info h3').text(newval);
        });
    });

    wp.customize('hero_card_subtitle', function(value) {
        value.bind(function(newval) {
            $('.card-info p').text(newval);
        });
    });

    wp.customize('hero_card_rating', function(value) {
        value.bind(function(newval) {
            $('.card-rating span').text(newval);
        });
    });

    wp.customize('hero_card_progress', function(value) {
        value.bind(function(newval) {
            $('.card-progress span').text(newval);
        });
    });

    wp.customize('hero_card_progress_percentage', function(value) {
        value.bind(function(newval) {
            $('.progress-fill').css('width', newval + '%');
        });
    });

    // Imagem
    wp.customize('hero_image', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.card-avatar img').attr('src', newval);
                $('.card-avatar img').show();
                $('.avatar-placeholder').hide();
            } else {
                $('.card-avatar img').hide();
                $('.avatar-placeholder').show();
            }
        });
    });

    // Cores - Removido para usar apenas variáveis CSS
    // As cores agora são controladas exclusivamente pela variável --gradient-hero

})(jQuery);
