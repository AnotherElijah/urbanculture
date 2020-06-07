<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ftagementor
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

/**
* Layout options
*/
function ftagementor_body_classes( $classes ) {
	$ftagementor_opt = ftagementor_get_opt();

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$ftagementor_page_layout_width = ( get_post_meta( get_the_id(), '_ftagementor_layout_width', true ) ) ? get_post_meta( get_the_id(), '_ftagementor_layout_width', true  ) : '' ;

	$ftagementor_layout_width = ( isset( $ftagementor_opt['ftagementor_layout_width'] ) ) ? $ftagementor_opt['ftagementor_layout_width'] : '' ;


	if ( '' != $ftagementor_page_layout_width && 'default' !== $ftagementor_page_layout_width ) {
		if ( 'boxed' == $ftagementor_page_layout_width ) {
			$classes[] = 'boxed-layout-active';
		} else {
			$classes[] = 'wide-layout-active';
		}
		
	} else {
		if ( '' != $ftagementor_layout_width && 'boxed-layout' == $ftagementor_layout_width ) {
			$classes[] = 'boxed-layout-active';
		} else {
			$classes[] = 'wide-layout-active';
		}
		
	}

	// Header layout classes
	if (isset($ftagementor_opt['ftagementor_header_default_style']) ? $ftagementor_opt['ftagementor_header_default_style'] : '' == '1') {
	 	$classes[] = 'header-default-style-one';
	}


	return $classes;
}
add_filter( 'body_class', 'ftagementor_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ftagementor_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ftagementor_pingback_header' );