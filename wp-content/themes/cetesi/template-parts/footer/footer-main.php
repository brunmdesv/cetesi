<?php
/**
 * Template part para conteúdo principal do footer
 *
 * @package Cetesi
 * @since 1.0.0
 */
?>

<div class="footer-main">
    <!-- Coluna 1: Informações de Contato -->
    <div class="footer-column">
        <h3 class="footer-widget-title"><?php esc_html_e( 'Contato', 'cetesi' ); ?></h3>
        
        <?php cetesi_footer_contact_info(); ?>
        
        <?php cetesi_footer_business_hours(); ?>
        
        <?php if ( is_active_sidebar( 'footer-col-1' ) ) : ?>
            <?php dynamic_sidebar( 'footer-col-1' ); ?>
        <?php endif; ?>
    </div>

    <!-- Coluna 2: Links Rápidos -->
    <div class="footer-column">
        <h3 class="footer-widget-title"><?php esc_html_e( 'Links Rápidos', 'cetesi' ); ?></h3>
        
        <?php cetesi_footer_quick_links(); ?>
        
        <?php if ( is_active_sidebar( 'footer-col-2' ) ) : ?>
            <?php dynamic_sidebar( 'footer-col-2' ); ?>
        <?php endif; ?>
    </div>

    <!-- Coluna 3: Redes Sociais -->
    <div class="footer-column">
        <h3 class="footer-widget-title"><?php esc_html_e( 'Redes Sociais', 'cetesi' ); ?></h3>
        
        <?php cetesi_footer_social_links(); ?>
        
        <?php if ( is_active_sidebar( 'footer-col-3' ) ) : ?>
            <?php dynamic_sidebar( 'footer-col-3' ); ?>
        <?php endif; ?>
    </div>

    <!-- Coluna 4: Newsletter -->
    <div class="footer-column">
        <h3 class="footer-widget-title"><?php esc_html_e( 'Newsletter', 'cetesi' ); ?></h3>
        
        <?php cetesi_footer_newsletter(); ?>
        
        <?php if ( is_active_sidebar( 'footer-col-4' ) ) : ?>
            <?php dynamic_sidebar( 'footer-col-4' ); ?>
        <?php endif; ?>
    </div>
</div>
