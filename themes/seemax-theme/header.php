<!doctype html>
<html <?php language_attributes(); ?> class="no-js loader-class">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">


	<?php if ( is_archive() ) { ?>
		<title><?php the_archive_title(); ?></title>
	<?php } else { ?>
		<title><?php the_title(); ?></title>
	<?php } ?>


	<link href="//www.google-analytics.com" rel="dns-prefetch">
  <link href="<?php echo get_template_directory_uri(); ?>/img/favicon-2.png?v=4" rel="shortcut icon">
   <!-- <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed"> -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<!-- <meta property="og:url" content="<?php echo get_permalink();?>" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Contextos - <?php the_title(); ?>" />
	<meta property="og:description" content="<?php bloginfo('description'); ?>">
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/default-image.jpg" /> -->

	<?php wp_head(); ?>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-77219320-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-77219320-2');
	</script>

</head>
<body <?php body_class(); ?> >
<div class="wrapper">
	<!-- ADD A PRE-LOADEDER -->
	<div id="preloader">
		<!-- <img src="<?php echo get_template_directory_uri();?>/img/preloader.svg" > -->
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 268.2 268.2">
			<style type="text/css">
				.preloader-logo-color-1{fill:#FFFFFF;}
				.preloader-logo-color-1{fill:#999;}
				.preloader-logo-color-2{fill:#000000;}
				.preloader-logo-color-3{fill:none;stroke:#FFD233;stroke-width:0.5;stroke-miterlimit:10;}
			</style>
			<!-- <polygon id="bottom-load" class="preloader-logo-color-2" points="141.3,144 126.8,152.2 126.9,199.5 115.9,203.6 115.9,205 151.9,205 151.9,203.6 141.3,199.5"/>
			<polygon id="top-load" class="preloader-logo-color-2" points="141.3,66.6 168.5,66.6 180,86.2 181.3,86.2 181.5,63.2 86.7,63.2 86.7,86.2 88,86.2 99.7,66.6 126.7,66.6 126.8,124.2 141.3,116"/> -->
			<polyline id="mid-load" class="preloader-logo-color-3" points="250.4,67.3 134.1,134.1 17.8,200.9"/>
		</svg>
	</div>
	<header class="header" role="banner">
		<div class="content header-inner-wrap">
			<div class="header-logo">
				<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" > -->
				<?php get_template_part( 'partials/_logo-svg-code' );?>
			</div>
			<nav class="main-nav mainNav" role="navigation">
				<!-- <?php main_theme_nav(); ?> -->
			</nav>
			<div class="mobile-menu menuToggle">
				<span class="black-span hamTop"></span>
				<span class="black-span hamMid"></span>
				<span class="black-span hamBot"></span>
				<div class="sub-spans">
					<span class="yellow-span hovHamTop"></span>
					<span class="yellow-span hovHamMid"></span>
					<span class="yellow-span hovHamBot"></span>
				</div>
			</div>
		</div>
	</header>
