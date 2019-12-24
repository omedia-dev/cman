<?php

/**
 * Template Name: Каталог недвижимости основной
 *
 */

$filter_array = array();
$post_types = array('nedv_sale', 'nedv_arenda', 'nedv_new');
$filter_posts = 0;
$filter_type = 0;
$filter_new = 0;
$filter_flat = 0;

$price_min = "";
$price_max = "";
$price_min_max = array("", "");
$loc = "";

$sortType = "";
$sort_label = "По умолчанию";
$order_by = 'modified';
$order = "ACS";
$order_meta_key = "dom-price";


// Продажа или аренда
if( isset($_GET["posts"]) ){

    switch( (int)strip_tags($_GET["posts"]) ) {
        case 1:
            $filter_posts = 1;
            $post_types = array('nedv_sale', 'nedv_new');
            break;
        case 2:
            $filter_posts = "2";
            $post_types = 'nedv_arenda';
            break;
    }
    
}




//Тип недвижимости
if ( isset($_GET["type"]) ) {

    $filter_type = (int)strip_tags($_GET["type"]);

    switch ( $filter_type ) {
        case 1:
            $filter_type_label = 'квартира';
            break;
        case 2:
            $filter_type_label = array('дом', 'коттедж');
            break;
        case 3:
            $filter_type_label = 'таунхаус';
            break;
        case 4:
            $filter_type_label = 'участок';
            break;
        case 5:
            $filter_type_label = 'коммерческая';
            break;
        default:
            $filter_type_label = 'all';
    }

    if( $filter_type_label != 'all' ){
        array_push($filter_array, array(
            'key'   => 'dom-type',
            'value' => $filter_type_label,
        ));
    }
}





// Новостройка или вторичка
if( isset($_GET["new"]) ){

    $filter_new = (int)strip_tags($_GET["new"]);
    switch( (int)strip_tags($_GET["new"]) ) {
        case 1:
            array_push($filter_array, array(
                'key'   => 'dom-new',
                'value' => 'новостройка',
            ));
            break;
        case 2:
            array_push($filter_array, array(
                //Только во вторичке есть поле dom-title
                'key'   => 'dom-title',
            ));
            break;
    }
    
}



if ($filter_type == 1 && isset($_GET["rooms"])) {

    $filter_flat = (int) strip_tags($_GET["rooms"]);

    if($filter_flat && $filter_flat < 5){
        array_push($filter_array,   array(
            'key'     => 'filter-rooms',
            'value'   => $filter_flat,
        ));
    }

    if($filter_flat == 5){
        array_push($filter_array,   array(
            'key'     => 'filter-rooms',
            'compare' => '>',
            'type' => 'NUMERIC',
            'value'   => 4,
        ));
    }
}




if ( isset($_GET["max"]) && (int)strip_tags($_GET["max"]) != 0 ) {
    $price_max = (int) strip_tags($_GET["max"]);

    array_push($filter_array, array(
        'key'     => 'dom-price',
        'compare' => '<=',
        'type' => 'NUMERIC',
        'value'   => $price_max,
    ));
}

if( isset($_GET["min"]) && (int)strip_tags($_GET["min"]) != 0){
    $price_min = (int) strip_tags($_GET["min"]);

    array_push($filter_array, array(
        'key'     => 'dom-price',
        'compare' => '>=',
        'type' => 'NUMERIC',
        'value'   => $price_min,
    ));
}


if (isset($_GET["loc"]) && strip_tags($_GET["loc"]) != "") {
    $loc = (string) strip_tags($_GET["loc"]);
	array_push($filter_array,   array(
    'key'     => array('search-loc'),
    'compare' => 'LIKE',
    'value'   => $loc,
 ));
}








// Новостройка или вторичка
if( isset($_GET["sort"]) ){

    $sortType = htmlspecialchars($_GET["sort"], ENT_QUOTES, 'UTF-8');

    switch( $sortType ) {
        case 'priceup':
            $order_by = 'meta_value_num';
            $order = "ASC";
            $sort_label = "По цене (сначала дешевле)";
            break;
        case 'pricedown':
            $order_by = 'meta_value_num';
            $order = "DESC";
            $sort_label = "По цене (сначала дороже)";
            break;
        case 'dateup':
            $order = "DESC";
            $sort_label = "По дате (сначала новые)";
            break;
        case 'datedown':
            $order = "ASC";
            $sort_label = "По дате (сначала старые)";
            break;
    }
    
}













