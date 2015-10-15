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
    $lang = get_bloginfo('language_code');
    $template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());
?>

<div align="center">
<div id="slider" style="position: relative; margin:0px;<?php if ( is_user_logged_in() ) { echo 'top: -33px;'; } else { echo 'top: 0px;'; }?> left: 0px; width: 1900px; height:600px; overflow: hidden;">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;top: 0px; left: 0px; width: 100%; height: 100%;"></div>
<div style="position: absolute; display: block; background: url(<?php echo $template_directory; ?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px; width: 100%; height: 100%;"></div>
</div>
<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1900px;height:600px; overflow: hidden;">
<?php
    $sliders = get_field('slider', 307);
        foreach($sliders as $slider):
            echo '
            <div><img u="image" src="' . $slider['image']['url'] . '" /></div>
            ';
         endforeach;
?>
</div>
<div u="navigator" class="jssorb21" style="bottom: 26px; right: 6px;"><div u="prototype"></div></div>
<span u="arrowleft" class="jssora21l" style="top: 123px; left: 10px;"></span>
<span u="arrowright" class="jssora21r" style="top: 123px; right: 10px;"></span>

</div>
</div>


<div class="container">
<div class="row topic">

<?php
    if ($lang == 'ja') {
        $opening = '営業時間';
        $tel = '電話';
        $mobile = '担当者携帯';
        $mail = 'メール';
        $address = '住所';
        $taxi = 'タクシー時間';
    } else if ($lang == 'vi') {
        $opening = 'Mở cửa';
        $tel = 'Điện thoại';
        $mobile = 'Di động';
        $mail = 'Email';
        $address = 'Địa chỉ';
        $taxi = 'Taxi';
    } else {
        $opening = 'Opening';
        $tel = 'Tel';
        $mobile = 'Mobile';
        $mail = 'Email';
        $address = 'Address';
        $taxi = 'Taxi';
    }
    $topics = get_field('topic', 170);
    foreach ($topics as $topic) {
        if ($topic['language'] == $lang){
            echo '
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" align="center">
                <div class="thumbnail">
                <i class="fa fa-comment-o"></i>
                <div class="caption" align="center">
                <h3>' . $topic['message'][0]['message_title'] . '</h3>
                <img src="' . $topic['message'][0]['image']['url'] . '" class="img-responsive">
                <div class="scroll">
                    <section>
                    <div class="content mCustomScrollbar" data-mcs-theme="minimal">
                    <p>' . htmlspecialchars_decode($topic['message'][0]['message_content']) . '</p>
                    </div>
                    </section>
                </div>
                </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" align="center">
                <div class="thumbnail">
                <i class="fa fa-envelope-o" style="background-color:#f20000"></i>
                <div class="caption" align="center">
                <h3 align="center">' . $topic['address'][0]['address_title'] . '</h3>
                <dl class="dl-horizontal dl-contact">
                <dt>' . $opening . ':</dt><dd>' . $topic['address'][0]['opening'] . '</dd>
                <dt>' . $tel . ':</dt><dd>' . $topic['address'][0]['tel'] . '</dd>
                <dt>' . $mobile . ':</dt><dd>' . $topic['address'][0]['mobile'] . '</dd>
                <dt>' . $mail . ':</dt><dd>' . $topic['address'][0]['mail'] . '</dd>
                <dt>' . $address . ':</dt><dd>' . $topic['address'][0]['address'] . '</dd>
                <dt>' . $taxi . ':</dt><dd>' . $topic['address'][0]['taxi'] . '</dd>
                </dl>
                </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" align="center">
                <div class="thumbnail">
                <i class="fa fa-facebook"></i>
                <div class="caption" align="center">
                <div class="fb-page" data-href="https://www.facebook.com/pages/Samurai-Boxing-Gym/972758416076004" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
                <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/Samurai-Boxing-Gym/972758416076004"><a href="https://www.facebook.com/pages/Samurai-Boxing-Gym/972758416076004">Facebook</a></blockquote></div></div>
                </div>
                </div>
            </div>
            ';
        }
    }
?>



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

<div class="container">
<div class="row show-grid">

