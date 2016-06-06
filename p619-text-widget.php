<?php

class P619_text_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'p619_text_widget', // Base ID
			__( 'P619 Text Widget', 'text_domain' ), // Name
			array( 'description' => __( 'Kachel mit Bild', 'text_domain' ), ) // Args
		);
		//add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
		add_action('wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
	}

	public function register_plugin_styles() {
		wp_register_style( 'P619_text_widget', plugins_url( 'p619-widget/p619-text-widget.css' ) );
		wp_enqueue_style( 'P619_text_widget' );
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
		$txt_h1 = apply_filters( 'widget_title', $instance['title'] );
		$txt_p = apply_filters( 'widget_text', $instance['text'] );
		?>
		<div class="outer">
		  <div class="box" style="
					padding-top: <?php echo $imgheight ?>%;
				">
		  </div>
		  <div class="inner">
		    <h1><?php echo $txt_h1; ?></h1>
		    <p><?php echo $txt_p; ?></p>
		  </div>
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
		$img_height = ! empty( $instance['img_height'] ) ? $instance['img_height'] : __( 'New img_height', 'text_domain' );
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'img_height' ) ); ?>"><?php _e( esc_attr( 'Image Height:' ) ); ?></label>
			<input type="number" name="<?php echo esc_attr( $this->get_field_name( 'img_height' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'img_height' ) ); ?>" min="0" max="100" step="1" value="<?php echo esc_attr( $img_height ); ?>">
			<label for="<?php echo esc_attr( $this->get_field_id( 'img_height' ) ); ?>"><?php _e( esc_attr( '%' ) ); ?></label>
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

} // class P619_text_widget

?>
