<div class="row filter-result-item">
    <div class="col-12 col-md-5 item-img-wrap">

        <?php if(!function_exists('getJkImgUrl')){
                function getJkImgUrl($num){
                    if( get_field('gk-photogallery') ){
                        $JkPhotoRepeater = get_field('gk-photogallery');
                        return wp_get_attachment_image_url( $JkPhotoRepeater[$num], 'catalog-thumbs', false );
                    } else {
                        $JkPhotoMain = get_field('gk_img_main');
                        return wp_get_attachment_image_url( $JkPhotoMain, 'catalog-thumbs', false );
                    }
                }
                function getJkImgCount(){
                    if( get_field('gk-photogallery')){
                        $JkPhotoRepeater = get_field('gk-photogallery');
                        return count($JkPhotoRepeater);
                    } else {
                        $JkPhotoMain = get_field('gk_img_main');
                        return count($JkPhotoMain);
                    }
                }
            }
        ?>
        
        <div class="filter-result-swiper swiper-container <?php if( getJkImgCount() < 2){ echo 'filter-simple';} ?>">
            <div class="swiper-wrapper">
                <?php for ($i=0; $i < 3 && $i < getJkImgCount(); $i++) : ?>
                    <div class="swiper-slide">
                        <a target="_blank" href="<?php echo get_permalink(); ?>">
                            <img 
                                src="<?php echo getJkImgUrl($i); ?>"
                                alt="<?php the_title(); ?>"
                                class="img-fluid">
                        </a>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        
        <div class="filter-result-thumbs swiper-container <?php if( getJkImgCount() < 2){ echo 'filter-simple';} ?>">
            <div class="swiper-wrapper">
                <?php for ($i=0; $i < 3 && $i < getJkImgCount(); $i++) : ?>
                    <div class="swiper-slide">
                        <img 
                            src="<?php echo getJkImgUrl($i); ?>"
                            alt="<?php the_title(); ?>"
                            class="img-fluid">
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <?php if( getJkImgCount() > 3): ?>
        <a target="_blank" href="<?php echo get_permalink(); ?>" class="filter-result-morephoto">
            <span>Ещё <br><?php echo getJkImgCount() - 3; ?> фото</span>
            <img src="<?php echo getJkImgUrl(0); ?>" alt="">
        </a>
        <?php endif; ?>
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

        <?php if(get_field('gk_from') && get_field('gk_to')): ?>
        <?php
            $textFlats = array();
            if(get_field('sysjk-1')){
                array_push($textFlats, "1");
            }
            if(get_field('sysjk-2')){
                array_push($textFlats, "2");
            }
            if(get_field('sysjk-3')){
                array_push($textFlats, "3");
            }
            if(get_field('sysjk-4')){
                array_push($textFlats, "4");
            }
        ?>
        <div class="h5"><?php echo join(", ",$textFlats) . "-комн. " ?> квартиры от 
            <strong><?php echo number_format((int) get_field('gk_from'), 0, ",", " "); ?></strong> руб. до 
            <strong><?php echo number_format((int) get_field('gk_to'), 0, ",", " "); ?></strong> руб.
        </div>
        <?php endif; ?>
        <div class="item-short-description">
            <?php echo wp_trim_words(get_field('gk_about'), 45, "..."); ?>
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