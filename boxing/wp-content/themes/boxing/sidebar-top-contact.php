<?php
$lang = $_GET['lang'];
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