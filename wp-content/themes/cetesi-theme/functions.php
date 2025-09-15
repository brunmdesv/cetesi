<?php
/**
 * CETESI Theme Functions
 * 
 * @package CETESI
 * @version 1.0.0
 */

// Evitar acesso direto
if (!defined('ABSPATH')) {
    exit;
}

// Incluir arquivo de segurança
require_once get_template_directory() . '/security.php';

// Configurações do tema
define('CETESI_VERSION', '1.0.0');
define('CETESI_THEME_DIR', get_template_directory());
define('CETESI_THEME_URL', get_template_directory_uri());

/**
 * Configurações do tema
 */
function cetesi_setup() {
    // Suporte a título dinâmico
    add_theme_support('title-tag');
    
    // Suporte a logo personalizada
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Suporte a imagens destacadas
    add_theme_support('post-thumbnails');
    
    // Suporte a HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Suporte a menus
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'cetesi'),
        'footer'  => __('Menu do Rodapé', 'cetesi'),
    ));
    
    // Suporte a cores personalizadas
    add_theme_support('custom-background');
    add_theme_support('custom-colors');
    
    // Suporte a editor de blocos
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    
    // Suporte a editor de blocos avançado
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
    
    // Suporte a padrões de blocos
    add_theme_support('core-block-patterns');
    
    // Tamanhos de imagem personalizados
    add_image_size('curso-thumbnail', 400, 300, true);
    add_image_size('hero-image', 1200, 600, true);
}

/**
 * Menu de fallback quando nenhum menu está atribuído
 */
function cetesi_fallback_menu() {
    echo '<a href="#cursos">Cursos</a>';
    echo '<a href="#diferenciais">Diferenciais</a>';
    echo '<a href="#sobre">Sobre</a>';
    echo '<a href="#contato">Contato</a>';
}

/**
 * Configurações Avançadas do Tema
 */
function cetesi_advanced_settings() {
    add_menu_page(
        'Configurações CETESI',
        'CETESI',
        'manage_options',
        'cetesi-settings',
        'cetesi_settings_page',
        'dashicons-admin-settings',
        30
    );
    
    // Menu Principal - Cursos
    add_menu_page(
        'Gerenciar Cursos',
        'Cursos',
        'manage_options',
        'cetesi-courses-management',
        'cetesi_courses_management_page',
        'dashicons-welcome-learn-more',
        4
    );
    
    // Submenu - Cursos Criados
    add_submenu_page(
        'cetesi-courses-management',
        'Gerenciar Cursos',
        'Ver cursos',
        'manage_options',
        'cetesi-courses-management',
        'cetesi_courses_management_page'
    );
    
    // Submenu - Novo Curso
    add_submenu_page(
        'cetesi-courses-management',
        'Criar Novo Curso',
        'Novo curso',
        'manage_options',
        'criar-curso-personalizado',
        'cetesi_custom_course_page_callback'
    );
    
    // Submenu - Editar Curso
    add_submenu_page(
        'cetesi-courses-management',
        'Editar Curso',
        'Editar curso',
        'manage_options',
        'editar-curso-personalizado',
        'cetesi_edit_course_page_callback'
    );
    
    // Menu Principal - Equipe
    add_menu_page(
        'Gerenciar Equipe',
        'Equipe',
        'manage_options',
        'cetesi-team-management',
        'cetesi_team_management_page',
        'dashicons-groups',
        3
    );
    
    // Submenu - Ver Equipe
    add_submenu_page(
        'cetesi-team-management',
        'Ver Equipe',
        'Ver equipe',
        'manage_options',
        'cetesi-team-management',
        'cetesi_team_management_page'
    );
    
    // Submenu - Novo Membro
    add_submenu_page(
        'cetesi-team-management',
        'Adicionar Novo Membro',
        'Novo membro',
        'manage_options',
        'cetesi-add-member',
        'cetesi_add_member_page'
    );
    
    // Submenu - Editar Membro
    add_submenu_page(
        'cetesi-team-management',
        'Editar Membro',
        'Editar membro',
        'manage_options',
        'editar-membro-personalizado',
        'cetesi_edit_member_page_callback'
    );
    
    
    // Submenu - Personalização
    add_submenu_page(
        'cetesi-settings',
        'Personalização',
        'Personalização',
        'manage_options',
        'cetesi-customization',
        'cetesi_customization_page'
    );
    
    // Submenu - Conteúdo
    add_submenu_page(
        'cetesi-settings',
        'Conteúdo',
        'Conteúdo',
        'manage_options',
        'cetesi-content',
        'cetesi_content_page'
    );
    
    // Submenu - Otimização
    add_submenu_page(
        'cetesi-settings',
        'Otimização',
        'Otimização',
        'manage_options',
        'cetesi-optimization',
        'cetesi_optimization_page'
    );
    
    // Páginas de professores acessíveis apenas via URL direta
    // Não registradas como itens de menu para manter o menu limpo
}
add_action('admin_menu', 'cetesi_advanced_settings');

/**
 * Registrar páginas sem menu (acessíveis apenas via URL)
 */
function cetesi_register_hidden_pages() {
    // Página de adicionar professor
    add_submenu_page(
        'cetesi-settings',
        'Adicionar Professor',
        null, // null torna o item invisível no menu
        'manage_options',
        'cetesi-add-professor',
        'cetesi_add_professor_page'
    );
    
    // Página de gerenciar professores
    add_submenu_page(
        'cetesi-settings',
        'Gerenciar Professores',
        null, // null torna o item invisível no menu
        'manage_options',
        'cetesi-manage-professors',
        'cetesi_manage_professors_page'
    );
}
add_action('admin_menu', 'cetesi_register_hidden_pages');

/**
 * Página Principal de Configurações
 */
function cetesi_settings_page() {
    ?>
    <div class="wrap">
        <h1>Configurações Avançadas - CETESI</h1>
        <div class="cetesi-admin-dashboard">
            <div class="cetesi-admin-cards">
                <div class="cetesi-admin-card">
                    <h2><span class="dashicons dashicons-admin-customizer"></span> Personalização</h2>
                    <p>Configure aparência, cores, botões e elementos visuais do site.</p>
                    <a href="<?php echo admin_url('admin.php?page=cetesi-customization'); ?>" class="button button-primary">Configurar</a>
                </div>
                
                <div class="cetesi-admin-card">
                    <h2><span class="dashicons dashicons-shield"></span> Segurança</h2>
                    <p>Configurações de segurança, proteção e controle de acesso.</p>
                    <a href="<?php echo admin_url('admin.php?page=cetesi-security'); ?>" class="button button-primary">Configurar</a>
                </div>
                
                <div class="cetesi-admin-card">
                    <h2><span class="dashicons dashicons-performance"></span> Otimização</h2>
                    <p>Otimize performance, cache e velocidade do site.</p>
                    <a href="<?php echo admin_url('admin.php?page=cetesi-optimization'); ?>" class="button button-primary">Configurar</a>
                </div>
                
            </div>
        </div>
    </div>
    
    <style>
    .cetesi-admin-dashboard {
        margin-top: 20px;
    }
    
    .cetesi-admin-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    
    .cetesi-admin-card {
        background: #fff;
        border: 1px solid #ccd0d4;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
    }
    
    .cetesi-admin-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    
    .cetesi-admin-card h2 {
        margin: 0 0 10px 0;
        color: #1d2327;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .cetesi-admin-card h2 .dashicons {
        color: #2271b1;
        font-size: 24px;
    }
    
    .cetesi-admin-card p {
        color: #646970;
        margin: 0 0 15px 0;
        line-height: 1.5;
    }
    </style>
    <?php
}

/**
 * Página de Personalização
 */
function cetesi_customization_page() {
    if (isset($_POST['submit'])) {
        // Obter configurações atuais para preservar valores não enviados
        $current_header_buttons = get_option('cetesi_header_buttons', array(
            'painel_unicollege' => array('enabled' => 1, 'text' => 'Painel Unicollege', 'url' => '#', 'new_tab' => 0),
            'painel_aluno' => array('enabled' => 1, 'text' => 'Painel do Aluno', 'url' => '#', 'new_tab' => 0),
            'telefone' => array('enabled' => 1, 'text' => '(11) 99999-9999', 'url' => 'tel:(11) 99999-9999'),
            'whatsapp' => array('enabled' => 1, 'text' => 'WhatsApp', 'url' => 'https://wa.me/556133514511')
        ));
        
        $current_whatsapp_floating = get_option('cetesi_whatsapp_floating', array(
            'enabled' => 1,
            'number' => '556133514511',
            'message' => 'Olá! Tenho interesse nos cursos do CETESI. Gostaria de mais informações.'
        ));
        
        $current_cta_buttons = get_option('cetesi_cta_buttons', array(
            'homepage_inscreva' => array('text' => 'Inscreva-se', 'url' => '#inscricao'),
            'homepage_ligar' => array('text' => 'Ligar Agora', 'url' => 'tel:6133514511'),
            'curso_consultor' => array('text' => 'Falar com o Consultor', 'url' => '#contato'),
            'curso_whatsapp' => array('text' => 'WhatsApp', 'url' => 'https://wa.me/556133514511')
        ));
        
        // Atualizar apenas os campos que foram enviados
        if (isset($_POST['painel_unicollege_text']) || isset($_POST['painel_unicollege_url'])) {
            $current_header_buttons['painel_unicollege'] = array(
                'enabled' => isset($_POST['painel_unicollege']) ? 1 : 0,
                'text' => sanitize_text_field($_POST['painel_unicollege_text'] ?? $current_header_buttons['painel_unicollege']['text']),
                'url' => esc_url_raw($_POST['painel_unicollege_url'] ?? $current_header_buttons['painel_unicollege']['url']),
                'new_tab' => isset($_POST['painel_unicollege_new_tab']) ? 1 : 0
            );
        }
        
        if (isset($_POST['painel_aluno_text']) || isset($_POST['painel_aluno_url'])) {
            $current_header_buttons['painel_aluno'] = array(
                'enabled' => isset($_POST['painel_aluno']) ? 1 : 0,
                'text' => sanitize_text_field($_POST['painel_aluno_text'] ?? $current_header_buttons['painel_aluno']['text']),
                'url' => esc_url_raw($_POST['painel_aluno_url'] ?? $current_header_buttons['painel_aluno']['url']),
                'new_tab' => isset($_POST['painel_aluno_new_tab']) ? 1 : 0
            );
        }
        
        if (isset($_POST['telefone_text']) || isset($_POST['telefone_url'])) {
            $current_header_buttons['telefone'] = array(
                'enabled' => isset($_POST['telefone']) ? 1 : 0,
                'text' => sanitize_text_field($_POST['telefone_text'] ?? $current_header_buttons['telefone']['text']),
                'url' => esc_url_raw($_POST['telefone_url'] ?? $current_header_buttons['telefone']['url'])
            );
        }
        
        if (isset($_POST['whatsapp_text']) || isset($_POST['whatsapp_url'])) {
            $current_header_buttons['whatsapp'] = array(
                'enabled' => isset($_POST['whatsapp']) ? 1 : 0,
                'text' => sanitize_text_field($_POST['whatsapp_text'] ?? $current_header_buttons['whatsapp']['text']),
                'url' => esc_url_raw($_POST['whatsapp_url'] ?? $current_header_buttons['whatsapp']['url'])
            );
        }
        
        // Salvar configurações do header
        update_option('cetesi_header_buttons', $current_header_buttons);
        
        // Atualizar configurações do WhatsApp flutuante se foram enviadas
        if (isset($_POST['whatsapp_floating_number']) || isset($_POST['whatsapp_floating_message'])) {
            $current_whatsapp_floating = array(
                'enabled' => isset($_POST['whatsapp_floating_enabled']) ? 1 : 0,
                'number' => sanitize_text_field($_POST['whatsapp_floating_number'] ?? $current_whatsapp_floating['number']),
                'message' => sanitize_textarea_field($_POST['whatsapp_floating_message'] ?? $current_whatsapp_floating['message'])
            );
            update_option('cetesi_whatsapp_floating', $current_whatsapp_floating);
        }
        
        // Atualizar configurações dos botões CTA se foram enviadas
        if (isset($_POST['homepage_inscreva_text']) || isset($_POST['homepage_inscreva_url']) || 
            isset($_POST['homepage_ligar_text']) || isset($_POST['homepage_ligar_url']) ||
            isset($_POST['curso_consultor_text']) || isset($_POST['curso_consultor_url']) ||
            isset($_POST['curso_whatsapp_text']) || isset($_POST['curso_whatsapp_url'])) {
            
            if (isset($_POST['homepage_inscreva_text']) || isset($_POST['homepage_inscreva_url'])) {
                $current_cta_buttons['homepage_inscreva'] = array(
                    'text' => sanitize_text_field($_POST['homepage_inscreva_text'] ?? $current_cta_buttons['homepage_inscreva']['text']),
                    'url' => esc_url_raw($_POST['homepage_inscreva_url'] ?? $current_cta_buttons['homepage_inscreva']['url'])
                );
            }
            
            if (isset($_POST['homepage_ligar_text']) || isset($_POST['homepage_ligar_url'])) {
                $current_cta_buttons['homepage_ligar'] = array(
                    'text' => sanitize_text_field($_POST['homepage_ligar_text'] ?? $current_cta_buttons['homepage_ligar']['text']),
                    'url' => esc_url_raw($_POST['homepage_ligar_url'] ?? $current_cta_buttons['homepage_ligar']['url'])
                );
            }
            
            if (isset($_POST['curso_consultor_text']) || isset($_POST['curso_consultor_url'])) {
                $current_cta_buttons['curso_consultor'] = array(
                    'text' => sanitize_text_field($_POST['curso_consultor_text'] ?? $current_cta_buttons['curso_consultor']['text']),
                    'url' => esc_url_raw($_POST['curso_consultor_url'] ?? $current_cta_buttons['curso_consultor']['url'])
                );
            }
            
            if (isset($_POST['curso_whatsapp_text']) || isset($_POST['curso_whatsapp_url'])) {
                $current_cta_buttons['curso_whatsapp'] = array(
                    'text' => sanitize_text_field($_POST['curso_whatsapp_text'] ?? $current_cta_buttons['curso_whatsapp']['text']),
                    'url' => esc_url_raw($_POST['curso_whatsapp_url'] ?? $current_cta_buttons['curso_whatsapp']['url'])
                );
            }
            
            update_option('cetesi_cta_buttons', $current_cta_buttons);
        }
        
        echo '<div class="notice notice-success cetesi-success-notice"><p><span class="dashicons dashicons-yes-alt"></span> Configurações salvas com sucesso!</p></div>';
    }
    
    $header_buttons = get_option('cetesi_header_buttons', array(
        'painel_unicollege' => array('enabled' => 1, 'text' => 'Painel Unicollege', 'url' => '#', 'new_tab' => 0),
        'painel_aluno' => array('enabled' => 1, 'text' => 'Painel do Aluno', 'url' => '#', 'new_tab' => 0),
        'telefone' => array('enabled' => 1, 'text' => '(11) 99999-9999', 'url' => 'tel:(11) 99999-9999'),
        'whatsapp' => array('enabled' => 1, 'text' => 'WhatsApp', 'url' => 'https://wa.me/556133514511')
    ));
    
    $whatsapp_floating = get_option('cetesi_whatsapp_floating', array(
        'enabled' => 1,
        'number' => '556133514511',
        'message' => 'Olá! Tenho interesse nos cursos do CETESI. Gostaria de mais informações.'
    ));
    
    $cta_buttons = get_option('cetesi_cta_buttons', array(
        'homepage_inscreva' => array('text' => 'Inscreva-se', 'url' => '#inscricao'),
        'homepage_ligar' => array('text' => 'Ligar Agora', 'url' => 'tel:6133514511'),
        'curso_consultor' => array('text' => 'Falar com o Consultor', 'url' => '#contato'),
        'curso_whatsapp' => array('text' => 'WhatsApp', 'url' => 'https://wa.me/556133514511')
    ));
    ?>
    <div class="wrap cetesi-customization-page">
        <div class="cetesi-page-header">
            <h1><span class="dashicons dashicons-admin-customizer"></span> Personalização do Tema</h1>
            <p class="cetesi-page-description">Configure os elementos visuais e funcionais do seu site educacional.</p>
        </div>
        
        <div class="cetesi-sections">
            <div class="cetesi-section">
                <div class="cetesi-section-header">
                    <h2><span class="dashicons dashicons-admin-tools"></span> Configurações do Header</h2>
                    <p>Personalize os botões e elementos do cabeçalho do site.</p>
                </div>
                
                <div class="cetesi-section-content">
                    <form method="post" action="" class="cetesi-form">
                        <div class="cetesi-button-grid">
                            <div class="cetesi-button-card">
                                <div class="cetesi-button-header">
                                    <div class="cetesi-button-icon">
                                        <span class="dashicons dashicons-graduation-cap"></span>
                                    </div>
                                    <div class="cetesi-button-title">
                                        <h3>Painel Unicollege</h3>
                                        <p>Botão de acesso ao painel institucional</p>
                                    </div>
                                    <div class="cetesi-button-toggle">
                                        <label class="cetesi-switch">
                                            <input type="checkbox" name="painel_unicollege" value="1" <?php checked($header_buttons['painel_unicollege']['enabled'], 1); ?>>
                                            <span class="cetesi-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="cetesi-button-fields">
                                    <div class="cetesi-field-group">
                                        <label class="cetesi-field-label">
                                            <span class="dashicons dashicons-edit"></span>
                                            Texto do Botão
                                        </label>
                                        <input type="text" name="painel_unicollege_text" value="<?php echo esc_attr($header_buttons['painel_unicollege']['text']); ?>" class="cetesi-field-input" placeholder="Ex: Painel Unicollege">
                                    </div>
                                    
                                    <div class="cetesi-field-group">
                                        <label class="cetesi-field-label">
                                            <span class="dashicons dashicons-admin-links"></span>
                                            URL de Destino
                                        </label>
                                        <input type="text" name="painel_unicollege_url" value="<?php echo esc_attr($header_buttons['painel_unicollege']['url']); ?>" class="cetesi-field-input" placeholder="Ex: https://portal.unicollege.com ou #painel">
                                    </div>
                                    
                                    <div class="cetesi-field-group cetesi-field-checkbox">
                                        <label class="cetesi-checkbox-label">
                                            <input type="checkbox" name="painel_unicollege_new_tab" value="1" <?php checked($header_buttons['painel_unicollege']['new_tab'], 1); ?>>
                                            <span class="cetesi-checkbox-text">
                                                <span class="dashicons dashicons-external"></span>
                                                Abrir em nova guia
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="cetesi-button-card">
                                <div class="cetesi-button-header">
                                    <div class="cetesi-button-icon">
                                        <span class="dashicons dashicons-admin-users"></span>
                                    </div>
                                    <div class="cetesi-button-title">
                                        <h3>Painel do Aluno</h3>
                                        <p>Botão de acesso para estudantes</p>
                                    </div>
                                    <div class="cetesi-button-toggle">
                                        <label class="cetesi-switch">
                                            <input type="checkbox" name="painel_aluno" value="1" <?php checked($header_buttons['painel_aluno']['enabled'], 1); ?>>
                                            <span class="cetesi-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="cetesi-button-fields">
                                    <div class="cetesi-field-group">
                                        <label class="cetesi-field-label">
                                            <span class="dashicons dashicons-edit"></span>
                                            Texto do Botão
                                        </label>
                                        <input type="text" name="painel_aluno_text" value="<?php echo esc_attr($header_buttons['painel_aluno']['text']); ?>" class="cetesi-field-input" placeholder="Ex: Painel do Aluno">
                                    </div>
                                    
                                    <div class="cetesi-field-group">
                                        <label class="cetesi-field-label">
                                            <span class="dashicons dashicons-admin-links"></span>
                                            URL de Destino
                                        </label>
                                        <input type="text" name="painel_aluno_url" value="<?php echo esc_attr($header_buttons['painel_aluno']['url']); ?>" class="cetesi-field-input" placeholder="Ex: https://aluno.cetesi.com.br ou #aluno">
                                    </div>
                                    
                                    <div class="cetesi-field-group cetesi-field-checkbox">
                                        <label class="cetesi-checkbox-label">
                                            <input type="checkbox" name="painel_aluno_new_tab" value="1" <?php checked($header_buttons['painel_aluno']['new_tab'], 1); ?>>
                                            <span class="cetesi-checkbox-text">
                                                <span class="dashicons dashicons-external"></span>
                                                Abrir em nova guia
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="cetesi-button-card">
                                <div class="cetesi-button-header">
                                    <div class="cetesi-button-icon">
                                        <span class="dashicons dashicons-phone"></span>
                                    </div>
                                    <div class="cetesi-button-title">
                                        <h3>Botão de Telefone</h3>
                                        <p>Contato telefônico direto</p>
                                    </div>
                                    <div class="cetesi-button-toggle">
                                        <label class="cetesi-switch">
                                            <input type="checkbox" name="telefone" value="1" <?php checked($header_buttons['telefone']['enabled'], 1); ?>>
                                            <span class="cetesi-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="cetesi-button-fields">
                                    <div class="cetesi-field-group">
                                        <label class="cetesi-field-label">
                                            <span class="dashicons dashicons-edit"></span>
                                            Texto do Botão
                                        </label>
                                        <input type="text" name="telefone_text" value="<?php echo esc_attr($header_buttons['telefone']['text']); ?>" class="cetesi-field-input" placeholder="Ex: (11) 99999-9999">
                                    </div>
                                    
                                    <div class="cetesi-field-group">
                                        <label class="cetesi-field-label">
                                            <span class="dashicons dashicons-admin-links"></span>
                                            URL de Destino
                                        </label>
                                        <input type="text" name="telefone_url" value="<?php echo esc_attr($header_buttons['telefone']['url']); ?>" class="cetesi-field-input" placeholder="Ex: tel:11999999999 ou #contato">
                                        <small class="cetesi-field-help">Use o formato: tel:11999999999 ou âncora como #contato</small>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="cetesi-form-actions">
                            <button type="submit" name="submit" class="button button-primary button-large cetesi-save-button">
                                <span class="dashicons dashicons-saved"></span>
                                Salvar Configurações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="cetesi-section">
                <div class="cetesi-section-header">
                    <h2><span class="dashicons dashicons-whatsapp"></span> Botão WhatsApp Flutuante</h2>
                    <p>Configure o botão flutuante do WhatsApp que aparece no canto inferior direito do site.</p>
                </div>
                
                <div class="cetesi-section-content">
                    <form method="post" action="" class="cetesi-form">
                        <div class="cetesi-whatsapp-card">
                            <div class="cetesi-whatsapp-header">
                                <div class="cetesi-whatsapp-icon">
                                    <span class="dashicons dashicons-whatsapp"></span>
                                </div>
                                <div class="cetesi-whatsapp-title">
                                    <h3>Botão WhatsApp Flutuante</h3>
                                    <p>Botão que aparece no canto inferior direito de todas as páginas</p>
                                </div>
                                <div class="cetesi-whatsapp-toggle">
                                    <label class="cetesi-switch">
                                        <input type="checkbox" name="whatsapp_floating_enabled" value="1" <?php checked($whatsapp_floating['enabled'], 1); ?>>
                                        <span class="cetesi-slider"></span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="cetesi-whatsapp-fields">
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-phone"></span>
                                        Número do WhatsApp
                                    </label>
                                    <input type="text" name="whatsapp_floating_number" value="<?php echo esc_attr($whatsapp_floating['number']); ?>" class="cetesi-field-input" placeholder="Ex: 556133514511">
                                    <small class="cetesi-field-help">Digite o número com código do país (ex: 556133514511)</small>
                                </div>
                                
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-edit"></span>
                                        Mensagem Padrão
                                    </label>
                                    <textarea name="whatsapp_floating_message" class="cetesi-field-textarea" rows="4" placeholder="Digite a mensagem que será enviada quando o usuário clicar no botão..."><?php echo esc_textarea($whatsapp_floating['message']); ?></textarea>
                                    <small class="cetesi-field-help">Esta mensagem será enviada automaticamente quando o usuário clicar no botão flutuante</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="cetesi-form-actions">
                            <button type="submit" name="submit" class="button button-primary button-large cetesi-save-button">
                                <span class="dashicons dashicons-saved"></span>
                                Salvar Configurações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="cetesi-section">
                <div class="cetesi-section-header">
                    <h2><span class="dashicons dashicons-megaphone"></span> Botões de Call-to-Action</h2>
                    <p>Configure os textos e links dos botões principais do site (homepage e páginas de curso).</p>
                </div>
                
                <div class="cetesi-section-content">
                    <form method="post" action="" class="cetesi-form">
                        <div class="cetesi-cta-grid">
                        <!-- Homepage - Inscreva-se -->
                        <div class="cetesi-cta-card">
                            <div class="cetesi-cta-header">
                                <div class="cetesi-cta-icon">
                                    <span class="dashicons dashicons-admin-site"></span>
                                </div>
                                <div class="cetesi-cta-title">
                                    <h3>Homepage - Inscreva-se</h3>
                                    <p>Botão principal da tela inicial</p>
                                </div>
                            </div>
                            
                            <div class="cetesi-cta-fields">
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-edit"></span>
                                        Texto do Botão
                                    </label>
                                    <input type="text" name="homepage_inscreva_text" value="<?php echo esc_attr($cta_buttons['homepage_inscreva']['text']); ?>" class="cetesi-field-input" placeholder="Ex: Inscreva-se">
                                </div>
                                
                                    <div class="cetesi-field-group">
                                        <label class="cetesi-field-label">
                                            <span class="dashicons dashicons-admin-links"></span>
                                            URL de Destino
                                        </label>
                                        <input type="text" name="homepage_inscreva_url" value="<?php echo esc_attr($cta_buttons['homepage_inscreva']['url']); ?>" class="cetesi-field-input" placeholder="Ex: #inscricao ou https://exemplo.com">
                                    </div>
                            </div>
                        </div>
                        
                        <!-- Homepage - Ligar Agora -->
                        <div class="cetesi-cta-card">
                            <div class="cetesi-cta-header">
                                <div class="cetesi-cta-icon">
                                    <span class="dashicons dashicons-phone"></span>
                                </div>
                                <div class="cetesi-cta-title">
                                    <h3>Homepage - Ligar Agora</h3>
                                    <p>Botão secundário da tela inicial</p>
                                </div>
                            </div>
                            
                            <div class="cetesi-cta-fields">
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-edit"></span>
                                        Texto do Botão
                                    </label>
                                    <input type="text" name="homepage_ligar_text" value="<?php echo esc_attr($cta_buttons['homepage_ligar']['text']); ?>" class="cetesi-field-input" placeholder="Ex: Ligar Agora">
                                </div>
                                
                                    <div class="cetesi-field-group">
                                        <label class="cetesi-field-label">
                                            <span class="dashicons dashicons-admin-links"></span>
                                            URL de Destino
                                        </label>
                                        <input type="text" name="homepage_ligar_url" value="<?php echo esc_attr($cta_buttons['homepage_ligar']['url']); ?>" class="cetesi-field-input" placeholder="Ex: tel:6133514511 ou #contato">
                                    </div>
                            </div>
                        </div>
                        
                        <!-- Curso - Falar com Consultor -->
                        <div class="cetesi-cta-card">
                            <div class="cetesi-cta-header">
                                <div class="cetesi-cta-icon">
                                    <span class="dashicons dashicons-businessman"></span>
                                </div>
                                <div class="cetesi-cta-title">
                                    <h3>Página de Curso - Consultor</h3>
                                    <p>Botão principal das páginas de curso</p>
                                </div>
                            </div>
                            
                            <div class="cetesi-cta-fields">
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-edit"></span>
                                        Texto do Botão
                                    </label>
                                    <input type="text" name="curso_consultor_text" value="<?php echo esc_attr($cta_buttons['curso_consultor']['text']); ?>" class="cetesi-field-input" placeholder="Ex: Falar com o Consultor">
                                </div>
                                
                                    <div class="cetesi-field-group">
                                        <label class="cetesi-field-label">
                                            <span class="dashicons dashicons-admin-links"></span>
                                            URL de Destino
                                        </label>
                                        <input type="text" name="curso_consultor_url" value="<?php echo esc_attr($cta_buttons['curso_consultor']['url']); ?>" class="cetesi-field-input" placeholder="Ex: #contato ou https://exemplo.com">
                                    </div>
                            </div>
                        </div>
                        
                        <!-- Curso - WhatsApp -->
                        <div class="cetesi-cta-card">
                            <div class="cetesi-cta-header">
                                <div class="cetesi-cta-icon">
                                    <span class="dashicons dashicons-whatsapp"></span>
                                </div>
                                <div class="cetesi-cta-title">
                                    <h3>Página de Curso - WhatsApp</h3>
                                    <p>Botão secundário das páginas de curso</p>
                                </div>
                            </div>
                            
                            <div class="cetesi-cta-fields">
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-edit"></span>
                                        Texto do Botão
                                    </label>
                                    <input type="text" name="curso_whatsapp_text" value="<?php echo esc_attr($cta_buttons['curso_whatsapp']['text']); ?>" class="cetesi-field-input" placeholder="Ex: WhatsApp">
                                </div>
                                
                                    <div class="cetesi-field-group">
                                        <label class="cetesi-field-label">
                                            <span class="dashicons dashicons-admin-links"></span>
                                            URL de Destino
                                        </label>
                                        <input type="text" name="curso_whatsapp_url" value="<?php echo esc_attr($cta_buttons['curso_whatsapp']['url']); ?>" class="cetesi-field-input" placeholder="Ex: https://wa.me/556133514511 ou #whatsapp">
                                    </div>
                            </div>
                        </div>
                    </div>
                    
                        <div class="cetesi-form-actions">
                            <button type="submit" name="submit" class="button button-primary button-large cetesi-save-button">
                                <span class="dashicons dashicons-saved"></span>
                                Salvar Configurações dos Botões CTA
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <style>
    .cetesi-customization-page {
        max-width: 1200px;
        margin: 20px auto;
    }
    
    .cetesi-page-header {
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
        color: white;
        padding: 30px;
        border-radius: 12px;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.3);
    }
    
    .cetesi-page-header h1 {
        margin: 0 0 10px 0;
        font-size: 28px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .cetesi-page-header .dashicons {
        font-size: 32px;
    }
    
    .cetesi-page-description {
        margin: 0;
        font-size: 16px;
        opacity: 0.9;
    }
    
    .cetesi-sections {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
    
    .cetesi-section {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .cetesi-section-header {
        background: #f8f9fa;
        padding: 25px 30px;
        border-bottom: 1px solid #e1e5e9;
    }
    
    .cetesi-section-header h2 {
        margin: 0 0 8px 0;
        font-size: 20px;
        font-weight: 600;
        color: #1d2327;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .cetesi-section-header p {
        margin: 0;
        color: #646970;
        font-size: 14px;
    }
    
    .cetesi-section-content {
        padding: 30px;
    }
    
    .cetesi-button-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        margin-bottom: 30px;
    }
    
    .cetesi-button-card {
        background: #f8f9fa;
        border: 2px solid #e1e5e9;
        border-radius: 12px;
        padding: 25px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .cetesi-button-card:hover {
        border-color: #2563eb;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.1);
        transform: translateY(-2px);
    }
    
    .cetesi-button-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
    }
    
    .cetesi-button-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .cetesi-button-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .cetesi-button-icon .dashicons {
        color: white;
        font-size: 24px;
    }
    
    .cetesi-button-title {
        flex: 1;
    }
    
    .cetesi-button-title h3 {
        margin: 0 0 5px 0;
        font-size: 18px;
        font-weight: 600;
        color: #1d2327;
    }
    
    .cetesi-button-title p {
        margin: 0;
        color: #646970;
        font-size: 13px;
    }
    
    .cetesi-button-toggle {
        flex-shrink: 0;
    }
    
    .cetesi-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }
    
    .cetesi-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    
    .cetesi-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.3s;
        border-radius: 24px;
    }
    
    .cetesi-slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
    }
    
    input:checked + .cetesi-slider {
        background-color: #2563eb;
    }
    
    input:checked + .cetesi-slider:before {
        transform: translateX(26px);
    }
    
    .cetesi-button-fields {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .cetesi-field-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    
    .cetesi-field-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #1d2327;
        font-size: 14px;
    }
    
    .cetesi-field-label .dashicons {
        color: #2563eb;
        font-size: 16px;
    }
    
    .cetesi-field-input {
        padding: 12px 16px;
        border: 2px solid #e1e5e9;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
    }
    
    .cetesi-field-input:focus {
        border-color: #2563eb;
        outline: none;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }
    
    .cetesi-field-help {
        color: #646970;
        font-size: 12px;
        font-style: italic;
    }
    
    .cetesi-form-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-start;
        align-items: center;
        padding-top: 25px;
        border-top: 1px solid #e1e5e9;
    }
    
    .cetesi-save-button {
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%) !important;
        border: none !important;
        color: white !important;
        padding: 12px 24px !important;
        border-radius: 8px !important;
        font-weight: 600 !important;
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        transition: all 0.3s ease !important;
    }
    
    .cetesi-save-button:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.3) !important;
    }
    
    
    .cetesi-success-notice {
        background: #d1e7dd !important;
        border-left: 4px solid #0f5132 !important;
        color: #0f5132 !important;
        padding: 15px 20px !important;
        margin: 20px 0 !important;
        border-radius: 6px !important;
        box-shadow: 0 2px 8px rgba(15, 81, 50, 0.1) !important;
    }
    
    .cetesi-success-notice p {
        margin: 0 !important;
        color: #0f5132 !important;
        font-weight: 600 !important;
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
    }
    
    .cetesi-success-notice .dashicons {
        color: #0f5132 !important;
        font-size: 18px !important;
    }
    
    /* Tablet Responsive */
    @media (max-width: 1024px) and (min-width: 769px) {
        .cetesi-button-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        
        .cetesi-button-card {
            min-height: 200px;
        }
        
        .cetesi-button-header {
            flex-direction: row;
            align-items: center;
            gap: 15px;
        }
        
        .cetesi-button-title h3 {
            font-size: 1.1rem;
        }
        
        .cetesi-button-title p {
            font-size: 0.85rem;
        }
    }
    
    /* Mobile Responsive */
    @media (max-width: 768px) {
        .cetesi-page-header {
            padding: 20px;
            margin: 0 -20px 20px -20px;
        }
        
        .cetesi-page-header h1 {
            font-size: 1.5rem;
        }
        
        .cetesi-page-description {
            font-size: 0.9rem;
        }
        
        .cetesi-section-content {
            padding: 20px;
        }
        
        .cetesi-button-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .cetesi-button-card {
            min-height: auto;
            padding: 20px;
        }
        
        .cetesi-button-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .cetesi-button-icon {
            align-self: flex-start;
        }
        
        .cetesi-button-title {
            text-align: left;
        }
        
        .cetesi-button-title h3 {
            font-size: 1rem;
            margin-bottom: 5px;
        }
        
        .cetesi-button-title p {
            font-size: 0.8rem;
        }
        
        .cetesi-button-toggle {
            align-self: flex-end;
            margin-top: -40px;
        }
        
        .cetesi-field-group {
            margin-bottom: 15px;
        }
        
        .cetesi-field-label {
            font-size: 0.9rem;
        }
        
        .cetesi-field-input {
            font-size: 0.9rem;
            padding: 10px 12px;
        }
        
        .cetesi-field-help {
            font-size: 0.75rem;
        }
        
        .cetesi-form-actions {
            flex-direction: column;
            align-items: stretch;
            gap: 10px;
        }
        
        .cetesi-save-button {
            width: 100%;
            justify-content: center;
        }
    }
    
    /* Estilos específicos para WhatsApp Flutuante */
    .cetesi-whatsapp-card {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    
    .cetesi-whatsapp-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid #e1e5e9;
    }
    
    .cetesi-whatsapp-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 16px;
        box-shadow: 0 2px 8px rgba(37, 211, 102, 0.3);
    }
    
    .cetesi-whatsapp-icon .dashicons {
        color: white;
        font-size: 24px;
    }
    
    .cetesi-whatsapp-title {
        flex: 1;
    }
    
    .cetesi-whatsapp-title h3 {
        margin: 0 0 4px 0;
        font-size: 18px;
        font-weight: 600;
        color: #1d2327;
    }
    
    .cetesi-whatsapp-title p {
        margin: 0;
        color: #646970;
        font-size: 14px;
    }
    
    .cetesi-whatsapp-toggle {
        margin-left: 16px;
    }
    
    .cetesi-whatsapp-fields {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    
    .cetesi-field-textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
        resize: vertical;
        min-height: 100px;
        transition: border-color 0.3s ease;
    }
    
    .cetesi-field-textarea:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1);
    }
    
    /* Estilos para checkboxes */
    .cetesi-field-checkbox {
        margin-top: 15px;
    }
    
    .cetesi-checkbox-label {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        font-size: 14px;
        color: #646970;
    }
    
    .cetesi-checkbox-label input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #2563eb;
        cursor: pointer;
    }
    
    .cetesi-checkbox-text {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .cetesi-checkbox-text .dashicons {
        font-size: 16px;
        color: #2563eb;
    }
    
    /* Estilos para seção CTA */
    .cetesi-cta-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }
    
    .cetesi-cta-card {
        background: #f8f9fa;
        border: 2px solid #e1e5e9;
        border-radius: 12px;
        padding: 25px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .cetesi-cta-card:hover {
        border-color: #10b981;
        box-shadow: 0 4px 20px rgba(16, 185, 129, 0.1);
        transform: translateY(-2px);
    }
    
    .cetesi-cta-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #10b981, #059669);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .cetesi-cta-card:hover::before {
        opacity: 1;
    }
    
    .cetesi-cta-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e1e5e9;
    }
    
    .cetesi-cta-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #10b981, #059669);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }
    
    .cetesi-cta-title h3 {
        margin: 0 0 5px 0;
        font-size: 18px;
        font-weight: 600;
        color: #1d2327;
    }
    
    .cetesi-cta-title p {
        margin: 0;
        font-size: 14px;
        color: #646970;
    }
    
    .cetesi-cta-fields {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    @media (max-width: 768px) {
        .cetesi-whatsapp-fields {
            grid-template-columns: 1fr;
            gap: 16px;
        }
        
        .cetesi-whatsapp-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
        
        .cetesi-whatsapp-toggle {
            margin-left: 0;
            align-self: flex-end;
        }
        
        .cetesi-cta-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .cetesi-cta-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
        
        .cetesi-cta-icon {
            width: 40px;
            height: 40px;
            font-size: 20px;
        }
    }
    </style>
    
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle switch functionality
            const switches = document.querySelectorAll('.cetesi-switch input');
            switches.forEach(switchEl => {
                switchEl.addEventListener('change', function() {
                    const card = this.closest('.cetesi-button-card');
                    const fields = card.querySelector('.cetesi-button-fields');
                    
                    if (this.checked) {
                        fields.style.opacity = '1';
                        fields.style.pointerEvents = 'auto';
                    } else {
                        fields.style.opacity = '0.5';
                        fields.style.pointerEvents = 'none';
                    }
                });
                
                // Initialize on page load
                switchEl.dispatchEvent(new Event('change'));
            });
        });
        </script>
    <?php
}

