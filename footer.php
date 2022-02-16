<?php

// шаблон подвала

$titan = TitanFramework::getInstance( 'gpress' ); 

  // раздел Читайте также
  if ($titan->getOption( 'further-loc' ) == '1') { 
    if (is_single()) {
      get_template_part ('files/front/further-reading');
     }
   }
 ?>

<div class="footer-port">
<footer class="gp-clearfix" itemscope itemtype="http://schema.org/WPFooter">

<div class="flex-port no-margin">

<?php if ($titan->getOption( 'footer-col-loc' ) == '1') : ?>

  <div class="footer-col">
     <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-4' ); ?>
    <?php endif; ?>
  </div><!-- end footercol 1 -->

  <div class="footer-col">
     <?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-5' ); ?>
    <?php endif; ?>
  </div><!-- end footercol 2 -->

  <div class="footer-col">
    <?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-6' ); ?>
    <?php endif; ?>
  </div><!-- end footercol 3 -->

<?php endif; ?>
 
<div class="credits">
&copy; <span itemprop="copyrightYear"><?php echo date('Y'); ?></span>
<span itemprop="name"><?php bloginfo('name'); ?></span>&nbsp; &middot;  &nbsp;<span itemprop="description"><?php bloginfo('description'); ?>

<?php if ($titan->getOption( 'gpr-loc' ) ) { 
  // авторская ссылка
  echo '&nbsp; &middot; &nbsp; <a class="gpress" href="https://goodwinpress.ru" target="_blank">' . __('Тема от GoodwinPress', 'blogpost-3') . '</a>';
  }
?>

</span>

<div class="footer-text">
  <?php echo $titan->getOption( 'footer-text' ); ?>
</div> <!-- end footer-text -->

<?php
  // кнопки соц сетей в подвале
  if ($titan->getOption( 'footer-socials-loc' ) == '1') { 
    get_template_part ('files/front/social-btns');
  }
?>

<div class="anycode"><span>
<?php 
// любая статистика с кнопкой
echo $titan->getOption( 'anycode' ); 
?></span>
</div>

</div><!-- end credits -->
</div><!-- end flex port -->

</footer><!-- end footer -->
</div><!-- end  port -->

<button class="backtop" title="<?php _e('Вверх', 'blogpost-3'); ?>"></button>

<?php
  // мобильное меню
  gp_mobile_nav();
  
  if ($titan->getOption( 'login-loc' ) == '1') {
  // поп-ап логин
  get_template_part ('files/front/popup-login'); 
}
  // поп-ап поиск
  get_template_part ('files/front/popup-search'); 
?>

<div class="overlay"></div>
<div class="overlay_popup"></div>

</div><!-- end wrap-->

<?php wp_footer();  ?> 

<?php if ($titan->getOption( 'com-spoiler-loc' ) == '1') { 
// тоггл комментариев в записях и страницах
if (is_single() || is_page() ) { ?> 
  <script>
  /* <![CDATA[ */
    jQuery(document).ready(function($) {
    $('.toggle-comments').click(function(){ 
    $('.comments-box').toggleClass('open'); 
    $(this).toggleClass('opened'); 
    	return false; 
    	}); 
    }); 
  /* ]]> */
  </script>
  <?php 
  } 
} 
?>

<script>
/* <![CDATA[ */
jQuery(document).ready(function($) {
$('.gp-inp-text').click(function(){
$('#gp-form').val('<?php echo $titan->getOption( 'search-example' ); ?>');
  });
}); 
/* ]]> */
</script>
</div><!-- end site wrapper -->

</body>
</html>