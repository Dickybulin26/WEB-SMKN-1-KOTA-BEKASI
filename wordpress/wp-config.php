<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'wpdb_smkn1' );

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
define( 'AUTH_KEY',         'RD0q6ZRM,34BK[q55HdiUnfNc(e;Z<Lur<L2,oUSVn>7-i,BnK,A{`%@B}uQ@OWW' );
define( 'SECURE_AUTH_KEY',  ' !r:WHl,EbF+qek$Q1SLv*KsEpm2IGCC6pkR!Vv7Z8lTr/l+fzO{&P6 ,hxaFhe:' );
define( 'LOGGED_IN_KEY',    '/{F @suo-Fy3qj i^>ea1F-p5l:VS2K2R~I3H/(nI:vn /MM&<6PY~m!bXTN473w' );
define( 'NONCE_KEY',        'Ht5P#a*u5HxxgE;^-{t,wvsN)/5lFo{7Oz/o?@k2-w?=<x[]3X=WZ3$hmr821];s' );
define( 'AUTH_SALT',        'Yw6rLSYg^V6Qg=lD.xOhyJQ>mBr?zj~2zuyGu8S$9_N&=bHT-u&yk=GKC}9.Xieq' );
define( 'SECURE_AUTH_SALT', '*H5I`r+1A8yFc:L 4<# %EF:7e1|/~6MY!it&IsQL@Wm]<%jL{HTkGWFy1?eJ+`,' );
define( 'LOGGED_IN_SALT',   '1I&[T.^o((4 F|8519`^mx>V[5ym2^Nd_`W^+ghycfk8Qc]bva7IA 6TJ=af 9W%' );
define( 'NONCE_SALT',       'Bcl3oyhSM[ebQ2z<hl5YnMkxaZ@e,)/J51YM4U%!B33o 03$H#|C(IBC#^x, t!W' );

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
