<?php get_header(); ?>

	<?php if ( ! is_user_logged_in() ) : ?>

		<!-- HERO -->
		<section class="[ hero hero__image hero__image--home ][ margin-bottom--large ]">
			<div class="[ col-xs-12 ][ z-index-2 ][ center-full ]">
				<p class="[ text-punchline text-center color-light text-uppercase ]">Come, lo mejor de tu día.</p>
			</div>
			<video class="[ hero__video hero__video--home ][ center-full ]" autoplay loop poster="<?php echo THEMEPATH; ?>img/assets/home-intro.jpg">
				<source src="http://ak4.picdn.net/shutterstock/videos/2404592/preview/stock-footage-chef-prepares-a-dish-in-a-restaurant-kitchen.mp4" type="video/mp4">
			</video>
		</section>

		<section class="[ descripcion ][ container ][ margin-bottom--large ]">
			<h4 class="[ text-center ][ no-margin ]">Nuevo concepto culinario. Ingredientes frescos y de temporada. Platillos innovadores creados por un Chef</h4>
		</section>

		<section class="[ container ][ como-funciona ][ text-center ][ margin-bottom--large ]">
			<!-- <h2 class="[ text-bold ]">Déjanos llevarte la comida</h2> -->
			<div class="[ row ]">
				<div class="[ col-xs-12 col-md-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-primary ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/grape.svg">
					<h3 class="[ no-margin ]">Checa nuestro menú</h3>
					<p class="[ text-gray-light ][ padding-left-right ]">Nuestros chefs están preparando algo delicioso para ti.</p>
				</div>
				<div class="[ col-xs-12 col-md-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-primary ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/grape.svg">
					<h3 class="[ no-margin ]">Ordena y escoge tu horario</h3>
					<p class="[ text-gray-light ][ padding-left-right ]">Nuestros platillos vuelan, no te los pierdas.</p>
				</div>
				<div class="[ col-xs-12 col-md-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-primary ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/grape.svg">
					<h3 class="[ no-margin ]">¡A comer!</h3>
					<p class="[ text-gray-light ][ padding-left-right ]">Relájate y disfruta, puedes estar tranquilo de que tu comida llegará fresca, lista y a tiempo a donde tu estés.</p>
				</div>
			</div>
		</section>

	<?php endif; ?>

	<hr class="[ divider-primary ][ margin-bottom-large ]">

	<section class="[ menu-hoy ][ margin-bottom--large ]">
		<div class="[ container-fluid ]">
			<h2 class="[ text-center ]">Menú de hoy</h2>
			<div class="[ row ]">
				<?php get_template_part( 'templates/menu', 'hoy' ); ?>
			</div>
		</div>
	</section>

	<?php if ( is_user_logged_in() ) : ?>

		<section class="[ menu-semana ][ margin-bottom--large ]">
			<div class="[ container-fluid ]">
				<h2 class="[ text-center ]">Menú de la semana</h2>
				<?php get_template_part( 'templates/menu', 'semana' ); ?>
			</div>
		</section>

		<section class="[ container-fluid ][ creditos ][ margin-bottom--large ]">
			<h2 class="[ text-center ]">Ahorra con nuestros créditos</h2>
			<div class="[ row ]">
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

	<section class="[ detalles ][ bg-gradient ][ padding--bottom--large ]">
		<div class="[ container ][ text-center color-light ][ padding--top--xlarge ]">
			<h2>Detalles</h2>
			<div class="[ row ]">
				<div class="[ col-xs-12 col-md-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-light ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/clock.svg">
					<h3 class="[ no-margin ]">Horario de entrega</h3>
					<p class="[ text-light ][ no-margin ][ text-uppercase ]">Lunes - Viernes</p>
					<p class="[ text-light ][ text-uppercase ]">9am - 4pm</p>
				</div>
				<div class="[ col-xs-12 col-md-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-light ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/coins.svg">
					<h3 class="[ no-margin ]">$120</h3>
					<p class="[ text-light ][ no-margin ][ text-uppercase ]">Por cada platillo, ya incluímos el precio del envío.</p>
				</div>
				<div class="[ col-xs-12 col-md-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-light ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/compass.svg">
					<h3 class="[ no-margin ]">Área de entrega</h3>
				</div>
			</div>
		</div>
		
		<!-- Mover a LESS -->
		<style>
			html, body {
				height: 100%;
				margin: 0;
				padding: 0;
			}
			#map {
				height: 400px;
			}
		</style>
		<div id="map"></div>

		<div class="[ container ][ padding-top-bottom--large ]">
			<div class="[ col-xs-12 ][ text-center color-light ]">
				<p>¿No entregamos en tu zona?</p>
				<p>Déjanos tu correo y tu colonia, cuando estemos por allá te regalaremos una comida, ¿qué dices?</p>
				<a class="[ btn btn-light-hollow ]" href="#comida-gratis" data-toggle="modal">ok</a>
			</div>
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