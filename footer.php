<div class="clear"></div>

</div>
<!-- //Main Content -->

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row pb-3 pt-5">
      <div class="col-12 col-md-3 widget-brand mb-3">
        <a href="/" class="d-block"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/logo_footer.png'; ?>" alt="" class="w-75"></a>
        <p>Центральное Московское<br>Агентство Недвижимости</p>
      </div> <!-- //.col -->
      <div class="col-6 col-md-3 widget-menu mb-3">
        <?php
        wp_nav_menu([
          'menu'            => 'FooterMenuLeft',
          'container'       => false,
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => '',
          'menu_id'         => '',
          'echo'            => true,
          'items_wrap'      => '<ul>%3$s</ul>',
          'depth'           => 0,
          'walker'          => '',
        ]);
        ?>
      </div> <!-- //.col -->
      <div class="col-6 col-md-3 widget-menu mb-3">
        <?php
        wp_nav_menu([
          'menu'            => 'FooterMenuRight',
          'container'       => false,
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => '',
          'menu_id'         => '',
          'echo'            => true,
          'items_wrap'      => '<ul>%3$s</ul>',
          'depth'           => 0,
          'walker'          => '',
        ]);
        ?>
      </div> <!-- //.col -->
      <div class="col-12 col-md-3 widget-contacts mb-3">
        <dl>
          <dt>Головной офис:</dt>
          <dd>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_gps.png" alt="">
            Россия, Москва, Преображенская площадь, 7А, стр. 1<br>м. Преображенская площадь
          </dd>
        </dl>
        <dl>
          <dt>По всем вопросам:</dt>
          <dd>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_phone.png" alt="">
            <a href="tel:+74951145445">+7 (495) 114-54-45</a>
          </dd>
        </dl>
        <dl>
          <dt>Отдел продаж:</dt>
          <dd>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_email.png" alt="">
            <a href="mailto:info@cmangroup.ru" data-hystmodal="#jsForm2Modal">info@cmangroup.ru</a>
          </dd>
        </dl>
        <dl>
          <dt>Соцсети:</dt>
          <dd>
            <a href="https://www.facebook.com/pg/CMAN-GROUP-862674080747413/posts/?ref=page_internal" class="d-inline-block mr-1"><i class="fab fa-facebook-square"></i></a>
            <a href="https://www.instagram.com/cman__group/" class="d-inline-block"><i class="fab fa-instagram"></i></a>
            <a href="https://vk.com/cman_group" class="d-inline-block"><i class="fab fa-vk"></i></a>
          </dd>
        </dl>
      </div> <!-- //.col -->
    </div> <!-- //.row -->
    <div class="row copyright justify-content-between pb-3 pl-1 pr-1">
      <a href="/politika-konfidenczialnosti/">Политика конфиденциальности</a>
      <a href="https://tritek.su">Сайт разработан Tritek в 2019 году.</a>
    </div> <!-- //.row copyright -->
  </div> <!-- //.container -->
</footer>
<!-- //Footer -->

</div><!-- //wrapper -->





<div class="hystmodal" id="jsForm1Modal" aria-hidden="true">
    <div class="hystmodal__wrap abs-bf">
        <div class="hystmodal__window formmodal" role="dialog" aria-modal="true">
            <button class="modal__close flexi" data-hystclose><span class="lnr lnr-cross"></span></button>
            <div class="formmodal__wrap">
              <?php echo do_shortcode('[contact-form-7 id="221" title="Попап-Бесплатная консультация"]'); ?>
            </div>
        </div>
    </div>
</div><!-- //#jsForm1Modal -->


<div class="hystmodal" id="jsForm2Modal" aria-hidden="true">
    <div class="hystmodal__wrap abs-bf">
        <div class="hystmodal__window formmodal" role="dialog" aria-modal="true">
            <button class="modal__close flexi" data-hystclose><span class="lnr lnr-cross"></span></button>
            <div class="formmodal__wrap">
              <?php echo do_shortcode('[contact-form-7 id="223" title="Попап-Написать нам"]'); ?>
            </div>
        </div>
    </div>
</div><!-- //#jsForm1Modal -->








<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpXFjCvah4hnFrwrzU2DCihwMBbiNCKFc"></script>
<?php wp_footer(); ?>

</body>

</html>