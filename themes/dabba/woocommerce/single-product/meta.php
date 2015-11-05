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

?>
<section class="[ product_meta ][ text-center ]">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

	<article class="[ margin-bottom-large ]">
		<span class="[ inline-block align-middle ][ margin-sides--small ]">
			<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-dark ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/fish.svg">
			<p><small>pescado</small></p>
		</span>
		<span class="[ inline-block align-middle ][ margin-sides--small ]">
			<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-dark ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/steak.svg">
			<p><small>cerdo</small></p>
		</span>
		<span class="[ inline-block align-middle ][ margin-sides--small ]">
			<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-dark ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/steak.svg">
			<p><small>res</small></p>
		</span>
		<span class="[ inline-block align-middle ][ margin-sides--small ]">
			<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-dark ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/chicken.svg">
			<p><small>pollo</small></p>
		</span>
		<span class="[ inline-block align-middle ][ margin-sides--small ]">
			<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-dark ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/temperature-low.svg">
			<p><small>frio</small></p>
		</span>
		<span class="[ inline-block align-middle ][ margin-sides--small ]">
			<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-dark ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/temperature-high.svg">
			<p><small>caliente</small></p>
		</span>
		<span class="[ inline-block align-middle ][ margin-sides--small ]">
			<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-dark ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/chilly.svg">
			<p><small>picante</small></p>
		</span>
		<span class="[ inline-block align-middle ][ margin-sides--small ]">
			<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-dark ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/grape.svg">
			<p><small>vegetariano</small></p>
		</span>
		<span class="[ inline-block align-middle ][ margin-sides--small ]">
			<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-dark ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/vegan.svg">
			<p><small>vegano</small></p>
		</span>

	</article>
	<hr class="[ divider-primary ][ margin-bottom-large ]">
	<article>
		<h3>Ingredientes</h3>
		<p>
			<span class="margin-sides--small">Mixed Greens</span>
			-
			<span class="margin-sides--small">Chili Powder</span>
			-
			<span class="margin-sides--small">Chili Powder</span>
			-
			<span class="margin-sides--small">Chili Powder</span>
			-
			<span class="margin-sides--small">Chili Powder</span>
			-
			<span class="margin-sides--small">Chili Powder</span>
			-
			<span class="margin-sides--small">Chili Powder</span>
		</p>
	</article>
	<article>
		<h3>Información nutrimental</h3>
		<div class="[ row ]">
			<p class="[ col-xs-6 ]">
				<strong>Porción</strong><br />
				325gr
			</p>
			<p class="[ col-xs-6 ]">
				<strong>Proteína</strong><br />
				32.22gr
			</p>
			<p class="[ col-xs-6 ]">
				<strong>Calorías</strong><br />
				752.76kcal
			</p>
			<p class="[ col-xs-6 ]">
				<strong>Fibra dietética</strong><br />
				5.58gr
			</p>
		</div>
	</article>

</section>
