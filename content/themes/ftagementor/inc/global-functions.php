<?php 
 /**
 * Ftage Global Function
 *
 * @package ftagementor
 */

/**
* Blog Header
*/
function ftagementor_blog_header(){ 
	$ftagementor_opt = ftagementor_get_opt();

	if ( isset( $ftagementor_opt['ftagementor_blog_text'] ) && !empty( $ftagementor_opt['ftagementor_blog_text'] ) ){
		echo esc_html( $ftagementor_opt['ftagementor_blog_text'] );
	}
	else{
		echo esc_html__('Blog', 'ftagementor');
	}
}

/**
* Single Blog Header
*/
function ftagementor_blog_details_header(){ 
	$ftagementor_opt = ftagementor_get_opt();
    
    if ( isset( $ftagementor_opt['ftagementor_blog_details_text'] ) ){
        if(get_post_type() == 'post'){
            echo '<h1 class="page-title">'. esc_html( $ftagementor_opt['ftagementor_blog_details_text'] ) . '</h1>';
        } else {
            echo '<h1 class="page-title">'. esc_html(ucfirst(get_post_type())) . esc_html__(' Details', 'ftagementor') .'</h1>';
        }
    }
}

/**
* Register Post Excerpt Function
*/
function ftagementor_post_excerpt() {
	$ftagementor_opt = ftagementor_get_opt();
	if(has_excerpt()){
		the_excerpt();
	} elseif ( isset ( $ftagementor_opt['ftagementor_excerpt_length'] ) ) {
		echo wp_kses_post(wpautop(wp_trim_words( get_the_content(), $ftagementor_opt['ftagementor_excerpt_length'], '' )));
	} else {
		echo wp_kses_post(wpautop(wp_trim_words( get_the_content(), 29, '' )));
	}
}

/**
* Register Blog Read More Button Text Function
*/
function ftagementor_read_more(){
	$ftagementor_opt = ftagementor_get_opt();
	$read_more_btn_content = ( isset( $ftagementor_opt['ftagementor_readmore_text'] ) ) ? $ftagementor_opt['ftagementor_readmore_text'] : esc_html__('Read More', 'ftagementor') ;
	echo esc_html( $read_more_btn_content );
}
	
/**
* Panel View
*/
if ( !function_exists('ftagementor_panel_view')) :
function ftagementor_panel_view( $to_id, $po_id, $set_value, $path = null ){
	$ftagementor_opt = ftagementor_get_opt();
	// Select header style type
	$ftagementor_theme_panel_id = $ftagementor_opt['f_'.$to_id.''];
	$ftagementor_page_panel_id = get_post_meta(get_the_id(),'_ftagementor_'.$po_id.'',true);

	if ( !empty( $ftagementor_page_panel_id ) ) {

		if ( $set_value == $ftagementor_page_panel_id ) {

			get_template_part( 'inc/'.$path.'/page-option-custom' );

			return;

		} else {

			get_template_part( 'inc/'.$path.'/default' );

			return;

		}

	} else {
		
		if ( isset( $ftagementor_theme_panel_id ) ) {

			if ( 'custom' == $ftagementor_theme_panel_id ) {

				get_template_part( 'inc/'.$path.'/theme-option-custom' );

				return;

			} else {

				get_template_part( 'inc/'.$path.'/default' );

				return;
			}
		}
	} 
} // End Options View
endif;

/**
* Start Get Theme Options
*/
if ( !function_exists('ftagementor_get_theme_option')) :
						    
    function ftagementor_get_theme_option($index = FALSE, $index2 = FALSE, $default = NULL) {
        $ftagementor_opt = ftagementor_get_opt();

        if (empty($index)) {
            return $ftagementor_opt;
        }

        if ($index2) {
            $result = (isset($ftagementor_opt[ $index ]) and isset($ftagementor_opt[ $index ][ $index2 ])) ? $ftagementor_opt[ $index ][ $index2 ] : $default;
        } else {
            $result = isset($ftagementor_opt[ $index ]) ? $ftagementor_opt[ $index ] : $default;
        }

        if ($result == '1' or $result == '0') {
            return $result;
        }

        if (is_string($result) and empty($result)) {
            return $default;
        }

        return $result;
    }

endif;

/**
* Do Action prefix and condition
*/
if( ! function_exists( 'ftagementor_action' ) ) :
	function ftagementor_action() {

		$args   = func_get_args();

		if( !isset( $args[0] ) || empty( $args[0] ) ) {
			return;
		}

		$action = 'ftagementor_' . $args[0];
		unset( $args[0] );

		do_action_ref_array( $action, $args );
	}
endif;

/**
* Preloader
*/
add_action( 'ftagementor_after_body', 'ftagementor_preloader' );
function ftagementor_preloader() {

	$ftagementor_opt = ftagementor_get_opt();
	$enable_preloader = ( isset( $ftagementor_opt['ftagementor_preloader_enable'] ) ) ? $ftagementor_opt['ftagementor_preloader_enable'] : '' ;
	$preloader_style = ( isset( $ftagementor_opt['ftagementor_preloader_style'] ) ) ? $ftagementor_opt['ftagementor_preloader_style'] : '' ;

	if( '' == $enable_preloader || 'no' === $enable_preloader ) {
		return;
	}
	
	if( 'style2' === $preloader_style ){
		get_template_part( 'inc/preloader/style2' );	
		return;
	} else {
		get_template_part( 'inc/preloader/default' );
	}


}

/**
* Maintenance Mode
*/
add_action( 'template_include', 'ftagementor_maintenance_mode', 1 );

function ftagementor_maintenance_mode( $template ) {
	$ftagementor_opt = ftagementor_get_opt();
	
	if ( ! class_exists( 'ReduxFramework' ) ) {
		return $template;
	}

	$enable = ( isset( $ftagementor_opt['ftagementor_maintenance_mode_enable'] ) ) ? $ftagementor_opt['ftagementor_maintenance_mode_enable'] : 'off' ;

	$enable = isset( $_GET['emm'] ) ? '1' : $enable;

	if ( is_user_logged_in() || 'off' === $enable ) {
		return $template;
	}

	$maintenance_mode = true;

	if( !$maintenance_mode ) {
		return $template;
	}

	$new_template = locate_template( array( 'page-maintenance.php' ) );

	if ( '' != $new_template ) {
		return $new_template;
	}

	return $template;

}