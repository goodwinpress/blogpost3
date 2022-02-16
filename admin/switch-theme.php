<?php
// переключаем тему, если неправильный адрес
function gp_switch_theme() {
	  switch_theme( WP_DEFAULT_THEME );
	  unset( $_GET['activated'] );
	  add_action( 'admin_notices', 'gp_upgrade_notice' );
}
add_action( 'after_switch_theme', 'gp_switch_theme' );

function gp_upgrade_notice () {
 	global $output, $volume;
 	echo '<div class="error"><h2>Тема BLOGPOST 3 не может быть активирована на данном сайте.</h2><p style="font-size:15px">Причина: адрес <strong>' . $output . '</strong> не совпадает с адресами, которые указали при покупке:</p>';
	echo '<ol style="font-size:15px">';
	   foreach( $volume as $site  ) {
		 echo "<li>$site</li>";
	  }
	echo '</ol>';
	echo ' <p style="font-size:15px">Вы можете установить тему только на те сайты, которые есть в вашей лицензии.</p><p style="font-size:15px">Что делать: используйте тему на указанных сайтах, либо  <a href="https://www.goodwinpress.ru/contact/?utm_source=invalid&utm_medium=blogpost3&utm_campaign=license" target="_blank">напишите в техподдержку</a>, чтобы добавить <strong>' . $output . '</strong> к вашей лицензии.</p></div>';
}

function gp_customize() {
	 wp_die( sprintf( 'Тема BLOGPOST 3 не может быть активирована на данном сайте, поскольку его адрес отсутствует в лицензии.<br /><br />  Обратитесь в техподдержку.' ), '', array(
		'back_link' => true,
	 ) );
}
add_action( 'load-customize.php', 'gp_customize' );

function gp_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( 'Тема BLOGPOST 3 не может быть активирована на данном сайте, поскольку его адрес отсутствует в лицензии.<br /><br />  Обратитесь в техподдержку.') );
	}
}
add_action( 'template_redirect', 'gp_preview' );

return;
