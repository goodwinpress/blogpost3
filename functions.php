<?php
/**
 * BlogPost 3 функции и подключения
 */

function gpress_theme_support() {

// подключаем фид
add_theme_support( 'automatic-feed-links' );

//подключаем фон
add_theme_support(
'custom-background',
array(
'default-color' => 'ffffff',
    )
);

// задаем ширину
global $content_width;
if ( ! isset( $content_width ) ) {
$content_width = 800;
}

//подключаем изображение записи
add_theme_support( 'post-thumbnails' );

//подключаем title
add_theme_support( 'title-tag' );

// поддержка html5 
add_theme_support(
'html5',
array(
'search-form',
'comment-form',
'comment-list',
'gallery',
'caption',
'script',
'style',
)
);

//подключаем локализации
load_theme_textdomain( 'blogpost-3', get_template_directory() . '/languages' );

// поддержка для full и wide align картинок
add_theme_support('align-wide');

//адаптивное видео
add_theme_support('responsive-embeds'); 

// стили для редактора
add_theme_support( 'editor-styles' );
add_editor_style( 'style-editor.css' );

// кастомная шапка
add_theme_support( 'custom-header' );

// отключаем блочный редактор виджетов
remove_theme_support( 'widgets-block-editor' );

}
add_action('after_setup_theme', 'gpress_theme_support');

// подключаем  разные функции для темы
require get_template_directory() . '/files/back/theme-functions.php';
// хлебные крошки от DIMOX.NAME
require get_template_directory() . '/files/back/breadcrumbs.php';
// добавляем микроразметку в комментарии
require get_template_directory() . '/files/back/comments-atts.php';
// оптимизируем код, выключаем лишнее
require get_template_directory() . '/files/back/optimize.php';
// встроенные виджеты
require get_template_directory() . '/files/back/custom-widgets.php';
// custom script loader class.
 require get_template_directory() . '/files/back/gpress-script-loader.php';
 

//подключаем стили темы
function gpress_register_styles() {
$theme_version = wp_get_theme()->get( 'Version' );
wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), $theme_version );
}
add_action( 'wp_enqueue_scripts', 'gpress_register_styles' );

// асонхронная загрузка скриптов
$loader = new Gpress_Script_Loader();
 add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );
 

//подключаем скрипты
function gpress_register_scripts() {
$theme_version = wp_get_theme()->get( 'Version' );
if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
wp_script_add_data( 'comment-reply', 'async', true );
}
wp_enqueue_script( 'dark', get_template_directory_uri() . '/scripts/dark.js', array('jquery'), $theme_version, true );
wp_script_add_data( 'dark', 'async', true );
wp_enqueue_script( 'custom', get_template_directory_uri() . '/scripts/custom.js', array('jquery'), $theme_version, true );
wp_script_add_data( 'custom', 'async', true );
}

add_action( 'wp_enqueue_scripts', 'gpress_register_scripts' );

// добавляем меню
function gp_menus() {
$locations = array(
'primary'  =>  'Меню сайта',
);
register_nav_menus( $locations );
}
add_action( 'init', 'gp_menus' );

// сайдбары и виджеты подвала
function gpress_sidebar_registration() {

if (function_exists('register_sidebar') )
register_sidebar(array(	
'name' =>  __( 'Сайдбар:  блог и рубрики', 'blogpost-3' ),
'id' => 'sidebar-1',
 'before_title' => '<span class="widget-title">',
'after_title' => '</span>',
'before_widget' => '<div id="%1$s" class="widget %2$s gp-clearfix"> ',
'after_widget' => '</div> ',
));

if (function_exists('register_sidebar') )
register_sidebar(array(	
'name' =>  __( 'Сайдбар: записи', 'blogpost-3' ),
'id' => 'sidebar-2',
 'before_title' => '<span class="widget-title">',
'after_title' => '</span>',
'before_widget' => '<div id="%1$s" class="widget %2$s gp-clearfix"> ',
'after_widget' => '</div> ',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(	
'name' =>  __( 'Сайдбар: страницы ', 'blogpost-3' ),
'id' => 'sidebar-3',
'before_title' => '<span class="widget-title">',
'after_title' => '</span> ',
'before_widget' => '<div id="%1$s" class="widget %2$s gp-clearfix"> ',
'after_widget' => '</div> ',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(	
'name' =>  __( 'Подвал:   1 колонка', 'blogpost-3' ),
'id' => 'sidebar-4',
'before_title' => '<span class="widget-title">',
'after_title' => '</span> ',
'before_widget' => '<div id="%1$s" class="widget %2$s gp-clearfix"> ',
'after_widget' => '</div> ',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(	
'name' =>  __( 'Подвал: 2 колонка', 'blogpost-3' ),
'id' => 'sidebar-5',
'before_title' => '<span class="widget-title">',
'after_title' => '</span> ',
'before_widget' => '<div id="%1$s" class="widget %2$s gp-clearfix"> ',
'after_widget' => '</div> ',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(	
'name' =>  __( 'Подвал: 3 колонка', 'blogpost-3' ),
'id' => 'sidebar-6',
'before_title' => '<span class="widget-title">',
'after_title' => '</span> ',
'before_widget' => '<div id="%1$s" class="widget %2$s gp-clearfix"> ',
'after_widget' => '</div> ',
));

}
add_action( 'widgets_init', 'gpress_sidebar_registration' );

/****************************************************************/

// подключаем лицензию, не удаляем эту строчку
require_once('admin/license.php' );

/****************************************************************/

/***** Если нужно добавить какой-то код в functions.php, разместите его под этой строкой *******/