<?php
/**
 * Template part para navegação principal
 *
 * @package Cetesi-Theme
 * @since 1.0.0
 */
?>

<nav class="nav-menu" id="nav-menu">
    <div class="nav-menu-content">
        <!-- Menu de Navegação -->
        <div class="nav-menu-links">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'principal',
                'menu_class'     => 'nav-menu-list',
                'container'      => false,
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                'fallback_cb'    => 'cetesi_fallback_menu',
                'depth'          => 1,
                'walker'         => new Cetesi_Mobile_Menu_Walker()
            ));
            ?>
        </div>
        
        <!-- Botões CTA no Menu Mobile -->
        <div class="nav-menu-buttons">
            <a href="#" class="nav-menu-btn nav-menu-btn-primary">
                <i class="fas fa-graduation-cap"></i>
                Painel Unicollege
            </a>
            
            <a href="#" class="nav-menu-btn nav-menu-btn-secondary">
                <i class="fas fa-user-graduate"></i>
                Painel do Aluno
            </a>
            
            <a href="tel:(61) 3351-4511" class="nav-menu-btn nav-menu-btn-accent">
                <i class="fas fa-phone"></i>
                Ligar agora
            </a>
        </div>
    </div>
</nav>
