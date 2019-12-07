<?php
// Блок Свяжитесь с нами и мы ответим Вам в ближайшее время
// Табы с контактными формами. Прикрепляется на разных страницах
?>
<section class="section-services">
    <h3 class="section-title">Свяжитесь с нами и мы ответим Вам в ближайшее время</h3>
    <div class="section-tabs red small-height">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link d-sm-block d-block d-md-table-cell active" id="nav-arenda-tab" data-toggle="tab" href="#nav-arenda" role="tab" aria-controls="nav-arenda" aria-selected="true">Заявка на Trade in</a>
                <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="nav-sdavat-tab" data-toggle="tab" href="#nav-sdavat" role="tab" aria-controls="nav-sdavat" aria-selected="false">Заявка на покупку</a>
                <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="nav-kupit-tab" data-toggle="tab" href="#nav-kupit" role="tab" aria-controls="nav-kupit" aria-selected="false">Заявка на продажу</a>
                <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="nav-prodat-tab" data-toggle="tab" href="#nav-prodat" role="tab" aria-controls="nav-prodat" aria-selected="false">Консультация</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-arenda" role="tabpanel" aria-labelledby="nav-arenda-tab">
                <?php echo (do_shortcode('[contact-form-7 id="225" title="Заявка" from="Заявка на Trade-In"]')); ?>
                <!-- <form action="#" class="form-in-tab">
                 <div class="row justify-content-around">
                   <div class="form-group col-12 col-md-4">
                     <label for="inputName">Имя: <span>(Необязательно)</span></label>
                     <input type="text" class="form-control" id="inputName" placeholder="Например: Иван">
                   </div>
                   <div class="form-group col-12 col-md-4">
                     <label for="inputTel">Телефон:</label>
                     <input type="text" class="form-control" id="inputTel" placeholder="+7 (999)-999-99-99">
                   </div>
                   <div class="form-group col-12 col-md-4">
                     <button type="submit" class="btn btn-default mt-4">Оставить заявку</button>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-12 col-md-4">
                     <div class="custom-control custom-checkbox mt-4">
                        <input type="checkbox" class="custom-control-input" id="checkAgree" checked="1">
                        <label class="custom-control-label" for="checkAgree">Даю свое согласие на обработку персональных данных</label>
                     </div>
                    </div>
                </div>
               </form> -->
            </div>
            <div class="tab-pane fade" id="nav-sdavat" role="tabpanel" aria-labelledby="nav-sdavat-tab">
                <?php echo (do_shortcode('[contact-form-7 id="225" title="Заявка" from="Заявка на покупку"]')); ?>
            </div>
            <div class="tab-pane fade" id="nav-kupit" role="tabpanel" aria-labelledby="nav-kupit-tab">
                <?php echo (do_shortcode('[contact-form-7 id="225" title="Заявка" from="Заявка на продажу"]')); ?>
            </div>
            <div class="tab-pane fade" id="nav-prodat" role="tabpanel" aria-labelledby="nav-prodat-tab">
                <?php echo (do_shortcode('[contact-form-7 id="225" title="Заявка" from="Заявка на консультацию"]')); ?>
            </div>
        </div>
    </div> <!-- //.section-tabs -->
</section> <!-- //.section-services -->