<?php
/**
* This partial is used for displaying the Page Title
*
* @package ftagementor
*/

$ftagementor_opt = ftagementor_get_opt();

/** 
* Page -> Page Title Options
*/
$ftagementor_page_title_enable = get_post_meta( get_the_id(), '_ftagementor_title_enable', true ); // done
$ftagementor_page_custom_title = get_post_meta( get_the_id(), '_ftagementor_custom_title' ); // done
$ftagementor_page_title_typography = get_post_meta( get_the_id(), '_ftagementor_title_typography' );
$ftagementor_page_sub_title_enable = get_post_meta( get_the_id(), '_ftagementor_sub_title_enable' );
$ftagementor_page_custom_sub_title = get_post_meta( get_the_id(), '_ftagementor_custom_sub_title' );
$ftagementor_page_sub_title_typography = get_post_meta( get_the_id(), '_ftagementor_sub_title_typography' );

/** 
* Page -> Breadcrumbs Options
*/
$ftagementor_page_breadcrumbs_enable = get_post_meta( get_the_id(), '_ftagementor_breadcrumbs_enable' );
$ftagementor_page_breadcrumbs_enable_on_phone = get_post_meta( get_the_id(), '_ftagementor_breadcrumbs_enable_on_phone' );
$ftagementor_page_breadcrumbs_separator = get_post_meta( get_the_id(), '_ftagementor_breadcrumbs_separator' );
$ftagementor_page_breadcrumbs_typography = get_post_meta( get_the_id(), '_ftagementor_breadcrumbs_typography' );

/**
* Theme -> Page Title Options
*/
$ftagementor_theme_title_wrapper_enable = isset($ftagementor_opt['ftagementor_title_enable']) ? $ftagementor_opt['ftagementor_title_enable'] : '';
$ftagementor_theme_title_typography = isset($ftagementor_opt['ftagementor_title_typography']) ? $ftagementor_opt['ftagementor_title_typography'] : '';
$ftagementor_theme_sub_title_enable = isset($ftagementor_opt['ftagementor_sub_title_enable']) ? $ftagementor_opt['ftagementor_sub_title_enable'] : '';
$ftagementor_theme_custom_sub_title = isset($ftagementor_opt['ftagementor_custom_sub_title']) ? $ftagementor_opt['ftagementor_custom_sub_title'] : '';
$ftagementor_theme_sub_title_typography = isset($ftagementor_opt['ftagementor_sub_title_typography']) ? $ftagementor_opt['ftagementor_sub_title_typography'] : '';

/**
* Theme -> Breadcrumbs Options
*/
if ( $content_position = get_post_meta( get_the_id(), '_ftagementor_title_wrapper_content_aligment', true ) ) {
	if ( 'text-default' != $content_position ) {
		$page_title_classes[] = $content_position;
	} else {
		$page_title_classes[] = $ftagementor_opt['ftagementor_title_content_alignment'];
	}
	
} else {
	if( $ftagementor_theme_title_content_alignment = isset($ftagementor_opt['ftagementor_title_content_alignment']) ? $ftagementor_opt['ftagementor_title_content_alignment'] : '' ) {
		$page_title_classes[] = isset($ftagementor_theme_title_content_alignment) ? $ftagementor_theme_title_content_alignment : '';
	} else {
		$page_title_classes[] = 'text-center';
	}

}


$twf_enable = 'container';
if ( !empty( get_post_meta( get_the_id(), '_ftagementor_title_wrapper_full_width', true ) ) && 'default' !== get_post_meta( get_the_id(), '_ftagementor_title_wrapper_full_width', true ) ) {
	if ( 'yes' == get_post_meta( get_the_id(), '_ftagementor_title_wrapper_full_width', true ) ) {
		$twf_enable = 'container-fluid';
	} else {
		$twf_enable = 'container';
	}
} else {
	if ( isset( $ftagementor_opt['ftagementor_title_wrap_fullwidth_enable'] ) && true == $ftagementor_opt['ftagementor_title_wrap_fullwidth_enable'] ) {
		$twf_enable = 'container-fluid';
	} else {
		$twf_enable = 'container';
	}
	
}

$page_brad = ( isset( $ftagementor_opt['ftagementor_breadcrumbs_content_blog'] ) ) ? $ftagementor_opt['ftagementor_breadcrumbs_content_blog'] : '' ;

