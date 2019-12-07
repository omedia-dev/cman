<?php

/**
 * Template Name: Add Object
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */
$current_user = wp_get_current_user();
acf_form_head();
get_header();
// Hero Search

if( isset($_GET['edit']) && strip_tags ($_GET['edit']) != "" ){
    $editPostId = (int)strip_tags ($_GET['edit']);
    $my_title = "Редактирование: " . get_the_title( get_post($editPostId)->ID );

    if($current_user->ID == get_post($editPostId)->post_author){

    }

} else {
    $editPostId = "new_post";
    $my_title = get_the_title();
}

?>

<div class="container inner-page">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавить объявление</li>
        </ol>
    </nav>
    
    <?php if($current_user->roles[0] == "administrator" || $current_user->roles[0] == "saler"): ?>

    <h1 class="page-title"><?php echo $my_title; ?></h1>

    <div class="content">


    <?php
            $options = array(
                'id' => 'acf-newobject',
                'post_id' => $editPostId,
                'new_post' => array(
                    'post_title'    => 'Аренда недвижимости. ' . $current_user->user_login,
                    'post_type'     => "nedv_arenda",
                    'post_content'  => "",
                    'post_status'   => 'pending',
                    'post_author'   => $current_user->ID,
                ),
                'form' => true,
                'submit_value'	=> 'Разместить объявление',
                'post_title' => false,
                'return' => '/post-success/',
                'uploader' => 'basic',
                'field_groups' => array(47, 91),
                'html_submit_button' => '<input type="submit" class="acf-button btn btn-default btn-lg" value="%s" />',
            );
        if( is_super_admin() ){
            $options['new_post']['post_status'] = "publish";
            if( get_the_title() == 'Добавить объявление о продаже'){
                $options['new_post']['post_type'] = "nedv_sale";
                array_push($options['field_groups'], 120); //при продаже добавляем доп группу
            }
            if( get_the_title() == 'Добавить новый ЖК' ){
                $options['new_post']['post_type'] = "nedv_jk";
                $options['field_groups'] = array(124);
            }
        }
        
            acf_form($options);
       
       ?>



    </div> <!-- //.content -->

        <?php else: ?>
 
        <div class="emptyblock my-5 py-5 text-center">
          <div class="emptyblock__img h1"><span class="lnr lnr-apartment"></span></div>
          <div class="h1">Вам необходимо войти,<br>чтобы добавлять объявления</div>
          <div class="mb-5">
            <a href="/lk/" class="btn btn-default btn-lg">Войти</a>
          </div>
        </div>

        <?php endif; ?>

</div> <!-- //.container -->



<!-- //Hero Search -->
<?php


get_footer(); ?>