<?php

/*=======================================================
*    Register Custom Taxonomy
* =======================================================*/
if ( ! function_exists('ftagementor_custom_taxonomy') ) {
	function ftagementor_custom_taxonomy() {


//Service taxonomy 
		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'ftagementor' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'ftagementor' ),
			'menu_name'                  => __( 'Categories', 'ftagementor' ),
			'all_items'                  => __( 'All Items', 'ftagementor' ),
			'parent_item'                => __( 'Parent Item', 'ftagementor' ),
			'parent_item_colon'          => __( 'Parent Item:', 'ftagementor' ),
			'new_item_name'              => __( 'New Item Name', 'ftagementor' ),
			'add_new_item'               => __( 'Add New Item', 'ftagementor' ),
			'edit_item'                  => __( 'Edit Item', 'ftagementor' ),
			'update_item'                => __( 'Update Item', 'ftagementor' ),
			'view_item'                  => __( 'View Item', 'ftagementor' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'ftagementor' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'ftagementor' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'ftagementor' ),
			'popular_items'              => __( 'Popular Items', 'ftagementor' ),
			'search_items'               => __( 'Search Items', 'ftagementor' ),
			'not_found'                  => __( 'Not Found', 'ftagementor' ),
			'no_terms'                   => __( 'No items', 'ftagementor' ),
			'items_list'                 => __( 'Items list', 'ftagementor' ),
			'items_list_navigation'      => __( 'Items list navigation', 'ftagementor' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'service_cat', array( 'services' ), $args );

//Gallery taxonomy 
		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'ftagementor' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'ftagementor' ),
			'menu_name'                  => __( 'Categories', 'ftagementor' ),
			'all_items'                  => __( 'All Items', 'ftagementor' ),
			'parent_item'                => __( 'Parent Item', 'ftagementor' ),
			'parent_item_colon'          => __( 'Parent Item:', 'ftagementor' ),
			'new_item_name'              => __( 'New Item Name', 'ftagementor' ),
			'add_new_item'               => __( 'Add New Item', 'ftagementor' ),
			'edit_item'                  => __( 'Edit Item', 'ftagementor' ),
			'update_item'                => __( 'Update Item', 'ftagementor' ),
			'view_item'                  => __( 'View Item', 'ftagementor' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'ftagementor' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'ftagementor' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'ftagementor' ),
			'popular_items'              => __( 'Popular Items', 'ftagementor' ),
			'search_items'               => __( 'Search Items', 'ftagementor' ),
			'not_found'                  => __( 'Not Found', 'ftagementor' ),
			'no_terms'                   => __( 'No items', 'ftagementor' ),
			'items_list'                 => __( 'Items list', 'ftagementor' ),
			'items_list_navigation'      => __( 'Items list navigation', 'ftagementor' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'gallery_cat', array( 'gallery' ), $args );

//Portfolio taxonomy 
		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'ftagementor' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'ftagementor' ),
			'menu_name'                  => __( 'Categories', 'ftagementor' ),
			'all_items'                  => __( 'All Items', 'ftagementor' ),
			'parent_item'                => __( 'Parent Item', 'ftagementor' ),
			'parent_item_colon'          => __( 'Parent Item:', 'ftagementor' ),
			'new_item_name'              => __( 'New Item Name', 'ftagementor' ),
			'add_new_item'               => __( 'Add New Item', 'ftagementor' ),
			'edit_item'                  => __( 'Edit Item', 'ftagementor' ),
			'update_item'                => __( 'Update Item', 'ftagementor' ),
			'view_item'                  => __( 'View Item', 'ftagementor' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'ftagementor' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'ftagementor' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'ftagementor' ),
			'popular_items'              => __( 'Popular Items', 'ftagementor' ),
			'search_items'               => __( 'Search Items', 'ftagementor' ),
			'not_found'                  => __( 'Not Found', 'ftagementor' ),
			'no_terms'                   => __( 'No items', 'ftagementor' ),
			'items_list'                 => __( 'Items list', 'ftagementor' ),
			'items_list_navigation'      => __( 'Items list navigation', 'ftagementor' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'ftagem_portfolio_cat', array( 'ftagem_portfolio' ), $args );


        // taxonomy team    
		$labels = array(
			'name' => _x('Team Categories', 'ftagementor'),
			'singular_name' => _x('Team Category', 'ftagementor'),
			'search_items' => esc_html__('Search Category'),
			'all_items' => esc_html__('All Category'),
			'parent_item' => esc_html__('Parent Category'),
			'parent_item_colon' => esc_html__('Parent Category:'),
			'edit_item' => esc_html__('Edit Category'),
			'update_item' => esc_html__('Update Category'),
			'add_new_item' => esc_html__('Add New Category'),
			'new_item_name' => esc_html__('New Category Name'),
			'menu_name' => esc_html__('Team Category')
			);
		$args   = array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'team_cat'
				)
			);
        // Taxonomy Team
		register_taxonomy('team_cat', 'teams', $args);

	}
	add_action( 'init', 'ftagementor_custom_taxonomy');
}