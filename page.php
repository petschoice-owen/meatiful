<?php
/**
 * The template for displaying any single post.
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-default">
        <section class="hero hero-default">
            <div class="hero-background" style="<?php if( get_field('background_image_hero_default') ): ?>background-image: url(<?php the_field('background_image_hero_default'); ?>);<?php endif; ?>"></div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="heading dashed">
                        <?php 
                            if (get_field('heading_default')) {
                                the_field('heading_default');
                            }
                            else {
                                echo get_the_title();
                            }
                        ?>
                    </h1>
                </div>
            </div>
        </section>
        <section class="content" style="<?php if( get_field('background_image_content_default') ): ?>background-image: url(<?php the_field('background_image_content_default'); ?>);<?php endif; ?>">
            <div class="container">
                <div class="wrapper" style="<?php if( get_field('background_image_content_wrapper_default') ): ?>background-image: url(<?php the_field('background_image_content_wrapper_default'); ?>);<?php endif; ?>">
                    <div class="holder">
                        <?php the_field('text_content_default'); ?>
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php 
                                    if ( get_the_content() ) {
                                        the_content();
                                    }
                                    else {
                                        echo "<h1>There is no content for this page.</h1>";
                                    }
                                ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <h1 class="404">Nothing has been posted like that yet.</h1>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>