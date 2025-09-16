<?php
/**
 * Template Name: Contato CETESI
 * Description: Página de contato do CETESI.
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
                    <h1 class="hero-title">Entre em <span class="highlight">Contato</span></h1>
                    <p class="hero-description">
                        Estamos aqui para ajudar você a dar o próximo passo em sua carreira profissional. Entre em contato conosco e descubra como podemos transformar seu futuro.
                    </p>
                </div>
            </div>
        </section>

        <!-- Informações de Contato -->
        <section class="contato-info-section">
            <div class="container">
                <div class="contato-info-grid">
                    <div class="contato-info-card">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3>Endereço</h3>
                        <p>QNN 02, St. N Qnn 2 Conjunto e, LOTE 04 - Sala 102<br>
                        Ceilândia, Brasília - DF<br>
                        CEP: 72220-025</p>
                    </div>

                    <div class="contato-info-card">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3>Telefone</h3>
                        <p>(61) 3351-4511</p>
                        <a href="tel:+556133514511" class="contato-link">
                            <i class="fas fa-phone"></i>
                            Ligar Agora
                        </a>
                    </div>

                    <div class="contato-info-card">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>E-mail</h3>
                        <p>contato@cetesi.com.br</p>
                        <a href="mailto:contato@cetesi.com.br" class="contato-link">
                            <i class="fas fa-envelope"></i>
                            Enviar E-mail
                        </a>
                    </div>

                    <div class="contato-info-card">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Horário de Funcionamento</h3>
                        <p>Segunda a Sexta: 8h às 18h<br>
                        Sábado: 8h às 12h<br>
                        Domingo: Fechado</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Formulário de Contato -->
        <section class="contato-form-section">
            <div class="container">
                <div class="contato-form-content">
                    <div class="form-header">
                        <h2>Envie sua Mensagem</h2>
                        <p>Preencha o formulário abaixo e entraremos em contato em breve.</p>
                    </div>

                    <form class="contato-form" id="contatoForm">
                        <?php wp_nonce_field('contact_form', 'contact_nonce'); ?>
                        
                        <!-- Honeypot para detectar bots -->
                        <div style="display: none;">
                            <label for="website">Website (deixe em branco):</label>
                            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome">Nome Completo *</label>
                                <input type="text" id="nome" name="nome" required maxlength="100">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail *</label>
                                <input type="email" id="email" name="email" required maxlength="100">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="tel" id="telefone" name="telefone" maxlength="20" pattern="[0-9+\-\(\)\s]+">
                            </div>
                            <div class="form-group">
                                <label for="assunto">Assunto *</label>
                                <select id="assunto" name="assunto" required>
                                    <option value="">Selecione um assunto</option>
                                    <option value="informacoes-cursos">Informações sobre Cursos</option>
                                    <option value="matricula">Matrícula</option>
                                    <option value="duvidas">Dúvidas Gerais</option>
                                    <option value="parcerias">Parcerias</option>
                                    <option value="outros">Outros</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mensagem">Mensagem *</label>
                            <textarea id="mensagem" name="mensagem" rows="5" required placeholder="Descreva sua dúvida ou solicitação..." maxlength="1000"></textarea>
                        </div>

                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="aceito" name="aceito" required>
                                <span class="checkmark"></span>
                                Aceito receber informações sobre cursos e promoções do CETESI
                            </label>
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i>
                            Enviar Mensagem
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Mapa -->
        <section class="contato-mapa-section">
            <div class="container">
                <div class="mapa-header">
                    <h2>Nossa Localização</h2>
                    <p>Venha nos visitar e conhecer nossa estrutura completa.</p>
                </div>
                <div class="mapa-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1975!2d-46.6388!3d-23.5489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDMyJzU2LjAiUyA0NsKwMzgnMTkuNyJX!5e0!3m2!1spt-BR!2sbr!4v1234567890123!5m2!1spt-BR!2sbr" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="contato-cta-section">
            <div class="container">
                <div class="contato-cta-content">
                    <h2>Pronto para Começar sua Jornada?</h2>
                    <p>Não perca tempo! Entre em contato agora mesmo e dê o primeiro passo rumo ao sucesso profissional.</p>
                    <div class="cta-buttons">
                        <a href="tel:+556133514511" class="button button-primary">
                            <i class="fas fa-phone"></i>
                            Ligar Agora
                        </a>
                        <a href="<?php echo home_url('/cursos/'); ?>" class="button button-secondary">
                            <i class="fas fa-graduation-cap"></i>
                            Ver Cursos
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<script>
// Formulário de contato
jQuery(document).ready(function($) {
    $('#contatoForm').on('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = $('.submit-btn');
        const originalText = submitBtn.html();
        
        // Mostrar loading
        submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Enviando...');
        submitBtn.prop('disabled', true);
        
        // Preparar dados do formulário
        const formData = new FormData(this);
        
        // Fazer requisição AJAX
        $.ajax({
            url: '<?php echo get_template_directory_uri(); ?>/contact-handler.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Sucesso
                    alert('✅ ' + response.data.message);
                    $('#contatoForm')[0].reset();
                } else {
                    // Erro
                    let errorMessage = '❌ ' + response.data.message;
                    if (response.data.errors && response.data.errors.length > 0) {
                        errorMessage += '\n\n• ' + response.data.errors.join('\n• ');
                    }
                    alert(errorMessage);
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição:', error);
                alert('❌ Erro ao enviar mensagem. Tente novamente ou entre em contato por telefone.');
            },
            complete: function() {
                // Restaurar botão
                submitBtn.html(originalText);
                submitBtn.prop('disabled', false);
            }
        });
    });
});
</script>

<?php
get_footer();
?>
