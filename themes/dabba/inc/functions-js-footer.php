<?php

/**
* Here we add all the javascript that needs to be run on the footer.
**/
function footer_scripts(){
	global $post;

	if( wp_script_is( 'functions', 'done' ) ) :

?>
		<script type="text/javascript">
			$( document ).ready(function() {

				/*------------------------------------*\
					#GLOBAL
				\*------------------------------------*/

				// Notices para contraseña incorrecta y usuario existente.
				<?php $all_notices = WC()->session->get( 'wc_notices', array() ); ?>
				<?php if( array_key_exists( 'error', $all_notices ) ) : ?>
					showAuthenticationError( '<?php echo $all_notices["error"][0] ?>' )
					//alert( '<?php echo $all_notices["error"][0] ?>' )
				<?php wc_clear_notices(); endif; ?>

				imgToSvg();


				/**
				 * Triggered events
				**/
				$('.modal .select-style').change(function(){
					if ( $(this).find('select').val() == 'other' ){
						$(this).next('.toggable').toggleClass('hidden');
						$('.js-zona').attr('required', '""');
					} else {
						$(this).next('.toggable').toggleClass('hidden');
					}
				});

				$('.js-btn-siguiente').on('click', function(e) {
					e.preventDefault();
					$('#form-zona').parsley().validate();

					if ( true === $('#form-zona').parsley().isValid()) {

						$('#comienza').modal('toggle');
						var email = $('input[name="email-comienza"]').val();
						var zona = $('input[name="zona"]').val();

						if( '' !== zona ) {
							$('#error').modal('toggle');
							setTimeout( function(){ initMap( 'map-lo-sentimos' ); } , 400);
							agregarUsuarioProspecto( email, zona );
						}
						$('#excelente').modal('toggle');
						$('#reg_email').val( email );
					}

				});

				$('.js-registrate').on('click', function(){
					$('#login').modal('toggle');
					$('#comienza').modal('toggle');
				});

				$('.add_to_cart_button').on('click', function(){
					toggleClass('.js-notification__number', 'added');
				});

				$('#form-login').parsley();




				<?php if( is_home() ) : ?>

					/**
					 * On load
					**/

					initMap( 'map' );

					<?php if ( ! is_user_logged_in() ) : ?>
						var vid = $('video.hero__video'); //JQuery selector
						vid[0].onloadeddata = function() {
							var minW = 300; // minimum video width allowed
							var vidWOrig;  // original video dimensions
							var vidHOrig;
							var vidWOrig = parseInt( vid[0].videoWidth ); //get the original width
							var vidHOrig = parseInt( vid[0].videoHeight ); //get the original height

							$(window).resize(function () { resizeToCover(minW, vidWOrig, vidHOrig); });
							$(window).trigger('resize');

						}

					<?php endif; ?>

				<?php endif; ?>
			});
		</script>
<?php
	endif;
}// footer_scripts
?>