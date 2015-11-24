<?php
/**
 * WooCommerce Referfriend Settings
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * WC_Settings_Accounts
 */
class MGRF_Settings extends WC_Settings_Page {
	
	public function __construct() {
		$this->id    = 'referfriend';
		$this->label = __( 'Referfriend',  'mg_referfriend' );
	
		add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
		add_action( 'woocommerce_settings_' . $this->id, array( $this, 'output' ) );
		add_action( 'woocommerce_settings_save_' . $this->id, array( $this, 'save' ) );
		add_action( 'woocommerce_sections_' . $this->id, array( $this, 'output_sections' ) );
	
		add_action( 'woocommerce_admin_field_addon_settings', array( $this, 'addon_setting' ) );
		add_action( 'woocommerce_admin_field_excludeProduct', array( $this, 'excludeProducts' ) );
	}
	
	/**
	 * Get sections
	 *
	 * @return array
	 */
	public function get_sections() {
	
		$sections = apply_filters( 'woocommerce_add_section_referfriend', array( '' => __( 'General Options', 'mg_referfriend' ) ) );
	
		$email = array( 'email_template' => __( 'Email Template', 'mg_referfriend' ) );
		$sections = array_merge($sections, $email);
		$email = array( 'social_share' => __( 'Social Share', 'mg_referfriend' ) );
		$sections = array_merge($sections, $email);
	
		return apply_filters( 'woocommerce_get_sections_' . $this->id, $sections );
	}
	
	/**
	 * Output sections
	 */
	public function output_sections() {
		global $current_section;
	
		$sections = $this->get_sections();
	
		if ( empty( $sections ) ) {
			return;
		}
	
		echo '<ul class="subsubsub">';
	
		$array_keys = array_keys( $sections );
	
		foreach ( $sections as $id => $label ) {
			echo '<li><a href="' . admin_url( 'admin.php?page=wc-settings&tab=' . $this->id . '&section=' . sanitize_title( $id ) ) . '" class="' . ( $current_section == $id ? 'current' : '' ) . '">' . $label . '</a> ' . ( end( $array_keys ) == $id ? '' : '|' ) . ' </li>';
		}
	
		echo '</ul><br class="clear" />';
	}
	
	/**
	 * Output the settings
	 */
	public function output() {
		global $current_section;
	
		if( $current_section == '' ) {
			$settings = $this->rf_genaral_setting();
		} elseif ( $current_section == 'email_template' ) {
			$settings = $this->rf_email_template_setting();
		} else {
			$settings = $this->rf_social_share_setting();
		}
	
		WC_Admin_Settings::output_fields( $settings );
	}
	
