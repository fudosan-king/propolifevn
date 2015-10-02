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
$template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
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
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php if (is_page( 35 )) { ?>
        <meta property="og:title" content="<?php _e( '私達について│ELT VIETNAM', 'elt' ); ?>">
    <?php } elseif (is_page( 38 )) { ?>
        <meta property="og:title" content="<?php _e( '私達のサービス│ELT VIETNAM', 'elt' ); ?>">
    <?php } elseif (is_page( 40 )) { ?>
        <meta property="og:title" content="<?php _e( 'クライアント│ELT VIETNAM', 'elt' ); ?>">
    <?php } elseif (is_page( 122 )) { ?>
        <meta property="og:title" content="<?php _e( 'ELT VIETNAM│肉の総合卸・輸出入・加工・販売', 'elt' ); ?>">
    <?php } elseif (is_page( 42 )) { ?>
        <meta property="og:title" content="<?php _e( 'ELT VIETNAM│肉の総合卸・輸出入・加工・販売', 'elt' ); ?>">
    <?php } else {?>
        <meta property="og:title" content="<?php _e( 'ELT VIETNAM│肉の総合卸・輸出入・加工・販売', 'elt' ); ?>">
    <?php } ?>
    <meta property="og:description" content="<?php _e( 'ELTVIETNAMでは日系品質で管理された新鮮な肉を飲食店様、スーパー様の業務用から個人向けまでご希望の加工を施してご提供しております。', 'elt' ); ?>">
    <meta name="description" content="<?php _e( 'ELTVIETNAMでは日系品質で管理された新鮮な肉を飲食店様、スーパー様の業務用から個人向けまでご希望の加工を施してご提供しております。', 'elt' ); ?>">
    <meta name="keywords" content="<?php _e( 'ホーチミン,ベトナム,ELT,VIETNAM,和牛,牛肉,豚肉,加工,工場,肉', 'elt' ); ?>">

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head_customer(); ?>
</head>

<body <?php if (is_user_logged_in()) { echo 'class="user-logged-in"'; }?>>
<header>
    <div class="container">
    <div class="row top-row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" align="center"><a href="<?php echo get_bloginfo('siteurl'); ?>" class="logo"><img src="<?php echo $template_directory; ?>/images/top-logo.png" class="img-responsive"></a></div>
    <div class="col-lg-9 col-md-9 col-sm-9">
    <div class="socials-top center-block" align="right">
    <div class="languageSelect"><?php echo qtrans_generateLanguageSelectCode(''); ?></div>

    <div class="socials_wrapper hidden-xs">
    <a href="https://www.facebook.com/ELT-VIET-NAM-COLTD-1539948359594705/timeline/" target="_blank"><i class="fa fa-facebook"></i></a>
    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
    <a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
    <a href="sms:08 6288 2008"><span class="hotline">08 6288 2008</span></a>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="topmenu">
    <nav class="navbar navbar-default">
    <div class="container">
    <div class="row">
    <div class="col-lg-12">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="navbar-collapse">
    <ul class="nav navbar-nav">
    <li <?php if (is_home()) { echo 'class="active"';} ?>><a href="<?php echo get_bloginfo('siteurl'); ?>"><?php _e( 'ホーム', 'elt' ); ?></a></li>
    <li <?php if (is_page( 35 )) { echo 'class="active"';} ?>><a href="<?php echo get_bloginfo('siteurl'); ?>/?page_id=35"><?php _e( '私達について', 'elt' ); ?></a></li>
    <li id="blockCategory" <?php if (is_product_category() || is_product() ) { echo 'class="active"';} ?>>
    <a href="javascript:void(0)"><?php _e( 'プロダクト', 'elt' ); ?></a>
    <ul>
    <?php
        $args = array(
            'number'     => $number,
            'orderby'    => $orderby,
            'order'      => $order,
            'hide_empty' => $hide_empty,
            'include'    => $ids
        );

        $product_categories = get_terms( 'product_cat', $args );
        foreach ($product_categories as $product_categorie) {
            echo '<li><a href="' . get_bloginfo('url') . '/?product_cat=' . $product_categorie->slug . '">' . $product_categorie->name . '</a></li>';
        }

    ?>
    </ul>
    </li>
    <li <?php if (is_page( 38 )) { echo 'class="active"';} ?>><a href="<?php echo get_bloginfo('siteurl'); ?>/?page_id=38"><?php _e( '私たちのサービス', 'elt' ); ?></a></li>
    <li <?php if (is_page( 40 )) { echo 'class="active"';} ?>><a href="<?php echo get_bloginfo('siteurl'); ?>/?page_id=40"><?php _e( 'クライアント', 'elt' ); ?></a></li>
    <li <?php if (is_page( 122 )) { echo 'class="active"';} ?>><a href="<?php echo get_bloginfo('siteurl'); ?>/?page_id=122"><?php _e( 'メッセージ', 'elt' ); ?></a></li>
    <?php if (is_user_logged_in()) { ?>
        <li <?php if (is_page( 141 )) { echo 'class="active"';} ?>><a href="<?php echo get_bloginfo('siteurl'); ?>/?page_id=141"><?php _e( '品質', 'elt' ); ?></a></li>
    <?php } ?>
    <li <?php if (is_page( 42 )) { echo 'class="active"';} ?>><a href="<?php echo get_bloginfo('siteurl'); ?>/?page_id=42"><?php _e( 'お問い合わせ', 'elt' ); ?></a></li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    </nav>
    </div>
</header>