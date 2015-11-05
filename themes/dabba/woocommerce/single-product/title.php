<?php
/**
 * Single Product title
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Variables
global $post;
$platillo_principal = get_post_meta($post->ID, '_platillo_principal_meta', true);
$guarnicion_1 = get_post_meta($post->ID, '_guarnicion_1_meta', true);
$guarnicion_2 = get_post_meta($post->ID, '_guarnicion_2_meta', true);
$contenido_platillo = format_contenido_platillo( $platillo_principal, $guarnicion_1, $guarnicion_2 );

?>
<h1 itemprop="name" class="[ h2 ][ no-margin ][ product_title entry-title ][ text-center ]"><?php the_title(); ?></h1>
<p class="[ text-center ]"><?php echo $contenido_platillo; ?></p>