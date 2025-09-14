<?php
/**
 * Template Name: Cursos CETESI
 * Description: Página de cursos do CETESI.
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
                    <h1 class="hero-title">Conheça nossos <span class="highlight">Cursos</span></h1>
                    <p class="hero-description">
                        Oferecemos uma ampla gama de cursos técnicos, de qualificação, livres e online, reconhecidos pelo MEC e alinhados com as demandas do mercado de trabalho.
                    </p>
                </div>
            </div>
        </section>

        <!-- Filtros de Cursos -->
        <section class="cursos-filters-section">
            <div class="container">
                <div class="cursos-filters-content">
                    <div class="cursos-filters">
                        <button class="cursos-filter-btn active" data-filter="todos">
                            <i class="fas fa-th"></i>
                            Todos
                        </button>
                        <button class="cursos-filter-btn" data-filter="tecnicos">
                            <i class="fas fa-graduation-cap"></i>
                            Técnicos
                        </button>
                        <button class="cursos-filter-btn" data-filter="qualificacao">
                            <i class="fas fa-award"></i>
                            Qualificação
                        </button>
                        <button class="cursos-filter-btn" data-filter="livres">
                            <i class="fas fa-certificate"></i>
                            Livres
                        </button>
                        <button class="cursos-filter-btn" data-filter="online">
                            <i class="fas fa-laptop"></i>
                            Online
                        </button>
                        <button class="cursos-filter-btn" data-filter="educacao-basica">
                            <i class="fas fa-book-open"></i>
                            Educação Básica
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cursos Técnicos -->
        <section class="cursos-section" id="tecnicos">
            <div class="container">
                
                <div class="cursos-grid-moderno" id="cursos-grid">
                    <div class="curso-card-moderno tecnico" data-categoria="tecnicos">
                        <div class="curso-image">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Técnico em Enfermagem</h3>
                            <p>Formação completa para atuar na área da saúde com competência técnica e ética profissional.</p>
                            <ul class="curso-features">
                                <li>18 meses de duração</li>
                                <li>1.200 horas de carga horária</li>
                                <li>300 horas de estágio</li>
                                <li>Reconhecido pelo MEC</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/tecnico-em-enfermagem'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                        <div class="curso-card-moderno tecnico" data-categoria="tecnicos">
                        <div class="curso-image">
                            <i class="fas fa-x-ray"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Técnico em Radiologia</h3>
                            <p>Especialização em técnicas radiológicas e diagnóstico por imagem.</p>
                            <ul class="curso-features">
                                <li>18 meses de duração</li>
                                <li>1.200 horas de carga horária</li>
                                <li>300 horas de estágio</li>
                                <li>Reconhecido pelo MEC</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/tecnico-em-radiologia'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno tecnico" data-categoria="tecnicos">
                        <div class="curso-image">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Técnico em Nutrição e Dietética</h3>
                            <p>Formação em nutrição clínica e dietética hospitalar.</p>
                            <ul class="curso-features">
                                <li>18 meses de duração</li>
                                <li>1.200 horas de carga horária</li>
                                <li>300 horas de estágio</li>
                                <li>Reconhecido pelo MEC</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/tecnico-em-nutricao-e-dietetica'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno tecnico" data-categoria="tecnicos">
                        <div class="curso-image">
                            <i class="fas fa-hard-hat"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Técnico em Segurança do Trabalho</h3>
                            <p>Especialização em prevenção de acidentes e saúde ocupacional.</p>
                            <ul class="curso-features">
                                <li>18 meses de duração</li>
                                <li>1.200 horas de carga horária</li>
                                <li>300 horas de estágio</li>
                                <li>Reconhecido pelo MEC</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/tecnico-em-seguranca-do-trabalho'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cursos de Qualificação -->
        <section class="cursos-section" id="qualificacao">
            <div class="container">
                
                <div class="cursos-grid-moderno">
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-bone"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Qualificação em Gesso Ortopédico</h3>
                            <p>Especialização em técnicas de imobilização e gesso ortopédico.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/qualificacao-em-gesso-ortopedico'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-tint"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Hemodiálise</h3>
                            <p>Especialização em técnicas de diálise e cuidados renais.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/hemodialise'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-cut"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Instrumentação Cirúrgica</h3>
                            <p>Especialização avançada com foco em técnicas específicas e aplicação prática.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/instrumentacao-cirurgica'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Qualificação em Enfermagem do Trabalho</h3>
                            <p>Especialização em saúde ocupacional e medicina do trabalho.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/qualificacao-em-enfermagem-do-trabalho'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Qualificação em Necropsia</h3>
                            <p>Formação especializada em técnicas de necropsia e patologia.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/qualificacao-em-necropsia'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <div class="curso-content">
                            <h3>APH - Atendimento Pré-Hospitalar</h3>
                            <p>Formação em técnicas de socorro e atendimento de emergências.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/aph-atendimento-pre-hospitalar'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-tooth"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Saúde Bucal</h3>
                            <p>Formação em cuidados odontológicos e higiene bucal.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/saude-bucal'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Cuidador de Idosos</h3>
                            <p>Formação especializada em cuidados geriátricos e bem-estar do idoso.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/cuidador-de-idosos'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-pills"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Atendente de Farmácia</h3>
                            <p>Formação em atendimento farmacêutico e dispensação de medicamentos.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/atendente-de-farmacia'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Análise Clínicas</h3>
                            <p>Formação em técnicas laboratoriais e análise de exames clínicos.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/analise-clinicas'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Administração de Serviço Hospitalar</h3>
                            <p>Formação em gestão hospitalar e administração de serviços de saúde.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/administracao-de-servico-hospitalar'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-syringe"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Sala de Vacina</h3>
                            <p>Formação em técnicas de vacinação e imunização.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/sala-de-vacina'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-wheelchair"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Maqueiro</h3>
                            <p>Formação em transporte e movimentação de pacientes.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/maqueiro'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-x-ray"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Estudo da Radiologia e Tórax</h3>
                            <p>Formação em técnicas radiológicas específicas para tórax.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/estudo-da-radiologia-e-torax'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Agente Comunitário</h3>
                            <p>Formação em saúde comunitária e atenção primária.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/agente-comunitario'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-tint"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Flebotomia</h3>
                            <p>Formação em técnicas de coleta de sangue e flebotomia.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/flebotomia'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno qualificacao" data-categoria="qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Saúde Mental</h3>
                            <p>Formação em cuidados de saúde mental e psiquiatria.</p>
                            <ul class="curso-features">
                                <li>6 meses de duração</li>
                                <li>400 horas de carga horária</li>
                                <li>100 horas de estágio</li>
                                <li>Certificação especializada</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/saude-mental'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cursos Livres -->
        <section class="cursos-section" id="livres">
            <div class="container">
                
                <div class="cursos-grid-moderno">
                    <div class="curso-card-moderno livre" data-categoria="livres">
                        <div class="curso-image">
                            <i class="fas fa-band-aid"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Feridas e Curativos</h3>
                            <p>Especialização em técnicas de tratamento de feridas e aplicação de curativos.</p>
                            <ul class="curso-features">
                                <li>3 meses de duração</li>
                                <li>200 horas de carga horária</li>
                                <li>50 horas de estágio</li>
                                <li>Certificação reconhecida</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/feridas-e-curativos'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno livre" data-categoria="livres">
                        <div class="curso-image">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Cálculo de Medicação</h3>
                            <p>Formação em cálculos farmacológicos e dosagem de medicamentos.</p>
                            <ul class="curso-features">
                                <li>3 meses de duração</li>
                                <li>200 horas de carga horária</li>
                                <li>50 horas de estágio</li>
                                <li>Certificação reconhecida</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/calculo-de-medicacao'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno livre" data-categoria="livres">
                        <div class="curso-image">
                            <i class="fas fa-tint"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Punção Venosa</h3>
                            <p>Especialização em técnicas de punção venosa e coleta de sangue.</p>
                            <ul class="curso-features">
                                <li>3 meses de duração</li>
                                <li>200 horas de carga horária</li>
                                <li>50 horas de estágio</li>
                                <li>Certificação reconhecida</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/puncao-venosa'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cursos 100% Online -->
        <section class="cursos-section" id="online">
            <div class="container">
                
                <div class="cursos-grid-moderno">
                    <div class="curso-card-moderno online" data-categoria="online">
                        <div class="curso-image">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Home Care</h3>
                            <p>Especialização em técnicas modernas com flexibilidade total de horários.</p>
                            <ul class="curso-features">
                                <li>Modalidade 100% Online</li>
                                <li>Flexibilidade total</li>
                                <li>Certificação reconhecida</li>
                                <li>Suporte especializado</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/home-care'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                    
                    <div class="curso-card-moderno online" data-categoria="online">
                        <div class="curso-image">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <div class="curso-content">
                            <h3>UTI - Emergência e Urgência</h3>
                            <p>Formação especializada em atendimento de emergências médicas.</p>
                            <ul class="curso-features">
                                <li>Modalidade 100% Online</li>
                                <li>Flexibilidade total</li>
                                <li>Certificação reconhecida</li>
                                <li>Suporte especializado</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/uti-emergencia-e-urgencia'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Educação Básica -->
        <section class="cursos-section" id="educacao-basica">
            <div class="container">
                
                <div class="cursos-grid-moderno">
                    <div class="curso-card-moderno educacao-basica" data-categoria="educacao-basica">
                        <div class="curso-image">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="curso-content">
                            <h3>EJA - 1ª, 2ª, 3ª Série</h3>
                            <p>Educação de Jovens e Adultos com metodologia adaptada para diferentes níveis.</p>
                            <ul class="curso-features">
                                <li>Flexibilidade de horários</li>
                                <li>Metodologia adaptada</li>
                                <li>Certificação reconhecida</li>
                                <li>Suporte pedagógico</li>
                            </ul>
                            <a href="<?php echo home_url('/cursos/eja-1a-2a-3a-serie'); ?>" class="curso-btn">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cursos-cta-section">
            <div class="container">
                <div class="cursos-cta-content">
                    <h2>Pronto para Começar sua Jornada?</h2>
                    <p>Não perca tempo! Entre em contato agora mesmo e dê o primeiro passo rumo ao sucesso profissional.</p>
                    <div class="cta-buttons">
                        <a href="<?php echo home_url('/contato'); ?>" class="button button-primary">
                            <i class="fas fa-phone"></i>
                            Fale Conosco
                        </a>
                        <a href="<?php echo home_url(); ?>" class="button button-secondary">
                            <i class="fas fa-home"></i>
                            Voltar ao Início
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

<script>

// Sistema de Filtros - Adaptado para seções organizadas
jQuery(document).ready(function($) {
    console.log('Sistema de filtros carregado');
    console.log('Botões encontrados:', $('.cursos-filter-btn').length);
    console.log('Seções encontradas:', $('.cursos-section').length);
    
    // Filtro de cursos - Adaptado para seções
    $('.cursos-filter-btn').on('click', function() {
        var filter = $(this).data('filter');
        console.log('Filtro selecionado:', filter);
        
        // Atualizar botões ativos
        $('.cursos-filter-btn').removeClass('active');
        $(this).addClass('active');
        
        // Filtrar seções de cursos com efeito de transição
        $('.cursos-section').each(function() {
            var sectionId = $(this).attr('id');
            var $section = $(this);
            console.log('Seção:', sectionId, 'Filtro:', filter);
            
            if (filter === 'todos') {
                $section.show();
                // Mostrar cards
                $section.find('.curso-card-moderno').removeClass('hidden');
                console.log('Seção mostrada:', sectionId);
            } else if (sectionId === filter) {
                $section.show();
                // Mostrar cards
                $section.find('.curso-card-moderno').removeClass('hidden');
                console.log('Seção mostrada:', sectionId);
            } else {
                // Ocultar cards
                $section.find('.curso-card-moderno').addClass('hidden');
                // Depois ocultar seção
                setTimeout(function() {
                    $section.hide();
                }, 300);
                console.log('Seção ocultada:', sectionId);
            }
        });
        
        // Não fazer scroll automático - manter posição atual
    });
    
    // Garantir que todas as seções e cards estejam visíveis inicialmente
    $('.cursos-section').show();
    $('.curso-card-moderno').removeClass('hidden');
});
</script>
