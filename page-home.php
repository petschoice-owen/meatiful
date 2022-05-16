<?php
/**
*** Template Name: Home Page
**/
?>
<?php get_header(); ?>
<body>
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
        <section class="featured" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/bg-home-featured.jpg);">
            <div class="button-top">
                <div class="button-wrapper">
                    <a href="#" class="btn-brown arrow-right">See Varieties</a>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <h2 class="heading dashed">Damn Good Food</h2>
                        <p>100% Natural, 100% Gluten Free, 100% Delicious. Some think sausages ooze saturated fats - ours ooze quality. We pride ourselves on supplying healthy pet food that dogs adore. Whatever variety you decide on, your pooch is sure to love our sausages.</p>
                        <div class="items">
                            <div class="item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-chicken-free.png" alt="" />
                            </div>
                            <div class="item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-duck-farm.png" alt="" />
                            </div>
                            <div class="item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-fish-omega.png" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="featured-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-dog.jpg" alt="" />
                        </div>
                        <div class="button-holder">
                            <a href="#" class="btn-brown arrow-right">Our Values</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="products">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-products.jpg" alt="" />
        </section>
        <?php include 'product-range.php'; ?>
        <section class="news" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/bg-film.jpg);">
            <div class="container">
                <h2 class="heading heading-center">In Our News</h2>
                <div class="row">
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
                    <a href="#" class="btn-brown arrow-right">View All News</a>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>