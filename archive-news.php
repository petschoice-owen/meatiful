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
                                            <img src="<?php echo $featured_img[0]; ?>" alt="<?php the_title(); ?>" />
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title"><?php the_title(); ?>Weird things dogs eat and the reasons why</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                            <!--
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-1.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">Weird things dogs eat and the reasons why</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-2.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">What vitamins and minerals do dogs need to stay healthy?</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-3.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">What are the most popular crossbreeds?</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-4.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">What are the most loyal dog breeds?</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-5.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">Is grain-free dog food worth the hype?</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-6.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">What causes stomach problems in dogs?</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-7.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">How to train your dog like a pro</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-8.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">An interview with Support Dogs</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-9.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">Introducing our new grain-free sausage!</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-10.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">Paw police; a day in the life of a pooch on patrol</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-11.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">Dog food ingredients that will keep your pet in tip top shape</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-12.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">15 fun games that will mentally stimulate your dog</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-13.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">5 reasons why working dogs are the best dogs</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-14.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">New Year's Resolutions; get you and your dog on track in 2021</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="#" class="item-link">
                                        <div class="image-holder">
                                            <img src="assets/images/image-news-15.jpg" alt="">
                                        </div>
                                        <div class="content-holder">
                                            <h4 class="title">You are what you eat; the healing power of high quality dog food</h4>
                                            <div class="button-holder">
                                                <span class="btn-brown arrow-right">Read More</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            -->
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