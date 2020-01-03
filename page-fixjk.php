<?php

/**
 * Template Name: Обновление всех ЖК
 *
 */
if( !function_exists('is_super_admin')){
    exit('error');
}
if (!is_super_admin()) {
    wp_redirect("/lk/");
    exit();
}



$resultHtml = "";

$searchJk = array(
    'numberposts' => -1,
    'post_type' => 'nedv_jk',
    'post_status' => 'publish',
);

$objectsJk = get_posts( $searchJk );


foreach ($objectsJk as $key => $post) {

    $pid = $post->ID;

    $flatsInside = array(
        'numberposts' => -1, // количество выводимых постов - все
        'post_type' => 'nedv_new', // тип поста - любой
        'post_status' => 'publish', // статус поста - любой
        'meta_query' => [
          'relation' => 'AND',
          array(
            'key'     => 'building-id',
            'compare' => '=',
            'value'   => $pid,
          ),
        ],
      );
      $allFlats = get_posts($flatsInside);

      $dateBuid = "";
      $have1 = false;
      $have2 = false;
      $have3 = false;
      $have4 = false;
      $metro = "";
      $price = array();

      foreach ($allFlats as $key => $flat) {
        $currentRoom = get_field('dom-rooms', $flat->ID);


        switch ($currentRoom) {
            case '1':
                $have1 = true;
                break;
            case '2':
                $have2 = true;
                break;
            case '3':
                $have3 = true;
                break;
            case '4':
                $have4 = true;
                break;
            case '5':
                $have4 = true;
                break;
            case 'Больше':
                $have4 = true;
                break;
        }

        array_push($price, (int)get_field('dom-price', $flat->ID));


      }
      if(count($allFlats) > 1){
        $dateBuid = get_field('built-year', $allFlats[0]->ID) . "г. (" . get_field('ready-quarter', $allFlats[0]->ID) . "квартал)";
        $mapLocation = get_field('kvinjk-map', $allFlats[0]->ID);
        $addresLocation = get_field('kvinjk-addres', $allFlats[0]->ID);
      }

      if($have1){
        update_field( 'sysjk-1', 1, $pid );
      } else {
        update_field( 'sysjk-1', 0, $pid );
      }

      if($have2){
        update_field( 'sysjk-2', 1, $pid );
      } else {
        update_field( 'sysjk-2', 0, $pid );
      }

      if($have3){
        update_field( 'sysjk-3', 1, $pid );
      } else {
        update_field( 'sysjk-3', 0, $pid );
      }

      if($have4){
        update_field( 'sysjk-4', 1, $pid );
      } else {
        update_field( 'sysjk-4', 0, $pid );
      }

      if(isset($dateBuid)){
        update_field( 'sysjk-date', $dateBuid, $pid );
      }

      if(isset($mapLocation)){
        update_field( 'gk_maps', $mapLocation, $pid );
      }

      if(isset($addresLocation)){
        update_field( 'gk_location', $addresLocation, $pid );
      }

      if( count($price) > 1){
        update_field( 'gk_from', min($price), $pid );
        update_field( 'gk_to', max($price), $pid );
      }


      $resultHtml .= "<li class='list-group-item'>Обновлена информация по ЖК: " . $post->post_title . "</li>";

}












get_header();

?>
<div class="container inner-page mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php wp_title(""); ?></li>
        </ol>
    </nav>
    <div class="text">
    <h1 class="page-title">Обновление информации о ЖК завершено</h1>
    <div class="content">
      <p>Эта страница обновляет информацию о всех ЖК. Устанавливает минимальную и максимальную цену квартир, доступное число комнат, год (квартал) постройки дома, адрес и координаты ЖК на карте.</p>
    </div>
    <ul class="list-group">
    <?php echo $resultHtml; ?>
    </ul>




       


    </div>
</div>



<script>
    (function($) {
        'use strict';
        $(document).ready(function() {


        });
    }(jQuery));
</script>
<?php get_footer(); ?>