<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />

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
		echo ' | ' . sprintf( __( 'Page %s', 'travel' ), max( $paged, $page ) );

	?></title>

 	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" />
	
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fixIE.css" />
	<![endif]-->
	<!--[if IE 8]>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fixIE8.css" />
	<![endif]-->
	<!--[if IE 6]>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fixIE6.css" />
	<![endif]-->

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />


<?php
	
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?> id="lightbox">

	