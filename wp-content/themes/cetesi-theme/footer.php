    </main><!-- #main -->

    <!-- Footer -->
    <footer id="colophon" class="footer">
        <div class="container">
            <div class="footer-content">
                <!-- Informações do CETESI -->
                <div class="footer-section footer-brand">
                    <div class="footer-logo">
                        <i class="fas fa-graduation-cap"></i>
                        <?php bloginfo('name'); ?>
                    </div>
                    <p class="footer-description">
                        <?php 
                        $description = get_bloginfo('description');
                        if ($description) {
                            echo esc_html($description);
                        } else {
                            echo 'Centro Técnico de Educação Superior Integrada - Formando profissionais qualificados há mais de 26 anos com excelência acadêmica e infraestrutura moderna.';
                        }
                        ?>
                    </p>
                    
                    <!-- Informações de Contato -->
                    <div class="contact-info">
                        <?php if (get_theme_mod('cetesi_phone')) : ?>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <span class="contact-label">Telefone</span>
                                <span class="contact-value"><?php echo esc_html(get_theme_mod('cetesi_phone')); ?></span>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('cetesi_email')) : ?>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <span class="contact-label">E-mail</span>
                                <span class="contact-value"><?php echo esc_html(get_theme_mod('cetesi_email')); ?></span>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                    </div>
                    
                    <!-- Redes Sociais -->
                    <div class="social-links">
                        <a href="#" class="social-link facebook" title="Facebook" target="_blank" rel="noopener">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link instagram" title="Instagram" target="_blank" rel="noopener">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link youtube" title="YouTube" target="_blank" rel="noopener">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="social-link linkedin" title="LinkedIn" target="_blank" rel="noopener">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-link whatsapp" title="WhatsApp" target="_blank" rel="noopener">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Cursos Técnicos -->
                <div class="footer-section">
                    <h4><i class="fas fa-stethoscope"></i> <?php _e('Cursos Técnicos', 'cetesi'); ?></h4>
                    <div class="footer-links">
                        <?php
                        $cursos_tecnicos = cetesi_get_cursos_by_category('tecnicos', 4);
                        if ($cursos_tecnicos->have_posts()) :
                            while ($cursos_tecnicos->have_posts()) : $cursos_tecnicos->the_post();
                        ?>
                            <a href="<?php the_permalink(); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php the_title(); ?>
                            </a>
                        <?php 
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php _e('Técnico em Enfermagem', 'cetesi'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php _e('Técnico em Radiologia', 'cetesi'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php _e('Nutrição e Dietética', 'cetesi'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php _e('Segurança do Trabalho', 'cetesi'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Cursos de Qualificação -->
                <div class="footer-section">
                    <h4><i class="fas fa-certificate"></i> <?php _e('Cursos de Qualificação', 'cetesi'); ?></h4>
                    <div class="footer-links">
                        <?php
                        $cursos_qualificacao = cetesi_get_cursos_by_category('qualificacao', 6);
                        if ($cursos_qualificacao->have_posts()) :
                            while ($cursos_qualificacao->have_posts()) : $cursos_qualificacao->the_post();
                        ?>
                            <a href="<?php the_permalink(); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php the_title(); ?>
                            </a>
                        <?php 
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php _e('Instrumentação Cirúrgica', 'cetesi'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php _e('Saúde Mental', 'cetesi'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php _e('Enfermagem do Trabalho', 'cetesi'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php _e('Cuidador de Idosos', 'cetesi'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php _e('Hemodiálise', 'cetesi'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/cursos')); ?>" class="footer-link">
                                <i class="fas fa-arrow-right"></i>
                                <?php _e('Saúde Bucal', 'cetesi'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Institucional -->
                <div class="footer-section">
                    <h4><i class="fas fa-building"></i> <?php _e('Institucional', 'cetesi'); ?></h4>
                    <div class="footer-links">
                        <a href="<?php echo esc_url(home_url('/sobre')); ?>" class="footer-link">
                            <i class="fas fa-arrow-right"></i>
                            <?php _e('Sobre Nós', 'cetesi'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/diferenciais')); ?>" class="footer-link">
                            <i class="fas fa-arrow-right"></i>
                            <?php _e('Nossos Diferenciais', 'cetesi'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/infraestrutura')); ?>" class="footer-link">
                            <i class="fas fa-arrow-right"></i>
                            <?php _e('Infraestrutura', 'cetesi'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/trabalhe-conosco')); ?>" class="footer-link">
                            <i class="fas fa-arrow-right"></i>
                            <?php _e('Trabalhe Conosco', 'cetesi'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/politica-privacidade')); ?>" class="footer-link">
                            <i class="fas fa-arrow-right"></i>
                            <?php _e('Política de Privacidade', 'cetesi'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/termos-uso')); ?>" class="footer-link">
                            <i class="fas fa-arrow-right"></i>
                            <?php _e('Termos de Uso', 'cetesi'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Copyright e Informações Legais -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <div class="copyright-info">
                        <p>&copy; <?php echo date('Y'); ?> CETESI - Todos os direitos reservados.</p>
                        <p class="cnpj-info">CNPJ: 00.000.000/0001-00</p>
                    </div>
                    
                    <div class="security-badges">
                        <div class="badge-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>Site Seguro</span>
                        </div>
                        <div class="badge-item">
                            <i class="fas fa-certificate"></i>
                            <span>Certificado</span>
                        </div>
                        <div class="badge-item">
                            <i class="fas fa-award"></i>
                            <span>Qualidade</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Schema Markup JSON-LD -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "<?php echo esc_js(get_bloginfo('name')); ?>",
        "alternateName": "CETESI",
        "description": "<?php echo esc_js(get_bloginfo('description') ?: 'Centro Técnico de Educação Superior Integrada - Cursos técnicos em saúde com excelência acadêmica e infraestrutura moderna.'); ?>",
        "url": "<?php echo esc_url(home_url('/')); ?>",
        "logo": "<?php echo esc_url(get_theme_mod('custom_logo') ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : get_template_directory_uri() . '/assets/images/logo.png'); ?>",
        "image": "<?php echo esc_url(get_theme_mod('cetesi_og_image', get_template_directory_uri() . '/assets/images/og-default.jpg')); ?>",
        "telephone": "<?php echo esc_js(get_theme_mod('cetesi_phone', '(11) 99999-9999')); ?>",
        "email": "<?php echo esc_js(get_theme_mod('cetesi_email', 'contato@cetesi.com.br')); ?>",
         "address": {
             "@type": "PostalAddress",
             "streetAddress": "<?php echo esc_js(get_theme_mod('cetesi_address', 'QNN 02, St. N Qnn 2 Conjunto e, LOTE 04 - Sala 102')); ?>",
             "addressLocality": "Ceilândia",
             "addressRegion": "DF",
             "addressCountry": "BR",
             "postalCode": "72220-025"
         },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "<?php echo esc_js(get_theme_mod('cetesi_phone', '(11) 99999-9999')); ?>",
            "contactType": "customer service",
            "availableLanguage": "Portuguese"
        },
        "sameAs": [
            "https://www.facebook.com/cetesi",
            "https://www.instagram.com/cetesi",
            "https://www.youtube.com/cetesi",
            "https://www.linkedin.com/company/cetesi"
        ],
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Cursos Técnicos em Saúde",
            "itemListElement": [
                {
                    "@type": "Course",
                    "name": "Técnico em Enfermagem",
                    "description": "Curso técnico em enfermagem com foco em práticas clínicas e cuidados de saúde",
                    "provider": {
                        "@type": "EducationalOrganization",
                        "name": "<?php echo esc_js(get_bloginfo('name')); ?>"
                    }
                },
                {
                    "@type": "Course",
                    "name": "Técnico em Radiologia",
                    "description": "Curso técnico em radiologia para operação de equipamentos de diagnóstico por imagem",
                    "provider": {
                        "@type": "EducationalOrganization",
                        "name": "<?php echo esc_js(get_bloginfo('name')); ?>"
                    }
                },
                {
                    "@type": "Course",
                    "name": "Nutrição e Dietética",
                    "description": "Curso técnico em nutrição e dietética para planejamento alimentar e nutricional",
                    "provider": {
                        "@type": "EducationalOrganization",
                        "name": "<?php echo esc_js(get_bloginfo('name')); ?>"
                    }
                }
            ]
        },
        "foundingDate": "2008",
        "numberOfEmployees": "50-100",
        "areaServed": "Brasil",
        "serviceType": "Educação Técnica em Saúde"
    }
    </script>

    <!-- Botão WhatsApp Flutuante -->
    <?php 
    $whatsapp_floating = get_option('cetesi_whatsapp_floating', array('enabled' => 1, 'number' => '556133514511'));
    if ($whatsapp_floating['enabled'] && !empty($whatsapp_floating['number'])) : 
        $whatsapp_url = cetesi_get_whatsapp_url();
        if (!empty($whatsapp_url)) :
    ?>
    <a href="<?php echo $whatsapp_url; ?>" class="floating-btn" target="_blank" title="Fale conosco no WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    <?php 
        endif;
    endif; 
    ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
