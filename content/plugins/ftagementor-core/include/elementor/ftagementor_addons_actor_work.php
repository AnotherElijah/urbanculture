<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class FtageMentor_Elementor_Widget_ActorWork extends Widget_Base {

    public function get_name() {
        return 'ftagementor-actor-work';
    }
    
    public function get_title() {
        return __( 'Ftage: Actor Work', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-header';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'actor-work-setting',
            [
                'label' => esc_html__( 'Actor Work', 'ftagementor' ),
            ]
        );


        $repeater = new Repeater();

            $repeater->add_control(
                'work_title',
                [
                    'label' => __( 'Wrok Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'The Dark Forest',
                    'title' => __( 'Wrok Title', 'ftagementor' ),
                ]
            );
            $repeater->add_control(
                'work_year',
                [
                    'label' => __( 'Year', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '2004',
                    'label_block' => 'true',
                    'title' => __( 'Enter Year', 'ftagementor' ),
                ]
            );
            $repeater->add_control(
                'work_des',
                [
                    'label' => __( 'Description', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'placeholder' => __( 'Description Here', 'ftagementor' ),
                    'title' => __( 'Enter Short Description Here', 'ftagementor' ),
                ]
            );
            $repeater->add_control(
                'work_bg',
                [
                    'label' => __( 'Background Image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'actor_work_list',
                [
                    'label' => __( 'Actor Work', 'ftagementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'work_title' => __( 'The Dark Forest', 'ftagementor' ),
                            'work_year' => __( '2004', 'ftagementor' ),
                            'work_des' => __( 'It is a long establish fact that reader will be distract by the readable content of a page when looking at its layout.', 'ftagementor' ),
                        ],
                    ],
                    'title_field' => '{{{ work_title }}}',
                ]
            );
            
        $this->end_controls_section();
        // content tab

        // Slider Option
        $this->start_controls_section(
            'slider_option_setting',
            [
                'label' => esc_html__( 'Carousel Option', 'ftagementor' ),
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
                    ]
                ]
            );

            $this->add_control(
                'caseldots',
                [
                    'label' => esc_html__( 'Dots', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            $this->add_control(
                'itemmargin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                    'default' => 0,
                    'condition' => [
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
                    'default' => 1,
                    'condition' => [
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
                    'default' => 1,
                    'condition' => [
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
                    ]
                ]
            );


        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'testimonial_style',
            [
                'label' => __( 'Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'work_title-heading',
                [
                    'label' => __( 'Title', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'work_title_color',
                [
                    'label' => __( 'Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .working-details h4' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'work_titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .working-details h4',
                ]
            );

            $this->add_control(
                'date-heading',
                [
                    'label' => __( 'Year', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'year-color',
                [
                    'label' => __( 'Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .working-date > h5' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'yeaertypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .working-date > h5',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'year_border',
                    'label' => __( 'Box Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .working-date > h5::after',
                ]
            );
            $this->add_control(
                'descripton-heading',
                [
                    'label' => __( 'Description', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'work_des-color',
                [
                    'label' => __( 'Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#555',
                    'selectors' => [
                        '{{WRAPPER}} .working-details > p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'work_destypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .working-details > p',
                ]
            );
            $this->add_control(
                'overlay_style',
                [
                    'label' => __( 'Box Style', 'ftagementor' ),
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
                        'justify' => [
                            'title' => __( 'Justified', 'ftagementor' ),
                            'icon' => 'fa fa-align-justify',
                        ],
                    ],
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .actw-box-single' => 'text-align: {{VALUE}};',
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
                        '{{WRAPPER}} .actw-box-single' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .actw-box-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'box_border',
                    'label' => __( 'Box Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .actw-box-single',
                ]
            );  
            $this->add_control(
                'box_border_radious',
                [
                    'label' => __( 'Box Border Radius', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .actw-box-single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );            
            
        $this->end_controls_section();
      // Carousel Style
        $this->start_controls_section(
            'carousel_style',
            [
                'label' => __( 'Carousel Button', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'arrow_color',
                [
                    'label' => __( 'Button Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#333',
                    'selectors' => [
                        '{{WRAPPER}} .owl-nav div' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'arrow_color_hover',
                [
                    'label' => __( 'Button Hover Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .owl-nav div:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'arrow__bg_color',
                [
                    'label' => __( 'Button BG Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'rgba(0,0,0,0)',
                    'selectors' => [
                        '{{WRAPPER}} .owl-nav div' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'arrow_bg_color_hover',
                [
                    'label' => __( 'Button BG Hover Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'rgba(0,0,0,0)',
                    'selectors' => [
                        '{{WRAPPER}} .owl-nav div:hover,{{WRAPPER}} .dots_style1 .owl-dots .owl-dot:hover span' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_btn',
                    'label' => __( 'Button Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .owl-nav div,{{WRAPPER}} .dots_style1 .owl-dots .owl-dot.active span',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'dot_border',
                    'label' => __( 'Dots Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .owl-nav div,{{WRAPPER}} .dots_style1 .owl-dots .owl-dot span',
                ]
            );
   
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'dot_hover_border',
                    'label' => __( 'Dots Active Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .dots_style1 .owl-dots .owl-dot:hover span,{{WRAPPER}} .dots_style1 .owl-dots .owl-dot.active span',
                ]
            );
   
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        // Slider Option
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caseldots = $settings['caseldots'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];        
        $itemmargin = $settings['itemmargin'];

        $count = count( $settings['actor_work_list'] );

        ?>
            <div class="actor_work_active owl-carousel dots_style1">

                <div class="actw-single-area">
                    <?php $i = 1; foreach ( $settings['actor_work_list'] as $item ) : 

                        $images = $item['work_bg'];

                    ?>

                        <div class="actw-box-single" style=" background-image: url(<?php echo $images['url']; ?>);">
                        
                            <div class="working-date">
                                <?php
                                if(!empty($item['work_year'])){ echo '<h5>'.$item['work_year'].'</h5>'; } ?>
                            </div>
                            <div class="working-details">
                               <?php  if( !empty( $item['work_title'] ) ){
                                echo '<h4>'.$item['work_title'].'</h4>';
                                }
                                if(!empty($item['work_des'])){ echo '<p>'.$item['work_des'].'</p>'; }
                                ?>
                            </div>
                            
                        </div>

                       <?php if ($i % 2 == 0 && ( $count != $i )) { ?>
                    </div>
                    <div class="actw-single-area">
                         <?php } $i++; endforeach;?>
                    </div>

            </div>

            <script type="text/javascript">
                (function($){


                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _dots_set = <?php echo esc_js( $caseldots ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(1000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    var _itemmarginset = <?php if( isset($itemmargin) ){ echo esc_js($itemmargin); }else{ echo esc_js(30); }; ?>;


                    $('.actor_work_active').owlCarousel({
                        items:_showitem_set,
                        margin:_itemmarginset,
                        autoHeight:true,
                        dots: _dots_set,
                        nav: _arrows_set,
                        autoplay: _autoplay_set,
                        smartSpeed:_autoplay_speed,
                        animateIn: 'flipInX',
                        navText:['<i class="icofont icofont-long-arrow-left"></i>','<i class="icofont icofont-long-arrow-right"></i>'],
                          responsive: {
                            0: {
                              items: 1
                            },
                            575:{
                                items: _showitemmobile_set
                            },
                            768:{
                                items: _showitemtablet_set
                            },
                            1000:{
                                items: _showitem_set
                            },
                          }

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

Plugin::instance()->widgets_manager->register_widget_type( new FtageMentor_Elementor_Widget_ActorWork() );

