<?php
/**
 * Site header.
 *
 * @package seolizards
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php $header_image = get_header_image(); ?>
<header class="site-header"<?php echo $header_image ? ' style="background-image: linear-gradient(rgba(15,23,42,0.62), rgba(19,78,74,0.62)), url(' . esc_url($header_image) . '); background-size: cover; background-position: center;"' : ''; ?>>
    <div class="site-header__inner">
        <?php if (has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
        <?php endif; ?>

        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
        <p class="site-description"><?php bloginfo('description'); ?></p>

        <nav class="main-nav" aria-label="<?php esc_attr_e('Main Menu', 'seolizards'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => 'wp_page_menu',
            ]);
            ?>
        </nav>
    </div>
</header>
