<div class="slide-main">
    <h1>席数から探せるベトナムホーチミン市のオフィスサイトです。</h1>
    <div id="featured" >
        <ul class="ui-tabs-nav">
            <?php
            if (isset($items) && is_array($items)) {
                $i = 0;
                $class = " ui-tabs-selected";
                ?>
                <?php
                foreach ($items as $item) {
                    $i++;
                    ?>
                    <li class="ui-tabs-nav-item <?php if ($i == 1) echo $class; ?>" id="nav-fragment-<?php echo $i; ?>"><a href="#fragment-<?php echo $i; ?>"><img src="<?= PATH_URL_IMAGES ?>static/uploads/offices/gallery/<?= $item['name_image']; ?>" width="75" height="48" alt="" /><span><?= cutStringJP(vcp_printf($item['name_jp'], current_lang_()),20); ?>...</span></a></li>

                    <?php
                }
            }
            ?>
        </ul>

        <!-- First Content -->
        <?php
        if (isset($items) && is_array($items)) {
            $i = 0;
            // print_r($items);
            ?>
            <?php
            foreach ($items as $item) {
                $i++;
                ?>
                <div id="fragment-<?= $i ?>" class="ui-tabs-panel" style="">
                    <img src="<?= PATH_URL_IMAGES ?>static/uploads/offices/gallery/<?= $item['name_image']; ?>" width="523" height="345" alt="" />
                    <div class="info" >
                        <span>
                            <p style="font-size: 20px"><a href="<?=create_url()."offices/detail/" . $item['office_id'] . '/' . vcp_printf($item['name_jp'], current_lang_()); ?>" ><?= vcp_printf($item['name_jp'], current_lang_()); ?></a></p>
                            <!-- <p style="font-size: 13px"><?= vcp_printf($item['introduction'], current_lang_()),5; ?></p>
                            <p><a style="font-size: 13px;color:#bebebe;" href="<?= create_url() . "offices/detail/" . $item['office_id'] . '/' . vcp_printf($item['name_jp'], current_lang_()); ?>" >詳細はこちら</a></p> -->
                            <div class="seat-cus">
                                <div class="seat">
									<?php
										$html_num = '';
										$size = $item['size'];
										if($size<=20){
											$html_num = '～5席 (～20m<sup>2</sup>)';
										}
										if($size>=24 && $size<=40){
											$html_num = '6～10席 (24m<sup>2</sup>～40m<sup>2</sup>)';
										}
										if($size>=44 && $size<=60){
											$html_num = '11～15席 (44m<sup>2</sup>～60m<sup>2</sup>)';
										}
										if($size>=64 && $size<=100){
											$html_num = '16～25席 (64m<sup>2</sup>～100m<sup>2</sup>)';
										}
										if($size>=104 && $size<=160){
											$html_num = '26～40席 (104m<sup>2</sup>～160m<sup>2</sup>)';
										}
										if($size>160){
											$html_num = '40席以上 (160m<sup>2</sup> 以上)';
										}
									?>
                                    <p><?=$html_num?></p>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <?php
            }
        }
        ?>


    </div>

    <div class="update-banner">
        <a href="<?=create_url(); ?>contact">
            <img src="<?=PATH_URL_IMAGES?>static/images/banner_office.png" />
        </a>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#featured > ul").tabs({fx: {opacity: "toggle"}}).tabs("rotate", 5000, true);
    });
</script>