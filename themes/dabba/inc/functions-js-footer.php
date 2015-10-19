<?php

/**
* Here we add all the javascript that needs to be run on the footer.
**/
function footer_scripts(){
	global $post;

	if( wp_script_is( 'functions', 'done' ) ) :

?>
		<script type="text/javascript">

			/*------------------------------------*\
				#GLOBAL
			\*------------------------------------*/

			/**
			 * On load
			**/

			/**
			 * Triggered events
			**/

			<?php if( is_archive() ) : ?>

				addAllMarkers();

			<?php endif; ?>



			<?php if( is_single() ) : ?>

				// Pasar a función
				var lat = <?php echo get_lat( get_the_ID() ); ?>;
				var lng = <?php echo get_lng( get_the_ID() ); ?>;
				var isAerial = <?php echo get_vista_aerea( get_the_ID() ) ?>;
				var heading = <?php echo get_heading( get_the_ID() ) ?>;

				showSingleMap( lat, lng, heading, isAerial );			

			<?php endif; ?>
		</script>
<?php
	endif;
}// footer_scripts
?>