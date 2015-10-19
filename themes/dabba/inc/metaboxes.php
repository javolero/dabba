<?php

/*------------------------------------*\
	CUSTOM METABOXES
\*------------------------------------*/

add_action('add_meta_boxes', function(){
	global $post;
	switch ( $post->post_name ) {
		case 'PAGENAME':
			//add_metaboxes_PAGENAE();
			break;
		default:
			// POST TYPES
			add_metaboxes_fotos_jg();
	}
});



/*------------------------------------*\
	CUSTOM METABOXES FUNCTIONS
\*------------------------------------*/

/**
* Add metaboxes for page type "Contacto"
**/
function add_metaboxes_fotos_jg(){

	add_meta_box( 'texto_complementario', 'Texto Complementario', 'metabox_texto_complementario', 'foto-jg', 'advanced', 'high' );
	add_meta_box( 'lugar', 'Lugar', 'metabox_lugar', 'foto-jg', 'advanced', 'high' );
	add_meta_box( 'fecha', 'Fecha', 'metabox_fecha', 'foto-jg', 'advanced', 'high' );
	add_meta_box( 'coordenadas', 'Coordenadas', 'metabox_coordenadas', 'foto-jg', 'advanced', 'high' );
	add_meta_box( 'heading', 'Heading', 'metabox_heading', 'foto-jg', 'advanced', 'high' );
	add_meta_box( 'vista_aerea', 'Vista aérea', 'metabox_vista_aerea', 'foto-jg', 'side', 'high' );

}// add_metaboxes_PAGE



/*-----------------------------------------*\
	CUSTOM METABOXES CALLBACK FUNCTIONS
\*-----------------------------------------*/
	
/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_coordenadas( $post ){

	$lat = get_post_meta($post->ID, '_lat_meta', true);
	$lng = get_post_meta($post->ID, '_lng_meta', true);

	wp_nonce_field(__FILE__, '_lat_meta_nonce');
	wp_nonce_field(__FILE__, '_lng_meta_nonce');

	echo "<label>Latitud:</label>";
	echo "<input type='text' class='[ widefat ]' name='_lat_meta' value='$lat' />";
	echo "<label>Longitud:</label>";
	echo "<input type='text' class='[ widefat ]' name='_lng_meta' value='$lng' />";

}// metabox_coordenadas

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_lugar( $post ){

	$lugar = get_post_meta($post->ID, '_lugar_meta', true);
	wp_nonce_field(__FILE__, '_lugar_meta_nonce');
	
	echo "<input type='text' class='[ widefat ]' name='_lugar_meta' value='$lugar' />";

}// metabox_lugar

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_fecha( $post ){

	$fecha = get_post_meta($post->ID, '_fecha_meta', true);

	wp_nonce_field(__FILE__, '_fecha_meta_nonce');
	
	echo "<input type='text' class='[ widefat ]' name='_fecha_meta' value='$fecha' />";

}// metabox_fecha

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_texto_complementario( $post ){

	$texto_complementario = get_post_meta($post->ID, '_texto_complementario_meta', true);

	wp_nonce_field(__FILE__, '_texto_complementario_meta_nonce');

	echo "<textarea class='[ widefat ]' name='_texto_complementario_meta'>$texto_complementario</textarea>";

}// metabox_texto_complementario

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_heading( $post ){

	$heading = get_post_meta($post->ID, '_heading_meta', true);

	wp_nonce_field(__FILE__, '_heading_meta_nonce');
	
	echo "<input type='text' class='[ widefat ]' name='_heading_meta' value='$heading' />";

}// metabox_heading

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_vista_aerea( $post ){

	$vista_aerea = get_post_meta($post->ID, '_vista_aerea_meta', true);

	wp_nonce_field(__FILE__, '_vista_aerea_meta_nonce');
	
	$checked = $vista_aerea == 'si' ? 'checked' : '';
	echo "<input type='checkbox' class='[ widefat ]' name='_vista_aerea_meta' value='si' $checked />";
	echo "<label> si</label>";

}// metabox_vista_aerea
	



/*------------------------------------*\
	SAVE METABOXES DATA
\*------------------------------------*/

	add_action('save_post', function( $post_id ){

		save_metaboxes_foto_jg( $post_id );
		
	});

	/**
	* Save the metaboxes for post type "Productos"
	**/
	function save_metaboxes_foto_jg( $post_id ){
	
		// Latitud
		if ( isset($_POST['_lat_meta']) and check_admin_referer( __FILE__, '_lat_meta_nonce') ){
			update_post_meta($post_id, '_lat_meta', $_POST['_lat_meta']);
		}
		// Longitud
		if ( isset($_POST['_lng_meta']) and check_admin_referer( __FILE__, '_lng_meta_nonce') ){
			update_post_meta($post_id, '_lng_meta', $_POST['_lng_meta']);
		}
		// Texto complementario
		if ( isset($_POST['_texto_complementario_meta']) and check_admin_referer( __FILE__, '_texto_complementario_meta_nonce') ){
			update_post_meta($post_id, '_texto_complementario_meta', $_POST['_texto_complementario_meta']);
		}
		// Lugar
		if ( isset($_POST['_lugar_meta']) and check_admin_referer( __FILE__, '_lugar_meta_nonce') ){
			update_post_meta($post_id, '_lugar_meta', $_POST['_lugar_meta']);
		}
		// Fecha
		if ( isset($_POST['_fecha_meta']) and check_admin_referer( __FILE__, '_fecha_meta_nonce') ){
			update_post_meta($post_id, '_fecha_meta', $_POST['_fecha_meta']);
		}
		// Heading
		if ( isset($_POST['_heading_meta']) and check_admin_referer( __FILE__, '_heading_meta_nonce') ){
			update_post_meta($post_id, '_heading_meta', $_POST['_heading_meta']);
		}
		// Vista aérea
		if ( isset($_POST['_vista_aerea_meta']) and check_admin_referer( __FILE__, '_vista_aerea_meta_nonce') ){

			update_post_meta($post_id, '_vista_aerea_meta', $_POST['_vista_aerea_meta']);
		} else {
			update_post_meta($post_id, '_vista_aerea_meta', 'no');
		}

	}// save_metaboxes_foto_jg
	