<?php

// registration code for gallery post type
function register_gallery_posttype() {
	$labels = array(
		'name' 				=> __( 'Galleries', 'post type general name' ),
		'singular_name'		=> __( 'Gallery', 'post type singular name' ),
		'add_new' 			=> __( 'Add New', 'Gallery'),
		'add_new_item' 		=> __( 'Add New Gallery '),
		'edit_item' 		=> __( 'Edit Gallery '),
		'new_item' 			=> __( 'New Gallery '),
		'view_item' 		=> __( 'View Gallery '),
		'search_items' 		=> __( 'Search Galleries '),
		'not_found' 		=>  __( 'No Gallery found' ),
		'not_found_in_trash'=> __( 'No Galleries found in Trash' ),
		'parent_item_colon' => ''
	);
	
	$taxonomies = array();
	
	$supports = array('title','editor','thumbnail');
	
	$post_type_args = array(
		'labels' 			=> $labels,
		'singular_label' 	=> __('Gallery'),
		'public' 			=> true,
		'show_ui' 			=> true,
		'publicly_queryable'=> true,
		'query_var'			=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> true,
		'hierarchical' 		=> false,
		'rewrite' 			=> array('slug' => '', 'with_front' => true ),
		'supports' 			=> $supports,
		'menu_position' 	=> 7,
		//'menu_icon' 		=> '',
		'taxonomies'		=> $taxonomies
	 );
	 register_post_type('gallery',$post_type_args);
}
add_action('init', 'register_gallery_posttype');	

