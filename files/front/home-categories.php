<?php
// блок рубрик на Главной
$titan = TitanFramework::getInstance( 'gpress' ); ?>

 <div class="home-cat-grid flex-port no-margin">
	 <span class="block-name"><?php _e( 'Рубрики', 'blogpost-3' ); ?></span>

	<?php 
	$cat1 = $titan->getOption( 'select-cat1' );  
	if ( ! empty( $cat1 ) ) {
	$cat_title = cat_id_to_name($cat1); 
	$imageID = $titan->getOption( 'select-cat1-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	}
 	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat1). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 1 -->';
	}
 
  
	$cat2 = $titan->getOption( 'select-cat2' );  
	if ( ! empty( $cat2 ) ) {
	$cat_title = cat_id_to_name($cat2); 
	$imageID = $titan->getOption( 'select-cat2-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	}
	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat2). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 2 -->';
	}


	$cat3 = $titan->getOption( 'select-cat3' ); 
	if ( ! empty( $cat3 ) ) {
	$cat_title = cat_id_to_name($cat3); 
	$imageID = $titan->getOption( 'select-cat3-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	} 
	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat3). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 3 -->';
	}

	
	$cat4 = $titan->getOption( 'select-cat4' ); 
	if ( ! empty( $cat4 ) ) {
	$cat_title = cat_id_to_name($cat4); 
	$imageID = $titan->getOption( 'select-cat4-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	}
	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat4). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 4 -->';
	}


	$cat5 = $titan->getOption( 'select-cat5' ); 
	if ( ! empty( $cat5 ) ) {
	$cat_title = cat_id_to_name($cat5); 
	$imageID = $titan->getOption( 'select-cat5-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	}
	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat5). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 5 -->';
	}

	
	$cat6 = $titan->getOption( 'select-cat6' ); 
	if ( ! empty( $cat6 ) ) {
	$cat_title = cat_id_to_name($cat6); 
	$imageID = $titan->getOption( 'select-cat6-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	}
	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat6). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 6 -->';
	}

	
	$cat7 = $titan->getOption( 'select-cat7' ); 
	if ( ! empty( $cat7 ) ) {
	$cat_title = cat_id_to_name($cat7); 
	$imageID = $titan->getOption( 'select-cat7-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	}
	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat7). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 7 -->';
	}


	$cat8 = $titan->getOption( 'select-cat8' ); 
	if ( ! empty( $cat8 ) ) {
	$cat_title = cat_id_to_name($cat8); 
	$imageID = $titan->getOption( 'select-cat8-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	}
	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat8). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 8 -->';
	}


	$cat9 = $titan->getOption( 'select-cat9' ); 
	if ( ! empty( $cat9 ) ) {
	$cat_title = cat_id_to_name($cat9); 
	$imageID = $titan->getOption( 'select-cat9-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	}
	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat9). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 9 -->';
	}
	
	$cat10 = $titan->getOption( 'select-cat10' ); 
	if ( ! empty( $cat10 ) ) {
	$cat_title = cat_id_to_name($cat10); 
	$imageID = $titan->getOption( 'select-cat10-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	}
	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat10). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 10 -->';
	}
	
	$cat11 = $titan->getOption( 'select-cat11' ); 
	if ( ! empty( $cat11 ) ) {
	$cat_title = cat_id_to_name($cat11); 
	$imageID = $titan->getOption( 'select-cat11-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	}
	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat11). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 11 -->';
	}
	
	$cat12 = $titan->getOption( 'select-cat12' ); 
	if ( ! empty( $cat12 ) ) {
	$cat_title = cat_id_to_name($cat12); 
	$imageID = $titan->getOption( 'select-cat12-img' );
	$imageSrc = $imageID; 
	if ( is_numeric( $imageID ) ) { 
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
		$imageSrc = $imageAttachment[0];
	}
	echo '<div class="home-cat-item">';
	echo '<a href="' .get_category_link($cat12). '">';
	echo '<div class="home-cat-item-wrapper" data-bg="'. esc_url( $imageSrc ).'">';
	echo '<span class="home-cat-item-caption">' . $cat_title . '</span></div></a> ';
	echo '</div><!-- home-cat-item 12 -->';
	}
	
	// fix для justify-content:space-between
	echo '<div class="home-cat-item flex-align-fix"></div>';
	
	?>
</div><!-- end flex port -->