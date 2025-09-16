<?php
/**
 * Courses Section Customizer
 *
 * @package Cetesi
 */

// Previne acesso direto
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Adiciona configurações da seção de cursos ao Customizer
 */
function cetesi_courses_customizer( $wp_customize ) {
    
    // ===== SEÇÃO DE CURSOS =====
    $wp_customize->add_section( 'cetesi_courses_section', array(
        'title'    => __( 'Seção de Cursos', 'cetesi' ),
        'priority' => 30,
        'panel'    => 'cetesi_home_panel',
    ) );

    // ===== TÍTULO DA SEÇÃO =====
    $wp_customize->add_setting( 'courses_title', array(
        'default'           => 'Nossos Cursos',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_title', array(
        'label'   => __( 'Título da Seção', 'cetesi' ),
        'section' => 'cetesi_courses_section',
        'type'    => 'text',
    ) );

    // ===== SUBTÍTULO DA SEÇÃO =====
    $wp_customize->add_setting( 'courses_subtitle', array(
        'default'           => 'Oferecemos uma ampla gama de cursos técnicos, livres e de qualificação, reconhecidos pelo MEC e alinhados com as demandas do mercado de trabalho.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_subtitle', array(
        'label'   => __( 'Subtítulo da Seção', 'cetesi' ),
        'section' => 'cetesi_courses_section',
        'type'    => 'textarea',
    ) );

    // ===== NÚMERO DE CURSOS POR PÁGINA =====
    $wp_customize->add_setting( 'courses_per_page', array(
        'default'           => 6,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_per_page', array(
        'label'       => __( 'Número de Cursos por Página', 'cetesi' ),
        'description' => __( 'Quantos cursos exibir na seção (máximo 12)', 'cetesi' ),
        'section'     => 'cetesi_courses_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 3,
            'max'  => 12,
            'step' => 1,
        ),
    ) );

    // ===== BOTÃO VER TODOS =====
    $wp_customize->add_setting( 'courses_view_all_text', array(
        'default'           => 'Ver Todos os Cursos',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_view_all_text', array(
        'label'   => __( 'Texto do Botão "Ver Todos"', 'cetesi' ),
        'section' => 'cetesi_courses_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'courses_view_all_url', array(
        'default'           => '#cursos',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_view_all_url', array(
        'label'   => __( 'URL do Botão "Ver Todos"', 'cetesi' ),
        'section' => 'cetesi_courses_section',
        'type'    => 'url',
    ) );

    // ===== CORES DA SEÇÃO =====
    $wp_customize->add_setting( 'courses_bg_color', array(
        'default'           => '#f8fafc',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'courses_bg_color', array(
        'label'   => __( 'Cor de Fundo da Seção', 'cetesi' ),
        'section' => 'cetesi_courses_section',
    ) ) );

    $wp_customize->add_setting( 'courses_title_color', array(
        'default'           => '#111827',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'courses_title_color', array(
        'label'   => __( 'Cor do Título', 'cetesi' ),
        'section' => 'cetesi_courses_section',
    ) ) );

    $wp_customize->add_setting( 'courses_subtitle_color', array(
        'default'           => '#6b7280',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'courses_subtitle_color', array(
        'label'   => __( 'Cor do Subtítulo', 'cetesi' ),
        'section' => 'cetesi_courses_section',
    ) ) );

    // ===== CONFIGURAÇÕES DE LAYOUT =====
    $wp_customize->add_setting( 'courses_columns_desktop', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_columns_desktop', array(
        'label'       => __( 'Colunas no Desktop', 'cetesi' ),
        'description' => __( 'Número de colunas no desktop (2 ou 3)', 'cetesi' ),
        'section'     => 'cetesi_courses_section',
        'type'        => 'select',
        'choices'     => array(
            '2' => __( '2 Colunas', 'cetesi' ),
            '3' => __( '3 Colunas', 'cetesi' ),
        ),
    ) );

    $wp_customize->add_setting( 'courses_columns_tablet', array(
        'default'           => 2,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_columns_tablet', array(
        'label'       => __( 'Colunas no Tablet', 'cetesi' ),
        'description' => __( 'Número de colunas no tablet (1 ou 2)', 'cetesi' ),
        'section'     => 'cetesi_courses_section',
        'type'        => 'select',
        'choices'     => array(
            '1' => __( '1 Coluna', 'cetesi' ),
            '2' => __( '2 Colunas', 'cetesi' ),
        ),
    ) );

    // ===== CONFIGURAÇÕES DE CARD =====
    $wp_customize->add_setting( 'courses_card_style', array(
        'default'           => 'modern',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_card_style', array(
        'label'   => __( 'Estilo dos Cards', 'cetesi' ),
        'section' => 'cetesi_courses_section',
        'type'    => 'select',
        'choices' => array(
            'modern'  => __( 'Moderno', 'cetesi' ),
            'minimal' => __( 'Minimalista', 'cetesi' ),
            'classic' => __( 'Clássico', 'cetesi' ),
        ),
    ) );

    $wp_customize->add_setting( 'courses_show_lines', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_show_lines', array(
        'label'   => __( 'Mostrar Linhas Decorativas', 'cetesi' ),
        'section' => 'cetesi_courses_section',
        'type'    => 'checkbox',
    ) );

    $wp_customize->add_setting( 'courses_show_description', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_show_description', array(
        'label'   => __( 'Mostrar Descrição dos Cursos', 'cetesi' ),
        'section' => 'cetesi_courses_section',
        'type'    => 'checkbox',
    ) );

    // ===== CONFIGURAÇÕES DE ANIMAÇÃO =====
    $wp_customize->add_setting( 'courses_enable_animations', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_enable_animations', array(
        'label'   => __( 'Ativar Animações', 'cetesi' ),
        'section' => 'cetesi_courses_section',
        'type'    => 'checkbox',
    ) );

    $wp_customize->add_setting( 'courses_animation_delay', array(
        'default'           => 100,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'courses_animation_delay', array(
        'label'       => __( 'Delay da Animação (ms)', 'cetesi' ),
        'description' => __( 'Delay entre as animações dos cards (50-500ms)', 'cetesi' ),
        'section'     => 'cetesi_courses_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 50,
            'max'  => 500,
            'step' => 50,
        ),
    ) );
}

