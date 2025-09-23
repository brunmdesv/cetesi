<?php
/**
 * Sistema de Unidades CETESI
 * 
 * @package CETESI
 */

// ===== SISTEMA DE UNIDADES CETESI =====

/**
 * Renderizar card de unidade
 */
function cetesi_render_unit_card($unit, $unit_key, $class = '') {
    if (!$unit['ativo']) return '';
    
    $output = '<div class="unidade-card ' . esc_attr($class) . '">';
    $output .= '<div class="unidade-header">';
    $output .= '<div class="unidade-icon">';
    $output .= '<i class="fas fa-map-marker-alt"></i>';
    $output .= '</div>';
    $output .= '<h3>' . esc_html($unit['nome']) . '</h3>';
    $output .= '</div>';
    
    $output .= '<div class="unidade-detalhes">';
    $output .= '<div class="unidade-linha">';
    $output .= '<i class="fas fa-building"></i>';
    $output .= '<span>' . esc_html($unit['endereco']) . '</span>';
    $output .= '</div>';
    $output .= '<div class="unidade-linha">';
    $output .= '<i class="fas fa-city"></i>';
    $output .= '<span>' . esc_html($unit['cidade']) . '</span>';
    $output .= '</div>';
    $output .= '<div class="unidade-linha">';
    $output .= '<i class="fas fa-mail-bulk"></i>';
    $output .= '<span>CEP: ' . esc_html($unit['cep']) . '</span>';
    $output .= '</div>';
    $output .= '<div class="unidade-linha">';
    $output .= '<i class="fas fa-phone"></i>';
    $output .= '<span>' . esc_html($unit['telefone']) . '</span>';
    $output .= '</div>';
    $output .= '<div class="unidade-linha">';
    $output .= '<i class="fas fa-clock"></i>';
    $output .= '<span>' . $unit['horario_funcionamento'] . '</span>';
    $output .= '</div>';
    $output .= '</div>';
    
    $output .= '<div class="unidade-acoes">';
    if (!empty($unit['google_maps_url']) && $unit['google_maps_url'] !== '#') {
        $output .= '<a href="' . esc_url($unit['google_maps_url']) . '" target="_blank" class="btn-unidade btn-maps" rel="noopener">';
        $output .= '<i class="fas fa-map-marked-alt"></i>';
        $output .= '<span>Ver no Google Maps</span>';
        $output .= '</a>';
    }
    $output .= '<a href="tel:' . esc_attr(str_replace(['(', ')', ' ', '-'], '', $unit['telefone'])) . '" class="btn-unidade btn-ligar">';
    $output .= '<i class="fas fa-phone"></i>';
    $output .= '<span>Ligar Agora</span>';
    $output .= '</a>';
    $output .= '</div>';
    
    $output .= '</div>';
    
    return $output;
}

/**
 * Renderizar seção de unidades
 */
function cetesi_render_units_section($title = 'Nossas Unidades', $description = 'Conheça nossas duas unidades estrategicamente localizadas em Brasília') {
    $units = cetesi_get_units();
    
    $output = '<section class="unidades-section">';
    $output .= '<div class="container">';
    $output .= '<div class="section-header">';
    $output .= '<h2>' . esc_html($title) . '</h2>';
    $output .= '<p>' . esc_html($description) . '</p>';
    $output .= '</div>';
    
    $output .= '<div class="unidades-grid">';
    foreach ($units as $unit_key => $unit) {
        $output .= cetesi_render_unit_card($unit, $unit_key);
    }
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</section>';
    
    return $output;
}

/**
 * Obter unidade por chave
 */
function cetesi_get_unit($unit_key) {
    $units = cetesi_get_units();
    return isset($units[$unit_key]) ? $units[$unit_key] : null;
}

/**
 * Adicionar página de configuração de unidades no admin
 */
