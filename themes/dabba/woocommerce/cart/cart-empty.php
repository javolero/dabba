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
	<a class="[ btn btn-primary btn-hollow ]" href="<?php echo site_url() ?>">Ver platillos</a>
</div>

<hr class="[ divider-primary ][ margin-bottom-large ]">