/**
* Title Enable
*/
if ( isset( $ftagementor_page_title_enable ) && '' != $ftagementor_page_title_enable ) {
 if ( 'yes' == $ftagementor_page_title_enable ) {
  $title_enable = 'true';
 } else {
  $title_enable = 'false';
 }
} elseif( '' != $ftagementor_theme_title_wrapper_enable ){
 if ( 'yes' ==  $ftagementor_theme_title_wrapper_enable ) {
  $title_enable = 'true';
 } else {
  $title_enable = 'false';
 }
} else {
 $title_enable = 'true';
}

/**
* Custom Title
*/
$custom_title = '';
if ( isset( $ftagementor_page_custom_title ) && !empty( $ftagementor_page_custom_title ) ) {
	$custom_title = $ftagementor_page_custom_title[0];
} elseif ( isset( $ftagementor_opt['ftagementor_custom_title'] ) && !empty( $ftagementor_opt['ftagementor_custom_title'] ) ) {
 	$custom_title = $ftagementor_opt['ftagementor_custom_title'];
}
/**
* Enable Sub Title 
*/
if ( !empty( $ftagementor_page_sub_title_enable ) && '' != $ftagementor_page_sub_title_enable[0] ) {
	if ( 'yes' == $ftagementor_page_sub_title_enable[0] ) {
		$sub_title_enable = 'true';
	} else {
		$sub_title_enable = 'false';
	}
} elseif( isset( $ftagementor_theme_sub_title_enable ) ){
	if ( 'yes' ==  $ftagementor_theme_sub_title_enable ) {
		$sub_title_enable = 'true';
	} else {
		$sub_title_enable = 'false';
	}
} else {
	$sub_title_enable = 'false';
}

/**
* Custom Sub Title
*/
$custom_sub_title = '';

if ( isset( $ftagementor_page_custom_sub_title ) && !empty( $ftagementor_page_custom_sub_title ) ) {
	$custom_sub_title = $ftagementor_page_custom_sub_title[0];
} else {

	if ( isset( $ftagementor_theme_custom_sub_title ) && !empty( $ftagementor_theme_custom_sub_title ) ) {
		$custom_sub_title = $ftagementor_theme_custom_sub_title;
	}
}

/**
* Page Title Bar Height
*/
if ( $title_wrapper_height = get_post_meta( get_the_id(), '_ftagementor_title_wrapper_height', true ) ) {
	if ( 'default' != $title_wrapper_height ) {
		$page_title_classes[] = $title_wrapper_height;
	} else {
		$page_title_classes[] = $ftagementor_opt['ftagementor_title_wrap_height'];
	}
	
} else {
	if( $title_wrapper_height_theme = isset($ftagementor_opt['ftagementor_title_wrap_height']) ? $ftagementor_opt['ftagementor_title_wrap_height'] : '' ) {
		$page_title_classes[] = isset($title_wrapper_height_theme) ? $title_wrapper_height_theme : '';
	} else {
		$page_title_classes[] = 'default-height';
	}

}


$title_in_b_section = false;

?>

<section class="page__title__wrapper text-center <?php echo esc_attr(join( ' ', $page_title_classes )) ?>">
	<div class="<?php echo esc_attr( $twf_enable ); ?>">
		<div class="row">
			<div class="col-md-12">
				<div class="page__title__inner">
					<?php if ( $title_in_b_section && 'false' != $title_enable ): ?> <!-- Start Enable Title -->
						<?php if (!empty( $custom_title )): ?> <!-- Start Custom Title  -->
							<h1>
								<?php echo wp_kses_post( $custom_title ); ?>
							</h1>
						<?php else:?>
							<h1>
								<?php wp_title(''); ?>
							</h1>
						<?php endif ?> <!-- End Custom Title  -->
					<?php endif ?> <!-- End Enable Title -->
					<?php if ( 'true' == $sub_title_enable ): ?> <!-- Start Enable Sub Title -->
						<div class="page-sub-title"><?php echo esc_html( $custom_sub_title ); ?></div>
					<?php endif ?> <!-- End Enable Sub Title -->

					<?php if ( '1' !== $page_brad ): ?>
						<div class="breadcrumbs_wrap breadcrumb-bottom">
							<?php 
								switch ( $page_brad ) {
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