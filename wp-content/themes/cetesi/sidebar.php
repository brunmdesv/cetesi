<?php
/**
 * Sidebar do tema Cetesi
 *
 * @package Cetesi
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'sidebar-principal' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar Principal', 'cetesi' ); ?>">
    <?php dynamic_sidebar( 'sidebar-principal' ); ?>
</aside><!-- #secondary -->
