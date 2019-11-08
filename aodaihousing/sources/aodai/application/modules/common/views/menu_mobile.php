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