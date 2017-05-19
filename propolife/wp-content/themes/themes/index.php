<?php ob_start();global $lienhe;$lienhe = contactInfo();$hl = explode(';',$lienhe['dienthoai']);?>
<!doctype html>
<html class="no-js" lang="ja">
<head>
<?php get_sidebar('title-page');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" rel="stylesheet" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>$(window).load(function() {$(".se-pre-con").fadeOut("slow");});</script>
<?php include('content-scripts-index.php');?>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PF7LZC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PF7LZC');</script>
<!-- End Google Tag Manager -->
</head>

<body class="home">
<div class="se-pre-con"></div>

<div>
<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2 hidden-sm hidden-xs proCol">&nbsp;</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 proCol" align="left">
<div class="optical logo" align="left">
<h1>
<a href="<?php echo get_permalink(get_page_by_path('about'));?>">
<img width="316" height="54" src="<?php bloginfo( 'template_directory' );?>/images/logo-toppage.png" class="img-responsive wp-post-image" alt="logo-propolife" title="logo-propolife" srcset="<?php bloginfo( 'template_directory' );?>/images/logo-toppage.png" sizes="(max-width: 316px) 100vw, 316px">
<?php
// $imgInfo = get_post( get_post_thumbnail_id(1));
// $caption=nl2br(str_replace(' ', '&nbsp;',$imgInfo->post_excerpt));
// $imgTitle = $imgInfo->post_title;
// $imgAlt = get_post_meta(get_post_thumbnail_id(1), '_wp_attachment_image_alt', true);
// echo get_the_post_thumbnail(1,'full',array('class'=>'img-responsive','alt'=>$imgAlt,'title'=>$imgTitle));
?>
</a>
</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 hidden-sm hidden-xs proCol">&nbsp;</div>
</div>

<div class="row">
<div class="col-lg-2 col-md-2 hidden-sm hidden-xs proCol">&nbsp;</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 proCol">
<div class="optical">
<a href="<?php echo get_permalink(get_page_by_path('about'));?>" class="" style="display:block">
<div class="thumb">
<p style="padding:0px 40px;color:#000000" align="justify">ベトナムホーチミンで会社設立ライセンス取得・賃貸不動産紹介・内装工事・WEBサイト制作などを行っているプロポライフベトナムのコーポレートサイトです。ベトナム進出時も進出後も企業様、働かれる方をサポートさせて頂いております。
</p>
<!-- <div class="tel"><?php echo $hl[0];?></div> -->
<div class="fa-right"><i class="fa fa-angle-right fa-3x" style="color: #000000;"></i><div class="clearfix"></div></div>
</div>
</a>
</div>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 proCol">
<a class="thumbnail greenlight" href="<?php echo get_permalink(264);?>">
<div><img src="<?php bloginfo( 'template_directory' );?>/images/lotus-service.png" class="img-responsive" width="180" height="73" alt="">
<div class="fa-right"><i class="fa fa-angle-right fa-3x" style="color: #009A6D;"></i></div></div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 proCol"><a class="thumbnail green" href="<?php echo get_permalink(264);?>">
<h2 class="title">ロータスサービス事業部<br>進出トータルコーディネート<br>会社設立<br>ライセンス取得・変更<br>労働許可証・ビザ</h2>
<p>ロータスサービス事業部では、会社設立・事業ライセンス・労働許可証・ビザの取得から進出のトタールコーディネートまで進出支援経験豊富な日本人担当者がお手伝いをしております。</p></a>
</div>

<div class="col-lg-2 col-md-2 hidden-sm hidden-xs proCol">&nbsp;</div>

</div>
<div class="row">

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail yellow" href="cat-chronicle/reform-office">
<h2 class="title"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-chronicle.png" class="img-responsive" width="200" height="0" alt="">
クロニクルリフォーム事業部<br>内装デザイン設計施工
</h2>
<p>クロニクルリフォーム事業部では、ベトナムホーチミン市でデザイン性と機能性がある快適なオフィス、店舗、住宅の内装デザイン、設計施工までをワンストップでご提供しております。</p>
<div class="fa-right"><i class="fa fa-angle-right fa-3x"></i></div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail" href="cat-chronicle/reform-office">
<div class="thumb">

