<?php
//выводим на фронт изображения и стили, заданные в консоли темы в разделе Оформление
if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly.
}

add_action( 'wp_head', 'titan_fr_head' );
function titan_fr_head() {
$titan = TitanFramework::getInstance( 'gpress' );
?>

<style><?php
if ($titan->getOption( 'darkmode-loc' ) == '1') {
// темный режим
echo '#site-wrapper.dark,.dark .menunav ul li ul li ul,.dark .gp-post-tags,.dark table tr:nth-of-type(even), .dark .overlay, .dark .page404-fugure, .dark ul.gp-child-cat-list li a {background:' .$titan->getOption( 'darkmode-body-bg' ) . '}';
echo '.dark header,.dark .slider-caption,.dark .gp-recent-posts-widget,.dark .home-bg-section,.dark blockquote,.dark .pagination a.page-numbers,.dark .post-footer,.dark .toggle-comments,.dark .toggle-comments.opened,.dark .nav-box,.dark table tr:nth-of-type(odd),.dark footer,.dark .gp-cat-list-widget li:hover,.dark li.parent-item.opened, .dark .home-cat-item,.dark .gp-entry,.dark #sidebar .widget, .dark .widget-slider-wrap, .dark .gp-single-post,.dark .entry-author,.dark .comments-box,.dark .more-posts_item,.dark .further-reading,.dark .arch-header,.dark .search-header,.dark .gp-post-tags, .dark .gp-custom-content, .dark .popup, .dark .single-thumb {background-color:' .$titan->getOption( 'darkmode-div-bg' ) . ';box-shadow:none}';
echo '.dark .gp-post-tags{color:' .$titan->getOption( 'darkmode-div-bg' ) . '}';
echo '#site-wrapper.dark, .dark .text-title h1 a,.dark .text-title span a,.dark .menunav li a,.dark .mob-menu li a,.dark .slider-title,.dark .toggle-comments,.dark .nav-box span.post-title a,.dark .more-posts_title a,.dark ul.gp-child-cat-list li a, .dark .specialpost-caption,.dark .block-name,.dark footer,.dark .specialpost-caption, .dark .page404-fugure, .dark .menu-item-has-children:before, .dark .sub-menu .menu-item-has-children:before, .gp-cat-list-widget .widget-title {color:' .$titan->getOption( 'darkmode-col' ) . '}';
echo '#site-wrapper.dark a:hover,.dark .menunav li a:hover, .dark .slider-title:hover{color:' .$titan->getOption( 'darkmode-hov' ) . '}';
echo '.dark .post-content ul li:before,.dark .widget ul li:before,.dark .gp-custom-content ul li:before{background:' .$titan->getOption( 'darkmode-hov' ) . '}';
echo '.dark .menunav ul li ul,.dark header.colored,.dark .gp-post-tags a,.dark .gp-recent-posts-widget ul li .medium-thumbnail:after,.dark .gp-featured-posts-widget .small-thumbnail:before,.dark .block-name {background:' .$titan->getOption( 'darkmode-decor' ) . '}';
}
 if( wp_is_mobile() ) {
    echo '.home-cat-grid {margin-top:60px}';
 }
 // подключаем логотип
if ($titan->getOption( 'site-title' ) == '2') {
$imageID = $titan->getOption( 'themelogo' );$imageSrc = $imageID; if ( is_numeric( $imageID ) ) { $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); $imageSrc = $imageAttachment[0];} echo '.logo-title a{width:250px;height:80px;display:block;text-indent:-9999px;background-image:url('. esc_url( $imageSrc ).');background-repeat:no-repeat}';
}
//чёткость логотипа
if ($titan->getOption( 'hd-loc' ) == '1') {
echo '.logo-title a{background-size:cover}';
}
// инвертируем логотип в темном режиме
if ($titan->getOption( 'logo-invert' ) == '1') {
echo '.dark .logo-title a{filter:invert(100%)}';
}
// фильтр изображений в темном режиме
if ($titan->getOption( 'imgs-filter' ) == '1') {
echo '.dark img,.dark .home-cat-item-wrapper,.dark #slider li,.dark .specialpost, .dark .about-me-widget:before, .dark .widget-slider-wrap{filter:grayscale(100%)}';
} 
echo '#site-wrapper {background:' .$titan->getOption( 'body-bg' ) . '}';
echo 'body {color:' .$titan->getOption( 'body-col' ) . '}';
echo 'a, .slider-title  {color:' .$titan->getOption( 'alink' ) . '}';
echo 'a:hover, .text-title h1 a:hover, .text-title span a:hover, .menunav li a:hover, .slider-title:hover, .comments-box .navigation a:hover, .about-me-widget p a:hover {color:' .$titan->getOption( 'ahover' ) . '}';
echo 'a.vk-icon:hover,a.fb-icon:hover,a.twi-icon:hover,a.tele-icon:hover,a.ytube-icon:hover, .odnkl-icon:hover,a.whats-icon:hover,a.viber-icon:hover{background:' .$titan->getOption( 'ahover' ) . '}';
echo 'header.colored {background: ' .$titan->getOption( 'header-scroll-bg' ) . '}';
echo '.text-title h1 a, .text-title span a  {color:' .$titan->getOption( 'site-title-col' ) . '}';
echo '.menunav li a, .menu-item-has-children:before {color:' .$titan->getOption( 'nav-col' ) . '}';
echo '.menunav ul li ul {background:' .$titan->getOption( 'nav-drop-bg' ) . '}';
echo '.menunav ul li ul li a, .menunav ul li ul li a:hover, .sub-menu .menu-item-has-children:before {color:' .$titan->getOption( 'nav-drop-col' ) . '}';
echo '#loginform input[type="submit"], .popup .searchSubmit, .widget_search input[type="submit"], .comment-form input[type="submit"], .wpcf7 input[type="submit"], .mob-searchSubmit, .backtop {background:linear-gradient(var(--direction),' .$titan->getOption( 'btn-gradient1' ) . ',' .$titan->getOption( 'btn-gradient2' ) . ')}';
echo 'footer{background:' .$titan->getOption( 'footer-bg' ) . '; color:' .$titan->getOption( 'footer-col' ) . '}';
echo '.footer-col a {color:' .$titan->getOption( 'footer-col' ) . '}';
echo '.footer-col .widget-title {border-bottom:1px solid ' .$titan->getOption( 'footer-border' ) . '}';
echo '.gp-featured-posts-widget .small-thumbnail:before, .register-item:before,.loginout-item:before, .pagination .page-numbers.current,.pagination .page-numbers:hover, .pagination .post-page-numbers:hover, .pagination .post-page-numbers.current, .gp-recent-posts-widget ul li .medium-thumbnail:after, table::-webkit-scrollbar-thumb, blockquote, .block-name{background-color:' .$titan->getOption( 'decor-bg' ) . '}';
echo '.overlay { background:' .$titan->getOption( 'mob-nav-bg' ) . '}';
echo '.mob-menu li a, .mob-menu .theme-switch .switch:after, .mob-menu .gp-login{ color:' .$titan->getOption( 'mob-nav-col' ) . '}';
echo '.post-content ul li:before, .widget ul li:before, .gp-custom-content ul li:before { background:' .$titan->getOption( 'marker-bg' ) . '}';

