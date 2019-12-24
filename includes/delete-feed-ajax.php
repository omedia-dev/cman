<?php

if( !function_exists('is_super_admin') || !is_super_admin() ){
    exit('error');
}

//функция удаляет все переданные посты в JSON "ids"
if( isset($_POST['ids'])){

    $delete_ids = json_decode($_POST['ids']);
    foreach ($delete_ids as $key=>$post) {
        wp_delete_post( (int)$delete_ids[$key], true );
    }

    echo 'Удалено устаревших постов: ' . count($delete_ids) . 'шт<br>';
}

?>