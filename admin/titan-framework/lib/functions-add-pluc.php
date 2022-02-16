<?php
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://update.goodwinpress.ru/blogpost3.json',
	get_template_directory() . '/functions.php',
	'blogpost-3'
);