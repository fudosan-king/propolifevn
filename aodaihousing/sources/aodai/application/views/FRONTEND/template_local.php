<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?= $meta ?>
 <meta name="robots" content="index, follow" />

        <title><?= $title ?></title>
        <link href="<?= PATH_URL ?>static/images/favicon.png" type="image/x-icon" rel="icon" />
        <link href="<?= PATH_URL ?>static/images/favicon.png" type="image/x-icon" rel="shortcut icon" />
        <link href='http://fonts.googleapis.com/css?family=Didact+Gothic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="<?= PATH_URL ?>static/css/style.css" />
            <link rel="stylesheet" type="text/css" href="<?= PATH_URL ?>static/css/slider.css?v=2.1.5" />
            <script type="text/javascript" src="<?= PATH_URL ?>static/js/jquery-1.7.2.min.js?v=2.1.5"></script>
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js"></script>
            <script type="text/javascript" src="<?= PATH_URL ?>static/js/main.js?v=2.1.5"></script>


            <link rel="stylesheet" type="text/css" href="<?= PATH_URL ?>static/css/base/advanced-slider-base.css?v=2.1.5" media="screen"/>
            <link rel="stylesheet" type="text/css" href="<?= PATH_URL ?>static/css/glossy-curved/black/glossy-curved-black.css?v=2.1.5" media="screen"/>
            <link rel="stylesheet" type="text/css" href="<?= PATH_URL ?>static/css/lightbox/prettyPhoto.css?v=2.1.5" media="screen"/>
            <link rel="stylesheet" type="text/css" href="<?= PATH_URL ?>static/css/lightbox-slider.css?v=2.1.5" media="screen"/>

            <!--[if IE 7]><link rel="stylesheet" type="text/css" href="../presentation-assets/presentation-ie7.css" media="screen"/><![endif]-->

            <!--[if IE]><script type="text/javascript" src="js/excanvas.compiled.js"></script><![endif]-->
            <script type="text/javascript" src="<?= PATH_URL ?>static/js/jquery.transition.min.js?v=2.1.5"></script>
            <script type="text/javascript" src="<?= PATH_URL ?>static/js/jquery.prettyPhoto.custom.min.js?v=2.1.5"></script>
            <script type="text/javascript" src="<?= PATH_URL ?>static/js/jquery.touchSwipe.min.js?v=2.1.5"></script>
            <script type="text/javascript" src="<?= PATH_URL ?>static/js/jquery.advancedSlider.min.js?v=2.1.5"></script>

            <!---->
            <script type="text/javascript" src="<?= PATH_URL ?>static/jcarousellite/jcarousellite_1.0.1.js?v=2.1.5"></script>

            <link rel="stylesheet" type="text/css" href="<?= PATH_URL ?>static/jcarousellite/slide.css?v=2.1.5" media="screen"/>
            <!---->
            <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    </head>

    <body>

        <div class="wrapper-main">
            <div class="header-main">
                <div class="header">
                    <div class="logo"><a href="<?= create_url(); ?>">logo</a></div>
                    <div class="contact-wap">
                        <div class="block3">
                            <div class="contact-phone-wap" style="margin-right: 0;">
                                <span class="contact-name">電話でのお問い合わせ</span>
                                <span class="contact-phone">+84-8-3827-5068(日本語対応)</span>
                                <span class="contact-phone">+84-91-667-0027（和田）</span>
                            </div>
                        </div>
                        <div class="block3">
                            <div class="contact-phone-wap time">
                                <span class="contact-name">営業時間</span>
                                <span class="contact-phone">月曜日～金曜日9:00～17:00</span>
                                <span class="contact-phone">土曜日9:00～12:00（日祝定休）</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!---end class header-main------>
            <div class="menu-main">
<?php echo modules::run('common/menu'); ?>


            </div><!---end class menu-main------>
            <div class="main-content">
                <div class="main-left">
<?php echo modules::run('common/content_search'); ?>
                    

<?php echo modules::run('common/getlist_category_special'); ?>

<?php echo modules::run('news/getlist_news'); ?>
                    <!------end class box-main--------->
                    <!------end class box-main--------->

                    <?php echo modules::run('bannersidebar/getlist_banner', 1); ?>
<?php echo modules::run('bannersidebar/getlist_banner', 2); ?>

                </div>
                <!---end class main-left------>
                <div class="main-right">
                    <?php echo $content; ?>
                    <!-- slider-->
                    <?php //slider home  ?>
                    <!--end slider-->
                    <?php // list office home   ?>
                    <!---end class feture------>
<?php //facebook div   ?>
                    <!---end class feture------>

                </div><!---end class main-right------>
            </div><!---end class main-content------>
            <div class="footer-shadow">

            </div>
            <div class="footer">
                <div class="block-top">
                    <div class="left">
                        <span class="company-name">VIET NAM OFFICE</span>
                        <span class="address">Unit1904 19Floor CJ BUILDING(旧GEMADEPT TOWER), 6 Le Thanh Ton, District1,HCMC, Vietnam</span>
                    </div>
                    <div class="right">
                        <div class="phone-contact">
                            <span>電話総合受付</span>
                            <span class="phone1">＋84‐8‐3827‐5068（代表 日本語可）</span>
                            <span class="phone2">＋84-91-667-0027（和田）</span>
                        </div>
                    </div>
                </div>
                <div class="block-bottom">
                    <div class="left">
                        <div class="footer-menu">
                            <ul>
                                <li class="active"><a class="active" href="<?= create_url(); ?>"><span>ホーム</span></a></li>
                                <li>
                                    <a href="<?= create_url(); ?>search?opt=office"><span>オフィス物件を探す</span></a>
                                </li>
                                <li><a href="<?= create_url(); ?>contact"><span>お問合せ</span></a></li>
                                <li><a href="<?= create_url(); ?>page/about"><span>会社案内</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="copy-right">Copyright © <?= date("Y", time()); ?> PROPOLIFE VIETNAM. All Rights Reserved.</div>
                </div>
            </div>
            <div id="top">Back to Top</div>

        </div>
        <?php
//facebook plugin 
        echo modules::run('common/facebookPlugin');
        ?>
        
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-42237004-2', 'auto');
ga('send', 'pageview');

</script>
    </body>
</html>