</main><!-- #main -->

    <!-- Footer -->
    <footer id="colophon" class="footer">
        <div class="container">
            <div class="footer-content">
                <!-- Informações do CETESI (única seção visível) -->
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
                    
                    
                </div>
                
                <!-- Demais seções removidas conforme solicitado -->
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
                    
                    <div class="security-badges" style="display: flex; align-items: center;">
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
