<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WP Little & Little | Wordpress.org</title>
    <!-- Favicon -->
    <link rel="icon" href="" type="image/png">
    <!-- Fonts -->
    <!-- Boxicons -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> -->
    <!-- Swiper -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/> -->
    <!-- Bootstrap 4 -->
    <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri() . '/templates/css/bootstrap.css' ?>" type="text/css"> -->
    <!-- Style CSS -->
    <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri() . '/templates/css/style.css'  ?>" type="text/css"> -->
    <?php wp_head() ?>
    <style>
        html {
            margin-top: 0 !important;
        }

    </style>
</head>
<body>
    
    <!-- Header Start -->
    <header class="site-header" id="js-menu">
        <div class="navbar">
            <div class="nav-item div-logo">
                <a href="">
                    <img src="<?php echo get_template_directory_uri() . "/templates/images/logo/logo.png" ?>" alt="" title="">
                </a>
            </div>
            <div class="nav-item nav-links" id="js-sidebar">
                <div class="sidebar-menu div-logo">
                    <img src="<?php echo get_template_directory_uri() . "/templates/images/logo/logo.png" ?>" alt="" title="">
                    <i class="bx bx-x sidebar-close" id="js-sidebar-close"></i>
                </div>
                <ul class="ul-links">
                    <!-- <li><a href="">Trang chủ</a></li>
                    <li><a href="">Sự kiện</a></li>
                    <li><a href="">Liên hệ</a></li> -->
                    <?php 
                        $menu__location = get_nav_menu_locations(); 
                        $menu__id = $menu__location['primary'];
                        $primary__nav = wp_get_nav_menu_items($menu__id);
                        foreach ($primary__nav as $nav__item)
                        {
                        ?>
                            <li>
                                <a href="<?php echo $nav__item->url ?>"><?php echo $nav__item->title ?></a>
                            </li>
                        <?php 
                        }
                    ?>
                </ul>
            </div>
            <div class="nav-item div-socials">
                <div class="icon-menu">
                    <span>
                        <i class="bx bx-menu sidebar-open" id="js-sidebar-open"></i>
                    </span>
                </div>
                <div class="icon-info">
                    <span>
                        <i class="bx bx-phone"></i> 0123456789
                    </span>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->