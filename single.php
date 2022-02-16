<?php
// шаблон записи

$titan = TitanFramework::getInstance( 'gpress' );

get_header(); ?>

<div class="gp-container gp-clearfix">
  <div class="port gp-clearfix">
 
    <?php
    // отключение сайдбара
    $sidebar_loc =  get_post_meta( $post->ID, 'gp_sidebar', true);
      if ($sidebar_loc == 'Выключить') {
        echo '<main class="fullwidth">';
      } else { 
        echo '<main>';
      } 

      // начало цикла
    if ( have_posts() ) : while ( have_posts() ) : the_post();  
    
    // изображение записи
    if ($titan->getOption( 'featured-img-loc' ) == '1') {
    single_thumbnail();
    }
    ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('gp-single-post'); ?> itemscope itemtype="http://schema.org/Article">

  <div class="post-header">
  
    <?php
    // хлебные крошки
    if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
    ?>
  
    <h1 class="post-title" itemprop="headline"><?php the_title(); ?></h1>
  
    <?php 
    // отрывок
    if ($titan->getOption( 'single-excerpt-loc' ) == '1') {  
    echo '<div class="post-excerpt">';
    the_excerpt();
    echo '</div>';
    } 
    ?>
  
    <?php 
    // информация о записи
    if ($titan->getOption( 'single-date-loc' ) == '1') { ?>
    <span class="post-date"><?php echo get_the_time('d F Y'); ?> &nbsp; (<?php echo _e( 'обновлено', 'blogpost-3' ) . '&nbsp;' . get_the_modified_date();?>) &nbsp; &middot; &nbsp;
    <?php _e( 'На чтение', 'blogpost-3' ); ?>: <?php echo gp_read_time(); ?> <?php _e( 'мин', 'blogpost-3' ); ?></span>
    <span class="go-comments"><?php _e( 'Комментарии', 'blogpost-3' ); ?>: <?php comments_number('0','1','%'); ?></span>
    <?php } ?>
    
  </div> <!-- end post header -->

  <div class="post-content" itemprop="articleBody">
    <?php
    // контент записи
      the_content();
      
      // панель навигации внутри записи
      wp_link_pages(array('before' => '<div class="post-nav"><p>' . __('Продолжение', 'blogpost-3') . ':</p>', 'after' => '</div>', 'next_or_number' => 'number')); 

      //микроразметка
      get_template_part ('files/back/microdata');
    ?>
  </div><!-- end post-content -->
    
  <?php
  //метки
    if ($titan->getOption( 'tags-loc' ) == '1') {  
      echo '<span class="gp-post-tags">';
        the_tags('');  
      echo '</span> <!-- end gp-post-tags-->';
     } 
   ?>

 <div class="post-footer">

   <?php
   // поделиться в соц. сетях
     if ($titan->getOption( 'single-social-loc' ) == '1') { 
    get_template_part ('files/front/share-btns');
     }
     
    // произвольный контент в подвале
    $post_footer = $titan->getOption('post-footer-content'); 
    echo do_shortcode( $post_footer );
  ?>
  
  </div> <!-- end post-footer -->
 
</article><!-- end article -->

  <?php 
    endwhile;  
    endif; 

  // комментарии
  if ($titan->getOption( 'com-post-loc' ) == '1') { 
    if ( comments_open() ) { 
      
      comments_template();
     
      if ($titan->getOption( 'com-spoiler-loc' ) == '1') { 
        echo '<div id="gp-comments"  class="toggle-comments">&nbsp;</div>';
      }
      
    }
  }

     if ($titan->getOption( 'nav-loc' ) == '1') {  
     // Внутренняя навигация 
       get_template_part ('files/front/post-navigation');  
     }

     if ($titan->getOption( 'more-posts-loc' ) == '1') {  
     // записи из той же рубрики
       get_template_part ('files/front/more-posts'); 
   }
  ?>
  
  </main>

  <?php
    // отключение сайдбара
    if ($sidebar_loc == 'Выключить') {
    } else {
      get_sidebar('post');
    } 
  ?>

  </div><!-- end port -->
</div><!-- end gp container -->

<?php get_footer(); ?>