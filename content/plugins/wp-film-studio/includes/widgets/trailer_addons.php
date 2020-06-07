<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class wpfilm_Elementor_Widget_Trailer extends Widget_Base {

    public function get_name() {
        return 'wpfilm-studio-trailer';
    }
    
    public function get_title() {
        return __( 'Wpfilm-Studio : Trailer/Movie', 'wpfilm-studio' );
    }

    public function get_icon() {
        return 'fa fa-video-camera';
    }
    public function get_categories() {
        return [ 'wpfilm-studio' ];
    }
    public function get_script_depends() {
        return [
            'slick',
            'wpfilm-widgets-scripts',
        ];
    }
    protected function _register_controls() {

        $this->start_controls_section(
            'wpfilm_studio_trailer_content_setting',
            [
                'label' => esc_html__( 'Trailer/Movie Content', 'wpfilm-studio' ),
            ]
        );

           $this->add_control(
                'wpfilm_studio_content_source',
                [
                    'label' => esc_html__( 'Content Source', 'wpfilm-studio' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'wpfilm_movie',
                    'options' => [
                        'wpfilm_movie' => esc_html__( 'Movie', 'wpfilm-studio' ),
                        'wpfilm_trailer' => esc_html__( 'Trailer', 'wpfilm-studio' ),
                    ],
                ]
            );
           $this->add_control(
                'wpfilm_studio_trailer_style_select',
                [
                    'label' => esc_html__( 'Slect Style', 'wpfilm-studio' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Style One', 'wpfilm-studio' ),
                        '2' => esc_html__( 'Style Two', 'wpfilm-studio' ),
                    ],
                ]
            );
            $this->add_control(
                'wpfilm_studio_trailers_categories',
                [
                    'label' => esc_html__( 'Select Item Category', 'wpfilm-studio' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wpfilm_studio_trailer_categories(),
                    'condition' => [
                        'wpfilm_studio_content_source' => 'wpfilm_trailer',
                    ]
                ]
            );
            $this->add_control(
                'wpfilm_studio_movies_categories',
                [
                    'label' => esc_html__( 'Select Movie Category', 'wpfilm-studio' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wpfilm_studio_movie_categories(),
                    'condition' => [
                        'wpfilm_studio_content_source' => 'wpfilm_movie',
                    ]                    
                ]
            );
            $this->add_control(
                'show_category_text',
                [
                    'label' => esc_html__( 'Show Category', 'wpfilm-studio' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );            
           $this->add_control(
                'playiconty',
                [
                    'label' => esc_html__( 'Play/Link Icon Type', 'wpfilm-studio' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Icon', 'wpfilm-studio' ),
                        '2' => esc_html__( 'image', 'wpfilm-studio' ),
                    ],
                ]
            );

            $this->add_control(
                'iconiamge',
                [
                    'label' => __( 'Play/Link Icon Image', 'wpfilm-studio' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'playiconty' => '2',
                    ]
                ]
            );
            $this->add_control(
                'playicon',
                [
                    'label' => __( 'Play/Link Icon', 'wpfilm-studio' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'icofont icofont-play-alt-2',
                    'condition' => [
                        'playiconty' => '1',
                    ]
                ]
            );
        $this->end_controls_section();
        // content tab

        // Trailer Option
        $this->start_controls_section(
            'wpfilm_studio_trailer_option_setting',
            [
                'label' => esc_html__( 'Carousel Option', 'wpfilm-studio' ),
            ]
        );
            $this->add_control(
                'slautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'wpfilm-studio' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'slautoplayspeed',
                [
                    'label' => __( 'Auto play speed', 'wpfilm-studio' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'max' => 10000,
                    'step' => 100,
                    'default' => 1000,
                    'condition' => [
                        'slautoplay' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slarrows',
                [
                    'label' => esc_html__( 'Arrow', 'wpfilm-studio' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'slarrowsstyle',
                [
                    'label' => esc_html__( 'Arrow Style', 'wpfilm-studio' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        1 => esc_html__( 'Style One Icon Middle', 'wpfilm-studio' ),
                        2 => esc_html__( 'Style Two Icon Top', 'wpfilm-studio' ),
                    ],
                ]
            );


            $this->add_control(
                'arrow_icon_next',
                [
                    'label' => __( 'Icon Next', 'wpfilm-studio' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'icofont icofont-long-arrow-right',
                    'condition' => [
                        'slarrows' => 'yes',
                    ]
                ]
            );
            $this->add_control(
                'arrow_icon_prev',
                [
                    'label' => __( 'Icon Prev', 'wpfilm-studio' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'icofont icofont-long-arrow-left',
                    'condition' => [
                        'slarrows' => 'yes',
                    ]
                ]
            );


            $this->add_control(
                'itemmargin',
                [
                    'label' => __( 'Margin', 'wpfilm-studio' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                    'default' => 30,
                    'condition' => [
                        'service_style' => '1',
                    ]
                ]
            );
            $this->add_control(
                'showitem',
                [
                    'label' => __( 'Show Item', 'wpfilm-studio' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 3,
                ]
            );
            $this->add_control(
                'showitemtablet',
                [
                    'label' => __( 'Show Item (Tablet)', 'wpfilm-studio' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 2,
                ]
            );
            $this->add_control(
                'showitemmobile',
                [
                    'label' => __( 'Show Item (Large Mobile)', 'wpfilm-studio' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 1,
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'wpfilm_studio_trailer_styles',
            [
                'label' => __( 'Content Style', 'wpfilm-studio' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
                'wpfilm_content_tabs'
            );
                $this->start_controls_tab(
                    'wpfilm_content_normal_tabs',
                    [
                        'label' => __( 'Normal', 'wpfilm-studio' ),
                    ]
                );          
            $this->add_control(
                'wpfilm_studio_trailer_title_heading',
                [
                    'label' => __( 'Content Color', 'wpfilm-studio' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_responsive_control(
                'align_box',
                [
                    'label' => __( 'Content Alignment', 'ftagementor' ),
                    'type' => Controls_Manager::CHOOSE,
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
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-single' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title color', 'wpfilm-studio' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-titel h5' => 'color: {{VALUE}};',
                    ],
                ]
            );       

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .trailer-titel h5',
                ]
            );

            $this->add_control(
                'duration_color',
                [
                    'label' => __( 'Duration Time color', 'wpfilm-studio' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-titel span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'durationtypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .trailer-titel span',
                ]
            );
            $this->add_control(
                'category_color',
                [
                    'label' => __( 'Category color', 'wpfilm-studio' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-titel h6' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'categorytypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .trailer-titel h6',
                ]
            );            
            $this->add_control(
                'wpfilm_studio_trailer_play_heading',
                [
                    'label' => __( 'Play Icon', 'wpfilm-studio' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );            
            $this->add_control(
                'pl_color',
                [
                    'label' => __( 'Icon color', 'wpfilm-studio' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-img .popup-youtube,{{WRAPPER}} .trailer-img .popup-movie-link' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'button_border',
                    'label' => __( 'Button Border', 'wpfilm-studio' ),
                    'selector' => '{{WRAPPER}} .trailer-img .popup-youtube,{{WRAPPER}} .trailer-img .popup-movie-link',
                ]
            );   
                $this->end_controls_tab();
                    $this->start_controls_tab(
                        'wpfilm_content_hover_tabs',
                        [
                            'label' => __( 'Hover', 'htservice' ),
                        ]
                    );
                    $this->add_control(
                        'title_color_hover',
                        [
                            'label' => __( 'Title Hover color', 'wpfilm-studio' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' => '#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .trailer-titel h5 a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'pl_color_hover',
                        [
                            'label' => __( 'Icon Hover color', 'wpfilm-studio' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default'=>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .trailer-img .popup-youtube:hover,{{WRAPPER}} .trailer-img .popup-movie-link:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );


            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'item_box_style',
            [
                'label' => __( 'Box Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
                'wpfilm_item_box_style'
            );
                $this->start_controls_tab(
                    'item_box_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ftagementor' ),
                    ]
                );
            $this->add_control(
                'wpfilm_studio_trailer_img_heading',
                [
                    'label' => __( 'Image Border ', 'wpfilm-studio' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'img_border_style',
                    'label' => __( 'Image Border', 'wpfilm-studio' ),
                    'selector' => '{{WRAPPER}} .trailer-img::before',
                ]
            );    
             $this->add_control(
                'video_overlay_color',
                [
                    'label' => __( 'Image Overlay color', 'wpfilm-studio' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'rgba(0,0,0,0.59)',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-img::after' => 'background-color: {{VALUE}};',
                    ],
                ]
            ); 
            $this->add_control(
                'box_all_style',
                [
                    'label' => __( ' Box Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );             
            $this->add_responsive_control(
                'box_margin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .trailer-single' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_padding',
                [
                    'label' => __( 'Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .trailer-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'box_border_radious',
                [
                    'label' => __( 'Box Border Radius', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .trailer-single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'box_border_single',
                    'label' => __( 'Box Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .trailer-single',
                ]
            ); 
            $this->add_control(
                'content_box_haeading',
                [
                    'label' => __( 'Content Description Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
             $this->add_control(
                'content_box_bg',
                [
                    'label' => __( 'Description BG', 'wpfilm-studio' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'rgba(0,0,0,0)',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-titel' => 'background-color: {{VALUE}};',
                    ],
                ]
            );             
            $this->add_responsive_control(
                'content_box_margin',
                [
                    'label' => __( 'Description Box Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .trailer-titel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'content_box_padding',
                [
                    'label' => __( 'Description Box Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .trailer-titel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'box_border_single_hover',
                        'label' => __( 'Box Border Hover', 'ftagementor' ),
                        'selector' => '{{WRAPPER}} .trailer-single:hover',
                    ]
                ); 
            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
        // Style tab section
        $this->start_controls_section(
            'wpfilm_studio_button_styles',
            [
                'label' => __( 'Carousel Button Style', 'wpfilm-studio' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );               
        $this->start_controls_tabs(
                'wpfilm_carosel_tabs'
            );
                $this->start_controls_tab(
                    'wpfilm_carusel_normal_tabs',
                    [
                        'label' => __( 'Normal', 'wpfilm-studio' ),
                    ]
                );
                    $this->add_control(
                        'carousel_nav_color',
                        [
                            'label' => __( 'COlor', 'wpfilm-studio' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#000',
                            'selectors' => [
                                '{{WRAPPER}} .trailer-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color',
                        [
                            'label' => __( 'BG COlor', 'wpfilm-studio' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .trailer-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'wpfilm-studio' ),
                            'selector' => '{{WRAPPER}} .trailer-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .trailer-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_responsive_control(
                        'carousel_navicon_width',
                        [
                            'label' => __( 'Width', 'wpfilm-studio' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .trailer-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_height',
                        [
                            'label' => __( 'Height', 'wpfilm-studio' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .trailer-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .trailer-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow',
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_top_margin',
                        [
                            'label' => __( 'Button Top Position', 'wpfilm-studio' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => -200,
                            'max' => 200,
                            'step' => 1,
                            'default' => -87,
                            'selectors' => [
                                '{{WRAPPER}} .indicator-style-two .trailer-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'top: {{VALUE}}px;',
                            ],
                        ]
                    );                    
                $this->end_controls_tab();

                $this->start_controls_tab(
                    'wpfilm_carousel_hover_tabs',
                    [
                        'label' => __( 'Hover', 'htservice' ),
                    ]
                );
                    $this->add_control(
                        'slider_arrow_button_hover_heading',
                        [
                            'label' => __( 'Arrow Button Hover ', 'wpfilm-studio' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );        
                    $this->add_control(
                        'carousel_nav_color_hover',
                        [
                            'label' => __( 'COlor', 'wpfilm-studio' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .trailer-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color_hover',
                        [
                            'label' => __( 'BG COlor', 'wpfilm-studio' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .trailer-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'wpfilm-studio' ),
                            'selector' => '{{WRAPPER}} .trailer-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .trailer-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );                
             $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        // Trailer Option
        $wpfilm_studio_trailer_style_select = $settings['wpfilm_studio_trailer_style_select'];
        $wpfilm_studio_content_source = $settings['wpfilm_studio_content_source'];
        $slautoplay = $settings['slautoplay'];
        $slarrows = $settings['slarrows'];
        $slautoplayspeed = $settings['slautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];
        $itemmargin = $settings['itemmargin'];
        $slarrowsstyle = $settings['slarrowsstyle'];
        $show_category_text = $settings['show_category_text'];
         $sectionid =  $this-> get_id();


        $playiconty      = $this->get_settings_for_display('playiconty');
        $playicon        = $this->get_settings_for_display('playicon');
        $arrow_icon_prev        = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next        = $this->get_settings_for_display('arrow_icon_next');
        $iconiamge  =   $settings['iconiamge']['url'];

        if($playicon == ''){

            $playicon == 'icofont icofont-play-alt-2';
        }


        if( $arrow_icon_next =='icofont icofont-long-arrow-right' && $slarrowsstyle==2){
                $arrow_icon_prev = 'icofont icofont-thin-left';
                $arrow_icon_next = 'icofont icofont-thin-right';

        }

        ?>
            <!-- Trailer Section Start -->
            <div class="trailer-area">
                <?php


        if($wpfilm_studio_content_source=='wpfilm_movie'){
        $get_item_categories = $settings['wpfilm_studio_movies_categories'];
        }else{
            $get_item_categories = $settings['wpfilm_studio_trailers_categories'];
        }
        
        $item_cates = str_replace(' ', '', $get_item_categories);

        $args = array(
                    'post_type'            => $wpfilm_studio_content_source,
                    'post_status'          => 'publish',
                    'ignore_sticky_posts'  => 1,
                    'order'                => 'DESC',
        );
        if($wpfilm_studio_content_source=='wpfilm_movie'){
            $wpfilm_studio_content_source_cate ='wpfilm_movie_category';
        }else{
            $wpfilm_studio_content_source_cate ='wpfilm_trailer_category';
        }

        if ( "0" != $get_item_categories) {
            if( is_array($item_cates) && count($item_cates) > 0 ){
                $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => $wpfilm_studio_content_source_cate,
                        'terms' => $item_cates,
                        'field' => $field_name,
                        'include_children' => false
                    )
                );
            }
        }
                $posts = new \WP_Query($args);

                 if ($wpfilm_studio_trailer_style_select == 2 ){?>
                        <!-- Latest Trailer Item Area Start -->
                        <div class="latest-trailer-main">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="trailer-left-area slider slider-for-team <?php echo $sectionid;?>">
                                        <?php 
                        while($posts->have_posts()):$posts->the_post();

                            if($wpfilm_studio_content_source=='wpfilm_movie'){

                            $wpfilm_studio_trailer_video  = get_post_meta( get_the_ID(),'_wpfilm_trailer_video', true );
                            $videot = get_post_meta( get_the_ID(),'_wpfilm_movie_duration', true );

                            }else{

                            $wpfilm_studio_trailer_video  = get_post_meta( get_the_ID(),'_wpfilm_trailer_video', true ); 
                            $videot = get_post_meta( get_the_ID(),'_wpfilm_trailer_duration', true ); 
                        }

                                        ?>
                                        <div class="slick-left-thumb">
                                            <div class="trailer-img">
                                                <?php the_post_thumbnail('wpfilm_img550x348'); ?>

                                        <?php if($wpfilm_studio_content_source=='wpfilm_movie'){ ?>
                                            <a class="popup-movie-link" href="<?php the_permalink(); ?>">
                                              <?php
                                                if( $playiconty == 2 ){
                                                   ?>
                                                    <img src="<?php echo $iconiamge; ?>" alt="" />
                                                    <?php
                                                }else{
                                                    echo '<i class="'.esc_attr($playicon).'"></i>';
                                                } ?>  
                                            </a><?php } else{ ?>

                                            <a class="popup-youtube" href="<?php echo esc_url( $wpfilm_studio_trailer_video ); ?>">
                                            <?php
                                                    if( $playiconty == 2 ){
                                                       ?>
                                                        <img src="<?php echo $iconiamge; ?>" alt="" />
                                                        <?php
                                                    }else{
                                                        echo '<i class="'.esc_attr($playicon).'"></i>';
                                                    }
                                                ?>
                                            </a>
                                            <?php } ?>

                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="trailer-right-area slider slider-nav-video-item <?php echo $sectionid;?>">
                                        <?php 
                                            while($posts->have_posts()):$posts->the_post();
                                                if($wpfilm_studio_content_source=='wpfilm_movie'){

                                                $wpfilm_studio_trailer_video  = get_post_meta( get_the_ID(),'_wpfilm_trailer_video', true );
                                                $videot = get_post_meta( get_the_ID(),'_wpfilm_movie_duration', true );
                                                $movie_publish_date  = get_post_meta( get_the_ID(),'_wpfilm_publish_date', true ); 
                                                }else{

                                                $wpfilm_studio_trailer_video  = get_post_meta( get_the_ID(),'_wpfilm_trailer_video', true ); 
                                                $videot = get_post_meta( get_the_ID(),'_wpfilm_trailer_duration', true );
                                                }
                                                 ?>
                                                <div class="traier-nav-thumb-area">
                                                    <div class="trailer-thumb-single">
                                                        <div class="trailer-thumb">
                                                            <?php the_post_thumbnail('wpfilm_img162x100'); ?>
                                                        </div>
                                                        <div class="trailer-content trailer-titel">
                                                            <h5>
                                                            <?php if($wpfilm_studio_content_source=='wpfilm_movie'){ ?> <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                                                            <?php } else the_title(); ?>
                                                            </h5>
                                                                <?php if( !empty( $videot ) ){ echo '<span>'. $videot.'</span>'; }
                                                            if( $show_category_text == 'yes'){ ?>
                                                        <h6><?php
                                                            if($wpfilm_studio_content_source=='wpfilm_movie'){
                                                                $taxonomy = 'wpfilm_movie_category';
                                                                } else{
                                                                    $taxonomy = 'wpfilm_trailer_category';
                                                                }
                                                            $terms = get_terms($taxonomy); // Get all terms of a taxonomy
                                                            if ( $terms && !is_wp_error( $terms ) ) :
                                                                    foreach ( $terms as $term ) { ?>
                                                                         <?php echo $term->name; ?>
                                                                    <?php } ?>
                                                            <?php endif; if( !empty( $movie_publish_date ) ){ echo esc_html__(' -','wpfilm-studio'); echo esc_html($movie_publish_date); } ?>
                                                            </h6> <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Latest Trailer Item Area End -->                    

                    <?php } else{?>

                <div class="trailer-active <?php echo $sectionid; if($slarrowsstyle==2){ echo ' indicator-style-two';} ?>">
                    <?php 
                        while($posts->have_posts()):$posts->the_post();

                            if($wpfilm_studio_content_source=='wpfilm_movie'){

                            $wpfilm_studio_trailer_video  = get_post_meta( get_the_ID(),'_wpfilm_trailer_video', true );
                            $videot = get_post_meta( get_the_ID(),'_wpfilm_movie_duration', true );
                            $movie_publish_date  = get_post_meta( get_the_ID(),'_wpfilm_publish_date', true ); 

                            }else{

                            $wpfilm_studio_trailer_video  = get_post_meta( get_the_ID(),'_wpfilm_trailer_video', true ); 
                            $videot = get_post_meta( get_the_ID(),'_wpfilm_trailer_duration', true );
                            }
                    ?>
                        <div class="trailer-single">
                            <div class="trailer-img">
                                <?php the_post_thumbnail('wpfilm_img370x410'); ?>

                                <?php if($wpfilm_studio_content_source=='wpfilm_movie'){ ?>
                                    <a class="popup-movie-link" href="<?php the_permalink(); ?>">
                                      <?php
                                        if( $playiconty == 2 ){
                                           ?>
                                            <img src="<?php echo $iconiamge; ?>" alt="" />
                                            <?php
                                        }else{
                                            echo '<i class="'.esc_attr($playicon).'"></i>';
                                        } ?>  
                                    </a><?php } else{ ?>

                                    <a class="popup-youtube" href="<?php echo esc_url( $wpfilm_studio_trailer_video ); ?>">
                                    <?php
                                            if( $playiconty == 2 ){
                                               ?>
                                                <img src="<?php echo $iconiamge; ?>" alt="" />
                                                <?php
                                            }else{
                                                echo '<i class="'.esc_attr($playicon).'"></i>';
                                            }
                                        ?>
                                    </a>
                                    <?php } ?>
                            </div>

                            <?php if( $show_category_text == 'yes'){?>
                            <div class="trailer-titel traile_content2">
                                    <h5>
                                    <?php if($wpfilm_studio_content_source=='wpfilm_movie'){ ?> <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                                    <?php } else the_title(); ?>
                                    </h5> 
                                    <h6><?php
                                    if($wpfilm_studio_content_source=='wpfilm_movie'){
                                        $taxonomy = 'wpfilm_movie_category';
                                        } else{
                                            $taxonomy = 'wpfilm_trailer_category';
                                        }
                                    $terms = get_terms($taxonomy); // Get all terms of a taxonomy

                                    if ( $terms && !is_wp_error( $terms ) ) :
                                            foreach ( $terms as $term ) { ?>
                                                 <?php echo $term->name; ?>
                                            <?php } ?>
                                    <?php endif; if( !empty( $movie_publish_date ) ){ echo esc_html__(' -','wpfilm-studio'); echo esc_html($movie_publish_date); } ?>
                                    </h6>
                            </div>
                        <?php }else{?>
                            <div class="trailer-titel">
                                    <h5>
                                    <?php if($wpfilm_studio_content_source=='wpfilm_movie'){ ?> <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                                    <?php } else the_title(); ?>
                                    </h5>
                                   <?php if( !empty( $videot ) ){ echo '<span>'. $videot.'</span>'; }?>
                            </div>
                       <?php } ?>
                        </div>
                        <!-- Trailer Single -->
                    <?php endwhile; ?>
                </div>


                        <?php } ?>
            </div>
            <!-- Trailer Section End -->

            <script type="text/javascript">
                (function($){

                    var _arrows_set = <?php echo esc_js( $slarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $slautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($slautoplayspeed) ){ echo esc_js($slautoplayspeed); }else{ echo esc_js(1000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    var _itemmarginset = <?php if( isset($itemmargin) ){ echo esc_js($itemmargin); }else{ echo esc_js(30); }; ?>;

                    $('.trailer-active.<?php echo $sectionid;?>').slick({
                        slidesToShow: _showitem_set,
                        arrows:_arrows_set,
                        dots: false,
                        autoplay: _autoplay_set,
                        autoplaySpeed: _autoplay_speed,
                        prevArrow: '<div class="btn-prev"><?php echo '<i class="'. $arrow_icon_prev.'"></i>' ;?></div>',
                        nextArrow: '<div><?php echo '<i class="'. $arrow_icon_next.'"></i>' ;?></div>',
                        responsive: [
                                {
                                  breakpoint: 768,
                                  settings: {
                                    slidesToShow: _showitemtablet_set
                                  }
                                },
                                {
                                  breakpoint: 575,
                                  settings: {
                                    slidesToShow: _showitemmobile_set
                                  }
                                }
                              ]
                        });

                $('.slider-for-team.<?php echo $sectionid;?>').slick({
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  arrows: false,
                  fade: true,
                  asNavFor: '.slider-nav-video-item.<?php echo $sectionid;?>'
                });
                $('.slider-nav-video-item.<?php echo $sectionid;?>').slick({
                  slidesToShow: _showitem_set,
                  slidesToScroll: 1,
                  asNavFor: '.slider-for-team.<?php echo $sectionid;?>',
                  arrows:_arrows_set,
                  dots: false,
                  vertical: true,
                  centerMode: false,
                  focusOnSelect: true,
                  focusOnSelect: true,
                  prevArrow: '<div class="btn-prev"><?php echo '<i class="'. $arrow_icon_prev.'"></i>' ;?></div>',
                  nextArrow: '<div><?php echo '<i class="'. $arrow_icon_next.'"></i>' ;?></div>',
                   responsive: [
                                {
                                  breakpoint: 768,
                                  settings: {
                                    slidesToShow: _showitemtablet_set
                                  }
                                },
                                {
                                  breakpoint: 575,
                                  settings: {
                                    slidesToShow: _showitemmobile_set
                                  }
                                }
                              ]
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

Plugin::instance()->widgets_manager->register_widget_type( new wpfilm_Elementor_Widget_Trailer() );