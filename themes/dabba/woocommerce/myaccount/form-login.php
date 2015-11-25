<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php // echo do_shortcode('[woocommerce_social_login_buttons return_url="' . site_url() . '"]'); ?>
<div class="[ container ]">

	<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

		<div class="[ row ]" id="customer_login">

			<div class="[ col-xs-12 col-sm-6 ][ margin-top-bottom  ]">

	<?php endif; ?>

				<h2 class="[ text-center ]"><?php _e( 'Login', 'woocommerce' ); ?></h2>

				<form method="post" class="[ login ]">

					<?php do_action( 'woocommerce_login_form_start' ); ?>

					<p class="[ margin-bottom--small no-padding ][ text-left ][ col-xs-12 ]">
						<label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="text" class="[ input-text ][ col-xs-12 ][ form-control ]" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
					</p>
					<p class="[ margin-bottom--small no-padding ][ text-left ][ col-xs-12 ]">
						<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input class="[ input-text ][ col-xs-12 ][ form-control ]" type="password" name="password" id="password" />
					</p>

					<?php do_action( 'woocommerce_login_form' ); ?>

					<p class="[ ]">
						<?php wp_nonce_field( 'woocommerce-login' ); ?>
						<input type="submit" class="[ button btn btn-primary btn-hollow btn-sm ][ margin-right ]" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
						<label for="rememberme" class="[ inline ]">
							<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
						</label>
					</p>
					<p class="[ lost_password ]">
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
					</p>

					<?php do_action( 'woocommerce_login_form_end' ); ?>

				</form>

		<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

			</div>

			<div class="[ col-xs-12 col-sm-6 ][ margin-top-bottom ]">

				<h2 class="[ text-center ]"><?php _e( 'Register', 'woocommerce' ); ?></h2>

				<form method="post" class="register">

					<?php do_action( 'woocommerce_register_form_start' ); ?>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

						<p class="[ margin-bottom--small no-padding ][ text-left ][ col-xs-12 ]">
							<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
							<input type="text" class="[ input-text ][ col-xs-12 ][ form-control ]" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
						</p>

					<?php endif; ?>

					<p class="[ margin-bottom--small no-padding ][ text-left ][ col-xs-12 ]">
						<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="email" class="[ input-text ][ col-xs-12 ][ form-control ]" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
					</p>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

						<p class="[ margin-bottom--small no-padding ][ text-left ][ col-xs-12 ]">
							<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
							<input type="password" class="[ input-text ][ col-xs-12 ][ form-control ]" name="password" id="reg_password" />
						</p>

					<?php endif; ?>

					<!-- Spam Trap -->
					<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

					<?php do_action( 'woocommerce_register_form' ); ?>
					<?php do_action( 'register_form' ); ?>

					<p class="form-row">
						<?php wp_nonce_field( 'woocommerce-register' ); ?>
						<input type="submit" class="[ button btn btn-primary btn-hollow btn-sm ]" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
					</p>

					<?php do_action( 'woocommerce_register_form_end' ); ?>

				</form>

			</div>

		</div>
		<?php endif; ?>

</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
