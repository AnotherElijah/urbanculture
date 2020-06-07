<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package ftagementor
*/
 
while ( have_posts() ) : the_post(); 

$ftagementor_opt = ftagementor_get_opt();
$ftagementor_blog_details_social_share = '';
$ftagementor_blog_details_post_navigation = '';
$ftagementor_blog_details_show_author_info = '';
$ftagementor_blog_details_show_related_post = '';
$ftagementor_blog_details_no_of_column_related_post = '';
$ftagementor_blog_details_no_of_column_related_post = '';
$ftagementor_blog_details_no_of_item_per_page = '';
$ftagementor_blog_details_related_post_title = '';

if( isset ( $ftagementor_opt['ftagementor_blog_details_social_share'] ) ){
    $ftagementor_blog_details_social_share = $ftagementor_opt['ftagementor_blog_details_social_share'];
}
if( isset ( $ftagementor_opt['ftagementor_blog_details_post_navigation'] ) ){
    $ftagementor_blog_details_post_navigation = $ftagementor_opt['ftagementor_blog_details_post_navigation'];
}
if( isset ( $ftagementor_opt['ftagementor_blog_details_show_author_info'] ) ){
    $ftagementor_blog_details_show_author_info = $ftagementor_opt['ftagementor_blog_details_show_author_info'];
}
if( isset ( $ftagementor_opt['ftagementor_blog_details_show_related_post'] ) ){
    $ftagementor_blog_details_show_related_post = $ftagementor_opt['ftagementor_blog_details_show_related_post'];
}
if( isset ( $ftagementor_opt['ftagementor_blog_details_no_of_column_related_post'] ) ){
    $ftagementor_blog_details_no_of_column_related_post = $ftagementor_opt['ftagementor_blog_details_no_of_column_related_post'];
}
$ftagementor_blog_details_no_of_column_related_post_value = ( !empty( $ftagementor_blog_details_no_of_column_related_post ) ) ? $ftagementor_blog_details_no_of_column_related_post : '4' ;
if( isset ( $ftagementor_opt['ftagementor_blog_details_no_of_item_per_page'] ) ){
    $ftagementor_blog_details_no_of_item_per_page = $ftagementor_opt['ftagementor_blog_details_no_of_item_per_page'];
}
if( isset ( $ftagementor_opt['ftagementor_blog_details_related_post_title'] ) ){
    $ftagementor_blog_details_related_post_title = $ftagementor_opt['ftagementor_blog_details_related_post_title'];
}

/**
* Single post Meta
*/
$show_single_post_publish_date_meta = ( isset( $ftagementor_opt['ftagementor_show_single_post_publish_date_meta'] ) ) ? $ftagementor_opt['ftagementor_show_single_post_publish_date_meta'] : '' ;
$show_single_post_updated_date_meta = ( isset( $ftagementor_opt['ftagementor_show_single_post_updated_date_meta'] ) ) ? $ftagementor_opt['ftagementor_show_single_post_updated_date_meta'] : '' ;
$show_single_post_categories_meta = ( isset( $ftagementor_opt['ftagementor_show_single_post_categories_meta'] ) ) ? $ftagementor_opt['ftagementor_show_single_post_categories_meta'] : '' ;
$show_single_post_tags_meta = ( isset( $ftagementor_opt['ftagementor_show_single_post_tags_meta'] ) ) ? $ftagementor_opt['ftagementor_show_single_post_tags_meta'] : '' ;
$show_single_post_comments_meta = ( isset( $ftagementor_opt['ftagementor_show_single_post_comments_meta'] ) ) ? $ftagementor_opt['ftagementor_show_single_post_comments_meta'] : '' ;
$show_single_post_author_meta = ( isset( $ftagementor_opt['ftagementor_show_single_post_author_meta'] ) ) ? $ftagementor_opt['ftagementor_show_single_post_author_meta'] : '' ;

