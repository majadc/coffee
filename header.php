<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package majadc_coffee
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Marck+Script|Merienda|Oswald&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2:400,600|Raleway:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
		
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-17487513-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-17487513-1');
		</script>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
	<div id="website" class="page hfeed">
		<header id="masthead" class="header" role="banner">
			<div class="site-branding header__site-branding">
				<h1 class="site-branding__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div> 
			<div class="site-description header__site-description ">
				<h2 class="site-description__text">
					<?php bloginfo( 'description' ); ?>
				</h2>
			</div>
			<?php 
			$body_classes = get_body_class();
			if ( in_array('search-no-results', $body_classes) === false ) {  ?>
			<div class="header__form">
				<?php  get_search_form(); ?>
			</div>
			<?php } ?>
			<nav id="site-navigation" class="navigation-main header__navigation-main" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>
		</header>
		<a class="skip-link visuallyhidden sr-only" href="#content"><?php _e( 'Skip to content', 'majadc_coffee' ); ?></a>
		<div id="content" class="page-container">
