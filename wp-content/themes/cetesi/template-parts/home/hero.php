<?php
/**
 * Template part para seção Hero da página inicial - Versão Moderna e Inovadora
 *
 * @package Cetesi
 * @since 1.0.0
 */
?>

<section class="hero-modern">

    <div class="container">
        <div class="hero-content-modern">
            <!-- Conteúdo Principal -->
            <div class="hero-main">
                <!-- Badge removido para design mais limpo -->

                <!-- Título principal com efeito de digitação -->
                <h1 class="hero-title-modern">
                    <span class="title-line-1">
                        <?php echo get_theme_mod( 'hero_title_line1', 'Transforme sua' ); ?>
                    </span>
                    <span class="title-line-2">
                        <span class="title-highlight">
                            <?php echo get_theme_mod( 'hero_title_line2', 'Carreira' ); ?>
                        </span>
                        <span class="title-cursor">|</span>
                    </span>
                    <span class="title-line-3">
                        <?php echo get_theme_mod( 'hero_title_line3', 'com Excelência' ); ?>
                    </span>
                </h1>

                <!-- Subtítulo com animação -->
                <p class="hero-subtitle-modern">
                    <?php echo get_theme_mod( 'hero_subtitle', 'Aprenda com os melhores profissionais e desenvolva habilidades que o mercado procura. Junte-se a milhares de alunos que já transformaram suas vidas.' ); ?>
                </p>

                <!-- Estatísticas rápidas -->
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-content">
                            <div class="stat-number" data-count="<?php echo get_theme_mod( 'hero_stat1_number', '60000' ); ?>">0</div>
                            <div class="stat-label"><?php echo get_theme_mod( 'hero_stat1_label', 'Alunos Formados' ); ?></div>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-content">
                            <div class="stat-number" data-count="<?php echo get_theme_mod( 'hero_stat2_number', '95' ); ?>">0</div>
                            <div class="stat-label"><?php echo get_theme_mod( 'hero_stat2_label', '% Empregabilidade' ); ?></div>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-content">
                            <div class="stat-number" data-count="<?php echo get_theme_mod( 'hero_stat3_number', '25' ); ?>">0</div>
                            <div class="stat-label"><?php echo get_theme_mod( 'hero_stat3_label', 'Anos de Experiência' ); ?></div>
                        </div>
                    </div>
                </div>

                <!-- CTA Ultra Moderno -->
                <div class="cta-botoes-ultra">
                    <a href="<?php echo get_theme_mod( 'hero_button_url', '#cursos' ); ?>" class="btn-hero-principal-ultra">
                        <div class="btn-content-ultra">
                            <i class="fas fa-graduation-cap"></i>
                            <span><?php echo get_theme_mod( 'hero_button_text', 'Ver Cursos' ); ?></span>
                        </div>
                        <div class="btn-shine-ultra"></div>
                    </a>
                    <a href="<?php echo get_theme_mod( 'hero_button_secondary_url', '#contato' ); ?>" class="btn-hero-secundario-ultra">
                        <div class="btn-content-ultra">
                            <i class="fas fa-phone"></i>
                            <span><?php echo get_theme_mod( 'hero_button_secondary_text', 'Fale Conosco' ); ?></span>
                        </div>
                    </a>
                </div>

                <!-- Indicadores de confiança removidos para design mais limpo -->
            </div>

            <!-- Visual moderno -->
            <div class="hero-visual">
                <!-- Card principal com imagem -->
                <div class="hero-card">
                    <div class="card-header">
                        <div class="card-avatar">
                            <?php 
                            $hero_image = get_theme_mod( 'hero_image' );
                            if ( $hero_image ) :
                            ?>
                                <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo get_theme_mod( 'hero_title', 'CETESI - Escola de Cursos' ); ?>">
                            <?php else : ?>
                                <div class="avatar-placeholder">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-info">
                            <h3><?php echo get_theme_mod( 'hero_card_title', 'Curso em Destaque' ); ?></h3>
                            <p><?php echo get_theme_mod( 'hero_card_subtitle', 'Desenvolvimento Web Full Stack' ); ?></p>
                        </div>
                        <div class="card-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span><?php echo get_theme_mod( 'hero_card_rating', '4.9 (2.3k avaliações)' ); ?></span>
                        </div>
                    </div>
                    <div class="card-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?php echo get_theme_mod( 'hero_card_progress_percentage', '85' ); ?>%"></div>
                        </div>
                        <span><?php echo get_theme_mod( 'hero_card_progress', '85% dos alunos recomendam' ); ?></span>
                    </div>
                </div>

                <!-- Cards flutuantes -->
                <div class="floating-cards">
                    <div class="float-card float-card-1">
                        <div class="card-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="card-content">
                            <h4>Certificação</h4>
                            <p>Reconhecida pelo mercado</p>
                        </div>
                    </div>
                    <div class="float-card float-card-2">
                        <div class="card-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="card-content">
                            <h4>Prática</h4>
                            <p>Projetos reais</p>
                        </div>
                    </div>
                    <div class="float-card float-card-3">
                        <div class="card-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="card-content">
                            <h4>Suporte</h4>
                            <p>Mentoria personalizada</p>
                        </div>
                    </div>
                </div>

                <!-- Elementos decorativos removidos para design mais limpo -->
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="hero-scroll">
            <div class="scroll-indicator">
                <div class="scroll-line"></div>
                <div class="scroll-text">Role para baixo</div>
            </div>
        </div>
    </div>
</section>
