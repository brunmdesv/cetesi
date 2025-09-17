<?php
/**
 * Funções auxiliares para cursos
 *
 * @package CETESI
 * @version 1.0.0
 */

// Evitar acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Buscar cursos dinâmicos por tipo
 */
function cetesi_get_dynamic_courses($tipo = 'todos', $limit = 20) {
    $args = array(
        'post_type' => 'curso',
        'post_status' => 'publish',
        'posts_per_page' => $limit,
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array()
    );
    
    // Filtrar por tipo se especificado
    if ($tipo !== 'todos') {
        $args['meta_query'][] = array(
            'key' => 'curso_nivel',
            'value' => $tipo,
            'compare' => '='
        );
    }
    
    $cursos = get_posts($args);
    
    return $cursos;
}

/**
 * Renderizar curso dinâmico
 */
function cetesi_render_dynamic_course($curso, $tipo = '') {
    $curso_id = $curso->ID;
    $curso_titulo = $curso->post_title;
    $curso_descricao = wp_trim_words($curso->post_content, 20, '...');
    
    // Meta fields
    $curso_nivel = get_post_meta($curso_id, 'curso_nivel', true);
    $curso_categoria = get_post_meta($curso_id, 'curso_categoria', true);
    $curso_duracao = get_post_meta($curso_id, 'curso_duracao', true);
    $curso_carga_horaria = get_post_meta($curso_id, 'curso_carga_horaria', true);
    $curso_preco = get_post_meta($curso_id, 'curso_preco', true);
    $curso_preco_promocional = get_post_meta($curso_id, 'curso_preco_promocional', true);
    $curso_link_inscricao = get_post_meta($curso_id, 'curso_link_inscricao', true);
    $curso_modalidade = get_post_meta($curso_id, 'curso_modalidade', true);
    
    // Determinar ícone baseado no tipo
    $icon_map = array(
        'tecnico' => 'fas fa-graduation-cap',
        'qualificacao' => 'fas fa-award',
        'livre' => 'fas fa-certificate',
        'online' => 'fas fa-laptop',
        'educacao-basica' => 'fas fa-book-open'
    );
    
    $curso_icon = isset($icon_map[$tipo]) ? $icon_map[$tipo] : 'fas fa-graduation-cap';
    
    // Determinar cor baseada no tipo
    $color_map = array(
        'tecnico' => 'var(--primary-color)',
        'qualificacao' => 'var(--secondary-color)',
        'livre' => 'var(--accent-color)',
        'online' => 'var(--accent-pink)',
        'educacao-basica' => 'var(--success-color)'
    );
    
    $curso_color = isset($color_map[$tipo]) ? $color_map[$tipo] : 'var(--primary-color)';
    
    ob_start();
    ?>
    <div class="curso-card" data-tipo="<?php echo esc_attr($tipo); ?>">
        <div class="curso-image" style="background: linear-gradient(135deg, <?php echo esc_attr($curso_color); ?> 0%, <?php echo esc_attr($curso_color); ?>dd 100%);">
            <i class="<?php echo esc_attr($curso_icon); ?>"></i>
        </div>
        
        <div class="curso-content">
            <div class="course-header">
                <h3><?php echo esc_html($curso_titulo); ?></h3>
            </div>
            
            <div class="course-description">
                <p><?php echo esc_html($curso_descricao); ?></p>
            </div>
            
            <div class="course-details">
                <?php if ($curso_duracao) : ?>
                <div class="detail-item">
                    <i class="fas fa-clock"></i>
                    <span><?php echo esc_html($curso_duracao); ?></span>
                </div>
                <?php endif; ?>
                
                <?php if ($curso_carga_horaria) : ?>
                <div class="detail-item">
                    <i class="fas fa-book"></i>
                    <span><?php echo esc_html($curso_carga_horaria); ?></span>
                </div>
                <?php endif; ?>
                
                <?php if ($curso_modalidade) : ?>
                <div class="detail-item">
                    <i class="fas fa-<?php echo $curso_modalidade === 'online' ? 'laptop' : 'building'; ?>"></i>
                    <span><?php echo ucfirst($curso_modalidade); ?></span>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="course-info-badges">
                <?php if ($curso_nivel) : ?>
                <div class="info-badge badge-nivel">
                    <?php 
                    $nivel_labels = array(
                        'tecnico' => 'Técnico',
                        'livre' => 'Livre',
                        'qualificacao' => 'Qualificação',
                        'especializacao' => 'Especialização'
                    );
                    echo isset($nivel_labels[$curso_nivel]) ? $nivel_labels[$curso_nivel] : ucfirst($curso_nivel);
                    ?>
                </div>
                <?php endif; ?>
                
                <?php if ($curso_categoria) : ?>
                <div class="info-badge badge-categoria">
                    <?php echo esc_html($curso_categoria); ?>
                </div>
                <?php endif; ?>
                
                <?php if ($curso_preco) : ?>
                <div class="info-badge badge-preco">
                    <?php echo esc_html($curso_preco); ?>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="course-actions">
                <a href="<?php echo get_permalink($curso_id); ?>" class="course-btn">
                    <i class="fas fa-info-circle"></i>
                    Saiba Mais
                </a>
                
                <?php if ($curso_link_inscricao) : ?>
                <a href="<?php echo esc_url($curso_link_inscricao); ?>" class="course-btn btn-inscricao" target="_blank">
                    <i class="fas fa-rocket"></i>
                    Inscrever-se
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Adicionar suporte a cursos no tema
 */
add_action('after_setup_theme', 'cetesi_courses_support');
function cetesi_courses_support() {
    // Adicionar suporte a thumbnails para cursos
    add_post_type_support('curso', 'thumbnail');
    
    // Adicionar suporte a excerpt para cursos
    add_post_type_support('curso', 'excerpt');
}
