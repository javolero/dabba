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
					console.log('gettin error msg...');
					console.log( '<?php echo $all_notices["error"][0] ?>' );
					showErrorNotification( '<?php echo $all_notices["error"][0] ?>' )
				<?php endif; ?>
				<?php if( array_key_exists( 'success', $all_notices ) ) : ?>
					console.log('gettin success msg...');
					console.log( '<?php echo $all_notices["success"][0] ?>' );
					showSuccessNotification( '<?php echo $all_notices["success"][0] ?>' )
				<?php wc_clear_notices(); endif; ?>
				<?php if( array_key_exists( 'notice', $all_notices ) ) : ?>
					console.log('gettin notice msg...');
					console.log( '<?php echo $all_notices["notice"][0] ?>' );
					showInfoNotification( '<?php echo $all_notices["notice"][0] ?>' )
				<?php wc_clear_notices(); endif; ?>

				imgToSvg();
				footerBottom();

				/**
				 * Triggered events
				**/
				$(window).resize(function () { footerBottom(); });

				$('.modal .select-style').change(function(){
					if ( $(this).find('select').val() === 'other' ){
						$(this).next('.toggable').removeClass('hidden');
						$('.js-zona').attr('required', '""');
					} else {
						$(this).next('.toggable').addClass('hidden');
					}
				});

				$('.js-btn-siguiente').on('click', function(e) {
					e.preventDefault();

					$('[data-parsley-validate-comienza]').parsley().validate();
					if ( true === $('[data-parsley-validate-comienza]').parsley().isValid() ) {

						$('#comienza').modal('toggle');
						var email = $('input[name="email-comienza"]').val();
						var zona = $('input[name="zona"]').val();

						if( '' !== zona ) {
							$('#error').modal('toggle');
							setTimeout( function(){ initMap( 'map-lo-sentimos' ); } , 400);
							agregarUsuarioProspecto( email, zona );
							return;
						}
						$('#excelente').modal('toggle');
						$('#reg_email').val( email );
						//clearForm('[data-parsley-validate-comienza]');
					}

				});

				$('[name="select-zona"]').change(function(){
					if( this.value == 'other' ) return;
					$('input[name="zona"]').val('');
					$('.js-zona').removeAttr('required');
				})

				$('.js-registrate').on('click', function(){
					$('#login').modal('toggle');
					$('#comienza').modal('toggle');
				});

				$('.add_to_cart_button').on('click', function(){
					toggleClass('.js-notification__number', 'added');
				});

				$('.js-btn-enviar-gratis').on('click', function(e) {
					console.log('enviar gratis');
					e.preventDefault();

					$('[data-parsley-validate-gratis]').parsley().validate();
					if ( true === $('[data-parsley-validate-gratis]').parsley().isValid() ) {
						var email = $('input[name="email-gratis"]').val();
						var zona = $('input[name="zona-gratis"]').val();
						agregarUsuarioProspecto( email, zona );
						$('#comida-gratis').modal('toggle');
					}

				});

				// Validar formas QUITAR
				$('#form-login').parsley();




				<?php if( is_home() ) : ?>

					/**
					 * On load
					**/

					initMap( 'map' );

					$('[data-parsley-validate-invita-a-un-amigo]').parsley();

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

				<?php if( is_page( 'Para reuniones' ) ) : ?>

					$('[data-parsley-validate-reuniones]').parsley();
					$('.js-para-reuniones').submit( function(e){
						e.preventDefault();

						$('[data-parsley-validate-reuniones]').parsley().validate();
						if ( true === $('[data-parsley-validate-reuniones]').parsley().isValid() )
							sendMailReuniones( $('.js-para-reuniones').serialize() );

					})

				<?php endif; ?>

				<?php if( is_checkout() ) : ?>

					toggleHeaderScrolled();

					$( window ).scroll(function() {
						toggleHeaderScrolled();
					});
				<?php endif; ?>
			});

			// Mostrar toast cuando se agrega un producto
			$('body').on('added_to_cart', function( e, fragments, cartHash, btn ){
				toastr.info('Se ha agregado el platillo a tu pedido.');
			})
		</script>
<?php
	endif;
}// footer_scripts
?>