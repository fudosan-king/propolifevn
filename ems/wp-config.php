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

//server
define('DB_NAME', 'ems');
define('DB_USER', 'da_admin');
define('DB_PASSWORD', 'TUViSEkV');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('FS_METHOD','direct');


// locahost
// define('DB_NAME', 'ems');
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');
// define('DB_HOST', 'localhost');
// define('DB_CHARSET', 'utf8');
// define('DB_COLLATE', '');
// define('FS_METHOD','direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-4P?G0rz7ntgK8H;sTS4-HH^G%<Wo%$>ERZ)C(0:$_Fzb;!:4tC%7aYO06[Z>K5&');
define('SECURE_AUTH_KEY',  'tqWp<)~b|eue6i}[{Vi|9/:3c+!syPLd_Gwx0hqH$WQW|W-:tvJ={;pWI0/-2<kM');
define('LOGGED_IN_KEY',    'C4o7+k+/6IW8Lx2?0.0J%s_WssO4+M&g7mq7%4P8r9P1J2L&^VHrfC#M|DB`q~mp');
define('NONCE_KEY',        '$8IO8$,!:66V$r @]vduFx):gMk+Lx7V%O0M;s1yVY`iFR:EY!2cR:4X/~li:~ty');
define('AUTH_SALT',        '4|1Ht/{npNdH]w/,33] fh|QhpH-TnF?aw}5pep[7d8urB$A M)-tfFND)L_I$cs');
define('SECURE_AUTH_SALT', '+q1GLLzPWk]V|~H}Tz F,hy}m }&5`yyln.W,J||HK<%`L|X3*!#nL-x{Y5f<hJO');
define('LOGGED_IN_SALT',   '^<WG}g|C6ZY1VDTD=_eVRwt?Wq)N^n*]p|AuSC]%;I2D+qh<RQ[h*zZ+%Gz+xyeP');
define('NONCE_SALT',       'wp]_Qex_6gl>X>$j|iQT4bu?~~f_}+a,a+%ZC{giUk>zOxO6<t)7FyX(-|V41%xo');

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
