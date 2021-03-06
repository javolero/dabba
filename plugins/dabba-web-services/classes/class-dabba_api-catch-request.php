<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class DABBA_API_Catch_Request {

	private static $instance = null;

	/**
	 * Get singleton instance of class
	 *
	 * @return null|DABBA_API_Catch_Request
	 */
	public static function get() {

		if ( self::$instance == null ) {
			self::$instance = new self();
		}

		return self::$instance;

	}

	/**
	 * Constructor
	 */
	private function __construct() {
		$this->hooks();
	}

	/**
	 * Setup hooks
	 */
	private function hooks() {
		add_action( 'template_redirect', array( $this, 'handle_request' ) );
	}


	public function check_param( $param ){

		if( !isset( $_POST[$param] ) ){

			DABBA_API_Output::get()->output( false, 400, "Param '$param' not found." );
			exit();
		}

	}

	public function check_params( $params ){

		foreach( $params as $param ){
			if( !isset( $_POST[$param] ) ){

				DABBA_API_Output::get()->output( false, 400, "Param '$param' not found." );
				exit();
			}	
		}
	}

	/**
	 * Handle webservice request
	 */
	public function handle_request() {

		global $wp_query;

		if ( $wp_query->get( 'webservice' ) ) {


			if( !isset( $_POST['auth_key'] ) || $_POST['auth_key'] != DABBA_API_AUTH_KEY ){
				DABBA_API_Output::get()->output( false, 403, 'Unauthorized' );
				exit();
			}


			if ( $wp_query->get( 'service' ) != '' ) {

				// Check if the action exists
				if ( has_action( 'dabba_api_webservice_' . $wp_query->get( 'service' ) ) ) {

					// Do action
					do_action( 'dabba_api_webservice_' . $wp_query->get( 'service' ) );

					// Bye
					exit;
				}

			}


			DABBA_API_Output::get()->output( false, 501, 'Not Implemented' );
			exit();


		}

	}

}