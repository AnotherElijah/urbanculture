<?php
/**
 * This partial is used for displaying the Blog page title.
 *
 * @package ftagementor
 */

$ftagementor_opt = ftagementor_get_opt();

if( $ftagementor_blog_title_position = isset($ftagementor_opt['ftagementor_blog_title_position']) ? $ftagementor_opt['ftagementor_blog_title_position'] : '' ) {
	$blog_title_classes[] = $ftagementor_blog_title_position;
} else {
	$blog_title_classes[] = 'text-center';
}

$ftagementor_blog_title_full_width = ( isset( $ftagementor_opt['ftagementor_blog_title_full_width'] ) ) ? $ftagementor_opt['ftagementor_blog_title_full_width'] : '' ;
if ( 'no' != $ftagementor_blog_title_full_width ) {
	$blog_title_wrap_container = 'container-fluid';
} else {
	$blog_title_wrap_container = 'container';
}
$enable_blog_title = ( isset( $ftagementor_opt['ftagementor_enable_blog_title'] ) ) ? $ftagementor_opt['ftagementor_enable_blog_title'] : '' ;
$enable_blog_subtitle = ( isset( $ftagementor_opt['ftagementor_enable_blog_subtitle'] ) ) ? $ftagementor_opt['ftagementor_enable_blog_subtitle'] : '' ;
$enable_blog_page_title_wrap = ( isset( $ftagementor_opt['ftagementor_blog_title_bar'] ) ) ? $ftagementor_opt['ftagementor_blog_title_bar'] : '' ;

?>

<?php if ( 'hide' != $enable_blog_page_title_wrap ): ?>
	
	<section class="page__title__wrapper blog-page <?php echo esc_attr(join( ' ', $blog_title_classes )) ?>">
		<div class="<?php echo esc_attr( $blog_title_wrap_container ); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="page__title__inner">
						<?php if ( 'no' != $enable_blog_title ): ?>
							<?php if (is_archive() || is_search()): ?>
								<h1 class="page-title"><?php wp_title(''); ?></h1>
							<?php else: ?>
								<h1 class="page-title"><?php ftagementor_blog_header(); ?></h1>
							<?php endif ?>

						<?php endif ?>
						
						<?php if ( 'no' != $enable_blog_subtitle ): ?>
							<?php if ( !empty( $ftagementor_opt['ftagementor_blog_subtitle'] ) ): ?>
								<p><?php echo esc_html( $ftagementor_opt['ftagementor_blog_subtitle'] ); ?></p>
							<?php endif ?>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif ?>