<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!class_exists('Magenest_Rf_MyAccount')) {
	
class Magenest_Rf_MyAccount {

	public function __construct() {
		//account page
		add_action('woocommerce_after_my_account', array($this,'rf'));
		
		add_action( 'woocommerce_order_status_processing', array($this, 'rf_woocommerce_order_status_processing') );
		add_action( 'woocommerce_order_status_on-hold', array($this, 'rf_woocommerce_order_status_on_hold') );
		add_action( 'woocommerce_payment_complete_order_status_processing', array($this, 'rf_woocommerce_order_status_processing') );
		add_action( 'woocommerce_payment_complete_order_status_on-hold', array($this, 'rf_woocommerce_order_status_on_hold') );

		add_action ( 'woocommerce_order_status_pending', array ($this, 'rf_woocommerce_order_status_processing' ),10 );
		add_action ( 'woocommerce_order_status_failed', array ( $this, 'rf_woocommerce_order_status_processing' ) ,10);
		add_action ( 'woocommerce_order_status_on-hold', array ( $this, 'rf_woocommerce_order_status_processing' ) ,10);
		add_action ( 'woocommerce_order_status_processing', array ( $this, 'rf_woocommerce_order_status_processing') ,10 );
		add_action ( 'woocommerce_order_status_completed', array ( $this, 'rf_woocommerce_order_status_processing' ),10 );
		add_action ( 'woocommerce_order_status_refunded', array ( $this, 'rf_woocommerce_order_status_processing' ),10 );
		add_action ( 'woocommerce_order_status_cancelled', array ( $this, 'rf_woocommerce_order_status_processing' ),10 );
		
		add_action('init', array($this, 'rf_cookie_init'));
	}
	
	public function rf_cookie_init(){
		if ( ! isset($_COOKIE['utm']) && isset( $_GET['utm'] ) ) {
			// @TODO next version module will allow admin set expired time for cookie
			setcookie('utm', $_GET['utm']);
		}
	}
	
	public function rf_woocommerce_order_status_processing( $order_id ) { 
		global $wpdb;
		$order = new WC_Order( $order_id );
		var_dump($order);exit();
		$order_status = $order->status;
		
		if (get_option('magenest_rf_reward_when','completed') == $order_status) {
		$invite_email = $order->billing_email;
		$used_coupon = $order->get_used_coupons();
		if (isset($used_coupon[0])) $used_coupon = $used_coupon[0];
		
		// update referfriend data
		
		if ($used_coupon) { 
			$result = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_title = '$used_coupon' AND post_type = 'shop_coupon'" );
			$coupon_id = $result->ID;
			$result = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_title = '$used_coupon' AND post_type = 'mg_referfriend'" );
			
			if( ! empty( $result ) ) {
				$rf_id = $result->ID;
				$expiry_date = get_post_meta( $coupon_id, 'expiry_date' );
				$product_ids = get_post_meta( $coupon_id, 'product_ids' );
				$usage_count = get_post_meta( $coupon_id, 'usage_count' );
				
				update_post_meta( $rf_id, 'rf_expiry_date', $expiry_date[0] );
				update_post_meta( $rf_id, 'rf_product_ids', $product_ids[0] );
				update_post_meta( $rf_id, 'rf_usage', $usage_count[0] );
			}
		}
		
		
		// billing email is associated with any referral email 
		$result = $wpdb->get_row( "SELECT * FROM $wpdb->postmeta WHERE meta_value = '$invite_email' AND meta_key = 'rf_invite_email'" );
		
		if( ! empty($result) ) {
			if( $wpdb->get_row( "SELECT * FROM $wpdb->postmeta WHERE meta_value = '$invite_email' AND meta_key = 'rf_invited_email'", OBJECT ) ) {
				return;
			}
			//$result = $wpdb->get_row( "SELECT * FROM $wpdb->postmeta WHERE meta_value = '$invite_email' AND meta_key = 'rf_invite_email'" );
			// track for used coupon
			add_post_meta($result->post_id, 'rf_invited_email', $invite_email);
			$result = $wpdb->get_row( "SELECT * FROM $wpdb->postmeta WHERE post_id = '$result->post_id' AND meta_key = 'rf_reward_email'" );
			if( $reward_email = $result->meta_value ) {
				// Send mail
				$data = array(
					'friend'   => '',
					'sponsor'  => '',
					'coupon'   => get_the_title( $this->rf_create_coupon( null,'Reward', 1 ) ),
				);
				$subj = rf_mail_replace( get_option( 'rf_reward_email_subject' ), $data );
				$body = rf_mail_replace( get_option( 'rf_reward_email_heading' ) . '<br>' . get_option( 'rf_reward_email_content' ), $data );
				$headers = array('Content-Type: text/html; charset=UTF-8');
				wp_mail( $reward_email, $subj, $body, $headers );
			}
		} elseif( isset($_COOKIE['utm']) ) {
			// check if emai has invited
			if( $wpdb->get_row( "SELECT * FROM $wpdb->postmeta WHERE meta_value = '$invite_email' AND meta_key = 'rf_invite_email'", OBJECT ) ) {
				return;
			}
			$this->rf_create( null, 'Reward', 2 ); // for referrer
			
			//set the billing email is used to reward affiliate and can not be reward affiliate if user using this billing email to buy other time
			add_post_meta($order_id, 'rf_invited_email', $invite_email);
			
			
			//$this->rf_create( $order_id, 'Invite', 2 ); // for person who is referred
		}
		}
	}
	
	public function rf_woocommerce_order_status_on_hold( $order_id ){
		global $wpdb;
		$order = new WC_Order( $order_id );
var_dump($order);exit();
		$used_coupon = $order->get_used_coupons();
		
		if (isset($used_coupon[0])) $used_coupon = $used_coupon[0];
		
		$result = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_title = '$used_coupon' AND post_type = 'shop_coupon'" );
		
		if ($result) { 
		$coupon_id = $result->ID;
		$result = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_title = '$used_coupon' AND post_type = 'mg_referfriend'" );
		if( ! empty( $result ) ) {
			$rf_id = $result->ID;
			$expiry_date = get_post_meta( $coupon_id, 'expiry_date' );
			$product_ids = get_post_meta( $coupon_id, 'product_ids' );
			$usage_count = get_post_meta( $coupon_id, 'usage_count' );
			update_post_meta( $rf_id, 'rf_expiry_date', $expiry_date[0] );
			update_post_meta( $rf_id, 'rf_product_ids', $product_ids[0] );
			update_post_meta( $rf_id, 'rf_usage', $usage_count[0] );
		}
		}
	}
	
	public function rf_create( $order_id = null, $description, $type ){
		$post_id = $this->rf_create_coupon( $order_id, $description, $type );
		$title = get_the_title( $post_id );
		$rf_id = base64_decode( $_COOKIE['utm'] );
		$user = get_user_by( 'id',  $rf_id);
		
		// send mail
		if ( $order_id ) { // the person who is referred
			$order = new WC_Order($order_id);
			$to = $order->billing_email;
			$data = array(
				'friend'   => '',
				'sponsor'  => $user->user_email,
				'coupon'   => $title,
			);
			$subj = rf_mail_replace( get_option( 'rf_invite_email_subject' ), $data );
			$body = rf_mail_replace( get_option( 'rf_invite_email_heading' ) . '<br>' . get_option( 'rf_invite_email_content' ), $data );
		} else {
			$data = array(
				'friend'   => '',
				'sponsor'  => '',
				'coupon'   => $title,
			);
			$subj = rf_mail_replace( get_option( 'rf_reward_email_subject' ), $data );
			$body = rf_mail_replace( get_option( 'rf_reward_email_heading' ) . '<br>' . get_option( 'rf_reward_email_content' ), $data );
			$to = $user->user_email;
		}
		$headers = array('Content-Type: text/html; charset=UTF-8');
		
		add_filter( 'wp_mail_content_type', array($this, 'magenest_rf_set_html_content_type') );
		
		wp_mail( $to, $subj, $body, $headers );
		
		remove_filter( 'wp_mail_content_type',  array($this,'magenest_rf_set_html_content_type' ));
		
		return $post_id;
	}
	
	public function magenest_rf_set_html_content_type() {
		return 'text/html';
	}
	
	
	public function generateUmt() {
		$user_id = get_current_user_id ();
		
		$source = base64_encode( $user_id );
		
		return $source;
		//$id = decrypt($source);
	}
	
	public function rf() {
		$user_id = get_current_user_id ();
		
		ob_start();
		
		$template_path = RF_PATH.'template/account/';
		$default_path = RF_PATH.'template/account/';
		
		$url = get_site_url();
	    $refer_link = 	add_query_arg(array('utm' => $this->generateUmt()) , $url);
		echo base64_decode($this->generateUmt());
	    wc_get_template( 'refer.php', array( 'userid' => $user_id, 'url' => $refer_link),$template_path,$default_path );
		echo  ob_get_clean();
		
	}
	
	public function rf_create_coupon( $order_id, $description, $type ){
		$order = new WC_Order($order_id);
		$invite_email = $order->billing_email;
		$title = rf_generate_number();
		if( $description == 'Invite' ) {
			$rf_invite_coupon_amount = get_option( 'rf_invite_coupon_amount' );
			$rf_coupon_type = get_option( 'rf_invite_coupon_type' );
		} else {
			$rf_invite_coupon_amount = get_option( 'rf_reward_coupon_amount' );
			$rf_coupon_type = get_option( 'rf_reward_coupon_type' );
		}
		$rf_id = base64_decode( $_COOKIE['utm'] );
		$user = get_user_by( 'id',  $rf_id);
		
		$post = array(
				'post_title' => $title,
				'post_status'   => 'publish',
				'post_type' => 'mg_referfriend'
		);
		$post_id = wp_insert_post( $post );
		add_post_meta( $post_id, 'rf_coupon_type', $rf_coupon_type );
		add_post_meta( $post_id, 'rf_coupon_amount', $rf_invite_coupon_amount );
		add_post_meta( $post_id, 'rf_description', $description );
		add_post_meta( $post_id, 'rf_usage', 0 );
		add_post_meta( $post_id, 'rf_limit', 1 );
		add_post_meta($post_id, 'rf_type', $type);
		if( $description == 'Invite' ) {
			add_post_meta($post_id, 'rf_invite_email', $invite_email);
			add_post_meta($post_id, 'rf_reward_email', $user->user_email);
		}
		
		$coupon_code = $title; // Code
		$amount = get_option( 'rf_coupon_amount', 1000 ); // Amount
		
		$coupon = array(
				'post_title' => $title,
				'post_content' => '',
				'post_status' => 'publish',
				'post_type'		=> 'shop_coupon'
		);
		$new_coupon_id = wp_insert_post( $coupon );
		update_post_meta( $new_coupon_id, 'coupon_amount', $rf_invite_coupon_amount );
		update_post_meta( $new_coupon_id, 'discount_type', $rf_coupon_type );
		update_post_meta( $new_coupon_id, 'product_ids', '' );
		update_post_meta( $new_coupon_id, 'exclude_product_ids', '' );
		update_post_meta( $new_coupon_id, 'usage_count', '0' );
		update_post_meta( $new_coupon_id, 'usage_limit', '1' );
		update_post_meta( $new_coupon_id, 'expiry_date', '' );
		update_post_meta( $new_coupon_id, 'apply_before_tax', 'yes' );
		update_post_meta( $new_coupon_id, 'free_shipping', 'no' );
		if( $description == 'Invite' ) {
			update_post_meta( $new_coupon_id, 'individual_use', get_option( 'rf_invite_individual_use' ) );
		} else {
			update_post_meta( $new_coupon_id, 'individual_use', get_option( 'rf_reward_individual_use' ) );
		}

		return $post_id;
	}
	
}

new Magenest_Rf_MyAccount();

}