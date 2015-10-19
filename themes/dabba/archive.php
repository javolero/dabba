<?php get_header(); ?>

	<style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #mapa { height: 100%; }

      .info-window__img { 
      	width: 120px;
      	height: auto;
      }
    </style>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div id="mapa" style="height: 500px;"></div>
			</div>
			<div class="[ col-xs-12 ][ filtro-decada ][ text-center ]">
				<a class="[ btn btn-default ]" href="#" data-decada="1930">1930</a>
				<a class="[ btn btn-default ]" href="#" data-decada="1940">1940</a>
				<a class="[ btn btn-default ]" href="#" data-decada="1950">1950</a>
				<a class="[ btn btn-default ]" href="#" data-decada="1960">1960</a>
				<a class="[ btn btn-default ]" href="#" data-decada="todas">Todas</a>
			</div>
		</div>
	</div>


<?php get_footer(); ?>