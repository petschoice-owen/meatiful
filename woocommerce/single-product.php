<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include __DIR__ .'/../top-navigation.php'; ?>
    <main class="page-product single-product">
        <section class="hero hero-product">
            <div class="hero-background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/bg-home-hero-mobile.jpg);"></div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="heading dashed"><?php echo get_the_title(); ?></h1>
                    <h3 class="subheading"><?php echo get_the_content(); ?></p>
                </div>
            </div>
        </section>
        <?php
            /**
             * woocommerce_before_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action( 'woocommerce_before_main_content' );
        ?>
            <?php while ( have_posts() ) : ?>
                <section class="product-content" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/bg-film.jpg);">
                    <div class="container">
                        <div class="product-content-wrapper" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/bg-home-featured.jpg);">
                            <?php the_post(); ?>
                            <?php wc_get_template_part( 'content', 'single-product' ); ?>
                        </div>
                    </div>
                </section>
            <?php endwhile; // end of the loop. ?>
        <?php
            /**
             * woocommerce_after_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );
        ?>
        
        <?php include __DIR__ .'/../product-range.php'; ?>
    </main>
<?php get_footer(); ?>