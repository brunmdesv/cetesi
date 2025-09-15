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
                            // Campos dinâmicos
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
                                            'tecnico' => 'Técnico',
                                            'livre' => 'Curso Livre',
                                            'qualificacao' => 'Qualificação',
                                            'especializacao' => 'Especialização'
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
                                            'hibrido' => 'Híbrido'
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
                                            'saude' => 'Saúde',
                                            'tecnologia' => 'Tecnologia',
                                            'gestao' => 'Gestão',
                                            'educacao' => 'Educação',
                                            'seguranca' => 'Segurança'
                                        );
                                        echo isset($area_labels[$area_conhecimento]) ? $area_labels[$area_conhecimento] : ucfirst($area_conhecimento);
                                    ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Título e Descrição Ultra Modernos -->
                            <div class="curso-header-ultra" data-aos="fade-up" data-aos-delay="400">
                                <h1 class="curso-titulo-ultra"><?php the_title(); ?></h1>
                                <p class="curso-descricao-ultra"><?php the_content(); ?></p>
                            </div>
                            
                            <!-- Grid de Informações Ultra Moderno -->
                            <div class="curso-info-grid-ultra" data-aos="fade-up" data-aos-delay="500">
                                <?php if ($duracao) : ?>
                                <div class="info-item-ultra" data-aos="zoom-in" data-aos-delay="600">
                                    <div class="info-icon-ultra">
                                    <i class="fas fa-clock"></i>
                                </div>
                                    <div class="info-content-ultra">
                                        <span class="info-label-ultra">Duração</span>
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
                                        <span class="info-label-ultra">Carga Horária</span>
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
                                                'flexivel' => 'Flexível'
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
                                    <h3 class="cta-titulo-ultra">Pronto para começar sua jornada?</h3>
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
                        
                        <!-- Card de Preço Ultra Moderno -->
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
                                        <span class="beneficio-texto">Certificado válido</span>
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
                                    <span>Começar Agora</span>
                                    </div>
                                    <div class="btn-shine-ultra"></div>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Seção de Detalhes do Curso Ultra Moderna -->
            <section id="curso-detalhes" class="curso-detalhes-section-ultra">
                <div class="container">
                    <div class="section-header-ultra">
                        <h2 class="section-titulo-ultra">
                            <span class="titulo-icon-ultra">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            Detalhes do Curso
                        </h2>
                        <p class="section-subtitulo-ultra">Conheça todos os aspectos importantes do curso</p>
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
                                <p class="card-descricao-ultra">Formar profissionais capacitados e preparados para o mercado de trabalho, desenvolvendo competências técnicas e habilidades práticas essenciais.</p>
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
                                <p class="card-descricao-ultra">Metodologia ativa com aulas teóricas, práticas laboratoriais, estudos de caso e estágio supervisionado em ambiente real de trabalho.</p>
                        <?php endif; ?>
                            </div>
                            
                        <div class="detalhes-card-ultra" data-aos="fade-up" data-aos-delay="300">
                            <div class="card-icon-ultra">
                                <i class="fas fa-certificate"></i>
                                </div>
                            <h3 class="card-titulo-ultra">Certificação</h3>
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
                                    Certificado de conclusão válido em todo território nacional
                                <?php endif; ?>
                                
                                <?php if ($reconhecimento) : ?>
                                    <br><small class="reconhecimento-texto">
                                        <?php 
                                        $reconhecimento_labels = array(
                                            'mec' => 'Reconhecido pelo MEC',
                                            'conselho' => 'Reconhecido pelo Conselho',
                                            'ministerio' => 'Reconhecido pelo Ministério',
                                            'certificacao' => 'Certificação Profissional'
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
                            
                            // Se há módulos definidos, exibir os cards dos módulos
                            if ($modulo_1 || $modulo_2 || $modulo_3) :
                            ?>
                                <div class="modulos-grid-ultra">
                                    <?php if ($modulo_1) : ?>
                                    <div class="modulo-card-ultra" data-aos="zoom-in" data-aos-delay="500">
                                        <div class="modulo-header-ultra">
                                            <div class="modulo-icon-ultra">
                                                <i class="fas fa-book"></i>
                                            </div>
                                            <h4 class="modulo-titulo-ultra">Módulo 1</h4>
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
                                            <h4 class="modulo-titulo-ultra">Módulo 2</h4>
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
                                            <h4 class="modulo-titulo-ultra">Módulo 3</h4>
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
                                <p class="card-descricao-ultra">Grade curricular completa com disciplinas teóricas e práticas, incluindo estágio supervisionado e atividades complementares.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <?php
            // Verificar se o curso é da categoria técnica usando o meta field _curso_tipo
            $curso_tipo = get_post_meta(get_the_ID(), '_curso_tipo', true);
            $is_tecnico = ($curso_tipo === 'tecnico');
            
            // Mostrar seção de Mercado de Trabalho apenas para cursos técnicos
            if ($is_tecnico) :
            ?>
            <!-- Seção de Mercado de Trabalho Ultra Moderna -->
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
                                <div class="stat-label-ultra"><?php echo $salario_inicial ? 'Salário Inicial' : 'Salário Médio'; ?></div>
                                </div>
                            <?php else : ?>
                            <div class="stat-card-ultra" data-aos="zoom-in" data-aos-delay="200">
                                <div class="stat-icon-ultra">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="stat-number-ultra">R$ 3.500</div>
                                <div class="stat-label-ultra">Salário Inicial</div>
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
                                <h3>Mercado em Expansão</h3>
                                <p>O mercado de trabalho para profissionais técnicos está em constante crescimento, com alta demanda em diversos setores da economia.</p>
                                    </div>
                                    <?php endif; ?>
                                    
                            <?php if ($areas_atuacao) : ?>
                            <div class="areas-atuacao">
                                <h3>Principais Áreas de Atuação</h3>
                                <div class="areas-lista-moderna">
                                    <?php 
                                    // Dividir por vírgula e limpar espaços
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
                                <h3>Principais Áreas de Atuação</h3>
                                <div class="areas-lista-moderna">
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Hospitais públicos e privados</span>
                                    </div>
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Unidades Básicas de Saúde (UBS)</span>
                                    </div>
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Clínicas especializadas</span>
                                    </div>
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Home Care</span>
                                    </div>
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Instituições de longa permanência</span>
                                    </div>
                                    <div class="area-item-moderno">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Laboratórios de análises clínicas</span>
                                    </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                </div>
            </section>
            <?php endif; ?>

            <!-- Seção de Pré-requisitos Ultra Moderna -->
            <section class="prerequisitos-section-ultra">
                <div class="container">
                    <div class="section-header-ultra">
                        <h2 class="section-titulo-ultra">
                            <span class="titulo-icon-ultra">
                                <i class="fas fa-clipboard-list"></i>
                            </span>
                            Pré-requisitos e Documentos
                        </h2>
                        <p class="section-subtitulo-ultra">Tudo que você precisa saber para se inscrever</p>
                    </div>
                    
                    <div class="prerequisitos-content-ultra">
                        <?php
                        $prerequisitos = get_post_meta(get_the_ID(), '_curso_prerequisitos', true);
                        $documentos = get_post_meta(get_the_ID(), '_curso_documentos', true);
                        $escolaridade = get_post_meta(get_the_ID(), '_curso_escolaridade', true);
                        $idade_minima = get_post_meta(get_the_ID(), '_curso_idade_minima', true);
                        ?>
                        
                        <div class="prerequisitos-grid-ultra">
                            <!-- Primeira linha: Escolaridade + Pré-requisitos -->
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
                                            'medio' => 'Ensino Médio Completo',
                                            'superior' => 'Ensino Superior Completo',
                                            'qualquer' => 'Qualquer Escolaridade'
                                        );
                                        echo isset($escolaridade_labels[$escolaridade]) ? $escolaridade_labels[$escolaridade] : ucfirst($escolaridade);
                                    } else {
                                        echo 'Ensino Médio Completo';
                                    }
                                ?></p>
                            </div>
                            
                            <div class="requisito-card-ultra requisito-card-large-ultra" data-aos="fade-up" data-aos-delay="200">
                                <div class="requisito-header-ultra">
                                    <div class="requisito-icon-ultra">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <h3 class="requisito-titulo-ultra">Pré-requisitos Específicos</h3>
                                </div>
                                <p class="requisito-descricao-ultra"><?php 
                                    if (!empty($prerequisitos)) {
                                        $prerequisitos_formatados = str_replace('|', ',', $prerequisitos);
                                        echo esc_html($prerequisitos_formatados);
                                    } else {
                                        echo 'Idade mínima de 18 anos, Ensino Médio completo, Documentação pessoal (RG, CPF, comprovante de residência)';
                                    }
                                ?></p>
                            </div>
                            
                            <!-- Segunda linha: Idade Mínima + Documentos -->
                            <div class="requisito-card-ultra requisito-card-small-ultra" data-aos="fade-up" data-aos-delay="300">
                                <div class="requisito-header-ultra">
                                    <div class="requisito-icon-ultra">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <h3 class="requisito-titulo-ultra">Idade Mínima</h3>
                                </div>
                                <p class="requisito-descricao-ultra"><?php echo !empty($idade_minima) ? esc_html($idade_minima) . ' anos' : '18 anos'; ?></p>
                            </div>
                            
                            <div class="requisito-card-ultra requisito-card-large-ultra" data-aos="fade-up" data-aos-delay="400">
                                <div class="requisito-header-ultra">
                                    <div class="requisito-icon-ultra">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <h3 class="requisito-titulo-ultra">Documentos Necessários</h3>
                                </div>
                                <p class="requisito-descricao-ultra"><?php 
                                    if (!empty($documentos)) {
                                        $documentos_formatados = str_replace('|', ',', $documentos);
                                        echo esc_html($documentos_formatados);
                                    } else {
                                        echo 'RG (original e cópia), CPF (original e cópia), Comprovante de residência (original e cópia), Foto 3x4 recente (2 fotos)';
                                    }
                                ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Seção de Localização Ultra Moderna -->
            <section class="localizacao-section-ultra">
                <div class="container">
                    <div class="section-header-ultra">
                        <h2 class="section-titulo-ultra">
                            <span class="titulo-icon-ultra">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            Localização
                        </h2>
                        <p class="section-subtitulo-ultra">Encontre-nos facilmente em Ceilândia, Brasília</p>
                    </div>
                    
                    <div class="localizacao-content-ultra">
                        <!-- Informações principais -->
                        <div class="localizacao-principal-ultra">
                            <div class="endereco-card-ultra" data-aos="fade-right" data-aos-delay="100">
                                <div class="endereco-header-ultra">
                                    <div class="endereco-icon-ultra">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h3 class="endereco-titulo-ultra">Nossa Localização</h3>
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
                                        <span class="endereco-linha-texto">Ceilândia, Brasília - DF</span>
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
                                            <strong>Transporte Público</strong>
                                            <span>Fácil acesso por ônibus</span>
                                        </div>
                                    </div>
                                    <div class="facilidade-item-ultra">
                                        <div class="facilidade-icon-ultra estacionamento-ultra">
                                            <i class="fas fa-car"></i>
                                        </div>
                                        <div class="facilidade-texto-ultra">
                                            <strong>Estacionamento</strong>
                                            <span>Vagas disponíveis</span>
                                        </div>
                                    </div>
                                    <div class="facilidade-item-ultra">
                                        <div class="facilidade-icon-ultra metro-ultra">
                                            <i class="fas fa-subway"></i>
                                        </div>
                                        <div class="facilidade-texto-ultra">
                                            <strong>Metrô</strong>
                                            <span>Próximo à estação</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Ações e mapa -->
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
                                            <span>Navegação GPS</span>
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
                                    <span>Localização no Mapa</span>
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

            <!-- Seção de Formas de Pagamento Ultra Moderna -->
            <section class="pagamento-section-ultra">
                <div class="container">
                    <div class="section-header-ultra">
                        <h2 class="section-titulo-ultra">
                            <span class="titulo-icon-ultra">
                                <i class="fas fa-credit-card"></i>
                            </span>
                            Formas de Pagamento
                        </h2>
                        <p class="section-subtitulo-ultra">Opções flexíveis para facilitar seu investimento</p>
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
                                <h3 class="pagamento-titulo-ultra">Métodos Aceitos</h3>
                                <?php if ($forma_pagamento) : ?>
                                    <p class="pagamento-descricao-ultra"><?php 
                                        $forma_pagamento_formatada = str_replace('|', ',', $forma_pagamento);
                                        echo esc_html($forma_pagamento_formatada); 
                                    ?></p>
                                <?php else : ?>
                                    <p class="pagamento-descricao-ultra">Dinheiro, cartão de crédito, débito, PIX e boleto bancário</p>
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
                                    <p class="pagamento-descricao-ultra">Até 12x sem juros no cartão de crédito</p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="pagamento-card-ultra" data-aos="zoom-in" data-aos-delay="300">
                                <div class="pagamento-icon-ultra">
                                    <i class="fas fa-percentage"></i>
                                </div>
                                <h3 class="pagamento-titulo-ultra">Descontos</h3>
                                <p class="pagamento-descricao-ultra">Desconto especial para pagamento à vista</p>
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
                            <h2>Pronto para começar sua jornada profissional?</h2>
                            <p>Não perca esta oportunidade de investir no seu futuro. Inscreva-se agora e dê o primeiro passo para uma carreira de sucesso!</p>
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

