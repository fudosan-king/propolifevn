<div class="content-banner">
   <?php
    if(!empty($item)) {
        ?>
        <a href="<?=$item->link;?>" target="_blank"><img usemap="#Map" src="<?php echo PATH_URL . 'static/uploads/bannerhome/' . $item->images ?>"  /></a>
        <?php
        
    }
    ?>
    <map name="Map" id="Map">
      <area shape="rect" coords="190,190,410,140" href="<?=PATH_URL;?>contact/contact_step1" class="iframe" />
    </map>
</div>
