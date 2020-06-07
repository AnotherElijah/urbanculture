<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ftage_Elementor_Widget_Banner extends Widget_Base {

    public function get_name() {
        return 'banner-addons';
    }
    
    public function get_title() {
        return __( 'Ftage : Banner', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-picture-o';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'banner_setting',
            [
                'label' => esc_html__( 'Banner Settings', 'ftagementor' ),
            ]
        );
        
            $this->add_control(
                'bannerstyle',
                [
                    'label' => esc_html__( 'Banner Style', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Style One', 'ftagementor' ),
                        '2' => esc_html__( 'Style Two', 'ftagementor' ),
                    ],
                ]
            );

            $this->add_control(
                'bannerimage',
                [
                    'label' => __( 'Banner image', 'ftagementor' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'bannerimagesize',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );

            $this->add_control(
                'bannerlink',
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
                'bannercontent',
                [
                    'label' => __( 'Banner content', 'ftagementor' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'placeholder' => __( 'Type your content here', 'ftagementor' ),
                    'condition' => [
                        'bannerstyle' => '1',
                    ]
                ]
            );

            $this->add_control(
                'bannertitle',
                [
                    'label' => __( 'Banner Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'rows' => 10,
                    'placeholder' => __( 'Type your content here', 'ftagementor' ),
                    'condition' => [
                        'bannerstyle' => '2',
                    ]
                ]
            );

            $this->add_control(
                'bannersubtitle',
                [
                    'label' => __( 'Banner sub title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'rows' => 10,
                    'placeholder' => __( 'Type your content here', 'ftagementor' ),
                    'condition' => [
                        'bannerstyle' => '2',
                    ]
                ]
            );

        $this->end_controls_section();


    }

    protected function render( $instance = [] ) {

        $settings       = $this->get_settings_for_display();
        $bannercontent  = $this->get_settings_for_display('bannercontent');
        $bannertitle    = $this->get_settings_for_display('bannertitle');
        $bannersubtitle = $this->get_settings_for_display('bannersubtitle');
        $bannerstyle    = $this->get_settings_for_display('bannerstyle');

        // Button Link
        $target = $settings['bannerlink']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['bannerlink']['nofollow'] ? ' rel="nofollow"' : '';

        ?>
            <?php if( $bannerstyle == 2 ): ?>
                <div class="banner">
                    <a href="<?php echo esc_url($settings['bannerlink']['url']) . $target . $nofollow; ?>">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'bannerimagesize', 'bannerimage' );?>
                    </a>
                    <div class="banner_content">
                        <?php
                            if( !empty($bannersubtitle) ){
                                echo '<span class="banner_price">'.esc_attr($bannersubtitle).'</span>';
                            }
                            if( !empty($bannertitle) ){
                                echo '<h3 class="banner_title">'.esc_attr($bannertitle).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            <?php else:?>
                <div class="banner product-banner-99">
                    <a href="<?php echo esc_url($settings['bannerlink']['url']) . $target . $nofollow; ?>">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'bannerimagesize', 'bannerimage' );?>
                    </a>
                    <div class="banner_content">
                        <?php if( !empty($bannercontent) ){ echo '<p>'.$bannercontent.'</p>'; } ?>
                    </div>
                </div>
            <?php endif;?>

        <?php

    }

    protected function content_template() {
        ?>
            
        <?php
    }

    public function render_plain_content( $instance = [] ) {}

}

Plugin::instance()->widgets_manager->register_widget_type( new Ftage_Elementor_Widget_Banner() );

