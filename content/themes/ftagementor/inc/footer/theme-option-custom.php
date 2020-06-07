<?php
/**
 * Custom footer template
 *
 * @package ftagementor
 */

$ftagementor_opt = ftagementor_get_opt();

$ftagementor_select_footer_template_id = ( !empty($ftagementor_opt['ftagementor_select_footer_template']) ) ? $ftagementor_opt['ftagementor_select_footer_template'] : ' ' ;

/**
* Enable Footer Fixed effect
*/
$footer_template = get_post_meta( $ftagementor_select_footer_template_id, '_ftagementor_fixed_footer_enable', true );
$foo_fixed_enable = !empty( $footer_template ) ? $footer_template : '' ;


$footer_classes[] = '';

if ( '' != $foo_fixed_enable && 'no' != $foo_fixed_enable ) { $footer_classes[] = 'fixed-footer-enable'; } 
?>
<footer class="footer-wrapper <?php echo esc_attr(join( ' ', $footer_classes )) ?>">
<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $ftagementor_select_footer_template_id ) ) ?>
</footer>