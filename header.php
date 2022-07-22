<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Shop Meatiful sausages here in three delicious flavours. Our single source protein sausages are an excellent raw dog food alternative!" />
    <meta name="author" content="Pets Choice" />
    <meta name="format-detection" content="telephone=no" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png">
    <!-- <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title> -->
    <title>
        <?php if (is_front_page()) {
            bloginfo('name'); ?> | <?php bloginfo('description');
        } else {
            wp_title('');
        } ?>
    </title>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" />
	<?php wp_head(); ?>
</head>