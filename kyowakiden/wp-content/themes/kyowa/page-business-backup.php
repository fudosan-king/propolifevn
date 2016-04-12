<?php get_header();?>
<header class="header" role="masthead"><?php get_sidebar('main-menu');?></header>
<div class="show-body">
<div class="container">
<div class="row">
<div class="col-md-1 hidden-xs">&nbsp;</div>
<div class="col-md-10 col-xs-12">
<h2 id="top">水処理システム・設計について</h2>
<i class="fa fa-quote-left fa-5x pull-left" style="color:#ddd"></i>
<p>既設設備改修や新規設備の計画ご提案などのエンジニアリングから、システム・プラント設計、
機器の設計製作を行います。また施工も行い全国各地での実績がございます。
ワンストップソリューションの中でお客様のご要望に沿い最適なシステム、製品をご提供いた
します。ぜひご相談下さい。</p>
</div>
<div class="col-md-1 hidden-xs">&nbsp;</div>
</div>

<div class="row">
<div class="col-md-1 hidden-xs">&nbsp;</div>
<div class="col-md-10 col-xs-12">
<div class="row">
<?php
$arg = array('post_type' => 'business','orderby' =>'date','order' =>'desc','posts_per_page' =>3,'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
<a href="<?php echo get_permalink(get_page_by_path('business')).'#'.$post->ID;?>">
<div class="bus"><?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?></div>
<div align="center">
<h3 style="text-transform:uppercase;color:#337AB7"><?php the_title();?></h3>
</div>
</a>
</div>
<?php endwhile;wp_reset_query();?>
</div>
<div class="col-md-1 hidden-xs">&nbsp;</div>
</div>
</div>
</div>

<hr>

<div class="container">
<div class="row">
<div class="col-md-1 hidden-xs">&nbsp;</div>
<div class="col-md-10 col-xs-12">
<div class="row">
<?php
$arg = array('post_type' => 'business','orderby' => 'date','order' => 'desc','posts_per_page' =>3,'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="caption" id="<?php echo $post->ID;?>">
<h3 style="text-transform:uppercase;margin-top:10px;"><?php the_title();?></h3>
<?php the_content();?>
</div>
</div>
<?php
$dem=1;
$_list = mcpGallery($post->ID);
if(!empty($_list) && $_list>0){
foreach($_list as $key){
	$_key = json_decode($key);
	$key = $_key->key;
	$o = $_key->attach_id;
	$order = $_key->order;
	$image_full=wp_get_attachment_image_src($o,'full');
	$image_thumb=wp_get_attachment_image_src($o,'full');
?>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><a href="<?php echo $image_full[0]; ?>" class="fancybox-buttons gallery-bus" data-fancybox-group="button"><img src="<?php echo $image_thumb[0];?>" class="img-responsive" ></a></div>
<?php $dem++; }}?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center"><a href="#top" class="gototop"><i class="fa fa-chevron-circle-up fa-5x"></i></a></div>
<?php endwhile;wp_reset_query();?>
</div>
</div>
<div class="col-md-1 hidden-xs">&nbsp;</div>
</div>
</div>

</div>
<?php get_footer();?>