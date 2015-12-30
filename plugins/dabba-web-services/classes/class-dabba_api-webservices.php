<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class DABBA_API_Web_services {

	private static $instance = null;

	/**
	 * Get singleton instance of class
	 *
	 * @return null|DABBA_WS_Webservice_get_posts
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
		//add_action( 'dabba_api_webservice_get_posts', array( $this, 'get_posts' ) );

		add_action( 'dabba_api_webservice_login', array( $this, 'login' ) );
		add_action( 'dabba_api_webservice_get_zones', array( $this, 'get_zones' ) );

		add_action( 'dabba_api_webservice_register', array( $this, 'register' ) );

		add_action( 'dabba_api_webservice_today_menu', array( $this, 'today_menu' ) );
		add_action( 'dabba_api_webservice_weekend_menu', array( $this, 'weekend_menu' ) );


		//add_action( 'wpsws_general_settings', array( $this, 'settings' ), 1 );
	}

	public function login(){


		DABBA_API_Catch_Request::get()->check_params(array('user_login', 'type'));


		$user_login = $_POST['user_login'];


		switch ($_POST['type']) {
			case 'site':

				DABBA_API_Catch_Request::get()->check_params(array('user_password'));

				$user_password = $_POST['user_password'];

				$creds = array();
				$creds['user_login'] = $user_login;
				$creds['user_password'] = $user_password;
				
				$user = wp_signon( $creds, false );
				if ( is_wp_error($user) ){
					DABBA_API_Output::get()->output( false, 401, $user->get_error_code() );
				}

				
				break;
			
			case 'facebook':

				DABBA_API_Catch_Request::get()->check_params(array('facebook_uid'));

				$facebook_uid = $_POST['facebook_uid'];

				$user = get_user_by( 'email', $user_login );

				if( $user === false || get_user_meta($user->ID, '_wc_social_login_facebook_uid', true) !== $facebook_uid ){
					DABBA_API_Output::get()->output( false, 401, "User not exist or UID is invalid" );
				}
				

				break;

			case 'google':

				DABBA_API_Catch_Request::get()->check_params(array('google_uid'));

				$google_uid = $_POST['google_uid'];

				$user = get_user_by( 'email', $user_login );

				if( $user === false || get_user_meta($user->ID, '_wc_social_login_google_uid', true) !== $google_uid ){
					DABBA_API_Output::get()->output( false, 401, "User not exist or UID is invalid" );
				}
				
				break;

			default:

				DABBA_API_Output::get()->output( false, 400, "Error in param 'type'" );

				break;


		}


		DABBA_API_Output::get()->output( true, 200, '', array(
			'user' => array(
				'ID'=>$user->ID,
				'first_name' => $user->first_name,
				'last_name' => $user->last_name,
				'roles' => $user->roles,
			)
		) );
		
	}


	public function get_zones(){


		$zones = array(
			'zones' => array(
				'polanco' => 'Polanco',
				'ampliacion-granada' => "Ampliación Granada",
				'corporativos-palmas' => "Corporativos Palmas",
				'corporativos-fc-de-cuernavaca' => "Corporativos Fc. de Cuernavaca",	
			)
		);


		DABBA_API_Output::get()->output( true, 200, '', $zones );
	}


	public function register(){

		DABBA_API_Catch_Request::get()->check_params(array('user_email', 'type'));

		$user_email = $_POST['user_email'];


		if ( username_exists( $user_email ) || email_exists($user_email) ) {
			DABBA_API_Output::get()->output( false, 409, "User already exists." );
		}


		switch ($_POST['type']) {
			case 'site':

				DABBA_API_Catch_Request::get()->check_params(array('user_password'));

				$user_password = $_POST['user_password'];


				$userdata = array(
				    'user_login'  =>  $user_email,
				    'user_email'  =>  $user_email,
				    'role' 	      =>  'customer',
				    'user_pass'   =>  $user_password,
				);

				$user_id = wp_insert_user( $userdata ) ;

				if ( is_wp_error($user) ){
					DABBA_API_Output::get()->output( false, 401, $user->get_error_code() );
				}
				
				break;
			
			case 'facebook':

				DABBA_API_Catch_Request::get()->check_params(array('facebook_uid'));

				$facebook_uid = $_POST['facebook_uid'];

				$user_password = wp_generate_password( $length=12, $include_standard_special_chars=false );

				
				$userdata = array(
				    'user_login'  =>  $user_email,
				    'user_email'  =>  $user_email,
				    'role' 	      =>  'customer',
				    'user_pass'   =>  $user_password,
				);

				$user_id = wp_insert_user( $userdata ) ;



				if ( is_wp_error($user) ){
					DABBA_API_Output::get()->output( false, 401, $user->get_error_code() );
				}

				add_user_meta( $user_id, '_wc_social_login_facebook_uid', $facebook_uid);

				break;

			case 'google':

				DABBA_API_Catch_Request::get()->check_params(array('google_uid'));

				$google_uid = $_POST['google_uid'];

				$user_password = wp_generate_password( $length=12, $include_standard_special_chars=false );


				$userdata = array(
				    'user_login'  =>  $user_email,
				    'user_email'  =>  $user_email,
				    'role' 	      =>  'customer',
				    'user_pass'   =>  $user_password,
				);

				$user_id = wp_insert_user( $userdata ) ;



				if ( is_wp_error($user) ){
					DABBA_API_Output::get()->output( false, 401, $user->get_error_code() );
				}

				add_user_meta( $user_id, '_wc_social_login_google_uid', $google_uid);
				
				break;

			default:

				DABBA_API_Output::get()->output( false, 400, "Error in param 'type'" );

				break;


		}


		$user = get_user_by( 'id', $user_id );

		if( $user ){

			DABBA_API_Output::get()->output( true, 200, '', array(
				'user' => array(
					'ID'=>$user->ID,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
					'roles' => $user->roles,
				)
			) );


		}else{

			DABBA_API_Output::get()->output( false, 500, "Server Error" );

		}




	}



	public function today_menu(){

		$data = array(
			'can_order_today' => can_order_today(),
			'menu' => array(),
		);


		$product_args = array(
			'post_type' 		=> 'product',
			'posts_per_page'	=> 1,
			'meta_query' 		=> array(
				array(
					'key' 	=> '_fecha_menu_meta',
					'value'	=> date('Y-m-d'),
				)
			)
		);
		$query = new WP_Query( $product_args );

		if( $query->have_posts() ) {

			$query->the_post();

			global $product;
			global $post;

			$image 				= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'shop_single' );


			$guarnicion_1 		= get_post_meta($post->ID, '_guarnicion_1_meta', true);
			$guarnicion_2 		= get_post_meta($post->ID, '_guarnicion_2_meta', true);


			$data['menu'][] = array(
				'title' => get_the_title(),
				'content' => format_contenido_platillo( $guarnicion_1, $guarnicion_2 ),
				'image' => $image[0],
				'guarnicion_1' => $guarnicion_1,
				'guarnicion_2' => $guarnicion_2,
				'is_in_stock' => $product->is_in_stock(),
			);
		}

		DABBA_API_Output::get()->output( true, 200, '', $data );
		
	}

	public function weekend_menu(){

		$data = array(
			'menu' => array(),
		);

		$query_count = 0;
		$product_args = array(
			'post_type' 		=> 'product',
			'posts_per_page'	=> 5,
			'meta_query' 		=> array(
				array(
					'key' 	=> '_fecha_menu_meta',
					'value'	=> get_dias_restantes_semana(),
				)
			),
			'orderby'			=> 'meta_value',
			'order'				=> 'ASC'
		);
		$query = new WP_Query( $product_args );

		if( $query->have_posts() ) {
			
			while( $query->have_posts() ) {
				$query->the_post();
				global $product;
				global $post;

				$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'shop_single' );
				$fecha_menu = get_fecha_es( get_post_meta($post->ID, '_fecha_menu_meta', true) );
				
				$guarnicion_1 		= get_post_meta($post->ID, '_guarnicion_1_meta', true);
				$guarnicion_2 		= get_post_meta($post->ID, '_guarnicion_2_meta', true);



				$data['menu'][] = array(
					'title' => get_the_title(),
					'content' => format_contenido_platillo( $guarnicion_1, $guarnicion_2 ),
					'image' => $image[0],
					'guarnicion_1' => $guarnicion_1,
					'guarnicion_2' => $guarnicion_2,
					'fecha_menu' => $fecha_menu,
					'can_be_bought' => product_can_be_bought( $product->id ),
					'is_in_stock' => $product->is_in_stock(),
				);
			}
		}

		DABBA_API_Output::get()->output( true, 200, '', $data );

	}



	/**
	 * This is the default included 'get_posts' webservice
	 * This webservice will fetch all posts of set post type
	 *
	 * @todo
	 * - All sorts of security checks
	 * - Allow custom query variables in webservice (e.g. custom sorting, posts_per_page, etc.)
	 */
	public function get_posts() {

		// Check if post type is set
		if ( ! isset( $_GET['post_type'] ) ) {
			Dabba_Web_Service::get()->throw_error( 'No post type set.' );
		}

		// Set post type
		$post_type = esc_sql( $_GET['post_type'] );

		// Global options
		$options = Dabba_Web_Service::get()->get_options();

		// Get 'get_posts' options
		$gp_options = array();
		if ( isset( $options['get_posts'] ) ) {
			$gp_options = $options['get_posts'];
		}

		// Fix scenario where there are no settings for given post type
		if ( ! isset( $gp_options[$post_type] ) ) {
			$gp_options[$post_type] = array();
		}

		// Setup options
		$pt_options = wp_parse_args( $gp_options[$post_type], $this->get_default_settings() );

		// Check if post type is enabled
		if ( 'false' == $pt_options['enabled'] ) {
			Dabba_Web_Service::get()->throw_error( 'Post Type not supported.' );
		}

		// Setup default query vars
		$default_query_arguments = array(
			'posts_per_page' => - 1,
			'order'          => 'ASC',
			'orderby'        => 'title',
		);

		// Get query vars
		$query_vars = array();
		if ( isset( $_GET['qv'] ) ) {
			$query_vars = $_GET['qv'];
		}

		// Merge query vars
		$query_vars = wp_parse_args( $query_vars, $default_query_arguments );

		// Set post type
		$query_vars['post_type'] = $post_type;

		// Get posts
		$posts = get_posts( $query_vars );

		// Post data to show - this will be manageble at some point
		$show_post_data_fields = array( 'ID', 'post_title', 'post_content', 'post_date' );

		// Post meta data to show - this will be manageble at some point
		$show_post_meta_data_fields = array( 'ssm_supermarkt', 'ssm_adres' );

		// Data array
		$return_data = array();

		// Loop through posts
		foreach ( $posts as $post ) {

			$post_custom = get_post_custom( $post->ID );

			$data = array();

			// Add regular post fields data array
			foreach ( $pt_options['fields'] as $show_post_data_field ) {

				$post_field_value = $post->$show_post_data_field;

				// Fetch thumbnail
				if ( 'thumbnail' == $show_post_data_field ) {
					$post_field_value = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
				}

				// Set post field value
				$data[ $show_post_data_field ] = $post_field_value;
			}

			// Add post meta fields to data array
			foreach ( $pt_options['custom'] as $show_post_meta_data_field ) {

				$meta_field_value = get_post_meta( $post->ID, $show_post_meta_data_field, true );

				if ( $meta_field_value != '' ) {
					$data[ $show_post_meta_data_field ] = $meta_field_value;
				}

			}

			$return_data[] = $data;

		}

		DABBA_API_Output::get()->output( $return_data );
	}

}