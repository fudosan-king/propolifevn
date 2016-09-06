<div class="container-fluid">
<h3 align="center">FOOD AND DRINK</h3>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div id="sliderCat" style="position: relative; top: 0px; left: 0px; width:1170px; height:150px; overflow: hidden;margin-top:10px;padding-bottom:20px">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;"></div>
<div style="position: absolute; display: block; background: url(<?php bloginfo( 'template_directory' );?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div>
</div>

<!-- Slides Container -->
<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:1170px; height:150px; overflow: hidden;">
<?php
$lists=mcpGallery(13);
if(!empty($lists) && $lists>0){
foreach($lists as $list){
	$_key = json_decode($list);
	$key = $_key->key;
	$o = $_key->attach_id;
	$images=wp_get_attachment_image_src($o,'thumbnail');
	$images_full=wp_get_attachment_image_src($o,'full');
?>

<div align="center">
<div align="center" class="bgzoom">
<a href="<?php echo $images_full[0];?>" class="fancybox-buttons" data-fancybox-group="button">
<img src="<?php echo $images[0];?>" class="img-responsive">
<i class="fa fa-search-plus"></i>
</a>
</div>
</div>

<?php }}?>

</div>

<div u="navigator" class="jssorb03" style="bottom: 4px; right: 6px;"><div u="prototype"><div u="numbertemplate"></div></div></div>
<span u="arrowleft" class="jssora03l" style="top: 123px; left: 8px;"></span>
<span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;"></span>
</div>
</div>
</div>
<div align="center" style="margin-top:15px;"><a href="<?php echo get_post_permalink(1);?>" class="btn btn-lg btn-danger">JOIN US</a></div>
</div>