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
define('DB_NAME', 'boxing');

/** MySQL database username */
define('DB_USER', 'da_admin');

/** MySQL database password */
define('DB_PASSWORD', 'TUViSEkV');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

# update in localhost by ftp
# define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '@`CmjUJtFvHN+Y1[i7K3K:<Xx#dW0BtJh]U!98Bj@ vQ3c-Km46Ioq+J-=L[{6ip');
define('SECURE_AUTH_KEY',  'tgz_3kf%q+T@3DVqh |.#0LQcJ 9kUCi|L1F/dN]|Gkl_3UfI#xhD0*xD-(|>U ^');
define('LOGGED_IN_KEY',    '2c#]h@1Tg/sBY7eF8/O-XJ`Fe/{dOIcH`e;+3z>:!W8=M:u7-/|#6z|VDxSht?mw');
define('NONCE_KEY',        'h=S#SM3*#+[,b*hr`)o-4}+BY<Ou%@ 25{5J;Zsc9TTK%iMY$@GjKXU7gM4d?pG=');
define('AUTH_SALT',        'w>znKITV|+F%xn:>-P((s<<12mq@I>8A2=E$aA|NRK|Bt:aO+b|)H,4|qQM5,+P%');
define('SECURE_AUTH_SALT', '/OSuv_eAjIuVK>O%=lpLf1bV<$KW5v|IP+ y>}Ea}@#f>pe2DA:pRryLfpV&*^v1');
define('LOGGED_IN_SALT',   'b5veFv$+t.n_hfY&dpaJ|;B.#n$o>WA4B170&5_U:l(i3:?Y9%c_fTT>RTef:7_L');
define('NONCE_SALT',       'T_eQ?>8aaF+V[Sx9>@_{mfi<H?l PTB/G{thLJ:yllOjmpF4h4RVFdMm%C$Nw2P?');

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
