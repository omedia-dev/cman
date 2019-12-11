<?php

/**
 * Template Name: Front Page
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */
get_header();

// Hero Search

?>

<section class="section-filters">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <!--  <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol> -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/slider_bg.jpg'; ?>" class="d-block w-100" alt="...">
      </div>
    </div>
  </div> <!-- //.carousel -->

  <div class="filters-wrapper">
    <div class="container">
      <div class="box">
        <h1><?php the_field('front-line1'); ?></h1>
        <?php get_template_part('/includes/home-hero-search'); ?>
      </div> <!-- //.box -->
    </div> <!-- //.container -->
  </div> <!-- //.filters-wrapper -->
</section> <!-- //.section-filters -->

<section class="section section-promo">
  <div class="container">
    <h2><?php the_field('front-line2'); ?></h2>
    <div class="row">
      <?php if (have_rows('front-sale')) : ?>
        <?php while (have_rows('front-sale')) : the_row(); ?>
          <div class="col-md-6">
            <div class="promo-item" style="background: url(<?php the_sub_field('img') ?>) no-repeat bottom right; background-size: cover;">
              <div class="promo-wrap">
                <p><?php the_sub_field('text') ?></p>
                <a href="<?php the_sub_field('url') ?>" class="btn btn-default" target="_blank" <?php the_sub_field('data'); ?>>
                  <?php the_sub_field('button') ?>
                </a>
              </div> <!-- //.promo-wrap -->
            </div> <!-- //.promo-item -->
          </div> <!-- //.col-md-6 -->
        <?php endwhile; ?>
      <?php endif; ?>
    </div> <!-- //.row -->
    <!-- <div class="text-right">
          <a href="/novostroy/" class="link-underline mt-5 d-inline-block"><span>Все акции</span></a>
        </div> -->
  </div> <!-- //.container -->
</section> <!-- //.section-promo -->





<section class="section-services py-5">
  <div class="container">
    <h2><?php the_field('front-services-title'); ?></h2>
    <div class="section-tabs">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <?php if (have_rows('service')) : ?>
            <?php while (have_rows('service')) : the_row(); ?>
              <a
                class="nav-item nav-link <?php if (get_row_index() == 2) { echo 'active';}; ?>" 
                id="serv-link-<?php echo get_row_index(); ?>" 
                data-toggle="tab" 
                href="#serv-tab-<?php echo get_row_index(); ?>" 
                role="tab" 
                aria-controls="nav-arenda" 
                aria-selected="true">
                  <?php the_sub_field('title') ?>
              </a>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <?php if (have_rows('service')) : ?>
          <?php while (have_rows('service')) : the_row(); ?>
            <div 
              class="tab-pane fade <?php if (get_row_index() == 2) { echo 'show active'; }; ?>"
              id="serv-tab-<?php echo get_row_index(); ?>"
              role="tabpanel">
                <h3><?php the_sub_field('h1'); ?></h3>
                <?php the_sub_field('description'); ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div> <!-- //.container -->
</section> <!-- //.section-services -->






<?php
if((int)get_field('best-size')){
  $best_size = (int)get_field('best-size');
} else {
  $best_size = 2;
}
$best_args = array(
  'numberposts' => $best_size, // количество выводимых постов - все
  'post_status' => 'publish', // статус поста - любой
  'post_type' => array('nedv_sale', 'nedv_arenda', 'nedv_new'),
  'order' => 'ASC',
  'meta_query' => [
    'relation' => 'AND',
    array(
      'key'     => 'bestof',
      'value' => '1',
    ),
  ],
);

$bests = get_posts($best_args);

