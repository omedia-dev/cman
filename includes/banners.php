      <!-- CЛАЙДЕР БАННЕРОВ -->
      <div class="slider-inner">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <?php
          // Вывод Баннеров
          $banners_post = get_posts(array(
            'numberposts' => -1,
            'category'    => 0,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'include'     => array(),
            'exclude'     => array(),
            'meta_key'    => '',
            'meta_value'  => '',
            'post_type'   => 'banners',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
          ));

          ?>
          <ol class="carousel-indicators">
          <?php foreach ($banners_post as $key => $post): setup_postdata($post); ?>
                <li data-target="#carouselExampleCaptions"
                    data-slide-to="<?php echo $key; ?>"
                    class="<?php if($key == 0){ echo 'active'; } ?>">
                </li>
          <?php endforeach; ?>
          </ol>
          <div class="carousel-inner">
            <?php foreach ($banners_post as $key => $post): ?>
                  <div class="carousel-item <?php if($key == 0){ echo 'active'; } ?>">
                    <img src="<?php echo get_field("banner__img"); ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                      <p><?php echo get_field("banner__text"); ?></p>
                      <a href="<?php echo get_field("banner__link"); ?>" class="btn btn-default">Подробнее</a>
                    </div>
                  </div>
            <?php 
              endforeach;
              wp_reset_postdata();
            ?>
          </div>
        </div>
      </div><!-- //.slider-inner -->
      <!-- //CЛАЙДЕР БАННЕРОВ -->