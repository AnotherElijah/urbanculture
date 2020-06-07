<?php

/**
* Get Custom Post Type 
*/
function ftagementorget_posttype_options($argument) {
    $get_post_args = array(
        'post_type' => $argument,
    );
    $options = array();
    array_push( $options, esc_html__( '--- Select ---', 'ftagementor' ) );
    foreach ( get_posts( $get_post_args ) as $post ) {
        $title = get_the_title( $post->ID );
        $options[$post->ID] =  $title;
    }
    return $options;
}

/**
* Start Meta fields
*/
add_filter( 'cmb2_init', 'ftagementor_metaboxes' );
function ftagementor_metaboxes() {
	$prefix = '_ftagementor_';

	/**
	* Post Format
	*/
	$posts_format = new_cmb2_box( array(
		'id'           		 => $prefix . '_ftagementor_post_format_optons',
		'title'        		 => esc_html__( 'Post Format Additional Fields', 'ftagementor' ),
		'object_types' 		 => array('post'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	) );

	$posts_format->add_field( array(
		'name'               => esc_html__( 'Video URL', 'ftagementor' ),
		'id'                 => $prefix.'video_url',
		'type'        		 => 'oembed',
	) );
	$posts_format->add_field( array(
		'name'               => esc_html__( 'Upload Video', 'ftagementor' ),
		'desc'				 => esc_html__( 'Use this option when the video does not come from URL', 'ftagementor' ),
		'id'                 => $prefix.'local_video_url',
		'type'        		 => 'file',
		'text'    			 => array(
			'add_upload_file_text' => esc_html__( 'Upload Video', 'ftagementor' ),
		),
	) );

	$posts_format->add_field( array(
		'name'               => esc_html__( 'Audio URL', 'ftagementor' ),
		'desc'    			 => esc_html__( 'Insert your Audio file URL', 'ftagementor' ),
		'id'                 => $prefix.'audio_url',
		'type'        		 => 'oembed',
	) );

	$posts_format->add_field( array(
		'name'               => esc_html__( 'Quote Cite', 'ftagementor' ),
		'desc'    			 => esc_html__( 'Insert your Cite', 'ftagementor' ),
		'id'                 => $prefix.'city_text',
		'type'        		 => 'text',
	) );

	$posts_format->add_field( array(
		'name'               => esc_html__( 'Gallery Slider', 'ftagementor' ),
		'id'                 => $prefix.'gallery_slider',
		'type'        		 => 'file_list',
		'preview_size' 		 => array( 150, 150 ),
	) );

	/** 
	* Post Extra Options
	*/
	$posts = new_cmb2_box( array(
		'id'           		 => $prefix . '_ftagementor_post_extra_optons',
		'title'        		 => esc_html__( 'Post Settings', 'ftagementor' ),
		'object_types' 		 => array('post'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	) );

	$posts->add_field( array(
		'name'               =>  esc_html__( 'Select Page Layout', 'ftagementor' ),
		'id'                 => $prefix.'post_layout',
		'type'        		 => 'select',
		'default'     		 => 'default',
		'options'     		 => array(
			''     	 		=> esc_html__( 'Select Layout', 'ftagementor' ),
			'full'     	 	=> esc_html__( 'Full Width', 'ftagementor' ),
			'left'       	=> esc_html__( 'Left Sidebar', 'ftagementor' ),
			'right'       	=> esc_html__( 'Right Sidebar', 'ftagementor' ),
		),
	) );

	/**
	* Start Page options [tab]
	*/
	$page_metabox_options = array(
		'id'           		 => $prefix . '_page_optons',
		'title'        		 => esc_html__( 'Page Options', 'ftagementor' ),
		'object_types' 		 => array('post', 'page'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	);

	// Setup meta box
	$page_options = new_cmb2_box( $page_metabox_options );


	// Setting tabs
	$tabs_setting      = array(
		'config' 	=> $page_metabox_options,
		'layout' 	=> 'vertical', // Default : horizontal
		'tabs'  	=> array()
	);

	// Page Tab
	$tabs_setting['tabs'][] = array(
		'id'     => $prefix.'page',
		'title'  => esc_html__( 'Page', 'ftagementor' ),
		'fields' => array(
			array(
				'name'    		=> esc_html__( 'Layout Width', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Select the site layout. if the default is chosen the theme options will work.', 'ftagementor' ),
				'id'      		=> $prefix.'layout_width',
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'default' 				=> esc_html__( 'Default', 'ftagementor' ),
					'boxed' 		=> esc_html__( 'Boxed', 'ftagementor' ),
					'full-width' 	=> esc_html__( 'Full Width', 'ftagementor' ),
				),
				'default' 		=> 'default',
			),
			array(
				'id'      		=> $prefix.'content_padding',
				'name'    		=> esc_html__( 'Content Padding', 'ftagementor' ),
				'type'    		=> 'padding',
			),
			array(
				'id'      		=> $prefix.'page_background',
				'name'    		=> esc_html__( 'Background', 'ftagementor' ),
				'type'    		=> 'background',
			),
		)
	);
	// Header Tab
	$tabs_setting['tabs'][] = array(
		'id'     => $prefix.'header',
		'title'  => esc_html__( 'Header', 'ftagementor' ),
		'fields' => array(
			array(
				'id'      		=> $prefix.'enable_topbar',
				'name'    		=> esc_html__( 'Top Bar', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Enable or disable top bar. if the default is chosen the theme options will work.', 'ftagementor' ),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'default' 	=> esc_html__( 'Default', 'ftagementor' ),
					'yes' 		=> esc_html__( 'Yes', 'ftagementor' ),
					'no' 		=> esc_html__( 'No', 'ftagementor' ),
				),
				'default' 		=> 'default',
			),
			array(
				'id'      		=> $prefix.'enable_header',
				'name'    		=> esc_html__( 'Enable Header', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Enable or disable header. if the default is chosen the theme options will work.', 'ftagementor' ),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'default' 	=> esc_html__( 'Default', 'ftagementor' ),
					'yes' 		=> esc_html__( 'Yes', 'ftagementor' ),
					'no' 		=> esc_html__( 'No', 'ftagementor' ),
				),
			),
			array(
			    'id' 			=> $prefix . 'select_header_style_type',
			    'name' 			=> esc_html__( 'Header Type', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Select header type, if the default is chosen the existing options below will work, or choose the custom option to get headers from header post type.', 'ftagementor' ),
			    'type' 			=> 'radio_inline',
			    'options'         => array(
                    'default'     => esc_html__('Default','ftagementor'),
                    'custom'      => esc_html__('Custom','ftagementor'),
                ),
                'attributes' => array(
			    	'data-conditional-id'    => $prefix . 'enable_header',
			    	'data-conditional-value' => 'yes',
			    ),
			),
			array(
				'id' 		=> $prefix.'header_default_layout_style',
				'name' 		=> esc_html__( 'Header Layout', 'ftagementor' ),
				'desc' 		=> esc_html__( 'Choose the header layout.', 'ftagementor'),
				'type' 		=> 'image_select',
				'options' => array(
				    'style_1' => array(
				    	'title'		=> 'Header Layout One', 
				    	'alt' 		=> 'Header Layout One', 
				    	'img' 		=> get_template_directory_uri(). '/images/optionframework/header/style1.png'
				    ),
				    'style_2' => array(
				    	'title' 	=> 'Header Layout Two', 
				    	'alt' 		=> 'Header Layout Two', 
				    	'img' 		=> get_template_directory_uri(). '/images/optionframework/header/style2.png'
				    ),
				    'style_3' => array(
				    	'title' 	=> 'Header Layout Three', 
				    	'alt' 		=> 'Header Layout Three', 
				    	'img' 		=> get_template_directory_uri(). '/images/optionframework/header/style3.png'
				    )
				),
				'default' => '',
				'attributes' => array(
			    	'data-conditional-id'    => $prefix . 'select_header_style_type',
			    	'data-conditional-value' => 'default',
			    ),
			),
			array(
			    'id' 			=> $prefix . 'select_menu',
			    'name' 			=> esc_html__( 'Select Menu', 'ftagementor' ),
			    'desc' 			=> esc_html__( 'Override the primary menu by selecting one of these. if nothing is selected primary menu will work.', 'ftagementor' ),
			    'type' 			=> 'select',
			    'options' 		=> ftagementor_get_terms_gb('nav_menu'),
			    'attributes' => array(
			    	'data-conditional-id'    => $prefix . 'select_header_style_type',
			    	'data-conditional-value' => 'default',
			    ),
			),
			array(
			    'id' 			=> $prefix . 'select_header_template',
			    'name' 			=> esc_html__( 'Select Header Style', 'ftagementor' ),
			    'desc' 			=> esc_html__( 'Select the header template/style that you made in the header post type.', 'ftagementor' ),
			    'type' 			=> 'select',
			    'options' 		=> ftagementorget_posttype_options('ftagementor_header'),
			    'attributes' => array(
			    	'data-conditional-id'    => $prefix . 'select_header_style_type',
			    	'data-conditional-value' => 'custom',
			    ),
			),
			array(
			    'id' 			=> $prefix . 'header_full_width',
			    'name' 			=> esc_html__( 'Header Full Width', 'ftagementor' ),
			    'desc' 			=> esc_html__( 'Enable full width of the header.', 'ftagementor' ),
			    'type' 			=> 'radio_inline',
			    'options'         => array(
                    'yes'     => esc_html__('Yes','ftagementor'),
                    'no'      => esc_html__('No','ftagementor'),
                ),
                'attributes' => array(
			    	'data-conditional-id'    => $prefix . 'select_header_style_type',
			    	'data-conditional-value' => 'default',
			    ),
			),
			
		array(
				'id'      		=> $prefix.'header_custome_width',
				'name'    		=> esc_html__( 'Header Custom Width', 'ftagementor' ),
				'type'    		=> 'text',
			),


		)
	);
	// Page Title Wrapper
	$tabs_setting['tabs'][] = array(
		'id'     => $prefix.'title_wrapper',
		'title'  => esc_html__( 'Title Wrapper', 'ftagementor' ),
		'fields' => array(
			array(
				'id'      		=> $prefix.'title_wrapper_enable',
				'name'    		=> esc_html__( 'Title Wrapper Enable', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Enable or Disable the page title area.', 'ftagementor' ),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'yes' 		=> esc_html__( 'Yes', 'ftagementor' ),
					'no' 		=> esc_html__( 'No', 'ftagementor' ),
				)
			),
			array(
				'id'      		=> $prefix.'title_enable',
				'name'    		=> esc_html__( 'Title Enable', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Enable or Disable the page title.', 'ftagementor' ),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'yes' 		=> esc_html__( 'Yes', 'ftagementor' ),
					'no' 		=> esc_html__( 'No', 'ftagementor' ),
				),
			),
			array(
				'id'                 => $prefix .'custom_title',
				'name'               => esc_html__( 'Custom Title', 'ftagementor' ),
				'desc'               => esc_html__( 'If this field is empty, then default page/post title will be showed', 'ftagementor' ),
				'type'               => 'text',
				'attributes' => array(
			     	'data-conditional-id'    => $prefix . 'title_enable',
			     	'data-conditional-value' => 'yes',
			    ),
			),
			array(
				'id'                 => $prefix .'title_typography',
				'name'               => esc_html__( 'Title Typography', 'ftagementor' ),
				'desc'               => esc_html__( 'Controls the typography settings of the page title.', 'ftagementor' ),
				'type'               => 'typography',
				'attributes' => array(
			     	'data-conditional-id'    => $prefix . 'title_enable',
			     	'data-conditional-value' => 'yes',
			    ),
			),
			array(
				'id'      		=> $prefix.'sub_title_enable',
				'name'    		=> esc_html__( 'Sub Title Enable', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Enable or Disable the page subtitle.', 'ftagementor' ),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'yes' 		=> esc_html__( 'Yes', 'ftagementor' ),
					'no' 		=> esc_html__( 'No', 'ftagementor' ),
				),
			),
			array(
				'id'                 => $prefix .'custom_sub_title',
				'name'               => esc_html__( 'Custom Sub Title', 'ftagementor' ),
				'desc'               => esc_html__( 'Set the custom sub title of the page.', 'ftagementor' ),
				'type'               => 'wysiwyg',
				'options' 			 => array(
					'wpautop'    => 	false,
					'textarea_rows'    => 	get_option('default_post_edit_rows', 10),
				),
				'attributes' => array(
			     	'data-conditional-id'    => $prefix.'sub_title_enable',
			     	'data-conditional-value' => 'yes',
			    ),
			),
			array(
				'id'                 => $prefix .'sub_title_typography',
				'name'               => esc_html__( 'Sub Title Typography', 'ftagementor' ),
				'desc'               => esc_html__( 'Controls the typography settings of the page subtitle.', 'ftagementor' ),
				'type'               => 'typography',
				'attributes' => array(
			     	'data-conditional-id'    => $prefix.'sub_title_enable',
			     	'data-conditional-value' => 'yes',
			    ),
			),
			array(
				'id'      		=> $prefix.'breadcrumbs_enable',
				'name'    		=> esc_html__( 'Breadcrumbs Enable', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Enable or Disable the breadcrumbs.', 'ftagementor' ),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'yes' 		=> esc_html__( 'Yes', 'ftagementor' ),
					'no' 		=> esc_html__( 'No', 'ftagementor' ),
				),
			),
			array(
				'id'      		=> $prefix.'breadcrumbs_enable_on_phone',
				'name'    		=> esc_html__( 'Breadcrumbs Mobile Devices Enable', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Enable or disable to display breadcrumb on mobile devices.', 'ftagementor' ),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'yes' 		=> esc_html__( 'Yes', 'ftagementor' ),
					'no' 		=> esc_html__( 'No', 'ftagementor' ),
				),
				'default' 		=> 'yes',
			),
			array(
				'id'                 => $prefix .'breadcrumbs_separator',
				'name'               => esc_html__( 'Breadcrumb Separator', 'ftagementor' ),
				'desc'               => esc_html__( 'Set the breadcrumb separator here.', 'ftagementor' ),
				'type'               => 'text',
			),
			array(
				'id'                 => $prefix .'breadcrumbs_typography',
				'name'               => esc_html__( 'Breadcrumbs Typography', 'ftagementor' ),
				'desc'               => esc_html__( 'Controls the typography settings of the page breadcrumbs.', 'ftagementor' ),
				'type'               => 'typography',
			),
			array(
				'id'                 => $prefix .'title_wrapper_content_aligment',
				'name'               => esc_html__( 'Content Alignment', 'ftagementor' ),
				'desc'               => esc_html__( 'Controls the content alignment of the page title. if the default is chosen the theme options will work.', 'ftagementor' ),
				'type'               => 'radio_inline',
				'options' 			=> array(
					'text-default' 		=> esc_html__( 'Default', 'ftagementor' ),
					'text-left' 		=> esc_html__( 'Left', 'ftagementor' ),
					'text-center' 		=> esc_html__( 'Center', 'ftagementor' ),
					'text-right' 		=> esc_html__( 'Right', 'ftagementor' ),
				),
				'default' 		=> 'text-default',
			),
			array(
				'id'                 => $prefix .'title_wrapper_full_width',
				'name'               => esc_html__( 'Title Wrapper Full Width', 'ftagementor' ),
				'desc'               => esc_html__( 'Enable to have the page title area display at 100% width according to the window size. Turn off to follow site width.', 'ftagementor' ),
				'type'               => 'radio_inline',
				'options' 		=> array(
					'default' 	=> esc_html__( 'Default', 'ftagementor' ),
					'yes' 		=> esc_html__( 'Yes', 'ftagementor' ),
					'no' 		=> esc_html__( 'No', 'ftagementor' ),
				),
				'default' 		=> 'default',
			),
			array(
				'id'                 => $prefix .'title_wrapper_height',
				'name'               => esc_html__( 'Title Wrapper Height', 'ftagementor' ),
				'type'               => 'select',
				'options'               => array(
                    'default-height'         => esc_html__('Default','ftagementor'),
                    'half-height'            => esc_html__('Half Height','ftagementor'),
                    'full-height'            => esc_html__('Full Height','ftagementor'),
                ), 
                'default'               => 'default-height',
			),
			array(
				'id'                 => $prefix .'title_wrapper_padding',
				'name'               => esc_html__( 'Title Wrapper Padding', 'ftagementor' ),
				'desc'               => esc_html__( 'Controls the height of the page title area. Enter value excluding any valid CSS unit, ex: 100', 'ftagementor' ),
				'type'               => 'padding',
			),
			array(
				'id'                 => $prefix .'title_wrapper_padding_on_phone',
				'name'               => esc_html__( 'Title Wrapper Padding On Phone', 'ftagementor' ),
				'desc'               => esc_html__( 'Controls the height of the page title area on mobile device. Enter value excluding any valid CSS unit, ex: 80', 'ftagementor' ),
				'type'               => 'padding',
			),
			array(
				'id'                 => $prefix .'title_wrapper_background',
				'name'               => esc_html__( 'Title Wrapper Background', 'ftagementor' ),
				'desc'               => esc_html__( 'Controls the background of the page title area.', 'ftagementor' ),
				'type'               => 'background',
			),
			array(
				'id'                 => $prefix .'title_wrapper_overlay',
				'name'               => esc_html__( 'Title Wrapper Overlay', 'ftagementor' ),
				'desc'               => esc_html__( 'Controls the background overlay of the page title area.', 'ftagementor' ),
				'type'               => 'hash_colorpicker',
			),

		)
	);

	// Footer Tab
	$tabs_setting['tabs'][] = array(
		'id'     => $prefix.'footer',
		'title'  => esc_html__( 'Footer', 'ftagementor' ),
		'fields' => array(
			array(
				'id'      		=> $prefix.'footer_enable',
				'name'    		=> esc_html__( 'Footer', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Enable or disable footer. if the default is chosen the theme options will work.', 'ftagementor' ),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'default' 	=> esc_html__( 'Default', 'ftagementor' ),
					'yes' 		=> esc_html__( 'Yes', 'ftagementor' ),
					'no' 		=> esc_html__( 'No', 'ftagementor' ),
				),
			),
			array(
				'id'      		=> $prefix.'select_footer_style_type',
				'name'    		=> esc_html__( 'Footer Type', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Select footer type, if the default is chosen the existing design will work, or choose the custom option to get headers from footer post type.', 'ftagementor' ),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'default' 		=> esc_html__( 'Default', 'ftagementor' ),
					'custom' 		=> esc_html__( 'Custom', 'ftagementor' ),
				),
			),
			// Footer Custom Template
			array(
			    'id' 			=> $prefix . 'select_footer_template',
			    'name' 			=> esc_html__( 'Select Footer Style', 'ftagementor' ),
			    'desc' 			=> esc_html__( 'Select the footer template/style that you made in the footer post type.', 'ftagementor' ),
			    'type' 			=> 'select',
			    'options' 		=> ftagementorget_posttype_options('ftagementor_footer'),
			    'attributes' => array(
					'data-conditional-id'    => $prefix . 'select_footer_style_type',
					'data-conditional-value' => 'custom',
				),
			),

		)
	);

	// Set tabs
	$page_options->add_field( array(
		'id'   => $prefix.'tabs',
		'type' => 'tabs',
		'tabs' => $tabs_setting
	) );

	/**
	* Footer Options
	*/
	$footer_options = new_cmb2_box( array(
		'id'           		 => $prefix . '_ftagementor_footer_options',
		'title'        		 => esc_html__( 'Ftage Footer Options', 'ftagementor' ),
		'object_types' 		 => array('ftagementor_footer'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	) );
	$footer_options->add_field( array(
		'id'                 => $prefix . 'fixed_footer_enable',
		'name'               => esc_html__( 'Fixed Footer', 'ftagementor' ),
		'desc'               => esc_html__( 'If yes, this footer will be fixed', 'ftagementor' ),
		'type'    				=> 'radio_inline',
		'options' 				=> array(
			'yes' 				=> esc_html__( 'Yes', 'ftagementor' ),
			'no' 				=> esc_html__( 'No', 'ftagementor' ),
		),
		'default' 				=> 'no',
	) );

	/**
	* Header Options
	*/
	$header_options = new_cmb2_box( array(
		'id'           		 => $prefix . '_ftagementor_header_options',
		'title'        		 => esc_html__( 'Ftage Header Options', 'ftagementor' ),
		'object_types' 		 => array('ftagementor_header'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	) );
	$header_options->add_field( array(
		'id' 			=> $prefix . 'header_sticky',
		'name' 			=> esc_html__( 'Header Sticky', 'ftagementor' ),
		'desc'               => esc_html__( 'If yes, this header will be sticky', 'ftagementor' ),
		'type' 			=> 'radio_inline',
		'options'         => array(
		    'yes'     => esc_html__('Yes','ftagementor'),
		    'no'      => esc_html__('No','ftagementor'),
		),
		'default' 				=> 'no',
	) );
	$header_options->add_field( array(
		'id' 			=> $prefix . 'header_transparent',
		'name' 			=> esc_html__( 'Transparent Header', 'ftagementor' ),
		'desc'               => esc_html__( 'If yes, to make the header area transparent', 'ftagementor' ),
		'type' 			=> 'radio_inline',
		'options'         => array(
		    'yes'     => esc_html__('Yes','ftagementor'),
		    'no'      => esc_html__('No','ftagementor'),
		),
		'default' 				=> 'no',
	) );





//===================================
//Services Metaboxes
//===================================
		$service = new_cmb2_box( array(
			'id'            => $prefix . 'service',
			'title'         => esc_html__( 'Service Option', 'ftagementor' ),
			'object_types'  => array( 'services'), // Post type
			'priority'   => 'high',
			) );

		$service->add_field( array(
				'id'      		=> $prefix.'service_icon_type',
				'name'    		=> esc_html__( 'Slect Icon Type', 'ftagementor' ),
				'desc'    		=> esc_html__( 'Select Icon  Or Image for Service', 'ftagementor' ),
				'type'    		=> 'radio_inline',
				'default'		=>'icon',
				'options' 		=> array(
					'icon' 		=> esc_html__( 'Icon', 'ftagementor' ),
					'image' 		=> esc_html__( 'Image', 'ftagementor' ),
				),

			)
			 );

		$service->add_field( array(
			'name'       => esc_html__( 'Icon', 'ftagementor' ),
			'desc'       => esc_html__( 'Insert Icon Name Here', 'ftagementor' ),
			'id'         => $prefix . 'service_icon',
			'type'       => 'text',
			'default' 		=> 'icofont icofont-video-cam',

		    'attributes' => array(
				'data-conditional-id'    => $prefix . 'service_icon_type',
				'data-conditional-value' => 'icon',
			),
			) );


		$service->add_field( array(
			'name'       => esc_html__( 'Icon Image', 'ftagementor' ),
			'desc'       => esc_html__( 'Upload Icon Image Here', 'ftagementor' ),
			'id'         => $prefix . 'service_icon_img',
			'type'       => 'file',

		    'attributes' => array(
				'data-conditional-id'    => $prefix . 'service_icon_type',
				'data-conditional-value' => 'image',
			),
			) );



//===================================
//Team Metaboxes
//===================================
		$team = new_cmb2_box( array(
			'id'            => $prefix . 'team',
			'title'         => esc_html__( 'team Option', 'ftagementor' ),
			'object_types'  => array( 'teams', ), // Post type
			'priority'   => 'high',
			) );
		$team->add_field( array(
			'name'       => esc_html__( 'Designation', 'ftagementor' ),
			'desc'       => esc_html__( 'insert title here', 'ftagementor' ),
			'id'         => $prefix . 'teamdeg',
			'type'       => 'text',
			) );
	// $group_field_id is the field id string, so in this case: $prefix . 'ftagementor'
		$teamgrop = $team->add_field( array(
			'id'          => $prefix . 'teamsicon',
			'type'        => 'group',
			'description' => esc_html__( 'Add Second Icon', 'ftagementor' ),
			'options'     => array(
				'group_title'   => esc_html__( 'Social Icon {#}', 'ftagementor' ), // {#} gets replaced by row number
				'add_button'    => esc_html__( 'Add Another Icon', 'ftagementor' ),
				'remove_button' => esc_html__( 'Remove Icon', 'ftagementor' ),
				'sortable'      => true, // beta
				),
			) );
		$team->add_group_field( $teamgrop, array(
			'name'       => esc_html__( 'Social Icon', 'ftagementor' ),
			'desc'       => esc_html__( 'insert Icon', 'ftagementor' ),
			'id'         => $prefix .'ticon',
			'type'       => 'text',
			) );
		$team->add_group_field( $teamgrop, array(
			'name'       => esc_html__( 'Enter Link', 'ftagementor' ),
			'desc'       => esc_html__( 'insert link here', 'ftagementor' ),
			'id'  => $prefix .'turl',
			'type' => 'text_url',					
			) );


//===================================
//Portfolio Metaboxes
//===================================
		$ftagementor_portfolio = new_cmb2_box( array(
			'id'            => $prefix . 'ftagementor',
			'title'         => __( 'Portfolio Metaboxes', 'ftagementor' ),
			'object_types'  => array( 'ftagem_portfolio', ), // Post type
			'priority'   => 'high',
		) );
	   $ftagementor_portfolio->add_field( array(
		'name'       => esc_html__( 'Popup Video', 'ftagementor' ),
		'desc'       => esc_html__( 'insert video link. ex-www.youtube.com/watch?v=TLnmb07WQ-s', 'ftagementor' ),
		'id'         => $prefix . 'por_video',
		'type'       => 'text_url',
	   ) );

	// $group_field_id is the field id string, so in this case: $prefix . 'ftagementor'
		$ftagementor_pro_group = $ftagementor_portfolio->add_field( array(
			'id'          => $prefix . 'pro_loop',
			'type'        => 'group',
			'description' => esc_html__( 'Add Second Description', 'ftagementor' ),
			'options'     => array(
				'group_title'   => esc_html__( 'Description {Client Name}', 'ftagementor' ), // {#} gets replaced by row number
				'add_button'    => esc_html__( 'Add Another Description', 'ftagementor' ),
				'remove_button' => esc_html__( 'Remove Description', 'ftagementor' ),
				'sortable'      => true, // beta
				),
			) );
		$ftagementor_portfolio->add_group_field( $ftagementor_pro_group, array(
			'name'       => esc_html__( 'Project Icon', 'ftagementor' ),
			'desc'       => esc_html__( 'insert Icon Name', 'ftagementor' ),
			'id'         => $prefix .'pro_icon',
			'default' 		=> 'icofont icofont-video-cam',
			'type'       => 'text',
			) );
		$ftagementor_portfolio->add_group_field( $ftagementor_pro_group, array(
			'name'       => esc_html__( 'Project Description Title', 'ftagementor' ),
			'desc'       => esc_html__( 'Insert Title', 'ftagementor' ),
			'id'         => $prefix .'pro_title',
			'type'       => 'text',
			'default' 		=> 'Client Name:',
			) );
		$ftagementor_portfolio->add_group_field( $ftagementor_pro_group, array(
			'name'       => esc_html__( 'Project Description', 'ftagementor' ),
			'desc'       => esc_html__( 'Insert Description', 'ftagementor' ),
			'id'  => $prefix .'pro_desc',
			'type' => 'text',		
			'default' 		=> 'MOJAK DEYAN',
			) );

}