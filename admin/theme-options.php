<?php
// подключаем консоль темы
if (! defined('ABSPATH')) {
  exit;
}

add_action( 'tf_create_options', 'gpress_create_options' );
function gpress_create_options() {
$titan = TitanFramework::getInstance( 'gpress' );
$adminPanel = $titan->createAdminPanel( array(
    'name' => 'BlogPost 3',
));

$adminPanel->createOption( array(
'name' => 'О теме',
'type' => 'heading',
));

$adminPanel->createOption( array(
'type' => 'note',
'desc' => '<img src="/wp-content/themes/blogpost-3/screenshot.png" style="width:500px; float:left; margin:0 40px 30px 0" alt="">
<p><br /> "BlogPost 3" - новая красивая  и быстрая тема для статейного сайта, из серии классических блогов от Гудвина - адаптивная, оптимизированная, с тёмным режимом. </p><br /><p>Вы находитесь в консоли темы, где расположены пункты настройки. Здесь Вы можете наполнить контентом разделы темы, перекрасить основные её элементы, добавить статистику,  включить / отключить разные блоки и т.п.</p><br /><p>Чтобы изучить все возможности, ознакомьтесь с инструкцией, которая  предоставлена  вместе с темой.  Инструкция находится в файле readme.html и открывается при помощи любого браузера. В ней описаны все опции темы, рассказано, что и как настроить.</p><br /><p>Для клиентов работает бесплатная и бессрочная техподдержка.  Вы получаете ее все время, пока пользуетесь темой. Если нужна помощь, <a href="https://goodwinpress.ru/contact/" target="_blank">нажмите сюда</a> и напишите о возникшей проблеме.</p> <br /><p>GoodwinPress <a href="https://vk.com/alexey.goodwinpress" target="_blank" rel="nofollow">ВКонтакте</a> &nbsp; &middot; &nbsp;  GoodwinPress в <a href="https://twitter.com/goodwinpress/" target="_blank" rel="nofollow">Twitter</a>&nbsp; &middot; &nbsp; 
  GoodwinPress в <a href="https://www.facebook.com/goodwinpress/" target="_blank" rel="nofollow">Facebook</a>&nbsp; &middot; &nbsp; 
GoodwinPress в  <a href="https://t.me/goodwinpress/" target="_blank" rel="nofollow">Telegram</a></p><br />'
));

$adminPanel->createOption( array(
'name' => 'Другие темы от GoodwinPress:',
'type' => 'heading',
));

$adminPanel->createOption( array(
'type' => 'note',
'desc' => '<p>Если пожелаете приобрести какой-нибудь другой шаблон от GoodwinPress, постоянным клиентам предоставляется скидка 25 процентов.</p>
<br /><p>
<a href="https://www.goodwinpress.ru/wp-tema-law-factory/" target="_blank"><img class="panel-img" src="/wp-content/themes/blogpost-3/img/gpress/lawfactory.jpg" width="400" alt="Law Factory"></a>
<a href="https://www.goodwinpress.ru/tema-wp-commander/" target="_blank"><img class="panel-img" src="/wp-content/themes/blogpost-3/img/gpress/wpcomm.jpg" width="400" alt="WP Commander"></a>
<a href="https://www.goodwinpress.ru/tema-kassandra/" target="_blank"><img class="panel-img" src="/wp-content/themes/blogpost-3/img/gpress/kassandra.jpg" width="400" alt="Kassandra"></a>

</p>'
));

$normalPanel = $adminPanel->createAdminPanel( array(
    'name' => 'Общие настройки',
    'id'=> 'general-options',
));

 $normalPanel->createOption( array(
    'type' => 'note',
    'desc' => 'Здесь настроим общие для всего сайта элементы - фавикон, уведомление о сборе персональных данных, 404 страницу, социальные сети и др.',
));

$normalPanel->createOption( array(
    'name' => 'Favicon',
    'type' => 'heading',
));

$normalPanel->createOption( array(
    'name' => 'Favicon - установить',
    'id' => 'favicon',
    'type' => 'upload',
    'desc' => 'Создайте изображение с нужным рисунком, сохраните в формате png  и загрузите его здесь.',
    'default' => '/wp-content/themes/blogpost-3/img/demo/icon.png',
) );

$normalPanel->createOption( array(
    'name' => 'Персональные данные',
    'type' => 'heading',
) );

$normalPanel->createOption( array(
    'name' => 'Подтверждение на сбор персональных данных', 
    'id' => 'agree-loc',
    'type' => 'radio',
    'options' => array(
    '1' => 'Включить подтверждение',
    '2' => 'Не включать',
),
    'default' => '1',
    'desc' => 'Оповещение посетителя о том, что он дает согласие на сбор и обработку своих персональных данных при отправке сообщений через формы сайта.'
));

$normalPanel->createOption( array(
    'name' => 'Подтверждение - текст',
    'id' => 'agree-text',
    'type' => 'textarea',
    'default' => 'Я даю согласие на сбор и обработку персональных данных.',
    'desc' => 'Впишите текст, который будет выводиться под формой отправки сообщений или комментариев, предлагающий посетителям ознакомиться с текстом соглашения по сбору персональных данных.',
));

$normalPanel->createOption( array(
    'name' => 'Ссылка на текст соглашения',
    'id' => 'agree-url',
    'type' => 'text',
    'desc' => 'Разместите здесь адрес страницы с документом -  соглашением на обработку данных или политику конфиденциальности, т.п. Не забываем http:// или https://',
    'default' => '#',
));

$normalPanel->createOption( array(
    'name' => 'Название документа',
    'id' => 'agree-title',
    'type' => 'text',
    'default'=> 'Политика конфиденциальности',
    'desc' => 'Как называется этот документ на вашем сайте - Соглашение или Политика конфиденциальности или Правила сбора и обработки данных и тп. Используется в качестве анкора для заданной выше ссылки.',
));

$normalPanel->createOption( array(
    'name' => 'Верификация сайта в Google и Яндекс',
    'type' => 'heading',
));

$normalPanel->createOption( array(
    'name' => 'HTML-тэг для подтверждения прав на сайт',
    'id' => 'verification',
    'type' => 'textarea',
    'desc' => 'Если нужно подтвердить права на сайт в Яндексе и Гугле, это можно сделать здесь, разместив в данное поле код предложенных Вам html метатэгов. Они будут выводиться в разделе head.',
));

$normalPanel->createOption( array(
    'name' => 'Cтатистика и аналитика',
    'type' => 'heading',
));

$normalPanel->createOption( array(
    'name' => 'Статистика Google Analytics',
    'id' => 'googlecode',
    'type' => 'textarea',
    'desc' => 'Если вы используете статистику от Google Analytics, вставьте код статистики в это поле. Другие счетчики сюда ставить не рекомендуется.',
));

$normalPanel->createOption( array(
    'name' => 'Статистика без кнопки - Яндекс.Метрика',
    'id' => 'yandexcode',
    'type' => 'textarea', 
    'desc' => 'Если вы используете статистику Яндекс.Метрика, вставьте код статистики в это поле.  Другие счетчики сюда ставить не рекомендуется.',
));

$normalPanel->createOption( array(
    'name' => 'Любая статистика с кнопкой',
    'id' => 'anycode',
    'type' => 'textarea', 
    'desc' => 'Если у вас имеется  счетчик  с кнопкой типа LiveInternet или Mail.ru, кнопка каталога, или Яндекс Метрика с кнопкой-информером,  поставьте их код в это поле.',
));

$normalPanel->createOption( array(
    'name' => 'Пиксель Facebook',
    'id' => 'pixel',
    'type' => 'textarea', 
    'desc' => 'Если у вас есть код Пикселя Facebook, поставьте его в это поле.',
));

$normalPanel->createOption( array(
    'name' => '404 страница',
    'type' => 'heading',
));

$normalPanel->createOption( array(
    'name' => '404 - текст',
    'id' => '404-text',
    'type' => 'textarea', 
    'desc' => 'Впишите свой текст для 404 страницы ',
    'default'=> 'Дорогой посетитель! Страница, которую Вы искали, не существует, либо была перемещена на другой адрес. Перейдите на <a href="/">Главную</a>, где собран весь основной контент. Либо посмотрите несколько наших последних публикаций. Спасибо!',
));

$normalPanel->createOption( array(
    'name' => 'Микроразметка',
    'type' => 'heading',
));

$normalPanel->createOption( array(
    'type' => 'note',
    'desc' => 'Свойство publisher микроразметки schema.org требует указать регион или населенный пункт, к которому относится сайт, а также контактный номер телефона.',
));

$normalPanel->createOption( array(
    'name' => 'Населенный пункт',
    'id' => 'mirco-city',
    'type' => 'text',
    'desc' => 'Впишите название региона или населенного пункта, к которому относится сайт.',
    'default' => 'Санкт-Петербург',
));

$normalPanel->createOption( array(
    'name' => 'Номер телефона',
    'id' => 'mirco-tel',
    'type' => 'text',
    'desc' => 'Впишите номер телефона владельца или автора сайта.',
    'default' => '+7(123)456-78-90',
));

$normalPanel->createOption( array(
  'name' => 'Поиск по сайту',
  'type' => 'heading',
  ));

  $normalPanel->createOption( array(
    'name' => 'Подсказка для поиска',
    'id' => 'search-example',
    'type' => 'text', 
    'desc' => 'Впишите слово или фразу для установки в качестве примера или подсказки в поп-апе поиска.',
    'default'=> 'город',
  ));
  
 $normalPanel->createOption(array(
   'name' => 'GoodwinPress',
   'id' => 'gpr-loc',
   'type' => 'enable',
   'default' => true,
   'desc' => 'Авторская индексируемая ссылка в подвале сайта, вкл / выкл',
 )); 
  
$normalPanel->createOption( array(
    'type' => 'save',
) );

$normalPanel = $adminPanel->createAdminPanel( array(
    'name' => 'Шапка',
    'id'=> 'header',
) );

 $normalPanel->createOption( array(
    'type' => 'note',
    'desc' => 'Здесь включим и настроим компоненты шапки - за исключением меню: оно создаётся и настраивается в админке сайта в разделе "Внешний вид > Меню".',
));

$normalPanel->createOption( array(
    'name' => 'Заголовок сайта',
    'type' => 'heading',
));

$normalPanel->createOption( array(
    'name' => 'Текст или логотип',
    'id' => 'site-title',
    'type' => 'select',
    'desc' => 'Выберите, что выводить - текст или логотип. <br />Если выбран текст, то в шапке будет выводиться заголовок, заданный вами в <a target="_blank" href="options-general.php">настройках WordPress</a>.',
    'options' => array(
        '1' => 'Текст',
        '2' => 'Логотип',
        ),
        'default' => '2',
) );

$normalPanel->createOption( array(
    'name' => 'Если выбран логотип',
    'id' => 'themelogo',
    'type' => 'upload',
    'desc' => 'Если выбран логотип - загрузите его здесь. <br />Рекомендуемый размер логотипа - 250х80 пикс. ',
    'default' => '/wp-content/themes/blogpost-3/img/demo/logo.png'
) );

$normalPanel->createOption( array(
    'name' => 'Повышенная чёткость логотипа',
    'id' => 'hd-loc',
    'type' => 'checkbox',
    'default' => true,
    'desc' => 'Создайте и загрузите логотип в 2 раза больше размером (500x160 пикс.), после чего поставьте здесь галочку. ',
 ) );
 
$normalPanel->createOption( array(
    'name' => 'Другие элементы шапки',
    'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => 'Логин',
  'id' => 'login-loc',
  'type' => 'enable',
  'desc' => 'Кнопка, открывающая поп-ап с формой логина, вкл / выкл',
  'default' => true,
));

$normalPanel->createOption( array(
  'name' => 'Темный режим',
  'id' => 'darkmode-loc',
  'type' => 'enable',
  'desc' => 'Кнопка, активирующая темный режим, вкл / выкл',
  'default' => true,
));

$normalPanel->createOption( array(
    'type' => 'save',
) );

$normalPanel = $adminPanel->createAdminPanel( array(
    'name' => 'Слайдер / Постер',
    'id'=> 'slider-options',
));

$normalPanel->createOption( array(
    'type' => 'note',
    'desc' => 'В этом разделе включим и настроим Слайдер или Постер на Главной странице.',
));

$normalPanel->createOption( array(
  'name' => 'Что будем использовать', 
  'id' => 'slider-loc',
  'type' => 'radio',
  'options' => array(
  '1' => 'Слайдер',
  '2' => 'Постер',
  '3' => 'Ничего',
),
  'default' => '1',
  'desc' => 'Выберите, что выводить на Главной. Слайдер - карусель из 3 слайдов с картинкой, заголовком и произвольной ссылкой, первые два включены по умолчанию. Постер - одно статичное изображение с  заголовком и произвольной ссылкой. '
));

$normalPanel->createOption( array(
  'name' => 'На мобильных устройствах',
  'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => 'Убрать на моб. устройствах?',
  'id' => 'wpmob-loc',
  'type' => 'enable',
  'desc' => 'Отключение Слайдера или Постера при просмотре на мобильных устройствах даёт прирост скорости и дополнительные 25-30 баллов в Google Pagespeed test.',
  'default' => false,
));

 
$normalPanel->createOption( array(
    'name' => 'Если выбран Слайдер',
    'type' => 'heading',
));
 
$normalPanel->createOption( array(
    'name' => 'Слайд 1 - изображение',
    'id' => 'slider-img1',
    'type' => 'upload',
    'desc' => 'Установите изображение в первый слайд. Рекомендуемый размер - 1920х540 пикс. Вес - как можно меньше.',
    'default' => '/wp-content/themes/blogpost-3/img/demo/slide1.jpg'
));
 
$normalPanel->createOption( array(
    'name' => 'Слайд 1 - заголовок',
    'id' => 'slider-text1',
    'type' => 'text',
    'desc' => 'Разместите заголовок первого слайда.',
    'default' => 'Заголовок слайда 1',
));

$normalPanel->createOption( array(
    'name' => 'Слайд 1 - ссылка',
    'id' => 'slider-url1',
    'type' => 'text',
    'desc' => 'Разместите адрес любой страницы, которая откроется по клику на слайд. ',
    'default' => 'https://wordpress.org',
));
 
 $normalPanel->createOption( array(
   'name' => 'Слайд 2 - изображение',
   'id' => 'slider-img2',
   'type' => 'upload',
   'desc' => 'Установите изображение во второй слайд. Рекомендуемый размер - 1920х540 пикс. Вес - как можно меньше.',
   'default' => '/wp-content/themes/blogpost-3/img/demo/slide2.jpg'
));

$normalPanel->createOption( array(
   'name' => 'Слайд 2 - заголовок',
   'id' => 'slider-text2',
   'type' => 'text',
   'desc' => 'Разместите заголовок второго слайда.',
   'default' => 'Заголовок слайда 2',
));

$normalPanel->createOption( array(
   'name' => 'Слайд 2 - ссылка',
   'id' => 'slider-url2',
   'type' => 'text',
   'desc' => 'Разместите адрес любой страницы, которая откроется по клику на слайд. ',
   'default' => 'https://goodwinpress.ru',
));

$normalPanel->createOption( array(
  'name' => 'Слайд 3 - включить',
  'id' => 'slide3-loc',
  'type' => 'enable',
  'desc' => 'Первые два слайда включены по умолчанию, третий - по желанию, вкл / выкл',
  'default' => false,
));
$normalPanel->createOption( array(
  'name' => 'Слайд 3 - изображение',
  'id' => 'slider-img3',
  'type' => 'upload',
  'desc' => 'Установите изображение в третий слайд. Рекомендуемый размер - 1920х540 пикс. Вес - как можно меньше.',
  'default' => '/wp-content/themes/blogpost-3/img/demo/slide3.jpg'
));

$normalPanel->createOption( array(
  'name' => 'Слайд 3 - заголовок',
  'id' => 'slider-text3',
  'type' => 'text',
  'desc' => 'Разместите заголовок третьего слайда.',
  'default' => 'Заголовок слайда 3',
));

$normalPanel->createOption( array(
  'name' => 'Слайд 3 - ссылка',
  'id' => 'slider-url3',
  'type' => 'text',
  'desc' => 'Разместите адрес любой страницы, которая откроется по клику на слайд. ',
  'default' => 'https://google.com',
));

$normalPanel->createOption( array(
  'name' => 'Если выбран Постер',
  'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => 'Постер - изображение',
  'id' => 'poster-img',
  'type' => 'upload',
  'desc' => 'Установите изображение в Постер. Рекомендуемый размер - 1920х540 пикс. Вес - как можно меньше.',
  'default' => '/wp-content/themes/blogpost-3/img/demo/slide1.jpg'
));

$normalPanel->createOption( array(
  'name' => 'Постер - заголовок',
  'id' => 'poster-text',
  'type' => 'text',
  'desc' => 'Разместите заголовок Постера',
  'default' => 'Заголовок Постера',
));

$normalPanel->createOption( array(
  'name' => 'Постер - ссылка',
  'id' => 'poster-url',
  'type' => 'text',
  'desc' => 'Разместите адрес любой страницы, которая откроется по клику на Постер. ',
  'default' => 'https://goodwinpress.ru',
));

$normalPanel->createOption( array(
    'type' => 'save',
));

$normalPanel = $adminPanel->createAdminPanel( array(
    'name' => 'Рубрики',
    'id'=> 'home-category-options',
));

$normalPanel->createOption( array(
    'type' => 'note',
    'desc' => 'В этом разделе настроим сетку избранных рубрик на Главной странице. Если рубрика не выбрана, ячейка не выводится.',
));

$normalPanel->createOption( array(
  'name' => 'Раздел с рубриками',
  'id' => 'home-cats-loc',
    'type' => 'enable',
  'desc' => 'Раздел с рубриками на Главной странице - вкл / выкл ',
'default' => false,
 ) );
  
$normalPanel->createOption( array(
  'name' => 'Рубрика 1',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat1',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat1-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Рубрика 2',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat2',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat2-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Рубрика 3',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat3',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat3-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Рубрика 4',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat4',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat4-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Рубрика 5',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat5',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat5-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Рубрика 6',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat6',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat6-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Рубрика 7',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat7',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat7-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Рубрика 8',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat8',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat8-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Рубрика 9',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat9',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat9-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Рубрика 10',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat10',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat10-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Рубрика 11',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat11',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat11-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Рубрика 12',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
    'name' => 'Выбрать рубрику',
    'id' => 'select-cat12',
    'type' => 'select-categories',
    'desc' => 'Откройте список и выберите рубрику.',
) );

 $normalPanel->createOption( array(
   'name' => 'Установить изображение',
   'id' => 'select-cat12-img',
   'type' => 'upload',
   'desc' => 'Установите изображение рубрики. Рекомендуемый размер - 370х240 пикс. Вес - как можно меньше.',
   'default' => ''
));

$normalPanel->createOption( array(
    'type' => 'save',
));

$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Блог',
  'id'=> 'blog-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Настройка элементов блога, рубрик и других архивов.',
));

