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
define( 'DB_NAME', 'qs' );

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
define( 'AUTH_KEY',         ' >LhV_}/?!7NX!C`sGo(:J[alpgvR~T>]E#kz|;vrpE}NJM_@%JG<jG/-Yab~E$T' );
define( 'SECURE_AUTH_KEY',  'h=|4nnu!s8~wAZzIvkVa/6j^8Js*1>rTy+j$cW1|;|bxHq/i|%}{Z/Rm4oseGY# ' );
define( 'LOGGED_IN_KEY',    'y2@dj%[`U#-h/ChpJ5t]7RY9fb<9CZ9[eC1gBlGuaUaK/(l-2^Pv,+-(H<M|Cj&o' );
define( 'NONCE_KEY',        'wlh_o:f]INPPQx~s?x|+=zXG_ogO/C<HBWE-pO*82xuyLVDG<G]`LmK&rCz?tei|' );
define( 'AUTH_SALT',        '&E/7Za@ /<eQ)HX2~)hRg#/C/0[>P=NOD[S1MqhRGd;yE~==|?oFz&!dn78IS(bj' );
define( 'SECURE_AUTH_SALT', 'TBLY^yu|hMQGG!L,yCtu:@*rPzs6.&mwAllp yaWdt4{Rwowdw.hPmAu-VUSfLd0' );
define( 'LOGGED_IN_SALT',   '??0+?6k|q ,<bi&v~Lp4}EY>;i:?LnWYZm(M+L%>s6WSVuCbFyye+LBWv*<[P>n,' );
define( 'NONCE_SALT',       '$nv;tS}t=_uu+HYV<-|,s$4cPB?{V&F|m1s_7bJ7-]lTUYDF)dRi^4hi7=&+RfQ3' );

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

ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

