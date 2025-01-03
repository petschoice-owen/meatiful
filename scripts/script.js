var $ = jQuery;

// top-navigation function
var windowScrolled = () => {
    function checkScroll() {
        if ($(window).scrollTop() >= 50) {
            $(".top-navigation").addClass("scrolled");
        } else {
            $(".top-navigation").removeClass("scrolled");
        }
    }

    // function checkWPadmin() {
    //     if ($("#wpadminbar").length) {
    //         var wpAdminBar = $("#wpadminbar").height();

    //         $(".top-navigation").css("top",wpAdminBar+"px");
    //     }
    // }

    $(document).ready(function() {
        checkScroll();
        // checkWPadmin();
        $(window).scroll(checkScroll);
    });
}
  
// slider function
var customSlider = () => {
    if ($(".custom-slider").length) {
        $('.custom-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            // autoplay: false,
            autoplaySpeed: 3000,
            dots: false,
            infinite: true,
            speed: 1500,
            dots: false,
            prevArrow: false,
            nextArrow: false,
            // swipe: false,
            swipe: true,
			pauseOnHover: false,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        speed: 500,
                        fade: true,
                        cssEase: 'linear',
                    }
                }
            ]
        });
    }  
}
  
// home page - parallax auto margin-top
var parallaxMargin = () => {
    var topNavHeight = $(".top-navigation").height();
  
    if ($(".page-home").length) {
        if ($("body").hasClass("admin-bar")) {
            var heroHeight = $(".hero").outerHeight();
            var topNavHeightAdjusted = $(".top-navigation").offset().top;
            var autoHeight = topNavHeightAdjusted + heroHeight - 5;

            if ($(window).width() < 783) {
                if ($(window).width() < 768) {
                    var autoHeightMobile = topNavHeightAdjusted + heroHeight - 40;
    
                    $(".page-home").css("margin-top", autoHeightMobile+"px");
                }

                else {
                    var autoHeightTab = topNavHeightAdjusted + heroHeight - 20;
    
                    $(".page-home").css("margin-top", autoHeightTab+"px");
                }
            }

            else {
                $(".page-home").css("margin-top", autoHeight+"px");
                // console.log("heroHeight: "+heroHeight);
                // console.log("topNavHeightAdjusted: "+topNavHeightAdjusted);
                // console.log("autoHeight: "+autoHeight);
            }
        }

        else {
            var heroHeight = $(".hero").outerHeight();
            var autoHeight = topNavHeight + heroHeight - 5;

            $(".page-home").css("margin-top", autoHeight+"px");
        }
    }
  
    else {
        $("main").css("margin-top", topNavHeight+"px");
    }
}
  
// masonry function
function checkForOverlappingItems() {
  const items = document.querySelectorAll('.grid-item');
  
  // Loop through items and check their positions
  for (let i = 0; i < items.length - 1; i++) {
    const currentItem = items[i];
    const nextItem = items[i + 1];
    
    // Get bounding boxes of the two elements
    const currentRect = currentItem.getBoundingClientRect();
    const nextRect = nextItem.getBoundingClientRect();
    
    // Check if the items are vertically overlapping
    if (currentRect.bottom > nextRect.top && currentRect.top < nextRect.bottom) {
      return true;
    }
  }
  
  return false; // No overlap detected
}
function checkLayoutOnScroll($grid) {
  if (checkForOverlappingItems()) {
    $grid.masonry('layout');
  } else {
  }
}
// Debounce function to limit the rate at which layout recalculation happens
function debounce(func, wait, immediate) {
  let timeout;
  return function() {
    const context = this;
    const args = arguments;
    clearTimeout(timeout);
    timeout = setTimeout(function() {
      func.apply(context, args);
    }, wait);
  };
}
var masonry = () => {
    if ($(".masonry .grid-item").length) {
        var $grid = $('.grid').masonry({
            itemSelector: '.grid-item',
			percentPosition: true,
			fitWidth: true
        });
		$grid.imagesLoaded().progress( function() {
			$grid.masonry('layout');
		});
		window.addEventListener('scroll', debounce(function() {
		  checkLayoutOnScroll($grid); // Check and fix layout on scroll
		}, 200));
	}  
}

// product form show on load
var productForm = () => {
    setTimeout(() => {
        if ($(".variations_form").length) {
            $(".variations_form").css("opacity","1");
        }
    }, 100);
}

