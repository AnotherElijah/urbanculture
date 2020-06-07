<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ftage_Elementor_Widget_Poster extends Widget_Base {

    public function get_name() {
        return 'poster-addons';
    }
    
    public function get_title() {
        return __( 'Ftage : Trailer Poster', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-picture-o';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'poster_setting',
            [
                'label' => esc_html__( 'Poster Settings', 'ftagementor' ),
            ]
        );
            $this->add_control(
                'poster',
                [
                    'label' => __( 'Poster Image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'postersize',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );

            $this->add_control(
                'posterlink',
                [
                    'label' => __( 'Link', 'ftagementor' ),
                    'type' => Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'ftagementor' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );

            $this->add_control(
                'poster_title',
                [
                    'label' => __( 'Release On Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'rows' => 10,
                    'placeholder' => __( 'Release On', 'ftagementor' ),
                ]
            );

            $this->add_control(
                'poster_date',
                [
                    'label' => __( 'Trailer Date', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'rows' => 10,
                    'placeholder' => __( '26th <span>Aug</span>', 'ftagementor' ),
                    'default' =>'26th <span>Aug</span>',
                ]
            );
            $this->add_control(
                'poster_ratio',
                [
                    'label' => __( 'Trailer Rating Ratio', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'rows' => 10,
                    'placeholder' => __( '8.5/10', 'ftagementor' ),
                    'default' =>'8.5/10',
                ]
            );
            $repeater = new Repeater();

            $repeater->add_control(
                'rating_icon',
                [
                    'label' => __( 'Icon', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'fa fa-star',
                ]
            );
            $repeater->add_control(
                'rating_color_check',
                [
                    'label' => esc_html__( 'Rating Color Show', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );             
            $this->add_control(
                'rating_list',
                [
                    'label' => __( 'Rating', 'ftagementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'rating_icon' => __( 'fa fa-star', 'ftagementor' ),
                            'rating_color_check' => __( 'on', 'ftagementor' ),
                        ],
                    ],
                    'title_field' => '{{{ rating_icon }}}',
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
            $this->add_control(
                'release_on_color',
                [
                    'label' => __( 'Release On Title Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .pstr_image h3' => 'color: {{VALUE}};',
                    ],
                ]
            ); 
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .pstr_image h3',
                ]
            );
            $this->add_control(
                'box_shadow_single_heading',
                [
                    'label' => __( 'Box Shadow', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );            
            $this->add_control(
                'box_shadow_single',
                [
                    'label' => __( 'Image Shadow', 'Box Shadow Control', 'ftagementor' ),
                    'type' => Controls_Manager::BOX_SHADOW,
                    'selectors' => [
                        '{{WRAPPER}} .pstr_image' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{box_shadow_position.VALUE}};',
                    ],
                ]
            ); 

            $this->add_responsive_control(
                'box_padding',
                [
                    'label' => __( 'Image Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pstr_image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'single_headingdate',
                [
                    'label' => __( 'Date Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );             
            $this->add_control(
                'date_color',
                [
                    'label' => __( 'Date Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .pstr_date' => 'color: {{VALUE}};',
                    ],
                ]
            );           
            $this->add_control(
                'date_color_bg',
                [
                    'label' => __( 'Date BG Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .pstr_date' => 'background: {{VALUE}};',
                    ],
                ]
            ); 
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'datetypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .pstr_date',
                ]
            ); 
            $this->add_responsive_control(
                'date_padding',
                [
                    'label' => __( 'Date Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pstr_date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );                       
            $this->add_control(
                'box_shadow_single_headingdate',
                [
                    'label' => __( 'Date Shadow', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );            
            $this->add_control(
                'box_shadow_singledate',
                [
                    'label' => __( 'Date Shadow', 'Box Shadow Control', 'ftagementor' ),
                    'type' => Controls_Manager::BOX_SHADOW,
                    'selectors' => [
                        '{{WRAPPER}} .pstr_date' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{box_shadow_position.VALUE}};',
                    ],
                ]
            ); 
            $this->add_responsive_control(
                'box_paddingdate',
                [
                    'label' => __( 'Date Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pstr_date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'rating_heading',
                [
                    'label' => __( 'Rating Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );             
            $this->add_control(
                'rating_color',
                [
                    'label' => __( 'Rating Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#ddd',
                    'selectors' => [
                        '{{WRAPPER}} .pstr_rating li i' => 'color: {{VALUE}};',
                    ],
                ]
            );             
            $this->add_control(
                'rating_color_active',
                [
                    'label' => __( 'Rating Active Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .pstr_rating li .ratclr' => 'color: {{VALUE}};',
                    ],
                ]
            );           
            $this->add_control(
                'rating_color_ratio',
                [
                    'label' => __( 'Rating Ratio Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .pstr_content span' => 'color: {{VALUE}};',
                    ],
                ]
            ); 

        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {

        $settings       = $this->get_settings_for_display();
        $poster_title  = $this->get_settings_for_display('poster_title');
        $poster_date    = $this->get_settings_for_display('poster_date');
        $poster_ratio = $this->get_settings_for_display('poster_ratio');

        // Button Link
        $target = $settings['posterlink']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['posterlink']['nofollow'] ? ' rel="nofollow"' : '';

        ?>
                <div class="pstr_box">
                    <div class="pstr_image">
                        <a href="<?php echo esc_url($settings['posterlink']['url']) . $target . $nofollow; ?>">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'postersize', 'poster' );?>
                        </a>
                        <?php if( !empty($poster_title) ){
                                echo '<h3 class="pstr_title">'.$poster_title.'</h3>';
                            }

                            ?>
                        <?php
                        if( !empty($poster_date) ){ ?>
                        <div class="pstr_date">
                            <?php echo $poster_date ?>
                        </div>
                       <?php }?>                            
                    </div>
                    <div class="pstr_content">                        
                        <?php if( $settings['rating_list'] ) {?>
                         <ul class="pstr_rating">
                          <?php 
                            foreach ( $settings['rating_list'] as $item_social ) :
                            $rating_icon = $item_social['rating_icon'];
                            $rating_color_check = $item_social['rating_color_check'];
                            ?>            
                            <li>
                                <?php
                                if( $item_social['rating_color_check'] == 'yes'){ 
                                    echo '<i class ="ratclr '.$rating_icon.'"></i>';
                                    }else{
                                
                                echo '<i class ="'.$rating_icon.'"></i>';
                                        }
                                    ?>
                            </li>

                            <?php endforeach;?>

                        </ul> 
                    <?php } ?>
                        <?php
                            if( !empty($poster_ratio) ){
                                echo '<span class="rading_ratio">'.esc_attr($poster_ratio).'</span>';
                            }
                        ?>

                    </div>
                </div>
        <?php

    }

    protected function content_template() {
        ?>
            
        <?php
    }

    public function render_plain_content( $instance = [] ) {}

}

Plugin::instance()->widgets_manager->register_widget_type( new Ftage_Elementor_Widget_Poster() );

