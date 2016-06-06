<?php

class P619_image_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'p619_image_widget', // Base ID
			__( 'P619 Image Widget', 'text_domain' ), // Name
			array( 'description' => __( 'Kachel mit Bild', 'text_domain' ), ) // Args
		);
		add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
		add_action('wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
	}

	/**
	* Upload the Javascripts for the media uploader
	*/
	public function upload_scripts() {
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('upload_media_widget', plugin_dir_url(__FILE__) . 'upload-media.js', array('jquery'));
		wp_enqueue_style('thickbox');
	}

	public function register_plugin_styles() {
		wp_register_style( 'P619_image_widget', plugins_url( 'p619-widget/p619_image_widget.css' ) );
		wp_enqueue_style( 'P619_image_widget' );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$img_id = apply_filters( 'widget_image', $instance['image'] );
		$img_src = wp_get_attachment_url( $img_id );
		/*if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		if ( ! empty( $instance['text'] ) ) {
			echo $args['before_text'] . apply_filters( 'widget_text', $instance['text'] ) . $args['after_text'];
		}
		echo __( esc_attr( 'Hello, World!' ), 'text_domain' );*/
		?>
		<div class="outer">
		  <div class="back" style="background-image: url(<?php echo $img_src ?>)"></div>
		</div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		$text = ! empty( $instance['text'] ) ? $instance['text'] : __( 'New text', 'text_domain' );
		$image = ! empty( $instance['image'] ) ? $instance['image'] : __( 'New image', 'text_domain' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php _e( esc_attr( 'Text:' ) ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_attr( $image ); ?>" />
			<input class="upload_image_button button button-primary" type="button" value="Upload Image" />
		</p>
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
	public function update( $new_instance, $old_instance ) {
		// update logic goes here
		$updated_instance = $new_instance;
		return $updated_instance;
	}

} // class P619_image_widget

?>
