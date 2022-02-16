<?php
// красивый анонс
$titan = TitanFramework::getInstance( 'gpress' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('gp-entry load-post specialpost gp-clearfix');  special_post_thumbnail(); ?> itemscope itemtype="http://schema.org/Article">

<div class="specialpost-caption">
<span class="post-info"><?php the_category(', ') ?>
<?php 
// отключаем дату
if ($titan->getOption( 'date-loc' ) == '1') {
	echo ' &nbsp; &mdash; &nbsp;';
	echo get_the_time('d F Y'); 
	}
?> </span>

<h2 class="post-title"><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

 
	<?php 
		// анонс или отрывок
		if ($titan->getOption( 'anons-loc' ) == '1') {
			echo '<p class="post-content">' . truncate_post(260) .'</p>'; 
		} else {
			echo '<div class="post-content" itemprop="articleBody">' . get_the_excerpt() .'</div>'; 
		}
	
	//микроразметка
	get_template_part ('files/back/microdata');
	?>
 
<a class="more-link" href="<?php echo get_permalink(); ?>"><?php _e('Подробнее', 'blogpost-3'); ?> &raquo;</a> 
</div><!-- end specialpost caption -->

</article><!-- end entry --> 