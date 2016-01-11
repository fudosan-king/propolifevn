<?php ob_start();global $lienhe;$lienhe = contactInfo();?>
<!doctype html>
<html class="no-js">
<head>
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="UTF-8">
<title>Propolife Viet Nam</title>
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' );?>/bootstrap/css/bootstrap.css" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" rel="stylesheet" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php bloginfo( 'template_directory' );?>/js/jquery.easing.1.3.js"></script>
<script>$(window).load(function() {$(".se-pre-con").fadeOut("slow");});</script>
<script src="<?php bloginfo( 'template_directory' );?>/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/js/jssor.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/js/jssor.slider.js"></script>
<script>
jQuery(document).ready(function ($) {
	var _SlideshowTransitions = [
	//Collapse Random
	{ $Duration: 1000, $Delay: 80, $Cols: 10, $Rows: 4, $Clip: 15, $SlideOut: true, $Easing: $JssorEasing$.$EaseOutQuad }
	//Fade in LR Chess
	, { $Duration: 1200, y: 0.3, $Cols: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }

	//Rotate VDouble+ out
	, { $Duration: 1000, x: -1, y: 2, $Rows: 2, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Row: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Top: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.85 } }

	////Swing Inside in Stairs
	, { $Duration: 1200, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 1.3, $Top: 2.5} }

	//Zoom HDouble+ out
	, { $Duration: 1200, x: 4, $Cols: 2, $Zoom: 11, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

	////Dodge Pet Inside in Stairs
	, { $Duration: 1500, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 0.8, $Top: 2.5} }

	//Rotate Zoom+ out BL
	, { $Duration: 1200, x: 4, y: -4, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Top: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8 } }

	//Dodge Dance Inside in Random
	, { $Duration: 1500, x: 0.3, y: -0.3, $Delay: 80, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 0.8, $Top: 2.5 } }

	//Rotate VFork+ out
	, { $Duration: 1200, x: -3, y: 1, $Rows: 2, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Row: 28 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Top: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.7 } }

	//Clip and Chess in
	, { $Duration: 1200, y: -1, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Top: [0.5, 0.5], $Clip: [0, 0.5] }, $Formation: $JssorSlideshowFormations$.$FormationStraight, $ChessMode: { $Column: 12 }, $ScaleClip: 0.5 }

	////Swing Inside in Swirl
	, { $Duration: 1200, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationSwirl, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 1.3, $Top: 2.5} }

	////Rotate Zoom+ out
	, { $Duration: 1200, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Zoom: $JssorEasing$.$EaseInCubic, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.7} }

	////Dodge Pet Inside in ZigZag
	, { $Duration: 1500, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationZigZag, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 0.8, $Top: 2.5} }

	//Rotate Zoom- out TL
	, { $Duration: 1200, x: 0.5, y: 0.5, $Zoom: 1, $Rotate: 1, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.5 } }

	//Rotate Zoom- in BR
	, { $Duration: 1200, x: -0.6, y: -0.6, $Zoom: 1, $Rotate: 1, $During: { $Left: [0.2, 0.8], $Top: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $Easing: { $Zoom: $JssorEasing$.$EaseSwing, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseSwing }, $Opacity: 2, $Round: { $Rotate: 0.5 } }

	// Wave out Eagle
	, { $Duration: 1500, y: -0.5, $Delay: 60, $Cols: 24, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationCircle, $Easing: $JssorEasing$.$EaseInWave, $Round: { $Top: 1.5 } }

	//Expand Stairs
	, { $Duration: 1000, $Delay: 30, $Cols: 10, $Rows: 4, $Clip: 15, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 2050, $Easing: $JssorEasing$.$EaseInQuad }

	//Fade Clip out H
	, { $Duration: 1200, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

	////Dodge Pet Inside in Random Chess
	, { $Duration: 1500, x: 0.2, y: -0.1, $Delay: 80, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.2, 0.8], $Top: [0.2, 0.8] }, $ChessMode: { $Column: 15, $Row: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseLinear }, $Round: { $Left: 0.8, $Top: 2.5} }
	];	

	var options = {
		$AutoPlay: true,
		$AutoPlaySteps: 1,
		$AutoPlayInterval: 2000,
		$PauseOnHover: 1,
		$ArrowKeyNavigation: true,
		$SlideEasing: $JssorEasing$.$EaseOutQuint,
		$SlideDuration: 800,
		$MinDragOffsetToSlide: 20,
		//$SlideWidth: 600,
		//$SlideHeight: 300,
		$SlideSpacing: 0,
		$DisplayPieces: 1,
		$ParkingPosition: 0,
		$UISearchMode:1,
		$PlayOrientation: 1,
		$DragOrientation: 3,
		$SlideshowOptions: {
			$Class: $JssorSlideshowRunner$,
			$Transitions: _SlideshowTransitions,
			$TransitionsOrder: 1,
			$ShowLink: true
		},

		$ArrowNavigatorOptions: {
			$Class: $JssorArrowNavigator$,
			$ChanceToShow:2,
			$AutoCenter:0,
			$Steps: 1
		},

		$BulletNavigatorOptions: {
			$Class: $JssorBulletNavigator$,
			$ChanceToShow:0,
			$AutoCenter: 1,
			$Steps: 1,
			$Lanes: 1,
			$SpacingX: 4,
			$SpacingY: 4,
			$Orientation: 1
		}
	};

	var jssor_slider1 = new $JssorSlider$("slider1", options);
	function ScaleSlider() {
		var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
		if (parentWidth)
			jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth,2000), 400));
		else
			window.setTimeout(ScaleSlider, 30);
	}
	ScaleSlider();
	$(window).bind("load", ScaleSlider);
	$(window).bind("resize", ScaleSlider);
	$(window).bind("orientationchange", ScaleSlider);
});
</script>    
<script>
jQuery(document).ready(function ($) {
	var _SlideshowTransitions = [
	//Collapse Random
	{ $Duration: 1000, $Delay: 80, $Cols: 10, $Rows: 4, $Clip: 15, $SlideOut: true, $Easing: $JssorEasing$.$EaseOutQuad }
	//Fade in LR Chess
	, { $Duration: 1200, y: 0.3, $Cols: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }

	//Rotate VDouble+ out
	, { $Duration: 1000, x: -1, y: 2, $Rows: 2, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Row: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Top: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.85 } }

	////Swing Inside in Stairs
	, { $Duration: 1200, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 1.3, $Top: 2.5} }

	//Zoom HDouble+ out
	, { $Duration: 1200, x: 4, $Cols: 2, $Zoom: 11, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

	////Dodge Pet Inside in Stairs
	, { $Duration: 1500, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 0.8, $Top: 2.5} }

	//Rotate Zoom+ out BL
	, { $Duration: 1200, x: 4, y: -4, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Top: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8 } }

	//Dodge Dance Inside in Random
	, { $Duration: 1500, x: 0.3, y: -0.3, $Delay: 80, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 0.8, $Top: 2.5 } }

	//Rotate VFork+ out
	, { $Duration: 1200, x: -3, y: 1, $Rows: 2, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Row: 28 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Top: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.7 } }

	//Clip and Chess in
	, { $Duration: 1200, y: -1, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Top: [0.5, 0.5], $Clip: [0, 0.5] }, $Formation: $JssorSlideshowFormations$.$FormationStraight, $ChessMode: { $Column: 12 }, $ScaleClip: 0.5 }

	////Swing Inside in Swirl
	, { $Duration: 1200, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationSwirl, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 1.3, $Top: 2.5} }

	////Rotate Zoom+ out
	, { $Duration: 1200, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Zoom: $JssorEasing$.$EaseInCubic, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.7} }

	////Dodge Pet Inside in ZigZag
	, { $Duration: 1500, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationZigZag, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 0.8, $Top: 2.5} }

	//Rotate Zoom- out TL
	, { $Duration: 1200, x: 0.5, y: 0.5, $Zoom: 1, $Rotate: 1, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.5 } }

	//Rotate Zoom- in BR
	, { $Duration: 1200, x: -0.6, y: -0.6, $Zoom: 1, $Rotate: 1, $During: { $Left: [0.2, 0.8], $Top: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $Easing: { $Zoom: $JssorEasing$.$EaseSwing, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseSwing }, $Opacity: 2, $Round: { $Rotate: 0.5 } }

	// Wave out Eagle
	, { $Duration: 1500, y: -0.5, $Delay: 60, $Cols: 24, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationCircle, $Easing: $JssorEasing$.$EaseInWave, $Round: { $Top: 1.5 } }

	//Expand Stairs
	, { $Duration: 1000, $Delay: 30, $Cols: 10, $Rows: 4, $Clip: 15, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 2050, $Easing: $JssorEasing$.$EaseInQuad }

	//Fade Clip out H
	, { $Duration: 1200, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

	////Dodge Pet Inside in Random Chess
	, { $Duration: 1500, x: 0.2, y: -0.1, $Delay: 80, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.2, 0.8], $Top: [0.2, 0.8] }, $ChessMode: { $Column: 15, $Row: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseLinear }, $Round: { $Left: 0.8, $Top: 2.5} }
	];

	var options = {
		$AutoPlay: true,
		$AutoPlaySteps: 1,
		$AutoPlayInterval: 1000,
		$PauseOnHover: 1,
		$ArrowKeyNavigation: true,
		$SlideEasing: $JssorEasing$.$EaseOutQuint,
		$SlideDuration: 800,
		$MinDragOffsetToSlide: 20,
		//$SlideWidth: 600,
		//$SlideHeight: 300,
		$SlideSpacing: 0,
		$DisplayPieces: 1,
		$ParkingPosition: 0,
		$UISearchMode:1,
		$PlayOrientation: 1,
		$DragOrientation: 3,
		$SlideshowOptions: {
			$Class: $JssorSlideshowRunner$,
			$Transitions: _SlideshowTransitions,
			$TransitionsOrder: 1,
			$ShowLink: true
		},

		$ArrowNavigatorOptions: {
			$Class: $JssorArrowNavigator$,
			$ChanceToShow:2,
			$AutoCenter:0,
			$Steps: 1
		},

		$BulletNavigatorOptions: {
			$Class: $JssorBulletNavigator$,
			$ChanceToShow:0,
			$AutoCenter: 1,
			$Steps: 1,
			$Lanes: 1,
			$SpacingX: 4,
			$SpacingY: 4,
			$Orientation: 1
		}
	};

	var jssor_slider1 = new $JssorSlider$("slider2", options);
	function ScaleSlider() {
		var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
		if (parentWidth)
			jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth,2000), 400));
		else
			window.setTimeout(ScaleSlider, 30);
	}
	ScaleSlider();
	$(window).bind("load", ScaleSlider);
	$(window).bind("resize", ScaleSlider);
	$(window).bind("orientationchange", ScaleSlider);
});
</script>    
</head>

