<?php
/**
 * The header for our theme.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ftagementor
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ) ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<?php wp_head(); ?>
	
</head>
<body <?php body_class('ftagementor-maintenance-mode'); ?>>
	<div class="ftagementor-page-maintenance-content">
		<?php 
			$ftagementor_opt = ftagementor_get_opt();
			$maintenance_template = ( isset( $ftagementor_opt['ftagementor_select_template'] ) && !empty( $ftagementor_opt['ftagementor_select_template'] ) ) ? $ftagementor_opt['ftagementor_select_template'] : '' ;

			if ( !empty( $maintenance_template ) ) {
				echo apply_filters( 'the_content', get_post_field( 'post_content', $maintenance_template ) );
			} else { ?>

				<div class="maintenance-default-content">
					<div class="maintenance-default-content-inner">
						<h2><?php esc_html_e('Maintenance mode active', 'ftagementor'); ?></h2>
						<h6><?php esc_html_e('example.com is undergoing scheduled maintenance.', 'ftagementor'); ?></h6>
						<h6><?php esc_html_e('Sorry for the inconvenience.', 'ftagementor'); ?></h6>
					</div>
				</div>

			<?php }

		 ?>
	</div><!-- /.page-maintenance -->
<?php wp_footer(); ?>
</body>
</html>