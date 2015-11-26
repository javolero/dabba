
		<footer class="[ bg-tertiary ][ color-light ][ padding--top--large padding--bottom--xxlarge ]">
			<div class="[ container ]">
				<div class="[ row ][ margin-bottom ]">
					<section class="[ footer__payment ][ margin-bottom ]">
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
					<section class="[ footer__links ][ margin-bottom ]">
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="<?php echo site_url('nosotros'); ?>">Nosotros</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="#contacto" data-toggle="modal">Contáctanos</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="#" data-toggle="modal">Dabba para reuniones</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="<?php echo THEMEPATH; ?>pdf/terminos_y_condiciones_dabba.pdf" target="_blank">Términos y condiciones</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="<?php echo THEMEPATH; ?>pdf/aviso_de_privacidad_dabba.pdf" target="_blank">Aviso de privacidad</a>
 						<p class="[ color-gray ][ margin-sides--small ][ line-height--large ]">&copy; Copyright <script>document.write( new Date().getFullYear() )</script></p>
					</section>
					<section class="[ footer__social-media ][ social ]">
						<a class="[ margin-sides--xsmall ][ inline-block ]" href="<?php echo 'https://twitter.com/' ?>">
							<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ]" src="<?php echo THEMEPATH; ?>icons/logo-twitter.svg">
						</a>
						<a class="[ margin-sides--xsmall ][ inline-block ]" href="https://www.facebook.com/dabbamx/" target="_blank">
							<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ]" src="<?php echo THEMEPATH; ?>icons/logo-facebook.svg">
						</a>
						<a class="[ margin-sides--xsmall ][ inline-block ]" href="https://instagram.com/dabbamx/" target="_blank">
							<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ]" src="<?php echo THEMEPATH; ?>icons/logo-instagram.svg">
						</a>
					</section>
				</div>
			</div>
		</footer>



		<!-- =================================================
		==== Action nav bar
		================================================== -->
		<?php if ( ! is_user_logged_in() ) : ?>
			<!-- <a class="[ btn btn-primary btn--action btn--action--left ][ visible-xs-block ]" href="#coming" data-toggle="modal"> -->
			<a class="[ btn btn-primary btn--action btn--action--left ][ visible-xs-block ]" href="#login" data-toggle="modal">
				<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/user.svg">
			</a>
		<?php else: ?>
			<!-- <a class="[ btn btn-primary btn--action btn--action--left ][ visible-xs-block ]" href="#coming" data-toggle="modal"> -->
			<a class="[ btn btn-primary btn--action btn--action--left ][ visible-xs-block ]" href="<?php echo site_url('mi-cuenta'); ?>">
				<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/user.svg">
			</a>
		<?php endif; ?>
		<?php if( is_single() || is_home() ) : ?>
			<?php if ( ! is_user_logged_in() ) : ?>
				<!-- <a class="[ btn btn-primary btn--action btn--action--center ][ bar-action--sm ][ padding--sides ]" href="#coming" data-toggle="modal"> -->
				<a class="[ btn btn-primary btn--action btn--action--center ][ bar-action--sm ][ padding--sides ]" href="#comienza" data-toggle="modal">
					ordena ahora
				</a>
			<?php else: ?>
				<?php echo get_todays_add_to_cart_btn(); ?>
			<?php endif; ?>
		<?php elseif( ! is_page( 'checkout' ) ) : ?>
			<!-- <a class="[ btn btn-primary btn--action btn--action--center ][ bar-action--sm ][ padding--sides ]" href="#coming" data-toggle="modal"> -->
			<a class="[ btn btn-primary btn--action btn--action--center ][ bar-action--sm ][ padding--sides ]" href="<?php echo site_url() ?>" data-toggle="modal">
				ver platillos
			</a>
		<?php endif; ?>
		<?php if ( is_user_logged_in() && ( ! is_page('checkout') && ! is_page('cart') ) ) : ?>
			<a class="[ btn btn-primary btn--action btn--action--right ][ js-shopping-bag ][ visible-xs-block ]" href="<?php echo site_url('checkout'); ?>" title="se ha agregado un platillo al carrito">
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
					<h2 class="[ color-primary ][ no-margin ]">
						<span class="">Contáctanos</span>
						<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
							<img class="[ svg ][ icon icon--stroke ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
						</a>
					</h2>
				</div>
				<div class="[ modal-body ][ bg-primary ]">
					<div class="[ margin-bottom--large ]">
						<p>Nuestro equipo de atención a clientes está disponible de lunes a viernes de 10:00 am a 5:00 pm para responder cualquier duda o comentario.</p>
						<p>Puedes enviarnos un correo a <a href="mailto:clientes@dabba.mx" class="[ underlined ][ color-light ]">clientes@dabba.mx</a> o llámanos al <a href="tel:5510789424" class="[ underlined ][ color-light ]">(55)1078-9424</a>.</p>
					</div>
					<a href="mailto:hola@dabba.mx" class="[ btn btn-sm btn-hollow btn-light ]">mándanos un correo</a>
				</div><!-- End of Modal-body-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal -->

		<!-- Modal "coming"
		================================================== -->
		<div id="coming" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="Coming" aria-hidden="true">
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<h2 class="[ color-primary ][ no-margin ]">
						<span class="">Aún no estamos listos…</span>
						<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
							<img class="[ svg ][ icon icon--stroke ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
						</a>
					</h2>
				</div>
				<div class="[ modal-body ][ bg-primary ]">
					<div class="[ margin-bottom--large ]">
						<p class="[ margin-bottom ]">Suscríbete para recibir una comida gratis.</p>
						<form id="form-zona" action="//dabba.us11.list-manage.com/subscribe/post?u=2444125ca807d59dd04e2a1dc&amp;id=28d981affe" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" data-parsley-validate-no-listos>
							<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
								<label for="FNAME">Nombre y apellido<span class="required">*</span></label>
								<input type="text" class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="FNAME" value="" required data-parsley-error-message="Por favor ingresa tu nombre.">
							</p>
							<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
								<label for="EMAIL">Correo electrónico<span class="required">*</span></label>
								<input type="email" class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="EMAIL" value="" data-parsley-type="email" required data-parsley-error-message="Por favor ingresa un correo electrónico válido.">
							</p>
							<div class="[ select-style ][ margin-bottom--small ]">
								<p class="[ no-padding no-margin ][ text-left ][ col-xs-12 ]">
									<label for="ZONA">Selecciona tu zona<span class="required">*</span></label>
									<select class="[ form-control form-control-bg ]" name="ZONA" required data-parsley-error-message="por favor selecciona una zona">
										<option value="">¿En qué zona del DF trabajas?</option>
										<option value="Polanco">Polanco</option>
										<option value="Lomas">Lomas</option>
										<option value="Santa Fe">Santa Fe</option>
										<option value="Condesa">Roma / Condesa</option>
										<option value="Del Valle">Del Valle</option>
										<option value="Escandón">Escandón</option>
										<option value="Otra">Otra</option>
									</select>
								</p>
							</div>
							<div class="[ text-center ]">
								<button class="[ button ][ btn btn-sm btn-hollow btn-light ]" type="submit">Enviar</button>
							</div>
						</form>
					</div>
				</div><!-- End of Modal-body-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal-->

		<!-- Modal "comienza"
		================================================== -->
		<div id="comienza" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="Comienza" aria-hidden="true">
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<h2 class="[ color-primary ][ no-margin ]">
						<span class="">Comienza</span>
						<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
							<img class="[ svg ][ icon icon--stroke ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
						</a>
					</h2>
				</div>
				<div class="[ modal-body ][ bg-primary ]">
					<div class="[ margin-bottom--large ]">
						<p class="[ margin-bottom--large ]">Ingresa tu siguiente información.</p>
						<form id="form-zona" data-parsley-validate-comienza>
							<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ][ no-margin ]">
								<label for="username">Correo electrónico<span class="required">*</span></label>
								<input type="email" class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="email-comienza" data-parsley-type="email" required data-parsley-error-message="Por favor ingresa un correo electrónico válido.">
							</p>
							<div class="[ select-style ][ margin-bottom--small ]">
								<p class="[ no-padding ][ text-left ][ col-xs-12 ][ no-margin ]">
									<label for="username">Selecciona tu zona<span class="required">*</span></label>
									<select class="[ form-control form-control-bg ]" name="select-zona" required data-parsley-error-message="por favor selecciona una zona">
										<option value="">-</option>
										<option value="polanco">Polanco</option>
										<option value="ampliacion-granada">Ampliación Granada</option>
										<option value="corporativos-palmas">Corporativos Palmas</option>
										<option value="corporativos-fc-de-cuernavaca">Corporativos Fc. de Cuernavaca</option>
										<option value="other">Otra</option>
									</select>
								</p>
							</div>
							<input class="[ toggable ][ form-control form-control-bg ][ col-xs-12 ][ margin-bottom--small ][ js-zona ][ hidden ]" placeholder="Tu zona" name="zona" data-parsley-error-message="Este campo es obligatorio.">
						</form>
					</div>
					<a href="#" class="[ btn btn-sm btn-hollow btn-light ][ js-btn-siguiente ]" data-toggle="modal">siguiente</a>
				</div><!-- End of Modal-body-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal-->


		<!-- Modal "excelente"
		================================================== -->
		<div id="excelente" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="Excelente" aria-hidden="true">
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<h2 class="[ color-primary ][ no-margin ]">
						<span class="">¡Excelente! :)</span>
						<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
							<img class="[ svg ][ icon icon--stroke ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
						</a>
					</h2>
				</div>
				<div class="[ modal-body ][ bg-primary ]">
					<p>Ingresa tu password para que puedas darte de alta y veas el menu de hoy.</p>
					<div class="[ margin-bottom ]">
						<?php echo do_shortcode('[woocommerce_social_login_buttons return_url="' . site_url() . '"]'); ?>
					</div>
					<p>O con tu correo</p>

					<form method="post" class="[ register ][ row ]" data-parsley-validate-excelente>
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
						<p class="[ js-invalid-registration-msg ]"></p>

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
				</div><!-- End of Modal-body-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal-->

		<!-- Modal "lo sentimos"
		================================================== -->
		<div id="error" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="loSentimos" aria-hidden="true">
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<h2 class="[ color-primary ][ no-margin ]">
						<span class="">Lo sentimos :(</span>
						<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
							<img class="[ svg ][ icon icon--stroke ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
						</a>
					</h2>
				</div>
				<div class="[ modal-body ][ bg-primary ]">
					<div class="[ margin-bottom--large ]">
						<p>Por ahora no entregamos en tu área, entregamos en:</p>
						<div class="[ embed-responsive ][ margin-bottom ]">
							<div id="map-lo-sentimos" class="[ js-map ][ embed-responsive-item ]"></div>
						</div>
						<p>Cuando entreguémos en tu colonia recibirás un correo electrónico con un cupón para una comida gratis.</p>
					</div>
					<a href="#" class="[ ][ btn btn-sm btn-hollow btn-light ]" data-dismiss="modal" aria-hidden="true">ok</a>
				</div><!-- End of Modal-body-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal-->

		<!-- Modal "lo sentimos"
		================================================== -->
		<div id="comida-gratis" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="comidaGratis" aria-hidden="true">
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<h2 class="[ color-primary ][ no-margin ]">
						<span class="">¡Quiero mi comida gratis!</span>
						<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
							<img class="[ svg ][ icon icon--stroke ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
						</a>
					</h2>
				</div>
				<div class="[ modal-body ][ bg-primary ]">
					<div class="[ margin-bottom--large ]">
						<p>Gracias por dejarnos tus datos, esperámos verte muy pronto.</p>
						<form class="[ ]">
							<input class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" placeholder="Correo electrónico" required>
							<input class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" placeholder="Tu zona" name="zona" required>
						</form>
					</div>
					<a href="#" class="[ ][ btn btn-sm btn-hollow btn-light ]" data-dismiss="modal" aria-hidden="true">enviar</a>
				</div><!-- End of Modal-body-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal-->

		<!-- Modal "login"
		================================================== -->
		<div id="login" class="[ modal ]" tabindex="-1" role="dialog" aria-labelledby="Excelente" aria-hidden="true">
			<div class="[ modal-content ][ text-center ]">
				<div class="[ modal-header ][ bg-light ][ padding ]">
					<h2 class="[ color-primary ][ no-margin ]">
						<span class="">¡Hola!</span>
						<a class="[ close ]" data-dismiss="modal" aria-hidden="true">
							<img class="[ svg ][ icon icon--stroke ][ color-primary ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/close.svg">
						</a>
					</h2>
				</div>
				<div class="[ modal-body ][ bg-primary ]">
					<p>Inicia sesión</p>
					<div class="[ margin-bottom--small ]">
						<?php echo do_shortcode('[woocommerce_social_login_buttons return_url="' . site_url() . '"]'); ?>
					</div>
					<p>O con tu correo</p>
					<form data-parsley-validate-hola method="post" id="form-login" class="[ login ]">

						<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
							<label for="username">Correo electrónico<span class="required">*</span></label>
							<input type="email" class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>"  data-parsley-type="email" required data-parsley-error-message="Por favor ingresa un correo electrónico válido." />
						</p>
						<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
							<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
							<input class="[ form-control form-control-bg ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" type="password" name="password" id="password" required data-parsley-error-message="Por favor ingresa tu contraseña." />
							<span class="[ js-invalid-login-msg ]"></span>
						</p>

						<p class="[ lost_password ]">
							<small><a class="[ color-light ]" href="<?php echo esc_url( wp_lostpassword_url() ); ?>">¿Olvidaste tu contraseña?</a></small>
						</p>

						<p class="[ form-row ]">
							<?php wp_nonce_field( 'woocommerce-login' ); ?>
							<input type="submit" class="button [ btn btn-sm btn-hollow btn-light ]" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
							<label for="rememberme" class="[ inline ][ hidden ]">
								<input name="rememberme" type="checkbox" id="rememberme" value="forever" checked="checked" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
							</label>
						</p>

						<hr class="[ divider-light ][ margin-top-bottom ]">

						<p>¿Aún no eres parte de Dabba?</p>
						<a class="[ btn btn-sm btn-hollow btn-light ][ js-registrate ]" href="#">registrate</a>

					</form>
				</div><!-- End of Modal-body-->
			</div><!-- End of Modal-content-->
		</div><!-- End of Modal-->
		<?php wp_footer(); ?>
	</body>
</html>