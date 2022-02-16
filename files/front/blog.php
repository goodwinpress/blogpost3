<?php
// блог 
$titan = TitanFramework::getInstance( 'gpress' );
?>
<div class="port">
  
    <?php  if ($titan->getOption( 'blog-type' ) == '3') { ?>
    <main class="fullwidth gp-scroll grid-wrapper">
      <?php } else { ?>
    <main class="gp-scroll">
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

  if ($titan->getOption( 'nav_type' ) == '1') {
  //  бесконечная прокрутка  
  gp_scroll_nav(''); 
  } else {
  // стандартная навигация
  gp_pagination_nav();
  }
?>

    </main><!-- end home-blog-col -->

  <?php 
  if ($titan->getOption( 'blog-type' ) == '3') {
  } else {
    get_sidebar('blog');
  }  
  ?>

</div><!-- end port -->