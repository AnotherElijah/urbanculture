<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class FtageMentor_Elementor_Widget_Trailer extends Widget_Base {

    public function get_name() {
        return 'ftagementor-trailer';
    }
    
    public function get_title() {
        return __( 'Ftage : Trailer', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-video-camera';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'trailer_content_setting',
            [
                'label' => esc_html__( 'Trailer Content', 'ftagementor' ),
            ]
        );

           $this->add_control(
                'trailer_style_select',
                [
                    'label' => esc_html__( 'Slect Trailer Style', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Style One', 'ftagementor' ),
                        '2' => esc_html__( 'Style Two', 'ftagementor' ),
                    ],
                ]
            );
           $this->add_control(
                'playiconty',
                [
                    'label' => esc_html__( 'Play Icon type', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Icon', 'ftagementor' ),
                        '2' => esc_html__( 'image', 'ftagementor' ),
                    ],
                ]
            );

            $this->add_control(
                'iconiamge',
                [
                    'label' => __( 'Play Icon image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'playiconty' => '2',
                    ]
                ]
            );
            $this->add_control(
                'playicon',
                [
                    'label' => __( 'Play icon', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'icofont icofont-play-alt-2',
                    'condition' => [
                        'playiconty' => '1',
                    ]
                ]
            );

        $repeater = new Repeater();

            $repeater->add_control(
                'trailerimage',
                [
                    'label' => __( 'Trailer Image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $repeater->add_control(
                'videourl',
                [
                    'label' => __( 'Video URL', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'https://www.youtube.com/watch?v=TLnmb07WQ-s', 'ftagementor' ),
                ]
            );            
            $repeater->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'imagesize',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );

            $repeater->add_control(
                'trailertitle',
                [
                    'label' => __( 'Trailer Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => '',
                    'title' => __( 'Trailer Title', 'ftagementor' ),
                ]
            );
            $repeater->add_control(
                'videoduration',
                [
                    'label' => __( 'Trailer Duration', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => 'true',
                    'title' => __( '45.00', 'ftagementor' ),
                ]
            );
            $this->add_control(
                'trailer_list',
                [
                    'label' => __( 'Slider', 'ftagementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'trailerimage' => __( '', 'ftagementor' ),
                            'videourl' => __( '', 'ftagementor' ),
                            'trailertitle' => __( '', 'ftagementor' ),
                            'videoduration' => __( '', 'ftagementor' ),
                        ],
                    ],
                    'title_field' => '{{{ trailertitle }}}',
                ]
            );

        $this->end_controls_section();
        // content tab

        // Trailer Option
        $this->start_controls_section(
            'trailer_option_setting',
            [
                'label' => esc_html__( 'Trailer Option', 'ftagementor' ),
            ]
        );
            $this->add_control(
                'slautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'slautoplayspeed',
                [
                    'label' => __( 'Auto play speed', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'max' => 10000,
                    'step' => 100,
                    'default' => 1000,
                    'condition' => [
                        'slautoplay' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slarrows',
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
                    'label' => esc_html__( 'Arrow Style', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        1 => esc_html__( 'Style One Icon Middle', 'ftagementor' ),
                        2 => esc_html__( 'Style Two Icon Top', 'ftagementor' ),
                    ],
                ]
            );


            $this->add_control(
                'arrow_icon_next',
                [
                    'label' => __( 'Play Icon Next', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'icofont icofont-long-arrow-right',
                    'condition' => [
                        'slarrows' => 'yes',
                    ]
                ]
            );
            $this->add_control(
                'arrow_icon_prev',
                [
                    'label' => __( 'Play Icon Prev', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'icofont icofont-long-arrow-left',
                    'condition' => [
                        'slarrows' => 'yes',
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
                        'service_style' => '1',
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
            'trailer_styles',
            [
                'label' => __( 'Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'trailer_title_heading',
                [
                    'label' => __( 'Trailer Color', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'video_overlay_color',
                [
                    'label' => __( 'Video Overlay color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'rgba(0,0,0,0.59)',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-img::after' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-titel h5' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .trailer-titel h5',
                ]
            );

            $this->add_control(
                'duration_color',
                [
                    'label' => __( 'Duration Time color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-titel span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'durationtypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .trailer-titel span',
                ]
            );
            $this->add_control(
                'trailer_play_heading',
                [
                    'label' => __( 'Play Icon', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'pl_color',
                [
                    'label' => __( 'Icon color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-img .popup-youtube' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'pl_color_hover',
                [
                    'label' => __( 'Icon Hover color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .trailer-img .popup-youtube:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Button Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .trailer-img .popup-youtube',
                ]
            );   
                     
            $this->add_control(
                'slider_arrow_button_heading',
                [
                    'label' => __( 'Arrow Button', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
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
                                '{{WRAPPER}} .indicator-style-two .owl-nav div,{{WRAPPER}} .slider-nav-team .slick-arrow' => 'top: {{VALUE}}px;',
                            ],
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
                                '{{WRAPPER}} .owl-nav div,{{WRAPPER}} .slider-nav-team .slick-arrow' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .owl-nav div,{{WRAPPER}} .slider-nav-team .slick-arrow' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .owl-nav div,{{WRAPPER}} .slider-nav-team .slick-arrow',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav div,{{WRAPPER}} .slider-nav-team .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .owl-nav div,{{WRAPPER}} .slider-nav-team .slick-arrow' => 'width: {{VALUE}}px;',
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
                                '{{WRAPPER}} .owl-nav div,{{WRAPPER}} .slider-nav-team .slick-arrow' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .owl-nav div,{{WRAPPER}} .slider-nav-team .slick-arrow',
                        ]
                    );
            $this->add_control(
                'slider_arrow_button_hover_heading',
                [
                    'label' => __( 'Arrow Button Hover ', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
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
                                '{{WRAPPER}} .owl-nav div:hover,{{WRAPPER}} .slider-nav-team .slick-arrow:hover' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .owl-nav div:hover,{{WRAPPER}} .slider-nav-team .slick-arrow:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .owl-nav div:hover,{{WRAPPER}} .slider-nav-team .slick-arrow:hover',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav div:hover,{{WRAPPER}} .slider-nav-team .slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

        $this->end_controls_section();


    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        // Trailer Option
        $trailer_style_select = $settings['trailer_style_select'];
        $slautoplay = $settings['slautoplay'];
        $slarrows = $settings['slarrows'];
        $slautoplayspeed = $settings['slautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];
        $itemmargin = $settings['itemmargin'];
        $slarrowsstyle = $settings['slarrowsstyle'];
        $sectionid =  $this-> get_id();


        $playiconty      = $this->get_settings_for_display('playiconty');
        $playicon        = $this->get_settings_for_display('playicon');
        $arrow_icon_prev        = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next        = $this->get_settings_for_display('arrow_icon_next');
        $iconiamge  =   $settings['iconiamge']['url'];

        if( $arrow_icon_next =='icofont icofont-long-arrow-right' && $slarrowsstyle==2){
                $arrow_icon_prev = 'icofont icofont-thin-left';
                $arrow_icon_next = 'icofont icofont-thin-right';

        }


        ?>
            <!-- Trailer Section Start -->
            <div class="trailer-area">

                <?php if ($trailer_style_select == 2 ){?>
                        <!-- Latest Trailer Item Area Start -->
                        <div class="latest-trailer-main">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="trailer-left-area slider slider-for-team <?php echo $sectionid;?>">
                                        <?php 
                                            foreach ( $settings['trailer_list'] as $items ) :
                                            $images = $items['trailerimage'];
                                        ?>
                                        <div class="slick-left-thumb">
                                            <div class="trailer-img">
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $items, 'imagesize', 'trailerimage' ) ?>

                                                <a class="popup-youtube" href=" <?php if( !empty( $items['videourl'] ) ){ echo esc_url( $items['videourl'] ) ; }?>">
                                                    <?php
                                                        if( $playiconty == 2 ){
                                                           ?>
                                                            <img src="<?php echo $iconiamge; ?>" alt="" />
                                                            <?php
                                                        }else{
                                                            echo '<i class="'.esc_attr($playicon).'"></i>';
                                                        }
                                                    ?>
                                                </a>
                                            </div>
                                        </div>

                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="trailer-right-area slider slider-nav-team <?php echo $sectionid;?>">
                                        <?php 
                                            foreach ( $settings['trailer_list'] as $item ) :
                                            $images = $item['trailerimage'];
                                        ?>
                                        <div class="traier-nav-thumb-area">
                                            <div class="trailer-thumb-single">
                                                <div class="trailer-thumb">
                                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $item, 'imagesize', 'trailerimage' ) ?>
                                                </div>
                                                <div class="trailer-content trailer-titel">
                                                    <?php if( !empty( $item['trailertitle'] ) ){ echo '<h5>'.$item['trailertitle'].'</h5>'; }

                                                     if( !empty( $item['videoduration'] ) ){ echo '<span>'.$item['videoduration'].'</span>'; }?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- Latest Trailer Item Area End -->                    

                    <?php } else{?>

                <div class="trailer-active owl-theme owl-carousel <?php echo $sectionid;?>  <?php if($slarrowsstyle==2){ echo 'indicator-style-two';} ?>">
                    <?php 
                        foreach ( $settings['trailer_list'] as $item ) :
                        $images = $item['trailerimage'];
                    ?>
                        <div class="trailer-single">
                            <div class="trailer-img">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $item, 'imagesize', 'trailerimage' ) ?>

                                <a class="popup-youtube" href=" <?php if( !empty( $item['videourl'] ) ){ echo esc_url( $item['videourl'] ) ; }?>">
                                    <?php
                                        if( $playiconty == 2 ){
                                           ?>
                                            <img src="<?php echo $iconiamge; ?>" alt="" />
                                            <?php
                                        }else{
                                            echo '<i class="'.esc_attr($playicon).'"></i>';
                                        }
                                    ?>
                                </a>
                            </div>
                            <div class="trailer-titel">
                                <h5>
                                    <?php if( !empty( $item['trailertitle'] ) ){ echo $item['trailertitle']; }?>
                                    
                                </h5>
                                <span>
                                    <?php if( !empty( $item['videoduration'] ) ){ echo $item['videoduration']; }?>
                                </span>
                            </div>
                        </div>
                        <!-- Trailer Single -->
                    <?php endforeach; ?>
                </div>


                        <?php } ?>
            </div>
            <!-- Trailer Section End -->

            <script type="text/javascript">
                (function($){

                    var _arrows_set = <?php echo esc_js( $slarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $slautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($slautoplayspeed) ){ echo esc_js($slautoplayspeed); }else{ echo esc_js(1000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    var _itemmarginset = <?php if( isset($itemmargin) ){ echo esc_js($itemmargin); }else{ echo esc_js(30); }; ?>;

                    $('.trailer-active.<?php echo $sectionid;?>').owlCarousel({
                        items:_showitem_set,
                        margin:_itemmarginset,
                        autoHeight:true,
                        dots: false,
                        nav: _arrows_set,
                        autoplay: _autoplay_set,
                        smartSpeed:_autoplay_speed,
                        animateOut: 'fadeOut',
                        animateIn: 'fadeIn',
                        navText:['<?php echo '<i class="'. $arrow_icon_prev.'"></i>' ;?>' ,'<?php echo '<i class="'. $arrow_icon_next.'"></i>' ;?>'],
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


                $('.slider-for-team.<?php echo $sectionid;?>').slick({
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  arrows: false,
                  fade: true,
                  asNavFor: '.slider-nav-team.<?php echo $sectionid;?>'
                });
                $('.slider-nav-team.<?php echo $sectionid;?>').slick({
                  slidesToShow: _showitem_set,
                  slidesToScroll: 1,
                  asNavFor: '.slider-for-team',
                  arrows:_arrows_set,
                  dots: false,
                  vertical: true,
                  centerMode: false,
                  focusOnSelect: true,
                  focusOnSelect: true,
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

Plugin::instance()->widgets_manager->register_widget_type( new FtageMentor_Elementor_Widget_Trailer() );

