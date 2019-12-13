<?php

/**
 * Template Name: Каталог недвижимости основной
 *
 */

$filter_array = array('relation' => 'AND');
$post_types = array('nedv_sale', 'nedv_arenda', 'nedv_new');
$filter_type = "";
$filter_new = "";
$filter_flat = "";
$filter_posts = "";
$price_max = "";
$loc = "";




if (isset($_GET["posts"]) && strip_tags($_GET["posts"]) == "1") {
    $filter_posts = "1";
    $post_types = array('nedv_sale', 'nedv_new');
}
if (isset($_GET["posts"]) && strip_tags($_GET["posts"]) == "2") {
    $filter_posts = "2";
    $post_types = 'nedv_arenda';
}



if (isset($_GET["type"]) && strip_tags($_GET["type"]) != "" && strip_tags($_GET["type"]) != "0") {

    $filter_type = (int) strip_tags($_GET["type"]);
    switch ($filter_type) {
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
            $filter_type_label = 'квартира';
    }

    array_push($filter_array, array(
        'key'   => 'dom-type',
        'value' => $filter_type_label,
    ));
}




if (isset($_GET["new"]) && strip_tags($_GET["new"]) != "") {

    $filter_new = (int) strip_tags($_GET["new"]);

    if ($filter_new == 1) {
        array_push($filter_array, array(
            'key'   => 'dom-new',
            'value' => 'новостройка',
        ));
    } elseif ($filter_new == 2) {
        array_push($filter_array, array(
            'key'   => 'dom-title',
        ));
    }
}



if ($filter_type == 1 && isset($_GET["rooms"]) && strip_tags($_GET["rooms"]) != "") {
    $filter_flat = (int) strip_tags($_GET["rooms"]);

    array_push($filter_array,   array(
        'key'     => 'filter-rooms',
        'value'   => $filter_flat,
    ));
}




if (isset($_GET["max"]) && strip_tags($_GET["max"]) != "") {
    $price_max = (int) strip_tags($_GET["max"]);

    array_push($filter_array,   array(
        'key'     => 'dom-price',
        'compare' => 'BETWEEN',
        'type'    => 'numeric',
        'value'   => array( 0, $price_max),
      ));
}





if (isset($_GET["loc"]) && strip_tags($_GET["loc"]) != "") {
    $loc = (string) strip_tags($_GET["loc"]);
	array_push($filter_array,   array(
    'key'     => array('search-loc', 'dom-title', 'dom-address','dom-locality-name', 'dom-metro'),
    'compare' => 'LIKE',
    'value'   => $loc,
 ));
}








$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$searchargs = array(
    'posts_per_page' => 10,
    'order' => "DESC",
    'orderby' => 'modified',
    'post_type' => $post_types,
    'paged' => $paged,
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

        <?php get_template_part('/includes/banners'); ?>

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
                        <input type="number" min="0" name="max" value="<?php echo $price_max; ?>" class="form-control" placeholder="(₽) До:">
                    </div> <!-- //.col -->
                    <!-- <div class="col-md-2">
          <select class="custom-select">
            <option value="0">В районе:</option>
            <option value="1">Большие Выселки</option>
          </select>
        </div> -->
                    <div class="filter-col">
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
                    <div class="col-12 col-md-3">
                        <div class="">
                            <!-- Сортировка: <a href="#" class="link-default">по умолчанию</a> -->
                        </div> <!-- //. -->
                    </div> <!-- //.col -->
                    <div class="col-12 col-md-2">
                        <div class="">
                            <!-- Выводить по: <a href="#" class="link-default">10</a> -->
                        </div> <!-- //. -->
                    </div> <!-- //.col -->
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