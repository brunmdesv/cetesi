<?php
/**
 * Template part para navegação do footer
 *
 * @package Cetesi
 * @since 1.0.0
 */
?>

<?php if ( has_nav_menu( 'rodape' ) ) : ?>
    <nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Menu do Rodapé', 'cetesi' ); ?>">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'rodape',
            'menu_class'     => 'footer-links',
            'container'      => false,
            'depth'          => 1,
            'fallback_cb'    => false,
        ) );
        ?>
    </nav>
<?php endif; ?>
