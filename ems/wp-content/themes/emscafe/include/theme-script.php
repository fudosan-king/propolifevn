<?php
function scriptBanner(){
	if(is_home() || is_page('about') || is_page('visa') || is_page('manga') || is_tax('cat-manga') ){
	?>
<script>
jQuery(function ($) {
	var _SlideshowTransitions = [{ $Duration: 1200, $Opacity: 2 }];
	var options = {
		$FillMode:2,
		$AutoPlay: true,
		$AutoPlayInterval: 4000,
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
			$ChanceToShow:0,
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
<?php }if(!is_page('shop') && !is_singular('menu')){ ?>
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
	}
}
add_action('wp_head','scriptBanner');
function gMapContact(){
	global $lienhe;
	if(is_home() || is_page('contact')){
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