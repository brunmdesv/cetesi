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
                            <span class="badge-text">+5.000 Alunos Formados</span>
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
    align-items: center;
    padding: var(--space-4xl) var(--space-xl);
    text-align: center;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 250, 252, 0.8) 100%);
    border-radius: var(--radius-3xl);
    border: 2px dashed var(--border-color);
    margin: var(--space-2xl) 0;
}

.no-courses-content {
    max-width: 500px;
}

.no-courses-content i {
    font-size: 4rem;
    color: var(--primary-color);
    margin-bottom: var(--space-xl);
    opacity: 0.7;
}

.no-courses-content h4 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-lg);
    line-height: 1.3;
}

.no-courses-content p {
    font-size: 1rem;
    color: var(--text-secondary);
    line-height: 1.6;
    margin: 0;
}

/* Responsividade para mensagem de nenhum curso */
@media (max-width: 768px) {
    .no-courses-message {
        padding: var(--space-3xl) var(--space-lg);
    }
    
    .no-courses-content i {
        font-size: 3rem;
        margin-bottom: var(--space-lg);
    }
    
    .no-courses-content h4 {
        font-size: 1.25rem;
    }
    
    .no-courses-content p {
        font-size: 0.9rem;
    }
}

/* ===== ESTILOS ULTRA MODERNOS PARA SEÇÕES DE CURSOS ===== */

/* Variáveis Ultra Modernas para Cursos */
.cursos-section {
    --primary-color: #3b82f6;
    --primary-dark: #1e40af;
    --primary-light: #60a5fa;
    --secondary-color: #10b981;
    --secondary-dark: #059669;
    --secondary-light: #34d399;
    --accent-color: #f59e0b;
    --accent-dark: #d97706;
    --accent-light: #fbbf24;
    --accent-pink: #ec4899;
    --danger-color: #ef4444;
    --warning-color: #f59e0b;
    --success-color: #10b981;
    --text-primary: #0f172a;
    --text-secondary: #475569;
    --text-light: #94a3b8;
    --text-muted: #cbd5e1;
    --bg-primary: #ffffff;
    --bg-secondary: #f8fafc;
    --bg-accent: #f1f5f9;
    --bg-dark: #0f172a;
    --border-color: #e2e8f0;
    --border-light: #f1f5f9;
    --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    --radius-xs: 0.125rem;
    --radius-sm: 0.25rem;
    --radius-md: 0.375rem;
    --radius-lg: 0.5rem;
    --radius-xl: 0.75rem;
    --radius-2xl: 1rem;
    --radius-3xl: 1.5rem;
    --radius-full: 9999px;
    --space-xs: 0.25rem;
    --space-sm: 0.5rem;
    --space-md: 0.75rem;
    --space-lg: 1rem;
    --space-xl: 1.5rem;
    --space-2xl: 2rem;
    --space-3xl: 3rem;
    --space-4xl: 4rem;
    --space-5xl: 6rem;
    --transition-fast: 150ms ease-in-out;
    --transition-normal: 300ms ease-in-out;
    --transition-slow: 500ms ease-in-out;
    --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    --gradient-secondary: linear-gradient(135deg, var(--secondary-color) 0%, var(--secondary-dark) 100%);
    --gradient-accent: linear-gradient(135deg, var(--accent-color) 0%, var(--accent-pink) 100%);
    --gradient-hero: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    --gradient-glass: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
}

/* ===== CATEGORIA CURSOS ULTRA MODERNA ===== */
.categoria-cursos {
    margin-bottom: var(--space-4xl);
    position: relative;
    padding: var(--space-3xl) 0;
    background: var(--bg-secondary);
    border-radius: var(--radius-3xl);
    overflow: hidden;
}

.categoria-cursos::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.categoria-titulo {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-3xl);
    display: flex;
    align-items: center;
    gap: var(--space-lg);
    text-align: center;
    justify-content: center;
    position: relative;
    padding: var(--space-xl) 0;
}

.categoria-titulo::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background: var(--gradient-accent);
    border-radius: var(--radius-full);
}

.categoria-titulo i {
    color: var(--primary-color);
    font-size: 2rem;
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(0 2px 4px rgba(59, 130, 246, 0.3));
}

/* ===== CURSOS GRID ULTRA MODERNO ===== */
.cursos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: var(--space-2xl);
    margin-bottom: var(--space-2xl);
    padding: 0 var(--space-xl);
}

