<!doctype html>
<html <?php language_attributes(); ?> class="no-js loader-class">
<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164322516-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-164322516-1');
	</script>
	<meta charset="<?php bloginfo('charset'); ?>">

	<?php if ( is_archive() ) { ?>
		<title><?php the_archive_title(); ?></title>
	<?php } else { ?>
		<title><?php the_title(); ?></title>
	<?php } ?>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
  <link href="<?php echo get_template_directory_uri(); ?>/img/favicon-2.png?v=4" rel="shortcut icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="wrapper">
	<!-- ADD A PRE-LOADEDER -->
	<div id="preloader">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 268.2 268.2">
			<style type="text/css">
				.preloader-logo-color-1{fill:#FFFFFF;}
				.preloader-logo-color-1{fill:#999;}
				.preloader-logo-color-2{fill:#000000;}
				.preloader-logo-color-3{fill:none;stroke:#FFD233;stroke-width:0.5;stroke-miterlimit:10;}
			</style>
			<polyline id="mid-load" class="preloader-logo-color-3" points="250.4,67.3 134.1,134.1 17.8,200.9"/>
		</svg>
	</div>
	<div class="header-back"></div>
	<header class="header" role="banner">
		<div class="content header-inner-wrap">
			<div class="header-logo">
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
