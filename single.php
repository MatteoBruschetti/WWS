<?php get_header(); ?>

<main class="container">

    <?php if (have_posts(  )) :?><?php while(have_posts(  )) : the_post(  );?>

    <!--Loop Content-->

    <article class="mb-160-r">

        <p class="mb-8-r"> <?php the_date(); ?> </p>
        <h1 class="mb-32-r"> <?php the_title(); ?> </h1>
        <div class="row mb-160-r">
            <div class="col-12 col-lg-11 offset-lg-1 single-thumbnail">
                <figure>
                    <?php the_post_thumbnail( 'full' ); ?>
                </figure>
            </div>
        </div>

        <?php the_content(); ?>
        
    </article>

    
    <?php endwhile; ?>
        
    <?php else : ?>
        <p> <?php esc_html_e( 'Sorry ma non ci sono post che corrispondono a questo criterio', 'slug-theme' ); ?> </p>
    <?php endif; ?>

    

</main>

<?php get_footer(); ?>