<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'minh02' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'e&XiP~XzsH11j.p`w9b fT?1p@(89u>#DU&*pq?Ro@>sp*%%2W<!/1,lf>mpoiKl' );
define( 'SECURE_AUTH_KEY',  ':Ths6,DgCJTQX%-O6*!J2x,G8Z4!9zqBr1&<1wE-z;,L6X$/FK%G[gQYMLqc=0,a' );
define( 'LOGGED_IN_KEY',    'mu|r IQ{eYrH}R^okXDSphvYlR6SE?rxBY0 Ss^0#Rtm(B6WbupzQOucYJJ}jmw ' );
define( 'NONCE_KEY',        '1pJy_:!,L`f6qC1-:x+Pdu19+BgA+W9J,K<$&bdn:L@Sm&,IASF.>y:&Nr-M>xn*' );
define( 'AUTH_SALT',        '_2m }$U:xkQQ+dwJy+e>Xwm:%>&<{D4FJv+-_|){0F3!4GznLKTNgN3|tj.O: N8' );
define( 'SECURE_AUTH_SALT', 'q.t.mdBq}$<?}ObEwtO?>^bdKq]pYE9A?%CND>}]u$>fQbdqe87#MRxLC wB$P|O' );
define( 'LOGGED_IN_SALT',   'jEgt./n|ut %~7oYs^r^Yob[>0x+d{CKwzW-!e+L6`nm1hGFf_(NTe$9 2C]iZ)7' );
define( 'NONCE_SALT',       '{ :V8m=BjadR#4Z-3MbGSby?)2&g(@;~1_;+%Nik7c}m@c8E-=nmH]#1Gt}H ~k^' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
