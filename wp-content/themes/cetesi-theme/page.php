<?php
/**
 * Template para páginas
 * 
 * @package CETESI
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main page">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Breadcrumbs -->
            <div class="container">
                <?php cetesi_breadcrumbs(); ?>
            </div>
            
            <!-- Hero da Página -->
            <section class="page-hero">
                <div class="container">
                    <div class="page-hero-content">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <?php if (get_the_excerpt()) : ?>
                        <p class="page-excerpt"><?php the_excerpt(); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <!-- Conteúdo da Página -->
            <section class="page-content">
                <div class="container">
                    <div class="content-wrapper">
                        <div class="main-content">
                            <?php if (has_post_thumbnail()) : ?>
                            <div class="page-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                            <?php endif; ?>
                            
                            <div class="page-text">
                                <?php the_content(); ?>
                            </div>
                            
                            <?php
                            // Paginação para páginas com <!--nextpage-->
                            wp_link_pages(array(
                                'before' => '<div class="page-links">',
                                'after'  => '</div>',
                                'link_before' => '<span class="page-number">',
                                'link_after'  => '</span>',
                            ));
                            ?>
                        </div>
                        
                        <?php if (is_active_sidebar('sidebar-1')) : ?>
                        <aside class="sidebar">
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </aside>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </article>
    <?php endwhile; ?>
    </main>

<!-- CSS das páginas movido para assets/css/page.css -->

<?php get_footer(); ?>


