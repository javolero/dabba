<?php


/*------------------------------------*\
	CUSTOM PAGES
\*------------------------------------*/

add_action('init', function(){

	// NOSOTROS
	if( ! get_page_by_path('nosotros') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Nosotros',
			'post_name'   => 'nosotros',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// DABBA PARA REUNIONES
	if( ! get_page_by_path('para-reuniones') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Para reuniones',
			'post_name'   => 'para-reuniones',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}


});
