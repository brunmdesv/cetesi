<?php
/**
 * Template Name: Equipe CETESI
 * Description: Página institucional da equipe do CETESI.
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
                            $experiencia = get_post_meta(get_the_ID(), '_membro_experiencia', true);
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
                                <div class="membro-experiencia-moderno">
                                    <span class="experiencia-text">
                                        <i class="fas fa-clock"></i>
                                        <?php echo esc_html($experiencia ?: 'Experiência não informada'); ?>
                                    </span>
                            </div>
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
                                <div class="membro-experiencia-moderno">
                                    <span class="experiencia-text">
                                        <i class="fas fa-clock"></i>
                                        <?php echo esc_html($membro['experiencia']); ?>
                                    </span>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>

        <!-- Estatísticas da Equipe -->
        <section class="stats-section">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Profissionais Qualificados</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">80%</span>
                        <span class="stat-label">Mestres e Doutores</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">26+</span>
                        <span class="stat-label">Anos de Experiência Média</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Comprometimento com a Qualidade</span>
                    </div>
                </div>
            </div>
        </section>

    </main>
                </div>
                
<style>
/* Estilos para o novo layout da equipe */
.equipe-completa-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.equipe-section-header {
    text-align: center;
    margin-bottom: 60px;
}

.equipe-section-header h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1d2327;
    margin-bottom: 15px;
}

.equipe-section-header p {
    font-size: 1.1rem;
    color: #646970;
    max-width: 600px;
    margin: 0 auto;
}

.equipe-filters {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.equipe-filter-btn {
    background: white;
    border: 2px solid #e1e5e9;
    color: #646970;
    padding: 12px 24px;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
}

.equipe-filter-btn:hover,
.equipe-filter-btn.active {
    background: #2563eb;
    border-color: #2563eb;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
}

.equipe-grid-moderno {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.membro-card-moderno {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    opacity: 1;
    transform: scale(1);
}

.membro-card-moderno.hidden {
    opacity: 0;
    transform: scale(0.8);
    pointer-events: none;
}

.membro-card-moderno:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
}

.membro-card-inner {
    position: relative;
}

.membro-image-moderno {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.membro-image-moderno img,
.placeholder-image-moderno {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.placeholder-image-moderno {
    background: linear-gradient(135deg, #2563eb, #10b981);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 4rem;
}

.membro-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(37, 99, 235, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.membro-card-moderno:hover .membro-overlay {
    opacity: 1;
}

.membro-social-moderno {
    display: flex;
    gap: 20px;
}

.social-link-moderno {
    width: 50px;
    height: 50px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #2563eb;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.social-link-moderno:hover {
    background: #10b981;
    color: white;
    transform: scale(1.1);
}

.membro-content-moderno {
    padding: 30px;
}

.membro-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 15px;
}

.membro-nome {
    font-size: 1.3rem;
    font-weight: 700;
    color: #1d2327;
    margin: 0;
}

.membro-categoria-badge {
    background: #e1f5fe;
    color: #2563eb;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.membro-cargo-moderno {
    color: #2563eb;
    font-weight: 600;
    margin-bottom: 10px;
    font-size: 1rem;
}

.membro-formacao-moderno {
    color: #646970;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.membro-formacao-moderno i {
    color: #10b981;
}

.membro-bio-moderno {
    color: #646970;
    line-height: 1.6;
    margin-bottom: 15px;
    font-size: 0.95rem;
}

.membro-experiencia-moderno {
    border-top: 1px solid #e1e5e9;
    padding-top: 15px;
}

.experiencia-text {
    color: #646970;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.experiencia-text i {
    color: #f59e0b;
}


/* Responsivo */
@media (max-width: 768px) {
    .equipe-grid-moderno {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .equipe-filters {
        gap: 10px;
    }
    
    .equipe-filter-btn {
        padding: 10px 20px;
        font-size: 0.9rem;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .stat-content h3 {
        font-size: 2rem;
    }
}
</style>

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