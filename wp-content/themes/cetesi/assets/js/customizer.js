/**
 * JavaScript para preview do Customizer
 * 
 * @package Cetesi
 * @since 1.0.0
 */

(function($) {
    'use strict';

    // Preview de cores
    wp.customize('cetesi_primary_color', function(value) {
        value.bind(function(to) {
            $(':root').css('--primary-color', to);
        });
    });

    wp.customize('cetesi_secondary_color', function(value) {
        value.bind(function(to) {
            $(':root').css('--secondary-color', to);
        });
    });

    wp.customize('cetesi_text_color', function(value) {
        value.bind(function(to) {
            $(':root').css('--text-color', to);
        });
    });

    // Preview de largura do container
    wp.customize('cetesi_container_width', function(value) {
        value.bind(function(to) {
            $('.container').css('max-width', to + 'px');
        });
    });

    // Preview de altura do header
    wp.customize('cetesi_header_height', function(value) {
        value.bind(function(to) {
            $('.site-header').css('min-height', to + 'px');
        });
    });

    // Preview de tamanho da fonte
    wp.customize('cetesi_font_size', function(value) {
        value.bind(function(to) {
            $('html').css('font-size', to + 'px');
        });
    });

    // Preview de família da fonte
    wp.customize('cetesi_font_family', function(value) {
        value.bind(function(to) {
            var fontFamily;
            switch(to) {
                case 'serif':
                    fontFamily = "Georgia, 'Times New Roman', serif";
                    break;
                case 'sans':
                    fontFamily = "'Helvetica Neue', Arial, sans-serif";
                    break;
                case 'mono':
                    fontFamily = "'Courier New', monospace";
                    break;
                default:
                    fontFamily = "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif";
            }
            $('body').css('font-family', fontFamily);
        });
    });

    // Preview de texto do rodapé
    wp.customize('cetesi_footer_text', function(value) {
        value.bind(function(to) {
            if (to) {
                $('.footer-info p:first').text(to);
            } else {
                $('.footer-info p:first').html('&copy; ' + new Date().getFullYear() + ' ' + wp.customize('blogname').get() + '. Todos os direitos reservados.');
            }
        });
    });

    // Preview de redes sociais
    var socialNetworks = ['facebook', 'twitter', 'instagram', 'linkedin', 'youtube'];
    
    socialNetworks.forEach(function(network) {
        wp.customize('cetesi_social_' + network, function(value) {
            value.bind(function(to) {
                var $link = $('.social-' + network);
                if (to) {
                    if ($link.length) {
                        $link.attr('href', to);
                    } else {
                        // Adicionar link se não existir
                        var $socialLinks = $('.social-links');
                        if ($socialLinks.length) {
                            $socialLinks.append('<a href="' + to + '" class="social-link social-' + network + '" target="_blank" rel="noopener" aria-label="' + network + '"><span class="screen-reader-text">' + network + '</span></a>');
                        }
                    }
                } else {
                    $link.remove();
                }
            });
        });
    });

    // Preview de header fixo
    wp.customize('cetesi_sticky_header', function(value) {
        value.bind(function(to) {
            if (to) {
                $('.site-header').addClass('sticky');
            } else {
                $('.site-header').removeClass('sticky');
            }
        });
    });

    // Preview de lazy loading
    wp.customize('cetesi_lazy_loading', function(value) {
        value.bind(function(to) {
            if (to) {
                $('img').attr('loading', 'lazy');
            } else {
                $('img').removeAttr('loading');
            }
        });
    });

    // Preview de minificação CSS
    wp.customize('cetesi_minify_css', function(value) {
        value.bind(function(to) {
            // Esta opção requer reload da página para ser efetiva
            if (to !== wp.customize('cetesi_minify_css').get()) {
                wp.customize.preview.send('refresh');
            }
        });
    });

})(jQuery);
