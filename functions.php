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


/* CSS
/*-----------------------*/

function WWS_styles() {

    /* Bootstrap */
    wp_enqueue_style("WWS-grid", get_template_directory_uri().'/css-parts/bootstrap-grid.min.css');
  
    /*My CSS */
    wp_enqueue_style( "WWS-styles", get_template_directory_uri( ).'/style.min.css');
}

add_action( 'wp_enqueue_scripts', 'WWS_styles' );




/*Registriamo una nuova categoria x i blocchi Carbon in Gutemberg
--------------------------------------------------------------*/
function WWS_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'customCarbon',
				'title' => __( 'Custom Carbon Blocks', 'WWS' ),
				'icon' => 'star-filled'
			),
		)
	);
}
add_filter( 'block_categories', 'WWS_block_categories', 10, 2 );

/*Carbon Fields
------------------------*/
require dirname(__FILE__).'/carbon-fields.php';



?>