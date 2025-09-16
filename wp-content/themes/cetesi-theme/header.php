<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="<?php bloginfo('name'); ?>">
    <meta name="generator" content="WordPress">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php
    // Meta Description
    $meta_description = '';
    if (is_home() || is_front_page()) {
        $meta_description = get_bloginfo('description') ?: 'Centro Técnico de Educação Superior Integrada - Cursos técnicos em saúde em Ceilândia, Brasília. Técnico em Enfermagem, Radiologia, Nutrição e mais. Excelência acadêmica e infraestrutura moderna no DF.';
    } elseif (is_single() || is_page()) {
        $meta_description = get_the_excerpt() ?: wp_trim_words(get_the_content(), 25, '...');
    } elseif (is_category() || is_tag()) {
        $meta_description = term_description() ?: 'Confira nossos cursos na categoria ' . single_term_title('', false);
    }
    if ($meta_description) {
        echo '<meta name="description" content="' . esc_attr(wp_trim_words($meta_description, 25, '...')) . '">' . "\n";
    }
    
    // Meta Keywords
    $meta_keywords = 'cursos técnicos, enfermagem, radiologia, nutrição, saúde, CETESI, educação técnica, qualificação profissional, cursos de saúde, Ceilândia, Brasília, DF, Distrito Federal';
    if (is_single() && get_post_type() == 'curso') {
        $curso_terms = wp_get_post_terms(get_the_ID(), 'categoria_curso');
        $keywords_array = array('cursos técnicos', 'saúde', 'CETESI', 'Ceilândia', 'Brasília', 'DF');
        foreach ($curso_terms as $term) {
            $keywords_array[] = $term->name;
        }
        $meta_keywords = implode(', ', array_unique($keywords_array));
    }
    echo '<meta name="keywords" content="' . esc_attr($meta_keywords) . '">' . "\n";
    
    // Open Graph
    $og_title = is_home() || is_front_page() ? get_bloginfo('name') . ' - ' . get_bloginfo('description') : get_the_title() . ' - ' . get_bloginfo('name');
    $og_description = $meta_description ?: get_bloginfo('description');
    $og_url = is_home() || is_front_page() ? home_url('/') : get_permalink();
    $og_image = '';
    
    if (is_single() || is_page()) {
        if (has_post_thumbnail()) {
            $og_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
        }
    }
    if (!$og_image) {
        $og_image = get_theme_mod('cetesi_og_image', get_template_directory_uri() . '/assets/images/og-default.jpg');
    }
    
    echo '<meta property="og:type" content="' . (is_single() ? 'article' : 'website') . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($og_title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($og_description) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($og_url) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";
    echo '<meta property="og:image:width" content="1200">' . "\n";
    echo '<meta property="og:image:height" content="630">' . "\n";
    echo '<meta property="og:locale" content="pt_BR">' . "\n";
    
    // Twitter Cards
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($og_title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($og_description) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($og_image) . '">' . "\n";
    echo '<meta name="twitter:site" content="@cetesi">' . "\n";
    echo '<meta name="twitter:creator" content="@cetesi">' . "\n";
    
    // Canonical URL
    echo '<link rel="canonical" href="' . esc_url($og_url) . '">' . "\n";
    ?>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php _e('Pular para o conteúdo', 'cetesi'); ?></a>

    <!-- Header -->
    <header id="masthead" class="header">
        <div class="container">
            <div class="header-content">
                <!-- Header Top (Logo + Menu Toggle) -->
                <div class="header-top">
                    <!-- Logo -->
                    <div class="site-branding">
                        <?php if (has_custom_logo()) : ?>
                            <div class="site-logo">
                                <?php the_custom_logo(); ?>
                            </div>
                        <?php else : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h1>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Menu Toggle Mobile -->
                    <button class="menu-toggle" id="menu-toggle" aria-label="Toggle menu" aria-expanded="false">
                        <span class="menu-toggle-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>

                <!-- Menu Principal -->
                <nav class="nav-menu" id="nav-menu">
                    <div class="nav-menu-content">
                        <!-- Menu de Navegação -->
                        <div class="nav-menu-links">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_class'     => '',
                                'container'      => false,
                                'items_wrap'     => '%3$s',
                                'fallback_cb'    => 'cetesi_fallback_menu',
                                'depth'          => 1
                            ));
                            ?>
                        </div>
                        
                        <!-- Botões CTA no Menu Mobile -->
                        <div class="nav-menu-buttons">
                            <?php 
                            $header_buttons = get_option('cetesi_header_buttons', array(
                                'painel_unicollege' => array('enabled' => 1, 'text' => 'Painel Unicollege', 'url' => '#', 'new_tab' => 0),
                                'painel_aluno' => array('enabled' => 1, 'text' => 'Painel do Aluno', 'url' => '#', 'new_tab' => 0),
                                'telefone' => array('enabled' => 1, 'text' => '(11) 99999-9999', 'url' => 'tel:(11) 99999-9999')
                            ));
                            ?>
                            
                            <?php if ($header_buttons['painel_unicollege']['enabled']): ?>
                            <a href="<?php echo esc_url($header_buttons['painel_unicollege']['url']); ?>" class="nav-menu-btn nav-menu-btn-primary"<?php echo ($header_buttons['painel_unicollege']['new_tab']) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
                                <i class="fas fa-graduation-cap"></i>
                                <?php echo esc_html($header_buttons['painel_unicollege']['text']); ?>
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($header_buttons['painel_aluno']['enabled']): ?>
                            <a href="<?php echo esc_url($header_buttons['painel_aluno']['url']); ?>" class="nav-menu-btn nav-menu-btn-secondary"<?php echo ($header_buttons['painel_aluno']['new_tab']) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
                                <i class="fas fa-user-graduate"></i>
                                <?php echo esc_html($header_buttons['painel_aluno']['text']); ?>
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($header_buttons['telefone']['enabled']): ?>
                            <a href="<?php echo esc_url($header_buttons['telefone']['url']); ?>" class="nav-menu-btn nav-menu-btn-accent">
                                <i class="fas fa-phone"></i>
                                <?php echo esc_html($header_buttons['telefone']['text']); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
                
                <!-- Overlay para fechar menu -->
                <div class="menu-overlay" id="menu-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(0,0,0,0.5); z-index: 9998; opacity: 0; transition: opacity 0.3s ease;"></div>

                <!-- CTA Header -->
                <div class="header-cta">
                    <?php 
                    $header_buttons = get_option('cetesi_header_buttons', array(
                        'painel_unicollege' => array('enabled' => 1, 'text' => 'Painel Unicollege', 'url' => '#', 'new_tab' => 0),
                        'painel_aluno' => array('enabled' => 1, 'text' => 'Painel do Aluno', 'url' => '#', 'new_tab' => 0),
                        'telefone' => array('enabled' => 1, 'text' => '(11) 99999-9999', 'url' => 'tel:(11) 99999-9999'),
                        'whatsapp' => array('enabled' => 1, 'text' => 'WhatsApp', 'url' => 'https://wa.me/556133514511')
                    ));
                    ?>
                    
                    <?php if ($header_buttons['painel_unicollege']['enabled']): ?>
                    <a href="<?php echo esc_url($header_buttons['painel_unicollege']['url']); ?>" class="btn-nav"<?php echo ($header_buttons['painel_unicollege']['new_tab']) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
                        <i class="fas fa-graduation-cap"></i>
                        <?php echo esc_html($header_buttons['painel_unicollege']['text']); ?>
                    </a>
                    <?php endif; ?>
                    
                    <?php if ($header_buttons['painel_aluno']['enabled']): ?>
                    <a href="<?php echo esc_url($header_buttons['painel_aluno']['url']); ?>" class="btn-nav"<?php echo ($header_buttons['painel_aluno']['new_tab']) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
                        <i class="fas fa-user-graduate"></i>
                        <?php echo esc_html($header_buttons['painel_aluno']['text']); ?>
                    </a>
                    <?php endif; ?>
                    
                    <?php if ($header_buttons['telefone']['enabled']): ?>
                    <a href="<?php echo esc_url($header_buttons['telefone']['url']); ?>" class="btn-primary">
                        <i class="fas fa-phone"></i>
                        <?php echo esc_html($header_buttons['telefone']['text']); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Header Mobile -->
    <?php get_template_part('template-parts/header/mobile-header'); ?>

    <!-- WhatsApp Floating Button -->
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

    <main id="main" class="site-main">

