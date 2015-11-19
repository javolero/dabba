
		<footer class="[ bg-tertiary ][ color-light ][ padding--top--large padding--bottom--xxlarge ]">
			<div class="[ container ]">
				<div class="[ row ][ margin-bottom ][ text-center ]">
					<section class="[ tarjetas ][ col-xs-12 col-sm-6 col-md-4 ][ margin-bottom--large ]">
						<div class="[ row ]">
							<div class="[ col-xs-3 ]">
								<img class="[ icon icon--responsive ]" src="<?php echo THEMEPATH; ?>icons/visa.svg" alt="">
							</div>
							<div class="[ col-xs-3 ]">
								<img class="[ icon icon--responsive ]" src="<?php echo THEMEPATH; ?>icons/mastercard.svg" alt="">
							</div>
							<div class="[ col-xs-3 ]">
								<img class="[ icon icon--responsive ]" src="<?php echo THEMEPATH; ?>icons/amex.svg" alt="">
							</div>
							<div class="[ col-xs-3 ]">
								<img class="[ icon icon--responsive ]" src="<?php echo THEMEPATH; ?>icons/paypal.svg" alt="">
							</div>
						</div>
					</section>
					<section class="[ col-xs-12 col-sm-6 ][ margin-bottom ]">
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="<?php echo site_url('nosotros'); ?>">Nosotros</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="#contacto" data-toggle="modal">Contáctanos</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="#" data-toggle="modal">Dabba para reuniones</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="<?php echo THEMEPATH; ?>pdf/terminos_y_condiciones_dabba.pdf" target="_blank">Términos y condiciones</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="<?php echo THEMEPATH; ?>pdf/aviso_de_privacidad_dabba.pdf" target="_blank">Aviso de privacidad</a>
 						<p class="[ color-gray ][ margin-sides--small ][ line-height--large ]">&copy; Copyright <script>document.write( new Date().getFullYear() )</script></p>
					</section>
					<section class="[ col-xs-12 col-md-2 ][ social ]">
						<!-- <a class="[ margin-sides--small ]" href="<?php echo 'https://twitter.com/' ?>">
							<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ margin-sides--small ]" src="<?php echo THEMEPATH; ?>icons/logo-twitter.svg">
						</a> -->
						<a class="[ margin-sides--small ]" href="https://www.facebook.com/dabbamx/" target="_blank">
							<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ margin-sides--small ]" src="<?php echo THEMEPATH; ?>icons/logo-facebook.svg">
						</a>
						<a class="[ margin-sides--small ]" href="https://instagram.com/dabbamx/" target="_blank">
							<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ margin-sides--small ]" src="<?php echo THEMEPATH; ?>icons/logo-instagram.svg">
						</a>
					</section>
				</div>
			</div>
		</footer>



		<!-- =================================================
		==== Action nav bar
		================================================== -->
		<?php if ( ! is_user_logged_in() ) : ?>
			<a class="[ btn btn-primary btn--action btn--action--left ]" href="#login" data-toggle="modal">
				<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/user.svg">
			</a>
		<?php else: ?>
			<a class="[ btn btn-primary btn--action btn--action--left ]" href="<?php echo site_url('mi-cuenta'); ?>">
				<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/user.svg">
			</a>
		<?php endif; ?>
		<?php if( is_single() || is_home() ) : ?>
			<?php if ( ! is_user_logged_in() ) : ?>
				<a class="[ btn btn-primary btn--action btn--action--center ][ padding--sides ]" href="#comienza" data-toggle="modal">
					ordena ahora
				</a>
			<?php else: ?>
				<?php echo get_todays_add_to_cart_btn(); ?>
			<?php endif; ?>
		<?php elseif( ! is_page( 'checkout' ) ) : ?>
			<a class="[ btn btn-primary btn--action btn--action--center ][ padding--sides ]" href="<?php echo site_url() ?>" data-toggle="modal">
				ver platillos
			</a>
		<?php endif; ?>
		<?php if ( is_user_logged_in() ) : ?>
			<a class="[ btn btn-primary btn--action btn--action--right ][ js-shopping-bag ]" href="<?php echo site_url('checkout'); ?>" data-toggle="tooltip" title="se ha agregado un platillo al carrito">
				<span class="[ notification notification__number ][ js-notification__number ]"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span>
				<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/shopping-bag.svg">
			</a>
		<?php endif; ?>


		<!-- =================================================
		==== MODALS
		================================================== -->


		<!-- Modal "contacto"
		================================================== -->
		<div id="contacto" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="Contacto" aria-hidden="true" >
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<img class="[ svg ][ icon icon--logo icon--fill ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/logo-dabba.svg">
				</div>
				<div class="[ modal-body ][ bg-primary ][ padding--top--xxlarge padding--bottom--large ]">
					<div class="[ margin-bottom--large ]">
						<h2 class="[ margin-bottom ]">Contáctanos</h2>
						<p>Nuestro equipo de atención a clientes está disponible de lunes a viernes de 10:00 am a 5:00 pm para responder cualquier duda o comentario.</p>
						<p>Puedes enviarnos un correo a <a href="mailto:clientes@dabba.mx" class="[ underlined ][ color-light ]">clientes@dabba.mx</a> o llámanos al <a href="tel:5510789424" class="[ underlined ][ color-light ]">(55)1078-9424</a>.</p>
					</div>
					<a href="mailto:hola@dabba.mx" class="[ btn btn-sm btn-hollow btn-light ]">mándanos un correo</a>
				</div><!-- End of Modal-body-->
				<div class="[ modal-footer ][ bg-primary ]">
					<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
						<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
					</a>
				</div><!-- End of Modal-footer-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal -->

		<!-- Modal "comienza"
		================================================== -->
		<div id="comienza" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="Comienza" aria-hidden="true">
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<img class="[ svg ][ icon icon--logo icon--fill ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/logo-dabba.svg">
				</div>
				<div class="[ modal-body ][ bg-primary ][ padding--top--xxlarge padding--bottom--large ]">
					<div class="[ margin-bottom--large ]">
						<h2>Comienza</h2>
						<p class="[ margin-bottom--large ]">Ingresa tu siguiente información.</p>
						<form id="form-zona" data-parsley-validate>
							<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
								<label for="username">Correo electrónico<span class="required">*</span></label>
								<input type="email" class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="email-comienza" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" data-parsley-type="email" required data-parsley-error-message="Por favor ingresa un correo electrónico válido.">
							</p>
							<div class="[ select-style ][ margin-bottom--small ]">
								<p class="[ no-padding ][ text-left ][ col-xs-12 ]">
									<label for="username">Selecciona tu zona<span class="required">*</span></label>
								</p>
								<select class="[ form-control form-control-bg ]" name="select-zona" required data-parsley-error-message="por favor selecciona una zona">
									<option value="">-</option>
									<option value="polanco">Polanco</option>
									<option value="ampliacion-granada">Ampliación Granada</option>
									<option value="corporativos-palmas">Corporativos Palmas</option>
									<option value="corporativos-fc-de-cuernavaca">Corporativos Fc. de Cuernavaca</option>
									<option value="other">Otra</option>
								</select>
							</div>
							<input class="[ toggable hidden ][ form-control ][ margin-bottom--small ][ js-zona ]" placeholder="Tu zona" name="zona" data-parsley-error-message="Este campo es obligatorio.">
						</form>
					</div>
					<a href="#" class="[ btn btn-sm btn-hollow btn-light ][ js-btn-siguiente ]" data-toggle="modal">siguiente</a>
				</div><!-- End of Modal-body-->
				<div class="[ modal-footer ][ bg-primary ]">
					<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
						<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
					</a>
				</div><!-- End of Modal-footer-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal-->


		<!-- Modal "excelente"
		================================================== -->
		<div id="excelente" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="Excelente" aria-hidden="true">
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<img class="[ svg ][ icon icon--logo icon--fill ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/logo-dabba.svg">
				</div>
				<div class="[ modal-body ][ bg-primary ][ padding--top--xxlarge padding--bottom--large ]">
					<h2>¡Excelente! :)</h2>
					<p>Sí entregamos en tu zona, danos tus datos para continuar con el registro.</p>
					<div class="[ margin-bottom ]">
						<?php echo do_shortcode('[woocommerce_social_login_buttons return_url="' . site_url() . '"]'); ?>
					</div>
					<p>O con tu correo</p>
					<div class="[ container ]">
						<form method="post" class="[ register ][ row ]" data-parsley-validate>
							<?php do_action( 'woocommerce_register_form_start' ); ?>

							<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
								<label for="username">Correo electrónico<span class="required">*</span></label>
								<input type="email" class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="email" id="reg_email" placeholder="<?php _e( 'Email address', 'woocommerce' ); ?>" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" data-parsley-type="email" required data-parsley-error-message="Por favor ingresa un correo electrónico válido." >
							</p>

							<!-- <p class="form-row form-row-wide">
								<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
								<input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
							</p> -->

							<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

								<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]"><label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label></p>
								<input class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="password" type="password" id="reg_password" required>

								<!-- <p class="form-row form-row-wide">
									<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
									<input type="password" class="input-text" name="password" id="reg_password" />
								</p> -->

							<?php endif; ?>

							<!-- Spam Trap -->
							<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;">
								<label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label>
								<input type="text" name="email_2" id="trap" tabindex="-1" />
							</div>

							<?php do_action( 'woocommerce_register_form' ); ?>
							<?php do_action( 'register_form' ); ?>

							<?php wp_nonce_field( 'woocommerce-register' ); ?>

							<div class="[ clearfix ]"></div>
							<div class="[ margin-bottom ]">&nbsp;</div>
							<input type="submit" class="[ button ][ btn btn-sm btn-hollow btn-light ]" name="register" value="ver platillo de hoy" />

							<?php do_action( 'woocommerce_register_form_end' ); ?>

						</form>
					</div>
				</div><!-- End of Modal-body-->
				<div class="[ modal-footer ][ bg-primary ]">
					<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
						<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
					</a>
				</div><!-- End of Modal-footer-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal-->

		<!-- Modal "lo sentimos"
		================================================== -->
		<div id="error" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="loSentimos" aria-hidden="true">
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<img class="[ svg ][ icon icon--logo icon--fill ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/logo-dabba.svg">
				</div>
				<div class="[ modal-body ][ bg-primary ][ padding--top--xxlarge padding--bottom--large ]">
					<div class="[ margin-bottom--large ]">
						<h2>Lo sentimos :(</h2>
						<p>Por ahora no entregamos en tu área, entregamos en:</p>
						<div class="[ embed-responsive ][ margin-bottom ]">
							<div id="map-lo-sentimos" class="[ js-map ][ embed-responsive-item ]"></div>
						</div>
						<p>Cuando entreguémos en tu colonia recibirás un correo electrónico con un cupón para una comida gratis.</p>
					</div>
					<a href="#" class="[ ][ btn btn-sm btn-hollow btn-light ]" data-dismiss="modal" aria-hidden="true">ok</a>
				</div><!-- End of Modal-body-->
				<div class="[ modal-footer ][ bg-primary ]">
					<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
						<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
					</a>
				</div><!-- End of Modal-footer-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal-->

		<!-- Modal "lo sentimos"
		================================================== -->
		<div id="comida-gratis" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="comidaGratis" aria-hidden="true">
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<img class="[ svg ][ icon icon--logo icon--fill ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/logo-dabba.svg">
				</div>
				<div class="[ modal-body ][ bg-primary ][ padding--top--xxlarge padding--bottom--large ]">
					<div class="[ margin-bottom--large ]">
						<h2>¡Quiero mi comida gratis!</h2>
						<p>Gracias por dejarnos tus datos, esperámos verte muy pronto.</p>
						<form class="[ ]">
							<input class="[ form-control form-control-bg ][ margin-bottom--small ]" placeholder="Correo electrónico">
							<input class="[ form-control form-control-bg ][ margin-bottom--small ]" placeholder="Tu zona" name="zona">
						</form>
					</div>
					<a href="#" class="[ ][ btn btn-sm btn-hollow btn-light ]" data-dismiss="modal" aria-hidden="true">enviar</a>
				</div><!-- End of Modal-body-->
				<div class="[ modal-footer ][ bg-primary ]">
					<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
						<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
					</a>
				</div><!-- End of Modal-footer-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal-->

		<!-- Modal "login"
		================================================== -->
		<div id="login" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="Excelente" aria-hidden="true">
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<img class="[ svg ][ icon icon--logo icon--fill ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/logo-dabba.svg">
				</div>
				<div class="[ modal-body ][ bg-primary ][ padding--top--xxlarge padding--bottom--large ]">
					<h2>¡Hola!</h2>
					<p>Puedes iniciar sesión con las siguientes redes sociales</p>
					<div class="[ margin-bottom ]">
						<?php echo do_shortcode('[woocommerce_social_login_buttons return_url="' . site_url() . '"]'); ?>
					</div>
					<p>O con tu correo</p>
					<div class="[ container ]">

						<form data-parsley-validate method="post" id="form-login" class="[ login ][ row ]">

							<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
								<label for="username">Correo electrónico<span class="required">*</span></label>
								<input type="email" class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>"  data-parsley-type="email" required data-parsley-error-message="Por favor ingresa un correo electrónico válido." />
							</p>
							<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
								<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
								<input class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" type="password" name="password" id="password" required data-parsley-error-message="Por favor ingresa tu contraseña." />
							</p>

							<p class="[ form-row ]">
								<?php wp_nonce_field( 'woocommerce-login' ); ?>
								<input type="submit" class="button [ btn btn-sm btn-hollow btn-light ]" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
								<label for="rememberme" class="[ inline ][ hidden ]">
									<input name="rememberme" type="checkbox" id="rememberme" value="forever" checked="checked" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
								</label>
							</p>
							<p class="[ lost_password ]">
								<a class="[ color-light ]" href="<?php echo esc_url( wp_lostpassword_url() ); ?>">¿Olvidaste tu contraseña?</a>
							</p>

							<p>¿Aún no eres parte de Dabba?</p>
							<a class="[ btn btn-sm btn-hollow btn-light ][ js-registrate ]" href="#">registrate</a>

						</form>

					</div>
				</div><!-- End of Modal-body-->
				<div class="[ modal-footer ][ bg-primary ]">
					<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
						<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
					</a>
				</div><!-- End of Modal-footer-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal-->
		<?php wp_footer(); ?>
	</body>
</html>