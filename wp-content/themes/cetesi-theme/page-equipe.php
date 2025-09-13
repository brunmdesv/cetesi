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
        <section class="equipe-hero">
            <div class="container">
                <div class="equipe-hero-content">
                    <div class="hero-badge">
                        <i class="fas fa-users"></i>
                        Nossa Equipe
                    </div>
                    <h1 class="hero-title">Conheça nossa <span class="highlight">Equipe</span></h1>
                    <p class="hero-description">
                        Profissionais qualificados e experientes, comprometidos com a excelência educacional e o sucesso de nossos alunos.
                    </p>
                </div>
            </div>
        </section>

        <!-- Direção -->
        <section class="equipe-direcao-section">
            <div class="container">
                <div class="equipe-section-header">
                    <h2>Direção</h2>
                    <p>Liderança comprometida com a excelência educacional</p>
                </div>
                
                <div class="equipe-grid direcao-grid">
                    <?php
                    $direcao_query = new WP_Query(array(
                        'post_type' => 'membro_equipe',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'categoria_equipe',
                                'field'    => 'slug',
                                'terms'    => 'direcao',
                            ),
                        ),
                    ));
                    
                    if ($direcao_query->have_posts()) :
                        while ($direcao_query->have_posts()) : $direcao_query->the_post();
                            $cargo = get_post_meta(get_the_ID(), '_membro_cargo', true);
                            $formacao = get_post_meta(get_the_ID(), '_membro_formacao', true);
                            $experiencia = get_post_meta(get_the_ID(), '_membro_experiencia', true);
                            $email = get_post_meta(get_the_ID(), '_membro_email', true);
                            $linkedin = get_post_meta(get_the_ID(), '_membro_linkedin', true);
                    ?>
                    <div class="membro-card direcao">
                        <div class="membro-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <div class="placeholder-image">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="membro-content">
                            <h3><?php the_title(); ?></h3>
                            <?php if ($cargo) : ?>
                                <p class="membro-cargo"><?php echo esc_html($cargo); ?></p>
                            <?php endif; ?>
                            <?php if ($formacao) : ?>
                                <p class="membro-formacao"><?php echo esc_html($formacao); ?></p>
                            <?php endif; ?>
                            <?php if ($experiencia) : ?>
                                <p class="membro-experiencia"><?php echo esc_html($experiencia); ?></p>
                            <?php endif; ?>
                            <div class="membro-social">
                                <?php if ($linkedin) : ?>
                                    <a href="<?php echo esc_url($linkedin); ?>" class="social-link" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($email) : ?>
                                    <a href="mailto:<?php echo esc_attr($email); ?>" class="social-link">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Membros padrão se não houver posts
                        $direcao_default = array(
                            array('nome' => 'Dr. João Silva', 'cargo' => 'Diretor Geral', 'formacao' => 'Doutor em Educação', 'experiencia' => 'Mais de 20 anos de experiência em educação profissional'),
                            array('nome' => 'Dra. Maria Santos', 'cargo' => 'Diretora Acadêmica', 'formacao' => 'Doutora em Enfermagem', 'experiencia' => 'Especialista em metodologias de ensino na área da saúde'),
                        );
                        
                        foreach ($direcao_default as $membro) :
                    ?>
                    <div class="membro-card direcao">
                        <div class="membro-image">
                            <div class="placeholder-image">
                                <i class="fas fa-user-tie"></i>
                            </div>
                        </div>
                        <div class="membro-content">
                            <h3><?php echo esc_html($membro['nome']); ?></h3>
                            <p class="membro-cargo"><?php echo esc_html($membro['cargo']); ?></p>
                            <p class="membro-formacao"><?php echo esc_html($membro['formacao']); ?></p>
                            <p class="membro-experiencia"><?php echo esc_html($membro['experiencia']); ?></p>
                            <div class="membro-social">
                                <a href="#" class="social-link">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>

        <!-- Coordenação Pedagógica -->
        <section class="equipe-coordenacao-section">
            <div class="container">
                <div class="equipe-section-header">
                    <h2>Coordenação Pedagógica</h2>
                    <p>Especialistas em desenvolvimento curricular e acompanhamento acadêmico</p>
                </div>
                
                <div class="equipe-grid coordenacao-grid">
                    <?php
                    $coordenacao_query = new WP_Query(array(
                        'post_type' => 'membro_equipe',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'categoria_equipe',
                                'field'    => 'slug',
                                'terms'    => 'coordenacao',
                            ),
                        ),
                    ));
                    
                    if ($coordenacao_query->have_posts()) :
                        while ($coordenacao_query->have_posts()) : $coordenacao_query->the_post();
                            $cargo = get_post_meta(get_the_ID(), '_membro_cargo', true);
                            $formacao = get_post_meta(get_the_ID(), '_membro_formacao', true);
                            $experiencia = get_post_meta(get_the_ID(), '_membro_experiencia', true);
                            $email = get_post_meta(get_the_ID(), '_membro_email', true);
                            $linkedin = get_post_meta(get_the_ID(), '_membro_linkedin', true);
                    ?>
                    <div class="membro-card coordenacao">
                        <div class="membro-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <div class="placeholder-image">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="membro-content">
                            <h3><?php the_title(); ?></h3>
                            <?php if ($cargo) : ?>
                                <p class="membro-cargo"><?php echo esc_html($cargo); ?></p>
                            <?php endif; ?>
                            <?php if ($formacao) : ?>
                                <p class="membro-formacao"><?php echo esc_html($formacao); ?></p>
                            <?php endif; ?>
                            <?php if ($experiencia) : ?>
                                <p class="membro-experiencia"><?php echo esc_html($experiencia); ?></p>
                            <?php endif; ?>
                            <div class="membro-social">
                                <?php if ($linkedin) : ?>
                                    <a href="<?php echo esc_url($linkedin); ?>" class="social-link" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($email) : ?>
                                    <a href="mailto:<?php echo esc_attr($email); ?>" class="social-link">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Membros padrão se não houver posts
                        $coordenacao_default = array(
                            array('nome' => 'Prof. Carlos Oliveira', 'cargo' => 'Coordenador Pedagógico', 'formacao' => 'Mestre em Educação', 'experiencia' => '15 anos de experiência em coordenação pedagógica'),
                            array('nome' => 'Profª. Ana Costa', 'cargo' => 'Coordenadora de Estágios', 'formacao' => 'Especialista em Enfermagem', 'experiencia' => 'Especialista em supervisão de estágios clínicos'),
                        );
                        
                        foreach ($coordenacao_default as $membro) :
                    ?>
                    <div class="membro-card coordenacao">
                        <div class="membro-image">
                            <div class="placeholder-image">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                        </div>
                        <div class="membro-content">
                            <h3><?php echo esc_html($membro['nome']); ?></h3>
                            <p class="membro-cargo"><?php echo esc_html($membro['cargo']); ?></p>
                            <p class="membro-formacao"><?php echo esc_html($membro['formacao']); ?></p>
                            <p class="membro-experiencia"><?php echo esc_html($membro['experiencia']); ?></p>
                            <div class="membro-social">
                                <a href="#" class="social-link">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>

        <!-- Corpo Docente -->
        <section class="equipe-docente-section">
            <div class="container">
                <div class="equipe-section-header">
                    <h2>Corpo Docente</h2>
                    <p>Professores qualificados e experientes em suas áreas de atuação</p>
                </div>
                
                <div class="equipe-grid docente-grid">
                    <?php
                    // Buscar professores cadastrados no painel administrativo
                    $professores_cadastrados = cetesi_get_professores_cadastrados();
                    
                    if (!empty($professores_cadastrados)) :
                        foreach ($professores_cadastrados as $professor) :
                            $foto_url = '';
                            if (!empty($professor['foto'])) {
                                $foto_url = wp_get_attachment_image_url($professor['foto'], 'medium');
                            }
                    ?>
                    <div class="membro-card docente">
                        <div class="membro-image">
                            <?php if ($foto_url) : ?>
                                <img src="<?php echo esc_url($foto_url); ?>" alt="<?php echo esc_attr($professor['nome']); ?>" />
                            <?php else : ?>
                                <div class="placeholder-image">
                                    <i class="fas fa-user-md"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="membro-content">
                            <h3><?php echo esc_html($professor['nome']); ?></h3>
                            <?php if (!empty($professor['especialidade'])) : ?>
                                <p class="membro-cargo"><?php echo esc_html($professor['especialidade']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($professor['formacao'])) : ?>
                                <p class="membro-formacao"><?php echo esc_html($professor['formacao']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($professor['experiencia'])) : ?>
                                <p class="membro-experiencia"><?php echo esc_html($professor['experiencia']); ?> anos de experiência</p>
                            <?php endif; ?>
                            <?php if (!empty($professor['bio'])) : ?>
                                <p class="membro-bio"><?php echo wp_trim_words(esc_html($professor['bio']), 15, '...'); ?></p>
                            <?php endif; ?>
                            <div class="membro-social">
                                <?php if (!empty($professor['linkedin'])) : ?>
                                    <a href="<?php echo esc_url($professor['linkedin']); ?>" class="social-link" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($professor['email'])) : ?>
                                    <a href="mailto:<?php echo esc_attr($professor['email']); ?>" class="social-link">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endforeach;
                    else :
                        // Fallback: buscar do post type membro_equipe se não houver professores cadastrados
                        $docente_query = new WP_Query(array(
                            'post_type' => 'membro_equipe',
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'categoria_equipe',
                                    'field'    => 'slug',
                                    'terms'    => 'docente',
                                ),
                            ),
                        ));
                        
                        if ($docente_query->have_posts()) :
                            while ($docente_query->have_posts()) : $docente_query->the_post();
                                $cargo = get_post_meta(get_the_ID(), '_membro_cargo', true);
                                $formacao = get_post_meta(get_the_ID(), '_membro_formacao', true);
                                $experiencia = get_post_meta(get_the_ID(), '_membro_experiencia', true);
                                $email = get_post_meta(get_the_ID(), '_membro_email', true);
                                $linkedin = get_post_meta(get_the_ID(), '_membro_linkedin', true);
                        ?>
                        <div class="membro-card docente">
                            <div class="membro-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <div class="placeholder-image">
                                        <i class="fas fa-user-md"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="membro-content">
                                <h3><?php the_title(); ?></h3>
                                <?php if ($cargo) : ?>
                                    <p class="membro-cargo"><?php echo esc_html($cargo); ?></p>
                                <?php endif; ?>
                                <?php if ($formacao) : ?>
                                    <p class="membro-formacao"><?php echo esc_html($formacao); ?></p>
                                <?php endif; ?>
                                <?php if ($experiencia) : ?>
                                    <p class="membro-experiencia"><?php echo esc_html($experiencia); ?></p>
                                <?php endif; ?>
                                <div class="membro-social">
                                    <?php if ($linkedin) : ?>
                                        <a href="<?php echo esc_url($linkedin); ?>" class="social-link" target="_blank">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($email) : ?>
                                        <a href="mailto:<?php echo esc_attr($email); ?>" class="social-link">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php 
                            endwhile;
                            wp_reset_postdata();
                        else :
                            // Membros padrão se não houver nenhum professor
                            $docente_default = array(
                                array('nome' => 'Prof. Dr. Roberto Lima', 'cargo' => 'Professor de Enfermagem', 'formacao' => 'Doutor em Enfermagem', 'experiencia' => 'Especialista em UTI e Emergência'),
                                array('nome' => 'Profª. Dra. Fernanda Rocha', 'cargo' => 'Professora de Radiologia', 'formacao' => 'Doutora em Radiologia', 'experiencia' => 'Especialista em Tomografia e Ressonância'),
                                array('nome' => 'Prof. Dr. Marcos Pereira', 'cargo' => 'Professor de Nutrição', 'formacao' => 'Doutor em Nutrição', 'experiencia' => 'Especialista em Nutrição Clínica'),
                                array('nome' => 'Profª. Dra. Juliana Ferreira', 'cargo' => 'Professora de Segurança do Trabalho', 'formacao' => 'Doutora em Engenharia de Segurança', 'experiencia' => 'Especialista em Prevenção de Acidentes'),
                            );
                            
                            foreach ($docente_default as $membro) :
                        ?>
                        <div class="membro-card docente">
                            <div class="membro-image">
                                <div class="placeholder-image">
                                    <i class="fas fa-user-md"></i>
                                </div>
                            </div>
                            <div class="membro-content">
                                <h3><?php echo esc_html($membro['nome']); ?></h3>
                                <p class="membro-cargo"><?php echo esc_html($membro['cargo']); ?></p>
                                <p class="membro-formacao"><?php echo esc_html($membro['formacao']); ?></p>
                                <p class="membro-experiencia"><?php echo esc_html($membro['experiencia']); ?></p>
                                <div class="membro-social">
                                    <a href="#" class="social-link">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="social-link">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; endif; ?>
                </div>
            </div>
        </section>

        <!-- Equipe Administrativa -->
        <section class="equipe-administrativa-section">
            <div class="container">
                <div class="equipe-section-header">
                    <h2>Equipe Administrativa</h2>
                    <p>Profissionais dedicados ao suporte e funcionamento da instituição</p>
                </div>
                
                <div class="equipe-grid administrativa-grid">
                    <?php
                    $administrativa_query = new WP_Query(array(
                        'post_type' => 'membro_equipe',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'categoria_equipe',
                                'field'    => 'slug',
                                'terms'    => 'administrativa',
                            ),
                        ),
                    ));
                    
                    if ($administrativa_query->have_posts()) :
                        while ($administrativa_query->have_posts()) : $administrativa_query->the_post();
                            $cargo = get_post_meta(get_the_ID(), '_membro_cargo', true);
                            $formacao = get_post_meta(get_the_ID(), '_membro_formacao', true);
                            $experiencia = get_post_meta(get_the_ID(), '_membro_experiencia', true);
                            $email = get_post_meta(get_the_ID(), '_membro_email', true);
                            $linkedin = get_post_meta(get_the_ID(), '_membro_linkedin', true);
                    ?>
                    <div class="membro-card administrativa">
                        <div class="membro-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <div class="placeholder-image">
                                    <i class="fas fa-user-cog"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="membro-content">
                            <h3><?php the_title(); ?></h3>
                            <?php if ($cargo) : ?>
                                <p class="membro-cargo"><?php echo esc_html($cargo); ?></p>
                            <?php endif; ?>
                            <?php if ($formacao) : ?>
                                <p class="membro-formacao"><?php echo esc_html($formacao); ?></p>
                            <?php endif; ?>
                            <?php if ($experiencia) : ?>
                                <p class="membro-experiencia"><?php echo esc_html($experiencia); ?></p>
                            <?php endif; ?>
                            <div class="membro-social">
                                <?php if ($linkedin) : ?>
                                    <a href="<?php echo esc_url($linkedin); ?>" class="social-link" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($email) : ?>
                                    <a href="mailto:<?php echo esc_attr($email); ?>" class="social-link">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Membros padrão se não houver posts
                        $administrativa_default = array(
                            array('nome' => 'Patrícia Alves', 'cargo' => 'Secretária Geral', 'formacao' => 'Administração', 'experiencia' => '10 anos de experiência em secretaria escolar'),
                            array('nome' => 'Ricardo Mendes', 'cargo' => 'Coordenador de TI', 'formacao' => 'Ciência da Computação', 'experiencia' => 'Especialista em sistemas educacionais'),
                            array('nome' => 'Lucia Barbosa', 'cargo' => 'Assistente Financeiro', 'formacao' => 'Contabilidade', 'experiencia' => 'Especialista em gestão financeira educacional'),
                        );
                        
                        foreach ($administrativa_default as $membro) :
                    ?>
                    <div class="membro-card administrativa">
                        <div class="membro-image">
                            <div class="placeholder-image">
                                <i class="fas fa-user-cog"></i>
                            </div>
                        </div>
                        <div class="membro-content">
                            <h3><?php echo esc_html($membro['nome']); ?></h3>
                            <p class="membro-cargo"><?php echo esc_html($membro['cargo']); ?></p>
                            <p class="membro-formacao"><?php echo esc_html($membro['formacao']); ?></p>
                            <p class="membro-experiencia"><?php echo esc_html($membro['experiencia']); ?></p>
                            <div class="membro-social">
                                <a href="#" class="social-link">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>

        <!-- Estatísticas da Equipe -->
        <section class="equipe-stats-section">
            <div class="container">
                <div class="equipe-stats-grid">
                    <?php
                    $stats_professores = cetesi_get_professores_stats();
                    ?>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <span class="stat-number"><?php echo esc_html($stats_professores['total_professores_display']); ?></span>
                        <span class="stat-label">Professores Qualificados</span>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <span class="stat-number">80%</span>
                        <span class="stat-label">Mestres e Doutores</span>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <span class="stat-number"><?php echo esc_html($stats_professores['experiencia_media']); ?>+</span>
                        <span class="stat-label">Anos de Experiência Média</span>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Comprometimento com o Aluno</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Valores da Equipe -->
        <section class="equipe-valores-section">
            <div class="container">
                <div class="equipe-section-header">
                    <h2>Nossos Valores</h2>
                    <p>Princípios que norteiam o trabalho de nossa equipe</p>
                </div>
                
                <div class="valores-grid">
                    <div class="valor-card">
                        <div class="valor-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Comprometimento</h3>
                        <p>Dedicação total ao sucesso e desenvolvimento de nossos alunos.</p>
                    </div>
                    
                    <div class="valor-card">
                        <div class="valor-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3>Inovação</h3>
                        <p>Busca constante por metodologias inovadoras e tecnologias educacionais.</p>
                    </div>
                    
                    <div class="valor-card">
                        <div class="valor-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>Ética</h3>
                        <p>Conduta ética e transparente em todas as nossas ações e relacionamentos.</p>
                    </div>
                    
                    <div class="valor-card">
                        <div class="valor-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Excelência</h3>
                        <p>Compromisso com a qualidade e excelência em tudo que fazemos.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="equipe-cta-section">
            <div class="container">
                <div class="equipe-cta-content">
                    <h2>Faça Parte da Nossa Família!</h2>
                    <p>Junte-se a uma equipe comprometida com a educação de qualidade e o desenvolvimento profissional.</p>
                    <div class="cta-buttons">
                        <a href="<?php echo home_url('/cursos/'); ?>" class="button button-primary">
                            <i class="fas fa-graduation-cap"></i>
                            Conheça Nossos Cursos
                        </a>
                        <a href="<?php echo home_url('/contato/'); ?>" class="button button-secondary">
                            <i class="fas fa-phone"></i>
                            Fale Conosco
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
