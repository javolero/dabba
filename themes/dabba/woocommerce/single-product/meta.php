<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
$caracteristicas_platillo = get_the_terms( $post->ID, 'caracteristica-platillo' );
$ingredientes = get_ingredientes( $post->ID );
$porcion = get_post_meta( $post->ID, '_porcion_meta', true );
$proteina = get_post_meta( $post->ID, '_proteina_meta', true );
$calorias = get_post_meta( $post->ID, '_calorias_meta', true );
$fibra_dietetica = get_post_meta( $post->ID, '_fibra_dietetica_meta', true );

?>



<?php if ( ! empty( $caracteristicas_platillo ) ) : ?>
	<article class="[ margin-bottom-large ][ caracteristicas ][ text-center ][ container ]">
		<?php foreach ( $caracteristicas_platillo as $caracteristica ) : ?>
			<span class="[ inline-block align-middle ][ margin-sides--small ]">
				<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-dark ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/<?php echo $caracteristica->slug ?>.svg">
				<p><small><?php echo $caracteristica->name ?></small></p>
			</span>
		<?php endforeach; ?>
	</article>
	<hr class="[ divider-primary ][ margin-bottom-large ]">
<?php endif; ?>

<article class="[ text-center ][ margin-bottom-large ]">
	<h3>Ingredientes</h3>
	<p>
	<?php foreach ( $ingredientes as $key => $ingrediente ) : ?>
		<?php if( 0 !== $key ) echo '-'; ?>
		<span class="margin-sides--small"><?php echo $ingrediente ?></span>
	<?php endforeach; ?>
	</p>
</article>

<section class="[ descripcion ][ bg-gradient ][ padding--top-bottom--xlarge ][ margin-bottom--large ][ color-light ]">
	<div class="[ container ]">
		<h3 class="[ text-center ][ margin-bottom--large ]">Descripción</h3>
		<p class="[ color-light ][ no-margin ]">We take thick-cut clusters of mealty hen of the woods mushrooms and bake them until they just start to crisp and caramelize. We serve it over crushed red potatoes and top it with a rich leek sauce with hand-diced leeks, white wine, and a touch of cream. It's complemented with charred broccoli and roasted baby turnips.</p>
	</div>
</section>

<section class="[ margin-bottom--large ]">
	<div class="[ container ]">
		<h3 class="[ text-center ]">Información nutrimental</h3>
		<div class="[ row ]">
			<p class="[ col-xs-6 ]">
				<strong>Porción</strong><br />
				<?php echo $porcion ?>
			</p>
			<p class="[ col-xs-6 ]">
				<strong>Proteína</strong><br />
				<?php echo $proteina ?>
			</p>
			<p class="[ col-xs-6 ]">
				<strong>Calorías</strong><br />
				<?php echo $calorias ?>
			</p>
			<p class="[ col-xs-6 ]">
				<strong>Fibra dietética</strong><br />
				<?php echo $fibra_dietetica ?>
			</p>
		</div>
	</div>
</section>