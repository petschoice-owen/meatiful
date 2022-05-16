    <div class="footer-main">
        <div class="container">
            <div class="social">
                <?php
                    if( have_rows('social_media_item', 'option') ):
                    while( have_rows('social_media_item', 'option') ) : the_row();
                        $social_media_image = get_sub_field('social_media_image', 'option');
                        $social_media_link = get_sub_field('social_media_link', 'option');
                        ?>
                        <a href="<?php echo $social_media_link; ?>"><img src="<?php echo $social_media_image; ?>" alt=""></a>
                        <?php
                    endwhile;
                    else :
                    endif;
                ?>
            </div>
            <div class="copyright">
                <p><?php the_field('copyright_text', 'option'); ?></p>
                <?php wp_nav_menu( array( 
                    'theme_location'    => 'footer_menu', 
                    'container'         => false,
                )); ?>
            </div>
        </div>
    </div>
    <div id="pop_up" class="pop-up">
        <div class="pop-up-wrapper">
            <div class="pop-up-content">
                <div class="wrapper">
                    <span class="pop-up-close"></span>
                    <h5 class="text-center">SIGN UP FOR THE LATEST NEWS AND OFFERS FROM MEATIFUL AND RECEIVE</h5>
                    <h2 class="text-center pop-up-title pop-up-title-dashed">10% OFF YOUR NEXT ORDER!</h2>
                    <form action="">
                        <div class="input-wrapper">
                            <input type="email" class="pop-up-input" placeholder="Email Address">
                        </div>
                        <div class="input-wrapper">
                            <input type="text" class="pop-up-input" placeholder="First Name">
                        </div>
                        <div class="input-wrapper">
                            <input type="text" class="pop-up-input" placeholder="Last Name">
                        </div>
                        <div class="input-wrapper checkbox-wrapper">
                            <label for="pop_up_subscribe">
                                Sign up for the latest news, products and more!
                                <input type="checkbox" class="pop-up-checkbox d-non" id="pop_up_subscribe" name="pop-up-checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="button-wrapper">
                            <input type="submit" class="pop-up-button" value="Sign Up">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
    <!-- move this to the <head> below the last <link> when integrating to WordPress -->
    <!-- <script src="scripts/vendors/lazyload.min.js"></script>  -->
</body>
</html>