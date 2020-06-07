<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ftage_Elementor_Widget_Section_Title extends Widget_Base {

    public function get_name() {
        return 'section-titel-addons';
    }
    
    public function get_title() {
        return __( 'Ftage: Section Title', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-header';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_title_txt',
            [
                'label' => esc_html__( 'Section Title', 'ftagementor' ),
            ]
        );
        
            $this->add_control(
                'titlestyle',
                [
                    'label' => esc_html__( 'Title Style', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Title', 'ftagementor' ),
                        '2' => esc_html__( 'Title With Border', 'ftagementor' ),
                        '3' => esc_html__( 'Title with Icon', 'ftagementor' ),
                        '4' => esc_html__( 'Title with Border long', 'ftagementor' ),
                        '5' => esc_html__( 'Title With First Border', 'ftagementor' ),
                        '6' => esc_html__( 'Title With Last Border', 'ftagementor' ),

                    ],
                ]
            );

            $this->add_control(
                'section_title_text',
                [
                    'label' => __( 'Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => 'Section Title',
                    'title' => __( 'Enter section title', 'ftagementor' ),
                ]
            );
            
            $this->add_control(
                'section_subtitle_text',
                [
                    'label' => __( 'Sub Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => 'It is a long established fact that a reader will be distracted readable',
                    'title' => __( 'Enter sub title', 'ftagementor' ),
                ]
            );

            $this->add_control(
                'item_icone_option',
                [
                    'label' => __( 'Icon Options', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                    'condition' => [
                        'titlestyle' => '3',
                    ]
                ]
            );

           $this->add_control(
                'link_icon_type',
                [
                    'label' => esc_html__( 'Select Icon Type', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'ftagementor' ),
                        'image' => esc_html__( 'Image', 'ftagementor' ),
                    ],
                    'condition' => [
                        'titlestyle' => '3',
                    ]                   
                ]
            );

            $this->add_control(
                'link_icon_iamge',
                [
                    'label' => __( 'Icon image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'titlestyle' => '3',
                        'link_icon_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'link_icon_font',
                [
                    'label' => __( 'Icon', 'ftagementor' ),
                    'type' => Controls_Manager::ICON,
                    'default' =>'icofont icofont-ui-movie',
                    'condition' => [
                        'titlestyle' => '3',
                        'link_icon_type' => 'icon',
                    ]
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'section_area_style',
            [
                'label' => __( 'Section style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'sectionmargin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-titel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'sectionpadding',
                [
                    'label' => __( 'Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-titel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'aligntitle',
                [
                    'label' => __( 'Alignment', 'ftagementor' ),
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
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .section-titel' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Style tab tite section
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Title style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'sectitle-heading',
                [
                    'label' => __( 'Title', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .section-titel h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'title_color_span',
                [
                    'label' => __( 'Title Color Text Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .section-titel h3 span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .section-titel h3',
                ]
            );

            $this->add_responsive_control(
                'titlenmargin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-titel h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'titlepadding',
                [
                    'label' => __( 'Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-titel h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'sectitle-heading_boreder_icon',
                [
                    'label' => __( 'Border & Icon Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'title_border',
                    'label' => __( 'Title Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .section-titel.dotborder h3::after,{{WRAPPER}} .title-style-three span:after,{{WRAPPER}} .title-style-three span:before,{{WRAPPER}} .title-style-four::after,{{WRAPPER}} .title-style-five h3 span:after',
                ]
            );
            $this->add_control(
                'border_icon_color',
                [
                    'label' => __( 'Icon Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .title-style-three span i' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'titlestyle' => '3',
                        'link_icon_type' => 'icon',
                    ]                    
                ]
            );   
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypograph_icon',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .title-style-three span i',
                    'condition' => [
                        'titlestyle' => '3',
                        'link_icon_type' => 'icon',
                    ] 
                ]
            );



        $this->end_controls_section();

        // Style tab sub title section
        $this->start_controls_section(
            'section_subtitle_style',
            [
                'label' => __( 'Sub title style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'subtitle-heading',
                [
                    'label' => __( 'Sub Title', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'subtitle_color',
                [
                    'label' => __( 'Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .section-titel p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'subtitletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .section-titel p',
                ]
            );

            $this->add_responsive_control(
                'subtitlemargin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-titel p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'subtitlepadding',
                [
                    'label' => __( 'Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-titel p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $titlestyle = $this->get_settings_for_display('titlestyle');
        $aligntitle = $this->get_settings_for_display('aligntitle');

        $title      = ! empty( $settings['section_title_text'] ) ? $settings['section_title_text'] : '';
        $subtitle   = ! empty( $settings['section_subtitle_text'] ) ? $settings['section_subtitle_text'] : '';

        $link_icon_type        = $this->get_settings_for_display('link_icon_type');
        $link_icon_font  =   $settings['link_icon_font'];
        $link_icon_iamge  =   $settings['link_icon_iamge']['url'];



        ?>
            <div class="section-titel <?php if( $titlestyle == 2){ echo 'dotborder'; }elseif($titlestyle == 3){echo 'title-style-three'; }elseif($titlestyle == 4){echo 'title-style-four'; }elseif($titlestyle == 5){echo 'title-style-five'; }elseif($titlestyle == 6){echo 'title-style-six'; }else{echo 'default-style'; } if( $aligntitle ==  'left'){ echo ' text-left'; }elseif($aligntitle ==  'right'){echo ' text-right'; }else{echo ' text-center'; } ?>">
                
                <?php
                        if(!empty($title)){
                            echo '<h3 class="section-titel-txt">'.$title.'</h3>';
                        }
                        

                        if( $titlestyle == 3 && !empty($link_icon_font)){
                            echo '<span><i class="'.esc_attr($link_icon_font).'"></i> </span>';
                        }


                    if( !empty($subtitle) ){
                         echo '<p>'.$subtitle.'</p>';
                    }
                ?>
            </div>

        <?php

    }

    protected function content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new Ftage_Elementor_Widget_Section_Title() );

