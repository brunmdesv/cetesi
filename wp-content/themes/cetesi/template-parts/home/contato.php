<?php
/**
 * Template part para seção Contato da página inicial
 *
 * @package Cetesi
 * @since 1.0.0
 */
?>

<section id="contato" class="contato-section">
    <div class="container">
        <div class="contato-content">
            <div class="contato-info">
                <h2 class="section-title">
                    <?php echo get_theme_mod( 'contato_title', 'Entre em Contato' ); ?>
                </h2>
                <p class="contato-subtitle">
                    <?php echo get_theme_mod( 'contato_subtitle', 'Tem alguma dúvida? Estamos aqui para ajudar!' ); ?>
                </p>
                
                <div class="contato-details">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                        <div class="contact-content">
                            <h3>Email</h3>
                            <p><?php echo get_theme_mod( 'contato_email', 'contato@cetesi.com.br' ); ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                        </div>
                        <div class="contact-content">
                            <h3>Telefone</h3>
                            <p><?php echo get_theme_mod( 'contato_telefone', '(11) 99999-9999' ); ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                        </div>
                        <div class="contact-content">
                            <h3>Endereço</h3>
                            <p><?php echo get_theme_mod( 'contato_endereco', 'Rua das Flores, 123 - Centro, São Paulo - SP' ); ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <div class="contact-content">
                            <h3>Horário de Funcionamento</h3>
                            <p><?php echo get_theme_mod( 'contato_horario', 'Segunda a Sexta: 8h às 18h' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="contato-form">
                <h3>Envie sua Mensagem</h3>
                <form class="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                    <input type="hidden" name="action" value="cetesi_contact_form">
                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'cetesi_contact_nonce' ); ?>">
                    
                    <div class="form-group">
                        <input type="text" name="nome" placeholder="Seu nome" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Seu email" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="tel" name="telefone" placeholder="Seu telefone">
                    </div>
                    
                    <div class="form-group">
                        <select name="assunto" required>
                            <option value="">Selecione o assunto</option>
                            <option value="informacoes">Informações sobre cursos</option>
                            <option value="matricula">Matrícula</option>
                            <option value="duvidas">Dúvidas gerais</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <textarea name="mensagem" placeholder="Sua mensagem" rows="5" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-large">
                            Enviar Mensagem
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
