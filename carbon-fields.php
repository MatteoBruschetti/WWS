<?php
            
    use Carbon_Fields\Container;
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'after_setup_theme', 'crb_load' );
    function crb_load() {
        require_once( __DIR__ . '/vendor/autoload.php' );
        \Carbon_Fields\Carbon_Fields::boot();
    }



    /*Theme options
    -------------------------------------*/
    add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
    function crb_attach_theme_options() {


        Container::make( 'theme_options', __( 'Theme Options' ) )
            ->add_fields( array(
                Field::make( 'text', 'crb_text', 'Text Field' ),
            ) );


        Container::make( 'theme_options', __( 'Theme Options 2' ) )
            ->add_fields( array(
                Field::make( 'text', 'crb_text', 'Text Field' ),
            ) );


    }




    /*GB blocks
    -------------------------------------*/
    add_action( 'carbon_fields_register_fields', 'crb_attach_gb_blocks' );
    function crb_attach_gb_blocks() {


        // Test 1
        Block::make( __( 'MyBlockUno' ) )
            ->add_fields( array(
                Field::make( 'text', 'heading', __( 'Block Heading' ) ),
                Field::make( 'image', 'image', __( 'Block Image' ) ),
                Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
            ) )
            ->set_description( __( 'A simple block consisting of a heading, an image and a text content.' ) )
            ->set_category( 'customCarbon' )
            ->set_icon( 'heart' )
            ->set_render_callback( function ( $fields) {
                ?>

                <div class="block">
                    <div class="block__heading">
                        <h1><?php echo esc_html( $fields['heading'] ); ?></h1>
                    </div><!-- /.block__heading -->

                    <div class="block__image">
                        <?php echo wp_get_attachment_image( $fields['image'], 'full' ); ?>
                    </div><!-- /.block__image -->

                    <div class="block__content">
                        <?php echo apply_filters( 'the_content', $fields['content'] ); ?>
                    </div><!-- /.block__content -->
                </div><!-- /.block -->

                <?php
            } ); //render callback
            

        // Test 2
        Block::make( __( 'MyBlockDue' ) )
            ->add_fields( array(
                Field::make( 'text', 'heading', __( 'Block Heading' ) ),
                Field::make( 'image', 'image', __( 'Block Image' ) ),
                Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
            ) )
            ->set_description( __( 'A simple block consisting of a heading, an image and a text content.' ) )
            ->set_category( 'customCarbon' )
            ->set_icon( 'money-alt' )
            ->set_render_callback( function ( $fields) {
                ?>

                <div class="block">
                    <div class="block__heading">
                        <h1><?php echo esc_html( $fields['heading'] ); ?></h1>
                    </div><!-- /.block__heading -->

                    <div class="block__image">
                        <?php echo wp_get_attachment_image( $fields['image'], 'full' ); ?>
                    </div><!-- /.block__image -->

                    <div class="block__content">
                        <?php echo apply_filters( 'the_content', $fields['content'] ); ?>
                    </div><!-- /.block__content -->
                </div><!-- /.block -->

                <?php
            } ); //render callback
    }


?>