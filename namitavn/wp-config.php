<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'kir824922_namitavn');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'kir824922');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'dtg-pz2-KNB-FLQ');

/** MySQL のホスト名 */
define('DB_HOST', 'mysql56s-21.kagoya.net');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '} &P?z9~s?D4C{Y,9r!NiYMix:S&Dk3OyPX{|$e3y/LI.fET3R&AYt#A<+tGprnL');
define('SECURE_AUTH_KEY',  'gs|8B6L4+FcwN-urFIE6%izZ}+=JapUs/{&1c&oHDJ9mUC?_{wlm}I{F<gw0]D`_');
define('LOGGED_IN_KEY',    'L7v QmM,ae/jeVx}ybK>b^#)7L&A%a1Xj45Am^|O?G/MYJc0OY@-f;;&&ES3j~2F');
define('NONCE_KEY',        '#(t[%;+18-$C<)=o&}`LkMHcN1kfa:yqOaV,<3N ;g|PuWy !ATOjh]N|7@5uFcm');
define('AUTH_SALT',        '-WiE1o2FPFFE{v]ub/TDrO6H#npa0 9Hl)p]UBiEtKEQ#Wc!7xN~)/s1ak|4`brB');
define('SECURE_AUTH_SALT', 'dM|Kf~;a*G#MeL:gBV~XBe>YH!v,L-q8a^M]PxT4e;5@*x}MMg44u.LiEVk(]hRG');
define('LOGGED_IN_SALT',   'D+<+/p#Z|983ldXrU|aZtE`uq;z;>dUwC-o,U~`s}`GKF,zW!Z]dU(6 vdjZ{Rcl');
define('NONCE_SALT',       '%=T#)&mOu|&SV7mQ:y[zWBFKV>%hK>:6wLkU}Ry8&t69pC)8t-h f@Nzj9?#MJ6m');

// define('WP_HOME', 'http://www.namita-vn.com');
// define('WP_SITEURL', 'http://www.namita-vn.com');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