<style>
/* ===== ESTILOS ULTRA MODERNOS DA PÁGINA DE CURSO ===== */

/* Reset e Variáveis Ultra Modernas */
.curso-ultra-moderno {
    --primary-color: #3b82f6;
    --primary-dark: #1e40af;
    --primary-light: #60a5fa;
    --secondary-color: #10b981;
    --secondary-dark: #059669;
    --secondary-light: #34d399;
    --accent-color: #f59e0b;
    --accent-dark: #d97706;
    --accent-light: #fbbf24;
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
    --gradient-accent: linear-gradient(135deg, var(--accent-color) 0%, var(--accent-dark) 100%);
    --gradient-hero: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    --gradient-glass: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
}


/* ===== HERO ULTRA MODERNO ===== */
.curso-hero-ultra-moderno {
    position: relative;
    background: var(--gradient-hero);
    padding: var(--space-5xl) 0;
    overflow: hidden;
    min-height: 80vh;
    display: flex;
    align-items: center;
}

.hero-background-ultra {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}

.hero-pattern-ultra {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 60%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
    animation: float-ultra 20s ease-in-out infinite;
}

.hero-gradient-ultra {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(59, 130, 246, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%);
}

.hero-shapes {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    animation: shapes-move 30s linear infinite;
}

@keyframes float-ultra {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-30px) rotate(5deg); }
}

@keyframes shapes-move {
    0% { transform: translateX(0); }
    100% { transform: translateX(60px); }
}

.hero-content-ultra {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1fr 420px;
    gap: var(--space-4xl);
    align-items: start;
}

.hero-main-content {
    color: white;
}

/* ===== BADGES ULTRA MODERNOS ===== */
.curso-badges-ultra {
    display: flex;
    gap: var(--space-md);
    margin-bottom: var(--space-2xl);
    flex-wrap: wrap;
}

.badge-ultra {
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-md) var(--space-lg);
    background: rgba(255, 255, 255, 0.15);
    border-radius: var(--radius-2xl);
    font-size: 0.875rem;
    font-weight: 600;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.badge-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left var(--transition-slow);
}

.badge-ultra:hover::before {
    left: 100%;
}

.badge-ultra:hover {
    transform: translateY(-2px);
    background: rgba(255, 255, 255, 0.25);
    box-shadow: var(--shadow-lg);
}

.badge-icon {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-lg);
    font-size: 0.875rem;
}

.badge-text {
    font-weight: 600;
    letter-spacing: 0.025em;
}

/* ===== HEADER ULTRA MODERNO ===== */
.curso-header-ultra {
    margin-bottom: var(--space-3xl);
}

.curso-titulo-ultra {
    font-size: 3.5rem;
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: var(--space-xl);
    color: white;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    letter-spacing: -0.025em;
}

