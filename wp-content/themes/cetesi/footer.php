<?php
/**
 * Rodapé do tema Cetesi
 *
 * @package Cetesi
 * @since 1.0.0
 */

?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
            <div class="footer-content">
                
                <div class="footer-info">
                    <p>
                        <?php
                        printf(
                            esc_html__( '&copy; %1$s %2$s. Todos os direitos reservados.', 'cetesi' ),
                            date( 'Y' ),
                            get_bloginfo( 'name' )
                        );
                        ?>
                    </p>
                    <p>
                        <?php esc_html_e( 'Escola de Cursos Profissionais', 'cetesi' ); ?>
                    </p>
                    <p>
                        <?php
                        printf(
                            esc_html__( 'Desenvolvido com %s', 'cetesi' ),
                            '<a href="https://wordpress.org/" target="_blank" rel="noopener">WordPress</a>'
                        );
                        ?>
                    </p>
                </div>

                <?php
                // Menu do rodapé
                if ( has_nav_menu( 'rodape' ) ) :
                    ?>
                    <nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Menu do Rodapé', 'cetesi' ); ?>">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'rodape',
                            'menu_class'     => 'footer-links',
                            'container'      => false,
                            'depth'          => 1,
                        ) );
                        ?>
                    </nav>
                    <?php
                endif;
                ?>

            </div>

            <?php
            // Widgets do rodapé
            if ( is_active_sidebar( 'sidebar-rodape' ) ) :
                ?>
                <div class="footer-widgets">
                    <div class="row">
                        <div class="col">
                            <?php dynamic_sidebar( 'sidebar-rodape' ); ?>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            ?>

            <div class="footer-bottom">
                <div class="row">
                    <div class="col">
                        <p class="footer-credits">
                            <?php
                            printf(
                                esc_html__( 'Tema %s por %s', 'cetesi' ),
                                '<strong>Cetesi</strong>',
                                '<a href="#" target="_blank" rel="noopener">CETESI Development Team</a>'
                            );
                            ?>
                        </p>
                    </div>
                    <div class="col text-right">
                        <p class="footer-links">
                            <a href="<?php echo esc_url( home_url( '/politica-de-privacidade/' ) ); ?>">
                                <?php esc_html_e( 'Política de Privacidade', 'cetesi' ); ?>
                            </a>
                            <span class="separator">|</span>
                            <a href="<?php echo esc_url( home_url( '/termos-de-uso/' ) ); ?>">
                                <?php esc_html_e( 'Termos de Uso', 'cetesi' ); ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
