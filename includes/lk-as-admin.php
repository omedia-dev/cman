<?php
    if( !function_exists('is_super_admin') || !is_super_admin() ){
        exit('error');
    }


    $countAll = "";
    $countFromXml = "";
    $countFromManual = "";
    $countModerate = "";
    $resultPost = false;
    $currentActive = 1;
    $post_status = 'publish';

    $currentPostType = 0;
    $post_types = array('nedv_sale', 'nedv_new', 'nedv_jk');

    
    $filter_array = array();




    // Типы постов
if( isset($_GET["posts"]) ){

    switch( (int)strip_tags($_GET["posts"]) ) {
        case 1:
            $currentPostType = 1;
            $post_types = array('nedv_sale');
            break;
        case 2:
            $currentPostType = 2;
            $post_types = array('nedv_new');
            break;
        case 3:
            $currentPostType = 3;
            $post_types = array('nedv_jk');
            break;
    }
    
}


//Страница аренды
if(get_the_ID() == 16){
    $currentPostType = 4;
    $post_types = array('nedv_arenda');
}







// Тип страницы
if( isset($_GET["type"]) ){

    switch( (int)strip_tags($_GET["type"]) ) {
        case 1:
            $currentActive = 1;
            break;
        case 2:
            $currentActive = 2;
            array_push($filter_array, array(
                'key'   => 'xml-feed',
                'compare' => '!=',
                'value' => "",
            ));
            break;
        case 3:
            array_push($filter_array, array(
                'key'   => 'xml-feed',
                'value' => "",
            ));

            //Проблемма с отображением жилых комплексов. Удаляем их
            foreach ($post_types as $key => $value) {
                if($value == "nedv_jk") {
                    unset($post_types[$key]);
                }
            }

            $currentActive = 3;
            break;
        case 4:
            $currentActive = 4;
            $post_status = 'pending';
            break;
    }
    
}









$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$searchargs = array(
    'posts_per_page' => 20,
    'post_type' => $post_types,
    'paged' => $paged,
    'orderby' => 'date',
    'post_status' => $post_status,
    'order' => 'DESC',
    // 'meta_key' => $order_meta_key,
    // 'orderby' => $order_by,
    'meta_query' => [
        'relation' => 'AND',
        $filter_array,
    ],
);

$objectsRes = new WP_Query( $searchargs );





// Обновляем счётчик
switch( $currentActive ) {
    case 1:
        $countAll = "(" . $objectsRes->found_posts . ")";
        break;
    case 2:
        $countFromXml = "(" . $objectsRes->found_posts . ")";
        break;
    case 3:
        $countFromManual = "(" . $objectsRes->found_posts . ")";
        break;
    case 4:
        $countModerate = "(" . $objectsRes->found_posts . ")";
        break;
}


?>


<!DOCTYPE html>
<html <?php if(!is_super_admin()) echo 'class="notSuperAdmin"'; ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php wp_head(); ?>

</head>

<body>

