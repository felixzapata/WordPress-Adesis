<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 * 
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapperContent"  class="cuerpo">
	<header id="cabecera" role="banner">
		<div class="clear">
			<div class="frt">
				<div class="enlacesTop">
					<ul>
						<li><a href="#">Inicio</a></li>
						<li><a href="#">Ayuda</a></li>
						<li><a href="#">Contacto</a></li>
						<li><a href="#">Envía tu CV</a></li>
					</ul>
				</div>

				<div class="lang"><a href="">Español</a></div>

				<div class="buscador">
					<form method="post" action="#" id="buscadorForm">

							<p>
								<label for="buscador">
									<span class="indentado">Buscar</span>
									<input type="text" id="buscador" name="buscador"  placeholder="Buscar">
								</label>
								<input type="image" src="<?php echo get_template_directory_uri(); ?>/img/i_search.png" alt="buscar por término" />
							</p>

					</form>
				</div>

				<a href="" id="btnZonCl" class="lanzaPopup">ZONA CLIENTES</a>

				<div id="zonaCl" class="indentado">
				</div>


			</div>
		</div>
		<div class="clear">
			<div id="logo">
				<?php if( is_home() ) { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo_europac.png" alt="EUROPAC" />
				<?php  } else {  ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_europac.png" alt="EUROPAC" /></a>
				<?php  } ?>
			</div>
		

		<nav id="menuPrincipal" class="main-navigation" role="navigation">

			<?php wp_nav_menu( array('menu' => 'principal', 'theme_location' => 'primary', 'menu_class' => '', 'container' => '', 'menu-id' => '', 'items_wrap' => '<ul role="menubar">%3$s</ul>', 'walker' => new europac_walker_nav_menu ) ); ?>
		</nav><!-- #site-navigation -->

		</div>

		
	</header><!-- #masthead -->
<?php if( !is_home() ) { ?>
	<section id="bodyContent" class="layout2Cols">
<?php  } else {  ?>
<section id="bodyContent" class="layout2ColsNoMenu">
<?php  } ?>
