<?php 
/*
* Ftage Main menu
* Author: Hastech
* Author URI: http://hastech.company
* Version: 1.0.0
* ======================================================
*/

$ftagementor_opt = ftagementor_get_opt();

$header_width = $ftagementor_opt['ftagementor_header_full_width'];
if( isset( $header_width ) && true == $header_width ){
	$header_width = 'container-fluid';
}else {
	$header_width = 'container';
}

$ftagementor_header_sticky_class = "";
$ftagementor_header_sticky = $ftagementor_opt['ftagementor_header_sticky'];
if ( isset( $ftagementor_header_sticky ) && true == $ftagementor_header_sticky ) {
$ftagementor_header_sticky_class = "header-sticky";
}

$ftagementor_header_transparent_class = "";
$ftagementor_header_transparent = $ftagementor_opt['ftagementor_header_transparent'];
if ( isset( $ftagementor_header_transparent ) && true == $ftagementor_header_transparent ) {
$ftagementor_header_transparent_class = "header-transparent";
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
<div class="header-area <?php echo esc_attr( $ftagementor_header_sticky_class ); ?> <?php echo esc_attr( $ftagementor_header_transparent_class ); ?>">
	<div class="<?php echo esc_attr( $header_width ); ?>">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<?php 
					$ftagementor_logo_position = $ftagementor_opt['ftagementor_logo_position'];
					$ftagementor_logo_position_value = '';
					if (isset( $ftagementor_logo_position )) {
						$ftagementor_logo_position_value = $ftagementor_logo_position;
					}

					$ftagementor_fallback_logo = get_template_directory_uri() . '/images/logo.png';
                    $ftagementor_fallback_retina_logo = get_template_directory_uri() . '/images/logo2x.png';
                    $ftagementor_default_logo = ftagementor_get_theme_option('ftagementor_head_logo', 'url', $ftagementor_fallback_logo);
                    $ftagementor_default_ratina_logo = ftagementor_get_theme_option('ftagementor_retina_default_logo', 'url', $ftagementor_fallback_retina_logo);

				?>
				<div class="header-menu-wrap logo-<?php echo esc_attr( $ftagementor_logo_position_value ); ?> ">
					<div class="site-title">
							
						<?php if ( isset( $ftagementor_opt['ftagementor_logo_type'] ) ): ?>
							<a href="<?php echo esc_url( home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo('name','ftagementor')); ?>" rel="home" >

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
									<?php if( $ftagementor_opt['ftagementor_logo_text'] ) { 
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
					<div class="primary-nav-wrap primary-nav-one-page nav-horizontal uppercase nav-effect-1">
						<nav>
							<?php
								wp_nav_menu(array(
									'theme_location' => 'onepage',
									'menu' 			 => $ftagementor_selected_menu,
									'container'      => false,
								));
							?>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- Mobile Menu  -->
		<div class="mobile-menu"></div>
	</div>
</div>
			