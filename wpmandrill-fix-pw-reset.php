<?php
/**
 * Plugin Name: wpMandrill Password Reset Email Fix
 * Plugin URI: http://www.josheaton.org/
 * Description: Fixes WordPress password reset emails that are mangled by the wpMandrill.
 * Version: 0.1.0
 * Author: Josh Eaton
 * Author URI: http://www.josheaton.org/
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

add_filter( 'mandrill_nl2br', 'wpmandrill_fix_pw_reset', 10, 2 );
/**
 * Add the nl2br filter to only the password reset email
 *
 * @param  bool $nl2br
 * @param  array $message
 * @return bool
 */
function wpmandrill_fix_pw_reset( $nl2br, $message ) {
	if ( in_array( 'wp_retrieve_password', $message['tags']['automatic'] ) ) {
		$nl2br = true;
	}
	return $nl2br;
}