if ($bests) : ?>
  <section class="section-objects">
    <div class="container">
      <h2><?php the_field('best'); ?></h2>
      <div class="row">
        <?php foreach ($bests as $post) : setup_postdata($post); ?>
          <div class="col-md-6 mb-4">
            <div class="object-item">
              <div class="row">
                <div class="col-md-6">
                  <a target="_blank" href="<?php echo get_permalink(); ?>" class="object-img">
                    <?php
                      if (get_field('dom-gallery-type') == "url") {
                        $galleryRepeater = get_field('dom-gallery-url');
                        echo '<img src="' . $galleryRepeater[0]['url'] . '" alt="Изображение" class="img-fluid">';
                      } else {
                        $main_img = get_field('dom-gallery')[0];
                        echo wp_get_attachment_image($main_img, 'catalog-thumbs', false, array('class' => 'img-fluid'));
                      }
                    ?>
                  </a>
                </div> <!-- //.col-6 -->
                <div class="col-md-6">
                  <div class="d-flex justify-content-center flex-column object-info pr-3">
                    <h3><?php the_field('dom-title'); ?></h3>
                    <dl>
                      <dt>Локация:</dt>
                      <dd><?php echo get_field('dom-address'); ?></dd>
                    </dl>
                    <dl>
                      <dt>Цена:</dt>
                      <dd><?php echo number_format((int) get_field('dom-price'), 0, ",", " "); ?> руб.</dd>
                    </dl>
                    <a target="_blank" href="<?php echo get_permalink(); ?>" class="link-underline mt-3"><span>Подробнее об объекте</span></a>
                  </div> <!-- //.object-info -->
                </div> <!-- //.col-6 -->
              </div> <!-- //.row -->
            </div> <!-- //.object-item -->
          </div> <!-- //.col-6 -->
        <?php endforeach; wp_reset_postdata(); // сброс  ?>

      </div> <!-- //.row -->
      <p class="text-center h5 pt-4" style="font-weight:300;"><?php the_field('best-bottom'); ?></p>
      <a href="/catalog/" class="btn btn-default mt-3"><?php the_field('best-bottom-button'); ?></a>

      <!-- <a href="#" class="btn btn-default popmake-3856 popmake-free-call">Смотреть полный каталог квартир</a> -->
    </div> <!-- //.container -->
  </section> <!-- //.section-objects -->
<?php endif; ?>




<?php if (have_rows('feat')) : ?>
<section class="section-features py-5">
  <div class="container">
    <h2><?php the_field('feat-title'); ?></h2>
    <div class="row">

      <?php while (have_rows('feat')) : the_row(); ?>
      <div class="col-md-4 mb-5">
        <div class="bg-grey">
          <div class="row feature-item">
            <div class="col-3 col-md-3">
              <img src="<?php the_sub_field('icon'); ?>" alt="" class="float-md-left">
            </div>
            <div class="col-8 col-md-9">
              <h4><?php the_sub_field('title'); ?></h4>
              <p><?php the_sub_field('descr'); ?></p>
            </div>
          </div>
        </div> <!-- //.bg-grey -->
      </div> <!-- //.col -->
      <?php endwhile; ?>

    </div> <!-- //.row -->
  </div> <!-- //.container -->
</section> <!-- //.section-features -->
<?php endif; ?>




<section class="section-news">
  <div class="container">
    <h2><?php the_field('news-title'); ?></h2>
    <div class="row">
      <?php
      // Вывод списка новостей
      $news_post = get_posts(array(
        'numberposts' => 3,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'news',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
      ));

      foreach ($news_post as $post) {
        setup_postdata($post); ?>
        <div class="col-md-4 mb-3">
          <div class="news-item">
            <a href="<?php echo get_permalink(); ?>" class="news-img">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
              <div class="date">
                <?php the_date('d.m.Y', '', ''); ?>
              </div> <!-- //.date -->
            </a> <!-- //.news-img -->
            <div class="news-title custom-news-title">
              <h3><?php the_title('', ''); ?></h3>
              <p>
                <?php echo wp_strip_all_tags(get_the_content(false, false)); ?>
                <a href="<?php echo get_permalink(); ?>" class="link-underline ml-2"><span>Читать далее</span></a>
              </p>
            </div> <!-- //.news-title -->
          </div> <!-- //.news-item -->
        </div> <!-- //.col -->
      <?php }
      wp_reset_postdata(); // сброс
      ?>

    </div> <!-- //.row -->
    <a href="/allnews/" class="link-underline float-right"><span>Все новости</span></a>
  </div> <!-- //.container -->
</section> <!-- //.section-news -->



<!-- //Hero Search -->
<?php


get_footer(); ?>