<body class="home">
<div class="se-pre-con"></div>

<div>
<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2 hidden-sm hidden-xs proCol">&nbsp;</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 proCol" align="left">
<div class="optical logo" align="left"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-propolife.png" class="img-responsive" style="display:initial"></div>
</div>
<div class="col-lg-6 col-md-6 hidden-sm hidden-xs proCol">&nbsp;</div>
</div>

<div class="row">
<div class="col-lg-2 col-md-2 hidden-sm hidden-xs proCol">&nbsp;</div>

<div class="col-lg-4 col-md-4 hidden-sm hidden-xs proCol">
<div class="optical">
<div class="thumb">
<a href="<?php echo get_permalink(get_page_by_path('about'));?>" class="hidden-xs">
<p style="padding:0px 40px;color:#ffffff" align="justify">プロポライフベトナムでは、ベトナムでの法人登記・ライセンス取得から、オフィス・住居の
ご用意、内装工事、WEB サイトの制作に至るまで、お客様がベトナムに必要な環境をワンスト ップでご提供しております。</p>
</a>
<div class="tel">84‐8‐3827‐5068（代表 日本語可）<br>84-91-6631088（日本人担当者）</div>
</div>
</div>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 proCol">
<a class="thumbnail greenlight" href="<?php echo get_permalink(get_page_by_path('lotus'));?>">
<div align="center"><img src="<?php bloginfo( 'template_directory' );?>/images/lotus-service.png" class="img-responsive">
<div align="right" class="fa-right"><i class="fa fa-angle-right fa-3x" style="color: #009A6D;"></i></div></div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 proCol"><a class="thumbnail green" href="<?php echo get_permalink(get_page_by_path('lotus'));?>">
<h2 class="title">ロータスサービス会社設立・進出支援</h2>
<p>ロータスサービスでは、200社超のサポート実績あるベトナム人弁護士トン氏と経験豊富な日本人担当者でライセンス取得から開業の準備に至るまでサポートしております。</p></a>
</div>

