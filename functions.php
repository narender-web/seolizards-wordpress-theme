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
    static $read_time_cache = array();

    $post_id = $post_id ?: get_the_ID();

    if (! $post_id) {
        return 1;
    }

    if (isset($read_time_cache[$post_id])) {
        return $read_time_cache[$post_id];
    }

    $stored_read_time = (int) get_post_meta($post_id, '_slz_read_time', true);
    if ($stored_read_time > 0) {
        $read_time_cache[$post_id] = $stored_read_time;

        return $stored_read_time;
    }

    $word_count = str_word_count(wp_strip_all_tags(get_post_field('post_content', $post_id)));
    $read_time  = max(1, (int) ceil($word_count / 200));

    update_post_meta($post_id, '_slz_read_time', $read_time);
    $read_time_cache[$post_id] = $read_time;

    return $read_time;
}

function slz_refresh_read_time_meta($post_id, $post) {
    if (wp_is_post_revision($post_id) || 'post' !== get_post_type($post) || 'auto-draft' === get_post_status($post)) {
        return;
    }

    $word_count = str_word_count(wp_strip_all_tags($post->post_content));
    $read_time  = max(1, (int) ceil($word_count / 200));
    update_post_meta($post_id, '_slz_read_time', $read_time);
}
add_action('save_post', 'slz_refresh_read_time_meta', 10, 2);

function slz_get_posts_page_url() {
    $posts_page_id  = (int) get_option('page_for_posts');
    $posts_page_url = $posts_page_id ? get_permalink($posts_page_id) : '';

    if (! $posts_page_url) {
        $posts_page_url = get_post_type_archive_link('post');
    }

    if (! $posts_page_url) {
        $posts_page_url = home_url('/');
    }

    return $posts_page_url;
}
