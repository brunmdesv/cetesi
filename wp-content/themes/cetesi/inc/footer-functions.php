<?php
/**
 * Funções específicas do Footer
 *
 * Este arquivo contém todas as funções relacionadas ao footer do tema CETESI.
 * Mantém a separação completa entre funcionalidades do footer e outras partes do site.
 *
 * @package Cetesi
 * @since 1.0.0
 */

// Previne acesso direto
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Configurações específicas do footer
 */
function cetesi_footer_setup() {
    // Registro de menus específicos do footer
    register_nav_menus( array(
        'rodape'    => esc_html__( 'Menu do Rodapé', 'cetesi' ),
        'footer-social' => esc_html__( 'Redes Sociais do Rodapé', 'cetesi' ),
    ) );

    // Registro de áreas de widgets específicas do footer
    register_sidebar( array(
        'name'          => esc_html__( 'Rodapé - Coluna 1', 'cetesi' ),
        'id'            => 'footer-col-1',
        'description'   => esc_html__( 'Primeira coluna do rodapé.', 'cetesi' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Rodapé - Coluna 2', 'cetesi' ),
        'id'            => 'footer-col-2',
        'description'   => esc_html__( 'Segunda coluna do rodapé.', 'cetesi' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Rodapé - Coluna 3', 'cetesi' ),
        'id'            => 'footer-col-3',
        'description'   => esc_html__( 'Terceira coluna do rodapé.', 'cetesi' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Rodapé - Coluna 4', 'cetesi' ),
        'id'            => 'footer-col-4',
        'description'   => esc_html__( 'Quarta coluna do rodapé.', 'cetesi' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'after_setup_theme', 'cetesi_footer_setup' );

/**
 * Enfileiramento de scripts e estilos específicos do footer
 */
function cetesi_footer_scripts() {
    // CSS do footer (sempre carregado)
    wp_enqueue_style( 'cetesi-footer', CETESI_ASSETS_URL . '/css/footer.css', array( 'font-awesome' ), CETESI_VERSION );
    
    // JavaScript do footer (sempre carregado)
    wp_enqueue_script( 'cetesi-footer', CETESI_ASSETS_URL . '/js/footer.js', array( 'jquery' ), CETESI_VERSION, true );
    
    // Localização para JavaScript do footer
    wp_localize_script( 'cetesi-footer', 'cetesi_footer_ajax', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'cetesi_footer_nonce' ),
        'strings'  => array(
            'scroll_top' => esc_html__( 'Voltar ao topo', 'cetesi' ),
            'loading'    => esc_html__( 'Carregando...', 'cetesi' ),
        ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'cetesi_footer_scripts' );

/**
 * Adiciona classes específicas do footer ao body
 */
function cetesi_footer_body_classes( $classes ) {
    // Adiciona classe se há widgets no footer
    if ( is_active_sidebar( 'footer-col-1' ) || is_active_sidebar( 'footer-col-2' ) || 
         is_active_sidebar( 'footer-col-3' ) || is_active_sidebar( 'footer-col-4' ) ) {
        $classes[] = 'has-footer-widgets';
    }
    
    return $classes;
}
add_filter( 'body_class', 'cetesi_footer_body_classes' );

/**
 * Exibe informações de contato do footer
 */
function cetesi_footer_contact_info() {
    $phone = get_theme_mod( 'cetesi_footer_phone', '(61) 3351-4511' );
    $email = get_theme_mod( 'cetesi_footer_email', 'contato@cetesi.com.br' );
    $address = get_theme_mod( 'cetesi_footer_address', 'Ceilândia, Brasília - DF' );
    
    if ( $phone || $email || $address ) {
        ?>
        <div class="footer-contact-info">
            <?php if ( $phone ) : ?>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <a href="tel:<?php echo esc_attr( str_replace( array( '(', ')', ' ', '-' ), '', $phone ) ); ?>">
                        <?php echo esc_html( $phone ); ?>
                    </a>
                </div>
            <?php endif; ?>
            
            <?php if ( $email ) : ?>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:<?php echo esc_attr( $email ); ?>">
                        <?php echo esc_html( $email ); ?>
                    </a>
                </div>
            <?php endif; ?>
            
            <?php if ( $address ) : ?>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span><?php echo esc_html( $address ); ?></span>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}

/**
 * Exibe redes sociais do footer
 */
function cetesi_footer_social_links() {
    $social_networks = array(
        'facebook'  => array( 'label' => 'Facebook', 'icon' => 'fab fa-facebook-f' ),
        'instagram' => array( 'label' => 'Instagram', 'icon' => 'fab fa-instagram' ),
        'linkedin'  => array( 'label' => 'LinkedIn', 'icon' => 'fab fa-linkedin-in' ),
        'youtube'   => array( 'label' => 'YouTube', 'icon' => 'fab fa-youtube' ),
        'whatsapp'  => array( 'label' => 'WhatsApp', 'icon' => 'fab fa-whatsapp' ),
    );
    
    $has_social = false;
    foreach ( $social_networks as $network => $data ) {
        $url = get_theme_mod( 'cetesi_footer_social_' . $network, '' );
        if ( $url ) {
            $has_social = true;
            break;
        }
    }
    
    if ( $has_social ) {
        ?>
        <div class="footer-social-links">
            <h4 class="social-title"><?php esc_html_e( 'Siga-nos', 'cetesi' ); ?></h4>
            <div class="social-icons">
                <?php foreach ( $social_networks as $network => $data ) : ?>
                    <?php $url = get_theme_mod( 'cetesi_footer_social_' . $network, '' ); ?>
                    <?php if ( $url ) : ?>
                        <a href="<?php echo esc_url( $url ); ?>" 
                           class="social-link social-<?php echo esc_attr( $network ); ?>" 
                           target="_blank" 
                           rel="noopener" 
                           aria-label="<?php echo esc_attr( $data['label'] ); ?>">
                            <i class="<?php echo esc_attr( $data['icon'] ); ?>"></i>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

/**
 * Exibe horário de funcionamento
 */
function cetesi_footer_business_hours() {
    $hours = get_theme_mod( 'cetesi_footer_hours', 'Segunda a Sexta: 8h às 18h' );
    
    if ( $hours ) {
        ?>
        <div class="footer-business-hours">
            <h4 class="hours-title"><?php esc_html_e( 'Horário de Funcionamento', 'cetesi' ); ?></h4>
            <p class="hours-text"><?php echo esc_html( $hours ); ?></p>
        </div>
        <?php
    }
}

/**
 * Exibe newsletter do footer
 */
function cetesi_footer_newsletter() {
    $newsletter_title = get_theme_mod( 'cetesi_footer_newsletter_title', 'Receba nossas novidades' );
    $newsletter_text = get_theme_mod( 'cetesi_footer_newsletter_text', 'Cadastre-se e receba informações sobre nossos cursos.' );
    
    if ( $newsletter_title ) {
        ?>
        <div class="footer-newsletter">
            <h4 class="newsletter-title"><?php echo esc_html( $newsletter_title ); ?></h4>
            <?php if ( $newsletter_text ) : ?>
                <p class="newsletter-text"><?php echo esc_html( $newsletter_text ); ?></p>
            <?php endif; ?>
            
            <form class="newsletter-form" action="#" method="post">
                <div class="newsletter-input-group">
                    <input type="email" 
                           name="newsletter_email" 
                           placeholder="<?php esc_attr_e( 'Seu e-mail', 'cetesi' ); ?>" 
                           required>
                    <button type="submit" class="newsletter-btn">
                        <i class="fas fa-paper-plane"></i>
                        <span class="screen-reader-text"><?php esc_html_e( 'Inscrever-se', 'cetesi' ); ?></span>
                    </button>
                </div>
                <p class="newsletter-privacy">
                    <?php esc_html_e( 'Não compartilhamos seus dados. Veja nossa', 'cetesi' ); ?>
                    <a href="<?php echo esc_url( home_url( '/politica-de-privacidade/' ) ); ?>">
                        <?php esc_html_e( 'Política de Privacidade', 'cetesi' ); ?>
                    </a>
                </p>
            </form>
        </div>
        <?php
    }
}

/**
 * Exibe links rápidos do footer
 */
function cetesi_footer_quick_links() {
    $quick_links = array(
        array( 'title' => 'Cursos', 'url' => home_url( '/cursos/' ) ),
        array( 'title' => 'Sobre', 'url' => home_url( '/sobre/' ) ),
        array( 'title' => 'Contato', 'url' => home_url( '/contato/' ) ),
        array( 'title' => 'Blog', 'url' => home_url( '/blog/' ) ),
        array( 'title' => 'FAQ', 'url' => home_url( '/faq/' ) ),
    );
    
    ?>
    <div class="footer-quick-links">
        <h4 class="quick-links-title"><?php esc_html_e( 'Links Rápidos', 'cetesi' ); ?></h4>
        <ul class="quick-links-list">
            <?php foreach ( $quick_links as $link ) : ?>
                <li>
                    <a href="<?php echo esc_url( $link['url'] ); ?>">
                        <?php echo esc_html( $link['title'] ); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
}

/**
 * Exibe informações de copyright
 */
function cetesi_footer_copyright() {
    $copyright_text = get_theme_mod( 'cetesi_footer_copyright', '' );
    
    if ( ! $copyright_text ) {
        $copyright_text = sprintf(
            esc_html__( '&copy; %1$s %2$s. Todos os direitos reservados.', 'cetesi' ),
            date( 'Y' ),
            get_bloginfo( 'name' )
        );
    }
    
    ?>
    <div class="footer-copyright">
        <p><?php echo wp_kses_post( $copyright_text ); ?></p>
        <p class="footer-powered">
            <?php
            printf(
                esc_html__( 'Desenvolvido com %s', 'cetesi' ),
                '<a href="https://wordpress.org/" target="_blank" rel="noopener">WordPress</a>'
            );
            ?>
        </p>
    </div>
    <?php
}

/**
 * Exibe links legais do footer
 */
function cetesi_footer_legal_links() {
    $legal_links = array(
        array( 'title' => 'Política de Privacidade', 'url' => home_url( '/politica-de-privacidade/' ) ),
        array( 'title' => 'Termos de Uso', 'url' => home_url( '/termos-de-uso/' ) ),
        array( 'title' => 'Política de Cookies', 'url' => home_url( '/politica-de-cookies/' ) ),
    );
    
    ?>
    <div class="footer-legal-links">
        <?php foreach ( $legal_links as $index => $link ) : ?>
            <a href="<?php echo esc_url( $link['url'] ); ?>">
                <?php echo esc_html( $link['title'] ); ?>
            </a>
            <?php if ( $index < count( $legal_links ) - 1 ) : ?>
                <span class="separator">|</span>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php
}

/**
 * Botão de voltar ao topo
 */
function cetesi_back_to_top_button() {
    ?>
    <button id="back-to-top" class="back-to-top-btn" aria-label="<?php esc_attr_e( 'Voltar ao topo', 'cetesi' ); ?>">
        <i class="fas fa-chevron-up"></i>
    </button>
    <?php
}

/**
 * Configurações padrão do footer na ativação do tema
 */
function cetesi_footer_theme_activation() {
    // Define opções padrão do footer
    set_theme_mod( 'cetesi_footer_phone', '(61) 3351-4511' );
    set_theme_mod( 'cetesi_footer_email', 'contato@cetesi.com.br' );
    set_theme_mod( 'cetesi_footer_address', 'Ceilândia, Brasília - DF' );
    set_theme_mod( 'cetesi_footer_hours', 'Segunda a Sexta: 8h às 18h' );
    set_theme_mod( 'cetesi_footer_newsletter_title', 'Receba nossas novidades' );
    set_theme_mod( 'cetesi_footer_newsletter_text', 'Cadastre-se e receba informações sobre nossos cursos.' );
}
add_action( 'after_switch_theme', 'cetesi_footer_theme_activation' );
