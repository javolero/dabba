<?php

	$query_count = 0;
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
		'order'				=> 'ASC'
	);
	$query = new WP_Query( $product_args );

	if( $query->have_posts() ) :
		echo '<h2 class="[ text-center ]">Menú de la semana</h2>';
		echo '<div class="row">';
		while( $query->have_posts() ) : $query->the_post();
			global $product;
			$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'shop_single' );
			$fecha_menu = get_fecha_es( get_post_meta($post->ID, '_fecha_menu_meta', true) );
			$classDisabled = ( ! $product->is_in_stock() ) ? 'disabled' : '';
	?>
			<article id="<?php echo $post->ID ?>" class="[ platillo-semana ][ margin-bottom ][ col-xs-12 col-md-6 ][ <?php echo $classDisabled ?>]">
				<div class="[ row ]">
					<div class="[ col-xs-12 col-centered ]">
						<a class="[ bg-image bg-image--16-9 bg-image--3-1--sm ]" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $image[0]; ?>')" ></a>
						<p class="[ padding--top-bottom--small no-margin ][ text-left color-intermediate ]"><?php echo $fecha_menu ?></p>
					</div>
				</div>
				<div class="[ row ]">
					<div class="[ col-xs-8 ]">
						<h3 class="[ no-margin ]"><?php echo get_the_title() ?></h3>
					</div>
					<div class="[ col-xs-4 ]">
						<div class="[ pull-right ]">
							<?php
							if ( ! $product->is_in_stock() ) :
								echo '<a rel="nofollow" class="[ btn btn-sm btn-default btn-hollow ]">agotado</a>';
							elseif( product_can_be_bought( $product->id ) ):
								echo woocommerce_template_loop_add_to_cart();
							elseif( ! product_can_be_bought( $product->id ) ):
								echo '<a href="#" rel="nofollow" class="[ btn btn-sm btn-primary btn-hollow ]">ver detalles</a>';
							endif;
							?>
						</div>
					</div>
				</div>
			</article>

			<?php
				$query_count++;
				if ($query_count % 2 == 0) {
				    echo '<div class="[ clearfix ]"></div>';
				}
			?>

<?php
	endwhile;
	echo '</div>';
	endif; wp_reset_query();
?>