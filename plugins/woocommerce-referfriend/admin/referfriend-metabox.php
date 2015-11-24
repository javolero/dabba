<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Sets up the new meta box for the creation of a gift card.
 * Removes the other three Meta Boxes that are not needed.
 *
 */

function rf_meta_boxes() {
	global $post;

	if ( ! isset( $_GET['action'] ) )
		remove_post_type_support( 'mg_referfriend', 'title' );
	
	add_meta_box(
			'rf-woocommerce-data',
			__( 'Referfriend Data', 'mg_referfriend' ),
			'rf_meta_box',
			'mg_referfriend',
			'normal',
			'high'
	);

	remove_meta_box( 'woothemes-settings', 'mg_referfriend' , 'normal' );
	remove_meta_box( 'commentstatusdiv', 'mg_referfriend' , 'normal' );
	remove_meta_box( 'commentsdiv', 'mg_referfriend' , 'normal' );
	remove_meta_box( 'slugdiv', 'mg_referfriend' , 'normal' );
}
add_action( 'add_meta_boxes', 'rf_meta_boxes' );

/**
 * Creates the Referfriend Meta Box in the admin control panel when in the Giftcard Post Type.  Allows you to create a giftcard manually.
 * @param  [type] $post
 * @return [type]
 */

function rf_meta_box( $post ) {
	global $woocommerce;
	
	wp_nonce_field( 'woocommerce_save_data', 'woocommerce_meta_nonce' );
	?>
	<style type="text/css">
		#edit-slug-box, #minor-publishing-actions { display:none }

		.form-field input, .form-field textarea { width:100%;}

		input[type="checkbox"], input[type="radio"] { float: left; width:16px;}
	</style>

	<div class="panel woocommerce_options_panel">
	<?php
	
	woocommerce_wp_select(
			array(
					'id' 			=> 'rf_coupon_type',
					'label'			=> __( 'Coupon Type', 'mg_referfriend' ),
					'placeholder' 	=> '',
					'description' 	=> __( 'Coupon Type', 'mg_referfriend' ),
					'options'		=> wc_get_coupon_types()
			)
	);
	
	woocommerce_wp_text_input(
			array(
					'id' 				=> 'rf_coupon_amount',
					'label'				=> __( 'Coupon Amount', 'mg_referfriend' ),
					'placeholder' 		=> '',
					'description' 		=> __( 'Coupon Amount', 'mg_referfriend' ),
					'type'    			=> 'number',
					'custom_attributes' => array( 'step' => 'any', 'min' => '0' )
			)
	);
	
	woocommerce_wp_select(
			array(
					'id' 			=> 'rf_type',
					'label'			=> __( 'Type', 'mg_referfriend' ),
					'placeholder' 	=> '',
					'options'		=> array(
						''  => '',
						'1' => 'Refered by Email',
						'2' => 'Refered by share link'	
					)
			)
	);

	// Description
	woocommerce_wp_textarea_input(
			array(
					'id' 			=> 'rf_description',
					'label'			=> __( 'Description', 'rpgiftcards' ),
					'placeholder' 	=> '',
					'description' 	=> __( 'Description', 'rpgiftcards' ),
			)
	);
	
	woocommerce_wp_text_input(
			array(
					'id' 			=> 'rf_product_id',
					'label'			=> __( 'Product IDs', 'mg_referfriend' ),
					'placeholder' 	=> '',
					'description' 	=> __( 'Product IDs', 'mg_referfriend' ),
					'type'    		=> 'number',
			)
	);
	
	woocommerce_wp_text_input(
			array(
					'id' 				=> 'rf_usage',
					'label'				=> __( 'Usage', 'mg_referfriend' ),
					'placeholder' 		=> '',
					'description' 		=> __( 'Usage', 'mg_referfriend' ),
			)
	);
	
	woocommerce_wp_text_input(
			array(
					'id' 				=> 'rf_limit',
					'label'				=> __( 'Limit', 'mg_referfriend' ),
					'placeholder' 		=> '',
					'description' 		=> __( 'Limit', 'mg_referfriend' ),
			)
	);
	
	woocommerce_wp_text_input(
			array(
					'id' 				=> 'rf_expiry_date',
					'label'				=> __( 'Expiry Date', 'mg_referfriend' ),
					'placeholder' 		=> '',
					'description' 		=> __( 'Expiry Date', 'mg_referfriend' ),
			)
	);

	echo '</div>';
}