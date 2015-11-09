<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices(); ?>

<div class="[ container ]">

	<h2 class="[ text-center ][ margin-top-bottom ]">Mi cuenta</h2>

	<?php do_action( 'woocommerce_before_my_account' ); ?>

	<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

	<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

	<h3 class="[ text-left ][ margin-bottom--large ]">
		<a class="[ color-dark ]" role="button" data-toggle="collapse" href="#ordenesProgramadas" aria-expanded="false" aria-controls="collapseExample">
			Ordenes programadas
		</a>
	</h3>

	<hr class="[ divider-primary ][ margin-bottom-large ]">

	<?php wc_get_template( 'myaccount/my-address.php' ); ?>

	<hr class="[ divider-primary ][ margin-bottom-large ]">

	<div class="[ myaccount_user ][ margin-top-bottom--large ][ text-center ]">
		<?php
			printf( __( '<a class="[ color-primary ][ btn btn-primary btn-hollow ][ margin-sides--small ]" href="%s">editar detalles</a>', 'woocommerce' ),
				wc_customer_edit_account_url()
			);

			printf(
				__( '<a class="[ color-primary ][ btn btn-primary btn-hollow ][ margin-sides--small ]" href="%2$s">Sign out</a>', 'woocommerce' ) . ' ',
				$current_user->display_name,
				wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) )
			);
		?>
	</div>

	<?php do_action( 'woocommerce_after_my_account' ); ?>

</div>