<?php

/*------------------------------------*\
	CUSTOM POST TYPES
\*------------------------------------*/

add_action('init', function(){

	// ARCHIVO
	$labels = array(
		'name'          => 'Usuarios prospecto',
		'singular_name' => 'Usuarios prospecto',
		'add_new'       => 'Nuevo usuario prospecto',
		'add_new_item'  => 'Nuevo usuario prospecto',
		'edit_item'     => 'Editar usuario prospecto',
		'new_item'      => 'Nuevo usuario prospecto',
		'all_items'     => 'Todos',
		'view_item'     => 'Ver usuario prospecto',
		'search_items'  => 'Buscar usuarios',
		'not_found'     => 'No se encontró',
		'menu_name'     => 'Usuarios prospecto'
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'usuarios-prospecto' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);
	register_post_type( 'usuarios-prospecto', $args );

});