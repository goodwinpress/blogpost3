<?php 
// выводим фавикон, установленный в консоли темы
$titan = TitanFramework::getInstance( 'gpress' );

$imageID = $titan->getOption( 'favicon' );
$imageSrc = $imageID;  
	if ( is_numeric( $imageID ) ) {
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false );
		$imageSrc = $imageAttachment[0];
	}
echo '<link href="' .esc_url( $imageSrc ). '" rel="icon" type="image/png">';
?>