<?php 

/**
 * Add color styling from theme
 */
 
 if( !function_exists( 'ftagementor_styles_method' ) ) {
function ftagementor_styles_method() {
	global $ftagementor_opt;
    wp_enqueue_style(
        'ftagementor-inline-style',
        get_stylesheet_directory_uri() . '/css/inline-style.css'
    );
	
	//metabox function
	//page padding
	$page_padding = get_post_meta( get_the_ID(),'_ftagementor_page_padding',true );
	//page title color
	$page_title_color = get_post_meta( get_the_ID(),'_ftagementor_page_title_color',true );
	$breadcrumb_bg_overlay_color = get_post_meta( get_the_ID(),'_ftagementor_page_title_bg_overlay_color',true );
	$breadcrumb_overlay_opacity = get_post_meta( get_the_ID(),'_ftagementor_page_title_overlay_opacity',true );
	$breadcrumb_bg_overlay_color_value = '';
	if(!empty( $breadcrumb_bg_overlay_color )){
			$breadcrumb_bg_overlay_color_value = $breadcrumb_bg_overlay_color;
	}else{
		if( isset($ftagementor_opt['ftagementor_breadcrumbs_overlay_color'] ) ){
		   $breadcrumb_bg_overlay_color_value = $ftagementor_opt['ftagementor_breadcrumbs_overlay_color'];
		}			
	}
	$breadcrumb_overlay_opacity_value = '';
	if($breadcrumb_overlay_opacity ){
		$breadcrumb_overlay_opacity_value = $breadcrumb_overlay_opacity;
	}else{
		if($ftagementor_opt['ftagementor_breadcrumbs_overlay_color_opacity'] ){
		   $breadcrumb_overlay_opacity_value = $ftagementor_opt['ftagementor_breadcrumbs_overlay_color_opacity'];
		}			
	}

	//footer area overlay
	$footer_bg_overlay_color_value = '';
	if( isset($ftagementor_opt['ftagementor_footer_overlay_color'] ) ){
		   $footer_bg_overlay_color_value = $ftagementor_opt['ftagementor_footer_overlay_color'];
	}
	//footer area opacity
	$footer_overlay_color_opacity = '';
	if( isset($ftagementor_opt['ftagementor_footer_overlay_color_opacity'] ) ){
		   $footer_overlay_color_opacity = $ftagementor_opt['ftagementor_footer_overlay_color_opacity'];
	}

	//page title font size
	$page_title_font_size = get_post_meta( get_the_ID(),'_ftagementor_page_title_font_sizes',true );
	//breadcrumb padding top
	$breadcrumb_padding_top = get_post_meta( get_the_ID(),'_ftagementor_breadcrumb_padding_top',true );
	//breadcrumb padding bottom
	$breadcrumb_padding_bottom = get_post_meta( get_the_ID(),'_ftagementor_breadcrumb_padding_bottom',true );

	//breadcrumb padding top
	$breadcrumb_padding_top_value ='';
	if(!empty($breadcrumb_padding_top)){
			$breadcrumb_padding_top_value = $breadcrumb_padding_top;
	}else{
		if(isset($ftagementor_opt['ftagementor_breadcrumb_lg_height']) ){
		   $breadcrumb_padding_top = $ftagementor_opt['ftagementor_breadcrumb_lg_height'];
		   $breadcrumb_padding_top_value = $breadcrumb_padding_top['padding-top'];
		}			
	}	
	//breadcrumb padding bottom
	$breadcrumb_padding_bottom_value = '';
	if(!empty($breadcrumb_padding_bottom)){
			$breadcrumb_padding_bottom_value = $breadcrumb_padding_bottom;
	}else{
		if(isset($ftagementor_opt['ftagementor_breadcrumb_lg_height']) ){
		   $breadcrumb_padding_bottom = $ftagementor_opt['ftagementor_breadcrumb_lg_height'];
		   $breadcrumb_padding_bottom_value = $breadcrumb_padding_bottom['padding-bottom'];

		}			
	}
	//page title color
	if(!empty($page_title_color)){
			$$page_title_color= $page_title_color;
	}	
	//page title color
	if(!empty($page_title_font_size)){
			$page_title_font_size = $page_title_font_size;
	}
	 //container width
		$container_width='';
		if(isset($ftagementor_opt['ftagementor_layout_page'])){
		   $container_width = $ftagementor_opt['ftagementor_layout_page'];
		}
	 //container width
		$boxlayout_box_width='';
		$boxlayout_container_width ='';
		if(isset($ftagementor_opt['ftagementor_boxlayout_box_width'])){
		   $boxlayout_box_width = $ftagementor_opt['ftagementor_boxlayout_box_width'];
		   $boxlayout_container_width = $boxlayout_box_width;	
		}	

	  //scroll button bg
	  $scroll_bg = $scroll_button_enable_disable = $scroll_to_top_on_off ='';
	  if(isset($ftagementor_opt['ftagementor_scroll_button_color'])){
	   $scroll_bg = $ftagementor_opt['ftagementor_scroll_button_color'];
	  }	

	  if(isset($ftagementor_opt['ftagementor_scroll_button_enable_disable'])){
	   $scroll_button_enable_disable = $ftagementor_opt['ftagementor_scroll_button_enable_disable'];
	  }	
	  $scroll_to_top_on_off = ( '1' == $scroll_button_enable_disable ) ? 'block' : 'none' ;

	  //pgination bg color
	  $pagination_bg='';
	  if(isset($ftagementor_opt['ftagementor_blog_pagination_color'])){
	   $pagination_bg = $ftagementor_opt['ftagementor_blog_pagination_color'];
	  }		
	   //header top text hover
	   $headerText_hover='';
	  if(isset($ftagementor_opt['ftagementor_top_link_colors_hover']) ){
	   $headerText_hover = $ftagementor_opt['ftagementor_top_link_colors_hover'];
	  }	
	   //main menu font hover
	   $submenu_hover='';
	  if(isset($ftagementor_opt['ftagementor_submenu_hover_colors']) ){
	   $submenu_hover = $ftagementor_opt['ftagementor_submenu_hover_colors'];
	  }	
	   //main menu font hover
	   $menu_hover='';
	  if(isset($ftagementor_opt['ftagementor_menu_hover_colors']) ){
	   $menu_hover = $ftagementor_opt['ftagementor_menu_hover_colors'];
	  }	
	   //main menu padding
	   $menu_item_spacing='';
	  if(isset($ftagementor_opt['ftagementor_menu_item_spacing'])){
	   $menu_item_spacing = $ftagementor_opt['ftagementor_menu_item_spacing'];
	  }	
	   //dorpdown menu
	   $dropdown_width='';
	  if(isset($ftagementor_opt['ftagementor_menu_dropdownwidth']) ){
	   $dropdown_width = $ftagementor_opt['ftagementor_menu_dropdownwidth'];
	  }	
	   //dorpdown menu bg
	   $dropdown_bg='';
	  if(isset($ftagementor_opt['ftagementor_submenu_background_color']) ){
	   $dropdown_bg = $ftagementor_opt['ftagementor_submenu_background_color'];
	  }	
	   //dorpdown menu padding
	   $dropdown_padding='';
	  if($ftagementor_opt['ftagementor_dropdown_item_padding']){
	   $dropdown_padding = $ftagementor_opt['ftagementor_dropdown_item_padding'];
	   $dropdown_padding = '.primary-nav-wrap .sub-menu  li > a{height:'.$dropdown_padding.'px; line-height:'.$dropdown_padding.'px}';
	  }	
	   //breadcrumbs font size
	  $breadcrumb_font ='';
	  if(isset($ftagementor_opt['ftagementor_breadcrumbs_font_size']) ){
	   $breadcrumb_font = $ftagementor_opt['ftagementor_breadcrumbs_font_size'];
	  }
	   //breadcrumbs font size
	  $breadcrumb_font_hover ='';
	  if(isset($ftagementor_opt['ftagementor_breadcrumbs_text_hover_blog']) ){
	   $breadcrumb_font_hover = $ftagementor_opt['ftagementor_breadcrumbs_text_hover_blog'];
	  }	
	   //breadcrumbs Mobile Height
	  $ftagementor_breadcrumbs_mobile_height_value ='';
	  $ftagementor_breadcrumbs_mobile_padding_top = '';
	  $ftagementor_breadcrumbs_mobile_padding_bottom = '';
	  if(isset($ftagementor_opt['ftagementor_breadcrumbs_mobile_height']) ){
	   $ftagementor_breadcrumbs_mobile_height_value = $ftagementor_opt['ftagementor_breadcrumbs_mobile_height'];
	   $ftagementor_breadcrumbs_mobile_padding_top = $ftagementor_breadcrumbs_mobile_height_value['padding-top'];
	   $ftagementor_breadcrumbs_mobile_padding_bottom = $ftagementor_breadcrumbs_mobile_height_value['padding-bottom'];
	  }	
	  //blog banner text color
	   $ftagementor_post_banner_position='';
	  if(isset($ftagementor_opt['ftagementor_bolg_title_position']) ){
	   $ftagementor_post_banner_position = $ftagementor_opt['ftagementor_bolg_title_position'];
	  }
	  //page padding
	  if ( isset( $page_padding ) && !empty( $page_padding ) ) {
			$page_padding = '.page-area{padding:'.$page_padding.'px 0px}';
		}		
	 //breadcrumbs font
	  $breadcrumb_color ='';
	  if(isset($ftagementor_opt['ftagementor_breadcrumbs_font_blog']) ){
	   $breadcrumb_color = $ftagementor_opt['ftagementor_breadcrumbs_font_blog'];
	  }	
        $custom_css = "
			.wide-layout .container {
				width:{$container_width}px;
			 }
			.site-wrapper.boxed-layout, .boxed-layout .sticky{
			    max-width: {$boxlayout_box_width}px;
			}

			.site-wrapper.boxed-layout .container, 
			.boxed-layout .sticky .container{
			    width: calc( {$boxlayout_container_width}px - 30px );
			}


			a#scrollUp {
				background-color: {$scroll_bg};
				border-color:{$scroll_bg};
			}
			a#scrollUp {
			    display: {$scroll_to_top_on_off} !important;
			}

			.breadcrumbs-area .breadcrumbs h1.page-title{
				color:{$page_title_color} !important;
				font-size:{$page_title_font_size}px !important;
				
			}
			.breadcrumbs-area{
				padding-top:{$breadcrumb_padding_top_value}px;
				padding-bottom:{$breadcrumb_padding_bottom_value}px;
				
			}

			section.breadcrumbs-area::before {
			    background: {$breadcrumb_bg_overlay_color_value} none repeat scroll 0 0;
			    opacity: {$breadcrumb_overlay_opacity_value};
			}

			.breadcrumb-text{
				text-align:{$ftagementor_post_banner_position};
			}
			.breadcrumbs ul, .breadcrumbs ul li a, .breadcrumbs ul li {
			    color:{$breadcrumb_color};
			    font-size:{$breadcrumb_font}px;
			}
			
			.breadcrumbs ul li a:hover {
			  color:{$breadcrumb_font_hover};
			}
			.post-pagination ul li:hover a, 
			.post-pagination ul li .current{
			  background: {$pagination_bg};
			  border-color:{$pagination_bg};
			}

			.top-bar-left-menu ul li a:hover{
				color:{$headerText_hover};
			}
			.primary-nav-wrap ul li + li {
			  margin-left:{$menu_item_spacing}px;
			}
			.main-menu .menu li a:hover, .main-menu .menu li.current_page_item a{
			  color: {$menu_hover};
			}
			.primary-nav-wrap .sub-menu {
			  width:{$dropdown_width}px;
			  background-color:{$dropdown_bg};
			}

			$dropdown_padding

			.main-menu .menu li .sub-menu li a:hover{
				color:{$submenu_hover};
			}
			$page_padding
			.footer-top-area::before {
			    background: {$footer_bg_overlay_color_value} none repeat scroll 0 0;
			    opacity: {$footer_overlay_color_opacity};
			}

			
			@media (max-width: 767px) {
				.breadcrumbs-area{
					padding-top: {$ftagementor_breadcrumbs_mobile_padding_top };
					padding-bottom: {$ftagementor_breadcrumbs_mobile_padding_bottom };
				}


			}
 

			";
	
        wp_add_inline_style( 'ftagementor-inline-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'ftagementor_styles_method',200 );