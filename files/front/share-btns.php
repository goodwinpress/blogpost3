<?php 
// Кнопки для расшаривания публикаций в соц сетях
$titan = TitanFramework::getInstance( 'gpress' ); ?>
 
<div class="gp-share-btns">
<em><?php _e('Поделиться в соц. сетях и сервисах', 'blogpost-3'); ?>:</em>
<!--noindex-->
<ul class="svg-social-icons">
<?php 
$url = get_the_permalink();
$title = get_the_title();

if(has_post_thumbnail())  {
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
} else {
$image = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
}

$share = $titan->getOption( 'share-options' );

  if ( in_array( 'wh', $share ) ) {
  echo '<li><a class="whats-icon gp-icon" href="https://api.whatsapp.com/send?text=' . rawurlencode($title) . '%20' . $url . '&amp;utm_source=share" rel="nofollow noopener" target="_blank" title="Поделиться в WhatsApp">WhatsApp</a></li>';
  }
  if ( in_array( 'vk', $share ) ) {
  echo '<li><a class="vk-icon gp-icon" href="https://vk.com/share.php?url=' . $url . '&amp;title=' . rawurlencode($title) . '&amp;image=' . $image[0] .'&amp;utm_source=share" rel="nofollow noopener" target="_blank" title="Поделиться ВКонтакте">ВКонтакте</a></li>';
  }
  if ( in_array( 'fb', $share ) ) {
  echo '<li><a class="fb-icon gp-icon" href="https://www.facebook.com/sharer.php?src=sp&amp;u=' . $url . '&amp;title=' . rawurlencode($title) . '&amp;image=' . $image[0] .'&amp;utm_source=share" rel="nofollow noopener" target="_blank" title="Поделиться в Facebook">Facebook</a></li>';      
  }
  if ( in_array( 'tg', $share ) ) {
  echo '<li><a class="tele-icon gp-icon" href="https://t.me/share/url?url=' . $url . '&amp;text=' . rawurlencode($title) . '&amp;utm_source=share" rel="nofollow noopener" target="_blank" title="Поделиться в Telegram">Telegram</a></li>'; 
  }
  if ( in_array( 'tw', $share ) ) {
  echo '<li><a class="twi-icon gp-icon" href="https://twitter.com/intent/tweet?text=' . rawurlencode($title) . '&amp;title=' . $url . '&amp;utm_source=share" rel="nofollow noopener" target="_blank" title="Поделиться в Twitter">Twitter</a></li>';
  }
  if ( in_array( 'od', $share ) ) {
  echo '<li><a class="odnkl-icon gp-icon" href="https://connect.ok.ru/offer?url=' . $url . '&amp;title=' . rawurlencode($title) . '&amp;imageUrl=' . $image[0] .'&amp;utm_source=share" rel="nofollow noopener" target="_blank" title="Поделиться в Одноклассниках">Одноклассники</a></li>';
  }
  if ( in_array( 'vb', $share ) ) {
  echo '<li><a class="viber-icon gp-icon" href="viber://forward?text=' . rawurlencode($title) . '%20' . $url . '&amp;utm_source=share" rel="nofollow noopener" target="_blank" title="Поделиться в Viber">Viber</a></li>';
  }
?>
</ul>
<!--/noindex-->
</div> <!-- end gp-share-btns  -->