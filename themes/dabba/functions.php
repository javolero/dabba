<?php
date_default_timezone_set('America/Mexico_City');
/*------------------------------------*\
	#CONSTANTS
\*------------------------------------*/

	/**
	* Define paths to javascript, styles, theme and site.
	**/
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'BOOTSTRAP_PATH', get_template_directory_uri() . '/dist/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	define( 'SITEURL', site_url('/') );



/*------------------------------------*\
	#INCLUDES
\*------------------------------------*/

	require_once('inc/post-types.php');
	require_once('inc/metaboxes.php');
	require_once('inc/taxonomies.php');
	require_once('inc/pages.php');
	require_once('inc/users.php');
	require_once('inc/functions-admin.php');
	require_once('inc/functions-js-footer.php');
	require_once('inc/functions-js-footer-admin.php');
	include 'inc/extra-metaboxes.php';



/*------------------------------------*\
	#GENERAL FUNCTIONS
\*------------------------------------*/

	/**
	* Enqueue frontend scripts and styles
	**/
	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );
		wp_enqueue_script( 'bootstrap_js', BOOTSTRAP_PATH.'/js/bootstrap.js', array('plugins'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'functions', 'site_url', site_url() );
		wp_localize_script( 'functions', 'theme_url', THEMEPATH );

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});

	/**
	* Add javascript to the footer of pages.
	**/
	add_action( 'wp_footer', 'footer_scripts', 21 );





/*------------------------------------*\
	#HELPER FUNCTIONS
\*------------------------------------*/

/**
 * Print the title tag based on what is being viewed.
 * @return string
 */
function print_title(){

	global $page, $paged;

	wp_title( '|', true, 'right' );
	bloginfo( 'name' );

	// Add a page number if necessary
	if ( $paged >= 2 || $page >= 2 ){
		echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
	}

}// print_title

show_admin_bar(false);





/*------------------------------------*\
	#FORMAT FUNCTIONS
\*------------------------------------*/

/**
 * Formatear subtítulo de platillo dependiendo el número de guarniciones.
 * @param string $guarnicion_1
 * @param string $guarnicion_2
 * @return string $subtitulo_platillo
 */
function format_contenido_platillo( $guarnicion_1, $guarnicion_2 ){

	 $subtítulo_platillo = '';

	 if( '' !== $guarnicion_1 && '' !== $guarnicion_2 )
	 	$subtítulo_platillo .= $guarnicion_1 . ' y ' . $guarnicion_2;

	 if( '' !== $guarnicion_1 && '' === $guarnicion_2 ) $subtítulo_platillo .= ' y ' . $guarnicion_1;

	 return $subtítulo_platillo;

}// format_contenido_platillo




/*------------------------------------*\
	#SET/GET FUNCTIONS
\*------------------------------------*/

/**
 * Regresa los días restantes de la semana en formato yyyy-dd-mm
 * @return array $dias_semana
 */
function get_dias_restantes_semana(){

	$dias_extra = 1;
	$dias_semana = array();

	if( 5 == date( 'N' ) || 6 == date( 'N' ) || 7 == date( 'N' ) ) return get_dias_siguiente_semana();

	for ( $numero_dia_hoy = date('N'); $numero_dia_hoy <= 5 ; $numero_dia_hoy++ ) {
		array_push( $dias_semana, date( 'Y-m-d', strtotime( date( 'Y-m-d' ) . ' +' . $dias_extra . ' day' ) ) );
		$dias_extra++;
	}

	return $dias_semana;

}// get_dias_restantes_semana

/**
 * Regresa los días de la siguiente semana en formato yyyy-dd-mm
 * @return array $dias_semana
 */