.curso-descricao-ultra {
    font-size: 1.25rem;
    line-height: 1.7;
    margin-bottom: 0;
    color: rgba(255, 255, 255, 0.9);
    max-width: 600px;
}

/* ===== GRID DE INFORMAÇÕES ULTRA MODERNO ===== */
.curso-info-grid-ultra {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-lg);
    margin-bottom: var(--space-2xl);
}

.info-item-ultra {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    padding: var(--space-md);
    background: rgba(255, 255, 255, 0.1);
    border-radius: var(--radius-xl);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.info-item-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: var(--gradient-accent);
    border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
}

.info-item-ultra:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.15);
    box-shadow: var(--shadow-xl);
}

.info-icon-ultra {
    width: 36px;
    height: 36px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all var(--transition-normal);
}

.info-item-ultra:hover .info-icon-ultra {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

.info-icon-ultra i {
    color: white;
    font-size: 1rem;
}

.info-content-ultra {
    display: flex;
    flex-direction: column;
    gap: var(--space-xs);
}

.info-label-ultra {
    font-size: 0.75rem;
    color: rgba(255, 255, 255, 0.7);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.info-value-ultra {
    font-size: 0.875rem;
    font-weight: 700;
    color: white;
}

/* ===== CTA MATRICULE-SE ULTRA MODERNO ===== */
.cta-matricule-se-ultra {
    margin: var(--space-3xl) 0;
    padding: var(--space-2xl);
    background: rgba(255, 255, 255, 0.1);
    border-radius: var(--radius-3xl);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
    overflow: hidden;
}

.cta-matricule-se-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%);
    z-index: 1;
}

.cta-content-ultra {
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: var(--space-xl);
}

.cta-titulo-ultra {
    font-size: 1.75rem;
    font-weight: 800;
    color: white;
    margin: 0;
    letter-spacing: -0.025em;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.cta-botoes-ultra {
    display: flex;
    gap: var(--space-lg);
    justify-content: center;
}

.btn-matricule-se-ultra {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-md);
    padding: var(--space-lg) var(--space-2xl);
    background: var(--gradient-accent);
    color: white;
    text-decoration: none;
    border-radius: var(--radius-2xl);
    font-weight: 700;
    font-size: 1.125rem;
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
    border: none;
    cursor: pointer;
    box-shadow: var(--shadow-lg);
}

.btn-matricule-se-ultra:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-2xl);
    color: white;
}

.btn-matricule-se-ultra .btn-shine-ultra {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left var(--transition-slow);
}

.btn-matricule-se-ultra:hover .btn-shine-ultra {
    left: 100%;
}

.btn-saiba-mais-ultra {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-md);
    padding: var(--space-lg) var(--space-2xl);
    background: transparent;
    color: white;
    text-decoration: none;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: var(--radius-2xl);
    font-weight: 600;
    font-size: 1.125rem;
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.btn-saiba-mais-ultra:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
    transform: translateY(-2px);
}

.btn-content-ultra {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    position: relative;
    z-index: 2;
}

.btn-content-ultra i {
    font-size: 1.25rem;
}

.btn-content-ultra span {
    font-weight: inherit;
}


/* ===== SIDEBAR ULTRA MODERNA ===== */
.hero-sidebar-ultra {
    position: sticky;
    top: var(--space-2xl);
}

.curso-card-preco-ultra {
    background: white;
    border-radius: var(--radius-3xl);
    padding: var(--space-2xl);
    box-shadow: var(--shadow-2xl);
    position: relative;
    overflow: hidden;
    border: 1px solid var(--border-light);
}

.curso-card-preco-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.card-header-ultra {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--space-xl);
}

.card-titulo-ultra {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-primary);
    margin: 0;
}

.desconto-badge-ultra {
    background: var(--gradient-accent);
    color: white;
    padding: var(--space-sm) var(--space-md);
    border-radius: var(--radius-xl);
    font-size: 0.875rem;
    font-weight: 700;
    box-shadow: var(--shadow-md);
}

.desconto-texto {
    font-weight: 700;
}

.card-preco-ultra {
    margin-bottom: var(--space-xl);
    text-align: center;
}

.preco-valor-promocional-ultra {
    font-size: 3rem;
    font-weight: 900;
    color: var(--accent-color);
    display: block;
    line-height: 1;
}

.preco-valor-original-ultra {
    font-size: 1.5rem;
    color: var(--text-light);
    text-decoration: line-through;
    display: block;
    margin-top: var(--space-sm);
}

.preco-valor-ultra {
    font-size: 3rem;
    font-weight: 900;
    color: var(--primary-color);
    display: block;
    line-height: 1;
}

.card-beneficios-ultra {
    margin-bottom: var(--space-xl);
}

.beneficio-item-ultra {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    margin-bottom: var(--space-md);
    padding: var(--space-md);
    background: var(--bg-accent);
    border-radius: var(--radius-xl);
    transition: all var(--transition-normal);
}

.beneficio-item-ultra:hover {
    background: var(--bg-secondary);
    transform: translateX(4px);
}

.beneficio-icon {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--gradient-secondary);
    border-radius: var(--radius-full);
    color: white;
    font-size: 0.875rem;
    flex-shrink: 0;
}

.beneficio-texto {
    font-size: 0.875rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.btn-inscricao-card-ultra {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-md);
    width: 100%;
    padding: var(--space-lg);
    background: var(--gradient-primary);
    color: white;
    text-decoration: none;
    border-radius: var(--radius-2xl);
    font-weight: 700;
    font-size: 1.125rem;
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
    border: none;
    cursor: pointer;
}

.btn-inscricao-card-ultra:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
    color: white;
}

.btn-inscricao-card-ultra .btn-shine-ultra {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left var(--transition-slow);
}

.btn-inscricao-card-ultra:hover .btn-shine-ultra {
    left: 100%;
}

/* ===== SEÇÕES ULTRA MODERNAS ===== */

/* Seção de Detalhes Ultra Moderna */
.curso-detalhes-section-ultra {
    padding: var(--space-5xl) 0;
    background: var(--bg-secondary);
    position: relative;
    overflow: hidden;
}

.curso-detalhes-section-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.02) 0%, rgba(16, 185, 129, 0.02) 100%);
    z-index: 1;
}

.section-header-ultra {
    text-align: center;
    margin-bottom: var(--space-4xl);
    position: relative;
    z-index: 2;
}

.section-titulo-ultra {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-lg);
    font-size: 3rem;
    font-weight: 900;
    color: var(--text-primary);
    margin-bottom: var(--space-lg);
    letter-spacing: -0.025em;
}

.titulo-icon-ultra {
    width: 70px;
    height: 70px;
    background: var(--gradient-primary);
    border-radius: var(--radius-2xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.75rem;
    box-shadow: var(--shadow-xl);
}

.section-subtitulo-ultra {
    font-size: 1.25rem;
    color: var(--text-secondary);
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.detalhes-grid-ultra {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-2xl);
    margin-bottom: var(--space-2xl);
    position: relative;
    z-index: 2;
}

.detalhes-card-full-ultra {
    grid-column: 1 / -1;
}

.detalhes-card-ultra {
    background: white;
    padding: var(--space-2xl);
    border-radius: var(--radius-3xl);
    box-shadow: var(--shadow-lg);
    text-align: center;
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
    border: 1px solid var(--border-light);
}

.detalhes-card-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.detalhes-card-ultra:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-2xl);
}

.card-icon-ultra {
    width: 90px;
    height: 90px;
    background: var(--gradient-secondary);
    border-radius: var(--radius-2xl);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--space-xl);
    color: white;
    font-size: 2.25rem;
    box-shadow: var(--shadow-lg);
    transition: all var(--transition-normal);
}

.detalhes-card-ultra:hover .card-icon-ultra {
    transform: scale(1.1) rotate(5deg);
}

.card-titulo-ultra {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-lg);
    letter-spacing: -0.025em;
}

.card-descricao-ultra {
    color: var(--text-secondary);
    line-height: 1.7;
    font-size: 1rem;
}

.reconhecimento-texto {
    color: var(--accent-color);
    font-weight: 600;
    font-size: 0.875rem;
}

.disciplinas-lista-ultra {
    text-align: left;
    background: var(--bg-accent);
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    border-left: 4px solid var(--primary-color);
}

