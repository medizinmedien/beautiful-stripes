<?php
/*
Plugin Name: A beautiful stripe pattern.
Version: 1.1
Author: Frank St&uuml;rzebecher
Author URI: http://www.hostz.at/
Description: A beautiful white-red stripe pattern to mark non production servers.
GitHub Plugin URI: https://github.com/medizinmedien/beautiful-stripes
*/

// Secure against direct access.
defined( 'ABSPATH' ) || exit();

// CONSTANTS
define(   'LINODE_PRODUCTION_SERVER_IP', '176.58.123.179' );
define( 'JIFFYBOX_PRODUCTION_SERVER_IP', '185.21.101.148' );

define( 'PRODUCTION_SERVER_IP', JIFFYBOX_PRODUCTION_SERVER_IP );

/**
 * Set a warning body style for all server IP addresses which are not the
 * production server IP address. This avoids mistakes when working with a mix
 * of testing and production instances by visual markers.
 */
function body_marker_not_production() {
	if( $_SERVER['SERVER_ADDR'] != PRODUCTION_SERVER_IP ) {
		/* We make a switch here because in admin #wpwrap overlaps body - so we need only one of them */ ?>
		<style><?php print is_admin() ? '#wpwrap' : 'body,#login-wrapper'; ?>{border:10px dashed red !important;}</style><?php
	}
}
add_action( 'admin_head', 'body_marker_not_production' );
add_action(    'wp_head', 'body_marker_not_production' );
add_action( 'login_head', 'body_marker_not_production' );


