<div class="row filter-result-item">
    <div class="col-12 col-md-5 item-img-wrap" style="background:#fafafa;">
        <a target="_blank" href="<?php echo get_permalink(); ?>">
        <?php
            if( get_field('gk_img_main') ){
                $main_img = get_field('gk_img_main');
                echo wp_get_attachment_image($main_img, 'catalog-thumbs', false, array('class' => 'img-fluid'));
            }
        ?>
        </a>
        <div class="item-abs-fav">
            <?php echo do_shortcode('[favorite_button]'); ?>
        </div>
    </div> <!-- //.col -->
    <div class="col-12 col-md-7 item-info-wrap">
        <div>
            <!-- <p><?php echo get_the_date() ." " . get_the_time();  ?></p> -->
            <h3 class="item-title">
                <a href="<?php echo get_permalink(); ?>" target="_blank">
                    <?php the_title(); ?>
                </a>
            </h3>
            <div class="item-short-info">
                Жилой комплекс
            </div> <!-- //. -->
        </div>

        <?php if(get_field('gk_location')): ?>
        <div class="item-location">
            <span>
                <a href="<?php echo get_permalink(); ?>" target="_blank" class="link-default">
                    <?php the_field('gk_location'); ?>
                </a>
            </span>
        </div> <!-- //.item-location -->
        <?php endif; ?>

        <div class="item-short-description">
            <?php echo wp_trim_words(get_field('gk_about'), 65, "..."); ?>
        </div> <!-- //.item-short-description -->
        <div>
            <?php //echo get_the_author_meta('ID'); echo get_current_user_id(); ?>
            <a target="_blank" href="<?php echo get_permalink(); ?>" class="btn btn-default d-inline-block">Посмотреть</a>
            <?php if(is_super_admin()) : ?>

                <a href="<?php echo add_query_arg(["edit" => get_the_ID()], '/addgk/'); ?>" class="link-default ml-md-5 d-inline-block">Редактировать объявление</a>
            <?php endif; ?>
        </div>
    </div> <!-- //.col -->
</div>