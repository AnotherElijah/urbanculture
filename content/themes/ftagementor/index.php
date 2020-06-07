<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ftagementor
 */

$ftagementor_opt = ftagementor_get_opt();
$blog_layout = isset ( $ftagementor_opt['ftagementor_blog_layout'] ) ? $ftagementor_opt['ftagementor_blog_layout']  : 'right_sidebar' ;
$massonary = false;

	if(isset($_GET['layout'])){

		switch (htmlspecialchars($_GET['layout'])) {

			case 'single':
				$blog_layout = 'single';
				break;
			case 'twocolumn':
				$blog_layout = 'twocolumn';
				break;

			case 'threecolumn':
				$blog_layout = 'threecolumn';
				break;

			case 'left_sidebar':
				$blog_layout = 'left_sidebar';
				break;
			case 'right_sidebar':
				$blog_layout = 'right_sidebar';
				break;
			
			default:
				$blog_layout = 'right';
				break;
		}

}

switch ($blog_layout) {
	case 'single':
		$blog_wrapper_class = 'col-md-10 offset-md-1';
		break;
		
	case 'twocolumn':
		$blog_wrapper_class = 'col-lg-6 col-md-6 col-sm-6 grid-item';
		$massonary = true;
		break;

	case 'threecolumn':
		$blog_wrapper_class = 'col-lg-4 col-md-4 col-sm-6 grid-item';
		$massonary = true;
		break;
	case 'right':
		$blog_wrapper_class = 'col-lg-4 col-md-4 col-sm-6 grid-item';
		$massonary = true;
		break;
	
	default:
		$blog_wrapper_class = !is_active_sidebar('sidebar-1') ? 'col-lg-12' : 'col-lg-8 col-md-8';
		break;
}

get_header();

?>
<div class="page-wrapper clear">
	<div class="container">
		<div class="row clearfix <?php echo esc_attr($massonary ? 'blog-masonry' : ''); ?>">

		<?php if($blog_layout == 'left_sidebar' && is_active_sidebar( 'sidebar-1' )): ?>
			<div class="col-lg-4">
				<?php get_sidebar('left'); ?>
			</div>
		<?php endif; ?>

		<?php

		if($blog_layout == 'twocolumn' || $blog_layout == 'threecolumn'){

			// loop content with blog wrapper
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();

					echo '<div class="'. esc_attr( $blog_wrapper_class ) .'">';
					get_template_part( 'template-parts/content', get_post_type() );
					echo '</div>';

				endwhile; /* End Loop */
			endif;

			echo '<div class="col-md-12 grid-item">';
			ftagementor_blog_pagination();
			echo '</div>';

		} else {
			echo '<div class="'. esc_attr($blog_wrapper_class) .'">';

			// loop content only
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_type() );

				endwhile; /* End Loop */
			endif;

			ftagementor_blog_pagination();

			// blog wapper close
			echo '</div><!-- /.col-md-8 -->';
		}

 ?>
	 		<?php if($blog_layout == 'right_sidebar' && is_active_sidebar( 'sidebar-2' )): ?>
	 			<div class="col-lg-4">
	 				<?php get_sidebar('right'); ?>
	 			</div>
	 		<?php endif; ?>

		</div><!-- row -->
	</div><!-- container -->
</div><!--blog area -->

<?php
get_footer();