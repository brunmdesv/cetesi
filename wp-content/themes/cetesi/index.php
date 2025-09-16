<?php
/**
 * Template principal do tema Cetesi
 * 
 * Este é o template de fallback que será usado quando nenhum template
 * mais específico estiver disponível.
 *
 * @package Cetesi
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <div class="row">
            <div class="col content-area">
                
                <?php if ( have_posts() ) : ?>
                    
                    <header class="page-header">
                        <?php if ( is_home() && ! is_front_page() ) : ?>
                            <h1 class="page-title"><?php single_post_title(); ?></h1>
                        <?php elseif ( is_search() ) : ?>
                            <h1 class="page-title">
                                <?php
                                printf(
                                    esc_html__( 'Resultados da busca por: %s', 'cetesi' ),
                                    '<span>' . get_search_query() . '</span>'
                                );
                                ?>
                            </h1>
                        <?php elseif ( is_archive() ) : ?>
                            <h1 class="page-title"><?php the_archive_title(); ?></h1>
                            <?php if ( get_the_archive_description() ) : ?>
                                <div class="archive-description">
                                    <?php the_archive_description(); ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </header>

                    <div class="posts-container">
                        <?php
                        // Início do loop
                        while ( have_posts() ) :
                            the_post();
                            ?>
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
                                
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail( 'large', array( 'class' => 'post-thumbnail' ) ); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="post-content">
                                    <header class="entry-header">
                                        <h2 class="post-title">
                                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        
                                        <div class="post-meta">
                                            <span class="posted-on">
                                                <time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                                    <?php echo esc_html( get_the_date() ); ?>
                                                </time>
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
                                        </div>
                                    </header>

                                    <div class="entry-summary">
                                        <?php
                                        if ( is_search() ) {
                                            the_excerpt();
                                        } else {
                                            the_excerpt();
                                        }
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
                                    </div>
                                </div>
                            </article>
                            
                            <?php
                        endwhile;
                        ?>
                    </div>

                    <?php
                    // Paginação
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => esc_html__( 'Anterior', 'cetesi' ),
                        'next_text' => esc_html__( 'Próximo', 'cetesi' ),
                    ) );
                    ?>

                <?php else : ?>
                    
                    <section class="no-results not-found">
                        <header class="page-header">
                            <h1 class="page-title">
                                <?php
                                if ( is_search() ) {
                                    esc_html_e( 'Nenhum resultado encontrado', 'cetesi' );
                                } else {
                                    esc_html_e( 'Nada encontrado', 'cetesi' );
                                }
                                ?>
                            </h1>
                        </header>

                        <div class="page-content">
                            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
                                
                                <p>
                                    <?php
                                    printf(
                                        wp_kses(
                                            __( 'Pronto para publicar seu primeiro post? <a href="%1$s">Comece aqui</a>.', 'cetesi' ),
                                            array(
                                                'a' => array(
                                                    'href' => array(),
                                                ),
                                            )
                                        ),
                                        esc_url( admin_url( 'post-new.php' ) )
                                    );
                                    ?>
                                </p>
                                
                            <?php elseif ( is_search() ) : ?>
                                
                                <p><?php esc_html_e( 'Desculpe, mas nada foi encontrado com os termos de busca. Tente novamente com palavras-chave diferentes.', 'cetesi' ); ?></p>
                                <?php get_search_form(); ?>
                                
                            <?php else : ?>
                                
                                <p><?php esc_html_e( 'Parece que não conseguimos encontrar o que você está procurando. Talvez uma busca ajude?', 'cetesi' ); ?></p>
                                <?php get_search_form(); ?>
                                
                            <?php endif; ?>
                        </div>
                    </section>
                    
                <?php endif; ?>
                
            </div>
            
            <?php get_sidebar(); ?>
            
        </div>
    </div>
</main>

<?php get_footer(); ?>
