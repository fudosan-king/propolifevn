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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_kyowakiden');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'f4P<CPDbEt:H:80/Y/m;Rj<3qM5ko:`}=7Na5^&CCz{.y`URx=$Iw{s,bK,SQ?zd');
define('SECURE_AUTH_KEY',  'YW-+NcQ~~zUob,Dc8>8`/1aA`Vcp]jz_yd;hKNy/`)agR1&]!!S3cb7=n9,[f{]7');
define('LOGGED_IN_KEY',    'Uu;;u-(L2(S2IL-eUF/LEJy7#}]JGHk}a+p{[!.KwjLvSD8%7|i>WJbVV 0}^)5.');
define('NONCE_KEY',        '(Bp@P%u`vrVE-4ak*8Mo8,q!,>!us[9LJ(>Df~.dbIO/GWir&h<QRMJ~RH$->#jL');
define('AUTH_SALT',        'DP#Dp t3[p;(Y73B0eC.^>||n^A:dFA],e94|x5lpw%5i8z8[[oF|CB5l3fD04^+');
define('SECURE_AUTH_SALT', 'X+wy|mR,`9cn*LA=u)$+tpgrF&5u6:u:c@p=6T+Hoq0d#+xpaT(pz-v|s&IK?iY#');
define('LOGGED_IN_SALT',   'p~@,2C+<mj4t$cT*4hHk|!t9k/Iwf[51~_AR6n2,:-uVH14Tl{3>(N6gS(VTxyL$');
define('NONCE_SALT',       'mK1-5Oga>/tHQ?rqrJyE-qv1Odi-e}fgqf:_kSMJeW4k}DC#zK1V#&4{ka{Kepz{');

define('WP_POST_REVISIONS', false );
define('FS_METHOD',        'direct');
define('WP_SITEURL',       'http://kyowakidenvn.test');
define('WP_HOME',          'http://kyowakidenvn.test');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
