<?php

/**
 * Template Name: Страница списка новостей
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */

if (!empty($_GET['search-listings'])) {
    get_template_part('search-listings');
    return;
}

$ct_mode = isset($ct_options['ct_mode']) ? esc_html($ct_options['ct_mode']) : '';
$ct_rev_slider = isset($ct_options['ct_home_rev_slider_alias']) ? esc_html($ct_options['ct_home_rev_slider_alias']) : '';
$ct_home_adv_search_style = isset($ct_options['ct_home_adv_search_style']) ? $ct_options['ct_home_adv_search_style'] : '';
$ct_hero_search_heading = isset($ct_options['ct_hero_search_heading']) ? esc_html($ct_options['ct_hero_search_heading']) : '';
$ct_hero_search_sub_heading = isset($ct_options['ct_hero_search_sub_heading']) ? esc_html($ct_options['ct_hero_search_sub_heading']) : '';
$ct_cta = isset($ct_options['ct_cta']) ? $ct_options['ct_cta'] : '';
$ct_cta_bg_img = isset($ct_options['ct_cta_bg_img']['url']) ? esc_url($ct_options['ct_cta_bg_img']['url']) : '';
$ct_cta_bg_color = isset($ct_options['ct_cta_bg_color']) ? esc_html($ct_options['ct_cta_bg_color']) : '';
$ct_hero_search_bg_video_placeholder = isset($ct_options['ct_hero_search_bg_video_placeholder']['url']) ? esc_html($ct_options['ct_hero_search_bg_video_placeholder']['url']) : '';
$ct_hero_search_bg_video = isset($ct_options['ct_hero_search_bg_video']['url']) ? esc_html($ct_options['ct_hero_search_bg_video']['url']) : '';

$layout = isset($ct_options['ct_home_layout']['enabled']) ? $ct_options['ct_home_layout']['enabled'] : '';

get_header();

// Hero Search

?>

<div class="container inner-page">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Новости</li>
        </ol>
    </nav>

    <h1 class="page-title"><?php the_title('', ''); ?></h1>

    <div class="content newspage">

        <?php
        // Вывод списка новостей
        $news_post = get_posts(array(
            'numberposts' => -1,
            'category'    => 0,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'include'     => array(),
            'exclude'     => array(),
            'meta_key'    => '',
            'meta_value'  => '',
            'post_type'   => 'news',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ));

        foreach ($news_post as $post) {
            setup_postdata($post); ?>


            <div class="newspage__item row">
                <div class="col-12 col-md-5 col-xl-3">
                    <div class="newspage__img">
                        <?php the_post_thumbnail('alike_thumbnail', array()); ?>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-xl-9">
                    <div class="newspage__right">
                        <a href="<?php echo get_permalink(); ?>" class="newspage__title"><?php the_title('', ''); ?></a>
                        <div class="newspage__meta"><?php the_date('d.m.Y', '', ''); ?></div>
                        <div class="newspage__text">
                            <div>
                                <?php echo wp_strip_all_tags(get_the_content(false, false)); ?>
                            </div>
                            <a href="<?php echo get_permalink(); ?>" class="newspage__link">Читать далее</a>
                        </div>
                    </div>
                </div>
            </div>



        <?php }

        wp_reset_postdata(); // сброс
        ?>

    </div> <!-- //.content -->
</div> <!-- //.container -->

<!-- //Hero Search -->
<?php


get_footer(); ?>