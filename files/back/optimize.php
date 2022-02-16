<?php
// preload для шрифта и изображения записи
function objects_preload() {
?>
<link rel="preload" as="font" type="font/woff2" href="<?php echo get_bloginfo('template_url'); ?>/files/font/fira-sans-v11-latin_cyrillic-regular.woff2" crossorigin>
<link rel="preload" as="font" type="font/woff2" href="<?php echo get_bloginfo('template_url'); ?>/files/font/fira-sans-v11-latin_cyrillic-500.woff2" crossorigin>
<link rel="preload" as="font" type="font/woff2" href="<?php echo get_bloginfo('template_url'); ?>/files/font/fira-sans-v11-latin_cyrillic-700.woff2" crossorigin>
<?php
if(is_single()) {
if(has_post_thumbnail()) :
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' );
echo '<link rel="preload" as="image" href="' .$img_url. '" />';
endif; 
}
?>
<?php
}
add_action('wp_head', 'objects_preload');

// перенос скриптов сайта в подвал 
function gp_footer_enqueue_scripts() {
remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
}
add_action('wp_enqueue_scripts', 'gp_footer_enqueue_scripts');

/* перенос стилей в подвал */
/* для разблокировки просто удалите // перед каждой строкой ниже */
//remove_action( 'wp_head', 'wp_print_scripts' );
//remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
//remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
//add_action( 'wp_footer', 'wp_print_scripts', 5 );
//add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
//add_action( 'wp_footer', 'wp_print_head_scripts', 5 );

/* отключение библиотеки блоков гутенберга */
/* внимание, это эффективно ускоряет сайт, но может сильно помешать корректному отображению публикаций */
//function custom_theme_assets() {
//wp_dequeue_style( 'wp-block-library' );
//}
//add_action( 'wp_enqueue_scripts', 'custom_theme_assets', 100 );

// меняем src на data-src для отложенной загрузки изображений
function lazy_loaded_src( $content ) {
$pattern = array('src');
return str_replace( $pattern, 'data-src', $content ); 
}
add_filter( 'the_content', 'lazy_loaded_src' );
 
//function lazy_loaded_srcset( $content ) {
//$pattern = array( 'srcset');
//return str_replace( $pattern, 'data-srcset', $content ); 
//}
//add_filter( 'the_content', 'lazy_loaded_srcset' );

// убираем мусор из шапки 
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'feed_links', 2 );  
remove_action('wp_head', 'feed_links_extra', 3 );

// убираем версию движка
remove_action('wp_head', 'wp_generator');

// убираем  emoje
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
 
// убираем dns_prefetch
function remove_dns_prefetch( $hints, $relation_type ) {
if ( 'dns-prefetch' === $relation_type ) {
return array_diff( wp_dependencies_unique_hosts(), $hints );
}
return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );

// отключаем вывод стилей для recentcomments
add_filter( 'show_recent_comments_widget_style', '__return_false', 99 );

// убираем лишние термины из заголовков архивов
add_filter( 'get_the_archive_title', function( $title ){
return preg_replace('~^[^:]+: ~', '', $title );
});

//  отключаем text/xml+oembed
remove_action( 'wp_head',  'rest_output_link_wp_head');
remove_action( 'wp_head',  'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

// удаляем атрибуты type из скриптов для успешной валидации на w3c
add_action( 'template_redirect', function(){
ob_start( function( $buffer ){
$buffer = str_replace( array('type="text/javascript"',"type='text/javascript'"),'', $buffer);
return $buffer;
});
});

 // убираем h3 из заголовка в комментариях
function themeslug_commentform_title( $args ) {
$args['title_reply_before'] = '<p id="reply-title" class="comment-title">';
$args['title_reply_after']  = '</p>';
return  $args;
}
add_filter( 'comment_form_defaults', 'themeslug_commentform_title' );

// отключаем поле "сайт" в комментариях
function gp_disable_comment_url($fields) { 
	unset($fields['url']);
	return $fields;
}
add_filter('comment_form_default_fields','gp_disable_comment_url');

// убираем "сайт" из cookies consent
add_filter( 'comment_form_default_fields', 'gp_filter_comment_fields', 20 );
function gp_filter_comment_fields( $fields ) {
$commenter = wp_get_current_commenter();
$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
$fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">'.__('Сохранить  имя и e-mail в этом браузере для моих последующих комментариев', 'blogpost-3').'</label></p>';
return $fields;
}

//  убираем replytocom
 function redirect_rtc() {
 if (isset($_GET['replytocom'])){@header("HTTP/1.0 404 Not Found");
 die();
 }
}
add_filter('template_redirect','redirect_rtc');
function custom_comment_reply_link($link) {
return preg_replace( '/<a (.*?)href=[\"\'][^\"^\']*[\"\'](.*?)<\/a>/i', '<span class="replylink"><span  $1$2</span></span>', $link );
 }
add_filter( 'comment_reply_link', 'custom_comment_reply_link' );

add_action('wp_footer', 'add_goto');
function add_goto(){ 
 if ( is_singular() ) {
echo "\n".'<script>function gotoal(link){window.open(link.replace("_","https://"));}</script>'."\n";
wp_enqueue_script( 'comment-reply' ); 
}
}