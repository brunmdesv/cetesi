<?php
/**
 * Template para arquivo de cursos
 * 
 * @package CETESI
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main archive-cursos">
    <!-- Hero dos Cursos -->
    <section class="cursos-hero">
        <div class="container">
            <div class="cursos-hero-content">
                <h1><?php _e('Nossos Cursos', 'cetesi'); ?></h1>
                <p><?php _e('Descubra nossa ampla gama de cursos técnicos, livres e de qualificação, reconhecidos pelo MEC e alinhados com as demandas do mercado de trabalho.', 'cetesi'); ?></p>
            </div>
        </div>
    </section>

    <!-- Filtros de Cursos -->
    <section class="cursos-filters">
        <div class="container">
            <div class="filters-wrapper">
                <h3><?php _e('Filtrar por Categoria:', 'cetesi'); ?></h3>
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">
                        <?php _e('Todos', 'cetesi'); ?>
                    </button>
                    <button class="filter-btn" data-filter="tecnicos">
                        <?php _e('Técnicos', 'cetesi'); ?>
                    </button>
                    <button class="filter-btn" data-filter="online">
                        <?php _e('Online', 'cetesi'); ?>
                    </button>
                    <button class="filter-btn" data-filter="livres">
                        <?php _e('Livres', 'cetesi'); ?>
                    </button>
                    <button class="filter-btn" data-filter="qualificacao">
                        <?php _e('Qualificação', 'cetesi'); ?>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Lista de Cursos -->
    <section class="cursos-listing">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="cursos-grid">
                    <?php while (have_posts()) : the_post(); 
                        $categoria = get_the_terms(get_the_ID(), 'categoria_curso');
                        $categoria_slug = $categoria && !is_wp_error($categoria) ? $categoria[0]->slug : 'geral';
                        $duracao = get_post_meta(get_the_ID(), '_curso_duracao', true);
                        $carga_horaria = get_post_meta(get_the_ID(), '_curso_carga_horaria', true);
                        $modalidade = get_post_meta(get_the_ID(), '_curso_modalidade', true);
                        $preco = get_post_meta(get_the_ID(), '_curso_preco', true);
                    ?>
                    <div class="curso-card <?php echo esc_attr($categoria_slug); ?>" data-category="<?php echo esc_attr($categoria_slug); ?>">
                        <div class="curso-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('curso-thumbnail'); ?>
                            <?php else : ?>
                                <i class="fas fa-graduation-cap"></i>
                            <?php endif; ?>
                        </div>
                        
                        <div class="curso-content">
                            <div class="curso-meta">
                                <?php if ($categoria && !is_wp_error($categoria)) : ?>
                                <span class="curso-category"><?php echo esc_html($categoria[0]->name); ?></span>
                                <?php endif; ?>
                                
                                <?php if ($modalidade) : ?>
                                <span class="curso-modalidade <?php echo esc_attr($modalidade); ?>">
                                    <i class="fas fa-<?php echo $modalidade === 'online' ? 'laptop' : 'building'; ?>"></i>
                                    <?php echo ucfirst($modalidade); ?>
                                </span>
                                <?php endif; ?>
                            </div>
                            
                            <h3 class="curso-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <p class="curso-excerpt"><?php the_excerpt(); ?></p>
                            
                            <div class="curso-details">
                                <?php if ($duracao) : ?>
                                <div class="detail-item">
                                    <i class="fas fa-clock"></i>
                                    <span><?php echo esc_html($duracao); ?></span>
                                </div>
                                <?php endif; ?>
                                
                                <?php if ($carga_horaria) : ?>
                                <div class="detail-item">
                                    <i class="fas fa-book"></i>
                                    <span><?php echo esc_html($carga_horaria); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <?php if ($preco) : ?>
                            <div class="curso-price">
                                <span class="price-label"><?php _e('A partir de:', 'cetesi'); ?></span>
                                <span class="price-value"><?php echo esc_html($preco); ?></span>
                            </div>
                            <?php endif; ?>
                            
                            <a href="<?php the_permalink(); ?>" class="curso-btn">
                                <?php _e('Saiba Mais', 'cetesi'); ?>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                
                <!-- Paginação -->
                <div class="cursos-pagination">
                    <?php
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => '<i class="fas fa-chevron-left"></i> ' . __('Anterior', 'cetesi'),
                        'next_text' => __('Próximo', 'cetesi') . ' <i class="fas fa-chevron-right"></i>',
                    ));
                    ?>
                </div>
            <?php else : ?>
                <div class="no-cursos">
                    <h2><?php _e('Nenhum curso encontrado', 'cetesi'); ?></h2>
                    <p><?php _e('Desculpe, mas não encontramos nenhum curso. Tente novamente mais tarde.', 'cetesi'); ?></p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-primary">
                        <?php _e('Voltar ao Início', 'cetesi'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<style>
.archive-cursos {
    margin-top: 80px;
}

.cursos-hero {
    background: var(--gradient-hero);
    color: white;
    padding: var(--space-4xl) 0;
    text-align: center;
}

.cursos-hero-content h1 {
    font-family: var(--font-heading);
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: var(--space-lg);
    line-height: 1.2;
}

.cursos-hero-content p {
    font-size: 1.2rem;
    opacity: 0.9;
    line-height: 1.6;
    max-width: 800px;
    margin: 0 auto;
}

.cursos-filters {
    background: var(--gray-50);
    padding: var(--space-2xl) 0;
    border-bottom: 1px solid var(--gray-200);
}

.filters-wrapper {
    display: flex;
    align-items: center;
    gap: var(--space-lg);
    flex-wrap: wrap;
}

.filters-wrapper h3 {
    font-family: var(--font-heading);
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--gray-800);
    margin: 0;
}

.filter-buttons {
    display: flex;
    gap: var(--space-sm);
    flex-wrap: wrap;
}

.filter-btn {
    padding: var(--space-sm) var(--space-lg);
    background: white;
    color: var(--gray-700);
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-full);
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.cursos-listing {
    padding: var(--space-4xl) 0;
    background: white;
}

.cursos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: var(--space-2xl);
    margin-bottom: var(--space-4xl);
}

.curso-card {
    background: white;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    border: 1px solid var(--gray-100);
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.curso-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-2xl);
}

.curso-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.curso-card.tecnicos::before {
    background: var(--gradient-primary);
}

.curso-card.online::before {
    background: var(--gradient-accent);
}

.curso-card.livres::before {
    background: var(--gradient-secondary);
}

.curso-card.qualificacao::before {
    background: linear-gradient(135deg, var(--accent-purple) 0%, var(--accent-pink) 100%);
}

.curso-image {
    height: 200px;
    background: var(--gradient-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.curso-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.curso-card:hover .curso-image img {
    transform: scale(1.05);
}

.curso-image i {
    font-size: 3rem;
    color: white;
}

.curso-content {
    padding: var(--space-xl);
    display: flex;
    flex-direction: column;
    flex: 1;
}

.curso-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--space-md);
    flex-wrap: wrap;
    gap: var(--space-sm);
}

.curso-category {
    background: var(--gray-100);
    color: var(--gray-700);
    padding: var(--space-xs) var(--space-sm);
    border-radius: var(--radius-full);
    font-size: 0.8rem;
    font-weight: 500;
}

.curso-modalidade {
    display: flex;
    align-items: center;
    gap: var(--space-xs);
    font-size: 0.8rem;
    font-weight: 500;
}

.curso-modalidade.online {
    color: var(--accent-color);
}

.curso-modalidade.presencial {
    color: var(--primary-color);
}

.curso-title {
    font-family: var(--font-heading);
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: var(--space-md);
    line-height: 1.3;
}

.curso-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

.curso-title a:hover {
    color: var(--primary-color);
}

.curso-excerpt {
    color: var(--gray-600);
    line-height: 1.6;
    margin-bottom: var(--space-lg);
    flex: 1;
}

.curso-details {
    display: flex;
    gap: var(--space-lg);
    margin-bottom: var(--space-lg);
    flex-wrap: wrap;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: var(--space-xs);
    font-size: 0.9rem;
    color: var(--gray-600);
}

.detail-item i {
    color: var(--primary-color);
    font-size: 0.9rem;
}

.curso-price {
    background: var(--gray-50);
    padding: var(--space-md);
    border-radius: var(--radius-lg);
    text-align: center;
    margin-bottom: var(--space-lg);
}

.price-label {
    display: block;
    font-size: 0.8rem;
    color: var(--gray-600);
    margin-bottom: var(--space-xs);
}

.price-value {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--primary-color);
}

.curso-btn {
    background: var(--gradient-primary);
    color: white;
    padding: var(--space-md) var(--space-lg);
    border-radius: var(--radius-lg);
    text-decoration: none;
    font-weight: 600;
    text-align: center;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-sm);
}

.curso-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.cursos-pagination {
    display: flex;
    justify-content: center;
    margin-top: var(--space-4xl);
}

.cursos-pagination .page-numbers {
    display: flex;
    gap: var(--space-sm);
    list-style: none;
    margin: 0;
    padding: 0;
}

.cursos-pagination .page-numbers li {
    margin: 0;
}

.cursos-pagination .page-numbers a,
.cursos-pagination .page-numbers span {
    display: flex;
    align-items: center;
    padding: var(--space-sm) var(--space-md);
    background: white;
    color: var(--gray-700);
    text-decoration: none;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
    font-weight: 500;
}

.cursos-pagination .page-numbers a:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.cursos-pagination .page-numbers .current {
    background: var(--gradient-primary);
    color: white;
}

.no-cursos {
    text-align: center;
    padding: var(--space-4xl) 0;
}

.no-cursos h2 {
    font-family: var(--font-heading);
    font-size: 2rem;
    color: var(--gray-800);
    margin-bottom: var(--space-md);
}

.no-cursos p {
    color: var(--gray-600);
    font-size: 1.1rem;
    margin-bottom: var(--space-2xl);
}

.btn-primary {
    background: var(--gradient-primary);
    color: white;
    padding: var(--space-lg) var(--space-2xl);
    border-radius: var(--radius-full);
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
    transition: all 0.3s ease;
    box-shadow: var(--shadow-md);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* Responsive */
@media (max-width: 768px) {
    .cursos-hero-content h1 {
        font-size: 2rem;
    }
    
    .filters-wrapper {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--space-md);
    }
    
    .filter-buttons {
        width: 100%;
        justify-content: center;
    }
    
    .cursos-grid {
        grid-template-columns: 1fr;
        gap: var(--space-xl);
    }
    
    .curso-details {
        flex-direction: column;
        gap: var(--space-sm);
    }
}

/* Animações de filtro */
.curso-card.hidden {
    display: none;
}

.curso-card.fade-in {
    animation: fadeInUp 0.5s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
// Filtros de cursos
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const cursoCards = document.querySelectorAll('.curso-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Atualizar botões ativos
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filtrar cursos
            cursoCards.forEach(card => {
                const category = card.getAttribute('data-category');
                
                if (filter === 'all' || category === filter) {
                    card.classList.remove('hidden');
                    card.classList.add('fade-in');
                } else {
                    card.classList.add('hidden');
                    card.classList.remove('fade-in');
                }
            });
        });
    });
});
</script>

<?php get_footer(); ?>
