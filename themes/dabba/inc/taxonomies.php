<?php

/*------------------------------------*\
	TAXONOMIES
\*------------------------------------*/

add_action( 'init', 'custom_taxonomies_callback', 0 );
function custom_taxonomies_callback(){

	// DÉCADA
	if( ! taxonomy_exists('caracteristica-platillo')){

		$labels = array(
			'name'              => 'Caracterísiticas platillo',
			'singular_name'     => 'Caracterísiticas platillo',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar característica',
			'update_item'       => 'Actualizar característica',
			'add_new_item'      => 'Nueva característica',
			'menu_name'         => 'Caracterísiticas platillo'
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'caracteristica-platillo' ),
		);

		register_taxonomy( 'caracteristica-platillo', 'product', $args );
	}

	// Taxonomy terms
	insert_platillo_taxonomy_terms();

}// custom_taxonomies_callback

// /*
//  * Insert  $new_term to $taxonomy based on the title of new post
//  *
//  * @param string $new_term
//  * @param string $taxonomy
//  */
function insert_platillo_taxonomy_terms(){

	$caracteristicas = array( 'Frío', 'Caliente', 'Res', 'Pollo', 'Pescado', 'Cerdo', 'Vegetariano', 'Vegano', 'Picante' );
	foreach ( $caracteristicas as $car ) {
		$term = term_exists( $car, 'caracteristica-platillo' );
		if ( FALSE !== $term && NULL !== $term ) continue;

		wp_insert_term( $car, 'caracteristica-platillo' );
	}
	
}// insert_platillo_taxonomy_terms

