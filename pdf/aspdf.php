<?php


if( !function_exists('is_super_admin') ){
    exit('error');
}

if(get_field('mortgage')){
    $mortgage = 'Да';
} else {
    $mortgage = 'Нет';
}



require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();


// reference the Dompdf namespace
use Dompdf\Dompdf;


// instantiate and use the dompdf class
$dompdf = new Dompdf($options);


$dompdf->set_option('defaultFont', 'Arial');
$dompdf->set_option('isHtml5ParserEnabled', true);





$table='


<html>
<body>
    <style>
        @page { size: 595pt 842pt; }
        *{
            margin:0;
            padding:0;
        }
        body {
            font-family: DejaVu Sans;
            font-size: 20px;
            height:840pt;
            position:relative;
            line-height: 1.4;
        }
        header{
            background: #fff;
            color:#353844;
            overflow:hidden;
        }
        .logo{
            float:left;
            padding:40px;
        }
        .info{
            float:right;
            padding:20px 40px;
        }
        .h1{
            font-size: 30px;
            line-height: 1.1;
            padding-bottom:30pt;
            padding-left:20pt;
        }
        .h2{
            font-size: 26px;
            line-height: 30pt;
        }
        .h3{
            font-size: 20pt;
            line-height: 22pt;
        }
        .h4{
            font-size: 14pt;
            line-height: 16pt;
        }
        .maincontent{
            clear:both;
            padding:20pt 10pt;
            border-top:1px solid #eee;
        }
        .flat__img{
            float:left:
            width:260pt;
        }
        .flat__img img{
            display:block;
            width:250pt;
        }
        .flat-info{
            float:right;
            width:300pt;
            padding-bottom:30pt;
        }
        .flat-info dl{
            display:block;
        }
        dt{
            font-weight:bold;
            font-size:10pt;
            display:block;
            padding:0;
            margin:0;
            line-height:1;
            width:120pt;
        }
        dd{
            font-size:10pt;
            line-height:1;
            width:160pt;
        }
        dt, dd{
            display:inline-block;
            vertical-align:top;
            padding-right:5pt;
        }
        .cmanlink{
            clear:both;
            font-size:18pt;
            line-height:20pt;
            display:block;
            color:#ef5a53;
            margin-bottom:30pt;
            margin-left:30pt;
        }
        .footer{
            position:absolute;
            bottom:0;
            left:0;
            width:100%;
            background:#000;
            color:#fff;
            padding:20pt;
            font-size:11pt;
            height:80pt;
        }
        .footerlogo{
            float:left;
            display:block;
            width:200pt;
        }
        .footer__logosub{
            font-size:8pt;
            line-height:10pt;

        }
        .footer__right{
            float:right;
            display:block;
            width:200pt;
            font-size:11pt;
            line-height:11pt;
            
        }
    </style>


<div class="header">
    <div class="logo">
        <img src="' . get_template_directory() . '/pdf/logo.png" width="150" />
    </div>
    <div class="info">
        <p><small>По всем вопросам:</small></p>
        <p class="h3">+7 (495) 114-54-45</p>
        <p class="h4">info@cmangroup.ru</p>
    </div>
</div>
<div class="maincontent">

<div class="h1">Квартира №' . get_field('kvinjk-number') . ", " . get_field('dom-rooms') . '-х комнатная</div>
    <div class="flat__img">
        <img src="' . get_field('kvinjk-url') . '" width="150" />
    </div>

    <div class="flat-info">
    <dl>
        <dt>Жилой комплекс:</dt>
        <dd>
            ' . get_the_title( (int)get_field('building-id') ) . '
            <p style="font-size:9pt; margin:5pt 0 20pt;">Адрес: ' . get_field('kvinjk-addres') . '</p>
        </dd>
    </dl>
    <dl>
        <dt>Корпус:</dt>
        <dd>' . get_field('building-section') . '</dd>
    </dl>
    <dl>
        <dt>Этаж:</dt>
        <dd>' . get_field('dom-floor') . '/' . get_field('dom-floors-total') . '</dd>
    </dl>
    <dl>
        <dt>Количество комнат:</dt>
        <dd>' . get_field('dom-rooms') . '2</dd>
    </dl>
    <dl>
        <dt>Общая площадь:</dt>
        <dd>' . get_field('dom-area') . ' м<sup>2</sup></dd>
    </dl>
    <dl>
        <dt>Жилая площадь:</dt>
        <dd>' . get_field('dom-living-space') . ' м<sup>2</sup></dd>
    </dl>
    <dl>
        <dt>Площадь кухни:</dt>
        <dd>' . get_field('dom-kitchen-space') . ' м<sup>2</sup></dd>
    </dl>
    <dl>
        <dt>Высота потолков:</dt>
        <dd>' . get_field('dom-tall') . ' м</dd>
    </dl>
    <dl>
        <dt>Цена за м<sup>2</sup>:</dt>
        <dd>' . number_format( (int) get_field('kvinjk-pricem'), 0, ",", " ") . ' р.</dd>
    </dl>
    <dl>
        <dt>Общая цена:</dt>
        <dd>' . number_format( (int) get_field('dom-price'), 0, ",", " ") . ' р.</dd>
    </dl>
    <dl>
        <dt>Год постройки:</dt>
        <dd>' . get_field('built-year') . ' г. (' . get_field('ready-quarter') . ' квартал)</dd>
    </dl>
    <dl>
        <dt>Возможность ипотеки:</dt>
        <dd>' . $mortgage . '</dd>
    </dl>
    </div>

</div>

<a href="' . get_permalink() . '" class="cmanlink">Смотреть объект на cmangroup.ru</a>

<div class="footer">

    <div class="footerlogo">
        <img src="' . get_template_directory() . '/pdf/logo_footer.png" width="100" />
        <p class="footer__logosub">
            Центральное Московское<br>
            Агентство Недвижимости
        </p>
    </div>

    <p class="footer__right">
        <small>Контакты:</small><br>
        Россия, Москва, Преображенская площадь, 7А, стр. 1
        м. Преображенская площадь<br>
        <strong>+7 (495) 114-54-45</strong>
    </p>
</div>

</body>
</html>




';

$dompdf->set_option('isRemoteEnabled', true);

$dompdf->loadHtml($table);



// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("cman_object.pdf");

?>