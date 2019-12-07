<?php
ob_start();
/**
 * Header Template
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */

$current_user = wp_get_current_user();
?>
<!DOCTYPE html>
<html lang="ru" <?php if(!is_super_admin()) echo 'class="notSuperAdmin"'; ?>>

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

      <header>
        <?php get_template_part('/includes/lk-header'); ?>
        <nav class="navbar navbar-expand-md">
          <div class="container">
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="mainMenu">
              <!-- навигация -->

              <ul class="main-menu navbar-nav justify-content-between w-100">
                <li class="nav-item active"><a href="/" class="nav-link">Главная</a></li>
                <li class="nav-item"><a href="/about/" class="nav-link">О нас</a></li>
                <li class="nav-item"><a href="/catalog/" class="nav-link"><span class="lnr lnr-menu mr-2 align-middle"></span>Каталог недвижимости</a>					
				<li class="nav-item"><a href="/build-catalog/" class="nav-link"><span class="lnr lnr-menu mr-2 align-middle"></span>Новостройки</a>                  
                </li>
				  
                <li class="nav-item"><a href="/trade-in/" class="nav-link">Trade in</a></li>
                <li class="nav-item"><a href="/zastrojshhikam/" class="nav-link">Застройщикам</a></li> 
                <li class="nav-item"><a href="/contacts/" class="nav-link">Контакты</a></li> 
				  
                <li class="nav-item"><a href="#" class="nav-link link-underline" data-hystmodal="#jsForm1Modal"><span>Бесплатная консультация</span></a></li>
              </ul>
            </div>
          </div> <!-- //.container -->
        </nav>
      </header>

          <div class="clear"></div>

        <?php do_action('before_main_content'); ?>

        <!-- Main Content -->
        <div id="main-content">