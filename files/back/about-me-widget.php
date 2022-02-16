<?php 
class About_Me_Widget extends WP_Widget {
  
 public function __construct()
   {
   $widget_details = array(
   'classname' => 'about-me-widget',
   'description' => 'Виджет об авторе'
   );

parent::__construct( 'about-me-widget', 'BlogPost 3: виджет об авторе', $widget_details );

add_action('admin_enqueue_scripts', array($this, 'scripts'));
}
public function scripts()
{
   wp_enqueue_script( 'media-upload' );
   wp_enqueue_media();
   wp_enqueue_script('our_admin', get_template_directory_uri() . '/files/back/js/upload.js', array('jquery'));
}

public function widget( $args, $instance ) {
extract( $args );
$image = ( ! empty( $instance['image'] ) ) ? $instance['image'] : '';
$name = ( ! empty( $instance['name'] ) ) ? $instance['name'] : '';
$text = ( ! empty( $instance['text'] ) ) ? $instance['text'] : '';
$link = ( ! empty( $instance['link'] ) ) ? $instance['link'] : '';
$phone = ( ! empty( $instance['phone'] ) ) ? $instance['phone'] : '';
$mail = ( ! empty( $instance['mail'] ) ) ? $instance['mail'] : '';
$social = $instance[ 'social' ] ? 'true' : 'false';
?>

<div class="widget about-me-widget gp-clearfix">
<div class="gp-about-me-img"><?php if($image): ?><img data-src="<?php echo esc_url($image); ?>" alt="<?php echo $name; ?>"><?php endif; ?></div>
<span class="gp-about-me-name"><?php echo $name; ?></span>
<span class="gp-about-me-text">
<?php if ( ! empty( $text ) ) { echo $text; }  
if ( ! empty( $link ) ) { echo '<p><a href="' . esc_url($link) . '">' . esc_html__('Узнать больше', 'blogpost-3') . '</a></p>'; } ?> 
</span> 
<span class="gp-about-me-phone"><?php if ( ! empty( $phone ) ) { 
$vars = array('(', ')', ' ','-');
echo '<a href="tel:'.str_replace($vars, '', $phone ).'">'.$phone.'</a>'; } ?></span>
<span class="gp-about-me-mail"><?php if ( ! empty( $mail ) ) { echo $mail; } ?></span>
<?php if( 'on' == $instance[ 'social' ] ) {   
get_template_part ('files/front/social-btns'); 
}
?>
</div><!-- end widget -->	

<?php
}

public function update( $new_instance, $old_instance ) {
$instance = $old_instance;
$instance['image'] = strip_tags( $new_instance['image']  );
$instance[ 'name' ]  = strip_tags( $new_instance['name'] );
$instance['text'] = wp_kses_post( $new_instance['text'] );
$instance['link'] = wp_kses_post( $new_instance['link'] );
$instance['phone'] = wp_kses_post( $new_instance['phone'] );
$instance['mail'] = wp_kses_post( $new_instance['mail'] );
$instance[ 'social' ] = strip_tags( $new_instance[ 'social' ] );
return $instance;
}    

public function form( $instance ) {
$instance = wp_parse_args(
$instance,
 array(
'image' => '',
'name' => '',
'text' => '',
'link' => '',
'phone' => '',
'mail' => '',
'social' => ''
   )
 );

$image = esc_attr( $instance[ 'image' ] );
$name = esc_attr( $instance[ 'name' ] );
$text = esc_attr( $instance[ 'text' ] );
$link = esc_attr( $instance[ 'link' ] );
$phone = esc_attr( $instance[ 'phone' ] );
$mail = esc_attr( $instance[ 'mail' ] );
$social = esc_attr( $instance[ 'social' ] );
 ?>

<p>
   <label for="<?php echo $this->get_field_id( 'image' ); ?>">Ваше фото:</label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
   <button class="upload_image_button button button-primary">Загрузить фото</button>
  </p>

<p>
 <label for="<?php echo $this->get_field_id( 'name' ); ?>">Имя:</label> 
 <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo $name; ?>">
</p>

<p>
<label for="<?php echo $this->get_field_id( 'text' ); ?>">Текст:</label><br>
<textarea class="widefat" rows="5" name="<?php echo $this->get_field_name('text') ?>"><?php echo $text; ?></textarea>
</p>

<p>
  <label for="<?php echo $this->get_field_id( 'link' ); ?>">Адрес страницы с полной информацией:</label><br>
<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo $link; ?>">
  </p>

 <p>
 <label for="<?php echo $this->get_field_id( 'phone' ); ?>">Телефон для связи:</label> 
 <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo $phone; ?>">
</p>

<p>
<label for="<?php echo $this->get_field_id( 'mail' ); ?>">Электронная почта:</label> 
 <input class="widefat" id="<?php echo $this->get_field_id( 'mail' ); ?>" name="<?php echo $this->get_field_name( 'mail' ); ?>" type="text" value="<?php echo $mail; ?>">
</p>

<p>
<input class="checkbox" type="checkbox" <?php checked( $instance[ 'social' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'social' ); ?>" name="<?php echo $this->get_field_name( 'social' ); ?>" /> 
  <label for="<?php echo $this->get_field_id( 'social' ); ?>">Добавить кнопки социальных сетей?</label>
</p>

<?php
 }
}
add_action( 'widgets_init', function() {
  register_widget( 'About_Me_Widget' );
});