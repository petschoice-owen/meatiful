<div class="top-navigation" style="background-image: url(<?php the_field('header_background', 'option'); ?>);">
    <div class="wrapper">
        <nav class="navbar navbar-expand-xl">
            <div class="container-fluid">
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
                    <div class="social-mobile">
                        <?php
                            if( have_rows('header_label', 'option') ):
                            while( have_rows('header_label', 'option') ) : the_row();
                                $phone_number = get_sub_field('phone_number', 'option');
                                ?>
                                <a href="tel:+<?php echo $phone_number; ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-phone.png" alt=""></a>
                                <?php
                            endwhile;
                            else :
                            endif;
                        ?>
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
                </div>
            </div>
        </nav>
    </div>
    <div class="buy-online">
        <div class="buy-online-content">
            <?php
                if( have_rows('header_label', 'option') ):
                while( have_rows('header_label', 'option') ) : the_row();
                    $button_text = get_sub_field('button_text', 'option');
                    $button_link = get_sub_field('button_link', 'option');
                    $phone_number = get_sub_field('phone_number', 'option');
                    ?>
                    <a href="<?php echo $button_link; ?>" class="btn-brown"><?php echo $button_text; ?></a>
                    <a href="tel:+<?php echo $phone_number; ?>" class="dashed"><?php echo $phone_number; ?></a>
                    <?php
                endwhile;
                else :
                endif;
            ?>
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
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/torn-bottom.png" class="torn-bottom" alt="" >
    </div>
</div>