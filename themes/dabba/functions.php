<?php

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
		wp_localize_script( 'functions', 'allPhotosInfo', get_photos_info() );


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




/*------------------------------------*\
	#FORMAT FUNCTIONS
\*------------------------------------*/





/*------------------------------------*\
	#SET/GET FUNCTIONS
\*------------------------------------*/

/**
 * Jalar la latitud de un post tipo 'foto-jg'
 * @param int $post_id
 * @return int $lat
 */
function get_lat( $post_id ){
	return get_post_meta($post_id, '_lat_meta', true);
}// get_lat

/**
 * Jalar la longitud de un post tipo 'foto-jg'
 * @param int $post_id
 * @return int $lng
 */
function get_lng( $post_id ){
	return get_post_meta($post_id, '_lng_meta', true);
}// get_lng

/**
 * Jalar heading de un post tipo 'foto-jg'
 * @param int $post_id
 * @return int $heading
 */
function get_heading( $post_id ){

	$heading =  get_post_meta($post_id, '_heading_meta', true);
	if( $heading == '' ) return 0; 

	return $heading;

}// get_heading

/**
 * Jalar lugar de un post tipo 'foto-jg'
 * @param int $post_id
 * @return int $lugar
 */
function get_lugar( $post_id ){
	return get_post_meta($post_id, '_lugar_meta', true);
}// get_lugar

/**
 * Jalar fecha de un post tipo 'foto-jg'
 * @param int $post_id
 * @return int $fecha
 */
function get_fecha( $post_id ){
	return get_post_meta($post_id, '_fecha_meta', true);
}// get_fecha

/**
 * Jalar si es foto aérea de un post tipo 'foto-jg'
 * @param int $post_id
 * @return int $vista_aerea
 */
function get_vista_aerea( $post_id ){
	
	$vista_aerea = get_post_meta($post_id, '_vista_aerea_meta', true);

	if( $vista_aerea == 'si' ) return 1;

	return 0;

}// get_vista_aerea

/**
 * Jalar fecha de un post tipo 'foto-jg'
 * @param int $post_id
 * @return int $decada
 */
function get_decada( $post_id ){
	$terms = wp_get_post_terms( $post_id, 'decada' );

	if( empty( $terms ) ) return '-';

	return $terms[0]->name;
}// get_decada

/**
 * Regresa toda la información de las fotos de Juan Guzmán
 * @return JSON $infoPhotos
 */
function get_photos_info(){

	$info_photos = array();
	$args_apas = array(
		'post_type' 		=> 'foto-jg',
		'posts_per_page' 	=> -1
	);

	$query_mapas = new WP_Query( $args_apas );
	if ( $query_mapas->have_posts() ) : while ( $query_mapas->have_posts() ) : $query_mapas->the_post();
		global $post;

		$lat = get_lat( $post->ID );
		$lng = get_lng( $post->ID );
		$lugar = get_lugar( $post->ID );
		$fecha = get_fecha( $post->ID );
		$decada = get_decada( $post->ID );
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$info_photos[$post->post_name] = array(
			'title'			=> $post->post_title,
			'lat'			=> $lat,
			'lng'			=> $lng,
			'lugar'			=> $lugar,
			'fecha'			=> $fecha,
			'decada'		=> $decada,
			'img_url'		=> $image[0],
			'permalink'		=> get_permalink( $post->ID )
			);

	endwhile; endif; wp_reset_query();

	return json_encode( $info_photos );

}// get_photos_info


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











