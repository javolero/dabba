<!-- 		<div class="[ row ][ margin-large ]">
				<img class="[ col-xs-3 ]" src="img/assets/visa.png" alt="">
				<img class="[ col-xs-3 ]" src="img/assets/master.png" alt="">
				<img class="[ col-xs-3 ]" src="img/assets/american.png" alt="">
				<img class="[ col-xs-3 ]" src="img/assets/paypal.png" alt="">
			</div>
			<p>
			<span class="[ text-underlined ]"><a class="[ color-light ]">Nosotros</a></span>
			<span class="[ text-underlined ]"><a class="[ color-light ]">Contàctanos</a></span>
			<span class="[ text-underlined ]"><a class="[ color-light ]">Tèrminos y condicione</a></span>
			<span class="[ text-underlined ]"><a class="[ color-light ]">Aviso de privacidad</a></span>
			</p>
			<p class="[ color-gray ]">&#169; Copyright 2015 </p>
			<div class="[ row ][ text-center ][  padding--large ]">
				<i class="[ fa fa-twitter ][ icons ][ padding ]"></i>
				<i class="[ fa fa-facebook ][ icons ][ padding ]"></i>
				<i class="[ fa fa-instagram ][ icons ][ padding ]"></i>
			</div> -->

		<footer class="[ bg-tertiary ][ color-light][ padding--large ]">
			<div class="[ row ][ margin-top ]">
				<div class="[ tarjetas ][ text-center ]">
					<img class="[ col-xs-3 ]" src="<?php echo THEMEPATH; ?>img/visa.png" alt="">
					<img class="[ col-xs-3 ]" src="<?php echo THEMEPATH; ?>img/master.png" alt="">
					<img class="[ col-xs-3 ]" src="<?php echo THEMEPATH; ?>img/american.png" alt="">
					<img class="[ col-xs-3 ]" src="<?php echo THEMEPATH; ?>img/paypal.png" alt="">

					<nav class="[ col-xs-12 ][ margin-top ]">
						<a class="[ text-underlined color-light ]" href="#">Nostros</a>
						<a class="[ text-underlined color-light ]" href="#contacto" data-toggle="modal">Contáctanos</a>
						<a class="[ text-underlined color-light ]" href="#">Términos y condiciones</a>
						<a class="[ text-underlined color-light ]" href="#">Aviso de privacidad</a>
					</nav>
					<p class="[ col-xs-12 ][ text-center color-gray ][ margin-top ]">&copy; Copyright <script>document.write( new Date().getFullYear() )</script></p>
					<div class="[ col-xs-offset-2 col-xs-8 ][ social ]">
						<span class="[ glyphicon glyphicon-search ]" aria-hidden="true"></span>
						<span class="[ glyphicon glyphicon-search ]" aria-hidden="true"></span>
						<span class="[ glyphicon glyphicon-search ]" aria-hidden="true"></span>
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