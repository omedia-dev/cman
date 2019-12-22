<div class="row filter-result-item">
    <div class="col-12 col-md-5 item-img-wrap item-img-wrap--new">
        <a class="item-img-link" target="_blank" href="<?php echo get_permalink(); ?>">
            <?php
            if( get_field('dom-gallery-type') == "url" ){
                echo '<img src="' . get_field('kvinjk-url') . '" alt="Изображение" class="img-fluid">';
            } else {
                $main_img = get_field('kvinjk-img');
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
            <h3 class="item-title"><h3 class="item-title">
                <a href="<?php echo get_permalink(); ?>" target="_blank">
                    <?php the_title(); ?>
                </a>
            </h3>
            </h3>
            <div class="item-short-info">
                <?php
                    //3-х комн. кв., 98м<sup>2</sup>, 6/31 этаж
                    $line1Text = get_field('dom-rooms') . "-комн квартира, " .
                    get_field('dom-area') . " м<sup>2</sup>, " .
                    get_field('dom-floor') . '/' . get_field('dom-floors-total') . " этаж";
                    echo $line1Text;
                ?>
            </div> <!-- //. -->
        </div>
        <div class="item-location">
            <span>
                <a class="link-default" href="<?php echo get_permalink( (int)get_field('building-id') ); ?>">
                    ЖК <?php echo str_replace("ЖК ", "", get_the_title( (int)get_field('building-id') ) ); ?>
                </a>
                <?php
                    if(get_field('building-section')){
                        echo ", " . get_field('building-section');
                    }
                ?>
            </span>
        </div> <!-- //.item-location -->
        <div class="item-price">
            <span class="price"><?php echo number_format ( (int)get_field('dom-price'), 0, ",", " " ); ?></span>
            <span class="currency">руб.</span>
            <?php if (get_field('kvinjk-pricem')): ?>
                <span class="price-meter">
                <?php echo number_format ( (int)get_field('kvinjk-pricem'), 0, ",", " " ); ?>
                    руб./м<sup>2</sup>
                </span>
            <?php endif; ?>
        </div> <!-- //.item-price -->
        <div class="item-short-description">
            Квартира новостройка в ЖК <?php echo get_the_title( (int)get_field('building-id') ); ?>.
        </div> <!-- //.item-short-description -->
        <div>
            <?php //echo get_the_author_meta('ID'); echo get_current_user_id(); ?>
            <a target="_blank" href="<?php echo get_permalink(); ?>" class="btn btn-default d-inline-block">Посмотреть</a>
            <?php if(get_current_user_id() == get_the_author_meta("ID")) : ?>
            <?php if(get_post_status() == 'pending') : ?>
                <a href="<?php echo get_permalink(); ?>&edit" class="link-default ml-md-5 d-inline-block">Редактировать объявление</a>
            <?php endif; ?>
            <?php if(get_post_status() == 'publish') : ?>
                <a href="<?php echo get_permalink(); ?>?delete=1" class="link-default ml-md-5 d-inline-block">Удалить объявление</a>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div> <!-- //.col -->
</div>