/**
 * Página de Segurança
 */
function cetesi_security_page() {
    ?>
    <div class="wrap">
        <h1>Configurações de Segurança</h1>
        <p>Em breve - configurações de segurança avançadas.</p>
    </div>
    <?php
}

/**
 * Página de Otimização
 */
function cetesi_optimization_page() {
    ?>
    <div class="wrap">
        <h1>Configurações de Otimização</h1>
        <p>Em breve - configurações de otimização e performance.</p>
    </div>
    <?php
}
add_action('after_setup_theme', 'cetesi_setup');

/**
 * Breadcrumbs para SEO
 */
function cetesi_breadcrumbs() {
    if (is_home() || is_front_page()) {
        return;
    }
    
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<ol class="breadcrumb-list">';
    
    // Home
    echo '<li class="breadcrumb-item">';
    echo '<a href="' . esc_url(home_url('/')) . '" class="breadcrumb-link">';
    echo '<i class="fas fa-home"></i> Início';
    echo '</a>';
    echo '</li>';
    
    if (is_category() || is_single()) {
        if (is_single()) {
            // Categoria do post
            $categories = get_the_category();
            if ($categories) {
                $category = $categories[0];
                echo '<li class="breadcrumb-item">';
                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="breadcrumb-link">';
                echo esc_html($category->name);
                echo '</a>';
                echo '</li>';
            }
            
            // Post atual
            echo '<li class="breadcrumb-item active" aria-current="page">';
            echo esc_html(get_the_title());
            echo '</li>';
        } else {
            // Categoria atual
            echo '<li class="breadcrumb-item active" aria-current="page">';
            echo esc_html(single_cat_title('', false));
            echo '</li>';
        }
    } elseif (is_page()) {
        // Página atual
        echo '<li class="breadcrumb-item active" aria-current="page">';
        echo esc_html(get_the_title());
        echo '</li>';
    } elseif (is_archive()) {
        // Arquivo atual
        echo '<li class="breadcrumb-item active" aria-current="page">';
        echo esc_html(get_the_archive_title());
        echo '</li>';
    }
    
    echo '</ol>';
    echo '</nav>';
}

/**
 * Adicionar alt text automático para imagens
 */
function cetesi_add_alt_text($content) {
    if (is_admin()) {
        return $content;
    }
    
    // Adicionar alt text para imagens sem alt
    $content = preg_replace_callback(
        '/<img([^>]*?)(?:\s+alt\s*=\s*["\']([^"\']*)["\'])?([^>]*?)>/i',
        function($matches) {
            $img_tag = $matches[0];
            $before_alt = $matches[1];
            $alt_value = $matches[2];
            $after_alt = $matches[3];
            
            // Se já tem alt, não fazer nada
            if (!empty($alt_value)) {
                return $img_tag;
            }
            
            // Tentar extrair texto do contexto ou usar título da página
            $alt_text = '';
            if (is_single() || is_page()) {
                $alt_text = get_the_title();
            } elseif (is_category()) {
                $alt_text = single_cat_title('', false);
            } else {
                $alt_text = get_bloginfo('name');
            }
            
            return '<img' . $before_alt . ' alt="' . esc_attr($alt_text) . '"' . $after_alt . '>';
        },
        $content
    );
    
    return $content;
}
add_filter('the_content', 'cetesi_add_alt_text');

/**
 * Otimizar imagens para SEO
 */
function cetesi_optimize_images($attr, $attachment, $size) {
    // Adicionar loading lazy para performance
    if (!isset($attr['loading'])) {
        $attr['loading'] = 'lazy';
    }
    
    // Adicionar decoding async
    if (!isset($attr['decoding'])) {
        $attr['decoding'] = 'async';
    }
    
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'cetesi_optimize_images', 10, 3);

/**
 * Adicionar meta tags específicas para cursos
 */
function cetesi_course_meta_tags() {
    if (is_single() && get_post_type() == 'curso') {
        $curso_id = get_the_ID();
        $curso_meta = get_post_meta($curso_id, 'curso_meta', true);
        
        if ($curso_meta) {
            echo '<meta name="course-duration" content="' . esc_attr($curso_meta['duracao'] ?? '') . '">' . "\n";
            echo '<meta name="course-modality" content="' . esc_attr($curso_meta['modalidade'] ?? '') . '">' . "\n";
            echo '<meta name="course-certification" content="' . esc_attr($curso_meta['certificacao'] ?? '') . '">' . "\n";
        }
    }
}
add_action('wp_head', 'cetesi_course_meta_tags');

/**
 * Função para gerar URL do WhatsApp com mensagem personalizada
 */
function cetesi_get_whatsapp_url($custom_message = '') {
    // Primeiro tenta usar as configurações da tela de personalização
    $whatsapp_floating = get_option('cetesi_whatsapp_floating', array(
        'enabled' => 1,
        'number' => '556133514511',
        'message' => 'Olá! Tenho interesse nos cursos do CETESI. Gostaria de mais informações.'
    ));
    
    // Se não estiver habilitado, retorna vazio
    if (!$whatsapp_floating['enabled']) {
        return '';
    }
    
    $whatsapp_number = $whatsapp_floating['number'];
    $default_message = $whatsapp_floating['message'];
    
    $message = !empty($custom_message) ? $custom_message : $default_message;
    
    return 'https://wa.me/' . esc_attr($whatsapp_number) . '?text=' . urlencode($message);
}


/**
 * Buscar cursos dinâmicos por categoria
 */
function cetesi_get_dynamic_courses($categoria, $limit = 20) {
    $args = array(
        'post_type' => 'curso',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'meta_query' => array(
            // Garantir que o curso tenha pelo menos os campos básicos preenchidos
            'relation' => 'AND',
            array(
                'key' => '_curso_duracao',
                'compare' => 'EXISTS'
            ),
            array(
                'key' => '_curso_carga_horaria',
                'compare' => 'EXISTS'
            ),
            array(
                'key' => '_curso_modalidade',
                'compare' => 'EXISTS'
            )
        )
    );
    
    // Filtrar por categoria usando a taxonomia categoria_curso
    if ($categoria === 'online') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categoria_curso',
                'field'    => 'slug',
                'terms'    => 'online',
            ),
        );
    } elseif ($categoria === 'tecnico') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categoria_curso',
                'field'    => 'slug',
                'terms'    => 'tecnicos',
            ),
        );
    } elseif ($categoria === 'livre') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categoria_curso',
                'field'    => 'slug',
                'terms'    => 'livres',
            ),
        );
    } elseif ($categoria === 'qualificacao') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categoria_curso',
                'field'    => 'slug',
                'terms'    => 'qualificacao',
            ),
        );
    } elseif ($categoria === 'educacao-basica') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categoria_curso',
                'field'    => 'slug',
                'terms'    => 'educacao-basica',
            ),
        );
    }
    
    return get_posts($args);
}

/**
 * Renderizar curso dinâmico
 */
