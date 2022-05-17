<?php
/**
*** Template Name: Our Values Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-values">
        <section class="hero hero-secondary">
            <div class="hero-secondary-background" style="background-image: url(<?php the_field('background_image_hero_desktop'); ?>);"></div>
            <div class="hero-background" style="background-image: url(<?php the_field('background_image_hero_mobile'); ?>);"></div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="heading dashed"><?php the_field('heading_hero'); ?></h1>
                    <h3 class="subheading"><?php the_field('subheading_hero'); ?></p>
                    <!-- <div class="button-holder">
                        <a href="#" class="btn-brown arrow-right">Our Values</a>
                    </div> -->
                </div>
            </div>
        </section>
        <section class="content" style="background-image: url(<?php the_field('background_image_features'); ?>);">
            <div class="container">
                <div class="wrapper" style="background-image: url(<?php the_field('background_image_content_features'); ?>);">
                    <?php if( have_rows('items_features') ): 
                        while( have_rows('items_features') ) : the_row();
                            $image = get_sub_field('image');
                            $description = get_sub_field('description'); ?>
                            <div class="item">
                                <div class="image-holder">
                                    <img src="<?php echo $image; ?>" alt="" />
                                </div>
                                <div class="text-holder">
                                    <p><?php echo $description; ?></p>
                                </div>
                            </div>
                        <?php endwhile; 
                    else :
                    endif; ?>
                </div>
            </div>
        </section>
        <?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>