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
              <?php
                wp_nav_menu([
                  'menu'            => 'HeaderMenu',
                  'container'       => false,
                  'container_class' => '',
                  'container_id'    => '',
                  'menu_class'      => '',
                  'menu_id'         => '',
                  'echo'            => true,
                  'items_wrap'      => 
                    
                    '<ul class="main-menu navbar-nav justify-content-between w-100">
                      %3$s
                      <li class="menu-item">
                        <a href="#" class="nav-link link-underline" data-hystmodal="#jsForm1Modal">
                          <span>Бесплатная консультация</span>
                        </a>
                      </li>
                    </ul>',

                  'depth'           => 0,
                  'walker'          => '',
                ]);
              ?>


            </div>
          </div> <!-- //.container -->
        </nav>
      </header>

          <div class="clear"></div>

        <?php do_action('before_main_content'); ?>

        <!-- Main Content -->
        <div id="main-content">