function cetesi_render_dynamic_course($curso, $categoria_class = '') {
    $curso_id = $curso->ID;
    
    $duracao = get_post_meta($curso_id, '_curso_duracao', true);
    $carga_horaria = get_post_meta($curso_id, '_curso_carga_horaria', true);
    $estagio = get_post_meta($curso_id, '_curso_estagio', true);
    $modalidade = get_post_meta($curso_id, '_curso_modalidade', true);
    $turno = get_post_meta($curso_id, '_curso_turno', true);
    $reconhecimento = get_post_meta($curso_id, '_curso_reconhecimento', true);
    $preco = get_post_meta($curso_id, '_curso_preco', true);
    $preco_promocional = get_post_meta($curso_id, '_curso_preco_promocional', true);
    $certificacao = get_post_meta($curso_id, '_curso_certificacao', true);
    $nivel_ensino = get_post_meta($curso_id, '_curso_nivel_ensino', true);
    $area_conhecimento = get_post_meta($curso_id, '_curso_area_conhecimento', true);
    $tipo_curso = get_post_meta($curso_id, '_curso_tipo', true);
    $escolaridade = get_post_meta($curso_id, '_curso_escolaridade', true);
    $idade_minima = get_post_meta($curso_id, '_curso_idade_minima', true);
    $link_inscricao = get_post_meta($curso_id, '_curso_link_inscricao', true);
    $icon = 'fas fa-graduation-cap';
    $title_lower = strtolower(get_the_title($curso_id));
    
    if (strpos($title_lower, 'enfermagem') !== false) $icon = 'fas fa-user-nurse';
    elseif (strpos($title_lower, 'radiologia') !== false) $icon = 'fas fa-x-ray';
    elseif (strpos($title_lower, 'nutrição') !== false || strpos($title_lower, 'dietética') !== false) $icon = 'fas fa-apple-alt';
    elseif (strpos($title_lower, 'segurança') !== false) $icon = 'fas fa-hard-hat';
    elseif (strpos($title_lower, 'home care') !== false) $icon = 'fas fa-home';
    elseif (strpos($title_lower, 'eja') !== false) $icon = 'fas fa-book';
    elseif (strpos($title_lower, 'urgência') !== false || strpos($title_lower, 'emergência') !== false) $icon = 'fas fa-ambulance';
    elseif (strpos($title_lower, 'vacina') !== false) $icon = 'fas fa-syringe';
    elseif (strpos($title_lower, 'agente') !== false) $icon = 'fas fa-users';
    elseif (strpos($title_lower, 'farmácia') !== false) $icon = 'fas fa-pills';
    elseif (strpos($title_lower, 'instrumentação') !== false) $icon = 'fas fa-cut';
    elseif (strpos($title_lower, 'saúde mental') !== false) $icon = 'fas fa-brain';
    elseif (strpos($title_lower, 'trabalho') !== false) $icon = 'fas fa-briefcase';
    
    $reconhecimento_text = '';
    if ($reconhecimento) {
        switch ($reconhecimento) {
            case 'mec':
                $reconhecimento_text = __('Reconhecido pelo MEC', 'cetesi');
                break;
            case 'conselho':
                $reconhecimento_text = __('Reconhecido pelo Conselho', 'cetesi');
                break;
            case 'ministerio':
                $reconhecimento_text = __('Reconhecido pelo Ministério', 'cetesi');
                break;
            case 'certificacao':
                $reconhecimento_text = __('Certificação Profissional', 'cetesi');
                break;
            default:
                $reconhecimento_text = $reconhecimento;
                break;
        }
    }
    
    $turno_text = '';
    if ($turno) {
        switch ($turno) {
            case 'matutino':
                $turno_text = __('Matutino (6h às 12h)', 'cetesi');
                break;
            case 'vespertino':
                $turno_text = __('Vespertino (13h às 18h)', 'cetesi');
                break;
            case 'noturno':
                $turno_text = __('Noturno (19h às 22h)', 'cetesi');
                break;
            case 'integral':
                $turno_text = __('Integral (manhã e tarde)', 'cetesi');
                break;
            case 'flexivel':
                $turno_text = __('Flexível (horários variados)', 'cetesi');
                break;
            default:
                $turno_text = $turno;
                break;
        }
    }
    
    $modalidade_text = '';
    if ($modalidade) {
        switch ($modalidade) {
            case 'presencial':
                $modalidade_text = __('Presencial', 'cetesi');
                break;
            case 'online':
                $modalidade_text = __('100% Online', 'cetesi');
                break;
            case 'hibrido':
                $modalidade_text = __('Híbrido', 'cetesi');
                break;
            default:
                $modalidade_text = $modalidade;
                break;
        }
    }
    
    ob_start();
    ?>
    <div class="curso-card <?php echo esc_attr($categoria_class); ?> fade-in-up">
        <div class="curso-image">
            <?php if (has_post_thumbnail($curso_id)) : ?>
                <?php echo get_the_post_thumbnail($curso_id, 'medium'); ?>
            <?php else : ?>
                <i class="<?php echo esc_attr($icon); ?>"></i>
            <?php endif; ?>
        </div>
        <div class="curso-content">
            <div class="curso-header">
                <h3><?php echo get_the_title($curso_id); ?></h3>
                <div class="curso-info-badges">
                    <?php if ($duracao) : ?>
                    <span class="info-badge duracao">
                        <i class="fas fa-calendar-alt"></i>
                        <?php echo esc_html($duracao); ?>
                    </span>
                    <?php endif; ?>
                    <?php if ($carga_horaria) : ?>
                    <span class="info-badge carga-horaria">
                        <i class="fas fa-clock"></i>
                        <?php echo esc_html($carga_horaria); ?>
                    </span>
                    <?php endif; ?>
                    <?php if ($modalidade_text) : ?>
                    <span class="info-badge modalidade">
                        <i class="fas fa-<?php echo $modalidade === 'online' ? 'laptop' : 'building'; ?>"></i>
                        <?php echo esc_html($modalidade_text); ?>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
            
            <?php if (get_the_excerpt($curso_id)) : ?>
            <div class="curso-descricao">
                <?php echo get_the_excerpt($curso_id); ?>
            </div>
            <?php endif; ?>
            
            <a href="<?php echo $link_inscricao ? esc_url($link_inscricao) : get_permalink($curso_id); ?>" class="curso-btn <?php echo esc_attr($categoria_class); ?>">
                <i class="fas fa-arrow-right"></i>
                <span><?php _e('Saiba Mais', 'cetesi'); ?></span>
            </a>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function cetesi_scripts() {
    wp_enqueue_style('cetesi-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap', array(), CETESI_VERSION);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    wp_enqueue_style('cetesi-style', get_stylesheet_uri(), array('cetesi-fonts', 'font-awesome'), CETESI_VERSION);
    wp_enqueue_script('cetesi-main', CETESI_THEME_URL . '/assets/js/main.js', array('jquery'), CETESI_VERSION, true);
    wp_enqueue_script('cetesi-contact-form', CETESI_THEME_URL . '/assets/js/contact-form.js', array('jquery'), CETESI_VERSION, true);
    wp_localize_script('cetesi-contact-form', 'cetesi_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('cetesi_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'cetesi_scripts');

function cetesi_register_post_types() {
    register_post_type('curso', array(
        'labels' => array(
            'name'               => __('Cursos', 'cetesi'),
            'singular_name'      => __('Curso', 'cetesi'),
            'add_new'            => __('Adicionar Novo', 'cetesi'),
            'add_new_item'       => __('Adicionar Novo Curso', 'cetesi'),
            'edit_item'          => __('Editar Curso', 'cetesi'),
            'new_item'           => __('Novo Curso', 'cetesi'),
            'view_item'          => __('Ver Curso', 'cetesi'),
            'search_items'       => __('Buscar Cursos', 'cetesi'),
            'not_found'          => __('Nenhum curso encontrado', 'cetesi'),
            'not_found_in_trash' => __('Nenhum curso na lixeira', 'cetesi'),
        ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => false,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-welcome-learn-more',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => false,
        'rewrite'             => array('slug' => 'cursos'),
        'show_in_rest'        => true,
    ));
    
    register_post_type('depoimento', array(
        'labels' => array(
            'name'               => __('Depoimentos', 'cetesi'),
            'singular_name'      => __('Depoimento', 'cetesi'),
            'add_new'            => __('Adicionar Novo', 'cetesi'),
            'add_new_item'       => __('Adicionar Novo Depoimento', 'cetesi'),
            'edit_item'          => __('Editar Depoimento', 'cetesi'),
            'new_item'           => __('Novo Depoimento', 'cetesi'),
            'view_item'          => __('Ver Depoimento', 'cetesi'),
            'search_items'       => __('Buscar Depoimentos', 'cetesi'),
            'not_found'          => __('Nenhum depoimento encontrado', 'cetesi'),
            'not_found_in_trash' => __('Nenhum depoimento na lixeira', 'cetesi'),
        ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-format-quote',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail'),
        'has_archive'         => false,
        'rewrite'             => array('slug' => 'depoimentos'),
        'show_in_rest'        => true,
    ));
    
    register_post_type('membro_equipe', array(
        'labels' => array(
            'name'               => __('Equipe', 'cetesi'),
            'singular_name'      => __('Membro da Equipe', 'cetesi'),
            'add_new'            => __('Adicionar Novo', 'cetesi'),
            'add_new_item'       => __('Adicionar Novo Membro', 'cetesi'),
            'edit_item'          => __('Editar Membro', 'cetesi'),
            'new_item'           => __('Novo Membro', 'cetesi'),
            'view_item'          => __('Ver Membro', 'cetesi'),
            'search_items'       => __('Buscar Membros', 'cetesi'),
            'not_found'          => __('Nenhum membro encontrado', 'cetesi'),
            'not_found_in_trash' => __('Nenhum membro na lixeira', 'cetesi'),
        ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => false,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-groups',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'has_archive'         => false,
        'rewrite'             => array('slug' => 'equipe'),
        'show_in_rest'        => true,
    ));
}
add_action('init', 'cetesi_register_post_types');

/**
 * Registrar taxonomias personalizadas
 */
function cetesi_register_taxonomies() {
    // Taxonomia: Categoria de Curso
    register_taxonomy('categoria_curso', 'curso', array(
        'labels' => array(
            'name'              => __('Categorias de Curso', 'cetesi'),
            'singular_name'     => __('Categoria de Curso', 'cetesi'),
            'search_items'      => __('Buscar Categorias', 'cetesi'),
            'all_items'         => __('Todas as Categorias', 'cetesi'),
            'parent_item'       => __('Categoria Pai', 'cetesi'),
            'parent_item_colon' => __('Categoria Pai:', 'cetesi'),
            'edit_item'         => __('Editar Categoria', 'cetesi'),
            'update_item'       => __('Atualizar Categoria', 'cetesi'),
            'add_new_item'      => __('Adicionar Nova Categoria', 'cetesi'),
            'new_item_name'     => __('Nome da Nova Categoria', 'cetesi'),
            'menu_name'         => __('Categorias', 'cetesi'),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => false,
        'rewrite'           => array('slug' => 'categoria-curso'),
        'show_in_rest'      => true,
    ));
    
    // Taxonomia: Categoria da Equipe
    register_taxonomy('categoria_equipe', 'membro_equipe', array(
        'labels' => array(
            'name'              => __('Categorias da Equipe', 'cetesi'),
            'singular_name'     => __('Categoria da Equipe', 'cetesi'),
            'search_items'      => __('Buscar Categorias', 'cetesi'),
            'all_items'         => __('Todas as Categorias', 'cetesi'),
            'parent_item'       => __('Categoria Pai', 'cetesi'),
            'parent_item_colon' => __('Categoria Pai:', 'cetesi'),
            'edit_item'         => __('Editar Categoria', 'cetesi'),
            'update_item'       => __('Atualizar Categoria', 'cetesi'),
            'add_new_item'      => __('Adicionar Nova Categoria', 'cetesi'),
            'new_item_name'     => __('Nome da Nova Categoria', 'cetesi'),
            'menu_name'         => __('Categorias', 'cetesi'),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => false,
        'rewrite'           => array('slug' => 'categoria-equipe'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'cetesi_register_taxonomies');

/**
 * Adicionar campos personalizados para cursos
 */
function cetesi_add_curso_meta_boxes() {
    add_meta_box(
        'curso_basic_info',
        __('📋 Informações Básicas', 'cetesi'),
        'cetesi_curso_basic_info_callback',
        'curso',
        'normal',
        'high'
    );
    
    add_meta_box(
        'curso_modalidade',
        __('🎯 Modalidade e Tipo', 'cetesi'),
        'cetesi_curso_modalidade_callback',
        'curso',
        'normal',
        'high'
    );
    
    add_meta_box(
        'curso_details',
        __('⏱️ Detalhes do Curso', 'cetesi'),
        'cetesi_curso_details_callback',
        'curso',
        'normal',
        'high'
    );
    
    add_meta_box(
        'curso_pricing',
        __('💰 Preços e Pagamento', 'cetesi'),
        'cetesi_curso_pricing_callback',
        'curso',
        'normal',
        'high'
    );
    
    add_meta_box(
        'curso_requirements',
        __('📝 Pré-requisitos e Documentos', 'cetesi'),
        'cetesi_curso_requirements_callback',
        'curso',
        'normal',
        'high'
    );
    
    add_meta_box(
        'curso_curriculum',
        __('📚 Conteúdo do Curso', 'cetesi'),
        'cetesi_curso_curriculum_callback',
        'curso',
        'normal',
        'high'
    );
    
    add_meta_box(
        'curso_career',
        __('💼 Mercado de Trabalho', 'cetesi'),
        'cetesi_curso_career_callback',
        'curso',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'cetesi_add_curso_meta_boxes');

/**
 * Adicionar campos personalizados para membros da equipe
 */
function cetesi_add_equipe_meta_boxes() {
    add_meta_box(
        'membro_equipe_info',
        __('👤 Informações do Membro', 'cetesi'),
        'cetesi_membro_equipe_info_callback',
        'membro_equipe',
        'normal',
        'high'
    );
    
    add_meta_box(
        'membro_equipe_social',
        __('🌐 Redes Sociais', 'cetesi'),
        'cetesi_membro_equipe_social_callback',
        'membro_equipe',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'cetesi_add_equipe_meta_boxes');

/**
 * Callback para informações básicas do curso
 */
function cetesi_curso_basic_info_callback($post) {
    wp_nonce_field('cetesi_curso_meta', 'cetesi_curso_meta_nonce');
    
    $codigo_curso = get_post_meta($post->ID, '_curso_codigo', true);
    $nivel_ensino = get_post_meta($post->ID, '_curso_nivel_ensino', true);
    $area_conhecimento = get_post_meta($post->ID, '_curso_area_conhecimento', true);
    $coordenador = get_post_meta($post->ID, '_curso_coordenador', true);
    $email_coordenador = get_post_meta($post->ID, '_curso_email_coordenador', true);
    ?>
    <div class="cetesi-metabox-container">
        <div class="cetesi-section-header">
            <h4><span class="dashicons dashicons-info"></span> Identificação do Curso</h4>
            <p>Configure as informações básicas de identificação e classificação do curso.</p>
        </div>
        
        <div class="cetesi-field-section">
            <div class="cetesi-field-row">
                <div class="cetesi-field-group">
                    <label for="curso_codigo" class="cetesi-field-label required">
                        <span class="dashicons dashicons-tag"></span>
                        Código do Curso
                    </label>
                    <input type="text" id="curso_codigo" name="curso_codigo" value="<?php echo esc_attr($codigo_curso); ?>" class="cetesi-field-input" placeholder="Ex: TEC-ENF-2024" />
                    <p class="cetesi-field-description">Código único para identificação interna do curso</p>
                </div>
                
                <div class="cetesi-field-group">
                    <label for="curso_nivel_ensino" class="cetesi-field-label required">
                        <span class="dashicons dashicons-awards"></span>
                        Nível de Ensino
                    </label>
                    <select id="curso_nivel_ensino" name="curso_nivel_ensino" class="cetesi-field-select">
                        <option value="">Selecione o nível</option>
                        <option value="tecnico" <?php selected($nivel_ensino, 'tecnico'); ?>>Técnico</option>
                        <option value="livre" <?php selected($nivel_ensino, 'livre'); ?>>Curso Livre</option>
                        <option value="qualificacao" <?php selected($nivel_ensino, 'qualificacao'); ?>>Qualificação Profissional</option>
                        <option value="especializacao" <?php selected($nivel_ensino, 'especializacao'); ?>>Especialização</option>
                    </select>
                    <p class="cetesi-field-description">Define o nível educacional do curso</p>
                </div>
            </div>
            
            <div class="cetesi-field-row">
                <div class="cetesi-field-group">
                    <label for="curso_area_conhecimento" class="cetesi-field-label required">
                        <span class="dashicons dashicons-category"></span>
                        Área de Conhecimento
                    </label>
                    <select id="curso_area_conhecimento" name="curso_area_conhecimento" class="cetesi-field-select">
                        <option value="">Selecione a área</option>
                        <option value="saude" <?php selected($area_conhecimento, 'saude'); ?>>Saúde</option>
                        <option value="tecnologia" <?php selected($area_conhecimento, 'tecnologia'); ?>>Tecnologia</option>
                        <option value="gestao" <?php selected($area_conhecimento, 'gestao'); ?>>Gestão</option>
                        <option value="educacao" <?php selected($area_conhecimento, 'educacao'); ?>>Educação</option>
                        <option value="seguranca" <?php selected($area_conhecimento, 'seguranca'); ?>>Segurança</option>
                    </select>
                    <p class="cetesi-field-description">Área principal de conhecimento do curso</p>
                </div>
            </div>
        </div>
        
    </div>
    <?php
}

/**
 * Callback para duração e carga horária
 */
function cetesi_curso_details_callback($post) {
    $duracao = get_post_meta($post->ID, '_curso_duracao', true);
    $carga_horaria = get_post_meta($post->ID, '_curso_carga_horaria', true);
    $estagio = get_post_meta($post->ID, '_curso_estagio', true);
    $aulas_semanais = get_post_meta($post->ID, '_curso_aulas_semanais', true);
    $turno = get_post_meta($post->ID, '_curso_turno', true);
    ?>
    <div class="cetesi-metabox-container">
        <div class="cetesi-section-header">
            <h4><span class="dashicons dashicons-calendar-alt"></span> Duração e Período</h4>
            <p>Configure o tempo total de duração e período de realização do curso.</p>
        </div>
        
        <div class="cetesi-field-section">
            <div class="cetesi-field-row">
                <div class="cetesi-field-group">
                    <label for="curso_duracao" class="cetesi-field-label required">
                        <span class="dashicons dashicons-calendar-alt"></span>
                        Duração do Curso
                    </label>
                    <input type="text" id="curso_duracao" name="curso_duracao" value="<?php echo esc_attr($duracao); ?>" class="cetesi-field-input" placeholder="Ex: 18 meses" />
                    <p class="cetesi-field-description">Período total de duração do curso (ex: 18 meses, 2 anos)</p>
                </div>
                
                <div class="cetesi-field-group">
                    <label for="curso_turno" class="cetesi-field-label">
                        <span class="dashicons dashicons-schedule"></span>
                        Turno de Funcionamento
                    </label>
                    <select id="curso_turno" name="curso_turno" class="cetesi-field-select">
                        <option value="">Selecione o turno</option>
                        <option value="matutino" <?php selected($turno, 'matutino'); ?>>Matutino (6h às 12h)</option>
                        <option value="vespertino" <?php selected($turno, 'vespertino'); ?>>Vespertino (13h às 18h)</option>
                        <option value="noturno" <?php selected($turno, 'noturno'); ?>>Noturno (19h às 22h)</option>
                        <option value="integral" <?php selected($turno, 'integral'); ?>>Integral (manhã e tarde)</option>
                        <option value="flexivel" <?php selected($turno, 'flexivel'); ?>>Flexível (horários variados)</option>
                    </select>
                    <p class="cetesi-field-description">Horário de funcionamento das aulas</p>
                </div>
            </div>
        </div>
        
        <div class="cetesi-section-divider"></div>
        
        <div class="cetesi-section-header">
            <h4><span class="dashicons dashicons-clock"></span> Carga Horária</h4>
            <p>Defina a distribuição de horas entre teoria, prática e estágio.</p>
        </div>
        
        <div class="cetesi-field-section">
            <div class="cetesi-field-row">
                <div class="cetesi-field-group">
                    <label for="curso_carga_horaria" class="cetesi-field-label required">
                        <span class="dashicons dashicons-clock"></span>
                        Carga Horária Total
                    </label>
                    <input type="text" id="curso_carga_horaria" name="curso_carga_horaria" value="<?php echo esc_attr($carga_horaria); ?>" class="cetesi-field-input" placeholder="Ex: 1.200 horas" />
                    <p class="cetesi-field-description">Total de horas do curso (teoria + prática + estágio)</p>
                </div>
                
                <div class="cetesi-field-group">
                    <label for="curso_estagio" class="cetesi-field-label">
                        <span class="dashicons dashicons-businessman"></span>
                        Carga Horária de Estágio
                    </label>
                    <input type="text" id="curso_estagio" name="curso_estagio" value="<?php echo esc_attr($estagio); ?>" class="cetesi-field-input" placeholder="Ex: 300 horas" />
                    <p class="cetesi-field-description">Horas destinadas ao estágio supervisionado</p>
                </div>
            </div>
            
            <div class="cetesi-field-row">
                <div class="cetesi-field-group">
                    <label for="curso_aulas_semanais" class="cetesi-field-label">
                        <span class="dashicons dashicons-calendar"></span>
                        Aulas por Semana
                    </label>
                    <input type="text" id="curso_aulas_semanais" name="curso_aulas_semanais" value="<?php echo esc_attr($aulas_semanais); ?>" class="cetesi-field-input" placeholder="Ex: 3 aulas" />
                    <p class="cetesi-field-description">Número de aulas semanais (ex: 3 aulas, 2x por semana)</p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Callback para modalidade e tipo
 */
function cetesi_curso_modalidade_callback($post) {
    $modalidade = get_post_meta($post->ID, '_curso_modalidade', true);
    $tipo_curso = get_post_meta($post->ID, '_curso_tipo', true);
    $reconhecimento = get_post_meta($post->ID, '_curso_reconhecimento', true);
    $certificacao = get_post_meta($post->ID, '_curso_certificacao', true);
    ?>
    <div class="cetesi-metabox-container">
        <div class="cetesi-important-notice">
            <div class="cetesi-notice-icon">
                <span class="dashicons dashicons-warning"></span>
            </div>
            <div class="cetesi-notice-content">
                <h4>⚠️ Importante</h4>
                <p>Estes campos determinam em qual seção o curso aparecerá na página inicial.</p>
            </div>
        </div>
        
        <div class="cetesi-section-header">
            <h4><span class="dashicons dashicons-laptop"></span> Modalidade de Ensino</h4>
            <p>Defina como o curso será ministrado e onde aparecerá na homepage.</p>
        </div>
        
        <div class="cetesi-field-section">
            <div class="cetesi-field-row">
                <div class="cetesi-field-group">
                    <label for="curso_modalidade" class="cetesi-field-label required">
                        <span class="dashicons dashicons-laptop"></span>
                        Modalidade de Ensino
                    </label>
                    <select id="curso_modalidade" name="curso_modalidade" class="cetesi-field-select">
                        <option value="">Selecione a modalidade</option>
                        <option value="presencial" <?php selected($modalidade, 'presencial'); ?>>Presencial</option>
                        <option value="online" <?php selected($modalidade, 'online'); ?>>100% Online</option>
                        <option value="hibrido" <?php selected($modalidade, 'hibrido'); ?>>Híbrido (Presencial + Online)</option>
                    </select>
                    <p class="cetesi-field-description">Modalidade de ensino do curso</p>
                </div>
                
                <div class="cetesi-field-group">
                    <label for="curso_tipo" class="cetesi-field-label required">
                        <span class="dashicons dashicons-admin-tools"></span>
                        Tipo de Curso
                    </label>
                    <select id="curso_tipo" name="curso_tipo" class="cetesi-field-select">
                        <option value="">Selecione o tipo</option>
                        <option value="tecnico" <?php selected($tipo_curso, 'tecnico'); ?>>Técnico</option>
                        <option value="livre" <?php selected($tipo_curso, 'livre'); ?>>Curso Livre</option>
                        <option value="qualificacao" <?php selected($tipo_curso, 'qualificacao'); ?>>Qualificação Profissional</option>
                        <option value="capacitacao" <?php selected($tipo_curso, 'capacitacao'); ?>>Capacitação</option>
                    </select>
                    <p class="cetesi-field-description">Tipo de curso oferecido</p>
                </div>
            </div>
        </div>
        
        <div class="cetesi-section-divider"></div>
        
        <div class="cetesi-section-header">
            <h4><span class="dashicons dashicons-awards"></span> Reconhecimento e Certificação</h4>
            <p>Configure o reconhecimento oficial e tipo de certificação do curso.</p>
        </div>
        
        <div class="cetesi-field-section">
            <div class="cetesi-field-row">
                <div class="cetesi-field-group">
                    <label for="curso_reconhecimento" class="cetesi-field-label">
                        <span class="dashicons dashicons-yes-alt"></span>
                        Reconhecimento Oficial
                    </label>
                    <select id="curso_reconhecimento" name="curso_reconhecimento" class="cetesi-field-select">
                        <option value="">Selecione o reconhecimento</option>
                        <option value="mec" <?php selected($reconhecimento, 'mec'); ?>>Reconhecido pelo MEC</option>
                        <option value="conselho" <?php selected($reconhecimento, 'conselho'); ?>>Reconhecido pelo Conselho</option>
                        <option value="ministerio" <?php selected($reconhecimento, 'ministerio'); ?>>Reconhecido pelo Ministério</option>
                        <option value="certificacao" <?php selected($reconhecimento, 'certificacao'); ?>>Certificação Profissional</option>
                    </select>
                    <p class="cetesi-field-description">Órgão que reconhece oficialmente o curso</p>
                </div>
                
                <div class="cetesi-field-group">
                    <label for="curso_certificacao" class="cetesi-field-label">
                        <span class="dashicons dashicons-awards"></span>
                        Tipo de Certificação
                        <button type="button" class="button button-secondary cetesi-generate-btn" data-field="certification" data-textarea="_curso_certificacao" style="margin-left: 10px; font-size: 12px; padding: 4px 8px;">Gerar</button>
                    </label>
                    <textarea id="_curso_certificacao" name="curso_certificacao" class="cetesi-field-textarea" rows="3" placeholder="Ex: Certificado de Técnico em Enfermagem"><?php echo esc_textarea($certificacao); ?></textarea>
                    <p class="cetesi-field-description">Descrição completa do certificado emitido</p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Callback para preços e inscrições
 */
function cetesi_curso_pricing_callback($post) {
    $preco = get_post_meta($post->ID, '_curso_preco', true);
    $preco_promocional = get_post_meta($post->ID, '_curso_preco_promocional', true);
    $desconto = get_post_meta($post->ID, '_curso_desconto', true);
    $link_inscricao = get_post_meta($post->ID, '_curso_link_inscricao', true);
    $forma_pagamento = get_post_meta($post->ID, '_curso_forma_pagamento', true);
    $parcelamento = get_post_meta($post->ID, '_curso_parcelamento', true);
    ?>
    <div class="cetesi-metabox-container">
        <div class="cetesi-field-row">
            <div class="cetesi-field-group">
                <label for="curso_preco" class="cetesi-field-label">
                    <span class="dashicons dashicons-money-alt"></span>
                    Preço Normal
                </label>
                <input type="text" id="curso_preco" name="curso_preco" value="<?php echo esc_attr($preco); ?>" class="cetesi-field-input" placeholder="Ex: R$ 1.200,00" />
            </div>
            
            <div class="cetesi-field-group">
                <label for="curso_preco_promocional" class="cetesi-field-label">
                    <span class="dashicons dashicons-tag"></span>
                    Preço Promocional
                </label>
                <input type="text" id="curso_preco_promocional" name="curso_preco_promocional" value="<?php echo esc_attr($preco_promocional); ?>" class="cetesi-field-input" placeholder="Ex: R$ 999,00" />
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group">
                <label for="curso_desconto" class="cetesi-field-label">
                    <span class="dashicons dashicons-chart-line"></span>
                    Desconto Disponível
                </label>
                <input type="text" id="curso_desconto" name="curso_desconto" value="<?php echo esc_attr($desconto); ?>" class="cetesi-field-input" placeholder="Ex: 20% de desconto" />
            </div>
            
            <div class="cetesi-field-group">
                <label for="curso_parcelamento" class="cetesi-field-label">
                    <span class="dashicons dashicons-calendar-alt"></span>
                    Opções de Parcelamento
                    <button type="button" class="button button-secondary cetesi-generate-btn" data-field="installments" data-textarea="_curso_parcelamento" style="margin-left: 10px; font-size: 12px; padding: 4px 8px;">Gerar</button>
                </label>
                <textarea id="_curso_parcelamento" name="curso_parcelamento" class="cetesi-field-textarea" rows="3" placeholder="Ex: Até 12x sem juros"><?php echo esc_textarea($parcelamento); ?></textarea>
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group">
                <label for="curso_forma_pagamento" class="cetesi-field-label">
                    <span class="dashicons dashicons-credit-card"></span>
                    Formas de Pagamento
                    <button type="button" class="button button-secondary cetesi-generate-btn" data-field="payment" data-textarea="_curso_forma_pagamento" style="margin-left: 10px; font-size: 12px; padding: 4px 8px;">Gerar</button>
                </label>
                <textarea id="_curso_forma_pagamento" name="curso_forma_pagamento" class="cetesi-field-textarea" rows="3" placeholder="Ex: Cartão, PIX, Boleto"><?php echo esc_textarea($forma_pagamento); ?></textarea>
            </div>
            
            <div class="cetesi-field-group">
                <label for="curso_link_inscricao" class="cetesi-field-label">
                    <span class="dashicons dashicons-admin-links"></span>
                    Link de Inscrição
                </label>
                <input type="url" id="curso_link_inscricao" name="curso_link_inscricao" value="<?php echo esc_attr($link_inscricao); ?>" class="cetesi-field-input" placeholder="https://..." />
            </div>
        </div>
    </div>
    <?php
}

/**
 * Callback para pré-requisitos e documentos
 */
function cetesi_curso_requirements_callback($post) {
    $prerequisitos = get_post_meta($post->ID, '_curso_prerequisitos', true);
    $documentos = get_post_meta($post->ID, '_curso_documentos', true);
    $idade_minima = get_post_meta($post->ID, '_curso_idade_minima', true);
    $escolaridade = get_post_meta($post->ID, '_curso_escolaridade', true);
    ?>
    <div class="cetesi-metabox-container">
        <div class="cetesi-field-row">
            <div class="cetesi-field-group">
                <label for="curso_escolaridade" class="cetesi-field-label">
                    <span class="dashicons dashicons-book"></span>
                    Escolaridade Mínima
                </label>
                <select id="curso_escolaridade" name="curso_escolaridade" class="cetesi-field-select">
                    <option value="">Selecione a escolaridade</option>
                    <option value="fundamental" <?php selected($escolaridade, 'fundamental'); ?>>Ensino Fundamental</option>
                    <option value="medio" <?php selected($escolaridade, 'medio'); ?>>Ensino Médio</option>
                    <option value="superior" <?php selected($escolaridade, 'superior'); ?>>Ensino Superior</option>
                    <option value="qualquer" <?php selected($escolaridade, 'qualquer'); ?>>Qualquer Escolaridade</option>
                </select>
            </div>
            
            <div class="cetesi-field-group">
                <label for="curso_idade_minima" class="cetesi-field-label">
                    <span class="dashicons dashicons-calendar-alt"></span>
                    Idade Mínima
                </label>
                <input type="number" id="curso_idade_minima" name="curso_idade_minima" value="<?php echo esc_attr($idade_minima); ?>" class="cetesi-field-input" placeholder="Ex: 18" min="0" max="100" />
                <p class="cetesi-field-description">Idade mínima em anos</p>
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group cetesi-field-full">
                <label for="curso_prerequisitos" class="cetesi-field-label">
                    <span class="dashicons dashicons-warning"></span>
                    Pré-requisitos
                    <button type="button" class="button button-secondary cetesi-generate-btn" data-field="prerequisites" data-textarea="_curso_prerequisitos" style="margin-left: 10px; font-size: 12px; padding: 4px 8px;">Gerar</button>
                </label>
                <textarea id="_curso_prerequisitos" name="curso_prerequisitos" class="cetesi-field-textarea" rows="4" placeholder="Liste os pré-requisitos necessários para o curso..."><?php echo esc_textarea($prerequisitos); ?></textarea>
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group cetesi-field-full">
                <label for="curso_documentos" class="cetesi-field-label">
                    <span class="dashicons dashicons-media-document"></span>
                    Documentos Necessários
                    <button type="button" class="button button-secondary cetesi-generate-btn" data-field="documents" data-textarea="_curso_documentos" style="margin-left: 10px; font-size: 12px; padding: 4px 8px;">Gerar</button>
                </label>
                <textarea id="_curso_documentos" name="curso_documentos" class="cetesi-field-textarea" rows="4" placeholder="Liste os documentos necessários para matrícula..."><?php echo esc_textarea($documentos); ?></textarea>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Callback para grade curricular
 */
function cetesi_curso_curriculum_callback($post) {
    $disciplinas = get_post_meta($post->ID, '_curso_disciplinas', true);
    $objetivos = get_post_meta($post->ID, '_curso_objetivos', true);
    $metodologia = get_post_meta($post->ID, '_curso_metodologia', true);
    ?>
    <div class="cetesi-metabox-container">
        <div class="cetesi-field-row">
            <div class="cetesi-field-group cetesi-field-full">
                <label for="curso_objetivos" class="cetesi-field-label">
                    <span class="dashicons dashicons-target"></span>
                    Objetivos do Curso
                    <button type="button" class="button button-secondary cetesi-generate-btn" data-field="objectives" data-textarea="_curso_objetivos" style="margin-left: 10px; font-size: 12px; padding: 4px 8px;">Gerar</button>
                </label>
                <textarea id="_curso_objetivos" name="curso_objetivos" class="cetesi-field-textarea" rows="4" placeholder="Descreva os objetivos e competências que o aluno desenvolverá..."><?php echo esc_textarea($objetivos); ?></textarea>
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group cetesi-field-full">
                <label for="curso_disciplinas" class="cetesi-field-label">
                    <span class="dashicons dashicons-list-view"></span>
                    Disciplinas/Matérias
                    <button type="button" class="button button-secondary cetesi-generate-btn" data-field="curriculum" data-textarea="_curso_disciplinas" style="margin-left: 10px; font-size: 12px; padding: 4px 8px;">Gerar</button>
                </label>
                <textarea id="_curso_disciplinas" name="curso_disciplinas" class="cetesi-field-textarea" rows="6" placeholder="Liste as disciplinas que compõem o curso..."><?php echo esc_textarea($disciplinas); ?></textarea>
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group cetesi-field-full">
                <label for="curso_metodologia" class="cetesi-field-label">
                    <span class="dashicons dashicons-admin-tools"></span>
                    Metodologia de Ensino
                    <button type="button" class="button button-secondary cetesi-generate-btn" data-field="methodology" data-textarea="_curso_metodologia" style="margin-left: 10px; font-size: 12px; padding: 4px 8px;">Gerar</button>
                </label>
                <textarea id="_curso_metodologia" name="curso_metodologia" class="cetesi-field-textarea" rows="4" placeholder="Descreva a metodologia utilizada no curso..."><?php echo esc_textarea($metodologia); ?></textarea>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Callback para mercado de trabalho
 */
function cetesi_curso_career_callback($post) {
    $mercado_trabalho = get_post_meta($post->ID, '_curso_mercado_trabalho', true);
    $areas_atuacao = get_post_meta($post->ID, '_curso_areas_atuacao', true);
    $salario_medio = get_post_meta($post->ID, '_curso_salario_medio', true);
    $oportunidades = get_post_meta($post->ID, '_curso_oportunidades', true);
    ?>
    <div class="cetesi-metabox-container">
        <div class="cetesi-field-row">
            <div class="cetesi-field-group">
                <label for="curso_salario_medio" class="cetesi-field-label">
                    <span class="dashicons dashicons-money"></span>
                    Salário Médio
                </label>
                <input type="text" id="curso_salario_medio" name="curso_salario_medio" value="<?php echo esc_attr($salario_medio); ?>" class="cetesi-field-input" placeholder="Ex: R$ 2.500,00" />
            </div>
            
            <div class="cetesi-field-group">
                <label for="curso_oportunidades" class="cetesi-field-label">
                    <span class="dashicons dashicons-chart-bar"></span>
                    Oportunidades de Emprego
                </label>
                <input type="text" id="curso_oportunidades" name="curso_oportunidades" value="<?php echo esc_attr($oportunidades); ?>" class="cetesi-field-input" placeholder="Ex: Alta demanda no mercado" />
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group cetesi-field-full">
                <label for="curso_areas_atuacao" class="cetesi-field-label">
                    <span class="dashicons dashicons-building"></span>
                    Áreas de Atuação
                    <button type="button" class="button button-secondary cetesi-generate-btn" data-field="areas" data-textarea="_curso_areas_atuacao" style="margin-left: 10px; font-size: 12px; padding: 4px 8px;">Gerar</button>
                </label>
                <textarea id="_curso_areas_atuacao" name="curso_areas_atuacao" class="cetesi-field-textarea" rows="3" placeholder="Liste as principais áreas onde o profissional pode atuar..."><?php echo esc_textarea($areas_atuacao); ?></textarea>
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group cetesi-field-full">
                <label for="curso_mercado_trabalho" class="cetesi-field-label">
                    <span class="dashicons dashicons-businessman"></span>
                    Perspectivas do Mercado de Trabalho
                    <button type="button" class="button button-secondary cetesi-generate-btn" data-field="market" data-textarea="_curso_mercado_trabalho" style="margin-left: 10px; font-size: 12px; padding: 4px 8px;">Gerar</button>
                </label>
                <textarea id="_curso_mercado_trabalho" name="curso_mercado_trabalho" class="cetesi-field-textarea" rows="4" placeholder="Descreva as perspectivas e tendências do mercado de trabalho para esta área..."><?php echo esc_textarea($mercado_trabalho); ?></textarea>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Salvar campos personalizados do curso
 */
function cetesi_save_curso_meta($post_id) {
    // Verificar nonce
    if (!isset($_POST['cetesi_curso_meta_nonce']) || !wp_verify_nonce($_POST['cetesi_curso_meta_nonce'], 'cetesi_curso_meta')) {
        cetesi_log_security_event('CURSO_META_ERROR', 'Invalid nonce', 'WARNING');
        return;
    }
    
    // Verificar autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Verificar capabilities específicas
    if (!cetesi_check_specific_capability('edit_curso', $post_id)) {
        cetesi_log_security_event('CURSO_META_ERROR', 'Insufficient permissions', 'WARNING');
        return;
    }
    
    // Verificar rate limiting para edições
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'unknown';
    if (!cetesi_check_rate_limit('curso_edit', $ip, 10, 300)) { // 10 edições em 5 minutos
        cetesi_log_security_event('CURSO_META_RATE_LIMIT', 'Rate limit exceeded', 'WARNING');
        return;
    }
    
    // Campos básicos
    $basic_fields = array(
        'curso_codigo', 'curso_nivel_ensino', 'curso_area_conhecimento', 
        'curso_coordenador', 'curso_email_coordenador'
    );
    
    // Campos de duração e carga horária
    $duration_fields = array(
        'curso_duracao', 'curso_carga_horaria', 'curso_estagio', 
        'curso_aulas_semanais', 'curso_turno'
    );
    
    // Campos de modalidade e tipo
    $modality_fields = array(
        'curso_modalidade', 'curso_tipo', 'curso_reconhecimento', 'curso_certificacao'
    );
    
    // Campos de preços
    $pricing_fields = array(
        'curso_preco', 'curso_preco_promocional', 'curso_desconto', 
        'curso_link_inscricao', 'curso_forma_pagamento', 'curso_parcelamento'
    );
    
    // Campos de pré-requisitos
    $requirements_fields = array(
        'curso_prerequisitos', 'curso_documentos', 'curso_idade_minima', 'curso_escolaridade'
    );
    
    // Campos de grade curricular
    $curriculum_fields = array(
        'curso_disciplinas', 'curso_objetivos', 'curso_metodologia'
    );
    
    // Campos de mercado de trabalho
    $career_fields = array(
        'curso_mercado_trabalho', 'curso_areas_atuacao', 'curso_salario_medio', 'curso_oportunidades'
    );
    
    $all_fields = array_merge(
        $basic_fields, $duration_fields, $modality_fields, 
        $pricing_fields, $requirements_fields, $curriculum_fields, $career_fields
    );
    
    foreach ($all_fields as $field) {
        if (isset($_POST[$field])) {
            $field_value = $_POST[$field];
            
            // Validar campo específico
            $max_length = in_array($field, array('curso_prerequisitos', 'curso_documentos', 'curso_disciplinas', 'curso_objetivos', 'curso_metodologia', 'curso_mercado_trabalho', 'curso_areas_atuacao')) ? 2000 : 255;
            
            $validation = cetesi_validate_input($field_value, 'text', $max_length, false);
            
            if ($validation['success']) {
                if (in_array($field, array('curso_prerequisitos', 'curso_documentos', 'curso_disciplinas', 'curso_objetivos', 'curso_metodologia', 'curso_mercado_trabalho', 'curso_areas_atuacao'))) {
                    // Campos de texto longo
                    update_post_meta($post_id, '_' . $field, sanitize_textarea_field($validation['data']));
                } else {
                    // Campos de texto simples
                    update_post_meta($post_id, '_' . $field, sanitize_text_field($validation['data']));
                }
                
                cetesi_log_security_event('CURSO_META_UPDATE', 'Field updated: ' . $field, 'INFO');
            } else {
                cetesi_log_security_event('CURSO_META_VALIDATION_ERROR', 'Invalid field ' . $field . ': ' . $validation['error'], 'WARNING');
            }
        }
    }
}
add_action('save_post', 'cetesi_save_curso_meta');

/**
 * Página de criação de curso acessível apenas via URL direta
 * Não registrada como item de menu para manter o menu limpo
 */

/**
 * Página de gerenciamento da equipe
 */
function cetesi_team_management_page() {
    // Processar ações de exclusão individual
    if (isset($_GET['action']) && isset($_GET['member_id'])) {
        cetesi_process_member_action();
    }
    
    // Processar exclusão em lote
    if (isset($_POST['bulk_action']) && $_POST['bulk_action'] === 'delete' && isset($_POST['member_ids'])) {
        cetesi_process_bulk_delete_members();
    }
    
    // Mostrar mensagem de sucesso se houver exclusão em lote
    $bulk_deleted = isset($_GET['bulk_deleted']) ? intval($_GET['bulk_deleted']) : 0;
    $deleted = isset($_GET['deleted']) ? intval($_GET['deleted']) : 0;
    $member_created = isset($_GET['member_created']) ? intval($_GET['member_created']) : 0;
    $member_updated = isset($_GET['member_updated']) ? intval($_GET['member_updated']) : 0;
    $member_name = isset($_GET['member_name']) ? urldecode($_GET['member_name']) : '';
    
    // Buscar estatísticas
    $total_membros = wp_count_posts('membro_equipe');
    $total_professores = wp_count_posts('professor');
    $membros_publicados = $total_membros->publish ?? 0;
    $professores_publicados = $total_professores->publish ?? 0;
    $total_equipe = $membros_publicados + $professores_publicados;
    
    // Buscar membros ordenados alfabeticamente
    $membros_recentes = get_posts(array(
        'post_type' => 'membro_equipe',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC'
    ));
    
    ?>
    <div class="wrap cetesi-team-management">
        <?php if ($bulk_deleted > 0) : ?>
            <div class="notice notice-success is-dismissible">
                <p><strong>Sucesso!</strong> <?php echo $bulk_deleted; ?> membro(s) excluído(s) com sucesso.</p>
            </div>
        <?php endif; ?>
        
        <?php if ($deleted > 0) : ?>
            <div class="notice notice-success is-dismissible">
                <p><strong>Sucesso!</strong> Membro excluído com sucesso.</p>
            </div>
        <?php endif; ?>
        
        <?php if ($member_created > 0) : ?>
            <div class="notice notice-success is-dismissible">
                <p><strong>Sucesso!</strong> Membro criado e adicionado à equipe com sucesso.</p>
            </div>
        <?php endif; ?>
        
        <?php if ($member_updated > 0 && $member_name) : ?>
            <div class="notice notice-success is-dismissible">
                <p><strong>Sucesso!</strong> O membro "<?php echo esc_html($member_name); ?>" foi atualizado com sucesso!</p>
            </div>
        <?php endif; ?>
        
        
        <!-- Barra de Ações -->
        <div class="cetesi-actions-bar">
            <a href="<?php echo admin_url('admin.php?page=cetesi-add-member'); ?>" class="action-header-btn novo-membro">
                <span class="dashicons dashicons-plus-alt"></span>
                <span class="btn-label">Novo Membro</span>
            </a>
            <a href="<?php echo admin_url('edit.php?post_type=membro_equipe'); ?>" class="action-header-btn tradicional">
                <span class="dashicons dashicons-list-view"></span>
                <span class="btn-label">Tradicional</span>
            </a>
            <div class="bulk-actions">
                <button type="button" id="select-all-members" class="action-header-btn bulk-select">
                    <span class="dashicons dashicons-yes-alt"></span>
                    <span class="btn-label">Marcar Todos</span>
                </button>
                <button type="button" id="bulk-delete-members" class="action-header-btn bulk-delete" style="display: none;">
                    <span class="dashicons dashicons-trash"></span>
                    <span class="btn-label">Excluir Selecionados</span>
                </button>
            </div>
            <div class="search-box">
                <input type="text" id="team-search" placeholder="Buscar membros..." />
                <span class="dashicons dashicons-search"></span>
            </div>
        </div>
        
        <!-- Formulário para exclusão em lote -->
        <form id="bulk-delete-form" method="post" action="" style="display: none;">
            <?php wp_nonce_field('bulk_delete_members', 'bulk_delete_nonce'); ?>
            <input type="hidden" name="bulk_action" value="delete">
            <input type="hidden" name="member_ids" id="selected-member-ids" value="">
        </form>
        
        <!-- Lista de Membros -->
        <div class="cetesi-members-list">
            <?php if (!empty($membros_recentes)) : ?>
                <?php foreach ($membros_recentes as $membro) : 
                    $cargo = get_post_meta($membro->ID, '_membro_cargo', true);
                    $email = get_post_meta($membro->ID, '_membro_email', true);
                    $telefone = get_post_meta($membro->ID, '_membro_telefone', true);
                    $status = $membro->post_status;
                ?>
                <div class="member-list-item" data-member-id="<?php echo $membro->ID; ?>">
                    <div class="member-checkbox">
                        <input type="checkbox" class="member-select" value="<?php echo $membro->ID; ?>">
                    </div>
                    <div class="member-info">
                        <h3 class="member-name"><?php echo esc_html($membro->post_title); ?></h3>
                        <div class="member-details">
                            <?php if ($cargo) : ?>
                                <span class="member-role"><?php echo esc_html($cargo); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="member-actions-container">
                        <div class="member-actions">
                            <a href="<?php echo admin_url('admin.php?page=editar-membro-personalizado&member_id=' . $membro->ID); ?>" class="action-btn edit-btn" title="Editar membro">
                                <span class="dashicons dashicons-edit"></span>
                            </a>
                            <a href="<?php echo get_permalink($membro->ID); ?>" class="action-btn view-btn" title="Ver no site" target="_blank">
                                <span class="dashicons dashicons-visibility"></span>
                            </a>
                            <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=cetesi-team-management&action=delete&member_id=' . $membro->ID), 'delete_member_' . $membro->ID); ?>" class="action-btn delete-btn" title="Excluir membro" onclick="return confirm('Tem certeza que deseja excluir este membro? Esta ação não pode ser desfeita.');">
                                <span class="dashicons dashicons-trash"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="no-members">
                    <div class="no-members-icon">
                        <span class="dashicons dashicons-groups"></span>
                    </div>
                    <h3>Nenhum membro encontrado</h3>
                    <p>Você ainda não criou nenhum membro da equipe. Comece criando seu primeiro membro!</p>
                    <a href="<?php echo admin_url('admin.php?page=cetesi-add-member'); ?>" class="button button-primary button-large">
                        <span class="dashicons dashicons-plus-alt"></span>
                        Criar Primeiro Membro
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <style>
    .cetesi-team-management {
        max-width: 1400px;
    }
    
    
    .cetesi-actions-bar {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
        padding: 20px;
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        flex-wrap: wrap;
    }
    
    .bulk-actions {
        display: flex;
        gap: 12px;
        align-items: center;
    }
    
    .action-header-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    
    .action-header-btn.novo-membro {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.2);
    }
    
    .action-header-btn.novo-membro:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
    }
    
    .action-header-btn.tradicional {
        background: white;
        color: #475569;
        border-color: #e1e5e9;
    }
    
    .action-header-btn.tradicional:hover {
        background: #f8fafc;
        border-color: #2563eb;
        color: #2563eb;
    }
    
    .action-header-btn.bulk-select {
        background: #f0f9ff;
        color: #0369a1;
        border-color: #bae6fd;
    }
    
    .action-header-btn.bulk-select:hover {
        background: #0369a1;
        color: white;
    }
    
    .action-header-btn.bulk-delete {
        background: #fef2f2;
        color: #dc2626;
        border-color: #fecaca;
        display: none; /* Inicialmente oculto */
    }
    
    .action-header-btn.bulk-delete:hover:not(:disabled) {
        background: #dc2626;
        color: white;
    }
    
    .action-header-btn.bulk-delete:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    .action-header-btn .dashicons {
        font-size: 18px;
    }
    
    .action-header-btn .btn-label {
        font-size: 14px;
    }
    
    .search-box {
        position: relative;
        display: flex;
        align-items: center;
        margin-left: auto;
    }
    
    .search-box input {
        padding: 12px 40px 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        width: 300px;
        transition: border-color 0.3s ease;
    }
    
    .search-box input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }
    
    .search-box .dashicons {
        position: absolute;
        right: 12px;
        color: #64748b;
        font-size: 16px;
    }
    
    /* Lista de membros */
    .cetesi-members-list {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        position: relative;
    }
    
    .member-list-item {
        display: flex;
        align-items: center;
        padding: 24px 30px;
        border-bottom: 1px solid #f1f5f9;
        border-left: none !important;
        border-right: none !important;
        border-top: none !important;
        transition: all 0.3s ease;
        position: relative;
        background: white;
    }
    
    .member-checkbox {
        margin-right: 20px;
        position: relative;
    }
    
    .member-checkbox input[type="checkbox"] {
        width: 22px;
        height: 22px;
        margin: 0;
        cursor: pointer;
        appearance: none;
        border: 2px solid #d1d5db;
        border-radius: 6px;
        background: white;
        transition: all 0.3s ease;
    }
    
    .member-checkbox input[type="checkbox"]::before {
        display: none !important;
    }
    
    .member-checkbox input[type="checkbox"]:hover {
        border-color: #2563eb;
        background: #f0f9ff;
        transform: scale(1.05);
    }
    
    .member-checkbox input[type="checkbox"]:checked {
        background: #2563eb;
        border-color: #2563eb;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
    }
    
    .member-checkbox input[type="checkbox"]:checked::after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 14px;
        font-weight: bold;
        line-height: 1;
    }
    
    .member-checkbox input[type="checkbox"]:checked:hover {
        background: #1d4ed8;
        border-color: #1d4ed8;
        transform: scale(1.05);
    }
    
    .member-checkbox label {
        display: none;
    }
    
    .member-list-item:last-child {
        border-bottom: none;
        border-radius: 0 0 16px 16px;
    }
    
    .member-list-item:hover {
        background: #f8fafc;
        transform: translateX(8px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border-left: none !important;
    }
    
    .member-list-item.checkbox-selected {
        border-left: none !important;
    }
    
    .member-list-item.checkbox-selected:hover {
        background: #f8fafc;
        transform: translateX(8px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border-left: none !important;
    }
    
    
    .member-info {
        flex: 1;
        display: flex;
        align-items: center;
    }
    
    .member-name {
        margin: 0;
        font-size: 19px;
        font-weight: 600;
        color: #1e293b;
        flex: 1;
        line-height: 1.4;
    }
    
    .member-details {
        display: flex;
        flex-direction: column;
        gap: 4px;
        margin-left: 20px;
    }
    
    .member-role {
        color: #2563eb;
        font-weight: 500;
        font-size: 14px;
    }
    
    
    .member-actions-container {
        margin-left: 20px;
        flex-shrink: 0;
    }
    
    .member-actions {
        display: flex;
        gap: 12px;
        align-items: center;
    }
    
    .action-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    
    .action-btn.edit-btn {
        background: #f0f9ff;
        color: #2563eb;
        border-color: #bae6fd;
    }
    
    .action-btn.edit-btn:hover {
        background: #2563eb;
        color: white;
        border-color: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }
    
    .action-btn.view-btn {
        background: #f0fdf4;
        color: #16a34a;
        border-color: #bbf7d0;
    }
    
    .action-btn.view-btn:hover {
        background: #16a34a;
        color: white;
        border-color: #16a34a;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);
    }
    
    .action-btn.delete-btn {
        background: #fef2f2;
        color: #dc2626;
        border-color: #fecaca;
    }
    
    .action-btn.delete-btn:hover {
        background: #dc2626;
        color: white;
        border-color: #dc2626;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }
    
    .action-btn .dashicons {
        font-size: 18px;
    }
    
    .no-members {
        text-align: center;
        padding: 60px 20px;
        color: #64748b;
    }
    
    .no-members-icon {
        margin-bottom: 20px;
    }
    
    .no-members-icon .dashicons {
        font-size: 64px;
        color: #d1d5db;
    }
    
    .no-members h3 {
        margin: 0 0 10px 0;
        font-size: 20px;
        color: #374151;
    }
    
    .no-members p {
        margin: 0 0 30px 0;
        font-size: 16px;
    }
    
    .no-members .button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    /* Responsividade */
    @media (max-width: 768px) {
        .cetesi-actions-bar {
            flex-direction: column;
            align-items: stretch;
        }
        
        .search-box {
            margin-left: 0;
        }
        
        .search-box input {
            width: 100%;
        }
        
        .member-list-item {
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .member-info {
            flex-basis: 100%;
        }
        
        .member-actions-container {
            flex-basis: 100%;
            margin-left: 0;
            margin-top: 15px;
        }
        
        .member-actions {
            justify-content: center;
        }
    }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        // Busca em tempo real
        $('#team-search').on('input', function() {
            var searchTerm = $(this).val().toLowerCase();
            $('.member-list-item').each(function() {
                var memberName = $(this).find('.member-name').text().toLowerCase();
                var memberRole = $(this).find('.member-role').text().toLowerCase();
                
                if (memberName.includes(searchTerm) || memberRole.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        
        // Marcar todos
        $('#select-all-members').on('click', function() {
            var visibleCheckboxes = $('.member-list-item:visible .member-select');
            var allChecked = visibleCheckboxes.length > 0 && visibleCheckboxes.filter(':checked').length === visibleCheckboxes.length;
            
            visibleCheckboxes.prop('checked', !allChecked).trigger('change');
        });
        
        // Atualizar botão de exclusão em lote
        function updateBulkDeleteButton() {
            var checkedCount = $('.member-select:checked').length;
            if (checkedCount > 0) {
                $('#bulk-delete-members').show();
            } else {
                $('#bulk-delete-members').hide();
            }
        }
        
        // Evento de mudança nos checkboxes
        $(document).on('change', '.member-select', function() {
            updateBulkDeleteButton();
            
            // Adicionar/remover classe de seleção
            var $listItem = $(this).closest('.member-list-item');
            if ($(this).is(':checked')) {
                $listItem.addClass('checkbox-selected');
            } else {
                $listItem.removeClass('checkbox-selected');
            }
        });
        
        // Inicializar estado do botão
        updateBulkDeleteButton();
        
        // Evento de clique no botão de exclusão em lote
        $('#bulk-delete-members').on('click', function() {
            const selectedMembers = $('.member-select:checked').map(function() {
                return $(this).val();
            }).get();
            
            if (selectedMembers.length === 0) {
                alert('Selecione pelo menos um membro para excluir.');
                return;
            }
            
            if (confirm('Tem certeza que deseja excluir ' + selectedMembers.length + ' membro(s) selecionado(s)? Esta ação não pode ser desfeita.')) {
                $('#selected-member-ids').val(selectedMembers.join(','));
                $('#bulk-delete-form').submit();
            }
        });
    });
    </script>
    <?php
}

/**
 * Página de adicionar novo membro
 */
function cetesi_add_member_page() {
    // Verificar se o formulário foi enviado ANTES de qualquer output
    if (isset($_POST['criar_membro']) && wp_verify_nonce($_POST['cetesi_member_nonce'], 'criar_membro_action')) {
        // Limpar qualquer output buffer
        if (ob_get_level()) {
            ob_end_clean();
        }
        
        cetesi_process_member_creation();
        return; // Importante: sair da função após o processamento
    }
    
    ?>
    <div class="wrap cetesi-team-management">
        
        <div class="cetesi-member-form-container">
            <form method="post" action="" class="cetesi-member-form" enctype="multipart/form-data">
                <?php wp_nonce_field('criar_membro_action', 'cetesi_member_nonce'); ?>
                
                <!-- Informações Básicas -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-info"></span> Informações Básicas</h2>
                        <p>Preencha as informações principais do membro</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="membro_nome" class="required">Nome Completo</label>
                            <input type="text" id="membro_nome" name="membro_nome" required 
                                   placeholder="Ex: João Silva Santos" />
                        </div>
                        
                        <div class="form-group">
                            <label for="membro_cargo" class="required">Cargo/Função</label>
                            <input type="text" id="membro_cargo" name="membro_cargo" required 
                                   placeholder="Ex: Coordenador Acadêmico" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="membro_especialidade">Especialidade</label>
                            <input type="text" id="membro_especialidade" name="membro_especialidade" 
                                   placeholder="Ex: Gestão Educacional" />
                        </div>
                        
                        <div class="form-group">
                            <label for="membro_formacao">Formação Acadêmica</label>
                            <input type="text" id="membro_formacao" name="membro_formacao" 
                                   placeholder="Ex: Graduação em Administração - UFDF" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="membro_experiencia">Anos de Experiência</label>
                            <input type="number" id="membro_experiencia" name="membro_experiencia" 
                                   placeholder="Ex: 10" min="0" />
                        </div>
                        
                        <div class="form-group">
                            <label for="membro_email">E-mail</label>
                            <input type="email" id="membro_email" name="membro_email" 
                                   placeholder="Ex: joao@cetesi.com.br" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="membro_telefone">Telefone</label>
                            <input type="tel" id="membro_telefone" name="membro_telefone" 
                                   placeholder="Ex: (11) 99999-9999" />
                        </div>
                        
                        <div class="form-group">
                            <label for="membro_linkedin">LinkedIn</label>
                            <input type="url" id="membro_linkedin" name="membro_linkedin" 
                                   placeholder="Ex: https://linkedin.com/in/joao-silva" />
                        </div>
                    </div>
                </div>
                
                <!-- Foto do Membro -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-camera"></span> Foto do Membro</h2>
                        <p>Adicione uma foto profissional do membro</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="membro_foto">Foto do Membro</label>
                            <input type="file" id="membro_foto" name="membro_foto" accept="image/*" />
                            <small>Selecione uma foto profissional (JPG, PNG, GIF - máximo 2MB)</small>
                        </div>
                    </div>
                </div>
                
                <!-- Biografia e Certificações -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-edit"></span> Informações Adicionais</h2>
                        <p>Biografia e certificações do membro</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="membro_bio">Biografia</label>
                            <textarea id="membro_bio" name="membro_bio" rows="4" 
                                      placeholder="Descreva a experiência profissional, conquistas e especialidades do membro..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="membro_certificacoes">Certificações</label>
                            <input type="text" id="membro_certificacoes" name="membro_certificacoes" 
                                   placeholder="Ex: MBA em Gestão, Certificação PMP, Pós-graduação em Educação" />
                            <small>Separe as certificações por vírgula</small>
                        </div>
                    </div>
                </div>
                
                <!-- Botões de Ação -->
                <div class="form-actions">
                    <button type="submit" name="criar_membro" class="cetesi-btn-primary">
                        <span class="dashicons dashicons-plus-alt"></span>
                        Criar Membro
                    </button>
                    <a href="<?php echo admin_url('admin.php?page=cetesi-team-management'); ?>" class="cetesi-btn-secondary">
                        <span class="dashicons dashicons-arrow-left-alt"></span>
                        Voltar para Lista
                    </a>
                </div>
            </form>
        </div>
    </div>
    

    <style>
    
    .cetesi-member-form-container {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        position: relative;
    }
    
    .cetesi-member-form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        z-index: 1;
    }
    
    .cetesi-member-form {
        max-width: 900px;
        margin: 0 auto;
    }
    
    .cetesi-form-section {
        border-bottom: 1px solid #f1f5f9;
        padding: 32px;
        position: relative;
        background: white;
    }
    
    .cetesi-form-section:last-child {
        border-bottom: none;
        border-radius: 0 0 16px 16px;
    }
    
    .section-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .section-header h2 {
        margin: 0 0 10px 0;
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .section-header h2 .dashicons {
        font-size: 20px;
        color: #667eea;
    }
    
    .section-header p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
        font-style: italic;
    }
    
    .form-row {
        display: flex;
        gap: 24px;
        margin-bottom: 20px;
    }
    
    .form-group {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .form-group.full-width {
        flex: 100%;
    }
    
    .form-group label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #1d2327;
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .form-group label.required::after {
        content: " *";
        color: #dc2626;
    }
    
    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s ease;
        background: white;
        font-family: inherit;
    }
    
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }
    
    .form-group small {
        margin-top: 5px;
        color: #6b7280;
        font-size: 12px;
    }
    
    .form-group input[type="file"] {
        padding: 8px 12px;
        border: 2px dashed #d1d5db;
        background: #f9fafb;
        cursor: pointer;
    }
    
    .form-group input[type="file"]:hover {
        border-color: #2563eb;
        background: #f0f9ff;
    }
    
    .form-actions {
        display: flex;
        gap: 20px;
        align-items: center;
        justify-content: center;
        margin-top: 40px;
        padding: 30px 0;
        border-top: 1px solid #f1f5f9;
    }
    
    /* Botões personalizados */
    .cetesi-btn-primary,
    .cetesi-btn-secondary {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        font-size: 13px;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.3s ease;
        text-decoration: none;
        border: 1px solid transparent;
        cursor: pointer;
    }
    
    .cetesi-btn-primary {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        box-shadow: 0 2px 6px rgba(37, 99, 235, 0.2);
    }
    
    .cetesi-btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }
    
    .cetesi-btn-secondary {
        background: white;
        color: #374151;
        border-color: #d1d5db;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    
    .cetesi-btn-secondary:hover {
        background: #f8fafc;
        border-color: #2563eb;
        color: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .cetesi-btn-primary .dashicons,
    .cetesi-btn-secondary .dashicons {
        font-size: 18px;
    }
    
    /* Efeito shimmer nos botões */
    .cetesi-btn-primary::before,
    .cetesi-btn-secondary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.6s ease;
    }
    
    .cetesi-btn-primary:hover::before,
    .cetesi-btn-secondary:hover::before {
        left: 100%;
    }
    
    /* Responsividade */
    @media (max-width: 768px) {
        .cetesi-stats-overview {
            grid-template-columns: 1fr;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .form-actions {
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
        }
        
        .cetesi-btn-primary,
        .cetesi-btn-secondary {
            justify-content: center;
            width: 100%;
        }
    }
    
    @media (max-width: 480px) {
        .stat-item {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
        }
        
        .stat-content h3 {
            font-size: 20px;
        }
    }
    </style>
    
    <?php
}

/**
 * Callback para a página personalizada de edição de membros
 */
function cetesi_edit_member_page_callback() {
    // Verificar se foi passado um ID de membro
    $member_id = isset($_GET['member_id']) ? intval($_GET['member_id']) : 0;
    
    if (!$member_id) {
        // Redirecionar para a página de gerenciamento de equipe usando JavaScript
        ?>
        <script>
            window.location.href = '<?php echo admin_url('admin.php?page=cetesi-team-management'); ?>';
        </script>
        <noscript>
            <meta http-equiv="refresh" content="0;url=<?php echo admin_url('admin.php?page=cetesi-team-management'); ?>">
        </noscript>
        <?php
        return;
    }
    
    // Verificar se o membro existe
    $membro = get_post($member_id);
    if (!$membro || $membro->post_type !== 'membro_equipe') {
        wp_die('Membro não encontrado.');
    }
    
    // Verificar se o formulário foi enviado
    if (isset($_POST['atualizar_membro']) && wp_verify_nonce($_POST['cetesi_member_nonce'], 'atualizar_membro_action')) {
        cetesi_process_member_update($member_id);
    }
    
    // Obter dados atuais do membro
    $membro_nome = $membro->post_title;
    $membro_bio = $membro->post_content;
    $membro_cargo = get_post_meta($member_id, '_membro_cargo', true);
    $membro_formacao = get_post_meta($member_id, '_membro_formacao', true);
    $membro_experiencia = get_post_meta($member_id, '_membro_experiencia', true);
    $membro_especialidade = get_post_meta($member_id, '_membro_especialidade', true);
    $membro_email = get_post_meta($member_id, '_membro_email', true);
    $membro_telefone = get_post_meta($member_id, '_membro_telefone', true);
    $membro_linkedin = get_post_meta($member_id, '_membro_linkedin', true);
    $membro_facebook = get_post_meta($member_id, '_membro_facebook', true);
    $membro_instagram = get_post_meta($member_id, '_membro_instagram', true);
    $membro_twitter = get_post_meta($member_id, '_membro_twitter', true);
    $membro_lattes = get_post_meta($member_id, '_membro_lattes', true);
    
    ?>
    <div class="wrap cetesi-team-management">
        
        <div class="cetesi-member-form-container">
            <form method="post" action="" class="cetesi-member-form" enctype="multipart/form-data">
                <?php wp_nonce_field('atualizar_membro_action', 'cetesi_member_nonce'); ?>
                <input type="hidden" name="member_id" value="<?php echo $member_id; ?>">
                
                <!-- Informações Pessoais -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-admin-users"></span> Informações Pessoais</h2>
                        <p>Dados básicos do membro da equipe</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="membro_nome" class="required">Nome Completo</label>
                            <input type="text" id="membro_nome" name="membro_nome" required 
                                   value="<?php echo esc_attr($membro_nome); ?>"
                                   placeholder="Ex: João Silva" />
                        </div>
                        
                        <div class="form-group">
                            <label for="membro_cargo" class="required">Cargo/Função</label>
                            <input type="text" id="membro_cargo" name="membro_cargo" required 
                                   value="<?php echo esc_attr($membro_cargo); ?>"
                                   placeholder="Ex: Coordenador de Enfermagem" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="membro_email">Email</label>
                            <input type="email" id="membro_email" name="membro_email" 
                                   value="<?php echo esc_attr($membro_email); ?>"
                                   placeholder="Ex: joao@cetesi.com.br" />
                        </div>
                        
                        <div class="form-group">
                            <label for="membro_telefone">Telefone</label>
                            <input type="tel" id="membro_telefone" name="membro_telefone" 
                                   value="<?php echo esc_attr($membro_telefone); ?>"
                                   placeholder="Ex: (61) 99999-9999" />
                        </div>
                    </div>
                </div>
                
                <!-- Formação e Experiência -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-awards"></span> Formação e Experiência</h2>
                        <p>Qualificações profissionais do membro</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="membro_formacao">Formação Acadêmica</label>
                            <input type="text" id="membro_formacao" name="membro_formacao" 
                                   value="<?php echo esc_attr($membro_formacao); ?>"
                                   placeholder="Ex: Graduação em Enfermagem - UNB" />
                        </div>
                        
                        <div class="form-group">
                            <label for="membro_especialidade">Especialidade</label>
                            <input type="text" id="membro_especialidade" name="membro_especialidade" 
                                   value="<?php echo esc_attr($membro_especialidade); ?>"
                                   placeholder="Ex: Enfermagem em UTI" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="membro_experiencia">Experiência Profissional</label>
                            <input type="text" id="membro_experiencia" name="membro_experiencia" 
                                   value="<?php echo esc_attr($membro_experiencia); ?>"
                                   placeholder="Ex: 10 anos de experiência" />
                        </div>
                    </div>
                </div>
                
                <!-- Biografia -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-edit"></span> Biografia</h2>
                        <p>Descrição detalhada do membro da equipe</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="membro_bio">Biografia</label>
                            <textarea id="membro_bio" name="membro_bio" rows="6" 
                                      placeholder="Descreva a trajetória profissional, conquistas e contribuições do membro..."><?php echo esc_textarea($membro_bio); ?></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Redes Sociais -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-share"></span> Redes Sociais</h2>
                        <p>Links para perfis profissionais</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="membro_linkedin">LinkedIn</label>
                            <input type="url" id="membro_linkedin" name="membro_linkedin" 
                                   value="<?php echo esc_attr($membro_linkedin); ?>"
                                   placeholder="https://linkedin.com/in/usuario" />
                        </div>
                        
                        <div class="form-group">
                            <label for="membro_facebook">Facebook</label>
                            <input type="url" id="membro_facebook" name="membro_facebook" 
                                   value="<?php echo esc_attr($membro_facebook); ?>"
                                   placeholder="https://facebook.com/usuario" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="membro_instagram">Instagram</label>
                            <input type="url" id="membro_instagram" name="membro_instagram" 
                                   value="<?php echo esc_attr($membro_instagram); ?>"
                                   placeholder="https://instagram.com/usuario" />
                        </div>
                        
                        <div class="form-group">
                            <label for="membro_twitter">Twitter</label>
                            <input type="url" id="membro_twitter" name="membro_twitter" 
                                   value="<?php echo esc_attr($membro_twitter); ?>"
                                   placeholder="https://twitter.com/usuario" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="membro_lattes">Currículo Lattes</label>
                            <input type="url" id="membro_lattes" name="membro_lattes" 
                                   value="<?php echo esc_attr($membro_lattes); ?>"
                                   placeholder="http://lattes.cnpq.br/123456789" />
                        </div>
                    </div>
                </div>
                
                <!-- Botões de Ação -->
                <div class="form-actions">
                    <button type="submit" name="atualizar_membro" class="cetesi-btn-primary">
                        <span class="dashicons dashicons-saved"></span>
                        Atualizar Membro
                    </button>
                    <a href="<?php echo admin_url('admin.php?page=cetesi-team-management'); ?>" class="cetesi-btn-secondary">
                        <span class="dashicons dashicons-arrow-left-alt"></span>
                        Voltar para Lista
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <style>
    .cetesi-member-form-container {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        position: relative;
    }
    
    .cetesi-member-form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        z-index: 1;
    }
    
    .cetesi-form-section {
        padding: 32px;
        border-bottom: 1px solid #f1f5f9;
        background: white;
    }
    
    .cetesi-form-section:last-child {
        border-bottom: none;
        border-radius: 0 0 16px 16px;
    }
    
    .section-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .section-header h2 {
        margin: 0 0 10px 0;
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .section-header h2 .dashicons {
        font-size: 20px;
        color: #667eea;
    }
    
    .section-header p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
        font-style: italic;
    }
    
    .form-row {
        display: flex;
        gap: 24px;
        margin-bottom: 20px;
    }
    
    .form-group {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .form-group.full-width {
        flex: 100%;
    }
    
    .form-group label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #374151;
        font-size: 14px;
    }
    
    .form-group label.required::after {
        content: " *";
        color: #dc2626;
        font-weight: 700;
    }
    
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
    }
    
    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        outline: none;
        transform: translateY(-1px);
    }
    
    .form-group input:hover,
    .form-group textarea:hover {
        border-color: #9ca3af;
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 100px;
        font-family: inherit;
    }
    
    .form-actions {
        display: flex;
        gap: 20px;
        align-items: center;
        justify-content: center;
        margin-top: 40px;
        padding: 30px 0;
        border-top: 1px solid #f1f5f9;
    }
    
    .cetesi-btn-primary,
    .cetesi-btn-secondary {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        font-size: 13px;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.3s ease;
        text-decoration: none;
        border: 1px solid transparent;
        cursor: pointer;
    }
    
    .cetesi-btn-primary {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        box-shadow: 0 2px 6px rgba(37, 99, 235, 0.2);
    }
    
    .cetesi-btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }
    
    .cetesi-btn-secondary {
        background: white;
        color: #374151;
        border-color: #d1d5db;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    
    .cetesi-btn-secondary:hover {
        background: #f8fafc;
        border-color: #2563eb;
        color: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .cetesi-btn-primary .dashicons,
    .cetesi-btn-secondary .dashicons {
        font-size: 16px;
    }
    
    /* Responsividade */
    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 16px;
        }
        
        .cetesi-form-section {
            padding: 24px;
        }
        
        .form-actions {
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
        }
        
        .section-header h2 {
            font-size: 18px;
        }
    }
    </style>
    <?php
}

/**
 * Processar ação individual de membro
 */
function cetesi_process_member_action() {
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
    }
    
    $action = sanitize_text_field($_GET['action']);
    $member_id = intval($_GET['member_id']);
    
    if ($action === 'delete') {
        if (wp_verify_nonce($_GET['_wpnonce'], 'delete_member_' . $member_id)) {
            wp_delete_post($member_id, true);
            
            // Redirecionar de volta para a página de gerenciamento
            $redirect_url = add_query_arg(array(
                'page' => 'cetesi-team-management',
                'deleted' => '1'
            ), admin_url('admin.php'));
            
            // Limpar qualquer output buffer antes do redirecionamento
            if (ob_get_level()) {
                ob_end_clean();
            }
            
            // Tentar redirecionamento com wp_redirect
            if (!headers_sent()) {
                wp_redirect($redirect_url);
                exit;
            } else {
                // Fallback: usar JavaScript se headers já foram enviados
                echo '<script>window.location.href = "' . esc_js($redirect_url) . '";</script>';
                echo '<noscript><meta http-equiv="refresh" content="0;url=' . esc_url($redirect_url) . '"></noscript>';
                exit;
            }
        } else {
            wp_die('Token de segurança inválido.');
        }
    }
}

/**
 * Processar exclusão em lote de membros
 */
function cetesi_process_bulk_delete_members() {
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
    }
    
    if (!wp_verify_nonce($_POST['bulk_delete_nonce'], 'bulk_delete_members')) {
        wp_die('Token de segurança inválido.');
    }
    
    $member_ids = explode(',', sanitize_text_field($_POST['member_ids']));
    $deleted_count = 0;
    
    foreach ($member_ids as $member_id) {
        $member_id = intval($member_id);
        if ($member_id > 0) {
            if (wp_delete_post($member_id, true)) {
                $deleted_count++;
            }
        }
    }
    
    // Redirecionar de volta para a página de gerenciamento
    $redirect_url = add_query_arg(array(
        'page' => 'cetesi-team-management',
        'bulk_deleted' => $deleted_count
    ), admin_url('admin.php'));
    
    // Limpar qualquer output buffer antes do redirecionamento
    if (ob_get_level()) {
        ob_end_clean();
    }
    
    // Tentar redirecionamento com wp_redirect
    if (!headers_sent()) {
        wp_redirect($redirect_url);
        exit;
    } else {
        // Fallback: usar JavaScript se headers já foram enviados
        echo '<script>window.location.href = "' . esc_js($redirect_url) . '";</script>';
        echo '<noscript><meta http-equiv="refresh" content="0;url=' . esc_url($redirect_url) . '"></noscript>';
        exit;
    }
}

/**
 * Processar criação de membro
 */
function cetesi_process_member_creation() {
    // Verificar permissões
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
    }
    
    // Validar campos obrigatórios
    $required_fields = array('membro_nome', 'membro_cargo');
    $errors = array();
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "O campo " . ucfirst(str_replace('membro_', '', $field)) . " é obrigatório.";
        }
    }
    
    if (!empty($errors)) {
        echo '<div class="notice notice-error"><p><strong>Erro:</strong> ' . implode('<br>', $errors) . '</p></div>';
        return;
    }
    
    // Processar upload da foto
    $foto_id = 0;
    if (!empty($_FILES['membro_foto']['name'])) {
        $upload = wp_handle_upload($_FILES['membro_foto'], array('test_form' => false));
        
        if (!isset($upload['error'])) {
            $attachment = array(
                'post_mime_type' => $upload['type'],
                'post_title' => sanitize_file_name(basename($upload['file'])),
                'post_content' => '',
                'post_status' => 'inherit'
            );
            
            $foto_id = wp_insert_attachment($attachment, $upload['file']);
            
            if (!is_wp_error($foto_id)) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attach_data = wp_generate_attachment_metadata($foto_id, $upload['file']);
                wp_update_attachment_metadata($foto_id, $attach_data);
            }
        }
    }
    
    // Preparar dados do post
    $post_data = array(
        'post_title' => sanitize_text_field($_POST['membro_nome']),
        'post_content' => sanitize_textarea_field($_POST['membro_bio'] ?? ''),
        'post_excerpt' => wp_trim_words(sanitize_textarea_field($_POST['membro_bio'] ?? ''), 20),
        'post_status' => 'publish',
        'post_type' => 'membro_equipe',
        'post_author' => get_current_user_id()
    );
    
    // Criar o post
    $post_id = wp_insert_post($post_data);
    
    if (is_wp_error($post_id)) {
        echo '<div class="notice notice-error"><p><strong>Erro:</strong> Não foi possível criar o membro. Tente novamente.</p></div>';
        return;
    }
    
    // Definir foto destacada se foi enviada
    if ($foto_id > 0) {
        set_post_thumbnail($post_id, $foto_id);
    }
    
    // Salvar campos personalizados
    $meta_fields = array(
        'membro_cargo' => '_membro_cargo',
        'membro_especialidade' => '_membro_especialidade',
        'membro_formacao' => '_membro_formacao',
        'membro_experiencia' => '_membro_experiencia',
        'membro_email' => '_membro_email',
        'membro_telefone' => '_membro_telefone',
        'membro_linkedin' => '_membro_linkedin',
        'membro_certificacoes' => '_membro_certificacoes'
    );
    
    foreach ($meta_fields as $form_field => $meta_key) {
        if (isset($_POST[$form_field]) && !empty($_POST[$form_field])) {
            $value = sanitize_text_field($_POST[$form_field]);
            if ($form_field === 'membro_certificacoes') {
                $value = sanitize_textarea_field($_POST[$form_field]);
            }
            update_post_meta($post_id, $meta_key, $value);
        }
    }
    
    // Sucesso - redirecionar para a página de gerenciamento da equipe
    $success_url = add_query_arg(array(
        'page' => 'cetesi-team-management',
        'member_created' => '1'
    ), admin_url('admin.php'));
    
    // Limpar qualquer output buffer antes do redirecionamento
    if (ob_get_level()) {
        ob_end_clean();
    }
    
    // Tentar redirecionamento com wp_redirect
    if (!headers_sent()) {
        wp_redirect($success_url);
        exit;
    } else {
        // Fallback: usar JavaScript se headers já foram enviados
        echo '<script>window.location.href = "' . esc_js($success_url) . '";</script>';
        echo '<noscript><meta http-equiv="refresh" content="0;url=' . esc_url($success_url) . '"></noscript>';
        exit;
    }
}

/**
 * Processar atualização de membro
 */
function cetesi_process_member_update($member_id) {
    // Verificar permissões
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
    }
    
    // Validar campos obrigatórios
    $required_fields = array('membro_nome', 'membro_cargo');
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            echo '<div class="notice notice-error"><p>Campo obrigatório não preenchido: ' . ucfirst(str_replace('_', ' ', $field)) . '</p></div>';
            return;
        }
    }
    
    // Atualizar dados básicos do post
    $post_data = array(
        'ID' => $member_id,
        'post_title' => sanitize_text_field($_POST['membro_nome']),
        'post_content' => wp_kses_post($_POST['membro_bio'] ?? ''),
        'post_excerpt' => wp_trim_words(wp_kses_post($_POST['membro_bio'] ?? ''), 20),
        'post_status' => 'publish'
    );
    
    $updated = wp_update_post($post_data);
    
    if (is_wp_error($updated)) {
        echo '<div class="notice notice-error"><p>Erro ao atualizar o membro: ' . $updated->get_error_message() . '</p></div>';
        return;
    }
    
    // Campos de meta para atualizar
    $meta_fields = array(
        '_membro_cargo' => 'membro_cargo',
        '_membro_formacao' => 'membro_formacao',
        '_membro_experiencia' => 'membro_experiencia',
        '_membro_especialidade' => 'membro_especialidade',
        '_membro_email' => 'membro_email',
        '_membro_telefone' => 'membro_telefone',
        '_membro_linkedin' => 'membro_linkedin',
        '_membro_facebook' => 'membro_facebook',
        '_membro_instagram' => 'membro_instagram',
        '_membro_twitter' => 'membro_twitter',
        '_membro_lattes' => 'membro_lattes'
    );
    
    // Atualizar campos de meta
    foreach ($meta_fields as $meta_key => $post_key) {
        if (isset($_POST[$post_key])) {
            $value = sanitize_text_field($_POST[$post_key]);
            update_post_meta($member_id, $meta_key, $value);
        }
    }
    
    // Sucesso - redirecionar para a página de gerenciamento da equipe
    $success_url = add_query_arg(array(
        'page' => 'cetesi-team-management',
        'member_updated' => '1',
        'member_name' => urlencode($_POST['membro_nome'])
    ), admin_url('admin.php'));
    
    // Limpar qualquer output buffer antes do redirecionamento
    if (ob_get_level()) {
        ob_end_clean();
    }
    
    // Tentar redirecionamento com wp_redirect
    if (!headers_sent()) {
        wp_redirect($success_url);
        exit;
    } else {
        // Fallback: usar JavaScript se headers já foram enviados
        echo '<script>window.location.href = "' . esc_js($success_url) . '";</script>';
        echo '<noscript><meta http-equiv="refresh" content="0;url=' . esc_url($success_url) . '"></noscript>';
        exit;
    }
    
    // Log da ação
    cetesi_log_security_event('MEMBER_UPDATED', 'Member updated via custom form: ' . $_POST['membro_nome'], 'INFO');
}

/**
 * Página de visualizar equipe
 */
function cetesi_view_team_page() {
    // Buscar todos os membros da equipe
    $membros = get_posts(array(
        'post_type' => 'membro_equipe',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC'
    ));
    
    // Buscar professores
    $professores = get_posts(array(
        'post_type' => 'professor',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC'
    ));
    
    ?>
    <div class="wrap">
        <h1>Ver Equipe</h1>
        <p>Visualize todos os membros da equipe do CETESI.</p>
        
        <!-- Estatísticas -->
        <div class="cetesi-stats-overview">
            <div class="stat-item">
                <div class="stat-icon cursos">
                    <span class="dashicons dashicons-groups"></span>
                </div>
                <div class="stat-content">
                    <h3><?php echo count($membros); ?> Membros</h3>
                    <p>Membros da equipe cadastrados</p>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon sucesso">
                    <span class="dashicons dashicons-welcome-learn-more"></span>
                </div>
                <div class="stat-content">
                    <h3><?php echo count($professores); ?> Professores</h3>
                    <p>Professores cadastrados</p>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon config">
                    <span class="dashicons dashicons-admin-users"></span>
                </div>
                <div class="stat-content">
                    <h3><?php echo count($membros) + count($professores); ?> Total</h3>
                    <p>Pessoas na equipe</p>
                </div>
            </div>
        </div>
        
        <!-- Lista de Membros -->
        <?php if (!empty($membros)) : ?>
        <div class="cetesi-form-section">
            <div class="section-header">
                <h2><span class="dashicons dashicons-groups"></span> Membros da Equipe</h2>
                <p>Lista de todos os membros cadastrados</p>
            </div>
            
            <div class="team-grid">
                <?php foreach ($membros as $membro) : 
                    $cargo = get_post_meta($membro->ID, '_membro_cargo', true);
                    $email = get_post_meta($membro->ID, '_membro_email', true);
                    $telefone = get_post_meta($membro->ID, '_membro_telefone', true);
                    $certificacoes = get_post_meta($membro->ID, '_membro_certificacoes', true);
                    $foto = get_the_post_thumbnail($membro->ID, 'thumbnail');
                ?>
                <div class="team-member-card">
                    <div class="member-photo-section">
                        <?php if ($foto) : ?>
                            <div class="member-photo">
                                <?php echo $foto; ?>
                            </div>
                        <?php else : ?>
                            <div class="member-photo no-photo">
                                <span class="dashicons dashicons-admin-users"></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="member-info-section">
                        <div class="member-header">
                            <h3 class="member-name"><?php echo esc_html($membro->post_title); ?></h3>
                            <span class="member-badge">Membros</span>
                        </div>
                        <?php if ($cargo) : ?>
                            <p class="member-role"><?php echo esc_html($cargo); ?></p>
                        <?php endif; ?>
                        <?php 
                        $formacao = get_post_meta($membro->ID, '_membro_formacao', true);
                        if ($formacao) : ?>
                            <p class="member-education">
                                <span class="dashicons dashicons-awards"></span>
                                <?php echo esc_html($formacao); ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($membro->post_content) : ?>
                            <p class="member-bio"><?php echo esc_html($membro->post_content); ?></p>
                        <?php endif; ?>
                        <?php 
                        $experiencia = get_post_meta($membro->ID, '_membro_experiencia', true);
                        if ($experiencia) : ?>
                            <p class="member-experience">
                                <span class="dashicons dashicons-clock"></span>
                                <?php echo esc_html($experiencia); ?> anos de experiência
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Lista de Professores -->
        <?php if (!empty($professores)) : ?>
        <div class="cetesi-form-section">
            <div class="section-header">
                <h2><span class="dashicons dashicons-welcome-learn-more"></span> Professores</h2>
                <p>Lista de todos os professores cadastrados</p>
            </div>
            
            <div class="team-grid">
                <?php foreach ($professores as $professor) : 
                    $especialidade = get_post_meta($professor->ID, '_professor_especialidade', true);
                    $email = get_post_meta($professor->ID, '_professor_email', true);
                    $telefone = get_post_meta($professor->ID, '_professor_telefone', true);
                    $foto = get_the_post_thumbnail($professor->ID, 'thumbnail');
                ?>
                <div class="team-member-card">
                    <div class="member-photo-section">
                        <?php if ($foto) : ?>
                            <div class="member-photo">
                                <?php echo $foto; ?>
                            </div>
                        <?php else : ?>
                            <div class="member-photo no-photo">
                                <span class="dashicons dashicons-welcome-learn-more"></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="member-info-section">
                        <div class="member-header">
                            <h3 class="member-name"><?php echo esc_html($professor->post_title); ?></h3>
                            <span class="member-badge">Docentes</span>
                        </div>
                        <?php if ($especialidade) : ?>
                            <p class="member-role"><?php echo esc_html($especialidade); ?></p>
                        <?php endif; ?>
                        <?php 
                        $formacao = get_post_meta($professor->ID, '_professor_formacao', true);
                        if ($formacao) : ?>
                            <p class="member-education">
                                <span class="dashicons dashicons-awards"></span>
                                <?php echo esc_html($formacao); ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($professor->post_content) : ?>
                            <p class="member-bio"><?php echo esc_html($professor->post_content); ?></p>
                        <?php endif; ?>
                        <?php 
                        $experiencia = get_post_meta($professor->ID, '_professor_experiencia', true);
                        if ($experiencia) : ?>
                            <p class="member-experience">
                                <span class="dashicons dashicons-clock"></span>
                                <?php echo esc_html($experiencia); ?> anos de experiência
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Ações -->
        <div class="form-actions">
            <a href="<?php echo admin_url('admin.php?page=cetesi-add-member'); ?>" class="cetesi-btn-primary">
                <span class="dashicons dashicons-plus-alt"></span>
                Adicionar Novo Membro
            </a>
            <a href="<?php echo admin_url('admin.php?page=cetesi-team-management'); ?>" class="cetesi-btn-secondary">
                <span class="dashicons dashicons-arrow-left-alt"></span>
                Voltar ao Gerenciamento
            </a>
        </div>
    </div>
    
    <style>
    .team-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin: 20px 0;
    }
    
    .team-member-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        width: 300px;
        flex: 0 0 300px;
        overflow: hidden;
    }
    
    .team-member-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }
    
    .member-photo-section {
        height: 200px;
        background: linear-gradient(135deg, #2563eb, #10b981);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    
    .member-photo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid white;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    
    .member-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .member-photo.no-photo {
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .member-photo.no-photo .dashicons {
        font-size: 48px;
        color: white;
    }
    
    .member-info-section {
        padding: 20px;
    }
    
    .member-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 10px;
    }
    
    .member-name {
        font-size: 20px;
        font-weight: 700;
        margin: 0;
        color: #1f2937;
        flex: 1;
    }
    
    .member-badge {
        background: #e0f2fe;
        color: #0277bd;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-left: 10px;
    }
    
    .member-role {
        color: #2563eb;
        font-weight: 600;
        font-size: 16px;
        margin: 0 0 12px 0;
    }
    
    .member-education {
        margin: 8px 0;
        font-size: 14px;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .member-education .dashicons {
        color: #10b981;
        font-size: 16px;
    }
    
    .member-bio {
        margin: 12px 0;
        font-size: 14px;
        color: #4b5563;
        line-height: 1.5;
    }
    
    .member-experience {
        margin: 8px 0 0 0;
        font-size: 14px;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .member-experience .dashicons {
        color: #f59e0b;
        font-size: 16px;
    }
    
    
    .member-actions .button {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }
    
    .member-actions .dashicons {
        font-size: 14px;
    }
    </style>
    <?php
}

/**
 * Callback para a página personalizada de criação de cursos
 */
function cetesi_custom_course_page_callback() {
    // Verificar se o formulário foi enviado
    if (isset($_POST['criar_curso']) && wp_verify_nonce($_POST['cetesi_course_nonce'], 'criar_curso_action')) {
        cetesi_process_custom_course_creation();
    }
    
    ?>
    <div class="wrap cetesi-team-management">
        
        <div class="cetesi-member-form-container">
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
                
                <!-- Modalidade e Tipo -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-laptop"></span> Modalidade e Tipo</h2>
                        <p>Defina como o curso será ministrado e seu tipo</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_modalidade" class="required">Modalidade de Ensino</label>
                            <select id="curso_modalidade" name="curso_modalidade" required>
                                <option value="">Selecione a modalidade</option>
                                <option value="presencial">Presencial</option>
                                <option value="online">100% Online</option>
                                <option value="hibrido">Híbrido (Presencial + Online)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="curso_tipo" class="required">Tipo de Curso</label>
                            <select id="curso_tipo" name="curso_tipo" required>
                                <option value="">Selecione o tipo</option>
                                <option value="tecnico">Técnico</option>
                                <option value="livre">Curso Livre</option>
                                <option value="qualificacao">Qualificação Profissional</option>
                                <option value="capacitacao">Capacitação</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_reconhecimento">Reconhecimento Oficial</label>
                            <select id="curso_reconhecimento" name="curso_reconhecimento">
                                <option value="">Selecione o reconhecimento</option>
                                <option value="mec">Reconhecido pelo MEC</option>
                                <option value="conselho">Reconhecido pelo Conselho</option>
                                <option value="ministerio">Reconhecido pelo Ministério</option>
                                <option value="certificacao">Certificação Profissional</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="curso_certificacao">Tipo de Certificação</label>
                            <input type="text" id="curso_certificacao" name="curso_certificacao" 
                                   placeholder="Ex: Certificado de Técnico em Enfermagem" />
                        </div>
                    </div>
                </div>
                
                <!-- Preços e Pagamento -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-money-alt"></span> Preços e Pagamento</h2>
                        <p>Configure os valores e formas de pagamento</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_preco">Preço Normal</label>
                            <input type="text" id="curso_preco" name="curso_preco" 
                                   placeholder="Ex: R$ 1.200,00" />
                        </div>
                        
                        <div class="form-group">
                            <label for="curso_preco_promocional">Preço Promocional</label>
                            <input type="text" id="curso_preco_promocional" name="curso_preco_promocional" 
                                   placeholder="Ex: R$ 999,00" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_desconto">Desconto Disponível</label>
                            <input type="text" id="curso_desconto" name="curso_desconto" 
                                   placeholder="Ex: 20% de desconto" />
                        </div>
                        
                        <div class="form-group">
                            <label for="curso_link_inscricao">Link de Inscrição</label>
                            <input type="url" id="curso_link_inscricao" name="curso_link_inscricao" 
                                   placeholder="https://..." />
                        </div>
                    </div>
                </div>
                
                <!-- Pré-requisitos -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-clipboard"></span> Pré-requisitos</h2>
                        <p>Defina os requisitos para participar do curso</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_escolaridade">Escolaridade Mínima</label>
                            <select id="curso_escolaridade" name="curso_escolaridade">
                                <option value="">Selecione a escolaridade</option>
                                <option value="fundamental">Ensino Fundamental</option>
                                <option value="medio">Ensino Médio</option>
                                <option value="superior">Ensino Superior</option>
                                <option value="qualquer">Qualquer Escolaridade</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="curso_idade_minima">Idade Mínima</label>
                            <input type="number" id="curso_idade_minima" name="curso_idade_minima" 
                                   placeholder="Ex: 18" min="0" max="100" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_prerequisitos">Pré-requisitos Específicos</label>
                            <textarea id="curso_prerequisitos" name="curso_prerequisitos" rows="3" 
                                      placeholder="Liste os pré-requisitos específicos do curso..."></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Botões de Ação -->
                <div class="form-actions">
                    <button type="submit" name="criar_curso" class="cetesi-btn-primary">
                        <span class="dashicons dashicons-plus-alt"></span>
                        Criar Curso
                    </button>
                    <a href="<?php echo admin_url('admin.php?page=cetesi-courses-management'); ?>" class="cetesi-btn-secondary">
                        <span class="dashicons dashicons-arrow-left-alt"></span>
                        Voltar para Lista
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <style>
    .cetesi-member-form-container {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        position: relative;
    }
    
    .cetesi-member-form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        z-index: 1;
    }
    
    .cetesi-form-section {
        padding: 32px;
        border-bottom: 1px solid #f1f5f9;
        background: white;
    }
    
    .cetesi-form-section:last-child {
        border-bottom: none;
        border-radius: 0 0 16px 16px;
    }
    
    .section-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .section-header h2 {
        margin: 0 0 10px 0;
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .section-header h2 .dashicons {
        font-size: 20px;
        color: #667eea;
    }
    
    .section-header p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
        font-style: italic;
    }
    
    .form-row {
        display: flex;
        gap: 24px;
        margin-bottom: 20px;
    }
    
    .form-group {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .form-group.full-width {
        flex: 100%;
    }
    
    .form-group label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #374151;
        font-size: 14px;
    }
    
    .form-group label.required::after {
        content: " *";
        color: #dc2626;
        font-weight: 700;
    }
    
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
    }
    
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        outline: none;
        transform: translateY(-1px);
    }
    
    .form-group input:hover,
    .form-group select:hover,
    .form-group textarea:hover {
        border-color: #9ca3af;
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 100px;
        font-family: inherit;
    }
    
    .form-actions {
        display: flex;
        gap: 20px;
        align-items: center;
        justify-content: center;
        margin-top: 40px;
        padding: 30px 0;
        border-top: 1px solid #f1f5f9;
    }
    
    /* Botões personalizados */
    .cetesi-btn-primary,
    .cetesi-btn-secondary {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        font-size: 13px;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.3s ease;
        text-decoration: none;
        border: 1px solid transparent;
        cursor: pointer;
    }
    
    .cetesi-btn-primary {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        box-shadow: 0 2px 6px rgba(37, 99, 235, 0.2);
    }
    
    .cetesi-btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }
    
    .cetesi-btn-secondary {
        background: white;
        color: #374151;
        border-color: #d1d5db;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    
    .cetesi-btn-secondary:hover {
        background: #f8fafc;
        border-color: #2563eb;
        color: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .cetesi-btn-primary .dashicons,
    .cetesi-btn-secondary .dashicons {
        font-size: 18px;
    }
    
    /* Efeito shimmer nos botões */
    .cetesi-btn-primary::before,
    .cetesi-btn-secondary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.6s ease;
    }
    
    .cetesi-btn-primary:hover::before,
    .cetesi-btn-secondary:hover::before {
        left: 100%;
    }
    
    /* Responsividade */
    @media (max-width: 768px) {
        .cetesi-stats-overview {
            grid-template-columns: 1fr;
        }
        
        .form-row {
            flex-direction: column;
            gap: 20px;
        }
        
        .cetesi-form-section {
            padding: 24px;
        }
        
        .form-actions {
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
        }
        
        .cetesi-btn-primary,
        .cetesi-btn-secondary {
            justify-content: center;
            width: 100%;
        }
    }
    
    @media (max-width: 480px) {
        .stat-item {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
        }
        
        .stat-icon .dashicons {
            font-size: 24px;
        }
        
        .cetesi-form-section {
            padding: 20px;
        }
        
        .section-header h2 {
            font-size: 18px;
        }
    }
    </style>
    <?php
}

/**
 * Callback para a página personalizada de edição de cursos
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
    
    // Verificar se o formulário foi enviado
    if (isset($_POST['atualizar_curso']) && wp_verify_nonce($_POST['cetesi_course_nonce'], 'atualizar_curso_action')) {
        cetesi_process_course_update($course_id);
    }
    
    // Obter dados atuais do curso
    $curso_titulo = $curso->post_title;
    $curso_descricao = $curso->post_content;
    $curso_nivel = get_post_meta($course_id, '_curso_nivel_ensino', true);
    $curso_area = get_post_meta($course_id, '_curso_area_conhecimento', true);
    $curso_categoria = get_post_meta($course_id, '_curso_categoria', true);
    $curso_duracao = get_post_meta($course_id, '_curso_duracao', true);
    $curso_carga_horaria = get_post_meta($course_id, '_curso_carga_horaria', true);
    $curso_estagio = get_post_meta($course_id, '_curso_estagio', true);
    $curso_turno = get_post_meta($course_id, '_curso_turno', true);
    $curso_modalidade = get_post_meta($course_id, '_curso_modalidade', true);
    $curso_tipo = get_post_meta($course_id, '_curso_tipo', true);
    $curso_reconhecimento = get_post_meta($course_id, '_curso_reconhecimento', true);
    $curso_certificacao = get_post_meta($course_id, '_curso_certificacao', true);
    $curso_preco = get_post_meta($course_id, '_curso_preco', true);
    $curso_preco_promocional = get_post_meta($course_id, '_curso_preco_promocional', true);
    $curso_desconto = get_post_meta($course_id, '_curso_desconto', true);
    $curso_link_inscricao = get_post_meta($course_id, '_curso_link_inscricao', true);
    $curso_escolaridade = get_post_meta($course_id, '_curso_escolaridade', true);
    $curso_idade_minima = get_post_meta($course_id, '_curso_idade_minima', true);
    $curso_prerequisitos = get_post_meta($course_id, '_curso_prerequisitos', true);
    $curso_documentos = get_post_meta($course_id, '_curso_documentos', true);
    $curso_objetivos = get_post_meta($course_id, '_curso_objetivos', true);
    $curso_metodologia = get_post_meta($course_id, '_curso_metodologia', true);
    $curso_disciplinas = get_post_meta($course_id, '_curso_disciplinas', true);
    $curso_salario_medio = get_post_meta($course_id, '_curso_salario_medio', true);
    $curso_oportunidades = get_post_meta($course_id, '_curso_oportunidades', true);
    $curso_mercado_trabalho = get_post_meta($course_id, '_curso_mercado_trabalho', true);
    $curso_areas_atuacao = get_post_meta($course_id, '_curso_areas_atuacao', true);
    $curso_forma_pagamento = get_post_meta($course_id, '_curso_forma_pagamento', true);
    $curso_parcelamento = get_post_meta($course_id, '_curso_parcelamento', true);
    
    ?>
    <div class="wrap cetesi-team-management">
        
        <div class="cetesi-member-form-container">
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
                
                <!-- Modalidade e Tipo -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-laptop"></span> Modalidade e Tipo</h2>
                        <p>Defina como o curso será ministrado e seu tipo</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_modalidade" class="required">Modalidade de Ensino</label>
                            <select id="curso_modalidade" name="curso_modalidade" required>
                                <option value="">Selecione a modalidade</option>
                                <option value="presencial" <?php selected($curso_modalidade, 'presencial'); ?>>Presencial</option>
                                <option value="online" <?php selected($curso_modalidade, 'online'); ?>>100% Online</option>
                                <option value="hibrido" <?php selected($curso_modalidade, 'hibrido'); ?>>Híbrido (Presencial + Online)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="curso_tipo" class="required">Tipo de Curso</label>
                            <select id="curso_tipo" name="curso_tipo" required>
                                <option value="">Selecione o tipo</option>
                                <option value="tecnico" <?php selected($curso_tipo, 'tecnico'); ?>>Técnico</option>
                                <option value="livre" <?php selected($curso_tipo, 'livre'); ?>>Curso Livre</option>
                                <option value="qualificacao" <?php selected($curso_tipo, 'qualificacao'); ?>>Qualificação Profissional</option>
                                <option value="capacitacao" <?php selected($curso_tipo, 'capacitacao'); ?>>Capacitação</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_reconhecimento">Reconhecimento Oficial</label>
                            <select id="curso_reconhecimento" name="curso_reconhecimento">
                                <option value="">Selecione o reconhecimento</option>
                                <option value="mec" <?php selected($curso_reconhecimento, 'mec'); ?>>Reconhecido pelo MEC</option>
                                <option value="conselho" <?php selected($curso_reconhecimento, 'conselho'); ?>>Reconhecido pelo Conselho</option>
                                <option value="ministerio" <?php selected($curso_reconhecimento, 'ministerio'); ?>>Reconhecido pelo Ministério</option>
                                <option value="certificacao" <?php selected($curso_reconhecimento, 'certificacao'); ?>>Certificação Profissional</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="curso_certificacao">Tipo de Certificação</label>
                            <input type="text" id="curso_certificacao" name="curso_certificacao" 
                                   value="<?php echo esc_attr($curso_certificacao); ?>"
                                   placeholder="Ex: Certificado de Técnico em Enfermagem" />
                        </div>
                    </div>
                </div>
                
                <!-- Preços e Pagamento -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-money-alt"></span> Preços e Pagamento</h2>
                        <p>Configure os valores e formas de pagamento</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_preco">Preço Normal</label>
                            <input type="text" id="curso_preco" name="curso_preco" 
                                   value="<?php echo esc_attr($curso_preco); ?>"
                                   placeholder="Ex: R$ 1.200,00" />
                        </div>
                        
                        <div class="form-group">
                            <label for="curso_preco_promocional">Preço Promocional</label>
                            <input type="text" id="curso_preco_promocional" name="curso_preco_promocional" 
                                   value="<?php echo esc_attr($curso_preco_promocional); ?>"
                                   placeholder="Ex: R$ 999,00" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_desconto">Desconto Disponível</label>
                            <input type="text" id="curso_desconto" name="curso_desconto" 
                                   value="<?php echo esc_attr($curso_desconto); ?>"
                                   placeholder="Ex: 20% de desconto" />
                        </div>
                        
                        <div class="form-group">
                            <label for="curso_link_inscricao">Link de Inscrição</label>
                            <input type="url" id="curso_link_inscricao" name="curso_link_inscricao" 
                                   value="<?php echo esc_attr($curso_link_inscricao); ?>"
                                   placeholder="https://..." />
                        </div>
                    </div>
                </div>
                
                <!-- Pré-requisitos -->
                <div class="cetesi-form-section">
                    <div class="section-header">
                        <h2><span class="dashicons dashicons-clipboard"></span> Pré-requisitos</h2>
                        <p>Defina os requisitos para participar do curso</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="curso_escolaridade">Escolaridade Mínima</label>
                            <select id="curso_escolaridade" name="curso_escolaridade">
                                <option value="">Selecione a escolaridade</option>
                                <option value="fundamental" <?php selected($curso_escolaridade, 'fundamental'); ?>>Ensino Fundamental</option>
                                <option value="medio" <?php selected($curso_escolaridade, 'medio'); ?>>Ensino Médio</option>
                                <option value="superior" <?php selected($curso_escolaridade, 'superior'); ?>>Ensino Superior</option>
                                <option value="qualquer" <?php selected($curso_escolaridade, 'qualquer'); ?>>Qualquer Escolaridade</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="curso_idade_minima">Idade Mínima</label>
                            <input type="number" id="curso_idade_minima" name="curso_idade_minima" 
                                   value="<?php echo esc_attr($curso_idade_minima); ?>"
                                   placeholder="Ex: 18" min="0" max="100" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="curso_prerequisitos">Pré-requisitos Específicos</label>
                            <textarea id="curso_prerequisitos" name="curso_prerequisitos" rows="3" 
                                      placeholder="Liste os pré-requisitos específicos do curso..."><?php echo esc_textarea($curso_prerequisitos); ?></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Botões de Ação -->
                <div class="form-actions">
                    <button type="submit" name="atualizar_curso" class="cetesi-btn-primary">
                        <span class="dashicons dashicons-saved"></span>
                        Atualizar Curso
                    </button>
                    <a href="<?php echo admin_url('admin.php?page=cetesi-courses-management'); ?>" class="cetesi-btn-secondary">
                        <span class="dashicons dashicons-arrow-left-alt"></span>
                        Voltar para Lista
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <style>
    .cetesi-member-form-container {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        position: relative;
    }
    
    .cetesi-member-form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        z-index: 1;
    }
    
    .cetesi-form-section {
        padding: 32px;
        border-bottom: 1px solid #f1f5f9;
        background: white;
    }
    
    .cetesi-form-section:last-child {
        border-bottom: none;
        border-radius: 0 0 16px 16px;
    }
    
    .section-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .section-header h2 {
        margin: 0 0 10px 0;
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .section-header h2 .dashicons {
        font-size: 20px;
        color: #667eea;
    }
    
    .section-header p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
        font-style: italic;
    }
    
    .form-row {
        display: flex;
        gap: 24px;
        margin-bottom: 20px;
    }
    
    .form-group {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .form-group.full-width {
        flex: 100%;
    }
    
    .form-group label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #374151;
        font-size: 14px;
    }
    
    .form-group label.required::after {
        content: " *";
        color: #dc2626;
        font-weight: 700;
    }
    
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
    }
    
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        outline: none;
        transform: translateY(-1px);
    }
    
    .form-group input:hover,
    .form-group select:hover,
    .form-group textarea:hover {
        border-color: #9ca3af;
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 100px;
        font-family: inherit;
    }
    
    .form-actions {
        display: flex;
        gap: 20px;
        align-items: center;
        justify-content: center;
        margin-top: 40px;
        padding: 30px 0;
        border-top: 1px solid #f1f5f9;
    }
    
    .cetesi-btn-primary,
    .cetesi-btn-secondary {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        font-size: 13px;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.3s ease;
        text-decoration: none;
        border: 1px solid transparent;
        cursor: pointer;
    }
    
    .cetesi-btn-primary {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        box-shadow: 0 2px 6px rgba(37, 99, 235, 0.2);
    }
    
    .cetesi-btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }
    
    .cetesi-btn-secondary {
        background: white;
        color: #374151;
        border-color: #d1d5db;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    
    .cetesi-btn-secondary:hover {
        background: #f8fafc;
        border-color: #2563eb;
        color: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .cetesi-btn-primary .dashicons,
    .cetesi-btn-secondary .dashicons {
        font-size: 16px;
    }
    
    /* Responsividade */
    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 16px;
        }
        
        .cetesi-form-section {
            padding: 24px;
        }
        
        .form-actions {
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
        }
        
        .section-header h2 {
            font-size: 18px;
        }
    }
    </style>
    <?php
}

