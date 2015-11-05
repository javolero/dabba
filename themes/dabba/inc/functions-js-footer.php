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
			imgToSvg();
			initMap();

			var min_w = 300; // minimum video width allowed
			var vid_w_orig;  // original video dimensions
			var vid_h_orig;
			vid_w_orig = parseInt( $('video.hero__video').innerWidth() );
			vid_h_orig = parseInt( $('video.hero__video').innerHeight() );

			$(window).resize(function () { resizeToCover(min_w, vid_w_orig, vid_h_orig); });
			$(window).trigger('resize');

			/**
			 * Triggered events
			**/
			$('.modal .select-style').change(function(){
				console.log( $(this).next('.toggable') );
				if ($(this).find('select').val() == 'other'){
					$(this).next('.toggable').toggleClass('hidden');
				} else {
					$(this).next('.toggable').toggleClass('hidden');
				}
			});

			<?php if( is_home() ) : ?>

				/**
				 * On load
				**/

				<?php if ( ! is_user_logged_in() ) : ?>
					var min_w = 300; // minimum video width allowed
					var vid_w_orig;  // original video dimensions
					var vid_h_orig;
					vid_w_orig = parseInt( $('video.hero__video').innerWidth() );
					vid_h_orig = parseInt( $('video.hero__video').innerHeight() );

					$(window).resize(function () { resizeToCover(min_w, vid_w_orig, vid_h_orig); });
					$(window).trigger('resize');

				<?php endif; ?>

			<?php endif; ?>

		</script>
<?php
	endif;
}// footer_scripts
?>