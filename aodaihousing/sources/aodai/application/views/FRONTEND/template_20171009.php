<?php
$s = isset($_GET['s'])?$_GET['s']:'';
$opt = isset($_GET['opt'])?$_GET['opt']:'';
$opt_select = array('house'=> lang('賃貸住宅'), 'office'=> lang('オフィス・店舗'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title><?=$title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?=$meta?>
    <meta property="fb:app_id" content="546023758768440"/>
    <link href="<?=PATH_URL?>static/images/favicon.png" type="image/x-icon" rel="icon" />
    <link href="<?=PATH_URL?>static/images/favicon.png" type="image/x-icon" rel="shortcut icon" />
    <link rel="stylesheet" href="<?=PATH_URL.'static/css/'?>/style.css?ver=3.8.1" />
    <?php if(current_lang_() == 'vn'): ?>
    <link rel="stylesheet" href="<?=PATH_URL.'static/css/'?>/vn.css?ver=3.8.1" />
    <?php endif ?>
    <?php
    $agent = $_SERVER['HTTP_USER_AGENT'];
        
    if(preg_match('/Linux/',$agent)){
        $os = 'Linux';
    } 
    elseif(preg_match('/Win/',$agent)){
        echo "<link rel='stylesheet' href='".PATH_URL."static/css/ie.css' type='text/css' media='all' />";
    } 
    elseif(preg_match('/Mac/',$agent)){
        echo "<link rel='stylesheet' href='".PATH_URL."static/css/mac.css?ver=3.8.1' type='text/css' media='all' />";
        if(current_lang_() == 'vn'){
            echo "<link rel='stylesheet' href='".PATH_URL."static/css/vn-mac.css?ver=3.8.1' type='text/css' media='all' />";    
        }
        ?>
        <style type="text/css">
            .menu-item li a span{
                font-size: 13px;
            }
        </style>
        <?php
        
    } 
    
    ?>  
	<!-- <link rel="stylesheet" href="<?=PATH_URL.'assets/'?>css/styles.css" type="text/css">
    <link rel="stylesheet" href="<?=PATH_URL.'assets/'?>css/styles_v2.css" type="text/css"> -->
    <script type="text/javascript">
        var root = "<?=PATH_URL;?>";
        var current_lang = "<?=current_lang_();?>";
    </script>
    <script type="text/javascript" src="<?=PATH_URL?>static/plugin/slideshow/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" defer="defer" src="<?=PATH_URL.'assets/'?>js/skrollr.min.js"></script>
    <script type="text/javascript" defer="defer" src="<?=PATH_URL?>static/plugin/slideshow/js/jquery.transition.min.js"></script>
    <script type="text/javascript" defer="defer" src="<?=PATH_URL?>static/plugin/slideshow/js/jquery.touchSwipe.min.js"></script>
    <script type="text/javascript" defer="defer" src="<?=PATH_URL?>static/plugin/slideshow/js/jquery.advancedSlider.min.js"></script>
    
    <link href="<?=PATH_URL?>static/plugin/select2/select2.css" rel="stylesheet"/>
    <link href="<?=PATH_URL?>static/plugin/fancybox/source/jquery.fancybox.css?v=2.1.4" rel="stylesheet"/>
    <script type="text/javascript" defer="defer" src="<?=PATH_URL?>static/plugin/select2/select2.js"></script>
	<script type="text/javascript" src="<?=PATH_URL?>static/plugin/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>
	<script type="text/javascript" src="<?=PATH_URL?>static/plugin/jcarousellite/jcarousellite_1.0.1.js?v=2.1.4"></script>
    <link rel="stylesheet" href="<?=PATH_URL?>static/plugin/jcarousellite/slide.css" type="text/css" media="screen" />
    <script type="text/javascript" defer="defer" src="<?=PATH_URL.'static/js/'?>main.js"></script>
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-69563739-4', 'auto');
        ga('send', 'pageview');
    </script>

    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KRT7X7"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KRT7X7');</script>
    <!-- End Google Tag Manager -->
    
</head>

<body <?php if($this->uri->segment(2)=='ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工' || $this->uri->segment(2)=='オフィス店舗デザイン・設計施工の流れ' || $this->uri->segment(2)=='ベトナム ホーチミン オフィス店舗 内装工事'){ ?>
    class="parallax_body"
<?php } ?> >
<div class="wrapper-main">
    <div class="header-main">
        <div class="header">
            <div class="logo">
                <span class="logo-span"><?php change_language('ホーチミン不動産賃貸 ', 'Giới thiệu Bất động sản cho thuê')?>
                   <br /> <?php change_language('アオザイハウジング事業部', 'AODAI HOUSING')?>
                </span>
                
                <a href="<?=create_url();?>">logo</a>
                <!-- <div class="hightp">
                    <?php if(current_lang_() == 'jp'): ?>
                        賃貸紹介料無料			 
                    <?php endif; ?>
                </div> -->
            </div>
            <div class="sologan">      
                <span><?php echo change_language('法人設立・ビザサポート', 'Dịch vụ hỗ trợ thành lập doanh nghiệp và xin Visa ') ?>
                    <br /><?php echo change_language('ロータスサービス事業部', 'LOTUS SERVICE'); ?>
                </span>
               <a href="<?=PATH_URL?>page/法人設立・起業サポート">
                <img width="149" src="<?=PATH_URL?>/static/images/lotus.png" />
               </a>
                
                
            </div>
            <div class="sologan sologan2">
                <span><?php echo change_language("内装デザイン・設計施工・インテリア", "Dịch vụ thiết kế và lắp đặt nội thất") ?>
                    <br /> <?php echo change_language('クロニクルリフォーム事業部', 'CHRONICLE REFORM'); ?>
                </span>
                
                <a href="<?=PATH_URL?>page/オフィス店舗デザイン・設計施工の流れ">
                    <img src="<?=PATH_URL?>/static/images/logo-chronicle.png" />
               </a>
                
            </div>
            <div class="contact-text">
                <span><?php echo lang("電話でのお問い合わせ") ?></span>
                <span><?php echo lang("fromTo") ?></span>
                <div class="phone-warp">
                    <strong class="phone"><?php echo lang("phone5") ?></strong><br />
                    <strong class="phone"><?php echo lang("phone6") ?></strong><br />
                    <strong class="phone"><?php echo lang("phone7") ?></strong><br />
                </div>
            </div>
            <div class="search-form" style="display: none;">
                <form name="f-search" method="get" class="f-search" action="<?=PATH_URL . current_lang_()?>/search">
                    <span class="select-custom" id="select-customcategory-2"><?=$opt == ''? lang('賃貸住宅'):(isset($opt_select[$opt])?$opt_select[$opt]:lang('賃貸住宅')); ?></span>
                    <div class="opt-wap">
                        
                        <select name="opt" class="opt-2">
                        <?php foreach($opt_select as $k=>$v):?>
                        <?php
                        $select = '';
                        if($k == $opt){
                            $select = 'selected';
                            
                        }
                        ?>
                            <option <?=$select;?> value="<?=$k;?>"><?=$v;?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <input placeholder="<?php echo lang('物件検索キーワード'); ?>" type="text" name="s" value="<?=$s==''?'':$s; ?>" />
                    <input type="submit" class="send" name="send" value=""/>
                </form>
            </div> 
            <div class="web-mail web-mail-<?=current_lang_();?>">
                <a class="iframe" href="<?=create_url(); ?>contact/contact_step1">web mail</a>
                <div class="language-w">
                    <a href='<?php echo change_lang(''); ?>' class="japanese">Japanese</a>
                    <a href='<?php echo change_lang('vn'); ?>' class="vietnamese">Vietnamese</a>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-main">
        <?php echo modules::run('common/menu'); ?>
    </div>
    <div class="sub-menu-main"></div>
	<!-----Top slide------------------------>
    <?php if($this->uri->segment(2)!='ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工' && $this->uri->segment(2)!='オフィス店舗デザイン・設計施工の流れ' && $this->uri->segment(2)!='ベトナム ホーチミン オフィス店舗 内装工事'){ ?>
	<?php echo modules::run('bannertop/get_banner'); ?>
    <div class="main-content">
        <div class="main-left">
        <?php
            $module = $this->uri->segment(1);
        ?>
        <?php if($module != 'news'): ?>
        <?php
            $catid = $this->uri->segment(2);
            $module =  $this->router->fetch_class();                    
        ?>
            <?php echo modules::run('common/content_search', $catid, $module); ?>
             <?php if($module != 'page'): ?>
             <!-- <h1 class="h1-im">ベトナムホーチミンの賃貸不動産・法人設立・内装工事なら</h1> -->
             <h1 class="h1-im">アオザイハウジングではベトナムホーチミン市のアパート・オフィス賃貸不動産の取引を契約からアフターサービスまでご提供しております。</h1>
             <?php endif; ?>
        <?php endif; ?>
        <?php if($module == 'home'): ?>
            
            <?php echo modules::run('bannerhome/get_banner'); ?>
        <?php endif; ?>
        <?=$content;?>
        <?php
        $module =  $this->router->fetch_class();
        ?>
        <?php if($module == "home" ): ?>
            <?php echo modules::run('common/tags'); ?>
        <?php endif; ?>
        
        </div>
        <div class="main-right">
            <div class="box-main">
                <div class="header-right">
                    <div class="header">
                        <div class="icon icon-right-1">
                            <h3><?php echo lang('特集で探す'); ?></h3>
                        </div>
                    </div>
                    <div class="line">
                        <div class="line1"></div>
                        <div class="line2"></div>
                    </div>
                </div>
                <?php echo modules::run('common/getlist_category_special'); ?>

                <div class="box-main">
					<div class="header-right">
						<div class="header">
							<div class="icon icon-right-1">
								<h3><?php echo lang('住居インフォメーション'); ?></h3>
							</div>
						</div>
						<div class="line">
							<div class="line1"></div>
							<div class="line2"></div>
						</div>
					</div>
					<div class="right-new-item text-intro">
						<ul>
                            <li>
                                <a href="<?=PATH_URL; ?>page/ローカルサービスアパートメント・アパートメントのご紹介">
                                <span>アオザイハウジングでは、日本人小中学校のバスが留まるサービスアパート、コンドミニアムのご紹介をしております。お気軽にご相談下さい。</span> <br />  
                                </a>
                            </li>
                            
							<li>
								<!-- <a href="<?=create_url(); ?>page/人気アパートメントのご案内"> -->
								<a href="<?=PATH_URL; ?>page/ローカルサービスアパートメント・アパートメントのご紹介">
								<span>アオザイハウジングではホーチミン市のサービスアパートほぼ全てをご紹介しております。サイゴンビューレジデンス,カンタビル・ホアン・カウ,サマセットビスタ,サマーセット・ホーチミン, サマーセット・チャンセラーコート,ノーフォークマンション,ランカスター,インターコンチネンタル, セドナスイーツ,シティビュー,ランドマーク,アバロン,サイゴンパビロン,シャーウッドレジデンス, サイゴンコート,クレッセントレジデンス,ウォーターフロント,カプリなど気になるサービスアパートが御座いましたらお気軽にご相談下さい。</span> <br />  
								</a>
							</li>

                            <li>
                                <a href="<?=PATH_URL; ?>page/ローカルサービスアパートメント・アパートメントのご紹介">
                                <span>アオザイハウジングではホーチミン市のコンドミニアムほぼ全てをご紹介しております。サイゴンパール、マナー、シティガーデン、ビンホームズセントラルパーク、ホライズン、セーリングタワー、シーリバービュー、アセント、マステリタオディエン、カンタビルプレミア、サマセットビスタ、エステラ、タオディエンパール、パノラマ、ガーデンコート、リバーパーク、サンライズシティなど気になるコンドミニアムが御座いましたらお気軽にご相談下さい。</span> <br />  
                                </a>
                            </li>
						</ul>
					</div>
                </div>
            <?php echo modules::run('news/getlist_news'); ?>
            <?php echo modules::run('common/facebookPlugin'); ?>
            <?php echo modules::run('bannersidebar/getlist_banner'); ?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<?php } ?>
	
<!-- HTML Parallax -->	
<!-- ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工 -->
<?php if($this->uri->segment(2)=='ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工' || $this->uri->segment(2)=='オフィス店舗デザイン・設計施工の流れ'){ ?>
	<?php $this->load->view('FRONTEND/parallax'); ?>
<?php }elseif($this->uri->segment(2)=='ベトナム ホーチミン オフィス店舗 内装工事'){ ?>
    <?php $this->load->view('FRONTEND/parallax2'); ?>
<?php } ?>
<!-- End HTML Parallax -->

<?php
$module =  $this->router->fetch_class();
$function = $this->router->fetch_method();
?>
    <?php echo modules::run('common/footer'); ?>
<script type="text/javascript">
  <?php if($module == "home"): ?>
  $(document).ready(function(){
        if($(".main-left").height() < $(".main-right").height())
        {
            $(".main-content").css("position", "relative");
            $(".main-left").css({'position':'absolute','overflow':'hidden'});
            $(".tag_cloud").css({'bottom':'0','position':'absolute'});
        }
        console.log($(".main-left").height(), $(".main-right").height());
  });
  <?php endif; ?>
</script>
</body>
</html>