/**
 * Processar criação de curso personalizado
 */
function cetesi_process_custom_course_creation() {
    // Verificar permissões
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
    }
    
    // Validar campos obrigatórios
    $required_fields = array('curso_titulo', 'curso_categoria', 'curso_duracao', 'curso_carga_horaria', 'curso_modalidade', 'curso_tipo');
    $errors = array();
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "O campo " . ucfirst(str_replace('curso_', '', $field)) . " é obrigatório.";
        }
    }
    
    if (!empty($errors)) {
        echo '<div class="notice notice-error"><p><strong>Erro:</strong> ' . implode('<br>', $errors) . '</p></div>';
        return;
    }
    
    // Preparar dados do post
    $post_data = array(
        'post_title' => sanitize_text_field($_POST['curso_titulo']),
        'post_content' => sanitize_textarea_field($_POST['curso_descricao']),
        'post_excerpt' => wp_trim_words(sanitize_textarea_field($_POST['curso_descricao']), 20),
        'post_status' => 'publish',
        'post_type' => 'curso',
        'post_author' => get_current_user_id()
    );
    
    // Criar o post
    $post_id = wp_insert_post($post_data);
    
    if (is_wp_error($post_id)) {
        echo '<div class="notice notice-error"><p><strong>Erro:</strong> Não foi possível criar o curso. Tente novamente.</p></div>';
        return;
    }
    
    // Salvar campos personalizados
    $meta_fields = array(
        'curso_codigo' => '_curso_codigo',
        'curso_nivel' => '_curso_nivel_ensino',
        'curso_area' => '_curso_area_conhecimento',
        'curso_duracao' => '_curso_duracao',
        'curso_carga_horaria' => '_curso_carga_horaria',
        'curso_estagio' => '_curso_estagio',
        'curso_turno' => '_curso_turno',
        'curso_modalidade' => '_curso_modalidade',
        'curso_tipo' => '_curso_tipo',
        'curso_reconhecimento' => '_curso_reconhecimento',
        'curso_certificacao' => '_curso_certificacao',
        'curso_preco' => '_curso_preco',
        'curso_preco_promocional' => '_curso_preco_promocional',
        'curso_desconto' => '_curso_desconto',
        'curso_link_inscricao' => '_curso_link_inscricao',
        'curso_escolaridade' => '_curso_escolaridade',
        'curso_idade_minima' => '_curso_idade_minima',
        'curso_prerequisitos' => '_curso_prerequisitos',
        'curso_documentos' => '_curso_documentos',
        'curso_objetivos' => '_curso_objetivos',
        'curso_metodologia' => '_curso_metodologia',
        'curso_disciplinas' => '_curso_disciplinas',
        'curso_salario_medio' => '_curso_salario_medio',
        'curso_oportunidades' => '_curso_oportunidades',
        'curso_mercado_trabalho' => '_curso_mercado_trabalho',
        'curso_areas_atuacao' => '_curso_areas_atuacao',
        'curso_forma_pagamento' => '_curso_forma_pagamento',
        'curso_parcelamento' => '_curso_parcelamento'
    );
    
    foreach ($meta_fields as $form_field => $meta_key) {
        if (isset($_POST[$form_field]) && !empty($_POST[$form_field])) {
            $value = sanitize_text_field($_POST[$form_field]);
            if ($form_field === 'curso_descricao' || $form_field === 'curso_prerequisitos') {
                $value = sanitize_textarea_field($_POST[$form_field]);
            }
            update_post_meta($post_id, $meta_key, $value);
        }
    }
    
    // Definir categoria baseada na seleção do usuário
    $categoria_slug = sanitize_text_field($_POST['curso_categoria']);
    
    if ($categoria_slug) {
        $term = get_term_by('slug', $categoria_slug, 'categoria_curso');
        if ($term) {
            wp_set_post_terms($post_id, array($term->term_id), 'categoria_curso');
        } else {
            // Se o termo não existe, criar
            $term_result = wp_insert_term(
                ucfirst(str_replace('-', ' ', $categoria_slug)),
                'categoria_curso',
                array('slug' => $categoria_slug)
            );
            
            if (!is_wp_error($term_result)) {
                wp_set_post_terms($post_id, array($term_result['term_id']), 'categoria_curso');
            }
        }
    }
    
    // Sucesso
    $edit_link = admin_url('admin.php?page=editar-curso-personalizado&course_id=' . $post_id);
    $view_link = get_permalink($post_id);
    
    echo '<div class="notice notice-success is-dismissible">';
    echo '<p><strong>Sucesso!</strong> O curso "' . esc_html($_POST['curso_titulo']) . '" foi criado com sucesso!</p>';
    echo '<p>';
    echo '<a href="' . $edit_link . '" class="button button-primary">Editar Curso</a> ';
    echo '<a href="' . $view_link . '" class="button button-secondary" target="_blank">Ver no Site</a> ';
    echo '<a href="' . admin_url('admin.php?page=cetesi-courses-management') . '" class="button">Voltar para Lista</a>';
    echo '</p>';
    echo '</div>';
    
    // Log da ação
    cetesi_log_security_event('CURSO_CREATED', 'Course created via custom form: ' . $_POST['curso_titulo'], 'INFO');
}

