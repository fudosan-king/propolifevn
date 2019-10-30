<div class="wrapper-content-block vn-visa-block work-items-list-block">
    <div class="container">
        <!-- Breadcums -->
        <?php
        // File store under folder application/views/FRONTEND/breadcums.php
        echo $this->load->view('FRONTEND/breadcums');
        ?>
        <div class="office-sample">
            <h4 class="red-heading-title">
                <?php echo lang('page_fanuc_h4')?>
            </h4>
            <div class="bt-solid"></div>
            <div class="logo-lotus">
                <img src="<?php echo PATH_URL .'static/images/icon/logo-chronicle.png';?>" title="logo-lotus"/>
            </div>
            <div class="common-content-block content-support">
                <p class="bold-text">
                    <?php echo lang('page_fanuc_paragraph_1')?>
                </p>
            </div>
            <div class="common-content-block content-support">
                <p class="common-text">
                    <?php echo lang('page_fanuc_paragraph_2')?>
                </p>
                <div class="image-sample">
                    <img src="<?php echo PATH_URL.'static/images/office_sample/office-sample19.jpg';?>" alt="" />
                </div>
            </div>
            <div class="common-content-block content-support">
                <p class="common-text">
                    <?php echo lang('page_fanuc_paragraph_3')?>
                </p>
                <div class="image-sample">
                    <img src="<?php echo PATH_URL.'static/images/office_sample/office-sample20.jpg';?>" alt="" />
                </div>
            </div>
            <div class="common-content-block content-support">
                <p class="common-text">
                    <?php echo lang('page_fanuc_paragraph_4')?>
                </p>
                <div class="image-sample">
                    <img src="<?php echo PATH_URL.'static/images/office_sample/office-sample21.jpg';?>" alt="" />
                </div>
            </div>
            <div class="common-content-block content-support">
                <p class="common-text">
                    <?php echo lang('page_fanuc_paragraph_5')?>
                </p>
                <div class="image-sample">
                    <img src="<?php echo PATH_URL.'static/images/office_sample/office-sample22.jpg';?>" alt="" />
                </div>
            </div>
             <div class="common-content-block content-support">
                <p class="common-text">
                    <?php echo lang('page_fanuc_paragraph_6')?>
                </p>
                <div class="image-sample">
                    <img src="<?php echo PATH_URL.'static/images/office_sample/office-sample23.jpg';?>" alt="" />
                </div>
            </div>
             <div class="common-content-block content-support">
                <p class="common-text">
                    <?php echo lang('page_fanuc_paragraph_7')?>
                </p>
                <div class="image-sample">
                    <img src="<?php echo PATH_URL.'static/images/office_sample/office-sample24.jpg';?>" alt="" />
                </div>
            </div>
            <div class="common-content-block content-support">
                <p class="common-text">
                    <?php echo lang('page_fanuc_paragraph_8')?>
                </p>
            </div>
            <div class="common-content-block content-support">
                <p class="common-text">
                    <?php echo lang('page_fanuc_paragraph_9')?>
                </p>
            </div>
            <!-- Contact us button -->
            <?php
            // File store under folder application/views/FRONTEND/information_contact_us.php
            echo $this->load->view('FRONTEND/information_contact_us');
            ?>
        </div>		<!-- office-sample -->
        <div class="work-office-block">
                <h3 class="heading-title-line">施工事例WORK</h3>
                <div class="work-list">
                    <ul class="clearfix">
                        <li>
                            <div class="work-list-item">
                                <a href="<?php echo PATH_URL . $vn; ?>page/リーガル（REGAL）様 ホーチミン内装工事例" title="">REGAL様<br/>（靴メーカー）</a>
                            </div>
                        </li>
                        <li>
                            <div class="work-list-item">
                                <a href="<?php echo PATH_URL . $vn; ?>page/バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例" title="">VITALIFYASIA様<br/>
                                （システム開発）</a>
                            </div>
                        </li>
                        <li>
                            <div class="work-list-item">
                                <a href="<?php echo PATH_URL . $vn; ?>page/センコーベトナム様" title="">センコーベトナム様<br/>
                                （国際物流）</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="clearfix">
                        <li>
                            <div class="work-list-item">
                                <a href="<?php echo PATH_URL . $vn; ?>page/内装工事事例" title="">B-art（学校法人三幸学園）様<br/>
                                （美容専門学校）
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="work-list-item">
                                <a href="<?php echo PATH_URL . $vn; ?>page/photron-vietnam" title="">Photoron Vietnam様<br/>
                                （精密機器開発、システム開発）
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="work-list-item">
                                <a href="<?php echo PATH_URL . $vn; ?>page/dong-shop-sun" title="">DONG SHOP SUN様<br/>
                                （日系質屋）
                                </a>
                            </div>
                        </li>
                    </ul>
                    <ul class="clearfix">
                        <li>
                            <div class="work-list-item">
                                <a href="<?php echo PATH_URL . $vn; ?>page/samurai" title="">SAMURAI様<br/>
                                （レストラン）
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="work-list-item">
                                <a href="<?php echo PATH_URL . $vn; ?>page/オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様" title="">
                                オルグローラボ様<br/>
                                （ITオフショア開発）</a>
                            </div>
                        </li>
                        <li>
                            <div class="work-list-item">
                                <a href="<?php echo PATH_URL . $vn; ?>page/リーガル（REGAL）様" title="">リーガル様2<br/>
                                （靴メーカー）
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
        </div><!-- work-office-block -->
        <!-- <div class="btn-home">
           <a href="<?=create_url(); ?>" class="">
                <span> ホームに戻る</span>  
           </a> 
        </div> -->
    </div>
</div><!-- vn-visa-block -->