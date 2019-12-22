<?php
/**
 * Template Name: Страница импорта из XML
 *
 */
if( !is_super_admin() ){
    echo "error не админ";
    exit();
}



//Функции
get_template_part('includes/xml-importers-v2');






$full = false;

if( isset($_POST['full']) && isset($_POST['fullxml'])){

    $xml23 = simplexml_load_string(urldecode($_POST['fullxml']));


    if($xml23 && $xml23->offer[0]->category){
        $full = true;
        $repeater = $xml23->offer;
    } else {
        echo "<br>Ошибка. Не найдена директива offer в XML фиде<br>";
        exit();
    }

} elseif( isset($_POST['myxml']) ) {

    $xml23 = simplexml_load_string(urldecode($_POST['myxml'] ));

    if( !($xml23 && $xml23->location) ){
        echo "<br>Ошибка. Не найдена директива offer в XML фиде<br>";
        exit();
    }

    $repeater = $xml23;

}




if ($xml23){

    if($full){
        foreach($repeater as $object){

            if ($object->{'new-flat'} && $object->{'building-name'}) {
                create_new_flat($object);

            } else {
                impfunc($object);

            }

        }
    } else {

        if ($xml23->{'new-flat'} && $xml23->{'building-name'}) {
            create_new_flat($xml23);
            
        } else {
            impfunc($xml23);

        }

    }

} else {

    echo "Ошибка. Переданных данных нет, или они не распознаны";

}