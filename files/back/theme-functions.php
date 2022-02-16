<?php
// добавляем микроразметку в меню
function add_menu_atts( $atts, $item, $args ) {
$atts['itemprop'] = 'url';
return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_atts', 10, 3 );

// добавляем микроразметку к изображениям
function add_image_atts($content) { 
global $post; 
$pattern = "<img"; 
$replacement = '<img itemprop="image"'; 
$content = str_replace($pattern, $replacement, $content); 
return $content; } 
add_filter('the_content', 'add_image_atts'); 

// создаем анонс
function truncate_post($amount,$echo=true,$post='') {
global $shortname; 
if ( $post == '' ) global $post; 
$postExcerpt = '';
$postExcerpt = $post->post_excerpt;
if (get_option($shortname.'_use_excerpt') == 'on' && $postExcerpt <> '') { 
if ($echo) echo $postExcerpt;
else return $postExcerpt; 
} else {
$truncate = $post->post_content;    
$truncate = preg_replace('@\[caption[^\]]*?\].*?\[\/caption]@si', '', $truncate);   
if ( strlen($truncate) <= $amount ) $echo_out = ''; else $echo_out = '...';
$truncate = apply_filters('the_content', $truncate);
$truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
$truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);  
$truncate = strip_tags($truncate);
if ($echo_out == '...') $truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $amount), ' '));
else $truncate = substr($truncate, 0, $amount);
if ($echo) echo $truncate,$echo_out;
else return ($truncate . $echo_out);
};
}


// декларируем совместимость с woocommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
add_theme_support( 'woocommerce' );
}

// отключаем стили галереи по-умочалнию
add_filter( 'use_default_gallery_style', '__return_false' );

// увеличим ширину текстового поля в редакторе
function custom_admin_css() {
echo '<style type="text/css">
/* Main column width */
.wp-block {
max-width: 800px;
}
/* Width of "wide" blocks */
.wp-block[data-align="wide"] {
max-width: 1080px;
}
/* Width of "full-wide" blocks */
.wp-block[data-align="full"] {
max-width: none;
}
</style>';
}
add_action('admin_head', 'custom_admin_css');

// пагинация в блоге, архивах
add_action( 'gp_pagenavi', 'gp_pagination_nav' );
function gp_pagination_nav() {
$pagenav = get_the_posts_pagination( array(
'mid_size' => 2,
'prev_text' => __( 'Назад', 'blogpost-3' ),
'next_text' => __( 'Вперёд', 'blogpost-3' ),
'screen_reader_text' => __( 'Навигация', 'blogpost-3' )
) );
$pagenav = str_replace('<h2 class="screen-reader-text">' . __('Навигация', 'blogpost-3') . '</h2>', '', $pagenav);
$pagenav = str_replace('role="navigation"', '', $pagenav);
echo $pagenav;
}

// меню в шапке
add_action('gp_navigation_menu_header', 'gp_header_nav');
function gp_header_nav() {
echo'<nav id="menu" class="menunav gp-clearfix" itemscope itemtype="http://www.schema.org/SiteNavigationElement">';
$menu = wp_nav_menu( array( 
'theme_location' => 'primary',
'container' => '', 
'container_class' => '',
'menu_class' => 'top-menu', 
'link_before'   => '<span itemprop="name">',
'link_after'   => '</span>'
));
echo strip_tags( $menu , '<ul><li><a>');
echo'</nav><!-- end menunav -->';
}

// мобильное меню
add_action('gp_navigation_menu_mob', 'gp_mobile_nav');
function gp_mobile_nav() {
echo '<div class="mob-menu">';
$titan = TitanFramework::getInstance( 'gpress' ); 
if ($titan->getOption( 'darkmode-loc' ) == '1') {
echo darkmode_switch();
}
$titan = TitanFramework::getInstance( 'gpress' ); 
if ($titan->getOption( 'login-loc' ) == '1') {
echo gp_login();
}
$menu = wp_nav_menu( array( 
'theme_location' => 'primary',
'menu_class' => 'top-mob-menu',
));
echo strip_tags( $menu , '<ul><li><a>'); 
echo '<div class="mob-search-wrapper">
<form method="get" class="searchform" action="' .get_home_url( '/' ). '">
<input type="text" class="mob-search-field" placeholder="'.__('Что будем искать?', 'blogpost-3') .'" value=" " name="s">
<input type="submit" class="mob-searchSubmit" value="'.__('Найти', 'blogpost-3') .'" />
</form></div>';
echo '</div>';
}

