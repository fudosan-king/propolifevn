<div class="content-search-block">
    <div class="container">
        <!-- Breadcums -->
        <?php
            // File store under folder application/views/FRONTEND/breadcums.php
            echo $this->load->view('FRONTEND/breadcums', array('title' => vcp_printf($information->title, $current_lang)));
        ?>
        
        <div class="row">
            <div class="product-features clearFix">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="detail-building-left">
                        <h3>
                            <?php echo vcp_printf($information->title, $current_lang); ?>
                        </h3>
                        <div class="text">
                            <?php echo vcp_printf($information->description, $current_lang); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="detail-building-right">
                        <?php if ($information->image): ?>
                            <img src="<?php echo PATH_URL . 'static/uploads/building_buy_sell/' . $information->image; ?>">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="tab-content">
            <h3 class="product-detail-text"><?php echo vcp_printf($information->title_description_more, $current_lang); ?></h3>
            <div class="content-detail-building">
                <?php echo vcp_printf($information->description_more, $current_lang); ?>
            </div><!-- .content-detail-building -->
            <div class="box-button-contact">
                <div class="contact-us-block block_center_contact">
                    <a href="#" id="showContact" data-toggle="modal" data-target="#contactModal" class="contact-detail btn-red">
                        <?php echo lang('この物件を問い合わせする'); ?>
                    </a>
                </div>
            </div>
        </div><!-- end .container -->
    </div><!-- end .content-search-block -->
</div><!-- content-search-block -->