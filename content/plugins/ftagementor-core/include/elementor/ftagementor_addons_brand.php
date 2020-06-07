<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class FtageMentor_Elementor_Widget_Brand extends Widget_Base {

    public function get_name() {
        return 'ftagementor-brand';
    }
    
    public function get_title() {
        return __( 'Ftage: Brand', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-gg';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'brand-setting',
            [
                'label' => esc_html__( 'Brand', 'ftagementor' ),
            ]
        );


        $repeater = new Repeater();

            $repeater->add_control(
                'climage',
                [
                    'label' => __( 'Brand Image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $repeater->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'climagesize',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );
            
            $repeater->add_control(
                'clname',
                [
                    'label' => __( 'Brand Name', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'title' => __( 'Your Image Title', 'ftagementor' ),
                ]
            );

            $this->add_control(
                'brand_list',
                [
                    'label' => __( 'Brand', 'ftagementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'clname' => __( 'Add Your Image', 'ftagementor' ),
                        ],
                    ],
                    'title_field' => '{{{ clname }}}',
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
                'caselautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
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
                ]
            );


        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'brand_style',
            [
                'label' => __( 'Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs(
                    'ftagementor_brand_carousel_style_tabs'
                );
                $this->start_controls_tab(
                    'ftagementor_brand_carouse_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ftagementor' ),
                    ]
                );
                
                    $this->add_control(
                        'brand_arrow_button_heading',
                        [
                            'label' => __( 'Brand Box Style', 'ftagementor' ),
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
                                '{{WRAPPER}} .single-brand' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .single-brand' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
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
                                '{{WRAPPER}} .indicator-style-two.indicator-style-two .slick-arrow' => 'top: {{VALUE}}px;',
                            ],
                        ]
                    );                    
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'ftagementor_brand_carouse_style_hover_tab',
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
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];        
        $arrow_icon_prev        = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next        = $this->get_settings_for_display('arrow_icon_next');
        $slarrowsstyle = $settings['slarrowsstyle'];
        $sectionid =  $this-> get_id();

        ?>
            <div class="brand-slider-active <?php echo $sectionid; if($slarrowsstyle == 2){ echo ' indicator-style-two';} else{ echo ' indicator1';}   ?>">

                <?php foreach ( $settings['brand_list'] as $item ) : ?>
                    <div class="single-brand">
                        <?php
                            echo '<div class="brand-image">'.Group_Control_Image_Size::get_attachment_image_html( $item, 'climagesize', 'climage' ).'</div>';
                        ?>
                    </div>
                <?php endforeach; ?>

            </div>
            <script type="text/javascript">
                (function($){

                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(1000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    $('.brand-slider-active.<?php echo $sectionid;?>').slick({
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

Plugin::instance()->widgets_manager->register_widget_type( new FtageMentor_Elementor_Widget_Brand() );

