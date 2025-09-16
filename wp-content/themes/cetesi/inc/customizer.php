<?php
/**
 * Personalização do tema via Customizer
 *
 * @package Cetesi
 * @since 1.0.0
 */

// Previne acesso direto
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Adiciona opções ao Customizer
 */
function cetesi_customize_register( $wp_customize ) {
    
    // Painel principal do tema
    $wp_customize->add_panel( 'cetesi_options', array(
        'title'       => esc_html__( 'Opções do Tema Cetesi', 'cetesi' ),
        'description' => esc_html__( 'Personalize as opções do seu site', 'cetesi' ),
        'priority'    => 130,
    ) );

    // Seção: Cores
    $wp_customize->add_section( 'cetesi_colors', array(
        'title'    => esc_html__( 'Cores', 'cetesi' ),
        'panel'    => 'cetesi_options',
        'priority' => 10,
    ) );

    // Cor primária
    $wp_customize->add_setting( 'cetesi_primary_color', array(
        'default'           => '#3498db',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cetesi_primary_color', array(
        'label'    => esc_html__( 'Cor Primária', 'cetesi' ),
        'section'  => 'cetesi_colors',
        'settings' => 'cetesi_primary_color',
    ) ) );

    // Cor secundária
    $wp_customize->add_setting( 'cetesi_secondary_color', array(
        'default'           => '#2c3e50',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cetesi_secondary_color', array(
        'label'    => esc_html__( 'Cor Secundária', 'cetesi' ),
        'section'  => 'cetesi_colors',
        'settings' => 'cetesi_secondary_color',
    ) ) );

    // Cor de texto
    $wp_customize->add_setting( 'cetesi_text_color', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cetesi_text_color', array(
        'label'    => esc_html__( 'Cor do Texto', 'cetesi' ),
        'section'  => 'cetesi_colors',
        'settings' => 'cetesi_text_color',
    ) ) );

    // Seção: Layout
    $wp_customize->add_section( 'cetesi_layout', array(
        'title'    => esc_html__( 'Layout', 'cetesi' ),
        'panel'    => 'cetesi_options',
        'priority' => 20,
    ) );

    // Largura do container
    $wp_customize->add_setting( 'cetesi_container_width', array(
        'default'           => '1200',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cetesi_container_width', array(
        'label'       => esc_html__( 'Largura do Container (px)', 'cetesi' ),
        'section'     => 'cetesi_layout',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 800,
            'max'  => 1600,
            'step' => 50,
        ),
    ) );

    // Posição da sidebar
    $wp_customize->add_setting( 'cetesi_sidebar_position', array(
        'default'           => 'right',
        'sanitize_callback' => 'cetesi_sanitize_sidebar_position',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'cetesi_sidebar_position', array(
        'label'   => esc_html__( 'Posição da Sidebar', 'cetesi' ),
        'section' => 'cetesi_layout',
        'type'    => 'select',
        'choices' => array(
            'right' => esc_html__( 'Direita', 'cetesi' ),
            'left'  => esc_html__( 'Esquerda', 'cetesi' ),
            'none'  => esc_html__( 'Sem Sidebar', 'cetesi' ),
        ),
    ) );

    // Seção: Tipografia
    $wp_customize->add_section( 'cetesi_typography', array(
        'title'    => esc_html__( 'Tipografia', 'cetesi' ),
        'panel'    => 'cetesi_options',
        'priority' => 30,
    ) );

    // Família da fonte
    $wp_customize->add_setting( 'cetesi_font_family', array(
        'default'           => 'system',
        'sanitize_callback' => 'cetesi_sanitize_font_family',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cetesi_font_family', array(
        'label'   => esc_html__( 'Família da Fonte', 'cetesi' ),
        'section' => 'cetesi_typography',
        'type'    => 'select',
        'choices' => array(
            'system' => esc_html__( 'Sistema Padrão', 'cetesi' ),
            'serif'  => esc_html__( 'Serif', 'cetesi' ),
            'sans'   => esc_html__( 'Sans Serif', 'cetesi' ),
            'mono'   => esc_html__( 'Monospace', 'cetesi' ),
        ),
    ) );

    // Tamanho da fonte base
    $wp_customize->add_setting( 'cetesi_font_size', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cetesi_font_size', array(
        'label'       => esc_html__( 'Tamanho da Fonte Base (px)', 'cetesi' ),
        'section'     => 'cetesi_typography',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 12,
            'max'  => 24,
            'step' => 1,
        ),
    ) );

    // Seção: Header
    $wp_customize->add_section( 'cetesi_header', array(
        'title'    => esc_html__( 'Cabeçalho', 'cetesi' ),
        'panel'    => 'cetesi_options',
        'priority' => 40,
    ) );

    // Altura do header
    $wp_customize->add_setting( 'cetesi_header_height', array(
        'default'           => '80',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cetesi_header_height', array(
        'label'       => esc_html__( 'Altura do Header (px)', 'cetesi' ),
        'section'     => 'cetesi_header',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 60,
            'max'  => 120,
            'step' => 5,
        ),
    ) );

    // Header fixo
    $wp_customize->add_setting( 'cetesi_sticky_header', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'cetesi_sticky_header', array(
        'label'   => esc_html__( 'Header Fixo', 'cetesi' ),
        'section' => 'cetesi_header',
        'type'    => 'checkbox',
    ) );

    // Seção: Footer
    $wp_customize->add_section( 'cetesi_footer', array(
        'title'    => esc_html__( 'Rodapé', 'cetesi' ),
        'panel'    => 'cetesi_options',
        'priority' => 50,
    ) );

    // Texto do rodapé
    $wp_customize->add_setting( 'cetesi_footer_text', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cetesi_footer_text', array(
        'label'   => esc_html__( 'Texto do Rodapé', 'cetesi' ),
        'section' => 'cetesi_footer',
        'type'    => 'textarea',
    ) );

    // Seção: Social Media
    $wp_customize->add_section( 'cetesi_social', array(
        'title'    => esc_html__( 'Redes Sociais', 'cetesi' ),
        'panel'    => 'cetesi_options',
        'priority' => 60,
    ) );

    // URLs das redes sociais
    $social_networks = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter',
        'instagram' => 'Instagram',
        'linkedin'  => 'LinkedIn',
        'youtube'   => 'YouTube',
    );

    foreach ( $social_networks as $network => $label ) {
        $wp_customize->add_setting( 'cetesi_social_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ) );

        $wp_customize->add_control( 'cetesi_social_' . $network, array(
            'label'   => sprintf( esc_html__( 'URL do %s', 'cetesi' ), $label ),
            'section' => 'cetesi_social',
            'type'    => 'url',
        ) );
    }

    // Seção: Performance
    $wp_customize->add_section( 'cetesi_performance', array(
        'title'    => esc_html__( 'Performance', 'cetesi' ),
        'panel'    => 'cetesi_options',
        'priority' => 70,
    ) );

    // Lazy loading
    $wp_customize->add_setting( 'cetesi_lazy_loading', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'cetesi_lazy_loading', array(
        'label'   => esc_html__( 'Lazy Loading de Imagens', 'cetesi' ),
        'section' => 'cetesi_performance',
        'type'    => 'checkbox',
    ) );

    // Minificação de CSS
    $wp_customize->add_setting( 'cetesi_minify_css', array(
        'default'           => false,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'cetesi_minify_css', array(
        'label'   => esc_html__( 'Minificar CSS', 'cetesi' ),
        'section' => 'cetesi_performance',
        'type'    => 'checkbox',
    ) );
}
add_action( 'customize_register', 'cetesi_customize_register' );

/**
 * Sanitização de posição da sidebar
 */
function cetesi_sanitize_sidebar_position( $input ) {
    $valid = array( 'left', 'right', 'none' );
    return in_array( $input, $valid ) ? $input : 'right';
}

/**
 * Sanitização de família da fonte
 */
function cetesi_sanitize_font_family( $input ) {
    $valid = array( 'system', 'serif', 'sans', 'mono' );
    return in_array( $input, $valid ) ? $input : 'system';
}

/**
 * CSS personalizado do Customizer
 */
function cetesi_customizer_css() {
    $primary_color   = get_theme_mod( 'cetesi_primary_color', '#3498db' );
    $secondary_color  = get_theme_mod( 'cetesi_secondary_color', '#2c3e50' );
    $text_color       = get_theme_mod( 'cetesi_text_color', '#333333' );
    $container_width  = get_theme_mod( 'cetesi_container_width', '1200' );
    $header_height    = get_theme_mod( 'cetesi_header_height', '80' );
    $font_size        = get_theme_mod( 'cetesi_font_size', '16' );
    $font_family      = get_theme_mod( 'cetesi_font_family', 'system' );
    
    $css = "
        :root {
            --primary-color: {$primary_color};
            --secondary-color: {$secondary_color};
            --text-color: {$text_color};
        }
        
        .container {
            max-width: {$container_width}px;
        }
        
        .site-header {
            min-height: {$header_height}px;
        }
        
        html {
            font-size: {$font_size}px;
        }
    ";
    
    // Família da fonte
    switch ( $font_family ) {
        case 'serif':
            $css .= "body { font-family: Georgia, 'Times New Roman', serif; }";
            break;
        case 'sans':
            $css .= "body { font-family: 'Helvetica Neue', Arial, sans-serif; }";
            break;
        case 'mono':
            $css .= "body { font-family: 'Courier New', monospace; }";
            break;
        default:
            $css .= "body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }";
    }
    
    wp_add_inline_style( 'cetesi-style', $css );
}
add_action( 'wp_enqueue_scripts', 'cetesi_customizer_css' );

/**
 * JavaScript para preview do Customizer
 */
function cetesi_customizer_preview_js() {
    wp_enqueue_script( 'cetesi-customizer', CETESI_ASSETS_URL . '/js/customizer.js', array( 'customize-preview' ), CETESI_VERSION, true );
}
add_action( 'customize_preview_init', 'cetesi_customizer_preview_js' );
