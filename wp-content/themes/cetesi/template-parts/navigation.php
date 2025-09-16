<?php
/**
 * Template part para navegação
 *
 * @package Cetesi
 * @since 1.0.0
 */

?>

<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Menu Principal', 'cetesi' ); ?>">
    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <span class="screen-reader-text"><?php esc_html_e( 'Menu Principal', 'cetesi' ); ?></span>
        <span class="menu-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </button>
    
    <?php
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'menu_id'        => 'primary-menu',
        'menu_class'     => 'menu',
        'container'      => false,
        'fallback_cb'    => 'cetesi_fallback_menu',
    ) );
    ?>
</nav>
