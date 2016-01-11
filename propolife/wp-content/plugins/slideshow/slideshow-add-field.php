<?php
$ar=explode(',',get_option('binfo[arr_banner]'));
foreach($ar as $i){			
	$gallery = get_option('binfo[gallery_datas_'.$i.']');
	$alt = get_option('binfo[banneralt_'.$i.']');
	$titleimg = get_option('binfo[img_title_'.$i.']');
	$url = get_option('binfo[bannerurl_'.$i.']');
	$slugbanner = get_option('binfo[op_banner_'.$i.']');
	$bannershow = get_option('binfo[hienthi_banner_'.$i.']');
	$titlebanner = get_option('binfo[banner_title_'.$i.']');	
	$ar_gal = explode(',',$gallery);	
	list($firstKey) = $ar_gal;
	$srcfirst = wp_get_attachment_image_src($firstKey,'slideshow_medium');
?>

<div id="number_banner_<?php echo $i;?>">
<div class="postbox">

<button type="button" class="handlediv button-link btn-collapse" aria-expanded="true">
<span class="screen-reader-text">Toggle panel: <?php echo $titlebanner; ?></span>
<span class="toggle-indicator" aria-hidden="true"></span>
</button>
<h2 class="hndle ui-sortable-handle" id="title_banner_<?php echo $i;?>"><span>Banner <?php echo $titlebanner; ?></span></h2>

<input type="hidden"  name="binfo[banner_title_<?php echo $i;?>]"  value="<?php echo($titlebanner!='')?$titlebanner:'slideshow' ?>">

<div class="inside">

<div class="bimage_outer">
<table width="100%">
<tr>
<td>
<div class="bimge_div">
<a class="bimge_content b_dashed uploadphoto_<?php echo $i;?>" href="#fancy_<?php echo $i;?>" onclick="getID(<?php echo $i;?>)">
<img src="<?php echo $srcfirst[0]; ?>" />
</a>

<div id="fancy_<?php echo $i;?>" align="left" class="banner-fancybox"><div class="title-fancybox">CHOOSE IMAGE FROM LIBRARY</div>
<input type="hidden" name="binfo[gallery_datas_<?php echo $i;?>]" value="<?php echo ($gallery!='')?$gallery:'';?>"  />
<div class="dotline"></div>
<div id="<?php echo $i;?>" class="show_banner">
<?php
foreach($ar_gal as $g){if($g!=''){  $src = wp_get_attachment_image_src($g); ?>
<div class="slideshow_popup_image popup_gal_<?php echo $g;?>" align="center" ><div class="del_banner_gallery" onclick="del_element_gallery(<?php echo $i;?>,<?php echo $g;?>)"></div><div align="center" class="content_image"><img src="<?php echo $src[0]; ?>" height="100" /></div><div>
<input type="text" value="" name="binfo[order_<?php echo $g;?>]" placeholder="Thứ tự" class="slideshow_order">
</div></div>
<?php
	}
}
?>

</div>
<div class="clear"></div>
<div class="dotline"></div>
<div class="tablenav bottom" align="right">
<a href="#" class="upload_image_button button button-primary" title="Add Images">Add Image</a>
<a href="#" class="button apply-button" title="Add Images" onclick="$.fancybox.close(true);return false">Apply</a>
<a href="#" class="button" title="Add Images" onclick="$.fancybox.close(true);return false">Cancel</a>
</div>
</div>

</div>
</td>
<td width="62%">
<label class="ls_label">Alt Text:</label><br>
<input type="text" class="ls_input" name="binfo[banneralt_<?php echo $i;?>]" value="<?php echo ($alt!='')?$alt:'';?>" placeholder="Enter Alt text">
<label class="ls_label">Title:</label><br>
<input type="text" class="ls_input" name="binfo[img_title_<?php echo $i;?>]" value="<?php echo ($titleimg!='')?$titleimg:'';?>"  placeholder="Enter Title">
<label class="ls_label">Url:</label><br>
<input type="text" class="ls_input" name="binfo[bannerurl_<?php echo $i;?>]" value="<?php echo ($url!='')?$url:'';?>"  placeholder="http://">
</td>
</tr>
</table>
<div align="right" class="bottom-bar">
<a class="button delete_banner button-primary" href="#" style="float:right" onclick="delete_banner(<?php echo $i;?>)">Delete banner</a>
<div style="float:right">
<label>Show:</label><input type="radio" name="binfo[hienthi_banner_<?php echo $i;?>]" value="1" <?php echo ($bannershow==1)?'checked="checked"':""; ?>  /><label>Yes</label>
<input type="radio" name="binfo[hienthi_banner_<?php echo $i;?>]" value="0" <?php echo ($bannershow==0)?'checked="checked"':""; ?>  /><label>No</label>
<label style="margin-left:20px">Select a categories:</label>
<select id="op_banner_<?php echo $i;?>" name="binfo[op_banner_<?php echo $i;?>]" onchange="changeOb(<?php echo $i;?>)">
<?php echo get_all_custom_select_slug($slugbanner);?>
</select>
</div>
<div class="clear"></div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>