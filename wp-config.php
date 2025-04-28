<?php
//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
//Begin Really Simple Security key
define('RSSSL_KEY', 'OinHNRQGmBC4vzTjI2gDCFQrOgaXagsh6YFhoQpAR2nFie65nnt4mn6LgdjssiDc');
//END Really Simple Security key

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
define( 'DB_NAME', 'soundtothesurface' );

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
define( 'AUTH_KEY',         'e_XlkvANC}%Jd1$:,;$S~rRqGsCw*[4$}z~2p%L6u /hLJj`@.}brc2B+FlpnGeA' );
define( 'SECURE_AUTH_KEY',  'f;<=mLLM*wJcLc`Lt2U|d y}u^mT6j[wogT=R1*$!XB Ja5[]yVcpr!v|v}[|w9:' );
define( 'LOGGED_IN_KEY',    '-0 %{X_Oy%b?rmOpJAKl.rh=N|wTvFWsjj_ocv})4#.JKthyq/j>)<#^C]hMe6hI' );
define( 'NONCE_KEY',        'L5$?}r79ae#B<z0L4GRVA:fU_wflo#R:YTL?Srtyg&;bi?f;qr3hS!2sW#lpND/A' );
define( 'AUTH_SALT',        '/o5}3=sF`*]rrj70n-@S;XkZ}t 7^.nn$!g<@u}L8@[-k[FZ`KF`bF#D?~Gy4Nde' );
define( 'SECURE_AUTH_SALT', 'qEt]f1aeiSc[Owl>(7;4/cq?dWk_hYcssHOZiIQa(i7ewN)7~pB:~lm6laxTIa.D' );
define( 'LOGGED_IN_SALT',   'u^lf=}}z>2]jgyu*jWj#64+Z5J},cKYLcXK#rzat|0IpW{{@:k~U|SxzZxS|<iN^' );
define( 'NONCE_SALT',       'Gzn,ayRDUd^HMK~CF.*mu]bcj+QM{{kS!JC83X!7y}.CanTeF8{ak*_C2gU9I1OR' );

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
