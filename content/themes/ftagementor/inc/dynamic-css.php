<?php 
/**
 * Add custom style from theme option and meta box 
 */
if( !function_exists( 'ftagementor_styles_method' ) ) {
function ftagementor_styles_method() {

	$ftagementor_opt = ftagementor_get_opt();

    /**
    * Menu Typography 
    */
	$ftagementor_menu_typography = isset($ftagementor_opt['ftagementor_menufont']) ? $ftagementor_opt['ftagementor_menufont'] : '';
	$font_family = $font_weight = $text_transform = $font_style = $font_size = $line_height = $letter_spacing = '';
	if ( isset( $ftagementor_menu_typography ) ) {
		$font_family = ( isset( $ftagementor_menu_typography['font-family'] ) ) ? $ftagementor_menu_typography['font-family'] : '' ;
		$font_weight = ( isset( $ftagementor_menu_typography['font-weight'] ) ) ? $ftagementor_menu_typography['font-weight'] : '' ;
		$text_transform = ( isset( $ftagementor_menu_typography['text-transform'] ) ) ? $ftagementor_menu_typography['text-transform'] : '' ;
		$font_style = ( isset( $ftagementor_menu_typography['font-style'] ) ) ? $ftagementor_menu_typography['font-style'] : '' ;
		$font_size = ( isset( $ftagementor_menu_typography['font-size'] ) ) ? $ftagementor_menu_typography['font-size'] : '' ;
		$line_height = ( isset( $ftagementor_menu_typography['line-height'] ) ) ? $ftagementor_menu_typography['line-height'] : '' ;
		$letter_spacing = ( isset( $ftagementor_menu_typography['letter-spacing'] ) ) ? $ftagementor_menu_typography['letter-spacing'] : '' ;
	}

	$pnmff = $pnmfw = $pnmtt = $pnmfs = $pnmfsz = $pnmlh = $pnmls = '';
	if ( $font_family ) {
		$pnmff = '.primary-nav-wrap.default-menu nav ul li a{
			font-family:'.$font_family.';
		}';
	}

	if ( $font_weight ) {
		$pnmfw = '.primary-nav-wrap.default-menu nav ul li a{
			font-weight:'.$font_weight.';
		}';
	}

	if ( $text_transform ) {
		$pnmtt = '.primary-nav-wrap.default-menu nav ul li a{
			text-transform:'.$text_transform.';
		}';
	}

	if ( $font_style ) {
		$pnmfs = '.primary-nav-wrap.default-menu nav ul li a{
			font-style:'.$font_style.';
		}';
	}

	if ( $font_size ) {
		$pnmfsz = '.primary-nav-wrap.default-menu nav ul li a{
			font-size:'.$font_size.'; 
		}';
	}

	if ( $line_height ) {
		$pnmlh = '.primary-nav-wrap.default-menu nav ul li a{
			line-height:'.$line_height.'; 
		}';
	}

	if ( $letter_spacing ) {
		$pnmls = '.primary-nav-wrap.default-menu nav ul li a{
			letter-spacing:'.$letter_spacing.'; 
		}';
	}

	/**
	* Page title color
	*/
	$page_title_color = get_post_meta( get_the_ID(),'_ftagementor_page_title_color',true );
	/**
	* Page Title 
	*/
	$ftagementor_page_title_typography = get_post_meta( get_the_id(), '_ftagementor_title_typography', true );
	$ftagementor_theme_title_typography = isset($ftagementor_opt['ftagementor_title_typography']) ? $ftagementor_opt['ftagementor_title_typography'] : '';
	
	/**
	* Start page Title
	*/
	$ptp_font_family = $ptp_font_weight = $ptp_text_transform = $ptp_font_style = $ptp_font_size = $ptp_line_height = $ptp_letter_spacing = $ptp_font_color = $ptt_font_family = $ptt_font_weight = $ptt_text_transform = $ptt_font_style = $ptt_font_size = $ptt_line_height = $ptt_letter_spacing = $ptt_font_color = '';
	
	if ( !empty( $ftagementor_page_title_typography ) ) {
		$ptp_font_family = $ftagementor_page_title_typography['font-family'];
		$ptp_font_weight = $ftagementor_page_title_typography['font-weight'];
		$ptp_text_transform = $ftagementor_page_title_typography['text-transform'];
		$ptp_font_style = $ftagementor_page_title_typography['font-style'];
		$ptp_font_size = $ftagementor_page_title_typography['font-size'];
		$ptp_line_height = $ftagementor_page_title_typography['line-height'];
		$ptp_letter_spacing = $ftagementor_page_title_typography['letter-spacing'];
		$ptp_font_color = $ftagementor_page_title_typography['font-color'];
	}

	if ( isset( $ftagementor_theme_title_typography ) ) {
		$ptt_font_family = ( isset( $ftagementor_theme_title_typography['font-family'] ) ) ? $ftagementor_theme_title_typography['font-family'] : '' ;
		$ptt_font_weight = ( isset( $ftagementor_theme_title_typography['font-weight'] ) ) ? $ftagementor_theme_title_typography['font-weight'] : '' ;
		$ptt_text_transform = ( isset( $ftagementor_theme_title_typography['text-transform'] ) ) ? $ftagementor_theme_title_typography['text-transform'] : '' ;
		$ptt_font_style = ( isset( $ftagementor_theme_title_typography['font-style'] ) ) ? $ftagementor_theme_title_typography['font-style'] : '' ;
		$ptt_font_size = ( isset( $ftagementor_theme_title_typography['font-size'] ) ) ? $ftagementor_theme_title_typography['font-size'] : '' ;
		$ptt_line_height = ( isset( $ftagementor_theme_title_typography['line-height'] ) ) ? $ftagementor_theme_title_typography['line-height'] : '' ;
		$ptt_letter_spacing = ( isset( $ftagementor_theme_title_typography['letter-spacing'] ) ) ? $ftagementor_theme_title_typography['letter-spacing'] : '' ;
		$ptt_font_color = ( isset( $ftagementor_theme_title_typography['color'] ) ) ? $ftagementor_theme_title_typography['color'] : '' ;
	}

	
	$ptff = $ptfw = $pttt = $ptfs = $ptfsz = $ptlh = $ptls = $ptcl = '';
	if ( $ptp_font_family ) {
		$ptff = '.page__title__inner .page-title, .page__title__inner h1{
			font-family:'.$ptp_font_family.';
		}';
	} else {
		if ( $ptt_font_family ) {
			$ptff = '.page__title__inner .page-title, .page__title__inner h1{
				font-family:'.$ptt_font_family.';
			}';
		}
	}
	if ( $ptp_font_weight ) {
		$ptfw = '.page__title__inner .page-title, .page__title__inner h1{
			font-weight:'.$ptp_font_weight.';
		}';
	} else {
		if ( $ptt_font_weight ) {
			$ptfw = '.page__title__inner .page-title, .page__title__inner h1{
				font-weight:'.$ptt_font_weight.';
			}';
		}
	}
	if ( $ptp_text_transform ) {
		$pttt = '.page__title__inner .page-title, .page__title__inner h1{
			text-transform:'.$ptp_text_transform.';
		}';
	} else {
		if ( $ptt_text_transform ) {
			$pttt = '.page__title__inner .page-title, .page__title__inner h1{
				text-transform:'.$ptt_text_transform.';
			}';
		}
	}
	if ( $ptp_font_style ) {
		$ptfs = '.page__title__inner .page-title, .page__title__inner h1{
			font-style:'.$ptp_font_style.';
		}';
	} else {
		if ( $ptt_font_style ) {
			$ptfs = '.page__title__inner .page-title, .page__title__inner h1{
				font-style:'.$ptt_font_style.';
			}';
		}
	}
	if ( $ptp_font_size ) {
		$ptfsz = '.page__title__inner .page-title, .page__title__inner h1{
			font-size:'.$ptp_font_size.'px; 
		}';
	} else {
		if ( $ptt_font_size ) {
			$ptfsz = '.page__title__inner .page-title, .page__title__inner h1{
				font-size:'.$ptt_font_size.'; 
			}';
		}
	}
	if ( $ptp_line_height ) {
		$ptlh = '.page__title__inner .page-title, .page__title__inner h1{
			line-height:'.$ptp_line_height.'px; 
		}';
	} else {
		if ( $ptt_line_height ) {
			$ptlh = '.page__title__inner .page-title, .page__title__inner h1{
				line-height:'.$ptt_line_height.'; 
			}';
		}
	}
	if ( $ptp_letter_spacing ) {
		$ptls = '.page__title__inner .page-title, .page__title__inner h1{
			line-height:'.$ptp_letter_spacing.'px; 
		}';
	} else {
		if ( $ptt_letter_spacing ) {
			$ptls = '.page__title__inner .page-title, .page__title__inner h1{
				letter-spacing:'.$ptt_letter_spacing.'; 
			}';
		}
	}
	if ( $ptp_font_color ) {
		$ptcl = '.page__title__inner .page-title, .page__title__inner h1{
			color: '.$ptp_font_color.'; 
		}';
	} else {
		if ( $ptt_font_color ) {
			$ptcl = '.page__title__inner .page-title, .page__title__inner h1{
				color: '.$ptt_font_color.'; 
			}';
		}
	}
	/**
	* End page Title
	*/

	/**
	* Start Sub Title
	*/
	$ftagementor_page_sub_title_typography = get_post_meta( get_the_id(), '_ftagementor_sub_title_typography', true );
	$ftagementor_theme_sub_title_typography = isset($ftagementor_opt['ftagementor_sub_title_typography']) ? $ftagementor_opt['ftagementor_sub_title_typography'] : '';
	$pstp_font_family = $pstp_font_weight = $pstp_text_transform = $pstp_font_style = $pstp_font_size = $pstp_line_height = $pstp_letter_spacing = $pstp_font_color = $pstt_font_family = $pstt_font_weight = $pstt_font_weight = $pstt_text_transform = $pstt_font_style = $pstt_font_size = $pstt_line_height = $pstt_letter_spacing = $pstt_font_color = '';
	if ( !empty( $ftagementor_page_sub_title_typography ) ) {
		$pstp_font_family = $ftagementor_page_sub_title_typography['font-family'];
		$pstp_font_weight = $ftagementor_page_sub_title_typography['font-weight'];
		$pstp_text_transform = $ftagementor_page_sub_title_typography['text-transform'];
		$pstp_font_style = $ftagementor_page_sub_title_typography['font-style'];
		$pstp_font_size = $ftagementor_page_sub_title_typography['font-size'];
		$pstp_line_height = $ftagementor_page_sub_title_typography['line-height'];
		$pstp_letter_spacing = $ftagementor_page_sub_title_typography['letter-spacing'];
		$pstp_font_color = $ftagementor_page_sub_title_typography['font-color'];
	}
	if ( isset( $ftagementor_theme_sub_title_typography ) ) {
		$pstt_font_family = ( isset( $ftagementor_theme_sub_title_typography['font-family'] ) ) ? $ftagementor_theme_sub_title_typography['font-family'] : '' ;
		$pstt_font_weight = ( isset( $ftagementor_theme_sub_title_typography['font-weight'] ) ) ? $ftagementor_theme_sub_title_typography['font-weight'] : '' ;
		$pstt_text_transform = ( isset( $ftagementor_theme_sub_title_typography['text-transform'] ) ) ? $ftagementor_theme_sub_title_typography['text-transform'] : '' ;
		$pstt_font_style = ( isset( $ftagementor_theme_sub_title_typography['font-style'] ) ) ? $ftagementor_theme_sub_title_typography['font-style'] : '' ;
		$pstt_font_size = ( isset( $ftagementor_theme_sub_title_typography['font-size'] ) ) ? $ftagementor_theme_sub_title_typography['font-size'] : '' ;
		$pstt_line_height = ( isset( $ftagementor_theme_sub_title_typography['line-height'] ) ) ? $ftagementor_theme_sub_title_typography['line-height'] : '' ;
		$pstt_letter_spacing = ( isset( $ftagementor_theme_sub_title_typography['letter-spacing'] ) ) ? $ftagementor_theme_sub_title_typography['letter-spacing'] : '' ;
		$pstt_font_color = ( isset( $ftagementor_theme_sub_title_typography['color'] ) ) ? $ftagementor_theme_sub_title_typography['color'] : '' ;
	}


	$page_sub_title_style_page_option = '.page__title__inner .page-sub-title{
		font-family:'.$pstp_font_family.'; 
		font-weight:'.$pstp_font_weight.'; 
		text-transform:'.$pstp_text_transform.'; 
		font-style:'.$pstp_font_style.'; 
		font-size:'.$pstp_font_size.'px; 
		line-height:'.$pstp_line_height.'px; 
		letter-spacing:'.$pstp_letter_spacing.'px; 
		color: '.$pstp_font_color.';  
	}';

	$page_sub_title_style_theme_option = '.page__title__inner .page-sub-title{
		font-family:'.$pstt_font_family.'; 
		font-weight:'.$pstt_font_weight.'; 
		text-transform:'.$pstt_text_transform.'; 
		font-style:'.$pstt_font_style.'; 
		font-size:'.$pstt_font_size.'; 
		line-height:'.$pstt_line_height.'; 
		letter-spacing:'.$pstt_letter_spacing.'; 
		color: '.$pstt_font_color.';  
	}';

	$pstff = $pstfw = $psttt = $pstfs = $pstfsz = $pstlh = $pstls = $pstcl = '';
	if ( $pstp_font_family ) {
		$pstff = '.page__title__inner .page-sub-title{
			font-family:'.$pstp_font_family.';
		}';
	} else {
		if ( $pstt_font_family ) {
			$pstff = '.page__title__inner .page-sub-title{
				font-family:'.$pstt_font_family.';
			}';
		}
	}
	if ( $pstp_font_weight ) {
		$pstfw = '.page__title__inner .page-sub-title{
			font-weight:'.$pstp_font_weight.';
		}';
	} else {
		if ( $pstt_font_weight ) {
			$pstfw = '.page__title__inner .page-sub-title{
				font-weight:'.$pstt_font_weight.';
			}';
		}
	}
	if ( $pstp_text_transform ) {
		$psttt = '.page__title__inner .page-sub-title{
			text-transform:'.$pstp_text_transform.';
		}';
	} else {
		if ( $pstt_text_transform ) {
			$psttt = '.page__title__inner .page-sub-title{
				text-transform:'.$pstt_text_transform.';
			}';
		}
	}
	if ( $pstp_font_style ) {
		$pstfs = '.page__title__inner .page-sub-title{
			font-style:'.$pstp_font_style.';
		}';
	} else {
		if ( $pstt_font_style ) {
			$pstfs = '.page__title__inner .page-sub-title{
				font-style:'.$pstt_font_style.';
			}';
		}
	}
	if ( $pstp_font_size ) {
		$pstfsz = '.page__title__inner .page-sub-title{
			font-size:'.$pstp_font_size.'px; 
		}';
	} else {
		if ( $pstt_font_size ) {
			$pstfsz = '.page__title__inner .page-sub-title{
				font-size:'.$pstt_font_size.'; 
			}';
		}
	}
	if ( $pstp_line_height ) {
		$pstlh = '.page__title__inner .page-sub-title{
			line-height:'.$pstp_line_height.'px; 
		}';
	} else {
		if ( $pstt_line_height ) {
			$pstlh = '.page__title__inner .page-sub-title{
				line-height:'.$pstt_line_height.'; 
			}';
		}
	}
	if ( $pstp_letter_spacing ) {
		$pstls = '.page__title__inner .page-sub-title{
			line-height:'.$pstp_letter_spacing.'px; 
		}';
	} else {
		if ( $pstt_letter_spacing ) {
			$pstls = '.page__title__inner .page-sub-title{
				letter-spacing:'.$pstt_letter_spacing.'; 
			}';
		}
	}
	if ( $pstp_font_color ) {
		$pstcl = '.page__title__inner .page-sub-title{
			color: '.$pstp_font_color.'; 
		}';
	} else {
		if ( $pstt_font_color ) {
			$pstcl = '.page__title__inner .page-sub-title{
				color: '.$pstt_font_color.'; 
			}';
		}
	}


	/**
	* End Sub Title
	*/

	/**
	* Page Title Padding
	*/

	$ftagementor_page_title_wrapper_padding = get_post_meta( get_the_id(), '_ftagementor_title_wrapper_padding', true );

	$ftagementor_theme_title_wrap_padding = ( isset( $ftagementor_opt['ftagementor_title_wrap_padding'] ) ) ? $ftagementor_opt['ftagementor_title_wrap_padding'] : '' ;
	$ppt = ( !empty( $ftagementor_page_title_wrapper_padding['padding-top'] ) ) ? $ftagementor_page_title_wrapper_padding['padding-top'] : '' ;
	$ppr = ( !empty( $ftagementor_page_title_wrapper_padding['padding-right'] ) ) ? $ftagementor_page_title_wrapper_padding['padding-right'] : '' ;
	$ppb = ( !empty( $ftagementor_page_title_wrapper_padding['padding-bottom'] ) ) ? $ftagementor_page_title_wrapper_padding['padding-bottom'] : '' ;
	$ppl = ( !empty( $ftagementor_page_title_wrapper_padding['padding-left'] ) ) ? $ftagementor_page_title_wrapper_padding['padding-left'] : '' ;
	$tpt = ( isset( $ftagementor_theme_title_wrap_padding['padding-top'] ) ) ? $ftagementor_theme_title_wrap_padding['padding-top'] : '' ;
	$tpr = ( isset( $ftagementor_theme_title_wrap_padding['padding-right'] ) ) ? $ftagementor_theme_title_wrap_padding['padding-right'] : '' ;
	$tpb = ( isset( $ftagementor_theme_title_wrap_padding['padding-bottom'] ) ) ? $ftagementor_theme_title_wrap_padding['padding-bottom'] : '' ;
	$tpl = ( isset( $ftagementor_theme_title_wrap_padding['padding-left'] ) ) ? $ftagementor_theme_title_wrap_padding['padding-left'] : '' ;
	/**
	* Page Title Padding Large Screen
	*/
	
	$phpt = '';
	if ( !empty( $ppt ) ) {
		$phpt = '.page__title__wrapper .page__title__inner{
			padding-top:'.$ppt.'px; 
		}';
	}else{
		if ( !empty( $tpt ) ) {
			$phpt = '.page__title__wrapper .page__title__inner{
				padding-top:'.$tpt.'; 
			}';
		}
	}

	$phpr = '';
	if ( !empty( $ppr ) ) {
		$phpr = '.page__title__wrapper .page__title__inner{
			padding-right:'.$ppr.'px; 
		}';
	}else{
		if ( !empty( $tpr ) ) {
			$phpr = '.page__title__wrapper .page__title__inner{
				padding-right:'.$tpr.'; 
			}';
		}
	}

	$phpb = '';
	if ( !empty( $ppb ) ) {
		$phpb = '.page__title__wrapper .page__title__inner{
			padding-bottom:'.$ppb.'px; 
		}';
	}else{
		if ( !empty( $tpb ) ) {
			$phpb = '.page__title__wrapper .page__title__inner{
				padding-bottom:'.$tpb.'; 
			}';
		}
	}

	$phpl = '';
	if ( !empty( $ppl ) ) {
		$phpl = '.page__title__wrapper .page__title__inner{
			padding-left:'.$ppl.'px; 
		}';
	}else{
		if ( !empty( $tpl ) ) {
			$phpl = '.page__title__wrapper .page__title__inner{
				padding-left:'.$tpl.'; 
			}';
		}
	}
	/**
	* Page Title Padding Responsive Screen
	*/
	$ftagementor_page_title_wrapper_padding_on_phone = get_post_meta( get_the_id(), '_ftagementor_title_wrapper_padding_on_phone', true );

	$ftagementor_theme_title_wrap_padding_on_phone = ( isset( $ftagementor_opt['ftagementor_title_wrap_padding_on_phone'] ) ) ? $ftagementor_opt['ftagementor_title_wrap_padding_on_phone'] : '' ;
	$rppt = ( !empty( $ftagementor_page_title_wrapper_padding_on_phone['padding-top'] ) ) ? $ftagementor_page_title_wrapper_padding_on_phone['padding-top'] : '' ;
	$rppr = ( !empty( $ftagementor_page_title_wrapper_padding_on_phone['padding-right'] ) ) ? $ftagementor_page_title_wrapper_padding_on_phone['padding-right'] : '' ;
	$rppb = ( !empty( $ftagementor_page_title_wrapper_padding_on_phone['padding-bottom'] ) ) ? $ftagementor_page_title_wrapper_padding_on_phone['padding-bottom'] : '' ;
	$rppl = ( !empty( $ftagementor_page_title_wrapper_padding_on_phone['padding-left'] ) ) ? $ftagementor_page_title_wrapper_padding_on_phone['padding-left'] : '' ;
	$rtpt = ( isset( $ftagementor_theme_title_wrap_padding_on_phone['padding-top'] ) ) ? $ftagementor_theme_title_wrap_padding_on_phone['padding-top'] : '' ;
	$rtpr = ( isset( $ftagementor_theme_title_wrap_padding_on_phone['padding-right'] ) ) ? $ftagementor_theme_title_wrap_padding_on_phone['padding-right'] : '' ;
	$rtpb = ( isset( $ftagementor_theme_title_wrap_padding_on_phone['padding-bottom'] ) ) ? $ftagementor_theme_title_wrap_padding_on_phone['padding-bottom'] : '' ;
	$rtpl = ( isset( $ftagementor_theme_title_wrap_padding_on_phone['padding-left'] ) ) ? $ftagementor_theme_title_wrap_padding_on_phone['padding-left'] : '' ;

	$rphpt = '';
	if ( $rppt ) {
		$rphpt = '.page__title__wrapper .page__title__inner{
			padding-top:'.$rppt.'px; 
		}';
	}else{
		if ( $rtpt ) {
			$rphpt = '.page__title__wrapper .page__title__inner{
				padding-top:'.$rtpt.'; 
			}';
		}
	}

	$rphpr = '';
	if ( $rppr ) {
		$rphpr = '.page__title__wrapper .page__title__inner{
			padding-right:'.$rppr.'px; 
		}';
	}else{
		if ( $rtpr ) {
			$rphpr = '.page__title__wrapper .page__title__inner{
				padding-right:'.$rtpr.'; 
			}';
		}
	}

	$rphpb = '';
	if ( $rppb ) {
		$rphpb = '.page__title__wrapper .page__title__inner{
			padding-bottom:'.$rppb.'px; 
		}';
	}else{
		if ( $rtpb ) {
			$rphpb = '.page__title__wrapper .page__title__inner{
				padding-bottom:'.$rtpb.'; 
			}';
		}
	}

	$rphpl = '';
	if ( $rppl ) {
		$rphpl = '.page__title__wrapper .page__title__inner{
			padding-left:'.$rppl.'px; 
		}';
	}else{
		if ( $rtpl ) {
			$rphpl = '.page__title__wrapper .page__title__inner{
				padding-left:'.$rtpl.'; 
			}';
		}
	}
	/**
	* Page Header Background Options
	*/
	$ftagementor_page_title_wrapper_background = get_post_meta( get_the_id(), '_ftagementor_title_wrapper_background', true );
	$page_header_bg_color = $po_background_color = $to_background_color = $page_header_bg_repeat = $po_background_repeat = $to_background_repeat = $page_header_bg_size = $po_background_size = $to_background_size = $page_header_bg_attachment = $po_background_attachment = $to_background_attachment = $to_background_position = $page_header_bg_image = $po_background_image = $to_background_image = $page_header_bg_position ='';

	if ( isset( $ftagementor_page_title_wrapper_background ) ) {
		$po_background_color = ( !empty( $ftagementor_page_title_wrapper_background['background-color'] ) ) ? $ftagementor_page_title_wrapper_background['background-color'] : '' ;
		$po_background_repeat = ( !empty( $ftagementor_page_title_wrapper_background['background-repeat'] ) ) ? $ftagementor_page_title_wrapper_background['background-repeat'] : '' ;
		$po_background_size = ( !empty( $ftagementor_page_title_wrapper_background['background-size'] ) ) ? $ftagementor_page_title_wrapper_background['background-size'] : '' ;
		$po_background_attachment = ( !empty( $ftagementor_page_title_wrapper_background['background-attachment'] ) ) ? $ftagementor_page_title_wrapper_background['background-attachment'] : '' ;
		$po_background_position = ( !empty( $ftagementor_page_title_wrapper_background['background-position'] ) ) ? $ftagementor_page_title_wrapper_background['background-position'] : '' ;
		$po_background_image = ( !empty( $ftagementor_page_title_wrapper_background['background-image'] ) ) ? $ftagementor_page_title_wrapper_background['background-image'] : '' ;
	}

	if ( isset( $ftagementor_opt['ftagementor_title_wrap_background'] ) ) {
		$to_background_color = ( isset( $ftagementor_opt['ftagementor_title_wrap_background']['background-color'] ) ) ? $ftagementor_opt['ftagementor_title_wrap_background']['background-color'] : '' ;
		$to_background_repeat = ( isset( $ftagementor_opt['ftagementor_title_wrap_background']['background-repeat'] ) ) ? $ftagementor_opt['ftagementor_title_wrap_background']['background-repeat'] : '' ;
		$to_background_size = ( isset( $ftagementor_opt['ftagementor_title_wrap_background']['background-size'] ) ) ? $ftagementor_opt['ftagementor_title_wrap_background']['background-size'] : '' ;
		$to_background_attachment = ( isset( $ftagementor_opt['ftagementor_title_wrap_background']['background-attachment'] ) ) ? $ftagementor_opt['ftagementor_title_wrap_background']['background-attachment'] : '' ;
		$to_background_position = ( isset( $ftagementor_opt['ftagementor_title_wrap_background']['background-position'] ) ) ? $ftagementor_opt['ftagementor_title_wrap_background']['background-position'] : '' ;
		$to_background_image = ( isset( $ftagementor_opt['ftagementor_title_wrap_background']['background-image'] ) ) ? $ftagementor_opt['ftagementor_title_wrap_background']['background-image'] : '' ;
	}

	/**
	* Background Color
	*/
	if ( $po_background_color ) {
		$page_header_bg_color = 'section.page__title__wrapper{
			background-color:'.$po_background_color.'; 
		}';
	}else{
		if ( $to_background_color ) {
			$page_header_bg_color = 'section.page__title__wrapper{
				background-color:'.$to_background_color.'; 
			}';
		}
	}
	/**
	* Background Repeat
	*/
	if ( $po_background_repeat ) {
		$page_header_bg_repeat = 'section.page__title__wrapper{
			background-repeat:'.$po_background_repeat.'; 
		}';
	}else{
		if ( $to_background_repeat ) {
			$page_header_bg_repeat = 'section.page__title__wrapper{
				background-repeat:'.$to_background_repeat.'; 
			}';
		}
	}
	/**
	* Background Size
	*/
	if ( $po_background_size ) {
		$page_header_bg_size = 'section.page__title__wrapper{
			background-size:'.$po_background_size.'; 
		}';
	}else{
		if ( $to_background_size ) {
			$page_header_bg_size = 'section.page__title__wrapper{
				background-size:'.$to_background_size.'; 
			}';
		}
	}
	/**
	* Background Attachment
	*/
	if ( $po_background_attachment ) {
		$page_header_bg_attachment = 'section.page__title__wrapper{
			background-attachment:'.$po_background_attachment.'; 
		}';
	}else{
		if ( $to_background_attachment ) {
			$page_header_bg_attachment = 'section.page__title__wrapper{
				background-attachment:'.$to_background_attachment.'; 
			}';
		}
	}
	/**
	* Background Position
	*/
	if ( $po_background_position ) {
		$page_header_bg_position = 'section.page__title__wrapper{
			background-position:'.$po_background_position.'; 
		}';
	}else{
		if ( $to_background_position ) {
			$page_header_bg_position = 'section.page__title__wrapper{
				background-position:'.$to_background_position.'; 
			}';
		}
	}
	/**
	* Background Image
	*/
	if ( $po_background_image ) {
		$page_header_bg_image = 'section.page__title__wrapper{
			background-image: url( '.$po_background_image.'); 
		}';
	}else{
		if ( $to_background_image ) {
			$page_header_bg_image = 'section.page__title__wrapper{
				background-image: url( '.$to_background_image.'); 
			}';
		}
	}
	/**
	* Page Header Overlay
	*/
	$ftagementor_page_title_wrapper_overlay = get_post_meta( get_the_id(), '_ftagementor_title_wrapper_overlay', true );
	$page_header_overlay_color = $po_overlay_color = $to_overlay_color = '';

	if ( isset( $ftagementor_page_title_wrapper_overlay ) ) {
		$po_overlay_color = ( !empty( $ftagementor_page_title_wrapper_overlay['color'] ) ) ? $ftagementor_page_title_wrapper_overlay['color'] : '' ;
	}
	if ( isset( $ftagementor_opt['ftagementor_title_wrap_background_overlay'] ) ) {
		$to_overlay_color = ( $ftagementor_opt['ftagementor_title_wrap_background_overlay'] ) ? $ftagementor_opt['ftagementor_title_wrap_background_overlay']['rgba'] : '' ;
	}
	if ( $po_overlay_color ) {
		$page_header_overlay_color = 'section.page__title__wrapper:before{
			background-color: '.$po_overlay_color.'; 
		}';
	}else{
		if ( $to_overlay_color ) {
			$page_header_overlay_color = 'section.page__title__wrapper:before{
				background-color: '.$to_overlay_color.'; 
			}';
		}
	}
	/**
	* Container width
	*/
	
	$container_width = ( isset( $ftagementor_opt['ftagementor_layout_page'] ) && !empty( $ftagementor_opt['ftagementor_layout_page'] ) ) ? $ftagementor_opt['ftagementor_layout_page'] : '' ;
	$container_width_value = '';
	if ( $container_width ) {
		$container_width_value = '.wide-layout .container {
			width: '. $container_width .'px;
		 }';
	}

	/**
	* Container width
	*/
	$boxlayout_box_width = $boxlayout_container_width = $boxlayout_container_width_value = $boxlayout_box_width_value = '';
	$boxlayout_container_width ='';
	if( isset( $ftagementor_opt['ftagementor_boxlayout_box_width'] ) ){
		$boxlayout_box_width = $ftagementor_opt['ftagementor_boxlayout_box_width'];
		$boxlayout_container_width = $boxlayout_box_width;	
	}

	if ( '' != $boxlayout_box_width ) {
		$boxlayout_box_width_value = '.site-wrapper.boxed-layout, .boxed-layout .is-sticky{
		    max-width: '.$boxlayout_box_width.'px;
		}';
	}

	if ( '' != $boxlayout_box_width ) {
		$boxlayout_container_width_value = '.site-wrapper.boxed-layout .container, 
		.boxed-layout .is-sticky .container{
		    width: calc( '.$boxlayout_container_width.'px - 30px );
		}';
	}


	/**  
	* Page content padding
	*/
	$ftagementor_po_content_padding = get_post_meta( get_the_id(), '_ftagementor_content_padding', true );
	$ftagementor_to_content_padding = ( isset( $ftagementor_opt['ftagementor_page_layout_padding'] ) ) ? $ftagementor_opt['ftagementor_page_layout_padding'] : '' ;
	$pcpt = ( !empty( $ftagementor_po_content_padding['padding-top'] ) ) ? $ftagementor_po_content_padding['padding-top'] : '' ;
	$pcpr = ( !empty( $ftagementor_po_content_padding['padding-right'] ) ) ? $ftagementor_po_content_padding['padding-right'] : '' ;
	$pcpb = ( !empty( $ftagementor_po_content_padding['padding-bottom'] ) ) ? $ftagementor_po_content_padding['padding-bottom'] : '' ;
	$pcpl = ( !empty( $ftagementor_po_content_padding['padding-left'] ) ) ? $ftagementor_po_content_padding['padding-left'] : '' ;
	$tcpt = ( isset( $ftagementor_to_content_padding['padding-top'] ) ) ? $ftagementor_to_content_padding['padding-top'] : '' ;
	$tcpr = ( isset( $ftagementor_to_content_padding['padding-right'] ) ) ? $ftagementor_to_content_padding['padding-right'] : '' ;
	$tcpb = ( isset( $ftagementor_to_content_padding['padding-bottom'] ) ) ? $ftagementor_to_content_padding['padding-bottom'] : '' ;
	$tcpl = ( isset( $ftagementor_to_content_padding['padding-left'] ) ) ? $ftagementor_to_content_padding['padding-left'] : '' ;

	$pcptv = '';
	if ( !empty( $pcpt ) ) {
		$pcptv = '.page-wrapper{
			padding-top:'.$pcpt.'px; 
		}';
	}else{
		if ( !empty( $tcpt ) ) {
			$pcptv = '.page-wrapper{
				padding-top:'.$tcpt.'; 
			}';
		}
	}

	$pcprv = '';
	if ( !empty( $pcpr ) ) {
		$pcprv = '.page-wrapper{
			padding-right:'.$pcpr.'px; 
		}';
	}else{
		if ( !empty( $tcpr ) ) {
			$pcprv = '.page-wrapper{
				padding-right:'.$tcpr.'; 
			}';
		}
	}

	$pcpbv = '';
	if ( !empty( $pcpb ) ) {
		$pcpbv = '.page-wrapper{
			padding-bottom:'.$pcpb.'px; 
		}';
	}else{
		if ( !empty( $tcpb ) ) {
			$pcpbv = '.page-wrapper{
				padding-bottom:'.$tcpb.'; 
			}';
		}
	}

	$pcplv = '';
	if ( !empty( $pcpl ) ) {
		$pcplv = '.page-wrapper{
			padding-left:'.$pcpl.'px; 
		}';
	}else{
		if ( !empty( $tcpl ) ) {
			$pcplv = '.page-wrapper{
				padding-left:'.$tcpl.'; 
			}';
		}
	}


	$hdrwidht = get_post_meta( get_the_id(), '_ftagementor_header_custome_width', true );
	$hdrwidht_print = '';
	if ( !empty( $hdrwidht ) ) {
		$hdrwidht_print = '.header-area .container{
			max-width:'.$hdrwidht.'px; 
		}';
	}

	/**
	* Page Content Width
	*/
	$page_content_width = '';
	if ( isset( $ftagementor_opt['ftagementor_enable_page_content_full_width'] ) && 'yes' == $ftagementor_opt['ftagementor_enable_page_content_full_width'] ) {
		$page_content_width = '
			.site-content .page-wrapper > .container
			{ 
				width: 100%;
    			max-width: 100%;
			}';
	}

	/**
	* Default Footer Background Overlay
	*/
	$default_foo_overlay_color = $default_foo_overlay_color_rgba = '';
	if( isset( $ftagementor_opt['ftagementor_footer_overlay_color']['rgba'] ) ){
		$default_foo_overlay_color_rgba = $ftagementor_opt['ftagementor_footer_overlay_color']['rgba'];
	}
	if ( $default_foo_overlay_color_rgba ) {
		$default_foo_overlay_color = 'footer .default-footer:before{
			background-color:'.$default_foo_overlay_color_rgba.'; 
		}';
	}

	/**
	* Layout Background
	*/
	$page_body_background = get_post_meta( get_the_id(), '_ftagementor_page_background', true );

	if ( isset( $page_body_background ) ) {
		$pob_background_color = ( !empty( $page_body_background['background-color'] ) ) ? $page_body_background['background-color'] : '' ;
		$pob_background_repeat = ( !empty( $page_body_background['background-repeat'] ) ) ? $page_body_background['background-repeat'] : '' ;
		$pob_background_size = ( !empty( $page_body_background['background-size'] ) ) ? $page_body_background['background-size'] : '' ;
		$pob_background_attachment = ( !empty( $page_body_background['background-attachment'] ) ) ? $page_body_background['background-attachment'] : '' ;
		$pob_background_position = ( !empty( $page_body_background['background-position'] ) ) ? $page_body_background['background-position'] : '' ;
		$pob_background_image = ( !empty( $page_body_background['background-image'] ) ) ? $page_body_background['background-image'] : '' ;
	}
	/**
	* Background Color
	*/
	$pob_background_color_var = '';
	if ( '' != $pob_background_color  ) {
		$pob_background_color_var = 'html body, html body.wide-layout-active, html body.boxed-layout-active {
			background-color:'.$pob_background_color.'; 
		}';
	}
	/**
	* Background Repeat
	*/
	$pob_background_repeat_var = '';
	if ( '' != $pob_background_repeat  ) {
		$pob_background_repeat_var = 'hrml body, html body.wide-layout-active, html body.boxed-layout-active {
			background-repeat:'.$pob_background_repeat.'; 
		}';
	}
	/**
	* Background Size
	*/
	$pob_background_size_var = '';
	if ( '' != $pob_background_size  ) {
		$pob_background_size_var = 'hrml body, html body.wide-layout-active, html body.boxed-layout-active {
			background-size:'.$pob_background_size.'; 
		}';
	}
	/**
	* Background Attachment
	*/
	$pob_background_attachment_var = '';
	if ( '' != $pob_background_attachment  ) {
		$pob_background_attachment_var = 'hrml body, html body.wide-layout-active, html body.boxed-layout-active {
			background-attachment:'.$pob_background_attachment.'; 
		}';
	}
	/**
	* Background Position
	*/
	$pob_background_position_var = '';
	if ( '' != $pob_background_position  ) {
		$pob_background_position_var = 'hrml body, html body.wide-layout-active, html body.boxed-layout-active {
			background-position:'.$pob_background_position.'; 
		}';
	}
	/**
	* Background Image
	*/
	$pob_background_image_var = '';
	if ( '' != $pob_background_image  ) {
		$pob_background_image_var = 'hrml body, html body.wide-layout-active, html body.boxed-layout-active {
			background-image: url( '.$pob_background_image.'); 
		}';
	}
	/**
	* Preloader Element Color
	*/
	$preloader_element_color = ( isset( $ftagementor_opt['ftagementor_preloader_element_color'] ) ) ? $ftagementor_opt['ftagementor_preloader_element_color'] : '' ;
	$preloader_element_bd_colors = $preloader_element_bg_colors = '';
	if ( '' != $preloader_element_color ) {
		$preloader_element_bd_colors = ' .pre_object{
			border-left-color: '.$preloader_element_color.'; 
			border-top-color: '.$preloader_element_color.'; 
		}';
	}

	if ( '' != $preloader_element_color ) {
		$preloader_element_bg_colors = ' .object2{
			background-color: '.$preloader_element_color.';
		}';
	}

	/**
	* Blog Title Wrapper Overlay
	*/
	$blog_title_wrap_overlay_color = $blog_title_wrap_overlay = '';
	if ( isset( $ftagementor_opt['ftagementor_blog_banner_overlay_color'] ) ) {
		$blog_title_wrap_overlay = ( $ftagementor_opt['ftagementor_blog_banner_overlay_color'] ) ? $ftagementor_opt['ftagementor_blog_banner_overlay_color']['rgba'] : '' ;
	}
	if ( '' != $blog_title_wrap_overlay ) {
		$blog_title_wrap_overlay_color = 'section.page__title__wrapper.blog-page:before{
			background-color: '.$blog_title_wrap_overlay.'; 
		}';
	}

	/**
	* Single Post Title Wrapper Overlay
	*/
	$single_post_title_wrap_overlay_color = $single_post_title_wrap_overlay = '';
	if ( isset( $ftagementor_opt['ftagementor_single_post_title_wrap_overlay'] ) ) {
		$single_post_title_wrap_overlay = ( $ftagementor_opt['ftagementor_single_post_title_wrap_overlay'] ) ? $ftagementor_opt['ftagementor_single_post_title_wrap_overlay']['rgba'] : '' ;
	}
	if ( '' != $single_post_title_wrap_overlay ) {
		$single_post_title_wrap_overlay_color = 'section.page__title__wrapper.single-post:before{
			background-color: '.$single_post_title_wrap_overlay.'; 
		}';
	}

	/**
	* Enable Breadcrumbs Mobile
	*/
	$enable_breadcrumbs_mobile = ( isset( $ftagementor_opt['ftagementor_breadcrumbs_mobile'] ) ) ? $ftagementor_opt['ftagementor_breadcrumbs_mobile'] : '' ;
	$enable_breadcrumbs_on_mobile = '';
	if ( false == $enable_breadcrumbs_mobile) {
		$enable_breadcrumbs_on_mobile = '@media (max-width: 767px) {
			.breadcrumbs_wrap{
				display: none;
			}
		}';
	}

	/**
	* Logo Height
	*/
	$logo_height_val = '';
	$logo_height = isset( $ftagementor_opt['ftagementor_logo_max_height'] ) ? $ftagementor_opt['ftagementor_logo_max_height'] : '' ;
	if ( '' != $logo_height ) {
		$logo_height_val = '.header-menu-wrap .site-title a img{
			max-height: '.$logo_height.'px; 
		}';
	}
	
	/**
	* Theme Color Options
	*/
	$primary_color = ( isset( $ftagementor_opt['ftagementor_primary_color'] ) ) ? $ftagementor_opt['ftagementor_primary_color'] : '' ;
	/**
	* Primary Color 
	*/
	$theme_pri_color = '';
	if ( $primary_color ) {
		$theme_pri_color = '
			a:hover, 
			a:focus,
			a:active,
			.blog-meta a:hover,
			.post-pagination .nav-links > ul > li > span.current, 
			.post-pagination .nav-links > ul > li:hover a, 
			.pagination > a:hover, 
			.page-links > span:not(.page-links-title):hover, 
			.page-links > a:hover,
			.type-post.tag-sticky-2 .blog-content:before,
			.header-info a:hover, .header-social ul li a:hover,
			.blog-post.format-link .blog-content .post-title:before, 
			.read-more a:hover, 
			.blog-search form button:hover, 
			.sidebar-widget ul li ul.children li a:hover,
			.sidebar-widget ul li ul.sub-menu li a:hover, 
			.sidebar-widget ul li:hover a, 
			.widget_tag_cloud a:hover, 
			.post-categories a:hover,
			.sidebar-blog .content .title:hover,
			.sidebar-widget .post-text > h4 a:hover,
			.top-bar-left-content a:hover,
			.header-info a:hover,
			.header-social ul li a:hover,
			.top-bar-left-menu ul li a:hover, 
			.default-menu a:hover,
			.default-menu li.current-page-item > a,
			.default-menu li.current-page-parent > a,
			.default-menu li.current-page-ancestor > a,
			.default-menu li.current-menu-item > a,
			.default-menu li.current-menu-parent > a,
			.default-menu li.current-menu-ancestor > a, 
			a.meanmenu-reveal:hover,
			a.meanmenu-reveal:focus, 
			.mean-nav a.mean-expand:hover, 
			.mean-nav > ul > li > a:hover,
			.mean-nav > ul > li.current_page_item > a, 
			.mean-nav .sub-menu li:hover > a , 
			.mean-nav .sub-menu li.current_page_item:hover > a, 
			.mean-nav ul li li.current_page_item > a,
			.mean-nav ul li li > a:hover,
			.mean-nav .sub-menu li > a:hover, 
			.breadcrumbs_wrap ul li a:hover,
			.breadcrumbs_wrap ul li.item-current, 
			.footer-single a:hover, 
			.slide-content h2  span,.slide-content h1  span, 
			.slider-area .owl-dots .owl-dot, 
			.trailer-active .owl-nav div:hover, 
			.others-post .owl-nav div:hover, 
			.filter-menu-list  button.is-checked,.filter-menu-list  button:hover, 
			.slick-arrow:hover, 
			.single-address-icon i, 
			.contact-area .comment-form .wpcf7-submit,
			.section-titel h3 span,
			.slider-social-production li a:hover,
			.slider-social li a:hover, 
			.slider-active .owl-nav div span, 
			.news-content .news-meta span a:hover,.news-content h4 a:hover, 
			.about-actor-left > h3 span, 
			.button-horizental > a:hover, 
			.client-feedback > h3 span, 
			.indicator3 .owl-nav [class*="owl-"]:hover,
			.sticky.hentry h2.post-title:before, .tag-sticky-2.hentry h2.post-title:before,
			.sticky.hentry h2.post-title, .tag-sticky-2.hentry h2.post-title,
			.footer-top-section .footer-single.widget_tag_cloud a:hover,
			.category-sticky.hentry h2.post-title ,
			.category-sticky.hentry h2.post-title:before ,
			.sldr_cnt_box span,
			.pstr_rating li .ratclr,
			.portfolio-details-info .post-share ul li a:hover,
			.portfolio-details-meta ul li a:hover,
			.post-pagination .nav-links > ul > li > span.current, 
			.post-pagination .nav-links > ul > li:hover a, 
			.pagination > a:hover, 
			.page-links > span:not(.page-links-title), 
			.page-links > a:hover
			{
				color:'.$primary_color.'; 
			}';
	}
	/**
	* Primary Background Color 
	*/
	$theme_pri_bg_color = '';
	if ( $primary_color ) {
		$theme_pri_bg_color = '
		.object2,
		.read-more a,
		.mc4wp-form-fields input[type=submit]:hover,
		.pnf-inner a.btn,
		.pnf-inner a.btn:hover,
		.slide-btn a,
		.owl-nav div,
		.ft_item_image a.icon_link,
		.contact-area .leave-comment.comments:before,
		.contact-area .comment-form .wpcf7-submit:hover,
		.mc4wp-form-fields input[type="submit"]:hover,
		.slick-left-thumb,
		.indicator-style-two .owl-nav div:hover,
		.leave-comment-form .submit,
		.next-prev a:hover,
		.pro-mre-btn > a:hover,
		.dots_style1 .owl-dots .owl-dot.active span, .dots_style1 .owl-dots .owl-dot:hover span,
		.subscribe-form input[type="submit"],
		.pstr_date
		{
			background-color:'.$primary_color.'; 
		}';
	}
	/**
	* Primary Border Color 
	*/
	$theme_pri_border_color = '';
	if ( $primary_color ) {
		$theme_pri_border_color = '
			.type-post.tag-sticky-2 .blog-content,
			.post-pagination .nav-links > ul > li > span.current, 
			.post-pagination .nav-links > ul > li:hover a, 
			.pagination > a:hover, 
			.page-links > span:not(.page-links-title):hover, 
			.page-links > a:hover,
			.pre_object,
			blockquote,
			.blog-post.format-link .blog-content .post-title a:hover,
			.read-more a:hover,
			.sidebar-title::after,
			.widget_tag_cloud a:hover,   /*blog css*/
			.pnf-inner a.btn,
			.section-titel.dotborder h3::after,.title-style-three span:after,.title-style-three span:before,
			.teamper-titel > h5::after,
			.single-address-icon i,
			.trailer-right-area,
			.indicator-style-two .owl-nav div:hover,
			.leave-comment-form .submit:hover,
			.leave-comment-form .submit,
			.type-post.category-sticky .blog-content ,
			.post-pagination .nav-links > ul > li > span.current, 
			.post-pagination .nav-links > ul > li:hover a, 
			.pagination > a:hover, 
			.page-links > span:not(.page-links-title), 
			.page-links > a:hover,
			.pro-mre-btn > a:hover,
			.recent-news-single:hover,
			.button-horizental a::after,
			.working-date > h5::after,
			.dots_style1 .owl-dots .owl-dot.active span, .dots_style1 .owl-dots .owl-dot:hover span,
			.client-feedback::after,
			.type-post.sticky .blog-content, .type-post.tag-sticky-2 .blog-content,
			.footer-top-section .footer-single.widget_tag_cloud a:hover,
			.sldr_counter_content h2 span.sld_border_shap:before,.cam_sldr_left h2:before
			{
				border-color:'.$primary_color.'; 
			}';
	}


	/**
	* Reader Style 
	*/
	$css_arr = array(
		$container_width_value,
		$page_content_width,
		$boxlayout_box_width_value,
		$boxlayout_container_width_value,
		$hdrwidht_print,
		$pcptv,
		$pcprv,
		$pcpbv,
		$pcplv,

		$pnmff,
		$pnmfw,
		$pnmtt,
		$pnmfs,
		$pnmfsz,
		$pnmlh,
		$pnmls,

		$ptff,
		$ptfw,
		$pttt,
		$ptfs,
		$ptfsz,
		$ptlh,
		$ptls,
		$ptcl,

		$pstff,
		$pstfw,
		$psttt,
		$pstfs,
		$pstfsz,
		$pstlh,
		$pstls,
		$pstcl,

		$phpt, 
		$phpr, 
		$phpb, 
		$phpl,

		$page_header_bg_color,
		$page_header_bg_repeat,
		$page_header_bg_size,
		$page_header_bg_attachment,
		$page_header_bg_position,
		$page_header_bg_image,

		$page_header_overlay_color,
		$default_foo_overlay_color,

		$theme_pri_color,
		$theme_pri_bg_color,
		$theme_pri_border_color,


		$pob_background_color_var,
		$pob_background_repeat_var,
		$pob_background_size_var,
		$pob_background_attachment_var,
		$pob_background_position_var,
		$pob_background_image_var,

		$preloader_element_bd_colors,
		$preloader_element_bg_colors,
		$blog_title_wrap_overlay_color,
		$single_post_title_wrap_overlay_color,

		$enable_breadcrumbs_on_mobile,
		$logo_height_val,

	);

	$custom_css = implode(' ',$css_arr);

	$responsive_css_arr = array(
		$rphpt, 
		$rphpr, 
		$rphpb, 
		$rphpl,
	);

	$responsive_custom_css = implode(' ',$responsive_css_arr);
	$custom_css .= '@media (max-width: 767px) {'. $responsive_custom_css .'}';

	// remove css white space
	$custom_css = str_replace(array("\n","\t", "    "), '', $custom_css);

    wp_add_inline_style( 'ftagementor-style', $custom_css );

	}
}
add_action( 'wp_enqueue_scripts', 'ftagementor_styles_method',200 );