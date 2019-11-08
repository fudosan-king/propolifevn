<div class="wrapper-content-block">
    <div class="content-search-block">
        <div class="container">
            <!-- Breadcums -->
            <?php
            // File store under folder application/views/FRONTEND/breadcums.php
            echo $this->load->view('FRONTEND/breadcums');
            ?>

            <div class="iframe_box">
                <div class="pc">
                    <div class="title_custommer">
                        <p><?= lang('ご愛顧いただいているお客様の声')?></p>
                    </div>
<!--                    <img src="--><?php //echo PATH_URL . 'static/images/banner/customer_comment.png';?><!--" alt="ご愛顧いただいているお客様の声">-->
                </div>
                    <?php if(isset($items) && count($items) > 0):?>
                        <div class="div_voice style-3">
                            <?php foreach ($items as $item):?>
                                <dl>
                                    <dt><?php echo $item->title;?></dt>
                                    <dd>
                                        <p><?php echo $item->description;?></p>
                                    </dd>
                                </dl>
                            <?php endforeach;?>
                        </div>
                    <?php else: ?>
                        <div class="div_voice_no_data">
                            <p><?= lang('データは最短時間で更新されます。')?></p>
                        </div>
                    <?php endif;?>

                <!--/voice-->
            </div>

        </div><!-- end .content-search-block -->
    </div><!-- content-search-block -->
