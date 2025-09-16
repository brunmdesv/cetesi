<?php
/**
 * Configurações do Customizer para a página inicial
 *
 * @package Cetesi
 * @since 1.0.0
 */

// Evitar acesso direto
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Adiciona configurações da página inicial ao Customizer
 */
function cetesi_home_customizer( $wp_customize ) {
    
    // Painel da página inicial
    $wp_customize->add_panel( 'cetesi_home_panel', array(
        'title'       => __( 'Página Inicial', 'cetesi' ),
        'description' => __( 'Configure as seções da página inicial', 'cetesi' ),
        'priority'    => 30,
    ) );

    // ===== SEÇÃO HERO =====
    $wp_customize->add_section( 'cetesi_hero_section', array(
        'title'       => __( 'Seção Hero', 'cetesi' ),
        'description' => __( 'Configure a seção principal da página inicial', 'cetesi' ),
        'panel'       => 'cetesi_home_panel',
        'priority'    => 10,
    ) );

    // Título do Hero
    $wp_customize->add_setting( 'hero_title', array(
        'default'           => 'Transforme sua carreira com nossos cursos profissionais',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'hero_title', array(
        'label'   => __( 'Título Principal', 'cetesi' ),
        'section' => 'cetesi_hero_section',
        'type'    => 'text',
    ) );

    // Subtítulo do Hero
    $wp_customize->add_setting( 'hero_subtitle', array(
        'default'           => 'Aprenda com os melhores profissionais e desenvolva habilidades que o mercado procura.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'hero_subtitle', array(
        'label'   => __( 'Subtítulo', 'cetesi' ),
        'section' => 'cetesi_hero_section',
        'type'    => 'textarea',
    ) );

    // Texto do botão principal
    $wp_customize->add_setting( 'hero_button_text', array(
        'default'           => 'Ver Cursos',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'hero_button_text', array(
        'label'   => __( 'Texto do Botão Principal', 'cetesi' ),
        'section' => 'cetesi_hero_section',
        'type'    => 'text',
    ) );

    // URL do botão principal
    $wp_customize->add_setting( 'hero_button_url', array(
        'default'           => '#cursos',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'hero_button_url', array(
        'label'   => __( 'URL do Botão Principal', 'cetesi' ),
        'section' => 'cetesi_hero_section',
        'type'    => 'url',
    ) );

    // Texto do botão secundário
    $wp_customize->add_setting( 'hero_button_secondary_text', array(
        'default'           => 'Saiba Mais',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'hero_button_secondary_text', array(
        'label'   => __( 'Texto do Botão Secundário', 'cetesi' ),
        'section' => 'cetesi_hero_section',
        'type'    => 'text',
    ) );

    // URL do botão secundário
    $wp_customize->add_setting( 'hero_button_secondary_url', array(
        'default'           => '#sobre',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'hero_button_secondary_url', array(
        'label'   => __( 'URL do Botão Secundário', 'cetesi' ),
        'section' => 'cetesi_hero_section',
        'type'    => 'url',
    ) );

    // Imagem do Hero
    $wp_customize->add_setting( 'hero_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_image', array(
        'label'   => __( 'Imagem do Hero', 'cetesi' ),
        'section' => 'cetesi_hero_section',
    ) ) );

    // ===== SEÇÃO CURSOS =====
    $wp_customize->add_section( 'cetesi_cursos_section', array(
        'title'       => __( 'Seção Cursos', 'cetesi' ),
        'description' => __( 'Configure a seção de cursos em destaque', 'cetesi' ),
        'panel'       => 'cetesi_home_panel',
        'priority'    => 20,
    ) );

    // Título da seção cursos
    $wp_customize->add_setting( 'cursos_title', array(
        'default'           => 'Cursos em Destaque',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'cursos_title', array(
        'label'   => __( 'Título da Seção', 'cetesi' ),
        'section' => 'cetesi_cursos_section',
        'type'    => 'text',
    ) );

    // Subtítulo da seção cursos
    $wp_customize->add_setting( 'cursos_subtitle', array(
        'default'           => 'Conheça nossos cursos mais populares e transforme sua carreira',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'cursos_subtitle', array(
        'label'   => __( 'Subtítulo da Seção', 'cetesi' ),
        'section' => 'cetesi_cursos_section',
        'type'    => 'textarea',
    ) );

    // Texto do botão cursos
    $wp_customize->add_setting( 'cursos_button_text', array(
        'default'           => 'Ver Todos os Cursos',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'cursos_button_text', array(
        'label'   => __( 'Texto do Botão', 'cetesi' ),
        'section' => 'cetesi_cursos_section',
        'type'    => 'text',
    ) );

    // URL do botão cursos
    $wp_customize->add_setting( 'cursos_button_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'cursos_button_url', array(
        'label'   => __( 'URL do Botão', 'cetesi' ),
        'section' => 'cetesi_cursos_section',
        'type'    => 'url',
    ) );

    // ===== SEÇÃO SOBRE =====
    $wp_customize->add_section( 'cetesi_sobre_section', array(
        'title'       => __( 'Seção Sobre', 'cetesi' ),
        'description' => __( 'Configure a seção sobre a escola', 'cetesi' ),
        'panel'       => 'cetesi_home_panel',
        'priority'    => 30,
    ) );

    // Título da seção sobre
    $wp_customize->add_setting( 'sobre_title', array(
        'default'           => 'Sobre a CETESI',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'sobre_title', array(
        'label'   => __( 'Título da Seção', 'cetesi' ),
        'section' => 'cetesi_sobre_section',
        'type'    => 'text',
    ) );

    // Conteúdo da seção sobre
    $wp_customize->add_setting( 'sobre_content', array(
        'default'           => '<p>Somos uma escola de cursos profissionais comprometida em oferecer educação de qualidade e transformar vidas através do conhecimento.</p><p>Nossa missão é preparar profissionais para o mercado de trabalho com cursos práticos, atualizados e ministrados por especialistas experientes.</p>',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'sobre_content', array(
        'label'   => __( 'Conteúdo da Seção', 'cetesi' ),
        'section' => 'cetesi_sobre_section',
        'type'    => 'textarea',
    ) );

    // Imagem da seção sobre
    $wp_customize->add_setting( 'sobre_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sobre_image', array(
        'label'   => __( 'Imagem da Seção', 'cetesi' ),
        'section' => 'cetesi_sobre_section',
    ) ) );

    // ===== SEÇÃO ESTATÍSTICAS =====
    $wp_customize->add_section( 'cetesi_stats_section', array(
        'title'       => __( 'Seção Estatísticas', 'cetesi' ),
        'description' => __( 'Configure as estatísticas da escola', 'cetesi' ),
        'panel'       => 'cetesi_home_panel',
        'priority'    => 40,
    ) );

    // Alunos formados
    $wp_customize->add_setting( 'stat_alunos', array(
        'default'           => '500',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'stat_alunos', array(
        'label'   => __( 'Número de Alunos Formados', 'cetesi' ),
        'section' => 'cetesi_stats_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'stat_alunos_label', array(
        'default'           => 'Alunos Formados',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'stat_alunos_label', array(
        'label'   => __( 'Label dos Alunos', 'cetesi' ),
        'section' => 'cetesi_stats_section',
        'type'    => 'text',
    ) );

    // Cursos disponíveis
    $wp_customize->add_setting( 'stat_cursos', array(
        'default'           => '25',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'stat_cursos', array(
        'label'   => __( 'Número de Cursos', 'cetesi' ),
        'section' => 'cetesi_stats_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'stat_cursos_label', array(
        'default'           => 'Cursos Disponíveis',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'stat_cursos_label', array(
        'label'   => __( 'Label dos Cursos', 'cetesi' ),
        'section' => 'cetesi_stats_section',
        'type'    => 'text',
    ) );

    // Taxa de aprovação
    $wp_customize->add_setting( 'stat_certificados', array(
        'default'           => '95',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'stat_certificados', array(
        'label'   => __( 'Taxa de Aprovação (%)', 'cetesi' ),
        'section' => 'cetesi_stats_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'stat_certificados_label', array(
        'default'           => '% de Aprovação',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'stat_certificados_label', array(
        'label'   => __( 'Label da Taxa de Aprovação', 'cetesi' ),
        'section' => 'cetesi_stats_section',
        'type'    => 'text',
    ) );

    // Anos de experiência
    $wp_customize->add_setting( 'stat_anos', array(
        'default'           => '10',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'stat_anos', array(
        'label'   => __( 'Anos de Experiência', 'cetesi' ),
        'section' => 'cetesi_stats_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'stat_anos_label', array(
        'default'           => 'Anos de Experiência',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'stat_anos_label', array(
        'label'   => __( 'Label dos Anos', 'cetesi' ),
        'section' => 'cetesi_stats_section',
        'type'    => 'text',
    ) );

    // ===== SEÇÃO CONTATO =====
    $wp_customize->add_section( 'cetesi_contato_section', array(
        'title'       => __( 'Seção Contato', 'cetesi' ),
        'description' => __( 'Configure a seção de contato', 'cetesi' ),
        'panel'       => 'cetesi_home_panel',
        'priority'    => 50,
    ) );

    // Título da seção contato
    $wp_customize->add_setting( 'contato_title', array(
        'default'           => 'Entre em Contato',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'contato_title', array(
        'label'   => __( 'Título da Seção', 'cetesi' ),
        'section' => 'cetesi_contato_section',
        'type'    => 'text',
    ) );

    // Subtítulo da seção contato
    $wp_customize->add_setting( 'contato_subtitle', array(
        'default'           => 'Tem alguma dúvida? Estamos aqui para ajudar!',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'contato_subtitle', array(
        'label'   => __( 'Subtítulo da Seção', 'cetesi' ),
        'section' => 'cetesi_contato_section',
        'type'    => 'textarea',
    ) );

    // Email de contato
    $wp_customize->add_setting( 'contato_email', array(
        'default'           => 'contato@cetesi.com.br',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'contato_email', array(
        'label'   => __( 'Email de Contato', 'cetesi' ),
        'section' => 'cetesi_contato_section',
        'type'    => 'email',
    ) );

    // Telefone de contato
    $wp_customize->add_setting( 'contato_telefone', array(
        'default'           => '(11) 99999-9999',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'contato_telefone', array(
        'label'   => __( 'Telefone de Contato', 'cetesi' ),
        'section' => 'cetesi_contato_section',
        'type'    => 'text',
    ) );

    // Endereço
    $wp_customize->add_setting( 'contato_endereco', array(
        'default'           => 'Rua das Flores, 123 - Centro, São Paulo - SP',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'contato_endereco', array(
        'label'   => __( 'Endereço', 'cetesi' ),
        'section' => 'cetesi_contato_section',
        'type'    => 'textarea',
    ) );

    // Horário de funcionamento
    $wp_customize->add_setting( 'contato_horario', array(
        'default'           => 'Segunda a Sexta: 8h às 18h',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'contato_horario', array(
        'label'   => __( 'Horário de Funcionamento', 'cetesi' ),
        'section' => 'cetesi_contato_section',
        'type'    => 'text',
    ) );
}
add_action( 'customize_register', 'cetesi_home_customizer' );
