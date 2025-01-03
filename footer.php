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
                    $('<div class="restricted-message-wrapper"><p class="restricted-message">We are currently unable to deliver to Scottish Highlands & Islands including the following postcodes: <br/>Aberdeen: AB31-AB35, AB41-AB54 <br/>Argyll: FK17-FK21, KA28, PA20-PA78, PH30-PH31, PH34-PH44, PH49-PH50 <br/>Arran: KA27 <br/>Dundee: PH15-PH18 <br/>Isle of Man: IM1-IM9 <br/>Isle of Wight: PO30-PO41 <br/>Northern Highlands: AB36-AB38, AB55-AB56, HS1-HS9, IV1-IV63, KW0-KW14, PH19-PH39, PH32-PH33, PH45-PH48 <br/>Orkney Shetland: KW15-KW18, ZE1-ZE4</p></div>').insertAfter('.cart_totals');
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
                if ( $('.woocommerce-shipping-methods li').length ) {
                    $('.wc-proceed-to-checkout').show();
                }
                else {
                    $('.wc-proceed-to-checkout').hide();
                }

                // hide/show proceed to checkout extended
                var shippingMessage = $('.woocommerce-shipping-destination').text().trim();
                if ( shippingMessage.includes("Shipping options") ) {
                    $('.wc-proceed-to-checkout').hide();
                }
                else {
                    $('.wc-proceed-to-checkout').show();
                }

                // minimum and maximum order amount validation
                var minMaxError = $('.woocommerce-error').text().trim();
                if ( minMaxError.includes("minimum") ) {
                    $('.wc-proceed-to-checkout').css('display','none');
                }
                else if ( minMaxError.includes("order values of over") ) {
                    $('.wc-proceed-to-checkout').css('display','none');
                }
                else {
                    $('.wc-proceed-to-checkout').css('display','block');
                }
            });

            $(window).on('load', function() {
                // hide/show proceed to checkout extended
                var shippingMessage = $('.woocommerce-shipping-destination').text().trim();
                if ( shippingMessage.includes("Shipping options") ) {
                    $('.wc-proceed-to-checkout').hide();
                }
                else {
                    $('.wc-proceed-to-checkout').show();
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

                // hide/show proceed to checkout extended
                var shippingMessage = $('.woocommerce-shipping-destination').text().trim();
                if ( shippingMessage.includes("Shipping options") ) {
                    $('.wc-proceed-to-checkout').hide();
                }
                else {
                    $('.wc-proceed-to-checkout').show();
                }

                // hide/show proceed to checkout button
                if ( $('.woocommerce-shipping-methods li').length ) {
                    $('.wc-proceed-to-checkout').show();
                }
                else {
                    $('.wc-proceed-to-checkout').hide();
                }

                // minimum and maximum order amount validation
                var minMaxError = $('.woocommerce-error').text().trim();
                if ( minMaxError.includes("minimum") ) {
                    $('.wc-proceed-to-checkout').css('display','none');
                }
                else if ( minMaxError.includes("order values of over") ) {
                    $('.wc-proceed-to-checkout').css('display','none');
                }
                else {
                    $('.wc-proceed-to-checkout').css('display','block');
                }

                // minimum anx maximum order amount - on update cart
                var minAmount = 10;
                var maxAmount = 250;
                var totalAmount = $('.cart-subtotal .amount').text();
                var total = totalAmount.replace(/^[£]+/,"").replace(",","").replace(".00","");

                if ( total < minAmount ) {
                    $('.woocommerce-error').each(function() {
                        if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                            $(this).remove();
                        }
                    });
                    setTimeout(() => {
                        $('<ul class="woocommerce-error" role="alert"><li>Your current order total is '+totalAmount+' — you must have an order with a minimum of £10.00 to place your order.</li></ul>').insertAfter('.woocommerce-notices-wrapper');
                    }, 100);
                }
                else if ( total > maxAmount ) {
                    $('.woocommerce-error').each(function() {
                        if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                            $(this).remove();
                        }
                    });
                    $('<ul class="woocommerce-error" role="alert"><li>Your order value is '+totalAmount+'. We do not currently accept online order values of over £250.00.</li></ul>').insertAfter('.woocommerce-notices-wrapper');
                }
                else {
                    $('.woocommerce-error').each(function() {
                        if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                            $(this).remove();
                        }
                    });
                }
            });
        </script>
    <?php } ?>

    <!-- Checkout Page -->
    <?php if ( is_page( 'checkout' ) || is_checkout() ) { ?>
        <script>
            var $ = jQuery;
            // add the restricted shipping zone message
            $(document).ready(function() {
                if ( $('.woocommerce-checkout-review-order').length ) {
                    $('<div class="restricted-message-wrapper"><p class="restricted-message">We are currently unable to deliver to Scottish Highlands & Islands including the following postcodes: <br/>Aberdeen: AB31-AB35, AB41-AB54 <br/>Argyll: FK17-FK21, KA28, PA20-PA78, PH30-PH31, PH34-PH44, PH49-PH50 <br/>Arran: KA27 <br/>Dundee: PH15-PH18 <br/>Isle of Man: IM1-IM9 <br/>Isle of Wight: PO30-PO41 <br/>Northern Highlands: AB36-AB38, AB55-AB56, HS1-HS9, IV1-IV63, KW0-KW14, PH19-PH39, PH32-PH33, PH45-PH48 <br/>Orkney Shetland: KW15-KW18, ZE1-ZE4</p></div>').insertAfter('.woocommerce-checkout-review-order');
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

            // minimum and maximum order amount validation
            $(document).ready(function() {
                var minAmount = 10;
                var maxAmount = 250;
                var totalAmount = $('.cart-subtotal .amount').text();
                var total = totalAmount.replace(/^[£]+/,"").replace(",","").replace(".00","");

                if ( total < minAmount ) {
                    $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                    $('<div class="min-max-error"><p class="min-max-message">Your current order total is £'+total+ '— you must have an order with a minimum of £10.00 to place your order.</p></div>').insertAfter('.woocommerce-checkout-review-order');
                    setTimeout(() => {
                        $('.min-max-error').addClass('min-max-error-show');
                    }, 100);
                }
                else if ( total > maxAmount ) {
                    $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                    $('<div class="min-max-error"><p class="min-max-message">Your order value is £'+total+ '. We do not currently accept online order values of over £250.00.</p></div>').insertAfter('.woocommerce-checkout-review-order');
                    setTimeout(() => {
                        $('.min-max-error').addClass('min-max-error-show');
                    }, 100);
                }
                else {
                    $('.woocommerce-checkout.woocommerce-page').removeClass('min-max-show');
                    if ( $('.min-max-error').length ) {
                        $('.min-max-error').removeClass('min-max-error-show');
                    }
                }

                $('body').on('updated_cart_totals', function() {
                    var minAmount = 10;
                    var maxAmount = 250;
                    var totalAmount = $('.cart-subtotal .amount').text();
                    var total = totalAmount.replace(/^[£]+/,"").replace(",","").replace(".00","");

                    if ( total < minAmount ) {
                        $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                        setTimeout(() => {
                            $('.min-max-error').addClass('min-max-error-show');
                        }, 100);
                    }
                    else if ( total > maxAmount ) {
                        $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                        setTimeout(() => {
                            $('.min-max-error').addClass('min-max-error-show');
                        }, 100);
                    }
                    else {
                        $('.woocommerce-checkout.woocommerce-page').removeClass('min-max-show');
                        if ( $('.min-max-error').length ) {
                            $('.min-max-error').removeClass('min-max-error-show');
                        }
                    }
                });
            });
        </script>
    <?php } ?>
</body>
</html>