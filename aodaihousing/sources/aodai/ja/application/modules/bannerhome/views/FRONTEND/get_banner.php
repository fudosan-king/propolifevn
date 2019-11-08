<div class="content-banner">
   <?php
    if($item) {
        ?>
        <?php if(current_lang()=='vn'){ ?>
        <a class="iframe pc-show" href="<?=PATH_URL;?>contact/contact_step1"><img src="<?php echo PATH_URL . 'static/uploads/bannerhome/banner_big_vn.jpg'?>"  /></a>
        <?php }else{ ?>
        <a class="iframe pc-show" href="<?=PATH_URL;?>contact/contact_step1"><img src="<?php echo PATH_URL . 'static/uploads/bannerhome/'.$item->images?>"  /></a>
        <?php
        }
    }
    ?>
    <map name="Map" id="Map">
      <area shape="rect" coords="190,190,410,140" href="<?=PATH_URL;?>contact/contact_step1" class="iframe" />
    </map>
</div>
