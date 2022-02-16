<?php
// поп ап поиска
$titan = TitanFramework::getInstance( 'gpress' ); ?>
<div class="popup" id="popup1">

<?php 
$search_term = $titan->getOption( 'search-example' ); 
?>
	  
 <span class="pop-title"><?php _e('Что будем искать?', 'blogpost-3'); ?> </span>
<?php
	echo  '<form role="search" method="get" id="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<input type="text" id ="gp-form" class="s" name="s"  value="' . get_search_query() . '">
			<input type="submit" class="searchSubmit" value="'. esc_attr__('Найти', 'blogpost-3') .'" />
			</form>';
 ?>

<p><?php _e( 'Например', 'blogpost-3' ); ?>, <span class="gp-inp-text"><?php echo $search_term; ?></span></p>
<button class="close"></button>
</div><!-- end popup 1 -->