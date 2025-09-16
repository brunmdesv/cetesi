<?php
/**
 * Template part para seção Professores da página inicial
 *
 * @package Cetesi
 * @since 1.0.0
 */
?>

<section class="professores-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <?php echo get_theme_mod( 'professores_title', 'Nossos Professores' ); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod( 'professores_subtitle', 'Conheça os especialistas que vão transformar sua carreira' ); ?>
            </p>
        </div>

        <div class="professores-grid">
            <?php
            // Query para buscar professores
            $professores_query = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => 4,
                'meta_query'     => array(
                    array(
                        'key'     => 'tipo_professor',
                        'value'   => '1',
                        'compare' => '='
                    )
                )
            ) );

            if ( $professores_query->have_posts() ) :
                while ( $professores_query->have_posts() ) : $professores_query->the_post();
            ?>
                <div class="teacher-card">
                    <div class="teacher-avatar">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                        <?php else : ?>
                            <div class="avatar-placeholder">
                                <svg width="80" height="80" viewBox="0 0 80 80" fill="currentColor">
                                    <circle cx="40" cy="40" r="40" fill="#e9ecef"/>
                                    <circle cx="40" cy="30" r="12" fill="#6c757d"/>
                                    <path d="M20 70c0-11 9-20 20-20s20 9 20 20" fill="#6c757d"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="teacher-info">
                        <h3 class="teacher-name"><?php the_title(); ?></h3>
                        <p class="teacher-title">
                            <?php echo get_post_meta( get_the_ID(), 'titulo_professor', true ) ?: 'Professor'; ?>
                        </p>
                        <div class="teacher-bio">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <div class="teacher-specialties">
                            <?php
                            $especialidades = get_post_meta( get_the_ID(), 'especialidades_professor', true );
                            if ( $especialidades ) :
                                $especialidades_array = explode( ',', $especialidades );
                                foreach ( $especialidades_array as $especialidade ) :
                            ?>
                                <span class="specialty-tag"><?php echo trim( $especialidade ); ?></span>
                            <?php 
                                endforeach;
                            endif;
                            ?>
                        </div>
                        
                        <div class="teacher-stats">
                            <div class="stat">
                                <span class="stat-number"><?php echo get_post_meta( get_the_ID(), 'cursos_ministrados', true ) ?: '0'; ?></span>
                                <span class="stat-label">Cursos</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number"><?php echo get_post_meta( get_the_ID(), 'anos_experiencia', true ) ?: '0'; ?></span>
                                <span class="stat-label">Anos</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="no-teachers">
                    <p>Nenhum professor encontrado. Configure alguns professores para exibi-los aqui.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="section-footer">
            <a href="<?php echo get_theme_mod( 'professores_button_url', home_url( '/professores/' ) ); ?>" class="btn btn-outline">
                <?php echo get_theme_mod( 'professores_button_text', 'Conhecer Todos os Professores' ); ?>
            </a>
        </div>
    </div>
</section>
