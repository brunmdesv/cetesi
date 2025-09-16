<?php
/**
 * Template part para seção Hero da página inicial
 *
 * @package Cetesi
 * @since 1.0.0
 */
?>

<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <?php echo get_theme_mod( 'hero_title', 'Transforme sua carreira com nossos cursos profissionais' ); ?>
                </h1>
                <p class="hero-subtitle">
                    <?php echo get_theme_mod( 'hero_subtitle', 'Aprenda com os melhores profissionais e desenvolva habilidades que o mercado procura.' ); ?>
                </p>
                <div class="hero-actions">
                    <a href="<?php echo get_theme_mod( 'hero_button_url', '#cursos' ); ?>" class="btn btn-primary btn-large">
                        <?php echo get_theme_mod( 'hero_button_text', 'Ver Cursos' ); ?>
                    </a>
                    <a href="<?php echo get_theme_mod( 'hero_button_secondary_url', '#sobre' ); ?>" class="btn btn-secondary btn-large">
                        <?php echo get_theme_mod( 'hero_button_secondary_text', 'Saiba Mais' ); ?>
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <?php 
                $hero_image = get_theme_mod( 'hero_image' );
                if ( $hero_image ) :
                ?>
                    <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo get_theme_mod( 'hero_title', 'CETESI - Escola de Cursos' ); ?>" class="hero-img">
                <?php else : ?>
                    <div class="hero-placeholder">
                        <svg width="400" height="300" viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="400" height="300" fill="#f8f9fa"/>
                            <rect x="50" y="50" width="300" height="200" rx="10" fill="#e9ecef"/>
                            <circle cx="200" cy="120" r="30" fill="#dee2e6"/>
                            <rect x="150" y="170" width="100" height="20" rx="10" fill="#dee2e6"/>
                            <rect x="170" y="200" width="60" height="15" rx="7" fill="#dee2e6"/>
                        </svg>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