$normalPanel->createOption( array(
  'name' => 'Произвольный контент',
  'type' => 'heading',
  ) );
  
  $normalPanel->createOption( array(
      'name' => 'Блок с произвольным контентом',
      'id' => 'custom-content-loc',
      'type' => 'enable',
      'default' => true,
      'desc' => 'Блок на первой странице Главной (блога) с произвольным контентом - вкл / выкл.',
   ) );
  
  $normalPanel->createOption( array(
      'name' => 'Разместите контент',
      'id' => 'custom-content',
      'type' => 'editor',
      'default' => 'Здесь Ваш любой контент - текст, галерея, шорткоды и т.п.',
      'desc' => 'Разместите контент - изображение, текст, видео, таблицу, список и т.п. При помощи классического редактора доступно форматирование, размещение любых шорткодов.',
   ) );
  
   $normalPanel->createOption( array(
     'name' => 'Вид записей, анонсов',
     'type' => 'heading',
     ) );
     
     $normalPanel->createOption( array(
      'name' => 'Вид записей', 
      'id' => 'blog-type',
      'type' => 'radio',
         'options' => array(
          '1' => 'Вариант 1 - список, в 1 ряд, с квадратной миниатюрой',
          '2' => 'Вариант 2 - список, в 1 ряд, стандартная запись без анонса и миниатюры',
          '3' => 'Вариант 3 - сетка, в 3 ряда, без сайдбара',
      ),
         'default' => '1',
         'desc' => 'Выберите, как выводить записи в блоге, архивах и рубриках. "Красивые анонсы" применяются только в Варианте 1.'
     ) );
   
   $normalPanel->createOption( array(
     'name' => 'Тип анонса в записях', 
     'id' => 'anons-loc',
   'type' => 'radio',
       'options' => array(
         '1' => 'Автоматический',
         '2' => 'Вручную',
  ),
     'default' => '1',
     'desc' => 'Выберите, как выводить текстовый анонс в записях блога и рубрик - либо он формируется автоматически на основе первых строк записи, либо задается вручную через Отрывок (excerpt).'
 ) );
 
