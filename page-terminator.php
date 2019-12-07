<?php
/**
 * Template Name: Страница терминатор
 *
 */
if( !is_super_admin() ){
    echo "error. Access denied";
    exit();
}










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



    if($enemy){

        if(isset($_GET['yes'])){

            echo '<a href="/lk/">На сайт</a><br>';
            foreach ($enemy as $key=>$post) {
                
                wp_delete_post( $post->ID, true );
                echo "Удалено: " . $post->post_title . "<br>";
            }

        } else {

            echo '<a href="' . add_query_arg(["yes" => 1]) . '">Удалить следующие объекты: </a><br><br>';

            foreach ($enemy as $key=>$post) {
                
                echo $post->post_title . "<br>";
            
            }

        }

        
    } else {
        echo '<a href="/lk/">На сайт</a><br>';
        echo "Постов из этого XML не найдено";
    }


} else {

    echo "error. Target lost";

}