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
                            
                            <a href="<?php echo home_url('/contato'); ?>" class="btn-cta-secundario">
                                <i class="fas fa-phone"></i>
                                <span>Falar com Consultor</span>
                            </a>
                            
                            <a href="https://wa.me/556133514511" class="btn-cta-whatsapp" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                <span>WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    <?php endwhile; ?>
</main>

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

    // ===== SCROLL SUAVE =====
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
});
</script>

<?php get_footer(); ?>