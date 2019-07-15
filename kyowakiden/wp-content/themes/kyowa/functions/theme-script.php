<?php function fancybox(){ ?>
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
<?php } add_action('wp_footer','fancybox');?>
<?php
function gMapContact(){
	global $lienhe;
	if(is_page('contact')){
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
//add_action('wp_head','gMapContact');
?>