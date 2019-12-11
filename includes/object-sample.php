<div class="row filter-result-item">
    <div class="col-12 col-md-5 item-img-wrap">
        <a target="_blank" href="<?php echo get_permalink(); ?>">
            <?php
            if( get_field('dom-gallery-type') == "url" ){
                $galleryRepeater = get_field('dom-gallery-url');
                echo '<img src="' . $galleryRepeater[0]['url']. '" alt="Изображение" class="img-fluid">';
            } else {
                $main_img = get_field('dom-gallery')[0];
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
            <h3 class="item-title first-caps">
                <a href="<?php echo get_permalink(); ?>" target="_blank">
                    <?php the_field('dom-title'); ?>
                </a>
            </h3>
            <div class="item-short-info first-caps">
                <?php
                if (strtolower(trim(get_field('dom-type'))) == "квартира") {
                    $info = get_field('dom-type-flat');
                    $line1Text = $info['dom-rooms'] . ", " .
                        $info['dom-area'] . "м<sup>2</sup>, " .
                        $info['dom-floor'] . '/' . $info['dom-floors-total'] . " этаж";
                    echo $line1Text;
                } elseif( in_array( mb_strtolower( get_field('dom-type') ), array("дом", "коттедж", "таунхаус") ) ) {
                    $info2 = get_field('dom-type-home');
                    $line2Text = $info2['dom-floors-total'] . "-эт. " . get_field('dom-type') .
                        ", площадью " . $info2['lot-value'] . " м<sup>2</sup>, на участке " . $info2['lot-area'] . " cот.";
                    echo $line2Text;
                } else {
                    $info2 = get_field('dom-type-home');
                    echo get_field('dom-type');
                    if($info2['lot-area']){
                        echo ", " . $info2['lot-area'] . " сот";
                    }
                }
                ?>
            </div> <!-- //. -->
        </div>
        <div class="item-location">
            <span>
                <a href="<?php echo get_permalink(); ?>" target="_blank" class="link-default">
                    <?php
                    //Адрес
                    $line2Text = get_field('dom-locality-name') . " " .
                        get_field('dom-address');
                    echo $line2Text;
                    ?>
                </a>
            </span>
        </div> <!-- //.item-location -->
        <div class="item-price">
            <span class="price"><?php echo number_format ( (int)get_field('dom-price'), 0, ",", " " ); ?></span>
            <span class="currency">
                <?php if( get_post_type( get_the_ID() ) == 'nedv_arenda'){
                    echo 'руб/' . get_field('dom-period');
                } else{
                    echo 'руб';
                } ?>
            </span>
            <?php if (isset($info) && $info['dom-area']) : ?>
                <span class="price-meter">
                    <?php
                        //вычисляем цену за кв.метр.
                        print(round((int) str_replace(' ', '', get_field('dom-price')) / (int) $info['dom-area']));
                        ?>
                    руб./м<sup>2</sup>
                </span>
            <?php endif; ?>
        </div> <!-- //.item-price -->
        <div class="item-short-description">
            <?php echo wp_trim_words(get_field('dom_description'), 45, "..."); ?>
        </div> <!-- //.item-short-description -->
        <div>
            <?php //echo get_the_author_meta('ID'); echo get_current_user_id(); ?>
            <a target="_blank" href="<?php echo get_permalink(); ?>" class="btn btn-default d-inline-block">Посмотреть</a>

            <?php if(is_super_admin()) : ?>
                <a href="<?php echo add_query_arg(["edit" => '1'], get_permalink()); ?>" class="link-default ml-md-5 d-inline-block">Редактировать объявление</a>
            <?php else : ?>  

                <?php if(get_current_user_id() == get_the_author_meta("ID")) : ?>
                    <?php if(get_post_status() == 'pending') : ?>
                        <a href="<?php echo add_query_arg(["edit" => '1'], get_permalink()); ?>" class="link-default ml-md-5 d-inline-block">Редактировать объявление</a>
                    <?php endif; ?>
                    <?php if(get_post_status() == 'publish') : ?>
                        <a href="<?php echo add_query_arg(["delete" => '1'], get_permalink()); ?>" class="link-default ml-md-5 d-inline-block">Удалить объявление</a>
                    <?php endif; ?>
                <?php endif; ?>
                 
            <?php endif; ?> 
        </div>
    </div> <!-- //.col -->
</div>