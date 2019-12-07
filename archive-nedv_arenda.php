<?php

/**
 * Данный шаблон нужен для вывода списка всех объектов под прожажу
 */
get_header();


$filter_array = array('relation' => 'AND',);



//Переменные фитрации
$filter_type = 0; //тип недвижимости (1 - квартира, 2 - дом/коттедж, 3 - таунхауз)
$filter_new = 0; //новостройка/вторичка (0 - не выбрано, 1 - новостройка, 2 - вторичка)
$filter_flat = 0; //Чсло комнат в квартире
$price_min = ""; //минимальная цена
$price_max = ""; //максимальная цена



/* Фильтрация типа недвижимости
* Тип GET аттрибута "type". Переменная - $filter_type.
* Может принимать численные значения 1,2,3
*/
if( isset($_GET["type"]) && strip_tags ($_GET["type"]) != ""){
  $filter_type = (int) strip_tags ($_GET["type"]);
  switch ( $filter_type ) {
    case 1:
        $filter_type_label = 'Квартира';
        break;
    case 2:
        $filter_type_label = array('Дом', 'Коттедж');
        break;
    case 3:
        $filter_type_label = 'Таунхаус';
        break;
        default:
        $filter_type_label = 'Квартира';
  }
  array_push($filter_array, array(
    'key'   => 'dom-type',
    'value' => $filter_type_label,
  ));
}




/* Фильтрация числа комнат
* Тип GET аттрибута "new". Переменная - $filter_new.
* Может принимать численные значения 1,2,3
*/
if( $filter_type == 1 && isset($_GET["new"]) && strip_tags ($_GET["new"]) != ""){
  $filter_new = (int) strip_tags ($_GET["new"]);
  switch ( $filter_new ) {
    case 1:
        $filter_new_label = 'Новостройка';
        break;
    case 2:
        $filter_new_label = array('Вторичка', 'Сталинский', 'Хрущевский');
        break;
    default:
        $filter_flat_label = '';
  }
  array_push($filter_array, array(
    'key'     => 'dom-type-flat_dom-style',
    'compare' => '=',
    'value'   => $filter_new_label,
  ));
}







/* Фильтрация числа комнат
* Тип GET аттрибута "rooms". Переменная - $filter_flat.
* Может принимать численные значения 1,2,3
*/
if( $filter_type == 1 && isset($_GET["rooms"]) && strip_tags ($_GET["rooms"]) != ""){
  $filter_flat = (int) strip_tags ($_GET["rooms"]);
  switch ( $filter_flat ) {
    case 1:
        $filter_flat_label = '1-комн. квартира';
        break;
    case 2:
        $filter_flat_label = '2-комн. квартира';
        break;
    case 3:
        $filter_flat_label = '3-комн. квартира';
        break;
    case 4:
        $filter_flat_label = array('4-комн. квартира', '5-комн. квартира', 'Более 5-комнат', 'Студия', 'Своб. планировка');
        break;
    default:
        $filter_flat_label = '1-комн. квартира';
  }
  array_push($filter_array,   array(
    'key'     => 'dom-type-flat_dom-rooms',
    'compare' => '=',
    'value'   => $filter_flat_label,
  ));
}



/* Фильтрация по цене
* Тип GET аттрибута "type". Переменная - $filter_type.
* Может принимать численные значения 1,2,3
*/
if( isset($_GET["min"]) && strip_tags($_GET["min"]) != "" ){
  $price_min = (int) strip_tags ($_GET["min"]);

  array_push($filter_array,   array(
    'key'     => 'dom-price',
    'compare' => '>=',
    'type'    => 'numeric',
    'value'   => $price_min,
    // сравнивается до бесконечности по умолчанию. Если же цена "до" определна мы перепишем это условие ниже:
  ));
}

if( isset($_GET["max"]) && strip_tags($_GET["max"]) != "" ){
  $price_max = (int) strip_tags ($_GET["max"]);

  array_push($filter_array,   array(
    'key'     => 'dom-price',
    'compare' => 'BETWEEN',
    'type'    => 'numeric',
    'value'   => array( (int) $price_min, $price_max),
    //если цена "от" не определна - то она равна пустой строке определенной вначале. Здесь она приводится к 0
  ));
}










global $query_string;
global $wp_query;

parse_str($query_string, $args);


$args['meta_query'] = array( $filter_array );


query_posts($args);

?>

<pre>
  <?php //print_r($wp_query); ?>
</pre>