<div class="col-lg-2 col-md-2 hidden-sm hidden-xs proCol">&nbsp;</div>

</div>
<div class="row">

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail yellow" href="<?php echo get_permalink(get_page_by_path('chronicle'));?>">
<h2 class="title"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-chronicle.png" class="img-responsive" width="200" height="auto"></h2>
<p>クロニクルリフォームでは、デザイン性と機能性がある快適なオフィス、店舗、住宅の内装デザイン、設計施工までをワンストップでご提供しております。</p>
<div align="right" class="fa-right"><i class="fa fa-angle-right fa-3x"></i></div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail" href="<?php echo get_permalink(get_page_by_path('chronicle'));?>">
<div class="thumb">

<div id="slider1" style="position: relative; width:400px;height:400px; overflow: hidden;">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;"></div> 
<div style="position: absolute; display: block; background: url(<?php bloginfo( 'template_directory' );?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div> 
</div>
<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:400px; height:400px;overflow: hidden;">
<div align="center"><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/5.jpg" /></div>
<div align="center"><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/6.jpg"></div>
<div align="center"><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/7.jpg"></div>
<div align="center"><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/8.jpg" /></div>
<div align="center"><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/3.jpg" /></div>
</div>
</div>

</div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail blue" href="<?php echo get_permalink(get_page_by_path('web'));?>">
<h2 class="title"><img src="<?php bloginfo( 'template_directory' );?>/images/web-logo.png" class="img-responsive pull-left" width="50" height="auto" style="margin-right:10px;"><span class="pull-left">WEB DESIGN</span><div class="clearfix"></div></h2>
<p>プロポライフベトナムでは、現地での集客の柱になってくる WEB サイトの制作、インターネットを利用した広告のデザイン支援をご提供しております。</p>
<div align="right" class="fa-right"><i class="fa fa-angle-right fa-3x"></i></div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail" href="<?php echo get_permalink(get_page_by_path('web'));?>">
<div class="thumb">
<div id="slider2" style="position: relative; width:400px;height:400px; overflow: hidden;">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;"></div> 
<div style="position: absolute; display: block; background: url(<?php bloginfo( 'template_directory' );?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div> 
</div>
<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:400px; height:400px;overflow: hidden;">
<div align="center"><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/web/1.jpg" /></div>
<div align="center"><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/web/2.png"></div>
</div>
</div>
</div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail orange" href="http://aodaihousing.com" target="_blank">
<h2 class="title"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-aodaihousing.png" class="img-responsive" width="200" height="auto"></h2>
<div align="right" class="fa-right"><i class="fa fa-angle-right fa-3x"></i></div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-xs-6 proCol">
<a class="thumbnail black" href="http://aodaihousing.com" target="_blank">
<h2 class="title">AODAIHOUSING</h2>
<p style="margin-bottom:20px;">アオザイハウジング
ホーチミンの賃貸不動産紹介
アオザイハウジングでは、ホーチミン市のアパートメント・コンドミニアム・オフィスのご紹介を手数料無料で行っております。</p>
</a>
</div>

</div>

<div class="row">
<div class="col-lg-2 col-md-2 hidden-sm hidden-xs proCol">&nbsp;</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 proCol">
<div class="optical">
<address>Address: <?php echo $lienhe['diachigmap'];?></address>
</div>
</div>
<div class="col-lg-6 col-md-6 hidden-sm hidden-xs proCol">&nbsp;</div>
</div>

</div>
</div>

<footer>
<div class="back-top"></div>
</footer>
</body>
</html>
<?php ob_end_flush();?>