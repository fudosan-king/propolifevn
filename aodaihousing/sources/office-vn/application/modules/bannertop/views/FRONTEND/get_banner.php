<?php if(!empty($items)): ?>
<div class="carousel">
        <a href="#" class="prev"></a>
        <div class="jCarouselLite">
            <ul>
            <?php foreach($items as $item): ?>
                <li>
                <a href="<?=vcp_printf($item->link, current_lang_())?>">
                    <div class="sroll_content">
                        <img src="<?php echo PATH_URL_IMAGES . 'static/uploads/bannerhome/' . $item->images ?>" alt="" height="138" width="215">
                        <div class="caption"><?php echo vcp_printf($item->caption, current_lang_()); ?></div>
                        <div class="descption"><span><?php echo vcp_printf($item->description, current_lang_()); ?></span></div>
                    </div>
                </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <a href="#" class="next"></a>
        <div class="clear"></div>   
    </div>      
    <script type="text/javascript">
        $(".carousel .jCarouselLite").jCarouselLite({
            btnNext: ".carousel .next",
            btnPrev: ".carousel .prev",
            mouseWheel: true,
            circular: false

            
        });   
    </script>
    
<?php endif; ?> 