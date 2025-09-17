<?php
/**
 * Página de Edição de Curso - CETESI TEMA
 *
 * @package CETESI
 * @version 1.0.0
 */

// Evitar acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Processar edição de curso no hook admin_init
 */
add_action('admin_init', 'cetesi_handle_course_update');
function cetesi_handle_course_update() {
    if (isset($_POST['atualizar_curso']) && wp_verify_nonce($_POST['cetesi_course_nonce'], 'atualizar_curso_action')) {
        $course_id = isset($_POST['course_id']) ? intval($_POST['course_id']) : 0;
        if ($course_id > 0) {
            cetesi_process_course_update($course_id);
        }
    }
}

/**
 * Adicionar submenu de edição de curso
 */
function cetesi_add_edit_course_submenu() {
    add_submenu_page(
        'cetesi-courses-management',
        'Editar Curso',
        'Editar curso',
        'manage_options',
        'editar-curso-personalizado',
        'cetesi_edit_course_page_callback'
    );
}
add_action('admin_menu', 'cetesi_add_edit_course_submenu');

/**
 * Página de Edição de Curso
 */
function cetesi_edit_course_page_callback() {
    // Verificar se foi passado um ID de curso
    $course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

    if (!$course_id) {
        // Redirecionar para a página de gerenciamento de cursos usando JavaScript
        ?>
        <script>
            window.location.href = '<?php echo admin_url('admin.php?page=cetesi-courses-management'); ?>';
        </script>
        <noscript>
            <meta http-equiv="refresh" content="0;url=<?php echo admin_url('admin.php?page=cetesi-courses-management'); ?>">
        </noscript>
        <?php
        return;
    }

    // Verificar se o curso existe
    $curso = get_post($course_id);
    if (!$curso || $curso->post_type !== 'curso') {
        wp_die('Curso não encontrado.');
    }

    // Obter dados atuais do curso
    $curso_titulo = $curso->post_title;
    $curso_descricao = $curso->post_content;
    $curso_nivel = get_post_meta($course_id, 'curso_nivel', true);
    $curso_categoria = get_post_meta($course_id, 'curso_categoria', true);
    $curso_duracao = get_post_meta($course_id, 'curso_duracao', true);
    $curso_carga_horaria = get_post_meta($course_id, 'curso_carga_horaria', true);
    $curso_estagio = get_post_meta($course_id, 'curso_estagio', true);
    $curso_turno = get_post_meta($course_id, 'curso_turno', true);
    $curso_modalidade = get_post_meta($course_id, 'curso_modalidade', true);
    $curso_certificacao = get_post_meta($course_id, 'curso_certificacao', true);
    $curso_requisitos = get_post_meta($course_id, 'curso_requisitos', true);
    $curso_objetivos = get_post_meta($course_id, 'curso_objetivos', true);
    $curso_valor = get_post_meta($course_id, 'curso_valor', true);
    $curso_matricula = get_post_meta($course_id, 'curso_matricula', true);
    $curso_parcelas = get_post_meta($course_id, 'curso_parcelas', true);
    $curso_desconto = get_post_meta($course_id, 'curso_desconto', true);
    $curso_coordenador = get_post_meta($course_id, 'curso_coordenador', true);
    $curso_telefone = get_post_meta($course_id, 'curso_telefone', true);
    $curso_email = get_post_meta($course_id, 'curso_email', true);
    $curso_whatsapp = get_post_meta($course_id, 'curso_whatsapp', true);

    // Novos campos adicionados
    $curso_escolaridade = get_post_meta($course_id, 'curso_escolaridade', true);
    $curso_idade_minima = get_post_meta($course_id, 'curso_idade_minima', true);
    $curso_prerequisitos = get_post_meta($course_id, 'curso_prerequisitos', true);
    $curso_documentos = get_post_meta($course_id, 'curso_documentos', true);
    $curso_metodologia = get_post_meta($course_id, 'curso_metodologia', true);
    $curso_disciplinas = get_post_meta($course_id, 'curso_disciplinas', true);
    $curso_salario_medio = get_post_meta($course_id, 'curso_salario_medio', true);
    $curso_salario_inicial = get_post_meta($course_id, 'curso_salario_inicial', true);
    $curso_taxa_empregabilidade = get_post_meta($course_id, 'curso_taxa_empregabilidade', true);
    $curso_crescimento_anual = get_post_meta($course_id, 'curso_crescimento_anual', true);
    $curso_oportunidades = get_post_meta($course_id, 'curso_oportunidades', true);
    $curso_mercado_trabalho = get_post_meta($course_id, 'curso_mercado_trabalho', true);
    $curso_areas_atuacao = get_post_meta($course_id, 'curso_areas_atuacao', true);
    $curso_mercado_expansao = get_post_meta($course_id, 'curso_mercado_expansao', true);
    $curso_preco_promocional = get_post_meta($course_id, 'curso_preco_promocional', true);
    $curso_link_inscricao = get_post_meta($course_id, 'curso_link_inscricao', true);
    $curso_forma_pagamento = get_post_meta($course_id, 'curso_forma_pagamento', true);
    $curso_parcelamento = get_post_meta($course_id, 'curso_parcelamento', true);
    $curso_certificacao_detalhada = get_post_meta($course_id, 'curso_certificacao_detalhada', true);

    ?>
    <link rel="stylesheet" href="<?php echo CETESI_THEME_URL; ?>/assets/css/admin-courses.css">

    <div class="wrap cetesi-course-edit">
        <div class="cetesi-course-form-container">
            <div class="edit-header">
                <h1>
                    <span class="dashicons dashicons-edit"></span>
                    Editar Curso: <?php echo esc_html($curso_titulo); ?>
                </h1>
                <div class="edit-actions">
                    <a href="<?php echo get_permalink($course_id); ?>" class="button button-secondary" target="_blank">
                        <span class="dashicons dashicons-visibility"></span>
                        Ver no Site
                    </a>
                    <a href="<?php echo admin_url('admin.php?page=cetesi-courses-management'); ?>" class="button button-secondary">
                        <span class="dashicons dashicons-arrow-left-alt"></span>
                        Voltar para Lista
                    </a>
                </div>
            </div>

            <form method="post" action="" class="cetesi-course-form">
                <?php wp_nonce_field('atualizar_curso_action', 'cetesi_course_nonce'); ?>
                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">

                <!-- Informações Básicas -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-info"></span> Informações Básicas</h2>
                        <p>Preencha as informações principais do curso</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_titulo" class="required">Nome do Curso</label>
                            <input type="text" id="curso_titulo" name="curso_titulo" required
                                   value="<?php echo esc_attr($curso_titulo); ?>"
                                   placeholder="Ex: Técnico em Enfermagem" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_descricao">Descrição do Curso</label>
                            <textarea id="curso_descricao" name="curso_descricao" rows="4"
                                      placeholder="Descreva o curso, seus objetivos e principais características..."><?php echo esc_textarea($curso_descricao); ?></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_nivel">Nível de Ensino</label>
                            <select id="curso_nivel" name="curso_nivel">
                                <option value="">Selecione o nível</option>
                                <option value="tecnico" <?php selected($curso_nivel, 'tecnico'); ?>>Técnico</option>
                                <option value="superior" <?php selected($curso_nivel, 'superior'); ?>>Superior</option>
                                <option value="pos-graduacao" <?php selected($curso_nivel, 'pos-graduacao'); ?>>Pós-Graduação</option>
                                <option value="livre" <?php selected($curso_nivel, 'livre'); ?>>Curso Livre</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="curso_categoria" class="required">Categoria do Curso</label>
                            <select id="curso_categoria" name="curso_categoria" required>
                                <option value="">Selecione a categoria</option>
                                <option value="tecnicos" <?php selected($curso_categoria, 'tecnicos'); ?>>Técnicos</option>
                                <option value="livres" <?php selected($curso_categoria, 'livres'); ?>>Cursos Livres</option>
                                <option value="online" <?php selected($curso_categoria, 'online'); ?>>Online</option>
                                <option value="qualificacao" <?php selected($curso_categoria, 'qualificacao'); ?>>Qualificação Profissional</option>
                                <option value="educacao-basica" <?php selected($curso_categoria, 'educacao-basica'); ?>>Educação Básica</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Duração e Carga Horária -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-calendar-alt"></span> Duração e Carga Horária</h2>
                        <p>Configure o tempo total e distribuição de horas do curso</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_duracao" class="required">Duração do Curso</label>
                            <input type="text" id="curso_duracao" name="curso_duracao" required
                                   value="<?php echo esc_attr($curso_duracao); ?>"
                                   placeholder="Ex: 18 meses" />
                        </div>

                        <div class="form-group">
                            <label for="curso_carga_horaria" class="required">Carga Horária Total</label>
                            <input type="text" id="curso_carga_horaria" name="curso_carga_horaria" required
                                   value="<?php echo esc_attr($curso_carga_horaria); ?>"
                                   placeholder="Ex: 1.200 horas" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_estagio">Carga Horária de Estágio</label>
                            <input type="text" id="curso_estagio" name="curso_estagio"
                                   value="<?php echo esc_attr($curso_estagio); ?>"
                                   placeholder="Ex: 300 horas" />
                        </div>

                        <div class="form-group">
                            <label for="curso_turno">Turno de Funcionamento</label>
                            <select id="curso_turno" name="curso_turno">
                                <option value="">Selecione o turno</option>
                                <option value="matutino" <?php selected($curso_turno, 'matutino'); ?>>Matutino (6h às 12h)</option>
                                <option value="vespertino" <?php selected($curso_turno, 'vespertino'); ?>>Vespertino (13h às 18h)</option>
                                <option value="noturno" <?php selected($curso_turno, 'noturno'); ?>>Noturno (19h às 22h)</option>
                                <option value="integral" <?php selected($curso_turno, 'integral'); ?>>Integral (manhã e tarde)</option>
                                <option value="flexivel" <?php selected($curso_turno, 'flexivel'); ?>>Flexível (horários variados)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Informações Acadêmicas -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-awards"></span> Informações Acadêmicas</h2>
                        <p>Configure os detalhes acadêmicos e certificação do curso</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_modalidade">Modalidade</label>
                            <select id="curso_modalidade" name="curso_modalidade">
                                <option value="">Selecione a modalidade</option>
                                <option value="presencial" <?php selected($curso_modalidade, 'presencial'); ?>>Presencial</option>
                                <option value="online" <?php selected($curso_modalidade, 'online'); ?>>Online</option>
                                <option value="hibrida" <?php selected($curso_modalidade, 'hibrida'); ?>>Híbrida</option>
                                <option value="ead" <?php selected($curso_modalidade, 'ead'); ?>>EAD</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="curso_certificacao">Tipo de Certificação</label>
                            <select id="curso_certificacao" name="curso_certificacao">
                                <option value="">Selecione o tipo</option>
                                <option value="certificado" <?php selected($curso_certificacao, 'certificado'); ?>>Certificado</option>
                                <option value="diploma" <?php selected($curso_certificacao, 'diploma'); ?>>Diploma</option>
                                <option value="declaracao" <?php selected($curso_certificacao, 'declaracao'); ?>>Declaração</option>
                                <option value="certificado-tecnico" <?php selected($curso_certificacao, 'certificado-tecnico'); ?>>Certificado Técnico</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_requisitos">Requisitos de Entrada</label>
                            <textarea id="curso_requisitos" name="curso_requisitos" rows="3"
                                      placeholder="Ex: Ensino Médio completo, idade mínima 18 anos..."><?php echo esc_textarea($curso_requisitos); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="curso_objetivos">Objetivos do Curso</label>
                            <textarea id="curso_objetivos" name="curso_objetivos" rows="3"
                                      placeholder="Descreva os principais objetivos e competências que o aluno desenvolverá..."><?php echo esc_textarea($curso_objetivos); ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Requisitos e Documentação -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-clipboard"></span> Requisitos e Documentação</h2>
                        <p>Configure os requisitos de entrada e documentação necessária</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_escolaridade">Escolaridade Mínima</label>
                            <select id="curso_escolaridade" name="curso_escolaridade">
                                <option value="">Selecione a escolaridade</option>
                                <option value="fundamental" <?php selected($curso_escolaridade, 'fundamental'); ?>>Ensino Fundamental</option>
                                <option value="medio" <?php selected($curso_escolaridade, 'medio'); ?>>Ensino Médio</option>
                                <option value="superior" <?php selected($curso_escolaridade, 'superior'); ?>>Ensino Superior</option>
                                <option value="pos-graduacao" <?php selected($curso_escolaridade, 'pos-graduacao'); ?>>Pós-Graduação</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="curso_idade_minima">Idade Mínima</label>
                            <input type="number" id="curso_idade_minima" name="curso_idade_minima"
                                   value="<?php echo esc_attr($curso_idade_minima); ?>"
                                   placeholder="Ex: 18" min="16" max="100" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_prerequisitos">Pré-requisitos</label>
                            <textarea id="curso_prerequisitos" name="curso_prerequisitos" rows="3"
                                      placeholder="Ex: Conhecimento básico em informática, experiência na área..."><?php echo esc_textarea($curso_prerequisitos); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="curso_documentos">Documentos Necessários</label>
                            <textarea id="curso_documentos" name="curso_documentos" rows="3"
                                      placeholder="Ex: RG, CPF, Comprovante de residência, Certificado de conclusão do ensino médio..."><?php echo esc_textarea($curso_documentos); ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Metodologia e Disciplinas -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-book"></span> Metodologia e Disciplinas</h2>
                        <p>Configure a metodologia de ensino e disciplinas do curso</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_metodologia">Metodologia de Ensino</label>
                            <textarea id="curso_metodologia" name="curso_metodologia" rows="4"
                                      placeholder="Descreva a metodologia utilizada no curso, métodos de ensino, recursos didáticos..."><?php echo esc_textarea($curso_metodologia); ?></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_disciplinas">Disciplinas do Curso</label>
                            <textarea id="curso_disciplinas" name="curso_disciplinas" rows="6"
                                      placeholder="Liste as disciplinas do curso com suas respectivas cargas horárias..."><?php echo esc_textarea($curso_disciplinas); ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Mercado de Trabalho -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-businessman"></span> Mercado de Trabalho</h2>
                        <p>Informações sobre oportunidades e mercado de trabalho</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_salario_medio">Salário Médio</label>
                            <input type="text" id="curso_salario_medio" name="curso_salario_medio"
                                   value="<?php echo esc_attr($curso_salario_medio); ?>"
                                   placeholder="Ex: R$ 3.500,00" />
                        </div>

                        <div class="form-group">
                            <label for="curso_salario_inicial">Salário Inicial</label>
                            <input type="text" id="curso_salario_inicial" name="curso_salario_inicial"
                                   value="<?php echo esc_attr($curso_salario_inicial); ?>"
                                   placeholder="Ex: R$ 2.500,00" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_taxa_empregabilidade">Taxa de Empregabilidade</label>
                            <input type="text" id="curso_taxa_empregabilidade" name="curso_taxa_empregabilidade"
                                   value="<?php echo esc_attr($curso_taxa_empregabilidade); ?>"
                                   placeholder="Ex: 85%" />
                        </div>

                        <div class="form-group">
                            <label for="curso_crescimento_anual">Crescimento Anual do Mercado</label>
                            <input type="text" id="curso_crescimento_anual" name="curso_crescimento_anual"
                                   value="<?php echo esc_attr($curso_crescimento_anual); ?>"
                                   placeholder="Ex: 12%" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_oportunidades">Oportunidades de Trabalho</label>
                            <textarea id="curso_oportunidades" name="curso_oportunidades" rows="3"
                                      placeholder="Descreva as principais oportunidades de trabalho na área..."><?php echo esc_textarea($curso_oportunidades); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="curso_mercado_trabalho">Mercado de Trabalho</label>
                            <textarea id="curso_mercado_trabalho" name="curso_mercado_trabalho" rows="3"
                                      placeholder="Descreva o cenário atual do mercado de trabalho..."><?php echo esc_textarea($curso_mercado_trabalho); ?></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_areas_atuacao">Áreas de Atuação</label>
                            <textarea id="curso_areas_atuacao" name="curso_areas_atuacao" rows="3"
                                      placeholder="Liste as principais áreas onde o profissional pode atuar..."><?php echo esc_textarea($curso_areas_atuacao); ?></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_mercado_expansao">Expansão do Mercado</label>
                            <textarea id="curso_mercado_expansao" name="curso_mercado_expansao" rows="3"
                                      placeholder="Descreva as perspectivas de crescimento e expansão do mercado..."><?php echo esc_textarea($curso_mercado_expansao); ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Informações Financeiras Detalhadas -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-money-alt"></span> Informações Financeiras Detalhadas</h2>
                        <p>Configure valores, formas de pagamento e condições especiais</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_preco_promocional">Preço Promocional</label>
                            <input type="text" id="curso_preco_promocional" name="curso_preco_promocional"
                                   value="<?php echo esc_attr($curso_preco_promocional); ?>"
                                   placeholder="Ex: R$ 1.800,00" />
                        </div>

                        <div class="form-group">
                            <label for="curso_link_inscricao">Link de Inscrição</label>
                            <input type="url" id="curso_link_inscricao" name="curso_link_inscricao"
                                   value="<?php echo esc_attr($curso_link_inscricao); ?>"
                                   placeholder="Ex: https://cetesi.com.br/inscricao" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_forma_pagamento">Formas de Pagamento</label>
                            <textarea id="curso_forma_pagamento" name="curso_forma_pagamento" rows="3"
                                      placeholder="Ex: À vista, Cartão de crédito, PIX, Boleto bancário..."><?php echo esc_textarea($curso_forma_pagamento); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="curso_parcelamento">Condições de Parcelamento</label>
                            <textarea id="curso_parcelamento" name="curso_parcelamento" rows="3"
                                      placeholder="Ex: Até 18x sem juros no cartão, 10% de desconto à vista..."><?php echo esc_textarea($curso_parcelamento); ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Certificação Detalhada -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-awards"></span> Certificação Detalhada</h2>
                        <p>Informações específicas sobre certificação e reconhecimento</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_certificacao_detalhada">Detalhes da Certificação</label>
                            <textarea id="curso_certificacao_detalhada" name="curso_certificacao_detalhada" rows="4"
                                      placeholder="Descreva detalhadamente o tipo de certificação, validade, reconhecimento pelo MEC..."><?php echo esc_textarea($curso_certificacao_detalhada); ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Informações Financeiras -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-money-alt"></span> Informações Financeiras</h2>
                        <p>Configure os valores e formas de pagamento</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_valor">Valor do Curso</label>
                            <input type="text" id="curso_valor" name="curso_valor"
                                   value="<?php echo esc_attr($curso_valor); ?>"
                                   placeholder="Ex: R$ 2.500,00" />
                        </div>

                        <div class="form-group">
                            <label for="curso_matricula">Valor da Matrícula</label>
                            <input type="text" id="curso_matricula" name="curso_matricula"
                                   value="<?php echo esc_attr($curso_matricula); ?>"
                                   placeholder="Ex: R$ 150,00" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_parcelas">Número de Parcelas</label>
                            <input type="number" id="curso_parcelas" name="curso_parcelas"
                                   value="<?php echo esc_attr($curso_parcelas); ?>"
                                   placeholder="Ex: 18" min="1" max="60" />
                        </div>

                        <div class="form-group">
                            <label for="curso_desconto">Desconto Disponível</label>
                            <input type="text" id="curso_desconto" name="curso_desconto"
                                   value="<?php echo esc_attr($curso_desconto); ?>"
                                   placeholder="Ex: 10% para pagamento à vista" />
                        </div>
                    </div>
                </div>

                <!-- Informações de Contato -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-phone"></span> Informações de Contato</h2>
                        <p>Configure como os interessados podem entrar em contato</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_coordenador">Coordenador do Curso</label>
                            <input type="text" id="curso_coordenador" name="curso_coordenador"
                                   value="<?php echo esc_attr($curso_coordenador); ?>"
                                   placeholder="Ex: Prof. Dr. João Silva" />
                        </div>

                        <div class="form-group">
                            <label for="curso_telefone">Telefone de Contato</label>
                            <input type="text" id="curso_telefone" name="curso_telefone"
                                   value="<?php echo esc_attr($curso_telefone); ?>"
                                   placeholder="Ex: (11) 99999-9999" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_email">E-mail de Contato</label>
                            <input type="email" id="curso_email" name="curso_email"
                                   value="<?php echo esc_attr($curso_email); ?>"
                                   placeholder="Ex: cursos@cetesi.com.br" />
                        </div>

                        <div class="form-group">
                            <label for="curso_whatsapp">WhatsApp</label>
                            <input type="text" id="curso_whatsapp" name="curso_whatsapp"
                                   value="<?php echo esc_attr($curso_whatsapp); ?>"
                                   placeholder="Ex: (11) 99999-9999" />
                        </div>
                    </div>
                </div>

                <!-- Status do Curso -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-admin-settings"></span> Status do Curso</h2>
                        <p>Configure o status de publicação do curso</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_status">Status de Publicação</label>
                            <select id="curso_status" name="curso_status">
                                <option value="draft" <?php selected($curso->post_status, 'draft'); ?>>Rascunho</option>
                                <option value="publish" <?php selected($curso->post_status, 'publish'); ?>>Publicado</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="curso_featured">Curso em Destaque</label>
                            <select id="curso_featured" name="curso_featured">
                                <option value="no">Não</option>
                                <option value="yes" <?php selected(get_post_meta($course_id, 'curso_featured', true), 'yes'); ?>>Sim</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="form-actions">
                    <button type="submit" name="atualizar_curso" class="button button-primary button-large">
                        <span class="dashicons dashicons-saved"></span>
                        Atualizar Curso
                    </button>

                    <a href="<?php echo admin_url('admin.php?page=cetesi-courses-management'); ?>" class="button button-secondary button-large">
                        <span class="dashicons dashicons-arrow-left-alt"></span>
                        Voltar para Lista
                    </a>

                    <a href="<?php echo get_permalink($course_id); ?>" class="button button-secondary button-large" target="_blank">
                        <span class="dashicons dashicons-visibility"></span>
                        Ver no Site
                    </a>
                </div>
            </form>
        </div>
    </div>
    <?php
}

