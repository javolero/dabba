<?php
/**
 * Empty cart page
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

?>

<div class="[ container ][ margin-top margin-bottom--large ][ text-center ]">
	<p class="[ cart-empty ]"><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>
	<?php do_action( 'woocommerce_cart_is_empty' ); ?>
	<a class="[ btn btn-primary btn-hollow ]" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php _e( 'Return To Shop', 'woocommerce' ) ?></a>
</div>

<hr class="[ divider-primary ][ margin-bottom-large ]">