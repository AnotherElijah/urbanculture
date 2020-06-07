<?php 
/**
 * Adds short subscribe social Widget.
 */
 if( !class_exists('FtageMentor_subscribe_Widget') ){
	class FtageMentor_subscribe_Widget extends WP_Widget{
		/**
		 * Register widget with WordPress.
		 */
		function __construct(){
			$widget_ops = array( 'subscribe' => esc_html__('Our Subscribe Social  .','ftagementor'),'customize_selective_refresh' => true, );
			parent:: __construct('FtageMentor_subscribe_Widget', esc_html__('Ftage: Subscribe Social','ftagementor'),$widget_ops );
		}
		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget($args, $instance){
			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			$facebook   = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
			$google   = isset( $instance['google'] ) ? $instance['google'] : '';
			$twitter   = isset( $instance['twitter'] ) ? $instance['twitter'] : '';
			$youtube   = isset( $instance['youtube'] ) ? $instance['youtube'] : '';
			$linked   = isset( $instance['linked'] ) ? $instance['linked'] : '';
			$pinterest   = isset( $instance['pinterest'] ) ? $instance['pinterest'] : '';

			?>
			<?php echo wp_kses_post( $args['before_widget']); 

			if ( !empty( $title ) ) {
			 	echo wp_kses_post( $args['before_title'] ); echo esc_html( $title ); echo wp_kses_post( $args['after_title'] );
			 }  ?>
				<div class="sidebar-social">
	
					<ul>
						<?php if( $twitter ): ?>
						
						<li class="twitter">
							<a class="twitter" href="<?php echo esc_url( $twitter ); ?>" title="Twitter">
								<span class="fa fa-twitter"></span>
							</a>
						</li>

						<?php endif; if( $pinterest ): ?>
						<li class="pinterest">
							<a class="pinterest" href="<?php echo esc_url( $pinterest ); ?>" title="Pinterest">
								<span class="fa fa-pinterest"></span>
							</a>
						</li>

						<?php endif; if( $facebook ):?>
						<li class="facebook">
							<a class="facebook" href="<?php echo esc_url( $facebook ); ?>" title="Facebook">
								<span class="fa fa-facebook"></span>
							</a>
						</li>

						<?php endif; if( $google ): ?>
						<li class="google">
							<a class="google-plus" href="<?php echo esc_url( $google ); ?>" title="Google Plus">
								<span class="fa fa-google"></span>
							</a>
						</li>

						<?php endif; if( $youtube ): ?>
						<li class="youtube">
							<a class="youtube" href="<?php echo esc_url( $youtube ); ?>" title="YouTube">
								<span class="fa fa-youtube"></span>
							</a>
						</li>

						<?php endif; if( $linked ): ?>
						<li class="linked">
							<a class="linked" href="<?php echo esc_url( $linked ); ?>" title="Linkedin">
								<span class="fa fa-linkedin"></span>
							</a>
						</li>

						<?php endif; ?>
					</ul>

				</div>
			<?php echo wp_kses_post( $args['after_widget'] ); ?>

			<?php
		}
		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update($new_instance, $old_instance){
			$instace = array();
			$instance['title'] = ( !empty($new_instance['title']) ) ? strip_tags ( $new_instance['title'] ) : '';
			$instance['facebook']   = ( !empty($new_instance['facebook']) ) ? strip_tags ( $new_instance['facebook'] ) : '';
			$instance['google']   = ( !empty($new_instance['google']) ) ? strip_tags ( $new_instance['google'] ) : '';
			$instance['twitter']   = ( !empty($new_instance['twitter']) ) ? strip_tags ( $new_instance['twitter'] ) : '';
			$instance['youtube']   = ( !empty($new_instance['youtube']) ) ? strip_tags ( $new_instance['youtube'] ) : '';
			$instance['linked']   = ( !empty($new_instance['linked']) ) ? strip_tags ( $new_instance['linked'] ) : '';
			$instance['pinterest']   = ( !empty($new_instance['pinterest']) ) ? strip_tags ( $new_instance['pinterest'] ) : '';
			return $instance;
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form($instance){
			$title = !empty($instance['title']) ? $instance['title'] : '';
			$facebook = !empty($instance['facebook']) ? $instance['facebook'] : '';
			$google = !empty($instance['google']) ? $instance['google'] : '';
			$twitter = !empty($instance['twitter']) ? $instance['twitter'] : '';
			$youtube = !empty($instance['youtube']) ? $instance['youtube'] : '';
			$linked = !empty($instance['linked']) ? $instance['linked'] : '';
			$pinterest = !empty($instance['pinterest']) ? $instance['pinterest'] : '';
		?>
			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:' ,'ftagementor') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_html( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php echo esc_html__('Facebook Link:' ,'ftagementor') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" value="<?php echo esc_attr( $facebook ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('google')); ?>"><?php echo esc_html__('Google Plus Link:' ,'ftagementor') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('google')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('google')); ?>" value="<?php echo esc_attr( $google ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php echo esc_html__('Twitter Link:' ,'ftagementor') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" value="<?php echo esc_attr( $twitter ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php echo esc_html__('Youtube Link:' ,'ftagementor') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" value="<?php echo esc_attr( $youtube ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('linked')); ?>"><?php echo esc_html__('Linkedin Link:' ,'ftagementor') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('linked')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('linked')); ?>" value="<?php echo esc_attr( $linked ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php echo esc_html__('Pinterest Link:' ,'ftagementor') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" value="<?php echo esc_attr( $pinterest ); ?>" />
			</p>
		<?php
		}
	}
}
// register Short description widget
function FtageMentor_subscribe_Widget() {
    register_widget( 'FtageMentor_subscribe_Widget' );
}
add_action( 'widgets_init', 'FtageMentor_subscribe_Widget' );