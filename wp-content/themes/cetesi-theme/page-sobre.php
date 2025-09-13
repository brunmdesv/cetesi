<?php
/**
 * Template Name: Sobre CETESI
 * Description: Página institucional sobre o CETESI.
 *
 * @package CETESI
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <!-- Hero Section -->
        <section class="sobre-hero">
            <div class="container">
                <div class="sobre-hero-content">
                    <div class="hero-badge">
                        <i class="fas fa-info-circle"></i>
                        Sobre Nós
                    </div>
                    <h1 class="hero-title">Conheça o <span class="highlight">CETESI</span></h1>
                    <p class="hero-description">
                        Uma instituição de ensino comprometida com a excelência educacional e a formação de profissionais qualificados para o mercado de trabalho.
                    </p>
                </div>
            </div>
        </section>

        <!-- Missão, Visão e Valores -->
        <section class="sobre-mvv-section">
            <div class="container">
                <div class="sobre-mvv-grid">
                    <div class="mvv-card">
                        <div class="mvv-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Missão</h3>
                        <p>Promover educação de qualidade, formando profissionais competentes e éticos, capazes de contribuir para o desenvolvimento social e econômico da região.</p>
                    </div>
                    
                    <div class="mvv-card">
                        <div class="mvv-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Visão</h3>
                        <p>Ser reconhecida como referência em educação profissional, inovando constantemente e mantendo o compromisso com a excelência acadêmica.</p>
                    </div>
                    
                    <div class="mvv-card">
                        <div class="mvv-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Valores</h3>
                        <p>Ética, transparência, inovação, respeito à diversidade e compromisso com o desenvolvimento sustentável da sociedade.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- História da Instituição -->
        <section class="sobre-historia-section">
            <div class="container">
                <div class="sobre-historia-content">
                    <div class="historia-text">
                        <h2>Nossa História</h2>
                        <p>O CETESI foi fundado com o objetivo de democratizar o acesso à educação de qualidade, oferecendo cursos técnicos e profissionalizantes que atendem às demandas do mercado de trabalho.</p>
                        <p>Ao longo dos anos, consolidamos nossa posição como uma das principais instituições de ensino da região, formando milhares de profissionais que hoje contribuem para o desenvolvimento econômico e social.</p>
                        <p>Nossa trajetória é marcada pelo compromisso com a inovação pedagógica, investimento em tecnologia e parcerias estratégicas com empresas e organizações locais.</p>
                    </div>
                    <div class="historia-stats">
                        <div class="stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Alunos Formados</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">15+</div>
                            <div class="stat-label">Anos de Experiência</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">20+</div>
                            <div class="stat-label">Cursos Oferecidos</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">95%</div>
                            <div class="stat-label">Taxa de Empregabilidade</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Diferenciais -->
        <section class="sobre-diferenciais-section">
            <div class="container">
                <div class="sobre-section-header">
                    <h2>Nossos Diferenciais</h2>
                    <p>O que nos torna únicos no mercado educacional</p>
                </div>
                
                <div class="diferenciais-grid">
                    <div class="diferencial-card">
                        <div class="diferencial-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Corpo Docente Qualificado</h3>
                        <p>Professores com vasta experiência profissional e acadêmica, comprometidos com o sucesso dos alunos.</p>
                    </div>
                    
                    <div class="diferencial-card">
                        <div class="diferencial-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3>Infraestrutura Moderna</h3>
                        <p>Laboratórios equipados com tecnologia de ponta e ambientes de aprendizagem inovadores.</p>
                    </div>
                    
                    <div class="diferencial-card">
                        <div class="diferencial-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>Parcerias Empresariais</h3>
                        <p>Convênios com empresas locais para estágios, empregos e desenvolvimento de projetos práticos.</p>
                    </div>
                    
                    <div class="diferencial-card">
                        <div class="diferencial-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Alta Empregabilidade</h3>
                        <p>95% dos nossos alunos conseguem emprego na área de formação em até 6 meses após a conclusão.</p>
                    </div>
                    
                    <div class="diferencial-card">
                        <div class="diferencial-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Acompanhamento Personalizado</h3>
                        <p>Suporte individualizado para cada aluno, garantindo o desenvolvimento de suas potencialidades.</p>
                    </div>
                    
                    <div class="diferencial-card">
                        <div class="diferencial-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3>Certificação Reconhecida</h3>
                        <p>Certificados válidos em todo território nacional, reconhecidos pelo mercado de trabalho.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="sobre-cta-section">
            <div class="container">
                <div class="sobre-cta-content">
                    <h2>Pronto para Começar sua Jornada?</h2>
                    <p>Junte-se a centenas de profissionais que já transformaram suas vidas através da educação de qualidade do CETESI.</p>
                    <div class="cta-buttons">
                        <a href="<?php echo home_url('/cursos/'); ?>" class="button button-primary">
                            <i class="fas fa-book"></i>
                            Ver Cursos
                        </a>
                        <a href="<?php echo home_url('/'); ?>#contato" class="button button-secondary">
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