<script>
// Menu Mobile - Abordagem Ultra Simples
function toggleMobileMenu() {
    const menu = document.getElementById('nav-menu');
    const toggle = document.getElementById('menu-toggle');
    const overlay = document.getElementById('menu-overlay');
    
    if (menu.style.transform === 'translateX(0px)' || menu.style.transform === '') {
        closeMobileMenu();
    } else {
        openMobileMenu();
    }
}

function openMobileMenu() {
    const menu = document.getElementById('nav-menu');
    const toggle = document.getElementById('menu-toggle');
    const overlay = document.getElementById('menu-overlay');
    
    menu.style.display = 'block';
    menu.style.transform = 'translateX(0px)';
    toggle.classList.add('active');
    overlay.style.display = 'block';
    setTimeout(() => {
        overlay.style.opacity = '1';
    }, 10);
}

function closeMobileMenu() {
    const menu = document.getElementById('nav-menu');
    const toggle = document.getElementById('menu-toggle');
    const overlay = document.getElementById('menu-overlay');
    
    menu.style.transform = 'translateX(-100%)';
    overlay.style.opacity = '0';
    setTimeout(() => {
        menu.style.display = 'none';
        overlay.style.display = 'none';
    }, 300);
    toggle.classList.remove('active');
}

// Mobile Header Menu Functions
function toggleMobileHeaderMenu() {
    const mobileOverlay = document.getElementById('mobile-menu-overlay');
    const mobileButton = document.getElementById('mobile-menu-button');
    
    if (mobileOverlay.style.display === 'block') {
        closeMobileHeaderMenu();
    } else {
        openMobileHeaderMenu();
    }
}

