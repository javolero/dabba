<?php
	$product_args = array(
		'post_type' 		=> 'product',
		'posts_per_page'	=> 1,
		'meta_query' 		=> array(
			array(
				'key' 	=> '_fecha_menu_meta',
				'value'	=> date('Y-m-d'),
			)
		)
	);
	$query = new WP_Query( $product_args );

	if( $query->have_posts() ) : $query->the_post();
		global $product;

		$image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	=> $post->post_title,
				'alt'	=> $post->post_title,
				'class'	=> '[ img-responsive ]',
				) );
		$platillo_principal = get_post_meta($post->ID, '_platillo_principal_meta', true);
?>
		<div id="<?php echo $post->ID ?>" class="[ platillo-hoy ]">
			<div class="[ row ][ margin-bottom ]">
				<div class="[ col-xs-12 col-centered ]">
					<a class="[ show ]" href="<?php the_permalink(); ?>">
						<?php echo $image; ?>
					</a>
				</div>
			</div>
			<div class="[ row ]">
				<div class="[ col-xs-8 ]">
					<h3 class="[ no-margin ]"><?php echo get_the_title() ?></h3>
					<p class="[ no-margin ]"><?php echo $platillo_principal ?></p>
				</div>
				<div class="[ col-xs-4 ]">
					<?php echo woocommerce_template_loop_add_to_cart(); ?>
				</div>
			</div>
		</div>

<?php
	endif; wp_reset_query();
?>

