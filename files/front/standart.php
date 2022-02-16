<?php
// стандартный пост без анонса и миниатюры
$titan = TitanFramework::getInstance( 'gpress' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('gp-entry standart-post load-post gp-clearfix'); ?> itemscope itemtype="http://schema.org/Article">

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
		
		<div class="post-content" itemprop="articleBody">
			<?php 
				the_content(); 
				
				//микроразметка
				  get_template_part ('files/back/microdata');
			?>
		</div><!-- end post-content -->
		
</article><!-- end entry --> 