<?php
/**
 * Template part para seção Cursos em Destaque da página inicial
 *
 * @package Cetesi
 * @since 1.0.0
 */
?>

<section id="cursos" class="cursos-destaque-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <?php echo get_theme_mod( 'cursos_title', 'Cursos em Destaque' ); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod( 'cursos_subtitle', 'Conheça nossos cursos mais populares e transforme sua carreira' ); ?>
            </p>
        </div>

        <div class="cursos-grid">
            <?php
            // Query para buscar cursos em destaque
            $cursos_query = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => 6,
                'meta_query'     => array(
                    array(
                        'key'     => 'curso_destaque',
                        'value'   => '1',
                        'compare' => '='
                    )
                )
            ) );

            if ( $cursos_query->have_posts() ) :
                while ( $cursos_query->have_posts() ) : $cursos_query->the_post();
            ?>
                <div class="course-card">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="course-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'cetesi-thumbnail' ); ?>
                            </a>
                            <div class="course-badge">
                                <?php 
                                $nivel = get_post_meta( get_the_ID(), 'nivel_curso', true );
                                switch($nivel) {
                                    case 'iniciante': echo 'Iniciante'; break;
                                    case 'intermediario': echo 'Intermediário'; break;
                                    case 'avancado': echo 'Avançado'; break;
                                    default: echo 'Iniciante';
                                }
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="course-content">
                        <h3 class="course-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        
                        <div class="course-meta">
                            <div class="course-duration">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span><?php echo get_post_meta( get_the_ID(), 'duracao_curso', true ) ?: 'Duração não informada'; ?></span>
                            </div>
                            
                            <div class="course-students">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A1.5 1.5 0 0 0 18.54 8H17c-.8 0-1.54.37-2.01.99L14 10.5V22h6zM12.5 11.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5S11 9.17 11 10s.67 1.5 1.5 1.5zM5.5 6c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2zm2 16v-7H9V9.5c0-.28-.22-.5-.5-.5h-2c-.28 0-.5.22-.5.5V15H4v7h3.5z"/>
                                </svg>
                                <span><?php echo get_post_meta( get_the_ID(), 'numero_alunos', true ) ?: '0'; ?> alunos</span>
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
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="no-courses">
                    <p>Nenhum curso em destaque encontrado. Configure alguns cursos como destaque para exibi-los aqui.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="section-footer">
            <a href="<?php echo get_theme_mod( 'cursos_button_url', home_url( '/arquivo-cursos/' ) ); ?>" class="btn btn-outline">
                <?php echo get_theme_mod( 'cursos_button_text', 'Ver Todos os Cursos' ); ?>
            </a>
        </div>
    </div>
</section>
