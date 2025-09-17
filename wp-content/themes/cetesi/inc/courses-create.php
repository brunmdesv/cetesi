<?php
/**
 * Página de Criação de Novo Curso - CETESI TEMA
 *
 * @package CETESI
 * @version 1.0.0
 */

// Evitar acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Processar criação de curso no hook admin_init
 */
add_action('admin_init', 'cetesi_handle_course_creation');
function cetesi_handle_course_creation() {
    if (isset($_POST['criar_curso']) && wp_verify_nonce($_POST['cetesi_course_nonce'], 'criar_curso_action')) {
        cetesi_process_custom_course_creation();
    }
}

/**
 * Página de Criação de Novo Curso
 */
function cetesi_custom_course_page_callback() {
    ?>
    <link rel="stylesheet" href="<?php echo CETESI_THEME_URL; ?>/assets/css/admin-courses.css">

    <div class="wrap cetesi-course-create">
        <div class="cetesi-course-form-container">
            <form method="post" action="" class="cetesi-course-form">
                <?php wp_nonce_field('criar_curso_action', 'cetesi_course_nonce'); ?>

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
                                   placeholder="Ex: Técnico em Enfermagem" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_descricao">Descrição do Curso</label>
                            <textarea id="curso_descricao" name="curso_descricao" rows="4"
                                      placeholder="Descreva o curso, seus objetivos e principais características..."></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_nivel">Nível de Ensino</label>
                            <select id="curso_nivel" name="curso_nivel">
                                <option value="">Selecione o nível</option>
                                <option value="tecnico">Técnico</option>
                                <option value="superior">Superior</option>
                                <option value="pos-graduacao">Pós-Graduação</option>
                                <option value="livre">Curso Livre</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="curso_categoria" class="required">Categoria do Curso</label>
                            <select id="curso_categoria" name="curso_categoria" required>
                                <option value="">Selecione a categoria</option>
                                <option value="tecnicos">Técnicos</option>
                                <option value="livres">Cursos Livres</option>
                                <option value="online">Online</option>
                                <option value="qualificacao">Qualificação Profissional</option>
                                <option value="educacao-basica">Educação Básica</option>
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
                                   placeholder="Ex: 18 meses" />
                        </div>

                        <div class="form-group">
                            <label for="curso_carga_horaria" class="required">Carga Horária Total</label>
                            <input type="text" id="curso_carga_horaria" name="curso_carga_horaria" required
                                   placeholder="Ex: 1.200 horas" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_estagio">Carga Horária de Estágio</label>
                            <input type="text" id="curso_estagio" name="curso_estagio"
                                   placeholder="Ex: 300 horas" />
                        </div>

                        <div class="form-group">
                            <label for="curso_turno">Turno de Funcionamento</label>
                            <select id="curso_turno" name="curso_turno">
                                <option value="">Selecione o turno</option>
                                <option value="matutino">Matutino (6h às 12h)</option>
                                <option value="vespertino">Vespertino (13h às 18h)</option>
                                <option value="noturno">Noturno (19h às 22h)</option>
                                <option value="integral">Integral (manhã e tarde)</option>
                                <option value="flexivel">Flexível (horários variados)</option>
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
                                <option value="presencial">Presencial</option>
                                <option value="online">Online</option>
                                <option value="hibrida">Híbrida</option>
                                <option value="ead">EAD</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="curso_certificacao">Tipo de Certificação</label>
                            <select id="curso_certificacao" name="curso_certificacao">
                                <option value="">Selecione o tipo</option>
                                <option value="certificado">Certificado</option>
                                <option value="diploma">Diploma</option>
                                <option value="declaracao">Declaração</option>
                                <option value="certificado-tecnico">Certificado Técnico</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_requisitos">Requisitos de Entrada</label>
                            <textarea id="curso_requisitos" name="curso_requisitos" rows="3"
                                      placeholder="Ex: Ensino Médio completo, idade mínima 18 anos..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="curso_objetivos">Objetivos do Curso</label>
                            <textarea id="curso_objetivos" name="curso_objetivos" rows="3"
                                      placeholder="Descreva os principais objetivos e competências que o aluno desenvolverá..."></textarea>
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
                                   placeholder="Ex: R$ 2.500,00" />
                        </div>

                        <div class="form-group">
                            <label for="curso_matricula">Valor da Matrícula</label>
                            <input type="text" id="curso_matricula" name="curso_matricula"
                                   placeholder="Ex: R$ 150,00" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_parcelas">Número de Parcelas</label>
                            <input type="number" id="curso_parcelas" name="curso_parcelas"
                                   placeholder="Ex: 18" min="1" max="60" />
                        </div>

                        <div class="form-group">
                            <label for="curso_desconto">Desconto Disponível</label>
                            <input type="text" id="curso_desconto" name="curso_desconto"
                                   placeholder="Ex: 10% para pagamento à vista" />
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
                                <option value="fundamental">Ensino Fundamental</option>
                                <option value="medio">Ensino Médio</option>
                                <option value="superior">Ensino Superior</option>
                                <option value="pos-graduacao">Pós-Graduação</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="curso_idade_minima">Idade Mínima</label>
                            <input type="number" id="curso_idade_minima" name="curso_idade_minima"
                                   placeholder="Ex: 18" min="16" max="100" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_prerequisitos">Pré-requisitos</label>
                            <textarea id="curso_prerequisitos" name="curso_prerequisitos" rows="3"
                                      placeholder="Ex: Conhecimento básico em informática, experiência na área..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="curso_documentos">Documentos Necessários</label>
                            <textarea id="curso_documentos" name="curso_documentos" rows="3"
                                      placeholder="Ex: RG, CPF, Comprovante de residência, Certificado de conclusão do ensino médio..."></textarea>
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
                                      placeholder="Descreva a metodologia utilizada no curso, métodos de ensino, recursos didáticos..."></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_disciplinas">Disciplinas do Curso</label>
                            <textarea id="curso_disciplinas" name="curso_disciplinas" rows="6"
                                      placeholder="Liste as disciplinas do curso com suas respectivas cargas horárias..."></textarea>
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
                                   placeholder="Ex: R$ 3.500,00" />
                        </div>

                        <div class="form-group">
                            <label for="curso_salario_inicial">Salário Inicial</label>
                            <input type="text" id="curso_salario_inicial" name="curso_salario_inicial"
                                   placeholder="Ex: R$ 2.500,00" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_taxa_empregabilidade">Taxa de Empregabilidade</label>
                            <input type="text" id="curso_taxa_empregabilidade" name="curso_taxa_empregabilidade"
                                   placeholder="Ex: 85%" />
                        </div>

                        <div class="form-group">
                            <label for="curso_crescimento_anual">Crescimento Anual do Mercado</label>
                            <input type="text" id="curso_crescimento_anual" name="curso_crescimento_anual"
                                   placeholder="Ex: 12%" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_oportunidades">Oportunidades de Trabalho</label>
                            <textarea id="curso_oportunidades" name="curso_oportunidades" rows="3"
                                      placeholder="Descreva as principais oportunidades de trabalho na área..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="curso_mercado_trabalho">Mercado de Trabalho</label>
                            <textarea id="curso_mercado_trabalho" name="curso_mercado_trabalho" rows="3"
                                      placeholder="Descreva o cenário atual do mercado de trabalho..."></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_areas_atuacao">Áreas de Atuação</label>
                            <textarea id="curso_areas_atuacao" name="curso_areas_atuacao" rows="3"
                                      placeholder="Liste as principais áreas onde o profissional pode atuar..."></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_mercado_expansao">Expansão do Mercado</label>
                            <textarea id="curso_mercado_expansao" name="curso_mercado_expansao" rows="3"
                                      placeholder="Descreva as perspectivas de crescimento e expansão do mercado..."></textarea>
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
                                   placeholder="Ex: R$ 1.800,00" />
                        </div>

                        <div class="form-group">
                            <label for="curso_link_inscricao">Link de Inscrição</label>
                            <input type="url" id="curso_link_inscricao" name="curso_link_inscricao"
                                   placeholder="Ex: https://cetesi.com.br/inscricao" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_forma_pagamento">Formas de Pagamento</label>
                            <textarea id="curso_forma_pagamento" name="curso_forma_pagamento" rows="3"
                                      placeholder="Ex: À vista, Cartão de crédito, PIX, Boleto bancário..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="curso_parcelamento">Condições de Parcelamento</label>
                            <textarea id="curso_parcelamento" name="curso_parcelamento" rows="3"
                                      placeholder="Ex: Até 18x sem juros no cartão, 10% de desconto à vista..."></textarea>
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
                                      placeholder="Descreva detalhadamente o tipo de certificação, validade, reconhecimento pelo MEC..."></textarea>
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
                                   placeholder="Ex: Prof. Dr. João Silva" />
                        </div>

                        <div class="form-group">
                            <label for="curso_telefone">Telefone de Contato</label>
                            <input type="text" id="curso_telefone" name="curso_telefone"
                                   placeholder="Ex: (11) 99999-9999" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_email">E-mail de Contato</label>
                            <input type="email" id="curso_email" name="curso_email"
                                   placeholder="Ex: cursos@cetesi.com.br" />
                        </div>

                        <div class="form-group">
                            <label for="curso_whatsapp">WhatsApp</label>
                            <input type="text" id="curso_whatsapp" name="curso_whatsapp"
                                   placeholder="Ex: (11) 99999-9999" />
                        </div>
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="form-actions">
                    <button type="submit" name="criar_curso" class="button button-primary button-large">
                        <span class="dashicons dashicons-saved"></span>
                        Criar Curso
                    </button>

                    <a href="<?php echo admin_url('admin.php?page=cetesi-courses-management'); ?>" class="button button-secondary button-large">
                        <span class="dashicons dashicons-arrow-left-alt"></span>
                        Voltar para Lista
                    </a>
                </div>
            </form>
        </div>
    </div>
    <?php
}