$normalPanel->createOption( array(
  'name' => 'Даты в анонсах',
  'id' => 'date-loc',
  'type' => 'enable',
  'desc' => 'Выводить даты в анонсах, вкл / выкл.',
  'default' => true,
) );


$normalPanel->createOption( array(
   'name' => 'Навигация по записям',
   'type' => 'heading',
   ) );
   
$normalPanel->createOption( array(
  'name' => 'Тип постраничной навигации', 
  'id' => 'nav_type',
  'type' => 'radio',
  'options' => array(
  '1' => 'Бесконечная прокрутка',
  '2' => 'Стандартная навигация с цифрами',
),
  'default' => '1',
  'desc' => 'Выберите тип загрузки записей - бесконечная прокрутка или обычная постраничная навигация через номера страниц. '
));

$normalPanel->createOption( array(
  'name' => 'Боковая колонка (сайдбар)',
  'type' => 'heading',
  ) );
  
$normalPanel->createOption( array(
 'name' => 'Расположение сайдбара',
 'id' => 'sidebar-position',
'type' => 'radio',
'desc' => 'С какой стороны выводить боковую колонку.',
 'options' => array(
 '1' => 'Справа',
 '2' => 'Слева',
 ),
 'default' => '1',
  ) );
  
  $normalPanel->createOption( array(
    'name' => 'Архивы (рубрики, метки и др)',
    'type' => 'heading',
    ) );
    
    $normalPanel->createOption( array(
    'name' => 'Описание',
    'id' => 'desc-loc',
    'type' => 'enable',
    'desc' => 'Описание в архивах по рубрикам, меткам, авторам - вкл / выкл ',
    'default' => true,
   ) );
       
    $normalPanel->createOption( array(
    'name' => 'Список дочерних рубрик',
    'id' => 'child-cat-loc',
    'type' => 'enable',
    'desc' => 'Выводить список подрубрик в родительской рубрике - вкл / выкл ',
    'default' => false,
 ) );

