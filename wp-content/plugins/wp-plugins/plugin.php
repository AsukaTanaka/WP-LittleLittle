<?php 
/**
 * Plugin Name: WP Plugin Application
 * Plugin URI: https://github.com/AsukaTanaka/little-little
 * Description: A Plugin For WordPress CRUD ( Create, Read, Update & Delete ) Application Using Ajax & WP List Table
 * Author: Asuka Tanaka
 * Author URI: https://github.com/AsukaTanaka
 * Version: 1.0.0
 */

if(!defined('ABSPATH')) exit;

/**
 * Define URI and PATH
 */

define('ROOT__PLUGIN__URI', plugin_dir_url(__FILE__));
define('ROOT__PLUGIN__PATH', plugin_dir_path(__FILE__));
define('ROOT__PLUGIN__FILE', __FILE__);
define('ROOT__PLUGIN__VERSION', '1.0.0');
define('ROOT__PLUGIN__CLASS', 'GET__PLUGIN__FUNCTION');

class GET__PLUGIN__FUNCTION {
    /**
     * Ticket Table
     */

    public static function ADD__TICKET()
    {
        global $wpdb;
        $charset__collate = $wpdb->get_charset_collate();
        $table__name = $wpdb->prefix . 'ticket';
        $sql = "CREATE TABLE $table__name (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `fullname` varchar(255) CHARACTER SET utf8mb4,
            `phone` varchar(10),
            `email` varchar(255),
            `amount` int,
            `start_use` varchar(255),
            `create_at` varchar(255),
            `status` boolean,
            `package_id` int(11) NOT NULL,
            FOREIGN KEY (package_id) REFERENCES $table__name(id),
            PRIMARY KEY (id)
        )$charset__collate;";
        require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    public static function REMOVE__TICKET()
    {
        global $wpdb;
        $table__name = $wpdb->prefix . 'ticket';
        $sql = "DROP TABLE IF EXISTS $table__name";
        $wpdb->query($sql);
    }

    /**
     * Payment Table
     */

    public static function ADD__PAYMENT()
    {
        global $wpdb;
        $charset__collate = $wpdb->get_charset_collate();
        $table__name = $wpdb->prefix . 'payment';
        $sql = "CREATE TABLE $table__name (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `card_number` varchar(255),
            `cardholder_name` varchar(255),
            `expiry_date` varchar(10),
            `ccv_cvc` varchar(3),
            `ticket_id` int(11) NOT NULL,
            FOREIGN KEY (ticket_id) REFERENCES $table__name(id),
            PRIMARY KEY (id)
        )$charset__collate;";
        require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    public static function REMOVE__PAYMENT()
    {
        global $wpdb;
        $table__name = $wpdb->prefix . 'payment';
        $sql = "DROP TABLE IF EXISTS $table__name";
        $wpdb->query($sql);
    }

    /**
     * Bill Table
     */

    public static function ADD__BILL()
    {
        global $wpdb;
        $charset__collate = $wpdb->get_charset_collate();
        $table__name = $wpdb->prefix . 'bill';
        $sql = "CREATE TABLE $table__name (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `qrcode` text,
            `start_date` varchar(255),
            `payment_id` int(11) NOT NULL,
            `ticket_id` int(11) NOT NULL,
            FOREIGN KEY (payment_id) REFERENCES $table__name(id),
            FOREIGN KEY (ticket_id) REFERENCES $table__name(id),
            PRIMARY KEY (id)
        )$charset__collate;";
        require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    public static function REMOVE__BILL()
    {
        global $wpdb;
        $table__name = $wpdb->prefix . 'bill';
        $sql = "DROP TABLE IF EXISTS $table__name";
        $wpdb->query($sql);
    }

    /**
     * Event Table
     */

    public static function ADD__EVENT()
    {
        global $wpdb;
        $charset__collate = $wpdb->get_charset_collate();
        $table__name = $wpdb->prefix . 'event';
        $sql = "CREATE TABLE $table__name (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) CHARACTER SET utf8mb4,
            `address` varchar(255) CHARACTER SET utf8mb4,
            `start_date` varchar(255),
            `end_date` varchar(255),
            `balance` float,
            `thumbnail` text,
            `content` text,
            `create_at` varchar(255),
            PRIMARY KEY (id)
        )$charset__collate;";
        require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    public static function REMOVE__EVENT()
    {
        global $wpdb;
        $table__name = $wpdb->prefix . 'event';
        $sql = "DROP TABLE IF EXISTS $table__name";
        $wpdb->query($sql);
    }

