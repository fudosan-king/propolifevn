<div class="news-wrapp news-wrapp-mobile detail-news-wrapp">
    <div class="container">
        <!-- Breadcums -->
        <?php
            // File store under folder application/views/FRONTEND/breadcums.php
            echo $this->load->view('FRONTEND/breadcums');
        ?>
        <div class="vn-visa">
            <?php if($item->tag_h1 != ""): ?>

            <?php if(strstr($item->tag_h1, 'none')): ?>
                <div style="display: none;"  class="red-heading-title"><h4><?=$item->tag_h1; ?></h4></div>
            <?php else: ?>
                <div  class="red-heading-title"><h4><?=$item->tag_h1; ?></h4></div>
            <?php endif; ?>
        
            <?php endif; ?>  
            <div class="bt-solid"></div>      
            <h4 class="item-title"><?=vcp_printf($item->title, current_lang_()); ?></h4>
            <div class="detail-news">
                <?php if($this->uri->segment(2)=='ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工' || $this->uri->segment(2)=='オフィス店舗デザイン・設計施工の流れ'){ ?>
                    <?php $this->load->view('FRONTEND/parallax_device'); ?>
                <?php }else if($this->uri->segment(2)=='html_parallax2'){ ?>
                    <?php $this->load->view('FRONTEND/parallax_device2'); ?>
                <?php }else{
                    $email_old1 = '<a href="http://aodaihousing.com/contact/contact_step1" class="iframe pc-show"><span class="mail-contact">無料相談フォームはこちら</span></a>';
                    $email_old2 = '<a class="iframe pc-show" href="http://aodaihousing.com/contact/contact_step1"><span class="mail-contact">無料相談フォームはこちら</span></a>';
                    $email_old3 = '<a class="iframe pc-show" href="https://aodaihousing.com/contact/contact_step1"><span class="mail-contact-bg2">問い合わせする</span></a>';
                    $email_old4 = '<a href="https://aodaihousing.com/contact/contact_step1" class="iframe pc-show"><span class="mail-contact-p_01">問い合わせする</span></a>';
                    $email_old5 = '<a class="iframe" href="https://aodaihousing.com/contact/contact_step1"><span class="mail-contact-p_01">問い合わせする</span></a>';
                    $email_old6 = '<a class="iframe pc-show" href="https://aodaihousing.com/contact/contact_step1"><span style=" width: 230px;" class="mail-contact-lh">無料相談フォームはこちら</span></a>';
                    $email_new = '
                    <div class="contact-us-block ">
	                    <a id="showContact" data-toggle="modal" data-target="#contactModal" class="contact-detail btn-red">問い合わせする	</a>
	                <div class="content-tel clearfix">
		            <div class="content-tel-first">ＴＥＬ</div>
		            <div class="content-tel-second">
						<a x-ms-format-detection="none" href="tel:+84‐(0)28‐3827‐5068">+84‐(0)28‐3827‐5068 （アオザイハウジング代表日本語）</a>
				        <a x-ms-format-detection="none" href="tel:+84-(0)91-783-5778">+84-(0)91-783-5778 （魚山）</a>
					</div>
					</div>
					</div>
                    ';
                    $email_new1 = '
                    <div class="contact-us-block ">
	                    <a id="showContact" data-toggle="modal" data-target="#contactModal" class="contact-detail btn-red">問い合わせする	</a>
	                <div class="content-tel clearfix">
					</div>
					</div>
                    ';
                    $domain_replace         = 'http://aodaihousing.com/';
                    $domain_replace1        = 'https://aodaihousing.com';
                    $domain_need_replace_new= PATH_URL;
                    $item_new = vcp_printf($item->content,current_lang_());
                    $item_new = str_replace($email_old1,$email_new,$item_new);
                    $item_new = str_replace($email_old2,$email_new,$item_new);
                    $item_new = str_replace($email_old3,$email_new1,$item_new);
                    $item_new = str_replace($email_old4,$email_new1,$item_new);
                    $item_new = str_replace($email_old5,$email_new1,$item_new);
                    $item_new = str_replace($email_old6,$email_new1,$item_new);
                    $item_new = str_replace($domain_replace,$domain_need_replace_new,$item_new);
                    $item_new = str_replace($domain_replace1,$domain_need_replace_new,$item_new);
                    ?>
                    <?=$item_new;?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.main-left .content-search{
    display: none;
}
</style>