<?php get_header(); ?>

<main>

    <!--Hero-->
    <section class="hero mb-240-r">
        <div class="container">
            <div class="row align-items-end mb-80-r">
                <div class="col-12 col-lg-9">
                    <h1>Innovative <span class="blue">Environmental</span> <br>Modelling</h1>
                </div>
                <div class="col-12 col-lg-3 hero__col-mission">
                    <p>Innovative Environmental Modelling for Submarine Geohazards, Geological Modelling and Renewable Energies.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-11 offset-lg-1 hero__col-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/hero.png" alt="">
                </div>
            </div>
        </div> <!--.container-->
    </section>


    <!--Who we are-->
    <section class="two-col-txt">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-48-r"><span class="blue">Who</span> we are</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-5 offset-lg-1">
                    <p class="mb-48-r">
                        Weather Water Sand (WWS) is an innovative start-up company founded in 2021 as a Spin-Off from the University of Genova by a group of professionals with 
                        several years of environmental modelling experience in academia and industry.
                    </p>
                </div>
                <div class="col-12 col-lg-5 offset-lg-1">
                    <p class="mb-48-r">
                        WWS provides innovative numerical modelling services for the entire spectrum of natural flows, including winds, waves, littoral and tidal currents, 
                        rivers and submarine gravity flows with applications to renewable energy projects, oil and gas developments and environmental projects on land and offshore. 
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="txt-highlight">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-11 offset-lg-1">
                    <p class="mb-80-r">
                        Our experts use advanced atmospheric, hydraulic and sediment transport models with applications to
                    </p>
                </div>
            </div>
        </div>
    </section>


            <div class="image-about">

                <div class="row">

                    <h5 class="caption col-2 offset-2 justify-content-end">wether</h5>
                    <h5 class="caption col-2 offset-2 justify-content-end">water</h5>
                    <h5 class="caption col-2 offset-2 justify-content-end">Sand</h5>

                </div>

                <div class="row image-about-single">

                    <div class="single-image1 col-3 offset-1"></div>
                    <div class="single-image2 col-3 offset-1"></div>
                    <div class="single-image3 col-3 offset-1"></div>

                </div>

            </div>
        </div> <!--.container-->
    </section>

        <!--Latest News-->
        <section class="last">

            <div class="row last__title">
                <div class="last__title col-5">
                    <a href="news.html">
                    <h2>Latest news</h2>
                    <div class="underline"></div>
                    </a>
                </div>
            </div>

        </section>


        <!--Latest news-->
        <?php 
            $loop = new WP_Query( array( 'post_type' => 'post') );
            if ($loop->have_posts()) :?><?php while($loop->have_posts()) : $loop->the_post();
            ?>

            <article>
                <a href="<?php the_permalink();?>"> 
                    <div class="row">
                        <div class="col-8">
                            <h3> <?php the_title( ); ?> </h3>
                            <?php the_excerpt( ); ?>
                        </div>
                        <div class="col-3 offset-1">
                            <?php the_post_thumbnail( 'medium', array('class' => 'img-res', 'alt' => get_the_title())); ?>
                        </div>          
                    </div>
                </a> 
            </article>

            <?php endwhile; ?>
            <?php else : ?>
                <p> <?php esc_html_e( 'Sorry ma non ci sono post che corrispondono a questo criterio', 'slug-theme' ); ?> </p>
            <?php endif;
        ?>


    

        <?php if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); ?>
                    <?php the_content(); ?>
                <?php
            }
        }?>

</main>

<?php get_footer(); ?>