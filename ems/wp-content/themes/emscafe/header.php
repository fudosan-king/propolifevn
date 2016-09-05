<?php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php ob_start();@session_start();global $lienhe;$lienhe = contactInfo();?>
<!doctype html>
<html>
<head>
<?php get_sidebar('title-page');?>
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' );?>/bootstrap/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' );?>/css/jquery.mCustomScrollbar.css">
<link href='https://fonts.googleapis.com/css?family=Alex+Brush' rel='stylesheet' type='text/css'>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="<?php bloginfo( 'template_directory' );?>/js/jquery-2.1.3.js"></script>
<script src="<?php bloginfo( 'template_directory' );?>/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/js/jssor.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/js/jssor.slider.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/js/functions.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/js/cart.js"></script>
<?php wp_head();?>

</head>