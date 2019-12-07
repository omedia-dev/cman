<?php 

get_header();

?>
<div class="container inner-page pb-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
            <li class="breadcrumb-item">
                <a class="link-default" href="<?php echo get_permalink( (int)get_field('building-id') ); ?>">
                    ЖК <?php echo get_the_title( (int)get_field('building-id') ); ?>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Квартира № <?php the_field('kvinjk-number'); ?></li>
        </ol>
    </nav>

    <div class="row">
        <h1 class="object-title col-md-7 align-self-center mb-0">
            Квартира № <?php the_field('kvinjk-number'); ?>, <?php the_field('dom-rooms'); ?>-х комнатная.
        </h1>
        <div class="col-md-5 align-self-center">
            <?php echo do_shortcode('[favorite_button]'); ?>
            <!-- <a href="#" class="link-underline add-heart"><span>Добавить в избранное</span></a> -->
            <!-- <a href="#" class="link-underline add-heart active"><span>Добавить в избранное</span></a> -->
        </div> <!-- //.col-md-5 -->
    </div> <!-- //.row -->

    <div class="row mt-5 mb-5">
        <div class="col-12 col-md-6 mb-5">
            <?php
                if( get_field('dom-gallery-type') == "url" ){
                    echo '<img src="' . get_field('dom-gallery-url') . '" alt="Изображение" class="img-fluid">';
                } else {
                    $main_img = get_field('kvinjk-img');
                    echo wp_get_attachment_image($main_img, 'catalog-thumbs', false, array('class' => 'img-fluid'));
                }
            ?>
            <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flat_big.png" alt="" class="img-fluid">
            <ul class="list-unstyled d-flex justify-content-between align-items-center mt-5">
                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flat_1.png" alt=""></li>
                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flat_2.png" alt=""></li>
                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flat_3.png" alt=""></li>
            </ul> -->
        </div> <!-- //.col-md-7 -->
        <div class="col-12 col-md-5 offset-lg-1 flat-info">
        <?php do_action( 'bwsplgns_display_pdf_print_buttons', 'top' ); ?>
                <dl>
                    <dt>Жилой комплекс:</dt>
                    <dd>
                        <a class="link-default" href="<?php echo get_permalink( (int)get_field('building-id') ); ?>">
                            <?php echo get_the_title( (int)get_field('building-id') ); ?>
                        </a>
                    </dd>
                </dl>
            <?php if(get_field('building-section')): ?>
                <dl>
                    <dt>Корпус:</dt>
                    <dd><?php the_field('building-section'); ?></dd>
                </dl>
            <?php endif; ?>
            <?php if(get_field('dom-floor')): ?>
                <dl>
                    <dt>Этаж:</dt>
                    <dd><?php the_field('dom-floor'); ?>/<?php the_field('dom-floors-total'); ?></dd>
                </dl>
            <?php endif; ?>
            <?php if(get_field('dom-rooms')): ?>
                <dl>
                    <dt>Количество комнат:</dt>
                    <dd><?php the_field('dom-rooms'); ?></dd>
                </dl>
            <?php endif; ?>
            <?php if(get_field('dom-area')): ?>
                <dl>
                    <dt>Общая площадь:</dt>
                    <dd><?php the_field('dom-area'); ?> м<sup>2</sup></dd>
                </dl>
            <?php endif; ?>
            <?php if(get_field('dom-living-space')): ?>
                <dl>
                    <dt>Жилая площадь:</dt>
                    <dd><?php the_field('dom-living-space'); ?> м<sup>2</sup></dd>
                </dl>
            <?php endif; ?>
            <?php if(get_field('dom-kitchen-space')): ?>
                <dl>
                    <dt>Площадь кухни:</dt>
                    <dd><?php the_field('dom-kitchen-space'); ?> м<sup>2</sup></dd>
                </dl>
            <?php endif; ?>
            <?php if(get_field('dom-tall')): ?>
                <dl>
                    <dt>Высота потолков:</dt>
                    <dd><?php the_field('dom-tall'); ?> м</dd>
                </dl>
            <?php endif; ?>
            <?php if(get_field('kvinjk-pricem')): ?>
                <dl>
                    <dt>Цена за м<sup>2</sup>:</dt>
                    <dd><?php echo number_format( (int) get_field('kvinjk-pricem'), 0, ",", " "); ?> р.</dd>
                </dl>
            <?php endif; ?>
                <dl>
                    <dt>Общая цена:</dt>
                    <dd><?php echo number_format( (int) get_field('dom-price'), 0, ",", " "); ?> р.</dd>
                </dl>
            <?php if(get_field('built-year')): ?>
                <dl>
                    <dt>Год постройки:</dt>
                    <dd><?php the_field('built-year'); ?>г. (<?php the_field('ready-quarter'); ?> квартал)</dd>
                </dl>
            <?php endif; ?>
            <dl>
                <dt>Возможность ипотеки:</dt>
                <?php if(get_field('mortgage')): ?>
                    <dd>Да</dd>
                <?php else: ?>
                    <dd>Нет</dd>
                <?php endif; ?>
            </dl>
            <a href="#" class="btn btn-default mb-3 mt-3" data-hystmodal="#jsForm2Modal">Оставить заявку</a>
            <!-- <a href="#" class="btn link-underline btn-outline"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_pdf.png" alt=""><span>Скачать PDF</span></a> -->
        </div> <!-- //.col-md-5 -->
    </div> <!-- //.row -->

</div> <!-- //.container -->

<!-- //Hero Search -->
<?php get_footer(); ?>