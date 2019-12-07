<?php
/**
 * Template Name: Страница импорта из XML2
 *
 */
if( !is_super_admin() ){
    echo "error";
    exit();
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

            <div class="progress mt-4">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger jsProgress" role="progressbar" style="width: 0%">0%</div>
            </div>

            <div class="text-center py-4">
                <button class="btn btn-lg btn-default py-3 px-5 jsGoButton">Начать импорт</button>
                <button class="btn btn-lg btn-dark py-3 px-5 jsStopButton" style="display:none;">Стоп</button>
            </div>

            
            
            
            <h2 class="jsProc"></h2>
            <div class="jsResult">
        
            </div>
        </div>

<script>
(function($) {
    'use strict';
    $(document).ready(function() {
        
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
            $('.jsProc').text("Начат импорт. Не закрывайте страницу...");
            $('.jsProgress').addClass('progress-bar-animated');
            goImport(current);
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