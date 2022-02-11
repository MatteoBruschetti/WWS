<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?> 

</head>
<body <?php body_class(); ?>>

<header class="container header">

    <div class="row justify-content-between">

            <a href="<?php echo home_url();?>" class="logo col-2"> logo </a>

        <nav class="menu col-9 offset-1">

            <?php 

            wp_nav_menu( array(
                'theme_location' => 'header',
                'container' => false,
                'items_wrap' => '<ul>%3$s</ul>'
            ));

            ?>

        </nav>

    </div>

</header>