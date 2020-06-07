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
	<!-- Portfolio Details Area -->
<?php
		while ( have_posts() ) : the_post();
	?>
	<section class="portfolio-details-area">
	    <div class="container">
         <?php 
			if(has_post_thumbnail() ){
				?>
		        <div class="portfolio-details-images">
		        	<?php the_post_thumbnail( 'ftagementorsize_1170x540', array( 'class' => 'img-responsive' ) ); ?>
		        </div>
		      <?php
			} ?>
	        <div class="row">
	            <div class="col-lg-4">
	                <div class="portfolio-details-meta">
	                    <ul>
                            <?php
                            $help_teamsicon  = get_post_meta( get_the_ID(),'_ftagementor_pro_loop', true );
                            foreach( (array) $help_teamsicon as $ticonskey => $ticons ){
                                $ticons1 = $ticons2 = $ticons3 ='';

                                if ( isset( $ticons['_ftagementor_pro_icon'] ) ) {
                                    $ticons1 =  $ticons['_ftagementor_pro_icon']; 
                                }

                                if ( isset( $ticons['_ftagementor_pro_title'] ) ) {
                                    $ticons2 =  $ticons['_ftagementor_pro_title'];    
                                }

                                if ( isset( $ticons['_ftagementor_pro_desc'] ) ) {
                                    $ticons3 =  $ticons['_ftagementor_pro_desc'];    
                                }?>
                                 <li><i class="<?php echo esc_attr( $ticons1 ) ?>"></i> <span><?php echo esc_html( $ticons2 ) ?></span> <?php echo esc_html( $ticons3 ) ?></li>

                                <?php } ?>	

	                    </ul>
	                </div>
	            </div>
	            <div class="col-lg-8">
	                <div class="portfolio-details-info">
	                    <h3 class="small-title-fullwidth"><span><?php echo esc_html__('PROJECT INFO','ftagementor'); ?></span></h3>
	                    <h5 class="portfolio-title"><?php echo esc_html__('NAME: ','ftagementor'); echo  get_the_title(); ?></h5>
	                    <?php the_content(); ?>
	                    <div class="post-share">
	                        <h6>Share:</h6>
	                        <?php ftagementor_sharing_icon_links(); ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!--// Portfolio Details Area -->
	<?php endwhile; // End of the loop.
	?>
</div><!-- #primary -->
<?php
get_footer();