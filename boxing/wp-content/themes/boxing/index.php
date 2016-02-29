<?php
function add_google_map() {
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

add_action( 'wp_head', 'add_google_map', 0 );
?>

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Boxing
 * @since Boxing
 */
?>
<?php get_header(); ?>

<?php
    $lang = $_GET['lang'];
    if (!$lang) {
        $lang = 'ja';
    }
    $template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());
?>

<div align="center"><?php include('sidebar-banner.php');?></div>
<div class="container">
<div class="row topic">
<?php include('sidebar-top-contact.php');?>
</div>
</div>

<div align="center" class="heading hidden-xs">
<?php
    if ($lang == 'ja') {
        $text_after = 'お問い合わせはこちらまで';
        $text_befor = 'お待ちしております';
    } else if ($lang == 'vi') {
        $text_after = 'Gọi cho chúng tôi ';
        $text_befor = ' để chọn lớp thích hợp';
    } else {
        $text_after = 'Call us today on ';
        $text_befor = ' start getting fit!';
    }
?>
<span><?php echo $text_after; ?><abbr><?php echo $topics[0]['address'][0]['tel'] ?></abbr><?php echo $text_befor; ?></abbr></span>
</div>

<div align="center" style="margin-bottom:15px;"><a href="<?php echo get_permalink(52);?>"><img src="<?php echo $template_directory;?>/images/boxing-banner-medium.jpg" /></a></div>

<div class="container">
<div class="row show-grid">
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
<div class="bg-default">
<div class="row"><?php include('sidebar-video.php');?></div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<?php include('sidebar-menu-class.php');?>
</div>
</div>
</div>

<div class="container">
<div class="row show-grid"><?php include('sidebar-teacher.php')?></div>
</div>

<div class="bg-default">
<div class="container">
<div class="row"><?php include('sidebar-about.php');?></div>
</div>
</div>

<?php get_footer(); ?>