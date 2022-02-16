<?php
// обычный анонс
$titan = TitanFramework::getInstance( 'gpress' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('gp-entry load-post gp-clearfix'); ?> itemscope itemtype="http://schema.org/Article">

<?php
// изображение записи
blog_thumbnail();
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
	// анонс или отрывок
	if ($titan->getOption( 'anons-loc' ) == '1') {
		echo '<p class="post-content" itemprop="articleBody">' . truncate_post(260) .'</p>'; 
	} else {
		echo '<div class="post-content" itemprop="articleBody">' . get_the_excerpt() .'</div>'; 
	}
		
	//микроразметка
	get_template_part ('files/back/microdata');
	?>
 

</article><!-- end entry --> 