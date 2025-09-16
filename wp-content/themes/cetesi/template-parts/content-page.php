<?php
/**
 * Template part para exibir conteúdo de páginas
 *
 * @package Cetesi
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post page-post' ); ?>>
    
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        
        <?php if ( ! is_front_page() ) : ?>
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
            </div>
        <?php endif; ?>
    </header>

    <?php if ( has_post_thumbnail() && ! is_front_page() ) : ?>
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

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                        __( 'Editar <span class="screen-reader-text">%s</span>', 'cetesi' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer>
    <?php endif; ?>
    
</article>
