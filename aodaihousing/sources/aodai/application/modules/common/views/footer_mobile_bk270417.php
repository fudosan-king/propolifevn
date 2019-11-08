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
                <a href="<?=create_url(); ?>page/進出支援のご案内"><?php echo lang('会社設立サポート'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/ベトナムビザ・労働許可証"><?php echo lang('ビザ・労働許可証'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工"><?php echo lang('オフィス・店舗内装工事'); ?></a>
            </li>
        <?php } else { ?>
            <li>
                <a href="<?=create_url(); ?>page/進出支援のご案内"><?php echo lang('会社設立サポート'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/ベトナムビザ・労働許可証"><?php echo lang('ビザ・労働許可証'); ?></a>
            </li>
             <li>
                <a href="<?=create_url(); ?>page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工"><?php echo lang('オフィス・店舗内装工事'); ?></a>
            </li>
        <?php } ?>
    </ul>
</div>

<div class="bottom-logo">
	<a href="<?=create_url(); ?>">
		<img src="<?=PATH_URL.'static/images/aodai_mobile/'?>logo.png" alt="" class="img-responsive">
	</a>
</div>
<a href="tel:<?php echo lang('phone_mobile'); ?>">
    <div class="top-contact">
        <div class='bottomleft'></div>
        <div class='topright'></div>
        <p class="phone"><?php echo lang('電話番号'); ?></p>
        <p class="phone-number">+84838275068</p>
        <img src="<?=PATH_URL.'static/images/aodai_mobile/'?>phone.png">
    </div>
</a>