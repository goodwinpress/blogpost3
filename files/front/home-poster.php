<?php 
// постер на Главной
$titan = TitanFramework::getInstance( 'gpress' ); ?>

<div class="gp-home-slider gp-home-poster gp-clearfix">
<?php

   $imageID = $titan->getOption( 'poster-img' );
   $url = $titan->getOption( 'poster-url' );
   $text = $titan->getOption( 'poster-text' );

$imageSrc = $imageID;  
if ( is_numeric( $imageID ) ) {
   $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false );
   $imageSrc = $imageAttachment[0];
}  
$attachment_url =  $imageSrc;
$image = aq_resize($attachment_url, 1920, 540, true, true, true);  

echo '<a href="' . $url . '"><img data-src="' . $image . '" alt="' . $text . '" width="1920" height="540">';

echo '<div class="slider-caption">';
echo '<span class="slider-title">' . $text . '</span>';
echo '</div>';
echo '</a>';
?>
</div><!-- end gp-home-slider / poster  -->