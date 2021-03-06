<?php
/*
Plugin Name: WooDrobe
Plugin URI: https://github.com/peterjohnhunt/woodrobe
Version: 1.0.0
Author: PeterJohn Hunt and Jeff Calaway
Description: Woocommerce Cart, Account, and Shop pages styling.
*/

include('includes/woodrobe-helper.php');

/* Initializes Style */
function woodrobe_styles() {
    wp_enqueue_style( 'woodrobe_css', plugin_dir_url( __FILE__ ) . 'css/woodrobe.css' );
}
add_action( 'wp_enqueue_scripts', 'woodrobe_styles' );

/* Initializes JavaScript */
function woodrobe_js() {
    wp_enqueue_script( 'woodrobejs', plugin_dir_url( __FILE__ ) . 'js/woodrobe.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'woodrobe_js' );

/* Removes Sidebar */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/* Adds Toggle Buttons to Login Page */
function woodrobe_form_login(){
    woodrobe_get_template_part( 'accessories/form-login' );
}
add_action( 'woocommerce_after_customer_login_form', 'woodrobe_form_login');

function woodrobe_gateway_icon( $icon, $gatewayID ){

    $icon = str_replace('https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg', plugin_dir_url( __FILE__ ).'/assets/AM_mc_vs_dc_ae.png' , $icon);

    return $icon;
}
add_filter( 'woocommerce_gateway_icon', 'woodrobe_gateway_icon', 10, 2 );

function woodrobe_body_class( $classes ) {

    if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
        $classes[] = 'woodrobe';
    }
    return $classes;

}
add_filter( 'body_class','woodrobe_body_class' );

function woodrobe_activate() {
    update_option( 'woocommerce_calc_shipping', 'yes' );
    update_option( 'woocommerce_enable_myaccount_registration', 'yes' );
}
register_activation_hook( __FILE__, 'woodrobe_activate' );
