<?php
    $is_home = $this->router->fetch_class() === 'home' ? true: false;
    $effect_home = '';
    if ($is_home) {
        $effect_home = 'bounceInUp';
    }
?>
<div id="support-lazy" class="support-block <?php echo $effect_home; ?>">
    <div class="container">
        <h3 class="heading-title">ベトナム進出支援</h3>
        <div class="support-list">
            <ul class="clearfix">
                <li>
                    <a href="<?=create_url() . $support_one; ?>">会社設立＆<br/>スタートアップ支援</a>
                </li>
                <li>
                    <a href="<?=create_url() . $support_two; ?>">駐在員事務所設立＆<br/>スタートアップ支援</a>
                </li>
                <li class="two-line">
                    <a href="<?=create_url() . $support_three; ?>">ベトナム労働許可証</a>
                </li>
                <li class="two-line">
                    <a href="<?=create_url() . $support_four; ?>">ベトナムビザ</a>
                </li>
                <li class="two-line">
                    <a href="<?=create_url() . $support_six; ?>">オフィス内装工事</a>
                </li>
            </ul>
        </div>
    </div>
</div>