<pre>
<?php //print_r($objectsRes->found_posts); ?>
</pre>

    <header class="lk-header">
        <?php get_template_part('/includes/lk-header'); ?>
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="mainMenu">
                    <ul class="main-menu user-menu navbar-nav justify-content-between w-100">
                        <li class="nav-item"><a href="/lk/" class="nav-link">Личная информация</a></li>
                        <li class="nav-item <?php echo $currentPostType == 4 ? 'active': ""; ?>"><a href="/lk/rent-list/" class="nav-link">Объекты аренды</a></li>
                        <li class="nav-item <?php echo $currentPostType != 4 ? 'active': ""; ?>"><a href="/sale-list/" class="nav-link">Объекты продажи</a></li>
                        <li class="nav-item"><a href="/myfeeds/" class="nav-link">Управление XML</a></li>
                    </ul>
                </div>
            </div> <!-- //.container -->
        </nav>
    </header>




    <div class="main lk-wrapper">

        <div class="container inner-page">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
                    <li class="breadcrumb-item"><a href="/lk/" class="link-default">Личный кабинет</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Объекты продажи</li>
                </ol>
            </nav>


            <div class="section-tabs red lk-tabs">
                <nav>
                    <div class="nav nav-tabs" href="#">
                        <a class="nav-item nav-link <?php echo $currentActive == 1 ? 'active': ""; ?>" href="<?php echo add_query_arg(["type" => 1], get_permalink()); ?>">
                            Все объявления <?php echo $countAll; ?>
                        </a>
                        <a class="nav-item nav-link <?php echo $currentActive == 2 ? 'active': ""; ?>" href="<?php echo add_query_arg(["type" => 2], get_permalink()); ?>">
                            Добавлено из XML-фида <?php echo $countFromXml; ?>
                        </a>
                        <a class="nav-item nav-link <?php echo $currentActive == 3 ? 'active': ""; ?>" href="<?php echo add_query_arg(["type" => 3], get_permalink()); ?>">
                            Добавлено вручную <?php echo $countFromManual; ?>
                        </a>
                        <a class="nav-item nav-link <?php echo $currentActive == 4 ? 'active': ""; ?>" href="<?php echo add_query_arg(["type" => 4], get_permalink()); ?>">
                            Ожидают модерацию <?php echo $countModerate; ?>
                        </a>
                    </div>
                </nav>

                <?php if($currentPostType != 4): ?>
                <div class="btn-group btn-group-lg my-4 lk-button-group" role="group">
                    <a class="btn btn-light btn-group-lg <?php echo $currentPostType == 0 ? 'active': ""; ?>" href="<?php echo add_query_arg(["posts" => 0]); ?>">Всё</a>
                    <a class="btn btn-light btn-group-lg <?php echo $currentPostType == 1 ? 'active': ""; ?>" href="<?php echo add_query_arg(["posts" => 1]); ?>">Вторичное жильё</a>
                    <a class="btn btn-light btn-group-lg <?php echo $currentPostType == 2 ? 'active': ""; ?>" href="<?php echo add_query_arg(["posts" => 2]); ?>">Квартиры в новостройках</a>
                    <?php if($currentActive == 1): ?>
                        <a class="btn btn-light btn-group-lg <?php echo $currentPostType == 3 ? 'active': ""; ?>" href="<?php echo add_query_arg(["posts" => 3]); ?>">Жилые комплексы</a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <div class="tab-content" id="ad-tabContent">




                    <div class="tab-pane fade show active">


                        <ul class="filter-result">
                            <?php if ($objectsRes->posts) : ?>
                                <?php foreach ( $objectsRes->posts as $post ) : setup_postdata( $post ); ?>

                                    <?php
                                        if (get_post_type(get_the_ID()) == 'nedv_new') {
                                            get_template_part('/includes/object-sample-new');
                                        } elseif(get_post_type(get_the_ID()) == 'nedv_jk') {
                                            get_template_part('/includes/object-sample-jk');
                                        } else {
                                            get_template_part('/includes/object-sample');
                                        }
                                    ?>

                                <?php endforeach; wp_reset_postdata(); ?>
                            <?php else: ?>
                                <div class="emptyblock my-5 pt-5 text-center">
                                    <div class="emptyblock__img h1"><span class="lnr lnr-apartment"></span></div>
                                    <div class="h1">Объектов не найдено</div>
                                    <div class="my-5">
                                        <a href="/addnew/" class="btn btn-default">Добавить объявление</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </ul> <!-- //.filter-result -->

                    </div>
                </div>
            </div> <!-- //.section-tabs -->

            <div class="mt-5 mb-5 pagination">
            <?php
            echo paginate_links(array(
                'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'total'        => $objectsRes->max_num_pages,
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

    </div> <!-- //.main -->













    <?php


get_footer(); ?>