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
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main">
        <?php esc_html_e( 'Pular para o conteúdo', 'cetesi' ); ?>
    </a>

    <header id="masthead" class="site-header" role="banner">
        <div class="container">
            <div class="header-content">
                
                <?php
                // Logo personalizado ou título do site
                if ( has_custom_logo() ) :
                    ?>
                    <div class="site-branding">
                        <?php the_custom_logo(); ?>
                    </div>
                    <?php
                else :
                    ?>
                    <div class="site-branding">
                        <?php if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>
                                </a>
                            </h1>
                        <?php else : ?>
                            <p class="site-title">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                        
                        <?php
                        $description = get_bloginfo( 'description', 'display' );
                        if ( $description || is_customize_preview() ) :
                            ?>
                            <p class="site-description"><?php echo $description; ?></p>
                            <?php
                        endif;
                        ?>
                    </div>
                    <?php
                endif;
                ?>

                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Menu Principal', 'cetesi' ); ?>">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="screen-reader-text"><?php esc_html_e( 'Menu Principal', 'cetesi' ); ?></span>
                        <span class="menu-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                    
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'principal',
                        'menu_id'        => 'menu-principal',
                        'menu_class'     => 'menu',
                        'container'      => false,
                        'fallback_cb'    => 'cetesi_fallback_menu',
                    ) );
                    ?>
                </nav>

                <?php if ( has_nav_menu( 'cursos' ) ) : ?>
                    <nav id="navegacao-cursos" class="courses-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Menu de Cursos', 'cetesi' ); ?>">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'cursos',
                            'menu_class'     => 'courses-menu',
                            'container'      => false,
                            'depth'          => 1,
                        ) );
                        ?>
                    </nav>
                <?php endif; ?>

            </div>
        </div>
    </header>

    <?php
    // Imagem de cabeçalho personalizada
    if ( get_header_image() ) :
        ?>
        <div class="header-image">
            <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        </div>
        <?php
    endif;
    ?>

    <div id="content" class="site-content">
