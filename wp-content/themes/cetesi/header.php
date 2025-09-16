    <?php
/**
 * Cabeçalho do tema Cetesi
 *
 * @package Cetesi
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="<?php bloginfo('name'); ?>">
    <meta name="generator" content="WordPress">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php
    // Meta tags específicas do header
    cetesi_header_meta_tags();
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
                    <?php get_template_part('template-parts/header/site-branding'); ?>
                    
                    <!-- Menu Toggle Mobile -->
                    <?php get_template_part('template-parts/header/menu-toggle'); ?>
                </div>

                <!-- Menu Principal -->
                <nav class="nav-menu" id="nav-menu">
                    <div class="nav-menu-content">
                        <!-- Menu de Navegação -->
                        <div class="nav-menu-links">
                            <?php get_template_part('template-parts/header/navigation'); ?>
                        </div>
                        
                        <!-- Botões CTA no Menu Mobile -->
                        <div class="nav-menu-buttons">
                            <?php get_template_part('template-parts/header/cta-buttons'); ?>
                        </div>
                    </div>
                </nav>
                
                <!-- CTA Header -->
                <div class="header-cta">
                    <?php get_template_part('template-parts/header/cta-buttons'); ?>
                </div>

            </div>
        </div>
    </header>

    <!-- Header Mobile -->
    <?php get_template_part('template-parts/header/mobile-header'); ?>

    <!-- WhatsApp Floating Button -->
    <?php get_template_part('template-parts/header/whatsapp-button'); ?>

    <main id="main" class="site-main">