/* ===== CURSO CARD ULTRA MODERNO ===== */
.curso-card {
    background: var(--bg-primary);
    border-radius: var(--radius-3xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    transition: all var(--transition-normal);
    position: relative;
    display: flex;
    flex-direction: column;
    height: 100%;
    border: 1px solid var(--border-light);
    backdrop-filter: blur(20px);
    opacity: 0;
    transform: translateY(30px);
    animation: fade-in-up 0.8s ease-out forwards;
}

.curso-card:nth-child(1) { animation-delay: 0.1s; }
.curso-card:nth-child(2) { animation-delay: 0.2s; }
.curso-card:nth-child(3) { animation-delay: 0.3s; }
.curso-card:nth-child(4) { animation-delay: 0.4s; }
.curso-card:nth-child(5) { animation-delay: 0.5s; }
.curso-card:nth-child(6) { animation-delay: 0.6s; }

.curso-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: var(--shadow-2xl);
    border-color: var(--primary-light);
}

.curso-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
    transition: all var(--transition-normal);
}

.curso-card.tecnico::before {
    background: var(--gradient-primary);
}

.curso-card.livre::before {
    background: var(--gradient-secondary);
}

.curso-card.online::before {
    background: var(--gradient-accent);
}

.curso-card.qualificacao::before {
    background: linear-gradient(135deg, #8b5cf6 0%, var(--accent-pink) 100%);
}

.curso-card.educacao-basica::before {
    background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
}

.curso-card:hover::before {
    height: 6px;
    box-shadow: 0 0 20px rgba(59, 130, 246, 0.4);
}

/* ===== CURSO IMAGE ULTRA MODERNA ===== */
.curso-image {
    height: 150px;
    background: var(--gradient-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    flex-shrink: 0;
}

.curso-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left var(--transition-slow);
}

.curso-card:hover .curso-image::before {
    left: 100%;
}

.curso-image i {
    font-size: 3rem;
    color: white;
    filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
    transition: all var(--transition-normal);
}

.curso-card:hover .curso-image i {
    transform: scale(1.1) rotate(5deg);
    filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.4));
}

/* ===== CURSO CONTENT ULTRA CRIATIVO ===== */
.curso-content {
    padding: var(--space-2xl);
    display: flex;
    flex-direction: column;
    flex: 1;
    overflow: hidden;
    min-height: 0;
    position: relative;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 250, 252, 0.8) 100%);
    backdrop-filter: blur(20px);
}

.curso-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
    opacity: 0.3;
}

/* ===== CURSO HEADER CRIATIVO ===== */
.curso-header {
    margin-bottom: 0;
    position: relative;
    text-align: center;
    padding: var(--space-sm) 0;
}

.curso-content h3 {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-lg);
    line-height: 1.3;
    transition: all var(--transition-normal);
    position: relative;
    text-align: center;
    letter-spacing: -0.02em;
}


.curso-content h3::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 2px;
    background: var(--gradient-accent);
    border-radius: var(--radius-full);
    opacity: 0.6;
    transition: all var(--transition-normal);
}

.curso-card:hover .curso-content h3 {
    color: var(--primary-color);
    transform: translateY(-2px);
}


.curso-card:hover .curso-content h3::after {
    width: 80px;
    opacity: 1;
}

/* ===== CURSO BADGES INFORMATIVOS CRIATIVOS ===== */
.curso-info-badges {
    display: flex;
    gap: var(--space-xs);
    margin-bottom: var(--space-lg);
    justify-content: center;
    padding: var(--space-sm) 0;
    flex-wrap: nowrap;
}

.info-badge {
    display: inline-flex;
    align-items: center;
    gap: var(--space-xs);
    padding: var(--space-xs) var(--space-sm);
    background: rgba(255, 255, 255, 0.8);
    border: 2px solid transparent;
    border-radius: var(--radius-xl);
    font-size: 0.7rem;
    font-weight: 600;
    color: var(--text-primary);
    transition: all var(--transition-normal);
    backdrop-filter: blur(10px);
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    box-shadow: var(--shadow-sm);
    flex: 1;
    justify-content: center;
    min-width: 0;
}

.info-badge::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transition: left var(--transition-slow);
}

.info-badge:hover::before {
    left: 100%;
}

.info-badge:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-color);
}

.info-badge i {
    font-size: 0.9rem;
    transition: all var(--transition-normal);
}

.info-badge:hover i {
    transform: scale(1.2) rotate(10deg);
}

