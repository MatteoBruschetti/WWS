<?php
            
    use Carbon_Fields\Container;
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'after_setup_theme', 'crb_load' );
    function crb_load() {
        require_once( __DIR__ . '/vendor/autoload.php' );
        \Carbon_Fields\Carbon_Fields::boot();
    }



    add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
    function crb_attach_theme_options() {
        
        
        /*Theme options
        -------------------------------------*/
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
                Field::make( 'text', 'crb_ragione_sociale'),
                Field::make( 'text', 'crb_address_sede_legale'),
                Field::make( 'text', 'crb_partita_iva'),
                Field::make( 'text', 'crb_linkedin_url'),
            ) );



        /*Custom CPT fields
        -------------------------------------*/
        Container::make( 'post_meta', 'Custom Data' )
                ->where( 'post_type', '=', 'service-project' )
                ->add_fields( array(
                    Field::make( 'text', 'crb_project_client')
            ));
        Container::make( 'post_meta', 'Custom Data' )
                ->where( 'post_type', '=', 'research-project' )
                ->add_fields( array(
                    Field::make( 'text', 'crb_project_client')
            ));
            
        Container::make( 'post_meta', 'Custom Data' )
                ->where( 'post_type', '=', 'who-we-are' )
                ->add_fields( array(
                    Field::make( 'text', 'crb_role'),
                    Field::make( 'text', 'crb_email')
            ));
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
                                    <h2 class="gradient-on-left i-v mb-48-r"><?php echo $fields['heading']; ?></h2>
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
                    Field::make( 'rich_text', 'txt', __( 'Text' ) ),
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
                    Field::make( 'rich_text', 'txt', __( 'Text' ) ),
                    Field::make( 'complex', 'list_left', __( 'List on the left' ) )
                        ->add_fields( array(
                            Field::make( 'rich_text', 'li_left', __( 'List Item' ) ),
                        ) ),
                    Field::make( 'complex', 'list_right', __( 'List on the right' ) )
                        ->add_fields( array(
                            Field::make( 'rich_text', 'li_right', __( 'List Item' ) ),
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
                                    <h2 class="gradient-on-left i-v mb-48-r"><?php echo $fields['heading']; ?></h2>
                                </div>
                                <div class="col-12 col-lg-11 offset-lg-1">
                                    <p class="mb-48-r"><?php echo $fields['txt']; ?> </p>
                                </div>
                                <div class="col-12 col-lg-5 offset-lg-1">
                                    <ul>
                                        <!-- Complex field -->
                                        <?php 
                                            $listsl = $fields['list_left'];
                                            foreach ($listsl as $listl) {
                                                ?>
                                                    <li><?php echo $listl['li_left']; ?></li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="col-12 col-lg-5 offset-lg-1">
                                    <ul>
                                        <!-- Complex field -->
                                        <?php 
                                            $listsr = $fields['list_right'];
                                            foreach ($listsr as $listr) {
                                                ?>
                                                    <li><?php echo $listr['li_right']; ?></li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </section>

                    <?php
                } ); //render callback


                //Logo animation = SINGLE GB BLOCK
                Block::make( __( 'Logo Animation' ) )
                    ->add_fields( array(
                        Field::make( 'html', 'crb_description', __( 'Section Description' ) )
	                        ->set_html( sprintf( 'WWS animated logo' ) )
                    ) )
                    ->set_description( __( 'A WWS block for display animated logo' ) )
                    ->set_category( 'customCarbon' )
                    ->set_icon( 'superhero-alt' )
                    ->set_mode( 'edit' )
                    ->set_render_callback( function ( $fields) {
                        ?>

                            <section class="crb-logo-animation i-v">
                                <div class="svg-wrapper">
                                    <svg width="567" height="218" viewBox="0 0 567 218" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g class="svg-g__logogram">
                                            <path class="logogram__txt" fill-rule="evenodd" clip-rule="evenodd" d="M248.002 31.1855C247.96 30.9581 248.603 30.8107 251.114 30.4722C252.854 30.2377 254.545 30.0354 254.871 30.0228L255.464 30L259.708 45.6403C262.043 54.2426 264.002 61.311 264.062 61.3479C264.122 61.3849 265.902 54.8547 268.017 46.8367C270.132 38.8187 271.984 31.8384 272.133 31.3247L272.403 30.391H276.121H279.838L280.422 32.5041C280.743 33.6663 282.646 40.6494 284.65 48.022C286.654 55.3947 288.351 61.3656 288.422 61.2907C288.493 61.2158 290.3 54.5203 292.438 46.4117C294.576 38.3031 296.416 31.3811 296.527 31.0298L296.729 30.391H300.472C302.53 30.391 304.214 30.4429 304.214 30.5064C304.214 30.7039 291.768 70.9578 291.562 71.4256C291.372 71.8577 291.295 71.8679 288.213 71.8679H285.059L284.729 70.7376C280.215 55.2573 276.107 41.3091 276.041 41.2442C275.995 41.198 275.821 41.6342 275.655 42.2135C275.488 42.7926 273.569 49.5028 271.388 57.1249C269.208 64.7471 267.337 71.1846 267.231 71.4305C267.04 71.8726 267.002 71.8772 263.851 71.8237L260.663 71.7696L254.359 51.6209C250.891 40.5391 248.031 31.3432 248.002 31.1855ZM443.541 30.4893L445.914 30.3814C447.219 30.322 448.888 30.2557 449.622 30.2339L450.957 30.1944V39.1385V48.0826H459.657H468.356L468.408 39.2859L468.459 30.4893H472.217H475.975V51.1295V71.7696H472.217H468.459L468.408 62.8747L468.357 53.9798H459.657H450.957V62.9282V71.8766L447.249 71.8231L443.541 71.7696V51.1295V30.4893ZM316.523 51.326C316.495 40.082 316.515 30.7719 316.567 30.6367C316.641 30.4437 319.314 30.391 329.016 30.391C336.373 30.391 341.416 30.4645 341.484 30.5728C341.63 30.8087 342.581 35.4429 342.581 35.9222C342.581 36.274 342.22 36.2882 333.286 36.2882H323.991V42.0845V47.8811L331.058 47.9326L338.125 47.9843L338.552 50.2001C338.786 51.4188 339.037 52.7235 339.108 53.0995L339.237 53.7832H331.614H323.991V59.877V65.9707H334.172H344.353L344.462 66.413C344.889 68.1554 345.475 71.6 345.364 71.7219C345.289 71.8036 338.781 71.8479 330.901 71.8201L316.574 71.7696L316.523 51.326ZM352.522 71.5239C352.591 71.2811 364.922 40.3616 368.827 30.6367C368.901 30.4547 369.738 30.391 372.062 30.391C374.925 30.391 375.216 30.423 375.397 30.759C375.643 31.2174 391.836 70.8856 391.887 71.1563C391.919 71.3291 386.28 72.2076 384.888 72.2467C384.4 72.2605 384.294 72.037 382.398 67.0027L380.417 61.7444L372.129 61.6939L363.841 61.6432L361.982 66.5099C360.96 69.1865 360.037 71.4872 359.931 71.6222C359.789 71.803 358.772 71.8679 356.081 71.8679C352.691 71.8679 352.43 71.8428 352.522 71.5239ZM396.373 36.2882V33.3396V30.391H413.469C423.73 30.391 430.609 30.4637 430.677 30.5728C430.823 30.8087 431.774 35.4429 431.774 35.9222C431.774 36.2727 431.462 36.2882 424.456 36.2882H417.139V54.078V71.8679H413.381H409.624V54.078V36.2882H402.999H396.373ZM492.931 51.326C492.904 40.082 492.923 30.7719 492.975 30.6367C493.049 30.4437 495.743 30.391 505.531 30.391H517.992L518.098 30.8333C518.515 32.5932 519.136 36.0145 519.059 36.1378C519.008 36.2206 514.788 36.2882 509.682 36.2882H500.399V42.0871V47.886H507.496H514.594L515.11 50.596C515.394 52.0864 515.627 53.4132 515.627 53.5446C515.627 53.7276 513.853 53.7832 508.013 53.7832H500.399V59.8752V65.9672L510.633 66.0181L520.868 66.069L521.296 68.1212C521.531 69.25 521.782 70.5552 521.852 71.0219L521.98 71.8705L507.481 71.8201L492.983 71.7696L492.931 51.326ZM533.821 71.8679V51.1066V30.3456L541.781 30.4413C550.465 30.5457 551.603 30.6599 554.843 31.7515C557.134 32.5236 558.514 33.3307 560.124 34.8412C562.202 36.7892 563.189 38.9895 563.419 42.1858C563.576 44.3811 563.232 46.3272 562.368 48.1189C561.832 49.2304 561.293 49.9268 559.961 51.2266C559.018 52.1481 557.823 53.1223 557.306 53.3914C556.789 53.6605 556.367 53.9397 556.367 54.0118C556.367 54.0837 558.681 58.0942 561.509 62.9238C564.337 67.7534 566.651 71.7417 566.651 71.7865C566.651 71.8314 564.84 71.8679 562.627 71.8679H558.603L554.043 63.8576C550.928 58.3859 549.383 55.8523 549.167 55.8635C548.994 55.8726 547.116 55.8948 544.995 55.9127L541.139 55.9455V63.9067V71.8679H537.48H533.821ZM555.052 40.6128C554.251 38.8519 552.88 37.7353 550.783 37.1362C550.063 36.9306 548.414 36.8071 545.44 36.7362L541.139 36.6338V43.2427V49.8517H544.707C550.962 49.8517 553.562 48.9113 554.923 46.1569C555.409 45.1723 555.475 44.82 555.465 43.2665C555.456 41.9281 555.355 41.2821 555.052 40.6128ZM377.924 55.5032C377.869 55.3682 376.557 52.0288 375.008 48.0826C373.459 44.1364 372.129 40.8381 372.053 40.7529C371.977 40.6678 370.661 43.8523 369.128 47.8296C367.595 51.8068 366.281 55.2158 366.207 55.4049C366.081 55.7279 366.438 55.7489 372.048 55.7489C376.75 55.7489 378.002 55.6966 377.924 55.5032Z"/>
                                            <rect class="logogram__square" x="242" y="72" width="325" height="64"/>
                                            <path class="logogram__txt" fill-rule="evenodd" clip-rule="evenodd" d="M250.669 88.6838C252.11 88.4984 253.734 88.2812 254.278 88.201C254.822 88.1206 255.322 88.106 255.391 88.1684C255.459 88.2307 257.417 95.292 259.742 103.86C262.066 112.428 264.019 119.438 264.08 119.438C264.141 119.439 265.998 112.609 268.206 104.261C270.414 95.9135 272.264 88.9696 272.318 88.8302C272.393 88.6356 273.282 88.5766 276.143 88.5766H279.87L280.045 89.2155C280.141 89.567 282.031 96.5109 284.244 104.646C286.458 112.782 288.32 119.439 288.381 119.439C288.443 119.439 290.325 112.517 292.564 104.057L296.635 88.6749L300.449 88.6215C304.017 88.5713 304.256 88.5904 304.167 88.9163C304.114 89.108 301.241 98.3978 297.783 109.561L291.495 129.857H288.279H285.062L284.76 128.923C284.594 128.41 282.574 121.532 280.271 113.64C277.969 105.747 276.062 99.2645 276.035 99.2337C275.997 99.1914 268.647 124.682 267.416 129.125L267.21 129.866L263.915 129.813L260.619 129.759L254.343 109.708C250.891 98.6805 248.063 89.5145 248.057 89.3393C248.05 89.0775 248.515 88.9607 250.669 88.6838ZM308.616 129.513C308.705 129.197 323.938 91.0049 324.651 89.3089L324.963 88.5668L328.18 88.6209L331.396 88.6749L339.683 108.98C344.24 120.147 347.917 129.336 347.854 129.399C347.71 129.542 340.566 130.475 340.456 130.366C340.412 130.322 339.712 128.531 338.902 126.386C338.091 124.241 337.2 121.888 336.922 121.159L336.415 119.832H328.143H319.871L318.895 122.338C318.358 123.717 317.489 125.972 316.965 127.351L316.011 129.857H312.265C308.792 129.857 308.526 129.832 308.616 129.513ZM352.315 91.7316C352.284 90.2776 352.304 88.9723 352.358 88.8312C352.439 88.6221 355.644 88.5837 369.62 88.6246L386.782 88.6749L387.315 91.3287C387.608 92.7882 387.853 94.0931 387.859 94.2281C387.867 94.4204 386.28 94.4738 380.552 94.4738H373.235V112.165V129.857H369.477H365.719V112.168V94.4791L359.045 94.4272L352.37 94.3755L352.315 91.7316ZM399.538 129.857V109.217V88.5766H412.082H424.626L424.837 89.6086C424.953 90.1762 425.215 91.459 425.419 92.459L425.789 94.2773H416.421H407.053V100.174V106.072H414.136H421.219L421.752 108.873C422.045 110.413 422.284 111.74 422.283 111.821C422.282 111.903 418.855 111.969 414.667 111.969H407.053V118.061V124.153L417.279 124.204L427.504 124.255L428.047 126.908C428.346 128.368 428.595 129.628 428.6 129.71C428.605 129.791 422.068 129.857 414.074 129.857H399.538ZM439.684 129.857V109.199V88.5407L448.04 88.6337C456.993 88.7335 457.571 88.7889 460.762 89.853C463.175 90.658 464.559 91.4834 466.203 93.0978C468.534 95.3881 469.349 97.4755 469.349 101.157C469.349 103.558 469.024 105.026 468.116 106.719C467.337 108.172 465.058 110.46 463.458 111.395L462.254 112.098L467.308 120.732C470.088 125.48 472.405 129.476 472.459 129.611C472.535 129.803 471.671 129.857 468.53 129.857L464.504 129.856L459.975 121.895L455.446 113.935H451.323H447.2V121.896V129.857H443.442H439.684ZM460.806 98.2834C459.924 96.622 458.461 95.6423 456.128 95.1506C455.262 94.9682 453.514 94.8727 451.007 94.8703L447.2 94.867V101.452V108.037L450.512 108.031C455.483 108.02 457.924 107.449 459.729 105.874C461.05 104.721 461.34 103.925 461.34 101.452C461.34 99.4823 461.292 99.2002 460.806 98.2834ZM334.032 113.836L331.105 106.4C329.496 102.31 328.135 98.9209 328.082 98.868C328.029 98.8153 327.945 98.8444 327.896 98.9327C327.562 99.5336 322.173 113.766 322.251 113.844C322.305 113.897 324.978 113.917 328.19 113.888L334.032 113.836Z"/>
                                            <rect class="logogram__square" x="242" y="130" width="325" height="64"/>
                                            <path class="logogram__txt" fill-rule="evenodd" clip-rule="evenodd" d="M253.18 154.574C254.102 150.165 258.118 146.936 263.764 146.064C267.951 145.417 271.815 145.982 276.871 147.98C277.986 148.421 279.025 148.88 279.182 149C279.421 149.185 279.273 149.642 278.243 151.908C277.571 153.387 276.955 154.662 276.875 154.74C276.794 154.819 275.86 154.478 274.798 153.983C271.872 152.62 270.768 152.376 267.528 152.376C265.13 152.376 264.612 152.435 263.659 152.813C261.711 153.587 260.701 154.928 260.71 156.732C260.72 159.087 261.985 160.285 268.236 163.86C274.256 167.303 276.707 168.938 278.407 170.645C280.099 172.344 280.974 173.997 281.307 176.121C282.122 181.333 278.841 185.998 273.067 187.835C268.312 189.348 263.346 189.135 257.421 187.165C255.318 186.465 252.992 185.373 252.992 185.085C252.992 184.726 254.801 179.393 254.923 179.393C254.997 179.393 256.002 179.79 257.157 180.274C258.311 180.758 260.138 181.397 261.217 181.694C262.935 182.166 263.532 182.233 266.045 182.235C269.287 182.238 270.558 181.966 271.936 180.974C273.674 179.722 274.188 177.23 273.043 175.603C272.231 174.45 270.216 172.997 266.949 171.208C258.237 166.437 255.023 163.744 253.498 159.933C253.039 158.787 252.876 156.031 253.18 154.574ZM292.862 179.443C294.752 174.713 298.458 165.423 301.097 158.8L305.895 146.757L309.139 146.809L312.382 146.861L320.671 167.177C325.229 178.352 328.917 187.536 328.866 187.587C328.684 187.767 321.534 188.627 321.41 188.484C321.341 188.403 320.413 186.015 319.349 183.175L317.413 178.013L309.104 178.064L300.796 178.116L298.896 183.078L296.995 188.04L293.211 188.041L289.426 188.043L292.862 179.443ZM340.01 188.043V167.402V146.762H343.63H347.25L356.337 159.276C361.334 166.158 365.934 172.549 366.56 173.478L367.696 175.167L367.697 160.965L367.697 146.762H371.554H375.41V167.402V188.043H371.667H367.923L359.161 175.904C354.342 169.228 349.753 162.848 348.962 161.727L347.525 159.688V173.865V188.043H343.767H340.01ZM391.231 188.043V167.388V146.733L401.07 146.816C409.489 146.886 411.12 146.947 412.372 147.238C414.756 147.79 416.989 148.683 418.57 149.714C420.264 150.82 422.662 153.267 423.632 154.88C424.982 157.123 425.968 160.126 426.447 163.448C426.748 165.532 426.57 171.103 426.142 173.005C424.52 180.218 420.436 185.003 414.172 187.027C411.346 187.941 409.954 188.043 400.303 188.043H391.231ZM418.116 161.112C416.956 156.948 414.534 154.346 410.863 153.321C409.985 153.075 408.462 152.98 404.235 152.907L398.747 152.812V167.403V181.994L404.037 181.898C408.091 181.824 409.596 181.726 410.48 181.48C414.397 180.39 416.929 177.735 418.126 173.461C419.083 170.046 419.079 164.566 418.116 161.112ZM314.893 171.91C314.893 171.794 313.597 168.412 312.013 164.394C310.429 160.377 309.095 157.052 309.049 157.007C309.003 156.961 308.839 157.225 308.685 157.593C307.957 159.331 303.225 171.748 303.225 171.922C303.225 172.051 305.273 172.12 309.059 172.12C313.075 172.12 314.893 172.055 314.893 171.91Z"/>
                                            <rect class="logogram__square" x="242" y="189" width="325" height="29"/>
                                        </g>
                                        <g class="svg-g__pittogram">
                                            <rect class="pittogram__square" x="3.5" y="3.5" width="213" height="211" stroke="url(#paint0_linear_672_355)" stroke-width="7"/>
                                            <path class="pittogram__txt" fill-rule="evenodd" clip-rule="evenodd" d="M183.26 27.5061C183.255 25.1397 184.784 23.2334 187.364 22.3881C188.285 22.0866 188.933 22.0276 190.687 22.0862C192.543 22.1481 193.124 22.2531 194.6 22.794C195.553 23.1433 196.38 23.5042 196.437 23.5957C196.602 23.8608 195.306 26.5667 195.065 26.4595C192.797 25.4505 192.204 25.2911 190.687 25.283C188.373 25.2708 187.22 26.0029 187.22 27.4845C187.22 28.5031 187.87 29.1946 189.96 30.3987C196.423 34.1229 197.525 35.2092 197.52 37.8533C197.517 40.0986 196.117 41.978 193.774 42.884C192.096 43.5331 189.021 43.6101 186.849 43.0576C185.24 42.6483 183.547 41.9782 183.359 41.6763C183.308 41.5949 183.477 40.9196 183.734 40.1758C183.979 39.4701 184.086 39.1049 184.318 38.9889C184.577 38.8591 184.993 39.0417 185.933 39.4088C188.214 40.3 190.273 40.4567 192.121 39.8796C193.015 39.6002 193.56 38.843 193.56 37.8816C193.56 36.7987 192.751 36.0836 189.324 34.1375C185.048 31.7094 183.265 29.759 183.26 27.5061ZM120.854 22.8746C120.853 22.749 121.435 22.5678 122.189 22.4591C123.13 22.3233 123.668 22.1322 124.066 22.2916C124.782 22.5788 125.043 24.0046 126.385 28.9454C128.402 36.3718 128.742 37.6584 128.883 37.6369C128.921 37.6312 128.944 37.5333 128.981 37.4336C129.064 37.2127 130.002 33.7388 131.067 29.7138L133.004 22.396L134.902 22.4518L136.8 22.5076L138.875 30.113C140.017 34.2959 140.998 37.6742 141.055 37.6202C141.112 37.5661 142.056 34.1436 143.153 30.0148L145.149 22.5076L147.082 22.4512C148.86 22.3993 149.007 22.4229 148.91 22.7461C147.679 26.8521 142.742 42.6528 142.612 42.9021C142.465 43.1828 142.162 43.2461 140.965 43.2461C140.158 43.2461 139.445 43.1616 139.381 43.0582C139.316 42.9548 138.289 39.5371 137.097 35.4636C135.905 31.39 134.9 28.027 134.863 27.9904C134.826 27.9541 133.812 31.3495 132.609 35.5359L130.421 43.1478H128.784H127.147L124.002 33.1226C122.273 27.6087 120.856 22.9971 120.854 22.8746ZM152.165 22.9729C152.156 22.7246 152.457 22.6081 153.491 22.4591C154.395 22.3286 154.92 22.1374 155.314 22.2884C156.054 22.5721 156.33 24.0639 157.79 29.4368C158.87 33.4102 159.837 36.9705 159.941 37.3489C160.112 37.975 160.286 37.4436 161.874 31.4517C162.834 27.8298 163.769 24.3106 163.953 23.631L164.287 22.3956L166.181 22.4516L168.076 22.5076L170.169 30.2133C171.321 34.4514 172.304 37.8128 172.354 37.6831C172.404 37.5533 173.34 34.0858 174.434 29.9774L176.423 22.5076L178.37 22.4512L180.318 22.3948L180.173 22.8443C180.093 23.0916 178.661 27.7007 176.991 33.0866C175.32 38.4725 173.902 42.9616 173.839 43.0627C173.777 43.1635 173.065 43.2461 172.258 43.2461C171.061 43.2461 170.758 43.1828 170.612 42.9021C170.513 42.7128 169.471 39.2623 168.295 35.234C167.119 31.2058 166.134 27.933 166.106 27.9611C166.077 27.9893 165.24 30.8429 164.244 34.3024C163.248 37.7619 162.255 41.1929 162.038 41.9271L161.642 43.2616L160.026 43.2048L158.409 43.1478L155.293 33.2209C153.579 27.761 152.171 23.1494 152.165 22.9729Z"/>
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_672_355" x1="1.5" y1="218" x2="226.223" y2="6.61522" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#009EE2"/>
                                                <stop offset="1" stop-color="#E6CD00"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>

                                </div>
                            </section>


                        <?php
                    } ); //render callback


                //Custom Spacers = SINGLE GB BLOCK
                Block::make( __( 'Spacers' ) )
                    ->add_fields( array(
                        Field::make( 'select', 'h', __( 'Spacer height' ) )
                        ->add_options( array(
                            'mb-8-r' => __( '8px' ),
                            'mb-16-r' => __( '16px' ),
                            'mb-24-r' => __( '24px' ),
                            'mb-32-r' => __( '32px' ),
                            'mb-40-r' => __( '40px' ),
                            'mb-48-r' => __( '48px' ),
                            'mb-64-r' => __( '64px' ),
                            'mb-80-r' => __( '80px' ),
                            'mb-96-r' => __( '96px' ),
                            'mb-120-r' => __( '120px' ),
                            'mb-160-r' => __( '160px' ),
                            'mb-200-r' => __( '200px' ),
                            'mb-240-r' => __( '240px' ),
                        ) )
                    ) )
                    ->set_description( __( 'A WWS block for add white space to the layout' ) )
                    ->set_category( 'customCarbon' )
                    ->set_icon( 'editor-expand' )
                    ->set_mode( 'edit' )
                    ->set_render_callback( function ( $fields) {
                        ?>

                            <div class="crb-spacer <?php echo $fields['h']; ?>"></div>

                        <?php
                    } ); //render callback


                //Youtube video = SINGLE GB BLOCK
                Block::make( __( 'Youtube video' ) )
                    ->add_fields( array(
                        Field::make( 'html', 'crb_description', __( 'Section Description' ) )
	                        ->set_html( sprintf( 'To get the <b>Youtube video iframe</b> click Share > Incorporate > Copy.' ) )
                            ,
                        Field::make( 'text', 'yt', __( 'Then, paste <iframe> here 👇' ) )
                    ) )
                    ->set_description( __( 'Insert a Youtube video' ) )
                    ->set_category( 'customCarbon' )
                    ->set_icon( 'video-alt3' )
                    ->set_mode( 'edit' )
                    ->set_render_callback( function ( $fields) {
                        ?>

                            <section class="crb-youtube mb-160-r">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="embed-container">
                                            <?php echo $fields['yt']; ?>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        <?php
                    } ); //render callback



                //Full Image = SINGLE GB BLOCK
                Block::make( __( 'Full Image' ) )
                    ->add_fields( array(
                        Field::make( 'image', 'img-url', __( 'Image' ) )
                            ->set_type( array( 'image' ) )
                            ->set_value_type( 'url' ),
                        Field::make( 'checkbox', 'remove', 'Remove image rounded corner' )
                    ) )
                    ->set_description( __( 'A WWS block for display a full row image' ) )
                    ->set_category( 'customCarbon' )
                    ->set_icon( 'format-image' )
                    ->set_mode( 'both' )
                    ->set_render_callback( function ( $fields) {
                        ?>

                            <section class="crb-full-image br-<?php echo $fields['remove']?> mb-160-r">
                                <div class="row">
                                    <div class="col-12 col-lg-11 offset-lg-1">
                                        <img src="<?php echo $fields['img-url']; ?>" alt="">
                                    </div>
                                </div>
                            </section>

                        <?php
                    } ); //render callback



                //Text and Image = SINGLE GB BLOCK
                Block::make( __( 'Text and Image' ) )
                    ->add_fields( array(
                        Field::make( 'select', 'orientation', __( 'Orientation' ) )
                        ->add_options( array(
                            'img-right' => __( 'Image on the right — Text on the left' ),
                            'img-left' => __( 'Image on the left — Text on the right' )
                        ) ),
                        Field::make( 'checkbox', 'remove', 'Remove image rounded corner' ),
                        Field::make( 'rich_text', 'txt', __( 'Text' ) ),
                        Field::make( 'image', 'img-url', __( 'Image' ) )
                            ->set_type( array( 'image' ) )
                            ->set_value_type( 'url' )
                    ) )
                    ->set_description( __( 'A WWS block for display a text and image section' ) )
                    ->set_category( 'customCarbon' )
                    ->set_icon( 'align-pull-left' )
                    ->set_mode( 'both' )
                    ->set_render_callback( function ( $fields) {
                        ?>

                            <section class="crb-txt-image <?php echo $fields['orientation']; ?> br-<?php echo $fields['remove']?> mb-96-r">
                                <div class="row">
                                    <div class="col-12 col-lg-5 offset-lg-1 mb-48-r vc-col">
                                        <div class="wrapper">
                                            <p><?php echo $fields['txt']; ?> </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5 offset-lg-1 mb-48-r vc-col">
                                        <img src="<?php echo $fields['img-url']; ?>" alt="">
                                    </div>
                                </div>
                            </section>

                        <?php
                    } ); //render callback


                
                //Gradient Title = SINGLE GB BLOCK
                Block::make( __( 'Gradient Title' ) )
                    ->add_fields( array(
                        Field::make( 'text', 'heading', __( 'Title' ) ),
                    ) )
                    ->set_description( __( 'A WWS block for display a title with gradient line' ) )
                    ->set_category( 'customCarbon' )
                    ->set_icon( 'heading' )
                    ->set_mode( 'both' )
                    ->set_render_callback( function ( $fields) {
                        ?>

                            <section class="crb-two-col-txt">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="gradient-on-left i-v mb-48-r"><?php echo $fields['heading']; ?></h2>
                                    </div>
                                </div>
                            </section>

                        <?php
                    } ); //render callback
        }


        
?>