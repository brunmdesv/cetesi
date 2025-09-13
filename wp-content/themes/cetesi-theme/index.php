<?php
/**
 * Template principal do tema CETESI
 * 
 * @package CETESI
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php if (have_posts()) : ?>
        <div class="container">
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <header class="post-header">
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                
                                <div class="post-meta">
                                    <span class="post-date">
                                        <i class="fas fa-calendar"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    
                                    <span class="post-author">
                                        <i class="fas fa-user"></i>
                                        <?php the_author(); ?>
                                    </span>
                                </div>
                            </header>
                            
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <footer class="post-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    Ler mais <i class="fas fa-arrow-right"></i>
                                </a>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php
            // Paginação
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => '<i class="fas fa-chevron-left"></i> Anterior',
                'next_text' => 'Próximo <i class="fas fa-chevron-right"></i>',
            ));
            ?>
        </div>
    <?php else : ?>
        <div class="container">
            <div class="no-posts">
                <h2>Nenhum post encontrado</h2>
                <p>Desculpe, mas não encontramos nenhum post. Tente novamente mais tarde.</p>
            </div>
        </div>
    <?php endif; ?>
</main>

<style>
.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-2xl);
    margin: var(--space-2xl) 0;
}

.post-card {
    background: white;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    transition: all 0.3s ease;
}

.post-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}

.post-thumbnail {
    height: 200px;
    overflow: hidden;
}

.post-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.post-card:hover .post-thumbnail img {
    transform: scale(1.05);
}

.post-content {
    padding: var(--space-xl);
}

.post-title {
    font-family: var(--font-heading);
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: var(--space-md);
    line-height: 1.3;
}

.post-title a {
    color: var(--gray-800);
    text-decoration: none;
    transition: color 0.3s ease;
}

.post-title a:hover {
    color: var(--primary-color);
}

.post-meta {
    display: flex;
    gap: var(--space-lg);
    margin-bottom: var(--space-md);
    font-size: 0.9rem;
    color: var(--gray-500);
}

.post-meta i {
    margin-right: var(--space-xs);
    color: var(--primary-color);
}

.post-excerpt {
    color: var(--gray-600);
    line-height: 1.6;
    margin-bottom: var(--space-lg);
}

.read-more {
    display: inline-flex;
    align-items: center;
    gap: var(--space-xs);
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.read-more:hover {
    color: var(--secondary-color);
    transform: translateX(4px);
}

.no-posts {
    text-align: center;
    padding: var(--space-4xl) 0;
}

.no-posts h2 {
    font-family: var(--font-heading);
    font-size: 2rem;
    color: var(--gray-800);
    margin-bottom: var(--space-md);
}

.no-posts p {
    color: var(--gray-600);
    font-size: 1.1rem;
}

/* Paginação */
.pagination {
    display: flex;
    justify-content: center;
    gap: var(--space-sm);
    margin: var(--space-4xl) 0;
}

.pagination a,
.pagination span {
    display: flex;
    align-items: center;
    padding: var(--space-sm) var(--space-md);
    background: white;
    color: var(--gray-700);
    text-decoration: none;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
}

.pagination a:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.pagination .current {
    background: var(--gradient-primary);
    color: white;
}

@media (max-width: 768px) {
    .posts-grid {
        grid-template-columns: 1fr;
        gap: var(--space-xl);
    }
    
    .post-meta {
        flex-direction: column;
        gap: var(--space-sm);
    }
}
</style>

<?php get_footer(); ?>
