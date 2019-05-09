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
define('DB_NAME', 'wp_buying_aodaihousing');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '5fZ7mcBSZ2L:s![p');

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
define('AUTH_KEY',         '4c3C#,GZ|V^c1_#K`fs hmN]TWdH*YbtA*?M~O-,##Q^p~G+d!es59(4*,fV-m%>');
define('SECURE_AUTH_KEY',  'dhq5*DE80*(Tp.Vwb|e)G+#`>a%HTm{.OTj&Ib8oP.I-d$k:aX:(5P<@*oZWTDab');
define('LOGGED_IN_KEY',    '0QB8f=qxlps0e(05J6 qwY4h9=Cd$[Pwihe`zLlij2^ AKNYq](k6q,_a)us}[C~');
define('NONCE_KEY',        '%_jK1-4=iY1+>9/S06@[7AJ+}CLrj<p,K[_Z7*`D32VZ&tW@C%JNF(3r^OOqDf[0');
define('AUTH_SALT',        'RlJZ4T9Np!<&{yBvK4?PA`tSun?a:n.Kq5635uKD_K0hq*,RRn9j+bxrRSI`B[QF');
define('SECURE_AUTH_SALT', 'PK[|roidl%=mkF:W({h bu6v#yW6XK&T6(7J2o-FT*#SJ#ds17,1vIvNy;m>6F:V');
define('LOGGED_IN_SALT',   'd%bzg`uGbj,a)tM$}?Jq+9W:~H1lB?@<B^c}^<VhX`CM!MNG47.F(H8eV1{)auPF');
define('NONCE_SALT',       '.E[hbKY{(:%#6&PAgx/HsG7FiV>eKDrV $|a>HOzrp0HI[aJ:^QeWRAw3S`YdTpK');

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
