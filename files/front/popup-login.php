<!-- noindex -->   
<div class="popup" id="popup4">
<?php 
  $current_user = wp_get_current_user();  
  if ( ! is_user_logged_in() ) {   
echo  '<span class="pop-title">' . _e('Войти', 'blogpost-3') . '</span>';
		  } else {  
echo  '<span class="pop-title">'. $current_user->user_login . '</span>';
} 
?>

<?php if ( ! is_user_logged_in() ) : ?>
<?php wp_login_form( array('echo' => true) ); ?>
<ul>
	  <?php wp_register(); ?>
	   <li><a href="<?php echo wp_lostpassword_url(); ?>"><?php _e('Забыли пароль?', 'blogpost-3'); ?></a></li>
	  </ul>
<?php endif; ?>
<?php if (  is_user_logged_in() ) : ?> 

<?php
echo '<p> '. $current_user->user_description . '</p>';
?> 

<span class="login-item register-item"><?php wp_register('', ''); ?></span>   
<span class="login-item loginout-item">
	<?php 
	$url = home_url( $_SERVER['REQUEST_URI'] );
	wp_loginout( $url );
	?>
</span>

<?php endif; ?>

 <button class="close"></button>

</div><!-- end popup 4 -->  
<!-- /noindex --> 