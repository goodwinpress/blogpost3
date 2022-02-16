<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<?php
// шаблон шапки сайта
$titan = TitanFramework::getInstance( 'gpress' ); ?>

<head>
   <?php 
   // выводим код статистики Google Analytics
   echo $titan->getOption( 'googlecode' ); 
   ?>
   
   
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

   <?php
      //подключаем favicon
      if ( ! empty( $titan->getOption( 'favicon' )) ) {
         get_template_part('/files/front/favicon');
      }
      
         //верификация сайта
         echo $titan->getOption('verification');
      
         //выводим facebook pixel, если есть
         echo $titan->getOption('pixel');
         
      wp_head(); 
   ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php 
   // выводим статистику яндекс метрики (без кнопки)
   echo $titan->getOption( 'yandexcode' ); 
?>
   
<div id="site-wrapper">
   <div class="wrap">
 
      <?php 
         // кнопка открытия мобильного меню
         mob_menu_button();
      ?>


      <header class="gp-clearfix" itemscope itemtype="http://schema.org/WPHeader">
         <div class="header-flex-port">
            
            <?php 
               // текстовый заголовок или логотип, на выбор
               if ($titan->getOption( 'site-title' ) == '1') {
                  header_text_title();
               } else {
                  header_logo_title();
               }
            
               // меню в шапке 
               gp_header_nav();
            ?>
            
         <div class="search-site open_modal" rel="popup1">
             <span class="search-site-btn"></span>
         </div>
         
            <?php
            if ($titan->getOption( 'login-loc' ) == '1') {
            // кнопка логина 
             gp_login();
          }
          
          if ($titan->getOption( 'darkmode-loc' ) == '1') {
             // кнопка переключения режимов 
             darkmode_switch();
          }
          ?>
         
         </div> <!-- end header-flex-port -->   
      </header> <!-- end header -->