<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if ( ! class_exists( 'Redux' ) ) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "ftagementor_opt";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );
/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */


$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    'opt_name'             => $opt_name,

    'display_name'         => $theme->get( 'Name' ),
    'display_version'      => $theme->get( 'Version' ),

    'menu_title'           => esc_html__( 'Ftage Options', 'ftagementor' ),
    'page_title'           => esc_html__( 'Ftage Options', 'ftagementor' ),

    'menu_type'            => 'submenu',
    'dev_mode'             => false,

);



// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
    'url'   => 'https://www.facebook.com/devitems',
    'title' => 'Like us on Facebook',
    'icon'  => 'el el-facebook'
);
$args['share_icons'][] = array(
    'url'   => 'https://twitter.com/devitemsllc',
    'title' => 'Follow us on Twitter',
    'icon'  => 'el el-twitter'
);
$args['share_icons'][] = array(
    'url'   => 'https://www.linkedin.com/in/devitems-llc-a87b38106/',
    'title' => 'Find us on LinkedIn',
    'icon'  => 'el el-linkedin'
);
$args['share_icons'][] = array(
    'url'   => 'https://www.behance.net/DevItems',
    'title' => 'Find us on Behance',
    'icon'  => 'el el-behance'
);
$args['share_icons'][] = array(
    'url'   => 'https://dribbble.com/devitems',
    'title' => 'Find us on Dribbble',
    'icon'  => 'el el-dribbble'
);
$args['share_icons'][] = array(
    'url'   => 'https://www.instagram.com/devitems/',
    'title' => 'Find us on Instagram',
    'icon'  => 'el el-instagram'
);

$devitems = 'https://devitems.com';

$args['footer_text'] = wp_kses_post( '<p class="theme_option_footer_text" > Theme developed by <a href=" '. esc_url( $devitems ) .' " target="_blank">Dev Items LLC</a>. Powered by <a href=" '. esc_url( $devitems ) .' " target="_blank">WPHash Framework</a> </p>', 'ftagementor' );

Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

// -> START Basic Fields

/**
* General 
*/
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'General', 'ftagementor' ),
    'id'               => 'ftagementor-general-setting',
    'icon'             => 'el el-adjust-alt',
    'customizer_width' => '500px',
    'fields'           => array( 
        array(
            'id'          => 'ftagementor_primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Theme Color', 'ftagementor'),
            'subtitle'    => esc_html__('Choose your preferred color to change theme main color.', 'ftagementor'),
        ),
        array(
            'id'                    => 'ftagementor_scroll_to_top_enable',
            'type'                  => 'button_set',
            'title'                 => esc_html__('Enable Back To Top', 'ftagementor'),
            'subtitle'              => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'ftagementor'),
            'options'               => array(
                'yes'               => esc_html__('Yes', 'ftagementor'),
                'no'                => esc_html__('No', 'ftagementor'), 
             ), 
            'default'               => 'yes'
        ),
        array(
            'id'                    => 'ftagementor_preloader_enable',
            'type'                  => 'button_set',
            'title'                 => esc_html__('Preloader', 'ftagementor'),
            'subtitle'              => esc_html__('Enable or disable the site preloader.', 'ftagementor'),
            'options'               => array(
                'yes'               => esc_html__('Yes', 'ftagementor'),
                'no'                => esc_html__('No', 'ftagementor'), 
             ), 
            'default'               => 'no'
        ),
        array(
            'id'                    => 'ftagementor_preloader_style',
            'type'                  => 'select',
            'title'                 => esc_html__('Preloader Style', 'ftagementor'),
            'subtitle'              => esc_html__('Choose preloader style.', 'ftagementor'),
            'options'               => array(
                'default'               => esc_html__('Default', 'ftagementor'),
                'style2'                => esc_html__('Style Two', 'ftagementor'), 
             ), 
            'default'               => 'default',
            'required'              => array( 'ftagementor_preloader_enable','equals','yes'),
        ),            
        array(
            'id'                    => 'ftagementor_preloader_background_color',
            'type'                  => 'background',
            'output'                => array('#loading-default, #loading2, #loading3 '),
            'title'                 => esc_html__('Preloader Background', 'ftagementor'),
            'subtitle'              => esc_html__('Pick a background color for body.', 'ftagementor'),
            'background-color'      => true,
            'background-image'      => false,
            'background-attachment' => false,
            'background-position'   => false,
            'background-size'       => false,
            'background-repeat'     => false,
            'preview'               => false,
            'required'              => array( 'ftagementor_preloader_enable','equals','yes'),
        ),         
        array(
            'id'                    => 'ftagementor_preloader_element_color',
            'type'                  => 'color',
            'title'                 => esc_html__('Preloader Icon color', 'ftagementor'),
            'subtitle'              => esc_html__('Pick color for preloader icon.', 'ftagementor'),
            'required'              => array( 'ftagementor_preloader_enable','equals','yes'),
        ),
    ) 
) );

