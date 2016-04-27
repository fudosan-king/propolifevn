<?php get_header();?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div class="effect">
<div class="container" style="padding-top:120px;">
<div class="row">
<div class="col-md-9">
<div class="panel panel-default">
<div class="panel-body">
<div align="center" style="margin-bottom:15px;"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-chronicle1.png" class="img-responive"></div>
<?php while ( have_posts() ) : the_post();the_content();endwhile;?>
<?php echo htmlContactButton2();?>
</div>
</div>
<h3 align="center">画像</h3>
<div class="row">
<?php
$_list = mcpGallery($post->ID);
if(!empty($_list) && $_list>0){
foreach($_list as $key){
	$_key = json_decode($key);
	$key = $_key->key;
	$o = $_key->attach_id;
	$order = $_key->order;
	$image_full=wp_get_attachment_image_src($o,'full');
	$image_thumb=wp_get_attachment_image_src($o,'thumbnail');
?>
<div align="center" class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="<?php echo $image_full[0]; ?>" class="fancybox-buttons thumbnail" data-fancybox-group="button" style="background:#000000"><img src="<?php echo $image_thumb[0];?>" class="img-responsive" ></a></div>
<?php }}?>
</div>
<?php echo htmlContactButton2();?>
</div>
<div class="col-lg-3"><?php get_sidebar('chronicle');?><?php get_sidebar('right');?></div>
</div>
</div>
</div>
<?php get_footer();?>