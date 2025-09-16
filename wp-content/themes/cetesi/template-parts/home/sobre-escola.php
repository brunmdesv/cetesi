<?php
/**
 * Template part para seção Sobre a Escola da página inicial
 *
 * @package Cetesi
 * @since 1.0.0
 */
?>

<section id="sobre" class="sobre-escola-section">
    <div class="container">
        <div class="sobre-content">
            <div class="sobre-text">
                <h2 class="section-title">
                    <?php echo get_theme_mod( 'sobre_title', 'Sobre a CETESI' ); ?>
                </h2>
                <div class="sobre-description">
                    <?php 
                    $sobre_content = get_theme_mod( 'sobre_content', 
                        '<p>Somos uma escola de cursos profissionais comprometida em oferecer educação de qualidade e transformar vidas através do conhecimento.</p>
                        <p>Nossa missão é preparar profissionais para o mercado de trabalho com cursos práticos, atualizados e ministrados por especialistas experientes.</p>'
                    );
                    echo wp_kses_post( $sobre_content );
                    ?>
                </div>
                
                <div class="sobre-features">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <div class="feature-content">
                            <h3><?php echo get_theme_mod( 'sobre_feature1_title', 'Qualidade Garantida' ); ?></h3>
                            <p><?php echo get_theme_mod( 'sobre_feature1_text', 'Cursos desenvolvidos por especialistas com anos de experiência no mercado.' ); ?></p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <div class="feature-content">
                            <h3><?php echo get_theme_mod( 'sobre_feature2_title', 'Certificação' ); ?></h3>
                            <p><?php echo get_theme_mod( 'sobre_feature2_text', 'Certificados reconhecidos pelo mercado de trabalho.' ); ?></p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A1.5 1.5 0 0 0 18.54 8H17c-.8 0-1.54.37-2.01.99L14 10.5V22h6zM12.5 11.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5S11 9.17 11 10s.67 1.5 1.5 1.5zM5.5 6c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2zm2 16v-7H9V9.5c0-.28-.22-.5-.5-.5h-2c-.28 0-.5.22-.5.5V15H4v7h3.5z"/>
                            </svg>
                        </div>
                        <div class="feature-content">
                            <h3><?php echo get_theme_mod( 'sobre_feature3_title', 'Suporte Completo' ); ?></h3>
                            <p><?php echo get_theme_mod( 'sobre_feature3_text', 'Acompanhamento personalizado durante todo o curso.' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="sobre-image">
                <?php 
                $sobre_image = get_theme_mod( 'sobre_image' );
                if ( $sobre_image ) :
                ?>
                    <img src="<?php echo esc_url( $sobre_image ); ?>" alt="<?php echo get_theme_mod( 'sobre_title', 'Sobre a CETESI' ); ?>" class="sobre-img">
                <?php else : ?>
                    <div class="sobre-placeholder">
                        <svg width="400" height="300" viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="400" height="300" fill="#f8f9fa"/>
                            <rect x="50" y="50" width="300" height="200" rx="10" fill="#e9ecef"/>
                            <rect x="100" y="100" width="200" height="20" rx="10" fill="#dee2e6"/>
                            <rect x="100" y="140" width="150" height="15" rx="7" fill="#dee2e6"/>
                            <rect x="100" y="170" width="180" height="15" rx="7" fill="#dee2e6"/>
                            <rect x="100" y="200" width="120" height="15" rx="7" fill="#dee2e6"/>
                        </svg>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
