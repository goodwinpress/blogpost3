<?php
get_header(); ?>

<div class="gp-container gp-clearfix">
<div class="port gp-clearfix">
 
  <main>
    <?php woocommerce_content(); ?>
  </main>

  <?php
    get_sidebar('page');
  ?>

</div><!-- end port -->
</div><!-- end gp container -->

<?php get_footer(); ?>