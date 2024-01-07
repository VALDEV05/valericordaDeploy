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
define( 'DB_NAME', 'valeriocordaDeploy' );

/** Database username */
define( 'DB_USER', 'mamp' );

/** Database password */
define( 'DB_PASSWORD', '2diligence$' );

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
define( 'AUTH_KEY',         '%>1{(bW0) lycw4J4=4_WjE@$hLz_2MxgFTpX+0uW,S0RRRo53S Y(6rU1]FbJ*n' );
define( 'SECURE_AUTH_KEY',  ';mYx[]LR:)nR5G6YIrOaL+(o~76Ep0VvUdt7WfSFml1=2lPzhPL.-r)T!uemn!zH' );
define( 'LOGGED_IN_KEY',    'Y$6si0b[l|4&m|*_e,mn(_Cmvu`,ed5~HP.oWeen!&d 1#~^t9^0GR!.pyntWNrx' );
define( 'NONCE_KEY',        'Xv-<k{4JmVZBP(<2V<U/LbdBgsD:Q-KmH]0,H#6s=xo.^.AgE)T^;[@@=o4=Z&A)' );
define( 'AUTH_SALT',        '5,PM4a{mTPja{wZ1x5bwKgVzHz/S|(L_3*K[lBauB`%G_(=!_Urs.>ebF,+wy(+q' );
define( 'SECURE_AUTH_SALT', '#M6VLoA%z,YQA^cF<BMu} ?z{4OEn@/Wc>$+&NUD<uTSSc9MX(PiQ84RFh}x`&=1' );
define( 'LOGGED_IN_SALT',   'fhbVOIrka8sn=]HT6M8OQ0Tf~euC{Kh!;d>3(l+Ab#UtdJ=e%DN;SW1BK 7Tox,`' );
define( 'NONCE_SALT',       'tlVcH_-=7alV-A#As6Fs-j@o_.((j5#zJ#j4oBME8n5JWY~#X({(HaYlvI6l-N_d' );

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