    /**
     * Contact Table
     */

    public static function ADD__CONTACT()
    {
        global $wpdb;
        $charset__collate = $wpdb->get_charset_collate();
        $table__name = $wpdb->prefix . 'contact';
        $sql = "CREATE TABLE $table__name (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) CHARACTER SET utf8mb4,
            `email` varchar(255),
            `phone` varchar(10),
            `address` varchar(255) CHARACTER SET utf8mb4,
            `comment` text,
            `status` boolean,
            `create_at` varchar(255),
            PRIMARY KEY (id)
        )$charset__collate;";
        require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    public static function REMOVE__CONTACT()
    {
        global $wpdb;
        $table__name = $wpdb->prefix . 'contact';
        $sql = "DROP TABLE IF EXISTS $table__name";
        $wpdb->query($sql);
    }

    /**
     * Package Table
     */

    public static function ADD__PACKAGE()
    {
        global $wpdb;
        $charset__collate = $wpdb->get_charset_collate();
        $table__name = $wpdb->prefix . 'package';
        $sql = "CREATE TABLE $table__name (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `package` varchar(255) CHARACTER SET utf8mb4,
            `price` int,
            `create_at` varchar(255), 
            PRIMARY KEY (id)
        )$charset__collate;";
        require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    public static function REMOVE__PACKAGE()
    {
        global $wpdb;
        $table__name = $wpdb->prefix . 'package';
        $sql = "DROP TABLE IF EXISTS $table__name";
        $wpdb->query($sql);
    }
    
}

/**
 * Get Activation
 */
// register_activation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'ADD__TICKET'));
// register_activation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'ADD__PAYMENT'));
// register_activation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'ADD__BILL'));
register_activation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'ADD__EVENT'));
register_activation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'ADD__CONTACT'));
register_activation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'ADD__PACKAGE'));


/**
 * Get Deactivation
 */

// register_deactivation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'REMOVE__TICKET'));
// register_deactivation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'REMOVE__PAYMENT'));
// register_deactivation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'REMOVE__BILL'));
register_deactivation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'REMOVE__EVENT'));
register_deactivation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'REMOVE__CONTACT'));
register_deactivation_hook(ROOT__PLUGIN__FILE, array(ROOT__PLUGIN__CLASS, 'REMOVE__PACKAGE'));

/**
 * Get Menu Options
 */

/* Admin Menu */
add_action('admin_menu', 'ADD__BILL__MENU');
add_action('admin_menu', 'ADD__EVENT__MENU');
add_action('admin_menu', 'ADD__CONTACT__MENU');


/* Get Function For Admin Menu */

function ADD__EVENT__MENU()
{
    add_menu_page(__('Event', 'Event'), 'Sự Kiện', 'manage_options', 'event', 'OUTPUT__EVENT__VIEW');
    add_submenu_page(null, __('Event', 'Event'), 'Tạo', 'manage_options', 'event_create', 'OUTPUT__EVENT__CREATE');
    add_submenu_page(null, __('Event', 'Event'), 'Cập Nhật', 'manage_options', 'event_update', 'OUTPUT__EVENT__UPDATE');
    add_submenu_page(null, __('Event', 'Event'), 'Xem Chi Tiết', 'manage_options', 'event_details', 'OUTPUT__EVENT__DETAILS');
}

function ADD__CONTACT__MENU()
{
    add_menu_page(__('Contact', 'Contact'), 'Liên Hệ', 'manage_options', 'contact', 'OUTPUT__CONTACT__VIEW');
    add_submenu_page(null, __('Contact', 'Contact'), 'Xem Chi Tiết', 'manage_options', 'contact_details', 'OUTPUT__CONTACT__DETAILS');
}

