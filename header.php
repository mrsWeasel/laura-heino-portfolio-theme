<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Laura Heino
 */

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="main-wrapper">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lauraheino' ); ?></a>
	<div id="page" class="site container-fluid">
		<div class="row main-row">
				<header id="masthead" class="site-header col-lg-2 col-md-3 col-sm-3" role="banner">
					<div id="masthead-inner">
						<div class="site-branding">
							<a id="home-link" href="<?php echo home_url(); ?>">
								<?php get_template_part('assets/images/inline', 'logo-lh.svg'); ?>
								<!--<h1>Laura Heino<br>
								<span class="subheading">Portfolio</span></h1>-->
							</a>
						</div><!-- .site-branding -->

						<div class="nav-container">
							<nav id="site-navigation" class="main-navigation" role="navigation">
								<button id="menu-button" class="menu-toggle" aria-controls="site-navigation" aria-expanded="false">Menu</button>
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => '' ) ); ?>
							</nav><!-- #site-navigation -->
								
						</div>
						<?php dynamic_sidebar( 'header-widget' ); ?>
					</div><!-- #masthead-inner -->
				</header><!-- #masthead -->		
			<div id="content" class="site-content col-lg-8 col-lg-offset-1 col-md-7 col-md-offset-1 col-sm-9">

