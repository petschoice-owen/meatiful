<?php
/**
*** Template Name: Contact Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-legal">
        <section class="hero hero-legal">
            <div class="hero-background" style="background-image: url(<?php the_field('background_image_hero'); ?>);"></div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="heading dashed"><?php the_field('heading_contact'); ?></h1>
                </div>
            </div>
        </section>
        <section class="content" style="background-image: url(<?php the_field('background_image_contact'); ?>);">
            <div class="container">
                <div class="wrapper" style="background-image: url(<?php the_field('background_image_contact_content'); ?>);">
                    <div class="holder">
                        <?php if ( have_rows('content_contact') ):
                            while ( have_rows('content_contact') ): the_row(); ?>
                                <?php if ( get_row_layout() == 'text_content' ): ?>
                                    <?php the_sub_field('text_content_contact'); ?>
                                <?php elseif ( get_row_layout() == 'dashed_item' ): ?>
                                    <div class="item item-dashed">
                                        <?php the_sub_field('dashed_item_contact'); ?>
                                    </div>
                                <?php elseif ( get_row_layout() == 'contact_form' ): ?>
                                    <?php echo do_shortcode(('[contact-form-7 id="'.get_sub_field('contact_form_id').'"]')); ?>
                                <?php endif;
                            endwhile; 
                        endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>