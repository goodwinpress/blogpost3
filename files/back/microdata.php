<?php 
// микроразметка schema 
$titan = TitanFramework::getInstance( 'gpress' ); ?>

<meta itemprop="headline" content="<?php the_title(); ?>">
<meta itemprop="author" content="<?php bloginfo('name'); ?>">
<meta itemprop="datePublished" content="<?php the_time( 'c' ); ?>">
<meta itemprop="dateModified" content="<?php the_time('Y-m-d')?>">
<link itemscope itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" href="<?php echo get_permalink(); ?>">
<?php if(has_post_thumbnail()):  
    $thumb = get_post_thumbnail_id();
    $img_url = wp_get_attachment_url( $thumb,'full' );  
    echo '<meta itemprop="image" content=" '.$img_url. '">';
endif; 
?>
 
<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
<div itemprop="logo" itemscope  itemtype="https://schema.org/ImageObject">
<?php $imageID = $titan->getOption( 'favicon' );$imageSrc = $imageID;  
    if ( is_numeric( $imageID ) ) { 
    $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
    $imageSrc = $imageAttachment[0];
} ?>
<link itemprop="url image" href="<?php echo esc_url( $imageSrc ); ?>">
<meta itemprop="width" content="100">
<meta itemprop="height" content="100">
</div>
<meta itemprop="name" content="<?php bloginfo('name'); ?>">
<meta itemprop="telephone" content="<?php echo $titan->getOption( 'mirco-tel' ); ?>">
<meta itemprop="address" content="<?php echo $titan->getOption( 'mirco-city' ); ?>">	
</div>
 