function ADD__BILL__MENU()
{
    /**
     * Ticket
     */
    add_menu_page(__('Bill', 'Bill'), 'Hoá Đơn', 'manage_options', 'bill', 'OUTPUT__BILL__VIEW');
    /**
     * Package
     */
    add_submenu_page('bill', __('Package', 'Package'), 'Loại Gói', 'manage_options', 'package', 'OUTPUT__PACKAGE__VIEW');
    add_submenu_page(null, __('Package', 'Package'), 'Tạo', 'manage_options', 'package_create', 'OUTPUT__PACKAGE__CREATE');
    add_submenu_page(null, __('Package', 'Package'), 'Cập Nhật', 'manage_options', 'package_update', 'OUTPUT__PACKAGE__UPDATE');
}

/**
 * File Exists Output
 */

function OUTPUT__CONTACT__VIEW()
{
    if(file_exists(ROOT__PLUGIN__PATH . '/view/class-contact-view.php'))
    {
        require_once(ROOT__PLUGIN__PATH . '/view/class-contact-view.php');
    }
}

function OUTPUT__CONTACT__DETAILS()
{
    if(file_exists(ROOT__PLUGIN__PATH . '/view/class-contact-details.php'))
    {
        require_once(ROOT__PLUGIN__PATH . '/view/class-contact-details.php');
    }
}

function OUTPUT__EVENT__VIEW()
{
    if(file_exists(ROOT__PLUGIN__PATH . '/view/class-event-view.php'))
    {
        require_once(ROOT__PLUGIN__PATH . '/view/class-event-view.php');
    }
}

function OUTPUT__EVENT__DETAILS()
{
    if(file_exists(ROOT__PLUGIN__PATH . '/view/class-event-details.php'))
    {
        require_once(ROOT__PLUGIN__PATH . '/view/class-event-details.php');
    }
}

function OUTPUT__EVENT__UPDATE()
{
    if(file_exists(ROOT__PLUGIN__PATH . '/view/class-event-update.php'))
    {
        require_once(ROOT__PLUGIN__PATH . '/view/class-event-update.php');
    }
}

function OUTPUT__EVENT__CREATE()
{
    if(file_exists(ROOT__PLUGIN__PATH . '/view/class-event-create.php'))
    {
        require_once(ROOT__PLUGIN__PATH . '/view/class-event-create.php');
    }
}

function OUTPUT__PACKAGE__VIEW()
{
    if(file_exists(ROOT__PLUGIN__PATH . '/view/class-package-view.php'))
    {
        require_once(ROOT__PLUGIN__PATH . '/view/class-package-view.php');
    }
}

function OUTPUT__PACKAGE__UPDATE()
{
    if(file_exists(ROOT__PLUGIN__PATH . '/view/class-package-update.php'))
    {
        require_once(ROOT__PLUGIN__PATH . '/view/class-package-update.php');
    }
}

function OUTPUT__PACKAGE__CREATE()
{
    if(file_exists(ROOT__PLUGIN__PATH . '/view/class-package-create.php'))
    {
        require_once(ROOT__PLUGIN__PATH . '/view/class-package-create.php');
    }
}


function OUTPUT__BILL__VIEW()
{
    if(file_exists(ROOT__PLUGIN__PATH . '/view/class-bill-view.php'))
    {
        require_once(ROOT__PLUGIN__PATH . '/view/class-bill-view.php');
    }
}

// function OUTPUT__BILL__DETAILS()
// {
//     if(file_exists(ROOT__PLUGIN__PATH . '/'))
//     {
//         require_once(ROOT__PLUGIN__PATH . '/');
//     }
// }

// function OUTPUT__BILL__STATUS()
// {
//     if(file_exists(ROOT__PLUGIN__PATH . '/'))
//     {
//         require_once(ROOT__PLUGIN__PATH . '/');
//     }
// }

// function OUTPUT__SCAN()
// {
//     if(file_exists(ROOT__PLUGIN__PATH . '/'))
//     {
//         require_once(ROOT__PLUGIN__PATH . '/');
//     }
// }

// function OUTPUT__CHART()
// {
//     if(file_exists(ROOT__PLUGIN__PATH . '/'))
//     {
//         require_once(ROOT__PLUGIN__PATH . '/');
//     }
// }


/**
 * Get File CSS and Javascript
 */

add_action('admin_enqueue_scripts', 'CUSTOM__ADMIN__CSS');
function CUSTOM__ADMIN__CSS()
{
    wp_enqueue_style('style', ROOT__PLUGIN__URI . 'css/wp-style.css', false, '1.0.0');
    wp_enqueue_style('boxicons', 'https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css', false);
}



?>