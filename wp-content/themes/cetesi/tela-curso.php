<?php
/**
 * Template para página individual de curso
 *
 * @package Cetesi
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <div class="row">
            <div class="col content-area">
                
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'course-single' ); ?>>
                        
                        <header class="course-header">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="course-hero-image">
                                    <?php the_post_thumbnail( 'large' ); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="course-header-content">
                                <h1 class="course-title"><?php the_title(); ?></h1>
                                
                        <div class="course-meta">
                            <div class="course-duration">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span><?php echo get_post_meta( get_the_ID(), 'duracao_curso', true ) ?: 'Duração não informada'; ?></span>
                            </div>
                            
                            <div class="course-level">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
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
                            
                            <div class="course-students">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A1.5 1.5 0 0 0 18.54 8H17c-.8 0-1.54.37-2.01.99L14 10.5V22h6zM12.5 11.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5S11 9.17 11 10s.67 1.5 1.5 1.5zM5.5 6c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2zm2 16v-7H9V9.5c0-.28-.22-.5-.5-.5h-2c-.28 0-.5.22-.5.5V15H4v7h3.5z"/>
                                </svg>
                                <span><?php echo get_post_meta( get_the_ID(), 'numero_alunos', true ) ?: '0'; ?> alunos</span>
                            </div>
                        </div>
                                
                                <div class="course-price">
                                    <span class="currency">R$</span>
                                    <span class="amount"><?php echo get_post_meta( get_the_ID(), 'preco_curso', true ) ?: '0'; ?></span>
                                </div>
                            </div>
                        </header>

                        <div class="course-content">
                            <div class="course-description">
                                <h2>Descrição do Curso</h2>
                                <?php the_content(); ?>
                            </div>

                            <div class="course-curriculum">
                                <h2>Conteúdo do Curso</h2>
                                <?php
                                $conteudo = get_post_meta( get_the_ID(), 'conteudo_curso', true );
                                if ( $conteudo ) {
                                    echo '<div class="curriculum-list">' . wp_kses_post( $conteudo ) . '</div>';
                                } else {
                                    echo '<p>Conteúdo do curso será disponibilizado em breve.</p>';
                                }
                                ?>
                            </div>

                            <div class="course-instructor">
                                <h2>Professor</h2>
                                <div class="instructor-info">
                                    <?php
                                    $professor_id = get_post_meta( get_the_ID(), 'professor_curso', true );
                                    if ( $professor_id ) {
                                        $professor = get_post( $professor_id );
                                        if ( $professor ) {
                                            ?>
                                            <div class="instructor-avatar">
                                                <?php echo get_avatar( $professor_id, 80 ); ?>
                                            </div>
                                            <div class="instructor-details">
                                                <h3><?php echo esc_html( $professor->post_title ); ?></h3>
                                                <p><?php echo esc_html( get_post_meta( $professor_id, 'titulo_professor', true ) ); ?></p>
                                                <div class="instructor-bio">
                                                    <?php echo wp_kses_post( $professor->post_content ); ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo '<p>Professor não definido.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="course-enrollment">
                            <div class="enrollment-box">
                                <h3>Inscreva-se no Curso</h3>
                                <div class="enrollment-price">
                                    <span class="currency">R$</span>
                                    <span class="amount"><?php echo get_post_meta( get_the_ID(), 'preco_curso', true ) ?: '0'; ?></span>
                                </div>
                                <div class="enrollment-features">
                                    <ul>
                                        <li>✓ Acesso vitalício ao curso</li>
                                        <li>✓ Certificado de conclusão</li>
                                        <li>✓ Suporte do instrutor</li>
                                        <li>✓ Material de apoio</li>
                                    </ul>
                                </div>
                                <a href="#" class="btn-course enrollment-btn">
                                    Inscrever-se Agora
                                </a>
                            </div>
                        </div>
                        
                    </article>

                <?php endwhile; ?>
                
            </div>
            
            <?php get_sidebar(); ?>
            
        </div>
    </div>
</main>

<?php get_footer(); ?>
