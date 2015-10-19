<?php

/*------------------------------------*\
	CUSTOM POST TYPES
\*------------------------------------*/

add_action('init', function(){

	// MAP TEST
	$labels = array(
		'name'          => 'Fotos JG',
		'singular_name' => 'Fotos JG',
		'add_new'       => 'Nueva foto JG',
		'add_new_item'  => 'Nueva foto JG',
		'edit_item'     => 'Editar foto JG',
		'new_item'      => 'Nueva foto JG',
		'all_items'     => 'Todas',
		'view_item'     => 'Ver foto JG',
		'search_items'  => 'Buscar pruebas',
		'not_found'     => 'No se encontró',
		'menu_name'     => 'Fotos JG'
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'foto-jg' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);
	register_post_type( 'foto-jg', $args );

});