// миниатюры, изображения записи
// маленькая, для списков, виджетов, из той же рубрики
add_action( 'gp_home_small_thumb', 'small_thumbnail' );
function small_thumbnail() {
if(has_post_thumbnail()):
echo '<figure class="small-thumbnail"><a href="' .get_permalink(). '">';
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' );  
$image = aq_resize( $img_url, 90, 90, true, true, true );  
echo '<img data-src="' .$image. '" alt="' .get_the_title(). '" width="90" height="90">';
echo '</a></figure>';
endif; 
}

// средняя, для блока читайте также
add_action( 'gp_home_news_thumb', 'medium_thumbnail' );
function medium_thumbnail() {
if(has_post_thumbnail()):
echo '<figure class="medium-thumbnail"><a href="' .get_permalink(). '">';
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' );  
$image = aq_resize( $img_url, 342, 200, true, true, true );  
echo '<img data-src="' .$image. '" alt="' .get_the_title(). '" width="342" height="200">';
echo '</a></figure>';
endif; 
}

// миниатюра в блоге и рубриках
add_action( 'gp_home_news_thumb', 'blog_thumbnail' );
function blog_thumbnail() {
if(has_post_thumbnail()):
echo '<figure class="blog-thumbnail"><a href="' .get_permalink(). '">';
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' );  
$image = aq_resize( $img_url, 300, 255, true  );  
echo '<img data-src="' .$image. '" alt="' .get_the_title(). '" width="300" height="255">';
echo '</a></figure>';
endif; 
}

// изображение внутри записи (single)
add_action( 'gp_home_news_thumb', 'single_thumbnail' );
function single_thumbnail() {
if(has_post_thumbnail()):
$thumb = get_post_thumbnail_id();
$image_attributes = wp_get_attachment_image_src( $thumb, 'full' );
echo '<figure class="single-thumb"><img data-src="' .$image_attributes[0] . '" alt="'. get_the_title() . '" width="' . $image_attributes[1] . '" height="' . $image_attributes[2] . '"></figure>';
endif; 
}
// кнопка открытия мобильного меню
add_action( 'gp_header', 'mob_menu_button' );
function mob_menu_button() {
echo '<div class="open_mob"><button class="hamburger hamburger--spin" type="button">
<span class="hamburger-box"><span class="hamburger-inner"></span></span> 
</button></div>';
}

// меняем содержимое виджета поиска
function html5_search_form( $form ) { 
$form = '<form role="search" method="get" id="search-form" action="' . esc_url( home_url( '/' ) ) . '">
<input type="search" class="search-field" placeholder="" value="' . get_search_query() . '" name="s" title="" />
<input type="submit" value="'. esc_attr__('Найти', 'blogpost-3') .'" />
</form>';
return $form;
}
add_filter( 'get_search_form', 'html5_search_form' );

// подключаем бесконечную прокрутку для загрузки записей в блоге
function gp_scroll_nav( $html_id ) {
global $wp_query;
if ( $wp_query->max_num_pages > 1 ) : ?>
<div class="page-jump">  
<div class="older-posts alignright"><?php next_posts_link( __( 'Предыдущие записи', 'blogpost-3' ) ); ?></div>
</div>
<?php endif;
}

// подключаем расчет чтения
if ( ! function_exists( 'gp_read_time' ) ) {
function gp_read_time() {
$text = get_the_content( '' );
$words = str_word_count( strip_tags( $text ), 0, 'абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ' );
if ( !empty( $words ) ) {
$time_in_minutes = ceil( $words / 200 );
return $time_in_minutes;
 }
return false;
}
}

// уменьшим количество символов в excerpt
function gp_custom_excerpt_length( $length ) {
return 20;
}
add_filter( 'excerpt_length', 'gp_custom_excerpt_length', 999 );

