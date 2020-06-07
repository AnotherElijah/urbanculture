<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ftagementor_Elementor_Widget_Service extends Widget_Base {

    public function get_name() {
        return 'services-post';
    }
    
    public function get_title() {
        return __( 'Ftage : Services Post', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-picture-o';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'service_setting',
            [
                'label' => esc_html__( 'Service', 'ftagementor' ),
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
                'post_per_page',
                [
                    'label' => __( 'Show Total Item', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 3,
                    'max' => 10000,
                    'step' => 1,
                    'default' => 6,
                ]
            );              
            $this->add_control(
                'item_style',
                [
                    'label' => esc_html__( 'Select Style', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'carosul',
                    'options' => [
                        'carosul' => esc_html__( 'Style One Carousel', 'ftagementor' ),
                        'grid' => esc_html__( 'Style Two Grid', 'ftagementor' ),
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
                        'item_style' => 'carosul',
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
                        'item_style' => 'carosul',
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
                        'item_style' => 'carosul',
                    ]
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
                    'default' => 30,
                    'condition' => [
                        'item_style' => 'carosul',
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
                        'item_style' => 'carosul',
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
                        'item_style' => 'carosul',
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
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'grid_column_number',
                [
                    'label' => esc_html__( 'Columns', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '2',
                    'options' => [
                        '1' => esc_html__( '1', 'ftagementor' ),
                        '2' => esc_html__( '2', 'ftagementor' ),
                        '3' => esc_html__( '3', 'ftagementor' ),
                        '4' => esc_html__( '4', 'ftagementor' ),
                        '5' => esc_html__( '5', 'ftagementor' ),
                        '6' => esc_html__( '6', 'ftagementor' ),
                    ],
                    'condition' => [
                        'item_style' => 'grid',
                    ]
                ]
            );            
            $this->add_control(
                'content_show_ttie',
                [
                    'label' => __( 'Content Show Option', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
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
                    'default' => 5,
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
                ]
            );


        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'section_title_style1s',
            [
                'label' => __( 'Content Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .service-details h4' => 'color: {{VALUE}};',
                    ],
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
                        '{{WRAPPER}} .service-single:hover .service-details h4 a' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'title_color_hover_link',
                [
                    'label' => __( 'Title Hover Link color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .service-single .service-details h4 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .service-details h4',
                ]
            );
            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Title Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .service-details h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
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
                    'default' => '#ccc',
                    'selectors' => [
                        '{{WRAPPER}} .service-details > p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_content_color_hover',
                [
                    'label' => __( 'Content Hover color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#ccc',
                    'selectors' => [
                        '{{WRAPPER}} .service-single:hover .service-details > p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    
                    'selector' => '{{WRAPPER}} .service-details > p',
                ]
            );
            // Icon Style
            $this->add_control(
                'item_icon_heading',
                [
                    'label' => __( 'Icon Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_icon_color',
                [
                    'label' => __( 'Icon color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .servce-icon i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_icon_color_hover',
                [
                    'label' => __( 'Icon Hover color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .service-single:hover .servce-icon a i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_icon_color_hover_link',
                [
                    'label' => __( 'Icon Hover Link color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .service-single .servce-icon a:hover i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'icontypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .servce-icon i',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_icone',
                    'label' => __( 'Icon Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .servce-icon i',
                ]
            );  
            $this->add_responsive_control(
                'icon_margin',
                [
                    'label' => __( 'Icon margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .servce-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'padding',
                [
                    'label' => __( 'Icon Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .servce-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'item_box_style',
            [
                'label' => __( 'Box Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'overlay_style',
                [
                    'label' => __( 'Overlay Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'box_overlay_color',
                [
                    'label' => __( 'Overlay BG Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'rgba(255,255,255,0)',
                    'selectors' => [
                        '{{WRAPPER}} .service-single' => 'background: {{VALUE}};',
                    ],
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
                    'default'=>'rgba(255,255,255,0.1)',
                    'selectors' => [
                        '{{WRAPPER}} .service-single:hover' => 'background: {{VALUE}};',
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
                        '{{WRAPPER}} .service-single' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .service-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .service-single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
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
                    'label' => __( 'Box Shadow', 'Box Shadow Control', 'ftagementor' ),
                    'type' => Controls_Manager::BOX_SHADOW,
                    'selectors' => [
                        '{{WRAPPER}} .service-single' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{box_shadow_position.VALUE}};',
                    ],
                ]
            );      
            $this->add_control(
                'box_shadow_single_heading_hover',
                [
                    'label' => __( 'Box Shadow Hover', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );                  
            $this->add_control(
                'box_shadow_hover',
                [
                    'label' => __( 'Box Shadow Hover', 'ftagementor' ),
                    'type' => Controls_Manager::BOX_SHADOW,
                    'selectors' => [
                        '{{WRAPPER}} .service-single:hover' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{box_shadow_position.VALUE}};',
                    ],
                ]
            );


        $this->end_controls_section();
        // Carousel Style
        $this->start_controls_section(
            'carousel_style',
            [
                'label' => __( 'Carousel Button', 'ftagementor' ),
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
                    'default'=>'#fff',
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
                        '{{WRAPPER}} .owl-nav div:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_icone_hover',
                    'label' => __( 'Button Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .owl-nav div',
                ]
            );
   
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $item_style = $settings['item_style'];
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];        
        $itemmargin = $settings['itemmargin'];


        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $titlelength    = ! empty( $settings['title_length'] ) ? $settings['title_length'] : 5;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $columns = $this->get_settings_for_display('grid_column_number');

        $collumval = 'col-lg-3 col-sm-6';
        if( $columns !='' ){
            $colwidth = round(12/$columns);
            $collumval = 'col-lg-'.$colwidth.' col-sm-6';
        }

        ?>
            <div class="services-area">
                <div class="<?php if($item_style == 'carosul'){ echo 'sevice-active owl-carousel' ;} else echo 'row'; ?>">
                    <?php
                        $args = array(
                            'post_type'            => 'services',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $per_page,
                            'order'                => 'DESC',
                        );
                        $posts = new \WP_Query($args);
                        while($posts->have_posts()):$posts->the_post();

                        $icon_images = get_post_meta(get_the_id(),'_ftagementor_service_icon_img',true); 
                        $servce_icon  = get_post_meta( get_the_ID(),'_ftagementor_service_icon', true );
                        $servce_icon_type  = get_post_meta( get_the_ID(),'_ftagementor_service_icon_type', true );

                    ?>
                    <!-- Single Item --> 
                    <?php if($item_style == 'grid') { echo '<div class="'.$collumval.'">'; } ?>
                    <div class="service-single">
                        <?php if ($servce_icon_type =="image" && !empty( $icon_images )): ?>
                        <div class="servce-icon">
                            <a href="<?php the_permalink(); ?>">
                                <img alt="iamge" src="<?php echo esc_url($icon_images);?>">
                            </a>
                         </div>
                     <?php endif?>

                        <?php if ($servce_icon_type =="icon" && !empty( $servce_icon )): ?>
                        <div class="servce-icon">
                            <a href="<?php the_permalink(); ?>">
                                <i class="<?php echo esc_attr($servce_icon) ?>"></i>
                            </a>
                         </div>
                     <?php endif?>

                        <div class="service-details">
                            <h4><a href="<?php the_permalink(); ?>">
                                        <?php echo wp_trim_words( get_the_title(), $titlelength, '' );?>
                                </a>
                            </h4>
                            <?php echo '<p>'.wp_trim_words( get_the_content(), $contetnlength, '' ).'</p>';?>
                        </div>
                    </div>
                    <!-- Single Item -->

                    <?php if($item_style == 'grid'){echo '</div> ';}?>
                <?php endwhile; ?>
                </div>
            </div>

            <script type="text/javascript">
                (function($){

                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    var _itemmarginset = <?php if( isset($itemmargin) ){ echo esc_js($itemmargin); }else{ echo esc_js(30); }; ?>;

                    $('.sevice-active').owlCarousel({
                        items:_showitem_set,
                        margin:_itemmarginset,
                        autoHeight:true,
                        dots: false,
                        nav: _arrows_set,
                        autoplay: _autoplay_set,
                        smartSpeed:_autoplay_speed,
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

        wp_reset_query(); wp_reset_postdata();

    }

    protected function content_template() {
        ?>
            
        <?php
    }

    public function render_plain_content( $instance = [] ) {}

}

Plugin::instance()->widgets_manager->register_widget_type( new Ftagementor_Elementor_Widget_Service() );

