<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package ftagementor
*/

/**
* Post Meta
*/
$ftagementor_opt = ftagementor_get_opt();

$show_post_publish_date_meta = ( isset( $ftagementor_opt['ftagementor_show_post_publish_date_meta'] ) ) ? $ftagementor_opt['ftagementor_show_post_publish_date_meta'] : '' ;
$show_post_updated_date_meta = ( isset( $ftagementor_opt['ftagementor_show_post_updated_date_meta'] ) ) ? $ftagementor_opt['ftagementor_show_post_updated_date_meta'] : '' ;
$show_post_categories_meta = ( isset( $ftagementor_opt['ftagementor_show_post_categories_meta'] ) ) ? $ftagementor_opt['ftagementor_show_post_categories_meta'] : '' ;
$show_post_tags_meta = ( isset( $ftagementor_opt['ftagementor_show_post_tags_meta'] ) ) ? $ftagementor_opt['ftagementor_show_post_tags_meta'] : '' ;
$show_post_comments_meta = ( isset( $ftagementor_opt['ftagementor_show_post_comments_meta'] ) ) ? $ftagementor_opt['ftagementor_show_post_comments_meta'] : '' ;
$show_post_author_meta = ( isset( $ftagementor_opt['ftagementor_show_post_author_meta'] ) ) ? $ftagementor_opt['ftagementor_show_post_author_meta'] : '' ;
$enable_readmore_btn = ( isset( $ftagementor_opt['ftagementor_enable_readmore_btn'] ) ) ? $ftagementor_opt['ftagementor_enable_readmore_btn'] : '' ;

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>


	<!-- Content Gallery -->
	<div class="blog-gallery owl-carousel">
		<?php
			$post_gallerys = get_post_meta(get_the_id(),'_ftagementor_gallery_slider',true);
			if ($post_gallerys) {
				foreach( $post_gallerys as $post_gallerys_key => $single_gallery_image ): 
						$image_id = ftagementor_get_image_id($single_gallery_image);
					?>
					<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image($image_id, 'ftagementorsize_970x500'); ?></a>
				<?php endforeach; 
			}
		?>
	</div>


	<!-- content audio -->
	<?php 
		$audio_url = esc_url( get_post_meta( get_the_ID(), '_ftagementor_audio_url', true ) );
	?>
	<?php if ($audio_url): ?>
		<div class="blog-audio embed-responsive embed-responsive-16by9">
			<?php echo wp_oembed_get( esc_url($audio_url) ); ?>
		</div>
	<?php endif ?>


	<!-- content video -->
	<?php 
		$video_url = esc_url( get_post_meta( get_the_ID(), '_ftagementor_video_url', true ) );
		$local_video_url = esc_url( get_post_meta( get_the_ID(), '_ftagementor_local_video_url', true ) );
	?>
	<?php if ($video_url) { ?>
		<div class="blog-video embed-responsive embed-responsive-16by9">
			<?php echo wp_oembed_get( esc_url($video_url) ); ?>
		</div>
	<?php } ?>

	<?php if ($local_video_url): ?>
		<div class="blog-video embed-responsive embed-responsive-16by9">
			<video width="400" controls>
			  <source src="<?php echo esc_url( get_post_meta( get_the_ID(), '_ftagementor_local_video_url', true ) ); ?>" type="video/mp4">
			  <source src="<?php echo esc_url( get_post_meta( get_the_ID(), '_ftagementor_local_video_url', true ) ); ?>" type="video/ogg">
			</video>
		</div>
	<?php endif ?>

	<?php if(has_post_thumbnail()): ?>
	<div class="blog-thumb">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'ftagementorsize_970x500' ); ?></a>
	</div>
	<?php endif; ?>
	<div class="blog-content">
		<?php if ( 'no' != $show_post_categories_meta):

		         if ( 'no' != $show_post_categories_meta && '' != $show_post_categories_meta ): ?>
		            <span class="post-categories"><?php the_category( ', ' ); ?></span>
		        <?php endif;
		        
		         endif?>

		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<!-- Start Blog Meta  -->
		<?php if ( 'no' != $show_post_publish_date_meta || 'no' != $show_post_updated_date_meta || 'no' != $show_post_author_meta || 'no' != $show_post_comments_meta || 'no' != $show_post_categories_meta || 'no' != $show_post_tags_meta ): ?>


		    <div class="blog-meta">
		        
		        <?php if ( 'no' != $show_post_author_meta ): ?>
		            <span class="post-user"> <i class="icofont icofont-user"></i> <?php the_author_posts_link(); ?></span>
		        <?php endif ?>
		        
		        <?php if ( 'no' != $show_post_publish_date_meta ): ?>
		            <span class="post-date"><i class="icofont icofont-ui-calendar"></i> <?php echo get_the_time(get_option('date_format')); ?></span>
		        <?php endif ?>

		        <?php if ( 'no' != $show_post_updated_date_meta && '' != $show_post_updated_date_meta  ): ?>
		            <span class="post-updated-date"><i class="icofont icofont-ui-calendar"></i> <?php echo the_modified_time(get_option('date_format')); ?></span>
		        <?php endif ?>

		        <?php if ( 'no' != $show_post_comments_meta ): ?>
		            <span class="post-comments"><i class="icofont icofont-comment"> </i> <?php comments_popup_link( esc_html__('No Comments','ftagementor'), esc_html__('1 Comment','ftagementor'), esc_html__('% Comments','ftagementor'), 'post-comment', esc_html__('Comments off','ftagementor') ); ?></span>
		        <?php endif ?>

		        <?php if ( 'no' != $show_post_tags_meta && '' != $show_post_tags_meta && has_tag() ): ?>
		            <span class="post-tags"><i class="icofont icofont-tags"></i>  <?php the_tags( ' ', ', ' ); ?> </span>
		        <?php endif ?>

		    </div>
		<?php endif ?>
		<!-- End Blog Meta  -->

		<?php
			ftagementor_post_excerpt();		
			wp_link_pages( array(
				'before'      => '<div class="pagination"><span class="page-links-title">' . esc_html__( 'Pages:', 'ftagementor' ) . '</span>',
				'after'       => '</div>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'ftagementor' ) . ' </span>%',
			) );
		 ?>

		<?php 

		if ( 'no' != $enable_readmore_btn): ?>
			<div class="read-more">
				<a href="<?php the_permalink(); ?>"><?php ftagementor_read_more(); ?></a>
			</div>
		<?php endif ?>
		
	</div>
</article>