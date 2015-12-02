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

//wc_print_notices(); ?>

<div class="[ container ]">

	<h2 class="[ text-center ][ margin-top-bottom ]">Mi cuenta</h2>

	<div class="[ row ]">

		<div class="[ col-xs-12 col-sm-6 ]">
			<section class="[ margin-bottom--large ]">
				<h3 class="[ text-left ][ margin-bottom ]">Información personal</h3>
				<p>Nombre: <strong><?php echo get_first_name() ?></strong></p>
				<p>Apellido: <strong><?php echo get_last_name() ?></strong></p>
				<p>Correo: <strong><?php echo get_email() ?></strong></p>

				<div class="[ text-left ][ margin-top ]">
					<?php
					printf( __( '<a class="[ color-primary ][ btn btn-primary btn-hollow btn-sm ][ inline-block ]" href="%s">editar detalles</a>', 'woocommerce' ),
						wc_customer_edit_account_url()
					);
					?>
				</div>
			</section>

			<?php wc_get_template( 'myaccount/my-address.php' ); ?>

		</div>

		<div class="[ col-xs-12 col-sm-6 ]">
			<?php do_action( 'woocommerce_before_my_account' ); ?>

			<?php wc_get_template( 'myaccount/my-programmed-orders.php' ); ?>

			<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>
		</div>

	</div>

	<?php  do_action( 'woocommerce_after_my_account' ); ?>

	<div class="[ margin-bottom--large ]">
		<?php
		printf(
			__( '<a class="[ color-primary ][ btn btn-primary btn-hollow btn-sm ][ margin-sides--small ]" href="%2$s">Sign out</a>', 'woocommerce' ) . ' ',
			$current_user->display_name,
			wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) )
		);
		?>
	</div>

</div>