<div class="container inner-page">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
      <li class="breadcrumb-item"><a href="/kupit-nedvizhimost/" class="link-default">Каталог недвижимости </a></li>
      <li class="breadcrumb-item active" aria-current="page">Арендовать недвижимость</li>
    </ol>
  </nav>

  <h1 class="page-title">Арендовать недвижимость</h1>

  <?php get_template_part('/includes/banners'); ?>

  <div class="section-tabs red">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link" id="nav-arenda-tab" href="/nedv_sale/" role="tab" aria-controls="nav-arenda" aria-selected="true">Купить</a>
        <a class="nav-item nav-link" id="nav-sdavat-tab" href="/prodat-nedvizhimost/" role="tab" aria-controls="nav-sdavat" aria-selected="false">Продать</a>
        <a class="nav-item nav-link active" id="nav-kupit-tab" href="/nedv_arenda/" role="tab" aria-controls="nav-kupit" aria-selected="false">Арендовать</a>
        <a class="nav-item nav-link" id="nav-prodat-tab" href="/sdat-v-arendu/" role="tab" aria-controls="nav-prodat" aria-selected="false">Сдать в аренду</a>
      </div>
    </nav>
  </div> <!-- //.section-tabs -->





  <section class="section-catalog-filter">
    <form action="" class="filter-form" method="GET">
      <div class="form-row justify-content-center">
        <div class="col-md-2">
          <select name="type" class="custom-select">
            <option value="" hidden disabled <?php if($filter_type == 0) echo 'selected'; ?>>Тип недвижимости</option>
            <option value="1" <?php if($filter_type == 1) echo 'selected'; ?>>Квартиру</option>
            <option value="2" <?php if($filter_type == 2) echo 'selected'; ?>>Дом / Коттедж</option>
            <option value="3" <?php if($filter_type == 3) echo 'selected'; ?>>Таунхаус</option>
          </select>
        </div> <!-- //.col -->
        <div class="col-md-2">
          <select name="new" class="custom-select" <?php if($filter_type != 1 && $filter_type != 0) echo 'disabled'; ?>>
            <option value="" hidden disabled <?php if($filter_new == 0) echo 'selected'; ?>>Характеристика</option>
            <option value="1" <?php if($filter_new == 1) echo 'selected'; ?>>В новостройке</option>
            <option value="2" <?php if($filter_new == 2) echo 'selected'; ?>>Вторичку</option>
          </select>
        </div> <!-- //.col -->
        <div class="col-md-2">
          <select name="rooms" class="custom-select" <?php if($filter_type != 1 && $filter_type != 0) echo 'disabled'; ?>>
            <option value="" hidden disabled <?php if($filter_flat == 0) echo 'selected'; ?>>Число комнат</option>
            <option value="1" <?php if($filter_flat == 1) echo 'selected'; ?>>1-комнатную</option>
            <option value="2" <?php if($filter_flat == 2) echo 'selected'; ?>>2-комнатную</option>
            <option value="3" <?php if($filter_flat == 3) echo 'selected'; ?>>3-комнатную</option>
            <option value="4" <?php if($filter_flat == 4) echo 'selected'; ?>>Больше 3-х</option>
          </select>
        </div> <!-- //.col -->
        <div class="col-md-2">
          <input type="number" min="0" name="min" value="<?php echo $price_min; ?>" class="form-control" placeholder="(₽) От:">
        </div> <!-- //.col -->
        <div class="col-md-2">
          <input type="number" min="0" name="max" value="<?php echo $price_max; ?>" class="form-control" placeholder="(₽) До:">
        </div> <!-- //.col -->
        <!-- <div class="col-md-2">
          <select class="custom-select">
            <option value="0">В районе:</option>
            <option value="1">Большие Выселки</option>
          </select>
        </div> -->
        <div class="col-md-2">
          <button type="submit" class="btn btn-default">Подобрать</button>
        </div> <!-- //.col -->
      </div> <!-- //.form-row -->
    </form> <!-- //.filters-form -->
    <div class="filter-bottom">
      <div class="row">
        <div class="col-12 col-md-5">
          <div class="find">
            По Вашему запросу найдено: <?php echo $wp_query->post_count; ?> объекта
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
          <a href="<?php echo get_post_type_archive_link( 'nedv_arenda' ); ?>" class="link-grey">Сбросить фильтр</a>
        </div> <!-- //.col -->
      </div> <!-- //.row -->
    </div> <!-- //.filter-bottom -->
  </section> <!-- //.section-catalog-filter -->


  <ul class="filter-result">


    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part('/includes/object-sample'); ?>

      <?php endwhile; ?>
      <?php else: ?>    
        <div class="emptyblock my-5 pt-5 text-center">
          <div class="emptyblock__img h1"><span class="lnr lnr-apartment"></span></div>
          <div class="h1">По запросу объектов не найдено</div>
          <div class="my-5">
            <a href="<?php echo get_post_type_archive_link( 'nedv_arenda' ); ?>" class="btn btn-default">Сбросить фильтр</a>
          </div>
        </div>
      <?php endif; ?>


  </ul> <!-- //.filter-result -->
  <div class="mt-5 mb-5">
    <?php the_posts_pagination(array(
      'show_all'     => false, // показаны все страницы участвующие в пагинации
      'end_size'     => 4,     // количество страниц на концах
      'mid_size'     => 4,     // количество страниц вокруг текущей
      'prev_next'    => true,
      'prev_text'    => __('«'),
      'next_text'    => __('»'),
      'type'         => 'list',
    )); ?>
  </div>
</div> <!-- //.container -->
<?php get_footer(); ?>