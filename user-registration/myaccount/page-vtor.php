<?php
/**
 * Template Name: Вторичка
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */
 
if (!empty($_GET['search-listings'])) {
	get_template_part('search-listings');
	return;
}

$ct_mode = isset( $ct_options['ct_mode'] ) ? esc_html( $ct_options['ct_mode'] ) : '';
$ct_rev_slider = isset( $ct_options['ct_home_rev_slider_alias'] ) ? esc_html( $ct_options['ct_home_rev_slider_alias'] ) : '';
$ct_home_adv_search_style = isset( $ct_options['ct_home_adv_search_style'] ) ? $ct_options['ct_home_adv_search_style'] : '';
$ct_hero_search_heading = isset( $ct_options['ct_hero_search_heading'] ) ? esc_html( $ct_options['ct_hero_search_heading'] ) : '';
$ct_hero_search_sub_heading = isset( $ct_options['ct_hero_search_sub_heading'] ) ? esc_html( $ct_options['ct_hero_search_sub_heading'] ) : '';
$ct_cta = isset( $ct_options['ct_cta'] ) ? $ct_options['ct_cta'] : '';
$ct_cta_bg_img = isset( $ct_options['ct_cta_bg_img']['url'] ) ? esc_url( $ct_options['ct_cta_bg_img']['url'] ) : '';
$ct_cta_bg_color = isset( $ct_options['ct_cta_bg_color'] ) ? esc_html( $ct_options['ct_cta_bg_color'] ) : '';
$ct_hero_search_bg_video_placeholder = isset( $ct_options['ct_hero_search_bg_video_placeholder']['url'] ) ? esc_html( $ct_options['ct_hero_search_bg_video_placeholder']['url'] ) : '';
$ct_hero_search_bg_video = isset( $ct_options['ct_hero_search_bg_video']['url'] ) ? esc_html( $ct_options['ct_hero_search_bg_video']['url'] ) : '';

$layout = isset( $ct_options['ct_home_layout']['enabled'] ) ? $ct_options['ct_home_layout']['enabled'] : '';

get_header();

// Hero Search

?>


