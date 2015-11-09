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

	if( $query->have_posts() ) : 
		echo '<h2 class="[ text-center ]">Menú de la semana</h2>';
		while( $query->have_posts() ) : $query->the_post();
			global $product;
			$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'shop_single' );
			$platillo_principal = get_post_meta($post->ID, '_platillo_principal_meta', true);
			$fecha_menu = get_fecha_es( get_post_meta($post->ID, '_fecha_menu_meta', true) );
			$classDisabled = ( ! $product->is_in_stock() ) ? 'disabled' : '';
	?>
			<article id="<?php echo $post->ID ?>" class="[ platillo-semana ][ margin-bottom ][ <?php echo $classDisabled ?>]">
				<div class="[ row ][ margin-bottom--small ]">
					<div class="[ col-xs-12 col-centered ]">
						<a class="[ bg-image bg-image--16-9 ]" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $image[0]; ?>')" ></a>
						<p class="[ bg-primary ][ padding--sides padding--top-bottom--small no-margin ][ text-center color-light ]"><?php echo $fecha_menu ?></p>
					</div>
				</div>
				<div class="[ row ]">
					<div class="[ col-xs-8 ]">
						<p class="[ no-margin ]"><?php echo get_the_title() ?></p>
					</div>
					<div class="[ col-xs-4 ]">
						<?php 
						if ( ! $product->is_in_stock() ) :
							echo '<a href="#" rel="nofollow" class="[ btn btn-sm btn-primary btn-hollow ][ pull-right ]">agotado</a>';
						else: 
							echo woocommerce_template_loop_add_to_cart();
						endif; 
						?>
					</div>
				</div>
			</article>

<?php
	endwhile; endif; wp_reset_query();
?>