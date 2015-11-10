<?php get_header(); ?>

	<?php if ( ! is_user_logged_in() ) : ?>

		<!-- HERO -->
		<section class="[ hero hero__image hero__image--home ][ margin-bottom--large ]">
			<div class="[ col-xs-12 ][ z-index-2 ][ center-full ]">
				<p class="[ text-punchline text-center color-light text-uppercase ]">Comer, lo mejor de tu día.</p>
			</div>
			<video class="[ hero__video hero__video--home ][ z-index-1 ][ center-full ]" autoplay loop poster="<?php echo THEMEPATH; ?>img/assets/home-intro.jpg">
				<source src="<?php echo THEMEPATH; ?>videos/video.mp4" type="video/mp4">
				<source src="<?php echo THEMEPATH; ?>videos/video.webm" type="video/webm">
				<source src="<?php echo THEMEPATH; ?>videos/video.ogv" type="video/ogg">
			</video>
		</section>

		<section class="[ descripcion ][ container ][ margin-bottom--large ]">
			<h4 class="[ text-center ][ no-margin ]">
				Ingredientes frescos de temporada<br />
				&mdash; <br />
				Platillos innovadores <br />
				&mdash; <br />
				Donde estés
			</h4>
		</section>

		<hr class="[ divider-primary ][ margin-bottom-large ]">

		<section class="[ container ][ como-funciona ][ text-center ][ margin-bottom--large ]">
			<div class="[ row ]">
				<div class="[ col-xs-12 col-md-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-dark ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/dining-set.svg">
					<h3 class="[ no-margin ]">Checa nuestros platillos</h3>
					<p class="[ text-gray-light ][ padding-left-right ]">Estamos preparando algo delicioso para ti.</p>
				</div>
				<div class="[ col-xs-12 col-md-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-dark ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/tap-hold.svg">
					<h3 class="[ no-margin ]">Ordena y escoge tu horario</h3>
					<p class="[ text-gray-light ][ padding-left-right ]">Nuestros platillos vuelan, no te los pierdas.</p>
				</div>
				<div class="[ col-xs-12 col-md-4 ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-dark ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/vespa.svg">
					<h3 class="[ no-margin ]">Disfruta de lo mejor de tu día</h3>
					<p class="[ text-gray-light ][ padding-left-right ][ no-margin ]">Relájate, puedes estar tranquilo de que tu comida llegará a tiempo.</p>
				</div>
			</div>
		</section>

		<hr class="[ divider-primary ][ margin-bottom-large ]">

	<?php endif; ?>

	<section class="[ menu-hoy ][ margin-top-bottom--large ]">
		<div class="[ container ]">
			<?php get_template_part( 'templates/menu', 'hoy' ); ?>
		</div>
	</section>

	<?php if ( is_user_logged_in() ) : ?>

		<hr class="[ divider-primary ][ margin-bottom-large ]">

		<section class="[ menu-semana ][ margin-bottom--large ]">
			<div class="[ container ]">
				<?php get_template_part( 'templates/menu', 'semana' ); ?>
			</div>
		</section>

		<section class="[ container-fluid ][ creditos ][ margin-bottom--large ]">
			<h2 class="[ text-center ]">Invita a un amigo</h2>
			<div class="[ row ]">
			</div>
		</section>

		<section class="[ container-fluid ][ creditos ][ margin-bottom--large ]">
			<h2 class="[ text-center ]">Pide más Dabba</h2>
			<div class="[ row ]">
				<div class="[ col-xs-4 ][ text-center ]">
					<p>
						<strong>$360</strong><br>
						<small>x<br> $290</small>
					</p>
					<p><small>3 comidas</small></p>
					<a class="[ btn btn-primary btn-sm btn-hollow ]" href="#">comprar</a>
				</div>
				<div class="[ col-xs-4 ][ text-center ]">
					<p>
						<strong>$480</strong><br>
						<small>x<br> $360</small>
					</p>
					<p><small>4 comidas</small></p>
					<a class="[ btn btn-primary btn-sm btn-hollow ]" href="#">comprar</a>
				</div>
				<div class="[ col-xs-4 ][ text-center ]">
					<p>
						<strong>$600</strong><br>
						<small>x<br> $420</small>
					</p>
					<p><small>5 comidas</small></p>
					<a class="[ btn btn-primary btn-sm btn-hollow ]" href="#">comprar</a>
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
					<p class="[ text-light ][ text-uppercase ]">1pm - 4pm</p>
				</div>
				<div class="[ col-xs-12 col-md-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-light ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/coins.svg">
					<h3 class="[ no-margin ]">$120</h3>
					<p class="[ text-light ][ no-margin ]">Postre y precio de envío incluidos.</p>
				</div>
				<div class="[ col-xs-12 col-md-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-light ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/compass.svg">
					<h3 class="[ no-margin ]">Área de entrega</h3>
				</div>
			</div>
		</div>

		<div class="[ embed-responsive ][ margin-bottom ]">
			<div id="map" class="[ js-map ][ embed-responsive-item ]"></div>
		</div>

		<div class="[ container ][ padding-top-bottom--large ]">
			<div class="[ col-xs-12 ][ text-center color-light ]">
				<p>¿No entregamos en tu zona?</p>
				<p>Déjanos tu correo y tu colonia, cuando estemos por allá te regalaremos una comida, ¿qué dices?</p>
				<a class="[ btn btn-light btn-hollow ]" href="#comida-gratis" data-toggle="modal">ok</a>
			</div><!-- row -->
		</div><!-- container -->

	</section>

<?php get_footer(); ?>