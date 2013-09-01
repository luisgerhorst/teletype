<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<meta name="viewport" content="width=device-width" />
	
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
			echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );
	
	?></title>
		
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
		
	<?php do_action('before'); ?>
	
	<div id="wrapper">
		
	<header id="header">
		
		<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
		<hgroup <?php if (get_header_image() != ''): ?>style="background-image: url(<?php echo header_image(); ?>); height: <?php echo get_custom_header()->height; ?>px; width: <?php echo get_custom_header()->width; ?>px;"<?php endif; ?>>
			
			<?php if (display_header_text()): ?>
				
				<h1 id="title"><?php bloginfo('name'); ?></h1>
			
				<?php if ('' !== get_bloginfo('description' )): ?>
					<h2 style="color: #<?php echo get_header_textcolor(); ?>;" id="description"><?php bloginfo('description'); ?></h2>
				<?php endif; ?>
			
			<?php endif; ?>
			
		</hgroup>
		</a>
	
		<nav role="navigation"><?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></nav>
		
	</header>
	
	<div id="content">