/**
 * Processar atualização de curso personalizado
 */
function cetesi_process_course_update($course_id) {
    // Verificar permissões
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
    }
    
    // Validar campos obrigatórios
    $required_fields = array('curso_titulo', 'curso_categoria', 'curso_duracao', 'curso_carga_horaria', 'curso_modalidade', 'curso_tipo');
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            echo '<div class="notice notice-error"><p>Campo obrigatório não preenchido: ' . ucfirst(str_replace('_', ' ', $field)) . '</p></div>';
            return;
        }
    }
    
    // Atualizar dados básicos do post
    $post_data = array(
        'ID' => $course_id,
        'post_title' => sanitize_text_field($_POST['curso_titulo']),
        'post_content' => wp_kses_post($_POST['curso_descricao']),
        'post_excerpt' => sanitize_textarea_field($_POST['curso_descricao']),
        'post_status' => 'publish'
    );
    
    $updated = wp_update_post($post_data);
    
    if (is_wp_error($updated)) {
        echo '<div class="notice notice-error"><p>Erro ao atualizar o curso: ' . $updated->get_error_message() . '</p></div>';
        return;
    }
    
    // Campos de meta para atualizar
    $meta_fields = array(
        '_curso_nivel_ensino' => 'curso_nivel',
        '_curso_area_conhecimento' => 'curso_area',
        '_curso_duracao' => 'curso_duracao',
        '_curso_carga_horaria' => 'curso_carga_horaria',
        '_curso_estagio' => 'curso_estagio',
        '_curso_turno' => 'curso_turno',
        '_curso_modalidade' => 'curso_modalidade',
        '_curso_tipo' => 'curso_tipo',
        '_curso_reconhecimento' => 'curso_reconhecimento',
        '_curso_certificacao' => 'curso_certificacao',
        '_curso_preco' => 'curso_preco',
        '_curso_preco_promocional' => 'curso_preco_promocional',
        '_curso_desconto' => 'curso_desconto',
        '_curso_link_inscricao' => 'curso_link_inscricao',
        '_curso_escolaridade' => 'curso_escolaridade',
        '_curso_idade_minima' => 'curso_idade_minima',
        '_curso_prerequisitos' => 'curso_prerequisitos',
        '_curso_documentos' => 'curso_documentos',
        '_curso_objetivos' => 'curso_objetivos',
        '_curso_metodologia' => 'curso_metodologia',
        '_curso_disciplinas' => 'curso_disciplinas',
        '_curso_salario_medio' => 'curso_salario_medio',
        '_curso_oportunidades' => 'curso_oportunidades',
        '_curso_mercado_trabalho' => 'curso_mercado_trabalho',
        '_curso_areas_atuacao' => 'curso_areas_atuacao',
        '_curso_forma_pagamento' => 'curso_forma_pagamento',
        '_curso_parcelamento' => 'curso_parcelamento'
    );
    
    // Atualizar campos de meta
    foreach ($meta_fields as $meta_key => $post_key) {
        if (isset($_POST[$post_key])) {
            $value = sanitize_text_field($_POST[$post_key]);
            update_post_meta($course_id, $meta_key, $value);
        }
    }
    
    // Definir categoria baseada na seleção do usuário
    $categoria_slug = sanitize_text_field($_POST['curso_categoria']);
    
    if ($categoria_slug) {
        $term = get_term_by('slug', $categoria_slug, 'categoria_curso');
        if ($term) {
            wp_set_post_terms($course_id, array($term->term_id), 'categoria_curso');
        } else {
            // Se o termo não existe, criar
            $term_result = wp_insert_term(
                ucfirst(str_replace('-', ' ', $categoria_slug)),
                'categoria_curso',
                array('slug' => $categoria_slug)
            );
            
            if (!is_wp_error($term_result)) {
                wp_set_post_terms($course_id, array($term_result['term_id']), 'categoria_curso');
            }
        }
    }
    
    // Sucesso - redirecionar para a página de gerenciamento de cursos
    $success_url = add_query_arg(array(
        'page' => 'cetesi-courses-management',
        'course_updated' => '1',
        'course_name' => urlencode($_POST['curso_titulo'])
    ), admin_url('admin.php'));
    
    // Limpar qualquer output buffer antes do redirecionamento
    if (ob_get_level()) {
        ob_end_clean();
    }
    
    // Tentar redirecionamento com wp_redirect
    if (!headers_sent()) {
        wp_redirect($success_url);
        exit;
    } else {
        // Fallback: usar JavaScript se headers já foram enviados
        echo '<script>window.location.href = "' . esc_js($success_url) . '";</script>';
        echo '<noscript><meta http-equiv="refresh" content="0;url=' . esc_url($success_url) . '"></noscript>';
        exit;
    }
    
    // Log da ação
    cetesi_log_security_event('CURSO_UPDATED', 'Course updated via custom form: ' . $_POST['curso_titulo'], 'INFO');
}

/**
 * Página de Gerenciamento de Cursos no Painel CETESI
 */
