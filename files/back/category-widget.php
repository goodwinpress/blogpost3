<?php
class Cat_List extends WP_Widget {

public function __construct()
{
$widget_details = array(
'classname' => 'gp-cat-list',
'description' => 'Список рубрик'
);
 
parent::__construct( 'gp-cat-list', 'BlogPost 3: cписок рубрик', $widget_details );
}
	
public function widget( $args, $instance ) {
extract( $args );
$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
?>

<div class="widget  gp-cat-list-widget gp-clearfix">
<?php  if( ! empty( $title) )  {  ?>
<div class="widget-title"><span><?php echo $title ?></span></div>
<?php }  ?>
<ul class="gp-cat-list">
<?php wp_list_categories('show_count=0&hide_empty=1&depth=3&title_li='); ?>
</ul>
</div><!-- end  widget -->
<?php
}

public function update( $new_instance, $old_instance ) {
$instance = $old_instance;
$instance['title'] = strip_tags( $new_instance['title']  );
 return $instance;
}
	
public function form( $instance ) {
$instance = wp_parse_args(
$instance,
array(
'title' => '',
 )
);
$title = esc_attr( $instance[ 'title' ] );
?>

<p>Виджет выводит список всех непустых рубрик сайта, дочерние рубрики убраны в спойлер.</p>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок:</label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>
	 
<?php
 }
}
add_action( 'widgets_init', function() {
	register_widget( 'Cat_List' );
});