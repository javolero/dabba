<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */


add_filter( 'rwmb_meta_boxes', '_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "sunland" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function _register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = '_';

	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'indicaciones',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Indicaciones', '_' ),
		'post_types' => array( 'POSTTYPE' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,

		// List of meta fields
		'fields'     => array(
			array(
				'name'  => __( '', '_' ),
				'id'    => "{$prefix}indicaciones",
				'desc'  => __( 'Inserta las indicaciones que sea necesarias.', '_' ),
				'type'  => 'text',
				'std'   => __( 'Default text value', '_' ),
				'clone' => true,
			),
		),
		'validation' => array(
			'rules'    => array(
				"{$prefix}password" => array(
					'required'  => true,
					'minlength' => 7,
				),
			),
			// optional override of default jquery.validate messages
			'messages' => array(
				"{$prefix}password" => array(
					'required'  => __( 'Password is required', '_' ),
					'minlength' => __( 'Password must be at least 7 characters', '_' ),
				),
			)
		)
	);

	return $meta_boxes;
}

