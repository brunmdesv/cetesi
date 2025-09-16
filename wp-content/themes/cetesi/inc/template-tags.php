<?php
/**
 * Tags de template do tema Cetesi
 *
 * @package Cetesi
 * @since 1.0.0
 */

// Previne acesso direto
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Exibe o título da página
 */
function cetesi_page_title() {
    if ( is_home() ) {
        if ( is_front_page() ) {
            echo esc_html( get_bloginfo( 'name' ) );
        } else {
            echo esc_html( get_the_title( get_option( 'page_for_posts', true ) ) );
        }
    } elseif ( is_archive() ) {
        the_archive_title();
    } elseif ( is_search() ) {
        printf( esc_html__( 'Resultados para: %s', 'cetesi' ), get_search_query() );
    } elseif ( is_404() ) {
        esc_html_e( 'Página não encontrada', 'cetesi' );
    } else {
        the_title();
    }
}

/**
 * Exibe a descrição da página
 */
function cetesi_page_description() {
    if ( is_home() ) {
        if ( is_front_page() ) {
            $description = get_bloginfo( 'description' );
            if ( $description ) {
                echo '<p class="page-description">' . esc_html( $description ) . '</p>';
            }
        }
    } elseif ( is_archive() ) {
        $description = get_the_archive_description();
        if ( $description ) {
            echo '<div class="archive-description">' . $description . '</div>';
        }
    }
}

/**
 * Exibe o logo do site
 */
function cetesi_logo() {
    if ( has_custom_logo() ) {
        the_custom_logo();
    } else {
        ?>
        <div class="site-branding">
            <?php if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h1>
            <?php else : ?>
                <p class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </p>
            <?php endif; ?>
            
            <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo $description; ?></p>
                <?php
            endif;
            ?>
        </div>
        <?php
    }
}

/**
 * Exibe o menu principal
 */
function cetesi_primary_menu() {
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'menu_id'        => 'primary-menu',
        'menu_class'     => 'menu',
        'container'      => false,
        'fallback_cb'    => 'cetesi_fallback_menu',
    ) );
}

/**
 * Exibe o menu do rodapé
 */
function cetesi_footer_menu() {
    if ( has_nav_menu( 'footer' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'footer',
            'menu_class'     => 'footer-links',
            'container'      => false,
            'depth'          => 1,
        ) );
    }
}

/**
 * Exibe a sidebar
 */
function cetesi_sidebar() {
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        ?>
        <aside id="secondary" class="widget-area sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar Principal', 'cetesi' ); ?>">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </aside>
        <?php
    }
}

/**
 * Exibe a sidebar do rodapé
 */
function cetesi_footer_sidebar() {
    if ( is_active_sidebar( 'footer-1' ) ) {
        ?>
        <div class="footer-widgets">
            <div class="row">
                <div class="col">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>
            </div>
        </div>
        <?php
    }
}

/**
 * Exibe informações de copyright
 */
function cetesi_copyright() {
    ?>
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
 * Exibe links do rodapé
 */
function cetesi_footer_links() {
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
    <?php
}

/**
 * Exibe o botão de menu mobile
 */
function cetesi_mobile_menu_toggle() {
    ?>
    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <span class="screen-reader-text"><?php esc_html_e( 'Menu Principal', 'cetesi' ); ?></span>
        <span class="menu-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </button>
    <?php
}

/**
 * Exibe o link de pular para conteúdo
 */
function cetesi_skip_link() {
    ?>
    <a class="skip-link screen-reader-text" href="#main">
        <?php esc_html_e( 'Pular para o conteúdo', 'cetesi' ); ?>
    </a>
    <?php
}

/**
 * Exibe a imagem de cabeçalho
 */
function cetesi_header_image() {
    if ( get_header_image() ) {
        ?>
        <div class="header-image">
            <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        </div>
        <?php
    }
}



/**
 * Exibe informações do post
 */
function cetesi_post_meta() {
    ?>
    <div class="post-meta">
        <span class="posted-on">
            <time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                <?php echo esc_html( get_the_date() ); ?>
            </time>
            <?php if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) : ?>
                <time class="updated" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">
                    <?php echo esc_html( get_the_modified_date() ); ?>
                </time>
            <?php endif; ?>
        </span>
        
        <span class="byline">
            <?php
            printf(
                esc_html__( 'por %s', 'cetesi' ),
                '<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
            );
            ?>
        </span>
        
        <?php if ( has_category() ) : ?>
            <span class="cat-links">
                <?php
                printf(
                    esc_html__( 'em %s', 'cetesi' ),
                    get_the_category_list( ', ' )
                );
                ?>
            </span>
        <?php endif; ?>
        
        <?php if ( has_tag() ) : ?>
            <span class="tags-links">
                <?php
                printf(
                    esc_html__( 'Tags: %s', 'cetesi' ),
                    get_the_tag_list( '', ', ' )
                );
                ?>
            </span>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Exibe o link "Leia mais"
 */
function cetesi_read_more_link() {
    ?>
    <a href="<?php the_permalink(); ?>" class="read-more">
        <?php esc_html_e( 'Leia mais', 'cetesi' ); ?>
        <span class="screen-reader-text">
            <?php
            printf(
                esc_html__( 'sobre %s', 'cetesi' ),
                get_the_title()
            );
            ?>
        </span>
    </a>
    <?php
}

/**
 * Exibe navegação entre posts
 */
function cetesi_post_navigation() {
    the_post_navigation( array(
        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Anterior:', 'cetesi' ) . '</span> <span class="nav-title">%title</span>',
        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Próximo:', 'cetesi' ) . '</span> <span class="nav-title">%title</span>',
    ) );
}

/**
 * Exibe paginação de posts
 */
function cetesi_posts_pagination() {
    the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => esc_html__( 'Anterior', 'cetesi' ),
        'next_text' => esc_html__( 'Próximo', 'cetesi' ),
    ) );
}