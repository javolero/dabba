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

		$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'shop_single' );
		$platillo_principal = get_post_meta($post->ID, '_platillo_principal_meta', true);
		$guarnicion_1 		= get_post_meta($post->ID, '_guarnicion_1_meta', true);
		$guarnicion_2 		= get_post_meta($post->ID, '_guarnicion_2_meta', true);

?>
		<section id="<?php echo $post->ID ?>" class="[ platillo-hoy ]">
			<div class="[ row ][ margin-bottom ]">
				<div class="[ col-xs-12 col-centered ]">
					<a class="[ bg-image bg-image--16-9 ]" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $image[0]; ?>')" ></a>
				</div>
			</div>
			<div class="[ row ]">
				<div class="[ col-xs-8 ]">
					<h3 class="[ no-margin ]"><?php echo get_the_title() ?></h3>
					<p class="[ no-margin ]"><?php echo $platillo_principal.', '.$guarnicion_1.' y '.$guarnicion_2 ?></p>
				</div>
				<div class="[ col-xs-4 ]">
					<?php echo woocommerce_template_loop_add_to_cart(); ?>
				</div>
			</div>
		</section>

<?php
	endif; wp_reset_query();
?>

