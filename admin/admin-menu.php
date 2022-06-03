<?php // Email Form - Admin Menu
if ( ! defined( 'ABSPATH' ) ) {exit;}

// add top-level administrative menu
function ecf_add_toplevel_menu() {
	
	/* 
	
	add_menu_page(
		string   $page_title, 
		string   $menu_title, 
		string   $capability, 
		string   $menu_slug, 
		callable $function = '', 
		string   $icon_url = '', 
		int      $position = null 
	)
	
	*/
	
	add_menu_page(
		esc_html__('Email Custom Fields Settings', 'ecf'),
		esc_html__('Email Custom Fields', 'ecf'),
		'manage_options',
		'email_custom_fields',
		'ecf_display_settings_page',
		'dashicons-email-alt',
		7
	);
	
}
 add_action( 'admin_menu', 'ecf_add_toplevel_menu' );