$normalPanel->createOption( array(
  'type' => 'save',
));
 
 $normalPanel = $adminPanel->createAdminPanel( array(
    'name' => 'Записи и страницы',
    'id'=> 'single-options',
));

$normalPanel->createOption( array(
   'name' => 'Изображение записи',
   'id' => 'featured-img-loc',
     'type' => 'enable',
   'desc' => 'Выводить изображение записи в шапке, вкл / выкл ',
 'default' => false,
  ) );
  
  $normalPanel->createOption( array(
     'name' => 'Аннотация',
     'id' => 'single-excerpt-loc',
       'type' => 'enable',
     'desc' => 'Выводить аннотацию - краткое содержание записи, вводную, вкл / выкл ',
   'default' => false,
    ) );
    
 $normalPanel->createOption( array(
   'name' => 'Дата и обновление',
   'id' => 'single-date-loc',
   'type' => 'enable',
    'desc' => 'Выводить строчку с датами публикации и обновления, вкл / выкл ',
    'default' => true,
  ) );
      
  $normalPanel->createOption( array(
 'name' => 'Метки',
  'id' => 'tags-loc',
 'type' => 'enable',
  'desc' => 'Выводить блок с метками (тэгами) в нижней части записи, вкл / выкл ',
 'default' => false,
 ) );
        
 $normalPanel->createOption( array(
 'name' => 'Поделиться в соц. сетях',
 'id' => 'single-social-loc',
 'type' => 'enable',
 'desc' => 'Выводить блок c  кнопками "Поделиться", вкл / выкл ',
 'default' => true,
 ) );
 
