<?php
/**
 * Template para cursos individuais - Design Moderno
 * 
 * @package CETESI
 * @version 2.0.0
 */

get_header(); ?>

<main id="main" class="site-main curso-moderno">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Breadcrumbs -->
            <div class="curso-breadcrumbs">
                <div class="container">
                    <?php cetesi_breadcrumbs(); ?>
                </div>
            </div>
            
            <!-- Hero Moderno -->
            <section class="curso-hero-moderno">
                <div class="hero-background">
                    <div class="hero-pattern"></div>
                    <div class="hero-gradient"></div>
                </div>
                
                <div class="container">
                    <div class="hero-content">
                        <div class="hero-left">
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
                            
                            <div class="curso-badges">
                                <?php if ($nivel_ensino) : ?>
                                <div class="badge badge-nivel">
                                    <i class="fas fa-award"></i>
                                    <span><?php 
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
                                <div class="badge badge-modalidade">
                                    <i class="fas fa-<?php echo $modalidade === 'online' ? 'laptop' : 'building'; ?>"></i>
                                    <span><?php 
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
                                <div class="badge badge-area">
                                    <i class="fas fa-category"></i>
                                    <span><?php 
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
                            
                            <h1 class="curso-titulo-principal"><?php the_title(); ?></h1>
                            <p class="curso-descricao"><?php the_excerpt(); ?></p>
                            
                            <div class="curso-info-grid">
                                <?php if ($duracao) : ?>
                                <div class="info-item">
                                    <div class="info-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                    <div class="info-content">
                                        <span class="info-label">Duração</span>
                                        <span class="info-value"><?php echo esc_html($duracao); ?></span>
                            </div>
                                </div>
                                <?php endif; ?>
                                
                                <?php if ($carga_horaria) : ?>
                                <div class="info-item">
                                    <div class="info-icon">
                                    <i class="fas fa-book"></i>
                                    </div>
                                    <div class="info-content">
                                        <span class="info-label">Carga Horária</span>
                                        <span class="info-value"><?php echo esc_html($carga_horaria); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                    <?php
                                $turno = get_post_meta(get_the_ID(), '_curso_turno', true);
                                if ($turno) :
                                ?>
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-schedule"></i>
                                    </div>
                                    <div class="info-content">
                                        <span class="info-label">Turno</span>
                                        <span class="info-value"><?php 
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
                            
                            <div class="hero-actions">
                                <?php if ($link_inscricao) : ?>
                                <a href="<?php echo esc_url($link_inscricao); ?>" class="btn-inscricao-principal" target="_blank">
                                        <i class="fas fa-graduation-cap"></i>
                                    <span>Inscrever-se Agora</span>
                                    <div class="btn-shine"></div>
                                    </a>
                                    <?php endif; ?>
                                    
                                <a href="#curso-detalhes" class="btn-saiba-mais">
                                    <i class="fas fa-info-circle"></i>
                                    <span>Saiba Mais</span>
                                    </a>
                                </div>
                            </div>
                        
                        <div class="hero-right">
                            <div class="curso-card-preco">
                                <div class="card-header">
                                    <h3>Investimento</h3>
                                    <?php if ($desconto) : ?>
                                    <div class="desconto-badge"><?php echo esc_html($desconto); ?></div>
                                <?php endif; ?>
                        </div>
                        
                                <div class="card-preco">
                                    <?php if ($preco_promocional && $preco_promocional !== $preco) : ?>
                                        <div class="preco-promocional">
                                            <span class="preco-valor-promocional"><?php echo esc_html($preco_promocional); ?></span>
                                        </div>
                                        <div class="preco-original">
                                            <span class="preco-valor-original"><?php echo esc_html($preco); ?></span>
                                        </div>
                                    <?php else : ?>
                                        <div class="preco-normal">
                                            <span class="preco-valor"><?php echo esc_html($preco); ?></span>
                        </div>
                        <?php endif; ?>
                                </div>
                                
                                <div class="card-beneficios">
                                    <div class="beneficio-item">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Material incluso</span>
                                    </div>
                                    <div class="beneficio-item">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Certificado válido</span>
                                    </div>
                                    <div class="beneficio-item">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Suporte completo</span>
                                    </div>
                                </div>
                                
                                <?php if ($link_inscricao) : ?>
                                <a href="<?php echo esc_url($link_inscricao); ?>" class="btn-inscricao-card" target="_blank">
                                    <i class="fas fa-rocket"></i>
                                    <span>Começar Agora</span>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Seção de Detalhes do Curso -->
            <section id="curso-detalhes" class="curso-detalhes-section">
                <div class="container">
                    <div class="section-header">
                        <h2 class="section-titulo">
                            <span class="titulo-icon">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            Detalhes do Curso
                        </h2>
                                </div>
                    
                    <div class="detalhes-grid-novo">
                        <div class="detalhes-card">
                            <div class="card-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h3>Objetivos</h3>
                                    <?php
                            $objetivos = get_post_meta(get_the_ID(), '_curso_objetivos', true);
                            if ($objetivos) :
                            ?>
                                <p><?php echo esc_html($objetivos); ?></p>
                            <?php else : ?>
                                <p>Formar profissionais capacitados e preparados para o mercado de trabalho, desenvolvendo competências técnicas e habilidades práticas essenciais.</p>
                                    <?php endif; ?>
                            </div>
                            
                        <div class="detalhes-card">
                            <div class="card-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                            <h3>Metodologia</h3>
                            <?php
                            $metodologia = get_post_meta(get_the_ID(), '_curso_metodologia', true);
                            if ($metodologia) :
                            ?>
                                <p><?php echo esc_html($metodologia); ?></p>
                            <?php else : ?>
                                <p>Metodologia ativa com aulas teóricas, práticas laboratoriais, estudos de caso e estágio supervisionado em ambiente real de trabalho.</p>
                        <?php endif; ?>
                            </div>
                            
                        <div class="detalhes-card">
                            <div class="card-icon">
                                <i class="fas fa-certificate"></i>
                                </div>
                            <h3>Certificação</h3>
                            <?php
                            $certificacao = get_post_meta(get_the_ID(), '_curso_certificacao', true);
                            $reconhecimento = get_post_meta(get_the_ID(), '_curso_reconhecimento', true);
                            ?>
                            <p>
                                <?php if ($certificacao) : ?>
                                    <?php echo esc_html($certificacao); ?>
                                <?php else : ?>
                                    Certificado de conclusão válido em todo território nacional
                                <?php endif; ?>
                                
                                <?php if ($reconhecimento) : ?>
                                    <br><small>
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
                        
                        <!-- Grade Curricular ocupando toda a largura -->
                        <div class="detalhes-card detalhes-card-full">
                            <div class="card-icon">
                                <i class="fas fa-list-ul"></i>
                        </div>
                            <h3>Grade Curricular</h3>
                            <?php
                            $disciplinas = get_post_meta(get_the_ID(), '_curso_disciplinas', true);
                            if ($disciplinas) :
                            ?>
                                <div class="disciplinas-lista">
                                    <?php 
                                    // Substituir | por - na grade curricular
                                    $disciplinas_formatadas = str_replace('|', '-', $disciplinas);
                                    echo wpautop(esc_html($disciplinas_formatadas)); 
                                    ?>
                                </div>
                            <?php else : ?>
                                <p>Grade curricular completa com disciplinas teóricas e práticas, incluindo estágio supervisionado e atividades complementares.</p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Seção de Mercado de Trabalho -->
            <section class="mercado-trabalho-section">
                <div class="container">
                    <div class="section-header">
                        <h2 class="section-titulo">
                            <span class="titulo-icon">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            Mercado de Trabalho
                        </h2>
                                        </div>
                    
                    <div class="mercado-content">
                        <div class="mercado-stats">
                            <?php
                            $salario_medio = get_post_meta(get_the_ID(), '_curso_salario_medio', true);
                            $oportunidades = get_post_meta(get_the_ID(), '_curso_oportunidades', true);
                            ?>
                            
                            <div class="stat-card">
                                <div class="stat-number">95%</div>
                                <div class="stat-label">Taxa de Empregabilidade</div>
                            </div>
                            
                            <?php if ($salario_medio) : ?>
                            <div class="stat-card">
                                <div class="stat-number"><?php echo esc_html($salario_medio); ?></div>
                                <div class="stat-label">Salário Médio</div>
                                </div>
                            <?php else : ?>
                            <div class="stat-card">
                                <div class="stat-number">R$ 3.500</div>
                                <div class="stat-label">Salário Inicial</div>
                                    </div>
                                    <?php endif; ?>
                                    
                            <?php if ($oportunidades) : ?>
                            <div class="stat-card">
                                <div class="stat-number"><?php echo esc_html($oportunidades); ?></div>
                                <div class="stat-label">Oportunidades</div>
                                        </div>
                            <?php else : ?>
                            <div class="stat-card">
                                <div class="stat-number">15%</div>
                                <div class="stat-label">Crescimento Anual</div>
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
                                    // Dividir por "|" em vez de quebras de linha
                                    $areas_array = explode("|", $areas_atuacao);
                                    foreach ($areas_array as $area) {
                                        $area = trim($area);
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

            <!-- Seção de Pré-requisitos -->
            <section class="prerequisitos-section">
                <div class="container">
                    <div class="section-header">
                        <h2 class="section-titulo">
                            <span class="titulo-icon">
                                <i class="fas fa-clipboard-list"></i>
                            </span>
                            Pré-requisitos e Documentos
                        </h2>
                    </div>
                    
                    <div class="prerequisitos-content">
                        <?php
                        $prerequisitos = get_post_meta(get_the_ID(), '_curso_prerequisitos', true);
                        $documentos = get_post_meta(get_the_ID(), '_curso_documentos', true);
                        $escolaridade = get_post_meta(get_the_ID(), '_curso_escolaridade', true);
                        $idade_minima = get_post_meta(get_the_ID(), '_curso_idade_minima', true);
                        ?>
                        
                        <div class="prerequisitos-grid-novo">
                            <!-- Primeira linha: Escolaridade (35%) + Pré-requisitos (65%) -->
                            <div class="requisito-card requisito-card-small">
                                <div class="requisito-header">
                                    <div class="requisito-icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <h3>Escolaridade</h3>
                                </div>
                                <p><?php 
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
                            
                            <div class="requisito-card requisito-card-large">
                                <div class="requisito-header">
                                    <div class="requisito-icon">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <h3>Pré-requisitos Específicos</h3>
                                </div>
                                <p><?php 
                                    if (!empty($prerequisitos)) {
                                        $prerequisitos_formatados = str_replace('|', ',', $prerequisitos);
                                        echo esc_html($prerequisitos_formatados);
                                    } else {
                                        echo 'Idade mínima de 18 anos, Ensino Médio completo, Documentação pessoal (RG, CPF, comprovante de residência)';
                                    }
                                ?></p>
                            </div>
                            
                            <!-- Segunda linha: Idade Mínima (35%) + Documentos (65%) -->
                            <div class="requisito-card requisito-card-small">
                                <div class="requisito-header">
                                    <div class="requisito-icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <h3>Idade Mínima</h3>
                                </div>
                                <p><?php echo !empty($idade_minima) ? esc_html($idade_minima) . ' anos' : '18 anos'; ?></p>
                            </div>
                            
                            <div class="requisito-card requisito-card-large">
                                <div class="requisito-header">
                                    <div class="requisito-icon">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <h3>Documentos Necessários</h3>
                                </div>
                                <p><?php 
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

            <!-- Seção de Localização -->
            <section class="localizacao-section">
                <div class="container">
                    <div class="section-header">
                        <h2 class="section-titulo">
                            <span class="titulo-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            Localização
                        </h2>
                    </div>
                    
                    <div class="localizacao-content-moderno">
                        <!-- Informações principais -->
                        <div class="localizacao-principal">
                            <div class="endereco-card-moderno">
                                <div class="endereco-header">
                                    <div class="endereco-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h3>Nossa Localização</h3>
                                </div>
                                
                                <div class="endereco-detalhes-moderno">
                                    <div class="endereco-linha">
                                        <i class="fas fa-building"></i>
                                        <span><strong>QNN 02, St. N Qnn 2 Conjunto e, LOTE 04 - Sala 102</strong></span>
                                    </div>
                                    <div class="endereco-linha">
                                        <i class="fas fa-city"></i>
                                        <span>Ceilândia, Brasília - DF</span>
                                    </div>
                                    <div class="endereco-linha">
                                        <i class="fas fa-mail-bulk"></i>
                                        <span>CEP: 72220-025</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Recursos e facilidades -->
                            <div class="facilidades-card">
                                <h4>Facilidades</h4>
                                <div class="facilidades-grid">
                                    <div class="facilidade-item">
                                        <div class="facilidade-icon transporte">
                                            <i class="fas fa-bus"></i>
                                        </div>
                                        <div class="facilidade-texto">
                                            <strong>Transporte Público</strong>
                                            <span>Fácil acesso por ônibus</span>
                                        </div>
                                    </div>
                                    <div class="facilidade-item">
                                        <div class="facilidade-icon estacionamento">
                                            <i class="fas fa-car"></i>
                                        </div>
                                        <div class="facilidade-texto">
                                            <strong>Estacionamento</strong>
                                            <span>Vagas disponíveis</span>
                                        </div>
                                    </div>
                                    <div class="facilidade-item">
                                        <div class="facilidade-icon metro">
                                            <i class="fas fa-subway"></i>
                                        </div>
                                        <div class="facilidade-texto">
                                            <strong>Metrô</strong>
                                            <span>Próximo à estação</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Ações e mapa -->
                        <div class="localizacao-secundaria">
                            <div class="acoes-card">
                                <h4>Como Chegar</h4>
                                <div class="acoes-botoes">
                                    <a href="https://maps.app.goo.gl/BtrBP6btCBaYzEBfA" target="_blank" class="btn-acao btn-maps-moderno" rel="noopener">
                                        <div class="btn-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="btn-texto">
                                            <strong>Ver no Maps</strong>
                                            <span>Navegação GPS</span>
                                        </div>
                                    </a>
                                    <a href="tel:<?php echo esc_attr(get_theme_mod('cetesi_phone', '(61) 99999-9999')); ?>" class="btn-acao btn-ligar-moderno">
                                        <div class="btn-icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="btn-texto">
                                            <strong>Ligar Agora</strong>
                                            <span>Fale conosco</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="mapa-container-moderno">
                                <div class="mapa-header">
                                    <i class="fas fa-map"></i>
                                    <span>Localização no Mapa</span>
                                </div>
                                <div class="mapa-wrapper">
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

            <!-- Seção de Formas de Pagamento -->
            <section class="pagamento-section">
                <div class="container">
                    <div class="section-header">
                        <h2 class="section-titulo">
                            <span class="titulo-icon">
                                <i class="fas fa-credit-card"></i>
                            </span>
                            Formas de Pagamento
                        </h2>
                                    </div>
                    
                    <div class="pagamento-content">
                        <?php
                        $forma_pagamento = get_post_meta(get_the_ID(), '_curso_forma_pagamento', true);
                        $parcelamento = get_post_meta(get_the_ID(), '_curso_parcelamento', true);
                        ?>
                        
                        <div class="pagamento-grid">
                            <div class="pagamento-card">
                                <div class="pagamento-icon">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <h3>Métodos Aceitos</h3>
                                <?php if ($forma_pagamento) : ?>
                                    <p><?php 
                                        $forma_pagamento_formatada = str_replace('|', ',', $forma_pagamento);
                                        echo esc_html($forma_pagamento_formatada); 
                                    ?></p>
                                <?php else : ?>
                                    <p>Dinheiro, cartão de crédito, débito, PIX e boleto bancário</p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="pagamento-card">
                                <div class="pagamento-icon">
                                    <i class="fas fa-calendar-alt"></i>
                        </div>
                                <h3>Parcelamento</h3>
                                <?php if ($parcelamento) : ?>
                                    <p><?php 
                                        $parcelamento_formatado = str_replace('|', ',', $parcelamento);
                                        echo esc_html($parcelamento_formatado); 
                                    ?></p>
                                <?php else : ?>
                                    <p>Até 12x sem juros no cartão de crédito</p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="pagamento-card">
                                <div class="pagamento-icon">
                                    <i class="fas fa-percentage"></i>
                                </div>
                                <h3>Descontos</h3>
                                <p>Desconto especial para pagamento à vista</p>
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
/* ===== ESTILOS DA NOVA PÁGINA DE CURSO ===== */

/* Reset e Variáveis */
.curso-moderno {
    --primary-color: #2563eb;
    --secondary-color: #10b981;
    --accent-color: #f59e0b;
    --danger-color: #ef4444;
    --warning-color: #f59e0b;
    --text-primary: #1e293b;
    --text-secondary: #64748b;
    --text-light: #94a3b8;
    --bg-primary: #ffffff;
    --bg-secondary: #f8fafc;
    --bg-accent: #f0f9ff;
    --border-color: #e2e8f0;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    --radius-sm: 0.375rem;
    --radius-md: 0.5rem;
    --radius-lg: 0.75rem;
    --radius-xl: 1rem;
    --radius-2xl: 1.5rem;
    --space-xs: 0.5rem;
    --space-sm: 0.75rem;
    --space-md: 1rem;
    --space-lg: 1.5rem;
    --space-xl: 2rem;
    --space-2xl: 3rem;
}

/* Breadcrumbs */
.curso-breadcrumbs {
    background: var(--bg-secondary);
    padding: var(--space-md) 0;
    border-bottom: 1px solid var(--border-color);
}

/* Hero Moderno */
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

<?php get_footer(); ?>
