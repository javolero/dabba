<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( $order ) : ?>

	<div class="[ container ]">

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

			<p><?php
				if ( is_user_logged_in() )
					_e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
				else
					_e( 'Please attempt your purchase again.', 'woocommerce' );
			?></p>

			<p>
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<h3 class="[ text-center ]">¡Gracias por tu compra! <br />Tu pedido ha sido recibido.</h3>

			<table class="shop_table order_details">
				<tbody>
					<tr>
						<th class="product-name"><?php _e( 'Order Number:', 'woocommerce' ); ?></th>
						<th class="product-total"><?php echo $order->get_order_number(); ?></th>
					</tr>
					<tr>
						<th class="product-name"><?php _e( 'Date:', 'woocommerce' ); ?></th>
						<th class="product-total"><strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong></th>
					</tr>
					<tr>
						<th class="product-name"><?php _e( 'Total:', 'woocommerce' ); ?></th>
						<th class="product-total"><strong><?php echo $order->get_formatted_order_total(); ?></strong></th>
					</tr>
					<tr>
						<th class="product-name"><?php _e( 'Payment Method:', 'woocommerce' ); ?></th>
						<th class="product-total"><strong><?php echo $order->payment_method_title; ?></strong></th>
					</tr>
				</tbody>
			</table>

			<?php endif; ?>
			<div class="[ clear ]"></div>

		<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->id ); ?>

	<?php else : ?>

		<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	<?php endif; ?>
</div>