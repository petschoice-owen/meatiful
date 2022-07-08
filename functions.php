<?php
/*-----------------------------------------------------------------------------------*/
/* This file will be referenced every time a template/page loads on your Wordpress site
/* This is the place to define custom fxns and specialty code
/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
// define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;


/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'header_menu'	=>	__( 'Header Menu', 'blank' ), // Register the Header menu
		'footer_menu'	=>	__( 'Footer Menu', 'blank' ), // Register the Footer menu
	)
);


/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
/*
	function theme_register_sidebars() {
		register_sidebar(array(				// Start a series of sidebars to register
			'id' => 'sidebar', 					// Make an ID
			'name' => 'Sidebar',				// Name it
			'description' => 'Take it on the side...', // Dumb description for the admin side
			'before_widget' => '<div>',	// What to display before each widget
			'after_widget' => '</div>',	// What to display following each widget
			'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
			'after_title' => '</h3>',		// What to display following each widget's title
			'empty_title'=> '',					// What to display in the case of no title defined for a widget
			// Copy and paste the lines above right here if you want to make another sidebar, 
			// just change the values of id and name to another word/name
		));
	} 
	// adding sidebars to Wordpress (these are created in functions.php)
	add_action( 'widgets_init', 'theme_register_sidebars' );
*/


/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/
function theme_scripts()  { 
	// enqueue css files
	wp_enqueue_style('main', get_template_directory_uri() . '/styles/main.min.css');
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');

	// enqueue js files
	wp_enqueue_script('jquery', get_template_directory_uri() . '/scripts/vendors/jquery.min.js');
	wp_enqueue_script('popper', get_template_directory_uri() . '/scripts/vendors/popper.min.js');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/scripts/vendors/bootstrap.min.js');
	wp_enqueue_script('slick', get_template_directory_uri() . '/scripts/vendors/slick.min.js');
	wp_enqueue_script('masonry', get_template_directory_uri() . '/scripts/vendors/masonry.pkgd.min.js');
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/scripts/script.js');
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header



/*-----------------------------------------------------------------------------------*/
/* PHP code for SVG support In WordPress
/*-----------------------------------------------------------------------------------*/
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  
}, 10, 4 );
  
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );
  
function fix_svg() {
	echo '<style type="text/css">
		.attachment-266x266, .thumbnail img {
			width: 100% !important;
			height: auto !important;
		}
	</style>';
}
add_action( 'admin_head', 'fix_svg' );


/*-----------------------------------------------------------------------------------*/
/* Advanced Custom Fields Modifications - Resize WYSIWYG Editor
/*-----------------------------------------------------------------------------------*/
function PREFIX_apply_acf_modifications() { ?>
	<style>
		.acf-editor-wrap iframe {
			min-height: 0;
		}
	</style>
	<script>
		(function($) {
			// (filter called before the tinyMCE instance is created)
			acf.add_filter('wysiwyg_tinymce_settings', function(mceInit, id, $field) {
				// enable autoresizing of the WYSIWYG editor
				mceInit.wp_autoresize_on = true;
				return mceInit;
			});
			// (action called when a WYSIWYG tinymce element has been initialized)
			acf.add_action('wysiwyg_tinymce_init', function(ed, id, mceInit, $field) {
				// reduce tinymce's min-height settings
				ed.settings.autoresize_min_height = 100;
				// reduce iframe's 'height' style to match tinymce settings
				$('.acf-editor-wrap iframe').css('height', '100px');
			});
		})(jQuery)
	</script>
<?php }
add_action('acf/input/admin_footer', 'PREFIX_apply_acf_modifications');


/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Type News
/*-----------------------------------------------------------------------------------*/
function create_news_cpt() {
	$labels = array(
		'name' => _x( 'News', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'News', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'News', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'News', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'News Archives', 'textdomain' ),
		'attributes' => __( 'News Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent News:', 'textdomain' ),
		'all_items' => __( 'All News', 'textdomain' ),
		'add_new_item' => __( 'Add New News', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New News', 'textdomain' ),
		'edit_item' => __( 'Edit News', 'textdomain' ),
		'update_item' => __( 'Update News', 'textdomain' ),
		'view_item' => __( 'View News', 'textdomain' ),
		'view_items' => __( 'View News', 'textdomain' ),
		'search_items' => __( 'Search News', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into News', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this News', 'textdomain' ),
		'items_list' => __( 'News list', 'textdomain' ),
		'items_list_navigation' => __( 'News list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter News list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'News', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-aside',
		'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'news', $args );
}
add_action( 'init', 'create_news_cpt', 0 );


/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Type Stockists
/*-----------------------------------------------------------------------------------*/
// Register Custom Post Type Stockist
function create_stockist_cpt() {
	$labels = array(
		'name' => _x( 'Stockists', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Stockist', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Stockists', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Stockist', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Stockist Archives', 'textdomain' ),
		'attributes' => __( 'Stockist Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Stockist:', 'textdomain' ),
		'all_items' => __( 'All Stockists', 'textdomain' ),
		'add_new_item' => __( 'Add New Stockist', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Stockist', 'textdomain' ),
		'edit_item' => __( 'Edit Stockist', 'textdomain' ),
		'update_item' => __( 'Update Stockist', 'textdomain' ),
		'view_item' => __( 'View Stockist', 'textdomain' ),
		'view_items' => __( 'View Stockists', 'textdomain' ),
		'search_items' => __( 'Search Stockist', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Stockist', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Stockist', 'textdomain' ),
		'items_list' => __( 'Stockists list', 'textdomain' ),
		'items_list_navigation' => __( 'Stockists list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Stockists list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Stockist', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-location',
		'supports' => array('title', 'thumbnail', 'revisions', 'custom-fields', 'author', 'revisions'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'stockists', $args );
}
add_action( 'init', 'create_stockist_cpt', 0 );


/*-----------------------------------------------------------------------------------*/
/* Advanced Custom Fields - Add Theme Settings
/*-----------------------------------------------------------------------------------*/
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header',
		'menu_title'	=> 'Header Section',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer',
		'menu_title'	=> 'Footer Section',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Media',
		'menu_title'	=> 'Social Media',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'News Page',
		'menu_title'	=> 'News Page',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Single News - Post',
		'menu_title'	=> 'Single News - Post',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> '404 Page',
		'menu_title'	=> '404 Page',
		'parent_slug'	=> 'general-settings',
	));
}


/*-----------------------------------------------------------------------------------*/
/* Admin Panel - add Featured Image Column
/*-----------------------------------------------------------------------------------*/
// add_filter('manage_posts_columns', 'add_img_column');
// add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);

// function add_img_column($columns) {
//     $columns['img'] = 'Featured Image';
//     return $columns;
// }

// function manage_img_column($column_name, $post_id) {
//     if( $column_name == 'img' ) {
//         echo get_the_post_thumbnail($post_id, 'thumbnail');
//     }
//     return $column_name;
// }


/*-----------------------------------------------------------------------------------*/
/* WooCommerce - Single Product Page Customization
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'woocommerce' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );


/*-----------------------------------------------------------------------------------*/
/* WooCommerce - Remove "Choose an option" in dropdown menus
/*-----------------------------------------------------------------------------------*/
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'filter_dropdown_option_html', 12, 2 );
function filter_dropdown_option_html( $html, $args ) {
	$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' );
	$show_option_none_html = '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
	$html = str_replace($show_option_none_html, '', $html);
	return $html;
}



/*-----------------------------------------------------------------------------------*/
/*  Hide shipping rates when free shipping is available.
/*  Updated to support WooCommerce 2.6 Shipping Zones.
/*-----------------------------------------------------------------------------------*/
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );