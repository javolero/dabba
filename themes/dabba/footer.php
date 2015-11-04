
		<footer class="[ bg-tertiary ][ color-light ][ padding--top-bottom--large ]">
			<div class="[ container ]">
				<div class="[ row ][ margin-bottom ][ text-center ]">
					<section class="[ tarjetas ][ col-xs-12 col-sm-6 col-md-4 ][ margin-bottom--large ]">
						<img class="[ col-xs-3 ]" src="<?php echo THEMEPATH; ?>icons/visa.svg" alt="">
						<img class="[ col-xs-3 ]" src="<?php echo THEMEPATH; ?>icons/mastercard.svg" alt="">
						<img class="[ col-xs-3 ]" src="<?php echo THEMEPATH; ?>icons/amex.svg" alt="">
						<img class="[ col-xs-3 ]" src="<?php echo THEMEPATH; ?>icons/paypal.svg" alt="">
					</section>
					<section class="[ col-xs-12 col-sm-6 ][ margin-bottom ]">
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="#">Nosotros</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="#contacto" data-toggle="modal">Contáctanos</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="#" data-toggle="modal">Dabba for business</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="#">Términos y condiciones</a>
						<a class="[ text-underlined color-light ][ margin-sides--small ][ line-height--large ]" href="#">Aviso de privacidad</a>
						<p class="[ color-gray ][ margin-sides--small ][ line-height--large ]">&copy; Copyright <script>document.write( new Date().getFullYear() )</script></p>
					</section>
					<section class="[ col-xs-12 col-md-2 ][ social ]">
						<a class="[ block ]" href="<?php echo 'https://twitter.com/' ?>">
							<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ margin-sides--small ]" src="<?php echo THEMEPATH; ?>icons/logo-twitter.svg">
						</a>
						<a class="[ block ]" href="<?php echo 'https://twitter.com/' ?>">
							<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ margin-sides--small ]" src="<?php echo THEMEPATH; ?>icons/logo-facebook.svg">
						</a>
						<a class="[ block ]" href="<?php echo 'https://twitter.com/' ?>">
							<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ margin-sides--small ]" src="<?php echo THEMEPATH; ?>icons/logo-instagram.svg">
						</a>
					</section>
				</div>
			</div>
		</footer>



		<!-- =================================================
		==== Action nav bar
		================================================== -->
		<a class="[ btn btn--action btn--action--left ][ bg-primary ]" href="<?php site_url('my-account'); ?>">
			<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/user.svg">
		</a>
		<a class="[ btn btn--action btn--action--center ][ bg-primary ][ padding--sides ]" href="#comienza" data-toggle="modal">
			ordena ahora
		</a>
		<a class="[ btn btn--action btn--action--right ][ bg-primary ]" href="<?php site_url('cart'); ?>">
			<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/shopping-bag.svg">
		</a>






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
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae vero iure laborum placeat non alias distinctio enim, qui rem quod optio voluptas officiis eius quidem reprehenderit explicabo. Et, quasi, ipsa.</p>
						<p>Lorem ipsum dolor sit amet <a href="mailto:hola@dabba.mx" class="[ underlined ][ color-light ]">hola@dabba.mx</a> consectetur adipisicing elit <a href="tel:5555555555" class="[ underlined ][ color-light ]">(55)5555-5555</a>.</p>
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
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore odit temporibus consequuntur voluptates, repellendus cumque deleniti porro.</p>
						<form>
							<input class="[ form-control ][ margin-bottom--small ]" name="email" placeholder="Correo electrónico">
							<div class="[ select-style ]">
								<select class="[ form-control ]" name="zona">
									<option>Selecciona tu zona</option>
									<option>Polanco</option>
									<option>Ampliación Granada</option>
									<option>Corporativos Palmas</option>
									<option>Corporativos Fc. de Cuernavaca</option>
									<option value="other">Otra</option>
								</select>
							</div>
						</form>
					</div>
					<a href="#excelente" class="[ btn btn-sm btn-hollow btn-light ]" data-toggle="modal">siguiente</a>
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
					<div class="[ margin-bottom--large ]">
						<h2>¡Excelente! :)</h2>
						<p>Sí entregamos en tu zona, danos tus datos para continuar con el registro.</p>
						<div class="[ margin-bottom ]">
							<a class="[ btn btn-info ][ margin-sides--small ]">
								<img class="[ svg ][ icon icon--iconed--mini icon--fill ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/logo-facebook.svg"> Facebook
							</a>
							<a class="[ btn btn-light ][ color-quaternary ][ margin-sides--small ]">
								<img class="[ svg ][ icon icon--iconed--mini icon--fill ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/logo-google.svg"> Google
							</a>
						</div>
						<p>O con tu correo</p>
						<div class="[ container ]">
							<form class="[ row ]">
								<input class="[ form-control ][ col-xs-6 ][ margin-bottom--small ]" id="ejemplo_nombre_1" placeholder="Nombre">
								<input class="[ form-control ][ col-xs-6 ][ margin-bottom--small ]" id="ejemplo_apellido_1" placeholder="Apellido">
								<input class="[ form-control ][ col-xs-12 ][ margin-bottom--small ]" id="ejemplo_celular_1" placeholder="Celular">
								<input class="[ form-control ][ col-xs-12 ][ margin-bottom--small ]" id="ejemplo_password_1" placeholder="Contraseña">
							</form>
						</div>
					</div>
					<a href="#" class="[ btn btn-sm btn-hollow btn-light ]">ver platillo de hoy</a>
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
						<p>Por ahora no entregamos en tu área, entregamos en</p>
						<div class="[ embed-responsive ][ margin-bottom ]">
							<div id="map" class="[ js-map ][ embed-responsive-item ]"></div>
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
							<input class="[ form-control ][ margin-bottom--small ]" placeholder="Correo electrónico">
							<div class="[ select-style ][ margin-bottom--small ]">
								<select class="[ form-control ]" name="zona">
									<option>Selecciona tu zona</option>
									<option>Polanco</option>
									<option>Ampliación Granada</option>
									<option>Corporativos Palmas</option>
									<option>Corporativos Fc. de Cuernavaca</option>
									<option value="other">Otra</option>
								</select>
							</div>
							<input class="[ toggable ][ hidden ][ form-control ][ margin-bottom--small ]" placeholder="Tu zona">
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



		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>