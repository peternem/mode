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
//define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
//define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
//define('WP_CONTENT_URL', '/wp-content');
//define('DOMAIN_CURRENT_SITE', $_SERVER['HTTP_HOST']);
///** For local WP Dev instance only */
define('FS_METHOD','direct');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mod1330306111995');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '2467!@MaJa');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         ':XpE:tZBdWdx+~apWtC~2zu-~2]U|70[!GA~rVPaUGhyd?uPe0;O.rkht+MEob2g');
define('SECURE_AUTH_KEY',  '3@dh !Eyz|~F-GfW>q>Bc]BYNjt3ojtOtY]Q$x|^+d]S{aF+ulvxlTV()MpKnBN>');
define('LOGGED_IN_KEY',    'qL p)lm%,~|X`Uu0WK#o[S,Pag-+o%vXDky(.6vTM>A;g=?*Ax-<@0(/+MHF,^ba');
define('NONCE_KEY',        'PDoy6VuGiRwB3hwCz+{z<Vn$E_lnyJIs2?n^{!W2LVPrc*mBQ+y)Bj0).&60h|2P');
define('AUTH_SALT',        'h@|NIf9h38oa>X{|UAXj*ugpcp.)9p%S 5(0SnG&v:fZAB_@:($L7eBY;fbRJAJ/');
define('SECURE_AUTH_SALT', 'QHOA4ZWHd|{mI+9fq-_uf*$ee4}}&I[i8/nEa_y<R;&6#ZY7Q8OzkD7d5m#%;z&=');
define('LOGGED_IN_SALT',   '5ySoiSQ8oqf<_SI`S(%*;hP?g xeT-()4{K }s.@E|**:[HeOH?4541_V~SaM/hz');
define('NONCE_SALT',       'Ca;+$1v!/y,&Xp}d*:T=z,G|-Q0YD:2GGmvp?44v3n&r_m+Z<e9|fH+-lE%Y-xfJ');

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
//define( 'SAVEQUERIES', false);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