?>
<div <?php post_class( 'blog-wrapper blog-single' ); ?>>
    <?php 
        $audio_url = esc_url( get_post_meta( get_the_ID(), '_ftagementor_audio_url', true ) );
        $post_gallerys = get_post_meta(get_the_id(),'_ftagementor_gallery_slider',true);
        $video_url = esc_url( get_post_meta( get_the_ID(), '_ftagementor_video_url', true ) );
        $local_video_url = esc_url( get_post_meta( get_the_ID(), '_ftagementor_local_video_url', true ) );
    ?>
    <?php if ( $audio_url || $post_gallerys || $video_url || $local_video_url || has_post_thumbnail() ): ?>
        <div class="theme_name-post-media">
            <!-- Start Thumbnail  -->
            <?php 
            if ( has_post_thumbnail() ) { ?>
                <div class="blog-slider">
                    <div class="blog-gallery-img">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                </div>
            <?php } ?>
            <!-- End Thumbnail  -->
            <!-- Start Audio -->
            <?php if ($audio_url): ?>
                <div class="blog-audio embed-responsive embed-responsive-16by9">
                    <?php echo wp_oembed_get( $audio_url ); ?>
                </div>
            <?php endif ?>
            <!-- End Audio -->
            <!-- Start Gallery -->
            <?php if ( $post_gallerys ): ?>
                <div class="blog-gallery owl-carousel">
                    <?php
                        foreach( $post_gallerys as $post_gallerys_key => $single_gallery_image ): 
                                $image_id = ftagementor_get_image_id($single_gallery_image);
                            ?>
                            <a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image($image_id, 'ftagementorsize_970x500'); ?></a>
                        <?php endforeach; 
                    
                    ?>
                </div>
            <?php endif ?>
            <!-- End Gallery -->
            <!-- Start Video -->
            <?php if ($video_url) { ?>
                <div class="blog-video embed-responsive embed-responsive-16by9">
                    <?php echo wp_oembed_get( $video_url ); ?>
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
            <!-- End Video -->
        </div>
    <?php endif ?>
    <!-- Start Blog Title And Meta -->
    <h1 class="post-title"><?php the_title(); ?></h1>
    <?php if ( 'no' != $show_single_post_publish_date_meta || 'no' != $show_single_post_updated_date_meta || 'no' != $show_single_post_author_meta || 'no' != $show_single_post_comments_meta || 'no' != $show_single_post_categories_meta || 'no' != $show_single_post_tags_meta ): ?>
        <div class="blog-meta">
            
            <?php if ( 'no' != $show_single_post_publish_date_meta ): ?>
                <span class="post-date"><i class="fa fa-clock-o"></i><?php echo get_the_time(get_option('date_format')); ?></span>
            <?php endif ?>
            
            <?php if ( 'no' != $show_single_post_updated_date_meta && '' != $show_single_post_updated_date_meta ): ?>
                <span class="post-updated-date"><i class="fa fa-refresh"></i><?php echo the_modified_time(get_option('date_format')); ?></span>
            <?php endif ?>
            
            <?php if ( 'no' != $show_single_post_author_meta ): ?>
                <span class="post-user"><i class="fa fa-user"></i><?php the_author_posts_link(); ?></span>
            <?php endif ?>

            <?php if ( 'no' != $show_single_post_comments_meta ): ?>
                <span class="post-comments"><i class="fa fa-comment"></i><?php comments_popup_link( esc_html__('No Comments','ftagementor'), esc_html__('1 Comment','ftagementor'), esc_html__('% Comments','ftagementor'), 'post-comment', esc_html__('Comments off','ftagementor') ); ?></span>
            <?php endif ?>

            <?php if ( 'no' != $show_single_post_categories_meta ): ?>
                <span class="post-categories"><i class="fa fa-folder-open"></i><?php the_category( ', ' ); ?></span>
            <?php endif ?>

            <?php if ( 'no' != $show_single_post_tags_meta ): ?>
                <?php if (has_tag()): ?>
                    <span class="post-tags"><i class="fa fa-tag"></i><?php the_tags( ' ', ', ' ); ?> </span>
                <?php endif ?>
            <?php endif ?>

        </div>
    <?php endif ?>
    
    <!-- End Blog Title And Meta -->
    
    <!-- Start info  -->
    <div class="blog-info entry-content">
        <?php the_content(); 

        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'ftagementor' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'ftagementor' ) . ' </span>%',
            'separator'   => '<span class="screen-reader-text">, </span>',
        ) );

		?>
        
        
    </div>
    <!-- End info  -->

    
    <?php if ( true == $ftagementor_blog_details_social_share && function_exists('ftagementor_sharing_icon_links') ) { ?>
        <div class="social_network_wrap clear">
            <div class="user-share">
                <span><?php echo esc_html__('Share:', 'ftagementor'); ?></span>
                <?php ftagementor_sharing_icon_links(); ?>
            </div>
        </div>
        <?php } ?>

        <?php if ( true == $ftagementor_blog_details_post_navigation ) { 

            $prev_post = get_previous_post();
            $next_post = get_next_post();

        ?>
        <?php if ( !empty( $prev_post ) || !empty( $next_post ) ): ?>
            <div class="next-prev clear">
                <?php
                
                if (!empty( $prev_post )): ?>
                  <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="prev-btn" ><i class="fa fa-angle-left"></i><?php echo esc_html__('prev post', 'ftagementor' ); ?></a>
                <?php endif ?>

                <?php
                if (!empty( $next_post )): ?>
                  <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="next-btn"><?php echo esc_html__( 'next post', 'ftagementor' ); ?><i class="fa fa-angle-right"></i></a>
                <?php endif; ?>
            </div> 
        <?php endif ?>
    <?php } ?>
    <!-- Start Author Info -->
	<?php 
        if ( true == $ftagementor_blog_details_show_author_info ) {
            get_template_part( 'template-parts/biography' );
        }
    ?>
    <!-- End Author Info -->
    <?php if ( true == $ftagementor_blog_details_show_related_post ) { ?>
        <?php 
            $related = get_posts( array( 
                'category__in' => wp_get_post_categories($post->ID),
                'numberposts' => $ftagementor_blog_details_no_of_item_per_page,
                'post_type' => 'post', 
                'post__not_in' => array($post->ID) 
            ) );
        ?>
        <?php if ( $related ): ?>
            <div class="related-post">
                <h3 class="sidebar-title related-post-title"><?php echo esc_html( $ftagementor_blog_details_related_post_title ); ?></h3>
                <div class="row">
                    <?php
                        if( $related ) foreach( $related as $post ) { 
                        setup_postdata($post); ?>
                        <div class="col-sm-<?php echo esc_attr( $ftagementor_blog_details_no_of_column_related_post_value ); ?>">
                            <div class="single-related-post mrg-btm">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>"> 
                                <?php the_post_thumbnail('medium');  ?> 
                                </a> 
                            <?php endif; ?>

                                <div class="related-post-title">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <span><?php echo get_the_time(get_option('date_format')); ?></span>
                                </div>

                            </div>
                        </div>
                    <?php } wp_reset_postdata(); ?> 
                </div>
            </div>
        <?php endif ?>
    <?php } ?>
    <?php 
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>
</div>
<?php endwhile; // End of the loop.
?>