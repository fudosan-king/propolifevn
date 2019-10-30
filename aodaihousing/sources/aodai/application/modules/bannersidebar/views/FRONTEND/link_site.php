<div class="box-main category-links">
    <div class="header-right">
        <div class="header">
            <div class="icon">
                <h2>関連サイト・リンク</h2>
            </div>
        </div>
        <div class="line">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
    </div>
    <div class="item-wap">
        <ul>
            <?php
            if (!empty($items)) {
                foreach ($items as $item) {
                    ?>
                    <li>
                        <a target="_blank" class="link" href="<?php echo $item->link; ?>"><img src="<?php echo PATH_URL_IMAGES . 'static/uploads/bannersidebar/' . $item->images ?>" /></a>
                    </li>
                    <?php
                }
            }
            ?>

        </ul>
    </div>
</div>