/* ===== CARDS DE MÓDULOS ULTRA MODERNOS ===== */
.modulos-grid-ultra {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-xl);
    margin-top: var(--space-lg);
}

.modulo-card-ultra {
    background: white;
    border-radius: var(--radius-2xl);
    padding: var(--space-xl);
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--border-light);
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.modulo-card-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.modulo-card-ultra:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.modulo-header-ultra {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    margin-bottom: var(--space-lg);
    padding-bottom: var(--space-md);
    border-bottom: 2px solid var(--border-light);
}

.modulo-icon-ultra {
    width: 50px;
    height: 50px;
    background: var(--gradient-secondary);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
    box-shadow: var(--shadow-md);
}

.modulo-titulo-ultra {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
}

.modulo-conteudo-ultra {
    color: var(--text-secondary);
    line-height: 1.6;
    font-size: 0.95rem;
    text-align: left;
}

.modulo-conteudo-ultra p {
    margin-bottom: var(--space-sm);
}

.modulo-conteudo-ultra p:last-child {
    margin-bottom: 0;
}

/* Seção de Mercado de Trabalho Ultra Moderna */
.mercado-trabalho-section-ultra {
    padding: var(--space-5xl) 0;
    background: white;
    position: relative;
    overflow: hidden;
}

.mercado-trabalho-section-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.02) 0%, rgba(59, 130, 246, 0.02) 100%);
    z-index: 1;
}

.mercado-content-ultra {
    position: relative;
    z-index: 2;
}

.mercado-stats-ultra {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--space-xl);
    margin-bottom: var(--space-4xl);
}

.stat-card-ultra {
    background: white;
    padding: var(--space-2xl);
    border-radius: var(--radius-3xl);
    text-align: center;
    position: relative;
    overflow: hidden;
    border: 1px solid var(--border-light);
    box-shadow: var(--shadow-lg);
    transition: all var(--transition-normal);
}

.stat-card-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-primary);
    opacity: 0.05;
    transition: opacity var(--transition-normal);
}

.stat-card-ultra:hover::before {
    opacity: 0.1;
}

.stat-card-ultra:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-2xl);
}

.stat-icon-ultra {
    width: 60px;
    height: 60px;
    background: var(--gradient-primary);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--space-lg);
    color: white;
    font-size: 1.5rem;
    box-shadow: var(--shadow-md);
}

.stat-number-ultra {
    font-size: 3.5rem;
    font-weight: 900;
    margin-bottom: var(--space-md);
    position: relative;
    z-index: 1;
    color: var(--text-primary);
    line-height: 1;
}

.stat-label-ultra {
    font-size: 1.125rem;
    font-weight: 600;
    position: relative;
    z-index: 1;
    color: var(--text-secondary);
}

/* Seção de Pré-requisitos Ultra Moderna */
.prerequisitos-section-ultra {
    padding: var(--space-5xl) 0;
    background: var(--bg-secondary);
    position: relative;
    overflow: hidden;
}

.prerequisitos-section-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.02) 0%, rgba(239, 68, 68, 0.02) 100%);
    z-index: 1;
}

.prerequisitos-content-ultra {
    position: relative;
    z-index: 2;
}

.prerequisitos-grid-ultra {
    display: grid;
    grid-template-columns: 35% 65%;
    gap: var(--space-xl);
    margin-bottom: var(--space-xl);
}

.requisito-card-ultra {
    background: white;
    padding: var(--space-2xl);
    border-radius: var(--radius-3xl);
    box-shadow: var(--shadow-lg);
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
    border: 1px solid var(--border-light);
}

.requisito-card-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-accent);
}

.requisito-card-ultra:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-2xl);
}

.requisito-header-ultra {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    margin-bottom: var(--space-lg);
}

.requisito-icon-ultra {
    width: 50px;
    height: 50px;
    background: var(--gradient-accent);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
    box-shadow: var(--shadow-md);
}

.requisito-titulo-ultra {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
}

.requisito-descricao-ultra {
    color: var(--text-secondary);
    line-height: 1.6;
    font-size: 1rem;
    margin: 0;
}

/* Seção de Localização Ultra Moderna */
.localizacao-section-ultra {
    padding: var(--space-5xl) 0;
    background: white;
    position: relative;
    overflow: hidden;
}

.localizacao-section-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.02) 0%, rgba(16, 185, 129, 0.02) 100%);
    z-index: 1;
}

.localizacao-content-ultra {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-3xl);
    margin-top: var(--space-3xl);
    position: relative;
    z-index: 2;
}

.localizacao-principal-ultra {
    display: flex;
    flex-direction: column;
    gap: var(--space-xl);
}

.endereco-card-ultra {
    background: white;
    padding: var(--space-2xl);
    border-radius: var(--radius-3xl);
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--border-light);
    position: relative;
    overflow: hidden;
}

.endereco-card-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.endereco-header-ultra {
    display: flex;
    align-items: center;
    gap: var(--space-lg);
    margin-bottom: var(--space-xl);
    padding-bottom: var(--space-lg);
    border-bottom: 2px solid var(--border-light);
}

.endereco-icon-ultra {
    width: 50px;
    height: 50px;
    background: var(--gradient-primary);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    box-shadow: var(--shadow-md);
}

.endereco-titulo-ultra {
    margin: 0;
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--text-primary);
}

.endereco-detalhes-ultra {
    display: flex;
    flex-direction: column;
    gap: var(--space-lg);
}

.endereco-linha-ultra {
    display: flex;
    align-items: center;
    gap: var(--space-lg);
    padding: var(--space-lg);
    background: var(--bg-accent);
    border-radius: var(--radius-xl);
    border-left: 4px solid var(--primary-color);
    transition: all var(--transition-normal);
}

.endereco-linha-ultra:hover {
    background: var(--bg-secondary);
    transform: translateX(4px);
}

.endereco-linha-icon {
    width: 40px;
    height: 40px;
    background: var(--gradient-primary);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
}

.endereco-linha-texto {
    color: var(--text-primary);
    font-size: 1rem;
    line-height: 1.4;
}

.facilidades-card-ultra {
    background: white;
    padding: var(--space-2xl);
    border-radius: var(--radius-3xl);
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--border-light);
    position: relative;
    overflow: hidden;
}

.facilidades-card-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-secondary);
}

.facilidades-titulo-ultra {
    margin: 0 0 var(--space-xl) 0;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: var(--space-md);
}

.facilidades-titulo-ultra::before {
    content: '✨';
    font-size: 1.25rem;
}

.facilidades-grid-ultra {
    display: flex;
    flex-direction: column;
    gap: var(--space-lg);
}

.facilidade-item-ultra {
    display: flex;
    align-items: center;
    gap: var(--space-lg);
    padding: var(--space-lg);
    background: var(--bg-accent);
    border-radius: var(--radius-xl);
    transition: all var(--transition-normal);
}

.facilidade-item-ultra:hover {
    background: var(--bg-secondary);
    transform: translateY(-2px);
}

.facilidade-icon-ultra {
    width: 50px;
    height: 50px;
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.facilidade-icon-ultra.transporte-ultra {
    background: var(--gradient-primary);
}

.facilidade-icon-ultra.estacionamento-ultra {
    background: var(--gradient-secondary);
}

.facilidade-icon-ultra.metro-ultra {
    background: var(--gradient-accent);
}

.facilidade-texto-ultra {
    display: flex;
    flex-direction: column;
    gap: var(--space-xs);
}

.facilidade-texto-ultra strong {
    color: var(--text-primary);
    font-size: 1.125rem;
    font-weight: 600;
}

.facilidade-texto-ultra span {
    color: var(--text-secondary);
    font-size: 0.875rem;
}

.localizacao-secundaria-ultra {
    display: flex;
    flex-direction: column;
    gap: var(--space-xl);
}

.acoes-card-ultra {
    background: white;
    padding: var(--space-2xl);
    border-radius: var(--radius-3xl);
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--border-light);
    position: relative;
    overflow: hidden;
}

.acoes-card-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-accent);
}

.acoes-titulo-ultra {
    margin: 0 0 var(--space-xl) 0;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: var(--space-md);
}

.acoes-titulo-ultra::before {
    content: '🚀';
    font-size: 1.25rem;
}

