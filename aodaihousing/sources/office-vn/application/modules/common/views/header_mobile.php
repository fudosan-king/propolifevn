<div class="head-logo">
    <div class="wrapper-content"></div>
    <div class="menu-res">
        <div class="title-menu">
            <div class="logo-res">
                <a href="<?=create_url();?>">
                    <img src="<?=PATH_URL_IMAGES.'static/images/aodai_mobile/'?>logo.png" alt="" class="img-responsive">
                </a>
            </div>      
            <div class="menu-custom">
                <a href="tel:<?php echo lang('sp_phone_mobile'); ?>">
                    <div class="top-contact">
                        <div class='bottomleft'></div>
                        <div class='topright'></div>
                        <p class="phone"><?php echo lang('電話番号'); ?></p>
                        <p class="phone-number"><?php echo lang('sp_phone_mobile'); ?></p>
                        <img src="<?=PATH_URL_IMAGES.'static/images/aodai_mobile/'?>phone.png">
                    </div>
                </a>

            </div>
        </div>
        
        <div class="menu-hide">
            <button type="button" class="navbar-toggle">    
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>      
            </button>
            
            <div class="nav-custom">
                <div class="nav-res"> 
                    <ul>
                        <?php if(current_lang_() == 'vn'){?>
                        <a href="<?=create_url(); ?>">
                            <li class="menu-profile <?php if($this->uri->segment(2)=='') echo 'active' ?>"><?php echo lang('ホームへ'); ?></li></a>
                            <!-- -->
                       <a href="<?=create_url(); ?>page/短期アパートのご案内">
                            <li class="menu-profile <?php if($this->uri->segment(2)=='短期アパートのご案内') echo 'active' ?>"><?php echo lang('短期賃貸アパートのご案内'); ?></li></a>

                        <a href="<?=create_url(); ?>page/ベトナム賃貸不動産 ご契約の流れ">
                            <li class="menu-design-interior <?php if($this->uri->segment(2)=='ベトナム賃貸不動産 ご契約の流れ') echo 'active' ?>"><?php echo lang('賃貸契約の流れ'); ?></li></a>
                        
                        <a href="<?=create_url(); ?>page/ローカルサービスアパートメント・アパートメントのご紹介">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='ローカルサービスアパートメント・アパートメントのご紹介') echo 'active' ?>"><?php echo lang('ホーチミンの住居の種類'); ?></li></a>

                        <a href="<?=create_url(); ?>page/オフィスのご案内">
                            <li class="menu-estate <?php if($this->uri->segment(2)=='オフィスのご案内') echo 'active' ?>"><?php echo lang('ホーチミンのオフィスについて'); ?></li></a>
                        
                        <a href="<?=create_url(); ?>page/アオザイサポートデスク">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='アオザイサポートデスク') echo 'active' ?>"><?php echo lang('アオザイハウジングのサポート'); ?></li></a>
                        
                        <a href="<?=create_url(); ?>page/ベトナムビザ・労働許可証">
                            <li class="menu-consult-renovation <?php if($this->uri->segment(2)=='ベトナムビザ・労働許可証') echo 'active' ?>"><?php echo lang('ベトナムビザ'); ?></li></a>
                        
                        <a href="<?=create_url(); ?>page/ベトナム労働許可証">
                            <li class="menu-consult-renovation <?php if($this->uri->segment(2)=='ベトナム労働許可証') echo 'active' ?>"><?php echo lang('ベトナム労働許可証'); ?></li></a>
                        
                        <a href="<?=create_url(); ?>page/進出支援のご案内">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='進出支援のご案内') echo 'active' ?>"><?php echo lang('会社設立&スタートアップ支援'); ?>
                            </li>
                        </a>
                        
                        <a href="<?=create_url(); ?>page/駐在員事務所設立＆スタートアップ支援">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='駐在員事務所設立＆スタートアップ支援') echo 'active' ?>"><?php echo lang('駐在員事務所設立＆スタートアップ支援'); ?>
                            </li>
                        </a>

                        <a href="<?=create_url(); ?>page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工') echo 'active' ?>"><?php echo lang('オフィス内装工事のご案内'); ?>
                            </li>
                        </a>
