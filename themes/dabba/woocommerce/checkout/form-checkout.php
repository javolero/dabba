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

wc_print_notices();

?>


<section>

	<article class="[ margin-bottom--large ][ container ]">
		<h3 class="[ text-center ]">Bebidas</h3>
		<div class="[ aguas ][ text-center ]">
			<?php get_template_part( 'templates/menu', 'aguas' ); ?>
		</div>
	</article>
	<!-- <article class="[ margin-bottom--large ]">
		<h3 class="[ text-center ]">Postres</h3>
		<div class="[ postres ][ text-center ]">
			<?php /* get_template_part( 'templates/menu', 'postre' ); */ ?>
		</div>
	</article> -->
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

		<article class="[ container ][ margin-bottom--large ]">
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

	<article class="[ bg-gradient ][ color-light ][ padding--top-bottom--large ]">
		<div class="[ container ]">
			<h3 class="[ text-center ]" id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
			<div id="order_review" class="[ woocommerce-checkout-review-order ]">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
		</div>
	</article>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

</section>