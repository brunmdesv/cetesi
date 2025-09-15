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
                        <p class="hero-descricao-ultra">Centro Técnico de Educação Superior Integrada - Formando profissionais qualificados há mais de 15 anos com excelência acadêmica e infraestrutura moderna.</p>
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
                // Verificar se há cursos técnicos criados no WordPress
                $cursos_tecnico_dinamicos = cetesi_get_dynamic_courses('tecnico', 20);
                
                if (!empty($cursos_tecnico_dinamicos)) :
                    // Se há cursos WP, mostrar apenas eles
                ?>
                <div class="cursos-grid">
                    <?php foreach ($cursos_tecnico_dinamicos as $curso) : ?>
                        <?php echo cetesi_render_dynamic_course($curso, 'tecnico'); ?>
                    <?php endforeach; ?>
                </div>
                <?php else :
                    // Se não há cursos WP, mostrar cursos hardcoded
                ?>
                <div class="cursos-grid">
                    <div class="curso-card tecnico">
                        <div class="curso-image">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Técnico em Enfermagem em Ceilândia</h3>
                            <p>Formação completa para atuar na área da saúde com competência técnica e ética profissional. Curso técnico em enfermagem em Ceilândia, Brasília - DF.</p>
                            <ul class="curso-features">
                                <li><?php _e('18 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('1.200 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('300 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Reconhecido pelo MEC', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link('tecnico-em-enfermagem'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card tecnico">
                        <div class="curso-image">
                            <i class="fas fa-x-ray"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Técnico em Radiologia</h3>
                            <p>Especialização em técnicas radiológicas e diagnóstico por imagem.</p>
                            <ul class="curso-features">
                                <li><?php _e('18 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('1.200 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('300 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Reconhecido pelo MEC', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link('tecnico-em-radiologia'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card tecnico">
                        <div class="curso-image">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Nutrição e Dietética</h3>
                            <p>Formação em nutrição clínica e dietética hospitalar.</p>
                            <ul class="curso-features">
                                <li><?php _e('18 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('1.200 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('300 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Reconhecido pelo MEC', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link('nutricao-e-dietetica'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card tecnico">
                        <div class="curso-image">
                            <i class="fas fa-hard-hat"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Segurança do Trabalho</h3>
                            <p>Especialização em prevenção de acidentes e saúde ocupacional.</p>
                            <ul class="curso-features">
                                <li><?php _e('18 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('1.200 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('300 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Reconhecido pelo MEC', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Segurança do Trabalho'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
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
                // Verificar se há cursos livres criados no WordPress
                $cursos_livre_dinamicos = cetesi_get_dynamic_courses('livre', 20);
                
                if (!empty($cursos_livre_dinamicos)) :
                    // Se há cursos WP, mostrar apenas eles
                ?>
                <div class="cursos-grid livres">
                    <?php foreach ($cursos_livre_dinamicos as $curso) : ?>
                        <?php echo cetesi_render_dynamic_course($curso, 'livre'); ?>
                    <?php endforeach; ?>
                </div>
                <?php else :
                    // Se não há cursos WP, mostrar cursos hardcoded
                ?>
                <div class="cursos-grid livres">
                    <div class="curso-card livre">
                        <div class="curso-image">
                            <i class="fas fa-band-aid"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Feridas e Curativos</h3>
                            <p>Especialização em técnicas de tratamento de feridas e aplicação de curativos.</p>
                            <ul class="curso-features">
                                <li><?php _e('3 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('200 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('50 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Feridas e Curativos'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card livre">
                        <div class="curso-image">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Cálculo de Medicação</h3>
                            <p>Formação em cálculos farmacológicos e dosagem de medicamentos.</p>
                            <ul class="curso-features">
                                <li><?php _e('3 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('200 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('50 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Cálculo de Medicação'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card livre">
                        <div class="curso-image">
                            <i class="fas fa-tint"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Punção Venosa</h3>
                            <p>Especialização em técnicas de punção venosa e coleta de sangue.</p>
                            <ul class="curso-features">
                                <li><?php _e('3 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('200 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('50 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Punção Venosa'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
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
                // Verificar se há cursos online criados no WordPress
                $cursos_online_dinamicos = cetesi_get_dynamic_courses('online', 20);
                
                if (!empty($cursos_online_dinamicos)) :
                    // Se há cursos WP, mostrar apenas eles
                ?>
                <div class="cursos-grid">
                    <?php foreach ($cursos_online_dinamicos as $curso) : ?>
                        <?php echo cetesi_render_dynamic_course($curso, 'online'); ?>
                    <?php endforeach; ?>
                </div>
                <?php else :
                    // Se não há cursos WP, mostrar cursos hardcoded
                ?>
                <div class="cursos-grid">
                    <div class="curso-card online">
                        <div class="curso-image">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Home Care</h3>
                            <p>Especialização em técnicas modernas com flexibilidade total de horários.</p>
                            <ul class="curso-features">
                                <li><?php _e('Modalidade 100% Online', 'cetesi'); ?></li>
                                <li><?php _e('Flexibilidade total', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                                <li><?php _e('Suporte especializado', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Home Care'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card online">
                        <div class="curso-image">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <div class="curso-content">
                            <h3>UTI - Emergência e Urgência</h3>
                            <p>Formação especializada em atendimento de emergências médicas.</p>
                            <ul class="curso-features">
                                <li><?php _e('Modalidade 100% Online', 'cetesi'); ?></li>
                                <li><?php _e('Flexibilidade total', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                                <li><?php _e('Suporte especializado', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('UTI - Emergência e Urgência'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Educação Básica -->
            <div class="categoria-cursos">
                <h3 class="categoria-titulo">
                    <i class="fas fa-book-open"></i>
                    <?php _e('Educação Básica', 'cetesi'); ?>
                </h3>
                
                <?php
                // Verificar se há cursos de educação básica criados no WordPress
                $cursos_educacao_dinamicos = cetesi_get_dynamic_courses('educacao-basica', 20);
                
                if (!empty($cursos_educacao_dinamicos)) :
                    // Se há cursos WP, mostrar apenas eles
                ?>
                <div class="cursos-grid educacao-basica">
                    <?php foreach ($cursos_educacao_dinamicos as $curso) : ?>
                        <?php echo cetesi_render_dynamic_course($curso, 'educacao-basica'); ?>
                    <?php endforeach; ?>
                </div>
                <?php else :
                    // Se não há cursos WP, mostrar cursos hardcoded
                ?>
                <div class="cursos-grid educacao-basica">
                    <div class="curso-card educacao-basica">
                        <div class="curso-image">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="curso-content">
                            <h3>EJA - 1ª, 2ª, 3ª Série</h3>
                            <p>Educação de Jovens e Adultos com metodologia adaptada para diferentes níveis.</p>
                            <ul class="curso-features">
                                <li><?php _e('Flexibilidade de horários', 'cetesi'); ?></li>
                                <li><?php _e('Metodologia adaptada', 'cetesi'); ?></li>
                                <li><?php _e('Certificação reconhecida', 'cetesi'); ?></li>
                                <li><?php _e('Suporte pedagógico', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('EJA - 1ª, 2ª, 3ª Série'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
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
                // Verificar se há cursos de qualificação criados no WordPress
                $cursos_qualificacao_dinamicos = cetesi_get_dynamic_courses('qualificacao', 20);
                
                if (!empty($cursos_qualificacao_dinamicos)) :
                    // Se há cursos WP, mostrar apenas eles
                ?>
                <div class="cursos-grid qualificacao">
                    <?php foreach ($cursos_qualificacao_dinamicos as $curso) : ?>
                        <?php echo cetesi_render_dynamic_course($curso, 'qualificacao'); ?>
                    <?php endforeach; ?>
                </div>
                <?php else :
                    // Se não há cursos WP, mostrar cursos hardcoded
                ?>
                <div class="cursos-grid qualificacao">
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-bone"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Qualificação em Gesso Ortopédico</h3>
                            <p>Especialização em técnicas de imobilização e gesso ortopédico.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Qualificação em Gesso Ortopédico'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-tint"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Hemodiálise</h3>
                            <p>Especialização em técnicas de diálise e cuidados renais.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Hemodiálise'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-cut"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Instrumentação Cirúrgica</h3>
                            <p>Especialização avançada com foco em técnicas específicas e aplicação prática.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Instrumentação Cirúrgica'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Qualificação em Enfermagem do Trabalho</h3>
                            <p>Especialização em saúde ocupacional e medicina do trabalho.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Qualificação em Enfermagem do Trabalho'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Qualificação em Necropsia</h3>
                            <p>Formação especializada em técnicas de necropsia e patologia.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Qualificação em Necropsia'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <div class="curso-content">
                            <h3>APH - Atendimento Pré-Hospitalar</h3>
                            <p>Formação em técnicas de socorro e atendimento de emergências.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('APH - Atendimento Pré-Hospitalar'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-tooth"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Saúde Bucal</h3>
                            <p>Formação em cuidados odontológicos e higiene bucal.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Saúde Bucal'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Cuidador de Idosos</h3>
                            <p>Formação especializada em cuidados geriátricos e bem-estar do idoso.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Cuidador de Idosos'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-pills"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Atendente de Farmácia</h3>
                            <p>Especialização em atendimento farmacêutico e dispensação de medicamentos.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Atendente de Farmácia'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Análise Clínicas</h3>
                            <p>Formação especializada em análise clínica e laboratorial.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Análise Clínicas'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-hospital"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Administração de Serviço Hospitalar</h3>
                            <p>Formação em gestão e administração de serviços hospitalares.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Administração de Serviço Hospitalar'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-syringe"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Sala de Vacina</h3>
                            <p>Especialização em técnicas de vacinação e procedimentos seguros.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Sala de Vacina'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-wheelchair"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Maqueiro</h3>
                            <p>Formação especializada em transporte e movimentação de pacientes.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Maqueiro'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-x-ray"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Estudo da Radiologia e Tórax</h3>
                            <p>Especialização em técnicas radiológicas e diagnóstico por imagem.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Estudo da Radiologia e Tórax'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Agente Comunitário</h3>
                            <p>Formação para atuação na atenção primária à saúde.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Agente Comunitário'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-tint"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Flebotomia</h3>
                            <p>Especialização em técnicas de coleta de sangue e punção venosa.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Flebotomia'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
                    </div>
                    
                    <div class="curso-card qualificacao">
                        <div class="curso-image">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="curso-content">
                            <h3>Saúde Mental</h3>
                            <p>Formação especializada em cuidados de saúde mental e bem-estar.</p>
                            <ul class="curso-features">
                                <li><?php _e('6 meses de duração', 'cetesi'); ?></li>
                                <li><?php _e('400 horas de carga horária', 'cetesi'); ?></li>
                                <li><?php _e('100 horas de estágio', 'cetesi'); ?></li>
                                <li><?php _e('Certificação especializada', 'cetesi'); ?></li>
                            </ul>
                            <a href="<?php echo cetesi_get_course_link_by_title('Saúde Mental'); ?>" class="curso-btn"><?php _e('Saiba Mais', 'cetesi'); ?></a>
                        </div>
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

    <!-- Galeria de Certificações Section -->
    <section class="certificacoes-section">
        <div class="container">
            <div class="section-header">
                <h2><?php _e('Certificações e Reconhecimentos', 'cetesi'); ?></h2>
                <p><?php _e('Nossa excelência é reconhecida por órgãos competentes e parceiros estratégicos', 'cetesi'); ?></p>
            </div>
            
            <div class="certificacoes-grid">
                <div class="certificacao-card">
                    <div class="certificacao-logo">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3><?php _e('MEC - Ministério da Educação', 'cetesi'); ?></h3>
                    <p><?php _e('Reconhecimento oficial para todos os nossos cursos técnicos e superiores', 'cetesi'); ?></p>
                    <div class="certificacao-badge">
                        <span><?php _e('Reconhecido', 'cetesi'); ?></span>
                    </div>
                </div>
                
                <div class="certificacao-card">
                    <div class="certificacao-logo">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <h3><?php _e('COREN - Conselho Regional de Enfermagem', 'cetesi'); ?></h3>
                    <p><?php _e('Cursos de Enfermagem aprovados e reconhecidos pelo conselho profissional', 'cetesi'); ?></p>
                    <div class="certificacao-badge">
                        <span><?php _e('Aprovado', 'cetesi'); ?></span>
                    </div>
                </div>
                
                <div class="certificacao-card">
                    <div class="certificacao-logo">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3><?php _e('ISO 9001:2015', 'cetesi'); ?></h3>
                    <p><?php _e('Certificação internacional de qualidade em gestão educacional', 'cetesi'); ?></p>
                    <div class="certificacao-badge">
                        <span><?php _e('Certificado', 'cetesi'); ?></span>
                    </div>
                </div>
                
                <div class="certificacao-card">
                    <div class="certificacao-logo">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3><?php _e('ABEN - Associação Brasileira de Enfermagem', 'cetesi'); ?></h3>
                    <p><?php _e('Parceria estratégica para desenvolvimento profissional dos estudantes', 'cetesi'); ?></p>
                    <div class="certificacao-badge">
                        <span><?php _e('Parceiro', 'cetesi'); ?></span>
                    </div>
                </div>
                
                <div class="certificacao-card">
                    <div class="certificacao-logo">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3><?php _e('Hospital São Paulo', 'cetesi'); ?></h3>
                    <p><?php _e('Convênio para estágios práticos e inserção no mercado de trabalho', 'cetesi'); ?></p>
                    <div class="certificacao-badge">
                        <span><?php _e('Conveniado', 'cetesi'); ?></span>
                    </div>
                </div>
                
                <div class="certificacao-card">
                    <div class="certificacao-logo">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3><?php _e('Prêmio Excelência Educacional', 'cetesi'); ?></h3>
                    <p><?php _e('Reconhecimento pela qualidade do ensino e resultados dos alunos', 'cetesi'); ?></p>
                    <div class="certificacao-badge">
                        <span><?php _e('Premiado', 'cetesi'); ?></span>
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

<style>
/* ===== ESTILOS ULTRA MODERNOS DA HERO SECTION HOMEPAGE ===== */

/* Variáveis Ultra Modernas apenas para a Hero Section */
.hero-section-ultra-moderno {
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

/* ===== HERO ULTRA MODERNO HOMEPAGE ===== */
.hero-section-ultra-moderno {
    position: relative;
    background: #111827;
    padding: var(--space-3xl) 0;
    overflow: hidden;
    min-height: 80vh;
    display: flex;
    align-items: center;
}



.hero-content-ultra {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.hero-main-content {
    color: white;
    max-width: 1200px;
    width: 100%;
}

/* ===== BADGES ULTRA MODERNOS HOMEPAGE ===== */
.hero-badges-ultra {
    display: flex;
    gap: var(--space-md);
    margin-bottom: var(--space-2xl);
    flex-wrap: wrap;
    justify-content: center;
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

/* ===== HEADER ULTRA MODERNO HOMEPAGE ===== */
.hero-header-ultra {
    margin-bottom: var(--space-3xl);
}

.hero-titulo-ultra {
    font-size: 3.5rem;
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: var(--space-xl);
    color: white;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    letter-spacing: -0.025em;
}

.highlight-ultra {
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}


.hero-descricao-ultra {
    font-size: 1.25rem;
    line-height: 1.7;
    margin-bottom: 0;
    color: rgba(255, 255, 255, 0.9);
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}


/* ===== CTA ULTRA MODERNO HOMEPAGE ===== */


.cta-botoes-ultra {
    display: flex;
    gap: var(--space-lg);
    justify-content: center;
    margin: var(--space-3xl) 0;
}

.btn-hero-principal-ultra {
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

.btn-hero-principal-ultra:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-2xl);
    color: white;
}

.btn-hero-principal-ultra .btn-shine-ultra {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left var(--transition-slow);
}

.btn-hero-principal-ultra:hover .btn-shine-ultra {
    left: 100%;
}

.btn-hero-secundario-ultra {
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

.btn-hero-secundario-ultra:hover {
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

/* ===== RESPONSIVIDADE ULTRA MODERNA HOMEPAGE ===== */
@media (max-width: 1200px) {
    .hero-titulo-ultra {
        font-size: 3rem;
    }
}

@media (max-width: 768px) {
    .hero-section-ultra-moderno {
        padding: var(--space-3xl) 0;
        min-height: 70vh;
    }
    
    .hero-titulo-ultra {
        font-size: 2.5rem;
    }
    
    .hero-descricao-ultra {
        font-size: 1.125rem;
    }
    
    
    .hero-badges-ultra {
        justify-content: center;
    }
    
    
    .cta-botoes-ultra {
        flex-direction: column;
        width: 100%;
    }
    
    .btn-hero-principal-ultra,
    .btn-hero-secundario-ultra {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .hero-section-ultra-moderno {
        padding: var(--space-2xl) 0;
        min-height: 60vh;
    }
    
    .hero-titulo-ultra {
        font-size: 2rem;
    }
    
    .hero-descricao-ultra {
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
    
    
    .btn-hero-principal-ultra,
    .btn-hero-secundario-ultra {
        padding: var(--space-md) var(--space-lg);
        font-size: 1rem;
    }
}

/* ===== ANIMAÇÕES E MICRO-INTERAÇÕES HOMEPAGE ===== */
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
.hero-badges-ultra .badge-ultra {
    animation: slide-in-up 0.6s ease-out forwards;
}

.hero-header-ultra {
    animation: fade-in-scale 0.8s ease-out forwards;
}



/* ===== MELHORIAS DE ACESSIBILIDADE HOMEPAGE ===== */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* ===== MELHORIAS DE PERFORMANCE HOMEPAGE ===== */
.hero-section-ultra-moderno .badge-ultra:hover,
.hero-section-ultra-moderno .btn-hero-principal-ultra:hover,
.hero-section-ultra-moderno .btn-hero-secundario-ultra:hover {
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