$normalPanel->createOption( array(
 'name' => 'Комментарии в записях',
 'id' => 'com-post-loc',
 'type' => 'enable',
 'default' => true,
 'desc' => 'Выключить показ комментариев во всех записях',
 ) );
    
 $normalPanel->createOption( array(
 'name' => 'Комментарии на страницах',
 'id' => 'com-page-loc',
 'type' => 'enable',
 'default' => false,
 'desc' => 'Выключить показ комментариев на всех страницах сайта',
 ) );
    
 $normalPanel->createOption( array(
 'name' => 'Спойлер для комментариев',
 'id' => 'com-spoiler-loc',
 'type' => 'radio',
 'desc' => 'Если комментарии включены, показывать их как есть или убрать в спойлер',
 'options' => array(
 '1' => 'Убрать в спойлер',
 '2' => 'Оставить как есть',
 ),
 'default' => '1',
  ) );   
    
 $normalPanel->createOption( array(
 'name' => 'Внутренняя навигация',
'id' => 'nav-loc',
 'type' => 'enable',
 'desc' => 'Блок для внутренних переходов между записями, предыдущая - следующая,  вкл  / выкл',
'default' => false,
 ) );  

$normalPanel->createOption( array(
 'name' => 'Похожие записи',
 'id' => 'more-posts-loc',
 'type' => 'enable',
'desc' => 'Выводить блок с шестью публикациями из той же рубрики - вкл  / выкл',
'default' => false,
 ) );
 
$normalPanel->createOption( array(
  'name' => 'Раздел Читайте также',
   'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
'name' => 'Включить',
 'id' => 'further-loc',
 'type' => 'enable',
 'desc' => 'Выводить раздел "Читайте также" в нижней части записи - вкл  / выкл',
'default' => false,
) );

