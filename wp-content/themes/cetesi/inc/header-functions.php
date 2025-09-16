<?php
/**
 * Funções específicas do Header
 *
 * Este arquivo contém todas as funções relacionadas ao header do tema CETESI.
 * Mantém a separação completa entre funcionalidades do header e outras partes do site.
 *
 * @package Cetesi
 * @since 1.0.0
 */

// Previne acesso direto
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Configurações específicas do header
 */
function cetesi_header_setup() {
    // Suporte a logo personalizado
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Suporte a imagem de cabeçalho personalizada
    add_theme_support( 'custom-header', array(
        'default-image'      => '',
        'default-text-color' => '2c3e50',
        'width'              => 1200,
        'height'             => 300,
        'flex-height'        => true,
        'flex-width'         => true,
        'uploads'            => true,
        'header-text'        => true,
    ) );

    // Registro de menus específicos do header
    register_nav_menus( array(
        'principal' => esc_html__( 'Menu Principal', 'cetesi' ),
        'cursos'    => esc_html__( 'Menu de Cursos', 'cetesi' ),
    ) );
}
add_action( 'after_setup_theme', 'cetesi_header_setup' );

/**
 * Enfileiramento de scripts e estilos específicos do header
 */
function cetesi_header_scripts() {
    // CSS do header (sempre carregado)
    wp_enqueue_style( 'cetesi-header', CETESI_ASSETS_URL . '/css/header.css', array(), CETESI_VERSION );
    
    // JavaScript do header (sempre carregado)
    wp_enqueue_script( 'cetesi-header', CETESI_ASSETS_URL . '/js/header.js', array( 'jquery' ), CETESI_VERSION, true );
    
    // Localização para JavaScript do header
    wp_localize_script( 'cetesi-header', 'cetesi_header_ajax', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'cetesi_header_nonce' ),
        'strings'  => array(
            'menu_toggle' => esc_html__( 'Alternar menu', 'cetesi' ),
            'menu_close'  => esc_html__( 'Fechar menu', 'cetesi' ),
        ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'cetesi_header_scripts' );

/**
 * Adiciona classes específicas do header ao body
 */
function cetesi_header_body_classes( $classes ) {
    // Adiciona classe se há logo personalizado
    if ( has_custom_logo() ) {
        $classes[] = 'has-custom-logo';
    }
    
    // Adiciona classe se há imagem de cabeçalho
    if ( get_header_image() ) {
        $classes[] = 'has-header-image';
    }
    
    return $classes;
}
add_filter( 'body_class', 'cetesi_header_body_classes' );

/**
 * Fallback para menu principal
 */
function cetesi_fallback_menu() {
    echo '<ul class="nav-menu-list">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '"><i class="fas fa-home"></i> <span>Início</span></a></li>';
    echo '<li><a href="' . esc_url( home_url( '/cursos' ) ) . '"><i class="fas fa-graduation-cap"></i> <span>Cursos</span></a></li>';
    echo '<li><a href="' . esc_url( home_url( '/sobre' ) ) . '"><i class="fas fa-info-circle"></i> <span>Sobre</span></a></li>';
    echo '<li><a href="' . esc_url( home_url( '/contato' ) ) . '"><i class="fas fa-envelope"></i> <span>Contato</span></a></li>';
    echo '</ul>';
}

/**
 * Walker personalizado para menu mobile criativo
 */
class Cetesi_Mobile_Menu_Walker extends Walker_Nav_Menu {
    
    // Ícones para cada item do menu
    private $menu_icons = array(
        'inicio' => 'fas fa-home',
        'home' => 'fas fa-home',
        'cursos' => 'fas fa-graduation-cap',
        'equipe' => 'fas fa-users',
        'sobre' => 'fas fa-info-circle',
        'contato' => 'fas fa-envelope',
        'contact' => 'fas fa-envelope',
        'about' => 'fas fa-info-circle',
        'team' => 'fas fa-users',
        'courses' => 'fas fa-graduation-cap'
    );
    
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        
        $attributes = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        
        // Obter ícone baseado no título ou slug
        $icon = $this->get_menu_icon( $item );
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes .'>';
        $item_output .= '<i class="' . $icon . '"></i>';
        $item_output .= '<span>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>';
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
    
    private function get_menu_icon( $item ) {
        $title = strtolower( $item->title );
        $slug = strtolower( $item->post_name );
        
        // Verificar por título
        foreach ( $this->menu_icons as $key => $icon ) {
            if ( strpos( $title, $key ) !== false || strpos( $slug, $key ) !== false ) {
                return $icon;
            }
        }
        
        // Ícone padrão
        return 'fas fa-circle';
    }
}

/**
 * Adiciona meta tags específicas do header
 */
function cetesi_header_meta_tags() {
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
}

/**
 * Remove elementos desnecessários do head (otimização)
 */
function cetesi_header_cleanup() {
    // Remove versão do WordPress do head
    remove_action( 'wp_head', 'wp_generator' );
    
    // Remove links desnecessários do head
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}
add_action( 'init', 'cetesi_header_cleanup' );

/**
 * Adiciona suporte a SVG no header
 */
function cetesi_header_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cetesi_header_mime_types' );

/**
 * Configurações padrão do header na ativação do tema
 */
function cetesi_header_theme_activation() {
    // Define opções padrão do header
    set_theme_mod( 'cetesi_header_textcolor', '2c3e50' );
    set_theme_mod( 'cetesi_background_color', 'ffffff' );
}
add_action( 'after_switch_theme', 'cetesi_header_theme_activation' );
