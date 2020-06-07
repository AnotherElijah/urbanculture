<?php 
/**
 * Comment Form
 *
 * @package ftagementor
 */

function ftagementor_pingback($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'pingback';
    } else {
        $tag       = 'li';
        $add_below = 'div-pingback';
    }
    ?>


	<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    	
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body blog-comment pingback-body-class">
	        <div class="comment-replay-all">
		        <div class="single-comment">
			        <div class="parent-comment comment-border">
					    <?php endif; ?>

						<div class="comment-text pingback-text copy">

						    <div class="comment-meta commentmetadata">

						    	<?php if ( $comment->comment_approved == '0' ) : ?>
							         <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'ftagementor' ); ?></em>
							          <br />
							    <?php endif; ?>

								<b>
									<cite class="author-name"><?php comment_author_link(); ?></cite>
								</b>

                                <div class="comment--date--time">
                                    <?php printf( esc_html__('%1$s at %2$s', 'ftagementor'), get_comment_date(),  get_comment_time()); ?>
                                </div>
						       
						    </div>
							
						    <?php comment_text(); ?>

                            <span class="edit--btn">
					        	<?php edit_comment_link();?>
					        </span>

						    <div class="reply">
						        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						    </div>

					    </div>

					    
					    <?php if ( 'div' != $args['style'] ) : ?>
					</div>
				</div>
			</div>
		</div>
    <?php endif; ?>
    <?php
}

function ftagementor_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>

	<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body blog-comment">
	        <div class="comment-replay-all">
		        <div class="single-comment">
			        <div class="parent-comment comment-border">
					    <?php endif; ?>

					    <div class="comment-author comment-img">
					        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 80 ); ?>
					    </div>

						<div class="comment-text copy">

						    <div class="comment-meta commentmetadata">

						    	<?php if ( $comment->comment_approved == '0' ) : ?>
							         <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'ftagementor' ); ?></em>
							          <br />
							    <?php endif; ?>

								<b>
									<cite class="author-name"><?php comment_author_link(); ?></cite>
								</b>

                                <div class="comment--date--time">
                                    <?php printf( esc_html__('%1$s at %2$s', 'ftagementor'), get_comment_date(),  get_comment_time()); ?>
                                </div>
						       
						    </div>
							
						    <?php comment_text(); ?>

                            <span class="edit--btn">
					        	<?php edit_comment_link();?>
					        </span>

						    <div class="reply">
						        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						    </div>

					    </div>

					    
					    <?php if ( 'div' != $args['style'] ) : ?>
					</div>
				</div>
			</div>
		</div>
    <?php endif; ?>
    <?php
}

?>