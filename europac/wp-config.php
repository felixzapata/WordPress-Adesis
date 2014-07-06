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
define('DB_NAME', 'aw-europac');

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
define('AUTH_KEY',         'lLj,?mwUH-s<+ZiG4,$SBGE>0jGfzV]5fH0+EJOqA+P[Q+-!-A+?:kQ-mMgpKx4A');
define('SECURE_AUTH_KEY',  'uxQ|$gw M7FH~F3H?>Uah8]Ta-rk(yq4upd_w9>pf1z5K}4+rM5+!hx4$+C0*f`}');
define('LOGGED_IN_KEY',    'j-fRGEO0=HnnSur:LZ+Yd3Q13gZDOO6a~H3&Z$&6dja$W-zA=)`Vdv(BI)g+X1?k');
define('NONCE_KEY',        'uv:7gH5Lc+-1==pg*[+~VajV>n4wi=e||*:@y$%)6Bk:;Sw?j3`L[M}u&M+XTN}-');
define('AUTH_SALT',        '-=t NMP+k]7SoYA>n{pH9V8x|R~`GEajNYAam_vb{#?>Z:YjLv]M2{OX`>*UZ}*V');
define('SECURE_AUTH_SALT', 'hJG(|z8T2F}b<`rJN]v,&lHwM_%`~KfGnrTxK]MZHG4,gAS6n[jHC7F**e9?i[0U');
define('LOGGED_IN_SALT',   'q)sDTKuhl#[ -:$B:Et}_CD3=%S9/}Z{)Usdj1zIXd*(&^-o2V$j>=)(E]{st&)C');
define('NONCE_SALT',       '<-T*_~.G}rCx{Ot&-awR4rhJQPrD&m|5cXP)[v$rUqY330J_:F9fJzuZ)(unR1*g');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'aweu_';

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