<div class="container inner-page">
      
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
          <li class="breadcrumb-item"><a href="/kupit-nedvizhimost/" class="link-default">Каталог недвижимости </a></li>
          <li class="breadcrumb-item"><a href="/kupit-nedvizhimost/" class="link-default">Купить недвижимость</a></li>
          <li class="breadcrumb-item active" aria-current="page">Квартира 3-х комнатная 98м<sup>2</sup></li>
        </ol>
      </nav>

      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/apartment1.jpg" alt="" class="img-fluid mb-5 object-temp-img">

      <div class="object-header d-flex justify-content-between">
        <h1 class="object-title">Квартира 3-х комнатная 98м<sup>2</sup></h1>
        <div class="price">
          8 000 000 <span class="currency">руб.</span>
        </div> <!-- //.price -->
      </div> <!-- //.object-header -->

      <div class="object-location">
        <span>
          <a href="#" class="link-default">ЖК "Эталон-Сити"</a>, Б6, сдан<br>
          Москва, ЮЗАО, р-н Южное Бутово, ул. Поляны, 5
        </span>
        <a href="#" class="link-grey">Посмотреть на карте</a>
      </div> <!-- //.object-location -->

      <ul class="object-main-info">
        <li>Общая площадь: <span>98 м<sup>2</sup></span></li>
        <li>Жилая площадь: <span>64 м<sup>2</sup></span></li>
        <li>Площадь кухни: <span>12 м<sup>2</sup></span></li>
        <li>Этаж: <span>13/13</span></li>
      </ul> <!-- //.object-main-info -->

      <div class="object-description">
        <p>Ключи сразу после оплаты. Стоимость указана без учета СКИДКИ и АКЦИЙ. Бесплатная регистрация договора; Покупателю ПОДАРОЧНЫЙ СЕРТИФИКАТ на мебель и технику от компании -партнера. Ипотека от ведущих банков; Рассрочка. </p>
        <p>Продается квартира 56,7 кв.м., комнаты 14,3 и 16.8 кв.м., кухня- гостиная 9,3 кв.м., окна с большой площадью остекления, на 6 этаже с панорамным видом на Москву в самом стильном ЖК бизнес- класса Эталон-Сити. ЖК отличается своей архитектурой: строительство комплекса выполняется с применение современных инженерных и строительных решений, используются только экологически чистые материалы. В архитектуре и дизайне ЖК Эталон-Сити отражено все лучшее из самых интересных городов мира. </p>
        <p>Территория комплекса огорожена, действует пропускная система, находится под круглосуточной охраной, видеонаблюдением, предусмотрены уютные дворы свободные от транспорта с благоустроенными прогулочными зонами. Есть возможность приобрести парковочное м/м , в подземном паркинге каждого из корпусов расположена автомойка, предусмотрены паркоматы для гостей комплекса. ЖК обеспечен всеми необходимыми социально-бытовыми учреждениями: магазины, супермаркеты, аптеки, салоны красоты расположены на первых этажах жилых домов.</p>
        <p>В шаговой доступности от ЖК Эталон-Сити находятся станции метро Улица Скобелевская , Бульвар Дмитрия Донского и Улица Старокачаловская , 5 школ и 7 детских садов. Кроме того в составе жилого комплекса будут построены собственные школа и детский сад. На расстоянии 680 м (8 мин. пешком) расположена Детская поликлиника 138, городские поликлиники для взрослых 99 и 14. </p>
        <p>На территории ЖК будет построен собственный фитнес-центр с бассейном. На расстоянии 700-800 метров (8-10 минут пешком) 3 фитнес-клуба: Паллада и Зебра , а также Фитнес-Гуру.На расстоянии 1-1,5 км (10 минут пешком ) расположены 2 крупных ТРЦ: Вива и Витте Молл.</p>
      </div> <!-- //.object-description -->

      <div class="section-object-info">
        <h3 class="section-title">Информация о квартире</h3>
        <div class="object-tabs">
           <nav>
             <div class="nav nav-tabs" id="nav-tab" role="tablist">
               <a class="nav-item nav-link d-sm-block d-block d-md-table-cell active" id="nav-arenda-tab" data-toggle="tab" href="#nav-arenda" role="tab" aria-controls="nav-arenda" aria-selected="true">Общая информация</a>
               <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="nav-sdavat-tab" data-toggle="tab" href="#nav-sdavat" role="tab" aria-controls="nav-sdavat" aria-selected="false">Информация о доме</a>
               <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="nav-kupit-tab" data-toggle="tab" href="#nav-kupit" role="tab" aria-controls="nav-kupit" aria-selected="false">Сведения о продавце</a>
             </div>
           </nav>
           <div class="tab-content" id="nav-tabContent">
             <div class="tab-pane fade show active" id="nav-arenda" role="tabpanel" aria-labelledby="nav-arenda-tab">
                <div class="row">
                  <div class="col-md-4">
                    <dl>
                      <dt>Тип жилья: </dt>
                      <dd>Вторичка</dd>
                    </dl>
                    <dl>
                      <dt>Количество комнат: </dt>
                      <dd>3 комнаты</dd>
                    </dl>
                    <dl>
                      <dt>Площадь комнат: </dt>
                      <dd>98 м<sup>2</sup></dd>
                    </dl>
                    <dl>
                      <dt>Этаж: </dt>
                      <dd>13</dd>
                    </dl>
                    <dl>
                      <dt>Этажей в доме: </dt>
                      <dd>18</dd>
                    </dl>
                    <dl>
                      <dt>Раздельный санузел: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Ремонт: </dt>
                      <dd>Косметический</dd>
                    </dl>
                    <dl>
                      <dt>Вид из окон: </dt>
                      <dd>Во двор</dd>
                    </dl>
                  </div> <!-- //.col-md-4 -->
                  <div class="col-md-4 offset-md-1">
                    <dl>
                      <dt>Охрана: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Консьерж: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Тип дома: </dt>
                      <dd>Панельный</dd>
                    </dl>
                    <dl>
                      <dt>Высота потолков: </dt>
                      <dd>2 метра</dd>
                    </dl>
                    <dl>
                      <dt>Этажей в доме: </dt>
                      <dd>18</dd>
                    </dl>
                    <dl>
                      <dt>Раздельный санузел: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Ремонт: </dt>
                      <dd>Косметический</dd>
                    </dl>
                    <dl>
                      <dt>Вид из окон: </dt>
                      <dd>Во двор</dd>
                    </dl>
                  </div> <!-- //.col-md-4 -->
                </div> <!-- //.row -->
             </div>
             <div class="tab-pane fade" id="nav-sdavat" role="tabpanel" aria-labelledby="nav-sdavat-tab">
               <div class="row">
                  <div class="col-md-4">
                    <dl>
                      <dt>Тип жилья: </dt>
                      <dd>Вторичка</dd>
                    </dl>
                    <dl>
                      <dt>Количество комнат: </dt>
                      <dd>3 комнаты</dd>
                    </dl>
                    <dl>
                      <dt>Площадь комнат: </dt>
                      <dd>98 м<sup>2</sup></dd>
                    </dl>
                    <dl>
                      <dt>Этаж: </dt>
                      <dd>13</dd>
                    </dl>
                    <dl>
                      <dt>Этажей в доме: </dt>
                      <dd>18</dd>
                    </dl>
                    <dl>
                      <dt>Раздельный санузел: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Ремонт: </dt>
                      <dd>Косметический</dd>
                    </dl>
                    <dl>
                      <dt>Вид из окон: </dt>
                      <dd>Во двор</dd>
                    </dl>
                  </div> <!-- //.col-md-4 -->
                  <div class="col-md-4 offset-md-1">
                    <dl>
                      <dt>Охрана: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Консьерж: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Тип дома: </dt>
                      <dd>Панельный</dd>
                    </dl>
                    <dl>
                      <dt>Высота потолков: </dt>
                      <dd>2 метра</dd>
                    </dl>
                    <dl>
                      <dt>Этажей в доме: </dt>
                      <dd>18</dd>
                    </dl>
                    <dl>
                      <dt>Раздельный санузел: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Ремонт: </dt>
                      <dd>Косметический</dd>
                    </dl>
                    <dl>
                      <dt>Вид из окон: </dt>
                      <dd>Во двор</dd>
                    </dl>
                  </div> <!-- //.col-md-4 -->
                </div> <!-- //.row -->
             </div>
             <div class="tab-pane fade" id="nav-kupit" role="tabpanel" aria-labelledby="nav-kupit-tab">
               <div class="row">
                  <div class="col-md-4">
                    <dl>
                      <dt>Тип жилья: </dt>
                      <dd>Вторичка</dd>
                    </dl>
                    <dl>
                      <dt>Количество комнат: </dt>
                      <dd>3 комнаты</dd>
                    </dl>
                    <dl>
                      <dt>Площадь комнат: </dt>
                      <dd>98 м<sup>2</sup></dd>
                    </dl>
                    <dl>
                      <dt>Этаж: </dt>
                      <dd>13</dd>
                    </dl>
                    <dl>
                      <dt>Этажей в доме: </dt>
                      <dd>18</dd>
                    </dl>
                    <dl>
                      <dt>Раздельный санузел: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Ремонт: </dt>
                      <dd>Косметический</dd>
                    </dl>
                    <dl>
                      <dt>Вид из окон: </dt>
                      <dd>Во двор</dd>
                    </dl>
                  </div> <!-- //.col-md-4 -->
                  <div class="col-md-4 offset-md-1">
                    <dl>
                      <dt>Охрана: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Консьерж: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Тип дома: </dt>
                      <dd>Панельный</dd>
                    </dl>
                    <dl>
                      <dt>Высота потолков: </dt>
                      <dd>2 метра</dd>
                    </dl>
                    <dl>
                      <dt>Этажей в доме: </dt>
                      <dd>18</dd>
                    </dl>
                    <dl>
                      <dt>Раздельный санузел: </dt>
                      <dd>Есть</dd>
                    </dl>
                    <dl>
                      <dt>Ремонт: </dt>
                      <dd>Косметический</dd>
                    </dl>
                    <dl>
                      <dt>Вид из окон: </dt>
                      <dd>Во двор</dd>
                    </dl>
                  </div> <!-- //.col-md-4 -->
                </div> <!-- //.row -->
             </div>
           </div>
         </div> <!-- //.object-tabs --> 
         <a href="#" class="btn btn-default">Получить данные продавца</a>
         <a href="#" class="link-default">Получить консультацию</a>
      </div> <!-- //.section-object-info -->
       

    </div> <!-- //.container -->

<!-- //Hero Search -->
<?php


get_footer(); ?>