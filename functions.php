<?php
/**
 * Theme setup and support declarations.
 *
 * @package seolizards
 */

function seolizards_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('custom-logo', [
        'height' => 80,
        'width' => 260,
        'flex-height' => true,
        'flex-width' => true,
    ]);
    add_theme_support('custom-header', [
        'width' => 1920,
        'height' => 600,
        'flex-width' => true,
        'flex-height' => true,
    ]);

    register_nav_menus([
        'primary' => __('Primary Menu', 'seolizards'),
    ]);
}
add_action('after_setup_theme', 'seolizards_theme_setup');

function seolizards_enqueue_assets(): void
{
    wp_enqueue_style('seolizards-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'seolizards_enqueue_assets');

function seolizards_register_sidebars(): void
{
    register_sidebar([
        'name' => __('Sidebar', 'seolizards'),
        'id' => 'sidebar-1',
        'description' => __('Main blog sidebar.', 'seolizards'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
}
add_action('widgets_init', 'seolizards_register_sidebars');
