<?php 

$ancestors = get_post_ancestors( get_the_ID() );
$parentPost = get_post( (int) $ancestors[0] );
get_header();

?>
<div class="container inner-page">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
            <li class="breadcrumb-item"><a href="<?php echo get_permalink( $parentPost->ID ); ?>" class="link-default"><?php echo $parentPost->post_title; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Квартира № <?php the_field('kvinjk-number'); ?></li>
        </ol>
    </nav>

    <div class="row">
        <h1 class="object-title col-md-7 align-self-center mb-0">
            Квартира <?php the_field('kvinjk-flatcount'); ?>-х комнатная <?php the_field('kvinjk-area'); ?>м<sup>2</sup>
        </h1>
        <div class="col-md-5 align-self-center">
            <!-- <a href="#" class="link-underline add-heart"><span>Добавить в избранное</span></a> -->
            <!-- <a href="#" class="link-underline add-heart active"><span>Добавить в избранное</span></a> -->
        </div> <!-- //.col-md-5 -->
    </div> <!-- //.row -->

    <div class="row mt-5 mb-5">
        <div class="col-12 col-md-6 mb-5">
            <img src="<?php the_field('kvinjk-img'); ?>" alt="" class="img-fluid">
            <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flat_big.png" alt="" class="img-fluid">
            <ul class="list-unstyled d-flex justify-content-between align-items-center mt-5">
                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flat_1.png" alt=""></li>
                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flat_2.png" alt=""></li>
                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flat_3.png" alt=""></li>
            </ul> -->
        </div> <!-- //.col-md-7 -->
        <div class="col-12 col-md-5 offset-lg-1 flat-info">
            <dl>
                <dt>Корпус:</dt>
                <dd><?php the_field('kvinjk-korpus'); ?></dd>
            </dl>
            <dl>
                <dt>Этаж:</dt>
                <dd><?php the_field('kvinjk-level'); ?>/<?php the_field('kvinjk-leveltotal'); ?></dd>
            </dl>
            <dl>
                <dt>Количество комнат:</dt>
                <dd><?php the_field('kvinjk-flatcount'); ?></dd>
            </dl>
            <dl>
                <dt>Общая площадь:</dt>
                <dd><?php the_field('kvinjk-area'); ?> м<sup>2</sup></dd>
            </dl>
            <dl>
                <dt>Цена за м<sup>2</sup>:</dt>
                <dd><?php echo number_format( (int) get_field('kvinjk-pricem'), 0, ",", " "); ?> р.</dd>
            </dl>
            <dl>
                <dt>Общая цена:</dt>
                <dd><?php echo number_format( (int) get_field('kvinjk-price'), 0, ",", " "); ?> р.</dd>
            </dl>
            <a href="#" class="btn btn-default mb-3 mt-3">Оставить заявку</a>
            <a href="#" class="btn link-underline btn-outline"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_pdf.png" alt=""><span>Скачать PDF</span></a>
        </div> <!-- //.col-md-5 -->
    </div> <!-- //.row -->

</div> <!-- //.container -->

<!-- //Hero Search -->
<?php get_footer(); ?>