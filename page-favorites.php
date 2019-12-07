<?php

/**
 * Template Name: Страница Избранное
 *
 */
get_header(); ?>
<div class="container inner-page mb-6">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php wp_title(""); ?></li>
        </ol>
    </nav>
    <h1 class="page-title"><?php echo the_title("", "", true); ?></h1>
    <div class="favorlist__wrap">
    <?php
    $favorite_posts_ids =  get_user_favorites();
    if($favorite_posts_ids) : ?>

    <?php the_user_favorites_list(); ?>
    
    <div class="favorlist__del py-5">
        <?php the_clear_favorites_button(); ?>
    </div>
    <?php else: ?>
        <div class="emptyblock my-5 pt-5 text-center">
            <div class="emptyblock__img h1"><span class="lnr lnr-apartment"></span></div>
            <div class="h1">Вы не добавили <br>объектов в избранное</div>
            <div class="my-5">
            <a href="/nedv_arenda/" class="btn btn-default">Перейти в каталог</a>
            </div>
        </div>
    <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>