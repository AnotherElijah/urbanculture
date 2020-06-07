<?php 

add_action( 'wp_enqueue_scripts', 'ftagementor_enqueue_styles' );
function ftagementor_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );