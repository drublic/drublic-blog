<?php

$general_details = array (

		array(
		  'name'        => 'posts-header',
			'std'         => '',
			'type'        => 'textarea',
			'title'       => __('Header HTML:', $theme_code),
			'description' => ''),

		array(
		  'name'        => 'linked_list_url',
			'std'         => '',
			'type'        => 'text',
			'title'       => __('Linked List URL:', $theme_code),
			'description' => '')

  );


function general_details () {
  global $general_details;
  new_options( 'posts', false, $general_details);
}

function create_meta_box () {
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'general_details', __('General Information', $theme_code), 'general_details', 'post', 'normal', 'high' );
	}
}

add_action('admin_menu', 'create_meta_box');





