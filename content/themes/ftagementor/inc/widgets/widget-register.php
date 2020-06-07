<?php 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
 if(!function_exists('ftagementor_widgets_init')){
	function ftagementor_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Right Sidebar', 'ftagementor' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'ftagementor' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="sidebar-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Left Sidebar', 'ftagementor' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ftagementor' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="sidebar-title">',
			'after_title'   => '</h3>',
		) );

			register_sidebar( array(
				'name'          => esc_html__( 'Services Sidebar', 'ftagementor' ),
				'id'            => 'sidebar-3',
				'description'   => esc_html__( 'Add widgets here.', 'ftagementor' ),
				'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="sidebar-title">',
				'after_title'   => '</h3>',
			) );
		$ftagementor_opt = ftagementor_get_opt();
		if(isset( $ftagementor_opt['ftagementor_footer_layoutcolumns'] ) ){
			$footer_widget_column = $ftagementor_opt['ftagementor_footer_layoutcolumns'];
		}else{
			$footer_widget_column = 4;
		}
		for( $footer = 1; $footer <= $footer_widget_column; $footer++){
			register_sidebar( array(
				'name'          => 'Footer ' .$footer,
				'id'            => 'ftagementor-footer-' .$footer,
				'description'   => esc_html__( 'Add widgets here.', 'ftagementor' ),
				'before_widget' => '<div id="%1$s" class="footer-single widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="title">',
				'after_title'   => '</h5>',
			) );
		}
	}		 
}
add_action( 'widgets_init', 'ftagementor_widgets_init' );
	if ( class_exists( 'WooCommerce' ) ){
		register_sidebar( array(
			'name'          => esc_html__( 'WooCommerce Sidebar', 'ftagementor' ),
			'id'            => 'sidebar-category',
			'description'   => esc_html__( 'Add widgets here.', 'ftagementor' ),
			'before_widget' => '<div id="%1$s" class="sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		) );
	}