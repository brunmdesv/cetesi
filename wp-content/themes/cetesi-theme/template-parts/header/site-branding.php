<?php
/**
 * Template part para branding do site (logo/título)
 *
 * @package Cetesi-Theme
 * @since 1.0.0
 */
?>

<div class="site-branding">
    <?php if (has_custom_logo()) : ?>
        <div class="site-logo">
            <?php the_custom_logo(); ?>
        </div>
    <?php else : ?>
        <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" rel="home">
                <?php bloginfo('name'); ?>
            </a>
        </h1>
        <?php
        $description = get_bloginfo('description', 'display');
        if ($description || is_customize_preview()) :
        ?>
            <p class="site-description"><?php echo $description; ?></p>
        <?php endif; ?>
    <?php endif; ?>
</div>
