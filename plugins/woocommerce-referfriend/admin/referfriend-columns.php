<?php
/**
 * Admin functions for the mg_referfriend post type.
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Admin Columns

function rf_add_columns( $columns ) {
	$new_columns = ( is_array( $columns ) ) ? $columns : array();
	unset( $new_columns['title'] );
	unset( $new_columns['date'] );
	unset( $new_columns['comments'] );

	//all of your columns will be added before the actions column on the Giftcard page

	$new_columns["title"]		  = __( 'Code', 'mg_referfriend' );
	$new_columns["coupon_type"]	  = __( 'Coupon Type', 'mg_referfriend' );
	$new_columns["coupon_amount"] = __( 'Coupon Amount', 'mg_referfriend' );
	$new_columns["type"] 		  = __( 'Type', 'mg_referfriend' );
	$new_columns["description"]   = __( 'Description', 'mg_referfriend' );
	$new_columns["protduct_id"]	  = __( 'Product IDs', 'mg_referfriend' );
	$new_columns["usage_limit"]	  = __( 'Usage/Limit', 'mg_referfriend' );
	$new_columns["expiry_date"]	  = __( 'Expiry Date', 'mg_referfriend' );

	return  apply_filters( 'mg_referfriend_columns', $new_columns);
}
add_filter( 'manage_edit-mg_referfriend_columns', 'rf_add_columns' );

/**
 * Define our custom columns shown in admin.
 * @param  string $column
 *
 */
function rf_custom_columns( $column ) {
	global $post, $woocommerce;

	switch ( $column ) {		
		case "coupon_type" :
			echo esc_html( wc_get_coupon_type( get_post_meta( $post->ID, 'rf_coupon_type', true ) ) );
			break;
			
		case "coupon_amount" :
			echo esc_html( get_post_meta( $post->ID, 'rf_coupon_amount', true ) );
			break;
			
		case "description" :
			echo esc_html( get_post_meta( $post->ID, 'rf_description', true ) );
			break;
				
		case "product_id" :
			echo esc_html( get_post_meta( $post->ID, 'rf_product_id', true ) );
			break;
			
		case "usage_limit" :
			echo esc_html( get_post_meta( $post->ID, 'rf_usage', true ) . ' / ' . get_post_meta( $post->ID, 'rf_limit', true ) );
			break;
				
		case "expiry_date" :
			echo esc_html( get_post_meta( $post->ID, 'rf_expiry_date', true ) );
			break;
			
		case "type" :
			echo esc_html( get_post_meta( $post->ID, 'rf_type', true ) == 1 ? 'Refered by email' : 'Refered by share link' );
			break;
	}
}
add_action( 'manage_mg_referfriend_posts_custom_column', 'rf_custom_columns', 2 );