<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ftagementor_Elementor_Widget_Team extends Widget_Base {

    public function get_name() {
        return 'team-post';
    }
    
    public function get_title() {
        return __( 'Ftage : Team Post', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-user';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'team_setting',
            [
                'label' => esc_html__( 'Team', 'ftagementor' ),
            ]
        );
            $this->add_control(
                'item_show_ttie',
                [
                    'label' => __( 'Team Show Option', 'ftagementor' ),
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
                'ftagementor_item_categories',
                [
                    'label' => esc_html__( 'Select Item Category', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => ftagementor_team_categories(),
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
                    'default' => 1000,
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
                'itemmargin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                    'default' => 30,
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
                    'default' => 5,
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
                    'default' => 5,
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
                    'default' => 5,
                ]
            );
            $this->add_control(
                'content_show_title',
                [
                    'label' => __( 'Content Show Option', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            ); 
            $this->add_control(
                'show_name',
                [
                    'label' => esc_html__( 'Show/Hide Name', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'show_degination',
                [
                    'label' => esc_html__( 'Show/Hide Designation', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );            
            $this->add_control(
                'show_content',
                [
                    'label' => esc_html__( 'Show/Hide Content', 'ftagementor' ),
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
                    'condition' =>[

                        'show_content' =>'yes',
                    ]
                ]
            );
            $this->add_control(
                'socila_icon_show',
                [
                    'label' => esc_html__( 'Show/Hide Social Icon', 'ftagementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );



        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'section_title_style1s',
            [
                'label' => __( 'Content Style', 'elementor' ),
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
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .teamper-titel > h5' => 'color: {{VALUE}};',
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
                        '{{WRAPPER}} .teamper-titel > h5 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                    'selector' => '{{WRAPPER}} .teamper-titel > h5',
                ]
            );
            $this->add_responsive_control(
                'margin_title',
                [
                    'label' => __( 'Title Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .teamper-titel > h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'title_border',
                    'label' => __( 'Title Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .teamper-titel > h5::after',
                ]
            );
            // Designation  Style
            $this->add_control(
                'designation_color',
                [
                    'label' => __( 'Designation color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .teamper-titel > span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'designation_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .teamper-titel > span',
                ]
            );
            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Designation Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .teamper-titel > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
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
                        '{{WRAPPER}} .thumb-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    
                    'selector' => '{{WRAPPER}} .thumb-content p',
                ]
            );
            // Icon Style
            $this->add_control(
                'item_icon_heading',
                [
                    'label' => __( 'Social Icon Style', 'ftagementor' ),
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
                            'default' =>'#333',
                            'selectors' => [
                                '{{WRAPPER}} .team-social ul li a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_color',
                        [
                            'label' => __( 'Icon BG COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .team-social ul li a' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border',
                            'label' => __( 'Icon Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .team-social ul li a',
                        ]
                    ); 
                    $this->add_control(
                        'icon_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .team-social ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            'default' => 30,
                            'selectors' => [
                                '{{WRAPPER}} .team-social ul li a' => 'width: {{VALUE}}px;',
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
                            'default' => 30,
                            'selectors' => [
                                '{{WRAPPER}} .team-social ul li a' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                            'selector' => '{{WRAPPER}} .team-social ul li a',
                        ]
                    );

                    $this->add_control(
                        'item_icon_hover_heading',
                        [
                            'label' => __( 'Social Icon  Hover Color', 'ftagementor' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'item_link_hover_color',
                        [
                            'label' => __( 'Icon Hover COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .team-social ul li a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_hover_color',
                        [
                            'label' => __( 'Icon Hover BG COlor', 'ftagementor' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#555',
                            'selectors' => [
                                '{{WRAPPER}} .team-social ul li a:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_hover',
                            'label' => __( 'Icon Border', 'ftagementor' ),
                            'selector' => '{{WRAPPER}} .team-social ul li a:hover',
                        ]
                    ); 

        $this->end_controls_section();

        $this->start_controls_section(
            'item_box_style',
            [
                'label' => __( 'Box Style', 'elementor' ),
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
                    'label' => __( 'Overlay Hover Color', 'ftagementor' ),
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
                    'default'=>'#555',
                    'selectors' => [
                        '{{WRAPPER}} .slick-arrow, {{WRAPPER}} .slick-arrow::after' => 'color: {{VALUE}};',
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
                        '{{WRAPPER}} .slick-arrow:hover' => 'color: {{VALUE}};',
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
                        '{{WRAPPER}} .slick-arrow' => 'background: {{VALUE}};',
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
                        '{{WRAPPER}} .slick-arrow:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_button_border',
                    'label' => __( 'Button Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .slick-arrow',
                ]
            );
   
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $get_item_categories = $settings['ftagementor_item_categories'];
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $itemmargin = $settings['itemmargin'];


        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $columns = $this->get_settings_for_display('grid_column_number');
        $show_name = $this->get_settings_for_display('show_name');
        $show_degination = $this->get_settings_for_display('show_degination');
        $socila_icon_show = $this->get_settings_for_display('socila_icon_show');
        $show_content = $this->get_settings_for_display('show_content');

        $collumval = 'col-lg-3 col-sm-6';
        if( $columns !='' ){
            $colwidth = round(12/$columns);
            $collumval = 'col-lg-'.$colwidth.' col-sm-6';
        }

        ?>
        <?php

        $team_cats = str_replace(' ', '', $get_item_categories);

        if ( "0" != $get_item_categories) {
            if( is_array($team_cats) && count($team_cats) > 0 ){
                $field_name = is_numeric($team_cats[0])?'term_id':'slug';
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'team_cat',
                        'terms' => $team_cats,
                        'field' => $field_name,
                        'include_children' => false
                    )
                );
            }
        }

            $args = array(
                'post_type'            => 'teams',
                'post_status'          => 'publish',
                'ignore_sticky_posts'  => 1,
                'posts_per_page'       => $per_page,
                'team_cat' => $get_item_categories,
                'order'                => 'DESC',
            );

            ?>

        <div class="ourteam-area">  
            <div class="slider slider-for">
                <?php
                 $posts = new \WP_Query($args);
                while($posts->have_posts()):$posts->the_post();
                    /**
                    * Set Individual Column CSS
                    */
                    ?>                                                                          
                <!-- Team Single -->
                <div class="single-item">
                    <div class="large-img">
                        <?php if(has_post_thumbnail()){ ?>

                            <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?></a>
                        <?php } ?>
                    </div>
                    <div class="thumb-content">
                        <div class="thumb-personal-info">
                            <div class="teamper-titel">
                            <?php if( $show_name =='yes' ) { ?>
                                <h5>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title() ;?> </a>
                                </h5>

                                <?php } //end show title ?>
                                <?php if( $show_degination == 'yes' ) { ?>
                                <?php  $help_teamdeg  = get_post_meta( get_the_ID(),'_ftagementor_teamdeg', true );?>
                                
                                <?php 
                                if( !empty($help_teamdeg) ){?>
                                    <span>
                                        <?php echo esc_html( $help_teamdeg ); ?>
                                    </span>
                                <?php } ?>

                                <?php } // end degignation ?>
                            </div>


                            <?php if( $socila_icon_show == 'yes' ) { ?>
                            <div class="team-social">
                                <ul>
                                <?php   
                                $help_teamsicon  = get_post_meta( get_the_ID(),'_ftagementor_teamsicon', true );
                                foreach( (array) $help_teamsicon as $ticonskey => $ticons ){
                                    $ticons1 = $ticons2 ='';
                                    if ( isset( $ticons['_ftagementor_turl'] ) ) {
                                        $ticons1 =  $ticons['_ftagementor_turl']; 
                                    }
                                    if ( isset( $ticons['_ftagementor_ticon'] ) ) {
                                        $ticons2 =  $ticons['_ftagementor_ticon'];    
                                    }?>

                                    <li><a href="<?php echo $ticons1;?>"><i class="<?php echo $ticons2;?>"></i></a></li>
                                    <?php } ?>

                                    </ul>   
                            </div>
                                <?php } // end show social ?>

                            <?php 
                                if($show_content =='yes'){
                             echo '<p>'.wp_trim_words( get_the_content(), $contetnlength, '' ).'</p>';

                                }
                             ?>

                        </div>
                    </div>
                </div>
                <!-- Team Single end -->                                                
                <?php endwhile; // while have_posts ?>
            </div>

            <!--Thumb Area Start -->
            <div class="slider slider-nav">
                <?php while($posts->have_posts()) {
                        $posts->the_post() ;?>
                <div class="thumb-single">
                    <?php if(has_post_thumbnail()){ ?>
                        <?php the_post_thumbnail(); ?>
                        <?php } ?>
                </div>
                <?php }?>
            </div>
        </div>

        <script type="text/javascript">
            (function($){

                var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(1000); }; ?>;
                var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(5); }; ?>;
                var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(5); }; ?>;
                var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(5); }; ?>;
                var _itemmarginset = <?php if( isset($itemmargin) ){ echo esc_js($itemmargin); }else{ echo esc_js(30); }; ?>;

 
            /*------ Our Team Slick Slider ------*/
               $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
              });
              $('.slider-nav').slick({
                slidesToShow: _showitem_set,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                margin:_itemmarginset,
                dots: false,
                centerMode: true,
                arrows: _arrows_set,
                speed:_autoplay_speed,
                infinite:_autoplay_set,
                centerPadding: '0px',
                focusOnSelect: true,
                prevArrow: '<div class="slick-prev"><i class="icofont icofont-long-arrow-left" aria-hidden="true"></i></div>',
                  nextArrow: '<div class="slick-next"><i class="icofont icofont-long-arrow-right" aria-hidden="true"></i></div>',
                      responsive: [
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: _showitem_set,

                      }
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: _showitemtablet_set,
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: _showitemmobile_set,
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

Plugin::instance()->widgets_manager->register_widget_type( new Ftagementor_Elementor_Widget_Team() );