<!--                        <a href="http://www.propolifevietnam.com/web%E3%82%B5%E3%82%A4%E3%83%88%E5%88%B6%E4%BD%9C.html">-->
<!--                            <li>--><?php //echo lang('割安WEBサイト制作のご案内'); ?><!--</li>-->
<!--                        </a> -->

                        <a href="<?=PATH_URL; ?>vn/contact/contact_mobile"><li class="menu-contact-us <?php if($this->uri->segment(3)=='contact_mobile') echo 'active' ?>"><?php echo lang('お問い合わせをする'); ?></li></a> <!-- Contact -->
                        <?php 
                        }else{
                        ?>

                        <a href="<?=create_url(); ?>">
                            <li class="menu-profile <?php if($this->uri->segment(2)=='') echo 'active' ?>"><?php echo lang('ホームへ'); ?></li></a>

                        <a href="<?=create_url(); ?>page/短期アパートのご案内">
                            <li class="menu-profile <?php if($this->uri->segment(2)=='短期アパートのご案内') echo 'active' ?>"><?php echo lang('短期賃貸アパートのご案内'); ?></li></a>

                        <a href="<?=create_url(); ?>page/ベトナム賃貸不動産 ご契約の流れ">
                            <li class="menu-design-interior <?php if($this->uri->segment(2)=='ベトナム賃貸不動産 ご契約の流れ') echo 'active' ?>"><?php echo lang('賃貸契約の流れ'); ?></li></a>
                        
                        <a href="<?=create_url(); ?>page/ローカルサービスアパートメント・アパートメントのご紹介">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='ローカルサービスアパートメント・アパートメントのご紹介') echo 'active' ?>"><?php echo lang('ホーチミンの住居の種類'); ?></li></a>

                        <a href="<?=create_url(); ?>page/オフィスのご案内">
                            <li class="menu-estate <?php if($this->uri->segment(2)=='オフィスのご案内') echo 'active' ?>"><?php echo lang('ホーチミンのオフィスについて'); ?></li></a>
                        
                        <a href="<?=create_url(); ?>page/アオザイサポートデスク">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='アオザイサポートデスク') echo 'active' ?>"><?php echo lang('アオザイハウジングのサポート'); ?></li></a>
                        
                        <a href="<?=create_url(); ?>page/ベトナムビザ・労働許可証">
                            <li class="menu-consult-renovation <?php if($this->uri->segment(2)=='ベトナムビザ・労働許可証') echo 'active' ?>"><?php echo lang('ベトナムビザ'); ?></li></a>
                        
                        <a href="<?=create_url(); ?>page/ベトナム労働許可証">
                            <li class="menu-consult-renovation <?php if($this->uri->segment(2)=='ベトナム労働許可証') echo 'active' ?>"><?php echo lang('ベトナム労働許可証'); ?></li></a>
                        
                        <a href="<?=create_url(); ?>page/進出支援のご案内">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='進出支援のご案内') echo 'active' ?>"><?php echo lang('会社設立&スタートアップ支援'); ?>
                            </li>
                        </a>
                        
                        <a href="<?=create_url(); ?>page/駐在員事務所設立＆スタートアップ支援">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='駐在員事務所設立＆スタートアップ支援') echo 'active' ?>"><?php echo lang('駐在員事務所設立＆スタートアップ支援'); ?>
                            </li>
                        </a>

                        <a href="<?=create_url(); ?>page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工') echo 'active' ?>"><?php echo lang('オフィス内装工事のご案内'); ?>
                            </li>
                        </a>
<!--                        <a href="http://www.propolifevietnam.com/web%E3%82%B5%E3%82%A4%E3%83%88%E5%88%B6%E4%BD%9C.html">-->
<!--                            <li>--><?php //echo lang('割安WEBサイト制作のご案内'); ?><!--</li>-->
<!--                        </a> -->
                        <a href="<?=PATH_URL; ?>contact/contact_mobile">
                            <li class="menu-contact-us <?php if($this->uri->segment(2)=='contact_mobile') echo 'active' ?>"><?php echo lang('お問い合わせをする'); ?>
                            </li>
                        </a> <!-- Contact -->
                        <?php 
                        }
                        ?>
                    </ul>
                
                    <div class="language-custom"> 
                        <ul>
                            <a href="<?php echo change_lang(''); ?>">
                                <li class="jp-lang"><img src="<?=PATH_URL_IMAGES.'static/images/aodai_mobile/'?>jp.png"><p><?php echo lang('japanese'); ?></p></li>
                            </a>
                            <a href="<?php echo change_lang('vn'); ?>">
                                <li class="vi-lang"><img src="<?=PATH_URL_IMAGES.'static/images/aodai_mobile/'?>vn.png"><p><?php echo lang('vietnamese'); ?></p></li>
                            </a>
                        </ul>   
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
    var h_window=window.innerHeight;
    var menu_scroll = h_window - 51;
    var uri_string = '<?= $this->uri->uri_string(); ?>';
    
    
    $('.nav-res').css('height',menu_scroll);
    $(window).resize(function(){
        var h_window=window.innerHeight;
        var menu_scroll = h_window - 51;
        $('.nav-res').css('height',menu_scroll);
    });

    jQuery('.nav-res').scroll(function(){
        var h_window=window.innerHeight;
        jQuery(".nav-res").css("height",h_window-52);
    })

    jQuery('.search-houses').click(function(){
        window.location.href = "<?=create_url(); ?>#houses";
        if(uri_string == "/vn/" || uri_string == "") {
            location.reload();
        }

    })
    
    jQuery('.search-offices').click(function(){
        window.location.href = "<?=create_url(); ?>#offices";
        if(uri_string == "/vn/" || uri_string == "") {
            location.reload();
        }
    })
});


</script>