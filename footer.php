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

    <!-- Cart Page -->
    <?php if ( is_page( 'cart' ) || is_cart() ) { ?>
        <script>
            var $ = jQuery;

            // add the restricted shipping zone message
            $(document).ready(function() {
                if ( $('.cart_totals').length ) {
                    $('<div class="restricted-message-wrapper"><p class="restricted-message">Apologies, the provided address is currently not within our delivery range. We only accept orders within the UK mainland - for orders outside this region, please contact the sales office.</p></div>').insertAfter('.cart_totals');
                }
            });

            $(document).ready(function() {
                // validate shipping zone on page load
                var shippingMethod = $('#shipping_method').text().trim();
                if ( shippingMethod.includes("Restricted Zone") ) {
                    // console.log("restricted zone");
                    $('body').addClass('restricted-zone');
                }
                else {
                    // console.log("UK Mainland");
                    $('body').removeClass('restricted-zone');
                }

                // hide/show proceed to checkout button
                if ( $('.woocommerce-shipping-methods').length ) {
                    $('.wc-proceed-to-checkout').show();
                }
                else {
                    $('.wc-proceed-to-checkout').hide();
                }
            });

            $('body').on('updated_cart_totals', function() {
                // console.log('updated_cart_totals triggered');
                
                // validate shipping zone on change address
                var shippingMethod = $('#shipping_method').text().trim();

                if ( shippingMethod.includes("Restricted Zone") ) {
                    // console.log("restricted zone");
                    $('body').addClass('restricted-zone');
                }
                else {
                    // console.log("UK Mainland");
                    $('body').removeClass('restricted-zone');
                }

                // hide/show proceed to checkout button
                if ( $('.woocommerce-shipping-methods').length ) {
                    $('.wc-proceed-to-checkout').show();
                }
                else {
                    $('.wc-proceed-to-checkout').hide();
                }
            });
        </script>
    <?php } ?>

    <!-- Checkout Page -->
    <?php if ( is_page( 'checkout' ) || is_checkout() ) { ?>
        <script>
            var $ = jQuery;
            // console.log("checkout - test");

            // add the restricted shipping zone message
            $(document).ready(function() {
                if ( $('.woocommerce-checkout-review-order').length ) {
                    $('<div class="restricted-message-wrapper"><p class="restricted-message">Apologies, the provided address is currently not within our delivery range. We only accept orders within the UK mainland - for orders outside this region, please contact the sales office.</p></div>').insertAfter('.woocommerce-checkout-review-order');
                }
            });

            // validate shipping zone on page load
            $(document).ready(function() {
                var shippingMethod = $('#shipping_method').text().trim();
                if ( shippingMethod.includes("Restricted Zone") ) {
                    // console.log("on load - restricted zone");
                    $('body').addClass('restricted-zone');
                }
                else {
                    // console.log("on load - UK Mainland");
                    $('body').removeClass('restricted-zone');
                }
            });

            // validate shipping zone on change address
            $('body').on('updated_checkout', function() {
                // console.log('updated_checkout triggered');

                var shippingMethod = $('#shipping_method').text().trim();

                if ( shippingMethod.includes("Restricted Zone") ) {
                    // console.log("restricted zone");
                    $('body').addClass('restricted-zone');
                }
                else {
                    // console.log("UK Mainland");
                    $('body').removeClass('restricted-zone');
                }
            });

            // validate shipping zone on change postcode
            $('#billing_postcode, #shipping_postcode').on('focusout, blur', function() {
                // console.log('updated_checkout triggered');
                $(document.body).trigger('update_checkout');
            });
        </script>
    <?php } ?>
</body>
</html>