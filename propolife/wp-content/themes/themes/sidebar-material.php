<div class="row">
<div class="col-lg-12" align="center">
<h3 style="margin-top:0px;"><?php echo get_the_title(112);?></h3>
<div><?php echo getContentByID(112);?></div>
</div>
<div class="clearfix"></div>
<div class="col-md-12">
<?php
$dem=1;
$_list = mcpGallery(112);
if(!empty($_list) && $_list>0){
foreach($_list as $key){
	$_key = json_decode($key);
	$key = $_key->key;
	$o = $_key->attach_id;
	$order = $_key->order;
	$image_full=wp_get_attachment_image_src($o,'full');
	$image_thumb=wp_get_attachment_image_src($o,'full');
?>
<a href="<?php echo $image_full[0]; ?>" class="fancybox-buttons material-<?php echo $dem;?>" data-fancybox-group="button"><img src="<?php echo $image_thumb[0];?>" class="img-responsive" ></a>
<?php $dem++; }}?>
</div>
</div>