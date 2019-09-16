<div class="col-lg-9">
<h2>About</h2>
<h3>our company</h3>
<?php if(is_page('about')){?>
<h4>お客様により良いご提案をさせて頂いております。</h4>
<div class="row">
<div class="col-lg-3">
<figure>
<img src="http://www.propolifevietnam.com/wp-content/uploads/2016/01/1.jpg" class="img-responsive" alt="プロポライフベトナム代表取締役社長鈴木秀章">
<figcaption style="text-align: center;margin-top: 15px;">プロポライフベトナム<br>代表取締役社長鈴木秀章</figcaption>
</figure>
</div>
<div class="col-lg-9"><?php while ( have_posts() ) : the_post(); the_excerpt(); endwhile;?></div>
<?php }?>
<div id="sliderReform" style="position: relative; top: 0px; left: 0px; width:840px; height:105px; overflow: hidden;">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;"></div>
<div style="position: absolute; display: block; background: url(<?php bloginfo( 'template_directory' );?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div>
</div>

<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:840px; height:105px; overflow: hidden;">

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
<?php if(is_page('about')){ echo '</div>';}?>
</div>

<div class="col-lg-3">
<h2>DESIGN</h2>
<h3>& SOLUTIONS</h3>
<ul class="list">

<li><a href="<?php echo get_permalink(get_page_by_path('lotus'));?>"><span class="list_num">01.</span>ベトナム進出支援</a></li>
<li><a href="<?php echo get_permalink(get_page_by_path('chronicle'));?>"><span class="list_num">02.</span>内装工事</a></li>
<li><a href="<?php echo get_permalink(get_page_by_path('web'));?>"><span class="list_num">03.</span>WEBサイト制作</a></li>
<li><a href="http://aodaihousing.com" target="_blank"><span class="list_num">04.</span>不動産サービス</a></li>
<li class="list-last"><a href="<?php echo get_permalink(get_page_by_path('contact'));?>"><span class="list_num">05.</span>お問い合わせ</a></li>
</ul>
</div>