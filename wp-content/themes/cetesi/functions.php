<?php
/**
 * Funções do tema Cetesi
 *
 * Este arquivo contém todas as funções e configurações principais do tema.
 * É carregado automaticamente pelo WordPress.
 *
 * @package Cetesi
 * @since 1.0.0
 */

// Previne acesso direto
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define constantes do tema
define( 'CETESI_VERSION', '1.0.0' );
define( 'CETESI_THEME_DIR', get_template_directory() );
define( 'CETESI_THEME_URL', get_template_directory_uri() );
define( 'CETESI_ASSETS_URL', CETESI_THEME_URL . '/assets' );

// Incluir arquivos de funcionalidades
require_once CETESI_THEME_DIR . '/inc/courses-admin.php';
require_once CETESI_THEME_DIR . '/inc/courses-create.php';
require_once CETESI_THEME_DIR . '/inc/courses-edit.php';
require_once CETESI_THEME_DIR . '/inc/courses-functions.php';

/**
 * Configuração do tema
 */
function cetesi_setup() {
    // Suporte a tradução
    load_theme_textdomain( 'cetesi', CETESI_THEME_DIR . '/languages' );

    // Suporte a recursos HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Suporte a título dinâmico
    add_theme_support( 'title-tag' );

    // Suporte a logo personalizado e imagem de cabeçalho movidos para header-functions.php

    // Suporte a imagem de fundo personalizada
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) );

    // Suporte a imagens destacadas
    add_theme_support( 'post-thumbnails' );

    // Tamanhos de imagem personalizados
    add_image_size( 'cetesi-featured', 800, 400, true );
    add_image_size( 'cetesi-thumbnail', 300, 200, true );

    // Suporte a menus (principal e cursos movidos para header-functions.php)
    register_nav_menus( array(
        'rodape'    => esc_html__( 'Menu do Rodapé', 'cetesi' ),
    ) );

    // Suporte a feed automático
    add_theme_support( 'automatic-feed-links' );

    // Suporte a comentários em thread
    add_theme_support( 'threaded-comments' );

    // Suporte a CSS personalizado
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Suporte a editor de blocos
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );

    // Suporte a editor de cores
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => esc_html__( 'Azul Principal', 'cetesi' ),
            'slug'  => 'primary-blue',
            'color' => '#3498db',
        ),
        array(
            'name'  => esc_html__( 'Azul Escuro', 'cetesi' ),
            'slug'  => 'dark-blue',
            'color' => '#2980b9',
        ),
        array(
            'name'  => esc_html__( 'Cinza Escuro', 'cetesi' ),
            'slug'  => 'dark-gray',
            'color' => '#2c3e50',
        ),
        array(
            'name'  => esc_html__( 'Cinza Claro', 'cetesi' ),
            'slug'  => 'light-gray',
            'color' => '#7f8c8d',
        ),
        array(
            'name'  => esc_html__( 'Branco', 'cetesi' ),
            'slug'  => 'white',
            'color' => '#ffffff',
        ),
    ) );

    // Suporte a editor de fontes
    add_theme_support( 'editor-font-sizes', array(
        array(
            'name' => esc_html__( 'Pequeno', 'cetesi' ),
            'size' => 14,
            'slug' => 'small',
        ),
        array(
            'name' => esc_html__( 'Normal', 'cetesi' ),
            'size' => 16,
            'slug' => 'normal',
        ),
        array(
            'name' => esc_html__( 'Médio', 'cetesi' ),
            'size' => 20,
            'slug' => 'medium',
        ),
        array(
            'name' => esc_html__( 'Grande', 'cetesi' ),
            'size' => 24,
            'slug' => 'large',
        ),
        array(
            'name' => esc_html__( 'Extra Grande', 'cetesi' ),
            'size' => 32,
            'slug' => 'extra-large',
        ),
    ) );

    // Suporte a responsividade de imagens
    add_theme_support( 'responsive-embeds' );

    // Suporte a post formats (opcional)
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );
}
add_action( 'after_setup_theme', 'cetesi_setup' );

/**
 * Configuração do conteúdo width
 */
function cetesi_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'cetesi_content_width', 800 );
}
add_action( 'after_setup_theme', 'cetesi_content_width', 0 );

/**
 * Registro de áreas de widgets
 */
