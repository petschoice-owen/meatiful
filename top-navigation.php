<div class="top-navigation" style="background-image: url(<?php the_field('header_background', 'option'); ?>);">
    <div class="wrapper">
        <nav class="navbar navbar-expand-xl">
            <div class="container-fluid">
                <div class="responsive-login">
                    <a href="/my-account" class="user" title="Login"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-user.png" alt="" /></a>
                    <div class="cart-holder">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-cart.png" class="icon-cart" alt="" />
                        <?php echo do_shortcode("[woo_cart_but]"); ?>
                    </div>
                </div>
                <div class="logo-bg">
                    <img src="<?php the_field('header_logo_background', 'option'); ?>" alt="" >
                </div>
                <a href="/" class="logo-link">
                    <img src="<?php the_field('header_logo', 'option'); ?>" class="logo-image lazyload" alt="" >
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php wp_nav_menu( array( 
                        'theme_location'    => 'header_menu', 
                        'container'         => false,
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'menu_class'        => 'navbar-nav'
                    )); ?>
                </div>
            </div>
        </nav>
    </div>
    <div class="buy-online">
        <div class="buy-online-content">
            <div class="login">
                <a href="/my-account" class="user" title="Login"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-user.png" alt="" /></a>
                <div class="cart-holder">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-cart-black.png" class="icon-cart" alt="" />
                    <?php echo do_shortcode("[woo_cart_but]"); ?>
                </div>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/torn-bottom.png" class="torn-bottom" alt="" >
    </div>
    <div class="free-delivery">
        <div class="free-delivery-content">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-truck.png" class="icon-truck" alt="" />
            <p>free delivery over £35</p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/torn-bottom.png" class="torn-bottom" alt="" />
    </div>
</div>