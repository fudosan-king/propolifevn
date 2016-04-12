<?php ob_start();global $lienhe;$lienhe = contactInfo();?>
<!doctype html>
<html lang="ja">
<head>
<?php get_sidebar('title-page');?>
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' );?>/bootstrap/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' );?>/css/animate.css" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php bloginfo( 'template_directory' );?>/js/jquery.easing.1.3.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
function imgLoaded(img){
    var imgWrapper = img.parentNode;
    imgWrapper.className += imgWrapper.className ? ' loaded' : 'loaded';
};
$(window).load(function() {$(".se-pre-con").fadeOut("slow");$(".view-effect").addClass('animated');});
</script>
<script src="<?php bloginfo( 'template_directory' );?>/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/js/jssor.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/js/jssor.slider.js"></script>


<?php wp_head();?>
</head>
<body>
<div class="se-pre-con"></div>
