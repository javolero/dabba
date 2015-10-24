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
			add_metaboxes_products();
	}
});



/*------------------------------------*\
	CUSTOM METABOXES FUNCTIONS
\*------------------------------------*/

/**
* Add metaboxes for page type "Contacto"
**/
function add_metaboxes_products(){

	add_meta_box( 'platillo_principal', 'Platillo principal', 'metabox_platillo_principal', 'product', 'advanced', 'high' );
	add_meta_box( 'guarnicion_1', 'Guarnición 1', 'metabox_guarnicion_1', 'product', 'advanced', 'high' );
	add_meta_box( 'guarnicion_2', 'Guarnición 2', 'metabox_guarnicion_2', 'product', 'advanced', 'high' );
	add_meta_box( 'fecha_menu', 'Fecha de menú', 'metabox_fecha_menu', 'product', 'advanced', 'high' );

}// add_metaboxes_PAGE



/*-----------------------------------------*\
	CUSTOM METABOXES CALLBACK FUNCTIONS
\*-----------------------------------------*/

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_platillo_principal( $post ){

	$platillo_principal = get_post_meta($post->ID, '_platillo_principal_meta', true);

	wp_nonce_field(__FILE__, '_platillo_principal_meta_nonce');

	echo "<input type='text' class='[ widefat ]' name='_platillo_principal_meta' value='$platillo_principal'>";

}// metabox_platillo_principal

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_guarnicion_1( $post ){

	$guarnicion_1 = get_post_meta($post->ID, '_guarnicion_1_meta', true);

	wp_nonce_field(__FILE__, '_guarnicion_1_meta_nonce');

	echo "<input type='text' class='[ widefat ]' name='_guarnicion_1_meta' value='$guarnicion_1'>";

}// metabox_guarnicion_1

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_guarnicion_2( $post ){

	$guarnicion_2 = get_post_meta($post->ID, '_guarnicion_2_meta', true);

	wp_nonce_field(__FILE__, '_guarnicion_2_meta_nonce');

	echo "<input type='text' class='[ widefat ]' name='_guarnicion_2_meta' value='$guarnicion_2'>";

}// metabox_guarnicion_2

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_fecha_menu( $post ){

	$fecha_menu = get_post_meta($post->ID, '_fecha_menu_meta', true);

	wp_nonce_field(__FILE__, '_fecha_menu_meta_nonce');

	echo "<input type='text' class='[ widefat ][ js-datepicker ]' name='_fecha_menu_meta' value='$fecha_menu'>";

}// metabox_fecha_menu



/*------------------------------------*\
	SAVE METABOXES DATA
\*------------------------------------*/

	add_action('save_post', function( $post_id ){

		save_metaboxes_product( $post_id );
		
	});

	/**
	* Save the metaboxes for post type "Productos"
	**/
	function save_metaboxes_product( $post_id ){
	
		// Platillo principal
		if ( isset($_POST['_platillo_principal_meta']) and check_admin_referer( __FILE__, '_platillo_principal_meta_nonce') ){
			update_post_meta($post_id, '_platillo_principal_meta', $_POST['_platillo_principal_meta']);
		}
		// Guarnición 1
		if ( isset($_POST['_guarnicion_1_meta']) and check_admin_referer( __FILE__, '_guarnicion_1_meta_nonce') ){
			update_post_meta($post_id, '_guarnicion_1_meta', $_POST['_guarnicion_1_meta']);
		}
		// Guarnición 2
		if ( isset($_POST['_guarnicion_2_meta']) and check_admin_referer( __FILE__, '_guarnicion_2_meta_nonce') ){
			update_post_meta($post_id, '_guarnicion_2_meta', $_POST['_guarnicion_2_meta']);
		}
		// Fecha del menú
		if ( isset($_POST['_fecha_menu_meta']) and check_admin_referer( __FILE__, '_fecha_menu_meta_nonce') ){
			update_post_meta($post_id, '_fecha_menu_meta', $_POST['_fecha_menu_meta']);
		}

	}// save_metaboxes_product
	