function cetesi_courses_management_page() {
    // Processar ações se necessário
    if (isset($_GET['action']) && isset($_GET['course_id'])) {
        cetesi_process_course_action();
    }
    
    // Processar exclusão em lote
    if (isset($_POST['bulk_action']) && $_POST['bulk_action'] === 'delete' && isset($_POST['course_ids'])) {
        cetesi_process_bulk_delete();
    }
    
    // Mostrar mensagem de sucesso se houver exclusão em lote
    $bulk_deleted = isset($_GET['bulk_deleted']) ? intval($_GET['bulk_deleted']) : 0;
    $course_updated = isset($_GET['course_updated']) ? intval($_GET['course_updated']) : 0;
    $course_name = isset($_GET['course_name']) ? urldecode($_GET['course_name']) : '';
    
    // Buscar cursos ordenados alfabeticamente
    $cursos = get_posts(array(
        'post_type' => 'curso',
        'posts_per_page' => -1,
        'post_status' => array('publish', 'draft'),
        'orderby' => 'title',
        'order' => 'ASC'
    ));
    
    // Estatísticas
    $total_cursos = count($cursos);
    $cursos_publicados = 0;
    $cursos_rascunho = 0;
    
    foreach ($cursos as $curso) {
        if ($curso->post_status === 'publish') {
            $cursos_publicados++;
        } else {
            $cursos_rascunho++;
        }
    }
    
    ?>
    <div class="wrap cetesi-courses-management">
        <?php if ($bulk_deleted > 0) : ?>
        <div class="notice notice-success is-dismissible">
            <p><strong>Sucesso!</strong> <?php echo $bulk_deleted; ?> curso(s) foram excluído(s) com sucesso.</p>
        </div>
        <?php endif; ?>
        
        <?php if ($course_updated > 0 && $course_name) : ?>
        <div class="notice notice-success is-dismissible">
            <p><strong>Sucesso!</strong> O curso "<?php echo esc_html($course_name); ?>" foi atualizado com sucesso!</p>
        </div>
        <?php endif; ?>
        
        <!-- Estatísticas -->
        <div class="cetesi-stats-overview">
            <div class="stat-item">
                <div class="stat-icon cursos">
                    <span class="dashicons dashicons-book-alt"></span>
                </div>
                <div class="stat-content">
                    <h3><?php echo $total_cursos; ?></h3>
                    <p>Total de Cursos</p>
                </div>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon publicados">
                    <span class="dashicons dashicons-yes-alt"></span>
                </div>
                <div class="stat-content">
                    <h3><?php echo $cursos_publicados; ?></h3>
                    <p>Publicados</p>
                </div>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon rascunhos">
                    <span class="dashicons dashicons-edit"></span>
                </div>
                <div class="stat-content">
                    <h3><?php echo $cursos_rascunho; ?></h3>
                    <p>Rascunhos</p>
                </div>
            </div>
        </div>
        
        <!-- Barra de Ações -->
        <div class="cetesi-actions-bar">
            <a href="<?php echo admin_url('admin.php?page=criar-curso-personalizado'); ?>" class="action-header-btn novo-curso">
                <span class="dashicons dashicons-plus-alt"></span>
                <span class="btn-label">Novo Curso</span>
            </a>
            <a href="<?php echo admin_url('edit.php?post_type=curso'); ?>" class="action-header-btn tradicional">
                <span class="dashicons dashicons-list-view"></span>
                <span class="btn-label">Tradicional</span>
            </a>
            <div class="bulk-actions">
                <button type="button" id="select-all-courses" class="action-header-btn select-all">
                    <span class="dashicons dashicons-yes-alt"></span>
                    <span class="btn-label">Marcar Todos</span>
                </button>
                <button type="button" id="bulk-delete" class="action-header-btn bulk-delete" disabled>
                    <span class="dashicons dashicons-trash"></span>
                    <span class="btn-label">Excluir Selecionados</span>
                </button>
            </div>
            <div class="search-box">
                <input type="text" id="course-search" placeholder="Buscar cursos..." />
                <span class="dashicons dashicons-search"></span>
            </div>
        </div>
        
        <!-- Lista de Cursos -->
        <div class="cetesi-courses-list">
            <?php if ($cursos) : ?>
                <?php foreach ($cursos as $curso) : 
                    $curso_id = $curso->ID;
                    $modalidade = get_post_meta($curso_id, '_curso_modalidade', true);
                    $tipo = get_post_meta($curso_id, '_curso_tipo', true);
                    $status = $curso->post_status;
                    
                    // Determinar categoria baseada no tipo
                    $categoria = '';
                    switch ($tipo) {
                        case 'tecnico':
                            $categoria = 'Técnico';
                            break;
                        case 'livre':
                            $categoria = 'Curso Livre';
                            break;
                        case 'qualificacao':
                            $categoria = 'Qualificação';
                            break;
                        case 'online':
                            $categoria = 'Online';
                            break;
                        case 'educacao-basica':
                            $categoria = 'Educação Básica';
                            break;
                        default:
                            $categoria = ucfirst($tipo);
                            break;
                    }
                    
                    $edit_link = admin_url('admin.php?page=editar-curso-personalizado&course_id=' . $curso_id);
                    $view_link = get_permalink($curso_id);
                    $delete_link = wp_nonce_url(admin_url('admin.php?page=cetesi-courses-management&action=delete&course_id=' . $curso_id), 'delete_course_' . $curso_id);
                ?>
                <div class="course-list-item" data-course-id="<?php echo $curso_id; ?>">
                    <div class="course-checkbox">
                        <input type="checkbox" class="course-select" value="<?php echo $curso_id; ?>">
                    </div>
                    <div class="course-status-indicator <?php echo $status; ?>"></div>
                    <div class="course-info">
                        <h3 class="course-title"><?php echo get_the_title($curso_id); ?></h3>
                    </div>
                    <div class="course-actions">
                        <a href="<?php echo $edit_link; ?>" class="action-btn edit" title="Editar Curso">
                            <span class="dashicons dashicons-edit"></span>
                        </a>
                        <a href="<?php echo $view_link; ?>" class="action-btn view" target="_blank" title="Ver no Site">
                            <span class="dashicons dashicons-external"></span>
                        </a>
                        <a href="<?php echo $delete_link; ?>" class="action-btn delete" onclick="return confirm('Tem certeza que deseja excluir este curso?')" title="Excluir Curso">
                            <span class="dashicons dashicons-trash"></span>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="no-courses">
                    <div class="no-courses-icon">
                        <span class="dashicons dashicons-book-alt"></span>
                    </div>
                    <h3>Nenhum curso encontrado</h3>
                    <p>Você ainda não criou nenhum curso. Comece criando seu primeiro curso!</p>
                    <a href="<?php echo admin_url('edit.php?post_type=curso&page=criar-curso-personalizado'); ?>" class="button button-primary button-large">
                        <span class="dashicons dashicons-plus-alt"></span>
                        Criar Primeiro Curso
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <style>
    .cetesi-courses-management {
        max-width: 1400px;
    }
    
    .cetesi-page-header {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        padding: 30px;
        border-radius: 12px;
        margin-bottom: 30px;
        text-align: center;
    }
    
    .cetesi-title {
        margin: 0 0 10px 0;
        font-size: 32px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
    }
    
    .cetesi-page-description {
        margin: 0;
        font-size: 16px;
        opacity: 0.9;
    }
    
    .cetesi-stats-overview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .stat-item {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 12px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .stat-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
    }
    
    .stat-icon.cursos {
        background: linear-gradient(135deg, #10b981, #059669);
    }
    
    .stat-icon.publicados {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }
    
    .stat-icon.rascunhos {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }
    
    .stat-content h3 {
        margin: 0 0 5px 0;
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
    }
    
    .stat-content p {
        margin: 0;
        font-size: 14px;
        font-weight: 600;
        color: #475569;
    }
    
    .cetesi-actions-bar {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
        padding: 20px;
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        flex-wrap: wrap;
    }
    
    .bulk-actions {
        display: flex;
        gap: 12px;
        align-items: center;
    }
    
    .action-header-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    
    .action-header-btn.novo-curso {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.2);
    }
    
    .action-header-btn.novo-curso:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
    }
    
    .action-header-btn.tradicional {
        background: white;
        color: #475569;
        border-color: #e1e5e9;
    }
    
    .action-header-btn.tradicional:hover {
        background: #f8fafc;
        border-color: #2563eb;
        color: #2563eb;
    }
    
    .action-header-btn.select-all {
        background: #f0f9ff;
        color: #0369a1;
        border-color: #bae6fd;
    }
    
    .action-header-btn.select-all:hover {
        background: #0369a1;
        color: white;
    }
    
    .action-header-btn.bulk-delete {
        background: #fef2f2;
        color: #dc2626;
        border-color: #fecaca;
        display: none; /* Inicialmente oculto */
    }
    
    .action-header-btn.bulk-delete:hover:not(:disabled) {
        background: #dc2626;
        color: white;
    }
    
    .action-header-btn.bulk-delete:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    .action-header-btn .dashicons {
        font-size: 18px;
    }
    
    .action-header-btn .btn-label {
        font-size: 14px;
    }
    
    .search-box {
        position: relative;
        display: flex;
        align-items: center;
        margin-left: auto;
    }
    
    .search-box input {
        padding: 12px 40px 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        width: 300px;
        transition: border-color 0.3s ease;
    }
    
    .search-box input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }
    
    .search-box .dashicons {
        position: absolute;
        right: 12px;
        color: #64748b;
        font-size: 16px;
    }
    
    /* Lista de cursos */
    .cetesi-courses-list {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        position: relative;
    }
    
    .course-list-item {
        display: flex;
        align-items: center;
        padding: 24px 30px;
        border-bottom: 1px solid #f1f5f9;
        border-left: none !important;
        border-right: none !important;
        border-top: none !important;
        transition: all 0.3s ease;
        position: relative;
        background: white;
    }
    
    .course-checkbox {
        margin-right: 20px;
        position: relative;
    }
    
    .course-checkbox input[type="checkbox"] {
        width: 22px;
        height: 22px;
        margin: 0;
        cursor: pointer;
        appearance: none;
        border: 2px solid #d1d5db;
        border-radius: 6px;
        background: white;
        transition: all 0.3s ease;
    }
    
    .course-checkbox input[type="checkbox"]::before {
        display: none !important;
    }
    
    .course-checkbox input[type="checkbox"]:hover {
        border-color: #2563eb;
        background: #f0f9ff;
        transform: scale(1.05);
    }
    
    .course-checkbox input[type="checkbox"]:checked {
        background: #2563eb;
        border-color: #2563eb;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
    }
    
    .course-checkbox input[type="checkbox"]:checked::after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 14px;
        font-weight: bold;
        line-height: 1;
    }
    
    .course-checkbox input[type="checkbox"]:checked:hover {
        background: #1d4ed8;
        border-color: #1d4ed8;
        transform: scale(1.05);
    }
    
    .course-checkbox label {
        display: none;
    }
    
    .course-list-item:last-child {
        border-bottom: none;
        border-radius: 0 0 16px 16px;
    }
    
    .course-list-item:hover {
        background: #f8fafc;
        transform: translateX(8px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border-left: none !important;
    }
    
    .course-list-item.checkbox-selected {
        border-left: none !important;
    }
    
    .course-list-item.checkbox-selected:hover {
        background: #f8fafc;
        transform: translateX(8px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border-left: none !important;
    }
    
    .course-status-indicator {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        margin-right: 24px;
        flex-shrink: 0;
    }
    
    .course-status-indicator.publish {
        background: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
    }
    
    .course-status-indicator.draft {
        background: #f59e0b;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
    }
    
    .course-info {
        flex: 1;
        display: flex;
        align-items: center;
    }
    
    .course-title {
        margin: 0;
        font-size: 19px;
        font-weight: 600;
        color: #1e293b;
        flex: 1;
        line-height: 1.4;
    }
    
    .course-actions {
        display: flex;
        gap: 12px;
        align-items: center;
    }
    
    .action-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    
    .action-btn.edit {
        background: #dbeafe;
        color: #2563eb;
        border-color: #bfdbfe;
    }
    
    .action-btn.edit:hover {
        background: #2563eb;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }
    
    .action-btn.view {
        background: #dcfce7;
        color: #16a34a;
        border-color: #bbf7d0;
    }
    
    .action-btn.view:hover {
        background: #16a34a;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);
    }
    
    .action-btn.delete {
        background: #fee2e2;
        color: #dc2626;
        border-color: #fecaca;
    }
    
    .action-btn.delete:hover {
        background: #dc2626;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }
    
    .action-btn .dashicons {
        font-size: 18px;
    }
    
    .no-courses {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 16px;
    }
    
    .no-courses-icon {
        width: 80px;
        height: 80px;
        background: #f1f5f9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px auto;
        font-size: 32px;
        color: #64748b;
    }
    
    .no-courses h3 {
        margin: 0 0 10px 0;
        font-size: 24px;
        color: #1e293b;
    }
    
    .no-courses p {
        margin: 0 0 25px 0;
        font-size: 16px;
        color: #64748b;
    }
    
    /* Melhorias de acessibilidade */
    .course-list-item:focus-within {
        outline: none;
    }
    
    .action-btn:focus {
        outline: none;
    }
    
    @media (max-width: 768px) {
        .cetesi-actions-bar {
            flex-direction: column;
            gap: 15px;
            align-items: stretch;
        }
        
        .action-header-btn {
            justify-content: center;
        }
        
        .bulk-actions {
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .search-box {
            margin-left: 0;
        }
        
        .search-box input {
            width: 100%;
        }
        
        .course-list-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
            padding: 24px;
        }
        
        .course-info {
            width: 100%;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .course-actions {
            width: 100%;
            justify-content: space-between;
            gap: 10px;
        }
        
        .action-btn {
            flex: 1;
            min-width: 50px;
            height: 48px;
        }
        
        .course-title {
            font-size: 18px;
        }
        
        .cetesi-stats-overview {
            grid-template-columns: 1fr;
        }
    }
    
    @media (max-width: 480px) {
        .course-list-item {
            padding: 20px;
        }
        
        .course-title {
            font-size: 16px;
        }
        
        .action-btn {
            width: 40px;
            height: 40px;
        }
        
        .action-btn .dashicons {
            font-size: 18px;
        }
    }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        // Inicializar estado dos botões
        updateBulkDeleteButton();
        
        // Busca em tempo real
        $('#course-search').on('keyup', function() {
            var searchTerm = $(this).val().toLowerCase();
            $('.course-list-item').each(function() {
                var courseTitle = $(this).find('.course-title').text().toLowerCase();
                
                if (courseTitle.indexOf(searchTerm) > -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            
            // Atualizar botões após busca
            updateBulkDeleteButton();
        });
        
        // Marcar/desmarcar todos os cursos
        $('#select-all-courses').on('click', function(e) {
            e.preventDefault();
            
            var visibleCheckboxes = $('.course-select:visible');
            var checkedCheckboxes = $('.course-select:visible:checked');
            
            if (checkedCheckboxes.length === visibleCheckboxes.length && visibleCheckboxes.length > 0) {
                // Se todos estão marcados, desmarcar todos
                visibleCheckboxes.prop('checked', false);
            } else {
                // Se nem todos estão marcados, marcar todos
                visibleCheckboxes.prop('checked', true);
            }
            
            // Trigger change event para atualizar visualmente
            visibleCheckboxes.trigger('change');
            updateBulkDeleteButton();
        });
        
        // Atualizar botão de exclusão em lote quando checkboxes mudarem
        $(document).on('change', '.course-select', function() {
            var courseItem = $(this).closest('.course-list-item');
            
            if ($(this).is(':checked')) {
                courseItem.addClass('checkbox-selected');
            } else {
                courseItem.removeClass('checkbox-selected');
            }
            
            updateBulkDeleteButton();
        });
        
        // Exclusão em lote
        $('#bulk-delete').on('click', function() {
            var selectedCourses = $('.course-select:checked').map(function() {
                return $(this).val();
            }).get();
            
            if (selectedCourses.length === 0) {
                alert('Selecione pelo menos um curso para excluir.');
                return;
            }
            
            if (confirm('Tem certeza que deseja excluir ' + selectedCourses.length + ' curso(s) selecionado(s)?')) {
                // Criar formulário para envio
                var form = $('<form>', {
                    'method': 'POST',
                    'action': '<?php echo admin_url('admin.php?page=cetesi-courses-management'); ?>'
                });
                
                // Adicionar nonce
                form.append($('<input>', {
                    'type': 'hidden',
                    'name': '_wpnonce',
                    'value': '<?php echo wp_create_nonce('bulk_delete_courses'); ?>'
                }));
                
                // Adicionar ação
                form.append($('<input>', {
                    'type': 'hidden',
                    'name': 'bulk_action',
                    'value': 'delete'
                }));
                
                // Adicionar IDs dos cursos
                $.each(selectedCourses, function(index, courseId) {
                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': 'course_ids[]',
                        'value': courseId
                    }));
                });
                
                // Enviar formulário
                $('body').append(form);
                form.submit();
            }
        });
        
        function updateBulkDeleteButton() {
            var checkedCount = $('.course-select:checked').length;
            var bulkDeleteBtn = $('#bulk-delete');
            
            if (checkedCount > 0) {
                bulkDeleteBtn.prop('disabled', false).show();
                bulkDeleteBtn.find('.btn-label').text('Excluir Selecionados (' + checkedCount + ')');
            } else {
                bulkDeleteBtn.prop('disabled', true).hide();
                bulkDeleteBtn.find('.btn-label').text('Excluir Selecionados');
            }
        }
    });
    </script>
    <?php
}

/**
 * Processar exclusão em lote de cursos
 */
function cetesi_process_bulk_delete() {
    // Verificar nonce
    if (!wp_verify_nonce($_POST['_wpnonce'], 'bulk_delete_courses')) {
        wp_die('Erro de segurança. Tente novamente.');
    }
    
    // Verificar permissões
    if (!current_user_can('delete_posts')) {
        wp_die('Você não tem permissão para excluir cursos.');
    }
    
    $course_ids = array_map('intval', $_POST['course_ids']);
    $deleted_count = 0;
    
    foreach ($course_ids as $course_id) {
        if (get_post_type($course_id) === 'curso') {
            if (wp_delete_post($course_id, true)) {
                $deleted_count++;
            }
        }
    }
    
    // Redirecionar com mensagem de sucesso
    $redirect_url = add_query_arg(array(
        'page' => 'cetesi-courses-management',
        'bulk_deleted' => $deleted_count
    ), admin_url('admin.php'));
    
    wp_redirect($redirect_url);
    exit;
}

/**
 * Processar ações de curso (excluir, etc.)
 */
function cetesi_process_course_action() {
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
    }
    
    $action = sanitize_text_field($_GET['action']);
    $course_id = intval($_GET['course_id']);
    
    if ($action === 'delete') {
        if (wp_verify_nonce($_GET['_wpnonce'], 'delete_course_' . $course_id)) {
            wp_delete_post($course_id, true);
            echo '<div class="notice notice-success is-dismissible"><p>Curso excluído com sucesso!</p></div>';
        }
    }
}

/**
 * Callback para informações do membro da equipe
 */
function cetesi_membro_equipe_info_callback($post) {
    wp_nonce_field('cetesi_membro_equipe_meta', 'cetesi_membro_equipe_meta_nonce');
    
    $cargo = get_post_meta($post->ID, '_membro_cargo', true);
    $formacao = get_post_meta($post->ID, '_membro_formacao', true);
    $experiencia = get_post_meta($post->ID, '_membro_experiencia', true);
    $especialidade = get_post_meta($post->ID, '_membro_especialidade', true);
    $email = get_post_meta($post->ID, '_membro_email', true);
    $telefone = get_post_meta($post->ID, '_membro_telefone', true);
    ?>
    <div class="cetesi-metabox-container">
        <div class="cetesi-field-row">
            <div class="cetesi-field-group">
                <label for="membro_cargo" class="cetesi-field-label">
                    <span class="dashicons dashicons-businessman"></span>
                    Cargo/Função
                </label>
                <input type="text" id="membro_cargo" name="membro_cargo" value="<?php echo esc_attr($cargo); ?>" class="cetesi-field-input" placeholder="Ex: Professor de Enfermagem" />
            </div>
            
            <div class="cetesi-field-group">
                <label for="membro_formacao" class="cetesi-field-label">
                    <span class="dashicons dashicons-awards"></span>
                    Formação Acadêmica
                </label>
                <input type="text" id="membro_formacao" name="membro_formacao" value="<?php echo esc_attr($formacao); ?>" class="cetesi-field-input" placeholder="Ex: Doutor em Enfermagem" />
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group">
                <label for="membro_especialidade" class="cetesi-field-label">
                    <span class="dashicons dashicons-star-filled"></span>
                    Especialidade
                </label>
                <input type="text" id="membro_especialidade" name="membro_especialidade" value="<?php echo esc_attr($especialidade); ?>" class="cetesi-field-input" placeholder="Ex: UTI e Emergência" />
            </div>
            
            <div class="cetesi-field-group">
                <label for="membro_telefone" class="cetesi-field-label">
                    <span class="dashicons dashicons-phone"></span>
                    Telefone
                </label>
                <input type="tel" id="membro_telefone" name="membro_telefone" value="<?php echo esc_attr($telefone); ?>" class="cetesi-field-input" placeholder="Ex: (11) 99999-9999" />
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group">
                <label for="membro_email" class="cetesi-field-label">
                    <span class="dashicons dashicons-email"></span>
                    E-mail
                </label>
                <input type="email" id="membro_email" name="membro_email" value="<?php echo esc_attr($email); ?>" class="cetesi-field-input" placeholder="Ex: professor@cetesi.com.br" />
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group cetesi-field-full">
                <label for="membro_experiencia" class="cetesi-field-label">
                    <span class="dashicons dashicons-portfolio"></span>
                    Experiência Profissional
                </label>
                <textarea id="membro_experiencia" name="membro_experiencia" class="cetesi-field-textarea" rows="3" placeholder="Descreva a experiência profissional do membro..."><?php echo esc_textarea($experiencia); ?></textarea>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Callback para redes sociais do membro da equipe
 */
function cetesi_membro_equipe_social_callback($post) {
    $linkedin = get_post_meta($post->ID, '_membro_linkedin', true);
    $facebook = get_post_meta($post->ID, '_membro_facebook', true);
    $instagram = get_post_meta($post->ID, '_membro_instagram', true);
    $twitter = get_post_meta($post->ID, '_membro_twitter', true);
    $lattes = get_post_meta($post->ID, '_membro_lattes', true);
    ?>
    <div class="cetesi-metabox-container">
        <div class="cetesi-field-row">
            <div class="cetesi-field-group">
                <label for="membro_linkedin" class="cetesi-field-label">
                    <span class="dashicons dashicons-linkedin"></span>
                    LinkedIn
                </label>
                <input type="url" id="membro_linkedin" name="membro_linkedin" value="<?php echo esc_attr($linkedin); ?>" class="cetesi-field-input" placeholder="https://linkedin.com/in/usuario" />
            </div>
            
            <div class="cetesi-field-group">
                <label for="membro_facebook" class="cetesi-field-label">
                    <span class="dashicons dashicons-facebook"></span>
                    Facebook
                </label>
                <input type="url" id="membro_facebook" name="membro_facebook" value="<?php echo esc_attr($facebook); ?>" class="cetesi-field-input" placeholder="https://facebook.com/usuario" />
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group">
                <label for="membro_instagram" class="cetesi-field-label">
                    <span class="dashicons dashicons-instagram"></span>
                    Instagram
                </label>
                <input type="url" id="membro_instagram" name="membro_instagram" value="<?php echo esc_attr($instagram); ?>" class="cetesi-field-input" placeholder="https://instagram.com/usuario" />
            </div>
            
            <div class="cetesi-field-group">
                <label for="membro_twitter" class="cetesi-field-label">
                    <span class="dashicons dashicons-twitter"></span>
                    Twitter
                </label>
                <input type="url" id="membro_twitter" name="membro_twitter" value="<?php echo esc_attr($twitter); ?>" class="cetesi-field-input" placeholder="https://twitter.com/usuario" />
            </div>
        </div>
        
        <div class="cetesi-field-row">
            <div class="cetesi-field-group cetesi-field-full">
                <label for="membro_lattes" class="cetesi-field-label">
                    <span class="dashicons dashicons-admin-site"></span>
                    Currículo Lattes
                </label>
                <input type="url" id="membro_lattes" name="membro_lattes" value="<?php echo esc_attr($lattes); ?>" class="cetesi-field-input" placeholder="http://lattes.cnpq.br/123456789" />
            </div>
        </div>
    </div>
    <?php
}

/**
 * Salvar campos personalizados do membro da equipe
 */
function cetesi_save_membro_equipe_meta($post_id) {
    if (!isset($_POST['cetesi_membro_equipe_meta_nonce']) || !wp_verify_nonce($_POST['cetesi_membro_equipe_meta_nonce'], 'cetesi_membro_equipe_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Campos de informações
    $info_fields = array(
        'membro_cargo', 'membro_formacao', 'membro_especialidade', 
        'membro_email', 'membro_telefone', 'membro_experiencia'
    );
    
    // Campos de redes sociais
    $social_fields = array(
        'membro_linkedin', 'membro_facebook', 'membro_instagram', 
        'membro_twitter', 'membro_lattes'
    );
    
    $all_fields = array_merge($info_fields, $social_fields);
    
    foreach ($all_fields as $field) {
        if (isset($_POST[$field])) {
            if ($field === 'membro_experiencia') {
                // Campo de texto longo
                update_post_meta($post_id, '_' . $field, sanitize_textarea_field($_POST[$field]));
            } else {
                // Campos de texto simples e URLs
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post', 'cetesi_save_membro_equipe_meta');

/**
 * Função auxiliar para obter professores cadastrados
 */
function cetesi_get_professores_cadastrados() {
    return get_option('cetesi_professores', array());
}

/**
 * Função auxiliar para obter estatísticas dos professores
 */
function cetesi_get_professores_stats() {
    $professores = cetesi_get_professores_cadastrados();
    $total_professores = count($professores);
    
    // Calcular anos de experiência média
    $experiencia_total = 0;
    $professores_com_experiencia = 0;
    foreach ($professores as $professor) {
        if (!empty($professor['experiencia']) && is_numeric($professor['experiencia'])) {
            $experiencia_total += intval($professor['experiencia']);
            $professores_com_experiencia++;
        }
    }
    $experiencia_media = $professores_com_experiencia > 0 ? round($experiencia_total / $professores_com_experiencia) : 15;
    
    return array(
        'total_professores' => $total_professores,
        'total_professores_display' => $total_professores > 0 ? $total_professores : '25+',
        'experiencia_media' => $experiencia_media
    );
}

/**
 * Criar cursos técnicos reais do CETESI
 */
function cetesi_create_real_courses() {
    // Verificar se os cursos já foram criados
    if (get_option('cetesi_real_courses_created')) {
        return;
    }
    
    $cursos_tecnicos = array(
        array(
            'title' => 'Técnico em Radiologia',
            'content' => 'Formação técnica de nível médio em Radiologia, preparando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'excerpt' => 'Curso técnico em Radiologia com 1.600 horas de carga horária, reconhecido pelo MEC.',
            'duracao' => '18 meses',
            'carga_horaria' => '1.600 horas',
            'estagio' => 'Estágio curricular supervisionado',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação técnica de nível médio em Radiologia, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o diploma de técnico de nível médio de Técnico em Radiologia, do Eixo Tecnológico – Ambiente e Saúde, na modalidade de educação cursada, ao estudante que for aprovado em todos os módulos do curso e no estágio curricular supervisionado, perfazendo a carga horária de 1.600 (mil e seiscentas) horas.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Cópia da Carteira de Identidade, CPF, 2 fotos 3/4, Histórico Escolar, Comprovante de tipagem Sanguínea e Fator RH, Comprovante de residência, Comprovante de quitação com o serviço militar (para homens maiores de 18 anos), Título de eleitor, Laudo/Relatório Médico quando necessário.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Módulo I (400h): Anatomia e Fisiologia Humana Aplicada à Radiologia Básico, Técnicas Radiológicas Convencionais Básico, Ética Profissional e Legislação, Psicologia e Relações humanas, História da Radiologia, Equipamentos e Acessórios Radiológicos. Módulo II (400h): Anatomia e Fisiologia Humana Aplicada à Radiologia I, Técnicas Radiológicas Convencionais I, Proteção Radiológica e Higiene das Radiações, Técnicas Radioterápicas, Língua Estrangeira Técnica – Inglês, Programa de Saúde e Saneamento, Medicina Nuclear. Módulo III (400h): Técnicas Radiológicas Convencionais II, Tomografia Computadorizada, Hemodinâmica, Mamografia, Ressonância Magnética, Radiologia Veterinária e Odontológica, Física Aplicada à Radiologia.',
            'categoria' => 'tecnicos'
        ),
        array(
            'title' => 'Técnico em Enfermagem',
            'content' => 'Formação técnica de nível médio em Enfermagem, preparando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'excerpt' => 'Curso técnico em Enfermagem com 1.600 horas de carga horária, reconhecido pelo MEC.',
            'duracao' => '18 meses',
            'carga_horaria' => '1.600 horas',
            'estagio' => 'Estágio curricular supervisionado',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação técnica de nível médio em Enfermagem, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o diploma de técnico de nível médio de Técnico em Enfermagem, do Eixo Tecnológico – Ambiente e Saúde, na modalidade de educação cursada, ao estudante que for aprovado em todos os módulos do curso e no estágio curricular supervisionado, perfazendo a carga horária de 1.600 (mil e seiscentas) horas.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente ou documento que comprove estar cursando, pelo menos, a 2ª série do Ensino Médio ou equivalente, além de ter a idade mínima de 16 anos.',
            'documentos' => 'Cópia da Carteira de Identidade, CPF, 2 fotos 3/4, Histórico Escolar, Comprovante de tipagem Sanguínea e Fator RH, Comprovante de residência, Comprovante de quitação com o serviço militar (para homens maiores de 18 anos), Título de eleitor, Laudo/Relatório Médico quando necessário.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Módulo I (400h): Ética Profissional e Psicologia Aplicada à Saúde, Anatomia e Fisiologia Humana, Imunologia, Enfermagem em Calculo de Medicação, Enfermagem Nutrição e Dietética, Farmacologia. Módulo II (400h): Introdução a Enfermagem, Enfermagem Clínica Médica, Administração em Enfermagem, Enfermagem Saúde Pública I, Enfermagem Médica Cirúrgica I. Módulo III (400h): Enfermagem em Saúde Pública II, Enfermagem Médica Cirúrgica II, Enfermagem Materno-Infantil, Enfermagem em Saúde Mental, Assistência de Enfermagem ao Paciente Grave, Praticas de Laboratório.',
            'categoria' => 'tecnicos'
        ),
        array(
            'title' => 'Técnico em Nutrição e Dietética',
            'content' => 'Formação técnica de nível médio em Nutrição e Dietética, preparando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'excerpt' => 'Curso técnico em Nutrição e Dietética com 1.200 horas de carga horária, reconhecido pelo MEC.',
            'duracao' => '18 meses',
            'carga_horaria' => '1.200 horas',
            'estagio' => 'Estágio curricular supervisionado',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação técnica de nível médio em Nutrição e Dietética, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o diploma de técnico de nível médio de Técnico em Nutrição e Dietética, do Eixo Tecnológico – Ambiente e Saúde, na modalidade de educação cursada, ao estudante que for aprovado em todos os módulos do curso e no estágio curricular supervisionado, perfazendo a carga horária de 1.200 (mil e duzentas) horas.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente ou documento que comprove estar cursando, no mínimo, a 2ª série do Ensino Médio ou equivalente, além de ter a idade mínima de 16 anos.',
            'documentos' => 'Cópia da Carteira de Identidade, CPF, 2 fotos 3/4, Histórico Escolar, Comprovante de tipagem Sanguínea e Fator RH, Comprovante de residência, Comprovante de quitação com o serviço militar (para homens maiores de 18 anos), Título de eleitor, Laudo/Relatório Médico quando necessário.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Módulo I (400h): Português Aplicado à Nutrição e Dietética, Matemática Aplicada a Nutrição e Dietética, Ética Profissional, Segurança no Trabalho, Noções de Bioquímica, Noções Básicas em Técnicas Dietética, Anatomia e Fisiologia Humana. Módulo II (400h): Técnica Dietética I, Higiene dos Alimentos I, Administração Aplicada a Nutrição e Dietética I, Introdução a Nutrição, Tecnologia dos Alimentos, Nutrição Clínica, Noções de Legislação Aplicada a Nutrição e Dietética. Módulo III (400h): Técnica Dietética II, Higiene dos Alimentos II, Administração Aplicada a Nutrição e Dietética II, Saúde Pública em Nutrição, Nutrição Materno Infantil, Gastronomia Aplicada a Nutrição e Dietética, Controle de Qualidade.',
            'categoria' => 'tecnicos'
        ),
        array(
            'title' => 'Técnico em Segurança do Trabalho',
            'content' => 'Formação técnica de nível médio em Segurança do Trabalho, preparando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'excerpt' => 'Curso técnico em Segurança do Trabalho com 1.200 horas de carga horária, reconhecido pelo MEC.',
            'duracao' => '18 meses',
            'carga_horaria' => '1.200 horas',
            'estagio' => 'Estágio curricular supervisionado',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação técnica de nível médio em Segurança do Trabalho, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o diploma de técnico de nível médio de Técnico em Segurança do Trabalho, do Eixo Tecnológico – Ambiente e Saúde, na modalidade de educação cursada, ao estudante que for aprovado em todos os módulos do curso e no estágio curricular supervisionado, perfazendo a carga horária de 1.200 (mil e duzentas) horas.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente ou documento que comprove estar cursando, no mínimo, a 2ª série do Ensino Médio ou equivalente, além de ter a idade mínima de 16 anos.',
            'documentos' => 'Cópia da Carteira de Identidade, CPF, 2 fotos 3/4, Histórico Escolar, Comprovante de tipagem Sanguínea e Fator RH, Comprovante de residência, Comprovante de quitação com o serviço militar (para homens maiores de 18 anos), Título de eleitor, Laudo/Relatório Médico quando necessário.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Módulo I (400h): Comunicação Oral e Escrita/Produção de Textos, Informática Básica, Psicologia Geral e Relações Humanas no Trabalho, Ética Aplicada ao Trabalho, Primeiros Socorros, Fundamentos da Higiene e Segurança Ocupacional, Segurança do Trabalho Básico, Sociologia Aplicada. Módulo II (400h): Prevenção e Controle de Sinistros, Responsabilidade do Técnico em Segurança do Trabalho, Processos Industriais, Riscos Ambientais, Desenho Técnico Industrial, Fundamentos da Administração, Segurança do Trabalho I, Prevenção e Controle de Perdas. Módulo III (400h): Ergonomia, Direito Aplicado ao Trabalho, Agentes de Riscos Físicos e Químicos, Gestão e Proteção Ambiental, Estudos Regionais e Controle da Saúde Ocupacional, Sistema de Gestão Integrada, Segurança do Trabalho II.',
            'categoria' => 'tecnicos'
        )
    );
    
    foreach ($cursos_tecnicos as $curso_data) {
        // Verificar se o curso já existe
        $existing_query = new WP_Query(array(
            'post_type' => 'curso',
            'title' => $curso_data['title'],
            'posts_per_page' => 1,
            'post_status' => 'any'
        ));
        if ($existing_query->have_posts()) {
            continue; // Pular se já existe
        }
        
        // Criar o post
        $post_id = wp_insert_post(array(
            'post_title' => $curso_data['title'],
            'post_content' => $curso_data['content'],
            'post_excerpt' => $curso_data['excerpt'],
            'post_status' => 'publish',
            'post_type' => 'curso',
            'post_author' => 1
        ));
        
        if ($post_id && !is_wp_error($post_id)) {
            // Adicionar meta fields
            update_post_meta($post_id, '_curso_duracao', $curso_data['duracao']);
            update_post_meta($post_id, '_curso_carga_horaria', $curso_data['carga_horaria']);
            update_post_meta($post_id, '_curso_estagio', $curso_data['estagio']);
            update_post_meta($post_id, '_curso_modalidade', $curso_data['modalidade']);
            update_post_meta($post_id, '_curso_turno', $curso_data['turno']);
            update_post_meta($post_id, '_curso_material_incluso', $curso_data['material_incluso']);
            update_post_meta($post_id, '_curso_certificado', $curso_data['certificado']);
            update_post_meta($post_id, '_curso_suporte', $curso_data['suporte']);
            update_post_meta($post_id, '_curso_objetivos', $curso_data['objetivos']);
            update_post_meta($post_id, '_curso_metodologia', $curso_data['metodologia']);
            update_post_meta($post_id, '_curso_certificacao', $curso_data['certificacao']);
            update_post_meta($post_id, '_curso_prerequisitos', $curso_data['requisitos']);
            update_post_meta($post_id, '_curso_documentos', $curso_data['documentos']);
            update_post_meta($post_id, '_curso_forma_pagamento', $curso_data['pagamento']);
            update_post_meta($post_id, '_curso_disciplinas', $curso_data['grade_curricular']);
            
            // Adicionar categoria
            $term = get_term_by('slug', $curso_data['categoria'], 'categoria_curso');
            if ($term) {
                wp_set_post_terms($post_id, array($term->term_id), 'categoria_curso');
            }
        }
    }
    
    // Marcar como criado
    update_option('cetesi_real_courses_created', true);
}

/**
 * Criar todos os cursos do CETESI
 */
function cetesi_create_all_courses() {
    // Verificar se os cursos já foram criados
    if (get_option('cetesi_all_courses_created')) {
        return;
    }
    
    // Criar cursos de qualificação
    cetesi_create_qualification_courses();
    
    // Criar cursos livres
    cetesi_create_free_courses();
    
    // Criar cursos online
    cetesi_create_online_courses();
    
    // Criar cursos de educação básica
    cetesi_create_basic_education_courses();
    
    // Marcar como criado
    update_option('cetesi_all_courses_created', true);
}

/**
 * Criar cursos de qualificação
 */
function cetesi_create_qualification_courses() {
    if (get_option('cetesi_qualification_courses_created')) {
        return;
    }
    
    $cursos_qualificacao = array(
        array(
            'title' => 'Qualificação em Gesso Ortopédico',
            'content' => 'Formação especializada em técnicas de imobilização ortopédica, preparando profissionais para atuar na área de ortopedia e traumatologia.',
            'excerpt' => 'Curso de qualificação em Gesso Ortopédico com 360 horas de carga horária.',
            'duracao' => '6 meses',
            'carga_horaria' => '360 horas',
            'estagio' => 'Prática e Simulação',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'AF. Anatomia e Fisiologia Humana (110h), Biossegurança e Ortopedia e Traumatologia (110h), Técnicas de Imobilização e Primeiros Socorros (120h), Prática e Simulação (20h).',
            'categoria' => 'qualificacao'
        ),
        array(
            'title' => 'Hemodiálise',
            'content' => 'Formação especializada em terapia renal substitutiva, preparando profissionais para atuar na área de hemodiálise com conhecimentos em sistema renal e patologias.',
            'excerpt' => 'Curso de qualificação em Hemodiálise com 360 horas de carga horária.',
            'duracao' => '6 meses',
            'carga_horaria' => '360 horas',
            'estagio' => 'Prática e Simulação',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Sistema Renal e Patologias Renais (100h), Terapia Renal Substitutiva (100h), O Papel da Equipe Multidisciplinar (140h), Prática e Simulação (20h).',
            'categoria' => 'qualificacao'
        ),
        array(
            'title' => 'Instrumentação Cirúrgica',
            'content' => 'Formação especializada em instrumentação cirúrgica, preparando profissionais para atuar em centros cirúrgicos com conhecimentos em assepsia e procedimentos cirúrgicos.',
            'excerpt' => 'Curso de qualificação em Instrumentação Cirúrgica com 360 horas de carga horária.',
            'duracao' => '6 meses',
            'carga_horaria' => '360 horas',
            'estagio' => 'Prática e Simulação',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Centro Cirúrgico e Parametrização (100h), Material e Anestesia (120h), Tempos Cirúrgicos e Assepsia (120h), Prática e Simulação (20h).',
            'categoria' => 'qualificacao'
        ),
        array(
            'title' => 'Qualificação em Enfermagem do Trabalho',
            'content' => 'Formação especializada em enfermagem do trabalho, preparando profissionais para atuar na área de saúde ocupacional e segurança do trabalhador.',
            'excerpt' => 'Curso de qualificação em Enfermagem do Trabalho com 360 horas de carga horária.',
            'duracao' => '6 meses',
            'carga_horaria' => '360 horas',
            'estagio' => 'Prática e Simulação',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Fundamentos da Enfermagem do Trabalho (100h), Saúde e Segurança do trabalhador (120h), Gestão e Legislação em Saúde Operacional (120h), Prática e Simulação (20h).',
            'categoria' => 'qualificacao'
        ),
        array(
            'title' => 'APH - Atendimento Pré-Hospitalar',
            'content' => 'Formação especializada em atendimento pré-hospitalar, preparando profissionais para atuar em situações de emergência e trauma.',
            'excerpt' => 'Curso de qualificação em APH - Atendimento Pré-Hospitalar com 360 horas de carga horária.',
            'duracao' => '6 meses',
            'carga_horaria' => '360 horas',
            'estagio' => 'Prática Laboratorial',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Fundamentos e Práticas Iniciais em APH (100h), Atendimento a Traumas e Emergências (120h), Aspectos éticos e Legais (120h), Prática Laboratorial (20h).',
            'categoria' => 'qualificacao'
        ),
        array(
            'title' => 'Saúde Bucal',
            'content' => 'Formação especializada em saúde bucal, preparando profissionais para atuar na área odontológica com conhecimentos em prevenção e higiene bucal.',
            'excerpt' => 'Curso de qualificação em Saúde Bucal com 360 horas de carga horária.',
            'duracao' => '6 meses',
            'carga_horaria' => '360 horas',
            'estagio' => 'Prática e Simulação',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Introdução à Saúde Bucal e Ética Profissional (52h), Prevenção e Higiene Bucal (72h), Materiais e Equipamentos Odontológicos (72h), Assistência ao Dentista e Procedimentos Clínicos (72h), Procedimentos Avançados e Apoio ao Paciente (72h), Prática e Simulação (20h).',
            'categoria' => 'qualificacao'
        ),
        array(
            'title' => 'Cuidador de Idosos',
            'content' => 'Formação especializada em cuidados com idosos, preparando profissionais para atuar na área de gerontologia com conhecimentos em envelhecimento e cuidados específicos.',
            'excerpt' => 'Curso de qualificação em Cuidador de Idosos com 360 horas de carga horária.',
            'duracao' => '6 meses',
            'carga_horaria' => '360 horas',
            'estagio' => 'Prática e Simulação',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Fundamentos da Compreensão do envelhecimento (90h), Práticas e Cuidados Específicos (120h), Assistência Avançada e Situações Específicas (90h), Prática e Simulação (60h).',
            'categoria' => 'qualificacao'
        )
    );
    
    foreach ($cursos_qualificacao as $curso_data) {
        cetesi_create_single_course($curso_data);
    }
    
    update_option('cetesi_qualification_courses_created', true);
}

/**
 * Criar cursos livres
 */
function cetesi_create_free_courses() {
    if (get_option('cetesi_free_courses_created')) {
        return;
    }
    
    $cursos_livres = array(
        array(
            'title' => 'Feridas e Curativos',
            'content' => 'Capacitação especializada em tratamento de feridas e técnicas de curativos, preparando profissionais para atuar na área de enfermagem.',
            'excerpt' => 'Curso de capacitação em Feridas e Curativos com 20 horas de carga horária.',
            'duracao' => '1 dia',
            'carga_horaria' => '20 horas',
            'estagio' => 'Prática',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Fundamentos de Feridas e Curativos (6h), Avaliação e Tratamento de Feridas (8h), Técnicas de Curativos e Prevenção de Complicações (6h).',
            'categoria' => 'livres'
        ),
        array(
            'title' => 'Cálculo de Medicação',
            'content' => 'Capacitação especializada em cálculos de medicação, preparando profissionais para atuar com segurança na administração de medicamentos.',
            'excerpt' => 'Curso de capacitação em Cálculo de Medicação com 20 horas de carga horária.',
            'duracao' => '1 dia',
            'carga_horaria' => '20 horas',
            'estagio' => 'Prática',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Fundamentos do Cálculo de Medicação (6h), Técnicas de Cálculo de Medicação (8h), Aplicação Prática do Cálculo de Medicação (6h).',
            'categoria' => 'livres'
        ),
        array(
            'title' => 'Punção Venosa',
            'content' => 'Capacitação especializada em técnicas de punção venosa, preparando profissionais para atuar com segurança na coleta de sangue e administração de medicamentos.',
            'excerpt' => 'Curso de capacitação em Punção Venosa com 20 horas de carga horária.',
            'duracao' => '1 dia',
            'carga_horaria' => '20 horas',
            'estagio' => 'Prática',
            'modalidade' => 'presencial',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Fundamentos da lavagem de Mãos (6h), Técnicas e Práticas de Lavagem de Mão (8h), Implementação e Manutenção da Lavagem de Mão (6h).',
            'categoria' => 'livres'
        )
    );
    
    foreach ($cursos_livres as $curso_data) {
        cetesi_create_single_course($curso_data);
    }
    
    update_option('cetesi_free_courses_created', true);
}

/**
 * Criar cursos online
 */
function cetesi_create_online_courses() {
    if (get_option('cetesi_online_courses_created')) {
        return;
    }
    
    $cursos_online = array(
        array(
            'title' => 'Home Care',
            'content' => 'Formação especializada em atendimento domiciliar, preparando profissionais para atuar na área de home care com conhecimentos em centro cirúrgico e procedimentos médicos.',
            'excerpt' => 'Curso de qualificação em Home Care com 360 horas de carga horária.',
            'duracao' => '6 meses',
            'carga_horaria' => '360 horas',
            'estagio' => 'Prática e Simulação',
            'modalidade' => 'online',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Centro Cirúrgico e Parametrização (100h), Material e Anestesia (120h), Tempos Cirúrgicos e Assepsia (120h), Prática e Simulação (20h).',
            'categoria' => 'online'
        ),
        array(
            'title' => 'UTI - Emergência e Urgência',
            'content' => 'Formação especializada em cuidados intensivos, preparando profissionais para atuar em unidades de terapia intensiva e emergências.',
            'excerpt' => 'Curso de qualificação em UTI - Emergência e Urgência com 360 horas de carga horária.',
            'duracao' => '6 meses',
            'carga_horaria' => '360 horas',
            'estagio' => 'Prática Laboratorial',
            'modalidade' => 'online',
            'turno' => 'Matutino, vespertino e noturno',
            'material_incluso' => 'Plataforma Teams (AVA), com: Apostila, slide, mapa mental, podcast, vide aula, Exercícios e Bibliografia',
            'certificado' => 'Portaria nº 79, de 29 de abril de 2014, que recredencia',
            'suporte' => 'Profissionais administrativos e acadêmicos qualificados, plataforma AVA, bibliotecas físicas e virtual e espaço físico e virtual com acessibilidade',
            'objetivos' => 'Propiciar formação pós técnica de nível médio, formando profissionais conscientes e competentes para ingressar no mercado de trabalho.',
            'metodologia' => 'As metodologias e recursos de ensino adotados envolvem situações de aprendizagem como um conjunto de ações planejadas pedagogicamente, propiciando ao estudante a oportunidade de desenvolver as habilidades e as competências baseadas no perfil profissional do curso.',
            'certificacao' => 'A instituição educacional expede e registra, conforme a legislação vigente, o certificado do curso pós técnico, ao estudante que for aprovado em todos os módulos do curso, perfazendo a carga horária do mesmo.',
            'requisitos' => 'Certificado/declaração de conclusão de Ensino Médio ou equivalente, além de ter a idade mínima de 18 anos.',
            'documentos' => 'Comprovante de residência, Carteirinha de vacinação, Certificado e histórico do Ensino Médio, Histórico e Diploma do curso Técnico, Tecnólogo e Superior na área da saúde.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Fundamentos da Urgência e Emergência (52h), Enfermagem em Emergência (72h), Traumas e Lesões (72h), Emergências Cardíacas e Respiratórias (72h), Emergências Diversas (72h), Prática Laboratorial (20h).',
            'categoria' => 'online'
        )
    );
    
    foreach ($cursos_online as $curso_data) {
        cetesi_create_single_course($curso_data);
    }
    
    update_option('cetesi_online_courses_created', true);
}

/**
 * Criar cursos de educação básica
 */
function cetesi_create_basic_education_courses() {
    if (get_option('cetesi_basic_education_courses_created')) {
        return;
    }
    
    $cursos_educacao_basica = array(
        array(
            'title' => 'EJA - 1ª Série',
            'content' => 'Educação de Jovens e Adultos - 1ª Série do Ensino Médio, oferecendo oportunidade de conclusão dos estudos para jovens e adultos.',
            'excerpt' => 'EJA - 1ª Série do Ensino Médio com carga horária completa.',
            'duracao' => '1 ano',
            'carga_horaria' => '800 horas',
            'estagio' => 'Não se aplica',
            'modalidade' => 'presencial',
            'turno' => 'Noturno',
            'material_incluso' => 'Material didático completo, apostilas e recursos educacionais',
            'certificado' => 'Certificado de conclusão da 1ª série do Ensino Médio',
            'suporte' => 'Professores qualificados e suporte pedagógico completo',
            'objetivos' => 'Propiciar a conclusão da 1ª série do Ensino Médio para jovens e adultos.',
            'metodologia' => 'Metodologia adaptada para jovens e adultos, com foco na prática e aplicação dos conhecimentos.',
            'certificacao' => 'Certificado de conclusão da 1ª série do Ensino Médio, válido em todo território nacional.',
            'requisitos' => 'Idade mínima de 18 anos e certificado de conclusão do Ensino Fundamental.',
            'documentos' => 'Cópia da Carteira de Identidade, CPF, Comprovante de residência, Certificado de conclusão do Ensino Fundamental.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Língua Portuguesa, Matemática, História, Geografia, Ciências, Artes, Educação Física.',
            'categoria' => 'educacao-basica'
        ),
        array(
            'title' => 'EJA - 2ª Série',
            'content' => 'Educação de Jovens e Adultos - 2ª Série do Ensino Médio, oferecendo oportunidade de conclusão dos estudos para jovens e adultos.',
            'excerpt' => 'EJA - 2ª Série do Ensino Médio com carga horária completa.',
            'duracao' => '1 ano',
            'carga_horaria' => '800 horas',
            'estagio' => 'Não se aplica',
            'modalidade' => 'presencial',
            'turno' => 'Noturno',
            'material_incluso' => 'Material didático completo, apostilas e recursos educacionais',
            'certificado' => 'Certificado de conclusão da 2ª série do Ensino Médio',
            'suporte' => 'Professores qualificados e suporte pedagógico completo',
            'objetivos' => 'Propiciar a conclusão da 2ª série do Ensino Médio para jovens e adultos.',
            'metodologia' => 'Metodologia adaptada para jovens e adultos, com foco na prática e aplicação dos conhecimentos.',
            'certificacao' => 'Certificado de conclusão da 2ª série do Ensino Médio, válido em todo território nacional.',
            'requisitos' => 'Idade mínima de 18 anos e certificado de conclusão da 1ª série do Ensino Médio.',
            'documentos' => 'Cópia da Carteira de Identidade, CPF, Comprovante de residência, Certificado de conclusão da 1ª série do Ensino Médio.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Língua Portuguesa, Matemática, História, Geografia, Física, Química, Biologia, Artes, Educação Física.',
            'categoria' => 'educacao-basica'
        ),
        array(
            'title' => 'EJA - 3ª Série',
            'content' => 'Educação de Jovens e Adultos - 3ª Série do Ensino Médio, oferecendo oportunidade de conclusão dos estudos para jovens e adultos.',
            'excerpt' => 'EJA - 3ª Série do Ensino Médio com carga horária completa.',
            'duracao' => '1 ano',
            'carga_horaria' => '800 horas',
            'estagio' => 'Não se aplica',
            'modalidade' => 'presencial',
            'turno' => 'Noturno',
            'material_incluso' => 'Material didático completo, apostilas e recursos educacionais',
            'certificado' => 'Certificado de conclusão do Ensino Médio',
            'suporte' => 'Professores qualificados e suporte pedagógico completo',
            'objetivos' => 'Propiciar a conclusão do Ensino Médio para jovens e adultos.',
            'metodologia' => 'Metodologia adaptada para jovens e adultos, com foco na prática e aplicação dos conhecimentos.',
            'certificacao' => 'Certificado de conclusão do Ensino Médio, válido em todo território nacional.',
            'requisitos' => 'Idade mínima de 18 anos e certificado de conclusão da 2ª série do Ensino Médio.',
            'documentos' => 'Cópia da Carteira de Identidade, CPF, Comprovante de residência, Certificado de conclusão da 2ª série do Ensino Médio.',
            'pagamento' => 'Dinheiro, Boletos, Cartão de crédito e Pix',
            'grade_curricular' => 'Língua Portuguesa, Matemática, História, Geografia, Física, Química, Biologia, Filosofia, Sociologia, Artes, Educação Física.',
            'categoria' => 'educacao-basica'
        )
    );
    
    foreach ($cursos_educacao_basica as $curso_data) {
        cetesi_create_single_course($curso_data);
    }
    
    update_option('cetesi_basic_education_courses_created', true);
}

/**
 * Criar um curso individual
 */
function cetesi_create_single_course($curso_data) {
    // Verificar se o curso já existe
    $existing_query = new WP_Query(array(
        'post_type' => 'curso',
        'title' => $curso_data['title'],
        'posts_per_page' => 1,
        'post_status' => 'any'
    ));
    if ($existing_query->have_posts()) {
        return; // Pular se já existe
    }
    
    // Criar o post
    $post_id = wp_insert_post(array(
        'post_title' => $curso_data['title'],
        'post_content' => $curso_data['content'],
        'post_excerpt' => $curso_data['excerpt'],
        'post_status' => 'publish',
        'post_type' => 'curso',
        'post_author' => 1
    ));
    
    if ($post_id && !is_wp_error($post_id)) {
        // Adicionar meta fields
        update_post_meta($post_id, '_curso_duracao', $curso_data['duracao']);
        update_post_meta($post_id, '_curso_carga_horaria', $curso_data['carga_horaria']);
        update_post_meta($post_id, '_curso_estagio', $curso_data['estagio']);
        update_post_meta($post_id, '_curso_modalidade', $curso_data['modalidade']);
        update_post_meta($post_id, '_curso_turno', $curso_data['turno']);
        update_post_meta($post_id, '_curso_material_incluso', $curso_data['material_incluso']);
        update_post_meta($post_id, '_curso_certificado', $curso_data['certificado']);
        update_post_meta($post_id, '_curso_suporte', $curso_data['suporte']);
        update_post_meta($post_id, '_curso_objetivos', $curso_data['objetivos']);
        update_post_meta($post_id, '_curso_metodologia', $curso_data['metodologia']);
        update_post_meta($post_id, '_curso_certificacao', $curso_data['certificacao']);
        update_post_meta($post_id, '_curso_prerequisitos', $curso_data['requisitos']);
        update_post_meta($post_id, '_curso_documentos', $curso_data['documentos']);
        update_post_meta($post_id, '_curso_forma_pagamento', $curso_data['pagamento']);
        update_post_meta($post_id, '_curso_disciplinas', $curso_data['grade_curricular']);
        
        // Adicionar categoria
        $term = get_term_by('slug', $curso_data['categoria'], 'categoria_curso');
        if ($term) {
            wp_set_post_terms($post_id, array($term->term_id), 'categoria_curso');
        }
    }
}

// Executar na ativação do tema
add_action('after_switch_theme', 'cetesi_create_real_courses');
add_action('after_switch_theme', 'cetesi_create_all_courses');

// Função para criar todos os cursos organizados
function cetesi_create_organized_courses() {
    // Limpar cursos existentes
    $existing_courses = get_posts(array(
        'post_type' => 'curso',
        'posts_per_page' => -1,
        'post_status' => 'any'
    ));
    
    foreach ($existing_courses as $course) {
        wp_delete_post($course->ID, true);
    }
    
    // Resetar flags
    delete_option('cetesi_real_courses_created');
    delete_option('cetesi_all_courses_created');
    
    // Criar cursos técnicos
    $cursos_tecnicos = array(
        array('title' => 'Técnico em Enfermagem', 'categoria' => 'tecnicos'),
        array('title' => 'Técnico em Radiologia', 'categoria' => 'tecnicos'),
        array('title' => 'Técnico em Nutrição e Dietética', 'categoria' => 'tecnicos'),
        array('title' => 'Técnico em Segurança do Trabalho', 'categoria' => 'tecnicos')
    );
    
    // Criar cursos de qualificação
    $cursos_qualificacao = array(
        array('title' => 'Qualificação em Gesso Ortopédico', 'categoria' => 'qualificacao'),
        array('title' => 'Hemodiálise', 'categoria' => 'qualificacao'),
        array('title' => 'Instrumentação Cirúrgica', 'categoria' => 'qualificacao'),
        array('title' => 'Qualificação em Enfermagem do Trabalho', 'categoria' => 'qualificacao'),
        array('title' => 'Qualificação em Necropsia', 'categoria' => 'qualificacao'),
        array('title' => 'APH - Atendimento Pré-Hospitalar', 'categoria' => 'qualificacao'),
        array('title' => 'Saúde Bucal', 'categoria' => 'qualificacao'),
        array('title' => 'Cuidador de Idosos', 'categoria' => 'qualificacao'),
        array('title' => 'Atendente de Farmácia', 'categoria' => 'qualificacao'),
        array('title' => 'Análise Clínicas', 'categoria' => 'qualificacao'),
        array('title' => 'Administração de Serviço Hospitalar', 'categoria' => 'qualificacao'),
        array('title' => 'Sala de Vacina', 'categoria' => 'qualificacao'),
        array('title' => 'Maqueiro', 'categoria' => 'qualificacao'),
        array('title' => 'Estudo da Radiologia e Tórax', 'categoria' => 'qualificacao'),
        array('title' => 'Agente Comunitário', 'categoria' => 'qualificacao'),
        array('title' => 'Flebotomia', 'categoria' => 'qualificacao'),
        array('title' => 'Saúde Mental', 'categoria' => 'qualificacao')
    );
    
    // Criar cursos livres
    $cursos_livres = array(
        array('title' => 'Feridas e Curativos', 'categoria' => 'livres'),
        array('title' => 'Cálculo de Medicação', 'categoria' => 'livres'),
        array('title' => 'Punção Venosa', 'categoria' => 'livres')
    );
    
    // Criar educação básica
    $cursos_educacao = array(
        array('title' => 'EJA - 1ª, 2ª, 3ª Série', 'categoria' => 'educacao-basica')
    );
    
    // Criar cursos online
    $cursos_online = array(
        array('title' => 'Home Care', 'categoria' => 'online'),
        array('title' => 'UTI - Emergência e Urgência', 'categoria' => 'online')
    );
    
    // Criar todos os cursos
    $todos_cursos = array_merge($cursos_tecnicos, $cursos_qualificacao, $cursos_livres, $cursos_educacao, $cursos_online);
    
    foreach ($todos_cursos as $curso_data) {
        // Verificar se o curso já existe
        $existing_query = new WP_Query(array(
            'post_type' => 'curso',
            'title' => $curso_data['title'],
            'posts_per_page' => 1,
            'post_status' => 'any'
        ));
        
        if ($existing_query->have_posts()) {
            continue; // Pular se já existe
        }
        
        $post_id = wp_insert_post(array(
            'post_title' => $curso_data['title'],
            'post_content' => 'Conteúdo do curso ' . $curso_data['title'],
            'post_excerpt' => 'Descrição do curso ' . $curso_data['title'],
            'post_status' => 'publish',
            'post_type' => 'curso',
            'post_author' => 1
        ));
        
        if ($post_id && !is_wp_error($post_id)) {
            // Adicionar categoria
            $term = get_term_by('slug', $curso_data['categoria'], 'categoria_curso');
            if ($term) {
                wp_set_post_terms($post_id, array($term->term_id), 'categoria_curso');
            } else {
                // Se o termo não existe, criar
                $term_result = wp_insert_term(
                    ucfirst($curso_data['categoria']),
                    'categoria_curso',
                    array('slug' => $curso_data['categoria'])
                );
                
                if (!is_wp_error($term_result)) {
                    wp_set_post_terms($post_id, array($term_result['term_id']), 'categoria_curso');
                }
            }
        }
    }
    
    return true;
}

// Função para executar manualmente via admin
function cetesi_manual_create_courses() {
    if (isset($_GET['action']) && $_GET['action'] === 'create_courses' && current_user_can('manage_options')) {
        cetesi_create_real_courses();
        cetesi_create_all_courses();
        wp_redirect(admin_url('admin.php?page=cetesi-content&courses_created=1'));
        exit;
    }
}
add_action('admin_init', 'cetesi_manual_create_courses');

/**
 * Widgets personalizados
 */
function cetesi_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'cetesi'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets da sidebar principal', 'cetesi'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 1', 'cetesi'),
        'id'            => 'footer-1',
        'description'   => __('Primeira coluna do footer', 'cetesi'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 2', 'cetesi'),
        'id'            => 'footer-2',
        'description'   => __('Segunda coluna do footer', 'cetesi'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'cetesi_widgets_init');

/**
 * AJAX para formulário de contato - VERSÃO SEGURA
 */
function cetesi_handle_contact_form() {
    // Verificar nonce
    if (!check_ajax_referer('cetesi_nonce', 'nonce', false)) {
        cetesi_log_security_event('CONTACT_FORM_ERROR', 'Invalid nonce', 'WARNING');
        wp_send_json_error('Requisição inválida. Tente novamente.');
    }
    
    // Verificar rate limiting
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'unknown';
    if (!cetesi_check_rate_limit('contact_form', $ip, 3, 300)) { // 3 tentativas em 5 minutos
        wp_send_json_error('Muitas tentativas. Aguarde 5 minutos antes de tentar novamente.');
    }
    
    // Verificação de segurança básica
    if (empty($ip) || !filter_var($ip, FILTER_VALIDATE_IP)) {
        wp_send_json_error('IP inválido.');
    }
    
    // Validar e sanitizar dados com validação rigorosa
    $nome_validation = cetesi_validate_input($_POST['nome'] ?? '', 'text', 100, true);
    if (!$nome_validation['success']) {
        cetesi_log_security_event('CONTACT_FORM_ERROR', 'Invalid name: ' . $nome_validation['error'], 'WARNING');
        wp_send_json_error($nome_validation['error']);
    }
    $nome = sanitize_text_field($nome_validation['data']);
    
    $email_validation = cetesi_validate_input($_POST['email'] ?? '', 'email', 100, true);
    if (!$email_validation['success']) {
        cetesi_log_security_event('CONTACT_FORM_ERROR', 'Invalid email: ' . $email_validation['error'], 'WARNING');
        wp_send_json_error($email_validation['error']);
    }
    $email = sanitize_email($email_validation['data']);
    
    $telefone_validation = cetesi_validate_input($_POST['telefone'] ?? '', 'phone', 20, true);
    if (!$telefone_validation['success']) {
        cetesi_log_security_event('CONTACT_FORM_ERROR', 'Invalid phone: ' . $telefone_validation['error'], 'WARNING');
        wp_send_json_error($telefone_validation['error']);
    }
    $telefone = sanitize_text_field($telefone_validation['data']);
    
    $curso_validation = cetesi_validate_input($_POST['curso'] ?? '', 'text', 100, false);
    if (!$curso_validation['success']) {
        cetesi_log_security_event('CONTACT_FORM_ERROR', 'Invalid course: ' . $curso_validation['error'], 'WARNING');
        wp_send_json_error($curso_validation['error']);
    }
    $curso = sanitize_text_field($curso_validation['data']);
    
    $mensagem_validation = cetesi_validate_input($_POST['mensagem'] ?? '', 'text', 1000, false);
    if (!$mensagem_validation['success']) {
        cetesi_log_security_event('CONTACT_FORM_ERROR', 'Invalid message: ' . $mensagem_validation['error'], 'WARNING');
        wp_send_json_error($mensagem_validation['error']);
    }
    $mensagem = sanitize_textarea_field($mensagem_validation['data']);
    
    // Verificar honeypot (campo oculto para detectar bots)
    if (!empty($_POST['website'])) {
        cetesi_log_security_event('CONTACT_FORM_BOT_DETECTED', 'Honeypot triggered', 'WARNING');
        wp_send_json_error('Acesso negado.');
    }
    
    // Preparar dados para envio
    $to = get_option('admin_email');
    $subject = 'Novo contato do site CETESI - ' . cetesi_safe_output($curso, 'html');
    $message_body = "Nome: " . cetesi_safe_output($nome, 'html') . "\n";
    $message_body .= "E-mail: " . cetesi_safe_output($email, 'html') . "\n";
    $message_body .= "Telefone: " . cetesi_safe_output($telefone, 'html') . "\n";
    $message_body .= "Curso de interesse: " . cetesi_safe_output($curso, 'html') . "\n";
    $message_body .= "Mensagem: " . cetesi_safe_output($mensagem, 'html') . "\n";
    $message_body .= "IP: " . $ip . "\n";
    $message_body .= "Data: " . date('Y-m-d H:i:s') . "\n";
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $email
    );
    
    // Log da tentativa de envio
    cetesi_log_security_event('CONTACT_FORM_SUBMISSION', 'Attempting to send email', 'INFO');
    
    if (wp_mail($to, $subject, $message_body, $headers)) {
        cetesi_log_security_event('CONTACT_FORM_SUCCESS', 'Email sent successfully', 'INFO');
        wp_send_json_success('Mensagem enviada com sucesso! Entraremos em contato em breve.');
    } else {
        cetesi_log_security_event('CONTACT_FORM_ERROR', 'Failed to send email', 'ERROR');
        wp_send_json_error('Erro ao enviar mensagem. Tente novamente.');
    }
}
add_action('wp_ajax_cetesi_contact', 'cetesi_handle_contact_form');
add_action('wp_ajax_nopriv_cetesi_contact', 'cetesi_handle_contact_form');

/**
 * Personalizar o Customizer
 */
function cetesi_customize_register($wp_customize) {
    // Seção de cores
    $wp_customize->add_section('cetesi_colors', array(
        'title'    => __('Cores do Tema', 'cetesi'),
        'priority' => 30,
    ));
    
    // Cor primária
    $wp_customize->add_setting('cetesi_primary_color', array(
        'default'           => '#10b981',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cetesi_primary_color', array(
        'label'    => __('Cor Primária', 'cetesi'),
        'section'  => 'cetesi_colors',
        'settings' => 'cetesi_primary_color',
    )));
    
    // Cor secundária
    $wp_customize->add_setting('cetesi_secondary_color', array(
        'default'           => '#3b82f6',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cetesi_secondary_color', array(
        'label'    => __('Cor Secundária', 'cetesi'),
        'section'  => 'cetesi_colors',
        'settings' => 'cetesi_secondary_color',
    )));
    
    // Seção de contato
    $wp_customize->add_section('cetesi_contact', array(
        'title'    => __('Informações de Contato', 'cetesi'),
        'priority' => 35,
    ));
    
    // Telefone
    $wp_customize->add_setting('cetesi_phone', array(
        'default'           => '(11) 99999-9999',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cetesi_phone', array(
        'label'   => __('Telefone', 'cetesi'),
        'section' => 'cetesi_contact',
        'type'    => 'text',
    ));
    
    // WhatsApp
    $wp_customize->add_setting('cetesi_whatsapp', array(
        'default'           => '556133514511',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cetesi_whatsapp', array(
        'label'   => __('Número do WhatsApp', 'cetesi'),
        'description' => __('Digite o número com código do país (ex: 556133514511)', 'cetesi'),
        'section' => 'cetesi_contact',
        'type'    => 'text',
    ));
    
    // Mensagem do WhatsApp Flutuante
    $wp_customize->add_setting('cetesi_whatsapp_message', array(
        'default'           => 'Olá! Tenho interesse nos cursos do CETESI. Gostaria de mais informações.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('cetesi_whatsapp_message', array(
        'label'   => __('Mensagem do WhatsApp Flutuante', 'cetesi'),
        'description' => __('Mensagem que será enviada quando o usuário clicar no botão flutuante do WhatsApp', 'cetesi'),
        'section' => 'cetesi_contact',
        'type'    => 'textarea',
    ));
    
    // E-mail
    $wp_customize->add_setting('cetesi_email', array(
        'default'           => 'contato@cetesi.com.br',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('cetesi_email', array(
        'label'   => __('E-mail', 'cetesi'),
        'section' => 'cetesi_contact',
        'type'    => 'email',
    ));
    
    // Endereço
    $wp_customize->add_setting('cetesi_address', array(
        'default'           => 'Rua das Flores, 123 - Centro - São Paulo/SP',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cetesi_address', array(
        'label'   => __('Endereço', 'cetesi'),
        'section' => 'cetesi_contact',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'cetesi_customize_register');

/**
 * Funções para gerar textos padrão para cursos da área da saúde
 */

// Função para gerar pré-requisitos padrão
function cetesi_get_default_prerequisites() {
    return "Idade mínima de 18 anos | Ensino Médio completo | Documentação pessoal (RG, CPF, comprovante de residência) | Foto 3x4 recente | Atestado médico de sanidade física e mental | Declaração de não estar cursando outro curso técnico na mesma área | Disponibilidade para estágio supervisionado | Compromisso com a carga horária estabelecida";
}

// Função para gerar documentos necessários padrão
function cetesi_get_default_documents() {
    return "RG (original e cópia) | CPF (original e cópia) | Comprovante de residência (original e cópia) | Foto 3x4 recente (2 fotos) | Histórico escolar do Ensino Médio (original e cópia) | Certificado de conclusão do Ensino Médio (original e cópia) | Atestado médico de sanidade física e mental | Declaração de disponibilidade para estágio | Comprovante de vacinação (conforme exigências do curso)";
}

// Função para gerar objetivos padrão
function cetesi_get_default_objectives() {
    return "Formar profissionais técnicos capacitados para atuar na área da saúde com competência técnica, ética e responsabilidade social, desenvolvendo habilidades práticas e conhecimentos teóricos necessários para o exercício profissional qualificado.";
}

// Função para gerar disciplinas padrão
function cetesi_get_default_curriculum() {
    return "Anatomia e Fisiologia Humana | Fundamentos da Enfermagem | Saúde Coletiva e Epidemiologia | Farmacologia Aplicada | Técnicas de Enfermagem | Saúde Mental | Ética Profissional | Primeiros Socorros | Estágio Supervisionado | Trabalho de Conclusão de Curso";
}

// Função para gerar metodologia padrão
function cetesi_get_default_methodology() {
    return "O curso utiliza metodologia ativa com aulas teóricas e práticas, simulações, estudos de caso, estágio supervisionado em unidades de saúde e atividades complementares, garantindo a formação integral do profissional técnico.";
}

// Função para gerar certificação padrão
function cetesi_get_default_certification() {
    return "Certificado de Técnico reconhecido pelo MEC, válido em todo território nacional, com registro no Conselho Regional de Enfermagem (COREN) após conclusão do curso.";
}

// Função para gerar mercado de trabalho padrão
function cetesi_get_default_market() {
    return "O mercado de trabalho na área da saúde apresenta constante crescimento, com alta demanda por profissionais técnicos qualificados em hospitais, clínicas, unidades básicas de saúde, home care e instituições de longa permanência.";
}

// Função para gerar áreas de atuação padrão
function cetesi_get_default_areas() {
    return "Hospitais públicos e privados | Unidades Básicas de Saúde (UBS) | Clínicas especializadas | Home Care | Instituições de longa permanência | Laboratórios de análises clínicas | Ambulatórios | Consultórios médicos";
}

// Função para gerar oportunidades padrão
function cetesi_get_default_opportunities() {
    return "Concursos públicos em saúde | Contratação em hospitais privados | Trabalho em clínicas especializadas | Atuação em home care | Emprego em instituições de longa permanência | Oportunidades em laboratórios | Trabalho autônomo";
}

// Função para gerar formas de pagamento padrão
function cetesi_get_default_payment() {
    return "À vista com desconto especial | Cartão de crédito (até 12x sem juros) | Cartão de débito | PIX | Boleto bancário | Financiamento estudantil";
}

// Função para gerar parcelamento padrão
function cetesi_get_default_installments() {
    return "À vista: 15% de desconto | 2x sem juros no cartão | 3x sem juros no cartão | 6x sem juros no cartão | 12x com juros reduzidos | Financiamento até 24x";
}

// AJAX para gerar textos padrão
function cetesi_generate_default_text() {
    check_ajax_referer('cetesi_generate_text', 'nonce');
    
    $field = sanitize_text_field($_POST['field']);
    $text = '';
    
    switch($field) {
        case 'prerequisites':
            $text = cetesi_get_default_prerequisites();
            break;
        case 'documents':
            $text = cetesi_get_default_documents();
            break;
        case 'objectives':
            $text = cetesi_get_default_objectives();
            break;
        case 'curriculum':
            $text = cetesi_get_default_curriculum();
            break;
        case 'methodology':
            $text = cetesi_get_default_methodology();
            break;
        case 'certification':
            $text = cetesi_get_default_certification();
            break;
        case 'market':
            $text = cetesi_get_default_market();
            break;
        case 'areas':
            $text = cetesi_get_default_areas();
            break;
        case 'opportunities':
            $text = cetesi_get_default_opportunities();
            break;
        case 'payment':
            $text = cetesi_get_default_payment();
            break;
        case 'installments':
            $text = cetesi_get_default_installments();
            break;
    }
    
    wp_send_json_success($text);
}
add_action('wp_ajax_cetesi_generate_default_text', 'cetesi_generate_default_text');

/**
 * Adicionar scripts para o admin
 */
function cetesi_admin_scripts($hook) {
    global $post_type;
    
    // Carregar em todas as páginas de admin para debug
    if ($post_type == 'curso' && ($hook == 'post.php' || $hook == 'post-new.php')) {
        wp_enqueue_script('cetesi-admin-script', get_template_directory_uri() . '/assets/js/admin-course.js', array('jquery'), '1.0.1', true);
        wp_localize_script('cetesi-admin-script', 'cetesi_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('cetesi_generate_text')
        ));
        
        // Adicionar CSS inline para debug
        wp_add_inline_style('wp-admin', '
            .cetesi-generate-btn {
                margin-left: 10px !important;
                font-size: 12px !important;
                padding: 4px 8px !important;
                height: auto !important;
                line-height: 1.2 !important;
                background: #0073aa !important;
                color: white !important;
                border: 1px solid #0073aa !important;
                border-radius: 3px !important;
                cursor: pointer !important;
                transition: all 0.3s ease !important;
            }
            .cetesi-generate-btn:hover {
                background: #005a87 !important;
                border-color: #005a87 !important;
                transform: translateY(-1px) !important;
            }
            .cetesi-generate-btn.generated {
                background: #46b450 !important;
                border-color: #46b450 !important;
            }
        ');
    }
}
add_action('admin_enqueue_scripts', 'cetesi_admin_scripts');

/**
 * Adicionar CSS personalizado do Customizer
 */
function cetesi_customizer_css() {
    $primary_color = get_theme_mod('cetesi_primary_color', '#10b981');
    $secondary_color = get_theme_mod('cetesi_secondary_color', '#3b82f6');
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr($primary_color); ?>;
            --secondary-color: <?php echo esc_attr($secondary_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'cetesi_customizer_css');

/**
 * Função para obter cursos por categoria
 */
function cetesi_get_cursos_by_category($categoria = '', $limit = -1) {
    $args = array(
        'post_type'      => 'curso',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );
    
    if (!empty($categoria)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categoria_curso',
                'field'    => 'slug',
                'terms'    => $categoria,
            ),
        );
    }
    
    return new WP_Query($args);
}

/**
 * Função para obter depoimentos
 */
function cetesi_get_depoimentos($limit = 3) {
    $args = array(
        'post_type'      => 'depoimento',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'orderby'        => 'rand',
    );
    
    return new WP_Query($args);
}

/**
 * Adicionar suporte a WooCommerce (opcional)
 */
function cetesi_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'cetesi_woocommerce_support');

/**
 * Otimizações de performance
 */
function cetesi_performance_optimizations() {
    // Remover emojis desnecessários
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    
    // Remover versão do WordPress
    remove_action('wp_head', 'wp_generator');
    
    // Remover links desnecessários
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('init', 'cetesi_performance_optimizations');

/**
 * Adicionar classes personalizadas ao body
 */
function cetesi_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'homepage';
    }
    
    if (is_singular('curso')) {
        $classes[] = 'single-curso';
    }
    
    return $classes;
}
add_filter('body_class', 'cetesi_body_classes');

/**
 * Limitar excerpt
 */
function cetesi_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'cetesi_excerpt_length');

/**
 * Personalizar excerpt more
 */
function cetesi_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'cetesi_excerpt_more');

function cetesi_get_cta_button($button_key, $default_text = '', $default_url = '#') {
    $cta_buttons = get_option('cetesi_cta_buttons', array(
        'homepage_inscreva' => array('text' => 'Inscreva-se', 'url' => '#inscricao'),
        'homepage_ligar' => array('text' => 'Ligar Agora', 'url' => 'tel:6133514511'),
        'curso_consultor' => array('text' => 'Falar com o Consultor', 'url' => '#contato'),
        'curso_whatsapp' => array('text' => 'WhatsApp', 'url' => 'https://wa.me/556133514511')
    ));
    
    if (isset($cta_buttons[$button_key])) {
        return $cta_buttons[$button_key];
    }
    
    return array('text' => $default_text, 'url' => $default_url);
}

function cetesi_get_header_button($button_key, $default_text = '', $default_url = '#', $default_new_tab = 0) {
    $header_buttons = get_option('cetesi_header_buttons', array(
        'painel_unicollege' => array('enabled' => 1, 'text' => 'Painel Unicollege', 'url' => '#', 'new_tab' => 0),
        'painel_aluno' => array('enabled' => 1, 'text' => 'Painel do Aluno', 'url' => '#', 'new_tab' => 0),
        'telefone' => array('enabled' => 1, 'text' => '(11) 99999-9999', 'url' => 'tel:(11) 99999-9999'),
        'whatsapp' => array('enabled' => 1, 'text' => 'WhatsApp', 'url' => 'https://wa.me/556133514511')
    ));
    
    if (isset($header_buttons[$button_key])) {
        return $header_buttons[$button_key];
    }
    
    return array('enabled' => 1, 'text' => $default_text, 'url' => $default_url, 'new_tab' => $default_new_tab);
}

function cetesi_content_page() {
    if (isset($_GET['courses_created']) && $_GET['courses_created'] == '1') {
        echo '<div class="notice notice-success"><p>Cursos técnicos reais do CETESI criados com sucesso!</p></div>';
    }
    ?>
    <div class="wrap cetesi-customization-page">
        <div class="cetesi-page-header">
            <h1><span class="dashicons dashicons-admin-post"></span> Conteúdo CETESI</h1>
            <p class="cetesi-page-description">Gerencie professores, cursos e conteúdo do seu site educacional.</p>
        </div>
        
        <div class="cetesi-sections">
            <div class="cetesi-section">
                <div class="cetesi-section-header">
                    <h2><span class="dashicons dashicons-groups"></span> Gerenciar Equipe</h2>
                    <p>Adicione e gerencie os professores da instituição.</p>
                </div>
                
                <div class="cetesi-section-content">
                    <div class="cetesi-button-grid">
                        <div class="cetesi-button-card">
                            <div class="cetesi-button-header">
                                <div class="cetesi-button-icon">
                                    <span class="dashicons dashicons-plus-alt"></span>
                                </div>
                                <div class="cetesi-button-title">
                                    <h3>Adicionar Professor</h3>
                                    <p>Cadastre novos professores com fotos e informações completas</p>
                                </div>
                                <div class="cetesi-button-toggle">
                                    <a href="<?php echo admin_url('admin.php?page=cetesi-add-professor'); ?>" class="button button-primary">
                                        Acessar
                                    </a>
                                </div>
                            </div>
                            
                            <div class="cetesi-button-fields">
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-info"></span>
                                        Funcionalidades Disponíveis
                                    </label>
                                    <div class="cetesi-field-help">
                                        • Upload de fotos da galeria<br>
                                        • Informações de contato<br>
                                        • Especialidades e formação<br>
                                        • Certificações e experiência<br>
                                        • Links para redes sociais
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="cetesi-button-card">
                            <div class="cetesi-button-header">
                                <div class="cetesi-button-icon">
                                    <span class="dashicons dashicons-admin-users"></span>
                                </div>
                                <div class="cetesi-button-title">
                                    <h3>Professores Cadastrados</h3>
                                    <p>Visualize, edite e gerencie todos os professores cadastrados</p>
                                </div>
                                <div class="cetesi-button-toggle">
                                    <a href="<?php echo admin_url('admin.php?page=cetesi-manage-professors'); ?>" class="button button-primary">
                                        Gerenciar
                                    </a>
                                </div>
                            </div>
                            
                            <div class="cetesi-button-fields">
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-info"></span>
                                        Funcionalidades Disponíveis
                                    </label>
                                    <div class="cetesi-field-help">
                                        • Visualizar lista completa de professores<br>
                                        • Editar informações existentes<br>
                                        • Alterar fotos dos professores<br>
                                        • Excluir professores cadastrados<br>
                                        • Reorganizar ordem de exibição
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="cetesi-section">
                <div class="cetesi-section-header">
                    <h2><span class="dashicons dashicons-book"></span> Gerenciar Cursos</h2>
                    <p>Configure os cursos oferecidos pela instituição.</p>
                </div>
                
                <div class="cetesi-section-content">
                    <div class="cetesi-button-grid">
                        <div class="cetesi-button-card">
                            <div class="cetesi-button-header">
                                <div class="cetesi-button-icon">
                                    <span class="dashicons dashicons-edit"></span>
                                </div>
                                <div class="cetesi-button-title">
                                    <h3>Cursos Técnicos</h3>
                                    <p>Gerencie os cursos técnicos oferecidos pelo CETESI</p>
                                </div>
                                <div class="cetesi-button-toggle">
                                    <a href="<?php echo admin_url('edit.php?post_type=curso'); ?>" class="button button-secondary">
                                        Acessar
                                    </a>
                                    <?php if (!get_option('cetesi_real_courses_created')) : ?>
                                    <a href="<?php echo admin_url('admin.php?page=cetesi-content&action=create_courses'); ?>" class="button button-primary" style="margin-left: 10px;">
                                        Criar Cursos Reais
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="cetesi-button-fields">
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-info"></span>
                                        Funcionalidades Disponíveis
                                    </label>
                                    <div class="cetesi-field-help">
                                        • Criação e edição de cursos<br>
                                        • Upload de imagens e materiais<br>
                                        • Configuração de categorias<br>
                                        • Gestão de conteúdo programático<br>
                                        • Controle de visibilidade
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Seção Notícias -->
            <div class="cetesi-section">
                <div class="cetesi-section-header">
                    <h2><span class="dashicons dashicons-megaphone"></span> Gerenciar Notícias</h2>
                    <p>Publique e gerencie notícias e atualizações do site.</p>
                </div>
                
                <div class="cetesi-section-content">
                    <div class="cetesi-button-grid">
                        <div class="cetesi-button-card">
                            <div class="cetesi-button-header">
                                <div class="cetesi-button-icon">
                                    <span class="dashicons dashicons-admin-post"></span>
                                </div>
                                <div class="cetesi-button-title">
                                    <h3>Notícias e Posts</h3>
                                    <p>Gerencie as notícias e posts publicados no site</p>
                                </div>
                                <div class="cetesi-button-toggle">
                                    <a href="<?php echo admin_url('edit.php'); ?>" class="button button-secondary">
                                        Acessar
                                    </a>
                                </div>
                            </div>
                            
                            <div class="cetesi-button-fields">
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-info"></span>
                                        Funcionalidades Disponíveis
                                    </label>
                                    <div class="cetesi-field-help">
                                        • Criação de posts e notícias<br>
                                        • Editor visual completo<br>
                                        • Upload de mídia<br>
                                        • Categorização e tags<br>
                                        • Agendamento de publicações
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
    .cetesi-customization-page {
        max-width: 1200px;
        margin: 20px auto;
    }
    
    .cetesi-page-header {
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
        color: white;
        padding: 30px;
        border-radius: 12px;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.3);
    }
    
    .cetesi-page-header h1 {
        margin: 0 0 10px 0;
        font-size: 28px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .cetesi-page-header .dashicons {
        font-size: 32px;
    }
    
    .cetesi-page-description {
        margin: 0;
        font-size: 16px;
        opacity: 0.9;
    }
    
    .cetesi-sections {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
    
    .cetesi-section {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .cetesi-section-header {
        background: #f8f9fa;
        padding: 25px 30px;
        border-bottom: 1px solid #e1e5e9;
    }
    
    .cetesi-section-header h2 {
        margin: 0 0 8px 0;
        font-size: 20px;
        font-weight: 600;
        color: #1d2327;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .cetesi-section-header p {
        margin: 0;
        color: #646970;
        font-size: 14px;
    }
    
    .cetesi-section-content {
        padding: 30px;
    }
    
    .cetesi-button-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        margin-bottom: 30px;
    }
    
    .cetesi-button-card {
        background: #f8f9fa;
        border: 2px solid #e1e5e9;
        border-radius: 12px;
        padding: 25px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .cetesi-button-card:hover {
        border-color: #2563eb;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.1);
        transform: translateY(-2px);
    }
    
    .cetesi-button-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
    }
    
    .cetesi-button-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .cetesi-button-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .cetesi-button-icon .dashicons {
        color: white;
        font-size: 24px;
    }
    
    .cetesi-button-title {
        flex: 1;
    }
    
    .cetesi-button-title h3 {
        margin: 0 0 5px 0;
        font-size: 18px;
        font-weight: 600;
        color: #1d2327;
    }
    
    .cetesi-button-title p {
        margin: 0;
        color: #646970;
        font-size: 13px;
    }
    
    .cetesi-button-toggle {
        flex-shrink: 0;
    }
    
    .cetesi-button-fields {
        opacity: 1;
        pointer-events: auto;
        transition: all 0.3s ease;
    }
    
    .cetesi-field-group {
        margin-bottom: 20px;
    }
    
    .cetesi-field-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #1d2327;
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .cetesi-field-label .dashicons {
        color: #2563eb;
        font-size: 16px;
    }
    
    .cetesi-field-help {
        background: #f0f9ff;
        border: 1px solid #bae6fd;
        border-radius: 8px;
        padding: 15px;
        color: #0369a1;
        font-size: 13px;
        line-height: 1.5;
    }
    
    /* Responsividade */
    @media (max-width: 1024px) {
        .cetesi-button-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        
        .cetesi-button-card {
            min-height: 200px;
        }
        
        .cetesi-button-header {
            flex-direction: row;
            align-items: center;
            gap: 15px;
        }
        
        .cetesi-button-title h3 {
            font-size: 1.1rem;
        }
        
        .cetesi-button-title p {
            font-size: 0.85rem;
        }
    }
    
    /* Mobile Responsive */
    @media (max-width: 768px) {
        .cetesi-page-header {
            padding: 20px;
            margin: 0 -20px 20px -20px;
        }
        
        .cetesi-page-header h1 {
            font-size: 1.5rem;
        }
        
        .cetesi-page-description {
            font-size: 0.9rem;
        }
        
        .cetesi-section-content {
            padding: 20px;
        }
        
        .cetesi-button-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .cetesi-button-card {
            min-height: auto;
            padding: 20px;
        }
        
        .cetesi-button-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .cetesi-button-icon {
            align-self: flex-start;
        }
        
        .cetesi-button-title {
            text-align: left;
        }
        
        .cetesi-button-title h3 {
            font-size: 1rem;
            margin-bottom: 5px;
        }
        
        .cetesi-button-title p {
            font-size: 0.8rem;
        }
        
        .cetesi-button-toggle {
            align-self: flex-end;
            margin-top: -40px;
        }
        
        .cetesi-field-group {
            margin-bottom: 15px;
        }
        
        .cetesi-field-label {
            font-size: 0.9rem;
        }
        
        .cetesi-field-help {
            font-size: 0.75rem;
            padding: 12px;
        }
    }
    </style>
    <?php
}

/**
 * Página de Adicionar Professor
 */
function cetesi_add_professor_page() {
    // Processar formulário
    if (isset($_POST['submit_professor']) && wp_verify_nonce($_POST['professor_nonce'], 'add_professor')) {
        $professores = get_option('cetesi_professores', array());
        
        // Processar upload da foto com validação rigorosa
        $foto_id = 0;
        if (!empty($_FILES['foto_professor']['name'])) {
            // Validar arquivo antes do upload
            $file_validation = cetesi_validate_file_upload($_FILES['foto_professor']);
            
            if (!$file_validation['success']) {
                cetesi_log_security_event('PROFESSOR_UPLOAD_ERROR', $file_validation['error'], 'WARNING');
                echo '<div class="notice notice-error"><p>Erro no upload: ' . $file_validation['error'] . '</p></div>';
                return;
            }
            
            // Verificar rate limiting para uploads
            $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'unknown';
            if (!cetesi_check_rate_limit('file_upload', $ip, 5, 600)) { // 5 uploads em 10 minutos
                cetesi_log_security_event('PROFESSOR_UPLOAD_RATE_LIMIT', 'Rate limit exceeded', 'WARNING');
                echo '<div class="notice notice-error"><p>Muitos uploads. Aguarde 10 minutos.</p></div>';
                return;
            }
            
            $upload = wp_handle_upload($_FILES['foto_professor'], array('test_form' => false));
            
            if (!isset($upload['error'])) {
                // Verificação básica de arquivo
                if (!file_exists($upload['file']) || filesize($upload['file']) === 0) {
                    cetesi_log_security_event('PROFESSOR_UPLOAD_ERROR', 'Invalid file uploaded', 'WARNING');
                    if (file_exists($upload['file'])) {
                        unlink($upload['file']); // Remover arquivo inválido
                    }
                    echo '<div class="notice notice-error"><p>Arquivo inválido detectado.</p></div>';
                    return;
                }
                
                $attachment = array(
                    'post_mime_type' => $upload['type'],
                    'post_title' => sanitize_file_name(basename($upload['file'])),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                
                $foto_id = wp_insert_attachment($attachment, $upload['file']);
                
                if (!is_wp_error($foto_id)) {
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attach_data = wp_generate_attachment_metadata($foto_id, $upload['file']);
                    wp_update_attachment_metadata($foto_id, $attach_data);
                    
                    cetesi_log_security_event('PROFESSOR_UPLOAD_SUCCESS', 'File uploaded successfully: ' . $upload['file'], 'INFO');
                } else {
                    cetesi_log_security_event('PROFESSOR_UPLOAD_ERROR', 'Failed to create attachment', 'ERROR');
                }
            } else {
                cetesi_log_security_event('PROFESSOR_UPLOAD_ERROR', 'Upload error: ' . $upload['error'], 'ERROR');
                echo '<div class="notice notice-error"><p>Erro no upload: ' . $upload['error'] . '</p></div>';
                return;
            }
        }
        
        // Validar dados do professor com validação rigorosa
        $nome_validation = cetesi_validate_input($_POST['nome'] ?? '', 'text', 100, true);
        if (!$nome_validation['success']) {
            cetesi_log_security_event('PROFESSOR_VALIDATION_ERROR', 'Invalid name: ' . $nome_validation['error'], 'WARNING');
            echo '<div class="notice notice-error"><p>' . $nome_validation['error'] . '</p></div>';
            return;
        }
        
        $email_validation = cetesi_validate_input($_POST['email'] ?? '', 'email', 100, true);
        if (!$email_validation['success']) {
            cetesi_log_security_event('PROFESSOR_VALIDATION_ERROR', 'Invalid email: ' . $email_validation['error'], 'WARNING');
            echo '<div class="notice notice-error"><p>' . $email_validation['error'] . '</p></div>';
            return;
        }
        
        $experiencia_validation = cetesi_validate_input($_POST['experiencia'] ?? '', 'int', 2, true);
        if (!$experiencia_validation['success']) {
            cetesi_log_security_event('PROFESSOR_VALIDATION_ERROR', 'Invalid experience: ' . $experiencia_validation['error'], 'WARNING');
            echo '<div class="notice notice-error"><p>' . $experiencia_validation['error'] . '</p></div>';
            return;
        }
        
        $linkedin_validation = cetesi_validate_input($_POST['linkedin'] ?? '', 'url', 200, false);
        if (!$linkedin_validation['success'] && !empty($_POST['linkedin'])) {
            cetesi_log_security_event('PROFESSOR_VALIDATION_ERROR', 'Invalid LinkedIn: ' . $linkedin_validation['error'], 'WARNING');
            echo '<div class="notice notice-error"><p>' . $linkedin_validation['error'] . '</p></div>';
            return;
        }
        
        $novo_professor = array(
            'nome' => sanitize_text_field($nome_validation['data']),
            'especialidade' => sanitize_text_field($_POST['especialidade'] ?? ''),
            'formacao' => sanitize_text_field($_POST['formacao'] ?? ''),
            'experiencia' => intval($experiencia_validation['data']),
            'email' => sanitize_email($email_validation['data']),
            'linkedin' => !empty($_POST['linkedin']) ? esc_url_raw($linkedin_validation['data']) : '',
            'bio' => sanitize_textarea_field($_POST['bio'] ?? ''),
            'certificacoes' => sanitize_text_field($_POST['certificacoes'] ?? ''),
            'foto' => $foto_id,
            'created_at' => current_time('mysql'),
            'created_by' => get_current_user_id()
        );
        
        $professores[] = $novo_professor;
        update_option('cetesi_professores', $professores);
        
        echo '<div class="notice notice-success"><p>Professor adicionado com sucesso!</p></div>';
    }
    
    // Processar remoção
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['index'])) {
        $professores = get_option('cetesi_professores', array());
        $index = intval($_GET['index']);
        
        if (isset($professores[$index])) {
            unset($professores[$index]);
            $professores = array_values($professores); // Reindexar array
            update_option('cetesi_professores', $professores);
            echo '<div class="notice notice-success"><p>Professor removido com sucesso!</p></div>';
        }
    }
    
    $professores = get_option('cetesi_professores', array());
    ?>
    
    <div class="wrap cetesi-customization-page">
        <div class="cetesi-page-header">
            <h1><span class="dashicons dashicons-plus-alt"></span> Adicionar Professor</h1>
            <p class="cetesi-page-description">Cadastre novos professores com informações completas e fotos profissionais.</p>
        </div>
        
        <div class="cetesi-sections">
            <!-- Formulário Principal -->
            <div class="cetesi-section">
                <div class="cetesi-section-header">
                    <h2><span class="dashicons dashicons-admin-users"></span> Informações do Professor</h2>
                    <p>Preencha os dados pessoais e profissionais do professor.</p>
                </div>
                
                <div class="cetesi-section-content">
                    <form method="post" action="" class="cetesi-form" enctype="multipart/form-data">
                        <?php wp_nonce_field('add_professor', 'professor_nonce'); ?>
                        
                        <div class="cetesi-form-grid">
                            <!-- Nome Completo -->
                            <div class="cetesi-field-group">
                                <label class="cetesi-field-label">
                                    <span class="dashicons dashicons-admin-users"></span>
                                    Nome Completo *
                                </label>
                                <input type="text" name="nome" class="cetesi-field-input" placeholder="Ex: Dr. Maria Silva Santos" required />
                                <div class="cetesi-field-help">Digite o nome completo do professor</div>
                            </div>
                            
                            <!-- Especialidade -->
                            <div class="cetesi-field-group">
                                <label class="cetesi-field-label">
                                    <span class="dashicons dashicons-awards"></span>
                                    Especialidade *
                                </label>
                                <input type="text" name="especialidade" class="cetesi-field-input" placeholder="Ex: Enfermagem Clínica" required />
                                <div class="cetesi-field-help">Área de especialização do professor</div>
                            </div>
                            
                            <!-- Formação Acadêmica -->
                            <div class="cetesi-field-group">
                                <label class="cetesi-field-label">
                                    <span class="dashicons dashicons-graduation-cap"></span>
                                    Formação Acadêmica
                                </label>
                                <input type="text" name="formacao" class="cetesi-field-input" placeholder="Ex: Graduação em Enfermagem - UFDF" />
                                <div class="cetesi-field-help">Formação acadêmica completa</div>
                            </div>
                            
                            <!-- Experiência -->
                            <div class="cetesi-field-group">
                                <label class="cetesi-field-label">
                                    <span class="dashicons dashicons-clock"></span>
                                    Anos de Experiência
                                </label>
                                <input type="number" name="experiencia" class="cetesi-field-input" placeholder="Ex: 15" min="0" />
                                <div class="cetesi-field-help">Tempo de experiência na área</div>
                            </div>
                            
                            <!-- E-mail -->
                            <div class="cetesi-field-group">
                                <label class="cetesi-field-label">
                                    <span class="dashicons dashicons-email"></span>
                                    E-mail
                                </label>
                                <input type="email" name="email" class="cetesi-field-input" placeholder="Ex: maria.silva@cetesi.com.br" />
                                <div class="cetesi-field-help">E-mail para contato profissional</div>
                            </div>
                            
                            <!-- LinkedIn -->
                            <div class="cetesi-field-group">
                                <label class="cetesi-field-label">
                                    <span class="dashicons dashicons-admin-links"></span>
                                    LinkedIn
                                </label>
                                <input type="url" name="linkedin" class="cetesi-field-input" placeholder="Ex: https://linkedin.com/in/maria-silva" />
                                <div class="cetesi-field-help">Perfil profissional no LinkedIn</div>
                            </div>
                        </div>
                        
                        <!-- Foto do Professor -->
                        <div class="cetesi-field-group cetesi-field-full">
                            <label class="cetesi-field-label">
                                <span class="dashicons dashicons-camera"></span>
                                Foto do Professor
                            </label>
                            <div class="cetesi-media-field">
                                <input type="file" name="foto_professor" id="foto_professor" accept="image/*" class="cetesi-field-input" />
                                <div class="cetesi-field-help">Selecione uma foto profissional (JPG, PNG, GIF - máximo 2MB)</div>
                            </div>
                        </div>
                        
                        <!-- Biografia -->
                        <div class="cetesi-field-group cetesi-field-full">
                            <label class="cetesi-field-label">
                                <span class="dashicons dashicons-edit"></span>
                                Biografia
                            </label>
                            <textarea name="bio" class="cetesi-field-textarea" rows="4" placeholder="Descreva a experiência profissional, conquistas e especialidades do professor..."></textarea>
                            <div class="cetesi-field-help">Biografia profissional resumida</div>
                        </div>
                        
                        <!-- Certificações -->
                        <div class="cetesi-field-group cetesi-field-full">
                            <label class="cetesi-field-label">
                                <span class="dashicons dashicons-awards"></span>
                                Certificações
                            </label>
                            <input type="text" name="certificacoes" class="cetesi-field-input" placeholder="Ex: COREN-DF, Pós-graduação em UTI, Certificação em Enfermagem Oncológica" />
                            <div class="cetesi-field-help">Separe as certificações por vírgula</div>
                        </div>
                        
                        <!-- Botões de Ação -->
                        <div class="cetesi-form-actions">
                            <button type="submit" name="submit_professor" class="button button-primary button-large cetesi-save-button">
                                <span class="dashicons dashicons-plus-alt"></span>
                                Adicionar Professor
                            </button>
                            <a href="<?php echo admin_url('admin.php?page=cetesi-content'); ?>" class="button button-secondary">
                                <span class="dashicons dashicons-arrow-left-alt"></span>
                                Voltar ao Conteúdo
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Lista de Professores -->
            <?php if (!empty($professores)) : ?>
            <div class="cetesi-section">
                <div class="cetesi-section-header">
                    <h2><span class="dashicons dashicons-groups"></span> Professores Cadastrados</h2>
                    <p>Gerencie os professores já cadastrados no sistema.</p>
                </div>
                
                <div class="cetesi-section-content">
                    <div class="cetesi-professores-grid">
                        <?php foreach ($professores as $index => $professor) : ?>
                        <div class="cetesi-professor-item">
                            <div class="professor-avatar">
                                <?php if (!empty($professor['foto'])) : ?>
                                    <?php 
                                    $foto_url = wp_get_attachment_image_url($professor['foto'], 'thumbnail');
                                    if ($foto_url) : ?>
                                        <img src="<?php echo esc_url($foto_url); ?>" alt="<?php echo esc_attr($professor['nome']); ?>" />
                                    <?php else : ?>
                                        <span class="dashicons dashicons-admin-users"></span>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <span class="dashicons dashicons-admin-users"></span>
                                <?php endif; ?>
                            </div>
                            <div class="professor-info">
                                <h3><?php echo esc_html($professor['nome']); ?></h3>
                                <p class="professor-specialty"><?php echo esc_html($professor['especialidade']); ?></p>
                                <p class="professor-experience"><?php echo esc_html($professor['experiencia']); ?> anos de experiência</p>
                                <?php if (!empty($professor['email'])) : ?>
                                    <p class="professor-email"><?php echo esc_html($professor['email']); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="professor-actions">
                                <a href="<?php echo admin_url('admin.php?page=cetesi-add-professor&action=delete&index=' . $index); ?>" 
                                   class="button button-small button-link-delete" 
                                   onclick="return confirm('Tem certeza que deseja remover este professor?')">
                                    <span class="dashicons dashicons-trash"></span>
                                    Remover
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <style>
    .cetesi-customization-page {
        max-width: 1200px;
        margin: 20px auto;
    }
    
    .cetesi-page-header {
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
        color: white;
        padding: 30px;
        border-radius: 12px;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.3);
    }
    
    .cetesi-page-header h1 {
        margin: 0 0 10px 0;
        font-size: 28px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .cetesi-page-header .dashicons {
        font-size: 32px;
    }
    
    .cetesi-page-description {
        margin: 0;
        font-size: 16px;
        opacity: 0.9;
    }
    
    .cetesi-sections {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
    
    .cetesi-section {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .cetesi-section-header {
        background: #f8f9fa;
        padding: 25px 30px;
        border-bottom: 1px solid #e1e5e9;
    }
    
    .cetesi-section-header h2 {
        margin: 0 0 8px 0;
        font-size: 20px;
        font-weight: 600;
        color: #1d2327;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .cetesi-section-header p {
        margin: 0;
        color: #646970;
        font-size: 14px;
    }
    
    .cetesi-section-content {
        padding: 30px;
    }
    
    .cetesi-form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        margin-bottom: 30px;
    }
    
    .cetesi-field-group {
        margin-bottom: 25px;
    }
    
    .cetesi-field-full {
        grid-column: 1 / -1;
    }
    
    .cetesi-field-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #1d2327;
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .cetesi-field-label .dashicons {
        color: #2563eb;
        font-size: 16px;
    }
    
    .cetesi-field-input,
    .cetesi-field-textarea {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e1e5e9;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
    }
    
    .cetesi-field-input:focus,
    .cetesi-field-textarea:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }
    
    .cetesi-field-input::placeholder,
    .cetesi-field-textarea::placeholder {
        color: #9ca3af;
        font-style: italic;
    }
    
    .cetesi-field-help {
        margin-top: 6px;
        font-size: 12px;
        color: #6b7280;
        font-style: italic;
    }
    
    .cetesi-media-field {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .cetesi-media-preview {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background: #f8f9fa;
        border: 2px dashed #d1d5db;
        border-radius: 8px;
    }
    
    .cetesi-media-preview img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #e5e7eb;
    }
    
    .cetesi-form-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-start;
        align-items: center;
        padding-top: 25px;
        border-top: 1px solid #e1e5e9;
    }
    
    .cetesi-save-button {
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%) !important;
        border: none !important;
        color: white !important;
        font-weight: 600 !important;
        padding: 12px 24px !important;
        border-radius: 8px !important;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3) !important;
        transition: all 0.3s ease !important;
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
    }
    
    .cetesi-save-button:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.4) !important;
    }
    
    .cetesi-save-button .dashicons {
        font-size: 18px !important;
    }
    
    .cetesi-professores-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }
    
    .cetesi-professor-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background: #f8f9fa;
        border: 2px solid #e1e5e9;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    
    .cetesi-professor-item:hover {
        border-color: #2563eb;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.1);
        transform: translateY(-2px);
    }
    
    .professor-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        overflow: hidden;
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .professor-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .professor-avatar .dashicons {
        color: white;
        font-size: 24px;
    }
    
    .professor-info {
        flex: 1;
    }
    
    .professor-info h3 {
        margin: 0 0 5px 0;
        font-size: 16px;
        font-weight: 600;
        color: #1d2327;
    }
    
    .professor-info p {
        margin: 0 0 3px 0;
        font-size: 13px;
        color: #6b7280;
    }
    
    .professor-specialty {
        color: #2563eb !important;
        font-weight: 500;
    }
    
    .professor-actions {
        flex-shrink: 0;
    }
    
    /* Responsividade */
    @media (max-width: 768px) {
        .cetesi-page-header {
            padding: 20px;
            margin: 0 -20px 20px -20px;
        }
        
        .cetesi-page-header h1 {
            font-size: 1.5rem;
        }
        
        .cetesi-page-description {
            font-size: 0.9rem;
        }
        
        .cetesi-section-content {
            padding: 20px;
        }
        
        .cetesi-form-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .cetesi-form-actions {
            flex-direction: column;
            align-items: stretch;
            gap: 10px;
        }
        
        .cetesi-save-button {
            width: 100%;
            justify-content: center;
        }
        
        .cetesi-professores-grid {
            grid-template-columns: 1fr;
        }
        
        .cetesi-professor-item {
            flex-direction: column;
            text-align: center;
        }
        
        .professor-avatar {
            width: 80px;
            height: 80px;
        }
    }
    </style>
    
    <?php
}