.acoes-botoes-ultra {
    display: flex;
    flex-direction: column;
    gap: var(--space-lg);
}

.btn-acao-ultra {
    display: flex;
    align-items: center;
    gap: var(--space-lg);
    padding: var(--space-xl);
    background: white;
    border: 2px solid var(--border-light);
    border-radius: var(--radius-xl);
    text-decoration: none;
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.btn-acao-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left var(--transition-slow);
}

.btn-acao-ultra:hover::before {
    left: 100%;
}

.btn-maps-ultra:hover {
    border-color: var(--primary-color);
    background: rgba(59, 130, 246, 0.05);
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl);
}

.btn-ligar-ultra:hover {
    border-color: var(--secondary-color);
    background: rgba(16, 185, 129, 0.05);
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl);
}

.btn-icon-ultra {
    width: 60px;
    height: 60px;
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.btn-maps-ultra .btn-icon-ultra {
    background: var(--gradient-primary);
}

.btn-ligar-ultra .btn-icon-ultra {
    background: var(--gradient-secondary);
}

.btn-texto-ultra {
    display: flex;
    flex-direction: column;
    gap: var(--space-xs);
}

.btn-texto-ultra strong {
    color: var(--text-primary);
    font-size: 1.25rem;
    font-weight: 600;
}

.btn-texto-ultra span {
    color: var(--text-secondary);
    font-size: 0.875rem;
}

.mapa-container-ultra {
    background: white;
    padding: var(--space-2xl);
    border-radius: var(--radius-3xl);
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--border-light);
    position: relative;
    overflow: hidden;
}

.mapa-container-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.mapa-header-ultra {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    margin-bottom: var(--space-xl);
    padding-bottom: var(--space-lg);
    border-bottom: 2px solid var(--border-light);
    color: var(--text-primary);
    font-weight: 600;
    font-size: 1.125rem;
}

.mapa-header-ultra i {
    color: var(--primary-color);
    font-size: 1.25rem;
}

.mapa-wrapper-ultra {
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

/* Seção de Pagamento Ultra Moderna */
.pagamento-section-ultra {
    padding: var(--space-5xl) 0;
    background: var(--bg-secondary);
    position: relative;
    overflow: hidden;
}

.pagamento-section-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.02) 0%, rgba(245, 158, 11, 0.02) 100%);
    z-index: 1;
}

.pagamento-content-ultra {
    position: relative;
    z-index: 2;
}

.pagamento-grid-ultra {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-xl);
}

.pagamento-card-ultra {
    background: white;
    padding: var(--space-2xl);
    border-radius: var(--radius-3xl);
    box-shadow: var(--shadow-lg);
    text-align: center;
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
    border: 1px solid var(--border-light);
}

.pagamento-card-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-accent);
}

.pagamento-card-ultra:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-2xl);
}

.pagamento-icon-ultra {
    width: 80px;
    height: 80px;
    background: var(--gradient-accent);
    border-radius: var(--radius-2xl);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--space-xl);
    color: white;
    font-size: 2rem;
    box-shadow: var(--shadow-lg);
    transition: all var(--transition-normal);
}

.pagamento-card-ultra:hover .pagamento-icon-ultra {
    transform: scale(1.1) rotate(5deg);
}

.pagamento-titulo-ultra {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-lg);
}

.pagamento-descricao-ultra {
    color: var(--text-secondary);
    line-height: 1.6;
    font-size: 1rem;
    margin: 0;
}

