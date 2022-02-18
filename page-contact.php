<?php get_header(); ?>

<main>

    <div class="container">

        <!--Hero-->
        <section class="hero">
            <div class="row">
                <h1 class="catchprhase col-11">Contact us</h1>
            </div>
            <div class="row">
                <div class="col-11 offset-1 hero-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/hero.png" alt="">
                </div>
            </div>
        </section>


        <section>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-2">
                            <img src="<?php echo carbon_get_theme_option( 'crb_icon_address' ); ?>" alt="">
                        </div>
                        <div class="col-10">
                            <p><?php echo carbon_get_theme_option( 'crb_text_address' ); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <img src="<?php echo carbon_get_theme_option( 'crb_icon_email' ); ?>" alt="">
                        </div>
                        <div class="col-10">
                            <p><?php echo carbon_get_theme_option( 'crb_text_email' ); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <img src="<?php echo carbon_get_theme_option( 'crb_icon_phone' ); ?>" alt="">
                        </div>
                        <div class="col-10">
                            <p><?php echo carbon_get_theme_option( 'crb_text_phone' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>


        </section>


    </div>
    

</main>


<?php get_footer(); ?>