<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class FtageMentor_Elementor_Widget_Abt_Video extends Widget_Base {

    public function get_name() {
        return 'Video-popup-addons';
    }
    
    public function get_title() {
        return __( 'Ftage : Video Popup', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-play-circle-o';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'abt-video-setting',
            [
                'label' => esc_html__( 'Video Settings', 'ftagementor' ),
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
                    'default' =>'fa fa-play-circle-o',
                    'condition' => [
                        'playiconty' => '1',
                    ]
                ]
            );

            $this->add_control(
                'videothumimage',
                [
                    'label' => __( 'Video background image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'videourl',
                [
                    'label' => __( 'Video url', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'https://www.youtube.com/watch?v=TLnmb07WQ-s', 'ftagementor' ),
                ]
            );
            $this->add_control(
                'video_title',
                [
                    'label' => __( 'Video Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'WATCH THE TRAILER', 'ftagementor' ),
                ]
            );

        $this->end_controls_section();


        // Style tab section
        $this->start_controls_section(
            'abt_video_style',
            [
                'label' => __( 'Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'video_popup_height',
                [
                    'label' => __( 'Video Height', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 2000,
                    'step' => 1,
                    'default' =>485,
                    'selectors' => [
                        '{{WRAPPER}} .aboutus-video' => 'height: {{VALUE}}px;',
                    ],
                ]
            );
            $this->add_control(
                'video_overlay_color',
                [
                    'label' => __( 'Video Overlay Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'rgba(0,0,0,0.0)',
                    'selectors' => [
                        '{{WRAPPER}} .aboutus-video::before' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'play_icon_color',
                [
                    'label' => __( 'Play Icon Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .ftagementor_popup-youtube' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'play_icon_font_size',
                [
                    'label' => __( 'Icon Font Size', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 200,
                    'step' => 1,
                    'default' => 50,
                    'selectors' => [
                        '{{WRAPPER}} .popup-youtube' => 'font-size: {{VALUE}}px;',
                    ],
                ]
            );            
            $this->add_responsive_control(
                'play_icon_width',
                [
                    'label' => __( 'Icon Width', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 200,
                    'step' => 1,
                    'default' => 50,
                    'selectors' => [
                        '{{WRAPPER}} .popup-youtube' => 'width: {{VALUE}}px;',
                    ],
                ]
            );
            $this->add_responsive_control(
                'play_icon_height',
                [
                    'label' => __( 'Icon Height', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 200,
                    'step' => 1,
                    'default' => 50,
                    'selectors' => [
                        '{{WRAPPER}} .popup-youtube' => 'height: {{VALUE}}px;',
                    ],
                ]
            );

            $this->add_control(
                'play_icon_color_hover',
                [
                    'label' => __( 'Play Icon Hover Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .ftagementor_popup-youtube:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'video_title_color',
                [
                    'label' => __( 'Video Title', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .video-content h4' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'video_title_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                    'selector' => '{{WRAPPER}} .video-content h4',
                ]
            );
            $this->add_responsive_control(
                'title_top_space',
                [
                    'label' => __( 'Title Top Space', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => '',
                    'max' => 200,
                    'step' => 1,
                    'default' => 82,
                    'selectors' => [
                        '{{WRAPPER}} .video-content h4' => 'margin-top: {{VALUE}}px;',
                    ],
                ]
            );            
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $playiconty      = $this->get_settings_for_display('playiconty');
        $playicon        = $this->get_settings_for_display('playicon');
        $video_url        = $this->get_settings_for_display('videourl');
        $video_title        = $this->get_settings_for_display('video_title');
        $video_image  =   $settings['videothumimage']['url'];
        $iconiamge  =   $settings['iconiamge']['url'];

        ?>
<div class="aboutus-area text-center">
    <div class="aboutus-video" style="background: rgba(0, 0, 0, 0) url(<?php echo $video_image; ?> ) no-repeat scroll;">
        <div class="video-content">
            <a href="<?php echo $video_url; ?>" class="popup-youtube">
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
            <?php if(!empty($video_title)){ 
                echo '<h4>'. $video_title.'</h4>';
         } ?>
        </div>
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

Plugin::instance()->widgets_manager->register_widget_type( new FtageMentor_Elementor_Widget_Abt_Video() );