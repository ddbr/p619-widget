<?php
/*
Plugin Name: P619 image Widget
Plugin URI: http://p619.ch
Description: P619 Image Tile Widget
Author: Daniel Bräker
Version: 1
Author URI: http://p619.ch
*/

require( dirname(__FILE__) . '/p619-image-widget.php' );

// register P619_image_widget widget
function register_p619_image_widget() {
    register_widget( 'P619_image_widget' );
}
add_action( 'widgets_init', 'register_p619_image_widget' );

require( dirname(__FILE__) . '/p619-text-widget.php' );

// register P619_text_widget widget
function register_p619_text_widget() {
    register_widget( 'P619_text_widget' );
}
add_action( 'widgets_init', 'register_p619_text_widget' );
?>
