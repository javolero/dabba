<?php get_header(); ?>

	<?php if ( ! is_user_logged_in() ) : ?>
		<section class="[ hero ]">
			<div class="[ embed-responsive embed-responsive-16by9 ][ hidden-xs ]">
				<video autoplay loop muted class="[ embed-responsive-item ]">
					<source src="http://ak4.picdn.net/shutterstock/videos/2404592/preview/stock-footage-chef-prepares-a-dish-in-a-restaurant-kitchen.mp4" type="video/mp4">
				</video>
			</div>
			<div class=" [ img-background-home ] [ text-uppercase ] ">
				<p class=" [ text-punchline ] ">Dabba Punchline</p>
			</div>
		</section>

		<section class="[ container-fluid ][ como-funciona ]">
			<div class="[ row ][ text-center ]">
				<h2 class="[ text-bold ]">Déjanos llevarte la comida</h2>
				<div class="[ col-xs-12 ]">
					<img src="<?php echo THEMEPATH; ?>img/cubiertos1.png">
					<h3>Healthy & Yummy</h3>
					<p class="[ text-gray-light ][ padding-left-right ]">Vegan Wayfarers seitan salvia lomo mustache., Thundercats wolf tumblr banh mi Pitchfork.</p>
				</div>
				<div class="[ col-xs-12 ]">
					<img src="<?php echo THEMEPATH; ?>img/cubiertos1.png">
					<h3>Don't Fret, Feast</h3>
					<p class="[ text-gray-light ][ padding-left-right ]">Vegan Wayfarers seitan salvia lomo mustache., Thundercats wolf tumblr banh mi Pitchfork.</p>
				</div>
				<div class="[ col-xs-12 ]">
					<img src="<?php echo THEMEPATH; ?>img/cubiertos1.png">
					<h3>Healthy & Yummy</h3>
					<p class="[ text-gray-light ][ padding-left-right ]">Vegan Wayfarers seitan salvia lomo mustache., Thundercats wolf tumblr banh mi Pitchfork.</p>
				</div>
			</div>
		</section>
		<hr class="[ divider-primary ][ margin-bottom-large ]">
	<?php endif; ?>

	<?php if ( is_user_logged_in() ) : ?>

		<section class="[ menu-hoy ]">
			<div class="[ container-fluid ]">
				<div class="[ row ]">
					<h2 class="[ text-center ]">Menú de hoy</h2>
					<?php get_template_part( 'templates/menu', 'hoy' ); ?>
				</div>
			</div>
		</section>

		<hr class="[ divider-primary ][ margin-bottom-large ]">

		<section class="[ menu-hoy ]">
			<div class="[ container-fluid ]">
				<div class="[ row ]">
					<h2 class="[ text-center ]">Menú de la semana</h2>
					<?php get_template_part( 'templates/menu', 'semana' ); ?>
				</div>
			</div>
		</section>

		<hr class="[ divider-primary ][ margin-bottom-large ]">

		<section class="[ container-fluid ][ creditos ]">
			<div class="[ row ]">
				<h2 class="[ text-center ]">Ahorra con nuestros créditos</h2>
				<div class="[ col-xs-4 ][ text-center ]">
					<p>
						<strong>$350</strong><br>
						<small>x <br> $300</small>
					</p>
					<p><small>3 comidas</small></p>
					<a class="[ btn btn-default ]" href="#">comprar</a>
				</div>
				<div class="[ col-xs-4 ][ text-center ]">
					<p>
						<strong>$600</strong><br>
						<small>x <br> $500</small>
					</p>
					<p><small>6 comidas</small></p>
					<a class="[ btn btn-default ]" href="#">comprar</a>
				</div>
				<div class="[ col-xs-4 ][ text-center ]">
					<p>
						<strong>$900</strong><br>
						<small>x <br> $700</small>
					</p>
					<p><small>10 comidas</small></p>
					<a class="[ btn btn-default ]" href="#">comprar</a>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="[ detalles ][ bg-gradient ]">

		<div class="[ container ][ text-center text-primary-light ][ padding-top-bottom ]">
			<div class="[ row ]">
				<h2>Detalles</h2>
				<div class="[ col-xs-offset-2 col-xs-8 ]">
					<i class=" [ glyphicon glyphicon-time ] [ icon-details ] "></i>
					<h3>Horario de entrega</h3>
					<p class="[ text-uppercase ][ padding-left-right ]">lunes - viernes</p>
					<p class="[ text-uppercase ]">9am - 4pm</p>
				</div>
				<div class="[ col-xs-offset-2 col-xs-8 ]">
					<i class=" [ glyphicon glyphicon-time ] [ icon-details ] "></i>
					<h3>$120</h3>
					<p class="[ padding-left-right ]">Por cada platillo, ya incluímos el precio del envío.</p>
				</div>
				<div class="[ col-xs-offset-2 col-xs-8 ]">
					<i class=" [ glyphicon glyphicon-time ] [ icon-details ] "></i>
					<h3>Área de entrega</h3>
				</div>
			</div>
		</div>
				<!-- <div id="mapa" class="[ col-xs-12 ]"></div> -->
		<div class="[ embed-responsive ]">
				<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3762.462624634608!2d-99.2077281!3d19.435611!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smx!4v1445293875693" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="[ container ][ padding-top-bottom--large ]">
			<div class="[ row ]"></div>
				<div class="[ col-xs-12 ][ text-center text-primary-light ]">
					<p>¿No entregamos en tu zona?</p>
					<p>Déjanos tu correo y tu colonia, cuando estemos por allá te regalaremos una comida, ¿qué dices?</p>
					<a class="[ btn btn-light-hollow ]" href="#comida-gratis" data-toggle="modal">ok</a>
				</div>
			</div><!-- row -->
		</div><!-- container -->

	</section>

	<!-- Modal "comida-gratis"-->
	<div id="comida-gratis" class="[ modal ][ fade ][ bg-primary ][ text-center ]" tabindex="-1" role="dialog" aria-labelledby="¡Quiero mi comida gratis!" aria-hidden="true" style="display: none;">
		<div class="[ modal-header ][ bg-light ]">
			<img src="<?php echo THEMEPATH; ?>img/assets/logo.svg" class="[ color-primary ][ img-header-logo ]" alt="Dabba">
		</div>
		<div class="[ modal-body ]">
			<h2>¡Quiero mi comida gratis!</h2>
			<p>Gracias por dejarnos tus datos, esperámos verte muy pronto.</p>
			<form role="form">
				<div class="[ form-group ]">
					<input class="[ form-control ]" placeholder="Correo electrónico">
					<input class="[ form-control ]" placeholder="Colonia">
				</div>
			</form>
			<div class="[ text-center ]">
				<button class="[ btn ][ btn-light-hollow ]">enviar</button>
			</div>
			<div class="[ text-right ]">
				<button class="[ close ]" data-dismiss="modal" aria-hidden="true">X</button>
			</div>
		</div>
	</div><!-- Modal "comida-gratis"-->
<?php get_footer(); ?>