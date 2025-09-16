<?php
/**
 * Template Name: Equipe CETESI
 * Description: Pígina institucional da equipe do CETESI.
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
                    <h1 class="hero-title">Conheça nossa <span class="highlight">Equipe</span></h1>
                    <p class="hero-description">
                        Profissionais qualificados e experientes, comprometidos com a excelência educacional e o sucesso de nossos alunos.
                    </p>
                </div>
            </div>
        </section>

        <!-- Equipe Completa - Layout Moderno -->
        <section class="equipe-completa-section">
            <div class="container">
                <!-- Filtros de Equipe -->
                <div class="equipe-filters">
                    <button class="equipe-filter-btn active" data-filter="todos">
                        <i class="fas fa-th"></i>
                        Todos
                    </button>
                    <button class="equipe-filter-btn" data-filter="direcao">
                        <i class="fas fa-crown"></i>
                         Direção
                    </button>
                    <button class="equipe-filter-btn" data-filter="coordenacao">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Coordenação
                    </button>
                    <button class="equipe-filter-btn" data-filter="docentes">
                        <i class="fas fa-graduation-cap"></i>
                        Docentes
                    </button>
                    <button class="equipe-filter-btn" data-filter="administrativo">
                        <i class="fas fa-briefcase"></i>
                        Administrativo
                    </button>
                </div>
                
                <!-- Grid de Equipe -->
                <div class="equipe-grid-moderno">
                    <?php
                    // Buscar todos os membros da equipe
                    $equipe_query = new WP_Query(array(
                        'post_type' => 'membro_equipe',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'orderby' => 'menu_order',
                        'order' => 'ASC'
                    ));
                    
                    if ($equipe_query->have_posts()) :
                        while ($equipe_query->have_posts()) : $equipe_query->the_post();
                            $cargo = get_post_meta(get_the_ID(), '_membro_cargo', true);
                            $formacao = get_post_meta(get_the_ID(), '_membro_formacao', true);
                            $email = get_post_meta(get_the_ID(), '_membro_email', true);
                            $telefone = get_post_meta(get_the_ID(), '_membro_telefone', true);
                            $linkedin = get_post_meta(get_the_ID(), '_membro_linkedin', true);
                            $bio = get_the_content(); // Biografia está no post_content
                            
                            // Determinar categoria baseada no cargo
                            $categoria = 'administrativo';
                            if (strpos(strtolower($cargo), 'diretor') !== false) {
                                $categoria = 'direcao';
                            } elseif (strpos(strtolower($cargo), 'coordenador') !== false) {
                                $categoria = 'coordenacao';
                            } elseif (strpos(strtolower($cargo), 'professor') !== false || strpos(strtolower($cargo), 'docente') !== false) {
                                $categoria = 'docentes';
                            }
                    ?>
                    <div class="membro-card-moderno" data-categoria="<?php echo esc_attr($categoria); ?>">
                        <div class="membro-card-inner">
                            <div class="membro-image-moderno">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                    <div class="placeholder-image-moderno">
                                        <i class="fas fa-user"></i>
                                </div>
                            <?php endif; ?>
                                <div class="membro-overlay">
                                    <div class="membro-social-moderno">
                                        <a href="<?php echo $linkedin ? esc_url($linkedin) : '#'; ?>" class="social-link-moderno" target="_blank" title="LinkedIn">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                        <a href="<?php echo $email ? 'mailto:' . esc_attr($email) : '#'; ?>" class="social-link-moderno" title="Email">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                            <div class="membro-content-moderno">
                                <div class="membro-header">
                                    <h3 class="membro-nome"><?php the_title(); ?></h3>
                                    <span class="membro-categoria-badge"><?php echo esc_html(ucfirst($categoria)); ?></span>
                </div>
                                <p class="membro-cargo-moderno"><?php echo esc_html($cargo ?: 'Cargo não informado'); ?></p>
                                <p class="membro-formacao-moderno">
                                    <i class="fas fa-graduation-cap"></i>
                                    <?php echo esc_html($formacao ?: 'Formação não informada'); ?>
                                </p>
                                <p class="membro-bio-moderno"><?php echo esc_html($bio ? wp_trim_words($bio, 15) : 'Biografia não informada'); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Membros padrão se não houver posts
                        $equipe_default = array(
                            array(
                                'nome' => 'Dr. João Silva',
                                'cargo' => 'Diretor Geral',
                                'formacao' => 'Doutor em Educação',
                                'experiencia' => 'Mais de 20 anos de experiência em educação profissional',
                                'categoria' => 'direcao',
                                'bio' => 'Líder visionário com vasta experiência em gestão educacional e desenvolvimento de políticas acadêmicas.'
                            ),
                            array(
                                'nome' => 'Dra. Maria Santos',
                                'cargo' => 'Diretora Acadêmica',
                                'formacao' => 'Doutora em Enfermagem',
                                'experiencia' => 'Especialista em metodologias de ensino na área da saúde',
                                'categoria' => 'direcao',
                                'bio' => 'Especialista em metodologias de ensino e desenvolvimento curricular na área da saúde.'
                            ),
                            array(
                                'nome' => 'Prof. Carlos Oliveira',
                                'cargo' => 'Coordenador de Enfermagem',
                                'formacao' => 'Mestre em Enfermagem',
                                'experiencia' => '26 anos de experiência clínica e docente',
                                'categoria' => 'coordenacao',
                                'bio' => 'Coordenador experiente com ampla vivência clínica e acadêmica na área de enfermagem.'
                            ),
                                array(
                                'nome' => 'Prof. Ana Costa',
                                'cargo' => 'Coordenadora de Radiologia',
                                'formacao' => 'Especialista em Radiologia',
                                'experiencia' => '12 anos de experiência em diagnóstico por imagem',
                                'categoria' => 'coordenacao',
                                'bio' => 'Especialista em técnicas radiológicas com vasta experiência em diagnóstico por imagem.'
                            ),
                            array(
                                'nome' => 'Prof. Roberto Lima',
                                'cargo' => 'Professor de Enfermagem',
                                'formacao' => 'Especialista em Enfermagem',
                                'experiencia' => '10 anos de experiência docente',
                                'categoria' => 'docentes',
                                'bio' => 'Professor dedicado com experiência prática e teórica em enfermagem.'
                            ),
                            array(
                                'nome' => 'Sra. Patricia Mendes',
                                'cargo' => 'Secretária Acadêmica',
                                'formacao' => 'Administração',
                                'experiencia' => '8 anos de experiência administrativa',
                                'categoria' => 'administrativo',
                                'bio' => 'Profissional dedicada ao atendimento e suporte aos alunos e professores.'
                            )
                        );
                        
                        foreach ($equipe_default as $membro) :
                    ?>
                    <div class="membro-card-moderno" data-categoria="<?php echo esc_attr($membro['categoria']); ?>">
                        <div class="membro-card-inner">
                            <div class="membro-image-moderno">
                                <div class="placeholder-image-moderno">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="membro-overlay">
                                    <div class="membro-social-moderno">
                                        <a href="#" class="social-link-moderno" title="LinkedIn">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                        <a href="#" class="social-link-moderno" title="Email">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                            <div class="membro-content-moderno">
                                <div class="membro-header">
                                    <h3 class="membro-nome"><?php echo esc_html($membro['nome']); ?></h3>
                                    <span class="membro-categoria-badge"><?php echo esc_html(ucfirst($membro['categoria'])); ?></span>
                </div>
                                <p class="membro-cargo-moderno"><?php echo esc_html($membro['cargo']); ?></p>
                                <p class="membro-formacao-moderno">
                                    <i class="fas fa-graduation-cap"></i>
                                    <?php echo esc_html($membro['formacao']); ?>
                                </p>
                                <p class="membro-bio-moderno"><?php echo esc_html($membro['bio']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>


    </main>
                </div>
                
<!-- CSS da página equipe movido para assets/css/page-equipe.css -->

<script>
jQuery(document).ready(function($) {
    // Filtro de equipe
    $('.equipe-filter-btn').on('click', function() {
        var filter = $(this).data('filter');
        
        // Atualizar botões ativos
        $('.equipe-filter-btn').removeClass('active');
        $(this).addClass('active');
        
        // Filtrar membros
        $('.membro-card-moderno').each(function() {
            var categoria = $(this).data('categoria');
            
            if (filter === 'todos' || categoria === filter) {
                $(this).removeClass('hidden');
            } else {
                $(this).addClass('hidden');
            }
        });
    });
});
</script>

<?php get_footer(); ?>


