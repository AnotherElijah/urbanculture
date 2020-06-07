<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ftagementor
 */

?>

  </div><!-- #content -->

  <?php 
  /** 
  * Enable footer
  */
  $ftagementor_opt = ftagementor_get_opt();

  $page_enable_footer = get_post_meta( get_the_id(), '_ftagementor_footer_enable' );
  $enable_footer = isset($ftagementor_opt['ftagementor_footer_enable']) ? $ftagementor_opt['ftagementor_footer_enable'] : '';

  /**
  * Load footer
  */
  if ( !empty( $page_enable_footer[0] ) && '' != $page_enable_footer[0] ) {
    if ( 'yes' == $page_enable_footer[0] ) {
      ftagementor_panel_view('select_footer_style_type', 'select_footer_style_type', 'custom', 'footer');
    }elseif( 'default' == $page_enable_footer[0] ){
      if( isset( $enable_footer ) && '' !== $enable_footer ) {
        if ( '0' !== $enable_footer ) {
          ftagementor_panel_view('select_footer_style_type', 'select_footer_style_type', 'custom', 'footer');
        }
      }
    }else{
      // empty
    }
  }elseif( isset( $enable_footer ) && '' !== $enable_footer ) {
    if ( '0' !== $enable_footer ) {
      ftagementor_panel_view('select_footer_style_type', 'select_footer_style_type', 'custom', 'footer');
    } 
  } else {
    get_template_part( 'inc/footer/default' );
  }

  /**
  * Back To Top
  */
  if ( isset( $ftagementor_opt['ftagementor_scroll_to_top_enable'] ) && $ftagementor_opt['ftagementor_scroll_to_top_enable'] == 'yes' ) {
    echo'<div id="back-to-top"><i class="fa fa-angle-up"></i></div> ';
  }
  
   ?>

</div><!-- #page -->
</div>

<?php wp_footer(); ?>
<!--set black-bg class for menu, if there is @cl trigger-->
<script type="text/javascript">
  /*Optional BG for header*/
  var changebg = cl => {
    /*cl - trigger for header background changing*/
      if(document.querySelector(cl)){
        document.querySelector(".header-default.main-header.clearfix").classList.add('black-bg');
      /*logo to 100px*/ document.querySelector(".site-title img").style.height = "78px";
      }
  };
  document.addEventListener("DOMContentLoaded", changebg(".dark-bg"));
</script>
</body>
</html>