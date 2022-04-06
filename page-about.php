<?php get_header(); ?>

<main class="container">

    <!--Hero-->
    <section class="hero mb-240-r pt-24-r">
        <div class="row align-items-end">
            <div class="col-12 col-lg-9 offset-lg-3 mb-32-r">
                <h1 class="gradient-on-left">
                    ABOUT
                    <br><b>US</b> 
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-11 offset-lg-1 hero__col-image">
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/about/hero-about.png" alt="Weather Water Sand team on a table">
                </figure>
            </div>
        </div>
    </section>

    <!-- What we do -->
    <section class="bullet-list mb-80">
        <div class="row">
            <div class="col-12">
                <h2 class="gradient-on-left i-v mb-48-r">
                    What we do
                </h2>
            </div>

            <div class="col-12 col-lg-8 offset-lg-1">
                <h5 class="mb-48-r">
                    Our modelling solutions result from experience developed through research activities by the different partners during their academic and industrial careers.
                </h5>  

                <h5 class="blu mb-64">
                    Our areas of expertise include:
                </h5>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1">
                <ul>
                    <li>Detailed atmospheric forecasting for the planning, construction and maintenance of new industrial installations for the exploitation of renewable energies</li>
                    <li>The prediction of the erosional and depositional processes associated with the erodible character of the riverbed or seabed due to the action of flows</li>
                    <li>Assessment of the submarine geo-hazards associated with ocean currents for the design of deep-water engineering infrastructures, such as pipelines for the exploitation of oil and gas as well as electrical and telecommunication cable networks</li>
                </ul>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1">
                <ul>
                    <li>The quantitative characterization of dispersion from sediment plumes associated with offshore operations such as dredging and dumping.</li>
                    <li>The quantitative modelling of sediment flows and associated deposits for the characterization of oil and gas reservoirs, the description of which is important both for the economic exploitation of hydrocarbons and for the storage and sequestration of CO2 in depleted reservoirs</li>
                </ul>
            </div>

            <h5 class="col-12 pt-16-r">
                Our team is ready to develop specific solutions tailored to address client needs using software developed in-house and in the open market.
            </h5>
        </div>

    </section>

    <!-- What we do post -->
    <section class="loop mb-160-r">
    <?php 
            $loop = new WP_Query( array( 
                'post_type'         => 'post',
                'post_status'       => 'publish',
                'orderby'           => 'count',
                'order'             => 'DESC',
                'posts_per_page'    => 4
            ) );
            if ($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post(); ?>
                <article>
                    
                        <div class="row">
                            <div class="col-12 order-lg-2 col-lg-4">
                                <a href="<?php the_permalink();?>" class="loop__img-permalink">
                                    <img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php echo $thumbnail_alt ?>">
                                </a>
                            </div>
                            <div class="col-12 col-lg-8">
                                <div class="loop__content-container">
                                    <div class="loop__over-content">
                                        <p class="mb-8-r"><?php echo get_the_date(); ?></p>
                                    </div>
                                    <div class="loop__content">                                 
                                        <h3 class="mb-16-r"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                        <p class="mb-16-r"><?php echo get_the_excerpt(); ?></p>
                                        <a class="read-more" href="<?php the_permalink();?>">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p> <?php esc_html_e( 'Sorry ma non ci sono post che corrispondono a questo criterio', 'slug-theme' ); ?> </p>
            <?php endif; ?>

    </section>

    <!--Who we are-->
    <section>
        <div class="row">
            <div class="col-12">
                <h2 class="gradient-on-left i-v mb-48-r">
                    <b>Who</b> We Are
                </h2>
            </div>
        </div>
        <div class="loop mb-160-r">
            <?php 
                $loooop = new WP_Query( array(
                    'post_type'         => 'research-project',
                    'post_status'       => 'publish',
                    'orderby'           => 'count',
                    'order'             => 'DESC',
                    'posts_per_page'    => 6,
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
                ); 
                
                while ($loooop -> have_posts()) : $loooop -> the_post(); ?>
                    <article>
                        <div class="row">
                            <div class="col-12 order-lg-2 col-lg-4">
                                <img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php echo $thumbnail_alt ?>">
                            </div>
                            <div class="col-12 col-lg-8">
                                <div class="loop__content-container">
                                    <div class="loop__over-content">
                                        <p class="project-client mb-8-r"><?php echo carbon_get_post_meta( get_the_ID(), 'crb_project_client' ); ?></p>
                                    </div>
                                    <div class="loop__content">                                 
                                        <h3 class="mb-16-r"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                        <p class="project-excerpt mb-16-r"><?php echo get_the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </article>
                <?php endwhile; ?>

        </div>
    </section>

</main>


<?php get_footer(); ?>