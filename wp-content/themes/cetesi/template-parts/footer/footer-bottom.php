<?php
/**
 * Template part para rodapé inferior
 *
 * @package Cetesi
 * @since 1.0.0
 */
?>

<div class="footer-bottom">
    <div class="footer-bottom-content">
        <div class="footer-copyright">
            <p class="copyright-text">
                <?php
                printf(
                    esc_html__( '© %1$s CETESI - Todos os direitos reservados.', 'cetesi' ),
                    date( 'Y' )
                );
                ?>
            </p>
            <p class="cnpj-text">CNPJ: 00.000.000/0001-00</p>
        </div>
        
        <div class="footer-certifications">
            <?php get_template_part('template-parts/footer/footer-certifications'); ?>
        </div>
    </div>
</div>
