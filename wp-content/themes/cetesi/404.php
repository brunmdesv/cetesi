<?php
/**
 * Template para página 404 (não encontrada)
 *
 * @package Cetesi
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <div class="row">
            <div class="col content-area">
                
                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title">
                            <?php esc_html_e( 'Oops! Página não encontrada', 'cetesi' ); ?>
                        </h1>
                    </header>

                    <div class="page-content">
                        <div class="error-content">
                            <h2><?php esc_html_e( '404', 'cetesi' ); ?></h2>
                            <p><?php esc_html_e( 'A página que você está procurando não foi encontrada. Pode ter sido movida, deletada ou você digitou o endereço incorretamente.', 'cetesi' ); ?></p>
                        </div>

                        <div class="error-actions">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                                <?php esc_html_e( 'Voltar ao Início', 'cetesi' ); ?>
                            </a>
                            
                            <button onclick="history.back()" class="btn btn-secondary">
                                <?php esc_html_e( 'Voltar à Página Anterior', 'cetesi' ); ?>
                            </button>
                        </div>

                        <div class="search-section">
                            <h3><?php esc_html_e( 'Ou faça uma busca:', 'cetesi' ); ?></h3>
                            <?php get_search_form(); ?>
                        </div>

                        <div class="helpful-links">
                            <h3><?php esc_html_e( 'Links úteis:', 'cetesi' ); ?></h3>
                            <ul>
                                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Página Inicial', 'cetesi' ); ?></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'cetesi' ); ?></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/sobre/' ) ); ?>"><?php esc_html_e( 'Sobre', 'cetesi' ); ?></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/contato/' ) ); ?>"><?php esc_html_e( 'Contato', 'cetesi' ); ?></a></li>
                            </ul>
                        </div>

                        <?php
                        // Posts recentes
                        $recent_posts = wp_get_recent_posts( array(
                            'numberposts' => 5,
                            'post_status' => 'publish'
                        ) );

                        if ( $recent_posts ) :
                            ?>
                            <div class="recent-posts">
                                <h3><?php esc_html_e( 'Posts recentes:', 'cetesi' ); ?></h3>
                                <ul>
                                    <?php foreach ( $recent_posts as $post ) : ?>
                                        <li>
                                            <a href="<?php echo esc_url( get_permalink( $post['ID'] ) ); ?>">
                                                <?php echo esc_html( $post['post_title'] ); ?>
                                            </a>
                                            <span class="post-date">
                                                <?php echo esc_html( get_the_date( '', $post['ID'] ) ); ?>
                                            </span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </section>
                
            </div>
            
            <?php get_sidebar(); ?>
            
        </div>
    </div>
</main>

<?php get_footer(); ?>
