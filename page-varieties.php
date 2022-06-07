<?php
/**
*** Template Name: Varieties Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-varieties">
        <section class="hero hero-secondary">
            <div class="hero-secondary-background" style="background-image: url(<?php the_field('background_image_hero_desktop'); ?>);"></div>
            <div class="hero-background" style="background-image: url(<?php the_field('background_image_hero_mobile'); ?>);"></div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="heading dashed heading-small"><?php the_field('heading_hero'); ?></h1>
                    <h3 class="subheading subheading-small"><?php the_field('subheading_hero'); ?></p>
                </div>
            </div>
        </section>
        <section class="products" style="background-image: url(<?php the_field('background_image_varieties'); ?>);">
            <div class="container">
                <div class="products-wrapper" style="background-image: url(<?php the_field('background_image_varieties_content'); ?>);">
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
                            <!-- <div class="product-item">
                                <div class="product-wrapper">
                                    <h4 class="name dashed">ATLANTIC SALMON</h4>
                                    <a href="#" class="thumbnail">
                                        <img src="assets/images/salmon-320g-2.jpg" alt="" />
                                    </a>
                                    <p class="description">There's nothing fishy about our salmon sausages.</p>
                                    <div class="button-holder">
                                        <a href="#" class="btn-brown">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-wrapper">
                                    <h4 class="name dashed">British Chicken</h4>
                                    <a href="#" class="thumbnail">
                                        <img src="assets/images/chicken-320g-2.jpg" alt="" />
                                    </a>
                                    <p class="description">For top of the range, only free range will do.</p>
                                    <div class="button-holder">
                                        <a href="#" class="btn-brown">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-wrapper">
                                    <h4 class="name dashed">FARM-REARED DUCK</h4>
                                    <a href="#" class="thumbnail">
                                        <img src="assets/images/duck-720g-2.jpg" alt="" />
                                    </a>
                                    <p class="description">The finest canine cuisine? We've quacked it.</p>
                                    <div class="button-holder">
                                        <a href="#" class="btn-brown">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-wrapper">
                                    <h4 class="name dashed">FARM-REARED GRAIN FREE TURKEY</h4>
                                    <a href="#" class="thumbnail">
                                        <img src="assets/images/turkey-320g-2.jpg" alt="" />
                                    </a>
                                    <p class="description">New Grain-free recipe!</p>
                                    <div class="button-holder">
                                        <a href="#" class="btn-brown">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-wrapper">
                                    <h4 class="name dashed">SAUSAGE MIXED CASE</h4>
                                    <a href="#" class="thumbnail">
                                        <img src="assets/images/mixed-320g-2.jpg" alt="" />
                                    </a>
                                    <p class="description">All our Meatiful goodness in one place.</p>
                                    <div class="button-holder">
                                        <a href="#" class="btn-brown">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-wrapper">
                                    <h4 class="name dashed">FARM-REARED Lamb</h4>
                                    <a href="#" class="thumbnail">
                                        <img src="assets/images/lamb-320g-2.jpg" alt="" />
                                    </a>
                                    <p class="description">A complete pet food for dogs from weaning.</p>
                                    <div class="button-holder">
                                        <a href="#" class="btn-brown">Shop Now</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    <?php else: ?>
                        <!-- <?php _e( 'No Products' ); ?> -->
                        <h2>Sorry, there are no products.</h2>
                    <?php endif; wp_reset_query(); ?>
                </div>
            </div>
        </section>
        <?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>