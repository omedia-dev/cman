<div class="top-header d-sm-none d-none d-md-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-2 col-lg-2 col-xl-2 align-self-center">
                <?php the_custom_logo(); ?>
                <!-- <a href="/" class="logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="logo">
                </a> -->
            </div> <!-- //.col -->
            <div class="col-6 col-sm-6 col-md-6 col-lg-7 col-xl-5 offset-xl-2 align-self-center text-right">
                <?php if (is_user_logged_in()) : ?>
                    <a href="/lk/" class="link-underline mr-4">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_avatar.png" alt=""><span>Личный кабинет</span>
                    </a>
                    <a href="<?php echo wp_logout_url("/"); ?>" class="link-underline mr-4"><span>Выйти</span></a>
                <?php else : ?>
                    <a href="/user-reg/" class="link-underline mr-4">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_avatar.png" alt=""><span>Регистрация</span>
                    </a>
                    <a href="/lk/" class="link-underline mr-4">
                        <span>Вход</span>
                    </a>
                <?php endif; ?>
                <a href="/liked/" class="link-underline">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_heart.png" alt="">
                    <span class="badge badge-pill badge-danger">
                        <?php echo do_shortcode('[user_favorite_count]'); ?>
                    </span>
                    <span>Избранное</span>
                </a>
            </div> <!-- //.col -->
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 align-self-center">
                <div class="tel-wrap ml-xl-5">
                    <span class="d-block">По всем вопросам:</span>
                    <a href="tel:+74951145445" class="tel d-block">+7 (495) 114-54-45</a>
                    <a href="#" class="link-underline d-block" data-hystmodal="#jsForm2Modal"><span>Написать нам</span></a>
                </div> <!-- //.tel-wrap -->
            </div> <!-- //.col -->
        </div> <!-- //.row -->
    </div> <!-- //.container -->
</div> <!-- //.top-header -->
<div class="mobile-header py-3 d-md-none">
    <div class="container">
        <div class="mobile-logo">
            <?php the_custom_logo(); ?>
        </div>
        <!-- <a href="/" class="navbar-brand mobile-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="logo"></a> -->
        <div class="wrap float-right">
            <a href="/liked/" class="link-underline d-inline-block">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_heart.png" alt="">
                <span class="badge badge-pill badge-danger"><?php echo do_shortcode('[user_favorite_count]'); ?></span>
            </a>
            <a href="/lk/" class="lk d-inline-block"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon_avatar.png" alt=""></a>
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapse button -->
        </div> <!-- //.wrap -->
        <a href="tel:+74950195372" class="tel d-block text-center mt-3">+7 (495) 114-54-45</a>
        <a href="mailto:info@cmangroup.ru" class="link-underline d-block text-center mt-3" data-hystmodal="#jsForm2Modal"><span>Написать нам</span></a>
    </div> <!-- //.container -->
</div> <!-- //.mobile-header -->