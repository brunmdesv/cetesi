<?php
/**
 * Template para página inicial
 *
 * @package Cetesi
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    
    <!-- Seção Hero -->
    <?php get_template_part( 'template-parts/home/hero' ); ?>
    
    <!-- Seção Cursos em Destaque -->
    <?php get_template_part( 'template-parts/home/cursos-destaque' ); ?>
    
    <!-- Seção Sobre a Escola -->
    <?php get_template_part( 'template-parts/home/sobre-escola' ); ?>
    
    <!-- Seção Professores -->
    <?php get_template_part( 'template-parts/home/professores' ); ?>
    
    <!-- Seção Depoimentos -->
    <?php get_template_part( 'template-parts/home/depoimentos' ); ?>
    
    <!-- Seção Estatísticas -->
    <?php get_template_part( 'template-parts/home/estatisticas' ); ?>
    
    <!-- Seção Contato -->
    <?php get_template_part( 'template-parts/home/contato' ); ?>

</main><!-- #main -->

<?php get_footer(); ?>
