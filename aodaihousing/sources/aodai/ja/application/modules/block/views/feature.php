<?php
    $is_home = $this->router->fetch_class() === 'home' ? true: false;
    $effect_home = '';
    if ($is_home) {
        $effect_home = 'slideInUp';
    }
?>
<div class="feature-block <?php echo $effect_home; ?>">
    <div class="container">
        <h2 class="heading-title">ホーチミンの賃貸物件について</h2>
        <div class="option-list-block">
            <ul class="options-list clearfix">
                <li>
                    <a href="<?=create_url() . $note; ?>">
                        <div class="icon-navsprites-note"></div>
                        <span>入居までの流れ</span>
                    </a>
                </li>
                <li>
                    <a href="<?=create_url() . $building_3_stories; ?>">
                       <div class="icon-navsprites-building-3-stories"></div>
                        <span>ホーチミンの住居の種類と注意点</span>
                    </a>
                </li>
                <li>
                    <a href="<?=create_url() . $home_person; ?>">
                        <div class="icon-navsprites-home-person"></div>
                        <span> ホーチミンの住居と<br/>日本の住居の違い</span>
                    </a>
                </li>
                <li>
                    <a href="<?=create_url() . $question; ?>">
                        <div id="icon-navsprites-q-and-a">
                            <img class="lazyload" data-original="<?php echo PATH_URL . 'static/'; ?>images/icon/q-and-a.png" alt="">
                        </div>
                        <span>よくある質問</span>
                    </a>
                </li>
                <li>
                    <a href="<?=create_url() . $hcm_office; ?>">
                        <div class="icon-navsprites-office"></div>
                        <span>ホーチミンのオフィス<br/>について</span>
                    </a>
                </li>
                <li>
                    <a href="<?=create_url() . $support_option; ?>">
                        <div id="icon-navsprites-question-new">
                            <img class="lazyload" data-original="<?php echo PATH_URL . 'static/'; ?>images/icon/question-new.png" alt="">
                        </div>
                        <span>サポートオプション</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>