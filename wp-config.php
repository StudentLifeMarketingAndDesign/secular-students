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
define('DB_NAME', 'secularstudents');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'omega');

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
define('AUTH_KEY',         'X<1)Po-OVL&?BK$<8sa 0iX@@*/Goj!b tV4O mDUqzQ0jIB)Qum`&u(4P-a2Fk{');
define('SECURE_AUTH_KEY',  '=/8MT%+*OsB6M0A=iU5IhP-1N%L0N+WK1f@Eaqd8=k{rMYf|tRH+PfKWBAcV_%+3');
define('LOGGED_IN_KEY',    '<BtYB&MI){^f=GooI~pYk$>K`tOlvgq@|+|d&cd5#`Yvn &l_)X+%|u[|#KG~%+o');
define('NONCE_KEY',        '<?2Ffp-m1|X.uL!]kmdJ`4+`M2Cu[e:k/epShFh*YX9 +naTUnrW_%wa$*ziPV|]');
define('AUTH_SALT',        '0+s<Q;p=[Wj!~Sjd`Fl/<qX?|Rl,^-T-j6XZ)9<xH#i:+oTS1zt=%+|[{/v45kt}');
define('SECURE_AUTH_SALT', '+c:7typfd-bzt&o5+3<b}OE^r+~|E-jpMD^8o(s1]a3V;Fc|#aln-4C1tR{Vd]0/');
define('LOGGED_IN_SALT',   'ffHU[3q3AhCj]Lv)J}4~P]y@JI7HL6*7c-27ISg&B|yEP@qf4(ij<| bHL3ukt4#');
define('NONCE_SALT',       'k+ UKeValR`-t& smE|u&=*6HEv|EXwAFS4+6a+ja%7c %nu@tUSLw~->wl{2$%E');

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
