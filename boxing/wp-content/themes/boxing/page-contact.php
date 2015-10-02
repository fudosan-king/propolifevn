<?php
/**
Template Name: ContactPage
*/
?>

<?php
function add_google_map_contact() {
    $lang = 'en_US';
    if (get_bloginfo('language_code') == 'vi'){
        $lang = 'vi_VN';
    }
    if (get_bloginfo('language_code') == 'ja'){
        $lang = 'ja_JP';
    }

    echo '
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&language=' . get_bloginfo('language_code') . '"></script>
    <script>
        var stockholm = new google.maps.LatLng(10.762261, 106.707809);
        var parliament = new google.maps.LatLng(10.762261, 106.707809);
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

add_action( 'wp_head', 'add_google_map_contact', 0 );
$lang = get_bloginfo('language_code');
?>

<?php get_header(); ?>
<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    wp_reset_query();
?>

<div class="container">
<div class="row show-grid">
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="panel panel-default">
<div class="panel-body">
<div id="map-canvas"></div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 center-block">

<div class="panel panel-default panel-edit">
<div class="panel-heading">
    <?php if ($lang == 'vi') { ?>
        Hãy điền vào mẫu dưới đây.

    <?php } else if ($lang == 'ja') { ?>
        以下のフォームに記入してください。

    <?php } else { ?>
        Please fill out the form below.

    <?php } ?>
</div>
<div class="panel-body">

<?php if ($lang == 'ja') {
    echo do_shortcode( '[contact-form-7 id="47" title="Contact form"]' );
} else if ($lang == 'vi') {
    echo do_shortcode( '[contact-form-7 id="46" title="Contact form"]' );
} else {
    echo do_shortcode( '[contact-form-7 id="10" title="Contact form"]' );
}
?>
</div>
</div>

</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="panel panel-primary panel-facebook">
<div class="panel-heading"><div class="panel-title">Facebook</div></div>
<div class="fb-page" data-href="https://www.facebook.com/pages/Samurai-Boxing-Gym/972758416076004" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
<div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/Samurai-Boxing-Gym/972758416076004"><a href="https://www.facebook.com/pages/Samurai-Boxing-Gym/972758416076004">Facebook</a></blockquote></div></div>
</div>
</div>
</div>
</div>

<?php get_footer(); ?>