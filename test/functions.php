<?php

function simple_setup() {

    // Enable title in header
    add_theme_support( "title-tag" );
    // Enable featured image
    add_theme_support( "post-thumbnails" );
    // Custom menu areas
    register_nav_menus( array(
        'header' => esc_html__('Header', 'slug-theme')
    ));

}

add_action( 'after_setup_theme','simple_setup');


/* CSS
/*-----------------------*/

function simple_styles() {

    /* Bootstrap */
    wp_enqueue_style("simple-grid", get_template_directory_uri().'/bootstrap-grid.css');
  
    /*My CSS */
    wp_enqueue_style( "simple-styles", get_template_directory_uri( ).'/style.css');
}

add_action( 'wp_enqueue_scripts', 'simple_styles' );


?>