<?php
// шаблон архивов

$titan = TitanFramework::getInstance( 'gpress' );

get_header(); ?>

<div class="gp-container gp-clearfix">
	<div class="port gp-clearfix">

	<?php  if ($titan->getOption( 'blog-type' ) == '3') { ?>
	<main class="fullwidth">
	  <?php } else { ?>
	<main>
	 <?php }  ?>
 
	<div class="arch-header">
	<?php
		// хлебные крошки
		if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
	
		// заголовок
		the_archive_title( '<h1 class="page-title">', '</h1>' );
	
		// описание архива
		if ($paged < 2) {  
			if ($titan->getOption( 'desc-loc' ) == '1') { 
				cat_description();	 
			}
		
			// дочерние рубрики, если есть
			if ($titan->getOption( 'child-cat-loc' ) == '1') {
				child_categories();
			}
		}
	?>
	</div> <!-- end arch-header -->

<?php  if ($titan->getOption( 'blog-type' ) == '3') { ?>
<div class="gp-scroll grid-wrapper">
	<?php } else { ?>
<div class="gp-scroll">
	<?php }  ?>
 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

  if ($titan->getOption( 'blog-type' ) == '1') {
	
	  // красивый анонс
	  $fullpost =  get_post_meta( $post->ID, 'special_check', true); 
	  if( ! empty( $fullpost) )  {    
		get_template_part ('files/front/special-post'); 
	  } else { 
		// обычный анонс
		get_template_part ('files/front/regular-post'); 
	  } 
	
  }
  
	if ($titan->getOption( 'blog-type' ) == '2') {
	  // стандартный пост
		get_template_part ('files/front/standart'); 
	}
	
	if ($titan->getOption( 'blog-type' ) == '3') {
	  // сетка записей, без сайдбара
		get_template_part ('files/front/grid'); 
		 
	}
 
endwhile; 
endif;  

// fix для justify-content:space-between
echo '<div class="grid-post flex-align-fix"></div>';

	//  бесконечная прокрутка
	if ($titan->getOption( 'nav_type' ) == '1') {  
		gp_scroll_nav(''); 
	} else {
		// стандартная навигация
		gp_pagination_nav();
	}
?>
 
 </div><!-- gp scroll -->
</main>

		<?php 
		  if ($titan->getOption( 'blog-type' ) == '3') {
		  } else {
			get_sidebar('blog');
		  }  
		?>
  
</div><!-- end port -->
</div><!-- end gp container -->

<?php get_footer(); ?>