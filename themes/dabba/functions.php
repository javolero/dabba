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
 * @param string $platillo
 * @param string $guarnicion_1
 * @param string $guarnicion_2
 * @return string $subtitulo_platillo
 */
function format_contenido_platillo( $platillo, $guarnicion_1, $guarnicion_2 ){

	 $subtítulo_platillo = $platillo;

	 if( '' !== $guarnicion_1 && '' !== $guarnicion_2 ) 
	 	$subtítulo_platillo .= ', ' . $guarnicion_1 . ' y ' . $guarnicion_2;

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
	//$numero_dia_hoy = date('N')
	for ( $numero_dia_hoy = date('N'); $numero_dia_hoy <= 5 ; $numero_dia_hoy++ ) { 
		array_push( $dias_semana, date( 'Y-m-d', strtotime( date( 'Y-m-d' ) . ' +' . $dias_extra . ' day' ) ) );
		$dias_extra++;
	}

	return $dias_semana;

}// get_dias_restantes_semana

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




/*------------------------------------*\
	#AJAX FUNCTIONS
\*------------------------------------*/

/**
 * Send contact email to PMI.
 */
function send_email_contacto(){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$to_email = get_contact_email();
	$msg = $_POST['message'];

	$to = $to_email;
	$subject = $name . ' te ha contactado a través de www.pmi.com.mx: ';
	$headers = 'From: My Name <' . $to_email . '>' . "\r\n";
	$message = '<html><body>';
	$message .= '<h3>Datos de contacto</h3>';
	$message .= '<p>Nombre: '.$name.'</p>';
	$message .= '<p>Email: '. $email . '</p>';
	if( $msg != '' ) $message .= '<p>Mensaje: '. $msg . '</p>';
	$message .= '</body></html>';

	add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
	$mail = wp_mail($to, $subject, $message, $headers );

	if( ! $mail ) {
		$message = array(
		'error'		=> 1,
		'message'	=> 'No se pudo enviar el correo.',
		);
		echo json_encode($message , JSON_FORCE_OBJECT);
		exit;
	}

		$message = array(
			'error'		=> 0,
			'message'	=> 'Gracias por tu mensaje ' . $name . '. En breve nos pondremos en contacto contigo.',
		);
		echo json_encode($message , JSON_FORCE_OBJECT);
		exit();

}// send_email_contacto
add_action("wp_ajax_send_email_contacto", "send_email_contacto");
add_action("wp_ajax_nopriv_send_email_contacto", "send_email_contacto");



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
add_filter ('add_to_cart_redirect', 'redirect_to_checkout');
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














