<?php get_header(); ?>

<main class="container">

    <!--Hero-->
    <section class="hero mb-240-r pt-24-r">
        <div class="row align-items-end">
            <div class="col-12 col-lg-9 offset-lg-3 mb-32-r">
                <h1 class="gradient-on-left">
                    CONTACT
                    <br><b>US</b> 
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-11 offset-lg-1 hero__col-image">
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/contact/hero-contact.png" alt="Genova skyline">
                </figure>
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
    

</main>


<?php get_footer(); ?>