<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ftage_Elementor_Widget_Lastest_Blog extends Widget_Base {

    public function get_name() {
        return 'latest-blog-post';
    }
    
    public function get_title() {
        return __( 'Ftage : Latest Blog', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-picture-o';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'blog_setting',
            [
                'label' => esc_html__( 'Latest Blog', 'ftagementor' ),
            ]
        );
        
        $this->start_controls_tabs(
                'ftagementor_blog_tabs'
            );
                $this->start_controls_tab(
                    'ftagementor_blog_content_tab',
                    [
                        'label' => __( 'Content', 'ftagementor' ),
                    ]
                );

            $this->add_control(
                'content_show_ttie',
                [
                    'label' => __( 'Content Source Option', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'ftagementor_item_categories',
                [
                    'label' => esc_html__( 'Select Blog Category', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => ftagementor_blog_categories(),
                ]
            );                                
            $this->add_control(
                'featured_img_show_hide',
                [
                    'label' => esc_html__( 'Featured Image Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );             
            $this->add_control(
                'title_length',
                [
                    'label' => __( 'Title Length', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                    'default' => 4,
                ]
            );
            $this->add_control(
                'meta_info_show_hide',
                [
                    'label' => esc_html__( 'Meta Info Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );             
            $this->add_control(
                'content_show_hide',
                [
                    'label' => esc_html__( 'Content Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );             
            $this->add_control(
                'content_length',
                [
                    'label' => __( 'Content Length', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 200,
                    'step' => 1,
                    'default' => 15,
                    'condition' => [
                        'content_show_hide' => 'yes',
                    ]
                ]
            );            
            $this->add_control(
                'read_more_btn_show_hide',
                [
                    'label' => esc_html__( 'Read More Show/Hide', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );            
            $this->add_control(
                'read_more_btn_txt',
                [
                    'label' => __( 'Read More Button Text', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Read More',
                    'title' => __( 'Enter button text', 'ftagementor' ),
                    'condition' => [
                        'read_more_btn_show_hide' => 'yes',
                    ]
                ]
            );
            
            $this->end_controls_tab();

                $this->start_controls_tab(
                    'ftagementor_blog_option_tab',
                    [
                        'label' => __( 'Option', 'ftagementor' ),
                    ]
                );

            $this->add_control(
                'item_show_ttie',
                [
                    'label' => __( 'Item Show Option', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'iteam_layout',
                [
                    'label' => esc_html__( 'Select layout', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'grid',
                    'options' => [
                        'carosul' => esc_html__( 'Carousel', 'ftagementor' ),
                        'grid' => esc_html__( 'Grid', 'ftagementor' ),
                    ],
                ]
            );               
            $this->add_control(
                'post_per_page',
                [
                    'label' => __( 'Show Total Item', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10000,
                    'step' => 1,
                    'default' => 6,
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
                'slarrowsstyle',
                [
                    'label' => esc_html__( 'Arrow Style Middle/Top', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        1 => esc_html__( 'Arrow Middle', 'ftagementor' ),
                        2 => esc_html__( 'Arrow Top', 'ftagementor' ),
                    ],
                     'condition' => [
                        'caselarrows' => 'yes',
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
                    'default' => 3,
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
            $this->add_control(
                'grid_column_number',
                [
                    'label' => esc_html__( 'Columns', 'ftagementor' ),
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
                    'condition' => [
                        'iteam_layout' => 'grid',
                    ]
                ]
            );            
            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

       // Style tab section
        $this->start_controls_section(
            'section_title_style1s',
            [
                'label' => __( 'Content Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
                'ftagementor_blog_style_tabs'
            );
                $this->start_controls_tab(
                    'ftagementor_blog_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ftagementor' ),
                    ]
                );

            $this->add_control(
                'item_title_heading',
                [
                    'label' => __( 'Title Color', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            // Title Style
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => 'rgba(0, 0, 0, 0.85)',
                    'selectors' => [
                        '{{WRAPPER}} .news-content h4 a' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .news-content h4',
                ]
            );
            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Title Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .news-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'meta_color',
                [
                    'label' => __( 'Meta Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '555',
                    'selectors' => [
                        '{{WRAPPER}} .news-content .news-meta span, {{WRAPPER}} .news-content .news-meta span a' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'metatypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .news-content .news-meta span',
                ]
            );            
            $this->add_control(
                'item_content_heading',
                [
                    'label' => __( 'Content Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_content_color',
                [
                    'label' => __( 'Content color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .news-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    
                    'selector' => '{{WRAPPER}} .news-content > p',
                ]
            );
            // Icon Style
            $this->add_control(
                'item_readmore_heading',
                [
                    'label' => __( 'Read More Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_readmore_color',
                [
                    'label' => __( 'Read More color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .news-content a.read-more' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'readmoreypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .news-content a.read-more',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_readmore',
                    'label' => __( 'Read More Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .news-content a.read-more',
                ]
            );  
            $this->add_responsive_control(
                'icon_margin',
                [
                    'label' => __( 'Read More margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'padding',
                [
                    'label' => __( 'Read More Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .news-content a.read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'ftagementor_blog_style_hover_tab',
                [
                    'label' => __( 'Hover', 'ftagementor' ),
                ]
            );
            $this->add_control(
                'item_title_heading_hover',
                [
                    'label' => __( 'Title Hover Color', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'title_color_hover',
                [
                    'label' => __( 'Title Hover color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .news-content h4 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'meta_color_hover',
                [
                    'label' => __( 'Meta Info Hover Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => 'e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .news-content .news-meta span a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'item_readmore_heading_hover',
                [
                    'label' => __( 'Read More Hover Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_readmore_color_hover',
                [
                    'label' => __( 'Button Hover color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .news-content a.read-more:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_readmore_bg_hover',
                [
                    'label' => __( 'Button Hover BG color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .news-content a.read-more:hover' => 'background: {{VALUE}};',
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
                'ftagementor_blog_item_box_style'
            );
                $this->start_controls_tab(
                    'item_box_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ftagementor' ),
                    ]
                );
            $this->add_control(
                'overlay_style',
                [
                    'label' => __( 'Blog Item Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'box_overlay_color',
                [
                    'label' => __( 'Background Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'rgba(255,255,255,0)',
                    'selectors' => [
                        '{{WRAPPER}} .recent-news-single' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_alignment',
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
                    'default' => 'center',
                    'selectors' => [
                        '{{WRAPPER}} .recent-news-single' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_margin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .recent-news-single' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .recent-news-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .recent-news-single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'box_border_single',
                    'label' => __( 'Box Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .recent-news-single',
                ]
            ); 
            $this->add_control(
                'content_box_haeading',
                [
                    'label' => __( 'Content Description Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_responsive_control(
                'content_box_margin',
                [
                    'label' => __( 'Description Box Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .news-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .news-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'box_overlay_hover_color',
                    [
                        'label' => __( 'Overlay Hover  BG Color', 'ftagementor' ),
                        'type' => Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => Scheme_Color::get_type(),
                            'value' => Scheme_Color::COLOR_1,
                        ],
                        'default'=>'rgba(255,255,255,0)',
                        'selectors' => [
                            '{{WRAPPER}} .recent-news-single:hover' => 'background: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'box_border_single_hover',
                        'label' => __( 'Box Border Hover', 'ftagementor' ),
                        'selector' => '{{WRAPPER}} .recent-news-single:hover',
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
                    'ftagementor_blog_carousel_style_tabs'
                );
                $this->start_controls_tab(
                    'ftagementor_blog_carouse_style_normal_tab',
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
                                '{{WRAPPER}} .indicator-style-two .slick-arrow,{{WRAPPER}} .indicator1 .slick-arrow' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .indicator-style-two .slick-arrow,{{WRAPPER}} .indicator1 .slick-arrow' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .indicator-style-two .slick-arrow,{{WRAPPER}} .indicator1 .slick-arrow',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .indicator-style-two .slick-arrow,{{WRAPPER}} .indicator1 .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .indicator-style-two .slick-arrow,{{WRAPPER}} .indicator1 .slick-arrow' => 'width: {{VALUE}}px;',
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
                                '{{WRAPPER}} .indicator-style-two .slick-arrow,{{WRAPPER}} .indicator1 .slick-arrow' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .indicator-style-two .slick-arrow,{{WRAPPER}} .indicator1 .slick-arrow',
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
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'ftagementor_blog_carouse_style_hover_tab',
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
                                '{{WRAPPER}} .indicator-style-two .slick-arrow:hover,{{WRAPPER}} .indicator1 .slick-arrow:hover' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .indicator-style-two .slick-arrow:hover,{{WRAPPER}} .indicator1 .slick-arrow:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .indicator-style-two .slick-arrow:hover,{{WRAPPER}} .indicator1 .slick-arrow:hover',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .indicator-style-two .slick-arrow:hover,{{WRAPPER}} .indicator1 .slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();                
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $iteam_layout = $settings['iteam_layout'];
        $get_item_categories = $settings['ftagementor_item_categories'];
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];        
        $columns = $this->get_settings_for_display('grid_column_number');
        $arrow_icon_prev        = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next        = $this->get_settings_for_display('arrow_icon_next');
        $slarrowsstyle = $settings['slarrowsstyle'];


        $featured_img_show_hide = $settings['featured_img_show_hide'];
        $meta_info_show_hide = $settings['meta_info_show_hide'];
        $content_show_hide = $settings['content_show_hide'];
        $read_more_btn_show_hide = $settings['read_more_btn_show_hide'];

        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $titlelength    = ! empty( $settings['title_length'] ) ? $settings['title_length'] : 2;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $sectionid =  $this-> get_id();
        $collumval = 'col-lg-3 col-sm-6';
        if( $columns !='' ){
            $colwidth = round(12/$columns);
            $collumval = 'col-lg-'.$colwidth.' col-sm-6';
        }

        ?>
            <div class="latest-blog-area">
                <div class="<?php if($iteam_layout == 'carosul'){ echo 'pro-latest-news-active '.$sectionid; if($slarrowsstyle == 2){ echo ' indicator-style-two';} else{ echo ' indicator1';} } else echo 'row';?>">
                    <?php
                        $args = array(
                            'post_type'            => 'post',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $per_page,
                            'order'                => 'DESC',
                        );

                        if($get_item_categories){
                            $args['category_name'] = implode(',', $get_item_categories);
                        }
                        
                        $posts = new \WP_Query($args);
                        while($posts->have_posts()):$posts->the_post();
                    ?>
                    <?php if($iteam_layout == 'grid') { echo '<div class="'.$collumval.'">'; } ?>
                        <div class="recent-news-single">
                            <?php if( $featured_img_show_hide == 'yes' && has_post_thumbnail() ){?>
                            <div class="news-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('ftagementorsize_570x385');?>
                                </a>
                            </div>
                            <?php } ?>
                            <div class="news-content">
                                <h4>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo wp_trim_words( get_the_title(), $titlelength, '' );?>
                                    </a>
                                </h4>
                                <?php
                                if( $meta_info_show_hide == 'yes'){
                                ?>
                                <div class="news-meta">
                                    <span>26 Nov 2018</span>
                                    <span><?php echo esc_html__( 'By ','ftagementor' )?><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author();?></a></span>
                                </div> 
                                <?php } ?>                                
                               
                                <?php if( $content_show_hide == 'yes' ){ echo '<p>'.wp_trim_words( get_the_content(), $contetnlength, '' ).'</p>'; }
                                if( $read_more_btn_show_hide == 'yes'){
                                ?>
                                <a href="<?php the_permalink(); ?>" class="read-more"><?php if( !empty($btntext) ){echo esc_html__($btntext);}else{ ftagementor_read_more(); }?></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php if($iteam_layout == 'grid'){echo '</div> ';}?>
                    <?php endwhile; ?>
                </div>
            </div>

            <script type="text/javascript">
                (function($){

                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(1000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    $('.pro-latest-news-active.<?php echo $sectionid;?>').slick({
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
                    
                })(jQuery);

            </script>



        <?php

        wp_reset_query(); wp_reset_postdata();

    }


    protected function content_template() {
        ?>
            
        <?php
    }

    public function render_plain_content( $instance = [] ) {}

}

Plugin::instance()->widgets_manager->register_widget_type( new Ftage_Elementor_Widget_Lastest_Blog() );

