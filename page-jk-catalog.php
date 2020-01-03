<?php

/**
 * Template Name: Каталог ЖК основной
 *
 */

$filterMetro = array();
$filterPrice = array();
$filterDate = array();



$filter_array = array();
$queryName = "";
$queryMetro = "";
$queryRooms = "";
$queryYear = "";
$queryMin = "";
$queryMax = "";



//Предварительный запрос всех ЖК для наполнения фильтров
$simpleArgs = array(
    'numberposts' => -1, // количество выводимых постов - все
    'post_type' => 'nedv_jk', // тип поста - любой
    'post_status' => 'publish', // статус поста - любой
);
$allPosts = get_posts($simpleArgs);

foreach ($allPosts as $simpleChild){
    //Наполняем массивы для фильтра этаж/комнаты
    if(get_field('sysjk-metro', $simpleChild->ID)){
        array_push($filterMetro, get_field('sysjk-metro', $simpleChild->ID));
    }

    array_push($filterPrice, (int)get_field('dom-price', $simpleChild->ID));

    if( get_field('sysjk-date', $simpleChild->ID) ){
        array_push($filterDate, get_field('sysjk-date', $simpleChild->ID));
    }

}




//Дата сдачи дома
if( isset($_GET["jkyear"]) ){
    $queryYear = trim(urldecode(strip_tags($_GET["jkyear"])));
    if($queryYear){
        array_push($filter_array, array(
            'key'     => 'sysjk-date',
            'value'   => $queryYear,
        ));
    }
}






//Метро
if( isset($_GET["jkmetro"]) ){
    $queryMetro = trim(urldecode(strip_tags($_GET["jkmetro"])));
    if($queryMetro){
        array_push($filter_array, array(
            'key'     => 'sysjk-metro',
            'value'   => $queryMetro,
        ));
    }
}




//Комнатность квартир
if( isset($_GET["jkrooms"]) ){
    $queryRooms = (int)trim(urldecode(strip_tags($_GET["jkrooms"])));
    switch ($queryRooms) {
        case 1:
            array_push($filter_array, array(
                'key'     => 'sysjk-1',
                'value'   => "1",
            ));
            break;
        case 2:
            array_push($filter_array, array(
                'key'     => 'sysjk-2',
                'value'   => '1',
            ));
            break;
        case 3:
            array_push($filter_array, array(
                'key'     => 'sysjk-3',
                'value'   => '1',
            ));
            break;
        case 4:
            array_push($filter_array, array(
                'key'     => 'sysjk-4',
                'value'   => '1',
            ));
            break;
    }
}


//Цены
if ( isset($_GET["max"]) && (int)strip_tags($_GET["max"]) != 0 ) {
    $queryMax = (int) strip_tags($_GET["max"]);

    array_push($filter_array, array(
        'key'     => 'gk_to',
        'compare' => '<=',
        'type' => 'NUMERIC',
        'value'   => $queryMax,
    ));
}

if( isset($_GET["min"]) && (int)strip_tags($_GET["min"]) != 0){
    $queryMin = (int) strip_tags($_GET["min"]);

    array_push($filter_array, array(
        'key'     => 'gk_from',
        'compare' => '>=',
        'type' => 'NUMERIC',
        'value'   => $queryMin,
    ));
}











$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$searchargs = array(
    'posts_per_page' => 10,
    'order' => "DESC",
    'orderby' => 'modified',
    'post_type' => 'nedv_jk',
    'paged' => $paged,
    'meta_query' => [
        'relation' => 'AND',
        $filter_array,
    ],
);


//Продажа или аренда
if( isset($_GET["jkname"]) ){
    $queryName = trim(urldecode(strip_tags($_GET["jkname"])));
    if($queryName){
        $searchargs['title'] = $queryName;
    }
}







$objects = new WP_Query( $searchargs );







get_header();