/**
* layout
*/
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Layout Settings', 'ftagementor' ),
    'id'               => 'ftagementor_layout',
    'customizer_width' => '400px',
    'icon'             => 'el el-website',
    'fields'           => array(
            array(
                'id'                    => 'ftagementor_layout_width',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Theme Layout', 'ftagementor'),
                'subtitle'              => esc_html__('Select the site layout.', 'ftagementor'),
                'options'               => array(
                    'wide-layout'       => esc_html__('Full Width',  'ftagementor'),
                    'boxed-layout'      => esc_html__('Boxed', 'ftagementor'), 
                 ), 
                'default'               => 'wide-layout'
            ),
            array(
                'id'                    => 'ftagementor_layout_page',
                'type'                  => 'text',
                'title'                 => esc_html__('Container Width', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the overall site width. Enter value excluding any valid CSS unit, ex: 1170', 'ftagementor'),
                'required'              => array('ftagementor_layout_width','equals','wide-layout'),
            ),
            array(
                'id'                    => 'ftagementor_boxlayout_box_width',
                'type'                  => 'text',
                'required'              => array('ftagementor_layout_width','equals','boxed-layout'),
                'title'                 => esc_html__('Site Width For Box Layout', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the overall site width. Enter value excluding any valid CSS unit, ex: 1170', 'ftagementor'),
            ),
            array(
                'id'                    => 'ftagementor_enable_page_content_full_width',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Page Content Full Width', 'ftagementor'),
                'subtitle'              => esc_html__('Select yes to set the content area to 100% of the browser width.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Yes',  'ftagementor'),
                    'no'                => esc_html__('No', 'ftagementor'), 
                 ), 
                'default'               => 'no'
            ),
            array(
                'id'                    => 'ftagementor_page_layout_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__('Page Content Padding', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the top /bottom padding for page content. Enter values including any valid CSS unit, ex: 100px,100px.', 'ftagementor'),
                'mode'                  => 'padding',
                'units'                 => array('em','px'),
                'units_extended'        => false,
            ),
            array(
                'id'                    => 'ftagementor_body_background_color',
                'type'                  => 'background',
                'output'                => array('.site-wrapper.boxed-layout'),
                'title'                 => esc_html__('Box Background', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the  background of the body which is everything below header and above footer.', 'ftagementor'),
                'required'              => array( 'ftagementor_layout_width','equals','boxed-layout'),
            ),
            array(
                'id'                    => 'ftagementor_boxlayout_body_bg',
                'type'                  => 'background',
                'output'                => array('body, body.boxed-layout-active'),
                'title'                 => esc_html__('Body Background', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the background when the site is in box layout.', 'ftagementor'),
            ),

        )
    ) 
);
/**
* Header Panel
*/
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header', 'ftagementor' ),
    'id'               => 'ftagementor_header_panel',
    'icon'             => 'el el-photo',
));
/**
* Header 
*/
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'General', 'ftagementor' ),
    'id'         => 'header_id',
    'subsection' => true,
    'icon'       =>'el el-photo',
    'fields'     => array(

            array(
                'id'                        => 'ftagementor_enable_header',
                'type'                      => 'switch',
                'title'                     => esc_html__( 'Header', 'ftagementor' ),
                'subtitle'                  => esc_html__( 'Enable or disable the header area.','ftagementor' ),
                'default'                   => true,
            ),
            array(
                'id'                        => 'ftagementor_select_header_style_type',
                'title'                     => esc_html__('Header Type','ftagementor'),
                'subtitle'                     => esc_html__('Select header type, if the default is chosen the existing options below will work, or choose the custom option to get headers from header post type.','ftagementor'),
                'type'                      => 'button_set',
                'options'                   => array(
                    'default'               => esc_html__('Default','ftagementor'),
                    'custom'                => esc_html__('Custom','ftagementor'),
                ),
                'default'                   => 'default'
            ),
            // Header Custom Style
            array(
                'id'                    => 'ftagementor_select_header_template',
                'type'                  => 'select',
                'title'                 => esc_html__('Header Template', 'ftagementor'),
                'subtitle'              => esc_html__('Choose the header template where you created headers from the header post type.', 'ftagementor'),
                'data'                  => 'posts',
                'args'                  => array(
                    'post_type'             => 'ftagementor_header',
                ),
                'required'                  => array('ftagementor_select_header_style_type','equals', 'custom'),
            ),
            array(
                'id'                    => 'ftagementor_header_default_style',
                'title'                 => esc_html__('Default Header Layout', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the default header layout.', 'ftagementor'),
                'type'                  => 'image_select',
                'options'               => array(
                    'style_1'           => array(
                        'title'         => esc_html__('Header Layout One', 'ftagementor'),
                        'img'           => get_template_directory_uri().'/images/optionframework/header/style1.png',
                    ),
                    'style_2'           => array(
                        'title'         => esc_html__('Header Layout Two', 'ftagementor'),
                        'img'           => get_template_directory_uri().'/images/optionframework/header/style2.png',
                    ),
                    'style_3'           => array(
                        'title'         => esc_html__('Header Layout Three', 'ftagementor'),
                        'img'           => get_template_directory_uri().'/images/optionframework/header/style3.png',
                    )
                ),
                'default'               => 'style_1',
                'required'              => array('ftagementor_select_header_style_type','equals', 'default'),
            ),
            array(
                'id'                    => 'ftagementor_select_menu',
                'type'                  => 'select',
                'title'                 => esc_html__('Select Menu', 'ftagementor'),
                'subtitle'              => esc_html__('Override the primary menu by selecting one of these. if nothing is selected primary menu will work.', 'ftagementor'),
                'options'               => ftagementor_get_terms_gb('nav_menu'),
                'required'              => array('ftagementor_select_header_style_type','equals', 'default'),
            ),
            array(
                'id'                    => 'ftagementor_logo_position',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Logo Position','ftagementor'),
                'subtitle'              => esc_html__('Controls the position of the logo.','ftagementor'),
                'options'               => array(
                    'left'              => esc_html__('Left','ftagementor'),
                    'center'            => esc_html__('Center','ftagementor'),
                    'right'             => esc_html__('Right','ftagementor'),
                    'left-top'          => esc_html__('Left Top','ftagementor'),
                    'center-top'        => esc_html__('Center Top','ftagementor'),
                    'right-top'         => esc_html__('Right Top','ftagementor'),
                ), 
                'default'               => 'left',
                'required'                  => array('ftagementor_header_default_style','equals', 'style_1'),
            ),
            array(
                'id'                    => 'ftagementor_header_full_width',
                'type'                  => 'switch',
                'title'                 => esc_html__( 'Header Full Width', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Enable full width of the header. ', 'ftagementor' ),
                'default'               => false,
                'required'                  => array('ftagementor_select_header_style_type','equals', 'default'),
            ),

        array(
          'id'                    => 'ftagementor_header_bg',
          'type'                  => 'color_rgba',
          'background-attachment' => false,
          'background-repeat'     => false,
          'background-size'       => false,
          'background-position'   => false,
          'background-image'      => false,
          'output'                => array('background-color' => '.header-area'),
                'title'                 => esc_html__('Header Background color', 'ftagementor'),
                'subtitle'              => esc_html__('Pick a color to set header area background.', 'ftagementor'),
                'default'               => array( ),
                'required'              => array('ftagementor_select_header_style_type','equals', 'default'),
                'preview'               => false,
        ),

            array(
                'id'                    => 'ftagementor_header_transparent',  
                'type'                  => 'switch',
                'title'                 => esc_html__( 'Header Transparent', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Enable to make the header area transparent.', 'ftagementor' ),
                'default'               => false,
                'required'              => array('ftagementor_select_header_style_type','equals', 'default'),
            ), // output body class
            array(
                'id'                    => 'ftagementor_header_sticky',
                'type'                  => 'switch',
                'title'                 => esc_html__( 'Header Sticky', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Enable to activate the sticky header.', 'ftagementor' ),
                'default'               => false,
                'required'              => array('ftagementor_select_header_style_type','equals', 'default'),
            ),

        )
    ) 
);



/**
* Header top bar panel 
*/
/**
* Header Top bar customization
*/
Redux::setSection( $opt_name, array(
  'title'      => esc_html__( 'Top Bar Customization', 'ftagementor' ),
  'id'         => 'ftagementor_header_topbar_customize',
  'icon'       =>'el el-cogs',
  'subsection' => true,
  'fields'     => array(
        array(
          'id'                    => 'ftagementor_header_show',
          'type'                  => 'switch',
          'title'                 => esc_html__( 'Top Bar', 'ftagementor' ),
          'subtitle'              => esc_html__( 'Turn on if you want to show the top bar area.', 'ftagementor' ),
          'default'               => false,
        ),
        array(
          'id'                    => 'ftagementor_header_top_width',
          'type'                  => 'switch',
          'title'                 => esc_html__( 'Top Bar Full Width', 'ftagementor' ),
          'subtitle'              => esc_html__( 'Turn on if you want the top bar to be of full width.', 'ftagementor' ),
          'default'               => false,
        ),
        array(
          'id'                    => 'ftagementor_header_topbg',
          'type'                  => 'color_rgba',
          'background-attachment' => false,
          'background-repeat'     => false,
          'background-size'       => false,
          'background-position'   => false,
          'background-image'      => false,
          'output'                => array('background-color' => '.header-top-area'),
          'title'                 => esc_html__('Top Bar Background Color', 'ftagementor'),
          'subtitle'              => esc_html__('Controls the background color of the header top bar area( default #1E2127 ).', 'ftagementor'),
          'default'               => array(
              
          )
        ),
        array(
          'id'                    => 'ftagementor_top_text_colors',
          'type'                  => 'color',
          'output'                => array('.top-bar-left-content, .header-info' ),
          'title'                 => esc_html__('Top Bar Text Color', 'ftagementor'),
          'subtitle'              => esc_html__('Controls the color of the top bar text.', 'ftagementor'),
          'transparent'           => false,
        ),
        array(
          'id'                    => 'ftagementor_top_link_colors',
          'type'                  => 'color',
          'output'                => array('.header-info span a, .header-social ul li a, .top-bar-left-content p a, .top-bar-left-menu ul li a, .header-social ul li a' ),
          'title'                 => esc_html__('Top Bar Link Color ', 'ftagementor'),
          'subtitle'              => esc_html__('Controls the link color of the top bar.', 'ftagementor'),
          'transparent'           => false,
         
        ),
        array(
          'id'                    => 'ftagementor_top_link_colors_hover',
          'type'                  => 'color',
          'output'                => array('.header-info span a:hover, .header-social ul li a:hover, .top-bar-left-content p a:hover'),
          'title'                 => esc_html__('Top Bar Link Hover Color', 'ftagementor'),
          'subtitle'              => esc_html__('Controls the link hover color of the top bar.', 'ftagementor'),
          'transparent'           => false,
        ),
        array(
          'id'                    => 'ftagementor_top_bar_padding',
          'type'                  => 'spacing',
          'mode'                  => 'padding',
          'title'                 => esc_html__('Top Bar Padding ', 'ftagementor'),
          'subtitle'              => esc_html__('Controls header top bar padding.', 'ftagementor'),
          'right'                 => false,
          'left'                  => false,
          'output'                => array('.header-top-area'),
          'units'                 => array('em','px'),
        ),
      )
  ) 
);

/**
* Header top bar left
*/
Redux::setSection( $opt_name, array(
  'title'      => esc_html__( 'Top Bar left', 'ftagementor' ),
  'id'         => 'ftagementor_header_left',
  'icon'       =>'el el-arrow-left',
  'subsection' => true,
  'fields'     => array(
          array(
              'id'                    => 'ftagementor_left_content_section',
              'type'                  => 'button_set',
              'title'                 => esc_html__( 'Top Bar Left Content', 'ftagementor' ),
              'subtitle'              => esc_html__( 'Controls the content that displays in the top left section.', 'ftagementor' ),
              'options'               => array(
                  '1'                 => esc_html__('Social Icon','ftagementor'),
                  '2'                 => esc_html__('Left Menu','ftagementor'),      
                  '3'                 => esc_html__('Contact Info','ftagementor'),
                  '4'                 => esc_html__('Content','ftagementor'),
                  '5'                 => esc_html__('Leave Empty','ftagementor'),
              ),
              'default'               => '3'
          ),
          array(
              'id'                    => 'ftagementor_left_contact_info_text',
              'type'                  => 'text',
              'required'              => array('ftagementor_left_content_section','equals','3'),
              'title'                 => esc_html__( 'Contact Text', 'ftagementor' ),
              'subtitle'              => esc_html__( 'This content will display header contact number on top left bar', 'ftagementor' ),
              'default'               => esc_html__( 'Call Us', 'ftagementor' ),
          ),
          array(
              'id'                    => 'ftagementor_left_contact_info',
              'type'                  => 'text',
              'required'              => array('ftagementor_left_content_section','equals','3'),
              'title'                 => esc_html__( 'Contact Number', 'ftagementor' ),
              'subtitle'              => esc_html__( 'This content will display header contact number on top left bar', 'ftagementor' ),
              'default'               => esc_html__( '+0123456789', 'ftagementor' ),
          ),
          array(
              'id'                    => 'ftagementor_left_contact_email',
              'type'                  => 'text',
              'required'              => array('ftagementor_left_content_section','equals','3'),
              'title'                 => esc_html__( 'Email Address', 'ftagementor' ),
              'subtitle'              => esc_html__( 'This content will display header contact email address on top left bar', 'ftagementor' ),
              'default'               => esc_html__( 'info@hashdemo.com', 'ftagementor' ),
          ),
          array(
              'id'                    => 'ftagementor_left_text_area',
              'type'                  => 'editor',
              'required'              => array('ftagementor_left_content_section','equals','4'),
              'title'                 => esc_html__( 'Header Default Text', 'ftagementor' ),
              'subtitle'              => esc_html__( 'This content will display the default text on top left bar', 'ftagementor' ),
              'args'                  => array(
                  'teeny'             => true,
                  'textarea_rows'     => 2
              ),
          ),
      )
  ) 
);
/**
* Header top bar right
*/
Redux::setSection( $opt_name, array(
  'title'      => esc_html__( 'Top Bar Right', 'ftagementor' ),
  'id'         => 'ftagementor_header_right',
  'icon'       =>'el el-arrow-right',
  'subsection' => true,
  'fields'     => array(
          array(
              'id'                    => 'ftagementor_right_contactinfo',
              'type'                  => 'button_set',
              'title'                 => esc_html__( 'Top Bar Right Content', 'ftagementor' ),
              'subtitle'              => esc_html__( 'Controls the content that displays in the top left section.', 'ftagementor' ),
              'options'               => array(
                  '1'                 => esc_html__('Social Icon','ftagementor'),                        
                  '2'                 => esc_html__('Right Menu','ftagementor'),                        
                  '3'                 => esc_html__('Contact Info','ftagementor'),                        
                  '4'                 => esc_html__('Content','ftagementor'),                        
                  '5'                 => esc_html__('Leave Empty','ftagementor'),                        
              ),
              'default'               => '3'
          ),
          array(
              'id'                    => 'ftagementor_right_contact_info_text',
              'type'                  => 'text',
              'required'              => array('ftagementor_right_contactinfo','equals','3'),
              'title'                 => esc_html__( 'Contact Text', 'ftagementor' ),
              'subtitle'              => esc_html__( 'This content will display header contact number on top right bar.', 'ftagementor' ),
              'default'               => esc_html__( 'Call Us', 'ftagementor' ),
          ),
          array(
              'id'                    => 'ftagementor_right_contact_info',
              'type'                  => 'text',
              'required'              => array('ftagementor_right_contactinfo','equals','3'),
              'title'                 => esc_html__( 'Contact Number', 'ftagementor' ),
              'subtitle'              => esc_html__( 'This content will display header contact number on top right bar.', 'ftagementor' ),
              'default'               => esc_html__( '+0123456789', 'ftagementor' ),
          ),
          array(
              'id'                    => 'ftagementor_right_contact_email',
              'type'                  => 'text',
              'required'              => array('ftagementor_right_contactinfo','equals','3'),
              'title'                 => esc_html__( 'Email Address', 'ftagementor' ),
              'subtitle'              => esc_html__( 'This content will display if you have "Contact Info" email.', 'ftagementor' ),
              'default'               => esc_html__( 'info@hashdemo.com', 'ftagementor' ),
          ),
          array(
              'id'                    => 'ftagementor_right_text_area',
              'type'                  => 'editor',
              'required'              => array('ftagementor_right_contactinfo','equals','4'),
              'title'                 => esc_html__( 'Header Default Text', 'ftagementor' ),
              'subtitle'              => esc_html__( 'This content will display the default text on top right bar', 'ftagementor' ),
              'args'                  => array(
                  'teeny'             => true,
                  'textarea_rows'     => 2
              )
          ),
      )
  ) 
);

/**
* Main menu
*/
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Menu', 'ftagementor' ),
    'id'               => 'ftagementormain_menu_options',
    'icon'             => 'el el-lines',
    ) 
);
/**
* Menu typography
*/
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Menu', 'ftagementor' ),
    'id'               => 'ftagementor_menu_typography',
    'icon'             => 'el el-th-list',
    'subsection'       => true,
    'customizer_width' => '500px',
    'fields'           => array(
            array(
                'id'                    => 'ftagementor_menuabt_text',
                'type'                  => 'text',
                'title'                 => esc_html__('About Button Text', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the about more text in the menu which is displayed on the style three menu.','ftagementor'),
                'default'               => esc_html__('About More','ftagementor'),
                'required'              => array('ftagementor_header_default_style', 'equals' ,'style_3'),
            ), 
            array(
                'id'                    => 'ftagementor_menuabt_text_color',
                'type'                  => 'color',
                'title'                 => esc_html__('About Button Color', 'ftagementor'),
                'subtitle'              => esc_html__('Pick an color for menu item.', 'ftagementor'),
                'transparent'           => false,
                'validate'              => 'color',
                'output'                => array('.pro-mre-btn > a',),
                'required'              => array('ftagementor_header_default_style', 'equals' ,'style_3'),
            ),
            array(
                'id'                    => 'ftagementor_menuabt_text_hover',
                'type'                  => 'color',
                'title'                 => esc_html__('Hover Color', 'ftagementor'),
                'subtitle'              => esc_html__('Pick an Hover color for menu item.', 'ftagementor'),
                'transparent'           => false,
                'validate'              => 'color',
                'output'                => array('.pro-mre-btn > a:hover'),
                'required'              => array('ftagementor_header_default_style', 'equals' ,'style_3'),
            ),
            array(
                'id'                    => 'ftagementor_menuabt_text_bg_color',
                'type'                  => 'background',
                'title'                 => esc_html__('About Button Background', 'ftagementor'),
                'subtitle'              => esc_html__('Pick an Background for menu item.', 'ftagementor'),
                'transparent'           => false,
                'validate'              => 'color',
                'output'                => array('.pro-mre-btn > a',),
                'required'              => array('ftagementor_header_default_style', 'equals' ,'style_3'),
            ),
            array(
                'id'                    => 'ftagementor_menuabt_text_bg_hover_color',
                'type'                  => 'background',
                'title'                 => esc_html__('Hover Background', 'ftagementor'),
                'subtitle'              => esc_html__('Pick an Hover for menu item.', 'ftagementor'),
                'transparent'           => false,
                'validate'              => 'color',
                'output'                => array('.pro-mre-btn > a:hover'),
                'required'              => array('ftagementor_header_default_style', 'equals' ,'style_3'),
            ),
            array(
                'id'                    => 'ftagementor_menuabt_text_border_color',
                'type'                  => 'border',
                'title'                 => esc_html__('About Button Border', 'ftagementor'),
                'subtitle'              => esc_html__('Pick an Hover for menu item.', 'ftagementor'),
                'transparent'           => false,
                'output'                => array('.pro-mre-btn > a'),
                'required'              => array('ftagementor_header_default_style', 'equals' ,'style_3'),
            ),
            array(
                'id'                    => 'ftagementor_menuabt_text_border_color_hover',
                'type'                  => 'border',
                'title'                 => esc_html__('About Button Border Hover', 'ftagementor'),
                'subtitle'              => esc_html__('Pick an Hover for menu item.', 'ftagementor'),
                'transparent'           => false,
                'output'                => array('.pro-mre-btn > a:hover'),
                'required'              => array('ftagementor_header_default_style', 'equals' ,'style_3'),
            ),
            array(
                'id'                    => 'ftagementor_menufont',
                'type'                  => 'typography',
                'title'                 => esc_html__('Menus Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the menu.', 'ftagementor'),
                'google'                => true,     
                'subsets'               => false,
                'line-height'           => true,
                'text-transform'        => true,
                'text-align'            => false,
                'all_styles'            => true, 
                'letter-spacing'        => true, 
                'color'                 => false,   
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                )
            ),
            array(
                'id'                    => 'ftagementor_menu_regular_color',
                'type'                  => 'color',
                'title'                 => esc_html__('Regular Color', 'ftagementor'),
                'subtitle'              => esc_html__('Pick a default color for menu item.', 'ftagementor'),
                'transparent'           => false,
                'validate'              => 'color',
                'output'                => array('.primary-nav-wrap nav ul li a',)
            ),
            array(
                'id'                    => 'ftagementor_menu_hover_color',
                'type'                  => 'color',
                'title'                 => esc_html__('Hover Color', 'ftagementor'),
                'subtitle'              => esc_html__('Pick an hover color for menu item.', 'ftagementor'),
                'transparent'           => false,
                'validate'              => 'color',
                'output'                => array('.primary-nav-wrap nav ul > li:hover > a',)
            ),
            array(
                'id'                    => 'ftagementor_menu_active_color',
                'type'                  => 'color',
                'title'                 => esc_html__('Active Color', 'ftagementor'),
                'subtitle'              => esc_html__('Pick an active color for menu item.', 'ftagementor'),
                'transparent'           => false,
                'validate'              => 'color',
                'output'                => array('.primary-nav-wrap nav ul > li.current-menu-item > a')
            ),

           array(
                'id'                    => 'ftagementor_main_menu_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__( 'Menu Item Padding', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Controls the top, right, bottom and left padding of the main menu.', 'ftagementor' ),
                'output'                => array('.primary-nav-wrap nav .menu > li'),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'units'                 => array('em','px'),
                'default'               => array(
                    'padding-top'       => 'px',
                    'padding-right'     => 'px',
                    'padding-bottom'    => 'px',
                    'padding-left'      => 'px',
                    'units'             => 'px',
                    )
            ),
        )
    ) 
);
/**
* Logo Panel
*/
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Logo', 'ftagementor' ),
    'id'               => 'ftagementor_logo_panel',
    'icon'             => 'el el-picture',
));
/**
* Logo
*/
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Logo', 'ftagementor' ),
    'id'               => 'ftagementor_logo',
    'icon'             => 'el el-picture',
    'subsection'       => true,
    'fields'           => array(
            array(
                'id'                    => 'ftagementor_logo_type',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Logo Type','ftagementor'),
                'subtitle'                  => esc_html__('Select logo type, if the image is chosen the existing options of  image below will work, or text option will work.','ftagementor'),
                'options'               => array(
                    'image'                => 'Image',
                    'text'                 => 'Text',
                ),
                'default'               => 'image'
            ),
            array(
                'id'                    => 'ftagementor_head_logo',
                'title'                 => esc_html__('Default Logo','ftagementor'),
                'subtitle'              => esc_html__('Upload the main logo of your site.','ftagementor'),
                'type'                  => 'media',
                'required'              => array('ftagementor_logo_type','equals','image'),
            ),
            array(
                'id'                    => 'ftagementor_retina_default_logo',
                'type'                  => 'media',
                'title'                 => esc_html__('Retina Logo','ftagementor'),
                'subtitle'                 => esc_html__('Upload a logo for the retina version of the logo. It should be exactly 2x the size of the main logo.','ftagementor'),
                'required'              => array('ftagementor_logo_type','equals','image'),
            ),
            array(
                'id'                    => 'ftagementor_logo_max_height',
                'type'                  => 'text',
                'title'                 => esc_html__('Logo Height', 'ftagementor'),
                'subtitle'              => esc_html__('Don\'t include "px" in the string. e.g. 30', 'ftagementor'),
                'validate'              => 'numeric',
                'required'              => array('ftagementor_logo_type','equals','image'),
            ),
            array(
                'id'                    => 'ftagementor_logo_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__( 'Logo Padding', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Controls the top, right, bottom and left padding of the logo.', 'ftagementor' ),
                'output'                => array('.header-menu-wrap .site-title a'),
                'mode'                  => 'padding',
                'units'                 => array('em','px'),
                'default'               => array(
                    'padding-top'       => 'px',
                    'padding-right'     => 'px',
                    'padding-bottom'    => 'px',
                    'padding-left'      => 'px',
                    'units'             => 'px',
                    ),
                'required'              => array('ftagementor_logo_type','equals','image'),
            ),
            array(
                'id'                    => 'ftagementor_logo_text',
                'type'                  => 'text',
                'required'              => array('ftagementor_logo_type','equals','text'),
                'title'                 => esc_html__('Site Title','ftagementor'),
                'desc'                  => esc_html__('Enter your site title here','ftagementor'),
                'default'               => get_bloginfo('name')
            ),
            array(
                'id'                    => 'ftagementor_logo_text_font',
                'type'                  => 'typography',
                'title'                 => esc_html__('Site Title Font Settings', 'ftagementor'),
                'required'              => array('ftagementor_logo_type','equals','text'),
                'google'                => true,     
                'subsets'               => false,
                'line-height'           => false,
                'text-transform'        => true,
                'transition'            => false,
                'text-align'            => false,
                'all_styles'            => true,    
                'output'                => array('.site-title a'), 
                'units'                 => 'px',
                'subtitle'              => esc_html__('Controls the font settings of the site title', 'ftagementor'),
                'default'               => array(
                    'google'            => true,
                )
            ),
            array(
                'id'                    => 'ftagementor_custom_login_logo',
                'type'                  => 'media',
                'title'                 => esc_html__('Login Page Logo','ftagementor'),
                'subtitle'              => esc_html__('Upload an image for login page logo. Upload a 250px X 100px image here to replace the default WordPress login logo.','ftagementor'),
            ),
        )
    ) 
);

