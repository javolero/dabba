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
			initMap( 'map-lo-sentimos' );
			initMap( 'map' );
			

			var minW = 300; // minimum video width allowed
			var vidWOrig;  // original video dimensions
			var vidHOrig;
			vidWOrig = parseInt( $('video.hero__video').innerWidth() );
			vidHOrig = parseInt( $('video.hero__video').innerHeight() );

			$(window).resize(function () { resizeToCover(minW, vidWOrig, vidHOrig); });
			$(window).trigger('resize');

			/**
			 * Triggered events
			**/
			$('.modal .select-style').change(function(){
				if ( $(this).find('select').val() == 'other' ){
					$(this).next('.toggable').toggleClass('hidden');
					$('.js-btn-siguiente').attr('href', '#error');
				} 
			});

			$('.js-btn-siguiente').on('click', function() {
				$('#comienza').modal('toggle');
				var email = $('input[name="email-comienza"]').val();
				var zona = $('input[name="zona"]').val();

				if( '' !== zona ) agregarUsuarioProspecto( email, zona );

				$('#reg_email').val( email );

			});

			<?php if( is_home() ) : ?>

				/**
				 * On load
				**/

				<?php if ( ! is_user_logged_in() ) : ?>
					var minW = 300; // minimum video width allowed
					var vidWOrig;  // original video dimensions
					var vidHOrig;
					vidWOrig = parseInt( $('video.hero__video').innerWidth() );
					vidHOrig = parseInt( $('video.hero__video').innerHeight() );

					$(window).resize(function () { resizeToCover(minW, vidWOrig, vidHOrig); });
					$(window).trigger('resize');

				<?php endif; ?>

			<?php endif; ?>

		</script>
<?php
	endif;
}// footer_scripts
?>