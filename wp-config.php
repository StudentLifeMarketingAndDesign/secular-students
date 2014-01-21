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
define('DB_NAME', 'secularsDBamatl');

/** MySQL database username */
define('DB_USER', 'secularsDBamatl');

/** MySQL database password */
define('DB_PASSWORD', 'n0Kpm07MJX');

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
define('AUTH_KEY',         'jMyq3bq2X*t6i;2a.+9m5ae#}zCr0Yc}Y@r7c,U$Fuf,X$.M+mX.<P+H;e#PT_L');
define('SECURE_AUTH_KEY',  'tata-Ghd~OW!Ook1Vd[Vw40R@0UvFnY>Qb$Muj,Xj.U+q{eq6b.xEm]Di]*Lt1De5');
define('LOGGED_IN_KEY',    'atl5Wl[W-~CKw1hZzKR@Jk[}NY^Nrj>Bg3UIqAb<HiX*PW+Ote#Wx_l9Zl#d~o4gs');
define('NONCE_KEY',        '0!N8v@7nYJrBc^X,EAn<Ab{KOW_Opl#Sd|Rwo:~g:4g}!Jv!Nvj,c$>U$r{fq7b');
define('AUTH_SALT',        ']#99Gh9[K!COoGgV@JowNoc}7k,^Bn<3{b$]b+x2eqDi.+9lxKpa#St-o[!Rs|Rv0');
define('SECURE_AUTH_SALT', 'O1[Wd~Rwl8d~[c@o4gs}g,vJU$BInE,$ITuMm{.Pb+Tti6We;WLlDh_;h_w@BJkB');
define('LOGGED_IN_SALT',   ';+HWxHld~Ow_Ct4[V@[V-s:Z|}c@vFgz3j,^Br3EAu*Lqi.Pi_Ttp]Wp]a+tDdw1h');
define('NONCE_SALT',       'hPW~K9s:5a1SGo8Gh8ZNvFJzr}Yr}c@vFgy3j,^Mn*AqiPb.PEm6Wi]aLt9ep1hS~');

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
define('WP_DEBUG', false);define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
