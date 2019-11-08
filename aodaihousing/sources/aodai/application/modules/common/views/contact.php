<div class="contact-detail">
    <h5 class="title"><?php echo lang('お問い合せ'); ?></h5>
    <div class="contact-s">
        <div class="thumb">
            <img src="<?=PATH_URL_IMAGES?>static/images/girl.jpg" />
        </div>
        <div class="detail-p">
            <span class="title"><?php echo lang('アオザイハウジング'); ?></span>
            
            <div class="detail-contact">
                <span class="phone">
                    <?php echo lang('aodai_phone1') ?> <br />
                    <?php echo lang('aodai_phone2'); ?> <br />
                    <?php echo lang('aodai_phone3'); ?>
                </span>
                <span class="time"><?php echo lang('time'); ?></span>
                <span class="add"><?php echo lang('address') ?></span>
            </div>
            <span class="icon-contact">
                <a href="<?=PATH_URL?>contact/contact_step1?type=<?=$type?>&id=<?=$id;?>" class="iframe">contact</a>
            </span>
        </div>
    </div>
</div>