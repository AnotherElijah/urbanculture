<?php
/**
 * Default Footer template
 *
 * @package ftagementor
 */


$ftagementor_opt = ftagementor_get_opt();
$footer_widget_enable = isset($ftagementor_opt['ftagementor_footer_widgets_enable']) ? $ftagementor_opt['ftagementor_footer_widgets_enable'] : true;

?>
<footer class="footer-wrapper default-footer-wrapper">

	<div class="default-footer">
		<!--Footer Widget Area Start-->
		<?php $footer_widget_column = 4; if( $footer_widget_enable == true ): if(is_active_sidebar('ftagementor-footer-1') || is_active_sidebar('ftagementor-footer-2') || is_active_sidebar('ftagementor-footer-3') || is_active_sidebar('ftagementor-footer-4')): ?>
		<div class="footer-top-section">
	    	<div class="container">
	        	<div class="row">
		        	<?php

							// declare varibale with empty value
							$custom_4_col_grid_size = array(3,3,3,3);
							$reduxfooter_widget_column = 4;
							if(isset( $ftagementor_opt['ftagementor_footer_layoutcolumns'] ) ){
								$reduxfooter_widget_column = $ftagementor_opt['ftagementor_footer_layoutcolumns'];
							}

							// get and set custom grid size for 4 col widget only
							if( $reduxfooter_widget_column ) {
								$footer_widget_column = $reduxfooter_widget_column;
								if(isset( $ftagementor_opt['ftagementor_footer_layoutcolumns'] ) ){
									// get grid sizes when column 5 active
									$custom_4_col_grid_size[0] = $ftagementor_opt['ftagementor_col_1_gird_size'];
									$custom_4_col_grid_size[1] = $ftagementor_opt['ftagementor_col_2_gird_size'];
									$custom_4_col_grid_size[2] = $ftagementor_opt['ftagementor_col_3_gird_size'];
									$custom_4_col_grid_size[3] = $ftagementor_opt['ftagementor_col_4_gird_size'];
								}
							}

						// bootstrap grid size array
						switch ( $footer_widget_column ) {
							case 1:
								$bootstrap_grid_size = $custom_4_col_grid_size ? $custom_4_col_grid_size : array(12);
								break;
							case 2:
								$bootstrap_grid_size = $custom_4_col_grid_size ? $custom_4_col_grid_size : array(6,6);
								break;
							case 3:
								$bootstrap_grid_size = $custom_4_col_grid_size ? $custom_4_col_grid_size : array(4,4,4);
								break;
							case 4:
								$bootstrap_grid_size = $custom_4_col_grid_size ? $custom_4_col_grid_size : array(3,3,3,3);
								break;
						}

						for( $i = 1; $i <= $footer_widget_column; $i++ ) :
							if ( is_active_sidebar('ftagementor-footer-' . $i ) ) :
						?>	
							<div class="col-lg-<?php echo esc_attr( $bootstrap_grid_size[$i-1] ); ?> col-md-6 col-12 mb-50">
								<?php dynamic_sidebar('ftagementor-footer-' . $i); ?>
							</div>
						<?php endif; endfor; ?>

		        </div>
		    </div>
		</div>
			<!--End of Footer Widget Area-->
		<?php endif;endif;?>
		<div class="footer-bottom-area">
			<div class="container">
				<div class="default-footer-content-wrap footer-bottom">
					<div class="footer-copyright-text"> 
						<?php 
						$ftagementor_opt = ftagementor_get_opt();

						$default_foo_content = ( isset( $ftagementor_opt['ftagementor_default_footer_content'] ) ) ? $ftagementor_opt['ftagementor_default_footer_content'] : '' ;

						if ( !empty( $default_foo_content )  ) {
						 	echo wp_kses_post( $default_foo_content, 'ftagementor' );
						} else {
						 	echo esc_html__('Copyright', 'ftagementor'); ?> &copy; <?php echo date("Y").' '.esc_html(get_bloginfo('name'));  echo esc_html__('. All Rights Reserved.', 'ftagementor' );
						}
						?>
					</div>
		            <?php if(isset($ftagementor_opt['ftagementor_social_icons'])):?>
		            <div class="footer-social">
		                <p>
		                	<?php  
								foreach( $ftagementor_opt['ftagementor_social_icons'] as $key=>$value ) { 
								 if($value!=''){
									if($key=='vimeo'){
									 echo '<a class="social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-vimeo-square"></i></a>';
									} else {
									 echo '<a class="social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-'.esc_attr($key).'"></i></a>';
									}
								   }
								} 
							?>
		                </p>
		            </div>
	   			 <?php endif;?>
	   			</div>
			</div>
		</div>
	</div>
</footer>