<div class="[ row ]">
	<?php
	$product_args = array(
		'post_type' 		=> 'product',
		'posts_per_page'	=> 3,
		'tax_query' 		=> array(
			array(
				'taxonomy'	=> 'pa_tipo-de-producto',
				'terms'		=> 'postre',
				'field'		=> 'slug'
			)
		),
		'orderby'			=> 'date',
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
	?>
		<div id="<?php echo $post->ID ?>" class="[ col-xs-4 ][ postre ]">
			<?php echo $image; ?>
			<p><?php echo get_the_title() ?></p>
		</div>

	<?php endwhile; endif; wp_reset_query(); ?>
</div>
<div class="[ row ]">
	<?php
	$product_args = array(
		'post_type' 		=> 'product',
		'posts_per_page'	=> 3,
		'tax_query' 		=> array(
			array(
				'taxonomy'	=> 'pa_tipo-de-producto',
				'terms'		=> 'postre',
				'field'		=> 'slug'
			)
		),
		'orderby'			=> 'date',
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
	?>
		<div class="[ col-xs-4 ][ postre ]">
			<?php echo woocommerce_template_loop_add_to_cart(); ?>
		</div>

	<?php endwhile; endif; wp_reset_query(); ?>
</div>