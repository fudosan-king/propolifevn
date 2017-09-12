<?php get_header();?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div align="center" class="sildermain"><?php get_sidebar('banner');?></div>
<div class="effect">
<div class="container" style="margin-top:30px;">
<div class="row">
<div class="col-lg-9">
<div class="panel panel-default">
<div class="panel-body" align="center">
<div align="center" style="margin-bottom:15px;"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-chronicle1.png" class="img-responsive"></div>
<h3 align="center" style="margin-top:0px;margin-bottom:15px;">クロニクルリフォーム</h3>
<?php echo term_description(1, 'cat-chronicle') ?>
<?php echo htmlContactButton2();?>
</div>
</div>

<div class="material"><?php get_sidebar('material');?></div>

</div>

<div class="col-lg-3">
<?php get_sidebar('chronicle');?>
<?php get_sidebar('right');?>
</div>

</div>
</div>
</div>

<div class="effect">
<div class="gallery bg-pt-3" data-stellar-background-ratio="0.5">
<div class="container">
<div class="row">

<div class="col-lg-12" align="center">
<h3 style="margin-top:0px"><?php echo get_the_title(294);?></h3>
<div style="margin-bottom:15px"><?php echo getContentByID(294);?></div>
</div>
<div class="clearfix"></div>
<div class="col-md-1"></div>
<div class="col-md-10">
<div class="row">
<?php
$_list = mcpGallery(294);
if(!empty($_list) && $_list>0){
foreach($_list as $key){
$_key = json_decode($key);
$key = $_key->key;
$o = $_key->attach_id;
$order = $_key->order;
$image_thumb=wp_get_attachment_image_src($o,'full');
?>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><img src="<?php echo $image_thumb[0];?>" class="img-responsive" ></div>
<?php }}?></div>
</div>
<div class="col-md-1"></div>
</div>
</div>
</div>
</div>

<div class="effect">
<div class="container" align="center">
<div class="row">
<div class="col-lg-12">

<?php
$term = get_term_by('slug',get_query_var('cat-chronicle'),'cat-chronicle');
echo '<h3 align="center">'.$term->name.'</h3>';
echo '<h4>Furniture & Interior</h4>';
echo '<p>'.nl2br($term->description).'</p>';
?>

</div>
</div>
</div>
</div>

<div class="effect">
<div class="gallery bg-pt-3" data-stellar-background-ratio="0.5">
<?php get_sidebar('gallery-furniture');?>
</div>
</div>

<div class="effect"><?php get_sidebar('contract');?></div>

<h3 align="center">無料アフターサービス</h3>

<div class="effect">
<div class="bg-pt-2">
<div class="container">
<div class="row">
<div class="col-lg-12" align="center">
<i class="fa fa-quote-left" style="margin-top:30px;"></i>
<?php echo getExcerptByID(73);?>
<hr>
</div>
</div>

<div class="row staff"><?php get_sidebar('staff');?></div>
</div>
</div>
</div>

<div class="container" align="center">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<aside><section style="font-size:35px;">弊社ホームページをご覧頂き、ありがとうございます。</section><br>
<p>弊社では、現地調査を無料にて行っております。<br>
現在、ホーチミンにて活躍されている企業様、これからホーチミンにいらっしゃる企業様お気軽にお問い合わせください。
</p>
</aside>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo htmlContactButton2();?></div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h5><strong>お電話でお問い合わせはこちら</strong></h5>
<p>+84-(0)28-3824-1578（クロニクルリフォーム代表　日本語）<br>+84-(0)91-663-1088（日本人）</p>
</div>
</div>
</div>
<?php get_footer();?>
