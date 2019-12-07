<?php

/**
 * Template Name: Контакты
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
      <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
    </ol>
  </nav>

  <h1 class="page-title"><?php the_title(); ?></h1>

  <?php if (have_rows('contact')) : ?>
    <?php while (have_rows('contact')) : the_row(); ?>
      <div class="row contacts mb-5">
        <div class="col-md-5 p-5 bg-grey">
          <h2 class="mb-3"><?php the_sub_field('title'); ?></h2>
          <dl class="mb-4">
            <dt>Адрес:</dt>
            <dd>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_gps_red.png" alt="">
              <?php the_sub_field('address'); ?>
            </dd>
          </dl>
          <dl class="mb-4">
            <dt>Телефон для связи:</dt>
            <dd>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_call.png" alt="">
              <a href="tel:<?php the_sub_field('phone-url'); ?>"><?php the_sub_field('phone'); ?></a>
            </dd>
          </dl>
          <dl>
            <dt>Почта для связи:</dt>
            <dd>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_mail.png" alt="">
              <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
            </dd>
          </dl>
        </div>
        <div class="col-md-7 p-0">
          <?php
          $location = get_sub_field('map');
          if( $location ): ?>
              <div class="acf-map contacts-map" data-zoom="12">
                  <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
              </div>
          <?php else : ?>
              <p class="py-3">Коодинаты места не добавлены</p>
          <?php endif; ?>
          <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2242.8698415355343!2d37.70698431593218!3d55.79549798056481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b53509a015ba75%3A0xfc8e8249f09292ec!2z0J_RgNC10L7QsdGA0LDQttC10L3RgdC60LDRjyDQv9C7LiwgN9CQINGB0YLRgNC-0LXQvdC40LUgMSwg0JzQvtGB0LrQstCwLCDQoNC-0YHRgdC40Y8sIDEwNzA3Ng!5e0!3m2!1sru!2sua!4v1568660820096!5m2!1sru!2sua" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>



  <section class="section-services">
    <h3 class="section-title">Закажите звонок и мы перезвоним вам в ближайшее время</h3>
    <?php echo (do_shortcode('[contact-form-7 id="225" title="Заявка" from="Со стр. контакты"]')); ?>
  </section> <!-- //.section-services -->
</div> <!-- //.container -->



<!-- //Hero Search -->
<?php


get_footer(); ?>