<?php
/**
*** Template Name: Legal Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-legal">
        <section class="hero hero-legal">
            <div class="hero-background" style="background-image: url(<?php the_field('background_image_hero'); ?>);"></div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="heading dashed"><?php the_field('heading_legal'); ?></h1>
                </div>
            </div>
        </section>
        <section class="content" style="background-image: url(<?php the_field('background_image_content'); ?>);">
            <div class="container">
                <div class="wrapper" style="background-image: url(<?php the_field('background_image_content_wrapper'); ?>);">
                    <div class="holder">
                        <?php the_field('text_content_legal'); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>