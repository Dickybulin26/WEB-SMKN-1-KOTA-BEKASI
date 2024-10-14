<?php
// Registering menu
function smkn1kotabekasi()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'navigation-widgets'));
    add_theme_support('appearance-tools');
    register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'smkn1kotabekasi')));
}

add_action('after_setup_theme', 'smkn1kotabekasi');