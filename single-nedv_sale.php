<?php


function testRules(){
    if(get_current_user_id() == get_post(get_the_ID())->post_author || is_super_admin() ){
       return true;
    }else{
        return false;
    }
}
function mydeleteLink($stage){
    if(get_post_status() == 'pending'){
        return get_permalink() . "&delete=" . $stage;
    }else{
        return get_permalink() . "?delete=" . $stage;
    }
}

if( isset($_GET['edit'])){
    if( ( testRules() && get_post_status() == 'pending') || is_super_admin() ){
        acf_form_head();
        $editAccess = true;
    }
} else {
    $editAccess = false;
}


$deleteAccess = false;
if( testRules() ){
    $deleteAccess = true;
}
if( isset($_GET['delete']) && $_GET['delete'] == "2" && $deleteAccess){
    wp_trash_post( get_the_ID(), false );
    wp_redirect('/lk/');
}


get_header();

?>
<div class="modal fade" id="map_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Адрес объекта</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
            <?php 
                $location = get_field('dom-markers');
                if( $location ): ?>
                    <div class="acf-map" data-zoom="12">
                        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                    </div>
                <?php else : ?>
                    <p class="py-3">Коодинаты места не добавлены</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<div class="container inner-page">
    
    <div class="row">
        <div class="col-12 col-md-8" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/" class="link-default">Главная</a>
                </li>
                <li class="breadcrumb-item active">
                    <?php the_field('dom-title'); ?>
                </li>
            </ol>
        </div>
        <div class="col-12 col-md-4 d-flex pb-4 pb-md-0">
            <?php echo do_shortcode('[favorite_button]'); ?>
        </div>
    </div>


    <?php if($editAccess) : ?>
    <h1 class="object-title">Редактирование: <?php the_field('dom-title'); ?></h1>
    <a href="<?php echo get_permalink(); ?>" class="btn btn-default mb-5 d-inline-block">Выйти из режима редактирования</a>
    <a href="<?php echo mydeleteLink(1); ?>" class="btn btn-default mb-5 ml-3 d-inline-block">Удалить объявление</a>
    <?php
        $options = array(
            'id' => 'acf-newobject',
            'html_updated_message'	=> '<div class="alert alert-success mb-4" role="alert">Обявление обновлено</div>',
            'post_id'=> false,
            'form' => true,
            'submit_value'	=> 'Обновить объявление',
            'post_title' => false,
            'html_submit_button' => '<input type="submit" class="acf-button btn btn-default btn-lg" value="%s" />',
        );
        acf_form($options);
    ?>
    <?php else : ?>


    <?php if( isset($_GET['delete']) && $_GET['delete'] == "1" && $deleteAccess): ?>
        <div class="alert alert-danger" role="alert">
            <p class="mb-3">Вы уверены, что хотите удалить это объявление?</p>
            <a href="<?php echo mydeleteLink(2); ?>" type="button" class="btn btn-danger mr-2">Удалить</a>
            <a href="<?php echo get_permalink(); ?>" type="button" class="btn btn-light">Отмена</a>
        </div>
    <?php endif; ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>



    <div class="swiper-container main-slider" id="mainDomSlider">
        <div class="swiper-wrapper">
        <?php if( get_field('dom-gallery-type') == "upload" ): ?>
            <?php foreach( get_field('dom-gallery') as $key => $image_id ): ?>
                <div class="swiper-slide">
                    <a class="glightboxLink" data-gallery="main1" href="<?php echo wp_get_attachment_image_url( $image_id, 'full' ) ?>">
                        <?php echo wp_get_attachment_image( $image_id, 'large' ); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <?php foreach( get_field('dom-gallery-url') as $key => $image_id ): ?>
                <div class="swiper-slide">
                    <a class="glightboxLink" data-gallery="main1" href="<?php echo $image_id['url'] ?>">
                        <?php echo '<img src="' . $image_id['url']. '" alt="Изображение" class="img-fluid">'; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <a href="#" class="main-slider__prev"><i class="fas fa-chevron-left"></i></a>
        <a href="#" class="main-slider__next"><i class="fas fa-chevron-right"></i></a>
    </div>
    <div class="main-slider__pag"><!-- pagination --></div>




    <div class="object-header d-flex justify-content-between">
        <h1 class="object-title first-caps"><?php the_field('dom-title'); ?></h1>
        <?php if (get_field('dom-price')) : ?>
            <div class="price">
                <?php echo number_format ( (int)get_field('dom-price'), 0, ",", " " ); ?> <span class="currency">руб.</span>
            </div> <!-- //.price -->
        <?php endif ?>
    </div> <!-- //.object-header -->



    <div class="object-location">
        <p>
            <span>
            <!-- <a href="#" class="link-default">ЖК "Эталон-Сити"</a>, Б6, сдан<br> Москва, ЮЗАО, р-н Южное Бутово, ул. Поляны, 5 -->
            <?php
            //Адрес
            $line2Text =    
                "г. " . get_field('dom-locality-name') .
                ", " . get_field('dom-address') . "<br>";
            echo $line2Text;

            //Метро
            if (get_field('dom-metro')){
                    print("Ближайшая ст. метро " . get_field('dom-metro'));
            }
            if (get_field('dom-time-on-foot')){
                print(" - " . get_field('dom-time-on-foot') . " мин. пешком" . "<br>");
            }
            //Шоссе
            if (get_field('dom-direction') && get_field('dom-distance')){
                $line4Text = "Шоссе: " . get_field('dom-direction') . " - " . get_field('dom-distance') . " км от МКАД" . "<br>";
                echo $line4Text;
            }

            $mainInfo = get_field('dom-type-flat');
            $houseInfo = get_field('dom-type-home');
            ?>
            </span>
        </p>
        <a href="#map_modal" class="link-grey" data-toggle="modal">Посмотреть на карте</a>
    </div> <!-- //.object-location -->

    <?php 
     
        if(mb_strtolower(trim(get_field('dom-type'))) == "квартира"){
            get_template_part('/includes/data-flat');
        }

        if( in_array( mb_strtolower( get_field('dom-type') ), array("дом", "таунхаус", "участок", "коттедж", "коммерческая") ) ) {
            get_template_part('/includes/data-home');
        }

    ?>


        <?php endwhile; ?>
    <?php endif; ?>



    <?php endif; //редактирование или просмотр ?>


</div> <!-- //.container -->

<?php


get_footer(); ?>