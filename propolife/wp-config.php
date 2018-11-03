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
define('DB_NAME', 'wp_propolifevn');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost:3307');

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
define('AUTH_KEY',         'D~cJu6__qwF6=jV$ *9s&Z2CkA;>crz?.UY<;pn8g5 [R)T/|_p_CpA:O51;;Z]3');
define('SECURE_AUTH_KEY',  '-VN }XI>MQ@zGqT%w:.y8Kbf13TCAd^[j7<r:7n%D;0%,j/mJu-HW&D,;Z?2@JGO');
define('LOGGED_IN_KEY',    'S?`:[wSajz4lMDJ7cFl_|0xv]L&rz+)m0OskW;.3hw7;,p>y+N!>wsDyXB:))`z/');
define('NONCE_KEY',        ';:Sq*qXNKxdtH$I9%pC>sZ ]CL;7J`Pd}t[KdlXWgC9g&bJ8Od}QALDN<gR`];`f');
define('AUTH_SALT',        'ThF8osXnjDG&r& D%oY06&EjM`o3+R8Fr(m2/,bVfW.;s0WWqT)KLc+<]n?1lu<p');
define('SECURE_AUTH_SALT', 'n<+=Iy9{S[WdqJED[XNJV= }2SjuJeXF^8vmOSnH`j:2n/F1miq(M#F@KL.vbWoY');
define('LOGGED_IN_SALT',   'Zlg@_sTKNo0?Xo3t{b,&4UikFixhOZ)>0shrf$T:y sSWF?#)PV*NTy6oJ%;E}|p');
define('NONCE_SALT',       'kVe#b[_PyAJpCd8$jFkm,X)a`<e6(LL0BWGtuoY 2*TAYae8I,OF#.}&mL$+#p+,');

define('WP_POST_REVISIONS', false );
define('FS_METHOD',        'direct');
define('WP_SITEURL',       'http://propolifevietnam.test');
define('WP_HOME',          'http://propolifevietnam.test');

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
