<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Boxing
 * @since Boxing
 */
?><!DOCTYPE html>
<?php
$template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());
?>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="icon" href="<?php echo $template_directory ?>/images/favico.gif" type="image/gif" sizes="16x16">
    <?php if (get_bloginfo('language_code') == 'ja') { ?>
        <?php if (is_home()) { ?>
            <title>サムライボクシングジム | ベトナムホーチミン市ボクシングエクササイズジム</title>
            <meta property="og:title" content="サムライボクシングジム | ベトナムホーチミン市ボクシングエクササイズジム">
            <meta property="og:description" content="ベトナムホーチミン市のボクシングエクササイズ、サムライボクシングジム公式HPです。スポーツジムやフィットネスクラブをお考えの方も是非ボクシングエクササイズもご検討ください。何かスポーツを始めてみたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="ベトナムホーチミン市のボクシングエクササイズ、サムライボクシングジム公式HPです。スポーツジムやフィットネスクラブをお考えの方も是非ボクシングエクササイズもご検討ください。何かスポーツを始めてみたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif (is_page( 112 ) || is_page( 116 ) || is_page( 114 )) { ?>
            <title>コースについて | ホーチミン市ボクシングエクササイズ</title>
            <meta property="og:title" content="コースについて | ホーチミン市ボクシングエクササイズ">
            <meta property="og:description" content="ベトナムホーチミン市でスポーツジムやフィットネスクラブをお考えの方、是非ボクシングエクササイズもご検討ください！サムライボクシングジムでは、皆様の目的に合わせてご利用頂けるように沢山のコースをご用意しております。">
            <meta name="description" content="ベトナムホーチミン市でスポーツジムやフィットネスクラブをお考えの方、是非ボクシングエクササイズもご検討ください！サムライボクシングジムでは、皆様の目的に合わせてご利用頂けるように沢山のコースをご用意しております。">
            <meta name="keywords" content="スポーツジム,フィットネスクラブ,ジム,ホーチミン,ベトナム,ホーチミン市,サムライボクシングジム,格闘技,ダイエット">
        <?php } elseif (is_page( 70 ) || is_page( 72 ) || is_page( 74 )) { ?>
            <title>レッスンビデオ | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="レッスンビデオ | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="ベトナムホーチミン市でスポーツジムやフィットネスクラブをお考えの方、是非ボクシングエクササイズもご検討ください！各コースの様子、ゲストとして現役プロ元日本ライト級チャンピオン黒田氏がお越しくださった時のスパーリングの様子、ボクシングWEBレッスンを公開しております。">
            <meta name="description" content="ベトナムホーチミン市でスポーツジムやフィットネスクラブをお考えの方、是非ボクシングエクササイズもご検討ください！各コースの様子、ゲストとして現役プロ元日本ライト級チャンピオン黒田氏がお越しくださった時のスパーリングの様子、ボクシングWEBレッスンを公開しております。">
            <meta name="keywords" content="スポーツジム,フィットネスクラブ,ジム,ホーチミン,ベトナム,ホーチミン市,サムライボクシングジム,格闘技,ダイエット">
        <?php } elseif (is_page( 257 ) || is_page( 89 ) || is_page( 96 )) { ?>
            <title>私たちについて | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="私たちについて | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="ベトナムホーチミン市のサムライボクシングジムからのご挨拶です。ベトナムにボクシングを広めたい、単純にそんな思いで、このサムライボクシングジムを開業いたしました。川崎新田ボクシングジムと業務提携し、日本の楽しめるボクシングエクセサイズとプロのボクシングトレーニングを取り入れております。">
            <meta name="description" content="ベトナムホーチミン市のサムライボクシングジムからのご挨拶です。ベトナムにボクシングを広めたい、単純にそんな思いで、このサムライボクシングジムを開業いたしました。川崎新田ボクシングジムと業務提携し、日本の楽しめるボクシングエクセサイズとプロのボクシングトレーニングを取り入れております。">
            <meta name="keywords" content="サムライボクシングジム,ホーチミン,ベトナム,ジム,スポーツジム,フィットネスクラブ,ホーチミン市,格闘技,ダイエット">
        <?php } elseif (is_page( 52 ) || is_page( 48 ) || is_page( 50 )) { ?>
            <title>コンタクト | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="コンタクト | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="ベトナムホーチミン市のサムライボクシングジムへのお問い合わせページです。ご見学、入会に関するご質問、体験レッスンのお申し込み日などお気軽にお問い合わせ下さい。">
            <meta name="description" content="ベトナムホーチミン市のサムライボクシングジムへのお問い合わせページです。ご見学、入会に関するご質問、体験レッスンのお申し込み日などお気軽にお問い合わせ下さい。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif (is_page( 824 ) || is_page( 827 ) || is_page( 829 )) { ?>
            <title>最近の出来事 | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="最近の出来事 | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="ベトナムホーチミン市にあるサムライボクシングジムの最近の出来事を綴っております。サムライボクシングジムは、日ごろの運動不足を解消したい、理想の体型を目指したい、何かスポーツを始めてみたいなどフィットネス目的の方から本格的にボクシングをしたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="ベトナムホーチミン市にあるサムライボクシングジムの最近の出来事を綴っております。サムライボクシングジムは、日ごろの運動不足を解消したい、理想の体型を目指したい、何かスポーツを始めてみたいなどフィットネス目的の方から本格的にボクシングをしたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) and is_single( 527 )) { ?>
            <title>マイクラス | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="マイクラス | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="マイクラスは、ご家族や男女の友達とのクラスレッスンコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="マイクラスは、ご家族や男女の友達とのクラスレッスンコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
         <?php } elseif ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) and is_single( 836 )) { ?>
            <title>マイクラス | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="マイクラス | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="アーリー・バードは、朝ジムに来られる方の自主トレーニングコースです。スポーツをして運動不足を解消したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂けるトレーニングをして頂けます。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="アーリー・バードは、朝ジムに来られる方の自主トレーニングコースです。スポーツをして運動不足を解消したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂けるトレーニングをして頂けます。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) and is_single( 517 )) { ?>
            <title>ユースフォーエバー | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="ユースフォーエバー | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="ユース・フォーエバーは、女性用週2回のクラスレッスンコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="ユース・フォーエバーは、女性用週2回のクラスレッスンコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) and is_single( 423 )) { ?>
            <title>プラチナコース | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="プラチナコース | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="プラチナコースは自分のペースで練習ができるコースです。サムライボクシングジムは、日ごろの運動不足を解消したい、理想の体型を目指したい、何かスポーツを始めてみたいなどフィットネス目的の方から本格的にボクシングをしてみたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="プラチナコースは自分のペースで練習ができるコースです。サムライボクシングジムは、日ごろの運動不足を解消したい、理想の体型を目指したい、何かスポーツを始めてみたいなどフィットネス目的の方から本格的にボクシングをしてみたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) and is_single( 419 )) { ?>
            <title>ゴールデンコース | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="ゴールデンコース | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="ゴールデンコースは、自分の生活ペースでクラスレッスンを集中して行える特別なコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンがお好きな時間に予約でき、月に何回でも受けて頂けます。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="ゴールデンコースは、自分の生活ペースでクラスレッスンを集中して行える特別なコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンがお好きな時間に予約でき、月に何回でも受けて頂けます。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) and is_single( 414 )) { ?>
            <title>ジェントルマンコース | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="ジェントルマンコース | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="ジェントルマンコースは、男性用クラスレッスンコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="ジェントルマンコースは、男性用クラスレッスンコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) and is_single( 410 )) { ?>
            <title>レディースコース | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="レディースコース | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="レディースコースは、女性用クラスレッスンコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="レディースコースは、女性用クラスレッスンコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) and is_single( 406 )) { ?>
            <title>キッズコース | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="キッズコース | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="キッズコースは、小学生までの子供のクラスレッスンコースです。何かスポーツを始めたい、本格的にボクシングをしてみたいなど、初めてボクシングエクササイズを体験するお子様に、安全で効果がある1回60分のクラスレッスンを楽しんで頂いております。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="キッズコースは、小学生までの子供のクラスレッスンコースです。何かスポーツを始めたい、本格的にボクシングをしてみたいなど、初めてボクシングエクササイズを体験するお子様に、安全で効果がある1回60分のクラスレッスンを楽しんで頂いております。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) and is_single( 402 )) { ?>
            <title>学生コース | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="学生コース | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="学生コースは、中学生から～大学生までのクラスレッスンコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="学生コースは、中学生から～大学生までのクラスレッスンコースです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂ける1回60分のクラスレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) and is_single( 155 )) { ?>
            <title>ボクサーコース | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="ボクサーコース | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="ボクサーコースは選手育成コースです。専任トレーナーの指導のもとで、プロになる為のトレーニングを行って頂くコースです。サムライボクシングジムは、日ごろの運動不足を解消したい、理想の体型を目指したい、何かスポーツを始めてみたいなどフィットネス目的の方から本格的にボクシングをしてみたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="ボクサーコースは選手育成コースです。専任トレーナーの指導のもとで、プロになる為のトレーニングを行って頂くコースです。サムライボクシングジムは、日ごろの運動不足を解消したい、理想の体型を目指したい、何かスポーツを始めてみたいなどフィットネス目的の方から本格的にボクシングをしてみたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } elseif (in_category( 'NEWS-VN' ) || in_category( 'NEWS-EN' ) || in_category( 'チャート' )) { ?>
            <title>最近の出来事 | ホーチミン市サムライボクシングジム</title>
            <meta property="og:title" content="最近の出来事 | ホーチミン市サムライボクシングジム">
            <meta property="og:description" content="サムライボクシングジムの最近の出来事を綴っております。サムライボクシングジムは、日ごろの運動不足を解消したい、理想の体型を目指したい、何かスポーツを始めてみたいなどフィットネス目的の方から本格的にボクシングをしてみたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="サムライボクシングジムの最近の出来事を綴っております。サムライボクシングジムは、日ごろの運動不足を解消したい、理想の体型を目指したい、何かスポーツを始めてみたいなどフィットネス目的の方から本格的にボクシングをしてみたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } else { ?>
            <title><?php wp_title( '|', true, 'right' ); ?></title>
            <meta property="og:title" content="サムライボクシングジム | ベトナムホーチミン市ボクシングエクササイズジム">
            <meta property="og:description" content="サムライボクシングジムは、日ごろの運動不足を解消したい、理想の体型を目指したい、何かスポーツを始めてみたいなどフィットネス目的の方から本格的にボクシングをしてみたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="サムライボクシングジムは、日ごろの運動不足を解消したい、理想の体型を目指したい、何かスポーツを始めてみたいなどフィットネス目的の方から本格的にボクシングをしてみたいという方までご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="ボクシング,サムライボクシングジム,ホーチミン,ベトナム,スポーツジム,フィットネスクラブ,ジム,ホーチミン市,格闘技,ダイエット">
        <?php } ?>

    <?php } ?>

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
    <?php
    if (is_home()){
    ?>
    <script>
        jQuery(function ($) {
            var _SlideshowTransitions = [{ $Duration: 1200, $Opacity: 2 }];
            var options = {
                $FillMode:2,
                $AutoPlay: true,
                $AutoPlayInterval: 2000,
                $PauseOnHover: 1,
                $ArrowKeyNavigation: true,
                $SlideEasing: $JssorEasing$.$EaseOutQuint,
                $SlideDuration: 800,
                $MinDragOffsetToSlide: 20,
                $SlideSpacing: 0,
                $DisplayPieces: 1,
                $ParkingPosition: 0,
                $UISearchMode: 1,
                $PlayOrientation: 1,
                $DragOrientation: 1,
                    $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: _SlideshowTransitions,
                    $TransitionsOrder: 1,
                    $ShowLink: true
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$,
                    $ChanceToShow:2,
                    $AutoCenter: 1,
                    $Steps: 1,
                    $Lanes: 1,
                    $SpacingX: 8,
                    $SpacingY: 8,
                    $Orientation: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,
                    $ChanceToShow:0,
                    $AutoCenter: 2,
                    $Steps: 1
                }
            };

            var jssorslider = new $JssorSlider$("slider", options);
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssorslider.$ScaleWidth(Math.min(bodyWidth, 1900));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
        });
    </script>
    <?php
    }
    if (!is_page( 70 ) && !is_page( 72 ) && !is_page( 74 )){
    ?>
    <script>
        jQuery(function ($) {
            var options = {
                $AutoPlay:true,
                $AutoPlaySteps:4,
                $AutoPlayInterval: 4000,
                $PauseOnHover: 1,
                $ArrowKeyNavigation: true,
                $SlideDuration: 160,
                $MinDragOffsetToSlide: 20,
                $SlideWidth:150,
                //$SlideHeight: 150,
                $SlideSpacing:20,
                $DisplayPieces:8,
                $ParkingPosition: 0,
                $UISearchMode: 1,
                $PlayOrientation: 1,
                $DragOrientation: 1,
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$,
                    $ChanceToShow:0,
                    $AutoCenter: 1,
                    $Steps:4,
                    $Lanes: 1,
                    $SpacingX: 0,
                    $SpacingY: 0,
                    $Orientation: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,
                    $ChanceToShow:0,
                    $AutoCenter: 2,
                    $Steps: 4
                }
            };

            var jssorCat = new $JssorSlider$("sliderCat", options);
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth-30;
                if (bodyWidth)
                    jssorCat.$ScaleWidth(Math.min(bodyWidth, 1900));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
        });
    </script>
    <?php
    }
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.fancybox-buttons').fancybox({
                openEffect  : 'elastic',
                closeEffect : 'elastic',
                prevEffect : 'elastic',
                nextEffect : 'elastic',
                closeBtn  : false,
                helpers : {
                    title : {
                        type : 'inside'
                    },
                    buttons : {}
                },
                afterLoad : function() {
                    this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
                }
            });
        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-68375920-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>

<body <?php if (is_page('Detail') || is_home() || is_single()){ echo 'class="body-parttern"';} body_class(); ?>>

<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <h1 class="h1tag"><a class="navbar-brand" href="<?php echo get_bloginfo('siteurl'); ?>"><img src="<?php echo( get_header_image() ); ?>" width="320" height="94" class="img-responsive" alt="サムライボクシングジムは、ベトナムホーチミン市の日系ボクシングジムです。"></a></h1>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <?php
                    $defaults = array(
                        'theme_location'  => 'primary',
                        'menu'            => '',
                        'container'       => 'div',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'menu-header',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav navbar-right %2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    );
                    wp_nav_menu( $defaults );
                ?>
            </div>
        </div>
    </nav>
</header>

<div class="container navbar-fixed-top">
    <ul class="select-lang">
    <?php
        pll_the_languages( array(
           'show_flags' => 1,
           'dropdown' => 0,
           'show_names' => 0,
    ));
    ?>
    </ul>
</div>
