<?php
//This is Local Dealer
$ecf_prefix = 'locations-departments';
$ecf_labels = array(
	'name'                  => __( 'Locations Departments', 'Post Type General Name', $ecf_prefix ),
	'singular_name'         => __( 'Locations Departments', 'Post Type Singular Name', $ecf_prefix ),
	'menu_name'             => __( 'Locations Departments', $ecf_prefix ),
	'name_admin_bar'        => __( 'Locations Departments', $ecf_prefix ),
	'archives'              => __( 'Item Archives', $ecf_prefix ),
	'attributes'            => __( 'Item Attributes', $ecf_prefix ),
	'parent_item_colon'     => __( 'Parent Item:', $ecf_prefix ),
	'all_items'             => __( 'All Items', $ecf_prefix ),
	'add_new_item'          => __( 'Add New Item', $ecf_prefix ),
	'add_new'               => __( 'Add New', $ecf_prefix ),
	'new_item'              => __( 'New Item', $ecf_prefix ),
	'edit_item'             => __( 'Create New Slider', $ecf_prefix ),
	'update_item'           => __( 'Update Item', $ecf_prefix ),
	'view_item'             => __( 'View Item', $ecf_prefix ),
	'view_items'            => __( 'View Items', $ecf_prefix ),
	'search_items'          => __( 'Search Item', $ecf_prefix ),
	'not_found'             => __( 'Not found', $ecf_prefix ),
	'not_found_in_trash'    => __( 'Not found in Trash', $ecf_prefix ),
	'featured_image'        => __( 'Featured Image', $ecf_prefix ),
	'set_featured_image'    => __( 'Set featured image', $ecf_prefix ),
	'remove_featured_image' => __( 'Remove featured image', $ecf_prefix ),
	'use_featured_image'    => __( 'Use as featured image', $ecf_prefix ),
	'insert_into_item'      => __( 'Insert into item', $ecf_prefix ),
	'uploaded_to_this_item' => __( 'Uploaded to this item', $ecf_prefix ),
	'items_list'            => __( 'Items list', $ecf_prefix ),
	'items_list_navigation' => __( 'Items list navigation', $ecf_prefix ),
	'filter_items_list'     => __( 'Filter items list', $ecf_prefix ),
);

	$ecf_args = array(
			  'label'               => __( 'Locations Departments', $ecf_prefix),
			  'labels'                => $ecf_labels,
			  'description'         => __( 'Local Dealer Search' ),
			  'supports'            => array( 'title'),
			  'hierarchical'        => false,
			  'public'              => true,
			  'show_ui'             => true,
			  'show_in_menu'        => 'edit.php?post_type=locations_dep',
			  'show_in_nav_menus'   => true,
			  'show_in_admin_bar'   => true,
			  'menu_position'       => 5,
			  'can_export'          => true,
			  'has_archive'         => true,
			  'exclude_from_search' => false,
			  'publicly_queryable'  => true,
			  'capability_type'     => 'post',
	);

 
  register_post_type('locations_dep', $ecf_args);



