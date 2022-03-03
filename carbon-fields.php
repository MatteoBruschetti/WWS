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


        Container::make( 'theme_options', __( 'Contatti' ) )
            ->set_icon( 'dashicons-carrot' )
            ->add_fields( array(
                Field::make( 'image', 'crb_icon_address')
                    ->set_type( array( 'image' ) )
                    ->set_value_type( 'url' )
                    ,
                Field::make( 'text', 'crb_text_address')
                ,
                Field::make( 'image', 'crb_icon_email')
                    ->set_type( array( 'image' ) )
                    ->set_value_type( 'url' )
                    ,
                Field::make( 'text', 'crb_text_email')
                ,
                Field::make( 'image', 'crb_icon_phone')
                    ->set_type( array( 'image' ) )
                    ->set_value_type( 'url' )
                    ,
                Field::make( 'text', 'crb_text_phone')
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



        //STATIC BLOCK - Contact us CTA
        Block::make( __( 'Contact us CTA' ) )
            ->set_description( __( 'A simple block consisting of a contact us call to action' ) )
            ->set_category( 'customCarbon' )
            ->set_icon( 'email' )
            ->set_mode( 'both' )
            ->set_render_callback( function ( $fields) {
                ?>

                <section class="crb_contact-us-cta">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <h2>CONFUSED? CURIOUS? NEED MORE INFO?</h2>
                        </div>
                        <div class="col-12 col-lg-4">
                            <a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>" class="button">Contact us</a>
                        </div>
                    </div>
                </section>

                <?php
            } ); //render callback
    }


?>