?>


    <div class="container inner-page">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Жилые комплексы</li>
            </ol>
        </nav>

        <h1 class="page-title">Жилые комплексы</h1>

        
        <?php get_template_part('/includes/banners'); ?>






        <section class="section-catalog-filter" id="filterBlock">
            <form action="/build-catalog/#filterBlock" class="filter-form" method="GET">
                <div class="filter-row">
                    <div class="filter-col">
                        <select name="jkname" class="custom-select">
                            <option value="0">Выберите Жилой комплекс</option>
                            <?php 
                                foreach ($allPosts as $obj) {
                                    if( $queryName == $obj->post_title){
                                        $nameActive = "selected";
                                    } else {
                                        $nameActive = "";
                                    }
                                    echo '<option value="' . urlencode($obj->post_title) . '" ' . $nameActive . '>' . $obj->post_title . '</option>';
                                }
                            ?>   
                        </select>
                    </div> <!-- //.col -->
                    <div class="filter-col">
                        <select name="jkmetro" class="custom-select">
                            <option value="">Станция метро</option>
                            <?php 
                                $metroArray = array_unique($filterMetro);
                                sort($metroArray);
                                foreach ($metroArray as $metroObj) {
                                    if( $metroObj == $queryMetro){
                                        $metroActive = "selected";
                                    } else {
                                        $metroActive = "";
                                    }
                                    echo '<option value="' . urlencode($metroObj) . '"' . $metroActive . '>' . $metroObj . '</option>';
                                }
                            ?> 
                        </select>
                    </div> <!-- //.col -->
                    <div class="filter-col jsFlatCtrl">
                        <select name="jkrooms" class="custom-select">
                            <option value="">Число комнат</option>
                            <option value="1" <?php if ($queryRooms == 1) echo 'selected'; ?>>1-комн.</option>
                            <option value="2" <?php if ($queryRooms == 2) echo 'selected'; ?>>2-комн.</option>
                            <option value="3" <?php if ($queryRooms == 3) echo 'selected'; ?>>3-комн.</option>
                            <option value="4" <?php if ($queryRooms == 4) echo 'selected'; ?>>4-комн. и более</option>
                        </select>
                    </div> <!-- //.col -->
                    <div class="filter-col">
                        <select name="jkyear" class="custom-select">
                            <option value="">Срок сдачи</option>
                            <?php 
                                $dateArray = array_unique($filterDate);
                                sort($dateArray);
                                foreach ($dateArray as $dateObj) {
                                    if( $dateObj == $queryYear){
                                        $yearActive = "selected";
                                    } else {
                                        $yearActive = "";
                                    }
                                    echo '<option value="' . urlencode($dateObj) . '"' . $yearActive . '>' . $dateObj . '</option>';
                                }
                            ?>   
                        </select>
                    </div> <!-- //.col -->
                    <div class="filter-col filter-col--small">
                        <input type="number" min="0" name="min" value="<?php echo $queryMin; ?>" class="form-control" placeholder="(₽) От:">
                    </div> <!-- //.col -->
                    <div class="filter-col filter-col--small">
                        <input type="number" min="0" name="max" value="<?php echo $queryMax; ?>" class="form-control" placeholder="(₽) До:">
                    </div> <!-- //.col -->


                    <div class="filter-col">
                        <button type="submit" class="btn btn-default">Подобрать</button>
                    </div> <!-- //.col -->
                </div> <!-- //.form-row -->
            </form> <!-- //.filters-form -->

            <div class="filter-bottom">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-5">
                        <div class="find">
                            По Вашему запросу найдено: <?php echo $objects->found_posts; ?> объекта
                        </div> <!-- //.find -->
                    </div> <!-- //.col -->
                    <div class="col-12 col-md-2">
                        <a href="<?php echo get_permalink(); ?>" class="link-grey">Сбросить фильтр</a>
                    </div> <!-- //.col -->
                </div> <!-- //.row -->
            </div> <!-- //.filter-bottom -->
        </section> <!-- //.section-catalog-filter -->







        <div class="filter-result">

            <?php if ($objects->posts) : ?>
                <?php foreach ( $objects->posts as $post ) : setup_postdata( $post ); ?>

                    <?php 
                        get_template_part('/includes/object-sample-jk');
                    ?>

                <?php endforeach; wp_reset_postdata(); ?>

            <?php else : ?>
                <div class="emptyblock my-5 pt-5 text-center">
                    <div class="emptyblock__img h1"><span class="lnr lnr-apartment"></span></div>
                    <div class="h1">По запросу объектов не найдено</div>
                    <div class="my-5">
                        <a href="/build-catalog/" class="btn btn-default">Сбросить фильтр</a>
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

            $('#filterBlock select').on('change', function(e){
                $('#filterBlock select').not(this).prop('selectedIndex',0);
            });

        });
    }(jQuery));
    </script>







    <?php get_footer(); ?>