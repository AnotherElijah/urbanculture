<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class FtageMentor_Elementor_Widget_counter extends Widget_Base {

    public function get_name() {
        return 'counter_box';
    }
    
    public function get_title() {
        return __( 'Ftage Counter Box', 'ftagementor' );
    }

    public function get_icon() {
        return 'fa fa-sort-numeric-desc';
    }
    public function get_categories() {
        return [ 'ftagementor' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'counter_title_content',
            [
                'label' => esc_html__( 'Counter Content', 'ftagementor' ),
            ]
        );
        $this->add_control(
            'counter_style',
            [
                'label' => __( 'Funfact Style', 'ftagementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => __( 'Style One', 'ftagementor' ),
                    'style2' => __( 'Style Two', 'ftagementor' ),
                ]
            ]
        );        	
		
            $this->add_control(
                'counter_title',
                [
                    'label' => __( 'Counter Title', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Counter Title',
                    'title' => __( 'Enter Counter Title', 'ftagementor' ),
                ]
            );
            
            
            $this->add_control(
                'counter_number',
                [
                    'label' => __( 'Counter Number', 'ftagementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => '300',
                    'title' => __( 'Counter Number', 'ftagementor' ),
                ]
            );
            $this->add_control(
                'counter_plus_icon',
                [
                    'label' => __( 'Counter + % text', 'ftagementor' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'title' => __( 'Enter Counter Icon', 'ftagementor' ),
                ]
            );
        $this->end_controls_section();

        

        // Style tab section
        $this->start_controls_section(
            'counter_title_style',
            [
                'label' => __( 'Counter Title', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
			$this->add_control(
				'Title_colorone',
				[
					'label' => __( 'Title color', 'ftagementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'default' => '#555',
					'selectors' => [
						'{{WRAPPER}} .project-count h3' => 'color: {{VALUE}};',
					],
				]
			);
		
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'title_spearator',
                    'label' => __( 'Separator Border', 'ftagementor' ),
                    'selector' => '{{WRAPPER}} .project-count span::after, {{WRAPPER}} .project-count.funfact2:after',
                ]
            ); 			
		
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .project-count h3',
				]
			);
			$this->add_responsive_control(
				'margin',
				[
					'label' => __( 'Title margin', 'ftagementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .project-count h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'padding',
				[
					'label' => __( 'Title Padding', 'ftagementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .project-count h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();	
        // Description Style in Title
        $this->start_controls_section(
            'counter_number_style',
            [
                'label' => __( 'Number', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		
		$this->add_control(
			'number_color',
			[
				'label' => __( 'Number color', 'ftagementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#555',
				'selectors' => [
					'{{WRAPPER}} .project-count span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .project-count span',
			]
		);
		$this->add_responsive_control(
			'number_align',
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
					'justify' => [
						'title' => __( 'Justified', 'ftagementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .project-count span' => 'text-align: {{VALUE}};',
				],
			]
        );
		$this->add_responsive_control(
			'margin_margin',
			[
				'label' => __( 'Number margin', 'ftagementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .project-count span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'desc_padding',
			[
				'label' => __( 'Number Padding', 'ftagementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .project-count span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();				
        // Style tab section
        $this->start_controls_section(
            'counter_box_style',
            [
                'label' => __( 'Counter Box', 'ftagementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
					'default' => 'center',
					'selectors' => [
						'{{WRAPPER}} .project-count' => 'text-align: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'box_bg_color',
				[
					'label' => __( 'Box BG Color', 'ftagementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'default' => 'rgba(0,0,0,0.0)',
					'selectors' => [
						'{{WRAPPER}} .project-count' => 'background-color: {{VALUE}};',
					],
				]
			);			        
		$this->end_controls_section();

        // Style tab title section end
		

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $counter_style = $settings['counter_style'];
        $title = !empty( $settings['counter_title'] ) ? $settings['counter_title'] : '';
        $number = !empty( $settings['counter_number'] ) ? $settings['counter_number'] : '';
        $counter_plus_icon = !empty( $settings['counter_plus_icon'] ) ? $settings['counter_plus_icon'] : '';
       
		
		?>

		<div class="project-single">
			<div class="project-count <?php if($counter_style == 'style2'){ echo 'funfact2'; }?> ">

				<?php  
					if($counter_style == 'style1'){

				if(!empty($number)): ?>
					<?php if($counter_plus_icon){ ?>
					<span><span class="counter"><?php echo esc_attr($number); ?></span><?php echo $counter_plus_icon ?></span>
				<?php }else{ ?>
					<span class="counter"><?php echo esc_attr($number); ?></span> 
				<?php } ?>
				<?php endif; ?>

			<?php if(!empty($title)): ?>
				<h3><?php echo esc_html($title); ?></h3>
			<?php endif; 

				}else{
				 if(!empty($title)): ?>
					<h3><?php echo esc_html($title); ?></h3>
				<?php endif; 

				if(!empty($number)): ?>
					<?php if($counter_plus_icon){ ?>
					<span><span class="counter"><?php echo esc_attr($number); ?></span><?php echo $counter_plus_icon ?></span>
				<?php }else{ ?>
					<span class="counter"><?php echo esc_attr($number); ?></span> 
				<?php } ?>
				     <?php endif; 
				} ?>
			
			</div>
		</div>
		
		<?php
	
    }

    protected function content_template() {}

    public function render_plain_content( $instance = [] ) {}

}

Plugin::instance()->widgets_manager->register_widget_type( new FtageMentor_Elementor_Widget_counter() );