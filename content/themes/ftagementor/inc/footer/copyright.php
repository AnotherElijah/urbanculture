<?php 
	$ftagementor_opt = ftagementor_get_opt();
	$column = '';
	if($ftagementor_opt['ftagementor_copyright_column']== '1'){
		$column = 12 .' text-center';
	}elseif($ftagementor_opt['ftagementor_copyright_column']== '3'){
		$column = 4;
	}else{
		$column = 6;
	}
?>

<div class="col-sm-<?php echo esc_attr( $column ); ?> col-xs-12">
	<div class="copyright-text">
		<p><?php 
			$ftagementor_opt = ftagementor_get_opt();
			if(isset( $ftagementor_opt['ftagementor_copyright'] ) && $ftagementor_opt['ftagementor_copyright']!=='' ){
				echo wp_kses( $ftagementor_opt['ftagementor_copyright'] , array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'br' => array(),
					'em' => array(),
					'strong' => array(),
					'img' => array(
						'src' => array(),
						'alt' => array()
					),
				));
			}else{  
				esc_html_e('Copyright', 'ftagementor'); ?>&copy; <?php echo date("Y").' '. esc_html(get_bloginfo('name'));  esc_html_e(' All Rights Reserved.', 'ftagementor' ); 
			}
		?></p>
	</div>
</div>

