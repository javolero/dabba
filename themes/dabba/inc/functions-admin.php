<?php

/*------------------------------------*\
	GENERAL ACTIONS
\*------------------------------------*/



	/**
	* Enqueue admin scripts and styles.
	**/
	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('jquery'), '1.0', true );
		wp_localize_script( 'admin-js', 'ajax_url', admin_url('admin-ajax.php') );
		wp_enqueue_style( 'admin-css', CSSPATH.'admin.css' );

	});

	/**
	* Run when Wordpress has finished loading but before headers are sent.
	**/
	add_action( 'init', function(){

		// Allow custom post types to have featured images.
		if ( function_exists('add_theme_support') ){
			add_theme_support('post-thumbnails');
		}

	});





/*------------------------------------*\
	GENERAL FILTERS
\*------------------------------------*/



	/**
	* Remove admin bar for non admins.
	**/
	add_filter( 'show_admin_bar', function($content){
		return ( current_user_can('administrator') ) ? $content : false;
	});

	/**
	* Change footer comment in dashboard.
	**/
	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://pcuervo.com">Pequeño Cuervo</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});

	/**
	* Excerpt length.
	**/
	add_filter('excerpt_length', function($length){
		return 11;
	});

	/**
	* Excerpt format.
	**/
	add_filter('excerpt_more', function(){
		return '…';
	});



/*------------------------------------*\
	Multiple Post Thumbnails
\*------------------------------------*/

// if (class_exists('MultiPostThumbnails')) {
// 	new MultiPostThumbnails(
// 		array(
// 			'label' => 'Imagen del producto destacado',
// 			'id' => 'secondary-image',
// 			'post_type' => 'marcas'
// 		)
// 	);
// }

// if (class_exists('MultiPostThumbnails')) {
// 	new MultiPostThumbnails(
// 		array(
// 			'label' => 'Fondo',
// 			'id' => 'product-background',
// 			'post_type' => 'productos'
// 		)
// 	);
// }


/*------------------------------------*\
	GENERAL FILTERS
\*------------------------------------*/

if ( function_exists('add_image_size') ){
	// add_image_size( 'size_name', 200, 200, true );

	// cambiar el tamaño del thumbnail
	/*
	update_option( 'thumbnail_size_h', 100 );
	update_option( 'thumbnail_size_w', 200 );
	update_option( 'thumbnail_crop', false );
	*/

	//cambiar el crop del medium
	update_option( 'medium_crop', true );

}