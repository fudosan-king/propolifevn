<div class="box-banner">
        <div class="right-item">
            <?php
            if(!empty($items)) {
                foreach($items as $item){
                ?>
                <a href="<?php echo $item->link; ?>" target="_blank">
                    <img src="<?php echo PATH_URL_IMAGES . 'static/uploads/bannersidebar/' . $item->images ?>"  />
                </a>
                
                <?php
                }
            }
            ?>
        </div>
    </div>
</div>