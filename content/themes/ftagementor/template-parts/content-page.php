<?php
/**
* Template part for displaying page content in page.php
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package ftagementor
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="post-title"><?php the_title(); ?></h1>
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
			    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'ftagementor' ) . '</span>',
			    'after'       => '</div>',
			    'link_before' => '<span>',
			    'link_after'  => '</span>',
			    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'ftagementor' ) . ' </span>%',
			    'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'ftagementor' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->