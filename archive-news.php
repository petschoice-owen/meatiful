<?php
/**
*** The template for displaying News page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-legal">
        <section class="hero hero-legal">
            <div class="hero-background" style="background-image: url(<?php the_field('background_image_hero_news', 'option'); ?>);"></div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="heading dashed no-margin"><?php the_field('heading_news', 'option'); ?></h1>
                </div>
            </div>
        </section>
        <?php if ( have_posts() ) :
            $args = array(
                'post_type' => 'news',
                'post_status' => 'publish',
                'posts_per_page' => -1, 
                'orderby' => 'date', 
                'order' => 'DESC',
            );
            $news = new WP_Query( $args ); ?>
            <section class="content news" style="background-image: url(<?php the_field('background_image_content_news', 'option'); ?>);">
                <div class="container">
                    <div class="masonry">
                        <div class="grid">
                            <?php while ( $news->have_posts() ) : $news->the_post(); ?> 
                                <?php $featured_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?>
                                <div class="grid-item">
                                    <a href="<?php the_permalink(); ?>" class="item-link">
                                        <div class="image-holder">
                                            <img src="<?php echo $featured_img[0]; ?>" alt="<?php the_title(); ?>" class="no-lazy" />
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title"><?php the_title(); ?></h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php else : ?>	
            <section class="content content-no-post" style="background-image: url(<?php the_field('background_image_content_news', 'option'); ?>);">
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
            </section>
        <?php endif; wp_reset_query(); ?>
        <?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>