$normalPanel->createOption( array(
   'name' => 'Что выводить в данном разделе', 
   'id' => 'further_type',
   'type' => 'radio',
     'options' => array(
       '1' => 'Записи, отобранные вручную',
       '2' => 'Любые записи в случайном порядке',
),
   'default' => '1',
   'desc' => 'Установите, по какому принципу тема будет подбирать записи для показа. Выводим либо те, которые вы отметили галочкой, или же любые записи в случайном порядке. '
) );
  
$normalPanel->createOption( array(
 'name' => 'Контент в подвале записей',
  'type' => 'heading',
 ));
    
  $normalPanel->createOption( array(
 'name' => 'Контент',
 'id' => 'post-footer-content',
 'type' => 'editor',
 'desc' => 'Какой-либо произвольный контент в подвале записей - текст, ссылки, баннер и т.п. Поддерживаются шорткоды!',
 'default' => '<p>Подпишитесь на нас <a href="#">ВКонтакте</a>, <a href="#">Telegram</a> или <a href="#">Instagram</a></p>',
  ));
 
 $normalPanel->createOption( array(
   'type' => 'save',
 ));

$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Социальные сети',
  'id'=> 'social-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Здесь настраиваем опции, связанные с вашим присутствием в социальных сетях и сервисах.',
));

$normalPanel->createOption( array(
  'name' => 'Ваши аккаунты в соц. сетях',
  'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => 'ВКонтакте - включить',
  'id' => 'vk-loc',
  'type' => 'enable',
  'default' => false,
  'desc' => 'Включить кнопку ВКонтакте',
) );

$normalPanel->createOption( array(
  'name' => 'ВКонтакте - ссылка',
  'id' => 'vk-link',
  'type' => 'text',
  'desc' => 'Вставьте ссылку на Вашу страницу ВКонтакте.',
  'default' => 'https://vk.com',
) );
 
$normalPanel->createOption( array(
  'name' => 'Instagram - включить',
  'id' => 'inst-loc',
  'type' => 'enable',
  'default' => false,
  'desc' => 'Включить кнопку Instagram',
) );

$normalPanel->createOption( array(
  'name' => 'Instagram - ссылка',
  'id' => 'inst-link',
  'type' => 'text',
  'desc' => 'Вставьте ссылку на Вашу страницу в Instagram',
  'default' => 'https://instagram.com',
) );

$normalPanel->createOption( array(
  'name' => 'Facebook - включить',
  'id' => 'fb-loc',
  'type' => 'enable',
  'default' => false,
  'desc' => 'Включить кнопку Facebook',
) );

$normalPanel->createOption( array(
  'name' => 'Facebook - ссылка',
  'id' => 'fb-link',
  'type' => 'text',
  'desc' => 'Вставьте ссылку на Вашу страницу в Facebook. Например, https://www.facebook.com/goodwinpress/',
  'default' => 'https://facebook.com',
) );

$normalPanel->createOption( array(
  'name' => 'Twitter - включить',
  'id' => 'twi-loc',
  'type' => 'enable',
  'default' => false,
  'desc' => 'Включить кнопку Twitter',
) );

$normalPanel->createOption( array(
  'name' => 'Twitter - ссылка',
  'id' => 'twi-link',
  'type' => 'text',
  'desc' => 'Вставьте ссылку на Вашу страницу в Twitter. Например, https://twitter.com/goodwinpress/',
  'default' => 'https://twitter.com',
));

$normalPanel->createOption( array(
  'name' => 'Telegram - включить',
  'id' => 'tg-loc',
  'type' => 'enable',
  'default' => false,
  'desc' => 'Включить кнопку Telegram',
) );

$normalPanel->createOption( array(
  'name' => 'Telegram - ссылка',
  'id' => 'tg-link',
  'type' => 'text',
  'desc' => 'Вставьте ссылку на Ваш аккаунт в Telegram. Например, https://t.me/goodwinpress/',
  'default' => 'https://telegram.org',
));

$normalPanel->createOption( array(
  'name' => 'YouTube - включить',
  'id' => 'yt-loc',
  'type' => 'enable',
  'default' => false,
  'desc' => 'Включить кнопку YouTube',
) );

$normalPanel->createOption( array(
  'name' => 'YouTube - ссылка',
  'id' => 'yt-link',
  'type' => 'text',
  'desc' => 'Вставьте ссылку на Ваш канал в YouTube',
  'default' => 'https://youtube.com',
) );

$normalPanel->createOption( array(
'name' => 'Одноклассники - включить',
'id' => 'od-loc',
'type' => 'enable',
'default' => false,
'desc' => 'Включить кнопку Одноклассники',
) );

$normalPanel->createOption( array(
'name' => 'Одноклассники - ссылка',
'id' => 'od-link',
'type' => 'text',
'desc' => 'Вставьте ссылку на Ваш аккаунт в Одноклассниках',
'default' => 'https://odnoklassniki.ru',
) );

$normalPanel->createOption( array(
  'name' => 'Кнопки Поделиться в записях',
  'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => 'Кнопки Поделиться',
  'id' => 'share-options',
  'type' => 'multicheck',
  'desc' => 'Включите нужные кнопки, с помощью которых можно поделиться записью в социальных сетях и мессенджерах',
  'options' => array(
      'wh' => 'WhatsApp',
      'vk' => 'ВКонтакте',
      'fb' => 'Facebook',
      'tg' => 'Telegram',
      'tw' => 'Twitter',
      'od' => 'Одноклассники',
      'vb' => 'Viber',
          ),
'default' => array( 'wh', 'fb' )
) );


