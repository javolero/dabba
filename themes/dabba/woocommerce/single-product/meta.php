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
	<article class="[ margin-bottom-large ][ caracteristicas ][ container ]">
		<div class="[ block ][ col-xs-12 col-sm-8 col-md-6 col-centered ][ text-center ]">
			<?php foreach ( $caracteristicas_platillo as $caracteristica ) : ?>
				<span class="[ inline-block align-middle ][ margin-sides--small ]">
					<img class="[ svg ][ icon icon--iconed icon--stroke icon--thickness-1-4 ][ color-dark ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/<?php echo $caracteristica->slug ?>.svg">
					<p><small><?php echo $caracteristica->name ?></small></p>
				</span>
			<?php endforeach; ?>
		</div>
	</article>
<?php endif; ?>

<?php if ( ! empty( $ingredientes[0] ) ) : ?>
	<article class="[ text-center ][ margin-bottom-large ][ container ]">
		<h3>Ingredientes</h3>
		<div class="[ block ][ col-xs-12 col-sm-8 col-md-6 col-centered ][ text-center ]">
			<p>
			<?php foreach ( $ingredientes as $key => $ingrediente ) : ?>
				<?php if( 0 !== $key ) echo '-'; ?>
				<span class="margin-sides--small"><?php echo $ingrediente ?></span>
			<?php endforeach; ?>
			</p>
		</div>
	</article>
<?php endif; ?>

<?php $content =  get_the_content(); ?>
<?php  if ( ! empty( $content ) ) :  ?>
	<section class="[ descripcion ][ bg-gradient ][ color-light ][ padding--top-bottom--large ][ margin-bottom--large ]">
		<div class="[ container ][ text-center ]">
			<div class="[ col-xs-12 col-sm-8 col-md-6 col-centered ]">
				<p class="[ no-margin ][ text-left ]"><?php echo get_the_content() ?></p>
			</div>
		</div>
	</section>
<?php endif; ?>


<?php  if ( ! empty( $porcion ) || ! empty( $proteina ) || ! empty( $calorias ) || ! empty( $fibra_dietetica ) ) :  ?>
	<section class="[ margin-bottom--large ]">
		<div class="[ container ]">
			<h3 class="[ text-center ]">Información nutrimental</h3>
			<div class="[ block ][ col-xs-12 col-sm-8 col-md-6 col-centered ][ text-center ]">
				<div class="[ row ]">

					<?php  if ( ! empty( $porcion ) ) :  ?>
						<p class="[ col-xs-6 ]">
							<strong>Porción</strong><br />
							<?php echo $porcion ?>
						</p>
					<?php endif; ?>

					<?php  if ( ! empty( $proteina ) ) :  ?>
						<p class="[ col-xs-6 ]">
							<strong>Proteína</strong><br />
							<?php echo $proteina ?>
						</p>
					<?php endif; ?>

					<?php  if ( ! empty( $calorias ) ) :  ?>
						<p class="[ col-xs-6 ]">
							<strong>Calorías</strong><br />
							<?php echo $calorias ?>
						</p>
					<?php endif; ?>

					<?php  if ( ! empty( $fibra_dietetica ) ) :  ?>
						<p class="[ col-xs-6 ]">
							<strong>Fibra dietética</strong><br />
							<?php echo $fibra_dietetica ?>
						</p>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</section>
<?php endif; ?>