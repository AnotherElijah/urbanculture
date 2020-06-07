<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ftage_Elementor_Widget_Testimonial extends Widget_Base {

    public function get_name() {
        return 'ftagementor-testimonial';
    }
    
    public function get_title() {
        return __( 'Ftage: Testimonial', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-header';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'testimonial-setting',
            [
                'label' => esc_html__( 'Testimonial', 'ftagementor' ),
            ]
        );

            $this->add_control(
                'test_title',
                [
                    'label' => __( 'Feedback Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => 'Feedback Of <span>My</span>',
                    'title' => __( 'Enter Title Name', 'ftagementor' ),
                ]
            );
        $repeater = new Repeater();

            $repeater->add_control(
                'climage',
                [
                    'label' => __( 'Testimonial Image', 'ftagementor' ),
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
                    'label' => __( 'Client Name', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'title' => __( 'Enter client name', 'ftagementor' ),
                ]
            );
            $repeater->add_control(
                'cldesignation',
                [
                    'label' => __( 'Designation', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => 'true',
                    'title' => __( 'Enter Designation', 'ftagementor' ),
                ]
            );

            $repeater->add_control(
                'clsay',
                [
                    'label' => __( 'Client say', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'placeholder' => __( 'Client say', 'ftagementor' ),
                    'title' => __( 'Enter client say', 'ftagementor' ),
                ]
            );

            $this->add_control(
                'testimonial_list',
                [
                    'label' => __( 'Testimonial', 'ftagementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'clname' => __( 'Christopher Fox', 'ftagementor' ),
                            'cldesignation' => __( 'Author', 'ftagementor' ),
                            'clsay' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'ftagementor' ),
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
                'label' => esc_html__( 'Carousel Option', 'ftagementor' ),
            ]
        );
            $this->add_control(
                'layout_style',
                [
                    'label' => esc_html__( 'Select layout', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 1,
                    'options' => [
                        1 => esc_html__( 'Style One', 'ftagementor' ),
                        2 => esc_html__( 'Style Two', 'ftagementor' ),
                    ],
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
                'test-heading_title',
                [
                    'label' => __( 'Title Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'test_title_color',
                [
                    'label' => __( 'Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .client-feedback > h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'test_title_color_text',
                [
                    'label' => __( 'Color Text Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .client-feedback > h3 span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'test_titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .client-feedback > h3',
                ]
            );
            $this->add_responsive_control(
                'test_title_margin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .client-feedback > h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'test_title_border',
                    'label' => __( 'Title Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .client-feedback::after',
                ]
            );            
            $this->add_control(
                'clname-heading',
                [
                    'label' => __( 'Client Name Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'clname_color',
                [
                    'label' => __( 'Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content h6,{{WRAPPER}} .clientsay-content h6' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'clnametypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-testimonial .testimonial-content h6,{{WRAPPER}} .clientsay-content h6',
                ]
            );
            $this->add_responsive_control(
                'test_name_margin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content h6,{{WRAPPER}} .clientsay-content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'test_name_border',
                    'label' => __( 'Name Title Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .testimonial-content > h6::after',
                ]
            );            
            $this->add_control(
                'cldesignation-heading',
                [
                    'label' => __( 'Designation', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'cldesignation-color',
                [
                    'label' => __( 'Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'cldesignationtypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .single-testimonial .testimonial-content span',
                ]
            );

            $this->add_control(
                'cldescription-heading',
                [
                    'label' => __( 'Client Say', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );


            $this->add_control(
                'clsay-color',
                [
                    'label' => __( 'Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#555',
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content p,{{WRAPPER}} .clientsay-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'clsaytypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .single-testimonial .testimonial-content p,{{WRAPPER}} .clientsay-content p',
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
                        '{{WRAPPER}} .owl-nav div,{{WRAPPER}} .indicator3 .owl-nav [class*="owl-"],{{WRAPPER}} .indicator3 .owl-nav .owl-prev::after' => 'color: {{VALUE}};',
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
                        '{{WRAPPER}} .owl-nav div:hover,{{WRAPPER}} .indicator3 .owl-nav [class*="owl-"]:hover' => 'color: {{VALUE}};',
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
                        '{{WRAPPER}} .owl-nav div:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Button Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .owl-nav div',
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
        $layout_style = $settings['layout_style'];
        $test_title = $settings['test_title'];

        ?>
            <div class="testimonial-slider text-center owl-carousel <?php if( $layout_style ==2 ){ echo 'indicator3';} ?>">

                <?php foreach ( $settings['testimonial_list'] as $item ) :    

                    if( $layout_style ==1){
                    ?>
                    <div class="single-testimonial">
                        <?php
                            echo '<div class="testimonial-image">'.Group_Control_Image_Size::get_attachment_image_html( $item, 'climagesize', 'climage' ).'</div>';
                        ?>
                        <div class="testimonial-content">
                            <?php
                                if(!empty($item['clsay'])){ echo '<p>'.$item['clsay'].'</p>'; }

                                if( !empty( $item['clname'] ) ){
                                echo '<h6>'.$item['clname'].'</h6>';
                                }

                                if( !empty( $item['cldesignation'] ) ){
                                    echo '<span>'.$item['cldesignation'].'</span>';
                                }
                            ?>
                        </div>
                    </div>
                <?php }else{ ?>

                    <div class="col-md-12">
                        <div class="client-feedback text-center">
                            <?php echo '<h3>'.$test_title.'</h3>'?>
                        </div>
                        <div class="clientsay-single">
                            <div class="clientsay-content">
                                <?php
                                if(!empty($item['clsay'])){ echo '<p>'.$item['clsay'].'</p>'; }

                                if( !empty( $item['clname'] ) ){
                                echo '<h6>'.$item['clname'].'</h6>';
                                }?>

                            </div>
                            <div class="client-img">
                                <?php
                            echo '<div class="testimonial-image">'.Group_Control_Image_Size::get_attachment_image_html( $item, 'climagesize', 'climage' ).'</div>';
                                     ?>
                            </div>
                        </div>
                    </div>

                <?php }   endforeach; ?>

            </div>

            <script type="text/javascript">
                (function($){


                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _dots_set = <?php echo esc_js( $caseldots ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    var _itemmarginset = <?php if( isset($itemmargin) ){ echo esc_js($itemmargin); }else{ echo esc_js(30); }; ?>;


                    $('.testimonial-slider').owlCarousel({
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

Plugin::instance()->widgets_manager->register_widget_type( new Ftage_Elementor_Widget_Testimonial() );

