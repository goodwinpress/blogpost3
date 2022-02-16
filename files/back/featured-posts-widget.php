<?php
class Featured_Posts extends WP_Widget {

public function __construct()
{
$widget_details = array(
'classname' => 'gp-featured-posts',
'description' => 'Записи из выбранной рубрики'
);
 
parent::__construct( 'gp-featured-posts', 'BlogPost 3: избранная рубрика', $widget_details );
}

public function widget( $args, $instance ) {
extract( $args );
$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
$category = ( ! empty( $instance['category'] ) ) ? $instance['category'] : '';
$count = ( ! empty( $instance['count '] ) ) ? $instance['count'] : '';
$offset = ( ! empty( $instance['offset '] ) ) ? $instance['offset'] : '';
$thumb = $instance[ 'thumb' ] ? 'true' : 'false';
?>

<div class="widget  gp-featured-posts-widget gp-clearfix">
<?php  if( ! empty( $title) )  {  ?>
<div class="widget-title"><span><?php echo $title ?></span></div>
<?php }  ?>
<ul class="featured-list">

<?php 
$gp_post_cat =  $instance[ 'category' ];
$gp_post_count =  $instance[ 'count' ];
$gp_offset =  $instance[ 'offset' ];
$currentID = get_the_ID();
if (is_front_page()) {
$query = new WP_Query( array('showposts' => $gp_post_count, 'cat' =>$gp_post_cat, 'orderby' => 'date', 'offset' => $gp_offset, 'ignore_sticky_posts' =>1));
} else {
$query = new WP_Query( array('showposts' => $gp_post_count,  'cat' =>$gp_post_cat, 'post__not_in' => array($currentID), 'orderby' => 'date', 'offset' => $gp_offset, 'ignore_sticky_posts' =>1 ));
}
while ( $query->have_posts() ) : $query->the_post(); ?>

<li>
<?php  
if( 'on' == $instance[ 'thumb' ] ) {   
small_thumbnail();
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
$instance[ 'category' ]  = strip_tags( $new_instance['category'] );
$instance[ 'count' ]  = strip_tags( $new_instance['count'] );
$instance[ 'offset' ]  = strip_tags( $new_instance['offset'] );
$instance[ 'thumb' ] = strip_tags( $new_instance[ 'thumb' ] );
 return $instance;
}
	
public function form( $instance ) {
$instance = wp_parse_args(
$instance,
array(
'title' => '',
'count' => '5',
'offset' => '0',
'category' => '',
'thumb' => '',
 )
);
$title = esc_attr( $instance[ 'title' ] );
$category = esc_attr( $instance[ 'category' ] );
$count = esc_attr( $instance[ 'count' ] );
$offset = esc_attr( $instance[ 'offset' ] );
$thumb = esc_attr( $instance[ 'thumb' ] );
?>

<p>Виджет выводит список записей из выбранной рубрики.</p>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок:</label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>

<p>
<label>Выбрать рубрику:
<?php wp_dropdown_categories( array( 'show_option_all' => 'Все рубрики', 'hide_empty'=> 0, 'name' => $this->get_field_name("category"), 'selected' => $instance["category"], 'class' => 'categoryposts-data-panel-filter-cat' ) ); ?>
</label>
</p>
	
<p>
<label for="<?php echo $this->get_field_id( 'count' ); ?>">Сколько записей выводить?</label>  
<input class="tiny-text" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="number" step="1" min="1" max="10" value="<?php echo $count; ?>" size="3" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'offset' ); ?>">Установить смещение</label>  
<input class="tiny-text" id="<?php echo $this->get_field_id( 'offset' ); ?>" name="<?php echo $this->get_field_name( 'offset' ); ?>" type="number" step="1" min="0" max="10" value="<?php echo $offset; ?>" size="3" />
 </p>

<p>
<input class="checkbox" type="checkbox" <?php checked( $instance[ 'thumb' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'thumb' ); ?>" name="<?php echo $this->get_field_name( 'thumb' ); ?>" /> 
<label for="<?php echo $this->get_field_id( 'thumb' ); ?>">Добавить миниатюру?</label>
</p>

<?php
 }
}
add_action( 'widgets_init', function() {
register_widget( 'Featured_Posts' );
});