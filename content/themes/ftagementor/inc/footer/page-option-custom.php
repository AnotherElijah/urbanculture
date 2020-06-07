<?php
/**
 * Custom Footer template
 *
 * @package ftagementor
 */
$footer_template = get_post_meta( get_the_id(),'_ftagementor_select_footer_template',true );
$page_select_footer_template = !empty($footer_template)  ? $footer_template : ' ' ;


/**
* Enable Footer Fixed effect
*/
$fixed_footer = get_post_meta( $page_select_footer_template, '_ftagementor_fixed_footer_enable', true );
$foo_fixed_enable = !empty($fixed_footer) ? $fixed_footer : '' ;


$footer_classes[] = '';

if ( '' != $foo_fixed_enable && 'no' != $foo_fixed_enable ) { $footer_classes[] = 'fixed-footer-enable'; } ?>

<footer class="footer-wrapper <?php echo esc_attr(join( ' ', $footer_classes )); ?>">
	<?php echo wp_kses_post(apply_filters( 'the_content', get_post_field( 'post_content', $page_select_footer_template ) )); ?>
</footer>