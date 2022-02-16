<?php
// шаблон главной страницы

$titan = TitanFramework::getInstance( 'gpress' );

get_header(); 

// выводим только на первой странице, если включена постраничная навигация
if (is_home() && !is_paged()) {  
    
    // слайдер
    if ($titan->getOption( 'slider-loc' ) == '1') {
        if ($titan->getOption( 'wpmob-loc' ) == '1') {
            // отключаем слайдер при просмотре с моб устройства
            if( ! wp_is_mobile() ) { get_template_part ('files/front/home-slider');}
            } else {
            get_template_part ('files/front/home-slider');
            }
        }

    // либо постер, на выбор
    if ($titan->getOption( 'slider-loc' ) == '2') {
        if ($titan->getOption( 'wpmob-loc' ) == '1') {
            // отключаем постер при просмотре с моб устройства
            if( ! wp_is_mobile() ) { get_template_part ('files/front/home-poster'); }
            } else {
            get_template_part ('files/front/home-poster'); 
            }
        }
    
        // сетка рубрик
    if ($titan->getOption( 'home-cats-loc' ) == '1') {
        get_template_part ('files/front/home-categories'); 
    }

    // произвольный контент
    if ($titan->getOption( 'custom-content-loc' ) == '1') {
        get_template_part ('files/front/home-custom-content'); 
    }
}
// заканчиваем вывод элементов на первой странице
    
    //блог
     get_template_part ('files/front/blog'); 

get_footer(); 
?>