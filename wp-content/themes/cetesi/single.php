<?php
/**
 * Template para posts individuais
 *
 * @package Cetesi
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <div class="row">
            <div class="col content-area">
                
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'post single-post' ); ?>>
                        
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                            
                            <div class="entry-meta">
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
                        </header>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php
                            the_content( sprintf(
                                wp_kses(
                                    __( 'Continue lendo %s <span class="meta-nav">&rarr;</span>', 'cetesi' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                            ) );

                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Páginas:', 'cetesi' ),
                                'after'  => '</div>',
                            ) );
                            ?>
                        </div>

                        <footer class="entry-footer">
                            <?php
                            // Compartilhamento social (pode ser implementado com plugins)
                            if ( function_exists( 'sharing_display' ) ) {
                                sharing_display( '', true );
                            }
                            ?>
                            
                            <?php if ( function_exists( 'wp_related_posts' ) ) : ?>
                                <div class="related-posts">
                                    <?php wp_related_posts(); ?>
                                </div>
                            <?php endif; ?>
                        </footer>
                        
                    </article>

                    <?php
                    // Navegação entre posts
                    the_post_navigation( array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Anterior:', 'cetesi' ) . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Próximo:', 'cetesi' ) . '</span> <span class="nav-title">%title</span>',
                    ) );
                    ?>

                    <?php
                    // Comentários
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; ?>
                
            </div>
            
            <?php get_sidebar(); ?>
            
        </div>
    </div>
</main>

<?php get_footer(); ?>
