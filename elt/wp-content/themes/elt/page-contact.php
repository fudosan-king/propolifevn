<?php
/**
Template Name: ContactPage
*/
?>

<?php
function add_google_map_contact() {
    $lang = 'en_US';
    if (get_bloginfo('language') == 'vi'){
        $lang = 'vi_VN';
    }
    if (get_bloginfo('language') == 'ja'){
        $lang = 'ja_JP';
    }
    if (get_bloginfo('language') == 'kr'){
        $lang = 'ko_KR';
    }

    echo '
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&language=' . $lang . '"></script>
    <script>
        var stockholm = new google.maps.LatLng(10.631615, 106.705549);
        var parliament = new google.maps.LatLng(10.631615, 106.705549);
        var marker;
        var map;

        function initialize() {
          var mapOptions = {
            zoom: 13,
            center: stockholm
          };

          map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

          marker = new google.maps.Marker({
            map:map,
            draggable:true,
            animation: google.maps.Animation.DROP,
            position: parliament
          });
          google.maps.event.addListener(marker, "click", toggleBounce);
        }

        function toggleBounce() {

          if (marker.getAnimation() != null) {
            marker.setAnimation(null);
          } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
          }
        }
        google.maps.event.addDomListener(window, "load", initialize);
    </script>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : "118849338455605",
                xfbml      : true,
                version    : "v2.4"
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/' . $lang . '/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, "script", "facebook-jssdk"));
    </script>
    ';
}

add_action( 'wp_head_customer', 'add_google_map_contact', 0 );
$lang = get_bloginfo('language');
?>

<?php
    // add_action( 'wp_head_customer', 'add_javascript_slider', 10);
    get_header();
?>

<?php
    // show slider
    // show_slider();
?>

<div class="slogan-row desc" data-stellar-background-ratio="0.5" style="background-position: 50% 90px;">

<div data-toggle="validator" role="form">
<div class="container">
<div class="row">
<div class="col-lg-12 col-sm-12 col-xs-12 center-block animation-content" align="center">
<div class="alert alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    wp_reset_query();
?>

</div>
</div>
</div>
</div>
</div>
</div>



<div class="show-grid">
<div class="container">

<div class="col-lg-6">
<?php if ($lang == 'ja') {
    echo do_shortcode( '[contact-form-7 id="45" title="Contact form"]' );
} else if ($lang == 'vi') {
    echo do_shortcode( '[contact-form-7 id="46" title="Contact form"]' );
} else if ($lang == 'kr') {
    echo do_shortcode( '[contact-form-7 id="72" title="Contact Form Korean"]' );
} else {
    echo do_shortcode( '[contact-form-7 id="6" title="Contact form"]' );
}
?>
</div>

<div class="col-lg-6"><div class="map"><div id="map-canvas"></div></div></div>

</div>
</div>
<?php get_footer();?>