<?php


if( !function_exists('is_super_admin') || !is_super_admin() ){
    exit('error');
}


/* Version 2 */
/* Функция обеспечивает добавление/обновление поста вторички и всех полей */
function impfunc($obj){
    $xml23 = $obj;

    $new_post_title = "";
    $domLocation = (string) $xml23->location->{'locality-name'};
    if( (string) $xml23->location->{'sub-locality-name'} ){
        $domLocation .= ", " . (string) $xml23->location->{'sub-locality-name'};
    } elseif ( (string) $xml23->location->address ){
        $domLocation .= ", " . (string) $xml23->location->address;
    }
    
    if( mb_strtolower((string) $xml23->category) == "квартира" ){
        //Квартира
        $new_post_title  = (string) $xml23->rooms . '-комн. квартира, ' . $domLocation;
    } elseif ( in_array( mb_strtolower((string) $xml23->category), array("дом", "коттедж") ) ) {
    
        if( (string) $xml23->{'floors-total'} ){
            $florsTotal = (string) $xml23->{'floors-total'} . '-эт. ';
        } else {
            $florsTotal = "";
        }
    
        $new_post_title  = $florsTotal . (string) $xml23->category . ". " . $domLocation;
    
    } else {
    
        $new_post_title = (string) $xml23->category . ". " . $domLocation; 
    
    }

    $metaSuperArray = array();
    
    $postSetting = array(
        'post_title'      => $new_post_title,
        'post_content'    => "",
        'comment_status'  => 'closed',
        'post_status'     => 'publish',
        'ping_status'     => 'closed',
        'post_author'     => 1,
        'post_name'       => 'obj',
    );
    
    if( ((string) $xml23->type ) == "продажа" ){
        $postSetting['post_type'] = "nedv_sale";
    } else{
        $postSetting['post_type'] = "nedv_arenda";
    }


    //Логика проверки есть ли пост
    if(isset( $_POST['feedurl'] )){
        $metaSuperArray['xml-feed'] = urldecode($_POST['feedurl']);
    }

    $metaSuperArray['xml-offer-id'] = (string)$xml23['internal-id'];


    /* LOCATION */
    $metaSuperArray['dom-locality-name'] = (string) $xml23->location->{'locality-name'};

    $metaSuperArray['dom-district'] = (string) $xml23->location->{'district'};

    $metaSuperArray['dom-region'] = (string) $xml23->location->{'region'};

    $metaSuperArray['dom-sub-locality'] = (string) $xml23->location->{'sub-locality-name'};

    $metaSuperArray['dom-address'] = (string) $xml23->location->address;

    $metaSuperArray['dom-metro'] = (string) $xml23->location->metro->name;

    $metaSuperArray['dom-time-on-foot'] = (string) $xml23->location->metro->{'time-on-foot'};

    $metaSuperArray['dom-direction'] = (string) $xml23->location->direction;

    $metaSuperArray['dom-distance'] = (string) $xml23->location->distance;

    $metaSuperArray['dom-markers'] = array(
        "address" => "",
        "lat" => (string) $xml23->location->latitude,
        "lng" => (string) $xml23->location->longitude,
        "zoom" => "13", 
    );
    /* END LOCATION */



    $metaSuperArray['dom-price'] = (string) $xml23->price->value;

    $metaSuperArray['dom-title'] = $new_post_title;

    $metaSuperArray['dom_description'] = trim((string) $xml23->description);

    $metaSuperArray['dom-renovation'] =  (string) $xml23->renovation;

    $metaSuperArray['dom-quality'] = (string) $xml23->quality;

    $metaSuperArray['dom-gallery-type'] = "url";

    $metaSuperArray['dom-period'] = (string) $xml23->price->period;

    $metaSuperArray['dom-type'] = mb_strtolower((string) $xml23->category);

    $metaSuperArray['deal-status'] = (string) $xml23->{'deal-status'};
    
    
    if( (string) $xml23->haggle ){
        $metaSuperArray['sales-agent-haggle'] = (string) $xml23->haggle;
    } else {
        $metaSuperArray['sales-agent-haggle'] = "нет";
    }
    
    if( (string) $xml23->{'utilities-included'} ){
        $metaSuperArray['sales-utilities'] = "Включены в стоимость";
    } else {
        $metaSuperArray['sales-utilities'] = "Не входят в стоимость";
    }
    
    if( (string) $xml23->{'not-for-agents'} ){
        $metaSuperArray['not-for-agents'] = "Да";
    }
    
    if( (string) $xml23->{'rent-pledge'} ){
        $metaSuperArray['rent-pledge'] = "Да";
    }else{
        $metaSuperArray['rent-pledge'] = "Нет";
    }


    //поле для фильтра в каталоге
    $metaSuperArray['filter-rooms'] = (string) $xml23->rooms;


    //поле для поиска в каталоге
    $metaSuperArray['search-loc'] = 
    (string)$xml23->location->{'country'} . " " .
    (string)$xml23->location->{'region'} . " " .
    (string)$xml23->location->{'district'} . " " .
    (string)$xml23->location->{'locality-name'} . " " .
    (string)$xml23->location->{'sub-locality-name'} . " " .
    (string)$xml23->location->{'address'} . " " .
    (string)$xml23->location->metro->{'name'} . " " .
    (string)$xml23->location->{'railway-station'};


    
    $metaSuperArray['dom-gallery-url'] = count($xml23->image);
    $metaSuperArray['_dom-gallery-url'] = "field_5dd5c99e8a6c6";


    $galleryCounter = 0;
    foreach ($xml23->image as $image_url) {
        // update_sub_field(array('dom-gallery-url', $galleryCounter +1, 'url'), trim((string) $image_url), $newID);
        //array_push($metaSuperArray['dom-gallery-url'], array('url' => (string)$image_url) );
        $str = 'dom-gallery-url_' . $galleryCounter  . '_url';
        $str2 = '_dom-gallery-url_' . $galleryCounter  . '_url';
        $metaSuperArray[$str] = trim((string) $image_url);
        $metaSuperArray[$str2] = 'field_5dd5c9cd8a6c7';
        $galleryCounter ++;
    }

    $postSetting['meta_input'] = $metaSuperArray;
    


    // echo '<pre>';
    // print_r($postSetting);
    // echo '</pre>';

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

    //update_field( 'dom-gallery-url', array(), $newID );

    // $mediaArray = [];
    // foreach ($xml23->image as $image_url) {
    //     array_push( $mediaArray, array('url' => trim((string) $image_url)));
    //     // add_row('dom-gallery-url', array('url' => trim((string) $image_url)), $newID);
    // }


    // update_field( 'dom-gallery-url', $mediaArray, $newID );
;
    
    $flat_features = array();
    if( (string) $xml23->{'guarded-building'} ){
        array_push($flat_features, 'guarded-building' );
    }
    if( (string) $xml23->{'access-control-system'} ){
        array_push($flat_features, 'access-control-system' );
    }
    if( (string) $xml23->{'lift'} ){
        array_push($flat_features, 'lift' );
    }
    if( (string) $xml23->{'rubbish-chute'} ){
        array_push($flat_features, 'rubbish-chute' );
    }
    if( (string) $xml23->{'flat-alarm'} ){
        array_push($flat_features, 'flat-alarm' );
    }
    if( (string) $xml23->{'alarm'} ){
        array_push($flat_features, 'alarm' );
    }
    if( (string) $xml23->{'parking'} ){
        array_push($flat_features, 'parking' );
    }
    if( (string) $xml23->{'security'} ){
        array_push($flat_features, 'security' );
    }
    if( (string) $xml23->{'is-elite'} ){
        array_push($flat_features, 'is-elite' );
    }

    update_field( 'dom-type-flat', array(
        "dom-rooms" => (string) $xml23->rooms,
        "dom-area"  => (string) $xml23->area->value,
        "dom-living-space" => (string) $xml23->{'living-space'}->value,
        "dom-kitchen-space" => (string) $xml23->{'kitchen-space'}->value,
        "dom-building-type" => (string) $xml23->{'building-type'},
        "dom-year" => (string) $xml23->{'built-year'},
        "dom-floor" => (string) $xml23->floor,
        "dom-floors-total" => (string) $xml23->{'floors-total'},
        "dom-tall" => (string) $xml23->{'ceiling-height'},
        "dom-bathroom-unit" => (string) $xml23->{'bathroom-unit'},
        "dom-bwindow-view" => (string) $xml23->{'window-view'},
        "dom-floor-covering" => (string) $xml23->{'floor-covering'},
        "dom-balcony" => (string) $xml23->{'floor-covering'},
        "dom-more-data" => "Да",
        "dom-other" => $flat_features,
    ), $newID );




    $home_featires = array();

    if( (string) $xml23->{'electricity-supply'} ){
        array_push($home_featires, 'electricity-supply' );
    }
    if( (string) $xml23->{'water-supply'} ){
        array_push($home_featires, 'water-supply' );
    }
    if( (string) $xml23->{'gas-supply'} ){
        array_push($home_featires, 'gas-supply' );
    }
    if( (string) $xml23->{'sewerage-supply'} ){
        array_push($home_featires, 'sewerage-supply' );
    }
    if( (string) $xml23->{'heating-supply'} ){
        array_push($home_featires, 'heating-supply' );
    }
    if( (string) $xml23->{'toilet'} ){
        array_push($home_featires, 'toilet' );
    }
    if( (string) $xml23->{'shower'} ){
        array_push($home_featires, 'shower' );
    }
    if( (string) $xml23->{'pool'} ){
        array_push($home_featires, 'pool' );
    }
    if( (string) $xml23->{'billiard'} ){
        array_push($home_featires, 'billiard' );
    }
    if( (string) $xml23->{'sauna'} ){
        array_push($home_featires, 'sauna' );
    }
    if( (string) $xml23->{'parking'} ){
        array_push($home_featires, 'parking' );
    }
    if( (string) $xml23->{'alarm'} ){
        array_push($home_featires, 'alarm' );
    }
    if( (string) $xml23->{'security'} ){
        array_push($home_featires, 'security' );
    }
    if( (string) $xml23->{'is-elite'} ){
        array_push($home_featires, 'is-elite' );
    }

    update_field( 'dom-type-home', array(
        "lot-area" => (string) $xml23->{'lot-area'}->value,
        "lot-type" => (string) $xml23->{'lot-type'},
        "lot-value" => (string) $xml23->{'area'}->value,
        "dom-building-type" => (string) $xml23->{'building-type'},
        "dom-floors-total" => (string) $xml23->{'floors-total'},
        "dom-bathroom-unit" => (string) $xml23->{'bathroom-unit'},
        "lot-more-data" => "Да",
        "lot-features" => $home_featires,

    ), $newID );




    $dom_features = array();
    if( (string) $xml23->{'air-conditioner'} ){
        array_push($dom_features, 'air-conditioner' );
    }
    if( (string) $xml23->{'phone'} ){
        array_push($dom_features, 'phone' );
    }
    if( (string) $xml23->{'internet'} ){
        array_push($dom_features, 'internet' );
    }
    if( (string) $xml23->{'room-furniture'} ){
        array_push($dom_features, 'room-furniture' );
    }
    if( (string) $xml23->{'kitchen-furniture'} ){
        array_push($dom_features, 'kitchen-furniture' );
    }
    if( (string) $xml23->{'television'} ){
        array_push($dom_features, 'television' );
    }
    if( (string) $xml23->{'washing-machine'} ){
        array_push($dom_features, 'washing-machine' );
    }
    if( (string) $xml23->{'dishwasher'} ){
        array_push($dom_features, 'dishwasher' );
    }
    if( (string) $xml23->{'refrigerator'} ){
        array_push($dom_features, 'refrigerator' );
    }
    if( (string) $xml23->{'built-in-tech'} ){
        array_push($dom_features, 'built-in-tech' );
    }
    if( (string) $xml23->{'with-children'} ){
        array_push($dom_features, 'with-children' );
    }
    if( (string) $xml23->{'with-pets'} ){
        array_push($dom_features, 'with-pets' );
    }

    update_field( 'dom-features', $dom_features, $newID );


    //Вывод сообщения о результате
    if( !$result ){
        echo "Добавлен пост ID: " . $newID . ' <a href="' . get_the_permalink($newID) . '">' . get_the_title($newID) . '</a>' . "<br>";
    } else {
        echo "Обновлен пост ID: " . $newID . ' <a href="' . get_the_permalink($newID) . '">' . get_the_title($newID) . '</a>' . "<br>";
    }
}//end impfunc



















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


    update_field('gk_maps', array(
        "address" => "",
        "lat" => (string) $xmlObj->location->latitude,
        "lng" => (string) $xmlObj->location->longitude,
        "zoom" => "13", 
    ), $newgkID);


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
    
    return $newgkID;

}





















