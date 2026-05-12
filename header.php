<?php
/**
 * The header for the theme.
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
<div class="slz-topbar">
    <div class="slz-container slz-topbar-inner">
        <div class="slz-topbar-left">
            <a href="mailto:sales@seolizards.in"><?php esc_html_e('✉ sales@seolizards.in', 'seolizards'); ?></a>
            <a href="tel:+919711864014"><?php esc_html_e('☎ +91 9711864014', 'seolizards'); ?></a>
        </div>
        <div class="slz-topbar-right" role="presentation">
            <span aria-hidden="true">f</span>
            <span aria-hidden="true">t</span>
            <span aria-hidden="true">in</span>
            <span aria-hidden="true">◉</span>
        </div>
    </div>
</div>
<header class="slz-header">
    <div class="slz-container slz-nav">
        <div class="slz-brand">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                printf(
                    '<a href="%1$s">%2$s</a>',
                    esc_url(home_url('/')),
                    wp_kses_post(__('SEO <span>LIZARDS</span>', 'seolizards'))
                );
            }
            ?>
        </div>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'slz-main-menu',
                'fallback_cb'    => 'wp_page_menu',
            )
        );
        ?>
        <a class="slz-cta" href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Free SEO Audit', 'seolizards'); ?></a>
    </div>
</header>
