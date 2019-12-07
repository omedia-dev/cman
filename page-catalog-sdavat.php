<?php
/**
 * Template Name: Сдавать в аренду
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */

get_header();

// Hero Search

?>

    <div class="container inner-page">
      
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
          <li class="breadcrumb-item active" aria-current="page">Сдать в аренду</li>
        </ol>
      </nav>

      <h1 class="page-title">Сдать недвижимость в Аренду</h1>

      <div class="section-tabs red">
        <nav>
         <div class="nav nav-tabs" id="nav-tab" role="tablist">
         <a class="nav-item nav-link" id="nav-arenda-tab" href="/nedv_sale/" role="tab" aria-controls="nav-arenda" aria-selected="true">Купить</a>
          <a class="nav-item nav-link" id="nav-sdavat-tab" href="/prodat-nedvizhimost/" role="tab" aria-controls="nav-sdavat" aria-selected="false">Продать</a>
          <a class="nav-item nav-link" id="nav-kupit-tab" href="/nedv_arenda/" role="tab" aria-controls="nav-kupit" aria-selected="false">Арендовать</a>
          <a class="nav-item nav-link active" id="nav-prodat-tab" href="/sdat-v-arendu/" role="tab" aria-controls="nav-prodat" aria-selected="false">Сдать в аренду</a>
         </div>
        </nav>
      </div> <!-- //.section-tabs -->
         
      <section class="section-catalog-order">
        <p class="mt-5 mb-5">
          В этом разделе вы можете опубликовать свои объявления о сдаче в аренду недвижимости.
        </p>
        <h3 class="section-title mb-5">Что бы подать заявку на сдачу недвижимости в<br>аренду, заполните форму ниже:</h3>
        <?php echo(do_shortcode( '[contact-form-7 id="3817" title="Контактная форма - Сдать Аренду"]' )); ?>
        <!-- <div class="row">
          <div class="col-md-7">
            <div class="section-tabs red small-height">
               <nav>
                 <div class="nav nav-tabs" id="nav-tab" role="tablist">
                   <a class="nav-item nav-link d-sm-block d-block d-md-table-cell active" id="step-1-tab" data-toggle="tab" href="#step-1" role="tab" aria-controls="step-1" aria-selected="true">Шаг 1</a>
                   <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="step-2-tab" data-toggle="tab" href="#step-2" role="tab" aria-controls="step-2" aria-selected="false">Шаг 2</a>
                   <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="step-3-tab" data-toggle="tab" href="#step-3" role="tab" aria-controls="step-3" aria-selected="false">Шаг 3</a>
                   <a class="nav-item nav-link d-sm-block d-block d-md-table-cell" id="step-4-tab" data-toggle="tab" href="#step-4" role="tab" aria-controls="step-4" aria-selected="false">Шаг 4</a>
                 </div>
               </nav>
               <div class="tab-content" id="nav-tabContent">
                 <div class="tab-pane fade show active" id="step-1" role="tabpanel" aria-labelledby="step-1-tab">
                  <h4 class="mb-4">Введите Ваши персональные данные:</h4>
                   <form action="#" class="form-in-tab">
                     <div class="row">
                        <div class="col-12 col-md-6">
                         <div class="form-group mb-3">
                           <label for="inputName">Имя:</label>
                           <input type="text" class="form-control" id="inputName" placeholder="Например: Иван">
                         </div> //.form-group
                         <div class="form-group mb-3">
                           <label for="inputSurname">Фамилия:</label>
                           <input type="text" class="form-control" id="inputSurname" placeholder="Например: Иванов">
                         </div> //.form-group
                         <div class="form-group mb-3">
                           <label for="inputName2">Отчество: <span>(Необязательно)</span></label>
                           <input type="text" class="form-control" id="inputName2" placeholder="Например: Иванович">
                         </div> //.form-group
                        </div> //.col
                        <div class="col-12 col-md-6">
                         <div class="form-group mb-3">
                           <label for="inputTel">Телефон:</label>
                           <input type="text" class="form-control" id="inputTel" placeholder="+7 (999)-999-99-99">
                         </div> //.form-group
                         <div class="form-group mb-3">
                           <label for="inputEmail">Email:</label>
                           <input type="email" class="form-control" id="inputEmail" placeholder="info@yandex.ru">
                         </div> //.form-group
                          <div class="form-group mb-3">
                            <label for="selectAlt">Альтернативный способ связи:</label>
                            <select class="custom-select" id="selectAlt">
                              <option value="1">Телеграм</option>
                              <option value="2">Skype</option>
                            </select>
                          </div> //.form-group
                        </div> //.col
                     </div> //.row
                     <div class="row mt-3">
                        <div class="col-12 col-md-6">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkAgree" checked="1">
                            <label class="custom-control-label" for="checkAgree">Даю свое согласие на обработку персональных данных</label>
                          </div>
                        </div> //.col
                        <div class="col-12 col-md-6 text-center">
                          <a href="#" class="link-default next-step">Следующий шаг</a>
                        </div> //.col
                     </div> //.row
                   </form>
                 </div>
                 <div class="tab-pane fade" id="step-2" role="tabpanel" aria-labelledby="step-2-tab">
                   <h3>Сдать в аренду недвижимость просто!</h3>
                   <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. </p>
                   <a href="#" class="btn btn-default">Сдать в аренду</a>
                 </div>
                 <div class="tab-pane fade" id="step-3" role="tabpanel" aria-labelledby="step-3-tab">
                   <h3>Купить недвижимость просто!</h3>
                   <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. </p>
                   <a href="#" class="btn btn-default">Купить</a>
                 </div>
                 <div class="tab-pane fade" id="step-4" role="tabpanel" aria-labelledby="step-4-tab">
                   <h3>Продать недвижимость просто!</h3>
                   <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. </p>
                   <a href="#" class="btn btn-default">Продать</a>
                 </div>
               </div>
             </div> //.service-tabs 
          </div> //.col-md-7
          <div class="col-md-4 align-self-center">
            <div class="box">
              <h4 class="mb-3">Если Вы уже<br>зарегистрированы на нашем портале,<br>просто авторизуйтесь:</h4>
              <form action="#" class="form-in-tab">
                <div class="form-group mb-3">
                   <label for="inputlogin">Логин:</label>
                   <input type="text" class="form-control" id="inputlogin" placeholder="Латинскими буквами">
                </div> //.form-group
                <div class="form-group mb-5">
                   <label for="inputPass">Пароль:</label>
                   <input type="password" class="form-control" id="inputPass" placeholder="************************">
                </div> //.form-group
                <button type="submit" class="btn btn-default">Авторизоваться</button>
              </form>
            </div> //.box
          </div> //.col-md-5
        </div> //.row -->
      </section> <!-- //.section-catalog-order -->

      <section class="section-features">
        <h2 class="section-title">Преимущества работы с нами</h2>
         <div class="row">
           <div class="col-md-4 mb-5">
              <div class="bg-grey">
               <div class="row feature-item">
                   <div class="col-3 col-md-3">
                     <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_fakt1.png" alt="" class="float-md-left">
                   </div>
                   <div class="col-8 col-md-9">
                     <h4>Юридическая<br>чистота сделки</h4>
                     <p>официальное оформление сделки нотариально заверенным договором</p>
                   </div>
               </div>
              </div> <!-- //.bg-grey -->
           </div> <!-- //.col -->
           <div class="col-md-4 mb-5">
              <div class="bg-grey">
               <div class="row feature-item">
                 <div class="col-3 col-md-3">
                   <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_fakt2.png" alt="" class="float-md-left">
                 </div>
                 <div class="col-8 col-md-9">
                   <h4>Честные цены<br>без комиссий</h4>
                   <p>средние по рынку цены на недвижимость, которые легко проверить</p>
                 </div>
               </div>
              </div> <!-- //.bg-grey -->
           </div> <!-- //.col -->
           <div class="col-md-4 mb-5">
              <div class="bg-grey">
               <div class="row feature-item">
                 <div class="col-3 col-md-3">
                   <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_fakt3.png" alt="" class="float-md-left">
                 </div>
                 <div class="col-8 col-md-9">
                   <h4>Всегда актуальные<br>предложения</h4>
                   <p>обновление базы купли-продажи каждый день</p>
                 </div>
               </div>
              </div> <!-- //.bg-grey -->
           </div> <!-- //.col -->
           <div class="col-md-4 mb-5">
              <div class="bg-grey">
               <div class="row feature-item">
                 <div class="col-3 col-md-3">
                   <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_fakt4.png" alt="" class="float-md-left">
                 </div>
                 <div class="col-8 col-md-9">
                   <h4>Жилье<br>любого типа</h4>
                   <p>новостройки, вторичная недвижимость, элитные квартиры, коттеджи, дома, таунхаусы</p>
                 </div>
               </div>
              </div> <!-- //.bg-grey -->
           </div> <!-- //.col -->
           <div class="col-md-4 mb-5">
              <div class="bg-grey">
               <div class="row feature-item">
                 <div class="col-3 col-md-3">
                   <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_fakt5.png" alt="" class="float-md-left">
                 </div>
                 <div class="col-8 col-md-9">
                   <h4>Ипотека<br>и материнский<br>капитал</h4>
                   <p>поможем оформить и сопроводим покупку по материнскому капиталу и в ипотеку</p>
                 </div>
               </div>
              </div> <!-- //.bg-grey -->
           </div> <!-- //.col -->
           <div class="col-md-4 mb-5">
              <div class="bg-grey">
               <div class="row feature-item">
                 <div class="col-3 col-md-3">
                   <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_fakt6.png" alt="" class="float-md-left">
                 </div>
                 <div class="col-8 col-md-9">
                   <h4>Полное<br>сопровождение</h4>
                   <p>сопровождение клиента на всех этапах сделки при купле-продаже недвижимости</p>
                 </div>
               </div>
              </div> <!-- //.bg-grey -->
           </div> <!-- //.col -->
         </div> <!-- //.row --> 
      </section> <!-- //.section-features -->

      <!-- <section class="section-objects catalog-section">
        <h2 class="section-title">Последние арендованные объекты</h2>
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="object-item">
              <div class="row">
                <div class="col-md-6">
                  <a href="#" class="object-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/object.jpg" alt="" class="img-fluid">
                    <div class="sell-label">
                      <span>Объект продан</span>
                      11.09.2019
                    </div> //.sell-label
                  </a>
                </div> //.col-6
                <div class="col-md-6">
                  <div class="d-flex justify-content-center flex-column object-info">
                    <h3>Квартира трехкомнатная</h3>
                    <dl>
                      <dt>Метро:</dt>
                      <dd>Лубянка</dd>
                    </dl>
                    <dl>
                      <dt>Комнат:</dt>
                      <dd>2</dd>
                    </dl>
                    <dl>
                      <dt>Цена:</dt>
                      <dd>6 000 000 руб.</dd>
                    </dl>
                    <dl>
                      <dt>Торг:</dt>
                      <dd>есть</dd>
                    </dl>
                    <a href="#" class="link-underline mt-3"><span>Подробнее о квартире</span></a>
                  </div> //.object-info
                </div> //.col-6
              </div> //.row
              
            </div> //.object-item
          </div> //.col-6
          <div class="col-md-6 mb-4">
            <div class="object-item">
              <div class="row">
                <div class="col-md-6">
                  <a href="#" class="object-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/object.jpg" alt="" class="img-fluid">
                    <div class="sell-label">
                      <span>Объект продан</span>
                      11.09.2019
                    </div> //.sell-label
                  </a>
                </div> //.col-6
                <div class="col-md-6">
                  <div class="d-flex justify-content-center flex-column object-info">
                    <h3>Квартира трехкомнатная</h3>
                    <dl>
                      <dt>Метро:</dt>
                      <dd>Лубянка</dd>
                    </dl>
                    <dl>
                      <dt>Комнат:</dt>
                      <dd>2</dd>
                    </dl>
                    <dl>
                      <dt>Цена:</dt>
                      <dd>6 000 000 руб.</dd>
                    </dl>
                    <dl>
                      <dt>Торг:</dt>
                      <dd>есть</dd>
                    </dl>
                    <a href="#" class="link-underline mt-3"><span>Подробнее о квартире</span></a>
                  </div> //.object-info
                </div> //.col-6
              </div> //.row
              
            </div> //.object-item
          </div> //.col-6
          <div class="col-md-6 mb-4">
            <div class="object-item">
              <div class="row">
                <div class="col-md-6">
                  <a href="#" class="object-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/object.jpg" alt="" class="img-fluid">
                    <div class="sell-label">
                      <span>Объект продан</span>
                      11.09.2019
                    </div> //.sell-label
                  </a>
                </div> //.col-6
                <div class="col-md-6">
                  <div class="d-flex justify-content-center flex-column object-info">
                    <h3>Квартира трехкомнатная</h3>
                    <dl>
                      <dt>Метро:</dt>
                      <dd>Лубянка</dd>
                    </dl>
                    <dl>
                      <dt>Комнат:</dt>
                      <dd>2</dd>
                    </dl>
                    <dl>
                      <dt>Цена:</dt>
                      <dd>6 000 000 руб.</dd>
                    </dl>
                    <dl>
                      <dt>Торг:</dt>
                      <dd>есть</dd>
                    </dl>
                    <a href="#" class="link-underline mt-3"><span>Подробнее о квартире</span></a>
                  </div> //.object-info
                </div> //.col-6
              </div> //.row
              
            </div> //.object-item
          </div> //.col-6
          <div class="col-md-6 mb-4">
            <div class="object-item">
              <div class="row">
                <div class="col-md-6">
                  <a href="#" class="object-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/object.jpg" alt="" class="img-fluid">
                    <div class="sell-label">
                      <span>Объект продан</span>
                      11.09.2019
                    </div> //.sell-label
                  </a>
                </div> //.col-6
                <div class="col-md-6">
                  <div class="d-flex justify-content-center flex-column object-info">
                    <h3>Квартира трехкомнатная</h3>
                    <dl>
                      <dt>Метро:</dt>
                      <dd>Лубянка</dd>
                    </dl>
                    <dl>
                      <dt>Комнат:</dt>
                      <dd>2</dd>
                    </dl>
                    <dl>
                      <dt>Цена:</dt>
                      <dd>6 000 000 руб.</dd>
                    </dl>
                    <dl>
                      <dt>Торг:</dt>
                      <dd>есть</dd>
                    </dl>
                    <a href="#" class="link-underline mt-3"><span>Подробнее о квартире</span></a>
                  </div> //.object-info
                </div> //.col-6
              </div> //.row
              
            </div> //.object-item
          </div> //.col-6
          <div class="col-md-6 mb-4 d-none d-md-block">
            <div class="object-item">
              <div class="row">
                <div class="col-md-6">
                  <a href="#" class="object-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/object.jpg" alt="" class="img-fluid">
                    <div class="sell-label">
                      <span>Объект продан</span>
                      11.09.2019
                    </div> //.sell-label
                  </a>
                </div> //.col-6
                <div class="col-md-6">
                  <div class="d-flex justify-content-center flex-column object-info">
                    <h3>Квартира трехкомнатная</h3>
                    <dl>
                      <dt>Метро:</dt>
                      <dd>Лубянка</dd>
                    </dl>
                    <dl>
                      <dt>Комнат:</dt>
                      <dd>2</dd>
                    </dl>
                    <dl>
                      <dt>Цена:</dt>
                      <dd>6 000 000 руб.</dd>
                    </dl>
                    <dl>
                      <dt>Торг:</dt>
                      <dd>есть</dd>
                    </dl>
                    <a href="#" class="link-underline mt-3"><span>Подробнее о квартире</span></a>
                  </div> //.object-info
                </div> //.col-6
              </div> //.row
              
            </div> //.object-item
          </div> //.col-6
          <div class="col-md-6 mb-4 d-none d-md-block">
            <div class="object-item">
              <div class="row">
                <div class="col-md-6">
                  <a href="#" class="object-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/object.jpg" alt="" class="img-fluid">
                    <div class="sell-label">
                      <span>Объект продан</span>
                      11.09.2019
                    </div> //.sell-label
                  </a>
                </div> //.col-6
                <div class="col-md-6">
                  <div class="d-flex justify-content-center flex-column object-info">
                    <h3>Квартира трехкомнатная</h3>
                    <dl>
                      <dt>Метро:</dt>
                      <dd>Лубянка</dd>
                    </dl>
                    <dl>
                      <dt>Комнат:</dt>
                      <dd>2</dd>
                    </dl>
                    <dl>
                      <dt>Цена:</dt>
                      <dd>6 000 000 руб.</dd>
                    </dl>
                    <dl>
                      <dt>Торг:</dt>
                      <dd>есть</dd>
                    </dl>
                    <a href="#" class="link-underline mt-3"><span>Подробнее о квартире</span></a>
                  </div> //.object-info
                </div> //.col-6
              </div> //.row
              
            </div> //.object-item
          </div> //.col-6
        </div> //.row
      </section> //.section-last-objects -->

      <section class="section-faq">
        <h3 class="section-title">Частые вопросы про недвижимость</h3>
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Как будет рассчитываться налог на недвижимость физлиц?
                </button>
              </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <div class="inner">
                  Начиная с 2016 года налог на имущество физических лиц будет рассчитываться (за налоговый период 2015 год и далее) по новым правилам в соответствии с главой 32 «Налог на имущество физических лиц» Налогового кодекса РФ.<br> 
                  Налог на недвижимость физических лиц будет рассчитываться исходя из средней рыночной цены 1 кв. метра недвижимости и с учетом налоговой ставки, которая может варьироваться от 0, 1 до 2%. После перерасчета налога по новым правилам сумма возрастет почти в 2 раза и составит 1120 рублей. Расчет произведен для квартиры площадью 55 кв. метров с применением налоговой ставки в 0,1% и исходя из средней рыночной цены за 1 кв. метр в 32 тысячи рублей, по данным Федеральной налоговой службы РФ, и с учетом льгот. Собственник квартиры будет иметь право на налоговый вычет равный стоимости 20 кв. метрам его недвижимости.<br> 
                  Что касается москвичей, то им придется выплачивать более существенную сумму. Так, если кадастровую стоимость 1 квадратного метра столичной квартиры приравняют к среднерыночной, которая сейчас составляет 160 тысяч рублей за 1 кв. м, и рассчитают налог для жилья площадью 54 кв. метров по ставке 0,1%, то он составит 5440 рублей. Такую сумму надо будет заплатить собственникам в 2020 году. А с учетом понижающих коэффициентов, предусмотренных законом, первый платеж будет равен тысячи рублей.<br> 
                  Но, в течение этих пяти лет законом предусматривается возможность повысить налоговую ставку до 0,3 %, либо уменьшить ее до 0%. Если чиновники через пять лет повысят налоговую ставку до 0,3% от кадастровой стоимости, то налог на недвижимость физических лиц в Москве вырастет в 20 раз. И с 1300 рублей 2012 года дойдет до 20 тысяч рублей в 2020 году.
                </div> <!-- //.inner -->
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Как определить кадастровую стоимость своей квартиры или дома?
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <div class="inner">
                  Чтобы определить кадастровую стоимость своей квартиры или дома, надо зайти на портал Росреестра и там запросить данные о кадастровой оценке стоимости вашей квартиры или любой другой недвижимости. Предполагается, что собственник через суд сможет оспорить кадастровую стоимость своего жилья, если будет не согласен с оценкой, которая будет максимально приближена к рыночной стоимости недвижимости.
                </div> <!-- //.inner -->
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Перечень документов для регистрации договора купли-продажи в УФСГРКиК
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <div class="inner">
                  Для того, что бы зарегистрировать договор купли-продажи и переход права на основании его требуются следующие документы:<br> 
                  1. Заявление, с просьбой зарегистрировать договор и переход права.<br> 
                  2. Квитанция об оплате государственной пошлины.<br> 
                  3. Подписанный сторонами договор купли продажи. Количество экземпляров из расчета количества сторон и один для регистрирующего органа. Оформить договор купли-продажи можно как в нотариальной форме (у нотариуса), так и в простой письменной форме (например, в агентстве недвижимости).<br> 
                  4. Правоустанавливающие документы на квартиру, т.е. документы, на основании которых вы приобрели данную квартиру в собственность (это может быть договор передачи, свидетельство о праве на наследство, договор купли-продажи и проч.)<br> 
                  5. Кадастровый паспорт и экспликация.<br> 
                  6. Выписка из домовой книги или Единый жилищный документ.<br> 
                  7. Согласие супруга Покупателя на сделку (если таковой на момент подписания договора купли-продажи состоит в браке, и между супругами не установлен иной режим собственности супругов (раздел имущества, брачный договор).<br> 
                  8. Согласие супруга Продавца на сделку. Исключение: отчуждение супругом жилого помещения, полученного им в собственность до брака либо в период брака, но по безвозмездной сделке, а именно в порядке приватизации, наследования, дарения/, либо наличие установленного иного режима собственности супругов: раздел имущества, брачный договор)<br> 
                  9. Отказ от права преимущественной покупки сособственников. Требуется в случае продажи доли/комнаты не сособственнику, а третьему лицу.<br> 
                  10. Разрешение органов опеки и попечительства. Требуется в случае отчуждения жилого помещения или доли в нем несовершеннолетним ребенком.
                </div> <!-- //.inner -->
              </div>
            </div>
          </div>
        </div>
      </section><!-- //.section-faq -->

    </div> <!-- //.container -->

<!-- //Hero Search -->
<?php


get_footer(); ?>