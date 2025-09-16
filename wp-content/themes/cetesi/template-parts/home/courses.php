<?php
/**
 * Template part for displaying courses section
 *
 * @package Cetesi
 */

// Previne acesso direto
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<!-- Seção de Cursos -->
<section class="courses-section" id="cursos">
    <div class="container">
        <!-- Cabeçalho da Seção -->
        <div class="courses-header">
            <h2 class="courses-title">
                <?php echo get_theme_mod( 'courses_title', 'Nossos Cursos' ); ?>
            </h2>
            <p class="courses-subtitle">
                <?php echo get_theme_mod( 'courses_subtitle', 'Oferecemos uma ampla gama de cursos técnicos, livres e de qualificação, reconhecidos pelo MEC e alinhados com as demandas do mercado de trabalho.' ); ?>
            </p>
        </div>

        <!-- Grid de Cursos -->
        <div class="courses-grid">
            <?php
            // Query para buscar cursos
            $courses_query = new WP_Query( array(
                'post_type'      => 'curso',
                'posts_per_page' => get_theme_mod( 'courses_per_page', 6 ),
                'post_status'    => 'publish',
                'meta_query'     => array(
                    array(
                        'key'     => '_featured_course',
                        'value'   => 'yes',
                        'compare' => '='
                    )
                )
            ) );

            if ( $courses_query->have_posts() ) :
                while ( $courses_query->have_posts() ) : $courses_query->the_post();
                    $course_duration = get_post_meta( get_the_ID(), '_course_duration', true );
                    $course_hours = get_post_meta( get_the_ID(), '_course_hours', true );
                    $course_format = get_post_meta( get_the_ID(), '_course_format', true );
                    $course_icon = get_post_meta( get_the_ID(), '_course_icon', true );
                    $course_color = get_post_meta( get_the_ID(), '_course_color', true );
                    ?>
                    
                    <div class="course-card" data-aos="fade-up" data-aos-delay="<?php echo $courses_query->current_post * 100; ?>">
                        <!-- Header do Card -->
                        <div class="course-header" style="background: <?php echo $course_color ? $course_color : 'var(--gradient-primary)'; ?>">
                            <div class="course-icon">
                                <i class="<?php echo $course_icon ? $course_icon : 'fas fa-graduation-cap'; ?>"></i>
                            </div>
                        </div>

                        <!-- Conteúdo do Card -->
                        <div class="course-content">
                            <!-- Título -->
                            <h3 class="course-title">
                                <?php the_title(); ?>
                            </h3>

                            <!-- Linhas decorativas -->
                            <div class="course-lines">
                                <div class="line line-primary"></div>
                                <div class="line line-secondary"></div>
                            </div>

                            <!-- Detalhes do Curso -->
                            <div class="course-details">
                                <?php if ( $course_duration ) : ?>
                                    <div class="detail-item detail-duration">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span><?php echo esc_html( $course_duration ); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if ( $course_hours ) : ?>
                                    <div class="detail-item detail-hours">
                                        <i class="fas fa-clock"></i>
                                        <span><?php echo esc_html( $course_hours ); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if ( $course_format ) : ?>
                                    <div class="detail-item detail-format">
                                        <i class="fas fa-building"></i>
                                        <span><?php echo esc_html( $course_format ); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Linhas decorativas -->
                            <div class="course-lines">
                                <div class="line line-accent"></div>
                                <div class="line line-success"></div>
                            </div>

                            <!-- Descrição -->
                            <div class="course-description">
                                <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                            </div>

                            <!-- Botão -->
                            <div class="course-action">
                                <a href="<?php the_permalink(); ?>" class="course-btn">
                                    <i class="fas fa-arrow-right"></i>
                                    <span>Saiba Mais</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback: Mostrar cursos de exemplo se não houver cursos cadastrados
                $sample_courses = array(
                    array(
                        'title' => 'Técnico em Segurança do Trabalho',
                        'duration' => '18 MESES',
                        'hours' => '1.200 HORAS',
                        'format' => 'PRESENCIAL',
                        'icon' => 'fas fa-hard-hat',
                        'color' => 'linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%)',
                        'description' => 'Formação técnica em Segurança do Trabalho, preparando profissionais para prevenir riscos e garantir ambientes laborais seguros.'
                    ),
                    array(
                        'title' => 'Técnico em Enfermagem',
                        'duration' => '24 MESES',
                        'hours' => '1.800 HORAS',
                        'format' => 'PRESENCIAL',
                        'icon' => 'fas fa-user-md',
                        'color' => 'linear-gradient(135deg, #10b981 0%, #059669 100%)',
                        'description' => 'Formação técnica em Enfermagem, preparando profissionais para atuar na área da saúde com competência e ética.'
                    ),
                    array(
                        'title' => 'Técnico em Administração',
                        'duration' => '18 MESES',
                        'hours' => '1.200 HORAS',
                        'format' => 'PRESENCIAL',
                        'icon' => 'fas fa-briefcase',
                        'color' => 'linear-gradient(135deg, #f59e0b 0%, #d97706 100%)',
                        'description' => 'Formação técnica em Administração, preparando profissionais para atuar em diversas áreas empresariais.'
                    ),
                    array(
                        'title' => 'Técnico em Informática',
                        'duration' => '18 MESES',
                        'hours' => '1.200 HORAS',
                        'format' => 'PRESENCIAL',
                        'icon' => 'fas fa-laptop-code',
                        'color' => 'linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%)',
                        'description' => 'Formação técnica em Informática, preparando profissionais para atuar na área de tecnologia da informação.'
                    ),
                    array(
                        'title' => 'Técnico em Contabilidade',
                        'duration' => '18 MESES',
                        'hours' => '1.200 HORAS',
                        'format' => 'PRESENCIAL',
                        'icon' => 'fas fa-calculator',
                        'color' => 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)',
                        'description' => 'Formação técnica em Contabilidade, preparando profissionais para atuar na área financeira e contábil.'
                    ),
                    array(
                        'title' => 'Técnico em Logística',
                        'duration' => '18 MESES',
                        'hours' => '1.200 HORAS',
                        'format' => 'PRESENCIAL',
                        'icon' => 'fas fa-truck',
                        'color' => 'linear-gradient(135deg, #06b6d4 0%, #0891b2 100%)',
                        'description' => 'Formação técnica em Logística, preparando profissionais para atuar na gestão de cadeia de suprimentos.'
                    )
                );

                foreach ( $sample_courses as $index => $course ) :
                    ?>
                    <div class="course-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                        <!-- Header do Card -->
                        <div class="course-header" style="background: <?php echo $course['color']; ?>">
                            <div class="course-icon">
                                <i class="<?php echo $course['icon']; ?>"></i>
                            </div>
                        </div>

                        <!-- Conteúdo do Card -->
                        <div class="course-content">
                            <!-- Título -->
                            <h3 class="course-title">
                                <?php echo $course['title']; ?>
                            </h3>

                            <!-- Linhas decorativas -->
                            <div class="course-lines">
                                <div class="line line-primary"></div>
                                <div class="line line-secondary"></div>
                            </div>

                            <!-- Detalhes do Curso -->
                            <div class="course-details">
                                <div class="detail-item detail-duration">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span><?php echo $course['duration']; ?></span>
                                </div>
                                <div class="detail-item detail-hours">
                                    <i class="fas fa-clock"></i>
                                    <span><?php echo $course['hours']; ?></span>
                                </div>
                                <div class="detail-item detail-format">
                                    <i class="fas fa-building"></i>
                                    <span><?php echo $course['format']; ?></span>
                                </div>
                            </div>

                            <!-- Linhas decorativas -->
                            <div class="course-lines">
                                <div class="line line-accent"></div>
                                <div class="line line-success"></div>
                            </div>

                            <!-- Descrição -->
                            <div class="course-description">
                                <p><?php echo $course['description']; ?></p>
                            </div>

                            <!-- Botão -->
                            <div class="course-action">
                                <a href="#contato" class="course-btn">
                                    <i class="fas fa-arrow-right"></i>
                                    <span>Saiba Mais</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>

        <!-- Botão Ver Todos os Cursos -->
        <div class="courses-footer">
            <a href="<?php echo get_theme_mod( 'courses_view_all_url', '#cursos' ); ?>" class="courses-view-all">
                <span><?php echo get_theme_mod( 'courses_view_all_text', 'Ver Todos os Cursos' ); ?></span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
