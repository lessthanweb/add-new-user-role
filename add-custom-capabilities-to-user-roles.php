<?php
/*
Plugin Name: lessthanweb. How To: Add Custom Capabilities To User Roles
Plugin URI: https://www.lessthanweb.com/blog/add-custom-capabilities-to-user-roles
Description: lessthanweb. How To: Add Custom Capabilities To User Roles example code.
Version: 1.0
Author: lessthanweb.
Author URI: https://www.lessthanweb.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: lessthanweb
*/

/*
lessthanweb. How To: Add Custom Capabilities To User Roles is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
lessthanweb. How To: Add Custom Capabilities To User Roles is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Add Additional Fields To The User Profile. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// Make sure we don't expose any info if called directly
if ( ! function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	die();
}

/**
 * Assign new custom capability to the existing WordPress role.
 * In this case the existing role will be the default WordPress role called "contributor".
 *
 * @param	void 
 * @return	void
 *
 */
function lessthanweb_assign_new_capability() {
	//	Get Contributor role
	$contributor = get_role( 'contributor' );

    //	Now we call the WP_Roles method with our custom capability :)
    $contributor->add_cap( 'can_sit_at_kings_table', true );
}
register_activation_hook( __FILE__, 'lessthanweb_assign_new_capability' );

/**
 * Remove the custom role capability on plugin deactivation.
 *
 * @param	void 
 * @return	void
 *
 */
function lessthanweb_remove_capability() {
	//	Get Contributor role
	$contributor = get_role( 'contributor' );
	
	//	Simply call the function with the capability name.
	$contributor->remove_cap( 'can_sit_at_kings_table' );
}
register_deactivation_hook( __FILE__, 'lessthanweb_remove_capability' );