function openMobileHeaderMenu() {
    const mobileOverlay = document.getElementById('mobile-menu-overlay');
    const mobileButton = document.getElementById('mobile-menu-button');
    
    mobileOverlay.style.display = 'block';
    mobileOverlay.setAttribute('aria-hidden', 'false');
    mobileButton.setAttribute('aria-expanded', 'true');
    mobileButton.classList.add('active');
    
    // Animar entrada
    setTimeout(() => {
        mobileOverlay.style.opacity = '1';
    }, 10);
    
    // Prevenir scroll do body
    document.body.style.overflow = 'hidden';
}

function closeMobileHeaderMenu() {
    const mobileOverlay = document.getElementById('mobile-menu-overlay');
    const mobileButton = document.getElementById('mobile-menu-button');
    
    mobileOverlay.style.opacity = '0';
    mobileOverlay.setAttribute('aria-hidden', 'true');
    mobileButton.setAttribute('aria-expanded', 'false');
    mobileButton.classList.remove('active');
    
    // Restaurar scroll do body
    document.body.style.overflow = '';
    
    setTimeout(() => {
        mobileOverlay.style.display = 'none';
    }, 300);
}

// Quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('nav-menu');
    const menuOverlay = document.getElementById('menu-overlay');
    
    // Mobile header elements
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    
    // Garantir que o menu desktop comece fechado
    if (navMenu) {
        navMenu.style.display = 'none';
    }
    if (menuOverlay) {
        menuOverlay.style.display = 'none';
    }
    
    // Garantir que o menu mobile comece fechado
    if (mobileMenuOverlay) {
        mobileMenuOverlay.style.display = 'none';
        mobileMenuOverlay.setAttribute('aria-hidden', 'true');
    }
    
    // Clique no hambúrguer desktop
    if (menuToggle) {
        menuToggle.onclick = function() {
            toggleMobileMenu();
        };
    }
    
    // Clique no overlay desktop para fechar
    if (menuOverlay) {
        menuOverlay.onclick = function() {
            closeMobileMenu();
        };
    }
    
    // Clique no botão mobile header
    if (mobileMenuButton) {
        mobileMenuButton.onclick = function() {
            toggleMobileHeaderMenu();
        };
    }
    
    // Clique no botão fechar mobile header
    if (mobileMenuClose) {
        mobileMenuClose.onclick = function() {
            closeMobileHeaderMenu();
        };
    }
    
    // Clique no overlay mobile para fechar
    if (mobileMenuOverlay) {
        mobileMenuOverlay.onclick = function(e) {
            if (e.target === mobileMenuOverlay) {
                closeMobileHeaderMenu();
            }
        };
    }
    
    // Fechar ao clicar nos links desktop
    if (navMenu) {
        const links = navMenu.querySelectorAll('a');
        links.forEach(function(link) {
            link.onclick = function() {
                closeMobileMenu();
            };
            
            // Efeito hover
            link.addEventListener('mouseenter', function() {
                this.style.background = '#f3f4f6';
                this.style.transform = 'translateX(5px)';
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.background = 'transparent';
                this.style.transform = 'translateX(0)';
            });
        });
    }
    
    // Fechar ao clicar nos links mobile
    const mobileNavMenu = document.getElementById('mobile-menu');
    if (mobileNavMenu) {
        const mobileLinks = mobileNavMenu.querySelectorAll('a');
        mobileLinks.forEach(function(link) {
            link.onclick = function() {
                closeMobileHeaderMenu();
            };
        });
    }
});
</script>


