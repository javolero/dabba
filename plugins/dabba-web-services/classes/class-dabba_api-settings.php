<?php

class DABBA_API_Settings {

	private static $instance = null;

	/**
	 * Get singleton instance of class
	 *
	 * @return null|WPSWS_Settings
	 */
	public static function get() {

		if ( self::$instance == null ) {
			self::$instance = new self();
		}

		return self::$instance;

	}

	/**
	 * Constructor
	 */
	private function __construct() {
		$this->hooks();
	}

	/**
	 * Hooks
	 */
	private function hooks() {
		add_action( 'admin_menu', array( $this, 'add_menu_pages' ) );
		//add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		//add_action( 'wp_ajax_wpw_save_settings', array( $this, 'save_settings' ) );
	}

	/**
	 * Add menu pages
	 */
	public function add_menu_pages() {
		add_menu_page( 'Overview', 'Web Services', 'manage_options', 'wpw', array( $this, 'screen_main' ) );
	}

	/**
	 * The main screen
	 */
	public function screen_main() {
		?>



<?php if( !defined('DABBA_API_AUTH_KEY') ): ?>

	<h2>Debes definir 'DABBA_API_AUTH_KEY' desde wp-config.php</h2>


	Ej: define('DABBA_API_AUTH_KEY', '62c7T5ljHphf83abXs0o2zDDO687P6DF');

<?php else: ?>
		

<h2>Login</h2>
Url: <code><?php bloginfo('url'); ?>/api/login</code><br/><br/>
<form action="<?php bloginfo('url'); ?>/api/login" method="post" target="_blank">



<label for="auth_key">auth_key [post]</label>
<input type="text" name="auth_key" id="auth_key" value="<?php echo DABBA_API_AUTH_KEY; ?>"/><br/>

<label for="type">type [post]</label>
<select name="type" id="type">
	<option value="site">site</option>
	<option value="facebook">facebook</option>
	<option value="google">google</option>
</select><br/>


<label for="user_login">user_login [post]</label>
<input type="text" name="user_login" id="user_login" value=""/><br/>

<label for="user_password">user_password [post] - optional</label>
<input type="text" name="user_password" id="user_password" value=""/><br/>


<label for="facebook_uid">facebook_uid [post] - optional</label>
<input type="text" name="facebook_uid" id="facebook_uid" value=""/><br/>

<label for="google_uid">google_uid [post] - optional</label>
<input type="text" name="google_uid" id="google_uid" value=""/><br/>


<input type="submit" value="Enviar"/>



</form>


<h2>Zones</h2>
Url: <code><?php bloginfo('url'); ?>/api/get_zones</code><br/><br/>
<form action="<?php bloginfo('url'); ?>/api/get_zones" method="post" target="_blank">



<label for="auth_key">auth_key [post]</label>
<input type="text" name="auth_key" id="auth_key" value="<?php echo DABBA_API_AUTH_KEY; ?>"/><br/>

<input type="submit" value="Enviar"/>



</form>


<h2>Register</h2>
Url: <code><?php bloginfo('url'); ?>/api/register</code><br/><br/>
<form action="<?php bloginfo('url'); ?>/api/register" method="post" target="_blank">



<label for="auth_key">auth_key [post]</label>
<input type="text" name="auth_key" id="auth_key" value="<?php echo DABBA_API_AUTH_KEY; ?>"/><br/>


<label for="type">type [post]</label>
<select name="type" id="type">
	<option value="site">site</option>
	<option value="facebook">facebook</option>
	<option value="google">google</option>
</select><br/>


<label for="user_email">user_email [post]</label>
<input type="text" name="user_email" id="user_email" value=""/><br/>



<label for="user_password">user_password [post] - optional</label>
<input type="text" name="user_password" id="user_password" value=""/><br/>


<label for="facebook_uid">facebook_uid [post] - optional</label>
<input type="text" name="facebook_uid" id="facebook_uid" value=""/><br/>

<label for="google_uid">google_uid [post] - optional</label>
<input type="text" name="google_uid" id="google_uid" value=""/><br/>


<input type="submit" value="Enviar"/>

</form>



<h2>Today Menu</h2>
Url: <code><?php bloginfo('url'); ?>/api/today_menu</code><br/><br/>
<form action="<?php bloginfo('url'); ?>/api/today_menu" method="post" target="_blank">



<label for="auth_key">auth_key [post]</label>
<input type="text" name="auth_key" id="auth_key" value="<?php echo DABBA_API_AUTH_KEY; ?>"/><br/>


<input type="submit" value="Enviar"/>

</form>



<h2>Weekend Menu</h2>
Url: <code><?php bloginfo('url'); ?>/api/weekend_menu</code><br/><br/>
<form action="<?php bloginfo('url'); ?>/api/weekend_menu" method="post" target="_blank">



<label for="auth_key">auth_key [post]</label>
<input type="text" name="auth_key" id="auth_key" value="<?php echo DABBA_API_AUTH_KEY; ?>"/><br/>


<input type="submit" value="Enviar"/>

</form>



<?php endif; ?>



	<?php
	}

}