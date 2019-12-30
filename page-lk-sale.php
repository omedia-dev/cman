<?php
/**
 * Template Name: Личный кабинет (Продажа)
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */
if( !function_exists('is_super_admin') ){
  exit('error');
}
if( is_super_admin() ){
  get_template_part('/includes/lk-as-admin');
  exit();
}



$current_user = wp_get_current_user();

if($current_user->ID == 0){
  echo 'Доступ запрещен';
  return;
}

// Вывод активных обявлений
$publiced_post = get_posts(array(
  'numberposts' => -1,
  'category'    => 0,
  'orderby'     => 'date',
  'order'       => 'DESC',
  'include'     => array(),
  'exclude'     => array(),
  'meta_key'    => '',
  'meta_value'  => '',
  'post_type'   => 'nedv_sale',
  'post_status' => 'publish',
  'author'      => $current_user->ID,
  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
));


// Вывод обявлений на модерации
$nonpubliced_post = get_posts(array(
  'numberposts' => -1,
  'category'    => 0,
  'orderby'     => 'date',
  'order'       => 'DESC',
  'include'     => array(),
  'exclude'     => array(),
  'meta_key'    => '',
  'meta_value'  => '',
  'post_type'   => 'nedv_sale',
  'post_status' => 'pending',
  'author'      => $current_user->ID,
  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
));




?>
<!DOCTYPE html>
<html <?php if(!is_super_admin()) echo 'class="notSuperAdmin"'; ?>>
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><html <?php language_attributes(); ?>><![endif]-->

<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <?php wp_head(); ?>

  <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

</head>

<body>

  <!-- Wrapper -->
  <div id="wrapper">

    <header class="lk-header">
      <?php get_template_part('/includes/lk-header'); ?>
      <nav class="navbar navbar-expand-md">
        <div class="container">
          <!-- Collapsible content -->
          <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="main-menu user-menu navbar-nav justify-content-between w-100">
              <li class="nav-item"><a href="/lk/" class="nav-link">Личная информация</a></li>
              <li class="nav-item"><a href="/lk/rent-list/" class="nav-link">Объекты аренды</a></li>
              <?php if(is_super_admin()) : ?>
                <li class="nav-item active"><a href="/sale-list/" class="nav-link">Объекты продажи</a></li>
              <?php endif; ?>
              <li class="nav-item"><a href="/addnew/" class="btn btn-default">Добавить объявление</a></li>
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
            <div class="nav nav-tabs" id="ad-tab" role="tablist">
              <a class="nav-item nav-link active" id="ad_active-tab" href="#ad_active" data-toggle="tab" role="tab" aria-controls="ad_active" aria-selected="true">
                Активные объявления (<?php echo count($publiced_post); ?>)
              </a>
              <a class="nav-item nav-link" id="ad_moder-tab" href="#ad_moder" data-toggle="tab" role="tab" aria-controls="ad_moder" aria-selected="false">
                На модерации (<?php echo count($nonpubliced_post); ?>)
              </a>
              <!-- <a class="nav-item nav-link" id="ad_dismiss-tab" href="#ad_dismiss" data-toggle="tab" role="tab" aria-controls="ad_dismiss" aria-selected="false">
                Отклоненные объявления
              </a>
              <a class="nav-item nav-link" id="ad_archive-tab" href="#ad_archive" data-toggle="tab" role="tab" aria-controls="ad_archive" aria-selected="false">
                Объявления в архиве
              </a> -->
            </div>
          </nav>
          <div class="tab-content" id="ad-tabContent">




            <div class="tab-pane fade show active" id="ad_active" role="tabpanel" aria-labelledby="ad_active-tab">


              <ul class="filter-result">
                <?php if ($publiced_post) : ?>
                  <?php foreach ($publiced_post as $post) : setup_postdata($post) ?>

                    <?php get_template_part('/includes/object-sample'); ?>

                  <?php endforeach; ?>
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
            <div class="tab-pane fade" id="ad_moder" role="tabpanel" aria-labelledby="ad_moder-tab">

            <ul class="filter-result">

                <?php if ($nonpubliced_post) : ?>
                  <?php foreach ($nonpubliced_post as $post) : setup_postdata($post) ?>

                    <?php get_template_part('/includes/object-sample'); ?>

                  <?php endforeach; ?>
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


      </div> <!-- //.container -->

    </div> <!-- //.main -->
    <!-- //Hero Search -->
    <?php


    get_footer(); ?>