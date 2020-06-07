<?php
/**
* This partial is used for displaying the page title.
*
* @package ftagementor
*/
?>

<?php if ( is_home() ): ?>

	<?php get_template_part('/inc/page-header/blog-title'); ?>

<?php elseif( !is_front_page() && is_page() ): ?>
<?php

	$ftagementor_opt = ftagementor_get_opt();

	/** 
	* Enable Page Title
	*/
	$ftagementor_page_title_wrapper_enable = get_post_meta( get_the_id(), '_ftagementor_title_wrapper_enable', true ); 
	$ftagementor_theme_title_wrapper_enable = isset($ftagementor_opt['ftagementor_title_wrapper_enable']) ? $ftagementor_opt['ftagementor_title_wrapper_enable'] : '';

	/**
	* Load Page Title and Breadcrumb 
	*/
	if ( '' != $ftagementor_page_title_wrapper_enable ) {
		if ( 'yes' ==  $ftagementor_page_title_wrapper_enable ) {
			get_template_part('/inc/page-header/page-title');
		}
	} elseif ( '' != $ftagementor_theme_title_wrapper_enable ) {
		if ( 'yes' == $ftagementor_theme_title_wrapper_enable ) {
			get_template_part('/inc/page-header/page-title');
		}
	} else {
		get_template_part('/inc/page-header/page-title');
	}
?>

<?php elseif( is_archive() ): ?>

	<?php get_template_part('/inc/page-header/blog-title'); ?>

<?php elseif( is_single() ): ?>

	<?php get_template_part('/inc/page-header/single-post-title'); ?>
	
<?php elseif( is_404() ): ?>

	<!-- Page title and breadcrumb not loaded -->

<?php elseif( is_search() ): ?>

	<?php get_template_part('/inc/page-header/blog-title'); ?>

<?php else: ?>
	
<?php endif ?>