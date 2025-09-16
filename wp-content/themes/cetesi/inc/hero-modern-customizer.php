<?php
/**
 * Customizer para Hero Section Moderna
 *
 * @package Cetesi
 * @since 1.0.0
 */

// Previne acesso direto
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Adicionar seção do customizer para Hero Moderna
 */
function cetesi_hero_modern_customizer( $wp_customize ) {
    
    // ===== SEÇÃO HERO MODERNA =====
    $wp_customize->add_section( 'cetesi_hero_modern', array(
        'title'    => esc_html__( 'Hero Section Moderna', 'cetesi' ),
        'priority' => 25,
        'panel'    => 'cetesi_home_panel',
    ) );

    // ===== BADGE DE DESTAQUE =====
    $wp_customize->add_setting( 'hero_badge_text', array(
        'default'           => 'Escola #1 em Cursos Profissionais',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_badge_text', array(
        'label'       => esc_html__( 'Texto do Badge', 'cetesi' ),
        'description' => esc_html__( 'Texto que aparece no badge de destaque', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    // ===== TÍTULO PRINCIPAL (LINHA 1) =====
    $wp_customize->add_setting( 'hero_title_line1', array(
        'default'           => 'Transforme sua',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_title_line1', array(
        'label'       => esc_html__( 'Título - Linha 1', 'cetesi' ),
        'description' => esc_html__( 'Primeira linha do título principal', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    // ===== TÍTULO PRINCIPAL (LINHA 2) =====
    $wp_customize->add_setting( 'hero_title_line2', array(
        'default'           => 'Carreira',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_title_line2', array(
        'label'       => esc_html__( 'Título - Linha 2 (Destacada)', 'cetesi' ),
        'description' => esc_html__( 'Segunda linha do título (aparece destacada)', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    // ===== TÍTULO PRINCIPAL (LINHA 3) =====
    $wp_customize->add_setting( 'hero_title_line3', array(
        'default'           => 'com Excelência',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_title_line3', array(
        'label'       => esc_html__( 'Título - Linha 3', 'cetesi' ),
        'description' => esc_html__( 'Terceira linha do título principal', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    // ===== SUBTÍTULO =====
    $wp_customize->add_setting( 'hero_subtitle', array(
        'default'           => 'Aprenda com os melhores profissionais e desenvolva habilidades que o mercado procura. Junte-se a milhares de alunos que já transformaram suas vidas.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_subtitle', array(
        'label'       => esc_html__( 'Subtítulo', 'cetesi' ),
        'description' => esc_html__( 'Texto descritivo abaixo do título', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'textarea',
    ) );

    // ===== ESTATÍSTICAS =====
    $wp_customize->add_setting( 'hero_stat1_number', array(
        'default'           => '60000',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_stat1_number', array(
        'label'       => esc_html__( 'Estatística 1 - Número', 'cetesi' ),
        'description' => esc_html__( 'Primeira estatística (número)', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_stat1_label', array(
        'default'           => 'Alunos Formados',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_stat1_label', array(
        'label'       => esc_html__( 'Estatística 1 - Rótulo', 'cetesi' ),
        'description' => esc_html__( 'Primeira estatística (rótulo)', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_stat2_number', array(
        'default'           => '95',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_stat2_number', array(
        'label'       => esc_html__( 'Estatística 2 - Número', 'cetesi' ),
        'description' => esc_html__( 'Segunda estatística (número)', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_stat2_label', array(
        'default'           => '% Empregabilidade',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_stat2_label', array(
        'label'       => esc_html__( 'Estatística 2 - Rótulo', 'cetesi' ),
        'description' => esc_html__( 'Segunda estatística (rótulo)', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_stat3_number', array(
        'default'           => '25',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_stat3_number', array(
        'label'       => esc_html__( 'Estatística 3 - Número', 'cetesi' ),
        'description' => esc_html__( 'Terceira estatística (número)', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_stat3_label', array(
        'default'           => 'Anos de Experiência',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_stat3_label', array(
        'label'       => esc_html__( 'Estatística 3 - Rótulo', 'cetesi' ),
        'description' => esc_html__( 'Terceira estatística (rótulo)', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    // ===== BOTÕES DE AÇÃO =====
    $wp_customize->add_setting( 'hero_button_text', array(
        'default'           => 'Ver Cursos',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_button_text', array(
        'label'       => esc_html__( 'Texto do Botão Principal', 'cetesi' ),
        'description' => esc_html__( 'Texto do botão principal', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_button_url', array(
        'default'           => '#cursos',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_button_url', array(
        'label'       => esc_html__( 'URL do Botão Principal', 'cetesi' ),
        'description' => esc_html__( 'Link do botão principal', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'url',
    ) );

    $wp_customize->add_setting( 'hero_button_secondary_text', array(
        'default'           => 'Fale Conosco',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_button_secondary_text', array(
        'label'       => esc_html__( 'Texto do Botão Secundário', 'cetesi' ),
        'description' => esc_html__( 'Texto do botão secundário', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_button_secondary_url', array(
        'default'           => '#contato',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_button_secondary_url', array(
        'label'       => esc_html__( 'URL do Botão Secundário', 'cetesi' ),
        'description' => esc_html__( 'Link do botão secundário', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'url',
    ) );

    // ===== CARD PRINCIPAL =====
    $wp_customize->add_setting( 'hero_card_title', array(
        'default'           => 'Curso em Destaque',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_card_title', array(
        'label'       => esc_html__( 'Título do Card', 'cetesi' ),
        'description' => esc_html__( 'Título do card principal', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_card_subtitle', array(
        'default'           => 'Desenvolvimento Web Full Stack',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_card_subtitle', array(
        'label'       => esc_html__( 'Subtítulo do Card', 'cetesi' ),
        'description' => esc_html__( 'Subtítulo do card principal', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_card_rating', array(
        'default'           => '4.9 (2.3k avaliações)',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_card_rating', array(
        'label'       => esc_html__( 'Avaliação do Card', 'cetesi' ),
        'description' => esc_html__( 'Texto da avaliação do card', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_card_progress', array(
        'default'           => '85% dos alunos recomendam',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_card_progress', array(
        'label'       => esc_html__( 'Texto de Progresso', 'cetesi' ),
        'description' => esc_html__( 'Texto da barra de progresso', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_card_progress_percentage', array(
        'default'           => '85',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_card_progress_percentage', array(
        'label'       => esc_html__( 'Porcentagem de Progresso', 'cetesi' ),
        'description' => esc_html__( 'Porcentagem da barra de progresso (0-100)', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
        ),
    ) );

    // ===== IMAGEM DA HERO =====
    $wp_customize->add_setting( 'hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_image', array(
        'label'       => esc_html__( 'Imagem da Hero', 'cetesi' ),
        'description' => esc_html__( 'Imagem principal da hero section', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
    ) ) );

    // ===== CORES PERSONALIZADAS =====
    $wp_customize->add_setting( 'hero_primary_color', array(
        'default'           => '#2563eb',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_primary_color', array(
        'label'       => esc_html__( 'Cor Primária', 'cetesi' ),
        'description' => esc_html__( 'Cor primária da hero section', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
    ) ) );

    $wp_customize->add_setting( 'hero_secondary_color', array(
        'default'           => '#10b981',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_secondary_color', array(
        'label'       => esc_html__( 'Cor Secundária', 'cetesi' ),
        'description' => esc_html__( 'Cor secundária da hero section', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
    ) ) );

    $wp_customize->add_setting( 'hero_accent_color', array(
        'default'           => '#f59e0b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_accent_color', array(
        'label'       => esc_html__( 'Cor de Destaque', 'cetesi' ),
        'description' => esc_html__( 'Cor de destaque (badge, estrelas, etc.)', 'cetesi' ),
        'section'     => 'cetesi_hero_modern',
    ) ) );
}

add_action( 'customize_register', 'cetesi_hero_modern_customizer' );

/**
 * JavaScript para preview em tempo real
 */
function cetesi_hero_modern_customizer_js() {
    wp_enqueue_script( 'cetesi-hero-modern-customizer', CETESI_ASSETS_URL . '/js/hero-modern-customizer.js', array( 'jquery', 'customize-preview' ), CETESI_VERSION, true );
}
add_action( 'customize_preview_init', 'cetesi_hero_modern_customizer_js' );

/**
 * CSS personalizado baseado nas configurações do customizer
 */
function cetesi_hero_modern_custom_css() {
    // CSS personalizado removido - usando apenas variáveis CSS do sistema
    // Todas as cores são controladas pela variável --gradient-hero em variables.css
}
add_action( 'wp_enqueue_scripts', 'cetesi_hero_modern_custom_css' );