$normalPanel->createOption( array(
  'type' => 'save',
));
 
$normalPanel = $adminPanel->createAdminPanel( array(
    'name' => 'Подвал',
    'id'=> 'footer',
));

$normalPanel->createOption( array(
    'type' => 'note',
    'desc' => 'Настройка элементов в подвале сайта.',
));

$normalPanel->createOption( array(
  'name' => 'Колонки с виджетами',
  'id' => 'footer-col-loc',
 'type' => 'enable',
  'default' => false,
  'desc' => 'Колонки с виджетами в подвале, вкл / выкл. ',
 ));
 
$normalPanel->createOption( array(
    'name' => 'Социальные сети',
    'id' => 'footer-socials-loc',
    'type' => 'enable',
    'default' => true,
    'desc' => 'Блок с кнопками соц. сетей в подвале, вкл / выкл. ',
));

$normalPanel->createOption( array(
'name' => 'Текст в подвале',
'type' => 'heading',
));

$normalPanel->createOption( array(
    'name' => 'Текст',
    'id' => 'footer-text',
    'type' => 'editor',
    'desc' => 'Какой-либо дополнительный текст в подвале.',
    'default' => '',
));

$normalPanel->createOption( array(
'name' => 'Кнопка Вверх',
'type' => 'heading',
));

$normalPanel->createOption( array(
    'name' => 'Перенести кнопку Вверх на левую сторону?',
    'id' => 'backtop-loc',
    'type' => 'checkbox',
    'default' => false,
    'desc' => 'Если вы используете онлайн-чат типа Jivo, кнопку звонка или мессенджера, перенесите кнопку Вверх на левую сторону сайта, чтобы все данные элементы не мешали друг другу.',
));

$normalPanel->createOption( array(
    'type' => 'save',
));

$normalPanel = $adminPanel->createAdminPanel( array(
    'name' => 'Оформление',
    'id'=> 'style-options',
));

$normalPanel->createOption( array(
    'type' => 'note',
    'desc' => 'Здесь вы можете изменить цвета шаблона, задать свои. Если же вам нравится оформление, которые вы видели на демо-сайте, просто нажмите на кнопку сохранения настроек внизу этой страницы. Подробнее об оформлении см инструкцию, которая приложена к теме.',
));

$normalPanel->createOption( array(
  'name' => 'Виджет Об авторе',
  'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => 'Фоновое изображение',
  'id' => 'about-me-widget-bg',
  'type' => 'upload',
  'desc' => 'Установите здесь изображение для фона виджета "Об авторе". Рекомендуемый размер 360х130 пикс.',
  'default' => '/wp-content/themes/blogpost-3/img/demo/widget-bg.jpg',
) );

$normalPanel->createOption( array(
'name' => 'Общие',
'type' => 'heading',
) );

$normalPanel->createOption( array(
  'name' => 'Сайт: цвет фона',
  'id' => 'body-bg',
  'type' => 'color',
  'desc' => 'Цвет фона сайта',
  'default' => '#F9F9FF',
));

$normalPanel->createOption( array(
    'name' => 'Тексты сайта: цвет шрифта',
    'id' => 'body-col',
    'type' => 'color',
    'desc' => 'Цвет шрифта текстов сайта',
    'default' => '#444444',
));

$normalPanel->createOption( array(
    'name' => 'Ссылки: цвет шрифта',
    'id' => 'alink',
    'type' => 'color',
    'desc' => 'Цвет шрифта ссылки в тексте.',
    'default' => '#444444',
));

$normalPanel->createOption( array(
    'name' => 'Ссылки при наведении мыши: цвет шрифта',
    'id' => 'ahover',
    'type' => 'color',
    'desc' => 'Цвет шрифта ссылки при наведении мыши (hover).',
    'default' => '#7579e7',
));

$normalPanel->createOption( array(
  'name' => 'Шапка сайта',
  'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => 'Подсветка фона',
  'id' => 'header-scroll-bg',
  'type' => 'color',
  'desc' => 'Цвет фона шапки сайта при скроллинге.',
  'default' => '#7579e7',
));
 
$normalPanel->createOption( array(
  'name' => 'Заголовок сайта: цвет шрифта',
  'id' => 'site-title-col',
  'type' => 'color',
  'desc' => 'Цвет шрифта текстового заголовка сайта',
  'default' => '#444444',
));

$normalPanel->createOption( array(
    'name' => 'Меню',
    'type' => 'heading',
));
$normalPanel->createOption( array(
    'name' => 'Цвет шрифта',
    'id' => 'nav-col',
    'type' => 'color',
    'desc' => 'Цвет шрифта меню',
    'default' => '#444444',
));

$normalPanel->createOption( array(
    'name' => 'Выпадающее меню',
    'id' => 'nav-drop-bg',
    'type' => 'color',
    'desc' => 'Цвет фона выпадающего меню (дочерние пункты)',
    'default' => '#111111',
));

$normalPanel->createOption( array(
  'name' => 'Цвет шрифта выпадающего меню ',
  'id' => 'nav-drop-col',
  'type' => 'color',
  'desc' => 'Цвет шрифта пункта меню при наведении мыши (hover) в выпадающем (дочернем) меню',
  'default' => '#ffffff',
));

$normalPanel->createOption( array(
'name' => 'Кнопки сайта',
'type' => 'heading',
) );

