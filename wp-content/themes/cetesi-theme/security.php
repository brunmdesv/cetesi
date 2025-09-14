<?php
/**
 * CETESI Security - Versão Simplificada
 * 
 * @package CETESI
 * @version 1.0.0
 */

// Evitar acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Headers de Segurança Básicos
 */
function cetesi_add_security_headers() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
}
add_action('send_headers', 'cetesi_add_security_headers');

/**
 * Rate Limiting Simples para Formulário de Contato
 */
function cetesi_check_rate_limit($action, $ip, $limit = 3, $timeout = 300) {
    $transient_key = 'cetesi_rate_' . $action . '_' . md5($ip);
    $attempts = get_transient($transient_key);
    
    if ($attempts === false) {
        set_transient($transient_key, 1, $timeout);
        return true;
    }
    
    if ($attempts >= $limit) {
        return false;
    }
    
    set_transient($transient_key, $attempts + 1, $timeout);
    return true;
}

/**
 * Validação de Entrada Simplificada
 */
function cetesi_validate_input($data, $type = 'text', $max_length = 255, $required = false) {
    // Verificar se é obrigatório
    if ($required && empty($data)) {
        return array('success' => false, 'error' => 'Campo obrigatório');
    }
    
    // Verificar comprimento
    if (strlen($data) > $max_length) {
        return array('success' => false, 'error' => "Máximo de {$max_length} caracteres");
    }
    
    // Validação por tipo
    switch ($type) {
        case 'email':
            if (!empty($data) && !is_email($data)) {
                return array('success' => false, 'error' => 'Email inválido');
            }
            break;
            
        case 'phone':
            if (!empty($data) && !preg_match('/^[0-9+\-\(\)\s]+$/', $data)) {
                return array('success' => false, 'error' => 'Telefone inválido');
            }
            break;
            
        case 'text':
        default:
            // Verificar caracteres perigosos
            if (preg_match('/<script|javascript:|on\w+\s*=/i', $data)) {
                return array('success' => false, 'error' => 'Conteúdo não permitido');
            }
            break;
    }
    
    return array('success' => true, 'data' => $data);
}

/**
 * Validação de Upload de Arquivos
 */
function cetesi_validate_file_upload($file) {
    // Verificar se há arquivo
    if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
        return array('success' => false, 'error' => 'Nenhum arquivo enviado');
    }
    
    // Verificar erro de upload
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return array('success' => false, 'error' => 'Erro no upload do arquivo');
    }
    
    // Verificar tamanho (máximo 2MB)
    if ($file['size'] > 2 * 1024 * 1024) {
        return array('success' => false, 'error' => 'Arquivo muito grande (máximo 2MB)');
    }
    
    // Tipos de arquivo permitidos
    $allowed_types = array(
        'image/jpeg',
        'image/jpg', 
        'image/png',
        'image/gif'
    );
    
    // Verificar tipo MIME
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    
    if (!in_array($mime_type, $allowed_types)) {
        return array('success' => false, 'error' => 'Tipo de arquivo não permitido');
    }
    
    // Verificar extensão
    $file_info = pathinfo($file['name']);
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    
    if (!in_array(strtolower($file_info['extension']), $allowed_extensions)) {
        return array('success' => false, 'error' => 'Extensão de arquivo não permitida');
    }
    
    return array('success' => true, 'data' => $file);
}

/**
 * Sanitização de Saída
 */
function cetesi_safe_output($data, $type = 'html') {
    switch ($type) {
        case 'html':
            return wp_kses_post($data);
        case 'attr':
            return esc_attr($data);
        case 'url':
            return esc_url($data);
        case 'text':
        default:
            return sanitize_text_field($data);
    }
}

/**
 * Verificar Capabilities Específicas
 */
function cetesi_check_specific_capability($action, $post_id = null) {
    switch ($action) {
        case 'edit_curso':
            return current_user_can('edit_posts') || current_user_can('manage_options');
        case 'add_professor':
            return current_user_can('upload_files') || current_user_can('manage_options');
        case 'contact_form':
            return true; // Formulário público
        default:
            return current_user_can('manage_options');
    }
}

/**
 * Log Simples de Segurança
 */
function cetesi_log_security_event($event, $details = '') {
    $log_entry = sprintf(
        "[%s] %s - %s\n",
        date('Y-m-d H:i:s'),
        $event,
        $details
    );
    
    error_log($log_entry, 3, WP_CONTENT_DIR . '/cetesi-security.log');
}