/* ===== RESPONSIVIDADE ULTRA MODERNA ===== */
@media (max-width: 1200px) {
    .hero-content-ultra {
        grid-template-columns: 1fr;
        gap: var(--space-3xl);
    }
    
    .hero-sidebar-ultra {
        position: static;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .curso-titulo-ultra {
        font-size: 3rem;
    }
}

@media (max-width: 768px) {
    .curso-hero-ultra-moderno {
        padding: var(--space-3xl) 0;
        min-height: 70vh;
    }
    
    .curso-titulo-ultra {
        font-size: 2.5rem;
    }
    
    .curso-descricao-ultra {
        font-size: 1.125rem;
    }
    
    .curso-info-grid-ultra {
        grid-template-columns: 1fr;
        gap: var(--space-lg);
    }
    
    .curso-badges-ultra {
        justify-content: center;
    }
    
    /* CTA Matricule-se - Mobile */
    .cta-titulo-ultra {
        font-size: 1.5rem;
    }
    
    .cta-botoes-ultra {
        flex-direction: column;
        width: 100%;
    }
    
    .btn-matricule-se-ultra,
    .btn-saiba-mais-ultra {
        width: 100%;
        justify-content: center;
    }
    
    .curso-card-preco-ultra {
        padding: var(--space-xl);
    }
    
    .preco-valor-promocional-ultra,
    .preco-valor-ultra {
        font-size: 2.5rem;
    }
    
    /* Seções Ultra Modernas - Mobile */
    .section-titulo-ultra {
        font-size: 2.5rem;
        flex-direction: column;
        gap: var(--space-md);
    }
    
    .titulo-icon-ultra {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .detalhes-grid-ultra {
        grid-template-columns: 1fr;
        gap: var(--space-xl);
    }
    
    .detalhes-card-full-ultra {
        grid-column: 1;
    }
    
    .modulos-grid-ultra {
        grid-template-columns: 1fr;
        gap: var(--space-lg);
    }
    
    .mercado-stats-ultra {
        grid-template-columns: 1fr;
        gap: var(--space-lg);
    }
    
    .stat-number-ultra {
        font-size: 3rem;
    }
}

@media (max-width: 480px) {
    .curso-hero-ultra-moderno {
        padding: var(--space-2xl) 0;
        min-height: 60vh;
    }
    
    .curso-titulo-ultra {
        font-size: 2rem;
    }
    
    .curso-descricao-ultra {
        font-size: 1rem;
    }
    
    .info-item-ultra {
        padding: var(--space-lg);
        gap: var(--space-md);
    }
    
    .info-icon-ultra {
        width: 40px;
        height: 40px;
    }
    
    .info-icon-ultra i {
        font-size: 1rem;
    }
    
    .badge-ultra {
        padding: var(--space-sm) var(--space-md);
        font-size: 0.8rem;
    }
    
    .badge-icon {
        width: 20px;
        height: 20px;
        font-size: 0.8rem;
    }
    
    .curso-card-preco-ultra {
        padding: var(--space-lg);
    }
    
    .preco-valor-promocional-ultra,
    .preco-valor-ultra {
        font-size: 2rem;
    }
    
    /* CTA Matricule-se - Mobile Pequeno */
    .cta-matricule-se-ultra {
        padding: var(--space-xl);
        margin: var(--space-2xl) 0;
    }
    
    .cta-titulo-ultra {
        font-size: 1.25rem;
    }
    
    .btn-matricule-se-ultra,
    .btn-saiba-mais-ultra {
        padding: var(--space-md) var(--space-lg);
        font-size: 1rem;
    }
    
    .card-titulo-ultra {
        font-size: 1.25rem;
    }
    
    /* Seções Ultra Modernas - Mobile Pequeno */
    .section-titulo-ultra {
        font-size: 2rem;
    }
    
    .titulo-icon-ultra {
        width: 50px;
        height: 50px;
        font-size: 1.25rem;
    }
    
    .section-subtitulo-ultra {
        font-size: 1rem;
    }
    
    .detalhes-card-ultra {
        padding: var(--space-xl);
    }
    
    .card-icon-ultra {
        width: 70px;
        height: 70px;
        font-size: 1.75rem;
    }
    
    .card-titulo-ultra {
        font-size: 1.5rem;
    }
    
    .stat-card-ultra {
        padding: var(--space-xl);
    }
    
    .stat-icon-ultra {
        width: 50px;
        height: 50px;
        font-size: 1.25rem;
    }
    
    .stat-number-ultra {
        font-size: 2.5rem;
    }
    
    .stat-label-ultra {
        font-size: 1rem;
    }
    
    /* Pré-requisitos Ultra Modernos - Mobile Pequeno */
    .prerequisitos-grid-ultra {
        grid-template-columns: 1fr;
        gap: var(--space-lg);
    }
    
    .requisito-card-ultra {
        padding: var(--space-xl);
    }
    
    .requisito-icon-ultra {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .requisito-titulo-ultra {
        font-size: 1.25rem;
    }
    
    .requisito-descricao-ultra {
        font-size: 0.875rem;
    }
    
    /* Localização Ultra Moderna - Mobile Pequeno */
    .localizacao-content-ultra {
        grid-template-columns: 1fr;
        gap: var(--space-xl);
    }
    
    .endereco-card-ultra,
    .facilidades-card-ultra,
    .acoes-card-ultra,
    .mapa-container-ultra {
        padding: var(--space-xl);
    }
    
    .endereco-icon-ultra {
        width: 40px;
        height: 40px;
        font-size: 1.25rem;
    }
    
    .endereco-titulo-ultra {
        font-size: 1.5rem;
    }
    
    .endereco-linha-icon {
        width: 35px;
        height: 35px;
        font-size: 1rem;
    }
    
    .endereco-linha-texto {
        font-size: 0.875rem;
    }
    
    .facilidade-icon-ultra {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .facilidade-texto-ultra strong {
        font-size: 1rem;
    }
    
    .facilidade-texto-ultra span {
        font-size: 0.75rem;
    }
    
    .btn-icon-ultra {
        width: 50px;
        height: 50px;
        font-size: 1.25rem;
    }
    
    .btn-texto-ultra strong {
        font-size: 1rem;
    }
    
    .btn-texto-ultra span {
        font-size: 0.75rem;
    }
    
    /* Pagamento Ultra Moderno - Mobile Pequeno */
    .pagamento-grid-ultra {
        grid-template-columns: 1fr;
        gap: var(--space-lg);
    }
    
    .pagamento-card-ultra {
        padding: var(--space-xl);
    }
    
    .pagamento-icon-ultra {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .pagamento-titulo-ultra {
        font-size: 1.25rem;
    }
    
    .pagamento-descricao-ultra {
        font-size: 0.875rem;
    }
}

/* ===== ANIMAÇÕES E MICRO-INTERAÇÕES ===== */
@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
    50% { box-shadow: 0 0 30px rgba(59, 130, 246, 0.5); }
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

@keyframes fade-in-scale {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Aplicar animações aos elementos */
.curso-badges-ultra .badge-ultra {
    animation: slide-in-up 0.6s ease-out forwards;
}

.curso-header-ultra {
    animation: fade-in-scale 0.8s ease-out forwards;
}

.curso-info-grid-ultra .info-item-ultra {
    animation: slide-in-up 0.6s ease-out forwards;
}

.curso-info-grid-ultra .info-item-ultra:nth-child(1) { animation-delay: 0.1s; }
.curso-info-grid-ultra .info-item-ultra:nth-child(2) { animation-delay: 0.2s; }
.curso-info-grid-ultra .info-item-ultra:nth-child(3) { animation-delay: 0.3s; }

.cta-matricule-se-ultra {
    animation: fade-in-scale 0.8s ease-out forwards;
}

.hero-actions-ultra {
    animation: fade-in-scale 1s ease-out forwards;
}

.curso-card-preco-ultra {
    animation: slide-in-up 0.8s ease-out forwards;
}

/* ===== MELHORIAS DE ACESSIBILIDADE ===== */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* ===== MELHORIAS DE PERFORMANCE ===== */
.curso-ultra-moderno * {
    will-change: auto;
}

.curso-ultra-moderno .badge-ultra:hover,
.curso-ultra-moderno .info-item-ultra:hover,
.curso-ultra-moderno .btn-inscricao-ultra:hover,
.curso-ultra-moderno .btn-saiba-mais-ultra:hover,
.curso-ultra-moderno .btn-inscricao-card-ultra:hover {
    will-change: transform;
}

/* ===== ESTILOS LEGADOS (MANTIDOS PARA COMPATIBILIDADE) ===== */
.curso-hero-moderno {
    position: relative;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    padding: var(--space-2xl) 0;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    animation: float 20s ease-in-out infinite;
}

.hero-gradient {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(14, 165, 233, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

.hero-content {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: var(--space-2xl);
    align-items: start;
}

.hero-left {
    color: white;
}

.curso-badges {
    display: flex;
    gap: var(--space-sm);
    margin-bottom: var(--space-lg);
    flex-wrap: wrap;
}

.badge {
    display: inline-flex;
    align-items: center;
    gap: var(--space-xs);
    padding: var(--space-xs) var(--space-sm);
    background: rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-lg);
    font-size: 0.875rem;
    font-weight: 500;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.badge i {
    font-size: 0.875rem;
}

.curso-titulo-principal {
    font-size: 3rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: var(--space-lg);
    color: white;
}

.curso-descricao {
    font-size: 1.125rem;
    line-height: 1.6;
    margin-bottom: var(--space-xl);
    color: rgba(255, 255, 255, 0.9);
}

.curso-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--space-lg);
    margin-bottom: var(--space-xl);
}

.info-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-md);
    background: rgba(255, 255, 255, 0.1);
    border-radius: var(--radius-lg);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.info-icon {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.info-icon i {
    color: white;
    font-size: 1.125rem;
}

.info-content {
    display: flex;
    flex-direction: column;
}

.info-label {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 2px;
}

.info-value {
    font-size: 1rem;
    font-weight: 600;
    color: white;
}

.hero-actions {
    display: flex;
    gap: var(--space-md);
    flex-wrap: wrap;
}

.btn-inscricao-principal {
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-md) var(--space-xl);
    background: var(--accent-color);
    color: white;
    text-decoration: none;
    border-radius: var(--radius-lg);
    font-weight: 600;
    font-size: 1.125rem;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-lg);
}

.btn-inscricao-principal:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
    color: white;
}

.btn-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s ease;
}

.btn-inscricao-principal:hover .btn-shine {
    left: 100%;
}

.btn-saiba-mais {
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-md) var(--space-xl);
    background: transparent;
    color: white;
    text-decoration: none;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: var(--radius-lg);
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-saiba-mais:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
}

/* Card de Preço */
.curso-card-preco {
    background: white;
    border-radius: var(--radius-2xl);
    padding: var(--space-xl);
    box-shadow: var(--shadow-xl);
    position: sticky;
    top: var(--space-xl);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--space-lg);
}

.card-header h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
}

.desconto-badge {
    background: var(--danger-color);
    color: white;
    padding: var(--space-xs) var(--space-sm);
    border-radius: var(--radius-md);
    font-size: 0.875rem;
    font-weight: 600;
}

.card-preco {
    margin-bottom: var(--space-lg);
}

.preco-valor-promocional {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--accent-color);
    display: block;
}

.preco-valor-original {
    font-size: 1.5rem;
    color: var(--text-light);
    text-decoration: line-through;
    display: block;
    margin-top: var(--space-xs);
}

.preco-valor {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary-color);
    display: block;
}

.card-beneficios {
    margin-bottom: var(--space-lg);
}

.beneficio-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    margin-bottom: var(--space-sm);
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.beneficio-item i {
    color: var(--accent-color);
    font-size: 1rem;
}

.btn-inscricao-card {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-sm);
    width: 100%;
    padding: var(--space-md);
    background: var(--primary-color);
    color: white;
    text-decoration: none;
    border-radius: var(--radius-lg);
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-inscricao-card:hover {
    background: #0284c7;
    color: white;
    transform: translateY(-1px);
}

/* Seções Padrão */
.section-header {
    text-align: center;
    margin-bottom: var(--space-2xl);
}

.section-titulo {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-md);
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-md);
}

.titulo-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.section-subtitulo {
    font-size: 1.125rem;
    color: var(--text-secondary);
    max-width: 600px;
    margin: 0 auto;
}

/* Seção de Detalhes */
.curso-detalhes-section {
    padding: var(--space-2xl) 0;
    background: var(--bg-secondary);
}

/* Layout novo para detalhes do curso */
.detalhes-grid-novo {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-xl);
    margin-bottom: var(--space-xl);
}

.detalhes-card-full {
    grid-column: 1 / -1;
}

/* Layout antigo mantido para compatibilidade */
.detalhes-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-xl);
}

