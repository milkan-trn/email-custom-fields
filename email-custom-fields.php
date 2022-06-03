<?php
/**
 * @wordpress-plugin
 * Plugin Name:      	Email Custom Fields - kidsFirst
 * Plugin URI:        	https://www.brainstorm.rs/
 * Description:         Email Custom Fields has predesignated templates that you can use for your email
 * Version:           	0.1.3
 * Requires at least: 	5.3
 * Requires PHP:      	7.3
 * Author:            	Milkan Trninic brainstorm.rs
 * Author URI:         	https://profiles.wordpress.org/milkan2002/
 * Text Domain:       	email-custom-fields
 * License:           	GPLv2 or later
 * License URI:       	http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: 	https://github.com/milkan-trn/email-custom-fields
 */
/*
Thanks https://www.brainstorm.rs/ for supporting this plugin.
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/
defined('ABSPATH') or die('Nothing Here!');


if (!class_exists('Emcf_email_custom_fields')) {
    class Emcf_email_custom_fields
    { 

        function __construct() {
            // include plugin dependencies: admin only
            if ( is_admin() ) {
                include_once plugin_dir_path(__FILE__) .'inc/metaboxes/location_metaboxes.php';
                require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
                require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
                require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
                require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
                require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';   
            }
            add_action('init', [$this, 'ecf_custom_post_type']);
            include_once plugin_dir_path(__FILE__) .'templates/newsletter/newsletter.php';
            include_once plugin_dir_path(__FILE__) .'templates/contactForm01/contact.php';
            include_once plugin_dir_path(__FILE__) .'templates/contactForm02/contact.php';
       
       
        }
        function ecf_custom_post_type()
        {
            if (current_user_can('editor') || current_user_can('administrator')) {
                include_once plugin_dir_path(__FILE__) . 'admin/post-types.php'; 
            }
        }
//activate, deactivate plugin functions 
function activate()
{
    flush_rewrite_rules();
}

function deactivate()
{
    flush_rewrite_rules();
}

    }
}

$emcf_email_fields = new Emcf_email_custom_fields();

register_activation_hook(__FILE__, [$emcf_email_fields, 'activate']);
register_deactivation_hook(__FILE__, [$emcf_email_fields, 'deactivate']);

 