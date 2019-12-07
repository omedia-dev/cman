<?php
/**
 * Template Name: Личный кабинет
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */


$current_user = wp_get_current_user();
$userid = 'user_' . $current_user->ID;


?>

<?php if( is_user_logged_in() ): ?>

<!DOCTYPE html>
<html <?php if(!is_super_admin()) echo 'class="notSuperAdmin"'; ?>>
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><html <?php language_attributes(); ?>><![endif]-->
<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <?php wp_head(); ?>

  <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    
</head>

<body>
    
    <!-- Wrapper -->
    <div id="wrapper" >
      <header class="lk-header">
        <?php get_template_part('/includes/lk-header'); ?>
        <nav class="navbar navbar-expand-md">
          <div class="container">
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="mainMenu">
              <ul class="main-menu user-menu navbar-nav justify-content-between w-100">
                <li class="nav-item active"><a href="/lk/" class="nav-link">Личная информация</a></li>
                <li class="nav-item"><a href="/lk/rent-list/" class="nav-link">Объекты аренды</a></li>
                <?php if(is_super_admin()) : ?>
                  <li class="nav-item"><a href="/sale-list/" class="nav-link">Объекты продажи</a></li>
                <?php endif; ?>
                <li class="nav-item"><a href="/addnew/" class="btn btn-default">Добавить объявление</a></li>
              </ul>
            </div>
          </div> <!-- //.container -->
        </nav>
      </header>

<?php else : ?>
<?php get_header(); ?>
<?php endif; ?>

  <div class="main">
    
    <div class="container inner-page">
      
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
          <li class="breadcrumb-item active" aria-current="page">Личный кабинет</li>
        </ol>
      </nav>

      <h1 class="page-title">
        <?php
          $full_name = ucfirst(get_user_meta(get_current_user_id(), 'first_name', true));
          if (empty($full_name)) {
            $full_name = $current_user->display_name;
          }
          echo $full_name;
				?>
      </h1>


      <?php if(is_super_admin()): ?>
        <div class="btn-group btn-group-lg mb-4 lk-button-group" role="group">
          <a class="btn btn-light btn-group-lg" href="/addsale/">Добавить объявление о продаже</a>
          <a class="btn btn-light btn-group-lg" href="/addnew/">Добавить объявление об аренде</a>
          <a class="btn btn-light btn-group-lg" href="/addgk/">Добавить ЖК</a>
          <a class="btn btn-light btn-group-lg" href="/myfeeds/">Управление XML-фидами</a>
        </div>
      <?php endif; ?>


      <?php 
        echo do_shortcode('[user_registration_my_account]');
      ?>


    </div> <!-- //.container -->

  </div> <!-- //.main -->
  <!-- //Hero Search -->
<?php


get_footer(); ?>