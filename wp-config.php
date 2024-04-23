<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jula_consultancy' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+mM2}])ba!e(K-4O^Pl};/y}0glYwk7J3398-*h_qrn3%[Emza)DI5wC7x~m<SrH' );
define( 'SECURE_AUTH_KEY',  'GTc}S&1N>T2kB?F<pJp3nX(22@PNhZ{}e^Js>x56p3-%hE?H(F@f[%!no9#/E#PF' );
define( 'LOGGED_IN_KEY',    '<H2>9rh]$*g4@{.*H2rBm2-A-6s|YY`ioq}/:^iPJY}Bc6O=dKQ8i,*[JAa{{NP^' );
define( 'NONCE_KEY',        '6{K$ocAv0? 4$t0E{C{/*wgEOaG[%b`NHU]]U!U>wV3r@Yt.ard~QpL7/WA_6T1/' );
define( 'AUTH_SALT',        'P4!Q+?zm*`P0yzzi(|0t`4-%vq$u@+w3jJk%c/<8}tXax,R!!]V;0gv)o~mT()p*' );
define( 'SECURE_AUTH_SALT', 'C{;M}IIUc&D~Jm]y.MD_dP4$Q[;+1U>.n?%IltP`G5]vL~OPw4f$:+Al,7>qCBe*' );
define( 'LOGGED_IN_SALT',   'l]4jC/t{p*+vW9R@x#yDFt3bJcI!!q@85*`5.A<*f4B?Jk12p,)v@^yIK.K,C@8)' );
define( 'NONCE_SALT',       '}Oq1^u.r(@,T|Lo}l$m HAKi$n7c1 YCt)Z}9MZK=T^rHY/iOx2L(0g.{IF)%zxO' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
