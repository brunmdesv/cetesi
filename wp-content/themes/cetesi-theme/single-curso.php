<?php
/**
 * Template para cursos individuais - Design Ultra Moderno
 * 
 * @package CETESI
 * @version 3.0.0
 */

get_header(); ?>

<main id="main" class="site-main curso-ultra-moderno">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <!-- Hero Ultra Moderno -->
            <section class="curso-hero-ultra-moderno">
                <div class="hero-background-ultra">
                    <div class="hero-pattern-ultra"></div>
                    <div class="hero-gradient-ultra"></div>
                    <div class="hero-shapes"></div>
                </div>
                
                <div class="container">
                    <div class="hero-content-ultra">
                        <div class="hero-main-content">
                                <?php
                            // Campos dinÃ¢micos
                            $nivel_ensino = get_post_meta(get_the_ID(), '_curso_nivel_ensino', true);
                            $area_conhecimento = get_post_meta(get_the_ID(), '_curso_area_conhecimento', true);
                            $modalidade = get_post_meta(get_the_ID(), '_curso_modalidade', true);
                                $duracao = get_post_meta(get_the_ID(), '_curso_duracao', true);
                                $carga_horaria = get_post_meta(get_the_ID(), '_curso_carga_horaria', true);
                                $preco = get_post_meta(get_the_ID(), '_curso_preco', true);
                            $preco_promocional = get_post_meta(get_the_ID(), '_curso_preco_promocional', true);
                            $desconto = get_post_meta(get_the_ID(), '_curso_desconto', true);
                            $link_inscricao = get_post_meta(get_the_ID(), '_curso_link_inscricao', true);
                            ?>
                            
                            <!-- Badges Ultra Modernos -->
                            <div class="curso-badges-ultra">
                                <?php if ($nivel_ensino) : ?>
                                <div class="badge-ultra badge-nivel-ultra" data-aos="fade-up" data-aos-delay="100">
                                    <div class="badge-icon">
                                    <i class="fas fa-award"></i>
                                    </div>
                                    <span class="badge-text"><?php 
                                        $nivel_labels = array(
                                            'tecnico' => 'TÃ©cnico',
                                            'livre' => 'Curso Livre',
                                            'qualificacao' => 'QualificaÃ§Ã£o',
                                            'especializacao' => 'EspecializaÃ§Ã£o'
                                        );
                                        echo isset($nivel_labels[$nivel_ensino]) ? $nivel_labels[$nivel_ensino] : ucfirst($nivel_ensino);
                                    ?></span>
                                </div>
                                <?php endif; ?>
                                
                                <?php if ($modalidade) : ?>
                                <div class="badge-ultra badge-modalidade-ultra" data-aos="fade-up" data-aos-delay="200">
                                    <div class="badge-icon">
                                    <i class="fas fa-<?php echo $modalidade === 'online' ? 'laptop' : 'building'; ?>"></i>
                                    </div>
                                    <span class="badge-text"><?php 
                                        $modalidade_labels = array(
                                            'presencial' => 'Presencial',
                                            'online' => '100% Online',
                                            'hibrido' => 'HÃ­brido'
                                        );
                                        echo isset($modalidade_labels[$modalidade]) ? $modalidade_labels[$modalidade] : ucfirst($modalidade);
                                    ?></span>
                                </div>
                                <?php endif; ?>
                                
                                <?php if ($area_conhecimento) : ?>
                                <div class="badge-ultra badge-area-ultra" data-aos="fade-up" data-aos-delay="300">
                                    <div class="badge-icon">
                                    <i class="fas fa-category"></i>
                                    </div>
                                    <span class="badge-text"><?php 
                                        $area_labels = array(
                                            'saude' => 'SaÃºde',
                                            'tecnologia' => 'Tecnologia',
                                            'gestao' => 'GestÃ£o',
                                            'educacao' => 'EducaÃ§Ã£o',
                                            'seguranca' => 'SeguranÃ§a'
                                        );
                                        echo isset($area_labels[$area_conhecimento]) ? $area_labels[$area_conhecimento] : ucfirst($area_conhecimento);
                                    ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- TÃ­tulo e DescriÃ§Ã£o Ultra Modernos -->
                            <div class="curso-header-ultra" data-aos="fade-up" data-aos-delay="400">
                                <h1 class="curso-titulo-ultra"><?php the_title(); ?></h1>
                                <p class="curso-descricao-ultra"><?php the_content(); ?></p>
                            </div>
                            
                            <!-- Grid de InformaÃ§Ãµes Ultra Moderno -->
                            <div class="curso-info-grid-ultra" data-aos="fade-up" data-aos-delay="500">
                                <?php if ($duracao) : ?>
                                <div class="info-item-ultra" data-aos="zoom-in" data-aos-delay="600">
                                    <div class="info-icon-ultra">
                                    <i class="fas fa-clock"></i>
                                </div>
                                    <div class="info-content-ultra">
                                        <span class="info-label-ultra">DuraÃ§Ã£o</span>
                                        <span class="info-value-ultra"><?php echo esc_html($duracao); ?></span>
                            </div>
                                </div>
                                <?php endif; ?>
                                
                                <?php if ($carga_horaria) : ?>
                                <div class="info-item-ultra" data-aos="zoom-in" data-aos-delay="700">
                                    <div class="info-icon-ultra">
                                    <i class="fas fa-book"></i>
                                    </div>
                                    <div class="info-content-ultra">
                                        <span class="info-label-ultra">Carga HorÃ¡ria</span>
                                        <span class="info-value-ultra"><?php echo esc_html($carga_horaria); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                    <?php
                                $turno = get_post_meta(get_the_ID(), '_curso_turno', true);
                                if ($turno) :
                                ?>
                                <div class="info-item-ultra" data-aos="zoom-in" data-aos-delay="800">
                                    <div class="info-icon-ultra">
                                        <i class="fas fa-schedule"></i>
                                    </div>
                                    <div class="info-content-ultra">
                                        <span class="info-label-ultra">Turno</span>
                                        <span class="info-value-ultra"><?php 
                                            $turno_labels = array(
                                                'matutino' => 'Matutino',
                                                'vespertino' => 'Vespertino',
                                                'noturno' => 'Noturno',
                                                'integral' => 'Integral',
                                                'flexivel' => 'FlexÃ­vel'
                                            );
                                            echo isset($turno_labels[$turno]) ? $turno_labels[$turno] : ucfirst($turno);
                                        ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- CTA Matricule-se Ultra Moderno -->
                            <div class="cta-matricule-se-ultra" data-aos="fade-up" data-aos-delay="900">
                                <div class="cta-content-ultra">
                                    <h3 class="cta-titulo-ultra">Pronto para comeÃ§ar sua jornada?</h3>
                                    <div class="cta-botoes-ultra">
                                        <a href="#" class="btn-matricule-se-ultra">
                                            <div class="btn-content-ultra">
                                                <i class="fas fa-graduation-cap"></i>
                                                <span>Matricule-se Agora</span>
                                            </div>
                                            <div class="btn-shine-ultra"></div>
                                        </a>
                                        <a href="#curso-detalhes" class="btn-saiba-mais-ultra">
                                            <div class="btn-content-ultra">
                                                <i class="fas fa-info-circle"></i>
                                                <span>Saiba Mais</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        
                            </div>
                        
                        <!-- Card de PreÃ§o Ultra Moderno -->
                        <div class="hero-sidebar-ultra" data-aos="fade-left" data-aos-delay="1000">
                            <div class="curso-card-preco-ultra">
                                <div class="card-header-ultra">
                                    <h3 class="card-titulo-ultra">Investimento</h3>
                                    <?php if ($desconto) : ?>
                                    <div class="desconto-badge-ultra">
                                        <span class="desconto-texto"><?php echo esc_html($desconto); ?></span>
                                    </div>
                                <?php endif; ?>
                        </div>
                        
                                <div class="card-preco-ultra">
                                    <?php if ($preco_promocional && $preco_promocional !== $preco) : ?>
                                        <div class="preco-promocional-ultra">
                                            <span class="preco-valor-promocional-ultra"><?php echo esc_html($preco_promocional); ?></span>
                                        </div>
                                        <div class="preco-original-ultra">
                                            <span class="preco-valor-original-ultra"><?php echo esc_html($preco); ?></span>
                                        </div>
                                    <?php else : ?>
                                        <div class="preco-normal-ultra">
                                            <span class="preco-valor-ultra"><?php echo esc_html($preco); ?></span>
                        </div>
                        <?php endif; ?>
                                </div>
                                
                                <div class="card-beneficios-ultra">
                                    <div class="beneficio-item-ultra">
                                        <div class="beneficio-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                        <span class="beneficio-texto">Material incluso</span>
                                    </div>
                                    <div class="beneficio-item-ultra">
                                        <div class="beneficio-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                        <span class="beneficio-texto">Certificado vÃ¡lido</span>
                                    </div>
                                    <div class="beneficio-item-ultra">
                                        <div class="beneficio-icon">
                                        <i class="fas fa-check-circle"></i>
                                        </div>
                                        <span class="beneficio-texto">Suporte completo</span>
                                    </div>
                                </div>
                                
                                <?php if ($link_inscricao) : ?>
                                <a href="<?php echo esc_url($link_inscricao); ?>" class="btn-inscricao-card-ultra" target="_blank" rel="noopener">
                                    <div class="btn-content">
                                    <i class="fas fa-rocket"></i>
                                    <span>ComeÃ§ar Agora</span>
                                    </div>
                                    <div class="btn-shine-ultra"></div>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SeÃ§Ã£o de Detalhes do Curso Ultra Moderna -->
            <section id="curso-detalhes" class="curso-detalhes-section-ultra">
                <div class="container">
                    <div class="section-header-ultra">
                        <h2 class="section-titulo-ultra">
                            <span class="titulo-icon-ultra">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            Detalhes do Curso
                        </h2>
                        <p class="section-subtitulo-ultra">ConheÃ§a todos os aspectos importantes do curso</p>
                                </div>
                    
                    <div class="detalhes-grid-ultra">
                        <div class="detalhes-card-ultra" data-aos="fade-up" data-aos-delay="100">
                            <div class="card-icon-ultra">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h3 class="card-titulo-ultra">Objetivos</h3>
                                    <?php
                            $objetivos = get_post_meta(get_the_ID(), '_curso_objetivos', true);
                            if ($objetivos) :
                            ?>
                                <p class="card-descricao-ultra"><?php echo esc_html($objetivos); ?></p>
                            <?php else : ?>
                                <p class="card-descricao-ultra">Formar profissionais capacitados e preparados para o mercado de trabalho, desenvolvendo competÃªncias tÃ©cnicas e habilidades prÃ¡ticas essenciais.</p>
                                    <?php endif; ?>
                            </div>
                            
                        <div class="detalhes-card-ultra" data-aos="fade-up" data-aos-delay="200">
                            <div class="card-icon-ultra">
                                <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                            <h3 class="card-titulo-ultra">Metodologia</h3>
                            <?php
                            $metodologia = get_post_meta(get_the_ID(), '_curso_metodologia', true);
                            if ($metodologia) :
                            ?>
                                <p class="card-descricao-ultra"><?php echo esc_html($metodologia); ?></p>
                            <?php else : ?>
                                <p class="card-descricao-ultra">Metodologia ativa com aulas teÃ³ricas, prÃ¡ticas laboratoriais, estudos de caso e estÃ¡gio supervisionado em ambiente real de trabalho.</p>
                        <?php endif; ?>
                            </div>
                            
                        <div class="detalhes-card-ultra" data-aos="fade-up" data-aos-delay="300">
                            <div class="card-icon-ultra">
                                <i class="fas fa-certificate"></i>
                                </div>
                            <h3 class="card-titulo-ultra">CertificaÃ§Ã£o</h3>
                            <?php
                            $certificacao = get_post_meta(get_the_ID(), '_curso_certificacao', true);
                            $certificacao_detalhada = get_post_meta(get_the_ID(), '_curso_certificacao_detalhada', true);
                            $reconhecimento = get_post_meta(get_the_ID(), '_curso_reconhecimento', true);
                            ?>
                            <p class="card-descricao-ultra">
                                <?php if ($certificacao_detalhada) : ?>
                                    <?php echo esc_html($certificacao_detalhada); ?>
                                <?php elseif ($certificacao) : ?>
                                    <?php echo esc_html($certificacao); ?>
                                <?php else : ?>
                                    Certificado de conclusÃ£o vÃ¡lido em todo territÃ³rio nacional
                                <?php endif; ?>
                                
                                <?php if ($reconhecimento) : ?>
                                    <br><small class="reconhecimento-texto">
                                        <?php 
                                        $reconhecimento_labels = array(
                                            'mec' => 'Reconhecido pelo MEC',
                                            'conselho' => 'Reconhecido pelo Conselho',
                                            'ministerio' => 'Reconhecido pelo MinistÃ©rio',
                                            'certificacao' => 'CertificaÃ§Ã£o Profissional'
                                        );
                                        echo isset($reconhecimento_labels[$reconhecimento]) ? $reconhecimento_labels[$reconhecimento] : ucfirst($reconhecimento);
                                        ?>
                                    </small>
                                <?php endif; ?>
                            </p>
                            </div>
                        
                        <!-- Grade Curricular Ultra Moderna -->
                        <div class="detalhes-card-ultra detalhes-card-full-ultra" data-aos="fade-up" data-aos-delay="400">
                            <div class="card-icon-ultra">
                                <i class="fas fa-list-ul"></i>
                        </div>
                            <h3 class="card-titulo-ultra">Grade Curricular</h3>
                            <?php
                            $modulo_1 = get_post_meta(get_the_ID(), '_curso_modulo_1', true);
                            $modulo_2 = get_post_meta(get_the_ID(), '_curso_modulo_2', true);
                            $modulo_3 = get_post_meta(get_the_ID(), '_curso_modulo_3', true);
                            $disciplinas = get_post_meta(get_the_ID(), '_curso_disciplinas', true);
                            
                            // Se hÃ¡ mÃ³dulos definidos, exibir os cards dos mÃ³dulos
                            if ($modulo_1 || $modulo_2 || $modulo_3) :
                            ?>
                                <div class="modulos-grid-ultra">
                                    <?php if ($modulo_1) : ?>
                                    <div class="modulo-card-ultra" data-aos="zoom-in" data-aos-delay="500">
                                        <div class="modulo-header-ultra">
                                            <div class="modulo-icon-ultra">
                                                <i class="fas fa-book"></i>
                                            </div>
                                            <h4 class="modulo-titulo-ultra">MÃ³dulo 1</h4>
                                        </div>
                                        <div class="modulo-conteudo-ultra">
                                            <?php echo wpautop(esc_html($modulo_1)); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($modulo_2) : ?>
                                    <div class="modulo-card-ultra" data-aos="zoom-in" data-aos-delay="600">
                                        <div class="modulo-header-ultra">
                                            <div class="modulo-icon-ultra">
                                                <i class="fas fa-book-open"></i>
                                            </div>
                                            <h4 class="modulo-titulo-ultra">MÃ³dulo 2</h4>
                                        </div>
                                        <div class="modulo-conteudo-ultra">
                                            <?php echo wpautop(esc_html($modulo_2)); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($modulo_3) : ?>
                                    <div class="modulo-card-ultra" data-aos="zoom-in" data-aos-delay="700">
                                        <div class="modulo-header-ultra">
                                            <div class="modulo-icon-ultra">
                                                <i class="fas fa-graduation-cap"></i>
                                            </div>
                                            <h4 class="modulo-titulo-ultra">MÃ³dulo 3</h4>
                                        </div>
                                        <div class="modulo-conteudo-ultra">
                                            <?php echo wpautop(esc_html($modulo_3)); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php elseif ($disciplinas) : ?>
                                <div class="disciplinas-lista-ultra">
                                    <?php 
                                    // Substituir | por - na grade curricular
                                    $disciplinas_formatadas = str_replace('|', '-', $disciplinas);
                                    echo wpautop(esc_html($disciplinas_formatadas)); 
                                    ?>
                                </div>
                            <?php else : ?>
                                <p class="card-descricao-ultra">Grade curricular completa com disciplinas teÃ³ricas e prÃ¡ticas, incluindo estÃ¡gio supervisionado e atividades complementares.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <?php
            // Verificar se o curso Ã© da categoria tÃ©cnica usando o meta field _curso_tipo
            $curso_tipo = get_post_meta(get_the_ID(), '_curso_tipo', true);
            $is_tecnico = ($curso_tipo === 'tecnico');
            
            // Mostrar seÃ§Ã£o de Mercado de Trabalho apenas para cursos tÃ©cnicos
            if ($is_tecnico) :
            ?>
            <!-- SeÃ§Ã£o de Mercado de Trabalho Ultra Moderna -->
            <section class="mercado-trabalho-section-ultra">
                <div class="container">
                    <div class="section-header-ultra">
                        <h2 class="section-titulo-ultra">
                            <span class="titulo-icon-ultra">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            Mercado de Trabalho
                        </h2>
                        <p class="section-subtitulo-ultra">Descubra as oportunidades e perspectivas profissionais</p>
                                        </div>
                    
                    <div class="mercado-content-ultra">
                        <div class="mercado-stats-ultra">
                            <?php
                            $salario_medio = get_post_meta(get_the_ID(), '_curso_salario_medio', true);
                            $oportunidades = get_post_meta(get_the_ID(), '_curso_oportunidades', true);
                            ?>
                            
                            <?php
                            $taxa_empregabilidade = get_post_meta(get_the_ID(), '_curso_taxa_empregabilidade', true);
                            ?>
                            <div class="stat-card-ultra" data-aos="zoom-in" data-aos-delay="100">
                                <div class="stat-icon-ultra">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="stat-number-ultra"><?php echo !empty($taxa_empregabilidade) ? esc_html($taxa_empregabilidade) : '95%'; ?></div>
                                <div class="stat-label-ultra">Taxa de Empregabilidade</div>
                            </div>
                            
                            <?php
                            $salario_inicial = get_post_meta(get_the_ID(), '_curso_salario_inicial', true);
                            ?>
                            <?php if ($salario_inicial || $salario_medio) : ?>
                            <div class="stat-card-ultra" data-aos="zoom-in" data-aos-delay="200">
                                <div class="stat-icon-ultra">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="stat-number-ultra"><?php echo esc_html($salario_inicial ?: $salario_medio); ?></div>
                                <div class="stat-label-ultra"><?php echo $salario_inicial ? 'SalÃ¡rio Inicial' : 'SalÃ¡rio MÃ©dio'; ?></div>
                                </div>
                            <?php else : ?>
                            <div class="stat-card-ultra" data-aos="zoom-in" data-aos-delay="200">
                                <div class="stat-icon-ultra">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="stat-number-ultra">R$ 3.500</div>
                                <div class="stat-label-ultra">SalÃ¡rio Inicial</div>
                                    </div>
                                    <?php endif; ?>
                                    
                            <?php
                            $crescimento_anual = get_post_meta(get_the_ID(), '_curso_crescimento_anual', true);
                            ?>
                            <?php if ($crescimento_anual || $oportunidades) : ?>
                            <div class="stat-card-ultra" data-aos="zoom-in" data-aos-delay="300">
                                <div class="stat-icon-ultra">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="stat-number-ultra"><?php echo esc_html($crescimento_anual ?: $oportunidades); ?></div>
                                <div class="stat-label-ultra"><?php echo $crescimento_anual ? 'Crescimento Anual' : 'Oportunidades'; ?></div>
                                        </div>
                            <?php else : ?>
                            <div class="stat-card-ultra" data-aos="zoom-in" data-aos-delay="300">
                                <div class="stat-icon-ultra">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="stat-number-ultra">15%</div>
                                <div class="stat-label-ultra">Crescimento Anual</div>
                                    </div>
                                    <?php endif; ?>
                        </div>
                        
                        <div class="mercado-info">
                            <?php
                            $mercado_trabalho = get_post_meta(get_the_ID(), '_curso_mercado_trabalho', true);
                            $areas_atuacao = get_post_meta(get_the_ID(), '_curso_areas_atuacao', true);
                            ?>
                            
                            <?php if ($mercado_trabalho) : ?>
                            <div class="mercado-texto">
                                <h3>Perspectivas do Mercado</h3>
                                <p><?php echo esc_html($mercado_trabalho); ?></p>
                                        </div>
                            <?php else : ?>
                            <div class="mercado-texto">
                                <h3>Mercado em ExpansÃ£o</h3>
                                <p>O mercado de trabalho para profissionais tÃ©cnicos estÃ¡ em constante crescimento, com alta demanda em diversos setores da economia.</p>
                                    </div>
                                    <?php endif; ?>
                                    
                            <?php if ($areas_atuacao) : ?>
                            <div class="areas-atuacao">
                                <h3>Principais Ãreas de AtuaÃ§Ã£o</h3>
                                <div class="areas-lista-moderna">
                                    <?php 
                                    // Dividir por vÃ­rgula e limpar espaÃ§os
                                    $areas_array = array_map('trim', explode(',', $areas_atuacao));
                                    $areas_array = array_filter($areas_array); // Remove itens vazios
                                    foreach ($areas_array as $area) {
                                        if (!empty($area)) {
                                            echo '<div class="area-item-moderno">';
                                            echo '<i class="fas fa-check-circle"></i>';
                                            echo '<span>' . esc_html($area) . '</span>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php else : ?>
                            <div class="areas-atuacao">
                                <h3>Principais Ãreas de AtuaÃ§Ã£o</h3>
                                <div class="areas-lista-moderna">
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Hospitais pÃºblicos e privados</span>
                                    </div>
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Unidades BÃ¡sicas de SaÃºde (UBS)</span>
                                    </div>
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>ClÃ­nicas especializadas</span>
                                    </div>
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Home Care</span>
                                    </div>
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>InstituiÃ§Ãµes de longa permanÃªncia</span>
                                    </div>
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>LaboratÃ³rios de anÃ¡lises clÃ­nicas</span>
                                    </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                </div>
            </section>
            <?php endif; ?>

            <!-- SeÃ§Ã£o de PrÃ©-requisitos Ultra Moderna -->
            <section class="prerequisitos-section-ultra">
                <div class="container">
                    <div class="section-header-ultra">
                        <h2 class="section-titulo-ultra">
                            <span class="titulo-icon-ultra">
                                <i class="fas fa-clipboard-list"></i>
                            </span>
                            PrÃ©-requisitos e Documentos
                        </h2>
                        <p class="section-subtitulo-ultra">Tudo que vocÃª precisa saber para se inscrever</p>
                    </div>
                    
                    <div class="prerequisitos-content-ultra">
                        <?php
                        $prerequisitos = get_post_meta(get_the_ID(), '_curso_prerequisitos', true);
                        $documentos = get_post_meta(get_the_ID(), '_curso_documentos', true);
                        $escolaridade = get_post_meta(get_the_ID(), '_curso_escolaridade', true);
                        $idade_minima = get_post_meta(get_the_ID(), '_curso_idade_minima', true);
                        ?>
                        
                        <div class="prerequisitos-grid-ultra">
                            <!-- Primeira linha: Escolaridade + PrÃ©-requisitos -->
                            <div class="requisito-card-ultra requisito-card-small-ultra" data-aos="fade-up" data-aos-delay="100">
                                <div class="requisito-header-ultra">
                                    <div class="requisito-icon-ultra">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <h3 class="requisito-titulo-ultra">Escolaridade</h3>
                                </div>
                                <p class="requisito-descricao-ultra"><?php 
                                    if ($escolaridade) {
                                        $escolaridade_labels = array(
                                            'fundamental' => 'Ensino Fundamental Completo',
                                            'medio' => 'Ensino MÃ©dio Completo',
                                            'superior' => 'Ensino Superior Completo',
                                            'qualquer' => 'Qualquer Escolaridade'
                                        );
                                        echo isset($escolaridade_labels[$escolaridade]) ? $escolaridade_labels[$escolaridade] : ucfirst($escolaridade);
                                    } else {
                                        echo 'Ensino MÃ©dio Completo';
                                    }
                                ?></p>
                            </div>
                            
                            <div class="requisito-card-ultra requisito-card-large-ultra" data-aos="fade-up" data-aos-delay="200">
                                <div class="requisito-header-ultra">
                                    <div class="requisito-icon-ultra">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <h3 class="requisito-titulo-ultra">PrÃ©-requisitos EspecÃ­ficos</h3>
                                </div>
                                <p class="requisito-descricao-ultra"><?php 
                                    if (!empty($prerequisitos)) {
                                        $prerequisitos_formatados = str_replace('|', ',', $prerequisitos);
                                        echo esc_html($prerequisitos_formatados);
                                    } else {
                                        echo 'Idade mÃ­nima de 18 anos, Ensino MÃ©dio completo, DocumentaÃ§Ã£o pessoal (RG, CPF, comprovante de residÃªncia)';
                                    }
                                ?></p>
                            </div>
                            
                            <!-- Segunda linha: Idade MÃ­nima + Documentos -->
                            <div class="requisito-card-ultra requisito-card-small-ultra" data-aos="fade-up" data-aos-delay="300">
                                <div class="requisito-header-ultra">
                                    <div class="requisito-icon-ultra">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <h3 class="requisito-titulo-ultra">Idade MÃ­nima</h3>
                                </div>
                                <p class="requisito-descricao-ultra"><?php echo !empty($idade_minima) ? esc_html($idade_minima) . ' anos' : '18 anos'; ?></p>
                            </div>
                            
                            <div class="requisito-card-ultra requisito-card-large-ultra" data-aos="fade-up" data-aos-delay="400">
                                <div class="requisito-header-ultra">
                                    <div class="requisito-icon-ultra">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <h3 class="requisito-titulo-ultra">Documentos NecessÃ¡rios</h3>
                                </div>
                                <p class="requisito-descricao-ultra"><?php 
                                    if (!empty($documentos)) {
                                        $documentos_formatados = str_replace('|', ',', $documentos);
                                        echo esc_html($documentos_formatados);
                                    } else {
                                        echo 'RG (original e cÃ³pia), CPF (original e cÃ³pia), Comprovante de residÃªncia (original e cÃ³pia), Foto 3x4 recente (2 fotos)';
                                    }
                                ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SeÃ§Ã£o de LocalizaÃ§Ã£o Ultra Moderna -->
            <section class="localizacao-section-ultra">
                <div class="container">
                    <div class="section-header-ultra">
                        <h2 class="section-titulo-ultra">
                            <span class="titulo-icon-ultra">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            LocalizaÃ§Ã£o
                        </h2>
                        <p class="section-subtitulo-ultra">Encontre-nos facilmente em CeilÃ¢ndia, BrasÃ­lia</p>
                    </div>
                    
                    <div class="localizacao-content-ultra">
                        <!-- InformaÃ§Ãµes principais -->
                        <div class="localizacao-principal-ultra">
                            <div class="endereco-card-ultra" data-aos="fade-right" data-aos-delay="100">
                                <div class="endereco-header-ultra">
                                    <div class="endereco-icon-ultra">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h3 class="endereco-titulo-ultra">Nossa LocalizaÃ§Ã£o</h3>
                                </div>
                                
                                <div class="endereco-detalhes-ultra">
                                    <div class="endereco-linha-ultra">
                                        <div class="endereco-linha-icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                        <span class="endereco-linha-texto"><strong>QNN 02, St. N Qnn 2 Conjunto e, LOTE 04 - Sala 102</strong></span>
                                    </div>
                                    <div class="endereco-linha-ultra">
                                        <div class="endereco-linha-icon">
                                        <i class="fas fa-city"></i>
                                    </div>
                                        <span class="endereco-linha-texto">CeilÃ¢ndia, BrasÃ­lia - DF</span>
                                    </div>
                                    <div class="endereco-linha-ultra">
                                        <div class="endereco-linha-icon">
                                        <i class="fas fa-mail-bulk"></i>
                                        </div>
                                        <span class="endereco-linha-texto">CEP: 72220-025</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Recursos e facilidades -->
                            <div class="facilidades-card-ultra" data-aos="fade-right" data-aos-delay="200">
                                <h4 class="facilidades-titulo-ultra">Facilidades</h4>
                                <div class="facilidades-grid-ultra">
                                    <div class="facilidade-item-ultra">
                                        <div class="facilidade-icon-ultra transporte-ultra">
                                            <i class="fas fa-bus"></i>
                                        </div>
                                        <div class="facilidade-texto-ultra">
                                            <strong>Transporte PÃºblico</strong>
                                            <span>FÃ¡cil acesso por Ã´nibus</span>
                                        </div>
                                    </div>
                                    <div class="facilidade-item-ultra">
                                        <div class="facilidade-icon-ultra estacionamento-ultra">
                                            <i class="fas fa-car"></i>
                                        </div>
                                        <div class="facilidade-texto-ultra">
                                            <strong>Estacionamento</strong>
                                            <span>Vagas disponÃ­veis</span>
                                        </div>
                                    </div>
                                    <div class="facilidade-item-ultra">
                                        <div class="facilidade-icon-ultra metro-ultra">
                                            <i class="fas fa-subway"></i>
                                        </div>
                                        <div class="facilidade-texto-ultra">
                                            <strong>MetrÃ´</strong>
                                            <span>PrÃ³ximo Ã  estaÃ§Ã£o</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- AÃ§Ãµes e mapa -->
                        <div class="localizacao-secundaria-ultra">
                            <div class="acoes-card-ultra" data-aos="fade-left" data-aos-delay="300">
                                <h4 class="acoes-titulo-ultra">Como Chegar</h4>
                                <div class="acoes-botoes-ultra">
                                    <a href="https://maps.app.goo.gl/BtrBP6btCBaYzEBfA" target="_blank" class="btn-acao-ultra btn-maps-ultra" rel="noopener">
                                        <div class="btn-icon-ultra">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="btn-texto-ultra">
                                            <strong>Ver no Maps</strong>
                                            <span>NavegaÃ§Ã£o GPS</span>
                                        </div>
                                    </a>
                                    <a href="tel:<?php echo esc_attr(get_theme_mod('cetesi_phone', '(61) 99999-9999')); ?>" class="btn-acao-ultra btn-ligar-ultra">
                                        <div class="btn-icon-ultra">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="btn-texto-ultra">
                                            <strong>Ligar Agora</strong>
                                            <span>Fale conosco</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="mapa-container-ultra" data-aos="fade-left" data-aos-delay="400">
                                <div class="mapa-header-ultra">
                                    <i class="fas fa-map"></i>
                                    <span>LocalizaÃ§Ã£o no Mapa</span>
                                </div>
                                <div class="mapa-wrapper-ultra">
                                    <iframe 
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3839.1234567890123!2d-48.12345678901234!3d-15.12345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTXCsDA3JzI0LjQiUyA0OMKwMDcrMjQuNCJX!5e0!3m2!1spt-BR!2sbr!4v1234567890123!5m2!1spt-BR!2sbr"
                                        width="100%" 
                                        height="350" 
                                        style="border:0; border-radius: 12px;" 
                                        allowfullscreen="" 
                                        loading="lazy" 
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SeÃ§Ã£o de Formas de Pagamento Ultra Moderna -->
            <section class="pagamento-section-ultra">
                <div class="container">
                    <div class="section-header-ultra">
                        <h2 class="section-titulo-ultra">
                            <span class="titulo-icon-ultra">
                                <i class="fas fa-credit-card"></i>
                            </span>
                            Formas de Pagamento
                        </h2>
                        <p class="section-subtitulo-ultra">OpÃ§Ãµes flexÃ­veis para facilitar seu investimento</p>
                                    </div>
                    
                    <div class="pagamento-content-ultra">
                        <?php
                        $forma_pagamento = get_post_meta(get_the_ID(), '_curso_forma_pagamento', true);
                        $parcelamento = get_post_meta(get_the_ID(), '_curso_parcelamento', true);
                        ?>
                        
                        <div class="pagamento-grid-ultra">
                            <div class="pagamento-card-ultra" data-aos="zoom-in" data-aos-delay="100">
                                <div class="pagamento-icon-ultra">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <h3 class="pagamento-titulo-ultra">MÃ©todos Aceitos</h3>
                                <?php if ($forma_pagamento) : ?>
                                    <p class="pagamento-descricao-ultra"><?php 
                                        $forma_pagamento_formatada = str_replace('|', ',', $forma_pagamento);
                                        echo esc_html($forma_pagamento_formatada); 
                                    ?></p>
                                <?php else : ?>
                                    <p class="pagamento-descricao-ultra">Dinheiro, cartÃ£o de crÃ©dito, dÃ©bito, PIX e boleto bancÃ¡rio</p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="pagamento-card-ultra" data-aos="zoom-in" data-aos-delay="200">
                                <div class="pagamento-icon-ultra">
                                    <i class="fas fa-calendar-alt"></i>
                        </div>
                                <h3 class="pagamento-titulo-ultra">Parcelamento</h3>
                                <?php if ($parcelamento) : ?>
                                    <p class="pagamento-descricao-ultra"><?php 
                                        $parcelamento_formatado = str_replace('|', ',', $parcelamento);
                                        echo esc_html($parcelamento_formatado); 
                                    ?></p>
                                <?php else : ?>
                                    <p class="pagamento-descricao-ultra">AtÃ© 12x sem juros no cartÃ£o de crÃ©dito</p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="pagamento-card-ultra" data-aos="zoom-in" data-aos-delay="300">
                                <div class="pagamento-icon-ultra">
                                    <i class="fas fa-percentage"></i>
                                </div>
                                <h3 class="pagamento-titulo-ultra">Descontos</h3>
                                <p class="pagamento-descricao-ultra">Desconto especial para pagamento Ã  vista</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Final -->
            <section class="cta-final-section">
                <div class="container">
                    <div class="cta-content">
                        <div class="cta-text">
                            <h2>Pronto para comeÃ§ar sua jornada profissional?</h2>
                            <p>NÃ£o perca esta oportunidade de investir no seu futuro. Inscreva-se agora e dÃª o primeiro passo para uma carreira de sucesso!</p>
                        </div>
                        
                        <div class="cta-actions">
                            <?php if ($link_inscricao) : ?>
                            <a href="<?php echo esc_url($link_inscricao); ?>" class="btn-cta-principal" target="_blank">
                                <i class="fas fa-rocket"></i>
                                <span>Inscrever-se Agora</span>
                                <div class="btn-shine"></div>
                            </a>
                            <?php endif; ?>
                            
                            <?php 
                            $consultor_btn = cetesi_get_cta_button('curso_consultor', 'Falar com Consultor', '#contato');
                            $whatsapp_btn = cetesi_get_cta_button('curso_whatsapp', 'WhatsApp', 'https://wa.me/556133514511');
                            ?>
                            
                            <a href="<?php echo esc_url($consultor_btn['url']); ?>" class="btn-cta-secundario">
                                <i class="fas fa-phone"></i>
                                <span><?php echo esc_html($consultor_btn['text']); ?></span>
                            </a>
                            
                            <a href="<?php echo esc_url($whatsapp_btn['url']); ?>" class="btn-cta-whatsapp" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                <span><?php echo esc_html($whatsapp_btn['text']); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    <?php endwhile; ?>
</main>

<!-- CSS da página de curso movido para assets/css/single-curso.css -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== ANIMAÃ‡Ã•ES DE ENTRADA =====
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

    // ===== EFEITOS DE HOVER AVANÃ‡ADOS =====
    const badges = document.querySelectorAll('.badge-ultra');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px) scale(1.02)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // ===== EFEITO RIPPLE NOS BOTÃ•ES =====
    const buttons = document.querySelectorAll('.btn-inscricao-ultra, .btn-inscricao-card-ultra, .btn-matricule-se-ultra');
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

    // ===== SCROLL SUAVE =====
    // Scroll suave para seÃ§Ãµes internas
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

    // ===== PARALLAX SUAVE NO HERO =====
    const hero = document.querySelector('.curso-hero-ultra-moderno');
    if (hero) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            hero.style.transform = `translateY(${rate}px)`;
        });
    }

    // ===== CONTADOR ANIMADO PARA PREÃ‡OS =====
    const precoElements = document.querySelectorAll('.preco-valor-ultra, .preco-valor-promocional-ultra');
    precoElements.forEach(element => {
        const text = element.textContent;
        const number = parseFloat(text.replace(/[^\d.,]/g, '').replace(',', '.'));
        
        if (!isNaN(number)) {
            element.textContent = text; // Manter formataÃ§Ã£o original
            element.style.opacity = '0';
            element.style.transform = 'scale(0.8)';
            
            setTimeout(() => {
                element.style.transition = 'all 0.6s ease-out';
                element.style.opacity = '1';
                element.style.transform = 'scale(1)';
            }, 500);
        }
    });

    // ===== LAZY LOADING DE IMAGENS =====
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });

    images.forEach(img => imageObserver.observe(img));

    // ===== PERFORMANCE: DEBOUNCE SCROLL =====
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }
        scrollTimeout = setTimeout(function() {
            // CÃ³digo de scroll aqui
        }, 10);
    });

    // ===== MELHORIAS DE ACESSIBILIDADE =====
    // Foco visÃ­vel melhorado
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
    });

    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });

    // ===== PRELOAD DE RECURSOS CRÃTICOS =====
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
