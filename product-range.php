<section class="product-range">
    <div class="container">
        <?php
            if( have_rows('product_range', 'option') ):
            while( have_rows('product_range', 'option') ) : the_row();
                $section_title = get_sub_field('section_title', 'option');
                ?>
                <h2 class="heading heading-center"><?php echo $section_title; ?></h2>
                <?php
                    if( have_rows('buttons', 'option') ): ?>
                        <div class="items">
                            <?php while( have_rows('buttons', 'option') ) : the_row();
                                $button_name = get_sub_field('button_name', 'option');
                                $button_link = get_sub_field('button_link', 'option');
                                ?>
                                    <a href="<?php echo $button_link; ?>" class="btn-brown arrow-right"><?php echo $button_name; ?></a>
                                <?php
                            endwhile;
                            else : ?>
                        </div>
                    <?php endif;
                ?>
                <?php
            endwhile;
            else :
            endif;
        ?>
    </div>
</section>