$normalPanel->createOption( array(
    'name' => 'Градиент 1',
    'id' => 'btn-gradient1',
    'type' => 'color',
    'desc' => 'Фон кнопок оформлен как градиент из двух цветов. Выберите первый цвет градиента. Для создания однотонного фона, разместите одинаковый цвет в обоих полях.',
    'default' => '#339',
) );

$normalPanel->createOption( array(
    'name' => 'Градиент 2',
    'id' => 'btn-gradient2',
    'type' => 'color',
    'desc' => 'Фон кнопок оформлен как градиент из двух цветов. Выберите второй цвет градиента.',
    'default' => '#f0c',
) );

$normalPanel->createOption( array(
    'name' => 'Подвал сайта',
    'type' => 'heading',
));
 
$normalPanel->createOption( array(
    'name' => 'Цвет фона',
    'id' => 'footer-bg',
    'type' => 'color',
    'desc' => 'Цвет фона подвала',
    'default' => '#282d3c',
));
 
 $normalPanel->createOption( array(
   'name' => 'Цвет текста',
   'id' => 'footer-col',
   'type' => 'color',
   'desc' => 'Цвет шрифта текстов подвала',
   'default' => '#f9f9f9',
));

$normalPanel->createOption( array(
   'name' => 'Цвет бордюров',
   'id' => 'footer-border',
   'type' => 'color',
   'desc' => 'Цвет бордюров в виджетах подвала, а также разделителя над блоком кредитсов.',
   'default' => '#3c3e46',
));

$normalPanel->createOption( array(
  'name' => 'Мобильное меню',
  'type' => 'heading',
));

$normalPanel->createOption( array(
   'name' => 'Цвет фона',
   'id' => 'mob-nav-bg',
   'type' => 'color',
   'desc' => 'Цвет фона мобильного меню.',
   'default' => '#2b2e4a',
));

$normalPanel->createOption( array(
   'name' => 'Цвет шрифта',
   'id' => 'mob-nav-col',
   'type' => 'color',
   'desc' => 'Цвет шрифта пунктов мобильного меню.',
   'default' => '#ffffff',
));

$normalPanel->createOption( array(
  'name' => 'Декор',
  'type' => 'heading',
));

$normalPanel->createOption( array(
   'name' => 'Декоративные элементы: цвет фона',
   'id' => 'decor-bg',
   'type' => 'color',
   'desc' => 'Цвет фона различных мелких элементов сайта (постраничная навигация, "наклейки" в виджетах, иконки в поп-апе логина, фон цитаты, ярлыки разделов Рубрики и Читайте также).',
   'default' => '#7579e7',
));

$normalPanel->createOption( array(
   'name' => 'Маркеры в списках',
   'id' => 'marker-bg',
   'type' => 'color',
   'desc' => 'Цвет фона маркера (круга) в маркированных списках.',
   'default' => '#fa9579',
));

$normalPanel->createOption( array(
   'name' => 'Виджет рубрик: фон',
   'id' => 'custom-cat-wid-bg',
   'type' => 'color',
   'desc' => 'Цвет фона встроенного виджета "Список рубрик".',
'default' => '#282d3c',
));

$normalPanel->createOption( array(
   'name' => 'Виджет рубрик: бордюры',
   'id' => 'custom-cat-wid-border',
   'type' => 'color',
   'desc' => 'Цвет бордюров между пунктами встроенного виджета "Список рубрик".',
'default' => '#3c3e46',
));

$normalPanel->createOption( array(
  'type' => 'save',
));

$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Темный режим',
  'id'=> 'darkmode-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Ваши предпочтения для темной темы.',
));

$normalPanel->createOption( array(
  'name' => 'Инверсия логотипа',
  'id' => 'logo-invert',
  'type' => 'enable',
  'default' => true,
  'desc' => 'Инвертировать логотип в темном режиме, вкл / выкл',
) );

$normalPanel->createOption( array(
  'name' => 'Фильтр изображений',
  'id' => 'imgs-filter',
  'type' => 'enable',
  'default' => true,
  'desc' => 'Наложить черно-белый фильтр на изображения в темном режиме, вкл / выкл',
) );

$normalPanel->createOption( array(
   'name' => 'Фон сайта',
   'id' => 'darkmode-body-bg',
   'type' => 'color',
   'desc' => 'Цвет фона сайта в темном режиме.',
   'default' => '#111111',
));

$normalPanel->createOption( array(
   'name' => 'Фон контейнеров',
   'id' => 'darkmode-div-bg',
   'type' => 'color',
   'desc' => 'Цвет фона контенеров, в которых размещается контент.',
   'default' => '#222222',
));

$normalPanel->createOption( array(
   'name' => 'Цвет шрифта',
   'id' => 'darkmode-col',
   'type' => 'color',
   'desc' => 'Цвет шрифта.',
   'default' => '#a3a3a3',
));

$normalPanel->createOption( array(
   'name' => 'Цвет ссылок при наведении мыши',
   'id' => 'darkmode-hov',
   'type' => 'color',
   'desc' => 'Цвет ссылок в темном режиме при наведении мыши (hover).',
   'default' => '#00b096',
));

$normalPanel->createOption( array(
   'name' => 'Декор',
   'id' => 'darkmode-decor',
   'type' => 'color',
   'desc' => 'Цвет мелких элементов декора в темном режиме.',
   'default' => '#000',
));

$normalPanel->createOption( array(
    'type' => 'save',
));

}
