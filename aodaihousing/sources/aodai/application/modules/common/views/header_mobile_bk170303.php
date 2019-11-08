<div class="head-logo">
    <div class="wrapper-content"></div>
    <div class="menu-res">
        <div class="title-menu">
            <div class="logo-res">
                <a href="<?=create_url();?>">
                    <img src="<?=PATH_URL.'static/images/aodai_mobile/'?>logo.png" alt="" class="img-responsive">
                </a>
            </div>      
            <div class="menu-custom">
                <a href="tel:<?php echo lang('phone_mobile'); ?>">
                    <div class="top-contact">
                        <div class='bottomleft'></div>
                        <div class='topright'></div>
                        <p class="phone"><?php echo lang('電話番号'); ?></p>
                        <p class="phone-number"><?php echo lang('phone_mobile'); ?></p>
                        <img src="<?=PATH_URL.'static/images/aodai_mobile/'?>phone.png">
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
                        <a href="<?=create_url(); ?>page/ベトナム法人設立,駐在員事務所開設サポート">
                            <li class="menu-profile <?php if($this->uri->segment(3)=='ベトナム法人設立,駐在員事務所開設サポート') echo 'active' ?>"><?php echo lang('ベトナム法人設立のご相談'); ?></li></a>
                            <!-- <?=create_url(); ?>page/ベトナム法人設立,駐在員事務所開設サポート -->
                        
                        <a href="<?=create_url(); ?>page/ベトナムビザ・労働許可証">
                            <li class="menu-consult-visa <?php if($this->uri->segment(3)=='ベトナムビザ・労働許可証') echo 'active' ?>"><?php echo lang('ビザの取得を相談する'); ?></li></a>
                            <!-- <?=create_url(); ?>page/ベトナムビザ・労働許可証 -->
                        
                        <a href="<?=create_url(); ?>page/ロンハウ工業団地">
                            <li class="menu-estate <?php if($this->uri->segment(3)=='ロンハウ工業団地') echo 'active' ?>"><?php echo lang('ロンハウ工業場団地を知る'); ?></li></a>
                            <!-- <?=create_url(); ?>page/ロンハウ工業団地 -->

                        <a href="<?=create_url(); ?>page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工">
                            <li class="menu-design-interior <?php if($this->uri->segment(3)=='ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工') echo 'active' ?>"><?php echo lang('オフィスの内装を相談する'); ?></li></a>
                            <!-- <?=create_url(); ?>page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工 -->
                        
                        <a href="<?=create_url(); ?>page/ベトナム ホーチミン オフィス店舗 内装工事">
                            <li class="menu-consult-renovation <?php if($this->uri->segment(3)=='ベトナム ホーチミン オフィス店舗 内装工事') echo 'active' ?>"><?php echo lang('お住まいのリノベーションを相談する'); ?></li></a>
                            <!-- <?=create_url(); ?>page/ベトナム ホーチミン オフィス店舗 内装工事 -->
                        
                        <a href="<?=create_url(); ?>page/WEB広告をしたい">
                            <li class="menu-consult-visa <?php if($this->uri->segment(3)=='WEB広告をしたい') echo 'active' ?>"><?php echo lang('WEB広告をしたい'); ?></li></a>
                        
                        <a href="javascript:;" class="search-houses">
                            <li class="menu-search <?php if($this->uri->segment(2)=='search_options'||($this->uri->segment(2)=='search' && $this->input->get('opt')=='house')) echo 'active' ?>"><?php echo lang('物件を探す'); ?>
                            </li>
                        </a> 

                        <a href="javascript:;" class="search-offices">
                            <li class="menu-search <?php if($this->uri->segment(1)=='search_options'||($this->uri->segment(1)=='search' && $this->input->get('opt')=='office')) echo 'active' ?>"><?php echo lang('オフィス物件探す'); ?>
                            </li>
                        </a> 

                        <a href="<?=PATH_URL; ?>vn/contact/contact_mobile"><li class="menu-contact-us <?php if($this->uri->segment(3)=='contact_mobile') echo 'active' ?>"><?php echo lang('お問い合わせをする'); ?></li></a> <!-- Contact -->
                        <?php 
                        }else{
                        ?>
                        <a href="<?=create_url(); ?>page/ベトナム法人設立,駐在員事務所開設サポート">
                            <li class="menu-profile <?php if($this->uri->segment(2)=='ベトナム法人設立,駐在員事務所開設サポート') echo 'active' ?>"><?php echo lang('ベトナム法人設立のご相談'); ?></li></a>
                            <!-- <?=create_url(); ?>page/ベトナム法人設立,駐在員事務所開設サポート -->
                        
                        <a href="<?=create_url(); ?>page/ベトナムビザ・労働許可証">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='ベトナムビザ・労働許可証') echo 'active' ?>"><?php echo lang('ビザの取得を相談する'); ?></li></a>
                            <!-- <?=create_url(); ?>page/ベトナムビザ・労働許可証 -->

                        <a href="<?=create_url(); ?>page/ロンハウ工業団地">
                            <li class="menu-estate <?php if($this->uri->segment(2)=='ロンハウ工業団地') echo 'active' ?>"><?php echo lang('ロンハウ工業場団地を知る'); ?></li></a>
                            <!-- <?=create_url(); ?>page/ロンハウ工業団地 -->

                        <a href="<?=create_url(); ?>page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工">
                            <li class="menu-design-interior <?php if($this->uri->segment(2)=='ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工') echo 'active' ?>"><?php echo lang('オフィスの内装を相談する'); ?></li></a>
                            <!-- <?=create_url(); ?>page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工 -->
                        
                        <a href="<?=create_url(); ?>page/ベトナム ホーチミン オフィス店舗 内装工事">
                            <li class="menu-consult-renovation <?php if($this->uri->segment(2)=='ベトナム ホーチミン オフィス店舗 内装工事') echo 'active' ?>"><?php echo lang('お住まいのリノベーションを相談する'); ?></li></a>
                            <!-- <?=create_url(); ?>page/ベトナム ホーチミン オフィス店舗 内装工事 -->
                        
                        <a href="<?=create_url(); ?>page/WEB広告をしたい">
                            <li class="menu-consult-visa <?php if($this->uri->segment(2)=='WEB広告をしたい') echo 'active' ?>"><?php echo lang('WEB広告をしたい'); ?>
                            </li>
                        </a>
                        
                        <a href="javascript:;" class="search-houses">
                            <li class="menu-search <?php if($this->uri->segment(2)=='search_options'||($this->uri->segment(2)=='search' && $this->input->get('opt')=='house')) echo 'active' ?>"><?php echo lang('物件を探す'); ?>
                            </li>
                        </a>
                        <a href="javascript:;" class="search-offices">
                            <li class="menu-search <?php if($this->uri->segment(1)=='search_options'||($this->uri->segment(1)=='search' && $this->input->get('opt')=='office')) echo 'active' ?>"><?php echo lang('オフィス物件探す'); ?>
                            </li>
                        </a> 

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
                                <li class="jp-lang"><img src="<?=PATH_URL.'static/images/aodai_mobile/'?>jp.png"><p><?php echo lang('japanese'); ?></p></li>
                            </a>
                            <a href="<?php echo change_lang('vn'); ?>">
                                <li class="vi-lang"><img src="<?=PATH_URL.'static/images/aodai_mobile/'?>vn.png"><p><?php echo lang('vietnamese'); ?></p></li>
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