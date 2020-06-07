<?php
/**
 * Template Name: Right sidebar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ftagementor
 */

get_header();
?>
<div class="page-wrapper clear">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php
					while ( have_posts() ) : the_post();

						$ftagementor_opt = ftagementor_get_opt();
						$ftagementor_service_details_title = '';
						$ftagementor_others_service_optin = '';
						$ftagementor_service_details_subtitle = '';
						$ftagementor_carousel_button = '';


						if( isset ( $ftagementor_opt['ftagementor_others_service_optin'] ) ){
						    $ftagementor_others_service_optin = $ftagementor_opt['ftagementor_others_service_optin'];
						}

						if( isset ( $ftagementor_opt['ftagementor_service_details_title'] ) ){
						    $ftagementor_service_details_title = $ftagementor_opt['ftagementor_service_details_title'];
						}

						if( isset ( $ftagementor_opt['ftagementor_service_details_subtitle'] ) ){
						    $ftagementor_service_details_subtitle = $ftagementor_opt['ftagementor_service_details_subtitle'];
						}
						if( isset ( $ftagementor_opt['ftagementor_carousel_button'] ) ){
						    $ftagementor_carousel_button = $ftagementor_opt['ftagementor_carousel_button'];
						}

						?>
						<div class="service-details-content">
							<h3><?php the_title(); ?></h3>
							<div class="service-content-text">
								<?php the_content(); ?>
							</div>
						</div>

			        <?php 
			            $others = get_posts( array( 
			                'post_type' => 'services', 
			                'post__not_in' => array($post->ID) 
			            ) );
			        ?>
			        <?php if ( $others && $ftagementor_others_service_optin=='yes'): ?>
			            <div class="others-post">

			            	<?php if(!empty($ftagementor_service_details_title)){?>
			                <h3><?php echo esc_html( $ftagementor_service_details_title ); ?></h3>
								<?php
									}
									 if(!empty($ftagementor_service_details_subtitle)){?>

			                <p><?php echo esc_html( $ftagementor_service_details_subtitle ); ?></p>
								
							<?php }
							 ?>

			                <div class="others_service_active owl-carousel <?php if($ftagementor_carousel_button =='yes'){ echo esc_attr('show_button') ;}?>">
			                    <?php
			                        if( $others ) foreach( $others as $post ) { 
			                        setup_postdata($post); 

			                        $icon_images = get_post_meta(get_the_id(),'_ftagementor_service_icon_img',true); 
			                        $servce_icon  = get_post_meta( get_the_ID(),'_ftagementor_service_icon', true );
			                        $servce_icon_type  = get_post_meta( get_the_ID(),'_ftagementor_service_icon_type', true );
			                        ?>

									<div class="service-single">
				                        <?php if ($servce_icon_type =="image" && !empty( $icon_images )): ?>
				                        <div class="servce-icon">
				                            <a href="<?php the_permalink(); ?>">
				                                <img alt="iamge" src="<?php echo esc_url($icon_images);?>">
				                            </a>
				                         </div>
				                     <?php endif?>

				                        <?php if ($servce_icon_type =="icon" && !empty( $servce_icon )): ?>
				                        <div class="servce-icon">
				                            <a href="<?php the_permalink(); ?>">
				                                <i class="<?php echo esc_attr($servce_icon) ?>"></i>
				                            </a>
				                         </div>
				                     <?php endif?>
					                    <div class="service-details">
					                        <h4>
					                        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					                        </h4>
					                        <?php echo '<p>'.wp_trim_words( get_the_content(), '15', '' ).'</p>';?>
					                    </div>
				                    </div>

			                    <?php } wp_reset_postdata(); ?> 
			                </div>
			            </div>
			        <?php  endif ?>
						</div>
				<?php		
					endwhile; // End of the loop.
				?>


			<div class="col-lg-4">
				<?php dynamic_sidebar('sidebar-3'); ?>
			</div>
		</div>
	</div><!-- #primary -->
</div><!-- #primary -->
<?php
get_footer();