echo '.paged .grid-wrapper {padding-top:120px}';

if ($titan->getOption( 'slider-loc' ) == '1') {
    echo '@media only screen and (max-width:1200px){.paged .grid-wrapper {padding-top:0}}';
}

if ($titan->getOption( 'slider-loc' ) == '2') {
    echo '@media only screen and (max-width:1200px){.paged .grid-wrapper {padding-top:0}}';
}
 
if ($titan->getOption( 'slider-loc' ) == '3') {
echo '.home #site-wrapper {padding-top:120px} .paged main, .paged #sidebar {margin-top:0}';
echo '.paged .grid-wrapper {padding-top:0}';
echo '@media only screen and (max-width:1200px){ 
.home #site-wrapper {padding-top: 0} 
.home main, .home #sidebar  {margin-top:25px} 
}';
}
if ($titan->getOption( 'sidebar-position' ) == '1') {		
echo 'main {float:left;margin-right:3%}';
} else {
echo 'main {float:right;margin-left:3%}';	
}	
if ($titan->getOption( 'com-spoiler-loc' ) == '1') { 
echo '.toggle-comments{width:100%;float:left;text-align:center;font-size:14px;letter-spacing:1px;font-weight:500;cursor:pointer;text-transform:uppercase;padding:16px 0; transition:all 0.3s ease-in; color:#444;position:relative;margin:40px 0 0; background: #fff; box-shadow: 0 10px 30px rgba(164,168,255,.2); border-radius: 4px} .toggle-comments:hover, .toggle-comments.opened:hover {background:' .$titan->getOption( 'decor-bg' ) . '; color:#fff}';
echo '.toggle-comments:before{content:"'. esc_attr__('Открыть обсуждение', 'blogpost-3') .'"}';
echo '.toggle-comments.opened:before{content:"'. esc_attr__('Cкрыть обсуждение', 'blogpost-3') .'"}';
echo '.toggle-comments.opened{padding:15px;display:inline-block;margin:30px 0 0}.comments-box.open{height:auto;display:block; margin:40px 0 0;overflow:visible}.comments-box{height:0; display:none; width:100%;float:left; overflow:hidden; padding: 30px 30px 10px; background:#fff;box-shadow: 0 10px 30px rgba(164,168,255,.2); border-radius: 4px}';
} else {
echo '.comments-box{height:auto;  width:100%;float:left; overflow:hidden; padding: 30px 30px 10px; background:#fff;box-shadow: 0 10px 30px rgba(164,168,255,.2); border-radius: 4px; margin-top:40px}';
}
if ($titan->getOption( 'backtop-loc' ) == '1') {
echo '.backtop{left:20px}';
} else {
echo '.backtop{right:20px}';
}
if ($titan->getOption( 'footer-col-loc' ) == '1') {	 
echo '.credits{margin-top:20px;padding:40px 0 25px; border-top:1px solid ' .$titan->getOption( 'footer-border' ) . '}';
} else {
 echo '.credits{margin-top:0px;padding:0 0 25px; border:none}';
}	
echo '.gp-cat-list-widget { background: ' .$titan->getOption( 'custom-cat-wid-bg' ) . '}';
echo '.gp-cat-list-widget .widget-title, .gp-cat-list-widget li {border-color: ' .$titan->getOption( 'custom-cat-wid-border' ) . ' !important}';
// фон виджета Об авторе
$imageID = $titan->getOption( 'about-me-widget-bg' );$imageSrc = $imageID; if ( is_numeric( $imageID ) ) { $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); $imageSrc = $imageAttachment[0];}
echo '.about-me-widget:before{background: url('.$imageSrc.') center center no-repeat;  background-size: cover}';
if( is_admin_bar_showing() ){
    echo 'header{top:30px}';
    echo '@media only screen and (max-width:1200px){ header{top:0}}';
}   
if ( ! $titan->getOption( 'login-loc' ) == '1') {
echo '.mob-menu {padding-top:90px} ';
}
if ( $titan->getOption( 'nav_type' ) == '2') {
    echo '.paged .gp-scroll {margin-top:120px} @media only screen and (max-width:1200px){.paged .gp-scroll {margin-top:30px}}';
    }
?>
</style>
<?php
}