<div id="slider1" style="position: relative; width:400px;height:400px; overflow: hidden;">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;"></div>
<div style="position: absolute; display: block; background: url(<?php bloginfo( 'template_directory' );?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div>
</div>
<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:400px; height:400px;overflow: hidden;">
<div><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/5.jpg" alt="" /></div>
<div><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/6.jpg" alt="" ></div>
<div><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/7.jpg" alt="" ></div>
<div><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/8.jpg" alt="" /></div>
<div><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/3.jpg" alt="" /></div>
</div>
</div>

</div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail blue" href="<?php echo get_permalink(get_page_by_path('web-step'));?>">
<h2 class="title"><img src="<?php bloginfo( 'template_directory' );?>/images/web-logo.png" class="img-responsive pull-left" width="50" height="0" style="margin-right:10px;" alt="">
<span class="pull-left">WEB DESIGN事業部<br>WEBサイト制作<br>広告支援</span><div class="clearfix"></div>
</h2>
<p>WEB DESIGN事業部では、ベトナムホーチミン市で集客の柱となる良質なWEBサイトの制作、インターネットを利用した広告のデザインをご提供しております。</p>
<div class="fa-right"><i class="fa fa-angle-right fa-3x"></i></div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail" href="<?php echo get_permalink(get_page_by_path('web-step'));?>" style="background: #0F68B6;">
<div class="thumb">
<div id="slider2" style="position: relative; width:400px;height:400px; overflow: hidden;">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;"></div>
<div style="position: absolute; display: block; background: url(<?php bloginfo( 'template_directory' );?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div>
</div>
<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:400px; height:400px;overflow: hidden;">
<div><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/web/1.jpg" alt="" /></div>
<div><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/web/2.png" alt="" /></div>
</div>
</div>
</div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail orange" href="<?php echo get_permalink(get_page_by_path('aodaihousing-support')); ?>" target="_blank" style="background:#dbeef4;color:#000000">
<h2 class="title"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-aodaihousing.png" class="img-responsive" width="200" height="0" alt=""></h2>
<div class="fa-right"><i class="fa fa-angle-right fa-3x"></i></div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail black" href="<?php echo get_permalink(get_page_by_path('aodaihousing-support')); ?>" target="_blank">
<h2 class="title">アオザイハウジング事業部<br>住居オフィス<br>賃貸不動産仲介</h2>
<p style="margin-bottom:20px;">アオザイハウジングでは、ベトナムホーチミン市のオフィス・サービスアパート・コンドミ二アムを紹介手数料無料でご紹介しております。</p>
<div class="fa-right"><i class="fa fa-angle-right fa-3x"></i></div>
</a>
</div>

</div>

<div class="row">
<div class="col-lg-2 col-md-2 hidden-sm hidden-xs proCol">&nbsp;</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 proCol">
<div class="visible-sm visible-xs"><?php include('sidebar-news.php'); ?></div><div class="clearfix"></div>
<a href="<?php echo get_permalink(get_page_by_path('about'));?>">
<div class="optical">
<address>Address: <?php echo $lienhe['diachigmap'];?></address>
<div style="padding:0px 40px 40px 40px;color:#000000">
<div><?php echo $hl[0];?></div>
</div>
</div>
</a>
</div>

<div class="col-lg-4 col-md-4 col-sm-12 hidden-xs proCol"><div class="visible-lg visible-md"><?php include('sidebar-news.php'); ?></div></div>
<div class="col-lg-2 col-md-2 hidden-sm hidden-xs proCol">&nbsp;</div>
</div>

</div>
</div>

<footer>
<div class="back-top"></div>
</footer>
</body>
</html>
<?php ob_end_flush();?>
