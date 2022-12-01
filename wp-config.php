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
define( 'AUTH_KEY',         '<V%jBxtj3w02t#{s-bZ;z2rEN,dkcj{NeK$9jj ~3WR%;.(5b8rffofJzQsh|H{T' );
define( 'SECURE_AUTH_KEY',  'SqNjJ@~3MqmTZ{(~`yOaYO*kMd4&8/Wy^y@EQY38y!7{^6tNT8wp>M1+8vP$RhAI' );
define( 'LOGGED_IN_KEY',    ' F,U2]C:Yv`YW6*j2K=HjNeJ`I{Gn*vP`@F@{a,TEXhy-lr<]b]0d# i[gUXeLy:' );
define( 'NONCE_KEY',        '2>lmeCWm`r#56}gyG$U&&W*S/k&Jei*k&R}CL=OTO|tpNA{_Qr/.pDSd6M_:  -a' );
define( 'AUTH_SALT',        'o7xrB`=jJ|%a-D:u_q%8(5lYabu|/<(jz/dtRM;:BcWEUyc@W^3Wh,i;H^J3kS<,' );
define( 'SECURE_AUTH_SALT', '(7WtQ<:44|BcxwINJE>e;VHaJCszBp.yC>3 &Vi2&$@RAE[!_A}<aIwD7:|6L:fB' );
define( 'LOGGED_IN_SALT',   '.LSXz{7&1izc]jio]kP.`p--E%kQZ{6iQ}qYaNdAQIb|V`#QjNDR)[G%X{|XyNFq' );
define( 'NONCE_SALT',       '!n,QhdQHQ^51JDhDz2%>;.Zf<d?yQHr([g>2B7*pf>sM6(cqIW!wVs^,(.3ix{+7' );

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

/** SMTP Email Config */
define('SMTP_USER', 'demo34021577@gmail.com');
define('SMTP_PASS', 'hejpjjclvkjrqkax');
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_SECURE', 'ssl');
define('SMTP_PORT', '465');
define('SMTP_AUTH', true);
