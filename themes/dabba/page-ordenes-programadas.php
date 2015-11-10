<?php

get_header();

$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
	'numberposts' => $order_count,
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => wc_get_order_types( 'view-orders' ),
	'post_status' => array( 'wc-completed', 'wc-processing' )
) ) );

if ( $customer_orders ) : 

	$ordenes_programadas = array();
	foreach ( $customer_orders as $customer_order ) :
		$order = wc_get_order( $customer_order );
		$order_items = $order->get_items();
		foreach ( $order_items as $item ) :

			$fecha_menu = get_post_meta( $item['product_id'], '_fecha_menu_meta', true );
			if( '' === $fecha_menu || date( 'Y-m-d'  ) >= $fecha_menu ) continue;

			$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $item['product_id'] ), 'single_product_large_thumbnail_size' );
			$guarnicion_1 = get_post_meta( $item['product_id'], '_guarnicion_1_meta', true );
			$guarnicion_2 = get_post_meta( $item['product_id'], '_guarnicion_2_meta', true );

			$ordenes_programadas[$fecha_menu] = array(
				'id'				=> $item['product_id'],
				'nombre'			=> $item['name'],
				'image_url'			=> $image_url[0],
				'info_adicional'	=> format_contenido_platillo( $guarnicion_1, $guarnicion_2 )
				);
		endforeach;
	endforeach;
	
	if( ! empty( $ordenes_programadas ) ) :
		// Ordenar órdenes por día
		ksort( $ordenes_programadas )
?>

		<div class="[ container-fluid ]">
			<div class="row">
				
				<h2>Órdenes programadas</h2>
				
				<?php foreach ( $ordenes_programadas as $fecha => $platillo ) : ?>
					<div class="[ col-xs-12 ]">
						<img class="[ img-responsive ]" src="<?php echo $platillo['image_url'] ?>" alt="<?php echo $platillo['nombre'] ?>">
					</div>
					<div class="[ col-xs-12 ][ text-center ]">
						<p class="[ bg-primary ][ padding ][ text-center ][ color-light ]"><?php echo get_fecha_es( $fecha ) ?></p>
						<h3><?php echo $platillo['nombre'] ?></h3>
						<p><?php echo $platillo['info_adicional'] ?></p>
					</div>
					<hr class="[ divider-primary ][ margin-bottom-large ]">
				<?php endforeach; ?>

			</div><!-- row -->
		</div><!-- container-fluid -->
<?php 
	endif;
endif; 
get_footer();
?>
