<div class="top-navbar">
    <ul>
        <?php if(current_lang_() == 'vn'){
        ?>
        <a href="<?=create_url(); ?>">
            <li class="nav-first <?php if($this->uri->segment(2)=='' || $this->uri->segment(2)=='search' || $this->uri->segment(2)=='search_options') echo 'active' ?>"><?php echo lang('物件を探す'); ?></li>
        </a>   <!-- Search --> 
        <a href="<?=create_url(); ?>page/プロポライフベトナム 会社概要">
            <li class="nav-items <?php if($this->uri->segment(3)=='プロポライフベトナム 会社概要') echo 'active' ?>"><?php echo lang('会社概要'); ?></li>
        </a> <!-- Introduce -->
        <a href="<?=PATH_URL; ?>vn/contact/contact_mobile">
            <li class="nav-last <?php if($this->uri->segment(2)=='contact') echo 'active' ?>"><?php echo lang('お問い合わせ'); ?></li>
        </a> <!-- Contact -->
        
        <?php 
        }else{ 
        ?>

        <a href="<?=create_url(); ?>">
            <li class="nav-first <?php if($this->uri->segment(1)=='' || $this->uri->segment(1)=='search' || $this->uri->segment(1)=='search_options') echo 'active' ?>"><?php echo lang('物件を探す'); ?></li>
        </a>   <!-- Search --> 
        <a href="<?=create_url(); ?>page/プロポライフベトナム 会社概要">
            <li class="nav-items <?php if($this->uri->segment(2)=='プロポライフベトナム 会社概要') echo 'active' ?>"><?php echo lang('会社概要'); ?></li>
        </a> <!-- Introduce -->
        <a href="<?=PATH_URL; ?>contact/contact_mobile">
            <li class="nav-last <?php if($this->uri->segment(1)=='contact') echo 'active' ?>"><?php echo lang('お問い合わせ'); ?></li>
        </a> <!-- Contact -->

        <?php 
        }
        ?>
    </ul>
</div>

<!-- --------------------Tu update logo branch ------------------ -->
<div class="link-branch fullwidth">
    <ul class="fullwidth">
        <?php if(current_lang_() == 'vn'){?>
            <li>
                <a href="<?=create_url(); ?>page/短期アパートのご案内"><?php echo lang('短期アパートのご案内'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/ローカルサービスアパートメント・アパートメントのご紹介"><?php echo lang('ホーチミンの住居の種類'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/オフィスのご案内"><?php echo lang('ホーチミンのオフィスについて'); ?></a>
            </li>
            <li>
                <a href="<?=create_url(); ?>page/ベトナムビザ・労働許可証"><?php echo lang('ベトナムビザのご案内'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/進出支援のご案内"><?php echo lang('会社設立&スタートアップ支援'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/駐在員事務所設立＆スタートアップ支援"><?php echo lang('駐在員事務所設立＆スタートアップ'); ?></a>
            </li>
        <?php } else { ?>
            <li>
                <a href="<?=create_url(); ?>page/短期アパートのご案内"><?php echo lang('短期アパートのご案内'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/ローカルサービスアパートメント・アパートメントのご紹介"><?php echo lang('ホーチミンの住居の種類'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/オフィスのご案内"><?php echo lang('ホーチミンのオフィスについて'); ?></a>
            </li>
            <li>
                <a href="<?=create_url(); ?>page/ベトナムビザ・労働許可証"><?php echo lang('ベトナムビザのご案内'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/進出支援のご案内"><?php echo lang('会社設立&スタートアップ支援'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/駐在員事務所設立＆スタートアップ支援"><?php echo lang('駐在員事務所設立＆スタートアップ'); ?></a>
            </li>
        <?php } ?>
    </ul>
</div>

<div class="bottom-logo">
	<a href="<?=create_url(); ?>">
		<img src="<?=PATH_URL_IMAGES.'static/images/aodai_mobile/'?>logo.png" alt="" class="img-responsive">
	</a>
</div>
<a href="tel:<?php echo lang('sp_phone_mobile'); ?>">
    <div class="top-contact">
        <div class='bottomleft'></div>
        <div class='topright'></div>
        <p class="phone"><?php echo lang('電話番号'); ?></p>
        <p class="phone-number"><?php echo lang('sp_phone_mobile'); ?></p>
        <img src="<?=PATH_URL_IMAGES.'static/images/aodai_mobile/'?>phone.png">
    </div>
</a>

<script type="text/javascript">
jQuery(document).ready(function() {
    var uri_string = '<?= $this->uri->uri_string(); ?>';
    jQuery('.search-houses').click(function(){
        window.location.href = "<?=create_url(); ?>#houses";
        if(uri_string == "/vn/" || uri_string == "") {
            location.reload();
        }

    })
});


</script>