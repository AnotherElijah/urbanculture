<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class FtageMentor_Elementor_Widget_Abt_Content extends Widget_Base {

    public function get_name() {
        return 'about-content-addons';
    }
    
    public function get_title() {
        return __( 'Ftage : About Content', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-file-image-o';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'abt-content-setting',
            [
                'label' => esc_html__( 'Content Settings', 'ftagementor' ),
            ]
        );

            $this->add_control(
                'about_layout',
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
                'content_title',
                [
                    'label' => __( 'About Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'placeholder' => __( 'WE ARE PROUD', 'ftagementor' ),
                ]
            );      
            $this->add_control(
                'abt_content',
                [
                    'label' => __( 'About Content', 'ftagementor' ),
                    'type' => Controls_Manager::WYSIWYG,
                    'rows' => 10,
                    'placeholder' => __( 'There are many variations of passages of Lorem Ipsum available, but in the majority have suffered alteration in some form or randomised wordst true.', 'ftagementor' ),
                ]
            );              
            $this->add_control(
                'about_image',
                [
                    'label' => __( 'About Image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'about_bg_image',
                [
                    'label' => __( 'About BG image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );
             $this->add_control(
                'abt_link_btn_text',
                [
                    'label' => __( 'Button Text', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'title' => __( 'Enter button text', 'ftagementor' ),
                ]
            );

             $this->add_control(
                'abt_link_btn',
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
                'content_title_color',
                [
                    'label' => __( 'Title Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .section-titel-contact h3,{{WRAPPER}} .about-actor-left > h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'content_title_color_text',
                [
                    'label' => __( 'Title Color Text Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#e2a750',
                    'selectors' => [
                        '{{WRAPPER}} .section-titel-contact h3 span,{{WRAPPER}} .about-actor-left > h3 span' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'title_border',
                    'label' => __( 'Title Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .section-titel-contact h3::after',
                ]
            );            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .section-titel-contact h3,,{{WRAPPER}} .about-actor-left > h3',
                ]
            );            
            $this->add_responsive_control(
                'abt_title_margin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-titel-contact h3,,{{WRAPPER}} .about-actor-left > h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .section-titel-contact p,{{WRAPPER}} .about-actor-left > p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .section-titel-contact p,{{WRAPPER}} .about-actor-left > p',
                ]
            );
            $this->add_control(
                'abt_button_heading',
                [
                    'label' => __( 'Button Style', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );            
             $this->add_control(
                'abt_btn_color',
                [
                    'label' => __( 'Button Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .button-horizental > a' => 'color: {{VALUE}};',
                    ],
                ]
            );           
             $this->add_control(
                'abt_btn_color_bg',
                [
                    'label' => __( 'Button BG Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => 'rgba(0,0,0,0)',
                    'selectors' => [
                        '{{WRAPPER}} .button-horizental > a' => 'background: {{VALUE}};',
                    ],
                ]
            );
              
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'abt_border',
                    'label' => __( 'Button Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .button-horizental a',
                ]
            );                        
             $this->add_control(
                'abt_btn_color_hover',
                [
                    'label' => __( 'Button Hover', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .button-horizental > a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
             $this->add_control(
                'abt_btn_color_bg_hover',
                [
                    'label' => __( 'Button BG Hover Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => 'rgba(0,0,0,0)',
                    'selectors' => [
                        '{{WRAPPER}} .button-horizental > a:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );              
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'abt_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .button-horizental > a',
                ]
            );             
            $this->add_responsive_control(
                'abt_btn_padding',
                [
                    'label' => __( 'Padding', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .button-horizental > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );                           
            $this->add_responsive_control(
                'abt_btn_margin',
                [
                    'label' => __( 'Margin', 'ftagementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .button-horizental > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );              
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'abt_border_line',
                    'label' => __( 'Button Border Line', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .button-horizental a::after',
                ]
            );

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $content_title       = $this->get_settings_for_display('content_title');
        $abt_content     = $this->get_settings_for_display('abt_content');
        $about_image  =   $settings['about_image']['url'];
        $about_bg_image  =   $settings['about_bg_image']['url'];
        $about_layout     = $this->get_settings_for_display('about_layout');
        $about_layout     = $this->get_settings_for_display('about_layout');

        $target = $settings['abt_link_btn']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['abt_link_btn']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
        <div class="about-area">
            <div class="row">
                <?php if( $about_layout == 1 ){ ?>
                <!-- Section Titel -->
                <div class="col-md-6">
                    <div class="section-titel-contact text-left">
                        <?php
                            if( !empty($content_title) ){
                                echo '<h3>'. $content_title.'</h3>';
                            } 
                            if( !empty($abt_content) ){
                                echo '<p>'.$abt_content.'</p>';
                            } 
                        ?>
                    </div>
                </div>
                <!-- Section Titel -->
                <?php if( !empty($about_image) ){ ?>
                <div class="col-md-6">
                    <div class="abt-sm-img">
                        <img src="<?php echo $about_image; ?>" alt="" />
                    </div>
                </div>
                <?php }  if( !empty($about_bg_image) ){?>
                <div class="col-md-10">
                    <div class="abt-lrg-img">
                        <img src="<?php echo $about_bg_image; ?>" alt="" />
                    </div>
                </div>
                <?php } }else{ ?>

                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="about-actor-left">
                            <?php
                                if( !empty($content_title) ){
                                    echo '<h3>'. $content_title.'</h3>';
                                } 
                                if( !empty($abt_content) ){
                                    echo '<p>'.$abt_content.'</p>';
                                } 
                            ?>
                            <?php
                            if(!empty($settings['abt_link_btn_text'])){
                            echo'<div class="button-horizental">';
                            if( !empty($settings['abt_link_btn']) ){
                                echo '<a  href="' . esc_url($settings['abt_link_btn']['url']) . '"' . $target . $nofollow . '> '.esc_attr($settings['abt_link_btn_text']).'</a>';
                            }
                            echo'</div>';
                            } ?>
                        </div>
                    </div>
                    <?php if( !empty($about_image) ){ ?>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="actor-about-image">
                            <img src="<?php echo $about_image; ?>" alt="" />
                        </div>
                    </div>
                    <?php } ?>
                        
                <?php } ?>
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

Plugin::instance()->widgets_manager->register_widget_type( new FtageMentor_Elementor_Widget_Abt_Content() );