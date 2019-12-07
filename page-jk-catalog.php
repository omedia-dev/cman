<?php

/**
 * Template Name: Каталог ЖК основной
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
    'key'     => array('dom-title', 'dom-address','dom-locality-name', 'dom-metro'),
    'compare' => 'LIKE',
    'value'   => $loc,
 ));
}








$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$searchargs = array(
    'posts_per_page' => 10,
    'order' => "DESC",
    'orderby' => 'modified',
    'post_type' => 'nedv_jk',
    'paged' => $paged,
);

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


        <div class="filter-result">

            <?php if (1) : ?>
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