<?php
/**
 * Cart Page
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

 wc_print_notices(); ?>

	<h2 class="[ text-center ][ margin-top-bottom--large ]">Checkout</h2>

	<div class="[ container ][ shop_table cart ]">
		<div class="[ row ]">
			<div class="[ col-xs-12 col-md-8 ]">
				<form class="[ margin-bottom--large ]" action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

					<?php do_action( 'woocommerce_before_cart_table' ); ?>

					<?php
					do_action( 'woocommerce_before_cart_contents' );

					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product 		= apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id 	= apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
						$themepath 		= get_template_directory_uri();
						$permalink 		= $_product->get_permalink( $cart_item );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							?>
							<section class="[ margin-bottom ] <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

								<div class="[ hidden-xs ]">

									<?php
										//$thumbnail 	= apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
										$image 	= wp_get_attachment_image_src( get_post_thumbnail_id($product_id), 'shop_single' );

										if ( $image ) {
											echo "<a class='[ bg-image bg-image--3-1 ][ product-thumbnail ][ col-xs-12 ][ margin-bottom ]' href='$permalink' style='background-image: url($image[0])' ></a>";
										}
									?>

								</div><!-- row -->
								<div class="[ row ][ margin-bottom--small ]">

									<article class="[ product-name ][ col-xs-6 ]">
										<?php
											if ( ! $_product->is_visible() ) {
												echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
											} else {
												echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<p class="[ %s ][ no-margin ]">%s </p>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
											}

											// Meta data
											echo WC()->cart->get_item_data( $cart_item );

											// Backorder notification
											if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
												echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
											}
										?>
									</article>

									<article class="[ product-price ][ col-xs-4 ][ text-right ]">
										<p class="[ no-margin ]">
											<?php
												echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
											?>
										</p>
									</article>

									<article class="[ product-remove ][ col-xs-2 ]">
										<?php
											echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
												'<a href="%s" class="[ color-danger ][ pull-right ]" title="%s" data-product_id="%s" data-product_sku="%s"><img class="[ svg ][ icon icon--iconed icon--iconed--micro icon--stroke icon--thickness-2 ][ color-danger ][ no-margin ]" src="'.$themepath.'/icons/bin.svg"></a>',
												esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
												__( 'Remove this item', 'woocommerce' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() )
											), $cart_item_key );
										?>
									</article>

								</div>

								<div class="[ row ]">

									<article class="[ product-quantity ][ col-xs-3 ]">
										<p class="[ no-margin ]"><small>cantidad</small></p>
									</article>

									<article class="[ product-quantity ][ col-xs-3 ]">
										<?php
											if ( $_product->is_sold_individually() ) {
												$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
											} else {
												$product_quantity = woocommerce_quantity_input( array(
													'input_name'  => "cart[{$cart_item_key}][qty]",
													'input_value' => $cart_item['quantity'],
													'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
													'min_value'   => '0'
												), $_product, false );
											}

											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
										?>
									</article>

									<article class="[ product-subtotal ][ col-xs-4 ][ text-right ]">
										<p class="[ no-margin ][ color-primary text-semibold ]">
											<?php
												echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
											?>
										</p>
									</article>
								</div>
							</section>
							<?php
						}
					} ?>


					<?php do_action( 'woocommerce_cart_contents' ); ?>

					<div class="[ actions ][ coupon ][ padding--top-bottom margin-bottom ][ bg-gradient ][ color-light ][ row ]">

						<?php if ( WC()->cart->coupons_enabled() ) { ?>
								<!-- <label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> -->
								<div class="[ col-xs-8 ][ pull-none  ][ inline-block align-middle ]">
									<input type="text" name="coupon_code" class="[ input-text ][ form-control form-control-bg ][ col-xs-12 ]" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
								</div><div
								class="[ col-xs-4 ][ pull-none  ][ inline-block align-middle ][ text-right ]">
									<input type="submit" class="[ btn btn-light btn-hollow btn-sm ]" name="apply_coupon" value="aplicar" />
								</div>

								<?php do_action( 'woocommerce_cart_coupon' ); ?>
						<?php } ?>

						<?php do_action( 'woocommerce_cart_actions' ); ?>

						<?php wp_nonce_field( 'woocommerce-cart' ); ?>
					</div>

					<div class="[ text-center ][ margin-bottom ]">
						<input type="submit" class="[ btn btn-primary btn-hollow btn-sm ]" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>" />
					</div>

					<?php do_action( 'woocommerce_after_cart_contents' ); ?>

					<?php do_action( 'woocommerce_after_cart_table' ); ?>

				</form>
			</div>
		</div>
	</div>

	<div class="cart-collaterals">
		<?php //do_action( 'woocommerce_cart_collaterals' ); ?>
	</div>

</section>

<hr class="[ divider-primary ][ margin-bottom-large ]">