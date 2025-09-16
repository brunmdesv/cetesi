<?php
/**
 * Template da Homepage CETESI
 * 
 * @package CETESI
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main homepage">
    <!-- Hero Section Ultra Moderna -->
    <section class="hero-section-ultra-moderno">
        
        <div class="container">
            <div class="hero-content-ultra">
                <div class="hero-main-content">
                    <!-- Título e Descrição Ultra Modernos -->
                    <div class="hero-header-ultra" data-aos="fade-up" data-aos-delay="100">
                        <h1 class="hero-titulo-ultra">Transforme sua <span class="highlight-ultra">Carreira</span> com o CETESI</h1>
                        <p class="hero-descricao-ultra">Centro Técnico de Educação Superior Integrada - Formando profissionais qualificados há mais de 26 anos com excelência acadêmica e infraestrutura moderna.</p>
                    </div>
                    
                    <!-- Badges Ultra Modernos -->
                    <div class="hero-badges-ultra" data-aos="fade-up" data-aos-delay="200">
                        <div class="badge-ultra badge-certificado-ultra" data-aos="zoom-in" data-aos-delay="300">
                            <div class="badge-icon">
                                <i class="fas fa-certificate"></i>
                            </div>
                            <span class="badge-text">Reconhecido pelo MEC</span>
                        </div>
                        
                        <div class="badge-ultra badge-alunos-ultra" data-aos="zoom-in" data-aos-delay="400">
                            <div class="badge-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <span class="badge-text">+60.000 Alunos Formados</span>
                        </div>
                        
                        <div class="badge-ultra badge-excelencia-ultra" data-aos="zoom-in" data-aos-delay="500">
                            <div class="badge-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <span class="badge-text">Excelência Acadêmica</span>
                        </div>
                        
                        <div class="badge-ultra badge-infraestrutura-ultra" data-aos="zoom-in" data-aos-delay="600">
                            <div class="badge-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <span class="badge-text">Infraestrutura Moderna</span>
                        </div>
                    </div>
                    
                    <!-- CTA Ultra Moderno -->
                    <div class="cta-botoes-ultra" data-aos="fade-up" data-aos-delay="700">
                        <a href="#cursos" class="btn-hero-principal-ultra">
                            <div class="btn-content-ultra">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Ver Cursos</span>
                            </div>
                            <div class="btn-shine-ultra"></div>
                        </a>
                        <a href="#contato" class="btn-hero-secundario-ultra">
                            <div class="btn-content-ultra">
                                <i class="fas fa-phone"></i>
                                <span>Fale Conosco</span>
                            </div>
                        </a>
                    </div>
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
                
                <?php
                // Buscar cursos técnicos criados via página personalizada
                $cursos_tecnico_dinamicos = cetesi_get_dynamic_courses('tecnico', 20);
                
                if (!empty($cursos_tecnico_dinamicos)) :
                ?>
                <div class="cursos-grid">
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
                    
            <!-- Cursos de Qualificação -->
            <div class="categoria-cursos">
                <h3 class="categoria-titulo">
                    <i class="fas fa-award"></i>
                    <?php _e('Cursos de Qualificação', 'cetesi'); ?>
                </h3>
                
                <?php
                // Buscar cursos de qualificação criados via página personalizada
                $cursos_qualificacao_dinamicos = cetesi_get_dynamic_courses('qualificacao', 20);
                
                if (!empty($cursos_qualificacao_dinamicos)) :
                ?>
                <div class="cursos-grid qualificacao">
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
            
            <!-- Cursos Livres -->
            <div class="categoria-cursos">
                <h3 class="categoria-titulo">
                    <i class="fas fa-certificate"></i>
                    <?php _e('Cursos Livres', 'cetesi'); ?>
                </h3>
                
                <?php
                // Buscar cursos livres criados via página personalizada
                $cursos_livre_dinamicos = cetesi_get_dynamic_courses('livre', 20);
                
                if (!empty($cursos_livre_dinamicos)) :
                ?>
                <div class="cursos-grid livres">
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
                    
            <!-- Cursos 100% Online -->
            <div class="categoria-cursos">
                <h3 class="categoria-titulo">
                    <i class="fas fa-laptop"></i>
                    <?php _e('Cursos 100% Online', 'cetesi'); ?>
                </h3>
                
                <?php
                // Buscar cursos online criados via página personalizada
                $cursos_online_dinamicos = cetesi_get_dynamic_courses('online', 20);
                
                if (!empty($cursos_online_dinamicos)) :
                ?>
                <div class="cursos-grid">
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
            
            <!-- Educação Básica -->
            <div class="categoria-cursos">
                <h3 class="categoria-titulo">
                    <i class="fas fa-book-open"></i>
                    <?php _e('Educação Básica • EJÁ - 3º segmento', 'cetesi'); ?>
                </h3>
                
                <?php
                // Buscar cursos de educação básica criados via página personalizada
                $cursos_educacao_dinamicos = cetesi_get_dynamic_courses('educacao-basica', 20);
                
                if (!empty($cursos_educacao_dinamicos)) :
                ?>
                <div class="cursos-grid educacao-basica">
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
        </div>
    </section>

    <!-- Localização Section -->
    <section id="localizacao" class="localizacao-section">
        <div class="container">
            <div class="section-header">
                <h2><?php _e('CETESI em Ceilândia, Brasília - DF', 'cetesi'); ?></h2>
                <p><?php _e('Localizada estrategicamente em Ceilândia, oferecemos cursos técnicos em saúde com excelência no Distrito Federal', 'cetesi'); ?></p>
            </div>
            <div class="localizacao-content-moderno">
                <!-- Card Principal de Endereço -->
                <div class="endereco-card-moderno">
                    <div class="endereco-header">
                        <div class="endereco-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3><?php _e('Nossa Localização', 'cetesi'); ?></h3>
                    </div>
                    <div class="endereco-detalhes">
                        <div class="endereco-linha">
                            <i class="fas fa-building"></i>
                            <span><?php _e('QNN 02, St. N Qnn 2 Conjunto e, LOTE 04 - Sala 102', 'cetesi'); ?></span>
                        </div>
                        <div class="endereco-linha">
                            <i class="fas fa-city"></i>
                            <span><?php _e('Ceilândia, Brasília - DF', 'cetesi'); ?></span>
                        </div>
                        <div class="endereco-linha">
                            <i class="fas fa-mail-bulk"></i>
                            <span><?php _e('CEP: 72220-025', 'cetesi'); ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- Card de Facilidades -->
                <div class="facilidades-card">
                    <div class="facilidades-header">
                        <div class="facilidades-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3><?php _e('Facilidades de Acesso', 'cetesi'); ?></h3>
                    </div>
                    <div class="facilidades-grid">
                        <div class="facilidade-item">
                            <i class="fas fa-bus"></i>
                            <span><?php _e('Transporte Público', 'cetesi'); ?></span>
                            <small><?php _e('Fácil acesso por ônibus', 'cetesi'); ?></small>
                        </div>
                        <div class="facilidade-item">
                            <i class="fas fa-car"></i>
                            <span><?php _e('Estacionamento', 'cetesi'); ?></span>
                            <small><?php _e('Vagas disponíveis', 'cetesi'); ?></small>
                        </div>
                        <div class="facilidade-item">
                            <i class="fas fa-subway"></i>
                            <span><?php _e('Metrô', 'cetesi'); ?></span>
                            <small><?php _e('Próximo à estação', 'cetesi'); ?></small>
                        </div>
                        <div class="facilidade-item">
                            <i class="fas fa-clock"></i>
                            <span><?php _e('Horário', 'cetesi'); ?></span>
                            <small><?php _e('Seg-Sex: 8h às 18h', 'cetesi'); ?></small>
                        </div>
                    </div>
                </div>
                
                <!-- Card de Ações -->
                <div class="acoes-card">
                    <div class="acoes-header">
                        <div class="acoes-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3><?php _e('Entre em Contato', 'cetesi'); ?></h3>
                    </div>
                    <div class="acoes-buttons">
                        <a href="https://maps.app.goo.gl/BtrBP6btCBaYzEBfA" target="_blank" class="btn-acao btn-maps-moderno" rel="noopener">
                            <i class="fas fa-map-marked-alt"></i>
                            <span><?php _e('Ver no Google Maps', 'cetesi'); ?></span>
                        </a>
                        <a href="tel:6133514511" class="btn-acao btn-ligar-moderno">
                            <i class="fas fa-phone"></i>
                            <span><?php _e('Ligar Agora', 'cetesi'); ?></span>
                        </a>
                    </div>
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
                    <span class="stat-number">60.000+</span>
                    <span class="stat-label"><?php _e('Alunos Formados', 'cetesi'); ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number">98%</span>
                    <span class="stat-label"><?php _e('Taxa de Aprovação', 'cetesi'); ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number">25</span>
                    <span class="stat-label"><?php _e('Anos de Experiência', 'cetesi'); ?></span>
                </div>
                
                <div class="stat-item">
                    <span class="stat-number">30+</span>
                    <span class="stat-label"><?php _e('Cursos Disponíveis', 'cetesi'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Depoimentos Section -->
    <section class="depoimentos-section">
        <div class="container">
            <div class="section-header">
                <h2><?php _e('O que nossos alunos dizem', 'cetesi'); ?></h2>
                <p><?php _e('Conheça as experiências de quem já transformou sua carreira conosco', 'cetesi'); ?></p>
            </div>
            
            <div class="depoimentos-grid">
                <div class="depoimento-card">
                    <div class="depoimento-content">
                        <div class="depoimento-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="depoimento-text"><?php _e('"O CETESI transformou completamente minha carreira. O curso de Enfermagem me deu toda a base teórica e prática necessária para atuar com excelência no mercado de trabalho."', 'cetesi'); ?></p>
                    </div>
                    <div class="depoimento-author">
                        <div class="depoimento-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="depoimento-info">
                            <h4><?php _e('Maria Silva', 'cetesi'); ?></h4>
                            <span><?php _e('Enfermeira - Hospital São Paulo', 'cetesi'); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="depoimento-card">
                    <div class="depoimento-content">
                        <div class="depoimento-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="depoimento-text"><?php _e('"Professores excelentes e infraestrutura de primeira qualidade. Consegui minha certificação logo após concluir o curso e já estou trabalhando na área."', 'cetesi'); ?></p>
                    </div>
                    <div class="depoimento-author">
                        <div class="depoimento-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="depoimento-info">
                            <h4><?php _e('João Santos', 'cetesi'); ?></h4>
                            <span><?php _e('Técnico em Radiologia - Clínica Diagnóstica', 'cetesi'); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="depoimento-card">
                    <div class="depoimento-content">
                        <div class="depoimento-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="depoimento-text"><?php _e('"A metodologia de ensino do CETESI é excepcional. Aprendi muito mais do que esperava e me sinto preparada para qualquer desafio profissional."', 'cetesi'); ?></p>
                    </div>
                    <div class="depoimento-author">
                        <div class="depoimento-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="depoimento-info">
                            <h4><?php _e('Ana Costa', 'cetesi'); ?></h4>
                            <span><?php _e('Fisioterapeuta - Centro de Reabilitação', 'cetesi'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Notícias/Blog Section -->
    <section class="noticias-section">
        <div class="container">
            <div class="section-header">
                <h2><?php _e('Últimas Notícias e Artigos', 'cetesi'); ?></h2>
                <p><?php _e('Fique por dentro das novidades, dicas e informações importantes para sua carreira', 'cetesi'); ?></p>
            </div>
            
            <?php
            // Query para buscar os posts mais recentes
            $recent_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if ($recent_posts->have_posts()) :
            ?>
            <div class="noticias-grid">
                <?php
                $post_count = 0;
                while ($recent_posts->have_posts()) : $recent_posts->the_post();
                    $post_count++;
                    $is_destaque = ($post_count === 1);
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? $categories[0]->name : 'Geral';
                    $category_slug = !empty($categories) ? $categories[0]->slug : 'geral';
                    
                    // Ícones baseados na categoria
                    $category_icons = array(
                        'educacao' => 'fas fa-graduation-cap',
                        'carreira' => 'fas fa-briefcase',
                        'eventos' => 'fas fa-users',
                        'destaque' => 'fas fa-star',
                        'geral' => 'fas fa-newspaper'
                    );
                    
                    $icon = isset($category_icons[$category_slug]) ? $category_icons[$category_slug] : 'fas fa-newspaper';
                    
                    // Tempo de leitura estimado (baseado no número de palavras)
                    $word_count = str_word_count(strip_tags(get_the_content()));
                    $read_time = max(1, round($word_count / 200)); // 200 palavras por minuto
                ?>
                <article class="noticia-card <?php echo $is_destaque ? 'noticia-destaque' : ''; ?>">
                    <div class="noticia-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array('class' => 'noticia-thumbnail')); ?>
                        <?php else : ?>
                            <div class="noticia-placeholder">
                                <i class="<?php echo $icon; ?>"></i>
                            </div>
                        <?php endif; ?>
                        <div class="noticia-category">
                            <span><?php echo esc_html($category_name); ?></span>
                        </div>
                    </div>
                    <div class="noticia-content">
                        <div class="noticia-meta">
                            <span class="noticia-date">
                                <i class="fas fa-calendar-alt"></i>
                                <?php echo get_the_date('d/m/Y'); ?>
                            </span>
                            <span class="noticia-read-time">
                                <i class="fas fa-clock"></i>
                                <?php echo $read_time; ?> min
                            </span>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                        <a href="<?php the_permalink(); ?>" class="noticia-link">
                            <?php _e('Ler mais', 'cetesi'); ?>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                <?php endwhile; ?>
                
                <!-- Card CTA integrado no grid -->
                <div class="noticia-card noticia-cta-card">
                    <div class="noticia-cta-content">
                        <div class="noticia-cta-buttons">
                            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-primary">
                                <i class="fas fa-newspaper"></i>
                                <?php _e('Ver Todas as Notícias', 'cetesi'); ?>
                            </a>
                            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>?subscribe=1" class="btn btn-outline">
                                <i class="fas fa-bell"></i>
                                <?php _e('Receber Notificações', 'cetesi'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
            else :
                // Fallback se não houver posts
            ?>
            <div class="noticias-grid">
                <article class="noticia-card noticia-destaque">
                    <div class="noticia-image">
                        <div class="noticia-placeholder">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="noticia-category">
                            <span><?php _e('Destaque', 'cetesi'); ?></span>
                        </div>
                    </div>
                    <div class="noticia-content">
                        <div class="noticia-meta">
                            <span class="noticia-date">
                                <i class="fas fa-calendar-alt"></i>
                                <?php echo date('d/m/Y'); ?>
                            </span>
                            <span class="noticia-read-time">
                                <i class="fas fa-clock"></i>
                                5 min
                            </span>
                        </div>
                        <h3><?php _e('Novo Curso de Especialização em Enfermagem Intensiva', 'cetesi'); ?></h3>
                        <p><?php _e('O CETESI lança curso inédito para profissionais que desejam se especializar em cuidados intensivos e emergência.', 'cetesi'); ?></p>
                        <a href="#" class="noticia-link">
                            <?php _e('Ler mais', 'cetesi'); ?>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                
                <article class="noticia-card">
                    <div class="noticia-image">
                        <div class="noticia-placeholder">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="noticia-category">
                            <span><?php _e('Educação', 'cetesi'); ?></span>
                        </div>
                    </div>
                    <div class="noticia-content">
                        <div class="noticia-meta">
                            <span class="noticia-date">
                                <i class="fas fa-calendar-alt"></i>
                                <?php echo date('d/m/Y', strtotime('-2 days')); ?>
                            </span>
                            <span class="noticia-read-time">
                                <i class="fas fa-clock"></i>
                                3 min
                            </span>
                        </div>
                        <h3><?php _e('Dicas para se Preparar para o Exame do COREN', 'cetesi'); ?></h3>
                        <p><?php _e('Confira as melhores estratégias de estudo e preparação para conquistar sua aprovação no conselho profissional.', 'cetesi'); ?></p>
                        <a href="#" class="noticia-link">
                            <?php _e('Ler mais', 'cetesi'); ?>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                
                <article class="noticia-card">
                    <div class="noticia-image">
                        <div class="noticia-placeholder">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="noticia-category">
                            <span><?php _e('Carreira', 'cetesi'); ?></span>
                        </div>
                    </div>
                    <div class="noticia-content">
                        <div class="noticia-meta">
                            <span class="noticia-date">
                                <i class="fas fa-calendar-alt"></i>
                                <?php echo date('d/m/Y', strtotime('-5 days')); ?>
                            </span>
                            <span class="noticia-read-time">
                                <i class="fas fa-clock"></i>
                                4 min
                            </span>
                        </div>
                        <h3><?php _e('Mercado de Trabalho em Saúde: Oportunidades 2024', 'cetesi'); ?></h3>
                        <p><?php _e('Análise completa das tendências e oportunidades no mercado de trabalho da área da saúde para este ano.', 'cetesi'); ?></p>
                        <a href="#" class="noticia-link">
                            <?php _e('Ler mais', 'cetesi'); ?>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                
                <article class="noticia-card">
                    <div class="noticia-image">
                        <div class="noticia-placeholder">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="noticia-category">
                            <span><?php _e('Eventos', 'cetesi'); ?></span>
                        </div>
                    </div>
                    <div class="noticia-content">
                        <div class="noticia-meta">
                            <span class="noticia-date">
                                <i class="fas fa-calendar-alt"></i>
                                <?php echo date('d/m/Y', strtotime('-1 week')); ?>
                            </span>
                            <span class="noticia-read-time">
                                <i class="fas fa-clock"></i>
                                2 min
                            </span>
                        </div>
                        <h3><?php _e('Workshop Gratuito: Primeiros Socorros Básicos', 'cetesi'); ?></h3>
                        <p><?php _e('Participe do nosso workshop gratuito e aprenda técnicas essenciais de primeiros socorros.', 'cetesi'); ?></p>
                        <a href="#" class="noticia-link">
                            <?php _e('Ler mais', 'cetesi'); ?>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                
                <!-- Card CTA integrado no grid -->
                <div class="noticia-card noticia-cta-card">
                    <div class="noticia-cta-content">
                        <div class="noticia-cta-buttons">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-newspaper"></i>
                                <?php _e('Ver Todas as Notícias', 'cetesi'); ?>
                            </a>
                            <a href="#" class="btn btn-outline">
                                <i class="fas fa-bell"></i>
                                <?php _e('Receber Notificações', 'cetesi'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <?php wp_reset_postdata(); ?>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contato" class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2><?php _e('Pronto para Transformar sua Carreira?', 'cetesi'); ?></h2>
                <p><?php _e('Não perca tempo! Entre em contato conosco e descubra como podemos ajudar você a alcançar seus objetivos profissionais.', 'cetesi'); ?></p>
                
                <div class="cta-buttons">
                    <?php 
                    $inscreva_btn = cetesi_get_cta_button('homepage_inscreva', 'Inscrever-se', '#inscricao');
                    $ligar_btn = cetesi_get_cta_button('homepage_ligar', 'Ligar Agora', 'tel:6133514511');
                    ?>
                    <a href="<?php echo esc_url($inscreva_btn['url']); ?>" class="btn-hero btn-hero-primary">
                        <i class="fas fa-graduation-cap"></i>
                        <?php echo esc_html($inscreva_btn['text']); ?>
                    </a>
                    <a href="<?php echo esc_url($ligar_btn['url']); ?>" class="btn-hero btn-hero-phone">
                        <i class="fas fa-phone"></i>
                        <?php echo esc_html($ligar_btn['text']); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- CSS da Hero Section movido para assets/css/hero.css -->
<!-- CSS das seções de cursos e localização movido para assets/css/front-page.css -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== ANIMAÇÕES DE ENTRADA HOMEPAGE =====
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observar elementos com data-aos
    document.querySelectorAll('[data-aos]').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });

    // ===== EFEITOS DE HOVER AVANÇADOS HOMEPAGE =====
    const badges = document.querySelectorAll('.badge-ultra');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px) scale(1.02)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // ===== EFEITO RIPPLE NOS BOTÕES HOMEPAGE =====
    const buttons = document.querySelectorAll('.btn-hero-principal-ultra, .btn-hero-secundario-ultra');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = this.querySelector('.btn-ripple');
            if (ripple) {
                ripple.style.width = '300px';
                ripple.style.height = '300px';
                ripple.style.opacity = '0';
                
                setTimeout(() => {
                    ripple.style.width = '0';
                    ripple.style.height = '0';
                    ripple.style.opacity = '1';
                }, 300);
            }
        });
    });

    // ===== SCROLL SUAVE HOMEPAGE =====
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // ===== PARALLAX SUAVE NO HERO HOMEPAGE =====
    const hero = document.querySelector('.hero-section-ultra-moderno');
    if (hero) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            hero.style.transform = `translateY(${rate}px)`;
        });
    }


    // ===== PERFORMANCE: DEBOUNCE SCROLL HOMEPAGE =====
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }
        scrollTimeout = setTimeout(function() {
            // Código de scroll aqui
        }, 10);
    });

    // ===== MELHORIAS DE ACESSIBILIDADE HOMEPAGE =====
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
    });

    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });

    // ===== OTIMIZAÇÕES DE PERFORMANCE HOMEPAGE =====
    // Lazy loading para imagens
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // ===== ANIMAÇÕES DE CONTADORES HOMEPAGE =====
    const counters = document.querySelectorAll('.stat-number');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.textContent.replace(/\D/g, ''));
        const increment = target / 100;
                let current = 0;
                
                const updateCounter = () => {
                    if (current < target) {
            current += increment;
                        counter.textContent = Math.ceil(current) + (counter.textContent.includes('+') ? '+' : '') + (counter.textContent.includes('%') ? '%' : '');
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = counter.textContent;
                    }
                };
                
                updateCounter();
                counterObserver.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });

    // ===== MELHORIAS DE UX HOMEPAGE =====
    // Adicionar classe de carregamento
    document.body.classList.add('loaded');
    
    // Remover classe de carregamento após um tempo
    setTimeout(() => {
        document.body.classList.remove('loading');
    }, 1000);
});
</script>

<?php get_footer(); ?>
