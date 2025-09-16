<?php
/**
 * Template para arquivos (categorias, tags, etc.)
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
                        <h1 class="page-title"><?php the_archive_title(); ?></h1>
                        <?php if ( get_the_archive_description() ) : ?>
                            <div class="archive-description">
                                <?php the_archive_description(); ?>
                            </div>
                        <?php endif; ?>
                    </header>

                    <div class="posts-container">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            ?>
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
                                
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail( 'cetesi-thumbnail', array( 'class' => 'post-thumbnail' ) ); ?>
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
                                        </div>
                                    </header>

                                    <div class="entry-summary">
                                        <?php the_excerpt(); ?>
                                        
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
                                <?php esc_html_e( 'Nada encontrado neste arquivo', 'cetesi' ); ?>
                            </h1>
                        </header>

                        <div class="page-content">
                            <p><?php esc_html_e( 'Parece que não há conteúdo neste arquivo. Talvez uma busca ajude?', 'cetesi' ); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    </section>
                    
                <?php endif; ?>
                
            </div>
            
            <?php get_sidebar(); ?>
            
        </div>
    </div>
</main>

<?php get_footer(); ?>
