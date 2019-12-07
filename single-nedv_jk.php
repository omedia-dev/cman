<!DOCTYPE html>
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

    <header class="black-header">
      <div class="container">
        <div class="row justify-content-between">
          <a href="/" class="prev-step align-self-center">На сайт ЦМАН</a>
          <div class="info-block align-self-center">
            <span>По всем вопросам:</span>
            <a href="tel:+74951145445">+7 (495) 114-54-45</a>
          </div> <!-- //.info-block -->
        </div> <!-- //.row -->
      </div> <!-- //.container -->
    </header>

    <div class="clear"></div>

    <!-- Main Content -->
    <div id="main-content">
      <?php $main_img = wp_get_attachment_image_url(get_field('gk_img_main'), 'full', false); ?>
      <div class="gk-hero" style="background: url('<?php echo $main_img; ?>') #555 no-repeat center; background-size: cover;">
        <div class="container">
          <h1>
            Жилой комплекс <?php the_field('gk_title'); ?>
            <small><?php the_field('gk_subtitle'); ?></small>
          </h1>
        </div> <!-- //.container -->
      </div> <!-- //.gk-hero -->

      <div class="gk-description">
        <div class="container">
          <h2 class="page-title">О проекте</h2>
          <?php the_field('gk_about'); ?>


        </div> <!-- //.container -->
      </div> <!-- //.gk-description  -->
      <?php if (get_field('gk_feature_title_1') || get_field('gk_feature_title_2')) : ?>
        <div class="gk-features" style="background-image: url('<?php the_field('gk_img_tabs'); ?>'); background-color: rgba(0,0,0,0.5); background-repeat: no-repeat; background-position: center; background-size: cover; background-blend-mode: darken;">
          <div class="container">
            <div class="section-tabs red">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link" id="nav-arenda-tab" data-toggle="tab" href="#nav-arenda" role="tab" aria-controls="nav-arenda" aria-selected="true"><?php the_field('gk_feature_title_1'); ?></a>
                  <a class="nav-item nav-link active" id="nav-sdavat-tab" data-toggle="tab" href="#nav-sdavat" role="tab" aria-controls="nav-sdavat" aria-selected="false"><?php the_field('gk_feature_title_2'); ?></a>
                  <a class="nav-item nav-link" id="nav-kupit-tab" data-toggle="tab" href="#nav-kupit" role="tab" aria-controls="nav-kupit" aria-selected="false"><?php the_field('gk_feature_title_3'); ?></a>
                  <a class="nav-item nav-link" id="nav-prodat-tab" data-toggle="tab" href="#nav-prodat" role="tab" aria-controls="nav-prodat" aria-selected="false"><?php the_field('gk_feature_title_4'); ?></a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-arenda" role="tabpanel" aria-labelledby="nav-arenda-tab">
                  <div class="box">
                    <?php the_field('gk_feature_description_1'); ?>
                  </div> <!-- //.box -->
                </div>
                <div class="tab-pane fade show active" id="nav-sdavat" role="tabpanel" aria-labelledby="nav-sdavat-tab">
                  <div class="box">
                    <?php the_field('gk_feature_description_2'); ?>
                  </div> <!-- //.box -->
                </div>
                <div class="tab-pane fade" id="nav-kupit" role="tabpanel" aria-labelledby="nav-kupit-tab">
                  <div class="box">
                    <?php the_field('gk_feature_description_3'); ?>
                  </div> <!-- //.box -->
                </div>
                <div class="tab-pane fade" id="nav-prodat" role="tabpanel" aria-labelledby="nav-prodat-tab">
                  <div class="box">
                    <?php the_field('gk_feature_description_4'); ?>
                  </div> <!-- //.box -->
                </div>
              </div>
            </div> <!-- //.service-tabs -->

          </div> <!-- //.container -->
        </div> <!-- //.gk-features -->
      <?php endif; ?>

      <div class="gk-info">
        <div class="container">
          <h2 class="page-title">Информация о комплексе <?php the_field('gk_title'); ?></h2>
          <?php if (get_field('gk_from') && get_field('gk_to')) : ?>
            <h3>
              Стоимость квартир:<small> от</small> <b><?php the_field('gk_from'); ?></b> <small><b>руб.</b> до</small> <b><?php the_field('gk_to'); ?></b> <small><b>руб.</b></small>
            </h3><br>
          <?php endif ?>
          <div class="object-tabs">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link d-sm-block d-block d-md-table-cell active" id="nav-gk_main_info-tab" data-toggle="tab" href="#nav-gk_main_info" role="tab" aria-controls="nav-gk_main_info" aria-selected="true">Общая информация</a>
                <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="nav-gk_developer_info-tab" data-toggle="tab" href="#nav-gk_developer_info" role="tab" aria-controls="nav-gk_developer_info" aria-selected="false">Информация о застройщике</a>
                <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="nav-gk_dop_info-tab" data-toggle="tab" href="#nav-gk_dop_info" role="tab" aria-controls="nav-gk_dop_info" aria-selected="false">Информация о районе</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-gk_main_info" role="tabpanel" aria-labelledby="nav-arenda-tab">
                <div class="row">

                  <?php if (have_rows('gk_main_feats')) : ?>
                    <div class="col-12 col-md-6">
                      <?php while (have_rows('gk_main_feats')) : the_row(); ?>
                        <dl>
                          <dt><?php the_sub_field('title'); ?></dt>
                          <dd><?php the_sub_field('content'); ?></dd>
                        </dl>
                      <?php endwhile; ?>
                    </div>
                  <?php endif; ?>

                  <?php if (have_rows('gk_main_feats2')) : ?>
                    <div class="col-12 col-md-6">
                      <?php while (have_rows('gk_main_feats2')) : the_row(); ?>
                        <dl>
                          <dt><?php the_sub_field('title'); ?></dt>
                          <dd><?php the_sub_field('content'); ?></dd>
                        </dl>
                      <?php endwhile; ?>
                    </div>
                  <?php endif; ?>

                </div> <!-- //.row -->
              </div>
              <div class="tab-pane fade" id="nav-gk_developer_info" role="tabpanel" aria-labelledby="nav-gk_developer_info-tab">
                <div class="row">
                  <?php the_field('gk_developer_info'); ?>
                </div> <!-- //.row -->
              </div>
              <div class="tab-pane fade" id="nav-gk_dop_info" role="tabpanel" aria-labelledby="nav-gk_dop_info-tab">
                <div class="row">
                  <?php the_field('gk_dop_info'); ?>
                </div> <!-- //.row -->
              </div>
            </div>
          </div> <!-- //.object-tabs -->
          <a href="#" class="btn btn-default" data-hystmodal="#jsForm1Modal">Бесплатная консультация риэлтора</a>
          <!-- <a href="#" class="link-default">Перейти к списку квартир</a> -->

        </div> <!-- //.container -->
      </div> <!-- //.gk-info -->


      <?php
      $imagesDom = get_field('gk-photogallery');
      $sizeDom = 'large'; // (thumbnail, medium, large, full or custom size)
      if ($imagesDom) : ?>
        <div class="section-photogallery">
          <div class="container">
            <h2 class="page-title">Фотогалерея</h2>

            <div class="swiper-container main-slider" id="mainDomSlider">
              <div class="swiper-wrapper">
                <?php foreach ($imagesDom as $key => $image_id) : ?>
                  <div class="swiper-slide">
                    <a class="glightboxLink" data-gallery="main1" href="<?php echo wp_get_attachment_image_url($image_id, 'full') ?>">
                      <?php echo wp_get_attachment_image($image_id, $sizeDom); ?>
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
              <a href="#" class="main-slider__prev"><i class="fas fa-chevron-left"></i></a>
              <a href="#" class="main-slider__next"><i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="main-slider__pag">
              <!-- pagination -->
            </div>

          </div> <!-- //.container -->
        </div> <!-- //.section-photogallery -->
      <?php endif; ?>

      <?php

      $childs_args = array(
        'numberposts' => -1, // количество выводимых постов - все
        'post_type' => 'nedv_new', // тип поста - любой
        'post_status' => 'publish', // статус поста - любой
        'orderby' => 'meta_value_num',
        'meta_key' => 'kvinjk-number',
        'order' => 'ASC',
        'meta_query' => [
          'relation' => 'AND',
          array(
            'key'     => 'building-id',
            'compare' => '=',
            'value'   => get_the_ID(),
          ),
        ],
      );
      $childs = get_posts($childs_args);

      if ($childs) : ?>

        <div class="section-for-sale">
          <div class="container">
            <h2 class="page-title">Квартиры на продажу</h2>
            <!-- <form action="#" class="filter-form">
          <div class="form-row justify-content-center">
            <div class="col-md-2">
              <select class="custom-select">
                <option value="1">Площадь</option>
                <option value="2">Площадь2</option>
              </select>
            </div>
            <div class="col-md-1">
              <select class="custom-select">
                <option value="1">Этаж</option>
                <option value="2">Этаж2</option>
              </select>
            </div>
            <div class="col-md-2">
              <select class="custom-select">
                <option value="1">1 комната</option>
                <option value="2">2 комнаты</option>
                <option value="2">3 комнаты</option>
              </select>
            </div>
            <div class="col-md-auto">
              <div class="form-group">
                <label for="range_from">От:</label>
                <input type="text" class="form-control" id="range_from">
                <div class="range-wrap">
                  <div id="amount_range"></div>
                </div>
              </div>
            </div>
            <div class="col-md-auto">
              <div class="form-group">
                <label for="range_to">До:</label>
                <input type="text" class="form-control" id="range_to">
              </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-default">Показать</button>
            </div
          </div>
        </form> -->
            <div class="filter-bottom">
              <div class="row">
                <div class="col-12 col-md-5">
                  <div class="find">
                    По Вашему запросу найдено: <?php echo count($childs) ?> объекта
                  </div>
                </div>
                <!-- <div class="col-12 col-md-3">
              <div class="">
                Сортировка: <a href="#" class="link-default">по умолчанию</a>
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="">
                Выводить по: <a href="#" class="link-default">10</a>
              </div>
            </div>
            <div class="col-12 col-md-2">
              <a href="#" class="link-grey">Сбросить фильтр</a> 
            </div> -->
              </div>
            </div>


            <?php 

              //массив названий корпусов
              $bildingCorp = array();

              //Массив квартир в этих корпусах
              $bildingFlats = array();

              foreach ($childs as $post){

                if( !get_field('building-section', $post->ID)  ) continue;

                $flatInfo = array(
                  'url'     => get_permalink($post->ID),
                  'number'  => get_field('kvinjk-number', $post->ID),
                  'section' => get_field('building-section', $post->ID),
                  'floor'   => get_field('dom-floor', $post->ID),
                  'rooms'   => get_field('dom-rooms', $post->ID),
                  'area'    => get_field('dom-area', $post->ID),
                  'pricem'  => number_format((int) get_field('kvinjk-pricem', $post->ID), 0, ",", " "),
                  'price'   => number_format((int) get_field('dom-price', $post->ID), 0, ",", " "),
                );

                if( in_array( get_field('building-section', $post->ID), $bildingCorp ) ){

                  $index = array_search( get_field('building-section', $post->ID), $bildingCorp);

                  array_push($bildingFlats[$index], $flatInfo );

                } else {

                  array_push($bildingCorp, get_field('building-section', $post->ID));
                  array_push($bildingFlats, array( $flatInfo ));
                  

                }

              }            
            ?>
            <div class="fiter__corp nav nav-tabs" role="tablist">
              <?php foreach ($bildingCorp as $key=>$corp) : ?>
                <a data-toggle="tab" class="<?php if($key == 0): ?>active<?php endif; ?>" href="#nav-corp<?php echo $key; ?>" role="tab" aria-controls="nav-corp1"><?php echo $corp; ?></a>
              <?php endforeach; ?>
            </div>
            <!-- <pre><?php print_r($bildingFlats); ?></pre> -->


            <div class="tab-content" id="nav-tabContent">
              <?php foreach ($bildingCorp as $key=>$corp) : ?>
              <div class="tab-pane <?php if($key == 0): ?>fade show active<?php endif; ?>" id="nav-corp<?php echo $key; ?>" role="tabpanel">
                  <div class="table-responsive result-table">  
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">№</th>
                          <th scope="col">Корпус</th>
                          <th scope="col">Этаж</th>
                          <th scope="col">Комнат</th>
                          <th scope="col">Площадь</th>
                          <th scope="col">Стоимость за м<sup>2</sup></th>
                          <th scope="col">Стоимость</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($bildingFlats[$key] as $flat) : ?>

                          
                          <!-- <tr onclick="location.href='<?php echo $flat['url']; ?>'"> -->
                          <tr onclick="window.open('<?php echo $flat['url']; ?>', '_blank');">
                            <td scope="row"><?php echo $flat['number']; ?></td>
                            <td><?php echo $flat['section']; ?></td>
                            <td><?php echo $flat['floor']; ?></td>
                            <td><?php echo $flat['rooms']; ?></td>
                            <td><?php echo $flat['area']; ?> м<sup>2</sup></td>
                            <td><?php echo $flat['pricem']; ?> руб.</td>
                            <td><?php echo $flat['price']; ?> руб.</td>
                          </tr>

                        <?php wp_reset_postdata();
                          endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div><!-- //tab-pane -->
              <?php endforeach; ?>
            </div><!-- //tab-content -->



              
          </div>
        </div>

      <?php endif; ?>

      <?php if (0) : ?>
        <div class="section-photogallery pt-5">
          <div class="container">
            <h2 class="page-title">Ход строительства</h2>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/apartment1.jpg" alt="" class="img-fluid mb-5 object-img">
          </div>
        </div>
      <?php endif; ?>



      <?php
      $questions = get_field('gk-questions');
      if ($questions) : ?>
        <section class="section-faq mb-5 mt-5">
          <div class="container">
            <h2 class="page-title text-left">Частые вопросы про ЖК <?php //the_field('gk_title'); 
                                                                      ?></h2>
            <div class="accordion" id="accordionExample">

              <?php foreach ($questions as $key => $question) : ?>
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $key; ?>" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo $question['quest']; ?>
                      </button>
                    </h2>
                  </div>

                  <div id="collapse<?php echo $key; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="inner">
                        <?php echo $question['answer']; ?>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </section>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if (get_field('gk_docs_title')) : ?>
      <section class="section-faq mb-5 mt-5">
        <div class="container">
          <h2 class="page-title text-left">Скачать документы</h2>
          <div class="accordion" id="accordionDocs">
            <div class="card">
              <div class="card-header" id="headingDocs1">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDocs1" aria-expanded="true" aria-controls="collapseDocs1">
                    <?php the_field('gk_docs_title'); ?>
                  </button>
                </h2>
              </div> <!-- //.card-header -->
              <div id="collapseDocs1" class="collapse show" aria-labelledby="headingDocs1" data-parent="#accordionDocs">
                <div class="card-body">
                  <div class="inner pdf">
                    <?php the_field('gk_docs'); ?>
                  </div> <!-- //.inner -->
                </div> <!-- //.card-body -->
              </div> <!-- //.collapse -->
            </div> <!-- //.card -->
          </div> <!-- //.accordion -->
        </div> <!-- //.container -->
      </section><!-- //.section-faq -->
    <?php endif ?>

    </div> <!-- //.main -->


    <!-- //Hero Search -->
    <?php


    get_footer(); ?>