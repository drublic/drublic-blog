<?php

$general_details = array (
		
		array(
		  'name'        => 'some-name',
			'std'         => '',
			'type'        => 'text',
			'title'       => __('Some Text:', $theme_code),
			'description' => '')
			
  );


function general_details () {
  global $general_details;
  bo_styles();
  new_meta_boxes( false, $general_details);
}

function create_meta_box () {
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'general_details', __('General Information', $theme_code), 'general_details', 'post', 'normal', 'high' );
	}
}