// product quantity function
var productQuantity = () => {
    if ($(".qty-input").length) {
        $('.increment-btn').click(function (e) {
            e.preventDefault();
        
            var inc_value = $(this).closest('.product-quantity').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 99) {
                value++;
                $(this).closest('.product-quantity').find('.qty-input').val(value);

                var newQuantity = $("#qty_display").val();

                $(".variation-quantity .quantity .input-text.qty.text").val(newQuantity);
            }
        });
        
        $('.decrement-btn').click(function (e) {
            e.preventDefault();
        
            var dec_value = $(this).closest('.product-quantity').find('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).closest('.product-quantity').find('.qty-input').val(value);

                var newQuantity = $("#qty_display").val();

                $(".variation-quantity .quantity .input-text.qty.text").val(newQuantity);
            }
        });
    }
}
  
// product tabs function
var productTabs = () => {
    if ($(".product-tabs").length) {
        if ($(window).width() < 768) {
            // show current active tab
            $(".product-tabs .tab-pane").each(function() {
            if ($(this).hasClass("show")) {
                $(this).addClass("show-content");
                $(this).find(".title").addClass("active");
            }
            });
    
            $(".tab-title-mobile").each(function() {
                $(this).click(function(e) {
                    e.preventDefault();
        
                    if ($(this).parent().hasClass("active")) {
                        $(".tab-pane").removeClass("show active show-content");
                        setTimeout(() => {
                            $(".tab-pane .title").removeClass("active");
                            $(this).parent().removeClass("active");
                            $(this).closest(".tab-pane").removeClass("show active show-content");
                        }, 100);
                    } else {
                        $(".tab-pane").removeClass("show active show-content");
                        setTimeout(() => {
                            $(this).closest(".tab-pane").addClass("show active show-content");
                            $(this).parent().addClass("active");
                        }, 100);
                    }
        
                    var tabTitleMobile = $(this).text();
        
                    $(".product-tabs .nav-item").each(function() {
                        var navTab = $(this).find("button");
                        var navTabTitle = navTab.text();
            
                        $(".product-tabs .nav-link").removeClass("active").attr("aria-selected","false");
            
                        if (navTabTitle == tabTitleMobile) {
                            setTimeout(() => {
                            navTab.addClass("active").attr("aria-selected","true");;
                            }, 100);
                        }
                    });
                });
            });
        }
    }  
}

// product show price depending on the variation
var productPriceVariation = () => {
    if ($(".variations.size #size option").length > 1) {
        $('.price').eq(1).show();
    }

    else {
        $('.price').eq(0).show();
    }
}

// product custom price function - default
var productCustomPriceDefault = () => {
    setTimeout(() => {
        if ($("#woocommerce_variation_price").length) {
            var defaultPrice = $("#woocommerce_variation_price").text();

            if (!defaultPrice == "") {                
                $("#meatiful_custom_price").text(defaultPrice);
            }
        }
    }, 100);
}
// product custom price function - on size change - dropdown
var productCustomPriceDropdown = () => {
    setTimeout(() => {
        if ($("#woocommerce_variation_price").length) {
            $(".variations_form.cart #size").on("change", function() {
                productCustomPriceDefault();
            });
        }
    }, 100);
}

// product - change product image on size change
var productImageChange = () => {
    if ($("form.variations_form").length) {
        $("form.variations_form select#size").on('change', function() {
            if ( $("form.variations_form select#size")[0].selectedIndex === 0 ) {
                var firstImageSrc = $(".woocommerce-product-gallery .thumbnails .thumbnail:nth-child(1) img").attr("src");
                $(".woocommerce-product-gallery__image:first-child img").attr("src", firstImageSrc);
            }

            else {
                var secondImageSrc = $(".woocommerce-product-gallery .thumbnails .thumbnail:nth-child(3) img").attr("src");
                $(".woocommerce-product-gallery__image:first-child img").attr("src", secondImageSrc);
            }
        });
    }
}

// product option remove option - "Choose an option"
var removeDefaultOption = () => {
    if ($(".variations_form.cart #size option").length) {
        $(".variations_form.cart #size option").each(function() {
            if ($(this).val() == "") {
                $(this).remove();
            }
        });
    }
}

