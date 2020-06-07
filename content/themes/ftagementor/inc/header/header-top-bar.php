<?php 
/*
* Ftage Header top bar
* Author: Hastech
* Author URI: http://hastech.company
* Version: 1.0.0
* ======================================================
*/

$ftagementor_opt = ftagementor_get_opt(); 
$topbar_widht = $ftagementor_opt['ftagementor_header_top_width'];
	if( isset( $topbar_widht ) && true == $topbar_widht ){
		$topbar_widht = 'container-fluid';
	}else {
		$topbar_widht = 'container';
}

?>
<div class="header-top-area">
	<div class="<?php echo esc_attr( $topbar_widht ); ?>">
		<div class="row">
			<div class="col-md-6 col-sm-6">
			<?php 						
				if( $ftagementor_opt['ftagementor_left_content_section'] == '1'){
					?>
					<div class="header-social">
						<ul>
						   <?php  
								foreach($ftagementor_opt['ftagementor_social_icons'] as $key=>$value ) { 
								 if($value!=''){
									if($key=='vimeo'){
									 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.esc_attr(ucwords(esc_attr($key))).'" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';
									} else {
									 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.esc_attr(ucwords(esc_attr($key))).'" target="_blank"><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
									}
								   }
								} 
							?>
						</ul>
					</div>
					<?php
				}elseif( $ftagementor_opt['ftagementor_left_content_section'] == '2'){
					?>
					<div class="top-bar-left-menu">
						<?php 
							wp_nav_menu(array(
								'theme_location' => 'left-menu',
								'container'      => false,
							));
						?>
					</div>
					<?php
				}elseif( $ftagementor_opt['ftagementor_left_content_section'] == '4'){
					?>								
					<div class="top-bar-left-content">
						<p>
							<?php if( isset($ftagementor_opt['ftagementor_left_text_area']) && $ftagementor_opt['ftagementor_left_text_area']!='' ) {
								echo wp_kses($ftagementor_opt['ftagementor_left_text_area'], array(
									'a' => array(
										'href' => array(),
										'title' => array()
									),
									'br' => array(),
									'em' => array(),
									'strong' => array(),
									'img' => array(
										'src' => array(),
										'alt' => array()
										),
									));
								}else{
									echo esc_html__('Lorem ipsum dolor sit amet', 'ftagementor');
								}
							?>
						</p>
					</div>								
					<?php
				}elseif( $ftagementor_opt['ftagementor_left_content_section'] == '5'){
				}else{
					?>
					<div class="header-info">
						<?php if( !empty( $ftagementor_opt['ftagementor_left_contact_info'] ) ): ?>
							<span><a href="tel:<?php echo esc_attr( $ftagementor_opt['ftagementor_left_contact_info'] ); ?>"> <?php echo esc_html( $ftagementor_opt['ftagementor_left_contact_info_text'] ); ?> <?php echo esc_html( $ftagementor_opt['ftagementor_left_contact_info'] ); ?></a></span>
						<?php endif; if( !empty($ftagementor_opt['ftagementor_left_contact_email'] ) ): ?>
							<span class="mail-us"><a href="mailto:<?php echo esc_attr( $ftagementor_opt['ftagementor_left_contact_email'] ); ?>" target="_top">  <?php echo esc_html( $ftagementor_opt['ftagementor_left_contact_email'] ); ?></a></span>

						<?php endif; ?>

					</div>
				<?php
				}
			?>
			</div> 
			<div class="col-md-6 col-sm-6">
			<?php $ftagementor_opt = ftagementor_get_opt();
				if( $ftagementor_opt['ftagementor_right_contactinfo'] == '1'){
					?>
					<div class="header-social text-right">
						<ul>
						   <?php 
								foreach($ftagementor_opt['ftagementor_social_icons'] as $key=>$value ) { 
								 if($value!=''){
									if($key=='vimeo'){
									 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'. esc_attr(ucwords(esc_attr($key))) .'" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';
									} else {
									 echo '<li><a class="'. esc_attr($key) .' social-icon" href="'.esc_url($value).'" title="'. esc_attr(ucwords(esc_attr($key))) .'" target="_blank"><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
									}
								   }
								} 
							?>
						</ul>
					</div>
					<?php
				}elseif( $ftagementor_opt['ftagementor_right_contactinfo'] == '2'){
					?>
					<div class="top-bar-left-menu text-right">
						<?php 
							wp_nav_menu(array(
								'theme_location' => 'right-menu',
							));
						?>
					</div>
					<?php
				}elseif( $ftagementor_opt['ftagementor_right_contactinfo'] == '4'){
					?>								
					<div class="top-bar-left-content text-right">
						<p>
							<?php if( isset($ftagementor_opt['ftagementor_right_text_area']) && $ftagementor_opt['ftagementor_right_text_area']!='' ) {
								echo wp_kses($ftagementor_opt['ftagementor_right_text_area'], array(
									'a' => array(
										'href' => array(),
										'title' => array()
									),
									'br' => array(),
									'em' => array(),
									'strong' => array(),
									'img' => array(
										'src' => array(),
										'alt' => array()
										),
									));
								}else{
									echo esc_html__('Lorem ipsum dolor sit amet', 'ftagementor');
								}
							?>
							</p>
					</div>								
					<?php
				}elseif( $ftagementor_opt['ftagementor_right_contactinfo'] == '5'){
				}else{
					?>
					<div class="header-info text-right">
						<?php if( !empty( $ftagementor_opt['ftagementor_right_contact_info'] ) ): ?>
							<span><a href="tel:<?php echo esc_html( $ftagementor_opt['ftagementor_right_contact_info'] ); ?>"> <?php echo esc_html( $ftagementor_opt['ftagementor_right_contact_info_text'] ); ?> <?php echo esc_html( $ftagementor_opt['ftagementor_right_contact_info'] ); ?></a></span>
						<?php endif; if( !empty( $ftagementor_opt['ftagementor_right_contact_email'] ) ): ?>
							<span class="mail-us"><a href="mailto:<?php echo esc_html( $ftagementor_opt['ftagementor_right_contact_email'] ); ?>" target="_top">  <?php echo esc_html( $ftagementor_opt['ftagementor_right_contact_email'] ); ?></a></span>
						<?php endif; ?>

					</div>
				<?php
				}
			?>
			</div>
		</div>
	</div>
</div>