/**
* Page Title Panel
*/

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Title Wrapper', 'ftagementor' ),
    'id'               => 'ftagementor_header_title_wrapper_panel',
    'icon'             => 'el el-text-width',
));
/**
* Page Title Wrapper
*/
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Page Title', 'ftagementor' ),
    'id'               => 'ftagementor_header_title_wrapper',
    'icon'             => 'el el-align-center',
    'subsection'       => true,
    'fields'           => array(
            array(
                'id'                    => 'ftagementor_title_wrapper_enable',
                'title'                 => esc_html__('Title Wrapper','ftagementor'),
                'subtitle'              => esc_html__('Enable or Disable the page title area.','ftagementor'),
                'type'                  => 'button_set',
                'options'               => array(
                    'yes'               => esc_html__('Enable','ftagementor'),
                    'no'                => esc_html__('Disable','ftagementor'),
                ),
                'default'               => 'yes',
            ), // action header-page-title 
            array(
                'id'                    => 'ftagementor_title_enable',
                'type'                  => 'button_set',
                'title'                 => esc_html__( 'Title', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Enable or Disable the page title.', 'ftagementor' ),
                'default'               => true,
                'options'               => array(
                    'yes'               => esc_html__('Enable','ftagementor'),
                    'no'                => esc_html__('Disable','ftagementor'),
                ),
                'default'               => 'yes',
            ), // action page-title 
            array(
                'id'                    => 'ftagementor_custom_title',
                'title'                 => esc_html__('Custom Title','ftagementor'),
                'subtitle'              => esc_html__('Set the custom title of the page.','ftagementor'),
                'desc'                  => esc_html__('If this field is empty, then default page/post title will be showed','ftagementor'),
                'type'                  => 'text',
                'required'              => array('ftagementor_title_enable','equals', 'yes'),
            ), // action page-title 
            array(
                'id'                    => 'ftagementor_title_typography',
                'type'                  => 'typography',
                'title'                  => esc_html__('Title Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the page title.', 'ftagementor'),
                'google'                => true,     
                'subsets'               => false,
                'line-height'           => true,
                'text-transform'        => true,
                'letter-spacing'        => true,
                'transition'            => false,
                'text-align'            => false,
                'all_styles'            => true,    
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'                  => array('ftagementor_title_enable','equals', 'yes'),
            ), // action dynamic-css
            array(
                'id'                    => 'ftagementor_sub_title_enable',
                'title'                 => esc_html__('Sub Title','ftagementor'),
                'subtitle'              => esc_html__('Enable or Disable the page sub title.','ftagementor'),
                'type'                  => 'button_set',
                'options'               => array(
                    'yes'               => esc_html__('Enable','ftagementor'),
                    'no'                => esc_html__('Disable','ftagementor'),
                ),
                'default'               => 'yes',
            ), // action page-title
            array(
                'id'                    => 'ftagementor_custom_sub_title',
                'title'                 => esc_html__('Custom Sub Title','ftagementor'),
                'subtitle'              => esc_html__('Set the custom sub title of the page.','ftagementor'),
                'type'                  => 'editor',
                'args'   => array(
                    'teeny'             => false,
                    'textarea_rows'     => 6
                ),
                'default' => '',
                'required'              => array('ftagementor_sub_title_enable','equals', 'yes'),
            ), // action page-title
            array(
                'id'                    => 'ftagementor_sub_title_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Sub Title Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the page sub title.', 'ftagementor'),
                'google'                => true,     
                'subsets'               => false,
                'line-height'           => true,
                'text-transform'        => true,
                'letter-spacing'        => true,
                'transition'            => false,
                'text-align'            => false,
                'all_styles'            => true,    
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'                  => array('ftagementor_sub_title_enable','equals', 'yes'),
            ), // action dynamic-css
            array(
                'id'                    => 'ftagementor_title_content_alignment',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title Alignment','ftagementor'),
                'subtitle'              => esc_html__('Controls the content alignment of the page title','ftagementor'),
                'options'               => array(
                    'text-left'              => esc_html__('left','ftagementor'),
                    'text-center'            => esc_html__('center','ftagementor'),
                    'text-right'             => esc_html__('right','ftagementor'),
                ), 
                'default'               => 'text-center',
            ), 
            array(
                'id'                    => 'ftagementor_title_wrap_fullwidth_enable',
                'type'                  => 'switch',
                'title'                 => esc_html__( 'Title Full Width', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Enable to have the page title area display at 100% width according to the window size. Turn off to follow site width.', 'ftagementor' ),
                'default'               => false,
            ),
            array(
                'id'                    => 'ftagementor_title_wrap_height',
                'type'                  => 'select',
                'title'                 => esc_html__( 'Title Bar Height', 'ftagementor' ),
                'options'               => array(
                    'default-height'    => esc_html__('Default','ftagementor'),
                    'half-height'       => esc_html__('Half Height','ftagementor'),
                    'full-height'       => esc_html__('Full Height','ftagementor'),
                ), 
                'default'               => 'default-height',
            ),
            array(
                'id'                    => 'ftagementor_title_wrap_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__( 'Title Area Padding', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Controls the height of the page title area. Enter value excluding any valid CSS unit, ex: 100', 'ftagementor' ),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'units'                 => array('em', 'px'),
            ),
            array(
                'id'                    => 'ftagementor_title_wrap_padding_on_phone',
                'type'                  => 'spacing',
                'title'                 => esc_html__( 'Title Area Padding on Mobile', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Controls the height of the page title area on mobile device. Enter value excluding any valid CSS unit, ex: 80', 'ftagementor' ),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'units'                 => array('em', 'px'),
            ),
            array(
                'id'                    => 'ftagementor_title_wrap_background',
                'type'                  => 'background',
                'title'                 => esc_html__('Background', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the background option of the page title area.', 'ftagementor'),
            ),
            array(
                'id'                    => 'ftagementor_title_wrap_background_overlay',
                'type'                  => 'color_rgba',
                'title'                  => esc_html__('Background Overlay', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the background overlay color of the page title area.', 'ftagementor'), 
            ),
        )
    ) 
);
/**
* Breadcrumbs Area
*/
Redux::setSection( $opt_name, array(
    'id'            => 'ftagementor_breadcrumb_options',
    'title'         => esc_html__('Breadcrumb','ftagementor'),
    'icon'          => 'el el-forward-alt',
    'subsection'    => true,
    'fields'        => array(
            array(
                'id'                    => 'ftagementor_breadcrumbs_content_blog',
                'type'                  => 'button_set',
                'title'                 => esc_html__( 'Breadcrumb Content', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Controls what displays in the breadcrumb area.', 'ftagementor' ),
                'options'               => array (
                    '1'                 => esc_html__('None','ftagementor'),
                    '2'                 => esc_html__('Breadcrumbs','ftagementor'),
                    '3'                 => esc_html__('Search Box','ftagementor'),
                ),
                'default'               => '2',
            ),
            array(
                'id'                    => 'ftagementor_breadcrumbs_mobile',
                'type'                  => 'switch',
                'title'                 => esc_html__( 'Breadcrumb on Mobile Devices', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Turn on to display breadcrumb on mobile devices.', 'ftagementor' ),
                'default'               => true,
            ),

            array(
                'id'                    => 'ftagementor_breadcrumbs_separator',
                'type'                  => 'text',
                'title'                 => esc_html__('Breadcrumb Separator','ftagementor'),
                'subtitle'              => esc_html__('Set the breadcrumb separator here','ftagementor'),
                'default'               => '-'
            ),
            array(
                'id'                    => 'ftagementor_breadcrumbs_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Breadcrumb Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the breadcrumb.', 'ftagementor'),
                'google'                => true,        
                'subsets'               => false, 
                'word-spacing'          => true, 
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => false,     
                'units'                 => 'px',
                'compiler'              => false,
                'output'              => array('.breadcrumbs_wrap ul, .breadcrumbs_wrap ul li, .breadcrumbs_wrap ul li a' ),
            ),
            array(
                'id'                    => 'ftagementor_breadcrumbs_link_hover_color',
                'title'                 => esc_html__('Breadcrumb Link Hover Color', 'ftagementor'),
                'type'                  => 'color',
                'output'                => array('.breadcrumbs_wrap ul li a:hover'),
             ),
            
        )
    )
);

/**
* Blog Panel
*/
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Blog', 'ftagementor' ),
    'id'               => 'ftagementor_blog',
    'icon'             => 'el el-file-edit',
));