	/**
	 * Save settings
	 */
	public function save() {
		global $current_section;
		
		if( $current_section == '' ) {
			$settings = $this->rf_genaral_setting();
		} elseif ( $current_section == 'email_template' ) {
			$settings = $this->rf_email_template_setting();
		} else {
			$settings = $this->rf_social_share_setting();
		}
		
		WC_Admin_Settings::save_fields( $settings );
	}
	
	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function rf_genaral_setting( $current_section = '' ) {
		$options = '';
	
		$options = apply_filters( 'woocommerce_rf_genaral_setting', array(
				
				array( 'title' 		=> __( 'Refer a Friend',  'mg_referfriend'  ), 'type' => 'title' ),
				
				array(
						'title'         => __( 'Allow invite a friend',  'mg_referfriend'  ),
						'id'            => 'rf_enable_invitation',
						'default'       => 1,
						'type'          => 'checkbox',
				),
				array(
						'title'         => __( 'Allow share link',  'mg_referfriend'  ),
						'id'            => 'rf_enable_sharelink',
						'default'       => 1,
						'type'          => 'checkbox',
				),
				array(
						'title'         => __( 'Cookie of referral will expire after x days',  'mg_referfriend'  ),
						'id'            => 'rf_cookie_duration',
						'default'       => '30',
						'type'          => 'text',
				),
				
				array(
						'title'         => __( 'Reward affiliate and send notification email when status of order',   'mg_referfriend'  ),
						'id'            => 'magenest_rf_reward_when',
						'type'          => 'select',
						'options' => array (
								'completed' => __ ( 'Completed',  'mg_referfriend' ),
								'processing' => __ ( 'Processing',  'mg_referfriend' ),
								'on-hold' => __ ( 'On hold',  'mg_referfriend' ),
								'pending' => __ ( 'Pending',  'mg_referfriend' ),
						),
						'autoload'      => false
				),
				array(
						'title'         => __( 'Give bonus to referfal for friend registration',  'mg_referfriend'  ),
						'id'            => 'rf_bonus_signup',
						'default'       => 1,
						'type'          => 'checkbox',
				),
				
				array(
						'name'     => __( 'Coupon Amount for friend sign up', 'mg_referfriend' ),
						'desc'     => __( 'This is the amount for the coupon sent after a friend received invitation and sign up', 'mg_referfriend' ),
						'id'       => 'rf_coupon_sign_up_amount',
						'type'     => 'text',
				),
				array( 'type' => 'sectionend', 'id' => 'account_registration_options'),
					
				array( 'title' 		=> __( 'Invitation Coupon Settings',  'mg_referfriend'  ), 'type' => 'title', 'desc' => __('Coupon is automatically insert in invitation email')  ),

				array(
						'title'         => __( 'Coupon Type',  'mg_referfriend'  ),
						'id'            => 'rf_invite_coupon_type',
						'default'       => 1,
						'type'          => 'select',
						'options'		=> wc_get_coupon_types()
				),
				
				array(
						'name'     => __( 'Coupon Amount (in local currency)', 'mg_referfriend' ),
						'desc'     => __( 'This is the amount for the coupon sent as a reward', 'mg_referfriend' ),
						'id'       => 'rf_invite_coupon_amount',
						'type'     => 'text',
				),
				
				array(
						'name'     => __( 'Coupon Minimum Amount', 'mg_referfriend' ),
						'desc'     => __( 'You can set minimum amount for the order', 'mg_referfriend' ),
						'id'       => 'rf_invite_coupon_minimum_amount',
						'type'     => 'text',
				),
				
				array(
						'name'     => __( 'Coupon Duration', 'mg_referfriend' ),
						'desc'     => __( 'Coupon duration is mandatory. Value is the number of days beginning on the coupong creation.', 'mg_referfriend' ),
						'id'       => 'rf_invite_coupon_duration',
						'type'     => 'text',
				),
				
				array(
						'title'         => __( 'Individual Use',  'mg_referfriend'  ),
						'desc'          => __( 'individual use',  'mg_referfriend'  ),
						'id'            => 'rf_invite_individual_use',
						'default'       => 'no',
						'type'          => 'checkbox',
						'autoload'      => true
				),
				
				array(
						'title'         => __( 'Apply before tax',  'mg_referfriend'  ),
						'desc'          => __( 'Apply before tax',  'mg_referfriend'  ),
						'id'            => 'rf_invite_apply_before_tax',
						'default'       => 'no',
						'type'          => 'checkbox',
						'autoload'      => true
				),
				array( 'type' => 'sectionend', 'id' => 'product_referfriend_options'),
				
				array( 'title' 		=> __( 'Reward Coupon Settings',  'mg_referfriend'  ), 'type' => 'title', 'desc' => __('Coupon is rewarded to referral after a friend received invitation email or follow the referral link and place order')  ),
				
				array(
						'title'         => __( 'Coupon Type',  'mg_referfriend'  ),
						'id'            => 'rf_reward_coupon_type',
						'default'       => 1,
						'type'          => 'select',
						'options'		=> wc_get_coupon_types()
				),
					
				array(
						'name'     => __( 'Coupon Amount', 'mg_referfriend' ),
						'desc'     => __( 'This is the amount for the coupon sent as a reward', 'mg_referfriend' ),
						'id'       => 'rf_reward_coupon_amount',
						'type'     => 'text',
				),
					
				array(
						'name'     => __( 'Coupon Minimum Amount', 'mg_referfriend' ),
						'desc'     => __( 'You can set minimum amount for the order', 'mg_referfriend' ),
						'id'       => 'rf_reward_coupon_minimum_amount',
						'type'     => 'text',
				),
					
				array(
						'name'     => __( 'Coupon Duration', 'mg_referfriend' ),
						'desc'     => __( 'Coupon duration is mandatory. Value is the number of days beginning on the coupong creation.', 'mg_referfriend' ),
						'id'       => 'rf_reward_coupon_duration',
						'type'     => 'text',
				),
					
				array(
						'title'         => __( 'Individual Use',  'mg_referfriend'  ),
						'desc'          => __( 'individual use',  'mg_referfriend'  ),
						'id'            => 'rf_reward_individual_use',
						'default'       => 'no',
						'type'          => 'checkbox',
						'autoload'      => true
				),
					
				array(
						'title'         => __( 'Apply before tax',  'mg_referfriend'  ),
						'desc'          => __( 'Apply before tax',  'mg_referfriend'  ),
						'id'            => 'rf_reward_apply_before_tax',
						'default'       => 'no',
						'type'          => 'checkbox',
						'autoload'      => true
				),
				array( 'type' => 'sectionend', 'id' => 'product_referfriend_options'),
					
		));
		
		return apply_filters ('rf_general_setting', $options );
	}
	
