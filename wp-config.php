<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'secular-students');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'w.b0Lz?,JIy-.qQG{dE:G~fG+:V-*1+GujWl4=P0.t0p@.w|6]-#Wqz-?n/aV +4');
define('SECURE_AUTH_KEY',  'S]8+2&Y+J)>+ilNT%!UEs>m(`!sj$sHRtA6|%<&|~C@b]9IAs<,RZ&gyYScP+XuL');
define('LOGGED_IN_KEY',    'jH}srwT!]{t7T#?0]VD_&Y=O|U<jI,pilPIj}AS,+/{pfg++!sm+D3Sys(t,IzuV');
define('NONCE_KEY',        'HY$nRp6}! 2D[^o{ThTWv8>ISgn*W|y6Zi,],DO<{_E{adI-9Xjl$6~yp8q3c(wg');
define('AUTH_SALT',        'l3~~i?r][bI;Y_?p2WNzXO/I=D4?MO_2ravN({IimUOY_$r]tQ6[41J+^Uo#r_15');
define('SECURE_AUTH_SALT', '(9/L+BP.cgP!iIT?H45IH%%LMrLx7)8.1?B5.SMTy=d(zog` w;kr|:ltST%c7-x');
define('LOGGED_IN_SALT',   '<::nvI-E]vCCMFW~73M7|F6lAT?uvZ;tOb@@z-J2h*KVa(|-jROH@ JnmQncQ1|I');
define('NONCE_SALT',       '&1z-m?vx-#eI- ,fZcvBD-5|d,/,I]D|;7=w_luKdE:N!C^-5e~}1pm:p7BnKzcA');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

