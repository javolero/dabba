<?php
/**
 * Referfriend form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function rf_sponsor_form(){
	do_action('magenestnest_before_refer_friend_form');
	do_action('rf_before_form');
	add_action( 'rf_before_form', 'wc_print_notices', 10 );

	wc_print_notices();

	//echo WC()->session->get( 'rf_notices');
	//WC()->session->set( 'rf_notices' , '');
	?>

    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->

    <!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->
	<div class="[ container ]">
		<form class="[ form-horizontal ]" role="form" method="post">
		  	<p class="[]">
			    <label for="p-firstname" class="col-sm-2 control-label">Nombre de tu amigo</label>
			    <input value="<?php echo isset( $_POST['rf_firstname'] ) ? $_POST['rf_firstname'] : '' ?>" type="text" name="rf_firstname" />
		  	</p>
		  	<p class="[]">
			    <label for="p-lastname" class="col-sm-2 control-label">Apellido de tu amigo</label>
			    <input value="<?php echo isset( $_POST['rf_lastname'] ) ? $_POST['rf_lastname'] : '' ?>" type="text" name="rf_lastname" />
		  	</p>
		  	<p class="[]">
			    <label for="p-email" class="col-sm-2 control-label">Email de tu amigo</label>
			    <input value="<?php echo isset( $_POST['rf_email'] ) ? $_POST['rf_email'] : '' ?>" type="text" name="rf_email" />
		  	</p>
		  	<p class="[]">
			    <label for="p-message" class="col-sm-2 control-label">Mensaje opcional</label>
				<textarea rows="6" name="rf_message"><?php echo isset( $_POST['rf_message'] ) ? $_POST['rf_message'] : '' ?></textarea>
		  	</p>
		  	<p class="[]">
		    	<button type="submit" name="submit" class="btn btn-default">Invitar</button>
		  	</p>
		</form>

	</div>




<?php

	if( isset($_POST['submit'] ) ) {
		global $wpdb;
		// check if emai has invited
		$invite_email = $_POST['rf_email'];
		if( $wpdb->get_row( "SELECT * FROM $wpdb->postmeta WHERE meta_value = '$invite_email' AND meta_key = 'rf_invite_email'", OBJECT ) ) {
			wc_add_notice(__('This email has been invited') ,'notice');
			return;
		}

		if( $_POST['rf_firstname'] == '' ) {

			wc_add_notice( __( 'First name is null !', 'mg_referfriend' ), 'error' );
			//echo 'First name is null !';
			exit();
		}
		if( $_POST['rf_lastname'] == '' ) {
			wc_add_notice( __( 'Last name is null !', 'mg_referfriend' ), 'error' );
			//echo 'Last name is null !';
			exit();
		}
		if( $_POST['rf_email'] == '' ) {
			wc_add_notice( __( 'Invalid email !', 'mg_referfriend' ), 'error' );
			//echo 'Email name is null !';
			exit();
		}

		$current_user = wp_get_current_user();
		$title = substr( number_format( time() * rand(), 0, '', '' ), 0, 15 );

		// Create post object
		$rf = array(
				'post_title'    => $title,
				'post_status'   => 'publish',
				'post_author'   => $current_user->ID,
				'post_type'		=> 'mg_referfriend',
		);

		// Insert the post into the database
		$post_id = wp_insert_post( $rf );
		if( $post_id ) {
			// Insert post meta value
			add_post_meta($post_id, 'rf_firstname', $_POST['rf_firstname']);
			add_post_meta($post_id, 'rf_lastname', $_POST['rf_lastname']);
			add_post_meta($post_id, 'rf_usage', 0);
			add_post_meta($post_id, 'rf_limit', 1);
			add_post_meta($post_id, 'rf_type', 1);
			add_post_meta($post_id, 'rf_invite_email', $_POST['rf_email']);
			add_post_meta($post_id, 'rf_reward_email', $current_user->user_email);
			add_post_meta($post_id, 'rf_coupon_type', get_option( 'rf_invite_coupon_type' ));
			add_post_meta($post_id, 'rf_coupon_amount', get_option( 'rf_invite_coupon_amount', 1000 ) );
			add_post_meta($post_id, 'rf_description', __( 'From: ', 'mg_referfriend' ) . $current_user->user_email . __( ' To: ', 'mg_referfriend' ) . $_POST['rf_email']);
			if( $_POST['rf_message'] ) {
				add_post_meta($post_id, 'rf_message', $_POST['rf_message']);
			}

			$coupon_code = $title; // Code
			$amount = get_option( 'rf_invite_coupon_amount', 1000 ); // Amount
			$discount_type = get_option( 'rf_invite_coupon_type' ); // Type: fixed_cart, percent, fixed_product, percent_product

			$coupon = array(
					'post_title' => $coupon_code,
					'post_content' => '',
					'post_status' => 'publish',
					'post_type'		=> 'shop_coupon'
			);
			$new_coupon_id = wp_insert_post( $coupon );
			update_post_meta( $new_coupon_id, 'coupon_amount', $amount );
			update_post_meta( $new_coupon_id, 'discount_type', $discount_type );
			update_post_meta( $new_coupon_id, 'individual_use', 'no' );
			update_post_meta( $new_coupon_id, 'product_ids', '' );
			update_post_meta( $new_coupon_id, 'exclude_product_ids', '' );
			update_post_meta( $new_coupon_id, 'usage_count', '0' );
			update_post_meta( $new_coupon_id, 'usage_limit', '1' );
			update_post_meta( $new_coupon_id, 'expiry_date', '' );
			update_post_meta( $new_coupon_id, 'apply_before_tax', 'yes' );
			update_post_meta( $new_coupon_id, 'free_shipping', 'no' );

			// Send mail
			$data = array(
				'friend'   => $_POST['rf_firstname'] . ' ' . $_POST['rf_lastname'],
				'sponsor'  => $current_user->user_email,
				'coupon'   => $title,
				'affiliate_message' => $_POST['rf_message'],
				'coupon_value' => $amount,
			);
			$subj = rf_mail_replace( get_option( 'rf_invite_email_subject' ), $data );
			$body = rf_mail_replace( get_option( 'rf_invite_email_heading' ) . '<br>' . get_option( 'rf_invite_email_content' ), $data );
			$headers = array('Content-Type: text/html; charset=UTF-8');

			add_filter( 'wp_mail_content_type', 'magenest_rf_set_html_content_type' );

			wp_mail( $_POST['rf_email'], $subj, $body, $headers );


			remove_filter( 'wp_mail_content_type',  'magenest_rf_set_html_content_type' );

			//notice message
			wc_add_notice(__('The invitation email is sent') ,'success');


			if (WC()->session) {
				$notices = __('The invitation email is sent');
				WC()->session->set( 'rf_notices', $notices );
			}
		}
	}

}

/**
 * set html content type for email
 */

if (!function_exists( 'magenest_rf_set_html_content_type' )) {
	function magenest_rf_set_html_content_type() {
		return 'text/html';
	}
}
function rf_mail_replace( $content, $replace ){
	$content = str_replace( '{{friend}}', $replace['friend'], $content );
	$content = str_replace( '{{sitename}}', get_bloginfo(), $content );

	$content = str_replace( '{{sponsor}}', $replace['sponsor'], $content );
	$content = str_replace( '{{coupon}}', $replace['coupon'], $content );


	if (isset($replace['refer_type']))
	$content = str_replace( '{{refer_type}}', $replace['refer_type'], $content );

	$content = str_replace( '{{affiliate_message}}', $replace['affiliate_message'], $content );
	$content = str_replace( '{{siteurl}}', get_site_url(), $content );

	$content = str_replace( '{{coupon_value}}', $replace['coupon_value'], $content );


	//{{coupon_value}}

	//{{affiliate_message}}
	return $content;
}

add_shortcode( 'rf_sponsor_form', 'rf_sponsor_form' );