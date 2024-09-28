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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'V3w8PNq3lRv@ujaORO-!TAN){cR!7:(N}!Q5/WQ{W4sJ*`G%])JveCV{q^%|2[mt' );
define( 'SECURE_AUTH_KEY',   'UT9+0X;zezS>5s5;;qTCkS7NJ2_n3PavN9J_4^@J?DYfJ9.fFiDTn2E1`Soiyv-L' );
define( 'LOGGED_IN_KEY',     '.cSMfufUaePEscC!T^+ yX1EH|U&[;L(Q].j{p/XM:DKDexrFJUE/KyC+(q[X~8+' );
define( 'NONCE_KEY',         '#I6gVu^co#~pe(w#zU80Sk&L*l@oV^Jo{YxW*p0Y$bTlwPns3S/I|4/w{?z5bzE|' );
define( 'AUTH_SALT',         'SF*ZM#dY>}g05M#s(T/V5y]FQ|6o# f2+dZ5Ip#59jpVQieL&[!ci]HFW2KOwo>o' );
define( 'SECURE_AUTH_SALT',  'le+Ncv$p.j7D<7KvB6TgbSOF|qaBUg=V;8U=|L-9?oF&E{O&H283H=J,g]LPNB@!' );
define( 'LOGGED_IN_SALT',    'Tst)q._kI3c RiFjg$LQSyu{ R| .gkZoVtu}6[nokxw9s02P*#Z!$a+#) 2_*Kh' );
define( 'NONCE_SALT',        'j  jq9|7tHxlk):v.bB85/V9ope$!2Ggen,0ar)57JK=(j`y>nMKFxSB)ovSdX*E' );
define( 'WP_CACHE_KEY_SALT', 'E/8v(0Mtk,0CzUV1_HM/2,T_]k)yIx+N?/`PCL)MbL69nWW|5):4gz9U4@5dp9Sm' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
