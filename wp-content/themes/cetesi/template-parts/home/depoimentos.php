<?php
/**
 * Template part para seção Depoimentos da página inicial
 *
 * @package Cetesi
 * @since 1.0.0
 */
?>

<section class="depoimentos-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <?php echo get_theme_mod( 'depoimentos_title', 'Depoimentos dos Alunos' ); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod( 'depoimentos_subtitle', 'Veja o que nossos alunos dizem sobre nossos cursos' ); ?>
            </p>
        </div>

        <div class="depoimentos-grid">
            <?php
            // Query para buscar depoimentos
            $depoimentos_query = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'meta_query'     => array(
                    array(
                        'key'     => 'tipo_depoimento',
                        'value'   => '1',
                        'compare' => '='
                    )
                )
            ) );

            if ( $depoimentos_query->have_posts() ) :
                while ( $depoimentos_query->have_posts() ) : $depoimentos_query->the_post();
            ?>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.391 9.983-9.391v2.391c-3.731 0-6.017 2.391-6.017 5.391v2.609h6.017v7.391h-10zM2.017 21v-7.391c0-5.704 3.731-9.391 9.983-9.391v2.391c-3.731 0-6.017 2.391-6.017 5.391v2.609h6.017v7.391h-10z"/>
                            </svg>
                        </div>
                        <blockquote class="testimonial-text">
                            <?php the_content(); ?>
                        </blockquote>
                    </div>
                    
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                            <?php else : ?>
                                <div class="avatar-placeholder">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="currentColor">
                                        <circle cx="25" cy="25" r="25" fill="#e9ecef"/>
                                        <circle cx="25" cy="18" r="8" fill="#6c757d"/>
                                        <path d="M12 40c0-7 6-13 13-13s13 6 13 13" fill="#6c757d"/>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="testimonial-info">
                            <h4 class="testimonial-name"><?php the_title(); ?></h4>
                            <p class="testimonial-course">
                                <?php echo get_post_meta( get_the_ID(), 'curso_aluno', true ) ?: 'Ex-aluno'; ?>
                            </p>
                            <div class="testimonial-rating">
                                <?php
                                $rating = get_post_meta( get_the_ID(), 'avaliacao_aluno', true );
                                $rating = $rating ? intval( $rating ) : 5;
                                for ( $i = 1; $i <= 5; $i++ ) :
                                ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="<?php echo $i <= $rating ? 'currentColor' : '#e9ecef'; ?>">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="no-testimonials">
                    <p>Nenhum depoimento encontrado. Configure alguns depoimentos para exibi-los aqui.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
