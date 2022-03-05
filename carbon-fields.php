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


        Container::make( 'theme_options', __( 'WWS Contacts' ) )
            ->set_icon( 'dashicons-info' )
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
                ,
                Field::make( 'text', 'crb_partita_iva')
            ) );

    }




    /*Gutenberg Blocks for single pages
    -------------------------------------------------------------------------------------------------------*/
    add_action( 'carbon_fields_register_fields', 'crb_attach_gb_blocks' );
    function crb_attach_gb_blocks() {
            
            //Txt on two col = STATIC BLOCK + SINGLE GB BLOCK
            Block::make( __( 'Title and Text on two columns' ) )
                ->add_fields( array(
                    Field::make( 'text', 'heading', __( 'Title' ) ),
                    Field::make( 'rich_text', 'txt-left', __( 'Text on the left' ) ),
                    Field::make( 'rich_text', 'txt-right', __( 'Text on the right' ) ),
                ) )
                ->set_description( __( 'A WWS block for display h2 title and text paragraph on two columns' ) )
                ->set_category( 'customCarbon' )
                ->set_icon( 'editor-table' )
                ->set_mode( 'both' )
                ->set_render_callback( function ( $fields) {
                    ?>

                        <section class="crb-two-col-txt">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="mb-48-r"><?php echo $fields['heading']; ?></h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-5 offset-lg-1 mb-48-r">
                                        <?php echo apply_filters( 'the_content', $fields['txt-left'] ); ?>
                                    </div>
                                    <div class="col-12 col-lg-5 offset-lg-1 mb-48-r">
                                        <?php echo apply_filters( 'the_content', $fields['txt-right'] ); ?>
                                    </div>
                                </div>
                        </section>

                    <?php
                } ); //render callback


            //Txt highlight = STATIC BLOCK + SINGLE GB BLOCK
            Block::make( __( 'Text highlight' ) )
                ->add_fields( array(
                    Field::make( 'textarea', 'txt', __( 'Text' ) ),
                ) )
                ->set_description( __( 'A WWS block for display big text highlighted in blue' ) )
                ->set_category( 'customCarbon' )
                ->set_icon( 'editor-paste-text' )
                ->set_mode( 'both' )
                ->set_render_callback( function ( $fields) {
                    ?>

                        <section class="crb-txt-highlight">
                                <div class="row">
                                    <div class="col-12 col-lg-11 offset-lg-1 mb-80-r">
                                        <?php echo apply_filters( 'the_content', $fields['txt'] ); ?>
                                    </div>
                                </div>
                        </section>

                    <?php
                } ); //render callback


            //Bullet list = STATIC BLOCK + SINGLE GB BLOCK
            Block::make( __( 'Bullet list' ) )
                ->add_fields( array(
                    Field::make( 'text', 'heading', __( 'Title' ) ),
                    Field::make( 'textarea', 'txt', __( 'Text' ) ),
                    Field::make( 'complex', 'list', __( 'List' ) )
                        ->add_fields( array(
                            Field::make( 'textarea', 'li', __( 'List Item' ) ),
                        ) )
                ) )
                ->set_description( __( 'A WWS block for display a list of keypoints' ) )
                ->set_category( 'customCarbon' )
                ->set_icon( 'editor-ul' )
                ->set_mode( 'both' )
                ->set_render_callback( function ( $fields) {
                    ?>

                        <section class="crb-bullet-list">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="mb-48-r"><?php echo $fields['heading']; ?></h2>
                                    </div>
                                    <div class="col-12 col-lg-11 offset-lg-1">
                                        <p class="mb-48-r"><?php echo $fields['txt']; ?> </p>
                                        <ul>
                                            <!-- Complex field -->
                                            <?php 
                                                $lists = $fields['list'];
                                                foreach ($lists as $list) {
                                                    ?>
                                                        <li><?php echo $list['li']; ?></li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                        </section>

                    <?php
                } ); //render callback
        }
?>