// убираем скобки из excerpt
add_filter( 'excerpt_more', '__return_empty_string' ); 


// извлекаем имя рубрики из её id  для блока рубрик на Главной
function cat_id_to_name($id) {
foreach((array)(get_categories()) as $category) {
if ($id == $category->cat_ID) { return $category->cat_name; break; }
}
}

// выводим  текстовое поле комментариев по старинке, под полями автор, почта etc
add_filter( 'comment_form_fields', 'comment_form_fields', 99 );
function comment_form_fields( $fields ) {
if ( isset( $fields['comment'] ) ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
}
return $fields;
}


// метабокс для вариации записей в блоге 
add_action( 'add_meta_boxes', 'gp_special_box' );
function gp_special_box() {
add_meta_box('gp_special', 'Красивый анонс', 'gp_special_post_box', 'post', 'side','high');
}

function gp_special_post_box($post) {
wp_nonce_field( 'special_check', 'special_nonce' );
$saved = get_post_meta( $post->ID, 'special_check', true);
if( !$saved )
$saved = 'default';
$fields = array(
'add_post'     => __('Поставьте галочку, чтобы выделить эту запись из остальных', 'blogpost-3'),
);
 
foreach($fields as $key => $label) {
printf(
'<input type="checkbox" name="special_check" value="%1$s" id="special_check[%1$s]" %3$s />'.
'<label for="special_check[%1$s]"> %2$s ' .
 '</label><br>',
 esc_attr($key),
 esc_html($label),
checked($saved, $key, false)
     );
   }
 }

add_action( 'save_post', 'gp_special_save_postdata' );
function gp_special_save_postdata( $post_id ) {
if ( ! isset( $_POST['special_nonce'] ) ) {
return;
}

if ( ! wp_verify_nonce( $_POST['special_nonce'], 'special_check' ) ) {
return;
}

if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
return;
}

if ( isset($_POST['special_check']) && $_POST['special_check'] != "" ){
update_post_meta( $post_id, 'special_check', $_POST['special_check'] );
} else {
 delete_post_meta($post_id, 'special_check');
} 
}

// кнопка триггер для открытия субменю в мобильной навигации
function gp_menu_arrow($item_output, $item, $depth, $args) {
if (in_array('menu-item-has-children', $item->classes)) {
$arrow = '<div class="menu-trigger"></div>';
$item_output = str_replace('</a>', '</a>'. $arrow .'', $item_output);
}
return $item_output;
}
add_filter('walker_nav_menu_start_el', 'gp_menu_arrow', 10, 4);

// кнопка логина
add_action( 'gp_header', 'gp_login' );
function gp_login() {
if ( ! is_user_logged_in() ) { 
echo '<button class="gp-login open_modal" rel="popup4">' . __("Вход", 'blogpost-3' ) . '</button>';
} else {
echo '<button class="gp-login open_modal" rel="popup4">';
$current_user = wp_get_current_user();
echo $current_user->display_name;
echo '</button> ';
  }
}

// текстовый заголовок в шапке
add_action( 'gp_header', 'header_text_title' );
function header_text_title() {
echo '<div class="site-title text-title">';
if( is_front_page() || is_home() && !is_paged() ) {
echo '<h1 itemprop="name"><a href="' .esc_url( home_url( '/' ) ). '">' .get_bloginfo('name'). '</a></h1>';
 } else {
 echo '<span itemprop="name"><a href="' .esc_url( home_url( '/' ) ). '">' .get_bloginfo('name'). '</a></span>';
}
echo '</div><!-- end site-title text-title -->';
}

// логотип в шапке
add_action( 'gp_header', 'header_logo_title' );
function header_logo_title() {
echo '<div class="site-title logo-title">';
 if( is_front_page() || is_home() && !is_paged() ) {
 echo '<h1 itemprop="name"><a href="' .esc_url( home_url( '/' ) ). '">' .get_bloginfo('name'). '</a></h1>';
} else {
echo '<span itemprop="name"><a href="' .esc_url( home_url( '/' ) ). '">' .get_bloginfo('name'). '</a></span>';
}
echo '</div><!-- end site-title logo-title -->';
}

