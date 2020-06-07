<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class FtageMentor_Elementor_Widget_Contact_Us extends Widget_Base {

    public function get_name() {
        return 'ftagementor-contact-us';
    }
    
    public function get_title() {
        return __( 'Ftage : Contact Form', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-phone';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'contact_content_setting',
            [
                'label' => esc_html__( 'Contact Form Content', 'ftagementor' ),
            ]
        );
            $this->add_control(
                'contact_heading',
                [
                    'label' => __( 'Contact Form', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'contact_title',
                [
                    'label' => __( 'Contact Form Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'Get In Touch', 'ftagementor' ),
                ]
            );
           $this->add_control(
                'contact_form',
                [
                    'label' => __( 'Contact Shorcode', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( '[contact-form-7 id="5" title="Contact form 1"]', 'ftagementor' ),
                ]
            );

            $this->add_control(
                'contact_bg_iamge',
                [
                    'label' => __( 'Contact Form BG Image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'contact_location_heading',
                [
                    'label' => __( 'Contact Location ', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'contact_title_address',
                [
                    'label' => __( 'Contact Address', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'Address', 'ftagementor' ),
                ]
            );
        $repeater = new Repeater();

            $repeater->add_control(
                'location_icon',
                [
                    'label' => __( 'Select Icon', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'fa fa-phone',
                ]
            );
            $repeater->add_control(
                'location_text',
                [
                    'label' => __( 'Details', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => '+012 345 678 102 <br> +012 345 678 102',
                    'title' => __( 'Detials', 'ftagementor' ),
                ]
            );

            $this->add_control(
                'location_list',
                [
                    'label' => __( 'locatoin Field', 'ftagementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'location_icon' => __( '', 'ftagementor' ),
                            'location_text' => __( '', 'ftagementor' ),
                        ],
                    ],
                    'title_field' => '{{{ location_icon }}}',
                ]
            );


            $this->add_control(
                'social_share_heading',
                [
                    'label' => __( 'Social Share', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'follow_us_title',
                [
                    'label' => __( 'Social Share Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'Follow Us', 'ftagementor' ),
                ]
            );
        $repeater = new Repeater();

            $repeater->add_control(
                'social_icon',
                [
                    'label' => __( 'Select Icon', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'fa fa-facebook',
                ]
            );
            $repeater->add_control(
                'social_icon_link',
                [
                    'label' => __( 'Social Link', 'ftagementor' ),
                    'type' => Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com','ftagementor'),
                    'show_external' => true,
                    'default' => [
                            'url' => '',
                            'is_external' => true,
                            'nofollow' => true,
                        ]
                    ]
            );


            $this->add_control(
                'social_icon_list',
                [
                    'label' => __( 'Social Share', 'ftagementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'social_icon' => __( '', 'ftagementor' ),
                            'social_icon_link' => __( '', 'ftagementor' ),
                        ],
                    ],
                    'title_field' => '{{{ social_icon }}}',
                ]
            );

        $this->end_controls_section();
        // content tab

        // Style tab section
        $this->start_controls_section(
            'contact_style',
            [
                'label' => __( 'Contact Form Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'contact_title_heading',
                [
                    'label' => __( 'Contact Form Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_responsive_control(
                'contact_form_box',
                [
                    'label' => __( 'Contact Form Area Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .contact-area .leave-comment.comments' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );            
            $this->add_control(
                'contact_form_box_overlay_color',
                [
                    'label' => __( 'Contact Form Area Overlay Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => 'rgba(226,167,80,0.84)',
                    'selectors' => [
                        '{{WRAPPER}} .contact-area .leave-comment.comments::before' => 'background: {{VALUE}};',
                    ],
                ]
            );            
            $this->add_control(
                'contact_title_color',
                [
                    'label' => __( 'Title Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .contact-form-title > h4' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'title_border',
                    'label' => __( 'Title Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .contact-form-title > h4::after',
                ]
            );            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titlet_ypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .contact-form-title > h4',
                ]
            );
            $this->add_responsive_control(
                'contact_title_margin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .contact-form-title > h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'coantact_border',
                    'label' => __( 'Contact Form Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .contact-area .comment-form p input, {{WRAPPER}} .contact-area .comment-form p textarea',
                ]
            );
            $this->add_responsive_control(
                'contact_form_margin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .contact-area .comment-form p input, {{WRAPPER}} .contact-area .comment-form p textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contact_typpgraphy',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .contact-area .comment-form p input,{{WRAPPER}} .contact-area .comment-form p textarea',
                ]
            );


            $this->add_control(
                'contact_submit_heading',
                [
                    'label' => __( 'Submit Button', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'cnttn_color',
                [
                    'label' => __( 'Button color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .contact-area .comment-form p input[type="submit"]' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'cnttn_color_hover',
                [
                    'label' => __( 'Button Hover color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .contact-area .comment-form p input[type="submit"]:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'cnttn_bg_color',
                [
                    'label' => __( 'Button background color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .contact-area .comment-form p input[type="submit"]' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'cnttn_bg_color_hover',
                [
                    'label' => __( 'Button background Hover color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .contact-area .comment-form p input[type="submit"]:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'btntypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .contact-area .comment-form p input[type="submit"]',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'button_border',
                    'label' => __( 'Button Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .contact-area .comment-form p input[type="submit"]',
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'location_stye',
            [
                'label' => __( 'Locatoin Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'loaation_padding',
                [
                    'label' => __( 'Address Box Padding', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .company-location' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );
            $this->add_control(
                'locaton_background',
                [
                    'label' => __( 'Address Background', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .company-location' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'item_icon_heading',
                [
                    'label' => __( 'Icon Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_link_color',
                [
                    'label' => __( 'Icon Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .single-address-icon i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_link_bg_color',
                [
                    'label' => __( 'Icon BG Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'rgba(0,0,0,0.0)',
                    'selectors' => [
                        '{{WRAPPER}} .single-address-icon i' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'icon_border',
                    'label' => __( 'Icon Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .single-address-icon i',
                ]
            ); 
            $this->add_control(
                'icon_border_radius',
                [
                    'label' => __( 'Border Radius', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-address-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'default' => 40,
                    'selectors' => [
                        '{{WRAPPER}} .single-address-icon i' => 'width: {{VALUE}}px;',
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
                    'default' => 40,
                    'selectors' => [
                        '{{WRAPPER}} .single-address-icon i' => 'height: {{VALUE}}px;',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'icon_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                    'selector' => '{{WRAPPER}} .single-address-icon i',
                ]
            );

            $this->add_control(
                'loaction_details_style',
                [
                    'label' => __( 'Address Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'address_color',
                [
                    'label' => __( 'Details Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#555',
                    'selectors' => [
                        '{{WRAPPER}} .single-address-info p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'details_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                    'selector' => '{{WRAPPER}} .single-address-info p',
                ]
            );
            $this->add_control(
                'follow_us_heading',
                [
                    'label' => __( 'Follow Us Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'follow_title_color',
                [
                    'label' => __( 'Title Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#555',
                    'selectors' => [
                        '{{WRAPPER}} .follow-us-icon > h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'follow_us_margin',
                [
                    'label' => __( 'Margin', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .follow-us-icon > h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'follow_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                    'selector' => '{{WRAPPER}} .follow-us-icon > h3',
                ]
            );


            $this->add_control(
                'follow_icon_color',
                [
                    'label' => __( 'Icon Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'',
                    'selectors' => [
                        '{{WRAPPER}} .follow-us-icon ul li a i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'follow_icon_bg_color',
                [
                    'label' => __( 'Icon BG Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'',
                    'selectors' => [
                        '{{WRAPPER}} .follow-us-icon ul li a i' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'follow_icon_border',
                    'label' => __( 'Icon Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .follow-us-icon ul li a i',
                ]
            ); 
            $this->add_control(
                'follow_icon_border_radius',
                [
                    'label' => __( 'Border Radius', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .follow-us-icon ul li a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );

            $this->add_responsive_control(
                'follow_icon_width',
                [
                    'label' => __( 'Icon Width', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 200,
                    'step' => 1,
                    'default' => 30,
                    'selectors' => [
                        '{{WRAPPER}} .follow-us-icon ul li a i' => 'width: {{VALUE}}px;',
                    ],
                ]
            );
            $this->add_responsive_control(
                'follow_icon_height',
                [
                    'label' => __( 'Icon Height', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 200,
                    'step' => 1,
                    'default' => 30,
                    'selectors' => [
                        '{{WRAPPER}} .follow-us-icon ul li a i' => 'height: {{VALUE}}px;',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'follow_icon_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                    'selector' => '{{WRAPPER}} .follow-us-icon ul li a i',
                ]
            );

       $this->end_controls_section();



    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();
        $contact_title = $settings['contact_title'];
        $contact_form = $settings['contact_form'];
        $follow_us_title = $settings['follow_us_title'];
        $contact_title_address = $settings['contact_title_address'];
        $contact_bg_iamge = $settings['contact_bg_iamge']['url'];
        ?>

        <div class="contact-area">
            <div class="row">
                <div class="col-lg-8">
                     <div class="leave-comment comments" style="background: #000 url(<?php echo $contact_bg_iamge;?>) no-repeat scroll center center / cover;">
                        <!-- Sub Section title start -->
                        <div class="comments-title contact-form-title">
                            <?php if(!empty($contact_title) ) { ?>
                                <h4><?php echo $contact_title; ?></h4>
                            <?php } ?>
                        </div>
                        <!-- Sub Section title end -->
                        
                        <div class="comment-form">
                            <?php if( !empty($contact_form)) { ?>
                                <?php echo do_shortcode( $contact_form ); ?>
                            <?php } ?>
                        </div>                  
                    </div>
                    <div class="company-location">
                        <div class="contact-address text-left">
                            <?php if(!empty($contact_title_address ) ){?>
                            <div class="info-title">
                                <?php echo '<h4>'. esc_html($contact_title_address,'ftagementor').'</h4>';?>
                            </div>
                            <?php } ?>
                        <?php 
                            foreach ( $settings['location_list'] as $item ) :
                        ?>
                            <!-- single one -->
                            <div class="single-address"> 
                                <div class="single-address-icon"> 
                                    <?php  if( !empty( $item['location_icon'] ) ){ 
                                        echo '<i class="'.esc_attr( $item['location_icon'] ).'"></i>';
                                     } ?>
                                </div> 
                                <div class="single-address-info">  
                                    <?php  if( !empty( $item['location_text'] ) ){ ?>
                                        <p><?php echo $item['location_text'];?></p>
                                    <?php } ?>     
                                </div>    
                            </div>
                            <!-- single end -->
                            <?php endforeach; ?>
                        </div>
                        <div class="follow-us-icon">
                            <?php if(!empty( $follow_us_title ) ) { ?>

                                <h3><?php echo esc_html__($follow_us_title,'ftagementor') ?></h3>

                            <?php } ?>
                                <?php if(!empty($settings['social_icon_list'] )) {?>
                                <ul>
                                     <?php 
                                         foreach ( $settings['social_icon_list'] as $item_object ) :

                                            $link  = $item_object['social_icon_link']['url'];
                                            $social_icon = $item_object['social_icon'];

                                            $target = $item_object['social_icon_link']['is_external'] ? ' target="_blank"' : '';
                                            $nofollow = $item_object['social_icon_link']['nofollow'] ? ' rel="nofollow"' : '';

                                         if( !empty( $item_object['social_icon'] ) ){ ?>

                                            <li>
                                               <?php  echo '<a href="'.esc_url($link).'"'.$target.$nofollow.'> <i class="'.$social_icon.'"></i></a>';?>
                                            </li>

                                         <?php } ?>
                                    
                                    <?php endforeach; ?>
                                </ul>
                            <?php } ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
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

Plugin::instance()->widgets_manager->register_widget_type( new FtageMentor_Elementor_Widget_Contact_Us() );