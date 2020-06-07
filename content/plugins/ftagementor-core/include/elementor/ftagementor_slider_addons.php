<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ftage_Elementor_Widget_Slider extends Widget_Base {

    public function get_name() {
        return 'ftagementor-slider';
    }
    
    public function get_title() {
        return __( 'Ftage : Slider', 'ftagementor' );
    }

    public function get_icon() {
        return 'eicon-post-slider';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'slider_content_setting',
            [
                'label' => esc_html__( 'Slider Content', 'ftagementor' ),
            ]
        );

        $this->add_control(
            'sllayout',
            [
                'label' => __( 'Slider Layout', 'ftagementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 1,
                'options' => [
                    1 => __( 'Layout One', 'ftagementor' ),
                    2 => __( 'Layout Two', 'ftagementor' ),
                    3 => __( 'Layout Three', 'ftagementor' ),
                    4 => __( 'Layout Four', 'ftagementor' ),
                    5 => __( 'Layout Five', 'ftagementor' ),
                ]
            ]
        );       
        $repeater = new Repeater();

            $repeater->add_control(
                'slimage',
                [
                    'label' => __( 'Slider Background Image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            
            $repeater->add_control(
                'sli_video',
                [
                    'label' => __( 'Video URL', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'https://www.youtube.com/watch?v=xpgzmcMUv2U',
                    'title' => __( 'Enter Video URL LInk', 'ftagementor' ),
                ]   
            );
                
            $repeater->add_control(
                'sltitle',
                [
                    'label' => __( 'Slider Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => '',
                    'title' => __( 'IT’S OUR <span>PASSION</span>', 'ftagementor' ),
                ]
            );
            $repeater->add_control(
                'slsubtitle',
                [
                    'label' => __( 'Slider Subtitle', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => '',
                    'label_block' => 'true',
                    'title' => __( 'TO <span>CREATE</span> FILM', 'ftagementor' ),
                ]
            );
            $repeater->add_control(
                'slcontent',
                [
                    'label' => __( 'Slider Content', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => '',
                    'label_block' => 'true',
                    'title' => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, rem!', 'ftagementor' ),
                ]
            );
            $repeater->add_control(
                'slbutton',
                [
                    'label' => __( 'Button Text', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'title' => __( 'Enter slider button text', 'ftagementor' ),
                ]
            );

            $repeater->add_control(
                'slbuttonlink',
                [
                    'label' => __( 'Link', 'ftagementor' ),
                    'type' => Controls_Manager::URL,
                    'placeholder' => __( 'https://example.com', 'ftagementor' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );    
            $repeater->add_control(
                'readmore_icon',
                [
                    'label' => esc_html__( 'Read More Icon Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            ); 
           $repeater->add_control(
                'readmore_icon_type',
                [
                    'label' => esc_html__( 'Select Icon Type', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'ftagementor' ),
                        'image' => esc_html__( 'Image', 'ftagementor' ),
                    ],
                    'condition' => [
                        'readmore_icon' => 'yes',
                    ]                    
                ]
            );
            $repeater->add_control(
                'readmore_iamge_icon',
                [
                    'label' => __( 'Icon image Prev', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'readmore_icon' => 'yes',
                        'readmore_icon_type' => 'image',
                    ]
                ]
            );
            $repeater->add_control(
                'readmore_font_next',
                [
                    'label' => __( 'Icon Next', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'fa fa-angle-right',
                    'condition' => [
                        'readmore_icon' => 'yes',
                        'readmore_icon_type' => 'icon',
                    ],
                ]
            );


            $repeater->add_control(
                'release_swittcher',
                [
                    'label' => esc_html__( 'Release Content', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );            
            $repeater->add_control(
                'slider_slide_realease_movie_title_heading',
                [
                    'label' => __( 'Release Movie Content ', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                    'condition' => [
                        'release_swittcher' => 'yes',
                    ]
                ]
            );
            $repeater->add_control(
                'release_moive_title',
                [
                    'label' => __( 'Release Movie Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'WAR OF 1987',
                    'title' => __( 'Enter Movie Title', 'ftagementor' ),
                    'placeholder' => __( 'WAR OF 1987', 'ftagementor' ),
                    'condition' => [
                        'release_swittcher' => 'yes',
                    ]
                ]   
            );
            $repeater->add_control(
                'release_on_title',
                [
                    'label' => __( 'Release On Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Release On',
                    'placeholder' => __( 'Release On', 'ftagementor' ),
                    'title' => __( 'Enter Release On Title', 'ftagementor' ),
                    'condition' => [
                        'release_swittcher' => 'yes',
                    ]                    
                ]   
            );
            $repeater->add_control(
                'release_on_date',

                [
                    'label' => __( 'Release On Date', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '2019/12/11',
                    'title' => __( 'Enter Release Date', 'ftagementor' ),
                    'placeholder' => __( '2019/12/11', 'ftagementor' ),
                    'condition' => [
                        'release_swittcher' => 'yes',
                    ]                    
                ] 
            );            

            $this->add_control(
                'sliders_list',
                [
                    'label' => __( 'Slider', 'ftagementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'sltitle' => __( 'IT’S OUR <span>PASSION</span>', 'ftagementor' ),
                            'slsubtitle' => __( 'TO <span>CREATE</span> FILM', 'ftagementor' ),
                            'slcontent' => __( '', 'ftagementor' ),
                            'slbutton' => __( 'Learen More', 'ftagementor' ),
                            'slbuttonlink' => __( '#', 'ftagementor' ),
                            'release_swittcher' => __( '', 'ftagementor' ),
                            'release_moive_title' => __( 'WAR OF 1987', 'ftagementor' ),
                            'release_on_title' => __( 'Release On', 'ftagementor' ),
                            'release_on_date' => __( '2019/12/11', 'ftagementor' ),
                        ],
                    ],
                    'title_field' => '{{{ sltitle }}}',
                ]
            );        
        $repeater_social = new Repeater();
            $repeater_social->add_control(
                'sliders_list_social_icon',
                [
                    'label' => __( 'Social Icon', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'icofont icofont-facebook',
                ]
            );
            $repeater_social->add_control(
                'sliders_list_social_text',
                [
                    'label' => __( 'Social Name', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Facebook',
                    'title' => __( 'Enter slider social text', 'ftagementor' ),
                ]
            );

            $repeater_social->add_control(
                'sliders_list_social_link',
                [
                    'label' => __( 'Social Link', 'ftagementor' ),
                    'type' => Controls_Manager::URL,
                    'placeholder' => __( 'https://example.com', 'ftagementor' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );
            $this->add_control(
                'sliders_list_social',
                [
                    'label' => __( 'Slider Social', 'ftagementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater_social->get_controls(),
                    'default' => [
                        [
                            'sliders_list_social_text' => __( 'Facebook', 'ftagementor' ),                            
                            'sliders_list_social_icon' => __( 'icofont icofont-facebook', 'ftagementor' ),
                            'sliders_list_social_link' => __( '#', 'ftagementor' ),
                        ],
                    ],
                    'title_field' => '{{{ sliders_list_social_text }}}',
                ]
            );
            $this->add_control(
                'production_text',
                [
                    'label' => __( 'Production Text', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'A Ftage Film Production',
                    'title' => __( 'Enter Your Production Name', 'ftagementor' ),
                ]   
            );            
        $this->end_controls_section();
        // content tab

        // Slider Option
        $this->start_controls_section(
            'slider_option_setting',
            [
                'label' => esc_html__( 'Slider Option', 'ftagementor' ),
            ]
        );
            $this->add_control(
                'slautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'slautoplayspeed',
                [
                    'label' => __( 'Auto play speed', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'min' => 1000,
                    'step' => 100,
                    'default' => 5000,
                    'condition' => [
                        'slautoplay' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slarrows',
                [
                    'label' => esc_html__( 'Arrow', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
           $this->add_control(
                'slarrows_type',
                [
                    'label' => esc_html__( 'Select Icon Type', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'ftagementor' ),
                        'image' => esc_html__( 'Image', 'ftagementor' ),
                    ],
                    'condition' => [
                        'slarrows' => 'yes',
                    ]                    
                ]
            );

            $this->add_control(
                'slarrows_iamge_next',
                [
                    'label' => __( 'Icon image Next', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'slarrows' => 'yes',
                        'slarrows_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'slarrows_iamge_prev',
                [
                    'label' => __( 'Icon image Prev', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'slarrows' => 'yes',
                        'slarrows_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'slarrowsicon_font_next',
                [
                    'label' => __( 'Icon Next', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'fa fa-angle-right',
                    'condition' => [
                        'slarrows' => 'yes',
                        'slarrows_type' => 'icon',
                    ],
                ]
            );
            $this->add_control(
                'slarrowsicon_font_prev',
                [
                    'label' => __( 'Icon Prev', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'fa fa-angle-left',
                    'condition' => [
                        'slarrows' => 'yes',
                        'slarrows_type' => 'icon',
                    ],
                ]
            );
            $this->add_control(
                'sldots',
                [
                    'label' => esc_html__( 'Dots', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
           $this->add_control(
                'dot_icon_type',
                [
                    'label' => esc_html__( 'Select Icon Type', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'ftagementor' ),
                        'image' => esc_html__( 'Image', 'ftagementor' ),
                    ],
                    'condition' => [
                        'sldots' => 'yes',
                    ]                    
                ]
            );

            $this->add_control(
                'dot_icon_iamge',
                [
                    'label' => __( 'Icon image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'sldots' => 'yes',
                        'dot_icon_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'dot_icon_font',
                [
                    'label' => __( 'Icon', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'icofont icofont-ui-movie',
                    'condition' => [
                        'sldots' => 'yes',
                        'dot_icon_type' => 'icon',
                    ],
                ]
            );
            $this->add_control(
                'sl_socialicon',
                [
                    'label' => esc_html__( 'Social Icon Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            $this->add_control(
                'sl_socialicon_text',
                [
                    'label' => esc_html__( 'Show Social Text/Icon', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'sl_socialicon' => 'yes',
                    ],
                ]
            );
            $this->add_control(
                'sl_video_play_icon',
                [
                    'label' => esc_html__( 'Video Play Buton Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            $this->add_control(
                'sl_video_play_icon_select',
                [
                    'label' => __( 'Select Video Play Icon', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'icofont icofont-play',
                    'condition' => [
                        'sl_video_play_icon' => 'yes',
                    ],
                ]
            );
            $this->add_control(
                'title_border_top',
                [
                    'label' => esc_html__( 'Title Border Top Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            $this->add_control(
                'title_border_bottom',
                [
                    'label' => esc_html__( 'Title Border Bottom Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );            

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'slider_style',
            [
                'label' => __( 'Slider Content Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
                'slider_slide_overlay_style'
            );
                $this->start_controls_tab(
                    'slider_slide_overlay_style_normal',
                    [
                        'label' => __( 'Normal', 'ftagementor' ),
                    ]
                );
                $this->add_responsive_control(
                    'slider_container_width',
                    [
                        'label' => __( 'Slide Container Width', 'ftagementor' ),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 300,
                        'max' => '',
                        'step' => 1,
                        'default' => 1200,
                        'selectors' => [
                            '{{WRAPPER}} .slider-area .container' => 'max-width: {{VALUE}}px;',
                        ],
                    ]
                ); 
                $this->add_responsive_control(
                    'slider_container_height',
                    [
                        'label' => __( 'Slider Height', 'ftagementor' ),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 10,
                        'max' => '',
                        'step' => 1,
                        'default' => '',
                        'selectors' => [
                            '{{WRAPPER}} .slider-area .container' => 'height: {{VALUE}}px;',
                        ],
                    ]
                );                
            $this->add_control(
                'slider_slide_overlay_heading',
                [
                    'label' => __( 'Slider Overlay', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'slider_overlay_color',
                [
                    'label' => __( 'Slider Overlay Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => 'rgba(0,0,0,0.0)',
                    'selectors' => [
                        '{{WRAPPER}} .background-video-holder::before,{{WRAPPER}} .slider-item::before' => 'background: {{VALUE}};',
                    ],
                ]
            );  
            $this->add_responsive_control(
                'slider_content_alignment',
                [
                    'label' => __( 'Slider Content Alignment', 'ftagementor' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'ftagementor' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'ftagementor' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'ftagementor' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                        'selectors' => [
                            '{{WRAPPER}} .slide-content' => 'text-align: {{VALUE}};',
                        ],
                ]
            );

            $this->add_control(
                'slider_title_heading',
                [
                    'label' => __( 'Title', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .slide-content h1' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'title_color_text',
                [
                    'label' => __( 'Title color Text', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_2,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .slide-content h1 span' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .slide-content h1',
                ]
            );
            $this->add_control(
                'slider_subtitle_heading',
                [
                    'label' => __( 'Subtitle', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'subtitle_color',
                [
                    'label' => __( 'Sub Title color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .slide-content h2' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'subtitle_color_text',
                [
                    'label' => __( 'Sub Title color Text', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .slide-content h2 span' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'sub_title_border_color',
                    'label' => __( 'Sub Title Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .sldr_counter_content h2 span.sld_border_shap:before,{{WRAPPER}} .cam_sldr_left h2:before',
                ]
            );    

            $this->add_responsive_control(
                'subtitle_padding_left',
                [
                    'label' => __( 'Sub Title Padding', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .slide-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );
            $this->add_responsive_control(
                'subtitle_margin_left',
                [
                    'label' => __( 'Sub Title Padding', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .slide-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'subtitletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .slide-content h2',
                ]
            );

            $this->add_control(
                'slider_content_heading',
                [
                    'label' => __( 'Content', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => __( 'Content color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .slide-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contenttypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .slide-content p',
                ]
            );
            $this->add_responsive_control(
                'content_padding_left',
                [
                    'label' => __( 'Content Padding', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .slide-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );
            $this->add_control(
                'slider_button_heading',
                [
                    'label' => __( 'Button', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'slbtn_color',
                [
                    'label' => __( 'Button color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .slide-btn a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'slbtn_bg_color',
                [
                    'label' => __( 'Button background color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .slide-btn a' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slbtn_bg_color_padding',
                [
                    'label' => __( 'Button Padding', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .slide-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );
            $this->add_responsive_control(
                'slbtn_bg_color_margin',
                [
                    'label' => __( 'Button Margin', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .slide-btn .read-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'btntypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .slide-btn a',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'btn_border',
                    'label' => __( 'Button Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .hero-content a',
                ]
            );
            $this->add_control(
                'release_on_heading',
                [
                    'label' => __( 'Release On Content Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'release_on_title_color',
                [
                    'label' => __( ' Release Title Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .sldr_counter_content h1' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'release_on_ypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .sldr_counter_content h1',
                ]
            );

            $this->add_control(
                'release_on_subtitle_color',
                [
                    'label' => __( 'Release Sub Title color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .sldr_counter_content h2 span' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'release_on_ypography_subtitle',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .sldr_counter_content h2',
                ]
            );


            $this->add_control(
                'release_on_date_color',
                [
                    'label' => __( ' Release Date Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .slider_countdown_wapper .sldr_cnt_box span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'release_on_ypography_date',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .slider_countdown_wapper .sldr_cnt_box span',
                ]
            );
            $this->add_control(
                'release_on_date_caption_color',
                [
                    'label' => __( ' Release Date Caption Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .slider_countdown_wapper .sldr_cnt_box' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'release_on_ypography_aption',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .slider_countdown_wapper .sldr_cnt_box',
                ]
            );
            $this->add_control(
                'release_on_date_box_bg_color',
                [
                    'label' => __( ' Release Count Box BG Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => 'rgba(0,0,0,0.5)',
                    'selectors' => [
                        '{{WRAPPER}} .slider_countdown_wapper .sldr_cnt_box' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'release_on_date_box_bg_padding',
                [
                    'label' => __( 'Box Padding', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .slider_countdown_wapper .sldr_cnt_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            ); 






            $this->add_control(
                'title_border_style',
                [
                    'label' => __( 'Title Border Top Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            ); 
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'title_border_top_style',
                    'label' => __( 'Button Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} span.ftagem-shap',
                ]
            );
            $this->add_responsive_control(
                'title_border_top_style_margin',
                [
                    'label' => __( 'Border Space', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} span.ftagem-shap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );             
            $this->add_control(
                'title_border_style_bottom',
                [
                    'label' => __( 'Title Border Bottom Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            ); 
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'title_border_bottom_tyle',
                    'label' => __( 'Button Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} span.ftagem-shap-bottom',
                ]
            );
            $this->add_responsive_control(
                'title_border_top_style_margin_bottom',
                [
                    'label' => __( 'Border Space', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} span.ftagem-shap-bottom' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            ); 
            $this->end_controls_tab();
            $this->start_controls_tab(
                'item_box_style_hover_tab',
                [
                    'label' => __( 'Hover', 'ftagementor' ),
                ]
            );

                $this->add_control(
                'slbtn_color_hover',
                [
                    'label' => __( 'Button Hover color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .slide-btn a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'slbtn_bg_color_hover',
                [
                    'label' => __( 'Button background Hover color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#000',
                    'selectors' => [
                        '{{WRAPPER}} .slide-btn a:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );    
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'carousel_style',
            [
                'label' => __( 'Carousel Button', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs(
                    'slider_arrow_button_heading_tabs'
                );
                    $this->start_controls_tab(
                        'slider_arrow_button_heading_normal_tab',
                        [
                            'label' => __( 'Normal', 'ftagementor' ),
                        ]
                    );
                    $this->add_control(
                        'slider_arrow_button_heading',
                        [
                            'label' => __( 'Arrow Button', 'ftagementor' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );        
                            $this->add_control(
                        'carousel_nav_color',
                        [
                            'label' => __( 'COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav div' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color',
                        [
                            'label' => __( 'BG COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav div' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .owl-nav div',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_responsive_control(
                        'carousel_navicon_width',
                        [
                            'label' => __( 'Width', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'default' => 50,
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav div' => 'width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_height',
                        [
                            'label' => __( 'Height', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'default' => 50,
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav div' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .owl-nav div',
                        ]
                    );   
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav div:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );   
                    $this->add_responsive_control(
                        'carousel_nav_margin',
                        [
                            'label' => __( 'Arrow Margin', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );                               
                $this->add_control(
                'pagination_button_heading',
                [
                    'label' => __( 'Pagination Button', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            ); 

            $this->add_control(
                'pagination_color',
                [
                    'label' => __( 'Button Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .slider-area .owl-dots .owl-dot' => 'color: {{VALUE}};',
                    ],
                ]
            );
                $this->add_responsive_control(
                    'pagination_icon_size',
                    [
                        'label' => __( 'Font Size', 'ftagementor' ),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                        'default' => 20,
                        'selectors' => [
                            '{{WRAPPER}} .slider-area .owl-dots .owl-dot' => 'font-size: {{VALUE}}px;',
                        ],
                    ]
                );
                    $this->add_responsive_control(
                        'pagination_container_width',
                        [
                            'label' => __( 'Container Width', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 1024,
                            'max' => 1920,
                            'step' => 1,
                            'default' => 1170,
                            'selectors' => [
                                '{{WRAPPER}} .slider-area .owl-dots' => 'max-width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'pagination_bottom_space',
                        [
                            'label' => __( 'Space Bottom', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                            'default' => 40,
                            'selectors' => [
                                '{{WRAPPER}} .slider-area .owl-dots' => 'bottom: {{VALUE}}px;',
                            ],
                        ]
                    );                
            $this->add_responsive_control(
                'pagination_alignment',
                [
                    'label' => __( 'Pagination Alignment', 'ftagementor' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'ftagementor' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'ftagementor' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'ftagementor' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                        'selectors' => [
                            '{{WRAPPER}} .slider-area .owl-dots' => 'text-align: {{VALUE}};',
                        ],
                ]
            );                
            $this->end_controls_tab();
            $this->start_controls_tab(
                'slider_arrow_button_heading_hovr_tab',
                [
                    'label' => __( 'Hover', 'ftagementor' ),
                ]
            );
                    $this->add_control(
                        'carousel_nav_color_hover',
                        [
                            'label' => __( 'Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav div:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color_hover',
                        [
                            'label' => __( 'BG COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#000',
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav div:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .slider-area .owl-dots::after',
                        ]
                    ); 
                    $this->add_control(
                        'pagination_active_heading',
                        [
                            'label' => __( 'Pagination Hover', 'ftagementor' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    ); 
                    $this->add_control(
                        'pagination_active_color',
                        [
                            'label' => __( 'Button Active Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default'=>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .slider-area .owl-dots .owl-dot.active' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'pagination_icon_active_size',
                        [
                            'label' => __( 'Font Size', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'default' => 25,
                            'selectors' => [
                                '{{WRAPPER}} .slider-area .owl-dots .owl-dot.active' => 'font-size: {{VALUE}}px;',
                            ],
                        ]
                    );
                $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        // Style tab section
        $this->start_controls_section(
            'slider_social_style',
                [
                    'label' => __( 'Social Icon Style', 'elementor' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );
            $this->start_controls_tabs(
                    'slider_slider_social_tabs'
                );
                    $this->start_controls_tab(
                        'slider_slider_social_normal_tab',
                        [
                            'label' => __( 'Normal', 'ftagementor' ),
                        ]
                    ); 
                    $this->add_responsive_control(
                        'social_container_width',
                        [
                            'label' => __( 'Container Width', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 1024,
                            'max' => 1920,
                            'step' => 1,
                            'default' => 1170,
                            'selectors' => [
                                '{{WRAPPER}} .slider-social-production' => 'max-width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'social_bottom_space',
                        [
                            'label' => __( 'Space Bottom', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                            'default' => 40,
                            'selectors' => [
                                '{{WRAPPER}} .slider-social-production' => 'bottom: {{VALUE}}px;',
                            ],
                        ]
                    );
                        $this->add_control(
                            'social_text_color',
                            [
                                'label' => __( 'Color', 'ftagementor' ),
                                'type' => Controls_Manager::COLOR,
                                'scheme' => [
                                    'type' => Scheme_Color::get_type(),
                                    'value' => Scheme_Color::COLOR_1,
                                ],
                                'default'=>'#fff',
                                'selectors' => [
                                    '{{WRAPPER}} .slider-social li a,{{WRAPPER}} .slider-social-production li a' => 'color: {{VALUE}};',
                                ],
                            ]
                        );
                        $this->add_responsive_control(
                            'social_text_size',
                            [
                                'label' => __( 'Font Size', 'ftagementor' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 200,
                                'step' => 1,
                                'default' => 15,
                                'selectors' => [
                                    '{{WRAPPER}} .slider-social li a,{{WRAPPER}} .slider-social-production li a' => 'font-size: {{VALUE}}px;',
                                ],
                            ]
                        );

                        $this->add_control(
                            'slider_video_play_color',
                            [
                                'label' => __( 'Video Play Icon Color', 'ftagementor' ),
                                'type' => Controls_Manager::COLOR,
                                'scheme' => [
                                    'type' => Scheme_Color::get_type(),
                                    'value' => Scheme_Color::COLOR_1,
                                ],
                                'default'=>'#fff',
                                'selectors' => [
                                    '{{WRAPPER}} .pro-slide-pop a.popup-youtube' => 'color: {{VALUE}};',
                                ],
                            ]
                        );
                        $this->add_responsive_control(
                            'slider_video_play_font_size',
                            [
                                'label' => __( 'Font Size', 'ftagementor' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 200,
                                'step' => 1,
                                'default' => 60,
                                'selectors' => [
                                    '{{WRAPPER}} .pro-slide-pop a.popup-youtube' => 'font-size: {{VALUE}}px;',
                                ],
                            ]
                        );

                $this->end_controls_tab();
                $this->start_controls_tab(
                    'slider_slider_social_hover_tab',
                    [
                        'label' => __( 'Hover', 'ftagementor' ),
                    ]
                );

                    $this->add_control(
                        'social_text_color_hover',
                        [
                            'label' => __( 'Social Icon Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default'=>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .slider-social li a:hover,{{WRAPPER}} .slider-social-production li a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'slider_video_play_color_hover',
                        [
                            'label' => __( 'Video Play Icon Hover Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default'=>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .pro-slide-pop a.popup-youtube:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );                    

            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();      
    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        // Slider Option
        $sllayout = $settings['sllayout'];
        $slautoplay = $settings['slautoplay'];
        $slarrows = $settings['slarrows'];
        $sldots = $settings['sldots'];
        $slautoplayspeed = $settings['slautoplayspeed'];
        $sl_socialicon = $settings['sl_socialicon'];
        $sl_socialicon_text = $settings['sl_socialicon_text'];
        $sl_video_play_icon_select = $settings['sl_video_play_icon_select'];
        $title_border_top = $settings['title_border_top'];
        $title_border_bottom = $settings['title_border_bottom'];
        $production_text = $settings['production_text'];



        $sectionid =  $this-> get_id();


        $dot_icon_type        = $this->get_settings_for_display('dot_icon_type');
        $sl_video_play_icon        = $this->get_settings_for_display('sl_video_play_icon');
         $dot_icon_font        = $settings['dot_icon_font'];
        $dot_icon_iamge  =   $settings['dot_icon_iamge']['url'];
        $iconmena = '<i class="'.$dot_icon_font.'"></i>';
        $icon_imgprint='<img src="'.$dot_icon_iamge.'" alt="" />';

        $slarrows_type        = $this->get_settings_for_display('slarrows_type');
         $slarrowsicon_font_next        = $settings['slarrowsicon_font_next'];
         $slarrowsicon_font_prev        = $settings['slarrowsicon_font_prev'];
        $slarrows_iamge_next  =   $settings['slarrows_iamge_next']['url'];
        $slarrows_iamge_prev  =   $settings['slarrows_iamge_prev']['url'];
        $slarrowsicon_font_next = '<i class="'.$slarrowsicon_font_next.'"></i>';
        $slarrowsicon_font_prev = '<i class="'.$slarrowsicon_font_prev.'"></i>';
        $slarrows_iamge_next ='<img src="'.$slarrows_iamge_next.'" alt="" />';
        $slarrows_iamge_prev ='<img src="'.$slarrows_iamge_prev.'" alt="" />';


        if($slarrows_type == 'icon'){
            $print_next = $slarrowsicon_font_next;
            $print_prev = $slarrowsicon_font_prev;
            }else{
            $print_next = $slarrows_iamge_next;
            $print_prev = $slarrows_iamge_prev;

            }



        ?>
            <!-- Slider Section Start -->
            <div class="slider-area <?php if($slarrows_type == 'image'){ echo 'arrow_hover'; }?>">

                <?php if( $sllayout == 1 ){ ?>
                        <div class="slider-active <?php echo $sectionid;?> owl-theme owl-carousel">
                            <?php 
                                foreach ( $settings['sliders_list'] as $item ) :
                                // Button Link
                                $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                                $images = $item['slimage'];
                                $sli_video = $item['sli_video'];
                            ?>
                            <!-- Slider Single -->
                            <div class="slider-item" style="background-image: url(<?php echo $images['url']; ?>);" data-dot="<?php if( $dot_icon_type == 'image' ){ echo esc_html__($icon_imgprint); } else{ echo esc_html__( '<i class="'.$dot_icon_font.' spinner"></i>' ); } ?>">
                                
                                <div class="container">
                                    <div class="row">
                                        <div class="slide-content col-md-12">
                                        <?php
                                            if( !empty( $item['slsubtitle'] ) ){
                                                echo '<h2>'.$item['slsubtitle'].'</h2>';
                                            }

                                                if( !empty( $item['sltitle'] ) ){
                                                    echo '<h1>'.$item['sltitle'].'</h1>';
                                                }
                                                if( !empty( $item['slcontent'] ) ){
                                                    echo '<p>'.$item['slcontent'].'</p>';
                                                }
                                                if(!empty($item['slbutton'])){
                                                echo'<div class="slide-btn">';
                                                if( !empty($item['slbuttonlink']) ){

                                                    echo '<a class="read-more" href="' . esc_url($item['slbuttonlink']['url']) . '"' . $target . $nofollow . '> '; echo esc_attr($item['slbutton']); if($item['readmore_icon'] == 'yes'){ if($item['readmore_icon_type'] =='image'){ ?> <img src="<?php echo $readmore_iamge_icon['url'];?>" alt="<?php esc_attr('read more icon') ?>"> <?php }else{
                                                            echo '<i class="'.$item['readmore_font_next'].'"></i>';
                                                    }  }  echo '</a>';
                                                }
                                                echo'</div>';
                                                }
                                             ?>
                                        </div>
                                    </div>
                                </div>
                            <?php if( $sl_video_play_icon == 'yes') {?>
                                <div class="pro-slide-pop">
                                    <a href="<?php echo esc_url($sli_video); ?>" class="popup-youtube" tabindex="0"><i class="<?php echo esc_attr( $sl_video_play_icon_select )?>"></i>
                                    </a>
                                </div>
                            <?php } ?>
                            </div>
                            <!-- Slider Single -->
                            <?php endforeach; ?>
                        </div>
                <?php }elseif( $sllayout == 2 ){?>
                        <div class="slider-active <?php echo $sectionid;?> owl-theme owl-carousel">
                            <?php 
                                foreach ( $settings['sliders_list'] as $item ) :
                                // Button Link
                                $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                                $images = $item['slimage'];
                                $sli_video = $item['sli_video'];
                            ?>
                            <!-- Slider Single -->
                            <div class="slider-item" style="background-image: url(<?php echo $images['url']; ?>);" data-dot="<?php if( $dot_icon_type == 'image' ){ echo esc_html__($icon_imgprint); } else{ echo esc_html__( '<i class="'.$dot_icon_font.' spinner"></i>' ); } ?>">
                                
                                <div class="container">
                                    <div class="row">
                                        <div class="slide-content col-md-12">
                                        <?php
                                            if( !empty( $item['slsubtitle'] ) ){
                                                echo '<h2>'.$item['slsubtitle'].'</h2>';
                                            }

                                                if( !empty( $item['sltitle'] ) ){
                                                    echo '<h1>'.$item['sltitle'].'</h1>';
                                                }
                                                if( !empty( $item['slcontent'] ) ){
                                                    echo '<p>'.$item['slcontent'].'</p>';
                                                }
                                                if(!empty($item['slbutton'])){
                                                echo'<div class="slide-btn">';
                                                if( !empty($item['slbuttonlink']) ){

                                                    echo '<a class="read-more" href="' . esc_url($item['slbuttonlink']['url']) . '"' . $target . $nofollow . '> '; echo esc_attr($item['slbutton']); if($item['readmore_icon'] == 'yes'){ if($item['readmore_icon_type'] =='image'){ ?> <img src="<?php echo $readmore_iamge_icon['url'];?>" alt="<?php esc_attr('read more icon') ?>"> <?php }else{
                                                            echo '<i class="'.$item['readmore_font_next'].'"></i>';
                                                    }  }  echo '</a>';
                                                }
                                                echo'</div>';
                                                }
                                             ?>
                                            <?php if( $settings['sliders_list_social'] ) {?>
                                             <ul class="slider-social">
                                              <?php 
                                                foreach ( $settings['sliders_list_social'] as $item_social ) :
                                                $target2 = $item_social['sliders_list_social_link']['is_external'] ? ' target="_blank"' : '';
                                                $nofollow2 = $item_social['sliders_list_social_link']['nofollow'] ? ' rel="nofollow"' : '';
                                                $sliders_list_social_text = $item_social['sliders_list_social_text'];
                                                $sliders_list_social_icon = $item_social['sliders_list_social_icon'];
                                                ?>            
                                                <li>
                                                    <?php
                                                    if( !empty($item_social['sliders_list_social_link']) ){ 
                                                        if( $sl_socialicon_text == 'yes'){

                                                    echo '<a  href="' . esc_url($item_social['sliders_list_social_link']['url']) . '"' . $target2 . $nofollow2 . '> '. esc_attr($item_social['sliders_list_social_text']).'</a>';
                                                        }else{
                                                            echo '<a  href="' . esc_url($item_social['sliders_list_social_link']['url']) . '"' . $target2 . $nofollow2 . '><i class=" '. esc_attr($item_social['sliders_list_social_icon']).'"></i></a>';

                                                            }
                                                        }
                                                        ?>
                                                </li>
                                                <?php endforeach;?>
                                            </ul> 
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php if( $sl_video_play_icon == 'yes') {?>
                                <div class="pro-slide-pop">
                                    <a href="<?php echo esc_url($sli_video); ?>" class="popup-youtube" tabindex="0"><i class="<?php echo esc_attr( $sl_video_play_icon_select )?>"></i>
                                    </a>
                                </div>
                            <?php } ?>
                            </div>
                            <!-- Slider Single -->
                            <?php endforeach; ?>
                        </div>                
                <?php }elseif( $sllayout == 5 ){?>
<!-- 5555555555555555555   -->                  
                        <div class="slider-active <?php echo $sectionid;?> owl-theme owl-carousel campagin_sldr">
                            <?php 
                                foreach ( $settings['sliders_list'] as $item ) :
                                // Button Link
                                $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                                $images = $item['slimage'];
                                $sli_video = $item['sli_video'];
                                $readmore_iamge_icon = $item['readmore_iamge_icon'];
                            ?>
                            <!-- Slider Single -->
                            <div class="slider-item" style="background-image: url(<?php echo $images['url']; ?>);" data-dot="<?php if( $dot_icon_type == 'image' ){ echo esc_html__($icon_imgprint); } else{ echo esc_html__( '<i class="'.$dot_icon_font.' spinner"></i>' ); } ?>">
                                
                                <div class="container">
                                    <div class="row">

                                        <div class="slide-content cam_sldr_left col-md-6">
                                        <?php
                                            if( !empty( $item['slsubtitle'] ) ){
                                                echo '<h2>'.$item['slsubtitle'].'</h2>';
                                            }

                                                if( !empty( $item['sltitle'] ) ){
                                                    echo '<h1>'.$item['sltitle'].'</h1>';
                                                }
                                                if( !empty( $item['slcontent'] ) ){
                                                    echo '<p>'.$item['slcontent'].'</p>';
                                                }
                                                if(!empty($item['slbutton'])){
                                                echo'<div class="slide-btn">';
                                                if( !empty($item['slbuttonlink']) ){

                                                    echo '<a class="read-more" href="' . esc_url($item['slbuttonlink']['url']) . '"' . $target . $nofollow . '> '; echo esc_attr($item['slbutton']); if($item['readmore_icon'] == 'yes'){ if($item['readmore_icon_type'] =='image'){ ?> <img src="<?php echo $readmore_iamge_icon['url'];?>" alt="<?php esc_attr('read more icon') ?>"> <?php }else{
                                                            echo '<i class="'.$item['readmore_font_next'].'"></i>';
                                                    }  }  echo '</a>';
                                                }
                                                echo'</div>';
                                                }
                                             ?>
                                        </div>
                                        <div class="col-md-6 slide-content sldr_counter_content">

                                            <?php
                                            if( !empty( $item['release_moive_title'] ) ){ ?>

                                                <h2> <span class="sld_border_shap"><?php echo esc_html( $item['release_moive_title'] ) ?></span> </h2>
                                                <?php
                                                }

                                                if( !empty( $item['release_on_title'] ) ){

                                                    echo '<h1>'.$item['release_on_title'].'</h1>';
                                                }

                                             if( !empty( $item['release_on_date'] ) ){ ?>

                                            <div class="slider_countdown_wapper"  data-countdown="<?php echo esc_attr( $item['release_on_date'] );  ?>">

                                            </div>
                                        <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            <?php if( $sl_video_play_icon == 'yes') {?>
                                <div class="pro-slide-pop">
                                    <a href="<?php echo esc_url($sli_video); ?>" class="popup-youtube" tabindex="0"><i class="<?php echo esc_attr( $sl_video_play_icon_select )?>"></i>
                                    </a>
                                </div>
                            <?php } ?>
                            </div>
                            <!-- Slider Single -->
                            <?php endforeach; ?>
                        </div> 
  <!--  5555555end  -->                                  
                <?php }elseif( $sllayout == 4 ){ ?>

                        <!-- Start Slider Area -->
                        <div class="slider-active <?php echo $sectionid;?> owl-theme owl-carousel">
                            <?php 
                                foreach ( $settings['sliders_list'] as $item ) :
                                // Button Link
                                $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                                $images = $item['slimage'];
                                $sli_video = $item['sli_video'];
                            ?>
                            <!-- Slider Single -->
                            <div class="slider-item ftagementor_js_ripples" style="background-image: url(<?php echo $images['url']; ?>);" data-dot="<?php if( $dot_icon_type == 'image' ){ echo esc_html__($icon_imgprint); } else{ echo esc_html__( '<i class="'.$dot_icon_font.' spinner"></i>' ); } ?>">
                                
                                <div class="container">
                                    <div class="row">
                                        <div class="slide-content col-md-12">
                                        <?php
                                        if( $title_border_top == 'yes'){ ?>
                                            <span class="ftagem-shap"></span>
                                       <?php }
                                            if( !empty( $item['slsubtitle'] ) ){
                                                echo '<h2>'.$item['slsubtitle'].'</h2>';
                                            }

                                                if( !empty( $item['sltitle'] ) ){
                                                    echo '<h1>'.$item['sltitle'].'</h1>';
                                                }
                                                if( !empty( $item['slcontent'] ) ){
                                                    echo '<p>'.$item['slcontent'].'</p>';
                                                } 
                                        if( $title_border_bottom == 'yes'){ ?>
                                            <span class="ftagem-shap-bottom"></span>
                                         <?php }?>
                                                
                                                <?php
                                                if(!empty($item['slbutton'])){
                                                echo'<div class="slide-btn">';
                                                if( !empty($item['slbuttonlink']) ){

                                                    echo '<a class="read-more" href="' . esc_url($item['slbuttonlink']['url']) . '"' . $target . $nofollow . '> '; echo esc_attr($item['slbutton']); if($item['readmore_icon'] == 'yes'){ if($item['readmore_icon_type'] =='image'){ ?> <img src="<?php echo $readmore_iamge_icon['url'];?>" alt="<?php esc_attr('read more icon') ?>"> <?php }else{
                                                            echo '<i class="'.$item['readmore_font_next'].'"></i>';
                                                    }  }  echo '</a>';
                                                }
                                                echo'</div>';
                                                }
                                             ?>

                                        </div>
                                    </div>
                                </div>
                            <?php if( $sl_video_play_icon == 'yes') {?>
                                <div class="pro-slide-pop">
                                    <a href="<?php echo esc_url($sli_video); ?>" class="popup-youtube" tabindex="0"><i class="<?php echo esc_attr( $sl_video_play_icon_select )?>"></i>
                                    </a>
                                    <?php  if(!empty($production_text) ){

                                    echo '<p>'. $production_text. '</p>';

                                     } ?>
                                </div>
                            <?php } ?>
                            </div>
                            <!-- Slider Single -->
                            <?php endforeach; ?>
                        </div>   

                <?php }else{ ?>

                    <div class="slider-active <?php echo $sectionid;?> owl-theme owl-carousel">  
                        <?php 
                            foreach ( $settings['sliders_list'] as $item ) :
                            // Button Link
                            $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                            $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                            $images = $item['slimage'];
                            $sli_video = $item['sli_video'];
                        ?>  
                        <div class="banner-area background-video-holder" data-dot="<?php if( $dot_icon_type == 'image' ){ echo esc_html__($icon_imgprint); } else{ echo esc_html__( '<i class="'.$dot_icon_font.' spinner"></i>' ); } ?>">     
                            <!-- Single Banner -->
                            <div class="banner fullscreen">
                                <div class="container">
                                    <div class="row">
                                        <div class="slide-content col-md-12">
                                        <?php
                                            if( !empty( $item['slsubtitle'] ) ){
                                                echo '<h2>'.$item['slsubtitle'].'</h2>';
                                            }

                                                if( !empty( $item['sltitle'] ) ){
                                                    echo '<h1>'.$item['sltitle'].'</h1>';
                                                }
                                                if( !empty( $item['slcontent'] ) ){
                                                    echo '<p>'.$item['slcontent'].'</p>';
                                                }
                                                if(!empty($item['slbutton'])){
                                                echo'<div class="slide-btn">';
                                                if( !empty($item['slbuttonlink']) ){

                                                    echo '<a class="read-more" href="' . esc_url($item['slbuttonlink']['url']) . '"' . $target . $nofollow . '> '; echo esc_attr($item['slbutton']); if($item['readmore_icon'] == 'yes'){ if($item['readmore_icon_type'] =='image'){ ?> <img src="<?php echo $readmore_iamge_icon['url'];?>" alt="<?php esc_attr('read more icon') ?>"> <?php }else{
                                                            echo '<i class="'.$item['readmore_font_next'].'"></i>';
                                                    }  }  echo '</a>';
                                                }
                                                echo'</div>';
                                                }
                                             ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--// Single Banner -->
                            <div class="youtube-video-wrapper">
                                <div class="youtube-bg" data-property="{videoURL:'<?php echo esc_url($sli_video); ?>',containment:'self',showControls:false,startAt:0,mute:true,autoPlay:true,loop:true,opacity:1,showYTLogo:false,optimizeDisplay:true}" style="background-image: url(<?php echo $images['url']; ?>); background-size: cover; background-position: center center; background-repeat: no-repeat;"></div>
                            </div>
                                <?php if( $sl_video_play_icon == 'yes') {?>
                                <div class="pro-slide-pop">
                                    <a href="<?php echo esc_url($sli_video); ?>" class="popup-youtube" tabindex="0"><i class="<?php echo esc_attr( $sl_video_play_icon_select )?>"></i>
                                    </a>
                                </div>
                                <?php } ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php }?>

                <?php if($sl_socialicon == 'yes' && !empty($settings['sliders_list_social']) && $sllayout == 1 || $sllayout == 3 || $sllayout == 4 || $sllayout == 5 && $settings['sliders_list_social']){ ?>
                    
                    <div class="slider-social-production">
                    <ul class="slider-social-production-list">
                        <?php 
                            foreach ( $settings['sliders_list_social'] as $item_social ) :
                            // Button Link
                            $target2 = $item_social['sliders_list_social_link']['is_external'] ? ' target="_blank"' : '';
                            $nofollow2 = $item_social['sliders_list_social_link']['nofollow'] ? ' rel="nofollow"' : '';
                            $sliders_list_social_text = $item_social['sliders_list_social_text'];
                            $sliders_list_social_icon = $item_social['sliders_list_social_icon'];
                        ?>            
                        <li>
                            <?php
                                if( !empty($item_social['sliders_list_social_link']) ){ 
                                    if( $sl_socialicon_text == 'yes'){

                                echo '<a  href="' . esc_url($item_social['sliders_list_social_link']['url']) . '"' . $target2 . $nofollow2 . '> '. esc_attr($item_social['sliders_list_social_text']).'</a>';
                                    }else{
                                        echo '<a  href="' . esc_url($item_social['sliders_list_social_link']['url']) . '"' . $target2 . $nofollow2 . '><i class=" '. esc_attr($item_social['sliders_list_social_icon']).'"></i></a>';

                                    }
                                }
                                ?>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    </div>
                <?php }?>
            </div>

    <style>

        .slider-area .container{
            max-width: 1490px;
        }

    </style>
            <!-- Slider Section End -->

            <script type="text/javascript">
                (function($){

                    var _arrows_set = <?php echo esc_js( $slarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $slautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($slautoplayspeed) ){ echo esc_js($slautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                    var _dots_set = <?php echo esc_js( $sldots ) == 'yes' ? 'true': 'false'; ?>;

                    $('.slider-active.<?php echo $sectionid;?>').owlCarousel({
                        items:1,
                        margin:0,
                        autoHeight:true,
                        dots: _dots_set,
                        dotsData: true,
                        nav: _arrows_set,
                        autoplay: _autoplay_set,
                        smartSpeed:_autoplay_speed,
                        animateOut: 'fadeOut',
                        animateIn: 'fadeIn',
                        navText:[ '<span>Prev</span><?php echo $print_prev; ?>','<span>Next</span><?php echo $print_next; ?>'],

                    }); 
                    

                })(jQuery);

            </script>

        <?php

    }

    protected function content_template() {
        ?>
            
        <?php
    }

    public function render_plain_content( $instance = [] ) {
        ?>

        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Ftage_Elementor_Widget_Slider() );

