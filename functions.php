<?php
/**
 * SEO Lizards Theme functions.
 *
 * @package seolizards
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! function_exists('slz_theme_setup')) {
    function slz_theme_setup() {
        load_theme_textdomain('seolizards', get_template_directory() . '/languages');

        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
        add_theme_support('custom-logo', array('height' => 48, 'width' => 220, 'flex-height' => true, 'flex-width' => true));
        add_theme_support('align-wide');

        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'seolizards'),
                'footer-services' => __('Footer Services Menu', 'seolizards'),
                'footer-links' => __('Footer Quick Links Menu', 'seolizards'),
            )
        );
    }
}
add_action('after_setup_theme', 'slz_theme_setup');

function slz_enqueue_assets() {
    wp_enqueue_style('seolizards-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'slz_enqueue_assets');

function slz_register_sidebars() {
    register_sidebar(
        array(
            'name'          => __('Footer Contact', 'seolizards'),
            'id'            => 'footer-contact',
            'description'   => __('Add footer contact widgets.', 'seolizards'),
            'before_widget' => '<div class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
}
add_action('widgets_init', 'slz_register_sidebars');

function slz_estimated_read_time($post_id = 0) {
    $post_id = $post_id ?: get_the_ID();

    if (! $post_id) {
        return 1;
    }

    $word_count = str_word_count(wp_strip_all_tags(get_post_field('post_content', $post_id)));

    return max(1, (int) ceil($word_count / 200));
}
