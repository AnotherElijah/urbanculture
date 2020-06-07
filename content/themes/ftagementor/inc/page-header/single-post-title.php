<?php
/**
* This partial is used for displaying the Blog page title.
*
* @package ftagementor
*/

$ftagementor_opt = ftagementor_get_opt();
/**
* Blog Details Title Position
*/
if( $ftagementor_blog_details_title_position = isset($ftagementor_opt['ftagementor_blog_details_title_position']) ? $ftagementor_opt['ftagementor_blog_details_title_position'] : '' ) {
	$single_post_title_classes[] = $ftagementor_blog_details_title_position;
} else {
	$single_post_title_classes[] = 'text-center';
}
/**
* Single Post Title Full Width 
*/
$ftagementor_single_post_title_full_width = ( isset( $ftagementor_opt['ftagementor_single_post_title_full_width'] ) ) ? $ftagementor_opt['ftagementor_single_post_title_full_width'] : '' ;

if ( 'no' != $ftagementor_single_post_title_full_width ) {
	$single_post_title_wrap_container = 'container-fluid';
} else {
	$single_post_title_wrap_container = 'container';
}

/** 
* Page -> Page Title Options
*/

$ftagementor_page_single_post_title_enable = get_post_meta( get_the_id(), '_ftagementor_title_enable', true );

/**
* Theme -> Page Title Options
*/
$ftagementor_enable_single_post_title = isset($ftagementor_opt['ftagementor_enable_single_post_title']) ? $ftagementor_opt['ftagementor_enable_single_post_title'] : '';

/**
* Title Enable
*/
if ( isset( $ftagementor_page_single_post_title_enable ) && '' != $ftagementor_page_single_post_title_enable ) {
	if ( 'yes' == $ftagementor_page_single_post_title_enable ) {
		$single_post_title_enable = 'true';
	} else {
		$single_post_title_enable = 'false';
	}
} elseif( isset( $ftagementor_enable_single_post_title ) ){
	if ( 'none' !==  $ftagementor_enable_single_post_title ) {
		$single_post_title_enable = 'true';
	} else {
		$single_post_title_enable = 'false';
	}
} else {
	$single_post_title_enable = 'true';
}

/**
* Custom Title
*/
$enable_single_post_subtitle = ( isset( $ftagementor_opt['ftagementor_enable_single_post_subtitle'] ) ) ? $ftagementor_opt['ftagementor_enable_single_post_subtitle'] : '' ;
$single_post_brad = ( isset( $ftagementor_opt['ftagementor_enable_single_post_breadcrumb_wrap'] ) ) ? $ftagementor_opt['ftagementor_enable_single_post_breadcrumb_wrap'] : '' ;
$enable_single_post_title_bar = ( isset( $ftagementor_opt['ftagementor_single_post_title_bar'] ) ) ? $ftagementor_opt['ftagementor_single_post_title_bar'] : '' ;
$ftagementor_page_title_enable = get_post_meta( get_the_id(), '_ftagementor_title_enable' ); // done
$ftagementor_page_custom_title = get_post_meta( get_the_id(), '_ftagementor_custom_title' );
$enable_single_post_title = ( isset( $ftagementor_opt['ftagementor_enable_single_post_title'] ) ) ? $ftagementor_opt['ftagementor_enable_single_post_title'] : '' ;

?>

<?php if ( 'hide' != $enable_single_post_title_bar ): ?>
	
	<section class="page__title__wrapper single-post <?php echo esc_attr(join( ' ', $single_post_title_classes )) ?>">
		<div class="<?php echo esc_attr( $single_post_title_wrap_container ); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="page__title__inner">
						<?php if ( 'false' != $single_post_title_enable ): ?> <!-- Start Enable Title -->
						<!-- Title -->
						<?php 
							if ( isset( $ftagementor_page_title_enable[0] ) ) {
								if ( 'yes' == $ftagementor_page_title_enable[0] ) {
									if ( isset( $ftagementor_page_custom_title[0] ) && !empty( $ftagementor_page_custom_title[0] ) ) {
										?> <h1 class="page-title"><?php echo esc_html( $ftagementor_page_custom_title[0] ); ?></h1> <?php
									}else{
										if ( 'custom' == $enable_single_post_title ) {
											ftagementor_blog_details_header();
										}elseif ( 'post_title' == $enable_single_post_title ) {
											?> <h1 class="page-title"><?php wp_title(''); ?></h1> <?php
										}elseif ( 'none' == $enable_single_post_title ) {
											// empty
										} else {
											ftagementor_blog_details_header();
										}
									}	
								} else {
									// empty
								}
							} elseif ( '' != $enable_single_post_title &&  'none' != $enable_single_post_title ) {
								if ( 'custom' == $enable_single_post_title ) {
									ftagementor_blog_details_header();
								} elseif ( 'post_title' == $enable_single_post_title ) {
									?> <h1 class="page-title"><?php wp_title(''); ?></h1> <?php
								} else {
									ftagementor_blog_details_header();
								}
								
							} else {
								ftagementor_blog_details_header();
							}
						?>
						<?php endif ?> <!-- End Enable Title -->
					
						<!-- Subtitle -->
						<?php if ( 'no' != $enable_single_post_subtitle ): ?>
							<?php if ( !empty( $ftagementor_opt['ftagementor_single_post_subtitle'] ) ): ?>
								<p><?php echo esc_html( $ftagementor_opt['ftagementor_single_post_subtitle'] ); ?></p>
							<?php endif ?>
						<?php endif ?>
						<!-- Breadcrumb Wrap -->
						<?php if ( '1' !== $single_post_brad ): ?>
							<div class="breadcrumbs_wrap breadcrumb-bottom">
								<?php 
									switch ( $single_post_brad ) {
										case '1':
											break;
										case '2':
											ftagementor_breadcrumbs();
											break;
										case '3':
											?>
											<!--- Breadcrumbs search start -->
											<div class="page-title-search-box">
												<form action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
													<input type="text" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'ftagementor' ); ?>"  name="s">
													<button type="submit"> <i class="fa fa-search"></i> </button>
												</form>
											</div>
											<!--- Breadcrumbs search end -->		
											<?php
											break;
										default:
											ftagementor_breadcrumbs();
											break;
									}
								?>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif ?>