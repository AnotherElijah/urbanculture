<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class FtageMentor_Elementor_Widget_Portfolio extends Widget_Base {


    public function get_name() {
        return 'ftagementor-portfolio-addons';
    }
    
    public function get_title() {
        return __( 'Ftage : Portfolio', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-picture-o';
    }

    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'ftagementor-portfolio',
            [
                'label' => esc_html__( 'Portfolio', 'ftagementor' ),
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
                    'options' => ftagementor_portfolio_categories(),
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
                 'default' => 6,
                 'min'     => 2,
                 'max'     => 1000,
                 'step'    => 1,
              ]
            );
            $this->add_control(
                'ftagementor_item_column',
                [
                    'label' => esc_html__( 'Show Columns', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '3',
                    'options' => [
                        '1' => esc_html__( '1', 'ftagementor' ),
                        '2' => esc_html__( '2', 'ftagementor' ),
                        '3' => esc_html__( '3', 'ftagementor' ),
                        '4' => esc_html__( '4', 'ftagementor' ),
                        '5' => esc_html__( '5', 'ftagementor' ),
                        '6' => esc_html__( '6', 'ftagementor' ),
                    ],
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
                 'default' => 20,
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
                    'label' => esc_html__( 'Image popup Icon', 'ftagementor' ),
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
                    'default' =>'fa fa-image',
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'link_icon_type' => 'icon',
                    ]
                ]
            );
           $this->add_control(
                'video_icon_type',
                [
                    'label' => esc_html__( 'Video popup Icon', 'ftagementor' ),
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
                'video_icon_iamge',
                [
                    'label' => __( 'Icon image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'video_icon_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'video_icon_font',
                [
                    'label' => __( 'Icon', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'fa fa-video-camera',
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'video_icon_type' => 'icon',
                    ]
                ]
            );
            $this->add_control(
                'show_hide_portfolio_title',
                [
                    'label' => esc_html__( 'Portfolio Title Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            ); 
            $this->add_control(
                'show_hide_portfolio_category',
                [
                    'label' => esc_html__( 'Portfolio Category Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'item_style',
            [
                'label' => __( 'Style', 'ftagementor' ),
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
                                '{{WRAPPER}} .ftagementor-filter-menu-list' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'filter_box_border',
                            'label' => __( 'Box Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .ftagementor-filter-menu-list',
                        ]
                    ); 
                    $this->add_control(
                        'filter_box_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-filter-menu-list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .ftagementor-filter-menu-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .ftagementor-filter-menu-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            'default' => 'center',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-filter-menu-list' => 'text-align: {{VALUE}};',
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
                            'label' => __( 'Button Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#666',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-filter-menu-list button' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_bg_color',
                        [
                            'label' => __( 'Button BG Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-filter-menu-list button' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border',
                            'label' => __( 'Button Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .ftagementor-filter-menu-list button',
                        ]
                    ); 
                    $this->add_control(
                        'button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-filter-menu-list button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .ftagementor-filter-menu-list button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .ftagementor-filter-menu-list button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography_fillter',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .ftagementor-filter-menu-list button',
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
                            'label' => __( 'Box Bg Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-ft_item_image::before' => 'background-color: {{VALUE}};',
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
                            'label' => __( 'Link Icon Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-ft_item_image a.icon_link' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_color',
                        [
                            'label' => __( 'Link Icon BG Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-ft_item_image a.icon_link' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone',
                            'label' => __( 'Icon Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .ftagementor-ft_item_image a.icon_link',
                        ]
                    ); 
                    $this->add_control(
                        'icon_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-ft_item_image a.icon_link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            'default' => 65,
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-ft_item_image a.icon_link' => 'width: {{VALUE}}px;',
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
                            'default' => 65,
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-ft_item_image a.icon_link' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .ftagementor-ft_item_image a.icon_link',
                        ]
                    );

                    $this->add_control(
                        'category_style',
                        [
                            'label' => __( 'Item Contnet Style', 'ftagementor' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'title_link_color',
                        [
                            'label' => __( 'Title Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-cat-wrapper > h5 a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'title_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .ftagementor-cat-wrapper h5',
                        ]
                    );
                   
                    $this->add_control(
                        'category_link_color',
                        [
                            'label' => __( 'Category Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-cat-wrapper h6' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'category_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .ftagementor-cat-wrapper h6',
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
                            'label' => __( 'Button Hover Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-filter-menu-list button:hover, {{WRAPPER}} .ftagementor-filter-menu-list button.is-checked ' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_hover_bg_color',
                        [
                            'label' => __( 'Button Hover BG Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-filter-menu-list button:hover,.ftagementor-filter-menu-list button.is-checked' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border_hover',
                            'label' => __( 'Button Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .ftagementor-filter-menu-list button',
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
                            'label' => __( 'Box Bg Hover Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'rgba(0,0,0,0.4)',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-grid-item:hover .ftagementor-ft_item_image::before' => 'background: {{VALUE}};',
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
                            'label' => __( 'Link Icon Hover Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-ft_item_image a.icon_link:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_hover_color',
                        [
                            'label' => __( 'Link Icon Hover BG Color', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .ftagementor-ft_item_image a.icon_link:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone_hover',
                            'label' => __( 'Icon Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .ftagementor-ft_item_image a.icon_link:hover',
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
        $show_hide_portfolio_title      = $this->get_settings_for_display('show_hide_portfolio_title');
        $show_hide_portfolio_category      = $this->get_settings_for_display('show_hide_portfolio_category');
        $link_icon_type        = $this->get_settings_for_display('link_icon_type');
        $link_icon_font        = $this->get_settings_for_display('link_icon_font');
        $video_icon_iamge  =   $settings['video_icon_iamge']['url'];
        $video_icon_type        = $this->get_settings_for_display('video_icon_type');
        $video_icon_font        = $this->get_settings_for_display('video_icon_font');
        $video_icon_iamge  =   $settings['video_icon_iamge']['url'];
        $sectionid =  $this-> get_id();
        $sectionid = 'sid'.$sectionid;

        if($ftagementor_item_gutter==''||$ftagementor_item_gutter==0 ){
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
            'post_type'             => 'ftagem_portfolio',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => $ftagementor_all_item,
        );
        $get_item_categories = $settings['ftagementor_item_categories'];
        $all_btn_text = $settings['all_btn_text'];


        $portfolio_cats = str_replace(' ', '', $get_item_categories);

        if ( "0" != $get_item_categories) {
            if( is_array($portfolio_cats) && count($portfolio_cats) > 0 ){
                $field_name = is_numeric($portfolio_cats[0])?'term_id':'slug';
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'ftagem_portfolio_cat',
                        'terms' => $portfolio_cats,
                        'field' => $field_name,
                        'include_children' => false
                    )
                );
            }
        }

        ?>
            <div class="filter-area">
                <?php if($filter_show_hide=='yes'){ ?>
                    <div class="ftagementor-filter-menu-list <?php echo $sectionid;?>">
                        <?php  if($all_btn_show_hide=='yes'){ ?>
                            <button class="is-checked " data-filter="*"><?php  echo  esc_html($all_btn_text); ?></button>
                        <?php } ?>
                        <?php  if($get_item_categories) { 

                        foreach( $get_item_categories as $selected_categorys_array_single ): ?>
                        <?php $catagories_name = str_replace('-', ' ', $selected_categorys_array_single);?>
                        <button data-filter=".<?php echo $selected_categorys_array_single; ?>"><?php echo $catagories_name; ?></button>
                        <?php endforeach; } ?>
                    </div>
                <?php } ?>
                <div class="ft_item-style">
                    <div class="all_item_wrapper grid-active <?php echo $sectionid;?>">
                        <?php 
                            $args = new \WP_Query(array(
                                'post_type'  => 'ftagem_portfolio',
                                'posts_per_page' =>$ftagementor_all_item,
                                'ftagem_portfolio_cat' => $get_item_categories,
                                'order' => $ftagementor_item_order,
                            ));
                            while($args->have_posts()):$args->the_post();
                            $terms = get_the_terms(get_the_id(),'ftagem_portfolio_cat');
                            $popup_video = get_post_meta( get_the_ID(),'_ftagementor_por_video', true ); 
                         $full_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()),'full',true); 

                        ?>
                        <div class="ftagementor-filter_item_box <?php echo $sectionid;?>  ftagementor-grid-item <?php if( $terms ){  foreach($terms as $term ){ echo $term->slug .' ';} } ?>">
                            <?php if(has_post_thumbnail() ){?>  
                            <div class="ftagementor-ft_item_image">
                                <?php if($icon_show_hide == 'yes'){   
                                    if( $popup_video !=''){
                                 ?>
                                 <a class="icon_link various fancybox.iframe?" href="<?php echo esc_url( $popup_video ) ; ?>">
                                    <?php
                                        if( $video_icon_type == 'image' ){
                                           ?>
                                            <img src="<?php echo $video_icon_iamge; ?>" alt="" />
                                            <?php
                                        }else{
                                            echo '<i class="'.esc_attr($video_icon_font).'"></i>';
                                        }
                                    ?>
                                </a>
                                <?php the_post_thumbnail();?>
                                <?php  } else{ ?>

                                <a class="icon_link"  data-fancybox="ftagementor_pro_popup"  href="<?php echo esc_url( $full_image[0] ) ; ?>">
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
                                <?php } }else{ ?>
                                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail();?> </a> <?php } ?>
                                <?php if( $show_hide_portfolio_title == 'yes' || $show_hide_portfolio_category == 'yes' ){ ?>
                                    <div class="ftagementor-cat-wrapper">
                                        <?php if( $show_hide_portfolio_title == 'yes'){?>
                                        <h5>
                                        <a href="<?php the_permalink(); ?>"><?php the_title();
                                         ?></a>
                                        </h5>
                                    <?php } ?>
                                    <?php if( $terms && $show_hide_portfolio_category == 'yes'){
                                        foreach( $terms as $single_slugs ){?>
                                            <h6>
                                               <?php echo $single_slugs->name ;?>
                                            </h6>
                                        <?php }} 
                                        ?>

                                    </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php endwhile; 
                        ?>
                    </div>
                </div>
            </div>

    <style>

        .all_item_wrapper.<?php echo $sectionid;?>{
            margin: -<?php echo $ftagementor_item_gutter ?>px;
        }
        .ftagementor-filter_item_box.<?php echo $sectionid;?>{
            padding:<?php echo $ftagementor_item_gutter ?>px;
        }       

        .ftagementor-filter_item_box.<?php echo $sectionid;?>{
            width:<?php echo $ftagementor_item_column ?>%;
        }         
        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .ftagementor-filter_item_box.<?php echo $sectionid;?>{
                width:<?php echo $ftagementor_item_column_md ?>%;
            }
        }
        @media (max-width: 767px) {
            .ftagementor-filter_item_box.<?php echo $sectionid;?>{
                width:<?php echo $ftagementor_item_column_sm ?>%;
            }
        }
        @media (max-width: 575px) {
            .ftagementor-filter_item_box.<?php echo $sectionid;?>{
                width: 100%;
            }
        }    
    </style>

        <script type="text/javascript">
        
            jQuery(document).ready(function($) {

                // images have loaded
                $('.filter-area.<?php echo $sectionid;?>').imagesLoaded( function() {

                  // Isotop Active
                  $('.ftagementor-filter-menu-list.<?php echo $sectionid;?>').on( 'click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                  });

                  // Isotop Full Grid
                  var $grid = $('.grid-active.<?php echo $sectionid;?>').isotope({
                    itemSelector: '.ftagementor-grid-item',
                    percentPosition: true,
                    masonry: {
                    columnWidth: '.ftagementor-grid-item',
                    }
                  });
                  // Isotop Menu Active
                  $('.ftagementor-filter-menu-list.<?php echo $sectionid;?> button').on('click', function(event) {
                        $(this).siblings('.is-checked').removeClass('is-checked');
                        $(this).addClass('is-checked');
                        event.preventDefault();
                    });
                  // Image Popup Fancy Active
                  $(".ftagementor_pro_popup").fancybox();

                    $(".various").fancybox({
                        maxWidth    : 800,
                        maxHeight   : 600,
                        fitToView   : false,
                        width       : '70%',
                        height      : '70%',
                        autoSize    : false,
                        closeClick  : false,
                        openEffect  : 'none',
                        closeEffect : 'none'
                    });
                });
                
            });

        </script>

        <?php

    }

    protected function content_template() {
        ?>
            
        <?php
    }

    public function render_plain_content( $instance = [] ) {}

}

Plugin::instance()->widgets_manager->register_widget_type( new FtageMentor_Elementor_Widget_Portfolio() );