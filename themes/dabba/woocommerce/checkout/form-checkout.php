<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//wc_print_notices();

?>

<div class="[ container ]">
	<div class="[ row ]">
		<section class="[ col-xs-12 col-md-7 ]">

			<article class="[ margin-bottom--large ]">
				<?php get_template_part( 'templates/menu', 'aguas' ); ?>
			</article>

			<?php
			do_action( 'woocommerce_before_checkout_form', $checkout );

			// If checkout registration is disabled and not logged in, the user cannot checkout
			if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
				echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
				return;
			}

			// filter hook for include new pages inside the payment method
			$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

			<form name="checkout" method="post" class="[ checkout woocommerce-checkout ]" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">

				<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

					<article class="[ margin-bottom--large ]">
						<div class="[ row ]" id="customer_details">
							<div class="[ col-xs-12 ]">
								<?php do_action( 'woocommerce_checkout_billing' ); ?>
							</div>

							<div class="[ col-xs-12 ]">
								<?php do_action( 'woocommerce_checkout_shipping' ); ?>
							</div>
						</div>
					</article>

					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

				<?php endif; ?>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

			</form>

			<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

		</section>
		<section class="[ col-xs-12 col-md-5 ][ bg-gradient ][ color-light ][ padding--top-bottom--large margin-bottom--large ][ order_review ]">
			<h3 class="[ text-center ]" id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
			<div id="order_review" class="[ woocommerce-checkout-review-order ]">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
		</section>
	</div>
</div>