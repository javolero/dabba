<?php

	$product_args = array(
		'post_type' 		=> 'product',
		'posts_per_page'	=> 5,
		'meta_query' 		=> array(
			array(
				'key' 	=> '_fecha_menu_meta',
				'value'	=> get_dias_restantes_semana(),
			)
		),
		'orderby'			=> 'meta_value',
		'order'				=> 'ASC',
	);
	$query = new WP_Query( $product_args );

	if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
		global $product;

		$image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	=> $post->post_title,
				'alt'	=> $post->post_title,
				'class'	=> '[ img-responsive ]',
				) );
		$platillo_principal = get_post_meta($post->ID, '_platillo_principal_meta', true);
		$fecha_menu = get_fecha_es( get_post_meta($post->ID, '_fecha_menu_meta', true) );
?>
		<article id="<?php echo $post->ID ?>" class="[ platillo-semana ][ margin-bottom ]">
			<div class="[ row ][ margin-bottom ]">
				<div class="[ col-xs-12 col-centered ]">
					<a class="[ show ]" href="<?php the_permalink(); ?>">
						<?php echo $image; ?>
						<p class="[ bg-primary ][ padding no-margin ][ text-center color-light ]"><?php echo $fecha_menu ?></p>
					</a>
				</div>
			</div>
			<div class="[ row ]">
				<div class="[ col-xs-8 ]">
					<p class="[ no-margin ]"><?php echo get_the_title() ?></p>
				</div>
				<div class="[ col-xs-4 ]">
					<?php echo woocommerce_template_loop_add_to_cart(); ?>
				</div>
			</div>
		</article>

<?php
	endwhile; endif; wp_reset_query();
?>