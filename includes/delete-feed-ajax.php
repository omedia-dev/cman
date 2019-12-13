<?php

if( isset($_GET['terminate'])){

    $feed_url = urldecode($_GET['terminate']);


    $filter_array = array(
        array(
            'key'   => 'xml-feed',
            'value' => $feed_url,
        )
    );

    $target = array(
        'posts_per_page' => -1,
        'post_type' => 'any',
        'meta_query' => [
            'relation' => 'AND',
            $filter_array,
        ],
    );


    $enemy = get_posts( $target );


    foreach ($enemy as $key=>$post) {
        wp_delete_post( $post->ID, true );
    }

    echo "Удалено " . count($enemy) . " старых объявлений<br>";


} else {

    echo "Ошибка. Не передан фид";

}

?>