// product page - hover title function
var productWooCommerce = () => {
    if ($(".single-product .woocommerce-product-gallery__image img").length) {
        var productImage = $(".single-product .woocommerce-product-gallery__image img");

        // auto add image title
        productImage.each(function() {
            var productTitle = $(this).attr("alt");
            $(this).attr("title", productTitle);
        });

        // change preview image when clicking on product thumbnails
        productImage.each(function() {
            $(this).click(function() {
                var selectedProduct = $(this).attr("src");
                setTimeout(() => {
                    $(".woocommerce-product-gallery__image:first-child img").attr("src", selectedProduct);
                }, 100);
            })
        });        
    }
}

// checkout page - order overview - check number of li
var checkoutOrderLi = () => {
    if ($(".woocommerce-thankyou-order-details").length) {
        var liCount = $(".woocommerce-thankyou-order-details li").length

        $(".woocommerce-thankyou-order-details").addClass("woocommerce-thankyou-order-details-list-"+ liCount);
    }
}

// pop-up functions
var popUp = () => {
    if(typeof window.localStorage !== "undefined" && !localStorage.getItem('visited')) {
        // Set visited flag in local storage
        localStorage.setItem('visited', true);
        // Alert the user
        if ($("#pop_up").length) {
            $("html").addClass("pop-up-show");
            $("#pop_up").fadeIn();

            $(".pop-up-close").click(function() {
                $("html").removeClass("pop-up-show");
                $(this).closest(".pop-up").fadeOut();
            });
        }   
    }
}

// contact form 7 adjustments
var contactForm7 = () => {
    if ($(".wpcf7-spinner").length) {
        $(".wpcf7-spinner").each(function() {
            $(this).remove();
        });
    }
}

// for preview purposes - stockists page
var stockists = () => {
    if ($(".page-stockists").length) {
        $("#search_input").on('keyup', function() {
            var input, filter, ul, li, span, i, txtValue;
            input = document.getElementById("search_input");
            filter = input.value.toUpperCase();
            ul = document.getElementById("search_results_items");
            li = ul.getElementsByTagName("li");
    
            for (i = 0; i < li.length; i++) {
                span = li[i].getElementsByTagName("span")[0];
                txtValue = span.textContent || span.innerText;
    
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }

            if ($(this).val()) {
                $("#search_text").css("display","none");
                $("#search_results").removeClass("d-none").css("display", "block");

                if ($("#search_results_items .item").length === $("#search_results_items .item[style='display: none;']").length ) {
                    $("#search_results").css("display","none");
                    $("#search_results_none").removeClass("d-none").css("display", "block");
                }

                else {
                    $("#search_results_none").css("display","none");
                    $("#search_results").removeClass("d-none").css("display", "block");
                }
            }

            else {
                $("#search_results").css("display","none");
                $("#search_results_none").css("display","none");
                $("#search_text").css("display", "block");

                if ($(this).val() == "") {
                    $("#search_results").css("display","none");
                }
            }
        });

        $("#search_results_items .contact .number").each(function(){
            var formatNumber = $(this).text().replace(/\s/g, '').replace(/[^a-zA-Z0-9]/g, '');
            $(this).attr("href","tel:"+formatNumber);
        });

        $(document).keypress(function(event) {
            if (event.which == '13') {
                event.preventDefault();
            }
        });

        $("#search_stockist").on('click', function(e) {
            e.preventDefault();
        });
    }
}

// top navigation - telephone number add "tel:"
var topNavTelephone = () => {
    if ($(".buy-online-content .phone-number").length) {
        var phoneNumber = $(".buy-online-content .phone-number").attr("href");
        var formatNumber = phoneNumber.replace(/\s+/g,"");

        $(".buy-online-content .phone-number").attr("href", formatNumber);
    }

    if ($(".social-mobile .phone-number").length) {
        var phoneNumber = $(".social-mobile .phone-number").attr("href");
        var formatNumber = phoneNumber.replace(/\s+/g,"");

        $(".social-mobile .phone-number").attr("href", formatNumber);
    }
}

  
// initialize the functions
windowScrolled();
  
$(document).ready(function() {
    // parallaxMargin();
    customSlider();
    productQuantity();
    productTabs();
    contactForm7();
    checkoutOrderLi();
    topNavTelephone();
});
  
$(window).resize(function() {
    // parallaxMargin();
    productTabs();
	if($('.custom-slider').length > 0) {
		$('.custom-slider')[0].slick.refresh();
	}
});
  
window.onload = function() {
    masonry();
    stockists();
    // popUp();
    contactForm7();
    productWooCommerce();
    productPriceVariation();
    // removeDefaultOption();
    productCustomPriceDefault();
    productCustomPriceDropdown();
    productForm();
    productImageChange();
}
  