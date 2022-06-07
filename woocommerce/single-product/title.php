<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<h2 class="name">
	<?php if( get_field('product_name_bold') ): ?>
		<span class="default"><?php the_field('product_name_bold'); ?></span>
	<?php endif; ?>
	<?php if( get_field('product_name_italic') ): ?>
		<span class="styled"><?php the_field('product_name_italic'); ?></span>
	<?php endif; ?>
</h2>


<?php // force hide WooCommerce default product title
	// the_title( '<h1 class="product_title entry-title">', '</h1>' ); 
?>