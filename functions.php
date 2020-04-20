<?php
require 'kint.phar';
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Register Custom Post Type for Spec Next Game
function sng_post() {

	$labels = array(
		'name'                  => _x( 'SNG Posts', 'Post Type General Name', 'sngtext' ),
		'singular_name'         => _x( 'SNG post', 'Post Type Singular Name', 'sngtext' ),
		'menu_name'             => __( 'SNG Posts', 'sngtext' ),
		'name_admin_bar'        => __( 'SNG Posts', 'sngtext' ),
		'archives'              => __( 'Item Archives', 'sngtext' ),
		'attributes'            => __( 'Item Attributes', 'sngtext' ),
		'parent_item_colon'     => __( 'Parent Item:', 'sngtext' ),
		'all_items'             => __( 'All Items', 'sngtext' ),
		'add_new_item'          => __( 'Add New Item', 'sngtext' ),
		'add_new'               => __( 'Add New', 'sngtext' ),
		'new_item'              => __( 'New Item', 'sngtext' ),
		'edit_item'             => __( 'Edit Item', 'sngtext' ),
		'update_item'           => __( 'Update Item', 'sngtext' ),
		'view_item'             => __( 'View Item', 'sngtext' ),
		'view_items'            => __( 'View Items', 'sngtext' ),
		'search_items'          => __( 'Search Item', 'sngtext' ),
		'not_found'             => __( 'Not found', 'sngtext' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sngtext' ),
		'featured_image'        => __( 'Featured Image', 'sngtext' ),
		'set_featured_image'    => __( 'Set featured image', 'sngtext' ),
		'remove_featured_image' => __( 'Remove featured image', 'sngtext' ),
		'use_featured_image'    => __( 'Use as featured image', 'sngtext' ),
		'insert_into_item'      => __( 'Insert into item', 'sngtext' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'sngtext' ),
		'items_list'            => __( 'Items list', 'sngtext' ),
		'items_list_navigation' => __( 'Items list navigation', 'sngtext' ),
		'filter_items_list'     => __( 'Filter items list', 'sngtext' ),
	);
	$args = array(
		'label'                 => __( 'SNG post', 'sngtext' ),
		'description'           => __( 'Game or App', 'sngtext' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( 'sng_post_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'sng_post', $args );

}
add_action( 'init', 'sng_post', 0 );

// Register Custom Taxonomy
function sng_post_category() {

	$labels = array(
		'name'                       => _x( 'SNG Categories', 'Taxonomy General Name', 'sngtext' ),
		'singular_name'              => _x( 'SNG Category', 'Taxonomy Singular Name', 'sngtext' ),
		'menu_name'                  => __( 'SNG Categories', 'sngtext' ),
		'all_items'                  => __( 'All Items', 'sngtext' ),
		'parent_item'                => __( 'Parent Item', 'sngtext' ),
		'parent_item_colon'          => __( 'Parent Item:', 'sngtext' ),
		'new_item_name'              => __( 'New Item Name', 'sngtext' ),
		'add_new_item'               => __( 'Add New Item', 'sngtext' ),
		'edit_item'                  => __( 'Edit Item', 'sngtext' ),
		'update_item'                => __( 'Update Item', 'sngtext' ),
		'view_item'                  => __( 'View Item', 'sngtext' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'sngtext' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'sngtext' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sngtext' ),
		'popular_items'              => __( 'Popular Items', 'sngtext' ),
		'search_items'               => __( 'Search Items', 'sngtext' ),
		'not_found'                  => __( 'Not Found', 'sngtext' ),
		'no_terms'                   => __( 'No items', 'sngtext' ),
		'items_list'                 => __( 'Items list', 'sngtext' ),
		'items_list_navigation'      => __( 'Items list navigation', 'sngtext' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'sng_category', array( 'sng_post' ), $args );

}
add_action( 'init', 'sng_post_category', 0 );