/* Badges específicos por tipo com cores únicas */
.info-badge.duracao {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
    border-color: rgba(16, 185, 129, 0.3);
    color: var(--secondary-color);
}

.info-badge.duracao:hover {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.2) 0%, rgba(16, 185, 129, 0.1) 100%);
    border-color: var(--secondary-color);
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
}

.info-badge.carga-horaria {
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
    border-color: rgba(245, 158, 11, 0.3);
    color: var(--accent-color);
}

.info-badge.carga-horaria:hover {
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.2) 0%, rgba(245, 158, 11, 0.1) 100%);
    border-color: var(--accent-color);
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
}

.info-badge.modalidade {
    background: linear-gradient(135deg, rgba(236, 72, 153, 0.1) 0%, rgba(236, 72, 153, 0.05) 100%);
    border-color: rgba(236, 72, 153, 0.3);
    color: var(--accent-pink);
}

.info-badge.modalidade:hover {
    background: linear-gradient(135deg, rgba(236, 72, 153, 0.2) 0%, rgba(236, 72, 153, 0.1) 100%);
    border-color: var(--accent-pink);
    box-shadow: 0 8px 25px rgba(236, 72, 153, 0.3);
}

.info-badge.reconhecimento {
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(139, 92, 246, 0.05) 100%);
    border-color: rgba(139, 92, 246, 0.3);
    color: #8b5cf6;
}

.info-badge.reconhecimento:hover {
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.2) 0%, rgba(139, 92, 246, 0.1) 100%);
    border-color: #8b5cf6;
    box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
}

/* ===== CURSO DESCRIÇÃO CRIATIVA ===== */
.curso-descricao {
    font-size: 0.9rem;
    color: var(--text-secondary);
    line-height: 1.7;
    margin-bottom: var(--space-lg);
    text-align: center;
    padding: var(--space-lg);
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 250, 252, 0.8) 100%);
    border-radius: var(--radius-xl);
    border: 2px solid rgba(59, 130, 246, 0.1);
    position: relative;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    line-clamp: 4;
    -webkit-box-orient: vertical;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    backdrop-filter: blur(10px);
    font-style: italic;
}

.curso-descricao::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    border-radius: var(--radius-full);
    opacity: 0.8;
}

.curso-descricao::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 40px;
    height: 2px;
    background: linear-gradient(90deg, var(--accent-color), transparent);
    border-radius: var(--radius-full);
    opacity: 0.6;
}


/* ===== CURSO BTN ULTRA CRIATIVO ===== */
.curso-btn {
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-lg) var(--space-2xl);
    background: var(--gradient-primary);
    color: white;
    text-decoration: none;
    border-radius: var(--radius-3xl);
    font-weight: 700;
    font-size: 1rem;
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
    border: none;
    cursor: pointer;
    margin-top: auto;
    align-self: center;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: var(--shadow-lg);
    min-width: 180px;
    justify-content: center;
}

.curso-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left var(--transition-slow);
}


.curso-btn:hover::before {
    left: 100%;
}


.curso-btn:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: var(--shadow-2xl);
    color: white;
}

.curso-btn:active {
    transform: translateY(-1px) scale(0.98);
}

.curso-btn i {
    font-size: 1rem;
    transition: all var(--transition-normal);
    position: relative;
    z-index: 2;
}

.curso-btn:hover i {
    transform: translateX(4px) scale(1.1);
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
}

.curso-btn span {
    position: relative;
    z-index: 2;
    transition: all var(--transition-normal);
}

.curso-btn:hover span {
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Botões específicos por categoria */
.curso-btn.tecnico {
    background: var(--gradient-primary);
}

.curso-btn.livre {
    background: var(--gradient-secondary);
}

.curso-btn.online {
    background: var(--gradient-accent);
}

.curso-btn.qualificacao {
    background: linear-gradient(135deg, #8b5cf6 0%, var(--accent-pink) 100%);
}

.curso-btn.educacao-basica {
    background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
}

/* ===== ANIMAÇÕES ULTRA MODERNAS ===== */
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse-glow {
    0%, 100% { 
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); 
    }
    50% { 
        box-shadow: 0 0 30px rgba(59, 130, 246, 0.5); 
    }
}

@keyframes slide-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== RESPONSIVIDADE ULTRA MODERNA ===== */
@media (max-width: 1200px) {
    .cursos-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: var(--space-xl);
    }
    
    .categoria-titulo {
        font-size: 1.75rem;
    }
}