// переключатель режима
add_action( 'gp_header', 'darkmode_switch' );
function darkmode_switch() {
echo '<div class="theme-switch">
<label class="switch"><input type="checkbox" class="gp-checkbox"></label>
</div>';
}

// список дочерних рубрик 
add_action( 'gp_archive', 'child_categories' );
function child_categories() {
$term = get_queried_object();
$children = get_terms( $term->taxonomy, array(
'parent'    => $term->term_id,
'hide_empty' => false
) );

if ( ! empty($children) ) { 
echo '<ul class="gp-child-cat-list">';
foreach( $children as $subcat ){
echo '<li><a href="' . esc_url(get_term_link($subcat, $subcat->taxonomy)) . '">' . $subcat->name . '</a></li>';
}
echo '</ul>';
}
}

// описание в архивах
add_action( 'gp_archive', 'cat_description' );
function cat_description() {
$description = get_the_archive_description();
if( ! empty( $description) )  {
echo '<div class="archive-desc">';
the_archive_description();
echo '</div>';
 } 
}

// отключение сайдбара в записях и страницах
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
 
// метабокс для добавления записи в раздел Читать также
add_action( 'add_meta_boxes', 'gp_further_box' );
function gp_further_box() {
add_meta_box('gp_further', 'Читайте также', 'gp_further_reading_box', 'post', 'side','high');
}
function gp_further_reading_box($post) {
wp_nonce_field( 'further_check', 'further_nonce' );
$saved = get_post_meta( $post->ID, 'further_check', true);
if( !$saved )
$saved = 'default';
$fields = array(
'add_post'     => __('Поставьте галочку, чтобы добавить эту запись в раздел "Читайте также"', 'blogpost-3'),
);
foreach($fields as $key => $label) {
 printf(
'<input type="checkbox" name="further_check" value="%1$s" id="further_check[%1$s]" %3$s />'.
 '<label for="further_check[%1$s]"> %2$s ' .
'</label><br>',
esc_attr($key),
 esc_html($label),
checked($saved, $key, false)
   );
  }
}
add_action( 'save_post', 'gp_further_save_postdata' );
function gp_further_save_postdata( $post_id ) {
if ( ! isset( $_POST['further_nonce'] ) ) {
 return;
}

if ( ! wp_verify_nonce( $_POST['further_nonce'], 'further_check' ) ) {
return;
}

if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
return;
}

if ( isset($_POST['further_check']) && $_POST['further_check'] != "" ){
update_post_meta( $post_id, 'further_check', $_POST['further_check'] );
 } else {
 delete_post_meta($post_id, 'further_check');
 } 
}

// производим редирект на ту же страницу при неудачной попытке логина или выходе
function gp_authenticate( $user, $username, $password ) {
if ( is_wp_error( $user ) && isset( $_SERVER['HTTP_REFERER'] ) && ! strpos( $_SERVER['HTTP_REFERER'], 'wp-admin' ) && ! strpos( $_SERVER['HTTP_REFERER'], 'wp-login.php' ) ) {
$referrer = $_SERVER['HTTP_REFERER'];
foreach ( $user->errors as $key => $error ) {
  if ( in_array( $key, [ 'empty_password', 'empty_username' ] ) ) {
  unset( $user->errors[ $key ] );
  $user->errors[ 'custom_' . $key ] = $error;
  wp_redirect( $referrer . '?login=failed' );
    }
  }
}
 return $user;
}
add_filter( 'authenticate', 'gp_authenticate', 31, 3 );

// устанавливаем ссылку для режима Обычный пост
function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">'. __('Подробнее', 'blogpost-3') . ' &raquo;</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

// добавляем изображение в контейнер красивого анонса
add_action( 'gp_thumb', 'special_post_thumbnail' );
function special_post_thumbnail() {
  if(has_post_thumbnail()) {
    $imageAttachment = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
    $imageSrc = $imageAttachment[0]; 
    echo 'data-bg=" ' .$imageSrc. '"'; 
  } 
}