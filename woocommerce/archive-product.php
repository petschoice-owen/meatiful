<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include(get_template_directory() . '/top-navigation.php'); ?>
    <main class="page-varieties">
        <section class="hero hero-secondary">
            <div class="hero-secondary-background" style="background-image: url(<?php the_field('background_image_hero_desktop_shop', 'option'); ?>);"></div>
            <div class="hero-background" style="background-image: url(<?php the_field('background_image_hero_mobile_shop', 'option'); ?>);"></div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="heading dashed heading-small"><?php the_field('heading_hero_shop', 'option'); ?></h1>
                    <h3 class="subheading subheading-small"><?php the_field('subheading_hero_shop', 'option'); ?></p>
                </div>
            </div>
        </section>
        <section class="products" style="background-image: url(<?php the_field('background_image_varieties_shop', 'option'); ?>);">
            <div class="container">
                <div class="products-wrapper" style="background-image: url(<?php the_field('background_image_varieties_content_shop', 'option'); ?>);">
                    <?php
                        $args = array(
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'posts_per_page' => -1, 
                            'orderby' => 'date', 
                            'order' => 'DESC',
                        );
                        $products = new WP_Query($args);
                    ?>
                    <?php if ($products->have_posts()) : ?>
                        <div class="product-items">
                            <?php while ($products->have_posts()) : $products->the_post(); ?>
                                <div class="product-item">
                                    <div class="product-wrapper">
                                        <h4 class="name dashed"><?php the_title(); ?></h4>
                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                        <a href="<?php the_permalink(); ?>" class="thumbnail">
                                            <img src="<?php echo $image[0]; ?>" alt="" />
                                        </a>
                                        <p class="description"><?php echo get_the_content(); ?></p>
                                        <div class="button-holder">
                                            <a href="<?php the_permalink(); ?>" class="btn-brown">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    <?php else: ?>
                        <!-- <?php _e( 'No Products' ); ?> -->
                        <h2>Sorry, there are no products.</h2>
                    <?php endif; wp_reset_query(); ?>
                </div>
            </div>
        </section>
        <?php include(get_template_directory() . '/product-range.php'); ?>
    </main>
<?php get_footer(); ?>