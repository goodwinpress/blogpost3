<?php //$titan = TitanFramework::getInstance( 'gpress' ); ?>
<div class="more-posts gp-clearfix">
<span class="more-posts_block-title"><?php _e('Ещё публикации из этой рубрики', 'blogpost-3'); ?>:</span> 
    <div class="more-posts_wrapper">
        
    <?php 
    $current_id = get_the_ID();
    $categories = get_the_category();  
    $cat_id = $categories[0]->cat_ID;
    
    $query = new WP_Query( array( 'cat' => $cat_id, 'showposts' => 6,  'ignore_sticky_posts' => 1, 'post__not_in' => array($current_id), ));
    while ( $query->have_posts() ) : $query->the_post();  ?>
     
        <div class="more-posts_item gp-clearfix">
        <?php
        small_thumbnail();
        ?>
        <span class="more-posts_title"><a href="<?php echo get_permalink(); ?>" rel="bookmark" itemprop="url"><?php the_title(); ?></a></span>
        </div> <!-- end more-posts_item -->
            
    <?php 
    endwhile;
    wp_reset_postdata(); 
    ?>
    
    </div><!-- end more posts_wrapper -->
</div><!-- end more posts -->