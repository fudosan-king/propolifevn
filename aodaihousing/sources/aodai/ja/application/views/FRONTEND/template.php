<?php
    $is_home = $this->router->fetch_class() === 'home' ? true : false;
    $active_language_vn = current_lang_() == 'vn' ? 'active' : '';
    $active_language_jp = (current_lang_() == 'jp' || (current_lang_() == '' && current_lang_() != 'vn')) ? 'active' : '';
    $helper_module = helper_get_module_current();
    $helper_action = helper_get_action_current();
    $is_map_page = false;
    
    // if ($helper_module == 'page' && $helper_action == '住居エリア検索') {
    if ($helper_module == 'page') {
        $is_map_page = true;
    }
    
    ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php if (is_responsive()):?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <?php endif;?>
        <!-- title -->
        <title><?php echo $title;?></title>
        <!-- meta tag -->
        <?php if ($meta): ?>
        <?php echo $meta; ?>
        <?php endif; ?>
        <meta property="fb:app_id" content="546023758768440"/>
        <link href="<?php echo PATH_URL;?>static/images/favicon.png" type="image/x-icon" rel="icon" />
        <link href="<?php echo PATH_URL;?>static/images/favicon.png" type="image/x-icon" rel="shortcut icon" />
        
        <?php
        function isMobileDevice() {
            return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
        }?>

        <!-- compress_css -->
        <?php if ($is_home && isMobileDevice()):?>
            <!-- preload custom css !-->
            <link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/'?>compress_css_custom_index.css" media="none" onload="if(media!='all')media='all'">
            <noscript><link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/'?>compress_css_custom_index.css"></noscript>
        <?php else:?>
            <link defer rel="stylesheet" type ="text/css" href="<?php echo PATH_URL . 'static/css/'?>compress_css.css">
        <?php endif;?>

        <?php if (!$is_home):?>

        <!-- style_v2.css -->
        <link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/'?>style_v2.css" type="text/css">
        <?php endif;?>
        <?php if ($active_language_vn):?>

        <!-- style_vn.css -->
        <link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/'?>style_vn.css" type="text/css">

        <?php endif;?>
        <?php if (!$is_home && $active_language_vn):?>
        <!-- style_v2_vn.css -->
        <link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/'?>style_v2_vn.css" type="text/css">

        <?php endif;?>

        <?php if ($is_home && isMobileDevice()):?>
            <link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/'?>style_custom_index.css" type="text/css">
        <?php elseif(!$is_home && isMobileDevice()):?>
            <link rel="stylesheet" type ="text/css" href="<?php echo PATH_URL . 'static/css/'?>style.css">
            <link defer rel="stylesheet" type="text/css" href="<?php echo PATH_URL . 'static/css/';?>subpage-responsive.css">
        <?php else:?>
            <link rel="stylesheet" type ="text/css" href="<?php echo PATH_URL . 'static/css/'?>style.css">
        <?php endif;?>

        <?php if (is_responsive()):?>
            <!-- main-responsive.css -->
            <link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/';?>main-responsive.css">
            <noscript><link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/';?>main-responsive.css"></noscript>
        <?php else:?>
        <!-- contact-not-responsive.css -->
        <link defer rel="stylesheet" type="text/css" href="<?php echo PATH_URL . 'static/css/';?>contact-not-responsive.css">
        <?php endif;?>

        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        <script async>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-69563739-4', 'auto');
            ga('send', 'pageview');
        </script>
        <!-- Google Tag Manager -->
        <noscript><iframe sandbox="allow-same-origin allow-forms allow-popups" src="//www.googletagmanager.com/ns.html?id=GTM-KRT7X7"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script async>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-KRT7X7');
        </script>
        <!-- End Google Tag Manager -->
        <!-- jquery-3.3.1.min.js -->
        <?php if (!isMobileDevice() || (!$is_home && isMobileDevice())):?>
            <script type="text/javascript" src="<?php echo PATH_URL . 'static/js/'?>jquery-3.3.1.min.js"></script>
        <?php endif; ?>
    </head>
    <body>
        <header>
            <div class="menu-header <?php echo $is_home === false ? 'common-header' : '';?>">
                <!-- banner -->
                <?php if ($is_home):?>
                <div class="wraper-slider-top">
                    <?php
                        echo modules::run('bannertop/get_banner');
                        ?>
                    <?php
                        echo modules::run('bannertoptext/get_banner');
                        ?>
                </div>
                <?php endif; ?>
                <!-- top-menu -->
                <div class="top-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 padding">
                                <div class="block-logo">
                                    <p>ホーチミン不動産賃貸<br/>アオザイハウジング</p>
                                    <a href="<?php if (current_lang_() == 'jp'):?> <?php echo PATH_URL . '';?> <?php else:?> <?php echo PATH_URL . 'vn/';?> <?php endif;?>">
                                    <img src="<?php echo PATH_URL . 'static/images';?>/logo.png" alt="logo"/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-2 padding">
                                <div class="block-contact-phone">
                                    <p class="spritephone"><span>代表</span></p>
                                    <span></span>
                                    <p><a href="tel:+842838275068"><span>+84(0)28-3827-5068</span></a></p>
                                </div>
                            </div>
                            <div class="col-xs-2 padding">
                                <div class="block-contact-phone block-contact-phone-jp">
                                    <p class="spritephone"><span>賃貸　魚山</span></p>
                                    <span></span>
                                    <p><a href="tel:+84917835778"><span>+84(0)917-835-778</span></a></p>
                                </div>
                            </div>
                            <div class="col-xs-2 padding">
                                <div class="block-contact-phone block-contact-phone-jp">
                                    <p class="spritephone"><span>売買　正木</span></p>
                                    <span></span>
                                    <p><a href="tel:+84916670027"><span>+84(0)916-670-027</span></a></p>
                                </div>
                            </div>
                            <div class="col-xs-2 padding custom-pdleft">
                                <div class="block-contact-mail">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#contactModal" class="spritemail2">
                                        <p>WEBからの<br/>お問い合わせ</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-1 wrapper-boxmenu padding">
                                <div class="block-menu-language clearfix">
                                    <ul>
                                        <li class="<?php echo $active_language_jp;?>"><a href="<?php echo change_lang('');?>"><span>JP</span></a></li>
                                        <li class="<?php echo $active_language_vn;?>"><a href="<?php echo change_lang('');?>"><span>VN</span></a></li>
                                    </ul>
                                    <div class="btn-menu pull-right"> 
                                        <a href="javascript:void(0)"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        <!-- slide menu -->
                        <?php echo modules::run('common/menu');?>
                        </div>
                    </div>
                    <!-- container -->
                </div>
                <!-- top-menu -->
            </div>
            <!-- menu-header -->
        </header>
        <!-- /header -->
        <!-- main content -->
        <main>
            <div class="wrapper-content-block page-home">
                <?php echo $content;?>
            </div>
            <?php if ($is_home):?>
            <ul class="collapse-item collapse-page">
                <li><a href="javascript:void(0)" id="toggle-label" class="toggle-dropdown rented-real-estate">ホーチミンの賃貸物件について</a></li>
                <li><a href="javascript:void(0)" id="toggle-label" class="toggle-dropdown support-advanced">ベトナム進出支援</a></li>
                <li><a href="javascript:void(0)" id="toggle-label" class="toggle-dropdown staff-introduce-firm">スタッフ紹介</a></li>
            </ul>
            <?php endif; ?>
        </main>
        <!-- footer -->
        <footer>
            <?php echo modules::run('common/footer');?>
        </footer>
        <?php if (is_responsive()):?>
        <!--  footer-contact -->
        <ul class="footer-contact">
            <li>
                <a href="<?php if (current_lang_() == 'jp'):?> <?php echo PATH_URL . '';?> <?php else:?> <?php echo PATH_URL . 'vn/';?> <?php endif;?>"><img src="<?php echo PATH_URL . 'static/images';?>/logo.png" alt="logo/"></a>
            </li>
            <li><a href="tel: +842838275068"><i class="fa fa-phone" aria-hidden="true"></i>＋84 28 3827 5068</a></li>
        </ul>
        <?php endif; ?>
        <!-- Modal -->
        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-hidden="true"></button>
                    <?php if (isset($module) && isset($id) && !isset($building_type)) {?>
                    <iframe class="iframeContact" src="<?php echo PATH_URL; ?>contact/contact_step1?type=<?php echo $module ?>&id=<?php echo $id ?>&current_lang=<?php echo $current_lang ?>"></iframe>
                    <?php } elseif (isset($module) && isset($id) && isset($building_type)) {?>
                    <iframe class="iframeContact" src="<?php echo PATH_URL; ?>contact/contact_step1?type=<?php echo $module ?>&id=<?php echo $id ?>&building_type=<?php echo $building_type ?>&current_lang=<?php echo $current_lang ?>"></iframe>
                    <?php } else { ?>
                    <iframe class="iframeContact" src="<?php echo PATH_URL; ?>contact/contact_step1"></iframe>
                    <?php } ?>
                </div>
                
            </div> 
        </div>
        <div class="se-pre-con"></div>
        
        <?php if ($is_map_page):?>
          <script defer type="text/javascript" src="<?php echo PATH_URL . 'static/js/';?>svg.min.js"></script>
        <?php endif;?>

         <!-- compress_js -->
        <?php if ($is_home && isMobileDevice()):?>
             <script type="text/javascript" src="<?php echo PATH_URL . 'static/js/';?>library.mobile.min.js"></script>
             <script defer src="<?php echo PATH_URL . 'static/js/';?>main.mobile.js"></script>
        <?php else:?>
             <script  defer type="text/javascript" src="<?php echo PATH_URL . 'static/js/';?>compress_js.js"></script>
             <script defer src="<?php echo PATH_URL . 'static/js/';?>main.js"></script>
        <?php endif;?>
        <script  defer src="<?php echo PATH_URL . 'html/js/';?>my_main.min.js"></script>
    </body>
</html>