function cetesi_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Principal', 'cetesi' ),
        'id'            => 'sidebar-principal',
        'description'   => esc_html__( 'Adicione widgets aqui para aparecerem na sidebar.', 'cetesi' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar do Rodapé', 'cetesi' ),
        'id'            => 'sidebar-rodape',
        'description'   => esc_html__( 'Adicione widgets aqui para aparecerem no rodapé.', 'cetesi' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Área de widget para cursos em destaque
    register_sidebar( array(
        'name'          => esc_html__( 'Cursos em Destaque', 'cetesi' ),
        'id'            => 'cursos-destaque',
        'description'   => esc_html__( 'Exibe cursos em destaque na página inicial.', 'cetesi' ),
        'before_widget' => '<section id="%1$s" class="widget cursos-destaque-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Área de widget para professores
    register_sidebar( array(
        'name'          => esc_html__( 'Professores', 'cetesi' ),
        'id'            => 'professores',
        'description'   => esc_html__( 'Exibe informações sobre professores.', 'cetesi' ),
        'before_widget' => '<section id="%1$s" class="widget professores-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Área de widget para depoimentos
    register_sidebar( array(
        'name'          => esc_html__( 'Depoimentos', 'cetesi' ),
        'id'            => 'depoimentos',
        'description'   => esc_html__( 'Exibe depoimentos de alunos.', 'cetesi' ),
        'before_widget' => '<section id="%1$s" class="widget depoimentos-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Área de widget para estatísticas
    register_sidebar( array(
        'name'          => esc_html__( 'Estatísticas', 'cetesi' ),
        'id'            => 'estatisticas',
        'description'   => esc_html__( 'Exibe estatísticas da escola.', 'cetesi' ),
        'before_widget' => '<section id="%1$s" class="widget estatisticas-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'cetesi_widgets_init' );

/**
 * Enfileiramento de scripts e estilos (exceto header)
 */
function cetesi_scripts() {
    // CSS de fontes personalizadas locais (carregar primeiro com prioridade máxima)
    wp_enqueue_style( 'cetesi-fonts', CETESI_ASSETS_URL . '/css/fonts.css', array(), CETESI_VERSION );
    
    // FontAwesome via CDN (seguindo padrão do cetesi-theme)
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
    
    // CSS principal
    wp_enqueue_style( 'cetesi-style', get_stylesheet_uri(), array( 'cetesi-fonts', 'font-awesome' ), CETESI_VERSION );
    
    // CSS adicional
    wp_enqueue_style( 'cetesi-main', CETESI_ASSETS_URL . '/css/main.css', array( 'font-awesome' ), CETESI_VERSION );
    
    // CSS da página inicial
    if ( is_front_page() ) {
        wp_enqueue_style( 'cetesi-home', CETESI_ASSETS_URL . '/css/home.css', array( 'cetesi-main' ), CETESI_VERSION );
        // CSS da Hero Moderna
        wp_enqueue_style( 'cetesi-hero-modern', CETESI_ASSETS_URL . '/css/hero-modern.css', array( 'cetesi-home' ), CETESI_VERSION );
        // CSS Mobile Customizado (carregado após hero-modern para sobrescrever)
        wp_enqueue_style( 'cetesi-hero-mobile-custom', CETESI_ASSETS_URL . '/css/hero-mobile-custom.css', array( 'cetesi-hero-modern' ), CETESI_VERSION );
        // CSS da Seção de Cursos
        wp_enqueue_style( 'cetesi-courses', CETESI_ASSETS_URL . '/css/courses.css', array( 'cetesi-home' ), CETESI_VERSION );
        // CSS Mobile Customizado para Cursos (carregado após courses para sobrescrever)
        wp_enqueue_style( 'cetesi-courses-mobile-custom', CETESI_ASSETS_URL . '/css/courses-mobile-custom.css', array( 'cetesi-courses' ), CETESI_VERSION );
    
    }
    
    // Enfileirar estilos específicos para páginas de cursos
    if (is_page_template('page-cursos.php')) {
        wp_enqueue_style( 'cetesi-page-cursos', CETESI_ASSETS_URL . '/css/page-cursos.css', array( 'cetesi-main' ), CETESI_VERSION );
    }
    
    if (is_singular('curso')) {
        wp_enqueue_style( 'cetesi-single-curso', CETESI_ASSETS_URL . '/css/single-curso.css', array( 'cetesi-main' ), CETESI_VERSION );
    }
    
    // JavaScript principal
    wp_enqueue_script( 'cetesi-main', CETESI_ASSETS_URL . '/js/main.js', array( 'jquery' ), CETESI_VERSION, true );
    
    // JavaScript da página inicial
    if ( is_front_page() ) {
        wp_enqueue_script( 'cetesi-home', CETESI_ASSETS_URL . '/js/home.js', array( 'jquery' ), CETESI_VERSION, true );
        // JavaScript da Hero Moderna
        wp_enqueue_script( 'cetesi-hero-modern', CETESI_ASSETS_URL . '/js/hero-modern.js', array( 'jquery', 'cetesi-home' ), CETESI_VERSION, true );
    }
    
    // Comentários
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
    // Localização para JavaScript
    wp_localize_script( 'cetesi-main', 'cetesi_ajax', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'cetesi_nonce' ),
        'strings'  => array(
            'loading' => esc_html__( 'Carregando...', 'cetesi' ),
            'error'   => esc_html__( 'Ocorreu um erro. Tente novamente.', 'cetesi' ),
        ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'cetesi_scripts' );

/**
 * Forçar carregamento das fontes no head
 */
function cetesi_force_fonts_in_head() {
    echo '<link rel="preload" href="' . CETESI_ASSETS_URL . '/css/fonts.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
    echo '<noscript><link rel="stylesheet" href="' . CETESI_ASSETS_URL . '/css/fonts.css"></noscript>';
}
add_action( 'wp_head', 'cetesi_force_fonts_in_head', 1 );

/**
 * Forçar carregamento do FontAwesome no head com prioridade máxima
 */
function cetesi_force_fontawesome_in_head() {
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">';
}
add_action( 'wp_head', 'cetesi_force_fontawesome_in_head', 2 );

/**
 * Estilos do editor
 */
function cetesi_editor_styles() {
    add_editor_style( array(
        'style.css',
        CETESI_ASSETS_URL . '/css/editor.css',
    ) );
}
add_action( 'after_setup_theme', 'cetesi_editor_styles' );

/**
 * Personalização do excerpt
 */
function cetesi_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'cetesi_excerpt_length' );

function cetesi_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'cetesi_excerpt_more' );

/**
 * Adiciona classes ao body (exceto header)
 */
function cetesi_body_classes( $classes ) {
    // Adiciona classe se não há sidebar
    if ( ! is_active_sidebar( 'sidebar-principal' ) ) {
        $classes[] = 'no-sidebar';
    }
    
    // Adiciona classe para páginas com imagem destacada
    if ( is_singular() && has_post_thumbnail() ) {
        $classes[] = 'has-featured-image';
    }
    
    return $classes;
}
add_filter( 'body_class', 'cetesi_body_classes' );

/**
 * Personalização do título da página
 */
function cetesi_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }
    
    global $page, $page;
    
    // Adiciona o nome do site
    $title .= get_bloginfo( 'name', 'display' );
    
    // Adiciona a descrição do site para a home
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }
    
    // Adiciona número da página se necessário
    if ( ( $page >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( esc_html__( 'Página %s', 'cetesi' ), max( $page, $page ) );
    }
    
    return $title;
}
add_filter( 'wp_title', 'cetesi_wp_title', 10, 2 );

/**
 * Funções de limpeza e otimização movidas para header-functions.php
 */

/**
 * Otimização de performance
 */
function cetesi_remove_wp_block_library_css() {
    if ( ! is_admin() ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-block-style' );
    }
}
add_action( 'wp_enqueue_scripts', 'cetesi_remove_wp_block_library_css', 100 );

/**
 * Adiciona suporte a lazy loading
 */
function cetesi_add_lazy_loading( $attr, $attachment, $size ) {
    if ( ! is_admin() ) {
        $attr['loading'] = 'lazy';
    }
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'cetesi_add_lazy_loading', 10, 3 );

/**
 * Inclui arquivos de funcionalidades
 */
require_once CETESI_THEME_DIR . '/inc/header-functions.php';
require_once CETESI_THEME_DIR . '/inc/footer-functions.php';
require_once CETESI_THEME_DIR . '/inc/customizer.php';
require_once CETESI_THEME_DIR . '/inc/home-customizer.php';
require_once CETESI_THEME_DIR . '/inc/hero-modern-customizer.php';
require_once CETESI_THEME_DIR . '/inc/courses-customizer.php';
require_once CETESI_THEME_DIR . '/inc/template-functions.php';
require_once CETESI_THEME_DIR . '/inc/template-tags.php';

/**
 * Ativação do tema (configurações do header movidas para header-functions.php)
 */
function cetesi_theme_activation() {
    // Flush rewrite rules
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'cetesi_theme_activation' );

/**
 * Desativação do tema
 */
function cetesi_theme_deactivation() {
    // Flush rewrite rules
    flush_rewrite_rules();
}
add_action( 'switch_theme', 'cetesi_theme_deactivation' );

/**
 * Walker personalizado para menu mobile movido para header-functions.php
 */

