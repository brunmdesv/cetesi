<?php
/**
 * Template part para exibir conteúdo de posts
 *
 * @package Cetesi
 * @since 1.0.0
 */

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
