<?php
/*---------------------------------------------------------------------------
    ADD FEATURES TO THE CUSTOMIZE PAGE
----------------------------------------------------------------------------*/

    function WWS_customize_register($wp_customize) {

        /*Gestione del logo
        --------------------------------*/
        $wp_customize->add_section('WWS_logo', array(
            'title'       => __('Logo', 'nx'),
            'description' => __('Tutte le specifiche del logo', 'nx'),
            'priority'    => 20,
          )
        );
        // Logo image
        $wp_customize->add_setting('WWS_logo_image_color', array('default' => ''));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'WWS_logo_image_color', array(
              'section' => 'WWS_logo',
              'label'   => __('Logo a colori', 'nx'),
              'setting'    => 'WWS_logo_image_color'
            )
          )
        );
    }      
    add_action("customize_register", "WWS_customize_register");

?>