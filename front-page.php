<?php get_header(); ?>

<main class="container">
    <div class="row bando">
        <div class="col-lg-9 offset-lg-3 col-12">
            <img src="<?php echo get_template_directory_uri() . '/img/home/Marchio_bando.png'; ?>" alt="Marchio Bando">
        </div>
    </div>

    <!--Hero-->
    <section class="hero mb-120-r pt-16-r">
        <div class="row align-items-end">
            <div class="col-12 col-lg-4 offset-lg-3 mb-32-r">
                <h1 class="gradient-on-left">
                    INNOVATIVE
                    <br><b>ENVIRONMENTAL</b> 
                    <br>MODELLING
                </h1>
            </div>
            <div class="col-12 col-lg-4 offset-lg-1 hero__col-mission">
                <p>Innovative Environmental Modelling for Submarine Geohazards, Geological Modelling and Renewable Energies.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-11 offset-lg-1 hero__col-image">
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/home/sand-hero.jpg" alt="Desert sand and water">
                </figure>
            </div>
        </div>
    </section>



    <!--Who we are-->
    <section class="two-col-txt mb-24-r">
        <div class="row">
            <div class="col-12">
                <h2 class="gradient-on-left i-v mb-48-r">
                    <a href="<?php echo get_permalink( get_page_by_path( 'about' ) ); ?>">
                       <span class="grey"> Who </span> we are 
                        <svg width='49' height='28' viewBox='0 0 49 28' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M4 16.3333L40.0633 16.3333L31.71 24.71L35 28L49 14L35 0L31.71 3.29L40.0633 11.6667L0 11.6667L4 16.3333Z'/>
                        </svg>
                    </a>
                </h2>
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
    </section>
    <section class="txt-highlight">
        <div class="row">
            <div class="col-12 col-lg-11 offset-lg-1">
                <p class="mb-96-r">
                    Our experts use advanced atmospheric, hydraulic and sediment transport models with applications to:
                </p>
            </div>
        </div>
    </section>
    <section class="images-row">
        <div class="row">
            <div class="col-12 col-lg-11 offset-lg-1">
                <div class="row mb-120-r">
                    <div class="col-12 col-lg-4 images-row__col">
                        <p class="images-row__caption mb-24-r">Risk quantification associated with geologic hazards.</p>
                        <img class="images-row__img" src="<?php echo get_template_directory_uri(); ?>/img/home/wind-grain.jpg" alt="">
                    </div>
                    <div class="col-12 col-lg-4 images-row__col">
                        <p class="images-row__caption mb-24-r">High resolution geologic models for oil and gas and carbon sequestration reservoirs.</p>
                        <img class="images-row__img" src="<?php echo get_template_directory_uri(); ?>/img/home/water-sunset-ocean.jpg" alt="">
                    </div>
                    <div class="col-12 col-lg-4 images-row__col">
                        <p class="images-row__caption mb-24-r">Advanced weather forecasts for renewable energy projects.</p>
                        <img class="images-row__img" src="<?php echo get_template_directory_uri(); ?>/img/home/sand-desert.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Our Services -->
    <section class="bullet-list mb-120-r">
        <div class="row">
            <div class="col-12">
                <h2 class="gradient-on-left i-v mb-48-r">
                    <a href="<?php echo get_permalink( get_page_by_path( 'projects' ) ); ?>">
                    <span class="grey"> Our </span> Services
                        <svg width='49' height='28' viewBox='0 0 49 28' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M4 16.3333L40.0633 16.3333L31.71 24.71L35 28L49 14L35 0L31.71 3.29L40.0633 11.6667L0 11.6667L4 16.3333Z'/>
                        </svg>
                    </a>
                </h2>
            </div>
            <div class="col-12 col-lg-11 offset-lg-1">
                <p class="mb-48-r">
                    The services we offer have in common the application of physics-based, advanced numerical computation techniques that describe the motion of the air and 
                    water masses and the associated sediment transport.  We aim to provide high-quality numerical modelling solutions of natural processes for:
                </p>
            </div>
            <div class="col-12 col-lg-5 offset-lg-1">
                <ul>
                    <li>Predicting the forces associated with the flow of fluids and their potential impact on engineering structures and the natural environment.</li>
                    <li>Predicting the transport of sediment associated with natural flows, the spatial distribution of sediment removal by erosion, and the spatial patterns of sedimentary deposits.</li>
                    <li>Predicting the physical characteristics of modern and ancient deposits using numerical simulation techniques.</li>
                </ul>
            </div>
            <div class="col-12 col-lg-5 offset-lg-1">
                <ul>
                    <li>Providing the best deterministic/statistical predictions for the natural flows used as renewable energy sources in all areas of the world, with applications to economic evaluations for new and existing renewable energy projects, including wind, tidal, hydro-electric and solar.</li>
                    <li>Evaluating the triggering processes of submarine flow events (e.g., turbidity currents, landslides) and the likelihood of occurrence over short to long time scales (10’s to 1000’s of years).</li>
                </ul>
            </div>
        </div>
    </section>




    <!-- LOOP Last news -->
    <section class="loop mb-160-r">
        <div class="row">
            <div class="col-12">
                <h2 class="gradient-on-left i-v mb-48-r">
                    <a href="<?php echo get_permalink( get_page_by_path( 'news' ) ); ?>">
                    <span class="grey"> Latest </span> News
                        <svg width='49' height='28' viewBox='0 0 49 28' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M4 16.3333L40.0633 16.3333L31.71 24.71L35 28L49 14L35 0L31.71 3.29L40.0633 11.6667L0 11.6667L4 16.3333Z'/>
                        </svg>
                    </a>
                </h2>
            </div>
        </div>

        <?php 
            $loop = new WP_Query( array( 
                'post_type'         => 'post',
                'post_status'       => 'publish',
                'orderby'           => 'count',
                'order'             => 'DESC',
                'posts_per_page'    => 3
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

</main>

<?php get_footer(); ?>