function get_dias_siguiente_semana(){

	$dias_semana = array();
	$dias_extra = 1;
	switch ( date('N') ) {
		case 5:
			$dias_extra += 2;
			break;
		case 6:
			$dias_extra += 1;
			break;
	}

	for ( $numero_dia = 1; $numero_dia <= 5 ; $numero_dia++ ) {
		array_push( $dias_semana, date( 'Y-m-d', strtotime( date( 'Y-m-d' ) . ' +' . $dias_extra . ' day' ) ) );
		$dias_extra++;
	}
	return $dias_semana;

}// get_dias_siguiente_semana

/**
 * Regresa fecha en español.
 * Ej. Lunes 18 de septiembre
 * @param string $fecha
 * @return string $fecha_formateada
 */
function get_fecha_es( $fecha ){

	$dia_semana = get_nombre_dia( date( 'N', strtotime( $fecha ) ) );
	$fecha_arr = explode( '-', $fecha );
	$mes = get_nombre_mes( $fecha_arr[1] );
	return $dia_semana . ' ' . $fecha_arr[2] . ' de ' . $mes;

}// get_fecha_es

/**
 * Regresa el nombre del día en español
 * @param int $num_dia
 * @return string $dia
 */
function get_nombre_dia( $num_dia ){

	switch( $num_dia ){
		case 1:
			return 'Lunes';
		case 2:
			return 'Martes';
		case 3:
			return 'Miércoles';
		case 4:
			return 'Jueves';
		case 5:
			return 'Viernes';
	}

}// get_nombre_dia

/**
 * Regresa el nombre del mes en español
 * @param int $num_mes
 * @return string $mes
 */
function get_nombre_mes( $num_mes ){

	switch( $num_mes ){
		case 1:
			return 'enero';
		case 2:
			return 'febrero';
		case 3:
			return 'marzo';
		case 4:
			return 'abril';
		case 5:
			return 'mayo';
		case 6:
			return 'junio';
		case 7:
			return 'julio';
		case 8:
			return 'agosto';
		case 9:
			return 'septiembre';
		case 10:
			return 'octubre';
		case 11:
			return 'noviembre';
		case 12:
			return 'diciembre';
	}

}// get_nombre_mes

/**
 * Regresa los ingredientes en un array
 * @param int $post_id
 * @return array $ingredientes
 */
function get_ingredientes( $post_id ){

	$ingredientes_str = get_post_meta( $post_id, '_ingredientes_meta', true );
	return explode( ',', $ingredientes_str );

}// get_ingredientes

function get_todays_menu_id(){

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

	if( $query->have_posts() ) : $query->the_post();
		global $product;
		if( $product->is_in_stock() ) return $product->id;

		return 0;
	endif;

	return 0;

}// get_todays_menu_id

/**
 * Imprime HTML del botón "Add to cart" para el menú del día
 */
function get_todays_add_to_cart_btn(){

	$todays_menu_id = get_todays_menu_id();

	if( $todays_menu_id ) {
		return '<a href="/dabba/?add-to-cart="' . $todays_menu_id . ' rel="nofollow" data-product_id="' . $todays_menu_id . '" data-product_sku="" data-quantity="1" class="[ btn btn-primary btn--action btn--action--center ][ padding--sides ][ add_to_cart_button product_type_simple ]">ordenar ahora</a>';
	}

}// get_todays_add_to_cart_btn

/*------------------------------------*\
	#AJAX FUNCTIONS
\*------------------------------------*/

/**
 * Send contact email to PMI.
 */
function agregar_usuario_prospecto(){

	$zona = $_POST['zona'];
	$email = $_POST['email'];

	$post_id = wp_insert_post(array (
	    'post_type' => 'usuarios-prospecto',
	    'post_title' => $email,
	    'post_content' => $zona,
	    'post_status' => 'draft',
	));

	if ($post_id) {
	    $message = array(
			'error'		=> false,
			'message'	=> '¡Prospecto guardado!',
		);
		echo json_encode( $message , JSON_FORCE_OBJECT );
		exit;
	}

	$message = array(
		'error'		=> true,
		'message'	=> 'No se pudo guardar el prospecto',
	);
	echo json_encode($message , JSON_FORCE_OBJECT);
	exit();

}// agregar_usuario_prospecto
add_action("wp_ajax_agregar_usuario_prospecto", "agregar_usuario_prospecto");
add_action("wp_ajax_nopriv_agregar_usuario_prospecto", "agregar_usuario_prospecto");



