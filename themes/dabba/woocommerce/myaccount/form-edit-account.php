<?php
/**
 * Edit account form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="[ container ][ margin-top ]">

	<h3 class="[ text-center ][ margin-top margin-bottom--large ]">Editar mi información</h3>

	<?php //wc_print_notices(); ?>

	<form action="" method="post">

		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

		<div class="[ row ]">
			<p class="[ col-xs-6 ]">
				<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="[ form-control ][ col-xs-12 ]" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
			</p>
			<p class="[ col-xs-6 ]">
				<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="[ form-control ][ col-xs-12 ]" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
			</p>
		</div>

		<div class="[ row ]">
			<p class="[ col-xs-12 ]">
				<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="input-text [ form-control ][ col-xs-12 ]" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
			</p>
		</div>

		<fieldset>
			<div class="[ row ]">
				<p class="[ col-xs-12 ]">
					<label for="password_current"><?php _e( 'Current Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
					<input type="password" class="input-text [ form-control ][ col-xs-12 ]" name="password_current" id="password_current" />
				</p>
			</div>
			<div class="[ row ]">
				<p class="[ col-xs-12 ]">
					<label for="password_1"><?php _e( 'New Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
					<input type="password" class="input-text [ form-control ][ col-xs-12 ]" name="password_1" id="password_1" />
				</p>
			</div>
			<div class="[ row ]">
				<p class="[ col-xs-12 ]">
					<label for="password_2"><?php _e( 'Confirm New Password', 'woocommerce' ); ?></label>
					<input type="password" class="input-text [ form-control ][ col-xs-12 ]" name="password_2" id="password_2" />
				</p>
			</div>
		</fieldset>
		<div class="clear"></div>

		<?php do_action( 'woocommerce_edit_account_form' ); ?>

		<p class="[ text-center ]">
			<?php wp_nonce_field( 'save_account_details' ); ?>
			<input type="submit" class="[ button ][ btn btn-primary btn-hollow ]" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
			<input type="hidden" name="action" value="save_account_details" />
		</p>

		<?php do_action( 'woocommerce_edit_account_form_end' ); ?>

	</form>

</div>