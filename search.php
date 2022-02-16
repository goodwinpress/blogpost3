<?php
// шаблон страницы поиска

$titan = TitanFramework::getInstance( 'gpress' );

get_header(); ?>

<div class="gp-container gp-clearfix">
	
	<div class="port gp-clearfix">
		
	<main role="main">
	
			<div class="search-header">
			
				<?php
				// хлебные крошки
				if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
				?>
		 
				<h1 class="page-title"><?php _e('Вы искали', 'blogpost-3'); ?>: <?php the_search_query(); ?></h1>
				<span class="search-desc"><?php _e( 'Найдено публикаций', 'blogpost-3' ); ?>: &nbsp;<?php echo $wp_query->found_posts; ?></span>
			 
		 	</div><!-- end search-header -->
				
			<div class="gp-scroll">	
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		 
			 	<article id="post-<?php the_ID(); ?>" <?php post_class('gp-entry load-post gp-clearfix'); ?> itemscope itemtype="http://schema.org/Article">
				 
				 <?php 
				 // отключение даты
			 	if ($titan->getOption( 'date-loc' ) == '1') { ?>
				 <span class="post-info"><?php the_time('d.m.Y');  ?></span>
				 <?php 
				 } ?>
				
				<h2 class="post-title"><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<p class="post-content"><?php truncate_post(540); ?></p>
				<a class="more-link" href="<?php echo get_permalink(); ?>"><?php _e('Подробнее', 'blogpost-3'); ?> &raquo;</a> 
				
				</article><!-- end entry --> 
						
			<?php 
			endwhile; 
			endif;  
					
		 
			if ($titan->getOption( 'nav_type' ) == '1') {
				//  бесконечная прокрутка  
				gp_scroll_nav(''); 
			} else {
				// стандартная навигация
				gp_pagination_nav();
			}
			 
			?>
			
			</div><!-- gp scroll -->
		</main>
		
		<?php
		 get_sidebar('blog');
		 ?>

	</div><!-- end port -->
</div><!-- end gp container -->
	
<?php get_footer(); ?>