add_action( 'customize_register', 'cetesi_courses_customizer' );

/**
 * CSS personalizado para a seção de cursos
 */
function cetesi_courses_custom_css() {
    $courses_bg_color = get_theme_mod( 'courses_bg_color', '#f8fafc' );
    $courses_title_color = get_theme_mod( 'courses_title_color', '#111827' );
    $courses_subtitle_color = get_theme_mod( 'courses_subtitle_color', '#6b7280' );
    $courses_columns_desktop = get_theme_mod( 'courses_columns_desktop', 3 );
    $courses_columns_tablet = get_theme_mod( 'courses_columns_tablet', 2 );
    $courses_show_lines = get_theme_mod( 'courses_show_lines', true );
    $courses_show_description = get_theme_mod( 'courses_show_description', true );
    $courses_enable_animations = get_theme_mod( 'courses_enable_animations', true );

    $css = '';

    // Cor de fundo da seção
    if ( $courses_bg_color !== '#f8fafc' ) {
        $css .= ".courses-section { background: {$courses_bg_color} !important; }";
    }

    // Cor do título
    if ( $courses_title_color !== '#111827' ) {
        $css .= ".courses-title { color: {$courses_title_color} !important; }";
    }

    // Cor do subtítulo
    if ( $courses_subtitle_color !== '#6b7280' ) {
        $css .= ".courses-subtitle { color: {$courses_subtitle_color} !important; }";
    }

    // Colunas no desktop
    if ( $courses_columns_desktop == 2 ) {
        $css .= "@media (min-width: 1024px) { .courses-grid { grid-template-columns: repeat(2, 1fr) !important; } }";
    }

    // Colunas no tablet
    if ( $courses_columns_tablet == 1 ) {
        $css .= "@media (max-width: 1023px) and (min-width: 768px) { .courses-grid { grid-template-columns: 1fr !important; } }";
    }

    // Ocultar linhas decorativas
    if ( ! $courses_show_lines ) {
        $css .= ".course-lines { display: none !important; }";
    }

    // Ocultar descrições
    if ( ! $courses_show_description ) {
        $css .= ".course-description { display: none !important; }";
    }

    // Desabilitar animações
    if ( ! $courses_enable_animations ) {
        $css .= ".course-card { animation: none !important; }";
        $css .= ".course-card:hover { transform: none !important; }";
    }

    if ( ! empty( $css ) ) {
        wp_add_inline_style( 'cetesi-courses', $css );
    }
}

add_action( 'wp_enqueue_scripts', 'cetesi_courses_custom_css' );

/**
 * JavaScript para preview em tempo real
 */
function cetesi_courses_customizer_js() {
    ?>
    <script type="text/javascript">
    (function($) {
        'use strict';

        // Preview do título
        wp.customize('courses_title', function(value) {
            value.bind(function(newval) {
                $('.courses-title').text(newval);
            });
        });

        // Preview do subtítulo
        wp.customize('courses_subtitle', function(value) {
            value.bind(function(newval) {
                $('.courses-subtitle').text(newval);
            });
        });

        // Preview do botão "Ver Todos"
        wp.customize('courses_view_all_text', function(value) {
            value.bind(function(newval) {
                $('.courses-view-all span').text(newval);
            });
        });

        // Preview da URL do botão "Ver Todos"
        wp.customize('courses_view_all_url', function(value) {
            value.bind(function(newval) {
                $('.courses-view-all').attr('href', newval);
            });
        });

        // Preview das cores
        wp.customize('courses_bg_color', function(value) {
            value.bind(function(newval) {
                $('.courses-section').css('background', newval);
            });
        });

        wp.customize('courses_title_color', function(value) {
            value.bind(function(newval) {
                $('.courses-title').css('color', newval);
            });
        });

        wp.customize('courses_subtitle_color', function(value) {
            value.bind(function(newval) {
                $('.courses-subtitle').css('color', newval);
            });
        });

        // Preview das configurações de layout
        wp.customize('courses_show_lines', function(value) {
            value.bind(function(newval) {
                if (newval) {
                    $('.course-lines').show();
                } else {
                    $('.course-lines').hide();
                }
            });
        });

        wp.customize('courses_show_description', function(value) {
            value.bind(function(newval) {
                if (newval) {
                    $('.course-description').show();
                } else {
                    $('.course-description').hide();
                }
            });
        });

    })(jQuery);
    </script>
    <?php
}

add_action( 'customize_preview_init', 'cetesi_courses_customizer_js' );
