<?php

function WWS_setup() {
    // Enable title in header
    add_theme_support( "title-tag" );
    // Enable featured image
    add_theme_support( "post-thumbnails" );
    // Custom menu areas
    register_nav_menus( array(
        'header' => esc_html__('Header', 'slug-theme')
    ));
}
add_action( 'after_setup_theme','WWS_setup');


//add CSS
function WWS_styles() {
    /* Bootstrap */
    wp_enqueue_style("WWS-grid", get_template_directory_uri().'/css-parts/bootstrap-grid.min.css');
    /*My CSS */
    wp_enqueue_style( "WWS-styles", get_template_directory_uri( ).'/style.min.css');
}
add_action( 'wp_enqueue_scripts', 'WWS_styles' );

//add JS
function WWS_scripts() {
    wp_enqueue_script("WWS-script-in-view", get_template_directory_uri().'/js/jquery.in-viewport-class.min.js', array("jquery"), null, true);
    wp_enqueue_script("WWS-scriptjs", get_template_directory_uri().'/js/script.js', array("jquery"), null, true);
}
add_action("wp_enqueue_scripts", "WWS_scripts");


/*REMOVE
----------------------------------------------*/

// Remove comments
add_action('admin_init', function () {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

//Remove emoji
function WWS_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'WWS_disable_emojis' );
    function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
        return array();
        }
    }
    function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
        if ( 'dns-prefetch' == $relation_type ) {
            $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
            $urls = array_diff( $urls, array( $emoji_svg_url ) );
        }
        return $urls;
    }



/*Registriamo una nuova categoria x i blocchi Carbon in Gutemberg
--------------------------------------------------------------*/
function WWS_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'customCarbon',
				'title' => __( 'Custom WWS Blocks', 'WWS' ),
				'icon' => 'star-filled'
			),
		)
	);
}
add_filter( 'block_categories', 'WWS_block_categories', 10, 2 );

/*Carbon Fields
------------------------*/
require dirname(__FILE__).'/carbon-fields.php';


/*Functions Parts
------------------------*/
require dirname(__FILE__).'/functions-parts/customizer.php';
require dirname(__FILE__).'/functions-parts/customize-backend.php';
require dirname(__FILE__).'/functions-parts/customize-gb.php';



?>