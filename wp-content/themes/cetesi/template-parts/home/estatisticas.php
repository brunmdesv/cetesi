<?php
/**
 * Template part para seção Estatísticas da página inicial
 *
 * @package Cetesi
 * @since 1.0.0
 */
?>

<section class="estatisticas-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A1.5 1.5 0 0 0 18.54 8H17c-.8 0-1.54.37-2.01.99L14 10.5V22h6zM12.5 11.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5S11 9.17 11 10s.67 1.5 1.5 1.5zM5.5 6c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2zm2 16v-7H9V9.5c0-.28-.22-.5-.5-.5h-2c-.28 0-.5.22-.5.5V15H4v7h3.5z"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <span class="stat-number" data-count="<?php echo get_theme_mod( 'stat_alunos', '500' ); ?>">0</span>
                    <span class="stat-label"><?php echo get_theme_mod( 'stat_alunos_label', 'Alunos Formados' ); ?></span>
                </div>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <span class="stat-number" data-count="<?php echo get_theme_mod( 'stat_cursos', '25' ); ?>">0</span>
                    <span class="stat-label"><?php echo get_theme_mod( 'stat_cursos_label', 'Cursos Disponíveis' ); ?></span>
                </div>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <span class="stat-number" data-count="<?php echo get_theme_mod( 'stat_certificados', '95' ); ?>">0</span>
                    <span class="stat-label"><?php echo get_theme_mod( 'stat_certificados_label', '% de Aprovação' ); ?></span>
                </div>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11H7v-2h10v2z"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <span class="stat-number" data-count="<?php echo get_theme_mod( 'stat_anos', '10' ); ?>">0</span>
                    <span class="stat-label"><?php echo get_theme_mod( 'stat_anos_label', 'Anos de Experiência' ); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>
