<?php
// /**
//  * Registering meta boxes
//  *
//  * All the definitions of meta boxes are listed below with comments.
//  * Please read them CAREFULLY.
//  *
//  * You also should read the changelog to know what has been changed before updating.
//  *
//  * For more information, please visit:
//  * @link http://metabox.io/docs/registering-meta-boxes/
//  */


// add_filter( 'rwmb_meta_boxes', '_register_meta_boxes' );

// /**
//  * Register meta boxes
//  *
//  * Remember to change "sunland" to actual prefix in your project
//  *
//  * @param array $meta_boxes List of meta boxes
//  *
//  * @return array
//  */
// function _register_meta_boxes( $meta_boxes )
// {
// 	echo 'who dafuq is this?';
// 	/**
// 	 * prefix of meta keys (optional)
// 	 * Use underscore (_) at the beginning to make keys hidden
// 	 * Alt.: You also can make prefix empty to disable it
// 	 */
// 	// Better has an underscore as last sign
// 	$prefix = '_';

// 	$meta_boxes[] = array(
// 		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
// 		'id'         => 'indicaciones',

// 		// Meta box title - Will appear at the drag and drop handle bar. Required.
// 		'title'      => __( 'Indicaciones', '_' ),
// 		'post_types' => array( 'product' ),
// 		'context'    => 'normal',
// 		'priority'   => 'high',
// 		'autosave'   => true,

// 		// List of meta fields
// 		'fields'     => array(
// 			array(
// 				'name'  => __( '', '_' ),
// 				'id'    => "{$prefix}indicaciones",
// 				'desc'  => __( 'Inserta las indicaciones que sea necesarias.', '_' ),
// 				'type'  => 'text',
// 				'std'   => __( 'Default text value', '_' ),
// 				'clone' => true,
// 			),
// 		),
// 		'validation' => array(
// 			'rules'    => array(
// 				"{$prefix}password" => array(
// 					'required'  => true,
// 					'minlength' => 7,
// 				),
// 			),
// 			// optional override of default jquery.validate messages
// 			'messages' => array(
// 				"{$prefix}password" => array(
// 					'required'  => __( 'Password is required', '_' ),
// 					'minlength' => __( 'Password must be at least 7 characters', '_' ),
// 				),
// 			)
// 		)
// 	);

// 	return $meta_boxes;
// }


/**
 * Create Custom Meta Boxes for WooCommerce Product CPT
 *
 * Using Custom Metaboxes and Fields for WordPress library from 
 * Andrew Norcross, Jared Atchinson, and Bill Erickson
 *
 * @link http://blackhillswebworks.com/?p=5453
 * @link https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
 */		
 
	add_filter( 'cmb_meta_boxes', 'bhww_core_cpt_metaboxes' );
 
	function bhww_core_cpt_metaboxes( $meta_boxes ) {
	
		//global $prefix;
		$prefix = '_bhww_'; // Prefix for all fields
		
		// Add metaboxes to the 'Product' CPT
		$meta_boxes[] = array(
			'id'         => 'bhww_slides_metabox',
			'title'      => 'Additional Product Information - <strong>Optional</strong>',
			'post_types' => array( 'product' ),
			'pages'      => array( 'product' ), // Which post type to associate with?
			'context'    => 'normal',
			'priority'   => 'default',
			'show_names' => true, 					
			'fields'     => array(
				array(
					'name'    => __( 'Ingredients', 'cmb' ),
					'desc'    => __( 'Anything you enter here will be displayed on the Ingredients tab.', 'cmb' ),
					'id'      => $prefix . 'ingredients_wysiwyg',
					'type'    => 'wysiwyg',
					'options' => array( 'textarea_rows' => 5, ),
				),
				array(
					'name'    => __( 'Benefits', 'cmb' ),
					'desc'    => __( 'Anything you enter here will be displayed on the Benefits tab.', 'cmb' ),
					'id'      => $prefix . 'benefits_wysiwyg',
					'type'    => 'wysiwyg',
					'options' => array( 'textarea_rows' => 5, ),
				),
			),
		);
 
		return $meta_boxes;
		
	}
