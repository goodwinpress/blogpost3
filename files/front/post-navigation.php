<?php
// переход на следующую или предыдущую записи внутри публикации

?>

<div class="post-navigation gp-clearfix">
 
<?php
// Предыдущая запись
$nextPost = get_next_post();
if($nextPost) {
$args = array(
'posts_per_page' => 1,
'include' => $nextPost->ID
);
$nextPost = get_posts($args);
foreach ($nextPost as $post) {
setup_postdata($post);
?>
<div class="nav-box nav-box-prev">
<div class="nav-box-img">  <em><?php _e('Предыдущая запись', 'blogpost-3'); ?></em>
 
<?php
medium_thumbnail();
?>
 
</div><!-- end  nav-box-img-->
 
<div class="nav-box-inner">
<span class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></span>
</div><!-- end nav-box inner  -->
 
</div><!-- end  nav-box-prev-->
<?php
wp_reset_postdata();
 } 
} ?>


<?php
// Следующая запись
$prevPost = get_previous_post();
if($prevPost) {
$args = array(
'posts_per_page' => 1,
'include' => $prevPost->ID,
);
$prevPost = get_posts($args);
foreach ($prevPost as $post) {
setup_postdata($post);
?>
 
<div class="nav-box nav-box-next">
<div class="nav-box-img">
<em><?php _e('Следующая запись', 'blogpost-3'); ?></em>
<?php
medium_thumbnail();
?>
</div><!-- end nav-box-img-->
 
<div class="nav-box-inner">
<span class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></span>
</div><!-- end nav-box inner  -->

</div><!-- end  nav-box-next-->
 
<?php
wp_reset_postdata();
 }
}
?>

</div><!-- end // post-navigation-->