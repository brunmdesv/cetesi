<?php
/**
 * Handler para formulário de contato
 * Processa e envia e-mails de contato
 */

// Verificar se é uma requisição POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    wp_die('Método não permitido');
}

// Verificar nonce de segurança
if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {
    wp_die('Token de segurança inválido');
}

// Sanitizar dados do formulário
$nome = sanitize_text_field($_POST['nome']);
$email = sanitize_email($_POST['email']);
$telefone = sanitize_text_field($_POST['telefone']);
$assunto = sanitize_text_field($_POST['assunto']);
$mensagem = sanitize_textarea_field($_POST['mensagem']);
$aceito = isset($_POST['aceito']) ? true : false;

// Validações
$errors = array();

if (empty($nome)) {
    $errors[] = 'Nome é obrigatório';
}

if (empty($email) || !is_email($email)) {
    $errors[] = 'E-mail válido é obrigatório';
}

if (empty($assunto)) {
    $errors[] = 'Assunto é obrigatório';
}

if (empty($mensagem)) {
    $errors[] = 'Mensagem é obrigatória';
}

if (!$aceito) {
    $errors[] = 'Você deve aceitar receber informações sobre cursos';
}

// Se houver erros, retornar JSON com erros
if (!empty($errors)) {
    wp_send_json_error(array(
        'message' => 'Por favor, corrija os seguintes erros:',
        'errors' => $errors
    ));
}

// Preparar dados para o e-mail
$assunto_map = array(
    'informacoes-cursos' => 'Informações sobre Cursos',
    'matricula' => 'Matrícula',
    'duvidas' => 'Dúvidas Gerais',
    'parcerias' => 'Parcerias',
    'outros' => 'Outros'
);

$assunto_email = isset($assunto_map[$assunto]) ? $assunto_map[$assunto] : $assunto;

// Configurar cabeçalhos do e-mail
$headers = array(
    'Content-Type: text/html; charset=UTF-8',
    'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
    'Reply-To: ' . $nome . ' <' . $email . '>'
);

// Preparar conteúdo do e-mail
$email_content = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 8px 8px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #10b981; }
        .value { margin-top: 5px; padding: 10px; background: white; border-radius: 4px; border-left: 4px solid #10b981; }
        .footer { text-align: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>📧 Nova Mensagem de Contato - CETESI</h2>
        </div>
        <div class="content">
            <div class="field">
                <div class="label">👤 Nome Completo:</div>
                <div class="value">' . esc_html($nome) . '</div>
            </div>
            
            <div class="field">
                <div class="label">📧 E-mail:</div>
                <div class="value">' . esc_html($email) . '</div>
            </div>
            
            <div class="field">
                <div class="label">📞 Telefone:</div>
                <div class="value">' . esc_html($telefone) . '</div>
            </div>
            
            <div class="field">
                <div class="label">📋 Assunto:</div>
                <div class="value">' . esc_html($assunto_email) . '</div>
            </div>
            
            <div class="field">
                <div class="label">💬 Mensagem:</div>
                <div class="value">' . nl2br(esc_html($mensagem)) . '</div>
            </div>
            
            <div class="field">
                <div class="label">📅 Data/Hora:</div>
                <div class="value">' . date('d/m/Y H:i:s') . '</div>
            </div>
        </div>
        <div class="footer">
            <p>Esta mensagem foi enviada através do formulário de contato do site ' . get_bloginfo('name') . '</p>
            <p>Para responder, clique em "Responder" no seu cliente de e-mail.</p>
        </div>
    </div>
</body>
</html>';

// Enviar e-mail
$email_sent = wp_mail(
    'contato@cetesi.com.br', // Para
    'Nova Mensagem de Contato - ' . $assunto_email, // Assunto
    $email_content, // Conteúdo
    $headers // Cabeçalhos
);

// Enviar e-mail de confirmação para o usuário
$user_email_content = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 8px 8px; }
        .success { background: #d4edda; color: #155724; padding: 15px; border-radius: 4px; border-left: 4px solid #28a745; margin-bottom: 20px; }
        .footer { text-align: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>✅ Mensagem Recebida - CETESI</h2>
        </div>
        <div class="content">
            <div class="success">
                <strong>Obrigado pelo seu contato!</strong><br>
                Sua mensagem foi recebida com sucesso e entraremos em contato em breve.
            </div>
            
            <p>Olá <strong>' . esc_html($nome) . '</strong>,</p>
            
            <p>Recebemos sua mensagem sobre <strong>' . esc_html($assunto_email) . '</strong> e agradecemos pelo interesse em nossos serviços.</p>
            
            <p>Nossa equipe analisará sua solicitação e retornaremos o contato o mais breve possível.</p>
            
            <p><strong>Resumo da sua mensagem:</strong></p>
            <ul>
                <li><strong>Assunto:</strong> ' . esc_html($assunto_email) . '</li>
                <li><strong>Data:</strong> ' . date('d/m/Y H:i:s') . '</li>
            </ul>
            
            <p>Se você tiver alguma dúvida urgente, pode nos contatar diretamente:</p>
            <ul>
                <li>📞 Telefone: (11) 9999-9999</li>
                <li>📧 E-mail: contato@cetesi.com.br</li>
            </ul>
        </div>
        <div class="footer">
            <p>Atenciosamente,<br>Equipe CETESI</p>
            <p>Esta é uma mensagem automática, por favor não responda este e-mail.</p>
        </div>
    </div>
</body>
</html>';

$confirmation_sent = wp_mail(
    $email, // Para o usuário
    'Confirmação de Recebimento - CETESI', // Assunto
    $user_email_content, // Conteúdo
    array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <contato@cetesi.com.br>'
    )
);

// Resposta
if ($email_sent) {
    wp_send_json_success(array(
        'message' => 'Mensagem enviada com sucesso! Entraremos em contato em breve.',
        'confirmation_sent' => $confirmation_sent
    ));
} else {
    wp_send_json_error(array(
        'message' => 'Erro ao enviar mensagem. Tente novamente ou entre em contato por telefone.'
    ));
}
?>
