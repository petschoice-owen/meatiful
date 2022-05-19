<?php
/**
*** Template for displaying Single News posts
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-legal">
        <section class="hero hero-legal">
            <div class="hero-background" style="background-image: url(<?php the_field('background_image_hero_news_single', 'option'); ?>);"></div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="heading dashed"><?php the_field('heading_news_single', 'option'); ?></h1>
                </div>
            </div>
        </section>
        <?php if ( have_posts() ) :
			while ( have_posts() ) : the_post(); ?>
				<section class="content" style="background-image: url(<?php the_field('background_image_content_news_single', 'option'); ?>);">
					<div class="container">
						<div class="wrapper" style="background-image: url(<?php the_field('background_image_content_news_single_content', 'option'); ?>);">
							<div class="holder">
								<h1 class="title"><?php the_title(); ?></h1>
								<?php $featured_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?>
								<div class="featured-image">
									<div class="image-holder">
										<img src="<?php echo $featured_img[0]; ?>" alt="<?php the_title(); ?>" />
									</div>
								</div>
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile; 
		else : ?>
			<section class="content content-no-post" style="background-image: url(<?php the_field('background_image_content_news_single', 'option'); ?>);">
                <div class="container">
                    <h2 class="text-center text-shadow-white"><?php the_field('heading_error_message_news_single', 'option'); ?></h2>
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
		<?php endif; ?>
        <?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>