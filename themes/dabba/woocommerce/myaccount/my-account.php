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

	<?php do_action( 'woocommerce_before_my_account' ); ?>

	<h2 class="[ text-center ][ margin-top-bottom ]">Mi cuenta</h2>

	<section class="[ margin-bottom--large ]">
		<h3 class="[ text-left ][ margin-bottom ]">Información personal</h3>
		<p>Nombre: <strong>Micho</strong></p>
		<p>Apellido: <strong>Chompers</strong></p>

		<div class="[ text-left ][ margin-top ]">
			<?php
			printf( __( '<a class="[ color-primary ][ btn btn-primary btn-hollow btn-sm ][ inline-block ]" href="%s">editar detalles</a>', 'woocommerce' ),
				wc_customer_edit_account_url()
			);
			?>
		</div>
	</section>

	<hr class="[ divider-primary ]">

	<?php wc_get_template( 'myaccount/my-address.php' ); ?>

	<hr class="[ divider-primary ]">

	<h3 class="[ text-left ][ margin-bottom--large ]">
		<a class="[ color-dark ]" role="button" data-toggle="collapse" href="#ordenesProgramadas" aria-expanded="false" aria-controls="collapseExample">
			Ordenes programadas
		</a>
	</h3>

	<hr class="[ divider-primary ]">

	<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

	<hr class="[ divider-primary ]">

	<div class="[ myaccount_user ][ margin-top-bottom--large ][ text-center ]">
		<?php

			printf(
				__( '<a class="[ color-primary ][ btn btn-primary btn-hollow ][ margin-sides--small ]" href="%2$s">Sign out</a>', 'woocommerce' ) . ' ',
				$current_user->display_name,
				wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) )
			);
		?>
	</div>

	<?php /* wc_get_template( 'myaccount/my-downloads.php' );  */ ?>

	<?php do_action( 'woocommerce_after_my_account' ); ?>

</div>