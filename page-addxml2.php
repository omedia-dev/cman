<?php
/**
 * Template Name: Страница импорта из XML2
 *
 */
if( !function_exists('is_super_admin') || !is_super_admin() ){
    exit('error. У вас нет прав');
}



if( isset($_GET['url']) ){
    $xmlFile = urldecode( $_GET['url'] );
} else {
    echo 'Ошибка. Фид не передан';
    exit();
}


$xml = simplexml_load_file( $xmlFile );

$offers_array = array();

foreach ($xml->offer as $key => $offer) {
    array_push($offers_array, $offer);
}

$xml_parts = array_chunk($offers_array, 20);


get_header();


//Логика поиска устаревших объявлений
$published_post = get_posts( [
    'posts_per_page' => -1,
    'post_type' => 'any',
    'meta_query' => [
        'relation' => 'AND',
        [
            'key'   => 'xml-feed',
            'value' => $xmlFile,
        ],
    ],
] );


$publArr = array();
$xmlArr = array();


foreach ($published_post as $key => $value) {
    array_push($publArr, get_field('xml-offer-id', $published_post[$key]->ID));
}
foreach ($offers_array as $key => $value) {
    array_push($xmlArr, (string)$offers_array[$key]['internal-id'] );
}

sort($publArr, SORT_STRING);
sort($xmlArr, SORT_STRING);

//массив устаревших offer-id
$old_object = array_diff($publArr, $xmlArr);

if(count($old_object) > 0){

    $need_to_delete = get_posts( [
        'posts_per_page' => -1,
        'post_type' => 'any',
        'meta_query' => [
            'relation' => 'AND',
            [
                'key' => 'xml-offer-id',
                'value' => $old_object,
            ]
        ],
    ]);
    
    //массив id устаревших постов
    $delete_ids = array();
    
    foreach ($need_to_delete as $key => $value) {
        array_push($delete_ids, $need_to_delete[$key]->ID);
    }
    
    $delete_json = json_encode($delete_ids);

} else {

    $delete_ids = array();
    $delete_json = "[]";

}

?>


<?php foreach ($xml_parts as $key => $value) : ?>
    <div hidden class="jsStepXML"><?php
        echo urlencode('<freddy>');
        foreach ($value as $key2 => $value2){
            echo urlencode( $value2->asXML() );
        }
        echo urlencode('</freddy>');
    ?></div>
<? endforeach; ?>


        <div class="container py-5">
            <h1 class="page-title">Полный импорт фида</h1>
            <div class="alert alert-primary" role="alert">
                <?php echo $xmlFile; ?>
            </div>
            <p class="text-muted">Объвлений: <?php echo count($offers_array); ?></p>

            <div class="deletestep d-none pt-5 pb-2">
                <div class="spinner-border text-dark align-middle" role="status">
                    <span class="sr-only"></span>
                </div>
                <i class="far fa-check-circle h2 align-middle text-success d-none"></i>
                <div class="d-inline-block align-middle pl-2 deletetext">Этап 1. Очистка старых объявлений...</div>
            </div>


            <div class="importstep pt-5 pb-2 d-none">
                <div class="pb-2">Этап 2. Импорт объявлений...</div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger jsProgress" role="progressbar" style="width: 5%">5%</div>
                </div>
            </div>

            <div class="text-center py-4">
                <button class="btn btn-lg btn-default py-3 px-5 jsGoButton">Начать импорт</button>
                <button class="btn btn-lg btn-dark py-3 px-5 jsStopButton" style="display:none;">Стоп</button>
            </div>

            
            
            
            <h2 class="jsProc pb-3"></h2>
            <div class="jsResult">
        
            </div>
        </div>

<script>
(function($) {
    'use strict';
    $(document).ready(function() {
        

        function goDeleteAll(){
        
            $.post({
                    url: '/del/',
                    data: {
                        'terminate': '<?php echo $xmlFile; ?>',
                        'ajax': 1,
                        'ids': '<?php echo $delete_json; ?>',
                    },
                    datatype: 'json',
                    beforeSend: function() {
                        $('.deletestep').removeClass('d-none');
                        console.log('выполняется удаление всего фида...');
                    },
                })
                .done(function(data) {
                    $('.deletestep .spinner-border').addClass('d-none');
                    $('.deletestep .far').removeClass('d-none');
                    $('.importstep').removeClass('d-none');
                    goReady(data, -1);
                })
                .fail(function(data) {
                    document.querySelector('.jsResult').innerHTML = "Ошибка " + data.status;
                    console.log(data);
                    $('.deletetext').innerHTML = "Ошибка " + data.status;
                });

            
        }

        function goImport(step){

            $.post({
                    url: '/import/',
                    data: {
                        'full': '1',
                        'fullxml': $('.jsStepXML').eq(step).text(),
                        'feedurl': "<?php echo $xmlFile; ?>",
                    },
                    beforeSend: function() {
                        console.log('выполняется шаг ' + step);
                    },
                })
                .done(function(data) {
                    goReady(data, step);
                })
                .fail(function(data) {
                    document.querySelector('.jsResult').innerHTML = "Ошибка " + data.status;
                    console.log(data);
                });

        } //goImport

        function goReady(requestData, step){
            $('.jsResult').append(requestData);
            let procent = parseInt((step + 1)*100/stepsCount) + "%";
            $('.jsProc').text("Добавлено: " + (step+1)*20 + ' из: ' + objectCount);
            $('.jsProgress').css('width', procent);
            $('.jsProgress').text(procent);
            
            if(step >= stepsCount-1){
                goComplite(step);
                return;
            }

            if(pause){
                $('.jsProc').text("Остановлено. Всего добавлено: " + (step+1)*20 + ' из: ' + objectCount);
                $('.jsResult').append('<br>Остановлено!<br>');
                $('.jsProgress').css('width', "0%");
                $('.jsProgress').text('');
                $('.jsStopButton').hide();
                return;
            }

            step++;
            goImport(step);

        }

        function goComplite(){
            $('.jsResult').append('<br>Импорт завершен!');
            $('.jsProgress').removeClass('progress-bar-animated');
            $('.jsProc').text("Готово. Всего добавлено: " + objectCount);
            $('.jsStopButton').hide();
        }
        
        



        let current = 0;
        let pause = false;
        let stepsCount = <?php echo count($xml_parts); ?>;
        let objectCount = <?php echo count($offers_array); ?>;
        $('.jsGoButton').on('click', function(e) {
            pause = false;
            $(this).hide();
            $('.jsResult').text("");
            $('.jsProc').text("Начат импорт. Не закрывайте страницу...");
            $('.jsProgress').addClass('progress-bar-animated');
            
            goDeleteAll();
            //goImport(current);
            $('.jsStopButton').show();
        });

        $('.jsStopButton').on('click', function(e) {
            pause = true;
            $('.jsProc').text("Останавливаем импорт...");
            $('.jsProgress').removeClass('progress-bar-animated');
            $('.jsGoButton').show();
        });

    
    });
})(jQuery);
</script>










<?php get_footer(); ?>