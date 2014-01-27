<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta name="designer" content="Luis Gerhorst">
	
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
	
		wp_title( '|', true, 'right' );
	
		// Add the blog name.
		bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'teletype' ), max( $paged, $page ) );
	
	?></title>
		
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.min.js" type="text/javascript"></script><![endif]-->
	
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
		
	<?php do_action('before'); ?>
	
	<div id="wrapper">
		
	<header id="header">
		
		<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
		<hgroup>
			
			<p id="html-logo"><span>K</span><span>Gerhorst</span><span class="job-title">Architekt</span></p>
			
		</hgroup>
		</a>
	
		<nav role="navigation"><?php wp_nav_menu(array('theme_location' => 'header')); ?></nav>
		
	</header>
	
	<div id="content">