<?php
// Раздел Читайте также
$titan = TitanFramework::getInstance( 'gpress' ); ?>

<div class="port"> 
    <div class="further-reading">
    <span class="block-name"><?php _e('Читайте также', 'blogpost-3'); ?></span>
        <div class="flex-port no-margin">
            
            
            <?php 
            $current_id = get_the_ID();
            
            // вывод записей, отобранных вручную
            if ($titan->getOption( 'further_type' ) == '1') :  
            $query = new WP_Query( array( 'meta_key' => 'further_check', 'ignore_sticky_posts' => 1, 'posts_per_page' => 99, 'post__not_in' => array($current_id) ));
            endif;  
            
            // вывод записей в случайном порядке
            if ($titan->getOption( 'further_type' ) == '2') :  
            $query = new WP_Query( array( 'ignore_sticky_posts' => 1, 'showposts' => 9, 'orderby'  => 'rand', 'post__not_in' => array($current_id) ));
            endif; 

            while ( $query->have_posts() ) : $query->the_post(); 
            
            ?>
        
            <div class="further-reading-item gp-clearfix">
            <?php
            medium_thumbnail();
            ?>
            <span><a href="<?php echo get_permalink(); ?>" rel="bookmark" itemprop="url"><?php the_title(); ?></a></span>
            </div> <!-- end more-posts_item -->
                
        <?php 
        endwhile;
        wp_reset_postdata(); 
         
        // fix для justify-content:space-between
        echo '<div class="further-reading-item flex-align-fix"></div>';
        
        ?>
        </div><!-- end flex port -->
    </div><!-- end further-reading -->
</div><!-- end  port -->