.detalhes-card {
    background: white;
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    text-align: center;
    transition: all 0.3s ease;
}

.detalhes-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.card-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--space-lg);
    color: white;
    font-size: 2rem;
}

.detalhes-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-md);
}

.detalhes-card p {
    color: var(--text-secondary);
    line-height: 1.6;
}

.disciplinas-lista {
    text-align: left;
}

/* Seção de Mercado de Trabalho */
.mercado-trabalho-section {
    padding: var(--space-2xl) 0;
    background: white;
}

.mercado-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--space-lg);
    margin-bottom: var(--space-2xl);
}

.stat-card {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, transparent 100%);
}

.stat-number {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: var(--space-sm);
    position: relative;
    z-index: 1;
}

.stat-label {
    font-size: 1rem;
    font-weight: 500;
    position: relative;
    z-index: 1;
}

.mercado-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-2xl);
}

.mercado-texto h3,
.areas-atuacao h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-md);
}

.mercado-texto p {
    color: var(--text-secondary);
    line-height: 1.6;
}

/* Estilo moderno para áreas de atuação */
.areas-lista-moderna {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-md);
    margin-top: var(--space-lg);
}

.area-item-moderno {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-sm);
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(16, 185, 129, 0.05) 100%);
    border: 1px solid rgba(37, 99, 235, 0.1);
    border-radius: var(--radius-lg);
    color: var(--text-primary);
    font-weight: 500;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    min-height: 45px;
}

.area-item-moderno::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
}

.area-item-moderno:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(37, 99, 235, 0.15);
    border-color: rgba(37, 99, 235, 0.2);
}

.area-item-moderno i {
    color: var(--secondary-color);
    font-size: 0.9rem;
    flex-shrink: 0;
    background: rgba(16, 185, 129, 0.1);
    padding: var(--space-xs);
    border-radius: var(--radius-full);
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.area-item-moderno span {
    font-size: 0.9rem;
    line-height: 1.3;
    color: var(--text-primary);
}

/* Estilo antigo mantido para compatibilidade */
.areas-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-md);
}

.area-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-md);
    background: var(--bg-accent);
    border-radius: var(--radius-lg);
    color: var(--text-primary);
    font-weight: 500;
}

.area-item i {
    color: var(--primary-color);
    font-size: 1.25rem;
}

/* Seção de Pré-requisitos */
.prerequisitos-section {
    padding: var(--space-2xl) 0;
    background: var(--bg-secondary);
}

/* Layout novo para pré-requisitos */
.prerequisitos-grid-novo {
    display: grid;
    grid-template-columns: 35% 65%;
    gap: var(--space-lg);
    margin-bottom: var(--space-lg);
}

.requisito-header {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    margin-bottom: var(--space-sm);
}

.requisito-header h3 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-primary);
}

.requisito-header .requisito-icon {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: var(--radius-sm);
    color: white;
    font-size: 0.9rem;
}

/* Layout antigo mantido para compatibilidade */
.prerequisitos-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-lg);
}

.requisito-card {
    background: white;
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
}

.requisito-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
}

.requisito-full {
    grid-column: 1 / -1;
}

.requisito-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--accent-color), var(--warning-color));
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: var(--space-lg);
    color: white;
    font-size: 1.5rem;
}

.requisito-card h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-md);
}

.requisito-card p {
    color: var(--text-secondary);
    line-height: 1.6;
}

/* Seção de Localização */
.localizacao-section {
    padding: var(--space-2xl) 0;
    background: white;
}

/* Novo design da localização */
.localizacao-content-moderno {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-xl);
    margin-top: var(--space-xl);
}

.localizacao-principal {
    display: flex;
    flex-direction: column;
    gap: var(--space-lg);
}

.endereco-card-moderno {
    background: white;
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(37, 99, 235, 0.1);
}

.endereco-header {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    margin-bottom: var(--space-lg);
    padding-bottom: var(--space-md);
    border-bottom: 2px solid rgba(37, 99, 235, 0.1);
}

.endereco-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.endereco-header h3 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
}

.endereco-detalhes-moderno {
    display: flex;
    flex-direction: column;
    gap: var(--space-md);
}

.endereco-linha {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    padding: var(--space-sm);
    background: rgba(37, 99, 235, 0.05);
    border-radius: var(--radius-md);
    border-left: 4px solid var(--primary-color);
}

.endereco-linha i {
    color: var(--primary-color);
    font-size: 1.1rem;
    width: 20px;
    text-align: center;
}

.endereco-linha span {
    color: var(--text-primary);
    font-size: 1rem;
    line-height: 1.4;
}

.facilidades-card {
    background: white;
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(16, 185, 129, 0.1);
}

.facilidades-card h4 {
    margin: 0 0 var(--space-lg) 0;
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.facilidades-card h4::before {
    content: '✨';
    font-size: 1.2rem;
}

.facilidades-grid {
    display: flex;
    flex-direction: column;
    gap: var(--space-md);
}

.facilidade-item {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    padding: var(--space-md);
    background: rgba(16, 185, 129, 0.05);
    border-radius: var(--radius-lg);
    transition: all 0.3s ease;
}

.facilidade-item:hover {
    background: rgba(16, 185, 129, 0.1);
    transform: translateY(-2px);
}

.facilidade-icon {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.1rem;
}

.facilidade-icon.transporte {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
}

.facilidade-icon.estacionamento {
    background: linear-gradient(135deg, #10b981, #059669);
}

.facilidade-icon.metro {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.facilidade-texto {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.facilidade-texto strong {
    color: var(--text-primary);
    font-size: 1rem;
    font-weight: 600;
}

.facilidade-texto span {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

.localizacao-secundaria {
    display: flex;
    flex-direction: column;
    gap: var(--space-lg);
}

.acoes-card {
    background: white;
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(245, 158, 11, 0.1);
}

.acoes-card h4 {
    margin: 0 0 var(--space-lg) 0;
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.acoes-card h4::before {
    content: '🚀';
    font-size: 1.2rem;
}

.acoes-botoes {
    display: flex;
    flex-direction: column;
    gap: var(--space-md);
}

.btn-acao {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    padding: var(--space-lg);
    background: white;
    border: 2px solid rgba(37, 99, 235, 0.1);
    border-radius: var(--radius-lg);
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-acao::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.btn-acao:hover::before {
    left: 100%;
}

.btn-maps-moderno:hover {
    border-color: var(--primary-color);
    background: rgba(37, 99, 235, 0.05);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(37, 99, 235, 0.15);
}

.btn-ligar-moderno:hover {
    border-color: var(--secondary-color);
    background: rgba(16, 185, 129, 0.05);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.15);
}

.btn-icon {
    width: 50px;
    height: 50px;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
    flex-shrink: 0;
}

.btn-maps-moderno .btn-icon {
    background: linear-gradient(135deg, var(--primary-color), #1d4ed8);
}

.btn-ligar-moderno .btn-icon {
    background: linear-gradient(135deg, var(--secondary-color), #059669);
}

.btn-texto {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.btn-texto strong {
    color: var(--text-primary);
    font-size: 1.1rem;
    font-weight: 600;
}

.btn-texto span {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

.mapa-container-moderno {
    background: white;
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(37, 99, 235, 0.1);
}

.mapa-header {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    margin-bottom: var(--space-lg);
    padding-bottom: var(--space-md);
    border-bottom: 2px solid rgba(37, 99, 235, 0.1);
    color: var(--text-primary);
    font-weight: 600;
    font-size: 1.1rem;
}

.mapa-header i {
    color: var(--primary-color);
    font-size: 1.2rem;
}

.mapa-wrapper {
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.localizacao-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-2xl);
    align-items: start;
}

.endereco-card {
    background: var(--bg-secondary);
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
}

.endereco-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-lg);
}

.endereco-detalhes p {
    margin-bottom: var(--space-sm);
    color: var(--text-secondary);
}

.endereco-detalhes p strong {
    color: var(--text-primary);
}

.localizacao-features {
    margin: var(--space-lg) 0;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    margin-bottom: var(--space-sm);
    color: var(--text-secondary);
}

.feature-item i {
    color: var(--primary-color);
    width: 20px;
}

.localizacao-actions {
    display: flex;
    gap: var(--space-md);
    flex-wrap: wrap;
}

.btn-maps,
.btn-ligar {
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-sm) var(--space-lg);
    border-radius: var(--radius-lg);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-maps {
    background: var(--primary-color);
    color: white;
}

.btn-maps:hover {
    background: #0284c7;
    color: white;
}

.btn-ligar {
    background: var(--accent-color);
    color: white;
}

.btn-ligar:hover {
    background: #16a34a;
    color: white;
}

.localizacao-mapa {
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.localizacao-mapa iframe {
    border-radius: var(--radius-xl);
}

/* Seção de Pagamento */
.pagamento-section {
    padding: var(--space-2xl) 0;
    background: var(--bg-secondary);
}

.pagamento-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-lg);
}

.pagamento-card {
    background: white;
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    text-align: center;
    transition: all 0.3s ease;
}

.pagamento-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
}

.pagamento-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--warning-color), var(--danger-color));
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--space-lg);
    color: white;
    font-size: 2rem;
}

.pagamento-card h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-md);
}

