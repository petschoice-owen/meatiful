<?php
/**
*** Template Name: Stockists Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-stockists">
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
                <div class="wrapper-search">
                    <form action="" id="" class="search-form">
                        <div class="form-group">
                            <input type="text" class="postcode postcode-full" id="search_input" placeholder="Enter postcode or town" name="destination" value="">
                            <div class="button-holder d-none">
                                <!-- <input type="text" id="search_stockist" value="" class="btn-search"> -->
                                <a href="#search_input" id="search_stockist" class="btn-search"></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="content" style="background-image: url(<?php the_field('background_image_content_stockists'); ?>);">
            <div class="container">
                <div class="search-text d-none">
                    <div class="text-content">
                        <p><strong><?php the_field('default_text_stockists'); ?></strong></p>
                    </div>
                </div>
                <div class="search-results">
                    <ul class="items" id="search_results_items">
                        <?php if ( have_posts() ) :
                            $args = array(
                                'post_type' => 'stockists',
                                'post_status' => 'publish',
                                'posts_per_page' => -1, 
                                'orderby' => 'date', 
                                'order' => 'DESC',
                            );
                            $news = new WP_Query( $args ); ?>
                            <?php while ( $news->have_posts() ) : $news->the_post(); ?> 
                                <?php 
                                    $street_address = get_field('street_address');
                                    $address_2 = get_field('address_2');
                                    $town = get_field('town');
                                    $county = get_field('county');
                                    $postcode = get_field('postcode');
                                    $latitude = get_field('latitude');
                                    $longitude = get_field('longitude');
                                ?>
                                <li class="item">
                                    <!-- <?php $featured_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?> -->
                                    <span class="title d-none"><?php the_title(); ?> <?php echo $town; ?> <?php echo $postcode; ?></span>
                                    <div class="information">
                                        <h3 class="name"><?php the_title(); ?></h3>
                                        <p class="address">
                                            <?php echo $street_address; ?>, <?php if( get_field('address_2') ): ?><?php echo $address_2; ?>,<?php endif; ?><br />
                                                <?php if( get_field('town') ): ?><?php echo $town; ?>,<?php endif; ?> <?php if( get_field('county') ): ?><?php echo $county; ?>,<?php endif; ?><br />
                                            <?php echo $postcode; ?>
                                        </p>
                                        <a href="https://www.google.com/maps/search/<?php echo $latitude; ?>,+<?php echo $longitude; ?>" class="map" target="_blank">View in Google Map</a>
                                    </div>
                                    <div class="contact">
                                        <?php if( get_field('contact_number') ): ?>
                                            <a href="#" class="number"><?php the_field('contact_number'); ?></a>
                                        <?php endif; ?>
                                        <?php if( get_field('email') ): ?>
                                            <a href="mailto:<?php the_field('email'); ?>" class="email"><?php the_field('email'); ?></a>
                                        <?php endif; ?>
                                        <?php if( get_field('web_address') ): ?>
                                            <a href="<?php the_field('web_address'); ?>" class="web-address"><?php the_field('web_address'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endwhile;
                            wp_reset_postdata();
                        else : ?>	
                            <!-- <section class="content content-no-post" style="background-image: url(<?php the_field('background_image_content_news', 'option'); ?>);">
                                <div class="container">
                                    <h2 class="text-center text-shadow-white"><?php the_field('heading_error_message', 'option'); ?></h2>
                                    <?php if( have_rows('no_post_buttons', 'option') ): ?>
                                        <div class="button-holder">
                                            <?php while( have_rows('no_post_buttons', 'option') ) : the_row();
                                                $button_text = get_sub_field('button_text', 'option');
                                                $button_link = get_sub_field('button_link', 'option'); ?>
                                                <a href="<?php echo $button_link; ?>" class="btn-brown"><?php echo $button_text; ?></a>
                                            <?php endwhile;
                                            else : ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </section> -->
                        <?php endif; wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
        </section>
        <?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>