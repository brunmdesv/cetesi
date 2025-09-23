<?php
/**
 * Template part para header mobile - Layout Material-UI
 *
 * @package Cetesi-Theme
 * @since 1.0.0
 */
?>

<!-- Header Mobile -->
<div class="mobile-header">
    <div class="mobile-container">
        <div class="mobile-toolbar">
            <!-- Logo Mobile -->
            <div class="mobile-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-logo-link" aria-label="<?php bloginfo('name'); ?>">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    if ($custom_logo_id) {
                        echo wp_get_attachment_image($custom_logo_id, 'full', false, array(
                            'class' => 'mobile-logo-img',
                            'alt' => get_bloginfo('name'),
                            'loading' => 'eager'
                        ));
                    } else {
                        echo '<span class="mobile-logo-text">' . get_bloginfo('name') . '</span>';
                    }
                    ?>
                </a>
            </div>

            <!-- Menu Toggle Mobile -->
            <div class="mobile-menu-toggle">
                <button 
                    class="mobile-menu-btn" 
                    type="button" 
                    aria-label="Abrir menu de navegação"
                    aria-expanded="false"
                    aria-controls="mobile-menu"
                    id="mobile-menu-button"
                >
                    <span class="mobile-menu-icon">
                        <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" fill="currentColor"/>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile Overlay -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay" aria-hidden="true">
        <div class="mobile-menu-content">
            

            <!-- CTA Mobile - Movido para o topo -->
            <div class="mobile-cta">
                <!-- Painéis na mesma linha -->
                <div class="mobile-cta-row">
                    <a href="#" class="mobile-btn-nav" role="button">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Painel Unicollege</span>
                    </a>
                    
                    <a href="#" class="mobile-btn-nav" role="button">
                        <i class="fas fa-user-graduate"></i>
                        <span>Painel do Aluno</span>
                    </a>
                </div>
                
                <!-- Botão ligar em linha separada -->
                <!-- Botão "Ligar agora" removido do mobile -->
            </div>

            <!-- Navegação Mobile -->
            <nav class="mobile-navigation" id="mobile-menu" role="navigation" aria-label="Menu principal">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'principal',
                    'container' => false,
                    'menu_class' => 'mobile-nav-menu',
                    'fallback_cb' => 'cetesi_fallback_menu',
                    'walker' => new Cetesi_Mobile_Menu_Walker()
                ));
                ?>
            </nav>

        </div>
    </div>
</div>