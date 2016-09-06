<?php global $temp;if($temp%2==0){?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<aside class="bg-default">
<div class="caption">
<h3 class="hidden"><?php the_title();?></h3>
<?php the_content();?>
</div>
</aside>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="bg-info">
<div class="row">
<?php
$_list = mcpGallery($post->ID);
if(!empty($_list) && $_list>0){
$dem=1;
foreach($_list as $key){
	$_key = json_decode($key);
	$key = $_key->key;
	$o = $_key->attach_id;
	$order = $_key->order;
	$image_full=wp_get_attachment_image_src($o,'full');
	$image_thumb=wp_get_attachment_image_src($o,'full');
?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 badding-<?php echo $dem;?>"><a href="<?php echo $image_full[0]; ?>" class="fancybox-buttons gallery-bus" data-fancybox-group="button"><img src="<?php echo $image_thumb[0];?>" class="img-responsive" ></a></div>
<?php if($dem==2){$dem=1;}else{$dem++;}}}?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 badding-2" align="center"><a href="#navbar" class="gototop">TOP</a></div>
</div>
</div>
</div>
<?php } else{?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="bg-info">
<div class="row">
<?php
$_list = mcpGallery($post->ID);
if(!empty($_list) && $_list>0){
$dem=1;
foreach($_list as $key){
	$_key = json_decode($key);
	$key = $_key->key;
	$o = $_key->attach_id;
	$order = $_key->order;
	$image_full=wp_get_attachment_image_src($o,'full');
	$image_thumb=wp_get_attachment_image_src($o,'full');
?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 badding-<?php echo $dem;?>"><a href="<?php echo $image_full[0]; ?>" class="fancybox-buttons gallery-bus" data-fancybox-group="button"><img src="<?php echo $image_thumb[0];?>" class="img-responsive" ></a></div>
<?php if($dem==2){$dem=1;}else{$dem++;}}}?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 badding-2" align="center"><a href="#navbar" class="gototop">TOP</a></div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="bg-default">
<div class="caption">
<h3 class="hidden"><?php the_title();?></h3>
<?php the_content();?>
</div>
</div>
</div>
<?php } ?>