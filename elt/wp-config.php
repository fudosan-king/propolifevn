<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

// Locahost
// define('DB_NAME', 'elt');
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');
// define('DB_HOST', '127.0.0.1');
// define('MY_TEXTDOMAIN', 'my_domain');

// Server
define('DB_NAME', 'eltvncom_elt');
define('DB_USER', 'eltvncom_elt');
define('DB_PASSWORD', '04ZCyl!$');
define('DB_HOST', 'localhost');
define('MY_TEXTDOMAIN', 'my_domain');

// define('DB_NAME', 'eltvn');
// define('DB_USER', 'da_admin');
// define('DB_PASSWORD', 'TUViSEkV');
// define('DB_HOST', '103.54.250.108:3306');
// define('MY_TEXTDOMAIN', 'my_domain');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

define('WP_MEMORY_LIMIT','256M');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

# update in localhost by ftp
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'u;RH@M|(u/N.W#6yo7X*jS:R>@-&g4D+-fg2Q_ ka#mted@+BK84o;-N=+5:;p@s');
define('SECURE_AUTH_KEY',  '2GK)sP[?v:yYEVuP/>@S89/- y{f-6kve(lb](<#T _+tQLfTHGrL#^Tw] nPkS}');
define('LOGGED_IN_KEY',    '1qfCY>:S~nvPcr!9PC]:4gpog7+Wp$:i(d?BObu)oxQm-g~:x8dH_zudL|osMpl%');
define('NONCE_KEY',        'y!(ueI5~C$!5!6salC1%8W0LNQuPuIY i<pW/(FQmQ0K}ZTJ}-fu%Q_Aggh?>.SQ');
define('AUTH_SALT',        'O.It[FfEt&#~-F74 RmcX2W;@I4?Vk70P!3RE|f]|G_ION{b0E)9=Yo@LlTLZ$6Q');
define('SECURE_AUTH_SALT', '?9A4s1cliiA0g9}Pizy;%dWK|KTmLSdO@9b d8$<S6_/4`pju;qhyWFKV:~UNs_@');
define('LOGGED_IN_SALT',   'i/v%fZjt=`+}&j1 h4[3G=PBGsrXwP7>;N^{b#FglkxGN5s9_S0ybu_/t32|@?Tc');
define('NONCE_SALT',       'd9l!9*g7@;xr+R&YK>^`cr:jxs)+d1{Ma<4g4taw;?Su?d6B>|]mjLIO;h*@U:CS');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
