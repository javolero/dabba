<?php get_header(); ?>

	<?php if ( ! is_user_logged_in() ) : ?>

		<!-- HERO -->
		<section class="[ hero hero__image hero__image--home ][ margin-bottom--large ]">
			<div class="[ col-xs-12 ][ z-index-2 ][ center-full ]">
				<p class="[ text-punchline text-center color-light text-uppercase ][ no-margin ]">Comer, lo mejor de tu día.</p>
			</div>
			<?php if ( ! is_user_logged_in() ) : ?>
				<div class="[ col-xs-12 ][ z-index-2 ][ center-bottom ][ hero__login  ]">
					<p class="[ text-center color-light text-lowercase ][ no-margin ]">¿ya estás registrado? <a class="[ underline ]" href="#login" data-toggle="modal" id="btn-entra-aqui">entra aquí</a></p>
				</div>
			<?php endif; ?>
			<video class="[ hero__video hero__video--home ][ z-index-1 ][ center-bottom ]" autoplay loop poster="<?php echo THEMEPATH; ?>images/home-intro--md.jpg">
				<source src="<?php echo THEMEPATH; ?>videos/video.mp4" type="video/mp4">
				<source src="<?php echo THEMEPATH; ?>videos/video.webm" type="video/webm">
				<source src="<?php echo THEMEPATH; ?>videos/video.ogv" type="video/ogg">
			</video>
		</section>

		<section class="[ container ][ como-funciona ][ text-center ][ margin-bottom--large ]">
			<div class="[ row ]">
				<div class="[ col-xs-12 col-sm-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-dark ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/dining-set.svg">
					<h3 class="[ no-margin ]">Checa nuestros platillos</h3>
					<p class="[ text-gray-light ][ padding-left-right ]">Un menú diferente todos los días.</p>
				</div>
				<div class="[ col-xs-12 col-sm-4 ][ margin-bottom ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-dark ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/tap-hold.svg">
					<h3 class="[ no-margin ]">Ordena y escoge tu horario</h3>
					<p class="[ text-gray-light ][ padding-left-right ]">Nuestros platillos vuelan, no te los pierdas.</p>
				</div>
				<div class="[ col-xs-12 col-sm-4 ]">
					<img class="[ svg ][ icon icon--feature icon--stroke ][ color-dark ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/vespa.svg">
					<h3 class="[ no-margin ]">Disfruta de lo mejor de tu día</h3>
					<p class="[ text-gray-light ][ padding-left-right ][ no-margin ]">Relájate, puedes estar tranquilo de que tu comida llegará a tiempo.</p>
				</div>
			</div>
		</section>

		<hr class="[ divider-primary ][ margin-bottom-large ]">

	<?php endif; ?>

	<?php if( can_order_today() ) get_template_part( 'templates/menu', 'hoy' ); ?>

	<?php if ( is_user_logged_in() ) : ?>

		<section class="[ menu-semana ][ margin-top-bottom--large ]">
			<div class="[ container ]">
				<?php get_template_part( 'templates/menu', 'semana' ); ?>
			</div>
		</section>

		<section class="[ container-fluid ][ creditos ][ margin-bottom--large ][ hidden ]">
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

	<section class="[ detalles ][ margin-bottom--large ]">
		<div class="[ container ][ text-center color-light ]">
			<div class="[ block ][ col-xs-12 col-sm-10 col-md-8 col-lg-6 col-centered ][ text-center color-secondary ]">
				<div class="[ row ]">
					<div class="[ col-xs-12 col-sm-6 ][ margin-bottom ]">
						<img class="[ svg ][ icon icon--feature icon--stroke ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/clock.svg">
						<h3 class="[ no-margin ]">Horario de entrega</h3>
						<p class="[ no-margin ][ text-uppercase ]">Lunes - Viernes</p>
						<p class="[ no-margin ][ text-uppercase ]">1pm - 4pm</p>
					</div>
					<div class="[ col-xs-12 col-sm-6 ][ margin-bottom ]">
						<img class="[ svg ][ icon icon--feature icon--stroke ][ margin-bottom--small ]" src="<?php echo THEMEPATH; ?>icons/coins.svg">
						<h3 class="[ no-margin ]">$99 - $119</h3>
						<p class="[ no-margin ][ no-margin ]">Precio de envío incluido.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="[ padding--bottom--large ]">

		<div class="[ container ]">
			<article class="[ margin-bottom ]">

				<div class="[ margin-bottom ][ text-center ]">
					<h3 class="[ no-margin ]">Área de entrega</h3>
				</div>

				<div class="[ embed-responsive ]">
					<div id="map" class="[ js-map ][ embed-responsive-item ]"></div>
				</div>

			</article>

			<article class="[ padding-top-bottom--large ]">
				<?php if ( ! is_user_logged_in() ) : ?>
					<div class="[ block ][ col-xs-12 col-sm-8 col-md-6 col-centered ][ no-padding ][ text-center ]">
						<p>¿No entregamos en tu zona?</p>
						<p>Déjanos tu correo y tu zona, cuando estemos por allá te regalaremos una comida, ¿qué dices?</p>
						<a class="[ btn btn-primary btn-sm btn-hollow ]" href="#comida-gratis" data-toggle="modal" id="btn-ok">ok</a>
					</div><!-- row -->
				<?php endif; ?>
			</article>
		</div><!-- container -->

	</section>

	<?php if ( is_user_logged_in() ) : ?>
		<section class="[ container-fluid ][ creditos ][ margin-bottom--large ][ text-center ]">
			<h2 class="">Comparte Dabba</h2>
			<div class="[ block ][ col-xs-12 col-sm-8 col-md-6 col-centered ]">
				<p class="[ text-center lead ]">Invita a un amigo a unirse a Dabba y recibe un cupón por $119, entre más amigos invites, más comida gratis para tí.</p>
			</div>
			<a class="[ btn btn-primary btn-sm btn-hollow ]" href="#invita-a-un-amigo" data-toggle="modal" id="btn-invitar">invitar</a>
		</section>
	<?php endif; ?>

<?php get_footer(); ?>