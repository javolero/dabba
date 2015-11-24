<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if (!function_exists('rf_generate_number')) {
	include_once RF_PATH .'/admin/referfriend-functions.php';
}
if (!class_exists('Magenest_Rf_MyAccount')) {
	
class Magenest_Rf_MyAccount {

	public function __construct() {
		//account page
		add_action('woocommerce_after_my_account', array($this,'rf'));
		
// 		add_action( 'woocommerce_order_status_processing', array($this, 'rf_woocommerce_order_status_processing') );
// 		add_action( 'woocommerce_order_status_on-hold', array($this, 'rf_woocommerce_order_status_on_hold') );
 		add_action( 'woocommerce_payment_complete_order_status_processing', array($this, 'rf_woocommerce_order_status_processing') );
 		add_action( 'woocommerce_payment_complete_order_status_on-hold', array($this, 'rf_woocommerce_order_status_on_hold') );

		add_action('user_register', array($this, 'user_register_observer'));
		
		add_action ( 'woocommerce_order_status_pending', array ($this, 'rf_woocommerce_order_status_processing' ),10 );
		add_action ( 'woocommerce_order_status_failed', array ( $this, 'rf_woocommerce_order_status_processing' ) ,10);
		add_action ( 'woocommerce_order_status_on-hold', array ( $this, 'rf_woocommerce_order_status_processing' ) ,10);
		add_action ( 'woocommerce_order_status_processing', array ( $this, 'rf_woocommerce_order_status_processing') ,10 );
		add_action ( 'woocommerce_order_status_completed', array ( $this, 'rf_woocommerce_order_status_processing' ),10 );
		add_action ( 'woocommerce_order_status_refunded', array ( $this, 'rf_woocommerce_order_status_processing' ),10 );
		add_action ( 'woocommerce_order_status_cancelled', array ( $this, 'rf_woocommerce_order_status_processing' ),10 );
		
		add_action('init', array($this, 'rf_cookie_init'));
	}
	
	public function user_register_observer($user_id) {
		
		global  $wpdb;
		
		 if (get_option('rf_bonus_signup' , 'no') == 'no')   return;
		 
		 
		$user_data = get_userdata ( $user_id );
		
		$lead_data = array ();
		$email = $user_data->data->user_email;
		// var_dump($user_data->data);
		
		$customer_name = '';
		
		$lastname = get_user_meta ( $user_id, 'last_name', 'true' );
		$firstname = get_user_meta ( $user_id, 'first_name', 'true' );
		
		$customer_name = $firstname . ' ' . $lastname;
		
		if (! trim($customer_name)) {
			$customer_name = $user_data->data->display_name;
		}
		
		//whether the new registered customer is refer by friend
		
		
		$query = "SELECT post.ID as id from  $wpdb->posts as  post 
		
		 LEFT JOIN $wpdb->postmeta AS rf ON (post.ID = rf.post_id 
	     and rf.meta_key='rf_invite_email' )
	     
	     LEFT JOIN $wpdb->postmeta AS rf_aff ON (post.ID = rf.post_id 
	     and rf_aff.meta_key='rf_reward_email' )
	     
	     WHERE post.post_type = 'mg_referfriend'
	     AND rf.meta_value = '{$email}'
		 ";
		
		$row  = $wpdb->get_row($query, ARRAY_A);
		
	
		if ($row) {
		
			$post_id = $row['id'];
			if (get_post_meta($post_id ,'is_rewarded_signup' , true) != 'yes' ) {
				
			$post = WP_Post::get_instance($post_id);
			
			$affilate_user_id = $post->post_author;
			
			$user_data = get_userdata ( $affilate_user_id );
			
			$affilate_name = '';
			
			$lastname = get_user_meta ( $user_id, 'last_name', 'true' );
			$firstname = get_user_meta ( $user_id, 'first_name', 'true' );
			
			$affilate_name = $firstname . ' ' . $lastname;
			
			if (! $affilate_name) {
				$affilate_name = $user_data->data->display_name;
			}
			
			$affiliate_email = get_post_meta($post_id , 'rf_reward_email' ,true);
			
			$this->reward_affiliate('sign_up', $affilate_name, $affiliate_email,$email , 0, array() , array());
			
			update_post_meta($post_id, 'is_rewarded_signup', 'yes');
		}
		} 
	}
	/**
	 * @description  : create coupon  for affiliate and send notification email
	 * @param unknown $type
	 * @param unknown $affilate_name
	 * @param unknown $affiliate_email
	 * @param string $referred_email
	 * @param number $order_id
	 * @param unknown $coupon
	 * @param unknown $info
	 */
	public function reward_affiliate($type ,$affilate_name,  $affiliate_email, $referred_email='', $order_id = 0,$coupon = array(), $info = array()) {
		
		switch ($type) {
						case 'sign_up' :
							
							$coup_value = get_option ( 'rf_coupon_sign_up_amount' );
							break;
						case 'email_invite' :
						
						case 'refer_link' :
							$coup_value = get_option ( 'rf_reward_coupon_amount' );
							
							break;
						default :
							$coup_value = 0;
							
							break;
					}
					$expired_time_cp ='';
					/*$current_date_time = new DateTime (); */
					if ($coupon_duration = get_option('rf_invite_coupon_duration')) {
						
					$current_date_time = new DateTime ();
					
					$modify = '+';
					
					if ($coupon_duration == 1) {
						$modify .= '1 day';
					} else {
						$modify .= $coupon_duration .' days';
					}
				
					$current_date_time->modify($modify);
					$format = 'Y-m-d';
					
					$expired_time_cp = $current_date_time->format ( $format );
					
					}
					
					$cptype  = 2;
					$description = 'Affiliate reward for referred signup';
					$post_id = $this->rf_create_coupon( $order_id, $description, $cptype ,$coup_value, $expired_time_cp );
					
					$cp_code = get_the_title($post_id);
					//send the notification email
					
					$replace = array(
							'{{sponsor_name}}' => $affilate_name,
							'{{coupon_value}}' => $coup_value,
							'{{coupon}}' =>$cp_code,
							'{{coupon_expiry_date}}' =>$expired_time_cp,
							'{{refer_type}}' =>$type,
							'{{invited_email}}' =>$referred_email,
							'{{sitename}}' =>get_bloginfo(),
							'{{siteurl}}'=> get_site_url()
					) ;
					
					$email_header = '<h1>' . get_option('rf_reward_email_heading') .'</h1>';
					
					$email_content = get_option('rf_reward_email_content');
					
					$email_content =strtr($email_header. $email_content ,$replace) ;
					
					
					$subj = str_replace('{{sitename}}', get_bloginfo(), get_option('rf_reward_email_subject'));
					
					
					
					$headers = array('Content-Type: text/html; charset=UTF-8');
					
					add_filter( 'wp_mail_content_type', array($this, 'magenest_rf_set_html_content_type') );
					
					wp_mail( $affiliate_email, $subj, $email_content, $headers );
					
					remove_filter( 'wp_mail_content_type',  array($this,'magenest_rf_set_html_content_type' ));
					
					
		}
	
	public function rf_cookie_init() {
		if ( ! isset($_COOKIE['utm']) && isset( $_GET['utm'] ) ) {
			// @TODO next version module will allow admin set expired time for cookie
			
			$cookie_duration = (int)get_option('rf_cookie_duration' , '30');
			
			setcookie('utm', $_GET['utm'], time() + ($cookie_duration * 30));
		}
	}
	
	public function rf_woocommerce_order_status_processing( $order_id ) { 
		global $wpdb;
		$order = new WC_Order( $order_id );

		$order_status = $order->status;
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
			if( $a = $wpdb->get_row( "SELECT * FROM $wpdb->postmeta WHERE meta_value = '$invite_email' AND meta_key = 'rf_invited_email'", OBJECT ) ) {
				return;
			}
			//$result = $wpdb->get_row( "SELECT * FROM $wpdb->postmeta WHERE meta_value = '$invite_email' AND meta_key = 'rf_invite_email'" );
			// track for used coupon
			add_post_meta($result->post_id, 'rf_invited_email', $invite_email);
			$result = $wpdb->get_row( "SELECT * FROM $wpdb->postmeta WHERE post_id = '$result->post_id' AND meta_key = 'rf_reward_email'" );
			if( $reward_email = $result->meta_value ) {
				$coupon_id = $this->rf_create_coupon( null,'Reward', 1 );
				$coupon_value = get_post_meta( $coupon_id, 'rf_coupon_amount' );
				// Send mail
				$data = array(
					'friend'   => '',
					'sponsor'  => $reward_email,
					'coupon_value' => $coupon_value[0],
					'coupon'   => get_the_title( $coupon_id ),
					'affiliate_type' => 'email_invite'	
				);
				$subj = rf_mail_replace( get_option( 'rf_reward_email_subject' ), $data );
				$body = rf_mail_replace( get_option( 'rf_reward_email_heading' ) . '<br>' . get_option( 'rf_reward_email_content' ), $data );
				$headers = array('Content-Type: text/html; charset=UTF-8');
				
				$a = wp_mail( $reward_email, $subj, $body, $headers );
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
	
// 	public function rf_woocommerce_order_status_on_hold( $order_id ){
// 		global $wpdb;
// 		$order = new WC_Order( $order_id );
// 		$used_coupon = $order->get_used_coupons();
		
// 		if (isset($used_coupon[0])) $used_coupon = $used_coupon[0];
		
// 		$result = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_title = '$used_coupon' AND post_type = 'shop_coupon'" );
		
// 		if ($result) { 
// 		$coupon_id = $result->ID;
// 		$result = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_title = '$used_coupon' AND post_type = 'mg_referfriend'" );
// 		if( ! empty( $result ) ) {
// 			$rf_id = $result->ID;
// 			$expiry_date = get_post_meta( $coupon_id, 'expiry_date' );
// 			$product_ids = get_post_meta( $coupon_id, 'product_ids' );
// 			$usage_count = get_post_meta( $coupon_id, 'usage_count' );
// 			update_post_meta( $rf_id, 'rf_expiry_date', $expiry_date[0] );
// 			update_post_meta( $rf_id, 'rf_product_ids', $product_ids[0] );
// 			update_post_meta( $rf_id, 'rf_usage', $usage_count[0] );
// 		}
// 		}
// 	}
	
	public function rf_create( $order_id = null, $description, $type ){
		$post_id = $this->rf_create_coupon( $order_id, $description, $type );
		$title = get_the_title( $post_id );
		$amount = get_post_meta( $post_id, 'rf_coupon_amount' );
		$rf_id = base64_decode( $_COOKIE['utm'] );
		$user = get_user_by( 'id',  $rf_id);

		// send mail
		if ( $order_id ) { // the person who is referred
			$order = new WC_Order($order_id);
			$to = $order->billing_email;
			$data = array(
				'friend'   => '',
				'sponsor'  => $user->user_email,
				'coupon_value' => $amount[0],
				'coupon'   => $title,
				'type' => $type == 1 ? 'Refered by email' : 'Refered by share link'
			);

			$subj = rf_mail_replace( get_option( 'rf_invite_email_subject' ), $data );
			$body = rf_mail_replace( get_option( 'rf_invite_email_heading' ) . '<br>' . get_option( 'rf_invite_email_content' ), $data );
		} else {
			$data = array(
				'friend'   => '',
				'sponsor'  => '',
				'coupon'   => $title,
				'coupon_value' => $amount[0], 
				'type' => $type == 1 ? 'Refered by email' : 'Refered by share link'
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
		//echo base64_decode($this->generateUmt());
	    wc_get_template( 'refer.php', array( 'userid' => $user_id, 'url' => $refer_link),$template_path,$default_path );
		echo  ob_get_clean();
		
	}
	
	/**
	 * 
	 * @param unknown $order_id
	 * @param unknown $description if description = Invite means we reward referred friend check out, for now we do not use it in this version
	 * @param unknown $type
	 * @param number $coupon_amount
	 * @param string $coupon_expired_date
	 * @return Ambigous <number, WP_Error>
	 */
	public function rf_create_coupon( $order_id, $description, $type ,$coupon_amount = 0, $coupon_expired_date = '' ){
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
		
		
		if ($coupon_amount)  $rf_invite_coupon_amount = $coupon_amount;
		
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
		$amount = get_option( 'rf_coupon_amount' ); // Amount
		
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
		update_post_meta( $new_coupon_id, 'expiry_date', $coupon_expired_date );
		update_post_meta( $new_coupon_id, 'apply_before_tax', get_option('rf_invite_apply_before_tax' , 'yes') );
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