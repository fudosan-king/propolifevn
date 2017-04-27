<?php get_header();?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div class="effect">
<div class="container align-top">
<div class="row">
<div class="col-md-9 col-sm-9 col-xs-12">
<div class="panel panel-default">
<div class="panel-heading"><h4>プロポライフベトナム代表ご挨拶</h4></div>
<div class="panel-body">
<?php if(is_page('about')){?>
<div class="row">
<div class="col-lg-3" align="center">
<figure>
<?php
$imgInfo = get_post( get_post_thumbnail_id() );
$caption=nl2br(str_replace(' ', '&nbsp;',$imgInfo->post_excerpt));
$imgTitle = $imgInfo->post_title;
$imgAlt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
echo get_the_post_thumbnail($post->ID,'full',array('class'=>'img-responsive','alt'=>$imgAlt,'title'=>$imgTitle));
?>
<figcaption style="text-align: center;margin-top:15px;margin-bottom:15px;"><?php echo $caption;?></figcaption>
<?php

    if(class_exists('MultiPostThumbnails')){
        $image_name = 'feature-image-2';
        if(MultiPostThumbnails::has_post_thumbnail('page', $image_name)){
            $image_id = MultiPostThumbnails::get_post_thumbnail_id('page', $image_name, $post->ID);
            $image = wp_get_attachment_image_src($image_id, 'full');
            ?>
                <img src="<?php echo $image[0]; ?>" width="100%" style="margin-bottom: 10px;">
            <?php
        }
    }

?>
</figure>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><h4 style="margin-top:0px">お客様により良いご提案をさせて頂いております。</h4><?php while ( have_posts() ) : the_post(); the_excerpt(); endwhile;?></div>
<?php }?>
</div>
</div>
</div>
<h3 align="center" class="heading">スタッフ</h3>
<div id="sliderMember" style="position: relative; top: 0px; left: 0px; width:847px; height:100px; overflow: hidden;">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;"></div>
<div style="position: absolute; display: block; background: url(<?php bloginfo( 'template_directory' );?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div>
</div>
<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:847px; height:100px; overflow: hidden;">
<?php
$_list = mcpGallery(4);
if(!empty($_list) && $_list>0){
foreach($_list as $key){
	$_key = json_decode($key);
	$key = $_key->key;
	$o = $_key->attach_id;
	$order = $_key->order;
	$image_full=wp_get_attachment_image_src($o,'full');
	$image_thumb=wp_get_attachment_image_src($o,'thumbnail');
?>
<div align="center"><a href="<?php echo $image_full[0]; ?>" class="fancybox-buttons centerIn" data-fancybox-group="button"><img src="<?php echo $image_thumb[0];?>" height="<?php echo $image_thumb[1];?>" width="<?php echo $image_thumb[2];?>" class="img-responsive" ></a></div>
<?php }}?>
</div>
</div>
<h3 align="center" class="heading"><?php echo get_the_title(4);?></h3>
<?php while ( have_posts() ) : the_post(); the_content(); endwhile;?>

</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><?php get_sidebar('right');?></div>
</div>
</div>
</div>

<?php get_footer();?>
