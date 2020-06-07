<?php
/**
* Template part for displaying results in search pages
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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<?php if(has_post_thumbnail()): ?>
	<div class="blog-thumb">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'ftagementorsize_970x500' ); ?></a>
	</div>
	<?php endif; ?>
	<div class="blog-content">
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<!-- Start Blog Meta  -->
			<?php if ( 'no' != $show_post_publish_date_meta || 'no' != $show_post_updated_date_meta || 'no' != $show_post_author_meta || 'no' != $show_post_comments_meta || 'no' != $show_post_categories_meta || 'no' != $show_post_tags_meta ): ?>
			    <div class="blog-meta">
			        
			        <?php if ( 'no' != $show_post_author_meta ): ?>
			            <span class="post-user"><?php echo esc_html__( 'By:', 'ftagementor' ); ?> <?php the_author_posts_link(); ?></span>
			        <?php endif ?>
			        
			        <?php if ( 'no' != $show_post_publish_date_meta ): ?>
			            <span class="post-date"><?php echo esc_html(get_the_time(get_option('date_format'))); ?></span>
			        <?php endif ?>

					<?php if ( 'no' != $show_post_updated_date_meta && '' != $show_post_updated_date_meta  ): ?>
					    <span class="post-updated-date"><?php echo the_modified_time(get_option('date_format')); ?></span>
					<?php endif ?>

			        <?php if ( 'no' != $show_post_comments_meta ): ?>
			            <span class="post-comments"><?php comments_popup_link( esc_html__('No Comments','ftagementor'), esc_html__('1 Comment','ftagementor'), esc_html__('% Comments','ftagementor'), 'post-comment', esc_html__('Comments off','ftagementor') ); ?></span>
			        <?php endif ?>

			        <?php if ( 'no' != $show_post_categories_meta && '' != $show_post_categories_meta ): ?>
			            <span class="post-categories"><?php the_category( ', ' ); ?></span>
			        <?php endif ?>

			        <?php if ( 'no' != $show_post_tags_meta && '' != $show_post_tags_meta  ): ?>
			            <?php if (has_tag()): ?>
			                <span class="post-tags"><?php the_tags( ' ', ', ' ); ?> </span>
			            <?php endif ?>
			        <?php endif ?>

			    </div>
			<?php endif ?>
			<!-- End Blog Meta  -->
		<?php
			ftagementor_post_excerpt();		
			wp_link_pages( array(
			    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'ftagementor' ) . '</span>',
			    'after'       => '</div>',
			    'link_before' => '<span>',
			    'link_after'  => '</span>',
			    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'ftagementor' ) . ' </span>%',
			    'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		 ?>
		<?php 
		$ftagementor_opt = ftagementor_get_opt();
		$enable_readmore_btn = ( isset( $ftagementor_opt['ftagementor_enable_readmore_btn'] ) ) ? $ftagementor_opt['ftagementor_enable_readmore_btn'] : '' ;
		if ( '' != $enable_readmore_btn && 'no' != $enable_readmore_btn): ?>
			<div class="read-more">
				<a href="<?php the_permalink(); ?>"><?php ftagementor_read_more(); ?></a>
			</div>
		<?php endif ?>
	</div>
</article>