<?php
/**
*** Template Name: Stockists Result Page
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
                </div>
                <div class="wrapper-search">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </section>
        <section class="content" style="background-image: url(<?php the_field('background_image_content_stockists'); ?>);">
            <div class="container">
                <?php 
                    // args
                    $args = array(
                        'numberposts'	=> -1,
                        'post_type'		=> 'stockists',
                        'meta_query'	=> array(
                            'relation'		=> 'OR',
                            array(
                                'key'		=> 'town',
                                'value'		=> '"' . get_search_query() . '"',
                                'compare'	=> 'LIKE'
                            ),
                            array(
                                'key'		=> 'postcode',
                                'value'		=> '"' . get_search_query() . '"',
                                'compare'	=> 'LIKE'
                            )
                        )
                    );
                    // query
                    $the_query = new WP_Query( $args );
                ?>
                <div class="result-wrapper">
                    <?php if( $the_query->have_posts() ): ?>
                        <ul>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                    <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
                </div>
            </div>
        </section>
        <?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>