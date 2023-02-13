    <!--CTA-->
    <section class="cta mb-96-r">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-1 col-lg-8">
                    <p class="cta__text"><b>CURIOUS?</b> NEED MORE INFO?</p> 
                </div>
                <div class="col-10 offset-1 col-lg-2 offset-lg-0 t-center">
                    <a class="cta__btn" href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>">Contact us</a> 
                </div>
            </div>
        </div>
    </section>

    <!--Partners-->
    <section class="partners mb-160-r">
        <div class="container">
            <div class="row align-items-end mb-80-r">
                <div class="col-12 col-lg-8 mb-48-r">
                    <h3 class="uppercase">
                        <span class="grey">Partners</span> & Clients
                    </h3>
                </div>
                <div class="d-none d-lg-block col-lg-4 mb-48-r t-left">
                    <a class="partners__linkedin" href="<?php echo carbon_get_theme_option( 'crb_linkedin_url' ); ?>" target="_blank">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 0H5C2.239 0 0 2.239 0 5V19C0 21.761 2.239 24 5 24H19C21.762 24 24 21.761 24 19V5C24 2.239 21.762 0 19 0ZM8 19H5V8H8V19ZM6.5 6.732C5.534 6.732 4.75 5.942 4.75 4.968C4.75 3.994 5.534 3.204 6.5 3.204C7.466 3.204 8.25 3.994 8.25 4.968C8.25 5.942 7.467 6.732 6.5 6.732ZM20 19H17V13.396C17 10.028 13 10.283 13 13.396V19H10V8H13V9.765C14.396 7.179 20 6.988 20 12.241V19Z"/>
                        </svg>
                        Follow us on LinkedIn
                    </a> 
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-4 partners__img-col">
                    <a href="https://dicca.unige.it/" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/footer/dicca.png" alt="">
                    </a>
                </div>
                <div class="col-4 partners__img-col">
                    <a href="http://www.pm10-ambiente.com/" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/footer/pm_ten.png" alt="">
                    </a>
                </div>
                <div class="col-4 partners__img-col">
                    <a href="http://www.wolfdynamics.com/" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/footer/wolfdynamics.png" alt="">
                    </a>
                </div>
                <div class="col-4 partners__img-col">
                    <a href="https://www.gruppolercari.com/" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/footer/Lercari_Group.png" alt="">
                    </a>
                </div>
                <div class="col-4 partners__img-col">
                    <a href="https://www.rina.org/it" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/footer/rina.png" alt="">
                    </a>
                </div>
                <div class="col-4 partners__img-col">
                    <a href="https://meteocean.science/" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/footer/mete_ocean.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-2 order-xl-4 footer__col-img t-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/footer/spinoff.png" alt="Spinoff - Università degli studi di Genova">
                </div>
                <div class="col-12 col-xl-10 footer__col-txt t-center">
                    <p><strong><?php echo carbon_get_theme_option( 'crb_ragione_sociale' ); ?></strong></p>
                    <p><?php echo carbon_get_theme_option( 'crb_address_sede_legale' ); ?></p>
                    <p><?php echo carbon_get_theme_option( 'crb_partita_iva' ); ?></p>
                    <p>Privacy & Cookies Policy</p>
                </div>
            </div>
        </div>
    </footer>


<?php wp_footer(); ?>

</body>
</html>

