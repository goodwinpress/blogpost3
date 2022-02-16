<?php
// шаблон коммнтариев
$titan = TitanFramework::getInstance( 'gpress' );  

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-box gp-clearfix"> 
	
	<?php if ( have_comments() ) : ?>
	<span class="comment-title"> <?php _e('Обсуждение:', 'blogpost-3'); ?> <?php comments_number('' . __('пока нет комментариев', 'blogpost-3') . '','' . __('1 комментарий', 'blogpost-3') . '','' . __('% коммент.', 'blogpost-3') . '' );?></span>
	
		<ol class="commentlist">
		<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'short_ping'  => false,
			'avatar_size' =>  50,
			'callback' => 'comment_atts'
		) );
		?>
		</ol> 
	<?php endif; ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
		<div class="navigation gp-clearfix" role="navigation">
		<div class="nav-previous"><?php previous_comments_link( __( 'Предыдущие комментарии', 'blogpost-3' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Новые комментарии', 'blogpost-3' ) ); ?></div>
		</div><!-- end navigation -->
	<?php endif; ?>

	<?php
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p><?php _e('Комментирование закрыто', 'blogpost-3'); ?></p> 
	<?php endif; ?>

<div class="gp-comment-form gp-clearfix">
	
	<?php
	// подключаем согласие на сбор персональных данных
	if ($titan->getOption( 'agree-loc' ) == '1') { 
	
		$args = array( 
		'title_reply' => ''. __('Оставить комментарий', 'blogpost-3') . '',
		'label_submit' => ''. __('Отправить', 'blogpost-3') . '',
		'comment_notes_after' => '<p class="gp-notice"><input type="radio"   id="comments-checkbox" checked>' .$titan->getOption( 'agree-text' ). '  <a href="' .$titan->getOption( 'agree-url' ). '">' .$titan->getOption( 'agree-title' ). '</a>.</p> ',
		);
	
	} else {
	
		$args = array( 
		'title_reply' => ''. __('Оставить комментарий', 'blogpost-3') . '',
		'label_submit' => ''. __('Отправить', 'blogpost-3') . '',
		);
	}
	
		comment_form( $args );
	?>

</div><!-- end  gp-comment-form -->
</div> <!-- end comments-box -->