<?php
/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('WPFilm_Settings_API_Options' ) ):
class WPFilm_Settings_API_Options {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WPFilm_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_submenu_page( 'wpfilm', 'WP Film Options', 'WP Film Options', 'manage_options', 'wp_film_options', array($this, 'wp_film_options_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'settings',
                'title' => __( 'Settings', 'wpfilm-studio' )
            ),
            array(
                'id'    => 'pro_themes',
                'title' => __( 'Pro Theme using this plugins.', 'wpfilm-studio' ),
            )
        );

        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'settings' => array(
                array(
                    'name'              => 'wpfilm_posts_per_page',
                    'label'             => __( 'Post Per Page', 'wpfilm-studio' ),
                    'desc'              => __( 'Text input description', 'wpfilm-studio' ),
                    'placeholder'       => __( 'Text Input placeholder', 'wpfilm-studio' ),
                    'type'              => 'number',
                    'default'           => '10',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name'              => 'wpfilm_posts_movie_name_title',
                    'label'             => __( 'Movie Name Title', 'wpfilm-studio' ),
                    'desc'              => __( 'Text input description', 'wpfilm-studio' ),
                    'placeholder'       => __( 'MOVIE NAME:', 'wpfilm-studio' ),
                    'type'              => 'text',
                    'default'           => 'MOVIE NAME:',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name'              => 'wpfilm_posts_trailer_name_title',
                    'label'             => __( 'Trailer Name Title', 'wpfilm-studio' ),
                    'desc'              => __( 'Text input description', 'wpfilm-studio' ),
                    'placeholder'       => __( 'Trailer NAME:', 'wpfilm-studio' ),
                    'type'              => 'text',
                    'default'           => 'TRAILER NAME:',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name'              => 'wpfilm_posts_related_title',
                    'label'             => __( 'Related Title', 'wpfilm-studio' ),
                    'desc'              => __( 'Text input description', 'wpfilm-studio' ),
                    'placeholder'       => __( 'Related Movies', 'wpfilm-studio' ),
                    'type'              => 'text',
                    'default'           => 'Related Movies',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name'    => 'wpfilm_relate_movie_show',
                    'label'   => __( 'Related Movie Show/Hide', 'wpfilm-studio' ),
                    'desc'    => __( 'Dropdown Options', 'wpfilm-studio' ),
                    'type'    => 'select',
                    'default' => 'yes',
                    'options' => array(
                        'yes' => 'Show',
                        'no'  => 'Hide'
                    )
                ),
                array(
                    'name'              => 'wpfilm_theme_color',
                    'label'             => __( 'Theme Color', 'wpfilm-studio' ),
                    'desc'              => __( 'Theme Color', 'wpfilm-studio' ),
                    'placeholder'       => __( '#e2a750', 'wpfilm-studio' ),
                    'type'              => 'color',
                    'default'           => '#e2a750',
                    'sanitize_callback' => 'sanitize_text_field'
                ),

            ),

        );

        return $settings_fields;
    }

    function wp_film_options_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();

        echo '<h2 class="nav-tab-wrapper"><a href="#settings" class="nav-tab" id="settings-tab">Settings</a><a href="#pro_themes" class="nav-tab nav-tab-active" id="pro_themes-tab">Pro Themes</a></h2>';

        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;

new WPFilm_Settings_API_Options();