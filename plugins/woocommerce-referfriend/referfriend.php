<?php
/**
 * Plugin Name: WooCommerce Refer friend
 * Plugin URI: http://store.magenest.com/woocommerce-plugins/woocommerce-refer-a-friend.html
 * Description: Affiliate marketing moduel for Woocommerce
 * Author: Hungnam
 * Author URI:http://magenest.com
 * Version: 1.1
 * Text Domain: mg_referfriend
 * Domain Path: /languages/
 *
 * Copyright: (c) 2011-2014 Magenest. (support@hungnamecommerce.com)
 *
 *
 * @package   woocommerce-refer-a-friend
 * @author    Magenest
 * @category  Affiliate Marketing
 * @copyright Copyright (c) 2014, Hungnam, Inc.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class MG_Referfriend_Woocommerce {
	
	private static $referfriend_instance;
	
	public static function getInstance(){
		if( ! self::$referfriend_instance ) {
			self::$referfriend_instance = new MG_Referfriend_Woocommerce();
			self::$referfriend_instance->setup_constants();
			self::$referfriend_instance->includes();
			self::$referfriend_instance->hooks();
		}
		return self::$referfriend_instance;
	}
	
	/**
	 * Setup plugin constants
	 *
	 * @access      private
	 * @since       1.0.0
	 * @return      void
	 */
	public function rpwcgc_loaddomain() {
		load_plugin_textdomain( 'mg_referfriend', false, 'woooreferfriend/languages/' );
	}
	private function setup_constants() {
	
		define( 'RF_VERSION', '1.1.0' );
	
		// Plugin Folder Path
		define( 'RF_PATH', plugin_dir_path( __FILE__ ) );
	
		// Plugin Folder URL
		define( 'RF_URL', plugins_url( 'woocommerce-referfriend', 'referfriend.php' ) );
	
		// Plugin Root File
		define( 'RF_FILE', plugin_basename( __FILE__ )  );
		
		define( 'RF_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
	
	}
	
	/**
	 * Include necessary files
	 *
	 * @access      private
	 * @since       1.0.0
	 * @return      void
	 */
	private function includes() {
		// Include scripts
		if( is_admin() ) {
			// Create all admin functions and pages
			require_once RF_PATH . 'admin/referfriend-columns.php';
			require_once RF_PATH . 'admin/referfriend-metabox.php';
			require_once RF_PATH . 'admin/referfriend-functions.php';
		}
		require_once RF_PATH . 'referfriend/referfriend-forms.php';
		require_once RF_PATH . 'referfriend/referfriend-myaccount.php';
	}
	
	public function mg_referfriend_create_post_type() {
		$show_in_menu = current_user_can( 'manage_woocommerce' ) ? 'woocommerce' : true;
	
		register_post_type( 'mg_referfriend',
				array(
						'labels' => array(
								'name'      			=> __( 'Referfriend', 'mg_referfriend' ),
								'singular_name'			=> __( 'Referfriend', 'mg_referfriend' ),
								'menu_name'    			=> _x( 'Referfriend', 'Admin menu name', 'mg_referfriend' ),
								'add_new'     			=> __( 'Add Referfriend', 'mg_referfriend' ),
								'add_new_item'    		=> __( 'Add New Referfriend', 'mg_referfriend' ),
								'edit'      			=> __( 'Edit', 'mg_referfriend' ),
								'edit_item'    			=> __( 'Edit Referfriend', 'mg_referfriend' ),
								'new_item'     			=> __( 'New Referfriend', 'mg_referfriend' ),
								'view'      			=> __( 'View Referfriends', 'mg_referfriend' ),
								'view_item'    			=> __( 'View Referfriend', 'mg_referfriend' ),
								'search_items'    		=> __( 'Search Referfriends', 'mg_referfriend' ),
								'not_found'    			=> __( 'No Referfriends found', 'mg_referfriend' ),
								'not_found_in_trash'	=> __( 'No Referfriends found in trash', 'mg_referfriend' ),
								'parent'     			=> __( 'Parent Referfriend', 'mg_referfriend' )
						),
	
						'public'  				=> true,
						'has_archive' 			=> true,
						'publicly_queryable'	=> false,
						'exclude_from_search'	=> false,
						'show_in_menu' 	 		=> $show_in_menu,
						'hierarchical' 			=> false,
						'supports'   			=> array( 'title', 'comments' )
				)
		);
	
		register_post_status( 'zerobalance', array(
				'label'                     => __( 'Zero Balance', 'mg_referfriend' ),
				'public'                    => true,
				'exclude_from_search'       => false,
				'show_in_admin_all_list'    => true,
				'show_in_admin_status_list' => true,
				'label_count'               => _n_noop( 'Zero Balance <span class="count">(%s)</span>', 'Zero Balance <span class="count">(%s)</span>' )
		) );
	
	}
	
	/**
	 * Run action and filter hooks
	 *
	 * @access      private
	 * @since       1.0.0
	 * @return      void
	 *
	 */
	private function hooks() {	
		add_action('wp_enqueue_scripts', array($this,'load_assets'));
		
		add_action( 'magenestnest_before_refer_friend_form', 'wc_print_notices', 10 );
		
		add_action( 'init', array( $this, 'mg_referfriend_create_post_type' ) );	
		add_filter( 'woocommerce_get_settings_pages', array( $this, 'rf_add_settings_page'), 10, 1);
		
		add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 2 );
		
	}
	
	public function load_assets() {
		wp_enqueue_style( 'referfriend-style', plugins_url().'/woocommerce-referfriend//assets/rf.css' );
		
	}
	public function rf_add_settings_page( $settings ) {
		$settings[] = include( RF_PATH . 'admin/referfriend-settings.php' );
	
		return apply_filters( 'rf_setting_classes', $settings );
	}
	
	/**
	 * Show row meta on the plugin screen.
	 *
	 * @param	mixed $links Plugin Row Meta
	 * @param	mixed $file  Plugin Base file
	 * @return	array
	 */
	public static function plugin_row_meta( $links, $file ) {
		if ( $file == RF_PLUGIN_BASENAME ) {
			$row_meta = array(
					'docs'    => '<a href="' . esc_url( apply_filters( 'rf_docs_url', 'http://wiki.magenest.com/doku.php?id=woocommerce-plugin-guideline:woocommerce-refer-friend' ) ) . '" title="' . esc_attr( __( 'View Refer a friend Documentation', 'mg_referfriend' ) ) . '">' . __( 'Docs', 'mg_referfriend' ) . '</a>',
					'faq' => '<a href="' . esc_url( apply_filters( 'rf_faq_url', 'http://wiki.magenest.com/doku.php?id=woocommerce-plugin-guideline:woocommerce-refer-friend:faq' ) ) . '" title="' . esc_attr( __( 'View FAQ', 'woocommerce' ) ) . '">' . __( 'FAQ', 'mg_referfriend' ) . '</a>',
					'support' => '<a href="' . esc_url( apply_filters( 'rf_support_url', 'http://magenest.com/contact/' ) ) . '" title="' . esc_attr( __( 'Visit Premium Customer Support Forum', 'mg_referfriend' ) ) . '">' . __( 'Support', 'mg_referfriend' ) . '</a>',
			);
	
			return array_merge( $links, $row_meta );
		}
	
		return (array) $links;
	}
	
}


function initial() {
	MG_Referfriend_Woocommerce::getInstance();
}
add_action( 'plugins_loaded', 'initial', 12 );