// Blog Options
Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Blog General', 'ftagementor'),
    'id'        => 'ftagementor_blog_genaral',
    'icon'      => 'el el-edit',
    'subsection' => true,
    'fields'    => array(
            array(
                'id'                    => 'ftagementor_blog_title_bar',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title Area', 'ftagementor'),
                'subtitle'              => esc_html__('Enable or Disable the blog page title area.','ftagementor'),
                'options'               => array(
                    'show'              => esc_html__('Show','ftagementor'),
                    'hide'              => esc_html__('hide','ftagementor'),
                ),
                'default'               => 'show',
            ),
            array(
                'id'                    => 'ftagementor_enable_blog_title',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title', 'ftagementor'),
                'subtitle'              => esc_html__('Enable or Disable the blog page title.','ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Enable','ftagementor'),
                    'no'                => esc_html__('Disable','ftagementor'),
                ),
                'default'               => 'yes',
            ),        
            array(
                'id'                    => 'ftagementor_blog_text',
                'type'                  => 'text',
                'title'                 => esc_html__('Custom Title', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the custom title of the page which is displayed on the page title are on the blog page.','ftagementor'),
                'default'               => esc_html__('Blog','ftagementor'),
                'required'              => array('ftagementor_enable_blog_title', 'equals' ,'yes'),
            ),
            array(
                'id'                    => 'ftagementor_blog_title_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Title Typography', 'ftagementor'),
                'google'                => true,        
                'subsets'               => false, 
                'word-spacing'          => true, 
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => true,    
                'units'                 => 'px',
                'subtitle'              => esc_html__('Controls the typography for the blog page title.', 'ftagementor'),
                'default'               => array(
                    'google'            => true,
                ),
                'output'                => '.blog-page .page__title__inner .page-title',
                'required'              => array('ftagementor_enable_blog_title', 'equals' ,'yes'),
            ),
            array(
                'id'                    => 'ftagementor_enable_blog_subtitle',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Sub Title', 'ftagementor'),
                'subtitle'              => esc_html__('Enable or Disable the blog page sub title.','ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Enable','ftagementor'),
                    'no'                => esc_html__('Disable','ftagementor'),
                ),
                'default'               => 'no',
            ), 
            array(
                'id'                    => 'ftagementor_blog_subtitle',
                'type'                  => 'text',
                'title'                 => esc_html__('Subtitle Text', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the subtitle text that displays in the page title area of the assigned blog page. This option only works if your front page displays your latest post in "settings > reading" or blog archive pages.','ftagementor'),
                'required'              => array('ftagementor_enable_blog_subtitle', 'equals' ,'yes'),
            ),
            array(
                'id'                    => 'ftagementor_blog_subtitle_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Sub Title Typography', 'ftagementor'),
                'google'                => true,        
                'subsets'               => false, 
                'word-spacing'          => true, 
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => true,    
                'output'                => array('.page__title__inner .page-subtitle', '.blog-page .page__title__inner p'), 
                'units'                 => 'px',
                'subtitle'              => esc_html__('Controls the typography for blog page subtitle.', 'ftagementor'),
                'default'               => array(
                    'google'            => true,
                ),
                'required'              => array('ftagementor_enable_blog_subtitle', 'equals' ,'yes'),
            ),
            array(
                'id'                    => 'ftagementor_blog_title_position',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Content Position', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the position of the blog title','ftagementor'),
                'options'               => array(
                    'text-left'              => esc_html__('Left','ftagementor'),
                    'text-center'            => esc_html__('Center','ftagementor'),
                    'text-right'             => esc_html__('Right','ftagementor'),
                ),
                'default'               => 'text-center',
            ),
            array(
                'id'                    => 'ftagementor_blog_title_full_width',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title Wrapper Full Width', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Yes','ftagementor'),
                    'no'                => esc_html__('No','ftagementor'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'ftagementor_blog_title_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__( 'Title Padding.', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Controls the top and bottom padding of the Blog page Title Area.', 'ftagementor' ),
                'output'                => array('.blog-page .page__title__inner'),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'left'                  => false,
                'right'                 => false,
                'units'                 => array('em','px'),
            ),
            array(
                'id'                    => 'ftagementor_blog_banner',
                'type'                  => 'background',
                'output'                => array('.page__title__wrapper.blog-page'),
                'title'                 => esc_html__('Title Background Options', 'ftagementor'),
            ),
            array(
                'id'                    => 'ftagementor_blog_banner_overlay_color',
                'type'                  => 'color_rgba',
                'title'                 => esc_html__('Background Overlay', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the overlay color of the blog title wrapper.', 'ftagementor'),
            ),
            array(
                'id'                    =>'blog_gena_title_divide',
                'type'                  => 'divide'
            ),
            array(
                'id'                    => 'ftagementor_blog_layout',
                'type'                  => 'select',
                'title'                 => esc_html__('Layout/Style', 'ftagementor'),
                'subtitle'              => esc_html__('Choose your favorite blog layout/style', 'ftagementor'),
                'options'               => array(
                    'single'            => esc_html__('Single Column','ftagementor'),
                    'twocolumn'         => esc_html__('Blog two column','ftagementor'),
                    'threecolumn'       => esc_html__('Blog three colum','ftagementor'),
                    'left_sidebar'              => esc_html__('Blog Left sidebar','ftagementor'),
                    'right_sidebar'             => esc_html__('Blog Right sidebar','ftagementor'),
                ),
                'default'               => 'single',
            ),
            array(
                'id'                    => 'ftagementor_excerpt_length',
                'type'                  => 'slider',
                'title'                 => esc_html__('Excerpt Length', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the excerpt length on blog page.','ftagementor'),
                "default"               => 30,
                "min"                   => 10,
                "step"                  => 2,
                "max"                   => 130,
                'display_value'         => 'text'
            ),
            array(
                'id'                    => 'ftagementor_show_post_author_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Author', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the author of blog post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Show','ftagementor'),
                    'no'                => esc_html__('Hide','ftagementor'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'ftagementor_show_post_publish_date_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Publish Date', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the publish date of blog post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Show','ftagementor'),
                    'no'                => esc_html__('Hide','ftagementor'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'ftagementor_show_post_updated_date_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Updated Date', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the updated date of blog post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Show','ftagementor'),
                    'no'                => esc_html__('Hide','ftagementor'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'ftagementor_show_post_comments_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Comments', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the comments of blog post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Show','ftagementor'),
                    'no'                => esc_html__('Hide','ftagementor'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'ftagementor_show_post_categories_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Categories', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the categories of blog post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Show','ftagementor'),
                    'no'                => esc_html__('Hide','ftagementor'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'ftagementor_show_post_tags_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Tags', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the tags of blog post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Show','ftagementor'),
                    'no'                => esc_html__('Hide','ftagementor'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'ftagementor_enable_readmore_btn',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Read More Button', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the read more button of blog post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Show','ftagementor'),
                    'no'                => esc_html__('Hide','ftagementor'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'ftagementor_readmore_text',
                'type'                  => 'text',
                'title'                 => esc_html__('Read More Text', 'ftagementor'),
                'subtitle'              => esc_html__('Set the custom title of read more button.', 'ftagementor'),
                'default'               => esc_html__('Read More', 'ftagementor'),
                'required'              => array('ftagementor_enable_readmore_btn', 'equals', 'yes'),
            ),
        )
    ) 
);  

/**
* Single Post 
*/
Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Single Post', 'ftagementor'),
    'id'        => 'ftagementor_blog_details_id',
    'icon'      => 'el el-website',
    'subsection'=> true,
    'fields'    => array(  
            array(
                'id'                    => 'ftagementor_single_post_title_bar',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title Wrapper', 'ftagementor'),
                'subtitle'              => esc_html__('Enable or Disable the blog details page title area.','ftagementor'),
                'options'               => array(
                    'show'              => esc_html__('Enable','ftagementor'),
                    'hide'              => esc_html__('Disable','ftagementor'),
                ),
                'default'               => 'show',
            ), 
            array(
                'id'                    => 'ftagementor_enable_single_post_title',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title', 'ftagementor'),
                'subtitle'              => esc_html__('If none is set, title will be hidden, or choose custom to set custom title, or choose post title to show default post title.', 'ftagementor'),
                'options'               => array(
                    'none'              => esc_html__('None','ftagementor'),
                    'custom'            => esc_html__('Custom','ftagementor'),
                    'post_title'        => esc_html__('Post Title','ftagementor'),
                ),
                'default'               => 'none',
            ),
            array(
                'id'                    => 'ftagementor_blog_details_text',
                'type'                  => 'text',
                'title'                 => esc_html__('Custom Title', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the title text that displays in the page title area of the assigned blog details page.','ftagementor'),
                'default'               => esc_html__('Blog Details','ftagementor'),
                'required'              => array('ftagementor_enable_single_post_title', 'equals', 'custom'), 
            ),
            array(
                'id'                    => 'ftagementor_blog_details_title_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Title Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography for single post title.', 'ftagementor'),
                'google'                => true,        
                'subsets'               => false, 
                'word-spacing'          => true, 
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => true,    
                'output'                => array('.page__title__wrapper.single-post .page__title__inner .page-title'), 
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'              => array('ftagementor_enable_single_post_title', 'equals', array('custom','post_title')), 
            ),  
            array(
                'id'                    => 'ftagementor_enable_single_post_subtitle',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Sub Title', 'ftagementor'),
                'subtitle'              => esc_html__('Enable or Disable the single post sub title.','ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Enable','ftagementor'),
                    'no'                => esc_html__('Disable','ftagementor'),
                ),
                'default'               => 'yes',
            ),       
            array(
                'id'                    => 'ftagementor_single_post_subtitle',
                'type'                  => 'text',
                'title'                 => esc_html__('Details Page Sub Title', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the title text that displays in the page title area of the assigned blog details page.','ftagementor'),
                'required'              => array('ftagementor_enable_single_post_subtitle', 'equals', 'yes'), 
            ),
            array(
                'id'                    => 'ftagementor_single_post_subtitle_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Sub title Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography for single post sub title.', 'ftagementor'),
                'google'                => true,        
                'subsets'               => false, 
                'word-spacing'          => true, 
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => true,    
                'output'                => array('.page__title__wrapper.single-post .page__title__inner p'), 
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'              => array('ftagementor_enable_single_post_subtitle', 'equals', 'yes'), 
            ),
            array(
                'id'                    => 'ftagementor_enable_single_post_breadcrumb_wrap',
                'type'                  => 'button_set',
                'title'                 => esc_html__( 'Breadcrumb Content', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Controls what displays in the breadcrumb area.', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Controls what displays in the breadcrumb area.', 'ftagementor' ),
                'options'               => array (
                    '1'                 => esc_html__('None','ftagementor'),
                    '2'                 => esc_html__('Breadcrumbs','ftagementor'),
                    '3'                 => esc_html__('Search Box','ftagementor'),
                ),
                'default'               => '2',
            ),
            array(
                'id'                    => 'ftagementor_blog_details_title_position',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Content Position', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the position of the blog title','ftagementor'),
                'options'               => array(
                    'text-left'              => esc_html__('Left','ftagementor'),
                    'text-center'            => esc_html__('Center','ftagementor'),
                    'text-right'             => esc_html__('Right','ftagementor'),
                ),
                'default'               => 'text-center',
            ),
            array(
                'id'                    => 'ftagementor_single_post_title_full_width',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title Wrapper Full Width', 'ftagementor'),
                'subtitle'              => esc_html__('Enable to have the title area display at 100% width according to the window size. Turn off to follow site width.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Yes','ftagementor'),
                    'no'                => esc_html__('No','ftagementor'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'ftagementor_blog_details_title_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__( 'Padding', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Controls the top and bottom padding of the Blog page Title Area.', 'ftagementor' ),
                'output'                => array('.page__title__wrapper.single-post .page__title__inner'),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'left'                  => false,
                'right'                 => false,
                'units'                 => array('em','px'),
            ),
            array(
                'id'                    => 'ftagementor_blog_details_banner',
                'type'                  => 'background',
                'output'                => array('.page__title__wrapper.single-post'),
                'title'                 => esc_html__('Background', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the background option of the single post title area.', 'ftagementor'),
            ),
            array(
                'id'                    => 'ftagementor_single_post_title_wrap_overlay',
                'type'                  => 'color_rgba',
                'title'                 => esc_html__('Background Overlay', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the background overlay color of the single post title area.', 'ftagementor'), 
            ),
            array(
                'id'                    => 'ftagementor_single_pos',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Blog Details Layout', 'ftagementor'),
                'subtitle'              => esc_html__('Choose your favorite style', 'ftagementor'),
                'options'               => array(
                    'full'              => esc_html__('Full Width','ftagementor'),
                    'left'              => esc_html__('Left Sidebar','ftagementor'),
                    'right'             => esc_html__('Right sidebar','ftagementor'),
                ),
                'default'               => 'right',
            ),
            array(
                'id'                    => 'ftagementor_blog_spheights',
                'type'                  => 'spacing',
                'title'                 => esc_html__( 'Blog Details Page Padding.', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Controls the top and bottom padding of the single blog page', 'ftagementor' ),
                'output'                => array('.blog-story-area'),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'left'                  => false,
                'right'                 => false,
                'units'                 => array('em','px'),
                'default'               => array(
                    'padding-top'       => 'px',
                    'padding-right'     => '0px',
                    'padding-bottom'    => 'px',
                    'padding-left'      => '0px',
                    'units'             => 'px',
                    )
            ),
            array(
                'id'                    => 'ftagementor_show_single_post_publish_date_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post publish date', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the publish date of the single post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Yes','ftagementor'),
                    'no'                => esc_html__('No','ftagementor'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'ftagementor_show_single_post_updated_date_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post updated date', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the updated date of the single post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Yes','ftagementor'),
                    'no'                => esc_html__('No','ftagementor'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'ftagementor_show_single_post_categories_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post categories', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the categories of single post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Yes','ftagementor'),
                    'no'                => esc_html__('No','ftagementor'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'ftagementor_show_single_post_tags_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post tags', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the tags of single post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Yes','ftagementor'),
                    'no'                => esc_html__('No','ftagementor'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'ftagementor_show_single_post_comments_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post comments count', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the comments count of single post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Yes','ftagementor'),
                    'no'                => esc_html__('No','ftagementor'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'ftagementor_show_single_post_author_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post author name', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the author name of single post.', 'ftagementor'),
                'options'               => array(
                    'yes'               => esc_html__('Yes','ftagementor'),
                    'no'                => esc_html__('No','ftagementor'),
                ),
                'default'               => 'yes',
            ),

            array(
                'id'                    => 'ftagementor_blog_details_social_share',
                'type'                  => 'switch',
                'title'                 => esc_html__('Social Share', 'ftagementor'),
                'subtitle'              => esc_html__('Show or hide the social share of single post.', 'ftagementor'),
                'default'               => false,
            ),
            array(
                'id'                    => 'ftagementor_blog_details_post_navigation',
                'type'                  => 'switch',
                'title'                 => esc_html__( 'Post Navigation (Next/Previous)', 'ftagementor' ),
                'subtitle'              => esc_html__('Show or hide the next/previous button of single post.', 'ftagementor'),
                'default'               => true,
            ),
            array(
                'id'                    => 'ftagementor_blog_details_show_author_info',
                'type'                  => 'switch',
                'title'                 => esc_html__( 'Show Author Info', 'ftagementor' ),
                'subtitle'              => esc_html__('Show or hide the Author Info box of single post.', 'ftagementor'),
                'default'               => false,
            ),
            array(
                'id'                    => 'ftagementor_blog_details_show_related_post',
                'type'                  => 'switch',
                'title'                 => esc_html__( 'Show Related Posts', 'ftagementor' ),
                'subtitle'              => esc_html__('Show or hide the related posts title of single post.', 'ftagementor'),
                'default'               => false,
            ),
            array(
                'id'                    => 'ftagementor_blog_details_related_post_title',
                'type'                  => 'text',
                'title'                 => esc_html__( 'Related Post Title', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Set the custom title of the related post.', 'ftagementor' ),
                'default'               => esc_html__( 'Related Posts', 'ftagementor' ),
                'required'              => array('ftagementor_blog_details_show_related_post', 'equals', true),
            ),
            array(
                'id'                    => 'ftagementor_blog_details_no_of_column_related_post',
                'type'                  => 'select',
                'title'                 => esc_html__( 'No. of Column Related post', 'ftagementor' ),
                'subtitle'              => esc_html__( 'Choose number of column to show related post.', 'ftagementor' ),
                    'options'           => array(
                        '12'            => '1 Column',
                        '1'             => '12 Column',
                        '2'             => '6 Column',
                        '3'             => '4 Column',
                        '4'             => '3 Column',
                        '6'             => '2 Column',
                    ),
                'default'               => 4,
                'required'              => array('ftagementor_blog_details_show_related_post', 'equals', true),
            ),
            array(
                'id'                    => 'ftagementor_blog_details_no_of_item_per_page',
                'type'                  => 'slider',
                'title'                 => esc_html__( 'No. of Item per page', 'ftagementor' ),
                'subtitle'              => esc_html__('Choose number of item to show related post, if you want to show all post then set -1 value.', 'ftagementor'),
                "default"               => 3,
                "min"                   => -1,
                "step"                  => 1,
                "max"                   => 100,
                'display_value'         => 'text',
                'required'              => array('ftagementor_blog_details_show_related_post', 'equals', true),
            ),
        )
    ) 
);  
// Sidebar
Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Sidebar', 'ftagementor'),
    'id'        => 'ftagementor_sidebar',
    'icon'      => 'el el-pause',
    'subsection'=> true,
    'fields'    => array(

            array(
                'id'                    => 'ftagementor_sidebar_widget_title',
                'type'                  => 'typography',
                'title'                 => esc_html__('Widget Title', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the widget title.', 'ftagementor'),
                'google'                => true,       
                'subsets'               => false, 
                'text-transform'        => true, 
                'letter-spacing'        => true, 
                'text-align'            => false,
                'all_styles'            => true,    
                'output'                => array('.sidebar-title'), 
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                )
            ),
            array(
                'id'                        => 'ftagementor_sidebar_widget_title_spacing',
                'type'                      => 'spacing',
                'title'                     => esc_html__( 'Widget Title Spacing', 'ftagementor' ),
                'subtitle'                  => esc_html__( 'Controls the top, right, bottom and left padding of the widget title.', 'ftagementor' ),
                'output'                    => array('.sidebar-title:not(.related-post-title)'),
                'mode'                      => 'margin',
                'units_extended'            => false,
                'units'                     => array('em','px'),
                'default'                   => array(
                    'margin-top'            => 'px',
                    'margin-right'          => 'px',
                    'margin-bottom'         => 'px',
                    'margin-left'           => 'px',
                    'units'                 => 'px',
                )
            ),
        )
) );

//footer section
Redux::setSection($opt_name, array(
    'title'   => esc_html__('Footer','ftagementor'),
    'id'      => 'ftagementor_footer_section',
    'icon'    => 'el el-photo',
    'fields'  => array(
        array(
            'id'                        => 'ftagementor_footer_enable',
            'type'                      => 'switch',
            'title'                     => esc_html__( 'Footer', 'ftagementor' ),
            'subtitle'                  => esc_html__( 'Enable or disable the footer area.','ftagementor' ),
            'default'                   => true,
        ),
        array(
            'id'                        => 'f_select_footer_style_type',
            'title'                     => esc_html__('Footer Type','ftagementor'),
            'subtitle'                  => esc_html__('Select footer type, if the default is chosen the existing options below will work, or choose the custom option to get footers from footer post type.','ftagementor'),
            'type'                      => 'button_set',
            'options'                   => array(
                'default'                   => esc_html__('Default','ftagementor'),
                'custom'                    => esc_html__('Custom','ftagementor'),
            ),
            'default'                   => 'default'
        ),

        // Footer Custom Style
        array(
            'id'                    => 'ftagementor_select_footer_template',
            'type'                  => 'select',
            'title'                 => esc_html__('Select Template', 'ftagementor'),
            'subtitle'              => esc_html__('Select the footer template that you made in the footer post type.', 'ftagementor'),
            'data'                  => 'posts',
            'args'                  => array(
                'post_type'             => 'ftagementor_footer',
            ),
            'required'                  => array('f_select_footer_style_type','equals', 'custom'),
        ),

        array(
            'id'                    => 'ftagementor_default_footer_content',
            'title'                 => esc_html__('Footer Content','ftagementor'),
            'subtitle'              => esc_html__('Add your copyright text.','ftagementor'),
            'type'                  => 'editor',
            'args'   => array(
                'teeny'            => false,
                'textarea_rows'    => 6
            ),
            'required'                 => array('f_select_footer_style_type','equals', 'default'),
        ),   
        array(
            'id'                    => 'ftagementor_footer_content_typography',
            'type'                  => 'typography',
            'title'                 => esc_html__('Content Typography', 'ftagementor'),
            'subtitle'              => esc_html__('Controls the typography of the default footer content.', 'ftagementor'),
            'google'                => true,          
            'subsets'               => false, 
            'text-align'            => false,
            'all_styles'            => true,    
            'output'                => array('.default-footer-content-wrap .footer-copyright-text'), 
            'units'                 => 'px',
            'default'               => array(
                'google'            => true,
            ),
            'required'                  => array('f_select_footer_style_type','equals', 'default'),
        ),
        array(
            'id'                    => 'ftagementor_footer_padding',
            'type'                  => 'spacing',
            'title'                 => esc_html__('Footer Padding', 'ftagementor'),
            'subtitle'              => esc_html__('Controls the top / bottom padding for footer content. Enter values including any valid CSS unit, ex: 100,100.', 'ftagementor'),
            'mode'                  => 'padding',
            'units'                 => array('em','px'),
            'output'                => array('.footer-wrapper.default-footer-wrapper .default-footer'),
            'units_extended'        => false,
            'left'                  => false,
            'right'                 => false,
            'required'                 => array('f_select_footer_style_type','equals', 'default'),
        ),
        array(
            'id'                        => 'ftagementor_footer_bg_color',
            'type'                      => 'background',
            'output'                    => array( '.footer-wrapper.default-footer-wrapper .default-footer' ),
            'title'                     => esc_html__( 'Background', 'ftagementor' ),
            'subtitle'                  => esc_html__( 'Control the background of the footer area.', 'ftagementor' ),
            'required'                  => array('f_select_footer_style_type','equals', 'default'),
        ),
        array(
            'id'                    => 'ftagementor_footer_overlay_color',
            'type'                  => 'color_rgba',
            'title'                 => esc_html__('Background Overlay', 'ftagementor'),
            'subtitle'              => esc_html__('Controls the overlay color of the footer area.', 'ftagementor'),
            'required'              => array('f_select_footer_style_type','equals', 'default'),
        ), 

    )
));


// Footer Widgets Option
Redux::setSection( $opt_name, array(
    'title'         => esc_html__('Widgets', 'ftagementor'),
    'id'            => 'ftagementor_widgets_options',
    'icon'          => 'el el-view-mode',
    'subsection'    => true,
    'fields'    => array(
            array(
                'id'                        => 'ftagementor_footer_widgets_enable',
                'type'                      => 'switch',
                'title'                     => esc_html__( 'Footer Widgets area enable', 'ftagementor' ),
                'subtitle'                  => esc_html__( 'Enable or disable the widgets area.','ftagementor' ),
                'default'                   => true,
            ),
            array(
                'id'                        => 'ftagementor_footer_layoutcolumns',
                'title'                     => esc_html__('Number of Footer Columns','ftagementor'),
                'subtitle'                  => esc_html__( 'Controls the number of columns in the footer.', 'ftagementor' ),
                'type'                      => 'button_set',
                'options'                   => array(
                    '1'                     => esc_html__('One Column','ftagementor'),
                    '2'                     => esc_html__('Two Column','ftagementor'),
                    '3'                     => esc_html__('Three Column','ftagementor'),
                    '4'                     => esc_html__('Four Column','ftagementor'),
                ),
                'default'                   => '4',
                'required'                  => array('ftagementor_footer_widgets_enable','equals',true),
            ),
            array(
                'id'                        => 'ftagementor_col_1_gird_size',
                'type'                      => 'text',
                'title'                     => esc_html__( 'Column 1 gird size', 'ftagementor' ),
                'subtitle'                  => esc_html__( 'Set the column width in bootstrap grid size','ftagementor' ),
                'desc'                      => 'Put the number of grid size between 1 to 12. It is required!',
                'default'                   => '3',
                'required'                  => array('ftagementor_footer_layoutcolumns','equals',array('1','2','3','4')),
            ),
            array(
                'id'                        => 'ftagementor_col_2_gird_size',
                'type'                      => 'text',
                'title'                     => esc_html__( 'Column 2 gird size', 'ftagementor' ),
                'subtitle'                  => esc_html__( 'Set the column width in bootstrap grid size','ftagementor' ),
                'desc'                      => 'Put the number of grid size between 1 to 12. It is required!',
                'default'                   => '3',
                'required'                  => array('ftagementor_footer_layoutcolumns','equals',array('1','2','3','4')),
            ),
            array(
                'id'                        => 'ftagementor_col_3_gird_size',
                'type'                      => 'text',
                'title'                     => esc_html__( 'Column 3 gird size', 'ftagementor' ),
                'subtitle'                  => esc_html__( 'Set the column width in bootstrap grid size','ftagementor' ),
                'desc'                      => 'Put the number of grid size between 1 to 12. It is required!',
                'default'                   => '3',
                'required'                  => array('ftagementor_footer_layoutcolumns','equals',array('1','2','3','4')),
            ),
            array(
                'id'                        => 'ftagementor_col_4_gird_size',
                'type'                      => 'text',
                'title'                     => esc_html__( 'Column 4 gird size', 'ftagementor' ),
                'subtitle'                  => esc_html__( 'Set the column width in bootstrap grid size','ftagementor' ),
                'desc'                      => 'Put the number of grid size between 1 to 12. It is required!',
                'default'                   => '3',
                'required'                  => array('ftagementor_footer_layoutcolumns','equals',array('1','2','3','4')),
            ),
        array(
            'id'                    => 'ftagementor_footer_wedgets_padding',
            'type'                  => 'spacing',
            'title'                 => esc_html__('Footer Wedgets Area Padding', 'ftagementor'),
            'subtitle'              => esc_html__('Controls the top / bottom padding for footer content. Enter values including any valid CSS unit, ex: 100,100.', 'ftagementor'),
            'mode'                  => 'padding',
            'units'                 => array('em','px'),
            'output'                => array('.footer-top-section'),
            'units_extended'        => false,
            'left'                  => false,
            'right'                 => false,
            'required'                 => array('f_select_footer_style_type','equals', 'default'),
        ),            
            array(
                'id'                    => 'ftagementor_footer_widget_content_title_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Widgets Title Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography of the default footer content.', 'ftagementor'),
                'google'                => true,          
                'subsets'               => false, 
                'text-align'            => false,
                'all_styles'            => true,    
                'output'                => array('.footer-single.widget h5'), 
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'                  => array('f_select_footer_style_type','equals', 'default'),
            ),   
            array(
                'id'                    => 'f_footer_widget_content_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Widgets Content Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography of the default footer content.', 'ftagementor'),
                'google'                => true,          
                'subsets'               => false, 
                'text-align'            => false,
                'all_styles'            => true,    
                'output'                => array('.footer-single p, .footer-single, .footer-single a '), 
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'                  => array('f_select_footer_style_type','equals', 'default'),
            ),    
            array(
                'id'                    => 'f_footer_widget_content_hover_typogray',
                'type'                  => 'color',
                'title'                 => esc_html__('Wedgets Link Hover Color', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography of the default footer content.', 'ftagementor'),
                'transparent'           => false,
                'validate'              => 'color',
                'output'                => array('.footer-single a:hover'),
                'required'              => array('f_select_footer_style_type', 'equals' ,'default'),
            ),            
        )
    ) 
);

// Typography
Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Typography', 'ftagementor'),
    'id'        => 'ftagementor_fonts',
    'icon'      => 'el el-fontsize',
    'fields'    => array(
            array(
                'id'                    => 'ftagementor_body_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Body Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the body.', 'ftagementor'),
                'google'                => true,        
                'subsets'               => false, 
                'word-spacing'          => true, 
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => true,    
                'output'                => array('body'), 
                'units'                 => 'px',
            ),
            array(
                'id'                    => 'ftagementor_h1_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H1 Heading Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the H1 heading.', 'ftagementor'),
                'google'                => true,    
                'text-transform'        => true, 
                'word-spacing'          => true, 
                'letter-spacing'        => true,                    
                'subsets'               => false, 
                'text-align'            => false,
                'all_styles'            => true,     
                'units'                 => 'px',
                'output'                => array('h1'),
            ),
            array(
                'id'                    => 'ftagementor_h2_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H2 Heading Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the H2 heading.', 'ftagementor'),
                'google'                => true,  
                'text-transform'        => true, 
                'letter-spacing'        => true,                    
                'word-spacing'          => true,    
                'subsets'               => false, 
                'text-align'            => false,
                'all_styles'            => true,    
                'units'                 => 'px',
                'output'                => array('h2'),
            ),
            array(
                'id'                    => 'ftagementor_h3_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H3 Heading Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the H3 heading.', 'ftagementor'),
                'google'                => true, 
                'text-transform'        => true, 
                'letter-spacing'        => true,                    
                'word-spacing'          => true,    
                'subsets'               => false, 
                'text-align'            => false,
                'all_styles'            => true,     
                'units'                 => 'px',
                'output'                => array('h3'),
            ),
            array(
                'id'                    => 'ftagementor_h4_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H4 Heading Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the H4 heading.', 'ftagementor'),
                'google'                => true,    
                'text-transform'        => true, 
                'word-spacing'          => true, 
                'letter-spacing'        => true,                    
                'subsets'               => false, 
                'text-align'            => false,
                'all_styles'            => true,     
                'units'                 => 'px',
                'output'                => array('h4'),
            ),
            array(
                'id'                    => 'ftagementor_h5_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H5 Heading Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the H5 heading.', 'ftagementor'),
                'google'                => true,    
                'text-transform'        => true, 
                'word-spacing'          => true, 
                'letter-spacing'        => true,                    
                'subsets'               => false, 
                'text-align'            => false,
                'all_styles'            => true,    
                'units'                 => 'px',
                'output'                => array('h5'),
            ),
            array(
                'id'                    => 'ftagementor_h6_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H6 Heading Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the H6 heading.', 'ftagementor'),
                'google'                => true,    
                'text-transform'        => true,  
                'word-spacing'          => true, 
                'letter-spacing'        => true,                    
                'subsets'               => false, 
                'text-align'            => false,
                'all_styles'            => true,     
                'units'                 => 'px',
                'output'                => array('h6'),
            ),

        )
    ) 
);
//Service Details  page
Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Service Details Page', 'ftagementor'),
    'id'        => 'ftagementor_service_details_page',  
    'icon'      => 'el el-eye-close',
    'fields'    => array(     
            array(
                'id'                    => 'ftagementor_others_service_optin',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Next/Prev', 'ftagementor'),
                'subtitle'              => esc_html__('Show or Hide  Carousel Button.', 'ftagementor'),
                'options'               => array(
                    'yes'                   => 'Enable',
                    'no'                    => 'Disable'
                ),
                'default' => 'yes'
            ),
             array(
                'id'                    => 'ftagementor_service_details_title',
                'type'                  => 'text',
                'title'                 => esc_html__('Title', 'ftagementor'),
                'subtitle'              => esc_html__('Add your Other Service title.', 'ftagementor'),
                'value'                 => 'Others Services',
                'default'               => esc_html__('Others Services', 'ftagementor'),
                'required'              => array('ftagementor_others_service_optin','equals', 'yes'),
            ),
            array(
                'id'                    => 'ftagementor_service_details_font',
                'type'                  => 'typography',
                'title'                 => esc_html__('Title Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography for the title.', 'ftagementor'),
                'google'                => true,    
                'font-style'            => true,    
                'font-weight'           => true, 
                'font-family'           => true,
                'subsets'               => true,
                'line-height'           => true,
                'text-align'            => true,
                'all_styles'            => true,    
                'output'                => array('.others-post > h4'), 
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'              => array('ftagementor_others_service_optin','equals', 'yes'),                
            ), 

            array(
                'id'                    => 'ftagementor_service_details_subtitle',
                'type'                  => 'text',
                'title'                 => esc_html__('Sub Title', 'ftagementor'),
                'subtitle'              => esc_html__('Add your custom subtitle.', 'ftagementor'),
                'default'               => esc_html__('It is a long established fact that a reader will be distracted by the on readable content of a page when looking at its layout', 'ftagementor'),
                'required'              => array('ftagementor_others_service_optin','equals', 'yes'),                
            ),
            array(
                'id'                    => 'ftagementor_service_details_font_sub',
                'type'                  => 'typography',
                'title'                 => esc_html__('Sub Title Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the subtitle.', 'ftagementor'),
                'google'                => true,    
                'font-backup'           => false,    
                'subsets'               => false, 
                'line-height'           => false,
                'text-align'            => false,
                'text-transform'        => true,    
                'all_styles'            => true,    
                'output'                => array('.others-post > p'), 
                'units'                 => 'px',
                'required'              => array('ftagementor_others_service_optin','equals', 'yes'),                
                'default'               => array(
                    'google'            => true,
                )
            ),
            array(
                'id'                    => 'ftagementor_carousel_button',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Next/Prev', 'ftagementor'),
                'subtitle'              => esc_html__('Show or Hide  Carousel Button.', 'ftagementor'),
                'options'               => array(
                    'yes'                   => 'Enable',
                    'no'                    => 'Disable'
                ),
                'default' => 'yes',
                'required'              => array('ftagementor_others_service_optin','equals', 'yes'),                

            ),

        )
) );
//404 error page
Redux::setSection( $opt_name, array(
    'title'     => esc_html__('404 Page', 'ftagementor'),
    'id'        => 'ftagementor_error_page',  
    'icon'      => 'el el-eye-close',
    'fields'    => array(     
            array(
                'id'                    => 'ftagementor_404_control',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title Type', 'ftagementor'),
                'subtitle'              => esc_html__('Select 404 title type, if the title is chosen the existing text options below will work, or choose the image option get the image upload field.', 'ftagementor'),
                'options'               => array(
                    'title'             => esc_html__('Title',  'ftagementor'),
                    'image'             => esc_html__('Image', 'ftagementor'), 
                 ), 
                'default'               => 'title'
            ),
             array(
                'id'                    => 'ftagementor_404_title',
                'type'                  => 'text',
                'required'              => array('ftagementor_404_control','equals','title'),
                'title'                 => esc_html__('Title', 'ftagementor'),
                'subtitle'              => esc_html__('Add your custom title.', 'ftagementor'),
                'value'                 => '404',
                'default'               => esc_html__('404', 'ftagementor'),
            ),
            array(
                'id'                    => 'ftagementor_404font',
                'type'                  => 'typography',
                'title'                 => esc_html__('Title Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography for the title.', 'ftagementor'),
                'google'                => true,    
                'font-style'            => true,    
                'font-weight'           => true, 
                'font-family'           => true,
                'subsets'               => true,
                'line-height'           => true,
                'text-align'            => true,
                'all_styles'            => true,    
                'output'                => array('.pnf-inner > h1'), 
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'              => array('ftagementor_404_control','equals','title'),
            ), 
            array(
                'id'                    => 'ftagementor_404_img',
                'type'                  => 'media',
                'required'              => array('ftagementor_404_control','equals','image'),
                'title'                 => esc_html__('Image', 'ftagementor'),
                'subtitle'              => esc_html__('Upload the image for 404 page title.', 'ftagementor'),
            ),
            array(
                'id'                    => 'ftagementor_404_subtitle',
                'type'                  => 'text',
                'title'                 => esc_html__('Sub Title', 'ftagementor'),
                'subtitle'              => esc_html__('Add your custom subtitle.', 'ftagementor'),
                'default'               => esc_html__('PAGE NOT FOUND', 'ftagementor'),
            ),
            array(
                'id'                    => 'ftagementor_404font_subtitle',
                'type'                  => 'typography',
                'title'                 => esc_html__('Sub Title Typography', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the subtitle.', 'ftagementor'),
                'google'                => true,    
                'font-backup'           => false,
                'subsets'               => false, 
                'line-height'           => false,
                'text-align'            => false,
                'text-transform'        => true,    
                'all_styles'            => true,    
                'output'                => array('.pnf-inner > h2'), 
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                )
            ),
            array(
                'id'                    => 'ftagementor_404_info',
                'type'                  => 'editor',
                'title'                 => esc_html__('Information', 'ftagementor'),
                'default'               => esc_html__('The page you are looking for does not exist or has been moved.', 'ftagementor'),
                'args'                  => array(
                    'teeny'             => true,
                    'textarea_rows'     => 5,
                )
            ),
            array(
                'id'                    => 'ftagementor_404font_sub',
                'type'                  => 'typography',
                'title'                 => esc_html__('404 Page Sub Title Font', 'ftagementor'),
                'subtitle'              => esc_html__('Controls the typography settings of the subtitle.', 'ftagementor'),
                'google'                => true,    
                'font-backup'           => false,    
                'subsets'               => false, 
                'line-height'           => false,
                'text-align'            => false,
                'text-transform'        => true,    
                'all_styles'            => true,    
                'output'                => array('.pnf-inner > p'), 
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                )
            ),
            array(
                'id'                    => 'ftagementor_enable_go_back_btn',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Button', 'ftagementor'),
                'subtitle'              => esc_html__('Enable or disable the go to home page button.', 'ftagementor'),
                'options'               => array(
                    'yes'                   => 'Enable',
                    'no'                    => 'Disable'
                ),
                'default' => 'yes'
            ),
            array(
                'id'                    => 'ftagementor_button_text',
                'type'                  => 'text',
                'title'                 => esc_html__('Button Text', 'ftagementor'),
                'subtitle'              => esc_html__('Set the custom text of go to home page button.', 'ftagementor'),
                'default'               => esc_html__('Go back to home page', 'ftagementor'),
                'required'              => array('ftagementor_enable_go_back_btn','equals', 'yes'),
            ),      
            array(
                'id'        => 'pnf_background',
                'type'      => 'background',
                'output'    => array('.page-not-found-wrap'),
                'title'     => esc_html__('404 Page Background', 'ftagementor'),
                'subtitle'  => esc_html__('Controls the background of 404 page.', 'ftagementor'),
                'default'   => array(
                )
            ),
        )
) );
// Maintenance Mode
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Maintenance Mode', 'ftagementor' ),
    'id'               => 'ftagementor_maintenance_mode',
    'icon'             => 'el el-cogs',
    'fields'           => array(
            array(
                'id'                    => 'ftagementor_maintenance_mode_enable',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Maintenance / Coming Soon Mode', 'ftagementor'),
                'subtitle'              => esc_html__('If enable, the frontend shows maintenance / coming soon mode page only.', 'ftagementor'),
                'options'               => array(
                    'on'                => 'Enable',
                    'off'               => 'Disable'
                ),
                'default'               => 'off'
            ),
            array(
                'id'                    => 'ftagementor_select_template',
                'type'                  => 'select',
                'title'                 => esc_html__('Select Template', 'ftagementor'),
                'subtitle'              => esc_html__('Select Maintenance/Coming Soon Page.', 'ftagementor'),
                'data'                  => 'pages',
                'required'              => array('ftagementor_maintenance_mode_enable','equals', 'on'),
            ),

        )
    ) 
);

