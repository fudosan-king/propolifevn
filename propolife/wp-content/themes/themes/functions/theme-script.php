<?php
function scriptAbout(){
	if(!is_page('lotus') && !is_page('contact') && !is_singular('lotus') && !is_singular('web') && !is_tax('cat-web')){
?>
<script type="text/javascript">
jQuery(function ($) {
	var options = {
		$AutoPlay:true,
		$AutoPlaySteps:4,
		$AutoPlayInterval: 4000,
		$PauseOnHover: 1,
		$ArrowKeyNavigation: true,
		$SlideDuration: 160,
		$MinDragOffsetToSlide:10,
		$SlideWidth:100,
		$SlideHeight:60,
		$SlideSpacing:7,
		$DisplayPieces:9,
		$ParkingPosition: 0,
		$UISearchMode: 0,
		$PlayOrientation: 1,
		$DragOrientation: 1
	};

	var jssorCat = new $JssorSlider$("sliderAbout", options);
	function ScaleSlider() {
		var bodyWidth = document.body.clientWidth-30;
		if (bodyWidth)
			jssorCat.$ScaleWidth(Math.min(bodyWidth,840));
		else
			window.setTimeout(ScaleSlider, 30);
	}
	ScaleSlider();
	$(window).bind("load", ScaleSlider);
	$(window).bind("resize", ScaleSlider);
	$(window).bind("orientationchange", ScaleSlider);
});
</script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' );?>/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen">
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' );?>/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5">
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript">
jQuery(function($) {
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
			buttons	: {}
		},
		afterLoad : function() {
			this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
		}
	});
});
</script>
<?php	
}}
add_action('wp_head','scriptAbout');
function scriptBanner(){
	if(!is_page('about') && !is_page('web') && !is_page('contact')  && !is_singular('lotus') && !is_tax('cat-web')){
	?>
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

	var _CaptionTransitions = [];
	_CaptionTransitions["L"] = { $Duration: 900, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
	_CaptionTransitions["R"] = { $Duration: 900, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
	_CaptionTransitions["T"] = { $Duration: 900, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
	_CaptionTransitions["B"] = { $Duration: 900, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
	_CaptionTransitions["TR"] = { $Duration: 900, x: -0.6, y: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };

	_CaptionTransitions["L|IB"] = { $Duration: 1200, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutBack }, $Opacity: 2 };
	_CaptionTransitions["R|IB"] = { $Duration: 1200, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutBack }, $Opacity: 2 };
	_CaptionTransitions["T|IB"] = { $Duration: 1200, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutBack }, $Opacity: 2 };

	_CaptionTransitions["CLIP|LR"] = { $Duration: 900, $Clip: 3, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
	_CaptionTransitions["CLIP|TB"] = { $Duration: 900, $Clip: 12, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
	_CaptionTransitions["CLIP|L"] = { $Duration: 900, $Clip: 1, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };

	_CaptionTransitions["MCLIP|R"] = { $Duration: 900, $Clip: 2, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
	_CaptionTransitions["MCLIP|T"] = { $Duration: 900, $Clip: 4, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };

	_CaptionTransitions["WV|B"] = { $Duration: 1200, x: -0.2, y: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Round: { $Left: 1.5} };

	_CaptionTransitions["TORTUOUS|VB"] = { $Duration: 1800, y: -0.2, $Zoom: 1, $Easing: { $Top: $JssorEasing$.$EaseOutWave, $Zoom: $JssorEasing$.$EaseOutCubic }, $Opacity: 2, $During: { $Top: [0, 0.7] }, $Round: { $Top: 1.3} };

	_CaptionTransitions["LISTH|R"] = { $Duration: 1500, x: -0.8, $Clip: 1, $Easing: $JssorEasing$.$EaseInOutCubic, $ScaleClip: 0.8, $Opacity: 2, $During: { $Left: [0.4, 0.6], $Clip: [0, 0.4], $Opacity: [0.4, 0.6]} };

	_CaptionTransitions["RTT|360"] = { $Duration: 900, $Rotate: 1, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2 };
	_CaptionTransitions["RTT|10"] = { $Duration: 900, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} };

	_CaptionTransitions["RTTL|BR"] = { $Duration: 900, x: -0.6, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.8} };

	_CaptionTransitions["T|IE*IE"] = { $Duration: 1800, y: 0.8, $Zoom: 11, $Rotate: -1.5, $Easing: { $Top: $JssorEasing$.$EaseInOutElastic, $Zoom: $JssorEasing$.$EaseInElastic, $Rotate: $JssorEasing$.$EaseInOutElastic }, $Opacity: 2, $During: { $Zoom: [0, 0.8], $Opacity: [0, 0.7] }, $Round: { $Rotate: 0.5} };

	_CaptionTransitions["RTTS|R"] = { $Duration: 900, x: -0.6, $Zoom: 1, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad }, $Opacity: 2, $Round: { $Rotate: 1.2} };
	_CaptionTransitions["RTTS|T"] = { $Duration: 900, y: 0.6, $Zoom: 1, $Rotate: 1, $Easing: { $Top: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad }, $Opacity: 2, $Round: { $Rotate: 1.2} };

	_CaptionTransitions["DDGDANCE|RB"] = { $Duration: 1800, x: -0.3, y: -0.3, $Zoom: 1, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Zoom: $JssorEasing$.$EaseOutQuad }, $Opacity: 2, $During: { $Left: [0, 0.8], $Top: [0, 0.8] }, $Round: { $Left: 0.8, $Top: 2.5} };
	_CaptionTransitions["ZMF|10"] = { $Duration: 900, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 };
	_CaptionTransitions["DDG|TR"] = { $Duration: 1200, x: -0.3, y: 0.3, $Zoom: 1, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump }, $Opacity: 2, $During: { $Left: [0, 0.8], $Top: [0, 0.8] }, $Round: { $Left: 0.8, $Top: 0.8} };

	_CaptionTransitions["FLTTR|R"] = { $Duration: 900, x: -0.2, y: -0.1, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $Opacity: 2, $Round: { $Top: 1.3} };
	_CaptionTransitions["FLTTRWN|LT"] = { $Duration: 1800, x: 0.5, y: 0.2, $Zoom: 1, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInWave, $Zoom: $JssorEasing$.$EaseInOutQuad }, $Opacity: 2, $During: { $Left: [0, 0.7], $Top: [0.1, 0.7] }, $Round: { $Top: 1.3} };

	_CaptionTransitions["ATTACK|BR"] = { $Duration: 1500, x: -0.1, y: -0.5, $Zoom: 1, $Easing: { $Left: $JssorEasing$.$EaseOutWave, $Top: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $During: { $Left: [0.3, 0.7], $Top: [0, 0.7] }, $Round: { $Left: 1.3} };

	_CaptionTransitions["FADE"] = { $Duration: 900, $Opacity: 2 };

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

		$CaptionSliderOptions: {
			$Class: $JssorCaptionSlider$,
			$CaptionTransitions: _CaptionTransitions,
			$PlayInMode: 1,
			$PlayOutMode: 3
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

	var jssor_slider1 = new $JssorSlider$("slider1_container", options);
	function ScaleSlider() {
		var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
		if (parentWidth)
			jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth,2000), 300));
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
}
add_action('wp_head','scriptBanner');
function gMapContact(){
	global $lienhe;
	if(is_page('about')){
?>	
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<script>
var pp_position = new google.maps.LatLng(<?php echo $lienhe['toado'];?>);
var marker;
var map;
function initialize() {
  var mapOptions = {
    zoom: 13,
    center: pp_position
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: pp_position
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
}

function toggleBounce() {
  if (marker.getAnimation() != null){marker.setAnimation(null);}
  else{marker.setAnimation(google.maps.Animation.BOUNCE);}
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php
}}
add_action('wp_head','gMapContact');
?>