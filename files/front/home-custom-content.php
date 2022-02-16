<?php
// блок для произвольного контента на Главной
$titan = TitanFramework::getInstance( 'gpress' );

echo '<div class="port gp-clearfix">';
echo '<div class="gp-custom-content post-content gp-clearfix">';
$custom = $titan->getOption('custom-content'); 
echo do_shortcode( $custom );
echo '</div>';
echo '</div>';
?>