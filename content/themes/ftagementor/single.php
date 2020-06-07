<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ftagementor
 */

get_header(); 

	$ftagementor_opt = ftagementor_get_opt();

	$ftagementor_blog_single = isset($ftagementor_opt['ftagementor_single_pos']) ? $ftagementor_opt['ftagementor_single_pos'] : 'right';

	$post_layout_value = get_post_meta(get_the_id(),'_ftagementor_post_layout',true);

	if( !empty( $post_layout_value ) ){
		$post_details_layout = $post_layout_value;
	}else{
		$post_details_layout = $ftagementor_blog_single;
	}
?>
<div class="page-wrapper blog-story-area clear">
	<div class="container">
		<div class="row">

			<?php if( $post_details_layout == 'full'){ ?>
			<!-- single blog full width start -->
			<div class="col-md-10 offset-md-1">
				<?php get_template_part('/template-parts/content-single'); ?>
			</div>
			<!--single blog full width end -->
			<?php }elseif( $post_details_layout == 'left'){ ?>
			<!-- single blog left sidebar start -->
			<div class="col-lg-4">
				<?php get_sidebar('left'); ?>
			</div>
			<div class="col-lg-8">
				<?php get_template_part('/template-parts/content-single'); ?>
			</div>
			<!-- single blog left sidebar end -->
			<?php }elseif($post_details_layout == 'right' && is_active_sidebar('sidebar-2')){ ?>
			<!-- single blog right sidebar start -->
			<div class="col-lg-8">
				<?php get_template_part('/template-parts/content-single'); ?>
			</div>
			<div class="col-lg-4">
				<?php get_sidebar('right'); ?>
			</div>
			<!-- single blog left sidebar end -->
			<?php }else{ ?>
			<!-- single blog right sidebar start -->
			<div class="col-lg-12 col-md-12">
				<?php get_template_part('/template-parts/content-single'); ?>
			</div>
			<?php }	?>

		</div>
	</div>
</div>
<?php
get_footer();