<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ftage_Elementor_Widget_Contactinfo extends Widget_Base {

    public function get_name() {
        return 'ftagementor-contact-info';
    }
    
    public function get_title() {
        return __( 'Ftage: Contact Info', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-list-ol';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'contact_info_setting',
            [
                'label' => esc_html__( 'Contact Info', 'ftagementor' ),
            ]
        );

        $this->add_control(
            'contact_sec_title',
            [
                'label' => __( 'Contact Section Title', 'ftagementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'title' => __( 'Enter section Title', 'ftagementor' ),
            ]
        );

        $repeater = new Repeater();
            
            $repeater->add_control(
                'cititle',
                [
                    'label' => __( 'Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'title' => __( 'Enter Contact Info title', 'ftagementor' ),
                ]
            );
            $repeater->add_control(
                'ciinformation',
                [
                    'label' => __( 'Contat Information', 'ftagementor' ),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => '',
                    'label_block' => 'true',
                    'title' => __( 'Enter Contact Info title', 'ftagementor' ),
                ]
            );

            $this->add_control(
                'contact_infos_list',
                [
                    'label' => __( 'Contact Info', 'elementor-pro' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'cititle' => __( 'Contact Info Title', 'ftagementor' ),
                            'ciinformation' => __( 'Contact Information.', 'ftagementor' ),
                        ],
                    ],
                    'title_field' => '{{{ cititle }}}',
                ]
            );
            
        $this->end_controls_section();
        // content tab

        // Style tab section
        $this->start_controls_section(
            'contact_info_style',
            [
                'label' => __( 'Style', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'contact_sectitle_heading',
                [
                    'label' => __( 'Section title', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'sectitle_color',
                [
                    'label' => __( 'Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .contact-info-wrap h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'sectitletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .contact-info-wrap h3',
                ]
            );

            $this->add_control(
                'contact_wrap_background',
                [
                    'label' => __( 'Contact Wrapper background', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_Group_Control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'ftagementor' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .contact-info-wrap',
                ]
            );

            $this->add_control(
                'contact_title_heading',
                [
                    'label' => __( 'Title', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#efefef',
                    'selectors' => [
                        '{{WRAPPER}} .contact-info li strong' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .contact-info li strong',
                ]
            );

            $this->add_control(
                'contact_info_heading',
                [
                    'label' => __( 'Contact Information', 'ftagementor' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'infotext_color',
                [
                    'label' => __( 'Color', 'ftagementor' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#efefef',
                    'selectors' => [
                        '{{WRAPPER}} .contact-info li' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .contact-info li span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'infotypography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .contact-info li',
                    'selector' => '{{WRAPPER}} .contact-info li span',
                ]
            );

        $this->end_controls_section();


    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();
        // Contact Info Option
        $contactsectitle = $settings['contact_sec_title'];

        ?>
            <div class="contact-info-wrap mb-50">
                <?php if( !empty($contactsectitle) ) { echo '<h3>'.esc_html__( $contactsectitle,'ftagementor' ).'</h3>'; } ?>
                <ul class="contact-info">
                    <?php foreach ( $settings['contact_infos_list'] as $item ) : ?>

                        <li>
                            <?php
                                if( !empty( $item['cititle'] ) ){ echo '<strong>'.$item['cititle'].'</strong>'; }
                                if( !empty( $item['ciinformation'] ) ){ echo $item['ciinformation']; }
                            ?>
                        </li>

                    <?php endforeach; ?>

                </ul>
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

Plugin::instance()->widgets_manager->register_widget_type( new Ftage_Elementor_Widget_Contactinfo() );