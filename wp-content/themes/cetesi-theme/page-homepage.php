<?php
/**
 * Template da Homepage CETESI
 * 
 * @package CETESI
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main homepage">
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Transforme sua <span class="highlight">Carreira</span> com o CETESI</h1>
                <p>Centro Técnico de Educação Superior Integrada - Formando profissionais qualificados há mais de 15 anos com excelência acadêmica e infraestrutura moderna.</p>
                
                <div class="hero-badges">
                    <span class="badge"><i class="fas fa-certificate"></i> Reconhecido pelo MEC</span>
                    <span class="badge"><i class="fas fa-users"></i> +5.000 Alunos Formados</span>
                    <span class="badge"><i class="fas fa-award"></i> Excelência Acadêmica</span>
                    <span class="badge"><i class="fas fa-building"></i> Infraestrutura Moderna</span>
                </div>
                
                <div class="hero-buttons">
                    <a href="#cursos" class="btn-hero btn-hero-primary">
                        <i class="fas fa-graduation-cap"></i>
                        Ver Cursos
                    </a>
                    <a href="#contato" class="btn-hero btn-hero-secondary">
                        <i class="fas fa-phone"></i>
                        Fale Conosco
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Cursos Section -->
    <section id="cursos" class="cursos-section">
        <div class="container">
            <div class="section-header">
                <h2><?php _e('Nossos Cursos', 'cetesi'); ?></h2>
                <p><?php _e('Oferecemos uma ampla gama de cursos técnicos, livres e de qualificação, reconhecidos pelo MEC e alinhados com as demandas do mercado de trabalho.', 'cetesi'); ?></p>
            </div>
            
            <!-- Cursos Técnicos -->
            <div class="categoria-cursos">
                <h3 class="categoria-titulo">
                    <i class="fas fa-graduation-cap"></i>
                    <?php _e('Cursos Técnicos', 'cetesi'); ?>
                </h3>
                <div class="cursos-grid">
                    <?php
                    $cursos_tecnicos = cetesi_get_cursos_by_category('tecnicos', 4);
                    if ($cursos_tecnicos->have_posts()) :
                        while ($cursos_tecnicos->have_posts()) : $cursos_tecnicos->the_post();
                            $duracao = get_post_meta(get_the_ID(), '_curso_duracao', true);
                            $carga_horaria = get_post_meta(get_the_ID(), '_curso_carga_horaria', true);
                            $estagio = get_post_meta(get_the_ID(), '_curso_estagio', true);
                    ?>
                    <div class="curso-card tecnico">
                        <div class="curso-image">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div class="curso-content">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            <ul class="curso-features">
                                <li><?php echo $duracao ? esc_html($duracao) : '18 meses de duração'; ?></li>
                                <li><?php echo $carga_horaria ? esc_html($carga_horaria) : '1.200 horas de carga horária'; ?></li>
                                <li><?php echo $estagio ? esc_html($estagio) : '300 horas de estágio'; ?></li>
                                <li><?php _e('Reconhecido pelo MEC', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php the_permalink(); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Cursos padrão
                        $cursos_tecnicos_default = array(
                            array('title' => 'Técnico em Enfermagem em Ceilândia', 'icon' => 'fas fa-user-md'),
                            array('title' => 'Técnico em Radiologia', 'icon' => 'fas fa-x-ray'),
                            array('title' => 'Nutrição e Dietética', 'icon' => 'fas fa-apple-alt'),
                            array('title' => 'Segurança do Trabalho', 'icon' => 'fas fa-hard-hat'),
                        );
                        
                        foreach ($cursos_tecnicos_default as $curso) :
                    ?>
                    <div class="curso-card tecnico">
                        <div class="curso-image">
                            <i class="<?php echo esc_attr($curso['icon']); ?>"></i>
                        </div>
                        <div class="curso-content">
                            <h3><?php echo esc_html($curso['title']); ?></h3>
                            <p><?php _e('Formação completa para atuar na área da saúde com competência técnica e ética profissional.', 'cetesi'); ?></p>
                            <ul class="curso-features">
                                <li><?php _e('18 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('1.200 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('300 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Reconhecido pelo MEC', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
            
            <!-- Cursos de Qualificação -->
            <div class="categoria-cursos">
                <h3 class="categoria-titulo">
                    <i class="fas fa-award"></i>
                    <?php _e('Cursos de Qualificação', 'cetesi'); ?>
                </h3>
                <div class="cursos-grid qualificacao">
                    <?php
                    $cursos_qualificacao = cetesi_get_cursos_by_category('qualificacao', 4);
                    if ($cursos_qualificacao->have_posts()) :
                        while ($cursos_qualificacao->have_posts()) : $cursos_qualificacao->the_post();
                            $duracao = get_post_meta(get_the_ID(), '_curso_duracao', true);
                            $carga_horaria = get_post_meta(get_the_ID(), '_curso_carga_horaria', true);
                            $estagio = get_post_meta(get_the_ID(), '_curso_estagio', true);
                    ?>
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="curso-content">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            <ul class="curso-features">
                                <li><?php echo $duracao ? esc_html($duracao) : '6 meses de duração'; ?></li>
                                <li><?php echo $carga_horaria ? esc_html($carga_horaria) : '360 horas de carga horária'; ?></li>
                                <li><?php echo $estagio ? esc_html($estagio) : 'Prática e Simulação'; ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php the_permalink(); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Cursos padrão
                        $cursos_qualificacao_default = array(
                            array('title' => 'Qualificação em Gesso Ortopédico', 'icon' => 'fas fa-bone'),
                            array('title' => 'Hemodiálise', 'icon' => 'fas fa-heartbeat'),
                            array('title' => 'Instrumentação Cirúrgica', 'icon' => 'fas fa-cut'),
                            array('title' => 'Qualificação em Enfermagem do Trabalho', 'icon' => 'fas fa-briefcase'),
                            array('title' => 'Qualificação em Necropsia', 'icon' => 'fas fa-search'),
                            array('title' => 'APH - Atendimento Pré-Hospitalar', 'icon' => 'fas fa-ambulance'),
                            array('title' => 'Saúde Bucal', 'icon' => 'fas fa-tooth'),
                            array('title' => 'Cuidador de Idosos', 'icon' => 'fas fa-heart'),
                            array('title' => 'Atendente de Farmácia', 'icon' => 'fas fa-pills'),
                            array('title' => 'Análise Clínicas', 'icon' => 'fas fa-microscope'),
                            array('title' => 'Administração de Serviço Hospitalar', 'icon' => 'fas fa-hospital'),
                            array('title' => 'Sala de Vacina', 'icon' => 'fas fa-syringe'),
                            array('title' => 'Maqueiro', 'icon' => 'fas fa-wheelchair'),
                            array('title' => 'Estudo da Radiologia e Tórax', 'icon' => 'fas fa-x-ray'),
                            array('title' => 'Agente Comunitário', 'icon' => 'fas fa-users'),
                            array('title' => 'Flebotomia', 'icon' => 'fas fa-tint'),
                            array('title' => 'Saúde Mental', 'icon' => 'fas fa-brain'),
                        );
                        
                        foreach ($cursos_qualificacao_default as $curso) :
                    ?>
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="<?php echo esc_attr($curso['icon']); ?>"></i>
                        </div>
                        <div class="curso-content">
                            <h3><?php echo esc_html($curso['title']); ?></h3>
                            <p><?php _e('Especialização técnica com foco na prática profissional e mercado de trabalho.', 'cetesi'); ?></p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('360 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('Prática e Simulação', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
            
            <!-- Cursos Livres -->
            <div class="categoria-cursos">
                <h3 class="categoria-titulo">
                    <i class="fas fa-certificate"></i>
                    <?php _e('Cursos Livres', 'cetesi'); ?>
                </h3>
                <div class="cursos-grid livres">
                    <?php
                    $cursos_livres = cetesi_get_cursos_by_category('livres', 4);
                    if ($cursos_livres->have_posts()) :
                        while ($cursos_livres->have_posts()) : $cursos_livres->the_post();
                    ?>
                    <div class="curso-card livre">
                        <div class="curso-image">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="curso-content">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php the_permalink(); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Cursos padrão
                        $cursos_livres_default = array(
                            array('title' => 'Feridas e Curativos', 'icon' => 'fas fa-band-aid'),
                            array('title' => 'Cálculo de Medicação', 'icon' => 'fas fa-calculator'),
                            array('title' => 'Punção Venosa', 'icon' => 'fas fa-tint'),
                        );
                        
                        foreach ($cursos_livres_default as $curso) :
                    ?>
                    <div class="curso-card livre">
                        <div class="curso-image">
                            <i class="<?php echo esc_attr($curso['icon']); ?>"></i>
                        </div>
                        <div class="curso-content">
                            <h3><?php echo esc_html($curso['title']); ?></h3>
                            <p><?php _e('Formação especializada com foco prático e aplicação imediata no mercado de trabalho.', 'cetesi'); ?></p>
                            <ul class="curso-features">
                                <li><?php _e('3 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('200 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('50 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
            
            <!-- Educação Básica -->
            <div class="categoria-cursos">
                <h3 class="categoria-titulo">
                    <i class="fas fa-book"></i>
                    <?php _e('Educação Básica', 'cetesi'); ?>
                </h3>
                <div class="cursos-grid">
                    <?php
                    $cursos_eja = cetesi_get_cursos_by_category('educacao-basica', 3);
                    if ($cursos_eja->have_posts()) :
                        while ($cursos_eja->have_posts()) : $cursos_eja->the_post();
                            $duracao = get_post_meta(get_the_ID(), '_curso_duracao', true);
                            $carga_horaria = get_post_meta(get_the_ID(), '_curso_carga_horaria', true);
                    ?>
                    <div class="curso-card eja">
                        <div class="curso-image">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="curso-content">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            <ul class="curso-features">
                                <li><?php echo $duracao ? esc_html($duracao) : '1 ano de duração'; ?></li>
                                <li><?php echo $carga_horaria ? esc_html($carga_horaria) : '800 horas de carga horária'; ?></li>
                                <li><?php _e('Metodologia adaptada', 'cetesi'); ?></li>
                                <li><?php _e('Certificação válida', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php the_permalink(); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Cursos padrão
                        $cursos_eja_default = array(
                            array('title' => 'EJA - 1ª, 2ª, 3ª Série', 'icon' => 'fas fa-graduation-cap'),
                        );
                        
                        foreach ($cursos_eja_default as $curso) :
                    ?>
                    <div class="curso-card eja">
                        <div class="curso-image">
                            <i class="<?php echo esc_attr($curso['icon']); ?>"></i>
                        </div>
                        <div class="curso-content">
                            <h3><?php echo esc_html($curso['title']); ?></h3>
                            <p><?php _e('Educação de Jovens e Adultos com metodologia adaptada para diferentes níveis.', 'cetesi'); ?></p>
                            <ul class="curso-features">
                                <li><?php _e('Flexibilidade de horários', 'cetesi'); ?></li>
                                <li><?php _e('Metodologia adaptada', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                                <li><?php _e('Suporte pedagógico', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
            
            <!-- Cursos 100% Online -->
            <div class="categoria-cursos">
                <h3 class="categoria-titulo">
                    <i class="fas fa-laptop"></i>
                    <?php _e('Cursos 100% Online', 'cetesi'); ?>
                </h3>
                <div class="cursos-grid">
                    <?php
                    $cursos_online = cetesi_get_cursos_by_category('online', 4);
                    if ($cursos_online->have_posts()) :
                        while ($cursos_online->have_posts()) : $cursos_online->the_post();
                            $duracao = get_post_meta(get_the_ID(), '_curso_duracao', true);
                            $carga_horaria = get_post_meta(get_the_ID(), '_curso_carga_horaria', true);
                            $estagio = get_post_meta(get_the_ID(), '_curso_estagio', true);
                            $modalidade = get_post_meta(get_the_ID(), '_curso_modalidade', true);
                    ?>
                    <div class="curso-card online">
                        <div class="curso-image">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="curso-content">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            <ul class="curso-features">
                                <li><?php _e('Modalidade 100% Online', 'cetesi'); ?></li>
                                <li><?php _e('Flexibilidade total', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                                <li><?php _e('Suporte especializado', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php the_permalink(); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Cursos padrão se não houver posts
                        $cursos_online_default = array(
                            array('title' => 'Home Care', 'icon' => 'fas fa-home'),
                            array('title' => 'UTI - Emergência e Urgência', 'icon' => 'fas fa-ambulance'),
                        );
                        
                        foreach ($cursos_online_default as $curso) :
                    ?>
                    <div class="curso-card online">
                        <div class="curso-image">
                            <i class="<?php echo esc_attr($curso['icon']); ?>"></i>
                        </div>
                        <div class="curso-content">
                            <h3><?php echo esc_html($curso['title']); ?></h3>
                            <p><?php _e('Especialização em técnicas modernas com flexibilidade total de horários.', 'cetesi'); ?></p>
                            <ul class="curso-features">
                                <li><?php _e('Modalidade 100% Online', 'cetesi'); ?></li>
                                <li><?php _e('Flexibilidade total', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                                <li><?php _e('Suporte especializado', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Diferenciais Section -->
    <section id="diferenciais" class="diferenciais-section">
        <div class="container">
            <div class="section-header">
                <h2><?php _e('Por que escolher o CETESI?', 'cetesi'); ?></h2>
                <p><?php _e('Descubra os diferenciais que fazem do CETESI a melhor escolha para sua formação técnica.', 'cetesi'); ?></p>
            </div>
            
            <div class="diferenciais-grid">
                <div class="diferencial-card">
                    <div class="diferencial-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3><?php _e('Excelência Acadêmica', 'cetesi'); ?></h3>
                    <p><?php _e('Corpo docente qualificado e metodologia de ensino inovadora para garantir o melhor aprendizado.', 'cetesi'); ?></p>
                </div>
                
                <div class="diferencial-card">
                    <div class="diferencial-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3><?php _e('Infraestrutura Moderna', 'cetesi'); ?></h3>
                    <p><?php _e('Laboratórios equipados com tecnologia de ponta e ambientes preparados para prática profissional.', 'cetesi'); ?></p>
                </div>
                
                <div class="diferencial-card">
                    <div class="diferencial-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3><?php _e('Inserção no Mercado', 'cetesi'); ?></h3>
                    <p><?php _e('Parcerias com empresas e programa de estágios que facilitam a inserção no mercado de trabalho.', 'cetesi'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Estatísticas Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number">5000+</span>
                    <span class="stat-label"><?php _e('Alunos Formados', 'cetesi'); ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number">95%</span>
                    <span class="stat-label"><?php _e('Taxa de Aprovação', 'cetesi'); ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number">15</span>
                    <span class="stat-label"><?php _e('Anos de Experiência', 'cetesi'); ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number">24</span>
                    <span class="stat-label"><?php _e('Cursos Disponíveis', 'cetesi'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contato" class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2><?php _e('Pronto para Transformar sua Carreira?', 'cetesi'); ?></h2>
                <p><?php _e('Não perca tempo! Entre em contato conosco e descubra como podemos ajudar você a alcançar seus objetivos profissionais.', 'cetesi'); ?></p>
                
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="btn-hero btn-hero-primary">
                        <i class="fas fa-graduation-cap"></i>
                        <?php _e('Inscrever-se', 'cetesi'); ?>
                    </a>
                    <a href="tel:<?php echo esc_attr(get_theme_mod('cetesi_phone', '(11) 99999-9999')); ?>" class="btn-hero btn-hero-phone">
                        <i class="fas fa-phone"></i>
                        <?php _e('Ligar Agora', 'cetesi'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
