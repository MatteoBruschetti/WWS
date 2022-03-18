<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta <?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="format-detection" content="telephone=no"/>
    <meta name="theme-color" content="#417BC7">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="navigation">
        <div class="container">
            <div class="row align-items-center">
                <!--logo dinamico-->
                <div class="col-lg-3 col-8 header__logo">
                        <?php if(get_theme_mod("WWS_logo_image_color")) { ?>
                            <a class="header__logo--img" href="<?php echo esc_url_raw(home_url()); ?>">
                                <img src="<?php echo get_theme_mod("WWS_logo_image_color"); ?>" alt="Logo <?php bloginfo('name'); ?>">
                            </a>
                        <?php } else { ?>
                            <a class="header__logo--title" href="<?php echo esc_url_raw(home_url()); ?>"><?php bloginfo("name"); ?></a>
                        <?php }; ?>
                    </div>   
                    <!--icona hamburger-->
                    <div class="col-4 header__hamburger">
                        <button class="hamburger hamburger--spin" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>        
                    <!--pannello menu widget-->
                    <div class="col-lg-9 header__menu">
                        <nav>
                        <?php wp_nav_menu(array(
                            'theme_location'    =>  'header',
                            'container'         =>  false,
                            'menu_class'      => 'main-menu'
                        )); ?>
                        </nav>
                    </div>
            </div>
        </div>
    </header>
    <div class="fix-fixed"></div>