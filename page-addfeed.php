<?php

/**
 * Template Name: Импорт Фида
 *
 */
if (!is_super_admin()) {
    wp_redirect("/lk/");
    exit();
}


require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';


get_header();

?>
<div class="container inner-page mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php wp_title(""); ?></li>
        </ol>
    </nav>
    <div class="text">

        <h1 class="page-title">Управление XML-лентами</h1>
        <p class="h2">XML фиды сайта</p>


        <?php if (have_rows('xml-feed')) : ?>
            <?php while (have_rows('xml-feed')) : the_row(); ?>
                <div class="row  mb-5 mt-3">
                    <div class="col-7">
                        <div class="alert alert-primary" role="alert">
                            <?php
                                echo get_sub_field('xml-url');
                                $xmlfeed = simplexml_load_file(get_sub_field('xml-url'));
                            ?>
                        </div>
                    </div>
                    <div class="col-5 pt-1">
                        <a href="<?php echo add_query_arg(["analize" => get_row_index()]) ?>" class="btn btn-dark mr-2">Посмотреть</a>
                        <a href="/im/?url=<?php echo urlencode(get_sub_field('xml-url')); ?>" target="_blank" class="btn btn-dark mr-2">Импорт</a>
                        <a href="/del/?terminate=<?php echo urlencode(get_sub_field('xml-url')); ?>" target="_blank" class="btn btn-dark mr-2">Удалить объекты</a>
                    </div>
                    <div class="col-12">
                        <p class="text-muted">Объвлений: <?php echo count($xmlfeed->offer); ?>
                        <span class="d-inline-block mx-3">/</span>
                        Дата обновления данных:
                            <?php
                                if ((string) $xmlfeed->{'generation-date'}) {
                                    $createdDate = (string) $xmlfeed->{'generation-date'};
                                    echo $createdDate;
                                } else {
                                    echo "нет данных";
                                }
                            ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>





        <?php if (isset($_GET['analize'])) :

            $analized_url = get_field('xml-feed')[(int) $_GET['analize'] - 1]['xml-url'];

            ?>

            <p class="h2 mt-5">Список объектов в XML-ленте</p>
            <p class="h5 mb-3"><?php echo $analized_url; ?></p>
            <?php

                $analized_xml = simplexml_load_file($analized_url);
                $offerindex = 0;
                foreach ($analized_xml->offer as $key => $offer) : ?>
                <?php

                        if ($offer->{'new-flat'} && $offer->{'building-name'}) {
                            $newFlat = true;
                        } else {
                            $newFlat = false;
                        }

                        ?>
                <div class="row jsOfferLine border">
                    <div class="col-9">
                        <strong>
                            <?php
                                echo $offerindex + 1;
                                $offerindex++; 
                            ?>.
                        </strong>
                        <small>ID: <?php echo (string) $offer['internal-id'] ?> </small>
                        <strong>Тип объявления: </strong><?php echo $offer->type; ?> -
                        <strong>Категория: </strong>
                        <?php
                            echo (string) $offer->category;
                            if ($newFlat) {
                                echo "/новостройка (" . (string) $offer->{'building-name'} . ")";
                            }
                        ?>
                    </div>
                    <div class="col-2">
                        <button 
                            class="btn btn-dark jsImportOne"
                            data-xml="<?php echo urlencode($offer->asXML()); ?>"
                            data-action="/import/">Импорт</button>
                    </div>
                    <div class="col-1">
                        <span class="jsLoader d-none"><i class="fas fa-spinner"></i></span>
                        <span class="jsOk text-success d-none"><i class="far fa-check-circle"></i></span>
                        <span class="jsError text-danger d-none"><i class="far fa-times-circle"></i></span>
                    </div>
                </div>
            <?php endforeach; ?>


        <?php endif; ?>

    </div>
</div>



<script>
    (function($) {
        'use strict';
        $(document).ready(function() {


            function importLine(link) {
                let selfRow = $(link).closest('.row');
                selfRow.find('.jsLoader').addClass('d-none');
                selfRow.find('.jsError').addClass('d-none');
                selfRow.find('.jsOk').addClass('d-none');
                let thisXML = $(link).data('xml');
                let thisURL = $(link).data('action');

                $.post({
                        url: thisURL,
                        data: {
                            'myxml': thisXML,
                            'feedurl': "<?php echo urlencode($analized_url); ?>",
                        },
                        beforeSend: function() {
                            selfRow.find('.jsLoader').toggleClass('d-none');
                        },
                    })
                    .done(function(data) {
                        selfRow.find('.jsLoader').toggleClass('d-none');
                        if (data == "error") {
                            selfRow.find('.jsError').toggleClass('d-none');
                        } else {
                            selfRow.find('.jsOk').toggleClass('d-none');
                            console.log(data);
                        }
                    })
                    .fail(function(data) {
                        console.log("Ошибка: " + data.status);
                    });
            }

            $('.jsImportOne').on('click', function(e) {
                importLine(this);
            });

        });
    }(jQuery));
</script>
<?php get_footer(); ?>