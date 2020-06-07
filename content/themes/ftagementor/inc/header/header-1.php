<?php 
/*
 * Ftage Main menu
 * Author: Hastech
 * Author URI: http://hastech.company
 * Version: 1.0.0
 * ======================================================
 */

global $ftagementor_opt;

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
?>
<div class="header-area <?php echo esc_attr( $ftagementor_header_sticky_class ); ?> <?php echo esc_attr( $ftagementor_header_transparent_class ); ?>  ">
	<div class="<?php echo esc_attr( $header_width ); ?>">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<?php 
					$ftagementor_logo_position = $ftagementor_opt['ftagementor_logo_position'];
					$ftagementor_logo_position_value = '';
					if (isset( $ftagementor_logo_position )) {
						$ftagementor_logo_position_value = $ftagementor_logo_position;
					}
				?>

				<div class="header-menu-wrap logo-<?php echo esc_attr( $ftagementor_logo_position_value ); ?> ">
					<div class="site-logo">
						<?php 
							if($ftagementor_opt['ftagementor_head_logo']['url'] ){
						?>
							<a href="<?php echo esc_url( home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo('name','ftagementor')); ?>" rel="home" >
							<?php if ( $ftagementor_opt['ftagementor_main_logo']=='1'){ ?>
							<img src="<?php  echo esc_url( $ftagementor_opt['ftagementor_head_logo']['url']); ?>" alt="<?php  echo esc_attr(get_bloginfo('name')); ?>">
								<?php } else{
									 if( $ftagementor_opt['ftagementor_main_logo']=='2' ){echo esc_html( $ftagementor_opt['ftagementor_logo_text'] );} 
									}?>
							</a>
						<?php
							}else{ ?> 
								<h3><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php if($ftagementor_opt['ftagementor_logo_text']){ echo esc_html( $ftagementor_opt['ftagementor_logo_text'] );} else{ bloginfo( 'name' );

									} ?></a></h3>
								<?php 
									$description = get_bloginfo( 'description', 'display' );
									if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo esc_html($description ); /* WPCS: xss ok. */ ?></p>
								<?php
									endif;
							}
						?>
					</div>
					<div class="primary-nav-wrap nav-horizontal uppercase nav-effect-1">
						<nav>
							<?php
								wp_nav_menu(array(
									'theme_location' => 'primary',
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