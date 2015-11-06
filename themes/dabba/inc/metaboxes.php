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
	add_meta_box( 'ingredientes', 'Ingredientes', 'metabox_ingredientes', 'product', 'advanced', 'high' );
	add_meta_box( 'informacion_nutrimental', 'Información nutrimental', 'metabox_informacion_nutrimental', 'product', 'advanced', 'high' );

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

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_ingredientes( $post ){

	$ingredientes = get_post_meta($post->ID, '_ingredientes_meta', true);

	wp_nonce_field(__FILE__, '_ingredientes_meta_nonce');

	echo "<label><small>Separar ingredientes por comas, ejemplo: pollo, orégano, sal</small></label>";
	echo "<textarea class='[ widefat ]' name='_ingredientes_meta'>$ingredientes</textarea>";

}// metabox_ingredientes

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_informacion_nutrimental( $post ){

	$porcion = get_post_meta($post->ID, '_porcion_meta', true);
	$proteina = get_post_meta($post->ID, '_proteina_meta', true);
	$calorias = get_post_meta($post->ID, '_calorias_meta', true);
	$fibra_dietetica = get_post_meta($post->ID, '_fibra_dietetica_meta', true);

	wp_nonce_field(__FILE__, '_porcion_meta_nonce');
	wp_nonce_field(__FILE__, '_proteina_meta_nonce');
	wp_nonce_field(__FILE__, '_calorias_meta_nonce');
	wp_nonce_field(__FILE__, '_fibra_dietetica_meta_nonce');

	echo '<label>Porción</label>';
	echo "<input type='text' class='[ widefat ]' name='_porcion_meta' value='$porcion'>";
	echo '<label>Proteína</label>';
	echo "<input type='text' class='[ widefat ]' name='_proteina_meta' value='$proteina'>";
	echo '<label>Calorías</label>';
	echo "<input type='text' class='[ widefat ]' name='_calorias_meta' value='$calorias'>";
	echo '<label>Fibra dietética</label>';
	echo "<input type='text' class='[ widefat ]' name='_fibra_dietetica_meta' value='$fibra_dietetica'>";

}// metabox_informacion_nutrimental



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
		// Ingredientes
		if ( isset($_POST['_ingredientes_meta']) and check_admin_referer( __FILE__, '_ingredientes_meta_nonce') ){
			update_post_meta($post_id, '_ingredientes_meta', $_POST['_ingredientes_meta']);
		}
		// Información nutrimental
		if ( isset($_POST['_porcion_meta']) and check_admin_referer( __FILE__, '_porcion_meta_nonce') ){
			update_post_meta($post_id, '_porcion_meta', $_POST['_porcion_meta']);
		}
		if ( isset($_POST['_proteina_meta']) and check_admin_referer( __FILE__, '_proteina_meta_nonce') ){
			update_post_meta($post_id, '_proteina_meta', $_POST['_proteina_meta']);
		}
		if ( isset($_POST['_calorias_meta']) and check_admin_referer( __FILE__, '_calorias_meta_nonce') ){
			update_post_meta($post_id, '_calorias_meta', $_POST['_calorias_meta']);
		}
		if ( isset($_POST['_fibra_dietetica_meta']) and check_admin_referer( __FILE__, '_fibra_dietetica_meta_nonce') ){
			update_post_meta($post_id, '_fibra_dietetica_meta', $_POST['_fibra_dietetica_meta']);
		}

	}// save_metaboxes_product
	