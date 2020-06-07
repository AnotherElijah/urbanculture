<?php
/**
 * Plugin Name: Ftage Core
 * Plugin URI: https://devitems.com
 * Description: After install the ftagementor WordPress Theme, you must need to install this "ftagementor Core Plugin" first to get all functions of ftagementor WP Theme.
 * Version: 1.0.0
 * Author: HasTech
 * Author URI: http://hastech.company
 * Text Domain: ftagementor
 * License: GPL/GNU.
 /*Copyright 2017 ftagementor(email:support@bootexperts.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
* Define
*/
define( 'PLG_URL', plugins_url('', __FILE__) );
define( 'PLG_DIR', dirname( __FILE__ ) ); 
define( 'FTAGEMENTOR_ADDONS_EL_PATH', plugin_dir_path( __FILE__ ) );

/**----------------------------------------------------------------*/
/* Include all file
/*-----------------------------------------------------------------*/  
include_once(PLG_DIR. '/include/ftagementor-custom-post.php');
include_once(PLG_DIR. '/include/ftagementor-custom-texanomy.php');
include_once(PLG_DIR. '/include/ftagementor-social-share.php');
include_once(PLG_DIR. '/shortcode-act.php');

include_once PLG_DIR . '/include/widgets/recent-post.php';
include_once PLG_DIR . '/include/widgets/newsletter.php';
include_once PLG_DIR . '/include/widgets/author-info.php';
include_once PLG_DIR . '/include/widgets/video-popup.php';
include_once PLG_DIR . '/include/widgets/single-banner.php';
include_once PLG_DIR . '/include/widgets/company-info-widget.php';
include_once PLG_DIR . '/include/widgets/social-subcribe-follow.php';

if ( in_array('woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
    include_once(PLG_DIR. '/include/ftagementor_custom_taxonomy_field.php');
}

//Elementor Custom Category
if ( in_array('elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
    function ftagementor_elementor_category ( $elements_manager ) {
        $elements_manager->add_category(
            'ftagementor',
            array(
                'title' => ' FTAGE',
                'icon'  => 'fonts',
            )
        );
    }
    add_action( 'elementor/elements/categories_registered', 'ftagementor_elementor_category' );
}

// Deregister scripts
function ftagementor_scripts_deresister(){
    // deregister essential addons slick
    wp_deregister_style('essential_addons_elementor-slick-css');
    wp_deregister_script('essential_addons_elementor-slick-js');

}
add_action( 'wp_enqueue_scripts', 'ftagementor_scripts_deresister' );

/**
 * Gallery Category
 * @return array
 */
function ftagementor_gallery_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'gallery_cat',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}

// Support Elementor Footer Header
function ftagementor_load_canvas_template( $single_template ) {

    global $post;

    if ( 'ftagementor_footer' == $post->post_type || 'ftagementor_header' == $post->post_type ) {

        $elementor_canvas_template = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

        if ( file_exists( $elementor_canvas_template ) ) {
            return $elementor_canvas_template;
        } else {
            return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
        }
    }

    return $single_template;
}

add_filter( 'single_template', 'ftagementor_load_canvas_template' );

// Portfolio Category
function ftagementor_portfolio_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'ftagem_portfolio_cat',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}
// Team Category
function ftagementor_team_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'team_cat',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}
// Blog Category
function ftagementor_blog_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}