function cetesi_units_admin_page() {
    if (isset($_POST['save_units'])) {
        // Verificar nonce
        if (!wp_verify_nonce($_POST['cetesi_units_nonce'], 'cetesi_units_save')) {
            wp_die('Erro de segurança');
        }
        
        // Salvar configurações das unidades
        $units = array(
            'unidade_1' => array(
                'nome' => sanitize_text_field($_POST['unidade_1_nome']),
                'endereco' => sanitize_text_field($_POST['unidade_1_endereco']),
                'cidade' => sanitize_text_field($_POST['unidade_1_cidade']),
                'cep' => sanitize_text_field($_POST['unidade_1_cep']),
                'telefone' => sanitize_text_field($_POST['unidade_1_telefone']),
                'email' => sanitize_email($_POST['unidade_1_email']),
                'horario_funcionamento' => wp_kses_post($_POST['unidade_1_horario']),
                'google_maps_url' => esc_url_raw($_POST['unidade_1_maps_url']),
                'ativo' => isset($_POST['unidade_1_ativo'])
            ),
            'unidade_2' => array(
                'nome' => sanitize_text_field($_POST['unidade_2_nome']),
                'endereco' => sanitize_text_field($_POST['unidade_2_endereco']),
                'cidade' => sanitize_text_field($_POST['unidade_2_cidade']),
                'cep' => sanitize_text_field($_POST['unidade_2_cep']),
                'telefone' => sanitize_text_field($_POST['unidade_2_telefone']),
                'email' => sanitize_email($_POST['unidade_2_email']),
                'horario_funcionamento' => wp_kses_post($_POST['unidade_2_horario']),
                'google_maps_url' => esc_url_raw($_POST['unidade_2_maps_url']),
                'ativo' => isset($_POST['unidade_2_ativo'])
            )
        );
        
        update_option('cetesi_units', $units);
        echo '<div class="notice notice-success"><p>Configurações das unidades salvas com sucesso!</p></div>';
    }
    
    $units = cetesi_get_units();
    ?>
    <div class="wrap">
        <h1>Configurações das Unidades - CETESI</h1>
        <form method="post" action="">
            <?php wp_nonce_field('cetesi_units_save', 'cetesi_units_nonce'); ?>
            
            <div class="cetesi-units-admin">
                <!-- Unidade 1 -->
                <div class="cetesi-unit-admin-card">
                    <h2>Unidade 1 - Ceilândia</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Nome da Unidade</th>
                            <td><input type="text" name="unidade_1_nome" value="<?php echo esc_attr($units['unidade_1']['nome']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Endereço</th>
                            <td><input type="text" name="unidade_1_endereco" value="<?php echo esc_attr($units['unidade_1']['endereco']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Cidade</th>
                            <td><input type="text" name="unidade_1_cidade" value="<?php echo esc_attr($units['unidade_1']['cidade']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">CEP</th>
                            <td><input type="text" name="unidade_1_cep" value="<?php echo esc_attr($units['unidade_1']['cep']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Telefone</th>
                            <td><input type="text" name="unidade_1_telefone" value="<?php echo esc_attr($units['unidade_1']['telefone']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">E-mail</th>
                            <td><input type="email" name="unidade_1_email" value="<?php echo esc_attr($units['unidade_1']['email']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Horário de Funcionamento</th>
                            <td><textarea name="unidade_1_horario" rows="3" cols="50"><?php echo esc_textarea($units['unidade_1']['horario_funcionamento']); ?></textarea></td>
                        </tr>
                        <tr>
                            <th scope="row">URL Google Maps</th>
                            <td><input type="url" name="unidade_1_maps_url" value="<?php echo esc_attr($units['unidade_1']['google_maps_url']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Unidade Ativa</th>
                            <td><input type="checkbox" name="unidade_1_ativo" value="1" <?php checked($units['unidade_1']['ativo'], true); ?> /></td>
                        </tr>
                    </table>
                </div>
                
                <!-- Unidade 2 -->
                <div class="cetesi-unit-admin-card">
                    <h2>Unidade 2 - Taguatinga</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Nome da Unidade</th>
                            <td><input type="text" name="unidade_2_nome" value="<?php echo esc_attr($units['unidade_2']['nome']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Endereço</th>
                            <td><input type="text" name="unidade_2_endereco" value="<?php echo esc_attr($units['unidade_2']['endereco']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Cidade</th>
                            <td><input type="text" name="unidade_2_cidade" value="<?php echo esc_attr($units['unidade_2']['cidade']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">CEP</th>
                            <td><input type="text" name="unidade_2_cep" value="<?php echo esc_attr($units['unidade_2']['cep']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Telefone</th>
                            <td><input type="text" name="unidade_2_telefone" value="<?php echo esc_attr($units['unidade_2']['telefone']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">E-mail</th>
                            <td><input type="email" name="unidade_2_email" value="<?php echo esc_attr($units['unidade_2']['email']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Horário de Funcionamento</th>
                            <td><textarea name="unidade_2_horario" rows="3" cols="50"><?php echo esc_textarea($units['unidade_2']['horario_funcionamento']); ?></textarea></td>
                        </tr>
                        <tr>
                            <th scope="row">URL Google Maps</th>
                            <td><input type="url" name="unidade_2_maps_url" value="<?php echo esc_attr($units['unidade_2']['google_maps_url']); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Unidade Ativa</th>
                            <td><input type="checkbox" name="unidade_2_ativo" value="1" <?php checked($units['unidade_2']['ativo'], true); ?> /></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <?php submit_button('Salvar Configurações', 'primary', 'save_units'); ?>
        </form>
    </div>
    
    <style>
    .cetesi-units-admin {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-top: 20px;
    }
    .cetesi-unit-admin-card {
        background: #fff;
        border: 1px solid #ccd0d4;
        border-radius: 4px;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0,0,0,.04);
    }
    .cetesi-unit-admin-card h2 {
        margin-top: 0;
        color: #23282d;
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
    }
    @media (max-width: 768px) {
        .cetesi-units-admin {
            grid-template-columns: 1fr;
        }
    }
    </style>
    <?php
}

/**
 * Registrar página de administração das unidades
 */
function cetesi_register_units_admin() {
    add_submenu_page(
        'cetesi-settings',
        'Unidades',
        'Unidades',
        'manage_options',
        'cetesi-units',
        'cetesi_units_admin_page'
    );
}
add_action('admin_menu', 'cetesi_register_units_admin');
?>
