<?php
/*
Template Name: Чистая страница
*/
$titan = TitanFramework::getInstance( 'gpress' );

?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<?php
// шаблон шапки сайта
$titan = TitanFramework::getInstance( 'gpress' ); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
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

<div class="wrap">
<div class="port gp-clearfix">
<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="post-content">
<?php the_content(); ?>
</section>
<?php endwhile; ?>
<?php endif; ?>
 
</div><!-- end port -->
</div><!-- end wrap-->
    

<?php wp_footer();  ?> 

<?php 
// выводим код статистики Google Analytics
echo $titan->getOption( 'googlecode' ); ?>
</body>
</html>