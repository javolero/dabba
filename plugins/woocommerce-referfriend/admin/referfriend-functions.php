<?php

function rf_process_giftcard_meta( $post_id, $post ) {
	global $wpdb, $woocommerce_errors;

	$code 			= '';
	$coupon_type    = '';
	$coupon_amount  = '';
	$description    = '';
	$product_id   	= '';
	$usage_limit   	= '';
	$expiry_date 	= '';


	$wpdb->update( $wpdb->posts, 
			array( 
					'post_title'   => $post->post_title,
			), 
			array( 'ID' => $post_id ) 
		);
	
	if ( isset( $_POST['rf_coupon_type'] ) ) {
		$coupon_type 	= woocommerce_clean( $_POST['rf_coupon_type'] );
		update_post_meta( $post_id, 'rf_coupon_type', $coupon_type );
	}
	
	if ( isset( $_POST['rf_coupon_amount'] ) ) {
		$coupon_amount 	= woocommerce_clean( $_POST['rf_coupon_amount'] );
		update_post_meta( $post_id, 'rf_coupon_amount', $coupon_amount );
	}
	
	if ( isset( $_POST['rf_description'] ) ) {
		$description 	= woocommerce_clean( $_POST['rf_description'] );
		update_post_meta( $post_id, 'rf_description', $description );
	}
	
	if ( isset( $_POST['rf_product_id'] ) ) {
		$product_id 	= woocommerce_clean( $_POST['rf_product_id'] );
		update_post_meta( $post_id, 'rf_product_id', $product_id );
	}
	
	if ( isset( $_POST['rf_usage'] ) ) {
		$usage 	= woocommerce_clean( $_POST['rf_usage'] );
		update_post_meta( $post_id, 'rf_usage', $usage );
	}
	
	if ( isset( $_POST['rf_limit'] ) ) {
		$limit 	= woocommerce_clean( $_POST['rf_limit'] );
		update_post_meta( $post_id, 'rf_limit', $limit );
	}
	
	if ( isset( $_POST['rf_expiry_date'] ) ) {
		$expiry_date 	= woocommerce_clean( $_POST['rf_expiry_date'] );
		update_post_meta( $post_id, 'rf_expiry_date', $expiry_date );
	}
	
	if ( isset( $_POST['rf_type'] ) ) {
		$type 	= woocommerce_clean( $_POST['rf_type'] );
		update_post_meta( $post_id, 'rf_type', $type );
	}

	/* Deprecated - same hook name as in the meta */
	do_action( 'woocommerce_rf_options' );
	do_action( 'woocommerce_rf_options_save' );

}
add_action( 'save_post', 'rf_process_giftcard_meta', 20, 2 );

/**
 * Creates a random 15 digit giftcard number
 *
 */
function rf_create_number( $data , $postarr ) {

	if( isset ( $_POST['original_publish'] ) ) {
		if ( ( $data['post_type'] == 'mg_referfriend' ) && ( $_POST['original_publish'] == "Publish" ) ) {

			$myNumber = rf_generate_number( );
				
			$data['post_title'] = $myNumber;
			$data['post_name'] = $myNumber;
		}
	}

	return apply_filters('rf_create_number', $data);
}
add_filter( 'wp_insert_post_data' , 'rf_create_number' , 10, 2 );


function rf_generate_number() {
	$randomNumber = substr( number_format( time() * rand(), 0, '', '' ), 0, 15 );

	return apply_filters('rf_generate_number', $randomNumber);
}

