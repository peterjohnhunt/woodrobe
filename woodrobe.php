<?php
/*
Plugin Name: WooDrobe
Plugin URI: https://github.com/peterjohnhunt/woodrobe
Version: 1.0.0
Author: PeterJohn Hunt and Jeff Calaway
Description: Woocommerce Cart, Account, and Shop pages styling.
*/

function woodrobe_styles() {

    wp_enqueue_style( 'woodrobe_css', plugin_dir_url( __FILE__ ) . '/css/woodrobe.css' );

}

add_action( 'wp_enqueue_scripts', 'woodrobe_styles' );
