<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class FtageMentor_Elementor_Widget_Gallery extends Widget_Base {


    public function get_name() {
        return 'ftagementor-gallery-addons';
    }
    
    public function get_title() {
        return __( 'Ftage: Gallery', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-picture-o';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'ftagementor-gallery',
            [
                'label' => esc_html__( 'Gallery', 'ftagementor' ),
            ]
        );

            $this->add_control(
                'filttering_title',
                [
                    'label' => __( 'Filtter Options', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'iteam_layout',
                [
                    'label' => esc_html__( 'Select layout', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'masonry',
                    'options' => [
                        'carosul' => esc_html__( 'Carousel', 'ftagementor' ),
                        'masonry' => esc_html__( 'Masonry', 'ftagementor' ),
                    ],
                ]
            );            
            $this->add_control(
                'filter_show_hide',
                [
                    'label' => esc_html__( 'Filter Menu Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );                    
            $this->add_control(
                'ftagementor_item_categories',
                [
                    'label' => esc_html__( 'Select Item Category', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => ftagementor_gallery_categories(),
                ]
            );
            $this->add_control(
                'all_btn_show_hide',
                [
                    'label' => esc_html__( 'All Menu Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'all_btn_text',
                [
                    'label' => __( 'All Button Text', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'All',
                    'title' => __( 'Enter All Button Text', 'ftagementor' ),
                    'condition' => [
                        'all_btn_show_hide' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'item_title',
                [
                    'label' => __( 'Item  Options', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );  
            $this->add_control(
              'ftagementor_all_item',
              [
                 'label'   => __( 'Show All Item Number', 'ftagementor' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 7,
                 'min'     => 2,
                 'max'     => 1000,
                 'step'    => 1,
                'condition' => [
                        'iteam_layout' => 'masonry',
                    ]  
              ]
            );
            $this->add_control(
                'ftagementor_item_column',
                [
                    'label' => esc_html__( 'Show Columns', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '4',
                    'options' => [
                        '1' => esc_html__( '1', 'ftagementor' ),
                        '2' => esc_html__( '2', 'ftagementor' ),
                        '3' => esc_html__( '3', 'ftagementor' ),
                        '4' => esc_html__( '4', 'ftagementor' ),
                        '5' => esc_html__( '5', 'ftagementor' ),
                        '6' => esc_html__( '6', 'ftagementor' ),
                    ],
                    'condition' => [
                        'iteam_layout' => 'masonry',
                    ]                      
                ]
            ); 
            $this->add_control(
                'ftagementor_item_column_md',
                [
                    'label' => esc_html__( 'Number Of Columns Displayed (Tab)', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '3',
                    'options' => [
                        '1' => esc_html__( '1', 'ftagementor' ),
                        '2' => esc_html__( '2', 'ftagementor' ),
                        '3' => esc_html__( '3', 'ftagementor' ),
                        '4' => esc_html__( '4', 'ftagementor' ),
                    ],
                    'condition' => [
                        'iteam_layout' => 'masonry',
                    ]                     
                ]
            );

            $this->add_control(
                'ftagementor_item_column_sm',
                [
                    'label' => esc_html__( 'Number Of Columns Displayed (Large Mobile)', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '2',
                    'options' => [
                        '1' => esc_html__( '1', 'ftagementor' ),
                        '2' => esc_html__( '2', 'ftagementor' ),
                        '3' => esc_html__( '3', 'ftagementor' ),
                        '4' => esc_html__( '4', 'ftagementor' ),
                    ],
                    'condition' => [
                        'iteam_layout' => 'masonry',
                    ]                    
                ]
            );
           $this->add_control(
                'ftagementor_item_order',
                [
                    'label' => esc_html__( 'Order By', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'recent-products',
                    'options' => [
                        'ASC' => esc_html__( 'Ascending', 'ftagementor' ),
                        'DESC' => esc_html__( 'Descending', 'ftagementor' ),
                    ],
                ]
            );
            $this->add_control(
              'ftagementor_item_gutter',
              [
                 'label'   => __( 'Item Gutter', 'ftagementor' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 30,
                 'min'     => 0,
                 'max'     => 100,
                 'step'    => 1,
              ]
            );
            $this->add_control(
                'item_icone_option',
                [
                    'label' => __( 'Icon Options', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'icon_show_hide',
                [
                    'label' => esc_html__( 'Icon Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            ); 

           $this->add_control(
                'link_icon_type',
                [
                    'label' => esc_html__( 'Select Icon Type', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'ftagementor' ),
                        'image' => esc_html__( 'Image', 'ftagementor' ),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                    ]                    
                ]
            );

            $this->add_control(
                'link_icon_iamge',
                [
                    'label' => __( 'Icon image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'link_icon_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'link_icon_font',
                [
                    'label' => __( 'Icon', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'icofont icofont-search-alt-1',
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'link_icon_type' => 'icon',
                    ]
                ]
            );
            $this->add_control(
                'caselautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'caselautoplayspeed',
                [
                    'label' => __( 'Auto play speed', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'max' => 10000,
                    'step' => 100,
                    'default' => 5000,
                    'condition' => [
                        'caselautoplay' => 'yes',
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'caselarrows',
                [
                    'label' => esc_html__( 'Arrow', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'arrow_icon_next',
                [
                    'label' => __( 'Icon Next', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'fa fa-angle-right',
                    'condition' => [
                        'caselarrows' => 'yes',
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'arrow_icon_prev',
                [
                    'label' => __( 'Icon Prev', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'fa fa-angle-left',
                    'condition' => [
                        'caselarrows' => 'yes',
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitem',
                [
                    'label' => __( 'Show Item', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 2,
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitemtablet',
                [
                    'label' => __( 'Show Item (Tablet)', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 2,
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitemmobile',
                [
                    'label' => __( 'Show Item (Large Mobile)', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 1,
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'item_style',
            [
                'label' => __( 'Content Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs(
                'style_tabs'
            );

                // Normal style tab
                $this->start_controls_tab(
                    'style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ftagementor' ),
                    ]
                );
                    $this->add_control(
                        'filter_box_style',
                        [
                            'label' => __( 'Filter Box  Style', 'ftagementor' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );

                    $this->add_control(
                        'filter_box_bg_color',
                        [
                            'label' => __( 'Filter Box BG COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .filter-menu-list' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'filter_box_border',
                            'label' => __( 'Box Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .filter-menu-list',
                        ]
                    ); 
                    $this->add_control(
                        'filter_box_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .filter-menu-list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_padding',
                        [
                            'label' => __( 'Padding', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .filter-menu-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_margin',
                        [
                            'label' => __( 'Margin', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .filter-menu-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_alignment',
                        [
                            'label' => __( 'Alignment', 'ftagementor' ),
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
                                '{{WRAPPER}} .filter-menu-list' => 'text-align: {{VALUE}};',
                            ],
                        ]
                    );
                    // Filtter Button Style

                    $this->add_control(
                        'filter_style',
                        [
                            'label' => __( 'Filter Button Style', 'ftagementor' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_color',
                        [
                            'label' => __( 'Button COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#555',
                            'selectors' => [
                                '{{WRAPPER}} .filter-menu-list button' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_bg_color',
                        [
                            'label' => __( 'Button BG COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .filter-menu-list button' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border',
                            'label' => __( 'Button Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .filter-menu-list button',
                        ]
                    ); 
                    $this->add_control(
                        'button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .filter-menu-list button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_padding',
                        [
                            'label' => __( 'Button Padding', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .filter-menu-list button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_margin',
                        [
                            'label' => __( 'Buttio Margin', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .filter-menu-list button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography_fillter',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .filter-menu-list button',
                        ]
                    );

                    $this->add_control(
                        'item_box_style',
                        [
                            'label' => __( 'Item Box Style', 'ftagementor' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'item_box_bg_color',
                        [
                            'label' => __( 'Box Bg COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .ft_item_image::before' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_icon_style_heading',
                        [
                            'label' => __( 'Item Link Style', 'ftagementor' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'item_link_color',
                        [
                            'label' => __( 'Link Icon COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .ft_item_image a.icon_link' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_color',
                        [
                            'label' => __( 'Link Icon BG COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .ft_item_image a.icon_link' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone',
                            'label' => __( 'Icon Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .ft_item_image a.icon_link',
                        ]
                    ); 
                    $this->add_control(
                        'icon_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .ft_item_image a.icon_link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_responsive_control(
                        'icon_width',
                        [
                            'label' => __( 'Icon Width', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'default' => 44,
                            'selectors' => [
                                '{{WRAPPER}} .ft_item_image a.icon_link' => 'width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'icon_height',
                        [
                            'label' => __( 'Icon Height', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'default' => 44,
                            'selectors' => [
                                '{{WRAPPER}} .ft_item_image a.icon_link' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .ft_item_image a.icon_link',
                        ]
                    );

                $this->end_controls_tab();

                // Hover Style tab
                $this->start_controls_tab(
                    'style_hover_tab',
                    [
                        'label' => __( 'Hover', 'ftagementor' ),
                    ]
                );
                    $this->add_control(
                        'filter_style_hover',
                        [
                            'label' => __( 'Filter Button Hover/Acitive Style', 'ftagementor' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_hover_color',
                        [
                            'label' => __( 'Button Hover COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .filter-menu-list button:hover, {{WRAPPER}} .filter-menu-list button.is-checked ' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_hover_bg_color',
                        [
                            'label' => __( 'Button Hover BG COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .filter-menu-list button:hover,.filter-menu-list button.is-checked' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border_hover',
                            'label' => __( 'Button Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .filter-menu-list button',
                        ]
                    ); 

                    $this->add_control(
                        'item_box_style_hover',
                        [
                            'label' => __( 'Item Box Hover Style', 'ftagementor' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'item_box_bg_hover_color',
                        [
                            'label' => __( 'Box Bg Hover COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'rgba(0,0,0,0.8)',
                            'selectors' => [
                                '{{WRAPPER}} .grid-item:hover .ft_item_image::before' => 'background: {{VALUE}};',
                            ],
                        ]
                    );  
                    $this->add_control(
                        'item_icon_style',
                        [
                            'label' => __( 'Item Link Hover Style', 'ftagementor' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'item_link_hover_color',
                        [
                            'label' => __( 'Link Icon Hover COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .ft_item_image a.icon_link:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_hover_color',
                        [
                            'label' => __( 'Link Icon Hover BG COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .ft_item_image a.icon_link:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone_hover',
                            'label' => __( 'Icon Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .ft_item_image a.icon_link:hover',
                        ]
                    ); 

                $this->end_controls_tab();

            $this->end_controls_tabs();



        $this->end_controls_section();
      // Carousel Style
        $this->start_controls_section(
            'carousel_style',
            [
                'label' => __( 'Carousel Button', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs(
                    'wpfilm_carousel_style_tabs'
                );
                $this->start_controls_tab(
                    'wpfilm_carouse_style_normal_tab',
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
                            'default' =>'#000',
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow' => 'color: {{VALUE}};',
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
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .slick-arrow',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow' => 'width: {{VALUE}}px;',
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
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .slick-arrow',
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_top_margin',
                        [
                            'label' => __( 'Button Top Position', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => -200,
                            'max' => 200,
                            'step' => 1,
                            'default' => -87,
                            'selectors' => [
                                '{{WRAPPER}} .indicator-style-two .slick-arrow' => 'top: {{VALUE}}px;',
                            ],
                        ]
                    );  
                    $this->add_responsive_control(
                        'carousel_navicon_next_margin',
                        [
                            'label' => __( 'Button Next Position', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => '',
                            'max' => '1920',
                            'step' => 1,
                            'default' => 585,
                            'selectors' => [
                                '{{WRAPPER}} .indicator-style-two .slick-arrow' => 'transform: translateX({{VALUE}}px);',
                            ],
                        ]
                    ); 
                    $this->add_responsive_control(
                        'carousel_navicon_prev_margin',
                        [
                            'label' => __( 'Button Prev Position', 'ftagementor' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => '',
                            'max' => 1920,
                            'step' => 1,
                            'default' => 541,
                            'selectors' => [
                                '{{WRAPPER}} .indicator-style-two .slick-arrow.btn-prev' => 'transform: translateX({{VALUE}}px);',
                            ],
                        ]
                    );                    
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'wpfilm_carouse_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'ftagementor' ),
                    ]
                );
                  $this->add_control(
                        'carousel_nav_color_hover',
                        [
                            'label' => __( 'COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow:hover' => 'color: {{VALUE}};',
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
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .slick-arrow:hover',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();                
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $filter_show_hide        = $this->get_settings_for_display('filter_show_hide');
        $all_btn_show_hide        = $this->get_settings_for_display('all_btn_show_hide');
        $ftagementor_all_item        = $this->get_settings_for_display('ftagementor_all_item');
        $ftagementor_item_column        = $this->get_settings_for_display('ftagementor_item_column');
        $ftagementor_item_column_md        = $this->get_settings_for_display('ftagementor_item_column_md');
        $ftagementor_item_column_sm        = $this->get_settings_for_display('ftagementor_item_column_sm');
        $ftagementor_item_order        = $this->get_settings_for_display('ftagementor_item_order');
        $ftagementor_item_gutter        = $this->get_settings_for_display('ftagementor_item_gutter');
        $icon_show_hide      = $this->get_settings_for_display('icon_show_hide');
        $link_icon_type        = $this->get_settings_for_display('link_icon_type');
        $link_icon_font        = $this->get_settings_for_display('link_icon_font');
        $link_icon_iamge  =   $settings['link_icon_iamge']['url'];



        $iteam_layout = $settings['iteam_layout'];
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $sectionid =  $this-> get_id();
        $sectionid = 'sid'.$sectionid;
                $columns = $this->get_settings_for_display('grid_column_number');
        $arrow_icon_prev  = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next  = $this->get_settings_for_display('arrow_icon_next');


        if($ftagementor_item_gutter==''|| $ftagementor_item_gutter==0 ){
            $ftagementor_item_gutter=0;
        }else{
        $ftagementor_item_gutter = $ftagementor_item_gutter/2;
        }
        if( $ftagementor_item_column !='' ){
            $ftagementor_item_column = 100/$ftagementor_item_column;
        }

        if( $ftagementor_item_column_md !='' ){
            $ftagementor_item_column_md = 100/$ftagementor_item_column_md;
        }

        if( $ftagementor_item_column_sm !='' ){
            $ftagementor_item_column_sm = 100/$ftagementor_item_column_sm;
        }

        $args = array(
            'post_type'             => 'gallery',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => $ftagementor_all_item,
        );


        $get_item_categories = $settings['ftagementor_item_categories'];
        $all_btn_text = $settings['all_btn_text'];


        $gallery_cats = str_replace(' ', '', $get_item_categories);

        if ( "0" != $get_item_categories) {
            if( is_array($gallery_cats) && count($gallery_cats) > 0 ){
                $field_name = is_numeric($gallery_cats[0])?'term_id':'slug';
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'gallery_cat',
                        'terms' => $gallery_cats,
                        'field' => $field_name,
                        'include_children' => false
                    )
                );
            }
        }

        ?>
            <div class="filter-area <?php echo $sectionid;?>">
                <?php if($filter_show_hide=='yes'){ ?>
                    <div class="filter-menu-list <?php echo $sectionid;?>">
                        <?php  if($all_btn_show_hide=='yes'){ ?>
                            <button class="is-checked " data-filter="*"><?php  echo  esc_html($all_btn_text); ?></button>
                        <?php } ?>
                        <?php  if($get_item_categories) { foreach( $get_item_categories as $selected_categorys_array_single ): ?>
                        <?php $catagories_name = str_replace('-', ' ', $selected_categorys_array_single);?>
                        <button data-filter=".<?php echo $selected_categorys_array_single; ?>"><?php echo $catagories_name; ?></button>
                        <?php endforeach; } ?>
                    </div>
                <?php } ?>
                <div class="ft_item-style">
                    <div class="all_item_wrapper <?php echo $sectionid;?> <?php if($iteam_layout == 'carosul'){ echo 'gallery-active indicator-style-two '; } else{ echo ' grid-active';} ?>">
                        <?php 
                            $args = new \WP_Query(array(
                                'post_type'  => 'gallery',
                                'posts_per_page' =>$ftagementor_all_item,
                                'gallery_cat' => $get_item_categories,
                                'order' => $ftagementor_item_order,
                            ));
                            while($args->have_posts()):$args->the_post();
                            $terms = get_the_terms(get_the_id(),'gallery_cat');

                         $full_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()),'full',true); 

                        ?>
                        <div class="filter_item_box <?php echo $sectionid;?> grid-item <?php if( $terms ){  foreach($terms as $term ){ echo $term->slug .' ';} } ?>">
                            <?php if(has_post_thumbnail() ){?>  
                            <div class="ft_item_image">
                                <?php if($icon_show_hide == 'yes'){ ?>
                                <a class="icon_link"  data-fancybox="images"  href="<?php echo esc_url( $full_image[0] ) ; ?>">
                                    <?php
                                        if( $link_icon_type == 'image' ){
                                           ?>
                                            <img src="<?php echo $link_icon_iamge; ?>" alt="" />
                                            <?php
                                        }else{
                                            echo '<i class="'.esc_attr($link_icon_font).'"></i>';
                                        }
                                    ?>
                                </a>
                                <?php the_post_thumbnail();?>
                                <?php }else{ ?>
                                <a  data-fancybox="images"  href="<?php echo esc_attr( $full_image[0] ) ; ?>"><?php the_post_thumbnail();?> </a> <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php endwhile; 
                        ?>
                    </div>
                </div>
            </div>

    <style>
    <?php if($ftagementor_item_gutter){ ?>
        .<?php echo $sectionid;?>.all_item_wrapper{
            margin: -<?php echo $ftagementor_item_gutter ?>px;
        }
       .<?php echo $sectionid;?> .filter_item_box{
            padding:<?php echo $ftagementor_item_gutter ?>px;
        }
        <?php } if($ftagementor_item_column){ ?>
        .<?php echo $sectionid;?> .filter_item_box {
            width:<?php echo $ftagementor_item_column ?>%;
        }
        <?php } ?>  

    <?php if($ftagementor_item_column){ ?>
        @media only screen and (min-width: 768px) and (max-width: 991px) {
           .<?php echo $sectionid;?> .filter_item_box{
                width:<?php echo $ftagementor_item_column_md ?>%;
            }
        }
        @media (max-width: 767px) {
            .filter_item_box.<?php echo $sectionid;?>{
                width:<?php echo $ftagementor_item_column_sm ?>%;
            }
        }
        @media (max-width: 575px) {
            .filter_item_box.<?php echo $sectionid;?>{
                width: 100%;
            }
        }    
        <?php } ?>      
    </style>



        <script type="text/javascript">
        
            (function($){
                // images have loaded
                $('.filter-area.<?php echo $sectionid;?>').imagesLoaded( function() {
                  // Isotop Active
                  $('.filter-menu-list.<?php echo $sectionid;?>').on( 'click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                  });

                  // Isotop Full Grid
                  var $grid = $('.grid-active.<?php echo $sectionid;?>').isotope({
                    itemSelector: '.grid-item',
                    percentPosition: true,
                    masonry: {
                    columnWidth: '.grid-item',
                    }
                  });
                  // Isotop Menu Active
                  $('.filter-menu-list button').on('click', function(event) {
                        $(this).siblings('.is-checked').removeClass('is-checked');
                        $(this).addClass('is-checked');
                        event.preventDefault();
                    });
                });
                
                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    $('.gallery-active.<?php echo $sectionid;?>').slick({
                        slidesToShow: _showitem_set,
                        arrows:_arrows_set,
                        dots: false,
                        autoplay: _autoplay_set,
                        autoplaySpeed: _autoplay_speed,
                        prevArrow: '<div class="btn-prev"><?php echo '<i class="'. $arrow_icon_prev.'"></i>' ;?></div>',
                        nextArrow: '<div><?php echo '<i class="'. $arrow_icon_next.'"></i>' ;?></div>',
                        responsive: [
                                {
                                  breakpoint: 991,
                                  settings: {
                                    slidesToShow: _showitemtablet_set
                                  }
                                },
                                {
                                  breakpoint: 768,
                                  settings: {
                                    slidesToShow: _showitemmobile_set
                                  }
                                },
                                {
                                  breakpoint: 575,
                                  settings: {
                                    slidesToShow: 1
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

    public function render_plain_content( $instance = [] ) {}

}

Plugin::instance()->widgets_manager->register_widget_type( new FtageMentor_Elementor_Widget_Gallery() );

