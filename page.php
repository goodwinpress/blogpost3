<?php
// шаблон страницы
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
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('gp-single-post'); ?>  itemscope itemtype="http://schema.org/Article">
  
    <div class="post-header">
    <?php
    // хлебные крошки
    if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
    ?>
    <h1 class="page-title"  itemprop="headline"><?php the_title(); ?></h1>
    </div> <!-- end post header -->
  
    <div class="post-content" itemprop="articleBody">
    <?php
      the_content();
    ?>
    </div><!-- end post-content -->
  
  </article><!-- end article -->

<?php 
endwhile;  
endif;  

  // комментарии
  if ($titan->getOption( 'com-page-loc' ) == '1') { 
    if ( comments_open() ) { 
      comments_template();
      echo '<div id="gp-comments"  class="toggle-comments">&nbsp;</div>';
    }
  }
?>

</main>

  <?php
  // отключение сайдбара
  if ($sidebar_loc == 'Выключить') {
  } else {
    get_sidebar('page');
  } 
  ?>

</div><!-- end port -->
</div><!-- end gp container -->

<?php get_footer(); ?>