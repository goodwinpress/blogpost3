<?php
// сетка записей по 3 в ряд без сайдбара
$titan = TitanFramework::getInstance( 'gpress' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('gp-entry grid-post load-post gp-clearfix'); ?> itemscope itemtype="http://schema.org/Article">

	 <?php
	 // изображение записи
	 medium_thumbnail();
	 ?>
 
	<span class="post-info"><?php the_category(', ') ?>
	<?php 
	// отключаем дату, если нужно
	if ($titan->getOption( 'date-loc' ) == '1') {
		echo ' &nbsp; &mdash; &nbsp;';
		echo get_the_time('d F Y'); 
		}
	?>
	</span>

<h2 class="post-title"><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php 
	//микроразметка
    get_template_part ('files/back/microdata');
  ?>
</article><!-- end entry --> 