/*-----------------------------------------------*\
	WOOCOMMERCE FUNCTIONS / ACTIONS / FILTERS
\*-----------------------------------------------*/

/*
 * Add WooCommerce support to current theme.
 */
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );

/*
 * Replace WooCommerce default wrapper with ours
 */
function my_theme_wrapper_start() {
	echo '<section id="main">';
}
function my_theme_wrapper_end() {
	echo '</section>';
}
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


/*
 * Redireccionar a checkout despues de agregar un producto
 */
add_filter ('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');
function redirect_to_checkout() {
    return WC()->cart->get_checkout_url();
}

/*
 *  Solo vender en el DF
 */
add_filter( 'woocommerce_states', 'wc_sell_only_states' );
function wc_sell_only_states( $states ) {
	$states['MX'] = array(
		'Distrito Federal' 	=> __( 'Distrito Federal', 'woocommerce' ),
	);
	return $states;
}

/**
 * Add new register fields for WooCommerce registration.
 * @return string Register fields HTML.
 */
function wooc_extra_register_fields() {
	?>

	<input class="[ col-xs-6 ][ form-control ][ margin-bottom--small ][ input-text ]" name="billing_first_name" type="text" id="reg_billing_first_name" placeholder="<?php _e( 'First name', 'woocommerce' ); ?>*" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" >
	<input class="[ col-xs-6 ][ form-control ][ margin-bottom--small ][ input-text ]" name="billing_last_name" type="text" id="reg_billing_last_name" placeholder="<?php _e( 'Last name', 'woocommerce' ); ?>*" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" >

	<!-- <p class="form-row form-row-first">
	<label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
	</p> -->

	<!-- <p class="form-row form-row-last">
	<label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
	</p> -->


	<?php
}
add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

/**
 * Validate the extra register fields.
 *
 * @param  string $username          Current username.
 * @param  string $email             Current email.
 * @param  object $validation_errors WP_Error object.
 *
 * @return void
 */
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
	if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
		$validation_errors->add( 'billing_first_name_error', __( 'El nombre es obligatorio', 'woocommerce' ) );
	}

	if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
		$validation_errors->add( 'billing_last_name_error', __( 'El apellido es obligatorio', 'woocommerce' ) );
	}

}
add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );

/**
 * Save the extra register fields.
 *
 * @param  int  $customer_id Current customer ID.
 *
 * @return void
 */
function wooc_save_extra_register_fields( $customer_id ) {
	if ( isset( $_POST['billing_first_name'] ) ) {
		// WordPress default first name field.
		update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );

		// WooCommerce billing first name.
		update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
	}

	if ( isset( $_POST['billing_last_name'] ) ) {
		// WordPress default last name field.
		update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );

		// WooCommerce billing last name.
		update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
	}

}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );

/**
 * Redireccionar usuarios al home despues de registrarse
 * @return string
 */
add_filter('woocommerce_login_redirect', 'wcs_login_redirect');
function wcs_login_redirect( $redirect ) {
     $redirect = site_url();
     return $redirect;
}


/**
 * Redireccionar usuarios al home despues de registrarse
 * @return string
 */
add_filter('registration_redirect', 'wcs_registration_redirect');
function wcs_registration_redirect( $redirect ) {
     $redirect = site_url();
     return $redirect;
}

/**
*  Ensure cart contents update when products are added to the cart via AJAX.
**/
function woocommerce_header_add_to_cart_fragment( $fragments ) {

	ob_start();
	?>
	<span class="[ notification notification__number ][ js-notification__number ]"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span>
	<?php

	$fragments['.notification__number'] = ob_get_clean();
	return $fragments;

}// woocommerce_header_add_to_cart_fragment
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );