<?php
/**
 * Sistema de Administração de Cursos - CETESI TEMA
 *
 * @package CETESI
 * @version 1.0.0
 */

// Evitar acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Processar ações de curso no hook admin_init
 */
add_action('admin_init', 'cetesi_handle_course_actions');
function cetesi_handle_course_actions() {
    // Processar ações GET
    if (isset($_GET['action']) && isset($_GET['course_id'])) {
        cetesi_process_course_action();
    }
    
    // Processar exclusão em lote
    if (isset($_POST['bulk_action']) && $_POST['bulk_action'] === 'delete' && isset($_POST['course_ids'])) {
        cetesi_process_bulk_delete();
    }
    
    // Processar exclusão em massa via JavaScript
    if (isset($_POST['bulk_delete_action']) && $_POST['bulk_delete_action'] === 'delete' && isset($_POST['bulk_delete_courses'])) {
        cetesi_process_bulk_delete_javascript();
    }
}

/**
 * Registrar Custom Post Type para Cursos
 */
function cetesi_register_courses_post_type() {
    register_post_type('curso', array(
        'labels' => array(
            'name'               => __('Cursos', 'cetesi'),
            'singular_name'      => __('Curso', 'cetesi'),
            'add_new'            => __('Adicionar Novo', 'cetesi'),
            'add_new_item'       => __('Adicionar Novo Curso', 'cetesi'),
            'edit_item'          => __('Editar Curso', 'cetesi'),
            'new_item'           => __('Novo Curso', 'cetesi'),
            'view_item'          => __('Ver Curso', 'cetesi'),
            'search_items'       => __('Buscar Cursos', 'cetesi'),
            'not_found'          => __('Nenhum curso encontrado', 'cetesi'),
            'not_found_in_trash' => __('Nenhum curso encontrado na lixeira', 'cetesi'),
            'menu_name'          => __('Cursos', 'cetesi'),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => false, // Será controlado pelo nosso menu customizado
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'curso'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'         => array('curso_categoria'),
    ));
}
add_action('init', 'cetesi_register_courses_post_type');

// Debug: Verificar se o CPT foi registrado
add_action('wp_loaded', 'cetesi_debug_cpt_registration');
function cetesi_debug_cpt_registration() {
    if (current_user_can('manage_options') && isset($_GET['debug_cpt'])) {
        $post_types = get_post_types(array('public' => true), 'objects');
        echo '<pre>';
        foreach ($post_types as $post_type) {
            if ($post_type->name === 'curso') {
                echo "CPT 'curso' encontrado:\n";
                echo "Slug: " . $post_type->rewrite['slug'] . "\n";
                echo "Public: " . ($post_type->public ? 'Sim' : 'Não') . "\n";
                echo "Publicly Queryable: " . ($post_type->publicly_queryable ? 'Sim' : 'Não') . "\n";
                break;
            }
        }
        echo '</pre>';
        exit;
    }
}

/**
 * Registrar Taxonomia para Categorias de Cursos
 */
function cetesi_register_course_taxonomy() {
    register_taxonomy('curso_categoria', 'curso', array(
        'labels' => array(
            'name'              => __('Categorias de Cursos', 'cetesi'),
            'singular_name'     => __('Categoria de Curso', 'cetesi'),
            'search_items'      => __('Buscar Categorias', 'cetesi'),
            'all_items'         => __('Todas as Categorias', 'cetesi'),
            'parent_item'       => __('Categoria Pai', 'cetesi'),
            'parent_item_colon' => __('Categoria Pai:', 'cetesi'),
            'edit_item'         => __('Editar Categoria', 'cetesi'),
            'update_item'       => __('Atualizar Categoria', 'cetesi'),
            'add_new_item'      => __('Adicionar Nova Categoria', 'cetesi'),
            'new_item_name'     => __('Nome da Nova Categoria', 'cetesi'),
            'menu_name'         => __('Categorias', 'cetesi'),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
        'rewrite'           => array('slug' => 'categoria-curso'),
    ));
}
add_action('init', 'cetesi_register_course_taxonomy');

/**
 * Criar Menu de Administração para Cursos
 */
function cetesi_add_courses_admin_menu() {
    // Menu Principal - Cursos
    add_menu_page(
        'Gerenciar Cursos',
        'Cursos',
        'manage_options',
        'cetesi-courses-management',
        'cetesi_courses_management_page',
        'dashicons-welcome-learn-more',
        4
    );

    // Submenu - Ver Cursos
    add_submenu_page(
        'cetesi-courses-management',
        'Gerenciar Cursos',
        'Ver cursos',
        'manage_options',
        'cetesi-courses-management',
        'cetesi_courses_management_page'
    );

    // Submenu - Novo Curso
    add_submenu_page(
        'cetesi-courses-management',
        'Criar Novo Curso',
        'Novo curso',
        'manage_options',
        'criar-curso-personalizado',
        'cetesi_custom_course_page_callback'
    );
}
add_action('admin_menu', 'cetesi_add_courses_admin_menu');

/**
 * Página de Gerenciamento de Cursos
 */
function cetesi_courses_management_page() {
    // Mostrar mensagem de sucesso se houver exclusão em lote
    $bulk_deleted = isset($_GET['bulk_deleted']) ? intval($_GET['bulk_deleted']) : 0;
    $course_updated = isset($_GET['course_updated']) ? intval($_GET['course_updated']) : 0;
    $course_name = isset($_GET['course_name']) ? urldecode($_GET['course_name']) : '';

    // Buscar cursos ordenados alfabeticamente
    $cursos = get_posts(array(
        'post_type' => 'curso',
        'posts_per_page' => -1,
        'post_status' => array('publish', 'draft'),
        'orderby' => 'title',
        'order' => 'ASC'
    ));

    // Estatísticas
    $total_cursos = count($cursos);
    $cursos_publicados = 0;
    $cursos_rascunho = 0;

    foreach ($cursos as $curso) {
        if ($curso->post_status === 'publish') {
            $cursos_publicados++;
        } else {
            $cursos_rascunho++;
        }
    }

    ?>
    <link rel="stylesheet" href="<?php echo CETESI_THEME_URL; ?>/assets/css/admin-courses.css">

    <script>
    // Variáveis JavaScript para funcionalidades
    var cetesiAdmin = {
        bulkDeleteNonce: '<?php echo wp_create_nonce('bulk_delete_courses'); ?>',
        ajaxUrl: '<?php echo admin_url('admin-ajax.php'); ?>'
    };
    </script>
    <script src="<?php echo CETESI_THEME_URL; ?>/assets/js/admin-courses.js"></script>

    <div class="wrap cetesi-courses-management">
        <?php if ($bulk_deleted > 0) : ?>
        <div class="notice notice-success is-dismissible">
            <p><strong>Sucesso!</strong> <?php echo $bulk_deleted; ?> curso(s) foram excluído(s) com sucesso.</p>
        </div>
        <?php endif; ?>

        <?php if ($course_updated > 0 && $course_name) : ?>
        <div class="notice notice-success is-dismissible">
            <p><strong>Sucesso!</strong> O curso "<?php echo esc_html($course_name); ?>" foi atualizado com sucesso!</p>
        </div>
        <?php endif; ?>

        <!-- Estatísticas -->
        <div class="cetesi-stats-overview">
            <div class="stat-item">
                <div class="stat-icon cursos">
                    <span class="dashicons dashicons-book-alt"></span>
                </div>
                <div class="stat-content">
                    <h3><?php echo $total_cursos; ?></h3>
                    <p>Total de Cursos</p>
                </div>
            </div>

            <div class="stat-item">
                <div class="stat-icon publicados">
                    <span class="dashicons dashicons-yes-alt"></span>
                </div>
                <div class="stat-content">
                    <h3><?php echo $cursos_publicados; ?></h3>
                    <p>Publicados</p>
                </div>
            </div>

            <div class="stat-item">
                <div class="stat-icon rascunhos">
                    <span class="dashicons dashicons-edit"></span>
                </div>
                <div class="stat-content">
                    <h3><?php echo $cursos_rascunho; ?></h3>
                    <p>Rascunhos</p>
                </div>
            </div>
        </div>

        <!-- Barra de Ações -->
        <div class="cetesi-actions-bar">
            <a href="<?php echo admin_url('admin.php?page=criar-curso-personalizado'); ?>" class="action-header-btn novo-curso">
                <span class="dashicons dashicons-plus-alt"></span>
                <span class="btn-label">Novo Curso</span>
            </a>
            <a href="<?php echo admin_url('edit.php?post_type=curso'); ?>" class="action-header-btn tradicional">
                <span class="dashicons dashicons-list-view"></span>
                <span class="btn-label">Tradicional</span>
            </a>
            <div class="bulk-actions">
                <button type="button" id="select-all-courses" class="action-header-btn select-all">
                    <span class="dashicons dashicons-yes-alt"></span>
                    <span class="btn-label">Marcar Todos</span>
                </button>
                <button type="button" id="bulk-delete" class="action-header-btn bulk-delete" disabled>
                    <span class="dashicons dashicons-trash"></span>
                    <span class="btn-label">Excluir Selecionados</span>
                </button>
            </div>
            <div class="search-box">
                <input type="text" id="course-search" placeholder="Buscar cursos..." />
                <span class="dashicons dashicons-search"></span>
            </div>
        </div>

        <!-- Lista de Cursos -->
        <div class="cetesi-courses-list">
            <?php if ($cursos) : ?>
                <?php foreach ($cursos as $curso) :
                    $curso_id = $curso->ID;
                    $modalidade = get_post_meta($curso_id, 'curso_modalidade', true);
                    $categoria = get_post_meta($curso_id, 'curso_categoria', true);
                    $status = $curso->post_status;

                    // Determinar categoria baseada no tipo
                    $categoria_nome = '';
                    switch ($categoria) {
                        case 'tecnicos':
                            $categoria_nome = 'Técnico';
                            break;
                        case 'livres':
                            $categoria_nome = 'Curso Livre';
                            break;
                        case 'qualificacao':
                            $categoria_nome = 'Qualificação';
                            break;
                        case 'online':
                            $categoria_nome = 'Online';
                            break;
                        case 'educacao-basica':
                            $categoria_nome = 'Educação Básica';
                            break;
                        default:
                            $categoria_nome = ucfirst($categoria);
                            break;
                    }

                    $edit_link = admin_url('admin.php?page=editar-curso-personalizado&course_id=' . $curso_id);
                    $view_link = get_permalink($curso_id);
                    $delete_link = wp_nonce_url(admin_url('admin.php?page=cetesi-courses-management&action=delete&course_id=' . $curso_id), 'delete_course_' . $curso_id);
                ?>
                <div class="course-list-item" data-course-id="<?php echo $curso_id; ?>">
                    <div class="course-checkbox">
                        <input type="checkbox" class="course-select" value="<?php echo $curso_id; ?>">
                    </div>
                    <div class="course-status-indicator <?php echo $status; ?>"></div>
                    <div class="course-info">
                        <h3 class="course-title"><?php echo get_the_title($curso_id); ?></h3>
                    </div>
                    <div class="course-actions">
                        <a href="<?php echo $edit_link; ?>" class="action-btn edit" title="Editar Curso">
                            <span class="dashicons dashicons-edit"></span>
                        </a>
                        <a href="<?php echo $view_link; ?>" class="action-btn view" target="_blank" title="Ver no Site">
                            <span class="dashicons dashicons-external"></span>
                        </a>
                        <a href="<?php echo $delete_link; ?>" class="action-btn delete" onclick="return confirm('Tem certeza que deseja excluir este curso?')" title="Excluir Curso">
                            <span class="dashicons dashicons-trash"></span>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="no-courses">
                    <div class="no-courses-icon">
                        <span class="dashicons dashicons-book-alt"></span>
                    </div>
                    <h3>Nenhum curso encontrado</h3>
                    <p>Você ainda não criou nenhum curso. Comece criando seu primeiro curso!</p>
                    <a href="<?php echo admin_url('admin.php?page=criar-curso-personalizado'); ?>" class="button button-primary button-large">
                        <span class="dashicons dashicons-plus-alt"></span>
                        Criar Primeiro Curso
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

/**
 * Processar ações de curso (excluir, etc.)
 */
function cetesi_process_course_action() {
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
    }
    
    // Limpar qualquer saída anterior
    if (ob_get_level()) {
        ob_end_clean();
    }

    $action = sanitize_text_field($_GET['action']);
    $course_id = intval($_GET['course_id']);

    if ($action === 'delete') {
        $course = get_post($course_id);
        if ($course && $course->post_type === 'curso') {
            wp_delete_post($course_id, true);
            wp_redirect(admin_url('admin.php?page=cetesi-courses-management&course_deleted=1'));
            exit;
        }
    }
}

/**
 * Processar exclusão em lote
 */
function cetesi_process_bulk_delete() {
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
    }
    
    // Limpar qualquer saída anterior
    if (ob_get_level()) {
        ob_end_clean();
    }

    $course_ids = array_map('intval', $_POST['course_ids']);
    $deleted_count = 0;

    foreach ($course_ids as $course_id) {
        $course = get_post($course_id);
        if ($course && $course->post_type === 'curso') {
            wp_delete_post($course_id, true);
            $deleted_count++;
        }
    }

    wp_redirect(admin_url('admin.php?page=cetesi-courses-management&bulk_deleted=' . $deleted_count));
    exit;
}

/**
 * Processar exclusão em massa via JavaScript
 */
function cetesi_process_bulk_delete_javascript() {
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
    }
    
    // Limpar qualquer saída anterior
    if (ob_get_level()) {
        ob_end_clean();
    }

    if (!wp_verify_nonce($_POST['bulk_delete_nonce'], 'bulk_delete_courses')) {
        wp_die('Ação não autorizada.');
    }

    $course_ids = array_map('intval', $_POST['bulk_delete_courses']);
    $deleted_count = 0;

    foreach ($course_ids as $course_id) {
        $course = get_post($course_id);
        if ($course && $course->post_type === 'curso') {
            wp_delete_post($course_id, true);
            $deleted_count++;
        }
    }

    wp_redirect(admin_url('admin.php?page=cetesi-courses-management&bulk_deleted=' . $deleted_count));
    exit;
}
