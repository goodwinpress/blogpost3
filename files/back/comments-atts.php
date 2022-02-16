<?php
// добавляем микроразметку в комменатрии и подключаем в comments.php через callback 
function comment_atts( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}

	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
	?>

	<<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>"    itemprop="comment" itemscope itemtype="http://schema.org/Comment">
	<?php if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>"><?php
	} ?>

	<div class="comment-author">
		<?php
		if ( $args['avatar_size'] != 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
		}
		printf(
			 '<cite itemprop="creator" class="fn">%s</cite>',
			get_comment_author_link()
		);
		?>
	</div>

	<?php if ( $comment->comment_approved == '0' ) { ?>
		<em class="comment-awaiting-moderation">
			<?php _e( 'Ваш комментарий будет опубликован после проверки администратором сайта.', 'blogpost-3' ); ?>
		</em> 
	<?php } ?>

	<div class="comment-meta commentmetadata">
		<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
<span itemprop="datePublished"  content="<?php echo get_comment_date('c'); ?>">
	<?php
			printf(
				'%1$s : %2$s',
				get_comment_date(),
				get_comment_time()
			); ?>
</span>
		</a>

	</div>
<div class="gp-comment-text" itemprop="text">
	<?php comment_text(); ?>
</div>
	<div class="reply">
		<?php
		comment_reply_link(
			array_merge(
				$args,
				array(
					'add_below' => $add_below,
					'depth'     => $depth,
					'max_depth' => $args['max_depth']
				)
			)
		); ?>
	</div>

	<?php if ( 'div' != $args['style'] ) { ?>
		</div>
	<?php }
}