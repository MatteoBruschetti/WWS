<?php get_header(); ?>

<main class="container">

    <!--Hero-->
    <section class="hero mb-80-r pt-24-r">
        <div class="row align-items-end">
            <div class="col-12 col-lg-9 offset-lg-3 mb-32-r">
                <h1 class="gradient-on-left">
                    <b>LATEST</b> 
                    <br>NEWS
                </h1>
            </div>
        </div>
        <div class="row d-none d-lg-flex">
            <div class="col-12 col-lg-11 offset-lg-1 hero__col-image">
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/news/hero-news.jpg" alt="Genova weather water and wind">
                </figure>
            </div>
        </div>
    </section>


    <section class="loop mb-160-r">
        <?php 
            $loop = new WP_Query( array(
                'post_type'         => 'post',
                'post_status'       => 'publish',
                'orderby'           => 'count',
                'order'             => 'DESC',
                'posts_per_page'    => 4,
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
            ); 
            
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
                $big = 999999999; // need an unlikely integer
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $loop->max_num_pages
                ) );
                wp_reset_postdata();
            ?>
        </div>

    </section>




</main>

<?php get_footer(); ?>