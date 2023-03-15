    <div class="footer-main">
        <div class="container">           
            <div class="social">
                <?php if( have_rows('social_media_item', 'option') ):
                    while( have_rows('social_media_item', 'option') ) : the_row();
                        $social_media_image = get_sub_field('social_media_image', 'option');
                        $social_media_link = get_sub_field('social_media_link', 'option'); ?>
                        <a href="<?php echo $social_media_link; ?>" target="_blank"><img src="<?php echo $social_media_image; ?>" alt=""></a>
                        <?php
                    endwhile;
                else :
                endif; ?>
            </div>
            <div class="copyright">
                <?php 
                    if( get_field('newsletter_display', 'option') == 'show' ) { ?>
                        <div class="newsletter">
                            <a href="<?php the_field('newsletter_url', 'option'); ?>" class="newsletter-button"><?php the_field('newsletter_text', 'option'); ?></a>
                        </div>
                    <?php }
                ?> 
                <p><?php the_field('copyright_text', 'option'); ?></p>
                <?php wp_nav_menu( array( 
                    'theme_location'    => 'footer_menu', 
                    'container'         => false,
                )); ?>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
	<script type="text/javascript" src="//static.klaviyo.com/onsite/js/klaviyo.js?company_id=UjgeTP" ></script>
</body>
</html>