function create_new_flat($obj){
    $xml23 = $obj;
    
    //Заголовок объявления
    if((string) $xml23->location->apartment){
        $new_post_itle =  "Квартира №" . (string) $xml23->location->apartment . ". " . (string) $xml23->{'building-name'};
    } else {
        $new_post_itle =  "Квартира. " . (string) $xml23->{'building-name'};
    }
    
    


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
        $postSetting['meta_input'] = array(
            'xml-feed' => urldecode($_POST['feedurl'])
        );
    }


    //Логика проверки есть ли пост
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

    update_field( 'dom-gallery-type', "url", $newID );


    
    $imgURL = $xml23->image[0];
    

    foreach ($xml23->image as $image_url) {
        if( $image_url['tag'] == "plan" ){
            $imgURL = $image_url;
        }
    }

    update_field( 'kvinjk-url', trim((string)$imgURL), $newID );

    update_field( 'dom-rooms', (string) $xml23->rooms, $newID );
    
    update_field( 'dom-area', (string) $xml23->area->value, $newID );
    
    update_field( 'dom-living-space', (string)$xml23->{'living-space'}->value, $newID );
    
    update_field( 'dom-kitchen-space', (string)$xml23->{'kitchen-space'}->value, $newID );
    
    update_field( 'dom-renovation', (string)$xml23->renovation, $newID );
    
    update_field( 'dom-floor', (string)$xml23->floor, $newID );
    
    update_field( 'dom-floors-total', (string)$xml23->{'floors-total'}, $newID );
    
    update_field( 'dom-tall', (string) $xml23->{'ceiling-height'}, $newID );
    
    if((string)$xml23->{'building-section'}){
        update_field( 'building-section', (string)$xml23->{'building-section'}, $newID );
    } else {
        update_field( 'building-section', "Основной", $newID );
    }


    if((string)$xml23->{'kvinjk-number'}){
        update_field( 'kvinjk-number', (string)$xml23->location->apartment, $newID );
    } else {
        update_field( 'kvinjk-number', "N", $newID );
    }
    

    
    
    update_field('kvinjk-map', array(
        "address" => "",
        "lat" => (string) $xml23->location->latitude,
        "lng" => (string) $xml23->location->longitude,
        "zoom" => "13", 
    ), $newID);

    update_field( 'kvinjk-addres', (string)$xml23->location->{'locality-name'} . ', ' . (string)$xml23->location->{'address'} , $newID );



    //Эти поля необходимы для фильтрации
    update_field( 'dom-type', 'квартира', $newID );
    update_field( 'dom-new', 'новостройка', $newID );
    update_field( 'filter-rooms', (string) $xml23->rooms, $newID );


    $search_loc = 
        (string)$xml23->location->{'country'} . " " .
        (string)$xml23->location->{'region'} . " " .
        (string)$xml23->location->{'district'} . " " .
        (string)$xml23->location->{'locality-name'} . " " .
        (string)$xml23->location->{'sub-locality-name'} . " " .
        (string)$xml23->location->{'address'} . " " .
        (string)$xml23->location->metro->{'name'} . " " .
        (string)$xml23->location->{'railway-station'};


    update_field( 'search-loc', $search_loc, $newID );

    
    $jk_name = mb_strtolower(trim((string)$xml23->{'building-name'}));
    $jk_exist = get_posts( array(
            'numberposts' => 1,
            'post_type' => 'nedv_jk',
            'meta_key' => 'gk_title',
            'meta_value' => $jk_name,
        )
    );
    if( !$jk_exist ){
        $gk_ID = createJK($xml23);
    } else {
        $gk_ID = $jk_exist[0]->ID;
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









?>