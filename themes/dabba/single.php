<?php get_header(); ?>

<?php 
	global $post; 

	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$fecha = get_fecha( $post->ID );
	$lugar = get_lugar( $post->ID );
?>

	<style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #mapa { height: 100%; }
    </style>

	<div class="[ container-fluid ]">
		<div class="[ row ]">
			<a href="#" class="btn__corner">
				<div class="[ text--bordered ][ text-center ]">
					<p><em>#SabíasQue</em></p>
				</div>
			</a>
		</div>
		<div class="[ row ]">
			<div class="[ col-xs-12 col-md-6 col-md-offset-3  ]">
				<p><strong><?php echo get_the_title() ?>.</strong> <?php echo $lugar . ', ' . $fecha ?>.</p>
			</div>
			<div class="[ col-xs-12 col-md-6 col-md-offset-3 ]">
				<div id="mapa" style="height: 500px;"></div>
			</div>
			<div class="[ col-xs-12 ]">
				<div class="[ street-view-img ]">
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>