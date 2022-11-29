<?php 

/**
 * Remove Admin Bar
 */
add_action('wp_head', 'REMOVE__ADMIN__BAR');

function REMOVE__ADMIN__BAR()
{
    show_admin_bar(false);
}

/**
 * Theme Support
 */
add_action('after_setup_theme', 'GET__THEME__SUPPORT');

function GET__THEME__SUPPORT()
{
    add_theme_support('custom-logo');
}

/**
 * Get Custom User CSS/Javascript
 */
add_action('wp_enqueue_scripts', 'GET_CUSTOM_USER_CSS');
add_action('wp_enqueue_scripts', 'GET_CUSTOM_USER_JS');

function GET_CUSTOM_USER_CSS()
{
    // wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('boxicons', "https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css");
    wp_enqueue_style('swiper-css', "https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css");
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/templates/css/bootstrap.css');
    // wp_enqueue_style('style', get_template_directory_uri() . '/templates/css/style.css');
}

function GET_CUSTOM_USER_JS()
{
    // wp_enqueue_script('jquery', "https://code.jquery.com/jquery-3.2.1.min.js", array(), '', true);
    // wp_enqueue_script('swiper-js', "https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js", array(), '', true);
    // wp_enqueue_script('common', get_template_directory_uri() . "/templates/js/common.js", array('jquery'), '1.0', true);
}

/**
 * Menu Bar
 */
add_action('init', 'GET__MENU__BAR');

function GET__MENU__BAR()
{
    $locations = array(
        'primary' => __("Primary Menu")
    );

    register_nav_menus($locations);
}

?>