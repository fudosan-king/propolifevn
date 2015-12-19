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
    <?php
        $post_id = get_post()->ID;
        $title_seo = get_field('title_seo', $post_id);
        $title_og = get_field('title_og', $post_id);
        $description_seo = get_field('description_seo', $post_id);
        $description_og = get_field('description_og', $post_id);
        $keywords = get_field('keywords', $post_id);
    ?>
    <?php if (($title_seo) && ($description_seo)) { ?>
        <title><?php echo $title_seo; ?></title>
        <meta property="og:title" content="<?php echo $title_og; ?>">
        <meta property="og:description" content="<?php echo $description_og; ?>">
        <meta name="description" content="<?php echo $description_seo; ?>">
        <meta name="keywords" content="<?php echo $keywords; ?>">
    <?php } else { ?>
        <title>ELTベトナム │ ホーチミン市の肉の総合商社 │ 精肉業者 </title>
        <meta property="og:title" content="ELTベトナム │ ホーチミン市の肉の総合商社 │ 精肉業者">
        <meta property="og:description" content="<?php _e( 'ベトナムホーチミン市至近に自社の加工工場を持つ、肉の総合商社ELT VIETNAM公式HPです。精肉業者として、新鮮なお肉を直接輸入し、業務用お肉の仕入れ向けからご家庭の食卓向けまで、手間なくすぐに使えるように加工をして、ご提供しております。', 'elt' ); ?>">
        <meta name="description" content="<?php _e( 'ベトナムホーチミン市至近に自社の加工工場を持つ、肉の総合商社ELT VIETNAM公式HPです。精肉業者として、新鮮なお肉を直接輸入し、業務用お肉の仕入れ向けからご家庭の食卓向けまで、手間なくすぐに使えるように加工をして、ご提供しております。', 'elt' ); ?>">
        <meta name="keywords" content="<?php _e( 'ホーチミン,ベトナム,精肉,和牛,豚肉,輸入,肉商社,肉仕入れ,加工工場,ELTベトナム,ELT VIETNAM', 'elt' ); ?>">
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

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-68373520-1', 'auto');
        ga('send', 'pageview');
    </script>

	<?php wp_head_customer(); ?>
</head>

<body <?php if (is_user_logged_in()) { echo 'class="user-logged-in"'; }?>>
<header>
    <div class="container">
    <div class="row top-row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" align="center">
        <h1 class="h1tag"><a href="<?php echo get_bloginfo('siteurl'); ?>" class="logo"><img src="<?php echo $template_directory; ?>/images/top-logo.png" class="img-responsive" alt="ベトナムホーチミン市至近に自社加工工場を持つお肉の総合商社ELT VIETNAMのクライアント様の声です。"></a></h1>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9">
    <div class="socials-top center-block" align="right">
    <div class="languageSelect"><?php echo qtrans_generateLanguageSelectCode(''); ?></div>

    <div class="socials_wrapper hidden-xs">
    <a href="https://www.facebook.com/ELT-VIET-NAM-COLTD-1539948359594705/timeline/" target="_blank"><i class="fa fa-facebook"></i></a>
    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
    <a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
    <a href="sms:08 6288 2008"><span class="hotline">08 3873 4081</span></a>
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