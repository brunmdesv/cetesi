<?php
/**
 * Funções de template do tema Cetesi
 *
 * @package Cetesi
 * @since 1.0.0
 */

// Previne acesso direto
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Menu de fallback
 */
function cetesi_fallback_menu() {
    echo '<ul class="menu">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Início', 'cetesi' ) . '</a></li>';
    
    // Páginas principais
    $pages = get_pages( array(
        'sort_column' => 'menu_order',
        'number'      => 5,
    ) );
    
    foreach ( $pages as $page ) {
        echo '<li><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( $page->post_title ) . '</a></li>';
    }
    
    echo '</ul>';
}

/**
 * Exibe informações do post
 */
function cetesi_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );

    $posted_on = sprintf(
        esc_html_x( 'Publicado em %s', 'post date', 'cetesi' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    $byline = sprintf(
        esc_html_x( 'por %s', 'post author', 'cetesi' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
}

/**
 * Exibe categorias do post
 */
function cetesi_posted_in() {
    if ( 'post' === get_post_type() ) {
        $categories_list = get_the_category_list( esc_html__( ', ', 'cetesi' ) );
        if ( $categories_list ) {
            printf(
                '<span class="cat-links">' . esc_html__( 'Categorizado em %1$s', 'cetesi' ) . '</span>',
                $categories_list
            );
        }

        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'cetesi' ) );
        if ( $tags_list ) {
            printf(
                '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'cetesi' ) . '</span>',
                $tags_list
            );
        }
    }
}

/**
 * Exibe informações do autor
 */
function cetesi_author_info() {
    if ( is_single() && get_the_author_meta( 'description' ) ) {
        ?>
        <div class="author-info">
            <div class="author-avatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
            </div>
            <div class="author-description">
                <h3 class="author-title">
                    <?php
                    printf(
                        esc_html__( 'Sobre %s', 'cetesi' ),
                        get_the_author()
                    );
                    ?>
                </h3>
                <p class="author-bio">
                    <?php the_author_meta( 'description' ); ?>
                </p>
                <div class="author-links">
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author-link">
                        <?php esc_html_e( 'Ver todos os posts', 'cetesi' ); ?>
                    </a>
                </div>
            </div>
        </div>
        <?php
    }
}

/**
 * Exibe posts relacionados
 */
function cetesi_related_posts() {
    if ( is_single() ) {
        $categories = get_the_category();
        if ( $categories ) {
            $category_ids = array();
            foreach ( $categories as $category ) {
                $category_ids[] = $category->term_id;
            }

            $related_posts = get_posts( array(
                'category__in' => $category_ids,
                'post__not_in' => array( get_the_ID() ),
                'posts_per_page' => 3,
                'orderby' => 'rand',
            ) );

            if ( $related_posts ) {
                ?>
                <div class="related-posts">
                    <h3><?php esc_html_e( 'Posts Relacionados', 'cetesi' ); ?></h3>
                    <div class="related-posts-grid">
                        <?php foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
                            <div class="related-post">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="related-post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail( 'cetesi-thumbnail' ); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="related-post-content">
                                    <h4 class="related-post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <div class="related-post-meta">
                                        <span class="related-post-date"><?php echo esc_html( get_the_date() ); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php
            }
        }
    }
}

/**
 * Exibe breadcrumbs
 */
function cetesi_breadcrumbs() {
    if ( ! is_home() && ! is_front_page() ) {
        ?>
        <nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Navegação estrutural', 'cetesi' ); ?>">
            <ol class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php esc_html_e( 'Início', 'cetesi' ); ?>
                    </a>
                </li>
                
                <?php if ( is_category() || is_single() ) : ?>
                    <li class="breadcrumb-item">
                        <?php
                        $category = get_the_category();
                        if ( $category ) {
                            echo '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . esc_html( $category[0]->name ) . '</a>';
                        }
                        ?>
                    </li>
                <?php elseif ( is_page() ) : ?>
                    <?php
                    $parent_id = wp_get_post_parent_id( get_the_ID() );
                    if ( $parent_id ) {
                        $breadcrumbs = array();
                        while ( $parent_id ) {
                            $page = get_page( $parent_id );
                            $breadcrumbs[] = '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( $page->post_title ) . '</a></li>';
                            $parent_id = $page->post_parent;
                        }
                        $breadcrumbs = array_reverse( $breadcrumbs );
                        foreach ( $breadcrumbs as $crumb ) {
                            echo $crumb;
                        }
                    }
                    ?>
                <?php endif; ?>
                
                <li class="breadcrumb-item active" aria-current="page">
                    <?php
                    if ( is_category() ) {
                        single_cat_title();
                    } elseif ( is_single() ) {
                        the_title();
                    } elseif ( is_page() ) {
                        the_title();
                    } elseif ( is_search() ) {
                        printf( esc_html__( 'Resultados para: %s', 'cetesi' ), get_search_query() );
                    } elseif ( is_404() ) {
                        esc_html_e( 'Página não encontrada', 'cetesi' );
                    }
                    ?>
                </li>
            </ol>
        </nav>
        <?php
    }
}

/**
 * Exibe formulário de busca personalizado
 */
function cetesi_search_form() {
    ?>
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label class="screen-reader-text" for="search-field">
            <?php esc_html_e( 'Buscar por:', 'cetesi' ); ?>
        </label>
        <div class="search-form-wrapper">
            <input type="search" id="search-field" class="search-field form-control" placeholder="<?php esc_attr_e( 'Digite sua busca...', 'cetesi' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="search-submit btn btn-primary">
                <span class="screen-reader-text"><?php esc_html_e( 'Buscar', 'cetesi' ); ?></span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
            </button>
        </div>
    </form>
    <?php
}

/**
 * Exibe paginação personalizada
 */
function cetesi_pagination() {
    global $wp_query;
    
    $big = 999999999;
    $pagination = paginate_links( array(
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => '?paged=%#%',
        'current'   => max( 1, get_query_var( 'paged' ) ),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
        'prev_text' => esc_html__( 'Anterior', 'cetesi' ),
        'next_text' => esc_html__( 'Próximo', 'cetesi' ),
    ) );
    
    if ( $pagination ) {
        echo '<nav class="pagination-wrapper" aria-label="' . esc_attr__( 'Navegação de páginas', 'cetesi' ) . '">';
        echo '<ul class="pagination">';
        
        foreach ( $pagination as $page ) {
            if ( strpos( $page, 'current' ) !== false ) {
                echo '<li class="page-item active">' . $page . '</li>';
            } else {
                echo '<li class="page-item">' . $page . '</li>';
            }
        }
        
        echo '</ul>';
        echo '</nav>';
    }
}

/**
 * Exibe informações de contato
 */
function cetesi_contact_info() {
    $phone = get_theme_mod( 'cetesi_contact_phone', '' );
    $email = get_theme_mod( 'cetesi_contact_email', '' );
    $address = get_theme_mod( 'cetesi_contact_address', '' );
    
    if ( $phone || $email || $address ) {
        ?>
        <div class="contact-info">
            <?php if ( $phone ) : ?>
                <div class="contact-item">
                    <strong><?php esc_html_e( 'Telefone:', 'cetesi' ); ?></strong>
                    <a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
                </div>
            <?php endif; ?>
            
            <?php if ( $email ) : ?>
                <div class="contact-item">
                    <strong><?php esc_html_e( 'Email:', 'cetesi' ); ?></strong>
                    <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                </div>
            <?php endif; ?>
            
            <?php if ( $address ) : ?>
                <div class="contact-item">
                    <strong><?php esc_html_e( 'Endereço:', 'cetesi' ); ?></strong>
                    <span><?php echo esc_html( $address ); ?></span>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}

/**
 * Exibe redes sociais
 */
function cetesi_social_links() {
    $social_networks = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter',
        'instagram' => 'Instagram',
        'linkedin'  => 'LinkedIn',
        'youtube'   => 'YouTube',
    );
    
    $has_social = false;
    foreach ( $social_networks as $network => $label ) {
        $url = get_theme_mod( 'cetesi_social_' . $network, '' );
        if ( $url ) {
            $has_social = true;
            break;
        }
    }
    
    if ( $has_social ) {
        ?>
        <div class="social-links">
            <?php foreach ( $social_networks as $network => $label ) : ?>
                <?php $url = get_theme_mod( 'cetesi_social_' . $network, '' ); ?>
                <?php if ( $url ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" class="social-link social-<?php echo esc_attr( $network ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( $label ); ?>">
                        <span class="screen-reader-text"><?php echo esc_html( $label ); ?></span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <?php cetesi_social_icon( $network ); ?>
                        </svg>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php
    }
}

/**
 * Ícones SVG para redes sociais
 */
function cetesi_social_icon( $network ) {
    switch ( $network ) {
        case 'facebook':
            echo '<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>';
            break;
        case 'twitter':
            echo '<path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>';
            break;
        case 'instagram':
            echo '<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>';
            break;
        case 'linkedin':
            echo '<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>';
            break;
        case 'youtube':
            echo '<path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>';
            break;
    }
}
