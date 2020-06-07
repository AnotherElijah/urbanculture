<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package ftagementor
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses ftagementor_header_style()
 */
add_action( 'after_setup_theme', 'ftagementor_custom_header_setup' );
function ftagementor_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ftagementor_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'ftagementor_header_style',
	) ) );
}

add_action( 'wp_enqueue_scripts', 'ftagementor_header_style' );
if ( ! function_exists( 'ftagementor_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see ftagementor_custom_header_setup().
 */
function ftagementor_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	$css = '';

	if ( ! display_header_text() ) :
		$css .= '.site-title,.site-description {position: absolute;clip: rect(1px, 1px, 1px, 1px);}';

	else :

		$css .= '.site-title a,.site-description { color: #'. esc_attr( $header_text_color) .'}';

	endif;

	wp_add_inline_style( 'ftagementor-style', $css );
}
endif;
