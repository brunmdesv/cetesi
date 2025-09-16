<?php
/**
 * Template para listagem de cursos
 *
 * @package Cetesi
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <div class="row">
            <div class="col content-area">
                
                <header class="page-header">
                    <h1 class="page-title">Nossos Cursos</h1>
                    <div class="page-description">
                        <p>Descubra nossa variedade de cursos profissionais e desenvolva suas habilidades.</p>
                    </div>
                </header>

                <div class="courses-filters">
                    <div class="filter-group">
                        <label for="level-filter">Nível:</label>
                        <select id="level-filter" class="filter-select">
                            <option value="">Todos os níveis</option>
                            <option value="iniciante">Iniciante</option>
                            <option value="intermediario">Intermediário</option>
                            <option value="avancado">Avançado</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="category-filter">Categoria:</label>
                        <select id="category-filter" class="filter-select">
                            <option value="">Todas as categorias</option>
                            <?php
                            $categories = get_categories( array(
                                'taxonomy' => 'categoria_curso',
                                'hide_empty' => false,
                            ) );
                            foreach ( $categories as $category ) {
                                echo '<option value="' . esc_attr( $category->slug ) . '">' . esc_html( $category->name ) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="price-filter">Preço:</label>
                        <select id="price-filter" class="filter-select">
                            <option value="">Todos os preços</option>
                            <option value="0-100">Até R$ 100</option>
                            <option value="100-500">R$ 100 - R$ 500</option>
                            <option value="500-1000">R$ 500 - R$ 1.000</option>
                            <option value="1000+">Acima de R$ 1.000</option>
                        </select>
                    </div>
                </div>

                <?php if ( have_posts() ) : ?>
                    
                    <div class="courses-grid">
                        <?php while ( have_posts() ) : the_post(); ?>
                            
                            <div class="course-card" data-level="<?php echo get_post_meta( get_the_ID(), 'nivel_curso', true ) ?: 'iniciante'; ?>" data-price="<?php echo get_post_meta( get_the_ID(), 'preco_curso', true ) ?: '0'; ?>">
                                
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="course-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail( 'cetesi-thumbnail' ); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="course-content">
                                    <h2 class="course-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    
                        <div class="course-meta">
                            <div class="course-duration">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span><?php echo get_post_meta( get_the_ID(), 'duracao_curso', true ) ?: 'Duração não informada'; ?></span>
                            </div>
                            
                            <div class="course-level">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <span class="level-<?php echo get_post_meta( get_the_ID(), 'nivel_curso', true ) ?: 'iniciante'; ?>">
                                    <?php 
                                    $nivel = get_post_meta( get_the_ID(), 'nivel_curso', true );
                                    switch($nivel) {
                                        case 'iniciante': echo 'Iniciante'; break;
                                        case 'intermediario': echo 'Intermediário'; break;
                                        case 'avancado': echo 'Avançado'; break;
                                        default: echo 'Iniciante';
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>

                                    <div class="course-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <div class="course-price">
                                        <span class="currency">R$</span>
                                        <span class="amount"><?php echo get_post_meta( get_the_ID(), 'preco_curso', true ) ?: '0'; ?></span>
                                    </div>

                                    <div class="course-actions">
                                        <a href="<?php the_permalink(); ?>" class="btn-course">
                                            Ver Detalhes
                                        </a>
                                        <a href="#" class="btn-course secondary">
                                            Inscrever-se
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                        <?php endwhile; ?>
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
                                <?php esc_html_e( 'Nenhum curso encontrado', 'cetesi' ); ?>
                            </h1>
                        </header>

                        <div class="page-content">
                            <p><?php esc_html_e( 'Desculpe, não encontramos cursos que correspondam aos seus critérios de busca.', 'cetesi' ); ?></p>
                            <p><?php esc_html_e( 'Tente ajustar os filtros ou explore nossa seleção completa de cursos.', 'cetesi' ); ?></p>
                        </div>
                    </section>
                    
                <?php endif; ?>
                
            </div>
            
            <?php get_sidebar(); ?>
            
        </div>
    </div>
</main>

<script>
// Filtros de cursos
document.addEventListener('DOMContentLoaded', function() {
    const levelFilter = document.getElementById('level-filter');
    const categoryFilter = document.getElementById('category-filter');
    const priceFilter = document.getElementById('price-filter');
    const courseCards = document.querySelectorAll('.course-card');

    function filterCourses() {
        const selectedLevel = levelFilter.value;
        const selectedCategory = categoryFilter.value;
        const selectedPrice = priceFilter.value;

        courseCards.forEach(card => {
            let show = true;

            // Filtro por nível
            if (selectedLevel && card.dataset.level !== selectedLevel) {
                show = false;
            }

            // Filtro por preço
            if (selectedPrice) {
                const price = parseInt(card.dataset.price);
                const [min, max] = selectedPrice.split('-').map(p => p === '+' ? Infinity : parseInt(p));
                
                if (price < min || (max !== Infinity && price > max)) {
                    show = false;
                }
            }

            card.style.display = show ? 'block' : 'none';
        });
    }

    levelFilter.addEventListener('change', filterCourses);
    categoryFilter.addEventListener('change', filterCourses);
    priceFilter.addEventListener('change', filterCourses);
});
</script>

<?php get_footer(); ?>
