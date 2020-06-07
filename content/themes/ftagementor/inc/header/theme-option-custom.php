<?php
/**
* Custom header template
*
* @package ftagementor
*/

$ftagementor_opt = ftagementor_get_opt();
$ftagementor_select_header_template_id = ( !empty($ftagementor_opt['ftagementor_select_header_template']) ) ? $ftagementor_opt['ftagementor_select_header_template'] : ' ' ;

/**
* Header sticky enable
*/
$ftagementor_page_header_sticky = ( !empty( get_post_meta( $ftagementor_select_header_template_id, '_ftagementor_header_sticky', true ) ) ) ? get_post_meta( $ftagementor_select_header_template_id, '_ftagementor_header_sticky', true ) : '' ;
$header_classes[] = '';
if ( '' != $ftagementor_page_header_sticky && 'no' != $ftagementor_page_header_sticky ) { 
	$header_classes[] = 'header-sticky'; 
} 

/**
* Header Transparent
*/
$header_transparent_enable = ( !empty( get_post_meta( $ftagementor_select_header_template_id, '_ftagementor_header_transparent', true ) ) ) ? get_post_meta( $ftagementor_select_header_template_id, '_ftagementor_header_transparent', true ) : '' ;	
if ( '' != $header_transparent_enable && 'no' != $header_transparent_enable ) { 
	$header_classes[] = 'header-transparent'; 
}

?>
<header class="header-wrapper clearfix <?php echo esc_attr(join( ' ', $header_classes )) ?>"> 
	<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $ftagementor_select_header_template_id ) ) ?>
</header>
