<?php
/*
Plugin Name: WP Utilities Open Sans
Description: Use an embedded version of the font Open Sans, and bypasses Google Fonts in WP Admin
Version: 0.2
Author: Darklg
Author URI: http://darklg.me/
License: MIT License
License URI: http://opensource.org/licenses/MIT
*/

add_action( 'wp_enqueue_scripts', 'wpu_opensans_enqueue_style' );
add_action( 'admin_enqueue_scripts', 'wpu_opensans_enqueue_style' );
add_action( 'login_init', 'wpu_opensans_enqueue_style' );

function wpu_opensans_enqueue_style() {
	global $wp_styles;
	if ( !is_a($wp_styles, 'WP_Styles') ) {
		$wp_styles = new WP_Styles();
	}
	if ( !empty($wp_styles->registered['open-sans']) && strpos($wp_styles->registered['open-sans']->src, site_url()) !== 0 ) {
		$wp_styles->registered['open-sans']->src = plugins_url( '/assets/css/open-sans.css', __FILE__ );
	}
}
