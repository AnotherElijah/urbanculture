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
	<div class="footer-copyright-menu">
	
		<?php wp_nav_menu(array(
			'theme_location' => 'copyright-menu',
			'container'      => false,
		)); ?>
	</div>
</div>