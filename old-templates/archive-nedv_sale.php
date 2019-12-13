<?php

/**
 * Данный шаблон нужен для вывода списка всех объектов под прожажу
 */
get_header();


global $query_string;

parse_str($query_string, $args);

// $args['meta_query'] = array(
//     array(
//         'key'   => 'kvart-flor',
//         'value' => '1',
//     ),
// );

query_posts($args);

?>


<div class="container inner-page">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
      <li class="breadcrumb-item"><a href="/kupit-nedvizhimost/" class="link-default">Каталог недвижимости </a></li>
      <li class="breadcrumb-item active" aria-current="page">Купить недвижимость</li>
    </ol>
  </nav>

  <h1 class="page-title">Купить недвижимость</h1>

  <?php get_template_part('/includes/banners'); ?>

  <div class="section-tabs red">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-arenda-tab" href="/nedv_sale/" role="tab" aria-controls="nav-arenda" aria-selected="true">Купить</a>
          <a class="nav-item nav-link" id="nav-sdavat-tab" href="/prodat-nedvizhimost/" role="tab" aria-controls="nav-sdavat" aria-selected="false">Продать</a>
          <a class="nav-item nav-link" id="nav-kupit-tab" href="/nedv_arenda/" role="tab" aria-controls="nav-kupit" aria-selected="false">Арендовать</a>
          <a class="nav-item nav-link" id="nav-prodat-tab" href="/sdat-v-arendu/" role="tab" aria-controls="nav-prodat" aria-selected="false">Сдать в аренду</a>
        </div>
      </nav>
    </div> <!-- //.section-tabs -->


  <ul class="filter-result">


    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part('/includes/object-sample'); ?>

      <?php endwhile; ?>
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