<?php get_header(); ?>

	<?php if ( is_user_logged_in() ) : ?>
		<section class="[ hero ]">
			<div class="[ embed-responsive embed-responsive-16by9 ][ hidden-xs ]">
				<video autoplay loop muted class="[ embed-responsive-item ]">
			        <source src="http://ak4.picdn.net/shutterstock/videos/2404592/preview/stock-footage-chef-prepares-a-dish-in-a-restaurant-kitchen.mp4" type="video/mp4">
			  	</video>
			</div>
			<img class="[ visible-xs-block ][ img-responsive ]" src="http://il9.picdn.net/shutterstock/videos/2404592/thumb/11.jpg" alt="">
		</section>

		<div class="[ container-fluid ]">
			<div class="[ row ][ text-center ]">
				<h2>Déjanos llevarte la comida</h2>
				<div class="[ col-xs-12 ]">
					<span class="[ glyphicon glyphicon-search ]" aria-hidden="true"></span>
					<h3>Healthy & Yummy</h3>
					<p>Vegan Wayfarers seitan salvia lomo mustache., Thundercats wolf tumblr banh mi Pitchfork., Quinoa viral cardigan irony cred Pitchfork +1 lomo skateboard.</p>
				</div>
				<div class="[ col-xs-12 ]">
					<span class="[ glyphicon glyphicon-search ]" aria-hidden="true"></span>
					<h3>Don't Freat, Feast</h3>
					<p>Vegan Wayfarers seitan salvia lomo mustache., Thundercats wolf tumblr banh mi Pitchfork., Quinoa viral cardigan irony cred Pitchfork +1 lomo skateboard.</p>
				</div>
				<div class="[ col-xs-12 ]">
					<span class="[ glyphicon glyphicon-search ]" aria-hidden="true"></span>
					<h3>Lighting-Fast Delivery</h3>
					<p>Vegan Wayfarers seitan salvia lomo mustache., Thundercats wolf tumblr banh mi Pitchfork., Quinoa viral cardigan irony cred Pitchfork +1 lomo skateboard.</p>
				</div>
			</div>
		</div>

		<hr>
	<?php endif; ?>

	<section class="[ menu-hoy ]">
		<div class="[ container-fluid ]">
			<div class="[ row ]">
				<h2 class="[ text-center ]">Menú de hoy</h2>
				<div class="[ col-xs-12 ]">
					<img class="[ img-responsive ]" src="https://d16cs9nbg8x6iq.cloudfront.net/p/?url=https%3A%2F%2Fd16cs9nbg8x6iq.cloudfront.net%2Fi%2F76bab6ddab14f463d8eece8194d776ea%2Fjpeg&q=75&w=800&h=500&opt=1&fmt=webp" alt="">
				</div>
				<div class="[ col-xs-8 ]">
					<h3>Nombre del platillo largo en 2 líneas asdasdga ads adsf </h3>
					<p>platillo principal, guarnición 1 y guarnición 2</p>
				</div>
				<div class="[ col-xs-4 ]">
					<a class="[ btn btn-default ]" href="#">agregar</a>
				</div>
			</div>
		</div>
	</section>




<?php get_footer(); ?>