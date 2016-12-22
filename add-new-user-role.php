<?php
/*
Plugin Name: lessthanweb. How To: Add New User Role
Plugin URI: https://www.lessthanweb.com/blog/add-new-user-role
Description: lessthanweb. How To: Add New User Role example code.
Version: 1.0
Author: lessthanweb.
Author URI: https://www.lessthanweb.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: lessthanweb
*/

/*
lessthanweb. How To: Add New User Role is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
lessthanweb. How To: Add New User Role is distributed in the hope that it will be useful,
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
 * Create new user role on plugin activation.
 *
 * @param	void 
 * @return	void
 *
 */
function lessthanweb_create_new_role() {
	//	Call the function for creating new role and set some capabilities.
	add_role( 'king', __( 'King Himself', 'lessthanweb' ), array( 
		'delete_posts' => true, 
		'delete_published_posts' => true, 
		'edit_published_posts' => true, 
		'published_posts' => true, 
		'read' => true, 
		'upload_files' => true, 
	) );
}
register_activation_hook( __FILE__, 'lessthanweb_create_new_role' );

/**
 * Remove the role we made on plugin activation.
 *
 * @param	void 
 * @return	void
 *
 */
function lessthanweb_remove_role() {
	//	Simply call the function with the role name.
	remove_role( 'king' );
}
register_deactivation_hook( __FILE__, 'lessthanweb_remove_role' );