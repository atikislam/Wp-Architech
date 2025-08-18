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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wparchitech' );

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
define( 'AUTH_KEY',         'a=P)v^i Wk*n}dCm 8nf]N$#p,rT>u&pz+N=l!yr(tT06X&{$8/;1;r<pubux@>_' );
define( 'SECURE_AUTH_KEY',  ':]z#ZMj0IR%.SHg]/AVBK2tV>bN9A)S!mEH{V<O!cP*d_]S1?f_4T:b/y%H@/|+u' );
define( 'LOGGED_IN_KEY',    '{Cx77O:F>N*Ysc/Zr-O#-/8R|,nAb5<T%j(sKHw3Ke<%Kffl,noe]FEqJ eV8WxU' );
define( 'NONCE_KEY',        '+=5]=yb]4[PzWp*JB|FqNlSOJ%?D=PL.kKb%d(p!,FzS+K1fvL7G{=QmpOiC$YT^' );
define( 'AUTH_SALT',        'I6&ETMy[E<Y J>0*vS:e?@4dY}FtG:uKPHs$[u],n)+K|q{^Oy3dC*Z)7tp6_i7?' );
define( 'SECURE_AUTH_SALT', '1*_oo[d1H.D._G&YJj=iRfr!_L)2V7Jh4%QvDX+I=Zm.@kjG2y 6XJ2-_1XRQ^I]' );
define( 'LOGGED_IN_SALT',   'iv9&*cA4GNk).)QE[;S139QaxFZtN?MaGv&xS`G7U]qy4iI0WEC?)LX[+1iGZW;[' );
define( 'NONCE_SALT',       'Gq=2![q60Rj?ttZIPuZlBVi!hH=y_,uh^#,%SsgaAFn`ay9Lo/`n.NfB!Y6bWs9+' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
