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
                            <input type="text" class="postcode" placeholder="Enter your postcode or town" name="destination" id="destination" value="">
                            <div class="button-holder">
                                <input type="submit" value="" class="btn-search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="content" style="background-image: url(<?php the_field('background_image_content_stockists'); ?>);">
            <div class="container">
                <div class="search-text">
                    <div class="text-content">
                        <p><strong><?php the_field('default_text_stockists'); ?>Enter your location to find stockists in your area</strong></p>
                    </div>
                </div>
                <div class="search-results d-none">
                    <div class="items">
                        <div class="item">
                            <p class="distance">35m</p>
                            <div class="info">
                                <h3 class="name">Sainsburys - Livingston</h3>
                                <p class="address">
                                    Unit 1, Almondvale Retail Park,<br />
                                    Livingston,<br />
                                    EH54 6RQ
                                </p>
                            </div>
                            <div class="contact">
                                <a href="tel:01506413699" class="number">01506 413699</a>
                            </div>
                        </div>
                        <div class="item">
                            <p class="distance">35m</p>
                            <div class="info">
                                <h3 class="name">Paws and Claws</h3>
                                <p class="address">
                                    Lothian Road,<br />
                                    Jedburgh,<br />
                                    Roxburghshire,<br />
                                    TD8 6LA
                                </p>
                            </div>
                            <div class="contact">
                                <a href="tel:01835862633" class="number">01835 862633</a>
                            </div>
                        </div>
                        <div class="item">
                            <p class="distance">37m</p>
                            <div class="info">
                                <h3 class="name">Sainsburys - Hamilton</h3>
                                <p class="address">
                                    5 Douglas Park Lane,<br />
                                    Hamilton,<br />
                                    ML3 0DF
                                </p>
                            </div>
                            <div class="contact">
                                <a href="tel:01698424665" class="number">01698 424665</a>
                            </div>
                        </div>
                        <div class="item">
                            <p class="distance">38m</p>
                            <div class="info">
                                <h3 class="name">Sainsburys - Edinburgh Longstone</h3>
                                <p class="address">
                                    Inglis Green Road,<br />
                                    Edinburgh,<br />
                                    EH14 2ER
                                </p>
                            </div>
                            <div class="contact">
                                <a href="tel:01315286200" class="number">0131 5286200</a>
                            </div>
                        </div>                        
                        <div class="item">
                            <p class="distance">41m</p>
                            <div class="info">
                                <h3 class="name">Sainsburys - Blackhall</h3>
                                <p class="address">
                                    185 Craigleith Road,<br />
                                    Edinburgh,<br />
                                    EH4 2EB
                                </p>
                            </div>
                            <div class="contact">
                                <a href="tel:01313320704" class="number">0131 332 0704</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>