//Header center
Redux::setSection( $opt_name, array(
    'title'            => esc_html__('Social Network', 'ftagementor'),
    'id'               => 'ftagementor-social-icon',
    'icon'             => 'el el-share',      
    'fields'           => array( 
            array(
                'id'                    => 'ftagementor_social_icons',
                'type'                  => 'sortable',
                'title'                 => esc_html__('Social Icons', 'ftagementor'),
                'subtitle'              => esc_html__('Enter social links to show the icons', 'ftagementor'),
                'mode'                  => 'text',
                'label'                 => true,
                'options'               => array(        
                    'facebook'          => '',
                    'twitter'           => '',
                    'instagram'         => '',
                    'tumblr'            => '',
                    'pinterest'         => '',
                    'google-plus'       => '',
                    'linkedin'          => '',
                    'behance'           => '',
                    'dribbble'          => '',
                    'youtube'           => '',
                    'vimeo'             => '',
                    'rss'               => '',
            ),
            'default'                   => array(
                'facebook'              => 'https://www.facebook.com/',
                'twitter'               => 'https://twitter.com/',
                'instagram'             => 'https://instagram.com/',
                'tumblr'                => '',
                'pinterest'             => '',
                'google-plus'           => 'https://plus.google.com/',
                'linkedin'              => '',
                'behance'               => '',
                'dribbble'              => 'https://dribbble.com/',
                'youtube'               => '',
                'vimeo'                 => '',
                'rss'                   => '',
            ),
        ))
    ) 
);