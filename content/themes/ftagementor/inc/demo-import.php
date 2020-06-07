<?php
function ftagementor_import_files() {
  return array(
    array(
      'import_file_name'           => 'Standard Demo',
      'local_import_file'            => get_template_directory() . '/inc/demo-content/default/all_content.xml',
      'local_import_widget_file'     => get_template_directory() . '/inc/demo-content/default/widgets.wie',
      'local_import_customizer_file' => get_template_directory() . '/inc/demo-content/default/ftagementor-export.dat',
                'local_import_redux'           => array(
                    array(
                      'file_path'   => trailingslashit( get_template_directory() ) . '/inc/demo-content/default/themeoption.json',
                      'option_name' => 'ftagementor_opt',
                    ),
                ),
                'import_preview_image_url'     => get_template_directory_uri() .'/screenshot.png',
                'import_notice'                => __( 'After you import this demo, you will have setup all content.', 'ftagementor' ),
        ),
    array(
      'import_file_name'             => 'CommingSoon',
      'local_import_file'            => get_template_directory() . '/inc/demo-content/default/all_content.xml',
      'import_widget_file_url'       => get_template_directory() . '/inc/demo-content/default/widgets.wie',
      'local_import_customizer_file' => get_template_directory() . '/inc/demo-content/default/ftagementor-export.dat',
      'local_import_customizer_file' => get_template_directory() . '/inc/demo-content/default/themeoption.json',
      
      ),
      'import_preview_image_url'     => get_template_directory_uri() .'/screenshot.png',
    );


////////////////////////////////////////////////////////////////////
 
}
add_filter( 'pt-ocdi/import_files', 'ftagementor_import_files' );

function ftagementor_after_import_setup() {
    // Assign menus to their locations.
    $header_menu = get_term_by( 'name', 'Header Menu', 'nav_menu' );
      set_theme_mod( 'nav_menu_locations' , array( 
        'primary' => $header_menu->term_id,
      ) 
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ftagementor_after_import_setup' );