@media (max-width: 768px) {
    .categoria-cursos {
        padding: var(--space-2xl) 0;
        margin-bottom: var(--space-3xl);
    }
    
    .categoria-titulo {
        font-size: 1.5rem;
        flex-direction: column;
        gap: var(--space-md);
    }
    
    .categoria-titulo i {
        font-size: 1.5rem;
    }
    
    .cursos-grid {
        grid-template-columns: 1fr;
        gap: var(--space-lg);
        padding: 0 var(--space-md);
    }
    
    .curso-content {
        padding: var(--space-xl);
    }
    
    .curso-content h3 {
        font-size: 1.25rem;
    }
    
    .curso-image {
        height: 130px;
    }
    
    .curso-image i {
        font-size: 2.5rem;
    }
    
    /* Info badges responsivos */
    .curso-info-badges {
        flex-direction: column;
        gap: var(--space-xs);
    }
    
    .info-badge {
        font-size: 0.65rem;
        padding: var(--space-xs) var(--space-sm);
        flex: none;
    }
    
    /* Descrição responsiva */
    .curso-descricao {
        font-size: 0.85rem;
        padding: var(--space-md);
        -webkit-line-clamp: 3;
        line-clamp: 3;
    }
    
    .curso-descricao::before {
        width: 40px;
        height: 2px;
    }
    
    .curso-descricao::after {
        width: 30px;
        height: 1px;
    }
    
    /* Botão responsivo */
    .curso-btn {
        padding: var(--space-md) var(--space-lg);
        font-size: 0.9rem;
        min-width: 160px;
    }
}

@media (max-width: 480px) {
    .categoria-cursos {
        padding: var(--space-xl) 0;
        border-radius: var(--radius-2xl);
    }
    
    .categoria-titulo {
        font-size: 1.375rem;
        padding: var(--space-lg) 0;
    }
    
    .cursos-grid {
        padding: 0 var(--space-sm);
    }
    
    .curso-content {
        padding: var(--space-lg);
    }
    
    .curso-image {
        height: 120px;
    }
    
    .curso-image i {
        font-size: 2rem;
    }
    
    .curso-btn {
        padding: var(--space-sm) var(--space-lg);
        font-size: 0.875rem;
    }
}

/* ===== MELHORIAS DE ACESSIBILIDADE ===== */
@media (prefers-reduced-motion: reduce) {
    .curso-card,
    .curso-card * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}


/* ===== MELHORIAS DE PERFORMANCE ===== */
.curso-card:hover,
.curso-btn:hover {
    will-change: transform;
}

/* Estilos para a seção de localização moderna */
.localizacao-content-moderno {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 30px;
    margin-top: 40px;
}

.endereco-card-moderno,
.facilidades-card,
.acoes-card {
    background: white;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    border: 1px solid #e1e5e9;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.endereco-card-moderno:hover,
.facilidades-card:hover,
.acoes-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.endereco-card-moderno::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #2563eb, #10b981);
}

.facilidades-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #10b981, #059669);
}

.acoes-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #059669, #047857);
}

.endereco-header,
.facilidades-header,
.acoes-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid #f1f5f9;
}

.endereco-icon,
.facilidades-icon,
.acoes-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
}

