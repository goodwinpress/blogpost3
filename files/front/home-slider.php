<?php 
// слайдер на Главной
$titan = TitanFramework::getInstance( 'gpress' ); ?>
 
<div class="gp-home-slider gp-clearfix">
<div class="owl-carousel">
   
<div class="gp-home-slider-item">
   <?php
   $imageID = $titan->getOption( 'slider-img1' );
   $url1 = $titan->getOption( 'slider-url1' );
   $text1 = $titan->getOption( 'slider-text1' );
   
 
   $imageSrc = $imageID;  
   if ( is_numeric( $imageID ) ) {
      $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false );
      $imageSrc = $imageAttachment[0];
   }  
   $attachment_url =  $imageSrc;
   $image = aq_resize($attachment_url, 1920, 540, true, true, true);  
 
   echo '<a href="' . $url1 . '"><img data-src="' . $image . '" alt="' . $text1 . '" class="owl-lazy">';
   
   echo '<div class="slider-caption">';
   echo '<span class="slider-title">' . $text1 . '</span>';
   echo '</div>';
   echo '</a>';
   ?>
</div>

 <div class="gp-home-slider-item">
      <?php
      $imageID = $titan->getOption( 'slider-img2' );
      $url2 = $titan->getOption( 'slider-url2' );
      $text2 = $titan->getOption( 'slider-text2' );
      
    
      $imageSrc = $imageID;  
      if ( is_numeric( $imageID ) ) {
         $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false );
         $imageSrc = $imageAttachment[0];
      }  
      $attachment_url =  $imageSrc;
      $image = aq_resize($attachment_url, 1920, 540, true, true, true);  
    
      echo '<a href="' . $url2 . '"><img data-src="' . $image . '" alt="' . $text2 . '" class="owl-lazy">';
      
      echo '<div class="slider-caption">';
      echo '<span class="slider-title">' . $text2 . '</span>';
      echo '</div>';
      echo '</a>';
      ?>
   </div> 

<?php if ($titan->getOption( 'slide3-loc' ) == '1') : ?>
   <div class="gp-home-slider-item">
      <?php
      $imageID = $titan->getOption( 'slider-img3' );
      $url3 = $titan->getOption( 'slider-url3' );
      $text3 = $titan->getOption( 'slider-text3' );
      
    
      $imageSrc = $imageID;  
      if ( is_numeric( $imageID ) ) {
         $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false );
         $imageSrc = $imageAttachment[0];
      }  
      $attachment_url =  $imageSrc;
      $image = aq_resize($attachment_url, 1920, 540, true, true, true);  
    
      echo '<a href="' . $url3 . '"><img data-src="' . $image . '" alt="' . $text3 . '" class="owl-lazy">';
      
      echo '<div class="slider-caption">';
      echo '<span class="slider-title">' . $text3 . '</span>';
      echo '</div>';
      echo '</a>';
      ?>
</div>  
 <?php endif; ?>
   
</div><!-- end owl-slider -->
</div><!-- end gp-home-slider -->