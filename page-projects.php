<?php get_header(); ?>

<main class="container">

<!--Hero-->
<section class="hero mb-240-r pt-24-r">
        <div class="row align-items-end">
            <div class="col-12 col-lg-9 offset-lg-3 mb-32-r">
                <h1 class="gradient-on-left">
                    PROJECTS
                    <br> <br>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-11 offset-lg-1 hero__col-image">
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/project/hero-project.jpg" alt="Weather Water Sand building">
                </figure>
            </div>
        </div>
    </section>


    <!-- Service Projects -->
    <section>
        <div class="row">
            <div class="col-12">
                <h2 class="gradient-on-left i-v mb-48-r">
                    <b>Service</b> Projects
                </h2>
            </div>
        </div>

        <div class="loop mb-160-r">
            <?php

                //double pagination on the same page
                $paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
                $paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;


                $loop = new WP_Query( array(
                    'post_type'         => 'service-project',
                    'post_status'       => 'publish',
                    'orderby'           => 'count',
                    'order'             => 'DESC',
                    'posts_per_page'    => 3,
                    'paged'             => $paged1
                )); 
                
                while ($loop -> have_posts()) : $loop -> the_post(); ?>
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
                                        <p class="project-client mb-8-r"><?php echo carbon_get_post_meta( get_the_ID(), 'crb_project_client' ); ?></p>
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

                <div class="pagination">
                    <?php
                        //double pagination on the same page
                        $pag_args1 = array(
                            'format'  => '?paged1=%#%',
                            'current' => $paged1,
                            'total'   => $loop->max_num_pages,
                            'add_args' => array( 'paged2' => $paged2 )
                        );
                        echo paginate_links( $pag_args1 );
                    ?>
                </div>

        </div>
    </section>



    <!--Research projects-->
    <section>
        <div class="row">
            <div class="col-12">
                <h2 class="gradient-on-left i-v mb-48-r">
                    <b>Research</b> Projects
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
                    'posts_per_page'    => 3,
                    'paged'          => $paged2
                )); 
                
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
                                        <h3 class="mb-16-r"><?php the_title(); ?></h3>
                                        <p class="long-excerpt mb-16-r"><?php echo get_the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </article>
                <?php endwhile; ?>

            <div class="pagination">
                <?php
                    $pag_args2 = array(
                        'format'  => '?paged2=%#%',
                        'current' => $paged2,
                        'total'   => $loooop->max_num_pages,
                        'add_args' => array( 'paged1' => $paged1 )
                    );
                    echo paginate_links( $pag_args2 );
                ?>
            </div>

        </div>
    </section>

</main>


<?php get_footer(); ?>