	/**
	 * Email template setting
	 *
	 * @return array
	 */
	public function rf_email_template_setting(){
		
		$options = array(
					
				array( 'title' 		=> __( 'Reward email details',  'mg_referfriend'  ), 'type' => 'title' ),
					
				array(
						'title'     => __( 'Email Heading', 'mg_referfriend' ),
						'desc'     => __( 'Heading will appear on the top of the email', 'mg_referfriend' ),
						'default'  => '{{friend}} just order on {{sitename}}',
						'id'       => 'rf_reward_email_heading',
						'type'     => 'text',
				),
					
				array(
						'title'     => __( 'Email Subject', 'mg_referfriend' ),
						'desc'     => __( 'Refer documentation to use {{alias}} in templates', 'mg_referfriend' ),
						'default'  => '{{friend}} just order on {{sitename}}',
						'id'       => 'rf_reward_email_subject',
						'type'     => 'text',
				),
					
				array(
						'title'     => __( 'Email Content', 'mg_referfriend' ),
						'desc'     => __( 'You can use HTML code at your own risk', 'mg_referfriend' ),
						'default'  => 'Hi {{sponsor}}',
						'id'       => 'rf_reward_email_content',
						'type'     => 'textarea',
				),
					
				array( 'type' => 'sectionend', 'id' => 'product_referfriend_options'),
					
					
				array( 'title' 		=> __( 'Invitation email details',  'mg_referfriend'  ), 'type' => 'title' ),
					
					
				array(
						'title'     => __( 'Email Heading', 'mg_referfriend' ),
						'desc'     => __( 'Heading will appear on the top of the email', 'mg_referfriend' ),
						'default'  => '{{friend}} just order on {{sitename}}',
						'id'       => 'rf_invite_email_heading',
						'type'     => 'text',
				),
		
				array(
						'title'     => __( 'Email Subject', 'mg_referfriend' ),
						'desc'     => __( 'Refer documentation to use {{alias}} in templates', 'mg_referfriend' ),
						'default'  => '{{friend}} just order on {{sitename}}',
						'id'       => 'rf_invite_email_subject',
						'type'     => 'text',
				),
		
				array(
						'title'     => __( 'Email Content', 'mg_referfriend' ),
						'desc'     => __( 'You can use HTML code at your own risk', 'mg_referfriend' ),
						'default'  => 'Hi {{sponsor}}',
						'id'       => 'rf_invite_email_content',
						'type'     => 'textarea',
				),
					
				array( 'type' => 'sectionend', 'id' => 'product_referfriend_options'),
		
		); // End pages settings
		
		return apply_filters ('rf_email_template_setting', $options );
	}
	
	/**
	 * Social share setting
	 *
	 * @return array
	 */
	public function rf_social_share_setting(){
	
		$options = array(
				array( 'title' 		=> __( 'Social share',  'mg_referfriend'  ), 'type' => 'title' ),
					
				array(
						'title'         => __( 'Facebook',  'mg_referfriend'  ),
						'desc'          => __( 'Allow sharing via facebook',  'mg_referfriend'  ),
						'id'            => 'rf_share_facebook',
						'type'          => 'checkbox',
						'autoload'      => false
				),
				
				array(
						'title'         => __( 'Twitter',  'mg_referfriend'  ),
						'desc'          => __( 'Allow sharing via twitter',  'mg_referfriend'  ),
						'id'            => 'rf_share_twitter',
						'type'          => 'checkbox',
						'autoload'      => false
				),
				
				array(
						'title'         => __( 'Google',  'mg_referfriend'  ),
						'desc'          => __( 'Allow sharing via google plus',  'mg_referfriend'  ),
						'id'            => 'rf_share_google_plus',
						'type'          => 'checkbox',
						'autoload'      => false
				),
				
				array(
						'title'         => __( 'Email',  'mg_referfriend'  ),
						'desc'          => __( 'Allow sharing via email',  'mg_referfriend'  ),
						'id'            => 'rf_share_email',
						'type'          => 'checkbox',
						'autoload'      => false
				),
					
				array( 'type' => 'sectionend', 'id' => 'product_referfriend_options'),
		); // End pages settings
	
		return apply_filters ('rf_social_share_setting', $options );
	}
	
}

return new MGRF_Settings();