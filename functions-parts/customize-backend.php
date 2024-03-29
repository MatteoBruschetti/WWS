<?php
    /*WP custom backend
    --------------------------------*/
    
    //custom wp backend logo = 17x17px
    function WWS_custom_logo() {
        echo '<style type="text/css">
            #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
                background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/custom-logo.png) !important;
                background-position: 0 0;
                background-size: cover;
                color:rgba(0, 0, 0, 0);
            }
             #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
                background-position: 0 0;
            }
            .wp-admin div#ays-quiz-winter-dicount-main div#ays-quiz-dicount-month-main.ays_quiz_dicount_info{display:none}

            /*hide dashboard*/
            .wp-admin #adminmenuwrap #menu-dashboard {display:none !important;}

            /*hide pages*/
            .wp-admin #adminmenuwrap #menu-pages {display:none !important;}

            /*hide customizer*/
            .wp-admin #adminmenuwrap #adminmenu .wp-submenu li.hide-if-no-customize {display:none !important;}
            /*hide theme editor*/
            .wp-admin #adminmenuwrap #adminmenu .wp-submenu li a[href="theme-editor.php"] {display:none !important;}

            /*hide plugin*/
            .wp-admin #adminmenuwrap #menu-plugins {display:none !important;}
            .wp-admin #wpadminbar #wp-toolbar #wp-admin-bar-updates {display:none !important;}

            
            /*hide all in one*/
            .wp-admin #adminmenuwrap .toplevel_page_ai1wm_export {display:none !important;}

            /*hide writing settings*/
            .wp-admin #adminmenuwrap #menu-settings ul li:nth-of-type(3) {display:none !important;}
        </style>';
    }
    add_action('wp_before_admin_bar_render', 'WWS_custom_logo');

    //custom wp login logo = 85x85px
    function WWS_custom_login_logo() { 
        echo '<style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/custom-login-logo.png);
                background-repeat: no-repeat;
                background-size: cover;
                margin-bottom: 10px
            }
            #login h1::after, .login h1::after {
                content: "Serve aiuto? 👇 matteobruschetti@gmail.com  fede.toldo96@gmail.com ";
                font-size: 16px;
                font-weight: 400;
                opacity: 0.8;
                margin-bottom: 20px
            }
        </style>';
    }
    add_action('login_enqueue_scripts', 'WWS_custom_login_logo');

    //custom color scheme
    function WWScolorscheme_admin_color_scheme() {
        $theme_dir = get_stylesheet_directory_uri();
        wp_admin_css_color( 'wws-color-scheme', __( 'WWS Color Scheme' ),
          $theme_dir . '/css-parts/wws-color-scheme.css',
          array( '#23282d', '#fff', '#e6cd00' , '#417bc7')
        );
      }
      add_action('admin_init', 'WWScolorscheme_admin_color_scheme');
      
      
?>