<?php
/**
*** Template Name: Home Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-home">
        <section class="hero hero-parallax">
            <div class="custom-slider-wrapper">
                <?php if( have_rows('slider_images') ): ?>
                        <div class="custom-slider">
                            <?php while( have_rows('slider_images') ) : the_row();
                                $slider_image = get_sub_field('slider_image'); ?>
                                <div class="slide-item" style="background-image: url(<?php echo $slider_image; ?>);"></div>
                            <?php endwhile; ?>
                        </div>
                    <?php else :
                endif; ?>                
            </div>
            <div class="hero-background" style="background-image: url(<?php the_field('background_image_mobile_hero'); ?>);"></div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="heading"><?php the_field('section_heading_hero'); ?></h1>
                    <h3 class="subheading"><?php the_field('section_subheading_hero'); ?></h3>
                    <p><?php the_field('section_description_hero'); ?></p>
                    <div class="button-holder">
                        <a href="<?php the_field('button_link_hero'); ?>" class="btn-brown arrow-right"><?php the_field('button_text_hero'); ?></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured" style="background-image: url(<?php the_field('background_image_good_food'); ?>);">
            <?php if( have_rows('top_button_good_food') ): ?>
                    <div class="button-top">
                        <div class="button-wrapper">
                            <?php while( have_rows('top_button_good_food') ) : the_row();
                                $button_text = get_sub_field('button_text');
                                $button_link = get_sub_field('button_link');
                                ?>
                                    <a href="<?php echo $button_link; ?>" class="btn-brown arrow-right"><?php echo $button_text; ?></a>
                                <?php
                            endwhile; ?>
                        </div>
                    </div>
                <?php else :
            endif; ?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <h2 class="heading dashed"><?php the_field('section_heading_good_food'); ?></h2>
                        <p><?php the_field('section_subheading_good_food'); ?></p>
                        <?php if( have_rows('small_images_good_food') ): ?>
                            <div class="items">
                                <?php while( have_rows('small_images_good_food') ) : the_row(); ?>
                                    <div class="item">
                                        <img src="<?php the_sub_field('image') ?>" alt="" />
                                    </div>
                                    <?php
                                endwhile; ?>
                            </div>
                        <?php else :
                        endif; ?>
                    </div>
                    <div class="col-xl-6">
                        <div class="featured-image">
                            <img src="<?php the_field('featured_image_good_food'); ?>" alt="" />
                        </div>
                        <?php if( have_rows('bottom_button_good_food') ): ?>
                            <div class="button-holder">
                                <?php while( have_rows('bottom_button_good_food') ) : the_row();
                                    $button_text = get_sub_field('button_text');
                                    $button_link = get_sub_field('button_link');
                                    ?>
                                        <a href="<?php echo $button_link; ?>" class="btn-brown arrow-right"><?php echo $button_text; ?></a>
                                    <?php
                                endwhile; ?>
                            </div>
                        <?php else :
                        endif; ?>                        
                    </div>
                </div>
            </div>
        </section>
        <section class="products">
            <?php if( get_field('product_image_products') ): ?>
                <img src="<?php the_field('product_image_products'); ?>" />
            <?php endif; ?>
        </section>
        <?php include 'product-range.php'; ?>
        <section class="news" style="background-image: url(<?php the_field('background_image_news'); ?>);">
            <div class="container">
                <h2 class="heading heading-center"><?php the_field('heading_news'); ?></h2>
                <div class="row">
                    <!-- dynamic news -->
                    <div class="col-md-4 column">
                        <div class="item">
                            <a href="#" class="item-link">
                                <div class="image-holder">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-news-1.jpg" alt="" />
                                </div>
                                <div class="content-holder">
                                    <h4 class="title">Weird things dogs eat and the reasons why</h4>
                                    <div class="button-holder">
                                        <span class="btn-brown arrow-right">Read More</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 column">
                        <div class="item">
                            <a href="#" class="item-link">
                                <div class="image-holder">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-news-2.jpg" alt="" />
                                </div>
                                <div class="content-holder">
                                    <h4 class="title">What vitamins and minerals do dogs need to stay healthy? </h4>
                                    <div class="button-holder">
                                        <span class="btn-brown arrow-right">Read More</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 column">
                        <div class="item">
                            <a href="#" class="item-link">
                                <div class="image-holder">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-news-3.jpg" alt="" />
                                </div>
                                <div class="content-holder">
                                    <h4 class="title">What are the most popular crossbreeds?</h4>
                                    <div class="button-holder">
                                        <span class="btn-brown arrow-right">Read More</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="button-holder">
                    <a href="<?php the_field('button_link_news'); ?>" class="btn-brown arrow-right"><?php the_field('button_text_news'); ?></a>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>