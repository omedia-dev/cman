<?php
/**
 * Template Name: Страница импорт новостроек
 *
 */
if( !is_super_admin() ){
    echo "error";
    exit();
}


function createJK($xmlObj){

    $gkSetting = array(
        'post_title'      => (string)$xmlObj->{'building-name'},
        'post_content'    => "",
        'comment_status'  => 'closed',
        'post_status'     => 'publish',
        'ping_status'     => 'closed',
        'post_author'     => 1,
        'post_name'       => 'new',
        'post_type'       => 'nedv_jk',
    );

    $newgkID = wp_insert_post($gkSetting);

    update_field( 'gk_title', (string)$xmlObj->{'building-name'}, $newgkID );

    update_field( 'gk_about', (string)$xmlObj->description, $newgkID );

    update_field( 'gk_location', (string)$xmlObj->location->{'locality-name'} . ', ' . (string)$xmlObj->location->{'address'}, $newgkID );


    $row1 = array(
        'title'   => 'Тип жилья',
        'content'  => 'Новострой',
    );

    $row2 = array(
        'title'   => 'Адрес',
        'content'  => (string)$xmlObj->location->{'locality-name'} . ', ' . (string)$xmlObj->location->{'address'},
    );
    
    $row3 = array(
        'title'   => 'Год постройки',
        'content'  => (string) $xmlObj->{'built-year'} . " (" . (string) $xmlObj->{'ready-quarter'} . ' квартал)',
    );

    $row4 = array(
        'title'   => 'Количество этажей',
        'content'  => (string) $xmlObj->{'floors-total'},
    );

    

    add_row( 'gk_main_feats', $row1, $newgkID );
    add_row( 'gk_main_feats', $row2, $newgkID );
    add_row( 'gk_main_feats', $row3, $newgkID );
    add_row( 'gk_main_feats', $row4, $newgkID );
    add_row( 'gk_main_feats', $row5, $newgkID );
    
    return $newgkID;

}







function create_new_flat($obj){
    $xml23 = $obj;
    
    //Заголовок объявления
    $new_post_itle =  "Квартира №" . (string) $xml23->location->apartment . ". ЖК: " . (string) $xml23->{'building-name'};
    
    $postSetting = array(
        'post_title'      => $new_post_itle,
        'post_content'    => "",
        'comment_status'  => 'closed',
        'post_status'     => 'publish',
        'ping_status'     => 'closed',
        'post_author'     => 1,
        'post_name'       => 'new',
        'post_type'       => 'nedv_new',
    );
    
    //Логика проверки есть ли пост
    if(isset( $_POST['feedurl'] )){
        update_field( 'xml-feed', urldecode($_POST['feedurl']), $newID );
    }
    $result = get_posts( array(
            'numberposts' => 1,
            'post_type' => array('nedv_sale', 'nedv_arenda', 'nedv_new'),
            'meta_key' => 'xml-offer-id',
            'meta_value' => (string)$xml23['internal-id'],
        )
    );
    if( !$result ){
        $newID = wp_insert_post($postSetting);
    } else {
        $postSetting['ID'] = $result[0]->ID;
        $newID = wp_update_post($postSetting);
    }
    
    update_field( 'xml-offer-id', (string)$xml23['internal-id'], $newID );
    //Проверка завершена

    update_field( 'dom-gallery-type', "url", $newID );
    
    $imgURL = $xml23->image[0];
    
    foreach ($xml23->image as $image_url) {
        if( $image_url['tag'] == "plan" ){
            $imgURL = $image_url;
        }
    }

    update_field( 'dom-gallery-url', trim((string) $imgURL), $newID );
    
    update_field( 'dom-rooms', (string) $xml23->rooms, $newID );
    
    update_field( 'dom-area', (string) $xml23->area->value, $newID );
    
    update_field( 'dom-living-space', (string)$xml23->{'living-space'}->value, $newID );
    
    update_field( 'dom-kitchen-space', (string)$xml23->{'kitchen-space'}->value, $newID );
    
    update_field( 'dom-renovation', (string)$xml23->renovation, $newID );
    
    update_field( 'dom-floor', (string)$xml23->floor, $newID );
    
    update_field( 'dom-floors-total', (string)$xml23->{'floors-total'}, $newID );
    
    update_field( 'dom-tall', (string) $xml23->{'ceiling-height'}, $newID );
    
    update_field( 'building-section', (string)$xml23->{'building-section'}, $newID );
    
    update_field( 'kvinjk-number', (string)$xml23->location->apartment, $newID );
    
    //Эти поля необходимы для фильтрации
    update_field( 'dom-type', 'квартира', $newID );
    update_field( 'dom-new', 'новостройка', $newID );
    update_field( 'filter-rooms', (string) $xml23->rooms, $newID );
    
    $jk_name = mb_strtolower(trim((string)$xml23->{'building-name'}));
    $result = get_posts( array(
            'numberposts' => 1,
            'post_type' => 'nedv_jk',
            'meta_key' => 'gk_title',
            'meta_value' => $jk_name,
        )
    );
    if( !$result ){
        $gk_ID = createJK($xml23);
    } else {
        $gk_ID = $result[0]->ID;
    }
    
    
    update_field( 'building-id', $gk_ID, $newID );
    
    update_field( 'built-year', (string)$xml23->{'built-year'}, $newID );
    
    update_field( 'ready-quarter', (string)$xml23->{'ready-quarter'}, $newID );
    
    update_field( 'dom-price', (string)$xml23->price->value, $newID );
    
    update_field( 'kvinjk-pricem', round(((int)$xml23->price->value) / ((float)$xml23->area->value)), $newID );
    
    update_field( 'mortgage', (string)$xml23->mortgage, $newID );
    
    //Вывод сообщения о результате
    if( !$result ){
        echo "Добавлен пост ID: " . $newID . ' <a href="' . get_the_permalink($newID) . '">' . get_the_title($newID) . '</a>' . "<br>";
    } else {
        echo "Обновлен пост ID: " . $newID . ' <a href="' . get_the_permalink($newID) . '">' . get_the_title($newID) . '</a>' . "<br>";
    }

}