<?php
    if ($lang == 'ja') {
        $btn = 'もっと';
    } else if ($lang == 'vi') {
        $btn = 'Thêm';
    } else {
        $btn = 'More';
    }
    $teachers = get_field('teacher', 170);
    foreach ($teachers as $teacher) {
        echo '
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 teacher" align="center">
        <div class="staffInfo">
        <div class="bdMask"><div class="mask">
        <img src="' . $teacher['image']['url'] . '" class="img-responsive">
        </div></div>
        <div class="caption" align="center">
        <h5 class="color-red">' . $teacher['name'][0]['name_' . $lang] . '</h5>
        <p class="excerpt">' . $teacher['comment'][0]['comment_' . $lang] . '</p>
        </div>';
        // <a href="" class="btn btn-primary">More</a>
        echo '
        </div>
        </div>
        ';
    }
?>

</div>
</div>

<div class="container">
<div class="row show-grid">
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
<div class="bg-default">
<div class="row">
<div class="col-lg-9 col-md-9">
<?php
$videos = get_field('videos', 307);
?>
<h5><strong class="title-video"><?php echo $videos[0]['categories'][0]['title'] ?></strong></h5>
<div class="media-body" align="center">
<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $videos[0]['categories'][0]['video_id']; ?>" frameborder="0" allowfullscreen id="media-view"></iframe>
<i class="fa fa-spinner fa-spin fa-3x"></i>
</div>
</div>
<div class="col-lg-3 col-md-3">
<h5><strong>
    <?php if ($lang == 'ja') { ?>
        トップリストビデオ

    <?php } else if ($lang == 'vi') { ?>
        Video xem nhiều

    <?php } else { ?>
        TOP LIST VIDEO

    <?php } ?>
</strong></h5>
<ul class="topvideo media-list">
<?php
    $index = 1;
    foreach($videos as $video):
        foreach ($video['categories'] as $categorie) {
            if ($index <= 10) {
                echo '
                <li><a href="#" rel="' . $categorie['video_id'] . '" title="' . $categorie['title'] . '"><i class="fa fa-circle-bg">' . $index . '</i>' . $categorie['title'] . '</a></li>

                ';
                $index += 1;
            }
        }
     endforeach;
?>
</ul>
</div>
</div>
</div>
</div>

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<div class="bg-default block-right mn-scroll">
<div style="background-color: #000000;  color: #ffffff;  padding: 15px !important;  margin: -15px;">
    <?php if ($lang == 'ja') { ?>
        クラス

    <?php } else if ($lang == 'vi') { ?>
        LỚP HỌC

    <?php } else { ?>
        CLASSES

    <?php } ?>
</div>
<section>
<div class="content mCustomScrollbar" data-mcs-theme="minimal">
<ul style="margin-top:15px;">
<?php
     if ($lang == 'vi'){
        $cat = 37;
    } else if ($lang == 'ja') {
        $cat = 39;
    } else {
        $cat = 35;
    }
    $args = array(
        'cat'              => $cat,
        'posts_per_page'   => 20,
        'offset'           => 0,
        'category'         => '',
        'category_name'    => '',
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'author'       => '',
        'post_status'      => 'publish',
        'suppress_filters' => true
    );
    $posts_arrays = get_posts( $args );
    $class_arrays = array();

    if($posts_arrays):
        foreach (range(1, count($posts_arrays)) as $number) {
            foreach($posts_arrays as $posts_array){
                if ($number == get_field('oder', $posts_array->ID)){
                    array_push($class_arrays, $posts_array);
                }
            }
        }

        foreach($class_arrays as $class_array):
            $name = get_field('name', $class_array->ID);
            $href = $class_array->guid;
            $name = str_replace('<br>', '', $name);

            echo '
            <li><a href="' . get_bloginfo('siteurl'). '&p='. $class_array->ID . '"><i class="fa fa-angle-right"></i> ' . $name . '</a></li>
            ';
        endforeach;
    endif;

?>
</ul>
</div>
</section>
</div>
</div>
</div>

</div>

<div class="bg-default">
<div class="container">
<div class="row">
<div class="col-md-6"><div class="panel panel-default"><div class="panel-body"><div id="map-canvas"></div></div></div></div>
<div class="col-md-6 center-block">
<?php
    $welcomes = get_field('welcome', 170);
    foreach ($welcomes as $welcome) {
        if ($welcome['language'] == $lang){
            echo '
            <h3 align="left">' . $welcome['welcome_title'] . '</h3>
            <p align="justify">' . $welcome['welcome_message'] . '</p>
            ';
        }
    }
?>

</div>
</div>
</div>
</div>

<?php get_footer(); ?>