/**
 * Página de Gerenciar Professores
 */
function cetesi_manage_professors_page() {
    // Processar exclusão
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['index'])) {
        $professores = get_option('cetesi_professores', array());
        $index = intval($_GET['index']);
        
        if (isset($professores[$index])) {
            // Remover foto se existir
            if (!empty($professores[$index]['foto'])) {
                wp_delete_attachment($professores[$index]['foto'], true);
            }
            
            unset($professores[$index]);
            $professores = array_values($professores); // Reindexar array
            update_option('cetesi_professores', $professores);
            echo '<div class="notice notice-success"><p>Professor removido com sucesso!</p></div>';
        }
    }
    
    // Processar edição
    if (isset($_POST['edit_professor']) && wp_verify_nonce($_POST['professor_edit_nonce'], 'edit_professor')) {
        $professores = get_option('cetesi_professores', array());
        $index = intval($_POST['professor_index']);
        
        if (isset($professores[$index])) {
            // Processar upload da nova foto se enviada
            $foto_id = $professores[$index]['foto']; // Manter foto atual por padrão
            
            if (!empty($_FILES['foto_professor']['name'])) {
                // Remover foto antiga se existir
                if (!empty($professores[$index]['foto'])) {
                    wp_delete_attachment($professores[$index]['foto'], true);
                }
                
                $upload = wp_handle_upload($_FILES['foto_professor'], array('test_form' => false));
                
                if (!isset($upload['error'])) {
                    $attachment = array(
                        'post_mime_type' => $upload['type'],
                        'post_title' => sanitize_file_name(basename($upload['file'])),
                        'post_content' => '',
                        'post_status' => 'inherit'
                    );
                    
                    $foto_id = wp_insert_attachment($attachment, $upload['file']);
                    
                    if (!is_wp_error($foto_id)) {
                        require_once(ABSPATH . 'wp-admin/includes/image.php');
                        $attach_data = wp_generate_attachment_metadata($foto_id, $upload['file']);
                        wp_update_attachment_metadata($foto_id, $attach_data);
                    }
                }
            }
            
            // Atualizar dados do professor
            $professores[$index] = array(
                'nome' => sanitize_text_field($_POST['nome']),
                'especialidade' => sanitize_text_field($_POST['especialidade']),
                'formacao' => sanitize_text_field($_POST['formacao']),
                'experiencia' => intval($_POST['experiencia']),
                'email' => sanitize_email($_POST['email']),
                'linkedin' => esc_url_raw($_POST['linkedin']),
                'bio' => sanitize_textarea_field($_POST['bio']),
                'certificacoes' => sanitize_text_field($_POST['certificacoes']),
                'foto' => $foto_id
            );
            
            update_option('cetesi_professores', $professores);
            echo '<div class="notice notice-success"><p>Professor atualizado com sucesso!</p></div>';
        }
    }
    
    $professores = get_option('cetesi_professores', array());
    ?>
    
    <div class="wrap cetesi-customization-page">
        <div class="cetesi-page-header">
            <h1><span class="dashicons dashicons-admin-users"></span> Gerenciar Professores</h1>
            <p class="cetesi-page-description">Visualize, edite e gerencie todos os professores cadastrados no sistema.</p>
        </div>
        
        <div class="cetesi-sections">
            <?php if (!empty($professores)) : ?>
                <!-- Lista de Professores -->
                <div class="cetesi-section">
                    <div class="cetesi-section-header">
                        <h2><span class="dashicons dashicons-groups"></span> Professores Cadastrados</h2>
                        <p>Gerencie os professores já cadastrados no sistema.</p>
                    </div>
                    
                    <div class="cetesi-section-content">
                        <div class="cetesi-professores-grid">
                            <?php foreach ($professores as $index => $professor) : ?>
                            <div class="cetesi-professor-item">
                                <div class="professor-header">
                                    <div class="professor-avatar">
                                        <?php if (!empty($professor['foto'])) : ?>
                                            <?php 
                                            $foto_url = wp_get_attachment_image_url($professor['foto'], 'thumbnail');
                                            if ($foto_url) : ?>
                                                <img src="<?php echo esc_url($foto_url); ?>" alt="<?php echo esc_attr($professor['nome']); ?>" />
                                            <?php else : ?>
                                                <span class="dashicons dashicons-admin-users"></span>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <span class="dashicons dashicons-admin-users"></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="professor-info">
                                        <h3><?php echo esc_html($professor['nome']); ?></h3>
                                        <p class="professor-specialty"><?php echo esc_html($professor['especialidade']); ?></p>
                                        <p class="professor-experience"><?php echo esc_html($professor['experiencia']); ?> anos de experiência</p>
                                        <?php if (!empty($professor['email'])) : ?>
                                            <p class="professor-email"><?php echo esc_html($professor['email']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="professor-actions">
                                    <button type="button" class="button button-primary edit-professor" data-index="<?php echo $index; ?>">
                                        <span class="dashicons dashicons-edit"></span>
                                        Editar
                                    </button>
                                    <a href="<?php echo admin_url('admin.php?page=cetesi-manage-professors&action=delete&index=' . $index); ?>" 
                                       class="button button-link-delete" 
                                       onclick="return confirm('Tem certeza que deseja remover este professor?')">
                                        <span class="dashicons dashicons-trash"></span>
                                        Excluir
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Modal de Edição -->
                <div id="edit-professor-modal" class="cetesi-modal" style="display: none;">
                    <div class="cetesi-modal-content">
                        <div class="cetesi-modal-header">
                            <h2><span class="dashicons dashicons-edit"></span> Editar Professor</h2>
                            <button type="button" class="cetesi-modal-close">&times;</button>
                        </div>
                        
                        <form method="post" action="" class="cetesi-form" enctype="multipart/form-data">
                            <?php wp_nonce_field('edit_professor', 'professor_edit_nonce'); ?>
                            <input type="hidden" name="professor_index" id="professor_index" value="" />
                            
                            <div class="cetesi-form-grid">
                                <!-- Nome Completo -->
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-admin-users"></span>
                                        Nome Completo *
                                    </label>
                                    <input type="text" name="nome" id="edit_nome" class="cetesi-field-input" required />
                                </div>
                                
                                <!-- Especialidade -->
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-awards"></span>
                                        Especialidade *
                                    </label>
                                    <input type="text" name="especialidade" id="edit_especialidade" class="cetesi-field-input" required />
                                </div>
                                
                                <!-- Formação Acadêmica -->
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-graduation-cap"></span>
                                        Formação Acadêmica
                                    </label>
                                    <input type="text" name="formacao" id="edit_formacao" class="cetesi-field-input" />
                                </div>
                                
                                <!-- Experiência -->
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-clock"></span>
                                        Anos de Experiência
                                    </label>
                                    <input type="number" name="experiencia" id="edit_experiencia" class="cetesi-field-input" min="0" />
                                </div>
                                
                                <!-- E-mail -->
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-email"></span>
                                        E-mail
                                    </label>
                                    <input type="email" name="email" id="edit_email" class="cetesi-field-input" />
                                </div>
                                
                                <!-- LinkedIn -->
                                <div class="cetesi-field-group">
                                    <label class="cetesi-field-label">
                                        <span class="dashicons dashicons-admin-links"></span>
                                        LinkedIn
                                    </label>
                                    <input type="url" name="linkedin" id="edit_linkedin" class="cetesi-field-input" />
                                </div>
                            </div>
                            
                            <!-- Foto do Professor -->
                            <div class="cetesi-field-group cetesi-field-full">
                                <label class="cetesi-field-label">
                                    <span class="dashicons dashicons-camera"></span>
                                    Nova Foto (opcional)
                                </label>
                                <input type="file" name="foto_professor" accept="image/*" class="cetesi-field-input" />
                                <div class="cetesi-field-help">Deixe em branco para manter a foto atual</div>
                            </div>
                            
                            <!-- Biografia -->
                            <div class="cetesi-field-group cetesi-field-full">
                                <label class="cetesi-field-label">
                                    <span class="dashicons dashicons-edit"></span>
                                    Biografia
                                </label>
                                <textarea name="bio" id="edit_bio" class="cetesi-field-textarea" rows="4"></textarea>
                            </div>
                            
                            <!-- Certificações -->
                            <div class="cetesi-field-group cetesi-field-full">
                                <label class="cetesi-field-label">
                                    <span class="dashicons dashicons-awards"></span>
                                    Certificações
                                </label>
                                <input type="text" name="certificacoes" id="edit_certificacoes" class="cetesi-field-input" />
                                <div class="cetesi-field-help">Separe as certificações por vírgula</div>
                            </div>
                            
                            <!-- Botões de Ação -->
                            <div class="cetesi-form-actions">
                                <button type="submit" name="edit_professor" class="button button-primary button-large cetesi-save-button">
                                    <span class="dashicons dashicons-saved"></span>
                                    Salvar Alterações
                                </button>
                                <button type="button" class="button button-secondary cetesi-modal-close">
                                    <span class="dashicons dashicons-no-alt"></span>
                                    Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
            <?php else : ?>
                <!-- Mensagem quando não há professores -->
                <div class="cetesi-section">
                    <div class="cetesi-section-content">
                        <div class="no-results">
                            <div class="no-results-content">
                                <i class="fas fa-users-slash"></i>
                                <h3>Nenhum professor encontrado</h3>
                                <p>Parece que ainda não há professores cadastrados. Adicione-os através do botão "Adicionar Professor"!</p>
                                <a href="<?php echo admin_url('admin.php?page=cetesi-add-professor'); ?>" class="button button-primary">
                                    <span class="dashicons dashicons-plus-alt"></span>
                                    Adicionar Primeiro Professor
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Botão Voltar -->
        <div class="cetesi-form-actions" style="margin-top: 30px;">
            <a href="<?php echo admin_url('admin.php?page=cetesi-content'); ?>" class="button button-secondary">
                <span class="dashicons dashicons-arrow-left-alt"></span>
                Voltar ao Conteúdo
            </a>
        </div>
    </div>
    
    <style>
    .cetesi-customization-page {
        max-width: 1200px;
        margin: 20px auto;
    }
    
    .cetesi-page-header {
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
        color: white;
        padding: 30px;
        border-radius: 12px;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.3);
    }
    
    .cetesi-page-header h1 {
        margin: 0 0 10px 0;
        font-size: 28px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .cetesi-page-header .dashicons {
        font-size: 32px;
    }
    
    .cetesi-page-description {
        margin: 0;
        font-size: 16px;
        opacity: 0.9;
    }
    
    .cetesi-sections {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
    
    .cetesi-section {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .cetesi-section-header {
        background: #f8f9fa;
        padding: 25px 30px;
        border-bottom: 1px solid #e1e5e9;
    }
    
    .cetesi-section-header h2 {
        margin: 0 0 8px 0;
        font-size: 20px;
        font-weight: 600;
        color: #1d2327;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .cetesi-section-header p {
        margin: 0;
        color: #646970;
        font-size: 14px;
    }
    
    .cetesi-section-content {
        padding: 30px;
    }
    
    .cetesi-professores-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 25px;
    }
    
    .cetesi-professor-item {
        background: white;
        border: 2px solid #e1e5e9;
        border-radius: 16px;
        padding: 25px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    
    .cetesi-professor-item:hover {
        border-color: #2563eb;
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.15);
        transform: translateY(-3px);
    }
    
    .cetesi-professor-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #2563eb, #10b981);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .cetesi-professor-item:hover::before {
        opacity: 1;
    }
    
    .professor-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .professor-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        border: 3px solid white;
    }
    
    .professor-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .professor-avatar .dashicons {
        color: white;
        font-size: 32px;
    }
    
    .professor-info {
        flex: 1;
    }
    
    .professor-info h3 {
        margin: 0 0 8px 0;
        font-size: 20px;
        font-weight: 700;
        color: #1d2327;
        line-height: 1.2;
    }
    
    .professor-specialty {
        color: #2563eb !important;
        font-weight: 600;
        font-size: 16px;
        margin: 0 0 5px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .professor-specialty::before {
        content: '🎓';
        font-size: 14px;
    }
    
    .professor-experience {
        color: #10b981 !important;
        font-weight: 500;
        font-size: 14px;
        margin: 0 0 5px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .professor-experience::before {
        content: '⏱️';
        font-size: 12px;
    }
    
    .professor-email {
        color: #6b7280 !important;
        font-size: 14px;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .professor-email::before {
        content: '📧';
        font-size: 12px;
    }
    
    .professor-actions {
        display: flex;
        gap: 12px;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #f1f5f9;
    }
    
    .professor-actions .button {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 600;
        padding: 12px 16px;
        border-radius: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .professor-actions .button-primary {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        border: none;
        color: white;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
    }
    
    .professor-actions .button-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
        color: white;
    }
    
    .professor-actions .button-link-delete {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        border: none;
        color: white;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
    }
    
    .professor-actions .button-link-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
        color: white;
    }
    
    .professor-actions .dashicons {
        font-size: 16px;
    }
    
    .no-results {
        text-align: center;
        padding: 80px 40px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-radius: 16px;
        border: 2px dashed #cbd5e1;
        margin: 40px 0;
    }
    
    .no-results-content i {
        font-size: 64px;
        color: #94a3b8;
        margin-bottom: 24px;
        opacity: 0.8;
    }
    
    .no-results-content h3 {
        margin: 0 0 12px 0;
        color: #334155;
        font-size: 28px;
        font-weight: 700;
    }
    
    .no-results-content p {
        margin: 0 0 24px 0;
        color: #64748b;
        font-size: 18px;
        line-height: 1.6;
    }
    
    .no-results-content .button {
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
        border: none;
        color: white;
        padding: 14px 28px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }
    
    .no-results-content .button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        color: white;
    }
    
    .cetesi-form-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-start;
        align-items: center;
        padding-top: 25px;
        border-top: 1px solid #e1e5e9;
        margin-top: 30px;
    }
    
    .cetesi-save-button {
        background: linear-gradient(135deg, #2563eb 0%, #10b981 100%) !important;
        border: none !important;
        color: white !important;
        font-weight: 600 !important;
        padding: 12px 24px !important;
        border-radius: 8px !important;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3) !important;
        transition: all 0.3s ease !important;
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
    }
    
    .cetesi-save-button:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.4) !important;
    }
    
    .cetesi-save-button .dashicons {
        font-size: 18px !important;
    }
    
    /* Modal Styles */
    .cetesi-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(5px);
    }
    
    .cetesi-modal-content {
        background: white;
        border-radius: 16px;
        max-width: 900px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        border: 1px solid #e1e5e9;
    }
    
    .cetesi-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 25px 30px;
        border-bottom: 1px solid #e1e5e9;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-radius: 16px 16px 0 0;
    }
    
    .cetesi-modal-header h2 {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: #1d2327;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .cetesi-modal-close {
        background: none;
        border: none;
        font-size: 28px;
        cursor: pointer;
        color: #64748b;
        padding: 0;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    
    .cetesi-modal-close:hover {
        background: #e2e8f0;
        color: #1e293b;
        transform: scale(1.1);
    }
    
    .cetesi-modal form {
        padding: 30px;
    }
    
    .cetesi-form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        margin-bottom: 30px;
    }
    
    .cetesi-field-group {
        margin-bottom: 25px;
    }
    
    .cetesi-field-full {
        grid-column: 1 / -1;
    }
    
    .cetesi-field-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #1d2327;
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .cetesi-field-label .dashicons {
        color: #2563eb;
        font-size: 16px;
    }
    
    .cetesi-field-input,
    .cetesi-field-textarea {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e1e5e9;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
    }
    
    .cetesi-field-input:focus,
    .cetesi-field-textarea:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }
    
    .cetesi-field-input::placeholder,
    .cetesi-field-textarea::placeholder {
        color: #9ca3af;
        font-style: italic;
    }
    
    .cetesi-field-help {
        margin-top: 6px;
        font-size: 12px;
        color: #6b7280;
        font-style: italic;
    }
    
    /* Responsividade */
    @media (max-width: 1024px) {
        .cetesi-professores-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
    }
    
    @media (max-width: 768px) {
        .cetesi-page-header {
            padding: 20px;
            margin: 0 -20px 20px -20px;
        }
        
        .cetesi-page-header h1 {
            font-size: 1.5rem;
        }
        
        .cetesi-page-description {
            font-size: 0.9rem;
        }
        
        .cetesi-section-content {
            padding: 20px;
        }
        
        .cetesi-professores-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .professor-header {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .professor-avatar {
            width: 100px;
            height: 100px;
        }
        
        .professor-actions {
            flex-direction: column;
            gap: 10px;
        }
        
        .cetesi-form-actions {
            flex-direction: column;
            align-items: stretch;
            gap: 10px;
        }
        
        .cetesi-save-button {
            width: 100%;
            justify-content: center;
        }
        
        .cetesi-modal-content {
            width: 95%;
            margin: 20px;
        }
        
        .cetesi-modal form {
            padding: 20px;
        }
        
        .cetesi-form-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .no-results {
            padding: 60px 20px;
        }
        
        .no-results-content h3 {
            font-size: 24px;
        }
        
        .no-results-content p {
            font-size: 16px;
        }
    }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        var professores = <?php echo json_encode($professores); ?>;
        
        // Abrir modal de edição
        $('.edit-professor').click(function() {
            var index = $(this).data('index');
            var professor = professores[index];
            
            // Preencher campos
            $('#professor_index').val(index);
            $('#edit_nome').val(professor.nome);
            $('#edit_especialidade').val(professor.especialidade);
            $('#edit_formacao').val(professor.formacao);
            $('#edit_experiencia').val(professor.experiencia);
            $('#edit_email').val(professor.email);
            $('#edit_linkedin').val(professor.linkedin);
            $('#edit_bio').val(professor.bio);
            $('#edit_certificacoes').val(professor.certificacoes);
            
            $('#edit-professor-modal').show();
        });
        
        // Fechar modal
        $('.cetesi-modal-close').click(function() {
            $('#edit-professor-modal').hide();
        });
        
        // Fechar modal clicando fora
        $('#edit-professor-modal').click(function(e) {
            if (e.target === this) {
                $(this).hide();
            }
        });
    });
    </script>
    <?php
}

