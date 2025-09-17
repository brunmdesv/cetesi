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
 * Página de Criação de Novo Curso
 */
function cetesi_custom_course_page_callback() {
    // Verificar se o formulário foi enviado
    if (isset($_POST['criar_curso']) && wp_verify_nonce($_POST['cetesi_course_nonce'], 'criar_curso_action')) {
        cetesi_process_custom_course_creation();
    }
    
    ?>
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
    
    <style>
    .cetesi-course-create {
        max-width: 1000px;
    }
    
    .cetesi-course-form-container {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .cetesi-course-form {
        padding: 0;
    }
    
    .cetesi-form-section {
        border-bottom: 1px solid #eee;
        padding: 30px;
    }
    
    .cetesi-form-section:last-child {
        border-bottom: none;
    }
    
    .section-header {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .section-header h2 {
        margin: 0 0 5px 0;
        font-size: 20px;
        color: #23282d;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .section-header p {
        margin: 0;
        color: #666;
        font-size: 14px;
    }
    
    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }
    
    .form-group {
        flex: 1;
    }
    
    .form-group.full-width {
        flex: 100%;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: #23282d;
    }
    
    .form-group label.required::after {
        content: " *";
        color: #dc3545;
    }
    
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }
    
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #0073aa;
        box-shadow: 0 0 0 2px rgba(0, 115, 170, 0.1);
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 80px;
    }
    
    .form-actions {
        padding: 30px;
        background: #f8f9fa;
        border-top: 1px solid #eee;
        display: flex;
        gap: 15px;
        justify-content: flex-start;
    }
    
    .form-actions .button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s ease;
    }
    
    .form-actions .button-primary {
        background: #0073aa;
        border-color: #0073aa;
        color: #fff;
    }
    
    .form-actions .button-primary:hover {
        background: #005a87;
        border-color: #005a87;
        color: #fff;
    }
    
    .form-actions .button-secondary {
        background: #6c757d;
        border-color: #6c757d;
        color: #fff;
    }
    
    .form-actions .button-secondary:hover {
        background: #545b62;
        border-color: #545b62;
        color: #fff;
    }
    
    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 15px;
        }
        
        .form-group {
            flex: none;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .cetesi-form-section {
            padding: 20px;
        }
    }
    </style>
    <?php
}

/**
 * Processar criação de curso personalizado
 */
function cetesi_process_custom_course_creation() {
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
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
