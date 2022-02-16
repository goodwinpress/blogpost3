<?php

add_action('add_meta_boxes', 'gp_sidebar');
function gp_sidebar(){
add_meta_box('gp_sidebar', 'Выключить сайдбар', 'gp_sidebar_option', array('post', 'page'), 'side','high');
}
 
function gp_sidebar_option( $post, $meta ){
$screens = $meta['args'];
wp_nonce_field( plugin_basename(__FILE__), 'gp_sidebar_nonce' );
$value = get_post_meta( $post->ID, 'gp_sidebar', 1 );
echo '<p><label for="gp_sidebar">' . __("Боковая колонка (сайдбар)", 'blogpost-3' ) . '</label><p>';
 echo '<p><select name="gp_sidebar" id="gp_sidebar">';
 echo '<option' . selected( get_post_meta($post->ID, 'gp_sidebar', true), 'Включить' ) .'>Включить</option>';
 echo '<option' . selected( get_post_meta($post->ID, 'gp_sidebar', true), 'Выключить' ) . '>Выключить</option>';
 echo '</select><p>';
 
}
 
add_action( 'save_post', 'gp_sidebar_save_postdata' );
function gp_sidebar_save_postdata( $post_id ) {
if ( ! isset( $_POST['gp_sidebar'] ) )
return;
if ( ! wp_verify_nonce( $_POST['gp_sidebar_nonce'], plugin_basename(__FILE__) ) )
return;
if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
return;
if( ! current_user_can( 'edit_post', $post_id ) )
return;
$gp_data = sanitize_text_field( $_POST['gp_sidebar'] );
update_post_meta( $post_id, 'gp_sidebar', $gp_data );
}

