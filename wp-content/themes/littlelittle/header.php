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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/templates/css/bootstrap.css' ?>" type="text/css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php  echo get_template_directory_uri() . '/templates/css/style.css'  ?>" type="text/css">
    <?php wp_head() ?>
    <style>
        html {
            margin-top: 0 !important;
        }
        .swal2-popup {
            width: 22em !important;
            font-family: montserrat-medium !important;
            border-radius: 14px !important; 
        }
        .swal2-html-container {
            margin: 0 !important;
            background: transparent;
            border-radius: 14px 14px 0 0;
        }
        .swal2-html-container .alert__message__contact {
            position: relative;
            text-align: left !important;
            padding: 15px 30px 5px !important;
            width: 100%;
            background-color: #FFFFFF;
        }
        .swal2-html-container .alert__message__contact > p.sa2__text {
            margin: 0 !important;
            font-size: 0.9rem !important;
            line-height: 1.25 !important;
        }
        .swal2-html-container .alert__message__contact.success__contact {
            padding: 30px 30px 5px !important;
        }
        .swal2-html-container .alert__error__contact {
            margin-bottom: 0rem !important;
            background-color: #FF8B15;
            width: 100%;
            height: 50px;
        }
        .swal2-html-container .alert__error__contact img {
            margin: 0 auto;
            position: absolute;
            left: 50%;
            top: 5px;
            transform: translate(-50%, -50%);
            width: 4.5rem;
            height: 4.5rem;
        }
        .swal2-close {
            color: #FF8A00 !important;
            font-size: 1.5rem !important; 
            width: 1em !important;
            height: 1em !important;
            position: absolute !important;
            top: 5px !important;
            right: 5px !important;
        }
        .swal2-close:focus {
            box-shadow: none !important;
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