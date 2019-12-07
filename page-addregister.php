<?php

/**
 * Template Name: Страница регистрации
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */
$current_user = wp_get_current_user();
acf_form_head();
get_header();
// Hero Search

?>

<div class="container inner-page mb-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Регистрация</li>
        </ol>
    </nav>
    
    <?php if( !is_user_logged_in() ): ?>

    <h1 class="page-title" style="text-align:center;"><?php the_title(); ?></h1>

    <div class="content">
        <div class="reg-form-page">
        <?php echo do_shortcode('[user_registration_form id="4657"]'); ?>
        </div>
    </div> <!-- //.content -->

        <?php else: ?>
            <h1 class="page-title">Вы уже зарегистрированы</h1>
            <a href="<?php echo wp_logout_url("/"); ?>" class="btn btn-default btn-lg">Выйти</a>
        <?php endif; ?>

</div> <!-- //.container -->



<!-- //Hero Search -->
<?php


get_footer(); ?>