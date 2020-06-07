<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ftagementor
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <div id="wptime-plugin-preloader"></div>

<?php ftagementor_action('after_body');

  $ftagementor_opt = ftagementor_get_opt();

  $ftagementor_page_layout_width = ( get_post_meta( get_the_id(), '_ftagementor_layout_width', true ) ) ? get_post_meta( get_the_id(), '_ftagementor_layout_width', true  ) : '' ;

  $ftagementor_layout_width = ( isset( $ftagementor_opt['ftagementor_layout_width'] ) ) ? $ftagementor_opt['ftagementor_layout_width'] : '' ;

  if ( '' != $ftagementor_page_layout_width && 'default' !== $ftagementor_page_layout_width ) {
    if ( 'boxed' == $ftagementor_page_layout_width ) {
      $ftagementor_layout_width_value = 'boxed-layout';
    } else {
      $ftagementor_layout_width_value = 'wide-layout';
    }
    
  } else {
    if ( '' != $ftagementor_layout_width && 'boxed-layout' == $ftagementor_layout_width ) {
      $ftagementor_layout_width_value = 'boxed-layout';
    } else {
      $ftagementor_layout_width_value = 'wide-layout';
    }
    
  } ?>

  <div id="page" class="site site-wrapper <?php echo esc_attr( $ftagementor_layout_width_value ); ?>">
    <div id="ftagementor">
      <?php
        $ftagementor_opt = ftagementor_get_opt();

        /**
        * Enable Header Top bar
        */
        $header_topbar_enable = '';
        $page_enable_topbar = get_post_meta( get_the_id(), '_ftagementor_enable_topbar', true );
        $enable_topbar =  isset($ftagementor_opt['ftagementor_header_show']) ? $ftagementor_opt['ftagementor_header_show'] : '' == true ? 'yes' : 'no' ;
        
        if ( !empty( $page_enable_topbar ) ) {

          if ( 'default' == $page_enable_topbar ) {

            $header_topbar_enable = $enable_topbar;

          } elseif( 'yes' == $page_enable_topbar ) {

            $header_topbar_enable = $page_enable_topbar;

          } else {

            $header_topbar_enable = $page_enable_topbar;

          }
        } else {

          if ( isset( $enable_topbar ) ) {

            $header_topbar_enable = $enable_topbar;

          }

        }
        /**
        * Load Header Top bar
        */
        if ( 'no' != $header_topbar_enable ) {
          get_template_part('/inc/header/header-top-bar');
        }

        /** 
        * Enable header
        */
        $page_enable_header = get_post_meta( get_the_id(), '_ftagementor_enable_header' );
        $page_select_header_style_type = get_post_meta( get_the_id(), '_ftagementor_select_header_style_type',true );
        $header_default_layout_style = get_post_meta( get_the_id(), '_ftagementor_header_default_layout_style',true );
        $enable_header = ( isset( $ftagementor_opt['ftagementor_enable_header'] ) ) ? $ftagementor_opt['ftagementor_enable_header'] : '';
        $header_default_style = ( isset($ftagementor_opt['ftagementor_select_header_style_type']) ) ? $ftagementor_opt['ftagementor_select_header_style_type'] : '';
        $header_default_template = ( isset($ftagementor_opt['ftagementor_header_default_style']) ) ? $ftagementor_opt['ftagementor_header_default_style'] : '';

        /**
        * Load Header
        */
        if ( !empty( $page_enable_header[0] ) && '' != $page_enable_header[0] ) {
          
          if ( 'yes' == $page_enable_header[0] ) {
            /**
            * Enable Header condition 'yes' --> page
            */
            if ( 'default' == $page_select_header_style_type ) {
              /**
              * Header Type 'default' --> page
              */
              if ('style_2' == $header_default_layout_style ) {
                get_template_part( 'inc/header/header-2' );
              } elseif ('style_3' == $header_default_layout_style ) {
                get_template_part( 'inc/header/header-3' );
              } else{
                get_template_part( 'inc/header/default' );
              }
            } else {
              /**
              * Header Type 'custom' --> page
              */
              ftagementor_panel_view('select_header_style_type', 'select_header_style_type', 'custom', 'header');
            }

          } elseif( 'default' == $page_enable_header[0] ){
            /**
            * Enable Header condition 'default' --> page
            */
            if( isset( $enable_header ) && '' !== $enable_header ) {

              if ( '0' !== $enable_header ) {

                if ( 'default' == $header_default_style ) {
                  /**
                  * Header Type 'default' --> theme
                  */
                  if ( 'style_2' == $header_default_template ) {
                    get_template_part( 'inc/header/header-2' );
                  } elseif ('style_3' == $header_default_template) {
                    get_template_part( 'inc/header/header-3' );
                  } else {
                    get_template_part( 'inc/header/default' );
                  }
                } else {
                  /**
                  * Header Type 'custom' --> theme
                  */
                  ftagementor_panel_view('select_header_style_type', 'select_header_style_type', 'custom', 'header');

                }
              }
            }

          } else {
            /**
            * Enable Header condition 'no' --> page
            */
            // return empty
          }
        } elseif( isset( $enable_header ) && '' !== $enable_header ) {
          /**
          * Enable or disable the header area --> theme
          */
          if ( '0' !== $enable_header ) {
            /**
            * Header area not disable --> theme
            */
            if ( 'default' == $header_default_style ) {
              /**
              * Header Type 'default' --> theme
              */
              if ( 'style_2' == $header_default_template ) {
                get_template_part( 'inc/header/header-2' );
              } elseif ('style_3' == $header_default_template) {
                get_template_part( 'inc/header/header-3' );
              } else {
                get_template_part( 'inc/header/default' );
              }
            } else {
              /**
              * Header Type 'custom' --> theme
              */
              ftagementor_panel_view('select_header_style_type', 'select_header_style_type', 'custom', 'header');
            }
          } 

        } else {
          /**
          * Default --> without redux/metabox
          */
          get_template_part( 'inc/header/default' );

        }
        
        /** 
        * Enable Page Title
        */
        get_template_part('/inc/page-header/header-page-title');
        
        
      ?>

    <div id="content" class="site-content">