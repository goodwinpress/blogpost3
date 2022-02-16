<?php
/*
шаблон ответа при ошибке 404
*/
$titan = TitanFramework::getInstance( 'gpress' );  
get_header(); ?>

<div class="gp-container gp-clearfix">
<div class="port gp-clearfix">


<main role="main"> 
  
  <div class="page404-figure">
  <span>404</span>
  </div><!-- end page404-figure -->

  <article <?php post_class('gp-single-post'); ?>  itemscope itemtype="http://schema.org/Article">
  
    <div class="post-header">
    <?php
    // хлебные крошки
      if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
    ?>
    
    <h1 class="post-title"  itemprop="headline"><?php _e('Упс', 'blogpost-3'); ?></h1>
    </div> <!-- end post header -->
  
    <div class="post-content" itemprop="articleBody">
    <p><?php echo $titan->getOption( '404-text' ); ?></p>
    </div><!-- end post-content -->
  
  </article><!-- end article -->

  <div class="more-posts gp-clearfix">
    <div class="more-posts_wrapper">
      
      <?php 
      $query = new WP_Query( array(  'showposts' => 6,  'ignore_sticky_posts' => 1 ));
      while ( $query->have_posts() ) : $query->the_post();  ?>
      
        <div class="more-posts_item gp-clearfix">
        <?php small_thumbnail(); ?>
        <span class="more-posts_title"><a href="<?php echo get_permalink(); ?>" rel="bookmark" itemprop="url"><?php the_title(); ?></a></span>
        </div> <!-- end more-posts_item -->
        
      <?php 
      endwhile;
      wp_reset_postdata(); 
      ?>
      
    </div><!-- end more posts_wrapper -->
  </div><!-- end more posts -->
 
</main>

<?php
get_sidebar('page');
?>

</div><!-- end port -->
</div><!-- end gp container -->

<?php get_footer(); ?>