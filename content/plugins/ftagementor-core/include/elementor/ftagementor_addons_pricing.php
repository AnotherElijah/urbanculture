<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class FtageMentor_Elementor_Widget_Pricing extends Widget_Base {

    public function get_name() {
        return 'ftagementor-pricing';
    }
    
    public function get_title() {
        return __( 'Ftage Pricing', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-usd';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'pricing-setting',
            [
                'label' => esc_html__( 'Pricing', 'ftagementor' ),
            ]
        );
        $this->add_control(
            'item_style',
            [
                'label' => __( 'Select Style', 'ftagementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => __( 'Style One', 'ftagementor' ),
                    'style2' => __( 'Style Two', 'ftagementor' ),
                ]
            ]
        );          
        
            $this->add_control(
                'package_name',
                [
                    'label' => __( 'Package Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => 'Basic',
                    'title' => __( 'Enter Package Name', 'ftagementor' ),
                ]
            );
            $this->add_control(
                'package_label',
                [
                    'label' => __( 'Package Label', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => 'Hot',
                    'title' => __( 'Enter Label Name', 'ftagementor' ),
                ]
            );
            $this->add_control(
                'currency_icon',
                [
                    'label' => __( 'Currency Icon', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'fa fa-usd',
                ]
            );
            $this->add_control(
                'package_price',
                [
                    'label' => __( 'Package Price', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '50',
                    'title' => __( 'Enter Package Price', 'ftagementor' ),
                ]
            );
            $this->add_control(
                'package_duration',
                [
                    'label' => __( 'Duration', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '/PER MONTH',
                    'title' => __( 'Enter Package Duration', 'ftagementor' ),
                ]
            );
            $this->add_control(
                'order_now_btn_txt',
                [
                    'label' => __( 'Order Now Button Text', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Order Now',
                    'title' => __( 'Enter button text', 'ftagementor' ),
                ]
            );

            $this->add_control(
                'order_now_btn_link',
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

        $repeater = new Repeater();

            $repeater->add_control(
                'pricing_feature',
                [
                    'label' => __( 'Pricing feature', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Cost For Daily Expenses',
                    'title' => __( 'Enter feature name', 'ftagementor' ),
                ]
            );

            $this->add_control(
                'pricing_list',
                [
                    'label' => __( 'Pricing feature', 'ftagementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'pricing_feature' => __( 'Cost For Daily Expenses', 'ftagementor' ),
                        ],
                    ],
                    'title_field' => '{{{ pricing_feature }}}',
                ]
            );
            
        $this->end_controls_section();
        // content tab

        // Style tab section
        $this->start_controls_section(
            'pricing_style',
            [
                'label' => __( 'Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
                'ftagementor_pricing_tabs'
            );
                $this->start_controls_tab(
                    'ftagementor_price_content_tab',
                    [
                        'label' => __( 'Normal', 'ftagementor' ),
                    ]
                );
                $this->add_control(
                    'pricing-heading_title',
                    [
                        'label' => __( 'Header Style', 'ftagementor' ),
                        'type' => Controls_Manager::HEADING,
                    ]
                );
            $this->add_control(
                'pricing_package_color',
                [
                    'label' => __( 'Package  Title Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table-head > h4,{{WRAPPER}} .ftage_price-title > h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'pricing_package_color_bg',
                [
                    'label' => __( 'Package Title BG Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#474747 ',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table-head > h4,{{WRAPPER}} .ftage_price-title > h3' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'pricing_package_label_color',
                [
                    'label' => __( 'Package Title Label Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff ',
                    'selectors' => [
                        '{{WRAPPER}} .ftage_price_lebel' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'pricing_package_label_bg',
                [
                    'label' => __( 'Package Label BG Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .ftage_price_lebel' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'pricing_package_typhograpy',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-pricing-table-head > h4,{{WRAPPER}} .ftage_price-title > h3',
                ]
            );
            $this->add_control(
                'pricing_package_price_color',
                [
                    'label' => __( 'Price Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table-head > h5,{{WRAPPER}} .ftage_price-title .ftage_price' => 'color: {{VALUE}};',
                    ],
                ]
            );  
            $this->add_control(
                'pricing_package_price_color_bg',
                [
                    'label' => __( 'Price BG Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table-head > h5,
                        {{WRAPPER}} .ftage_price-title,
                        {{WRAPPER}} .ftage_price-title .ftage_price
                        ' => 'background: {{VALUE}};',
                    ],
                ]
            );   
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'pricing_package_price_border',
                    'label' => __( 'Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .ftage_price-title .ftage_price',
                ]
            );             
            $this->add_control(
                'pricing_package_duration_colr',
                [
                    'label' => __( 'Duration Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .monthly' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'pricing_package_feature_colr',
                [
                    'label' => __( 'feature Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table-body li,{{WRAPPER}} .ftage_pricing_features li' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'pricing_package_button_colr',
                [
                    'label' => __( 'Button Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table-body a,{{WRAPPER}} .ftage_priceing .ftage_price_btn a' => 'color: {{VALUE}};',
                    ],
                ]
            );
           $this->add_control(
                'pricing_package_button_bg',
                [
                    'label' => __( 'Button Background', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table-body a,{{WRAPPER}} .ftage_priceing .ftage_price_btn a' => 'background: {{VALUE}};',
                    ],
                ]
            );            
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'pricing_btn_border',
                    'label' => __( 'Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .single-pricing-table-body a,{{WRAPPER}} .ftage_priceing .ftage_price_btn a',
                ]
            );  


             $this->add_control(
                'box_shadow_single_heading',
                [
                    'label' => __( 'Box Shadow Hover', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );                  
            $this->add_control(
                'box_shadow_hover',
                [
                    'label' => __( 'Box Shadow', 'ftagementor' ),
                    'type' => Controls_Manager::BOX_SHADOW,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table,{{WRAPPER}} .ftage_priceing' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{box_shadow_position.VALUE}};',
                    ],
                ]
            );                      
        $this->end_controls_tab();
        $this->start_controls_tab(
            'ftagementor_pricing_hover_tab',
            [
                'label' => __( 'Hover', 'ftagementor' ),
            ]
        );            
            $this->add_control(
                'pricing_package_color_hover',
                [
                    'label' => __( 'Package Title Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table:hover .single-pricing-table-head > h4' => 'color: {{VALUE}};',
                    ],
                ]
            );         
            $this->add_control(
                'pricing_package_color_hover_bg',
                [
                    'label' => __( 'Package Title BG Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#cb9648',
                    'selectors' => [
                        '{{WRAPPER}} .ftage_priceing-inner:hover .ftage_price-title h3' => 'background: {{VALUE}};',
                    ],
                ]
            );        
            $this->add_control(
                'pricing_package_bg_hover',
                [
                    'label' => __( 'Package BG Hover Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table:hover .single-pricing-table-head,
                            {{WRAPPER}} .ftage_priceing-inner:hover .ftage_price-title,
                            {{WRAPPER}} .ftage_priceing-inner:hover .ftage_price-title .ftage_price' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'pricing_package_price_color_hover',
                [
                    'label' => __( 'Price Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table:hover .single-pricing-table-head > h5,{{WRAPPER}}  .ftage_price-title .ftage_price' => 'color: {{VALUE}};',
                    ],
                ]
            );   
            $this->add_control(
                'pricing_package_duration_colr_hover',
                [
                    'label' => __( 'Duration Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table:hover .monthly' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'pricing_package_feature_colr_hover',
                [
                    'label' => __( 'feature Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table:hover .single-pricing-table-body li' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'pricing_package_button_colr_hover',
                [
                    'label' => __( 'Button Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table:hover .single-pricing-table-body a,{{WRAPPER}} .ftage_priceing-inner:hover .ftage_price_btn a' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'pricing_package_button_bg_hover',
                [
                    'label' => __( 'Button Background', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-table:hover .single-pricing-table-body a,{{WRAPPER}} .ftage_priceing-inner:hover .ftage_price_btn a' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'pricing_btn_border_hover',
                    'label' => __( 'Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .single-pricing-table:hover .single-pricing-table-body a,{{WRAPPER}} .ftage_priceing-inner:hover .ftage_price_btn a',
                ]
            );

             $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $order_now_btn_txt = $settings['order_now_btn_txt'];
        $item_style = $settings['item_style'];
        $package_label = $settings['package_label'];
        $package_name = $settings['package_name'];
        $currency_icon = $settings['currency_icon'];
        $package_price = $settings['package_price'];
        $package_duration = $settings['package_duration'];

        $target = $settings['order_now_btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['order_now_btn_link']['nofollow'] ? ' rel="nofollow"' : '';        

        ?>
<?php if( $item_style =='style1'){ ?>

        <div class="ftage_priceing">
            <div class="ftage_priceing-inner">
                <?php if( !empty( $package_label ) ){ ?>
                    <div class="ftage_price_lebel"><?php echo $package_label; ?></div>
                <?php } ?>
                <div class="ftage_price-title">
                    <?php if(!empty($package_name)){ echo '<h3>'.$package_name.'</h3>'; } ?>
                    <div class="ftage_price"><?php if(!empty($currency_icon)){ echo '<i class="'.$currency_icon.'"></i>'; } if(!empty($package_price)){ echo $package_price; } ?><span> <?php if(!empty($package_duration)){ echo $package_duration; } ?></span>
                    </div>
                </div>
                <div class="ftage_pricing_features">
                    <?php if( $settings['pricing_list'] ){ ?>
                    <ul>
                        <?php foreach ( $settings['pricing_list'] as $item ) : 

                            if(!empty($item['pricing_feature'])){ echo '<li>'.$item['pricing_feature'].'</li>'; }
                         endforeach; ?>
                    </ul>  
                    <?php } ?>
                </div>
                <?php if( $settings['order_now_btn_txt'] ){ ?>
                    <div class="ftage_price_btn">
                        <?php echo '<a href="' . esc_url($settings['order_now_btn_link']['url']) . '"' . $target . $nofollow . '> '.esc_html($settings['order_now_btn_txt']).'</a>'; ?> 
                    </div>
                <?php } ?>
            </div>
        </div>

    <?php }else{ ?>
        <div class="single-pricing-table">
            <div class="single-pricing-table-head">
                <?php if(!empty($package_name)){ echo '<h4>'.$package_name.'</h4>'; } ?>
                <h5>
                 <?php if(!empty($currency_icon)){ echo '<span> <i class="'.$currency_icon.'"></i></span>'; } ?><span><?php if(!empty($package_price)){ echo $package_price; } ?></span>
                <?php if(!empty($package_duration)){ echo '<span class="monthly">'.$package_duration.'</span>'; } ?>
                </h5>
            </div>
            <div class="single-pricing-table-body">
                <?php if( $settings['pricing_list'] ){ ?>
                <ul>
                    <?php foreach ( $settings['pricing_list'] as $item ) : 

                        if(!empty($item['pricing_feature'])){ echo '<li>'.$item['pricing_feature'].'</li>'; }
                     endforeach; ?>
                </ul>  
                <?php } echo '<a class="read-more" href="' . esc_url($settings['order_now_btn_link']['url']) . '"' . $target . $nofollow . '> '.esc_html($settings['order_now_btn_txt']).'</a>';?>   
                                                      
            </div>
        </div>
                


    <?php } ?>

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

Plugin::instance()->widgets_manager->register_widget_type( new FtageMentor_Elementor_Widget_Pricing() );