.facilidades-icon {
    background: linear-gradient(135deg, #10b981, #059669);
}

.acoes-icon {
    background: linear-gradient(135deg, #059669, #047857);
}

.endereco-header h3,
.facilidades-header h3,
.acoes-header h3 {
    margin: 0;
    font-size: 20px;
    font-weight: 600;
    color: #1e293b;
}

.endereco-detalhes {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.endereco-linha {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid #f8fafc;
}

.endereco-linha:last-child {
    border-bottom: none;
}

.endereco-linha i {
    width: 20px;
    height: 20px;
    color: #2563eb;
    font-size: 16px;
}

.endereco-linha span {
    font-size: 15px;
    color: #475569;
    font-weight: 500;
}

.facilidades-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.facilidade-item {
    text-align: center;
    padding: 20px 15px;
    background: #f8fafc;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.facilidade-item:hover {
    background: #f1f5f9;
    transform: translateY(-2px);
}

.facilidade-item i {
    font-size: 24px;
    color: #10b981;
    margin-bottom: 10px;
    display: block;
}

.facilidade-item span {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 5px;
}

.facilidade-item small {
    font-size: 12px;
    color: #64748b;
}

.acoes-buttons {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.btn-acao {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px 20px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.btn-maps-moderno {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: white;
}

.btn-maps-moderno:hover {
    background: linear-gradient(135deg, #1d4ed8, #1e40af);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
}

.btn-ligar-moderno {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.btn-ligar-moderno:hover {
    background: linear-gradient(135deg, #059669, #047857);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
}

.btn-acao i {
    font-size: 18px;
}

.btn-acao span {
    font-size: 15px;
}

/* Responsividade */
@media (max-width: 1024px) {
    .localizacao-content-moderno {
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }
    
    .acoes-card {
        grid-column: 1 / -1;
    }
}

@media (max-width: 768px) {
    .localizacao-content-moderno {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .facilidades-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .endereco-card-moderno,
    .facilidades-card,
    .acoes-card {
        padding: 25px;
    }
    
    .endereco-header,
    .facilidades-header,
    .acoes-header {
        flex-direction: column;
        text-align: center;
        gap: 10px;
    }
    
    .endereco-icon,
    .facilidades-icon,
    .acoes-icon {
        width: 40px;
        height: 40px;
        font-size: 18px;
    }
}
</style>

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

    // ===== ANIMAÇÕES ULTRA MODERNAS PARA CURSOS =====
    const cursoCards = document.querySelectorAll('.curso-card');
    cursoCards.forEach((card, index) => {
        // Adicionar delay escalonado para animação
        card.style.animationDelay = `${index * 0.1}s`;
        
        // Efeito de hover avançado
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
            this.style.boxShadow = '0 25px 50px -12px rgba(0, 0, 0, 0.25)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)';
        });
    });

    // ===== INTERSECTION OBSERVER PARA CURSOS =====
    const cursoObserverOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const cursoObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, cursoObserverOptions);

    // Observar categorias de cursos
    document.querySelectorAll('.categoria-cursos').forEach(categoria => {
        categoria.style.opacity = '0';
        categoria.style.transform = 'translateY(30px)';
        categoria.style.transition = 'all 0.8s ease-out';
        cursoObserver.observe(categoria);
    });

    // ===== EFEITOS DE HOVER NOS BOTÕES DE CURSO =====
    const cursoBtns = document.querySelectorAll('.curso-btn');
    cursoBtns.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.02)';
            this.style.boxShadow = '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)';
        });
    });

    // ===== ANIMAÇÕES PARA INFO BADGES =====
    const infoBadges = document.querySelectorAll('.info-badge');
    infoBadges.forEach((badge, index) => {
        badge.style.animationDelay = `${index * 0.1}s`;
        
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.05)';
            this.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.15)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.1)';
        });
    });

    // ===== ANIMAÇÕES PARA CURSO FEATURES =====
    const cursoFeatures = document.querySelectorAll('.curso-features li');
    cursoFeatures.forEach((feature, index) => {
        feature.style.animationDelay = `${index * 0.1}s`;
        
        feature.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)';
        });
        
        feature.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // ===== ANIMAÇÃO DE ENTRADA PARA CURSO HEADER =====
    const cursoHeaders = document.querySelectorAll('.curso-header');
    cursoHeaders.forEach(header => {
        header.style.opacity = '0';
        header.style.transform = 'translateY(20px)';
        header.style.transition = 'all 0.6s ease-out';
        
        setTimeout(() => {
            header.style.opacity = '1';
            header.style.transform = 'translateY(0)';
        }, 200);
    });


    // ===== SCROLL SUAVE PARA SEÇÕES DE CURSOS =====
    document.querySelectorAll('a[href="#cursos"]').forEach(anchor => {
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

    // ===== ANIMAÇÃO DE CONTAGEM PARA ESTATÍSTICAS =====
    const statNumbers = document.querySelectorAll('.stat-number');
    const animateCounter = (element, target) => {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current) + (target >= 1000 ? '+' : '');
        }, 20);
    };

    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.textContent.replace(/[^\d]/g, ''));
                animateCounter(entry.target, target);
                statsObserver.unobserve(entry.target);
            }
        });
    });

    statNumbers.forEach(stat => {
        statsObserver.observe(stat);
    });

    // ===== PRELOAD DE RECURSOS CRÍTICOS HOMEPAGE =====
    const criticalResources = [
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap'
    ];

    criticalResources.forEach(resource => {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.as = 'style';
        link.href = resource;
        document.head.appendChild(link);
    });
});
</script>

<?php get_footer(); ?>
