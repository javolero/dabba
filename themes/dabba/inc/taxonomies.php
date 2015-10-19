<?php

/*------------------------------------*\
	TAXONOMIES
\*------------------------------------*/

add_action( 'init', 'custom_taxonomies_callback', 0 );
function custom_taxonomies_callback(){

	// DÉCADA
	if( ! taxonomy_exists('decada')){

		$labels = array(
			'name'              => 'Década',
			'singular_name'     => 'Década',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar década',
			'update_item'       => 'Actualizar década',
			'add_new_item'      => 'Nueva década',
			'menu_name'         => 'Décadas'
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'decada' ),
		);

		register_taxonomy( 'decada', 'foto-jg', $args );
	}

	// Taxonomy terms
	insert_decada_taxonomy_terms();

}// custom_taxonomies_callback

// /*
//  * Insert  $new_term to $taxonomy based on the title of new post
//  *
//  * @param string $new_term
//  * @param string $taxonomy
//  */
function insert_decada_taxonomy_terms(){

	$decadas = array( 1930, 1940, 1950, 1960 );
	foreach ( $decadas as $decada ) {
		$term = term_exists( $decada, 'decada' );
		if ( FALSE !== $term && NULL !== $term ) continue;

		wp_insert_term( $decada, 'decada' );
	}
	
}// insert_decada_taxonomy_terms

