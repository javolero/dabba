
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

		<!-- Modal "contacto"-->
		<div id="contacto" class="[ modal ][ fade ][ bg-primary ][ text-center ]" tabindex="-1" role="dialog" aria-labelledby="Contáctanos" aria-hidden="true" >
			<div class="[ modal-header ][ bg-light ]">
				<img src="<?php echo THEMEPATH; ?>img/assets/logo.svg" class="[ color-primary ][ img-header-logo ]" alt="Dabba">
			</div>
			<div class="[ modal-body ]">
				<h2>Contáctanos</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae vero iure laborum placeat non alias distinctio enim, qui rem quod optio voluptas officiis eius quidem reprehenderit explicabo. Et, quasi, ipsa.</p>
				<p>Lorem ipsum dolor sit amet <a href="mailto:hola@dabba.mx" class="[ underlined ][ color-light ]">hola@dabba.mx</a> consectetur adipisicing elit <a href="tel:5555555555" class="[ underlined ][ color-light ]">(55)5555-5555</a>.</p>
				<div class="[ text-center ]">
					<a href="mailto:hola@dabba.mx" class="[ btn btn-light-hollow ][ color-light ]">mándanos un correo</a>
				</div>
				<div class="text-right">
					<button class="[ close ]" data-dismiss="modal" aria-hidden="true">x</button>
				</div>
			</div>
		</div><!-- End of Modal -->

		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>