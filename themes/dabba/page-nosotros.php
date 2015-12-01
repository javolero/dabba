<?php
	get_header();
	the_post();
?>
	<div class="[ container ]">

		<h1 class="[ text-center ][ margin-top-bottom ]">Dabba</h1>

		<div class="[ bg-image bg-image--16-9 bg-image--3-1--sm ][ margin-bottom ]" style="background-image: url('<?php echo THEMEPATH; ?>images/nosotros.jpg')" ></div>

		<div class="[ block ][ col-xs-12 col-sm-8 col-md-6 col-centered ]">
			<?php the_content( ); ?>
		</div>
	</div>

<?php get_footer(); ?>