$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$searchargs = array(
    'posts_per_page' => 10,
    'post_type' => $post_types,
    'paged' => $paged,
    'meta_key' => $order_meta_key,
    'orderby' => $order_by,
    'order' => $order,
    'meta_query' => [
        'relation' => 'AND',
        $filter_array,
    ],
);

$objects = new WP_Query( $searchargs );







get_header();

?>
    <div class="container inner-page">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Каталог недвижимости</li>
            </ol>
        </nav>

        <h1 class="page-title">Каталог недвижимости</h1>



        <?php //get_template_part('/includes/banners'); ?>

        <!-- <div class="section-tabs red">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link" id="nav-arenda-tab" href="/nedv_sale/" role="tab" aria-controls="nav-arenda" aria-selected="true">Купить</a>
        <a class="nav-item nav-link" id="nav-sdavat-tab" href="/prodat-nedvizhimost/" role="tab" aria-controls="nav-sdavat" aria-selected="false">Продать</a>
        <a class="nav-item nav-link active" id="nav-kupit-tab" href="/nedv_arenda/" role="tab" aria-controls="nav-kupit" aria-selected="false">Арендовать</a>
        <a class="nav-item nav-link" id="nav-prodat-tab" href="/sdat-v-arendu/" role="tab" aria-controls="nav-prodat" aria-selected="false">Сдать в аренду</a>
      </div>
    </nav>
  </div> //.section-tabs -->


  <?php if ($filter_type > 1): ?>
  <style>
      .jsFlatCtrl{
          display: none;
      }
  </style>
  <?php endif; ?>


        <section class="section-catalog-filter" id="filterBlock">
            <form action="/catalog/#filterBlock" class="filter-form" method="GET">
                <div class="filter-row">
                    <div class="filter-col">
                        <select name="posts" class="custom-select jsAction">
                            <option value="0">Купить/Арендовать</option>    
                            <option value="1" <?php if ($filter_posts == 1) echo 'selected'; ?>>Купить</option>
                            <option value="2" <?php if ($filter_posts == 2) echo 'selected'; ?>>Арендовать</option>
                        </select>
                    </div> <!-- //.col -->
                    <div class="filter-col">
                        <select name="type" class="custom-select jsObjects">
                            <option value="0" <?php if ($filter_type == 0) echo 'selected'; ?>>Любой тип</option>
                            <option value="1" <?php if ($filter_type == 1) echo 'selected'; ?>>Квартиру</option>
                            <option value="2" <?php if ($filter_type == 2) echo 'selected'; ?>>Дом / Коттедж</option>
                            <option value="3" <?php if ($filter_type == 3) echo 'selected'; ?>>Таунхаус</option>
                            <option value="4" <?php if ($filter_type == 4) echo 'selected'; ?>>Участок</option>
                            <option value="5" <?php if ($filter_type == 5) echo 'selected'; ?>>Коммерческая</option>
                        </select>
                    </div> <!-- //.col -->
                    <div class="filter-col jsFlatCtrl">
                        <select name="new" class="custom-select jsFlatType">
                            <option value="0" <?php if ($filter_new == 0) echo 'selected'; ?>>В категории</option>
                            <option value="1" <?php if ($filter_new == 1) echo 'selected'; ?>>В новостройке</option>
                            <option value="2" <?php if ($filter_new == 2) echo 'selected'; ?>>Вторичку</option>
                        </select>
                    </div> <!-- //.col -->
                    <div class="filter-col jsFlatCtrl">
                        <select name="rooms" class="custom-select jsRooms">
                            <option value="">Комнат</option>
                            <option value="1" <?php if ($filter_flat == 1) echo 'selected'; ?>>1-комн.</option>
                            <option value="2" <?php if ($filter_flat == 2) echo 'selected'; ?>>2-комн.</option>
                            <option value="3" <?php if ($filter_flat == 3) echo 'selected'; ?>>3-комн.</option>
                            <option value="4" <?php if ($filter_flat == 4) echo 'selected'; ?>>4-комн.</option>
                            <option value="5" <?php if ($filter_flat == 5) echo 'selected'; ?>>Больше 4-х</option>
                        </select>
                    </div> <!-- //.col -->
                    <div class="filter-col filter-col">
                        <input type="text" name="loc" value="<?php echo $loc; ?>" class="form-control" placeholder="Город, адрес, метро, район">
                    </div> <!-- //.col -->
                    <div class="filter-col filter-col--small">
                        <input type="number" min="0" name="min" value="<?php echo $price_min; ?>" class="form-control" placeholder="(₽) От:">
                    </div> <!-- //.col -->
                    <div class="filter-col filter-col--small">
                        <input type="number" min="0" name="max" value="<?php echo $price_max; ?>" class="form-control" placeholder="(₽) До:">
                    </div> <!-- //.col -->


                    <div class="filter-col">
                        <input type="hidden" name="sort" value="<?php echo $sortType; ?>">
                        <button type="submit" class="btn btn-default">Подобрать</button>
                    </div> <!-- //.col -->
                </div> <!-- //.form-row -->
            </form> <!-- //.filters-form -->
            <div class="filter-bottom">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="find">
                            По Вашему запросу найдено: <?php echo $objects->found_posts; ?> объекта
                        </div> <!-- //.find -->
                    </div> <!-- //.col -->
                    <div class="col-12 col-md-5">
                        <div class="sorts dropdown-inside">
                            Сортировка: <span class="link-default dropdown-redlink"><?php echo $sort_label; ?></span>
                            <div class="jsOpenBlock dropdown--sort">
                                <a href="<?php echo add_query_arg('sort', 'none'); ?>">По умолчанию</a>
                                <a href="<?php echo add_query_arg('sort', 'priceup'); ?>">По цене (сначала дешевле)</a>
                                <a href="<?php echo add_query_arg('sort', 'pricedown'); ?>">По цене (сначала дороже)</a>
                                <a href="<?php echo add_query_arg('sort', 'dateup'); ?>">По дате (сначала новые)</a>
                                <a href="<?php echo add_query_arg('sort', 'datedown'); ?>">По дате (сначала старые)</a>
                            </div>
                        </div> <!-- //. -->
                    </div> <!-- //.col -->
                    <!-- <div class="col-12 col-md-1">
                        <div class="">
                            Выводить по: <a href="#" class="link-default">10</a>
                        </div>
                    </div> -->
                    <div class="col-12 col-md-2">
                        <a href="<?php echo get_permalink(); ?>" class="link-grey">Сбросить фильтр</a>
                    </div> <!-- //.col -->
                </div> <!-- //.row -->
            </div> <!-- //.filter-bottom -->
        </section> <!-- //.section-catalog-filter -->


        <div class="filter-result">

            <?php if (1) : ?>
                <?php foreach ( $objects->posts as $post ) : setup_postdata( $post ); ?>

                    <?php
                            if (get_post_type(get_the_ID()) == 'nedv_new') {
                                get_template_part('/includes/object-sample-new');
                            } else {
                                get_template_part('/includes/object-sample');
                            }
                            ?>

                <?php endforeach; wp_reset_postdata(); ?>

            <?php else : ?>
                <div class="emptyblock my-5 pt-5 text-center">
                    <div class="emptyblock__img h1"><span class="lnr lnr-apartment"></span></div>
                    <div class="h1">По запросу объектов не найдено</div>
                    <div class="my-5">
                        <a href="<?php echo get_post_type_archive_link('nedv_arenda'); ?>" class="btn btn-default">Сбросить фильтр</a>
                    </div>
                </div>
            <?php endif; ?>


        </div> <!-- //.filter-result -->
        <div class="mt-5 mb-5 pagination">
            <?php
            echo paginate_links(array(
                'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'total'        => $objects->max_num_pages,
                'current'      => max(1, get_query_var('paged')),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => __('«'),
                'next_text'    => __('»'),
                'type'         => 'list',
                'add_args'     => false,
                'add_fragment' => '',
            ));
            ?>
        </div>
    </div> <!-- //.container -->






    <script>
    (function($) {
        'use strict';
        $(document).ready(function() {

            $('.jsObjects').on('change', function(e){

                if( parseInt($(this).val())  > 1 ){

                    $('.jsFlatCtrl').hide();
                    
                }  else {

                    $('.jsFlatCtrl').show();

                }

            });


        });
    }(jQuery));
    </script>







    <?php get_footer(); ?>