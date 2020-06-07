<?php

/*=======================================================
*    Register Post type
* =======================================================*/

if( !function_exists('ftagementor_custom_post_register') ){

	function ftagementor_custom_post_register(){

		// Register Header
		$labels = array(
			'name'                  => _x( 'Headers', 'Post Type General Name', 'ftagementor' ),
			'singular_name'         => _x( 'Header', 'Post Type Singular Name', 'ftagementor' ),
			'menu_name'             => esc_html__( 'Header', 'ftagementor' ),
			'name_admin_bar'        => esc_html__( 'Header', 'ftagementor' ),
			'archives'              => esc_html__( 'Item Archives', 'ftagementor' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'ftagementor' ),
			'all_items'             => esc_html__( 'All Items', 'ftagementor' ),
			'add_new_item'          => esc_html__( 'Add New Item', 'ftagementor' ),
			'add_new'               => esc_html__( 'Add New', 'ftagementor' ),
			'new_item'              => esc_html__( 'New Item', 'ftagementor' ),
			'edit_item'             => esc_html__( 'Edit Item', 'ftagementor' ),
			'update_item'           => esc_html__( 'Update Item', 'ftagementor' ),
			'view_item'             => esc_html__( 'View Item', 'ftagementor' ),
			'search_items'          => esc_html__( 'Search Item', 'ftagementor' ),
			'not_found'             => esc_html__( 'Not found', 'ftagementor' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'ftagementor' ),
			'featured_image'        => esc_html__( 'Featured Image', 'ftagementor' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'ftagementor' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'ftagementor' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'ftagementor' ),
			'insert_into_item'      => esc_html__( 'Insert into item', 'ftagementor' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'ftagementor' ),
			'items_list'            => esc_html__( 'Items list', 'ftagementor' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'ftagementor' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'ftagementor' ),
		);
		$args = array(
			'label'                 => esc_html__( 'Header', 'ftagementor' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'elementor' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-archive',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'ftagementor_header', $args );

		// Register Footer
		$labels = array(
			'name'                  => _x( 'Footers', 'Post Type General Name', 'ftagementor' ),
			'singular_name'         => _x( 'Footer', 'Post Type Singular Name', 'ftagementor' ),
			'menu_name'             => esc_html__( 'Footer', 'ftagementor' ),
			'name_admin_bar'        => esc_html__( 'Footer', 'ftagementor' ),
			'archives'              => esc_html__( 'Item Archives', 'ftagementor' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'ftagementor' ),
			'all_items'             => esc_html__( 'All Items', 'ftagementor' ),
			'add_new_item'          => esc_html__( 'Add New Item', 'ftagementor' ),
			'add_new'               => esc_html__( 'Add New', 'ftagementor' ),
			'new_item'              => esc_html__( 'New Item', 'ftagementor' ),
			'edit_item'             => esc_html__( 'Edit Item', 'ftagementor' ),
			'update_item'           => esc_html__( 'Update Item', 'ftagementor' ),
			'view_item'             => esc_html__( 'View Item', 'ftagementor' ),
			'search_items'          => esc_html__( 'Search Item', 'ftagementor' ),
			'not_found'             => esc_html__( 'Not found', 'ftagementor' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'ftagementor' ),
			'featured_image'        => esc_html__( 'Featured Image', 'ftagementor' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'ftagementor' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'ftagementor' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'ftagementor' ),
			'insert_into_item'      => esc_html__( 'Insert into item', 'ftagementor' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'ftagementor' ),
			'items_list'            => esc_html__( 'Items list', 'ftagementor' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'ftagementor' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'ftagementor' ),
		);
		$args = array(
			'label'                 => esc_html__( 'Footer', 'ftagementor' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'elementor' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-editor-kitchensink',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'ftagementor_footer', $args );



	}
	add_action( 'init', 'ftagementor_custom_post_register', 0 );

}



if ( ! function_exists('ftagementor_service_post') ) {
	function ftagementor_service_post() {
		
		// Services
		$labels = array(
			'name'                  => _x( 'Services', 'Post Type General Name', 'ftagementor' ),
			'singular_name'         => _x( 'Services', 'Post Type Singular Name', 'ftagementor' ),
			'menu_name'             => __( 'Services', 'ftagementor' ),
			'name_admin_bar'        => __( 'Services', 'ftagementor' ),
			'archives'              => __( 'Item Archives', 'ftagementor' ),
			'parent_item_colon'     => __( 'Parent Item:', 'ftagementor' ),
			'all_items'             => __( 'All Items', 'ftagementor' ),
			'add_new_item'          => __( 'Add New Item', 'ftagementor' ),
			'add_new'               => __( 'Add New', 'ftagementor' ),
			'new_item'              => __( 'New Item', 'ftagementor' ),
			'edit_item'             => __( 'Edit Item', 'ftagementor' ),
			'update_item'           => __( 'Update Item', 'ftagementor' ),
			'view_item'             => __( 'View Item', 'ftagementor' ),
			'search_items'          => __( 'Search Item', 'ftagementor' ),
			'not_found'             => __( 'Not found', 'ftagementor' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'ftagementor' ),
			'featured_image'        => __( 'Featured Image', 'ftagementor' ),
			'set_featured_image'    => __( 'Set featured image', 'ftagementor' ),
			'remove_featured_image' => __( 'Remove featured image', 'ftagementor' ),
			'use_featured_image'    => __( 'Use as featured image', 'ftagementor' ),
			'insert_into_item'      => __( 'Insert into item', 'ftagementor' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'ftagementor' ),
			'items_list'            => __( 'Items list', 'ftagementor' ),
			'items_list_navigation' => __( 'Items list navigation', 'ftagementor' ),
			'filter_items_list'     => __( 'Filter items list', 'ftagementor' ),
		);
		$args = array(
			'label'                 => __( 'Services', 'ftagementor' ),
			'labels'                => $labels,
			'supports'              => array('title','editor', 'thumbnail', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-desktop',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'services', $args );
		
	}
	add_action( 'init', 'ftagementor_service_post');
}

// Gallery
if ( ! function_exists('ftagementor_gallery_post') ) {
	function ftagementor_gallery_post() {
		
		// Gallery
		$labels = array(
			'name'                  => _x( 'Gallery', 'Post Type General Name', 'ftagementor' ),
			'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'ftagementor' ),
			'menu_name'             => __( 'Gallery', 'ftagementor' ),
			'name_admin_bar'        => __( 'Gallery', 'ftagementor' ),
			'archives'              => __( 'Item Archives', 'ftagementor' ),
			'parent_item_colon'     => __( 'Parent Item:', 'ftagementor' ),
			'all_items'             => __( 'All Items', 'ftagementor' ),
			'add_new_item'          => __( 'Add New Item', 'ftagementor' ),
			'add_new'               => __( 'Add New', 'ftagementor' ),
			'new_item'              => __( 'New Item', 'ftagementor' ),
			'edit_item'             => __( 'Edit Item', 'ftagementor' ),
			'update_item'           => __( 'Update Item', 'ftagementor' ),
			'view_item'             => __( 'View Item', 'ftagementor' ),
			'search_items'          => __( 'Search Item', 'ftagementor' ),
			'not_found'             => __( 'Not found', 'ftagementor' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'ftagementor' ),
			'featured_image'        => __( 'Gallery Image', 'ftagementor' ),
			'set_featured_image'    => __( 'Set featured image', 'ftagementor' ),
			'remove_featured_image' => __( 'Remove featured image', 'ftagementor' ),
			'use_featured_image'    => __( 'Use as featured image', 'ftagementor' ),
			'insert_into_item'      => __( 'Insert into item', 'ftagementor' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'ftagementor' ),
			'items_list'            => __( 'Items list', 'ftagementor' ),
			'items_list_navigation' => __( 'Items list navigation', 'ftagementor' ),
			'filter_items_list'     => __( 'Filter items list', 'ftagementor' ),
		);
		$args = array(
			'label'                 => __( 'Gallery', 'ftagementor' ),
			'labels'                => $labels,
			'supports'              => array('title', 'thumbnail', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-format-gallery',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'gallery', $args );
		
	}
	add_action( 'init', 'ftagementor_gallery_post');
}
// Portfolio
if ( ! function_exists('ftagementor_portfolio_post') ) {
	function ftagementor_portfolio_post() {
		
		// Portfolio
		$labels = array(
			'name'                  => _x( 'Portfolio', 'Post Type General Name', 'ftagementor' ),
			'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'ftagementor' ),
			'menu_name'             => __( 'Portfolio', 'ftagementor' ),
			'name_admin_bar'        => __( 'Portfolio', 'ftagementor' ),
			'archives'              => __( 'Item Archives', 'ftagementor' ),
			'parent_item_colon'     => __( 'Parent Item:', 'ftagementor' ),
			'all_items'             => __( 'All Items', 'ftagementor' ),
			'add_new_item'          => __( 'Add New Item', 'ftagementor' ),
			'add_new'               => __( 'Add New', 'ftagementor' ),
			'new_item'              => __( 'New Item', 'ftagementor' ),
			'edit_item'             => __( 'Edit Item', 'ftagementor' ),
			'update_item'           => __( 'Update Item', 'ftagementor' ),
			'view_item'             => __( 'View Item', 'ftagementor' ),
			'search_items'          => __( 'Search Item', 'ftagementor' ),
			'not_found'             => __( 'Not found', 'ftagementor' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'ftagementor' ),
			'featured_image'        => __( 'Portfolio Image', 'ftagementor' ),
			'set_featured_image'    => __( 'Set featured image', 'ftagementor' ),
			'remove_featured_image' => __( 'Remove featured image', 'ftagementor' ),
			'use_featured_image'    => __( 'Use as featured image', 'ftagementor' ),
			'insert_into_item'      => __( 'Insert into item', 'ftagementor' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'ftagementor' ),
			'items_list'            => __( 'Items list', 'ftagementor' ),
			'items_list_navigation' => __( 'Items list navigation', 'ftagementor' ),
			'filter_items_list'     => __( 'Filter items list', 'ftagementor' ),
		);
		$args = array(
			'label'                 => __( 'Portfolio', 'ftagementor' ),
			'labels'                => $labels,
			'supports'              => array('title','editor','thumbnail', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-format-gallery',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'ftagem_portfolio', $args );
		
	}
	add_action( 'init', 'ftagementor_portfolio_post');








/*------------------------------------
Team post type
------------------------------------*/
if (!post_type_exists('teams')) {
	function ftagementor_team_post_type()
	{
		$labels = array(
			'name' => _x('Team', 'ftagementor'),
			'singular_name' => _x('Team', 'ftagementor'),
			'menu_name' => _x('Team', 'ftagementor'),
			'name_admin_bar' => _x('Team', 'ftagementor'),
			'add_new' => _x('Add New Team Member', 'ftagementor'),
			'add_new_item' => esc_html__('Team Member Name', 'ftagementor'),
			'new_item' => esc_html__('New Team', 'ftagementor'),
			'edit_item' => esc_html__('Edit Team', 'ftagementor'),
			'view_item' => esc_html__('View Team', 'ftagementor'),
			'all_items' => esc_html__('All Team', 'ftagementor'),
			'search_items' => esc_html__('Search Team', 'ftagementor'),
			'parent_item_colon' => esc_html__('Parent Team:', 'ftagementor'),
			'not_found' => esc_html__('No Team found.', 'ftagementor'),
			'not_found_in_trash' => esc_html__('No Team found in Trash.', 'ftagementor'),
			'featured_image'        => __( 'Team Image', 'ftagementor' ),			
			);
		$args   = array(
			'labels' => $labels,
			'description' => esc_html__('Description.', 'ftagementor'),
			'public' => true,
			'menu_icon' => 'dashicons-groups',
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'teams'
				),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
				)
			);
		register_post_type('teams', $args);

	}
} // END if
add_action('init', 'ftagementor_team_post_type');















}


