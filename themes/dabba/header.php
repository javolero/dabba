<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="cleartype" content="on">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<title><?php print_title(); ?></title>

		<!-- SEO -->
		<meta name="keywords" content="">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<!-- Favicon - generated with http://www.favicomatic.com/ -->
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-128.png" sizes="128x128" />
		<meta name="application-name" content="Little Crow"/>
		<meta name="msapplication-TileColor" content="#009C9F" />
		<meta name="msapplication-TileImage" content="<?php echo THEMEPATH; ?>favicon/mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="<?php echo THEMEPATH; ?>favicon/mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="<?php echo THEMEPATH; ?>favicon/mstile-150x150.png" />
		<meta name="msapplication-wide310x150logo" content="<?php echo THEMEPATH; ?>favicon/mstile-310x150.png" />
		<meta name="msapplication-square310x310logo" content="<?php echo THEMEPATH; ?>favicon/mstile-310x310.png" />

		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

		<!-- Hotjar Tracking Code for dabba.mx -->
		<script>
		   (function(h,o,t,j,a,r){
		       h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
		       h._hjSettings={hjid:101882,hjsv:5};
		       a=o.getElementsByTagName('head')[0];
		       r=o.createElement('script');r.async=1;
		       r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
		       a.appendChild(r);
		   })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
		</script>

		<!-- Google Maps -->
		<script src="http://maps.googleapis.com/maps/api/js?language=es&libraries=places&key=AIzaSyAjE9TVybKKQNNOa1g760xJ4y6b5YaZmq4"></script>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PBHGDV"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PBHGDV');</script>
		<!-- End Google Tag Manager -->

		<header class="[ text-center ][ padding ][ js-header ]">
			<div class="[ container ]">
				<div class="[ row ]">
					<div class="[ col-sm-4 ][ hidden-xs ][ text-left ]">
						<?php if ( ! is_user_logged_in() ) : ?>
							<a class="[ show ]" href="#login" data-toggle="modal" id="btn-entrar-header">
							<!-- <a class="[ show ]" href="#coming" data-toggle="modal"> -->
								<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/user.svg">
								<p class="[ inline-block align-middle ][ color-light ][ no-margin margin-left--small ]">Entrar</p>
							</a>
						<?php else: ?>
							<a class="[ show ]" href="<?php echo site_url('mi-cuenta'); ?>">
							<!-- <a class="[ show ]" href="#coming" data-toggle="modal"> -->
								<img class="[ svg ][ icon icon--iconed icon--fill ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/user.svg">
								<p class="[ inline-block align-middle ][ color-light ][ no-margin margin-left--small ]">mi cuenta</p>
							</a>
						<?php endif; ?>
					</div>
					<div class="[ col-xs-12 col-sm-4 ]">
						<a class="[ show ]" href="<?php echo site_url() ?>">
							<img class="[ svg ][ icon icon--logo icon--fill ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/logo-dabba.svg">
						</a>
					</div>
					<?php if ( is_user_logged_in() && ( ! is_page('checkout') && ! is_page('cart') ) ) : ?>
						<div class="[ col-sm-4 ][ hidden-xs ][ text-right ]">
							<a class="[ show ][ js-shopping-bag ]" href="<?php echo site_url('checkout'); ?>" data-toggle="tooltip" title="se ha agregado un platillo al carrito">
								<p class="[ inline-block align-middle ][ color-light ][ no-margin margin-right--small ]">mi pedido</p>
								<span class="[ notification notification__number ][ js-notification__number ]"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span>
								<img class="[ svg ][ icon icon--iconed icon--stroke ][ color-light ][ no-margin ]" src="<?php echo THEMEPATH; ?>icons/shopping-bag.svg">
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</header>

		<div class="[ main ]">