/**
 * Processar atualização de curso
 */
function cetesi_process_course_update($course_id) {
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
    }
    
    // Limpar qualquer saída anterior
    if (ob_get_level()) {
        ob_end_clean();
    }

    // Sanitizar dados do formulário
    $curso_titulo = sanitize_text_field($_POST['curso_titulo']);
    $curso_descricao = sanitize_textarea_field($_POST['curso_descricao']);
    $curso_nivel = sanitize_text_field($_POST['curso_nivel']);
    $curso_categoria = sanitize_text_field($_POST['curso_categoria']);
    $curso_duracao = sanitize_text_field($_POST['curso_duracao']);
    $curso_carga_horaria = sanitize_text_field($_POST['curso_carga_horaria']);
    $curso_estagio = sanitize_text_field($_POST['curso_estagio']);
    $curso_turno = sanitize_text_field($_POST['curso_turno']);
    $curso_modalidade = sanitize_text_field($_POST['curso_modalidade']);
    $curso_certificacao = sanitize_text_field($_POST['curso_certificacao']);
    $curso_requisitos = sanitize_textarea_field($_POST['curso_requisitos']);
    $curso_objetivos = sanitize_textarea_field($_POST['curso_objetivos']);
    $curso_valor = sanitize_text_field($_POST['curso_valor']);
    $curso_matricula = sanitize_text_field($_POST['curso_matricula']);
    $curso_parcelas = intval($_POST['curso_parcelas']);
    $curso_desconto = sanitize_text_field($_POST['curso_desconto']);
    $curso_coordenador = sanitize_text_field($_POST['curso_coordenador']);
    $curso_telefone = sanitize_text_field($_POST['curso_telefone']);
    $curso_email = sanitize_email($_POST['curso_email']);
    $curso_whatsapp = sanitize_text_field($_POST['curso_whatsapp']);
    $curso_status = sanitize_text_field($_POST['curso_status']);
    $curso_featured = sanitize_text_field($_POST['curso_featured']);

    // Novos campos adicionados
    $curso_escolaridade = sanitize_text_field($_POST['curso_escolaridade']);
    $curso_idade_minima = intval($_POST['curso_idade_minima']);
    $curso_prerequisitos = sanitize_textarea_field($_POST['curso_prerequisitos']);
    $curso_documentos = sanitize_textarea_field($_POST['curso_documentos']);
    $curso_metodologia = sanitize_textarea_field($_POST['curso_metodologia']);
    $curso_disciplinas = sanitize_textarea_field($_POST['curso_disciplinas']);
    $curso_salario_medio = sanitize_text_field($_POST['curso_salario_medio']);
    $curso_salario_inicial = sanitize_text_field($_POST['curso_salario_inicial']);
    $curso_taxa_empregabilidade = sanitize_text_field($_POST['curso_taxa_empregabilidade']);
    $curso_crescimento_anual = sanitize_text_field($_POST['curso_crescimento_anual']);
    $curso_oportunidades = sanitize_textarea_field($_POST['curso_oportunidades']);
    $curso_mercado_trabalho = sanitize_textarea_field($_POST['curso_mercado_trabalho']);
    $curso_areas_atuacao = sanitize_textarea_field($_POST['curso_areas_atuacao']);
    $curso_mercado_expansao = sanitize_textarea_field($_POST['curso_mercado_expansao']);
    $curso_preco_promocional = sanitize_text_field($_POST['curso_preco_promocional']);
    $curso_link_inscricao = esc_url_raw($_POST['curso_link_inscricao']);
    $curso_forma_pagamento = sanitize_textarea_field($_POST['curso_forma_pagamento']);
    $curso_parcelamento = sanitize_textarea_field($_POST['curso_parcelamento']);
    $curso_certificacao_detalhada = sanitize_textarea_field($_POST['curso_certificacao_detalhada']);

    // Validar campos obrigatórios
    if (empty($curso_titulo) || empty($curso_categoria) || empty($curso_duracao) || empty($curso_carga_horaria)) {
        add_action('admin_notices', function() {
            echo '<div class="notice notice-error"><p><strong>Erro!</strong> Preencha todos os campos obrigatórios.</p></div>';
        });
        return;
    }

    // Atualizar o post do curso
    $curso_data = array(
        'ID'           => $course_id,
        'post_title'   => $curso_titulo,
        'post_content' => $curso_descricao,
        'post_status'  => $curso_status,
    );

    $result = wp_update_post($curso_data);

    if (is_wp_error($result)) {
        add_action('admin_notices', function() {
            echo '<div class="notice notice-error"><p><strong>Erro!</strong> Não foi possível atualizar o curso. Tente novamente.</p></div>';
        });
        return;
    }

    // Atualizar meta dados do curso
    $meta_fields = array(
        'curso_nivel' => $curso_nivel,
        'curso_categoria' => $curso_categoria,
        'curso_duracao' => $curso_duracao,
        'curso_carga_horaria' => $curso_carga_horaria,
        'curso_estagio' => $curso_estagio,
        'curso_turno' => $curso_turno,
        'curso_modalidade' => $curso_modalidade,
        'curso_certificacao' => $curso_certificacao,
        'curso_requisitos' => $curso_requisitos,
        'curso_objetivos' => $curso_objetivos,
        'curso_valor' => $curso_valor,
        'curso_matricula' => $curso_matricula,
        'curso_parcelas' => $curso_parcelas,
        'curso_desconto' => $curso_desconto,
        'curso_coordenador' => $curso_coordenador,
        'curso_telefone' => $curso_telefone,
        'curso_email' => $curso_email,
        'curso_whatsapp' => $curso_whatsapp,
        'curso_featured' => $curso_featured,
        'curso_escolaridade' => $curso_escolaridade,
        'curso_idade_minima' => $curso_idade_minima,
        'curso_prerequisitos' => $curso_prerequisitos,
        'curso_documentos' => $curso_documentos,
        'curso_metodologia' => $curso_metodologia,
        'curso_disciplinas' => $curso_disciplinas,
        'curso_salario_medio' => $curso_salario_medio,
        'curso_salario_inicial' => $curso_salario_inicial,
        'curso_taxa_empregabilidade' => $curso_taxa_empregabilidade,
        'curso_crescimento_anual' => $curso_crescimento_anual,
        'curso_oportunidades' => $curso_oportunidades,
        'curso_mercado_trabalho' => $curso_mercado_trabalho,
        'curso_areas_atuacao' => $curso_areas_atuacao,
        'curso_mercado_expansao' => $curso_mercado_expansao,
        'curso_preco_promocional' => $curso_preco_promocional,
        'curso_link_inscricao' => $curso_link_inscricao,
        'curso_forma_pagamento' => $curso_forma_pagamento,
        'curso_parcelamento' => $curso_parcelamento,
        'curso_certificacao_detalhada' => $curso_certificacao_detalhada,
    );

    foreach ($meta_fields as $key => $value) {
        update_post_meta($course_id, $key, $value);
    }

    // Atualizar categoria do curso
    if (!empty($curso_categoria)) {
        $term = get_term_by('slug', $curso_categoria, 'curso_categoria');
        if ($term) {
            wp_set_post_terms($course_id, array($term->term_id), 'curso_categoria');
        }
    }

    // Redirecionar com mensagem de sucesso
    wp_redirect(admin_url('admin.php?page=cetesi-courses-management&course_updated=1&course_name=' . urlencode($curso_titulo)));
    exit;
}
