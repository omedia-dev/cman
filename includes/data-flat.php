<?php
    $mainInfo = get_field('dom-type-flat', get_the_ID());

    if( get_post_type( get_the_ID() ) == 'nedv_sale'){
        $isSale = true;
    } else {
        $isSale = false;
    }
 ?>


<ul class="object-main-info">
    <?php if ($mainInfo['dom-area']) : ?>
        <li>Общая площадь: <span><?php echo $mainInfo['dom-area']; ?> м<sup>2</sup></span></li>
    <?php endif; ?>
    <?php if ($mainInfo['dom-living-space']) : ?>
        <li>Жилая площадь: <span><?php echo $mainInfo['dom-living-space']; ?> м<sup>2</sup></span></li>
    <?php endif; ?>
    <?php if ($mainInfo['dom-kitchen-space']) : ?>
        <li>Площадь кухни: <span><?php echo $mainInfo['dom-kitchen-space']; ?> м<sup>2</sup></span></li>
    <?php endif ?>
    <?php if ($mainInfo['dom-floor']) : ?>
        <li>Этаж: <span>
        <?php
            echo $mainInfo['dom-floor'];
            if ($mainInfo['dom-floors-total']) { echo "/" . $mainInfo['dom-floors-total']; }
        ?></span>
        </li>
    <?php endif ?>
</ul> <!-- //.object-main-info -->


<div class="object-description">
    <?php the_field('dom_description'); ?>
</div> <!-- //.object-description -->



<div class="section-object-info">
    <h3 class="section-title">Информация</h3>
    <div class="object-tabs">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link d-sm-block d-block d-md-table-cell active" id="nav-arenda-tab" data-toggle="tab" href="#nav-arenda" role="tab" aria-controls="nav-arenda" aria-selected="true">Общая информация</a>
                <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="nav-sdavat-tab" data-toggle="tab" href="#nav-sdavat" role="tab" aria-controls="nav-sdavat" aria-selected="false">Информация о объекте</a>
                <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="nav-kupit-tab" data-toggle="tab" href="#nav-kupit" role="tab" aria-controls="nav-kupit" aria-selected="false">
                    Условия <?php echo $isSale ? "продажи" : "аренды"; ?>
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-arenda" role="tabpanel" aria-labelledby="nav-arenda-tab">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p><strong>Тип жилья: </strong><span><?php the_field('dom-type'); ?></span></p>
                        <?php if ($mainInfo['dom-rooms']) : ?>
                            <p><strong>Количество комнат: </strong><span><?php echo $mainInfo['dom-rooms']; ?></span></p>
                        <?php endif; ?>
                        <?php if ($mainInfo['dom-tall']) : ?>
                            <p><strong>Высота потолков: </strong><span><?php echo $mainInfo['dom-tall']; ?> метра</span></p>
                        <?php endif ?>
                        <?php if ($mainInfo['dom-bathroom-unit']) : ?>
                            <p><strong>Санузел: </strong><span><?php echo $mainInfo['dom-bathroom-unit']; ?></span></p>
                        <?php endif ?>
                        <?php if ($mainInfo['dom-bwindow-view']) : ?>
                            <p><strong>Окна: </strong><span><?php echo $mainInfo['dom-bwindow-view']; ?></span></p>
                        <?php endif ?>
                        <?php if ($mainInfo['dom-floor-covering']) : ?>
                            <p><strong>Покрытие пола: </strong><span><?php echo $mainInfo['dom-floor-covering']; ?></span></p>
                        <?php endif ?>
                        <?php if ($mainInfo['dom-balcony']) : ?>
                            <p><strong>Количество балконов/лоджий: </strong><span><?php echo $mainInfo['dom-balcony']; ?></span></p>
                        <?php endif ?>
                        <?php if (get_field('dom-renovation')) : ?>
                            <p><strong>Ремонт: </strong><span><?php echo get_field('dom-renovation'); ?></span></p>
                        <?php endif ?>
                        <?php if (get_field('dom-quality')) : ?>
                            <p><strong>Состояние объекта: </strong><span><?php echo get_field('dom-quality'); ?></span></p>
                        <?php endif ?>
                    </div>
                    <div class="col-12 col-md-6">
                        <?php if (get_field('dom-features')) : ?>
                            <?php foreach (get_field('dom-features') as $features) : ?>
                                <p><strong><?php echo $features['label']; ?>: </strong><span>Да<span></p>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </div>
                </div> <!-- //.row -->
            </div>

            <div class="tab-pane fade" id="nav-sdavat" role="tabpanel" aria-labelledby="nav-sdavat-tab">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <?php if ($mainInfo['dom-style']) : ?>
                            <p><strong>Вид дома: </strong><span><?php echo $mainInfo['dom-style'] ?></span></p>
                        <?php endif ?>
                        <?php if ($mainInfo['dom-year']) : ?>
                            <p><strong>Год постройки: </strong><span><?php echo $mainInfo['dom-year'] ?></span></p>
                        <?php endif ?>
                        <?php if ($mainInfo['dom-building-type']) : ?>
                            <p><strong>Материал стен: </strong><span><?php echo $mainInfo['dom-building-type'] ?></span></p>
                        <?php endif ?>
                        <?php if ($mainInfo['dom-other']) : ?>
                            <?php foreach ($mainInfo['dom-other'] as $features) : ?>
                                <p><strong><?php echo $features['label']; ?>: </strong><span>Да<span></p>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </div>
                </div> <!-- //.row -->
            </div>


            <div class="tab-pane fade" id="nav-kupit" role="tabpanel" aria-labelledby="nav-kupit-tab">
                <div class="row">
                    <div class="col-md-9">
                        
                        <?php if (!$isSale) : ?>
                            <p><strong>Тип сделки: </strong><span> Ареда</span></p>
                            <?php if (get_field('sales-agent-category')) : ?>
                                <p><strong>Срок: </strong><span> <?php the_field('dom-period') ?></span></p>
                            <?php endif ?>
                        <?php else: ?>
                            <p><strong>Тип объявления: </strong><span> продажа</span></p>
                            <?php if (get_field('deal-status')) : ?>
                                <p><strong>Тип сделки: </strong><span> <?php the_field('deal-status') ?></span></p>
                            <?php endif ?>
                        <?php endif ?>


                        <?php if (get_field('not-for-agents')) : ?>
                            <p><strong>Просьба агентам не звонить</strong><span> </span></p>
                        <?php endif ?>
                        
                        <?php if (get_field('sales-agent-haggle')) : ?>
                            <p><strong>Торг: </strong><span>возможен</span></p>
                        <?php else : ?>
                            <p><strong>Торг: </strong><span>нет</span></p>
                        <?php endif ?>

                        <?php if (get_field('rent-pledge')) : ?>
                            <p><strong>Залог: </strong><span>да</span></p>
                        <?php else : ?>
                            <p><strong>Залог: </strong><span>нет</span></p>
                        <?php endif ?>
                    </div>
                </div> <!-- //.row -->
            </div>
        </div>
    </div> <!-- //.object-tabs -->
    <!-- <a href="#" class="btn btn-default">Получить данные продавца</a> -->
    <!-- <a href="#" class="link-default">Получить консультацию</a> -->
    <a href="#" class="btn btn-default" data-hystmodal="#jsForm1Modal">Получить консультацию</a>
</div> <!-- //.section-object-info -->