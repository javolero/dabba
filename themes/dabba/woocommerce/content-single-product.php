<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Variables
$fecha_menu = get_fecha_es( get_post_meta($post->ID, '_fecha_menu_meta', true) );
?>

<?php

	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<section class="[ single-product ]">

	<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>
		<p class="[ bg-primary ][ padding--sides padding--top-bottom--small ][ text-center ][ color-light ]"><?php echo $fecha_menu ?></p>

		<section class="[ summary entry-summary ]">
			<?php do_action( 'woocommerce_single_product_summary' ); ?>
		</section><!-- .summary -->

		<?php
			/**
			 * woocommerce_after_single_product_summary hook
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>

		<meta itemprop="url" content="<?php the_permalink(); ?>" />

	</div><!-- #product-<?php the_ID(); ?> -->
	<?php do_action( 'woocommerce_after_single_product' ); ?>

</section>