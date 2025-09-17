<?php
/**
 * Template Name: Cursos CETESI
 * Description: Página de cursos do CETESI.
 *
 * @package CETESI
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">Conheça nossos <span class="highlight">Cursos</span></h1>
                    <p class="hero-description">
                        Oferecemos uma ampla gama de cursos técnicos, de qualificação, livres e online, reconhecidos pelo MEC e alinhados com as demandas do mercado de trabalho.
                    </p>
                </div>
            </div>
        </section>

        <!-- Filtros de Cursos -->
        <section class="cursos-filters-section">
            <div class="container">
                <div class="cursos-filters-content">
                    <div class="cursos-filters">
                        <button class="cursos-filter-btn active" data-filter="todos">
                            <i class="fas fa-th"></i>
                            Todos
                        </button>
                        <button class="cursos-filter-btn" data-filter="tecnicos">
                            <i class="fas fa-graduation-cap"></i>
                            Técnicos
                        </button>
                        <button class="cursos-filter-btn" data-filter="qualificacao">
                            <i class="fas fa-award"></i>
                            Qualificação
                        </button>
                        <button class="cursos-filter-btn" data-filter="livres">
                            <i class="fas fa-certificate"></i>
                            Livres
                        </button>
                        <button class="cursos-filter-btn" data-filter="online">
                            <i class="fas fa-laptop"></i>
                            Online
                        </button>
                        <button class="cursos-filter-btn" data-filter="educacao-basica">
                            <i class="fas fa-book-open"></i>
                            Educação Básica
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cursos Técnicos -->
        <section class="cursos-section" id="tecnicos">
            <div class="container">
                <div class="section-header">
                    <h2><?php _e('Cursos Técnicos', 'cetesi'); ?></h2>
                    <p><?php _e('Formação técnica completa reconhecida pelo MEC para atuação profissional qualificada.', 'cetesi'); ?></p>
                </div>
                
                <?php
                // Buscar cursos técnicos criados via página personalizada
                $cursos_tecnico_dinamicos = cetesi_get_dynamic_courses('tecnico', 20);
                
                if (!empty($cursos_tecnico_dinamicos)) :
                ?>
                <div class="cursos-grid-moderno" id="cursos-grid">
                    <?php foreach ($cursos_tecnico_dinamicos as $curso) : ?>
                        <?php echo cetesi_render_dynamic_course($curso, 'tecnico'); ?>
                    <?php endforeach; ?>
                </div>
                <?php else : ?>
                <div class="no-courses-message">
                    <div class="no-courses-content">
                        <i class="fas fa-graduation-cap"></i>
                        <h4><?php _e('Nenhum curso técnico disponível no momento', 'cetesi'); ?></h4>
                        <p><?php _e('Estamos trabalhando para disponibilizar novos cursos técnicos. Em breve teremos novidades!', 'cetesi'); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Cursos de Qualificação -->
        <section class="cursos-section" id="qualificacao">
            <div class="container">
                <div class="section-header">
                    <h2><?php _e('Cursos de Qualificação', 'cetesi'); ?></h2>
                    <p><?php _e('Especializações técnicas com foco em áreas específicas da saúde para aprimoramento profissional.', 'cetesi'); ?></p>
                </div>
                
                <?php
                // Buscar cursos de qualificação criados via página personalizada
                $cursos_qualificacao_dinamicos = cetesi_get_dynamic_courses('qualificacao', 20);
                
                if (!empty($cursos_qualificacao_dinamicos)) :
                ?>
                <div class="cursos-grid-moderno">
                    <?php foreach ($cursos_qualificacao_dinamicos as $curso) : ?>
                        <?php echo cetesi_render_dynamic_course($curso, 'qualificacao'); ?>
                    <?php endforeach; ?>
                </div>
                <?php else : ?>
                <div class="no-courses-message">
                    <div class="no-courses-content">
                        <i class="fas fa-award"></i>
                        <h4><?php _e('Nenhum curso de qualificação disponível no momento', 'cetesi'); ?></h4>
                        <p><?php _e('Estamos trabalhando para disponibilizar novos cursos de qualificação. Em breve teremos novidades!', 'cetesi'); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Cursos Livres -->
        <section class="cursos-section" id="livres">
            <div class="container">
                <div class="section-header">
                    <h2><?php _e('Cursos Livres', 'cetesi'); ?></h2>
                    <p><?php _e('Cursos de capacitação profissional com certificação reconhecida pelo mercado.', 'cetesi'); ?></p>
                </div>
                
                <?php
                // Buscar cursos livres criados via página personalizada
                $cursos_livre_dinamicos = cetesi_get_dynamic_courses('livre', 20);
                
                if (!empty($cursos_livre_dinamicos)) :
                ?>
                <div class="cursos-grid-moderno">
                    <?php foreach ($cursos_livre_dinamicos as $curso) : ?>
                        <?php echo cetesi_render_dynamic_course($curso, 'livre'); ?>
                    <?php endforeach; ?>
                </div>
                <?php else : ?>
                <div class="no-courses-message">
                    <div class="no-courses-content">
                        <i class="fas fa-certificate"></i>
                        <h4><?php _e('Nenhum curso livre disponível no momento', 'cetesi'); ?></h4>
                        <p><?php _e('Estamos trabalhando para disponibilizar novos cursos livres. Em breve teremos novidades!', 'cetesi'); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Cursos 100% Online -->
        <section class="cursos-section" id="online">
            <div class="container">
                <div class="section-header">
                    <h2><?php _e('Cursos 100% Online', 'cetesi'); ?></h2>
                    <p><?php _e('Formação profissional com flexibilidade total de horários e certificação reconhecida.', 'cetesi'); ?></p>
                </div>
                
                <?php
                // Buscar cursos online criados via página personalizada
                $cursos_online_dinamicos = cetesi_get_dynamic_courses('online', 20);
                
                if (!empty($cursos_online_dinamicos)) :
                ?>
                <div class="cursos-grid-moderno">
                    <?php foreach ($cursos_online_dinamicos as $curso) : ?>
                        <?php echo cetesi_render_dynamic_course($curso, 'online'); ?>
                    <?php endforeach; ?>
                </div>
                <?php else : ?>
                <div class="no-courses-message">
                    <div class="no-courses-content">
                        <i class="fas fa-laptop"></i>
                        <h4><?php _e('Nenhum curso online disponível no momento', 'cetesi'); ?></h4>
                        <p><?php _e('Estamos trabalhando para disponibilizar novos cursos online. Em breve teremos novidades!', 'cetesi'); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Educação Básica -->
        <section class="cursos-section" id="educacao-basica">
            <div class="container">
                <div class="section-header">
                    <h2><?php _e('Educação Básica • EJÁ - 3º segmento', 'cetesi'); ?></h2>
                    <p><?php _e('Educação de Jovens e Adultos com metodologia adaptada para diferentes níveis de ensino.', 'cetesi'); ?></p>
                </div>
                
                <?php
                // Buscar cursos de educação básica criados via página personalizada
                $cursos_educacao_dinamicos = cetesi_get_dynamic_courses('educacao-basica', 20);
                
                if (!empty($cursos_educacao_dinamicos)) :
                ?>
                <div class="cursos-grid-moderno">
                    <?php foreach ($cursos_educacao_dinamicos as $curso) : ?>
                        <?php echo cetesi_render_dynamic_course($curso, 'educacao-basica'); ?>
                    <?php endforeach; ?>
                </div>
                <?php else : ?>
                <div class="no-courses-message">
                    <div class="no-courses-content">
                        <i class="fas fa-book-open"></i>
                        <h4><?php _e('Nenhum curso de educação básica disponível no momento', 'cetesi'); ?></h4>
                        <p><?php _e('Estamos trabalhando para disponibilizar novos cursos de educação básica. Em breve teremos novidades!', 'cetesi'); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cursos-cta-section">
            <div class="container">
                <div class="cursos-cta-content">
                    <h2>Pronto para Começar sua Jornada?</h2>
                    <p>Não perca tempo! Entre em contato agora mesmo e dê o primeiro passo rumo ao sucesso profissional.</p>
                    <div class="cta-buttons">
                        <a href="<?php echo home_url('/contato'); ?>" class="button button-primary">
                            <i class="fas fa-phone"></i>
                            Fale Conosco
                        </a>
                        <a href="<?php echo home_url(); ?>" class="button button-secondary">
                            <i class="fas fa-home"></i>
                            Voltar ao Início
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>

<script>
// Sistema de Filtros - Adaptado para seções organizadas com cursos dinâmicos
jQuery(document).ready(function($) {
    console.log('Sistema de filtros carregado');
    console.log('Botões encontrados:', $('.cursos-filter-btn').length);
    console.log('Seções encontradas:', $('.cursos-section').length);
    
    // Filtro de cursos - Adaptado para seções com cursos dinâmicos
    $('.cursos-filter-btn').on('click', function() {
        var filter = $(this).data('filter');
        console.log('Filtro selecionado:', filter);
        
        // Atualizar botões ativos
        $('.cursos-filter-btn').removeClass('active');
        $(this).addClass('active');
        
        // Filtrar seções de cursos com efeito de transição
        $('.cursos-section').each(function() {
            var sectionId = $(this).attr('id');
            var $section = $(this);
            console.log('Seção:', sectionId, 'Filtro:', filter);
            
            if (filter === 'todos') {
                $section.show();
                // Mostrar cards dinâmicos
                $section.find('.curso-card').removeClass('hidden');
                console.log('Seção mostrada:', sectionId);
            } else if (sectionId === filter) {
                $section.show();
                // Mostrar cards dinâmicos
                $section.find('.curso-card').removeClass('hidden');
                console.log('Seção mostrada:', sectionId);
            } else {
                // Ocultar cards dinâmicos
                $section.find('.curso-card').addClass('hidden');
                // Depois ocultar seção
                setTimeout(function() {
                    $section.hide();
                }, 300);
                console.log('Seção ocultada:', sectionId);
            }
        });
        
        // Não fazer scroll automático - manter posição atual
    });
    
    // Garantir que todas as seções e cards estejam visíveis inicialmente
    $('.cursos-section').show();
    $('.curso-card').removeClass('hidden');
    
    // Adicionar animações de entrada para os cards dinâmicos
    $('.curso-card').each(function(index) {
        $(this).css({
            'opacity': '0',
            'transform': 'translateY(30px)',
            'transition': 'all 0.6s ease-out'
        });
        
        setTimeout(() => {
            $(this).css({
                'opacity': '1',
                'transform': 'translateY(0)'
            });
        }, index * 100);
    });
});
</script>
