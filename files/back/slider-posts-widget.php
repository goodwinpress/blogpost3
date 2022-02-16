<?php 
add_action( 'widgets_init', 'gp_slider_widget' );
function gp_slider_widget() {
register_widget( 'gp_slider' );
}
 class gp_slider extends WP_Widget
{
 
public function __construct()
{
$widget_details = array(
'classname' => 'gp_feat_cat',
'description' => 'Виджет записи в слайдере'
);
 
 parent::__construct( 'gp_slider', 'BlogPost 3: записи в слайдере', $widget_details );
}
	
public function form( $instance ) {
$post_count = isset( $instance['post_count'] ) ? $instance['post_count'] : '2';
$title = isset( $instance['title'] ) ? $instance['title'] : '';
$cat  = isset( $instance['cat'] ) ? $instance['cat'] : '';
?>

<p>Данный виджет  выводит в сайдбар список записей из одной выбранной рубрики - в виде слайдера.</p>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок:</label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>

<p>
<label>Выбрать рубрику:
<?php wp_dropdown_categories( array( 'show_option_all' => 'Все рубрики', 'hide_empty'=> 0, 'name' => $this->get_field_name('cat'), 'selected' => $cat, 'class' => 'categoryposts-data-panel-filter-cat' ) ); ?>
</label>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'post_count' ); ?>">Сколько записей выводить?</label>  
<input class="tiny-text" id="<?php echo $this->get_field_id( 'post_count' ); ?>" name="<?php echo $this->get_field_name( 'post_count' ); ?>" type="number" step="1" min="1" max="5" value="<?php echo $post_count; ?>" size="3" />
</p>
<?php 
 }

 public function update( $new_instance, $old_instance ) {  
$instance = $old_instance;
$instance[ 'post_count' ] = strip_tags( $new_instance[ 'post_count' ] );
$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
$instance[ 'cat' ] = strip_tags( $new_instance[ 'cat' ] );
return $instance;
}
 
public function widget( $args, $instance ) {
?>
 
<div id="gp-slider-widget" class="widget slider-widget">
<?php $title =  $instance[ 'title' ];?>
<?php if ( ! empty( $title ) ) {
echo $args['before_title'] . $title . $args['after_title'];
}
?>

<div class="gp-sli-wid">
<?php 
$cat = $instance[ 'cat' ];
$count = $instance[ 'post_count' ];
$currentID = get_the_ID();
 
if (is_front_page()) {
$query = new WP_Query( array('cat' =>$cat, 'showposts' => $count ));
} else {
$query = new WP_Query( array('cat' =>$cat, 'showposts' => $count, 'post__not_in' => array($currentID) ));  
}
while ( $query->have_posts() ) : $query->the_post(); ?>
<div class="item">
<?php 
$img = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $img,'full' );
?> 
<a href="<?php echo get_permalink(); ?>">
<div class="widget-slider-wrap" style="background-image: url(<?php echo $img_url; ?>)">
</div><!-- end widget-slider-wrap -->
<div class="widget-slider-caption"><?php the_title(); ?></div><!-- end widget-slider-caption  -->
</a>

</div><!-- end slider widget item -->
 <?php 
 endwhile;
 wp_reset_postdata(); 
?>
</div><!-- end owl-slider-->
</div><!-- end  widget -->	
 
<?php 
   }
}