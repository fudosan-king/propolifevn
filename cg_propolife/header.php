<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<link rel="apple-touch-icon" sizes="152x152" href="/wp-content/themes/cg_propolife/favicon_package_v0.16/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/cg_propolife/favicon_package_v0.16/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/cg_propolife/favicon_package_v0.16/favicon-16x16.png">
	<link rel="manifest" href="/wp-content/themes/cg_propolife/favicon_package_v0.16/site.webmanifest">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed&display=swap&subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="/wp-content/themes/cg_propolife/css/fontawesome-pro-5.7.0-web/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.css">
	<link rel="stylesheet" href="https://unpkg.com/flickity-fade@1/flickity-fade.css">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="/wp-content/themes/cg_propolife/photo_sphere_viewer/dist/photo-sphere-viewer.min.css">
	<link rel="stylesheet" href="/wp-content/themes/cg_propolife/css/bsnav.min.css">
	<link rel="stylesheet" href="/wp-content/themes/cg_propolife/css/styles.css" type="text/css">
	<link rel="stylesheet" href="/wp-content/themes/cg_propolife/css/mobile.css" type="text/css">
	<?php if (is_user_logged_in()) { ?>
	<style type="text/css">
		html, body {
			top: -16px;
		}
	</style>
	<?php } ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PD9555V');</script>
	<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PD9555V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<div id="page" class="site">

	<?php require 'menu.php'; ?>

	<?php if (is_front_page()) {
		require 'banner-homepage.php';
	} ?>

	<main>