.pagamento-card p {
    color: var(--text-secondary);
    line-height: 1.6;
}

/* CTA Final */
.cta-final-section {
    padding: var(--space-3xl) 0;
    background: var(--gradient-hero);
    color: white;
    text-align: center;
}

.cta-content {
    text-align: center;
}

.cta-text h2 {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: var(--space-md);
    color: white;
}

.cta-text p {
    font-size: 1.125rem;
    margin-bottom: var(--space-2xl);
    color: rgba(255, 255, 255, 0.9);
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-actions {
    display: flex;
    justify-content: center;
    gap: var(--space-lg);
    flex-wrap: wrap;
    margin-top: var(--space-xl);
}

.btn-cta-principal {
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-lg) var(--space-2xl);
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    color: white;
    text-decoration: none;
    border-radius: var(--radius-xl);
    border: 1px solid rgba(255, 255, 255, 0.2);
    font-weight: 700;
    font-size: 1.125rem;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-lg);
}

.btn-cta-principal:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl);
    color: white;
}

.btn-cta-principal .btn-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s ease;
}

.btn-cta-principal:hover .btn-shine {
    left: 100%;
}

.btn-cta-secundario,
.btn-cta-whatsapp {
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-lg) var(--space-2xl);
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(20px);
    color: white;
    text-decoration: none;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-xl);
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-cta-secundario:hover,
.btn-cta-whatsapp:hover {
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.4);
    color: white;
    transform: translateY(-2px);
}

.btn-cta-whatsapp {
    background: rgba(37, 211, 102, 0.2);
    border-color: rgba(37, 211, 102, 0.4);
}

.btn-cta-whatsapp:hover {
    background: rgba(37, 211, 102, 0.3);
    border-color: rgba(37, 211, 102, 0.6);
}

/* Responsividade */
@media (max-width: 1024px) {
    .hero-content {
        grid-template-columns: 1fr;
        gap: var(--space-xl);
    }
    
    .curso-card-preco {
        position: static;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .mercado-info {
        grid-template-columns: 1fr;
        gap: var(--space-xl);
    }
    
    .localizacao-content {
        grid-template-columns: 1fr;
        gap: var(--space-xl);
    }
}

@media (max-width: 768px) {
    .curso-titulo-principal {
        font-size: 2rem;
    }
    
    .section-titulo {
        font-size: 2rem;
    }
    
    .titulo-icon {
        width: 50px;
        height: 50px;
        font-size: 1.25rem;
    }
    
    .curso-info-grid {
        grid-template-columns: 1fr;
    }
    
    .hero-actions {
        flex-direction: column;
    }
    
    .btn-inscricao-principal,
    .btn-saiba-mais {
        justify-content: center;
    }
    
    .detalhes-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .detalhes-grid-novo {
        grid-template-columns: 1fr;
        gap: var(--space-lg);
    }
    
    .detalhes-card-full {
        grid-column: 1;
    }
    
    .mercado-stats {
        grid-template-columns: 1fr;
    }
    
    .areas-grid {
        grid-template-columns: 1fr;
    }
    
    .areas-lista-moderna {
        grid-template-columns: repeat(2, 1fr);
        gap: var(--space-sm);
    }
    
    .area-item-moderno {
        padding: var(--space-md);
        gap: var(--space-sm);
    }
    
    .area-item-moderno i {
        width: 35px;
        height: 35px;
        font-size: 1rem;
    }
    
    .area-item-moderno span {
        font-size: 0.9rem;
    }
    
    .prerequisitos-grid {
        grid-template-columns: 1fr;
    }
    
    .prerequisitos-grid-novo {
        grid-template-columns: 1fr;
        gap: var(--space-md);
    }
    
    .pagamento-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-cta-principal,
    .btn-cta-secundario,
    .btn-cta-whatsapp {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
    
    .localizacao-actions {
        flex-direction: column;
    }
    
    .btn-maps,
    .btn-ligar {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .curso-hero-moderno {
        padding: var(--space-xl) 0;
    }
    
    .curso-titulo-principal {
        font-size: 1.75rem;
    }
    
    .curso-descricao {
        font-size: 1rem;
    }
    
    .curso-card-preco {
        padding: var(--space-lg);
    }
    
    .preco-valor-promocional,
    .preco-valor {
        font-size: 2rem;
    }
    
    .section-titulo {
        font-size: 1.75rem;
    }
    
    .cta-text h2 {
        font-size: 2rem;
    }
    
    .cta-text p {
        font-size: 1rem;
    }
    
    .detalhes-grid {
        grid-template-columns: 1fr;
    }
    
    .detalhes-grid-novo {
        grid-template-columns: 1fr;
        gap: var(--space-md);
    }
    
    .detalhes-card-full {
        grid-column: 1;
    }
    
    .areas-lista-moderna {
        grid-template-columns: 1fr;
        gap: var(--space-xs);
    }
    
    .area-item-moderno {
        padding: var(--space-sm);
        min-height: 50px;
    }
    
    .area-item-moderno i {
        width: 28px;
        height: 28px;
        font-size: 0.9rem;
    }
    
    .area-item-moderno span {
        font-size: 0.8rem;
    }
    
    .prerequisitos-grid {
        grid-template-columns: 1fr;
    }
    
    .prerequisitos-grid-novo {
        grid-template-columns: 1fr;
        gap: var(--space-sm);
    }
    
    .localizacao-content-moderno {
        grid-template-columns: 1fr;
        gap: var(--space-lg);
    }
    
    .localizacao-principal {
        gap: var(--space-md);
    }
    
    .endereco-card-moderno,
    .facilidades-card,
    .acoes-card,
    .mapa-container-moderno {
        padding: var(--space-lg);
    }
    
    .endereco-header h3 {
        font-size: 1.3rem;
    }
    
    .facilidades-card h4,
    .acoes-card h4 {
        font-size: 1.2rem;
    }
    
    .btn-acao {
        padding: var(--space-md);
    }
    
    .btn-icon {
        width: 40px;
        height: 40px;
        font-size: 1.1rem;
    }
    
    .btn-texto strong {
        font-size: 1rem;
    }
    
    .btn-texto span {
        font-size: 0.8rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== ANIMAÇÕES DE ENTRADA =====
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

    // ===== EFEITOS DE HOVER AVANÇADOS =====
    const badges = document.querySelectorAll('.badge-ultra');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px) scale(1.02)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // ===== EFEITO RIPPLE NOS BOTÕES =====
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
    // Scroll suave para seções internas
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

    // ===== CONTADOR ANIMADO PARA PREÇOS =====
    const precoElements = document.querySelectorAll('.preco-valor-ultra, .preco-valor-promocional-ultra');
    precoElements.forEach(element => {
        const text = element.textContent;
        const number = parseFloat(text.replace(/[^\d.,]/g, '').replace(',', '.'));
        
        if (!isNaN(number)) {
            element.textContent = text; // Manter formatação original
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
            // Código de scroll aqui
        }, 10);
    });

    // ===== MELHORIAS DE ACESSIBILIDADE =====
    // Foco visível melhorado
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
    });

    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });

    // ===== PRELOAD DE RECURSOS CRÍTICOS =====
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