/**
 * Processar criação de curso personalizado
 */
function cetesi_process_custom_course_creation() {
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

    // Criar o post do curso
    $curso_data = array(
        'post_title'   => $curso_titulo,
        'post_content' => $curso_descricao,
        'post_status'  => 'draft', // Criar como rascunho inicialmente
        'post_type'    => 'curso',
        'post_author'  => get_current_user_id(),
    );

    $curso_id = wp_insert_post($curso_data);

    if (is_wp_error($curso_id)) {
        add_action('admin_notices', function() {
            echo '<div class="notice notice-error"><p><strong>Erro!</strong> Não foi possível criar o curso. Tente novamente.</p></div>';
        });
        return;
    }

    // Salvar meta dados do curso
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
        if (!empty($value)) {
            update_post_meta($curso_id, $key, $value);
        }
    }

    // Definir categoria do curso
    if (!empty($curso_categoria)) {
        $term = get_term_by('slug', $curso_categoria, 'curso_categoria');
        if ($term) {
            wp_set_post_terms($curso_id, array($term->term_id), 'curso_categoria');
        }
    }

    // Redirecionar com mensagem de sucesso
    wp_redirect(admin_url('admin.php?page=cetesi-courses-management&course_created=1&course_name=' . urlencode($curso_titulo)));
    exit;
}
