<?php
/**
 * Default header template
 *
 * @package ftagementor
 */

$ftagementor_opt = ftagementor_get_opt();

// Start Header Width Check
$ftagementor_header_width = isset($ftagementor_opt['ftagementor_header_full_width']) ? $ftagementor_opt['ftagementor_header_full_width'] : '';
$ftagementor_page_header_width = get_post_meta( get_the_id(),'_ftagementor_header_full_width',true );
$header_width = '';
// Check page options
if ( isset( $ftagementor_page_header_width ) && !empty( $ftagementor_page_header_width ) ){
	if ( 'yes' === $ftagementor_page_header_width ) {
		$header_width = 'container-fluid';
	} else{
		$header_width = 'container';
	}
} else {
	// Check theme options
	if ( '' != $ftagementor_header_width && true == $ftagementor_header_width ) {
		$header_width = 'container-fluid';
	} else {
		$header_width = 'container';
	}
} // End Header Width Check

// Header Sticky Class
$header_classes[] = '';
$ftagementor_header_sticky = isset($ftagementor_opt['ftagementor_header_sticky']) ? $ftagementor_opt['ftagementor_header_sticky'] : '';
if (isset($ftagementor_header_sticky) && true == $ftagementor_header_sticky) {
	$header_classes[] = 'header-sticky';
}

// Header Transparent Class
$header_transparent = isset($ftagementor_opt['ftagementor_header_transparent']) ? $ftagementor_opt['ftagementor_header_transparent'] : '';


if ( isset( $header_transparent ) && true == $header_transparent) {
	$header_classes[] = 'header-transparent';
}

/**
* Select Menu
*/
$ftagementor_selected_menu = '';
$ftagementor_page_select_menu = get_post_meta( get_the_id(),'_ftagementor_select_menu', true );
$ftagementor_select_menu = isset($ftagementor_opt['ftagementor_select_menu']) ? $ftagementor_opt['ftagementor_select_menu'] : '';

if( !empty( $ftagementor_page_select_menu ) && '0' != $ftagementor_page_select_menu ){
	$ftagementor_selected_menu = $ftagementor_page_select_menu;
} else {
	if ( '' != $ftagementor_select_menu ) {
		$ftagementor_selected_menu = $ftagementor_select_menu;
	}
}

?>

<header  class="header-default main-header clearfix <?php echo esc_attr(join( ' ', $header_classes )); ?>">
	<div class="header-area header-style-2">
		<div class="<?php echo esc_attr( $header_width ); ?>">
			<div class="row">
					<?php 
						$ftagementor_logo_position = isset($ftagementor_opt['ftagementor_logo_position']) ? $ftagementor_opt['ftagementor_logo_position'] : '';
						$ftagementor_logo_position_value = '';
						if (isset( $ftagementor_logo_position )) {
							$ftagementor_logo_position_value = $ftagementor_logo_position;
						}
						$ftagementor_fallback_logo = get_template_directory_uri() . '/images/logo.png';
                        $ftagementor_fallback_retina_logo = get_template_directory_uri() . '/images/logo2x.png';
                        $ftagementor_default_logo = ftagementor_get_theme_option('ftagementor_head_logo', 'url', $ftagementor_fallback_logo);
                        $ftagementor_default_ratina_logo = ftagementor_get_theme_option('ftagementor_retina_default_logo', 'url', $ftagementor_fallback_retina_logo);

					?>
				<div class="col-lg-2 col-md-12 col-sm-12">
					<div class="header-menu-wrap logo-<?php echo esc_attr( $ftagementor_logo_position_value ); ?> ">
						<div class="site-title">
							
							<?php if ( isset( $ftagementor_opt['ftagementor_logo_type'] ) ): ?>
								<a href="<?php echo esc_url( home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo('name')); ?>" rel="home" >

									<?php if ( 'image' == $ftagementor_opt['ftagementor_logo_type'] ): ?>
										
										<img src="<?php echo esc_url( $ftagementor_default_logo ); ?>" data-at2x="<?php echo esc_url( $ftagementor_default_ratina_logo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">

									<?php else: ?>

										<?php if ( 'text' == $ftagementor_opt['ftagementor_logo_type'] ): ?>
											
											<?php echo esc_html( $ftagementor_opt['ftagementor_logo_text'] ); ?>

										<?php endif ?>
										
									<?php endif ?>

								</a>
							<?php else: ?>
								
								<h3>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
										<?php if( isset($ftagementor_opt['ftagementor_logo_text']) ? $ftagementor_opt['ftagementor_logo_text'] : '' ) { 
												echo esc_html( $ftagementor_opt['ftagementor_logo_text'] ); 
											} else { 
												bloginfo( 'name' );
											} 
										?>
									</a>
								</h3>

								<?php $description = get_bloginfo( 'description', 'display' );

									if ( $description || is_customize_preview() ) { ?> 

										<p class="site-description"><?php echo esc_html( $description ); ?> </p> 

									<?php } ?>

							<?php endif ?>

						</div>
					</div>
				</div>
				<!-- End Logo Wrapper -->
				<!-- Start Primary Menu Wrapper -->				
				<div class="col-lg-10 d-lg-block d-md-none d-sm-none d-none">
					<div class="header-rightside text-right">
						<!-- Slide Menu -->
						<div class="slide-menu-wrapper">
							<div class="primary-nav-wrap nav-horizontal default-menu default-style-one">
							<button class="trigger-menu-icon">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<nav class="menu_style2">
								<?php
									wp_nav_menu(array(
										'theme_location' => 'primary',
										'menu' 			 => $ftagementor_selected_menu,
										'container'      => false,
									));
								?>
							</nav>
							</div>							
						</div>
						<!-- //Slide Menu -->
					</div>
				</div>	
				<!-- End Primary Menu Wrapper -->					
			</div>
			<!-- Mobile Menu  -->
			<div class="mobile-menu"></div>
		</div>
	</div>	
</header>
