<?php
/**
 * Template Name: Новострой ЖК
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><html <?php language_attributes(); ?>><![endif]-->
<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <?php wp_head(); ?>

  <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

</head>

<body>

    
    <!-- Wrapper -->
    <div id="wrapper" >

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

        <?php do_action('before_main_content'); ?>

        <!-- Main Content -->
    <div id="main-content">

    <div class="gk-hero" style="background: url('<?php the_field('gk_img_main'); ?>') no-repeat center; background-size: cover;">
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

    <div class="gk-info">
      <div class="container">
        <h2 class="page-title">Информация о комплексе <?php the_field('gk_title'); ?></h2>
        <?php if (get_field('gk_from') && get_field('gk_to')): ?>
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
                  <?php the_field('gk_main_info'); ?>
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
         <a href="#" class="btn btn-default popmake-3856 popmake-free-call">Бесплатная консультация риэлтора</a>
         <!-- <a href="#" class="link-default">Перейти к списку квартир</a> -->
        
      </div> <!-- //.container -->
    </div> <!-- //.gk-info -->

    <div class="section-photogallery">
      <div class="container">
        <h2 class="page-title">Фотогалерея</h2>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile;?>
        <?php endif; ?>
      </div> <!-- //.container -->
    </div> <!-- //.section-photogallery -->

    <!-- <div class="section-for-sale">
      <div class="container">
        <h2 class="page-title">Квартиры на продажу</h2>
        <form action="#" class="filter-form">
          <div class="form-row justify-content-center">
            <div class="col-md-2">
              <select class="custom-select">
                <option value="1">Площадь</option>
                <option value="2">Площадь2</option>
              </select>
            </div> //.col
            <div class="col-md-1">
              <select class="custom-select">
                <option value="1">Этаж</option>
                <option value="2">Этаж2</option>
              </select>
            </div> //.col
            <div class="col-md-2">
              <select class="custom-select">
                <option value="1">1 комната</option>
                <option value="2">2 комнаты</option>
                <option value="2">3 комнаты</option>
              </select>
            </div> //.col
            <div class="col-md-auto">
              <div class="form-group">
                <label for="range_from">От:</label>
                <input type="text" class="form-control" id="range_from">
                <div class="range-wrap">
                  <div id="amount_range"></div>
                </div> //.range-wrap
              </div> //.form-group
            </div> //.col
            <div class="col-md-auto">
              <div class="form-group">
                <label for="range_to">До:</label>
                <input type="text" class="form-control" id="range_to">
              </div> //.form-group
            </div> //.col
            <div class="col-md-2">
              <button type="submit" class="btn btn-default">Показать</button>
            </div> //.col
          </div> //.form-row
        </form> //.filters-form
        <div class="filter-bottom">
          <div class="row">
            <div class="col-12 col-md-5">
              <div class="find">
                По Вашему запросу найдено: 242 объекта
              </div> //.find
            </div> //.col
            <div class="col-12 col-md-3">
              <div class="">
                Сортировка: <a href="#" class="link-default">по умолчанию</a>
              </div> //.
            </div> //.col
            <div class="col-12 col-md-2">
              <div class="">
                Выводить по: <a href="#" class="link-default">10</a>
              </div> //.
            </div> //.col
            <div class="col-12 col-md-2">
              <a href="#" class="link-grey">Сбросить фильтр</a> 
            </div> //.col
          </div> //.row
        </div> //.filter-bottom
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
              <tr onclick="location.href='/novostroy-single/'">
                <td scope="row">001</td>
                <td>2</td>
                <td>13</td>
                <td>5</td>
                <td>200 м<sup>2</sup></td>
                <td>140 000 руб.</td>
                <td>25 000 000 руб.</td>
              </tr>
              <tr onclick="location.href='/novostroy-single/'">
                <td scope="row">001</td>
                <td>2</td>
                <td>13</td>
                <td>5</td>
                <td>200 м<sup>2</sup></td>
                <td>140 000 руб.</td>
                <td>25 000 000 руб.</td>
              </tr>
              <tr onclick="location.href='/novostroy-single/'">
                <td scope="row">001</td>
                <td>2</td>
                <td>13</td>
                <td>5</td>
                <td>200 м<sup>2</sup></td>
                <td>140 000 руб.</td>
                <td>25 000 000 руб.</td>
              </tr>
              <tr onclick="location.href='/novostroy-single/'">
                <td scope="row">001</td>
                <td>2</td>
                <td>13</td>
                <td>5</td>
                <td>200 м<sup>2</sup></td>
                <td>140 000 руб.</td>
                <td>25 000 000 руб.</td>
              </tr>
              <tr onclick="location.href='/novostroy-single/'">
                <td scope="row">001</td>
                <td>2</td>
                <td>13</td>
                <td>5</td>
                <td>200 м<sup>2</sup></td>
                <td>140 000 руб.</td>
                <td>25 000 000 руб.</td>
              </tr>
              <tr onclick="location.href='/novostroy-single/'">
                <td scope="row">001</td>
                <td>2</td>
                <td>13</td>
                <td>5</td>
                <td>200 м<sup>2</sup></td>
                <td>140 000 руб.</td>
                <td>25 000 000 руб.</td>
              </tr>
              <tr onclick="location.href='/novostroy-single/'">
                <td scope="row">001</td>
                <td>2</td>
                <td>13</td>
                <td>5</td>
                <td>200 м<sup>2</sup></td>
                <td>140 000 руб.</td>
                <td>25 000 000 руб.</td>
              </tr>
              <tr onclick="location.href='/novostroy-single/'">
                <td scope="row">001</td>
                <td>2</td>
                <td>13</td>
                <td>5</td>
                <td>200 м<sup>2</sup></td>
                <td>140 000 руб.</td>
                <td>25 000 000 руб.</td>
              </tr>
            </tbody>
          </table>
        </div> //.table-responsive
        <nav aria-label="Page navigation">
          <ul class="pagination mt-5 mb-5">
            <li class="page-item"><a class="page-link" href="#"><</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">11</a></li>
            <li class="page-item"><a class="page-link" href="#">12</a></li>
            <li class="page-item"><a class="page-link" href="#">></a></li>
          </ul>
        </nav>
      </div> //.container
    </div> //.section-for-sale -->

    <!-- <div class="section-photogallery pt-5">
      <div class="container">
        <h2 class="page-title">Ход строительства</h2>
        <img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/img/apartment1.jpg" alt="" class="img-fluid mb-5 object-img">
      </div> //.container
    </div> //.section-photogallery -->

    <!-- <section class="section-faq mb-5 mt-5">
      <div class="container">
        <h2 class="page-title text-left">Частые вопросы про ЖК <?php //the_field('gk_title'); ?></h2>
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Как происходит процесс купли/продажи?
                </button>
              </h2>
            </div>
    
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <div class="inner">
                  Тут будет вступительный текст небольшой. В один абзац или два. Продается квартира 56,7 кв.м., комнаты 14,3 и 16.8 кв.м., кухня- гостиная 9,3 кв.м., окна с большой площадью остекления, на 6 этаже с панорамным видом на Москву в самом стильном ЖК бизнес- класса Эталон-Сити. ЖК отличается своей архитектурой: строительство комплекса выполняется с применение современных инженерных и строительных решений, используются только экологически чистые материалы. В архитектуре и дизайне ЖК Эталон-Сити отражено все лучшее из самых интересных городов мира. 
                </div> //.inner
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Как происходит процесс купли/продажи?
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <div class="inner">
                  Тут будет вступительный текст небольшой. В один абзац или два. Продается квартира 56,7 кв.м., комнаты 14,3 и 16.8 кв.м., кухня- гостиная 9,3 кв.м., окна с большой площадью остекления, на 6 этаже с панорамным видом на Москву в самом стильном ЖК бизнес- класса Эталон-Сити. ЖК отличается своей архитектурой: строительство комплекса выполняется с применение современных инженерных и строительных решений, используются только экологически чистые материалы. В архитектуре и дизайне ЖК Эталон-Сити отражено все лучшее из самых интересных городов мира. 
                </div> //.inner
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Как происходит процесс купли/продажи?
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <div class="inner">
                  Тут будет вступительный текст небольшой. В один абзац или два. Продается квартира 56,7 кв.м., комнаты 14,3 и 16.8 кв.м., кухня- гостиная 9,3 кв.м., окна с большой площадью остекления, на 6 этаже с панорамным видом на Москву в самом стильном ЖК бизнес- класса Эталон-Сити. ЖК отличается своей архитектурой: строительство комплекса выполняется с применение современных инженерных и строительных решений, используются только экологически чистые материалы. В архитектуре и дизайне ЖК Эталон-Сити отражено все лучшее из самых интересных городов мира. 
                </div> //.inner
              </div>
            </div>
          </div>
        </div>
      </div> //.container
    </section>//.section-faq -->
    
    <?php if (0/*get_filed('gk_docs_title') */): ?>
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