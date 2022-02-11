<?php get_header(); ?>

<main class="container">

    <?php if (have_posts(  )) :?><?php while(have_posts(  )) : the_post(  );?>

    <!--Loop Content-->

    <article>

        
        <h1> <?php the_title( ); ?> </h1>

        <p> <?php the_time( 'j M , Y' ); ?> </p>

            <?php the_post_thumbnail( 'medium', array('class' => 'img-res', 'alt' => get_the_title())); ?>


            <?php the_content(); ?>
        
    </article>

    
    <?php endwhile; ?>
        
    <?php else : ?>
        <p> <?php esc_html_e( 'Sorry ma non ci sono post che corrispondono a questo criterio', 'slug-theme' ); ?> </p>
    <?php endif; ?>

    

</main>

<?php get_footer(); ?>