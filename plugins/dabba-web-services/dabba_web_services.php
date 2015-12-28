<?php
/*
Plugin Name: Dabba Web Services
Description: Dabba Web Services
Version: 1
Author: Javolero
Author URI: https://github.com/javolero/
*/

if ( ! defined( 'DABBA_API_PLUGIN_DIR' ) ) {
	define( 'DABBA_API_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'DABBA_API_PLUGIN_FILE' ) ) {
	define( 'DABBA_API_PLUGIN_FILE', __FILE__ );
}

/*
 * @todo
 * - Make it easy for webservice developers to create custom settings
 */
class Dabba_Web_Service {

	const WEBSERVICE_REWRITE = 'api/([a-zA-Z0-9_-]+)$';
	const OPTION_KEY         = 'wpw_options';

	private static $instance = null;

	/**
	 * Get singleton instance of class
	 *
	 * @return null|Dabba_Web_Service
	 */
	public static function get() {

		if ( self::$instance == null ) {
			self::$instance = new self();
		}

		return self::$instance;

	}

	/**
	 * Function that runs on install
	 */
	public static function install() {

		// Clear the permalinks
		flush_rewrite_rules();

	}

	/**
	 * Constructor
	 */
	private function __construct() {

		// Load files
		$this->includes();

		// Init
		$this->init();

	}

	/**
	 * Load required files
	 */
	private function includes() {

		require_once( DABBA_API_PLUGIN_DIR . 'classes/class-dabba_api_rewrite_rules.php' );
		require_once( DABBA_API_PLUGIN_DIR . 'classes/class-dabba_api-webservices.php' );

		if ( is_admin() ) {
			// Backend

			require_once( DABBA_API_PLUGIN_DIR . 'classes/class-dabba_api-settings.php' );

		}
		else {
			// Frondend

			require_once( DABBA_API_PLUGIN_DIR . 'classes/class-dabba_api-catch-request.php' );
			require_once( DABBA_API_PLUGIN_DIR . 'classes/class-dabba_api-output.php' );
		}

	}

	/**
	 * Initialize class
	 */
	private function init() {

		// Setup Rewrite Rules
		DABBA_API_Rewrite_Rules::get();

		// Default webservice
		DABBA_API_Web_services::get();

		if ( is_admin() ) {
			// Backend

			// Setup settings
			DABBA_API_Settings::get();

		}
		else {
			// Frondend

			// Catch request
			DABBA_API_Catch_Request::get();
		}

	}

	/**
	 * The correct way to throw an error in a webservice
	 *
	 * @param $error_string
	 */
	public function throw_error( $error_string ) {
		wp_die( '<b>Webservice error:</b> ' . $error_string );
	}

	/**
	 * Function to get the plugin options
	 *
	 * @return array
	 */
	public function get_options() {
		return get_option( self::OPTION_KEY, array() );
	}

	/**
	 * Function to save the plugin options
	 *
	 * @param $options
	 */
	public function save_options( $options ) {
		update_option( self::OPTION_KEY, $options );
	}

}

/**
 * Function that returns singleton instance of Dabba_Web_Service class
 *
 * @return null|Dabba_Web_Service
 */
function Dabba_Web_Service() {
	return Dabba_Web_Service::get();
}

// Load plugin
add_action( 'plugins_loaded', create_function( '', 'Dabba_Web_Service::get();' ) );

// Install hook
register_activation_hook( DABBA_API_PLUGIN_FILE, array( 'Dabba_Web_Service', 'install' ) );