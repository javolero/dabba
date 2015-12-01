<?php
	global $post;
	get_header();
	the_post();
?>

	<div class="[ container ]">

		<h1 class="[ text-center ][ margin-top-bottom ]"><?php echo get_the_title() ?></h1>

		<div class="[ bg-image bg-image--16-9 bg-image--3-1--sm ][ margin-bottom ]" style="background-image: url('<?php echo THEMEPATH; ?>images/para-reuniones.jpg')" ></div>

		<div class="[ row ][ margin-bottom ]">
			<div class="[ col-xs-12 col-sm-8 col-md-6 ]">
				<?php the_content( ); ?>
			</div>
			<div class="[ col-xs-12 col-sm-8 col-md-6 ]">
				<form action="" data-parsley-validate-reuniones>
					<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
						<label for="nombre-y-apellido">Nombre y apellido<span class="required">*</span></label>
						<input type="text" class="[ form-control ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="nombre-y-apellido" value="" required data-parsley-error-message="Por favor ingresa tu nombre y apellido">
					</p>
					<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
						<label for="email">Email<span class="required">*</span></label>
						<input type="email" class="[ form-control ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="email" value="" data-parsley-type="email" required data-parsley-error-message="Por favor ingresa un correo electrónico válido.">
					</p>
					<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
						<label for="email">Número de comensales estimado<span class="required">*</span></label>
						<input type="number" class="[ form-control ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="comensales" value="" data-parsley-type="number" required data-parsley-error-message="Por favor ingresa el número de comensales.">
					</p>
					<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
						<label for="fecha">Fecha estimada<span class="required">*</span></label>
						<input type="text" class="[ form-control ][ margin-bottom--small ][ input-text ][ col-xs-12 ]" name="fecha" value="" required data-parsley-error-message="Por favor ingresa la fecha apróximada del evento">
					</p>
					<p class="[ margin-bottom--xsmall no-padding ][ text-left ][ col-xs-12 ]">
						<label for="comentarios">Comentarios adicionales<span class="required">*</span></label>
						<textarea cols="30" rows="5" name="comentarios" id="" class="[ form-control ][ margin-bottom--small ][ input-text ][ col-xs-12 ]"></textarea>
					</p>
					<div class="[ text-center ]">
						<button class="[ button ][ btn btn-sm btn-hollow btn-primary ]" type="submit">Enviar</button>
					</div>
				</form>
			</div>
		</div>


	</div>
<?php get_footer() ?>