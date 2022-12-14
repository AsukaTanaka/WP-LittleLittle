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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_little_db' );

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
define( 'AUTH_KEY',         '`F;O&qG!kNHVa3ud<K1FsC*l.k+1PZs&B6<hgboVeKrq(N=62pfTTMs58[SJH0Oe' );
define( 'SECURE_AUTH_KEY',  'ci=vn![}0LUVZ1-|i&0p22=LMs6cUIg3/FA= ,>jV81lGb9vPH.-H(ZX!e=^9q+[' );
define( 'LOGGED_IN_KEY',    '^x<A~OJ}bnYP wO.%16]ZZl@l`gR<jhM})HQ0sqv=`{]:lcGv)h8NnxecizAgc6#' );
define( 'NONCE_KEY',        'oE&r/h05]WEY{1t}G2:kY(nD* g_l(6U1%{),&Ep@1QD/y* da|M|v G=o58W.1H' );
define( 'AUTH_SALT',        'Th&M_)gJVl6kN0cFS{qe:LUu;x=UjQaV`W]<hS#(`OkhRx=LEdQ/:{TyGLnmM451' );
define( 'SECURE_AUTH_SALT', 'dIfBHtD>G8>^XN{fc@9i:N{m$vDJX3El5FmY|@.`}5o2L+d=yhqo0VXB:jNEmyGw' );
define( 'LOGGED_IN_SALT',   'j@i; .ffgN+QSFF5Tg|)0bEBw`y]{6b@Gxj1qO6/y.Vl8QGMDzP1S/,:{k|Er&4|' );
define( 'NONCE_SALT',       '^_1P|xbAj5X}rdUdas{QQO(&UrF8-eX0@9;X{CsTq;o<Mi0}4zQ6D-Bz0}5%tcqi' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
