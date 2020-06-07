<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ftage_Elementor_Widget_Abt_Video extends Widget_Base {

    public function get_name() {
        return 'Video-addons';
    }
    
    public function get_title() {
        return __( 'Ftage : About Video', 'ftagementor' );
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
                    'default' =>'icofont icofont-play-alt-2',
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
                'ceo_name',
                [
                    'label' => __( 'CEO Name', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'MAKX AMEX', 'ftagementor' ),
                ]
            );

            $this->add_control(
                'ceo_designation',
                [
                    'label' => __( 'Designation', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'CEO - Ftage', 'ftagementor' ),
                ]
            );

            $this->add_control(
                'ceo_image',
                [
                    'label' => __( 'CEO Image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                       // 'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'abt_content',
                [
                    'label' => __( 'About Content', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'placeholder' => __( 'There are many variations of passages of Lorem Ipsum available, but in the majority have suffered alteration in some form or randomised wordst true.', 'ftagementor' ),
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


            $this->add_control(
                'video_overlay_color',
                [
                    'label' => __( 'Video Overlay Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'#000',
                    'selectors' => [
                        '{{WRAPPER}} .aboutus-video::before' => 'background: {{VALUE}};',
                    ],
                ]
            );


            $this->add_control(
                'content_color',
                [
                    'label' => __( 'Content Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .aboutus-bottom-txt > p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'abt_name',
                [
                    'label' => __( 'Name Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .person-txt h6' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'designation_color',
                [
                    'label' => __( 'Designation Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .person-txt > span' => 'color: {{VALUE}};',
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
                        '{{WRAPPER}} .popup-youtube' => 'color: {{VALUE}};',
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
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .popup-youtube:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );


        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $playiconty      = $this->get_settings_for_display('playiconty');
        $ceo_name       = $this->get_settings_for_display('ceo_name');
        $abt_content     = $this->get_settings_for_display('abt_content');
        $playicon        = $this->get_settings_for_display('playicon');
        $video_url        = $this->get_settings_for_display('videourl');
        $ceo_designation        = $this->get_settings_for_display('ceo_designation');
        $video_image  =   $settings['videothumimage']['url'];
        $ceo_image  =   $settings['ceo_image']['url'];
        $iconiamge  =   $settings['iconiamge']['url'];

        ?>
<div class="aboutus-area text-center">
    <div class="aboutus-video" style="background: rgba(0, 0, 0, 0) url(<?php echo $video_image; ?> ) no-repeat scroll center center/cover;">
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
        </div>
    </div>
    <div class="aboutus-bottom-txt">
        <?php 
            if( !empty($abt_content) ){
                echo '<p>'.$abt_content.'</p>';
            }

        ?>
        <div class="person-area">
            <?php if(!empty($ceo_image)) { ?>
            <div class="person-img">
                <img src="<?php echo $ceo_image; ?>" alt="" />
            </div>
            <?php }?>
            <div class="person-txt">
            <?php
                if( !empty($ceo_name) ){
                    echo '<h6>'.esc_attr($ceo_name).'</h6>';
                } 
                if( !empty($ceo_designation) ){
                    echo '<span>'.esc_attr($ceo_designation).'</span>';
                } 
            ?>
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

    public function render_plain_content( $instance = [] ) {}

}

Plugin::instance()->widgets_manager->register_widget_type( new Ftage_Elementor_Widget_Abt_Video() );