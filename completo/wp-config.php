<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'aw-comp');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zv7##8IJ][amMy6aN<4+* l--0|C eF2?-)+yppja]uFH?cz?Gi; ]d[caOjuhO-');
define('SECURE_AUTH_KEY',  '=!|(SryDzo!:oy?q$^%|lXc<T~ :?C~+.a,JF2XH<Fgb|:ya4@<h^X{lR5{2H^-&');
define('LOGGED_IN_KEY',    'Aw-wZ<8l>+8T1ptz:TbhMJ:VK<U2CR/9JdoP{s5 .QwkX76Mrx&ATOlY4tr`6af-');
define('NONCE_KEY',        'pOE--#S*VOfTm{>2sUw<>|E0k!yv#6TX.z_&`m;fC>gFQSf3[2P`>z_+}#A-el~(');
define('AUTH_SALT',        'kp-x]M4;_!PCDPD-p7O;3lags#!78dg|rNHXp~1F#|}{Fb w.Y3J)i5M&BHxde?N');
define('SECURE_AUTH_SALT', '?b^*X.uQu<=o$BzE4`D8.P:}_ft,G-l.|X%TQ =R6AEq1RuP0 gpuxqNH;aNie2O');
define('LOGGED_IN_SALT',   '-Q~0(;z wURfp+=VuhN+j}@U X=`W{x+_ccTo_V4p<kM0:y&{yy,8tn5@0{V(vBr');
define('NONCE_SALT',       '/K@e5?-+o$LPB~V18LGie_d{=H|t<0u_7G^1&%<2odSL1 ;YU/JV*4Q4@,eQ)o3?');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'adesis_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

