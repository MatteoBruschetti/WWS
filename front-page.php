<?php get_header(); ?>

<main>

    <div class="container">

        <!--Hero-->
        <section class="hero">
            <div class="row">
                <h1 class="catchprhase col-9">Innovative <span class="blu">Environmental</span> <br> Modelling</h1>
                <div class="col-3 align-items-end mission-prashe">
                    <a href="#" class="mission-prashe"> <h5 class="mission-prashe"> Our Mission </h5> </a>
                    <p class="mission-prhase"> Weather Water Sand is an innovative start-up company founded in 2021 as a Spin-Off from the University of Genova... </p>
                </div>
            </div>

            <div class="row">
                <div class="col-11 offset-1 hero-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/hero.png" alt="">
                </div>
            </div>
        </section>

        <!--About us-->
        <section class="about">

            <div class="row about__title">
                <div class="about__title col-4">
                    <a href="about.html">
                    <h2>About us</h2>
                    <div class="underline"></div>
                    </a>
                </div>
            </div>

            <div class="text row">

                <div class="col-5 offset-1">

                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Impedit repellat ipsa ducimus architecto? 
                    Esse, nihil officia eaque ab earum,
                    <br><br>
                    dolores minima quo vel fugiat a itaque voluptate deleniti! Soluta, inventore.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Impedit repellat ipsa ducimus architecto? 
                    Esse, nihil officia eaque ab earum,
                    <br><br>
                    dolores minima quo vel fugiat a itaque voluptate deleniti! Soluta, inventore.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Impedit repellat ipsa ducimus architecto? 
                    Esse, nihil officia eaque ab earum,
                    dolores minima quo vel fugiat a itaque voluptate deleniti! Soluta, inventore.

                </div>

                <div class="col-5 offset-1">

                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Impedit repellat ipsa ducimus architecto? 
                    Esse, nihil officia eaque ab earum,
                    <br><br>
                    dolores minima quo vel fugiat a itaque voluptate deleniti! Soluta, inventore.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Impedit repellat ipsa ducimus architecto? 
                    Esse, nihil officia eaque ab earum,
                    <br><br>
                    dolores minima quo vel fugiat a itaque voluptate deleniti! Soluta, inventore.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Impedit repellat ipsa ducimus architecto? 
                    Esse, nihil officia eaque ab earum,
                    dolores minima quo vel fugiat a itaque voluptate deleniti! Soluta, inventore.

                </div>

            </div>

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


    </div> <!--.container-->

        <?php if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); ?>
                    <?php the_content(); ?>
                <?php
            }
        }?>

</main>

<?php get_footer(); ?>