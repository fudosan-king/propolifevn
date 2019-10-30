<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?></title> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />

    <link rel="stylesheet" href="<?=PATH_URL.'static/css/'?>style_mobile.css?ver=3.8.2" type="text/css">
    <link rel="stylesheet" href="<?=PATH_URL.'static/css/'?>style_mobile_v2.css?ver=3.8.2" type="text/css">
    <?php if(current_lang_() == 'vn'){
    ?>
    <link rel="stylesheet" href="<?=PATH_URL.'static/css/'?>style_mobile_vn.css?ver=3.8.2" type="text/css">
    <?php } ?>
	<script type="text/javascript" src="<?=PATH_URL.'static/'?>plugin/slideshow/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?=PATH_URL.'static/'?>plugin/slideshow/js/jquery.touchSwipe.min.js"></script>

	<script type="text/javascript" src="<?=PATH_URL.'static/'?>plugin/slideshow/js/jquery.advancedSlider.min.js"></script>
    <script type="text/javascript" src="<?=PATH_URL.'static/js/'?>main_mobile.js?ver=2.1.5"></script>
    <?php if($this->uri->segment(2)=='ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工' || $this->uri->segment(2)=='オフィス店舗デザイン・設計施工の流れ'){ ?>
        <link rel="stylesheet" href="<?=PATH_URL.'assets/css/'?>styles.css?ver=3.8.2" type="text/css">
        <link rel="stylesheet" href="<?=PATH_URL.'assets/css/'?>swiper.min.css" type="text/css">
        <link rel="stylesheet" href="<?=PATH_URL?>static/plugin/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?=PATH_URL.'assets/css/'?>styles_mobile.css?ver=3.8.2" type="text/css">
        <script type="text/javascript" src="<?=PATH_URL?>static/plugin/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>      
        <script type="text/javascript" src="<?=PATH_URL.'assets/js/'?>swiper.min.js"></script>
    <?php }?>

    <?php if($this->uri->segment(2)=='ベトナム ホーチミン オフィス店舗 内装工事'){ ?>
        <link rel="stylesheet" href="<?=PATH_URL.'assets/css/'?>styles.css?ver=3.8.2" type="text/css">
        <link rel="stylesheet" href="<?=PATH_URL.'assets/css/'?>styles_v2.css?ver=3.8.2" type="text/css">
        <link rel="stylesheet" href="<?=PATH_URL.'assets/css/'?>swiper.min.css" type="text/css">
        <link rel="stylesheet" href="<?=PATH_URL?>static/plugin/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?=PATH_URL.'assets/css/'?>styles_mobile.css?ver=3.8.2" type="text/css">
        <link rel="stylesheet" href="<?=PATH_URL.'assets/css/'?>styles_mobile_v2.css?ver=3.8.2" type="text/css">
        <script type="text/javascript" src="<?=PATH_URL?>static/plugin/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>      
        <script type="text/javascript" src="<?=PATH_URL.'assets/js/'?>swiper.min.js"></script>
    <?php }?>
</head>

<body>
    <div class="wrapper-main">
        <header>
            <?php echo modules::run('common/header_mobile'); ?>
            <?php echo modules::run('common/menu_mobile'); ?>
        </header>

        <section>  <!-- main content -->
            <?=$content;?>
        </section> 
        
        <footer>
            <?php echo modules::run('common/footer_mobile'); ?>
        </footer>  
    </div>

    <div id="scrollTopDevice" onclick="scrollAnimate();">
        <h5><?php echo lang('TOP'); ?></h5>
        <h5><?php echo lang('に戻る'); ?></h5>
    </div>
</body>
</html>