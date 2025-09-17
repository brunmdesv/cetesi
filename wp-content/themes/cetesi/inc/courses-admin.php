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
    // Processar ações se necessário
    if (isset($_GET['action']) && isset($_GET['course_id'])) {
        cetesi_process_course_action();
    }
    
    // Processar exclusão em lote
    if (isset($_POST['bulk_action']) && $_POST['bulk_action'] === 'delete' && isset($_POST['course_ids'])) {
        cetesi_process_bulk_delete();
    }
    
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
        </div>
        
        <!-- Lista de Cursos -->
        <div class="cetesi-courses-list">
            <?php if (empty($cursos)) : ?>
                <div class="no-courses">
                    <div class="no-courses-icon">
                        <span class="dashicons dashicons-book-alt"></span>
                    </div>
                    <h3>Nenhum curso cadastrado</h3>
                    <p>Comece criando seu primeiro curso!</p>
                    <a href="<?php echo admin_url('admin.php?page=criar-curso-personalizado'); ?>" class="button button-primary">
                        <span class="dashicons dashicons-plus-alt"></span>
                        Criar Primeiro Curso
                    </a>
                </div>
            <?php else : ?>
                <div class="courses-grid">
                    <?php foreach ($cursos as $curso) : ?>
                        <?php
                        $curso_meta = get_post_meta($curso->ID);
                        $curso_categoria = get_the_terms($curso->ID, 'curso_categoria');
                        $curso_categoria_nome = $curso_categoria ? $curso_categoria[0]->name : 'Sem categoria';
                        ?>
                        <div class="course-card-admin">
                            <div class="course-header">
                                <div class="course-status <?php echo $curso->post_status; ?>">
                                    <span class="dashicons dashicons-<?php echo $curso->post_status === 'publish' ? 'yes-alt' : 'edit'; ?>"></span>
                                    <?php echo $curso->post_status === 'publish' ? 'Publicado' : 'Rascunho'; ?>
                                </div>
                                <div class="course-actions">
                                    <a href="<?php echo admin_url('admin.php?page=editar-curso-personalizado&course_id=' . $curso->ID); ?>" class="edit-course" title="Editar">
                                        <span class="dashicons dashicons-edit"></span>
                                    </a>
                                    <a href="<?php echo get_permalink($curso->ID); ?>" class="view-course" title="Ver" target="_blank">
                                        <span class="dashicons dashicons-visibility"></span>
                                    </a>
                                    <a href="<?php echo admin_url('admin.php?page=cetesi-courses-management&action=delete&course_id=' . $curso->ID); ?>" 
                                       class="delete-course" title="Excluir" 
                                       onclick="return confirm('Tem certeza que deseja excluir este curso?');">
                                        <span class="dashicons dashicons-trash"></span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="course-content">
                                <h3 class="course-title"><?php echo esc_html($curso->post_title); ?></h3>
                                <p class="course-category"><?php echo esc_html($curso_categoria_nome); ?></p>
                                <p class="course-excerpt"><?php echo esc_html(wp_trim_words($curso->post_excerpt, 20)); ?></p>
                                
                                <div class="course-meta">
                                    <?php if (isset($curso_meta['curso_duracao'][0])) : ?>
                                        <span class="meta-item">
                                            <span class="dashicons dashicons-calendar-alt"></span>
                                            <?php echo esc_html($curso_meta['curso_duracao'][0]); ?>
                                        </span>
                                    <?php endif; ?>
                                    
                                    <?php if (isset($curso_meta['curso_carga_horaria'][0])) : ?>
                                        <span class="meta-item">
                                            <span class="dashicons dashicons-clock"></span>
                                            <?php echo esc_html($curso_meta['curso_carga_horaria'][0]); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <style>
    .cetesi-courses-management {
        max-width: 1200px;
    }
    
    .cetesi-stats-overview {
        display: flex;
        gap: 20px;
        margin: 20px 0;
        flex-wrap: wrap;
    }
    
    .stat-item {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
        min-width: 200px;
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #fff;
    }
    
    .stat-icon.cursos { background: #0073aa; }
    .stat-icon.publicados { background: #00a32a; }
    .stat-icon.rascunhos { background: #dba617; }
    
    .stat-content h3 {
        margin: 0;
        font-size: 28px;
        font-weight: bold;
        color: #23282d;
    }
    
    .stat-content p {
        margin: 5px 0 0 0;
        color: #666;
        font-size: 14px;
    }
    
    .cetesi-actions-bar {
        display: flex;
        gap: 10px;
        margin: 20px 0;
        flex-wrap: wrap;
    }
    
    .action-header-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: #0073aa;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-weight: 500;
        transition: background 0.3s ease;
    }
    
    .action-header-btn:hover {
        background: #005a87;
        color: #fff;
    }
    
    .action-header-btn.novo-curso {
        background: #00a32a;
    }
    
    .action-header-btn.novo-curso:hover {
        background: #007a1f;
    }
    
    .action-header-btn.tradicional {
        background: #6c757d;
    }
    
    .action-header-btn.tradicional:hover {
        background: #545b62;
    }
    
    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    
    .course-card-admin {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        transition: box-shadow 0.3s ease;
    }
    
    .course-card-admin:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .course-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background: #f8f9fa;
        border-bottom: 1px solid #ddd;
    }
    
    .course-status {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        font-weight: 500;
        padding: 4px 8px;
        border-radius: 4px;
    }
    
    .course-status.publish {
        background: #d4edda;
        color: #155724;
    }
    
    .course-status.draft {
        background: #fff3cd;
        color: #856404;
    }
    
    .course-actions {
        display: flex;
        gap: 5px;
    }
    
    .course-actions a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 4px;
        text-decoration: none;
        transition: background 0.3s ease;
    }
    
    .edit-course {
        background: #0073aa;
        color: #fff;
    }
    
    .edit-course:hover {
        background: #005a87;
        color: #fff;
    }
    
    .view-course {
        background: #00a32a;
        color: #fff;
    }
    
    .view-course:hover {
        background: #007a1f;
        color: #fff;
    }
    
    .delete-course {
        background: #dc3545;
        color: #fff;
    }
    
    .delete-course:hover {
        background: #c82333;
        color: #fff;
    }
    
    .course-content {
        padding: 15px;
    }
    
    .course-title {
        margin: 0 0 10px 0;
        font-size: 18px;
        font-weight: 600;
        color: #23282d;
    }
    
    .course-category {
        margin: 0 0 10px 0;
        font-size: 12px;
        color: #0073aa;
        font-weight: 500;
    }
    
    .course-excerpt {
        margin: 0 0 15px 0;
        color: #666;
        font-size: 14px;
        line-height: 1.4;
    }
    
    .course-meta {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        color: #666;
    }
    
    .no-courses {
        text-align: center;
        padding: 60px 20px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
    }
    
    .no-courses-icon {
        font-size: 48px;
        color: #ddd;
        margin-bottom: 20px;
    }
    
    .no-courses h3 {
        margin: 0 0 10px 0;
        color: #23282d;
    }
    
    .no-courses p {
        margin: 0 0 20px 0;
        color: #666;
    }
    
    @media (max-width: 768px) {
        .cetesi-stats-overview {
            flex-direction: column;
        }
        
        .stat-item {
            min-width: auto;
        }
        
        .courses-grid {
            grid-template-columns: 1fr;
        }
        
        .cetesi-actions-bar {
            flex-direction: column;
        }
        
        .action-header-btn {
            justify-content: center;
        }
    }
    </style>
    <?php
}

/**
 * Processar ações de curso (excluir, etc.)
 */
function cetesi_process_course_action() {
    if (!current_user_can('manage_options')) {
        wp_die('Você não tem permissão para realizar esta ação.');
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
