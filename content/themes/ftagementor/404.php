<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ftagementor
 */

$ftagementor_opt = ftagementor_get_opt();

get_header(); ?>
	
<div class="page-not-found-wrap">
	<div class="container">
		<div class="row">
            <div class="col-md-12">
                <div class="pnf-inner-wrap">
	                <div class="pnf-inner text-center">
	                	<?php if ( 'image' == $ftagementor_opt['ftagementor_404_control']): ?>
	                		<img src="<?php echo esc_url( $ftagementor_opt['ftagementor_404_img']['url']); ?>" alt="<?php echo esc_attr__('Not Found', 'ftagementor'); ?>">
	                	<?php elseif('title' == $ftagementor_opt['ftagementor_404_control']): ?>
	                		<h1><?php echo esc_html($ftagementor_opt['ftagementor_404_title']); ?></h1> 
	                	<?php else: ?>
	                		<h1><?php echo esc_html__('404','ftagementor'); ?></h1>
	                	<?php endif; ?>
						
						<?php if($ftagementor_opt['ftagementor_404_subtitle']): ?>
	                    	<h2><?php echo esc_html( $ftagementor_opt['ftagementor_404_subtitle'] ); ?></h2>
	                   	<?php else: ?>
	                   		<h2><?php echo esc_html__('PAGE NOT FOUND','ftagementor'); ?></h2>
	                  	<?php endif; ?>

	                   <?php if($ftagementor_opt['ftagementor_404_info']): ?>
	                   	 <p><?php echo esc_html($ftagementor_opt['ftagementor_404_info']); ?></p>
	                    <?php else: ?>
	                    	<p><?php echo esc_html__('The page you are looking for does not exist or has been moved.','ftagementor'); ?> </p>
	                    <?php endif; ?>

						<?php 
							$enable_home_btn = ( $ftagementor_opt['ftagementor_enable_go_back_btn'] == 'yes' ) ? $ftagementor_opt['ftagementor_enable_go_back_btn'] : '' ;

							if ( isset( $enable_home_btn ) && '' != $enable_home_btn && 'no' != $enable_home_btn ) {
								?>
									<a href="<?php echo esc_url(home_url('/')); ?>" class="btn">
				                    	<?php
					                    	if( $ftagementor_opt['ftagementor_button_text'] ){
					                    		echo esc_html( $ftagementor_opt['ftagementor_button_text'] );
					                    	} else {
					                    		echo esc_html__('Go back to Home Page' , 'ftagementor');
					                    	}
				                    	?>
				                    </a>
								<?php
							}
						?>
	                </div>
                </div>
            </div>
		</div>
	</div>	
</div>

<?php

get_footer();