// Interceptar URLs limpas para páginas específicas
function cetesi_intercept_clean_urls() {
    $request_uri = sanitize_text_field($_SERVER['REQUEST_URI'] ?? '');
    
    // Lista de páginas que devem ter URLs limpas
    $paginas_limpas = ['sobre', 'contato', 'equipe', 'cursos'];
    
    foreach ($paginas_limpas as $slug) {
        // Verificar se é exatamente /cetesi/slug/ (sem index.php)
        if (preg_match('#^/cetesi/' . $slug . '/?$#', $request_uri)) {
            // Buscar a página
            $pagina = get_page_by_path($slug);
            
            if ($pagina) {
                // Configurar variáveis globais do WordPress corretamente
                global $wp_query, $post;
                
                $post = $pagina;
                $wp_query->is_page = true;
                $wp_query->is_singular = true;
                $wp_query->is_home = false;
                $wp_query->is_archive = false;
                $wp_query->is_404 = false;
                $wp_query->queried_object = $pagina;
                $wp_query->queried_object_id = $pagina->ID;
                $wp_query->post_count = 1;
                $wp_query->found_posts = 1;
                
                // Definir o título da página corretamente
                add_filter('wp_title', function($title) use ($pagina) {
                    return get_the_title($pagina->ID) . ' - ' . get_bloginfo('name');
                });
                
                // Carregar o template correto
                $template_file = "page-$slug.php";
                $template_path = get_template_directory() . '/' . $template_file;
                
                if (file_exists($template_path)) {
                    include($template_path);
                    exit;
                }
            }
        }
    }
}
// add_action('template_redirect', 'cetesi_intercept_clean_urls', 1);

// Corrigir título das páginas específicas
function cetesi_fix_pages_title($title) {
    $paginas_especificas = ['sobre', 'contato', 'equipe', 'cursos'];
    
    foreach ($paginas_especificas as $slug) {
        if (is_page($slug)) {
            return get_the_title() . ' - ' . get_bloginfo('name');
        }
    }
    return $title;
}
add_filter('wp_title', 'cetesi_fix_pages_title');
add_filter('document_title_parts', function($title_parts) {
    $paginas_especificas = ['sobre', 'contato', 'equipe', 'cursos'];
    
    foreach ($paginas_especificas as $slug) {
        if (is_page($slug)) {
            $title_parts['title'] = get_the_title();
            break;
        }
    }
    return $title_parts;
});

// Debug: Verificar se os templates estão sendo carregados (desabilitado temporariamente)
/*
function cetesi_debug_template_loading($template) {
    if (is_page()) {
        $page_slug = get_post_field('post_name', get_the_ID());
        error_log("CETESI Debug - Carregando template para página: $page_slug, Template: $template");
    }
    return $template;
}
add_filter('template_include', 'cetesi_debug_template_loading');
*/


// Forçar template correto para página "cursos" (removido temporariamente)
/*
function cetesi_force_cursos_template($template) {
    if (is_page('cursos')) {
        $custom_template = get_template_directory() . '/page-cursos.php';
        if (file_exists($custom_template)) {
            return $custom_template;
        }
    }
    return $template;
}
add_filter('page_template', 'cetesi_force_cursos_template');
*/

// Limpar rewrite rules quando o tema for ativado
function cetesi_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'cetesi_flush_rewrite_rules');

// Adicionar rewrite rule personalizada para página cursos (removido temporariamente)
/*
function cetesi_add_cursos_rewrite_rule() {
    add_rewrite_rule('^cursos/?$', 'index.php?pagename=cursos', 'top');
}
add_action('init', 'cetesi_add_cursos_rewrite_rule');
*/

// Forçar flush das rewrite rules quando necessário (removido temporariamente)
/*
function cetesi_force_flush_rewrite_rules() {
    if (get_option('cetesi_rewrite_flushed') !== '1') {
        flush_rewrite_rules();
        update_option('cetesi_rewrite_flushed', '1');
    }
}
add_action('init', 'cetesi_force_flush_rewrite_rules', 999);
*/
?>
