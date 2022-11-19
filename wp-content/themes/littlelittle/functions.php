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
    wp_enqueue_style('style', get_stylesheet_uri());
    // wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
    // wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap4.css');
}

function GET_CUSTOM_USER_JS()
{
    // wp_enqueue_script('common', get_template_directory_uri() . "/assets/js/common.js", array(), '', true);
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