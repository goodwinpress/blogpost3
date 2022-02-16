<?php
class Recent_Posts extends WP_Widget {

public function __construct()
{
$widget_details = array(
'classname' => 'gp-recent-posts',
'description' => 'Новые записи с миниатюрами'
);
 
 parent::__construct( 'gp-recent-posts', 'BlogPost 3: свежие записи', $widget_details );
}

public function widget( $args, $instance ) {
extract( $args );
$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
$count = ( ! empty( $instance['count '] ) ) ? $instance['count'] : '';
$thumb = $instance[ 'thumb' ] ? 'true' : 'false';
?>

<div class="widget  gp-recent-posts-widget gp-clearfix">
<div class="widget-title"><span><?php echo $title ?></span></div>
<ul class="featured-list">

<?php 
$gp_post_count =  $instance[ 'count' ];
$currentID = get_the_ID();
if (is_front_page()) {
$query = new WP_Query( array('showposts' => $gp_post_count,  'orderby' => 'date', 'ignore_sticky_posts' =>1));
} else {
$query = new WP_Query( array('showposts' => $gp_post_count,  'post__not_in' => array($currentID), 'orderby' => 'date',  'ignore_sticky_posts' =>1 ));
}
while ( $query->have_posts() ) : $query->the_post(); ?>

<li>
<?php  
if( 'on' == $instance[ 'thumb' ] ) {   
medium_thumbnail();
}
?>

<span itemprop="headline"><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></span>
 </li>
 <?php 
 endwhile;
 wp_reset_postdata(); 
?>
</ul>
</div><!-- end  widget -->
<?php
}

public function update( $new_instance, $old_instance ) {
$instance = $old_instance;
$instance['title'] = strip_tags( $new_instance['title']  );
$instance[ 'count' ]  = strip_tags( $new_instance['count'] );
$instance[ 'thumb' ] = strip_tags( $new_instance[ 'thumb' ] );
 return $instance;
}
	
public function form( $instance ) {
$instance = wp_parse_args(
$instance,
array(
'title' => '',
'count' => '5',
'thumb' => '',
 )
);
$title = esc_attr( $instance[ 'title' ] );
$count = esc_attr( $instance[ 'count' ] );
$thumb = esc_attr( $instance[ 'thumb' ] );
?>

<p>Виджет выводит список последних опубликованных записей.</p>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок:</label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>

<p>
<label for="<?php echo $this->get_field_id( 'count' ); ?>">Сколько записей выводить?</label>  
<input class="tiny-text" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="number" step="1" min="1" max="10" value="<?php echo $count; ?>" size="3" />
</p>
 

<p>
<input class="checkbox" type="checkbox" <?php checked( $instance[ 'thumb' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'thumb' ); ?>" name="<?php echo $this->get_field_name( 'thumb' ); ?>" /> 
<label for="<?php echo $this->get_field_id( 'thumb' ); ?>">Добавить миниатюру?</label>
</p>
	 
<?php
 }
}
add_action( 'widgets_init', function() {
	register_widget( 'Recent_Posts' );
});