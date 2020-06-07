(function($){
	"use strict";

	var ftagementorwpversion = parseInt( Post_Formate_Data.currentwpversion, 0);
	var ftagementorwpversion = Math.floor( ftagementorwpversion );
	var ckeditor = Post_Formate_Data.classiceditorst;

	if( ( ftagementorwpversion < '5' ) || ( ckeditor == '1' ) ){
		var PostFormatID = jQuery('input[name="post_format"]:checked').attr('id');
		if ( PostFormatID == 'post-format-video' ) {
			jQuery('.cmb2-id--ftagementor-video-url').show();
			jQuery('.cmb2-id--ftagementor-local-video-url').show();
		}else{
			jQuery('.cmb2-id--ftagementor-video-url').hide();
			jQuery('.cmb2-id--ftagementor-local-video-url').hide();
		}
		if ( PostFormatID == 'post-format-audio' ) {
			jQuery('.cmb2-id--ftagementor-audio-url').show();
		}else{
			jQuery('.cmb2-id--ftagementor-audio-url').hide();
		}
		if ( PostFormatID == 'post-format-gallery' ) {
			jQuery('.cmb2-id--ftagementor-gallery-slider').show();
		}else{
			jQuery('.cmb2-id--ftagementor-gallery-slider').hide();
		}
		if ( PostFormatID == 'post-format-quote' ) {
			jQuery('.cmb2-id--ftagementor-city-text').show();
		}else{
			jQuery('.cmb2-id--ftagementor-city-text').hide();
		}

		// Post Format aditional field
		if ( PostFormatID == 'post-format-0' || PostFormatID == 'post-format-link' ) {
			jQuery('#_ftagementor__ftagementor_post_format_optons').hide();
		}else{
			jQuery('#_ftagementor__ftagementor_post_format_optons').show();
		}

		jQuery( 'input[name="post_format"]' ).change(function(){

			jQuery('.cmb2-id--ftagementor-video-url').hide();
			jQuery('.cmb2-id--ftagementor-audio-url').hide();
			jQuery('.cmb2-id--ftagementor-city-text').hide();
			jQuery('.cmb2-id--ftagementor-gallery-slider').hide();
			jQuery('.cmb2-id--ftagementor-local-video-url').hide();

			var PostFormatID = jQuery('input[name="post_format"]:checked').attr('id');
			if ( PostFormatID == 'post-format-video' ) {
				jQuery('.cmb2-id--ftagementor-video-url').show();
				jQuery('.cmb2-id--ftagementor-local-video-url').show();
			}else{
				jQuery('.cmb2-id--ftagementor-video-url').hide();
				jQuery('.cmb2-id--ftagementor-local-video-url').hide();
			}
			if ( PostFormatID == 'post-format-audio' ) {
				jQuery('.cmb2-id--ftagementor-audio-url').show();
			}else{
				jQuery('.cmb2-id--ftagementor-audio-url').hide();
			}
			if ( PostFormatID == 'post-format-gallery' ) {
				jQuery('.cmb2-id--ftagementor-gallery-slider').show();
			}else{
				jQuery('.cmb2-id--ftagementor-gallery-slider').hide();
			}
			if ( PostFormatID == 'post-format-quote' ) {
				jQuery('.cmb2-id--ftagementor-city-text').show();
			}else{
				jQuery('.cmb2-id--ftagementor-city-text').hide();
			}

			// Post Format aditional field
			if ( PostFormatID == 'post-format-0' || PostFormatID == 'post-format-link' ) {
				jQuery('#_ftagementor__ftagementor_post_format_optons').hide();
			}else{
				jQuery('#_ftagementor__ftagementor_post_format_optons').show();
			}

		});
	}else{

		var PostFormatID = Post_Formate_Data.post_formate_name;
		// For Gutenberg 
		if ( PostFormatID == 'video' ) {
			jQuery('.cmb2-id--ftagementor-video-url').show();
			jQuery('.cmb2-id--ftagementor-local-video-url').show();
		}else{
			jQuery('.cmb2-id--ftagementor-video-url').hide();
			jQuery('.cmb2-id--ftagementor-local-video-url').hide();
		}
		if ( PostFormatID == 'audio' ) {
			jQuery('.cmb2-id--ftagementor-audio-url').show();
		}else{
			jQuery('.cmb2-id--ftagementor-audio-url').hide();
		}
		if ( PostFormatID == 'gallery' ) {
			jQuery('.cmb2-id--ftagementor-gallery-slider').show();
		}else{
			jQuery('.cmb2-id--ftagementor-gallery-slider').hide();
		}
		if ( PostFormatID == 'quote' ) {
			jQuery('.cmb2-id--ftagementor-city-text').show();
		}else{
			jQuery('.cmb2-id--ftagementor-city-text').hide();
		}

		// Post Format aditional field
		if ( PostFormatID == '0' || PostFormatID == 'link' ) {
			jQuery('#_ftagementor__ftagementor_post_format_optons').hide();
		}else{
			jQuery('#_ftagementor__ftagementor_post_format_optons').show();
		}

		// When change post formate value
		$(document).on('change', 'select[id*="post-format"]',function(){

			var PostFormatID = this.value;

			jQuery('.cmb2-id--ftagementor-video-url').hide();
			jQuery('.cmb2-id--ftagementor-audio-url').hide();
			jQuery('.cmb2-id--ftagementor-city-text').hide();
			jQuery('.cmb2-id--ftagementor-gallery-slider').hide();
			jQuery('.cmb2-id--ftagementor-local-video-url').hide();

			if ( PostFormatID == 'video' ) {
				jQuery('.cmb2-id--ftagementor-video-url').show();
				jQuery('.cmb2-id--ftagementor-local-video-url').show();
			}else{
				jQuery('.cmb2-id--ftagementor-video-url').hide();
				jQuery('.cmb2-id--ftagementor-local-video-url').hide();
			}
			if ( PostFormatID == 'audio' ) {
				jQuery('.cmb2-id--ftagementor-audio-url').show();
			}else{
				jQuery('.cmb2-id--ftagementor-audio-url').hide();
			}
			if ( PostFormatID == 'gallery' ) {
				jQuery('.cmb2-id--ftagementor-gallery-slider').show();
			}else{
				jQuery('.cmb2-id--ftagementor-gallery-slider').hide();
			}
			if ( PostFormatID == 'quote' ) {
				jQuery('.cmb2-id--ftagementor-city-text').show();
			}else{
				jQuery('.cmb2-id--ftagementor-city-text').hide();
			}

			// Post Format aditional field
			if ( PostFormatID == 'standard' || PostFormatID == 'link' ) {
				jQuery('#_ftagementor__ftagementor_post_format_optons').hide();
			}else{
				jQuery('#_ftagementor__ftagementor_post_format_optons').show();
			}

		});
	}

})(jQuery);