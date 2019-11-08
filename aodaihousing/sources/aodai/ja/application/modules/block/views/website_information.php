<div class="website-information slideInUp">
    <div class="container">
        <h3 class="heading-title-line">アオザイインフォメーション</h3>
        <div class="info-webpage-list">
            <div class="row">
                <div class="col-xs-6 col-info-website-item">
                        <div id="fb-root"></div>
                        <div id="pageContainer">
                        </div>
                </div><!-- end .col-xs-6 col-info-website-item -->
                
                <!-- col-info-website-item -->
                <div class="col-xs-6 col-info-website-item" id="info-website-block">
                    <?php if ($news): ?>
                        <?php foreach ($news as $key => $item): ?>
                            <?php
                                // Images
                                if (!$item->images) {
                                    // Default images use for all item in array news
                                    $images_default = 'image13_1.png';
                                    if ($key > 0) {
                                        $images_default = 'image14_1.png';
                                    }
                                    $images = PATH_URL . 'static/images/items/' . $images_default;
                                } else {
                                    $images = PATH_URL . 'static/uploads/news/' . $item->images;
                                }

                                // Title
                                $href_h4 = create_url('news/' . $item->id . '/' . vcp_printf($item->title, $language));
                                $title_h4 = vcp_printf($item->title, $language);
                                $info_title = mb_strlen(vcp_printf($item->title, $language),'utf-8');
                                if ($info_title <= $limit_title) {
                                    $title_h4 = vcp_printf($item->title, $language);
                                } else {
                                    $title_h4 = mb_substr(vcp_printf($item->title, $language), 0, $limit_title, 'utf-8') . $string_limit_content;
                                }

                                // Content
                                $info_content = mb_strlen(vcp_printf($item->content, $language),'utf-8');
                                if ($info_content <= $limit_content) {
                                    $content = vcp_printf($item->content, $language);
                                } else {
                                    $content = mb_substr(vcp_printf($item->content, $language, array(), true), 0, $limit_content, 'utf-8') . $string_limit_content;
                                }

                                // Date
                                $date = date("j M Y", strtotime($item->created));
                            ?>
                            <div class="row">                                
                                <div class="col-xs-12 col-items-block">
                                    <div class="des-info-item">
                                        <p class="time-block background-dot-red"><?php echo $date; ?></p>
                                        <h4 class="background-dot-red"><a href="<?php echo $href_h4; ?>" title=""><?php echo $title_h4; ?></a></h4>
                                        <a href="<?php echo $href_h4; ?>" class="des-info-item-content background-dot-dark">
                                            <p><?php echo $content; ?></p>
                                        </a>
                                    </div>  
                                </div><!-- end .col-xs-12 col-items-block background-dot-dark -->
                            </div><!-- end .row -->
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div><!-- end .col-xs-6 col-info-website-item -->
                <!-- col-info-website-item -->
            </div><!-- end .row -->
        </div><!-- end .info-webpage-list -->
    </div><!-- end .container -->
</div><!-- end .website-information slideInUp -->