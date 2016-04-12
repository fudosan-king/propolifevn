<?php get_header(); global $lienhe;$hl = explode(';',$lienhe['hotline']);?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div align="center" class="sildermain"><?php get_sidebar('banner');?></div>
<div class="effect">
<div class="container" style="margin-top:30px;">
<div class="row">
<div class="col-md-9">
<div class="panel panel-default">
<div class="panel-body" align="center">
<div align="center" style="margin-bottom:15px;"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-chronicle1.png" class="img-responsive"></div>
<h3 align="center" style="margin-top:0px;margin-bottom:15px;">クロニクルリフォーム</h3>
<?php echo term_description(6, 'cat-chronicle') ?>
<?php echo htmlContactButton2();?>
</div>
</div>

<?php get_sidebar('service-free');?>

<div class="row">
<div class="col-lg-6">
<a href="<?php echo get_term_link(2,'cat-chronicle');?>">
<div class="media" style="background-color:#000000;color:#ffffff">
<div class="media-left"><img src="<?php bloginfo( 'template_directory' );?>/images/of.jpg" width="100" height="auto"></div>
<div class="media-body" align="justify">
<?php $term = get_term_by('slug','reform-office','cat-chronicle');?>
<h5 class="media-heading" style="color:#ffffff;font-size:18px;"><?php echo $term->name;?></h5>
</div>
</div>
</a>
</div>
<div class="col-lg-6">
<a href="<?php echo get_term_link(1,'cat-chronicle');?>">
<div class="media" style="background-color:#000000;color:#ffffff">
<div class="media-left"><img src="<?php bloginfo( 'template_directory' );?>/images/h.jpg" width="100" height="auto"></div>
<div class="media-body" align="justify">
<?php $term = get_term_by('slug','reform-home','cat-chronicle');?>
<h5 class="media-heading" style="color:#ffffff;font-size:18px;"><?php echo $term->name;?></h5>
</div>
</div>
</a>
</div>
</div>

<div class="row">
<div class="col-lg-12" align="center">
<h3 align="center">無料アフターサービス</h3>
<i class="fa fa-quote-left"></i>
<?php echo getExcerptByID(73);?>
</div>
</div>
<div class="row staff" style="margin-bottom:15px"><?php get_sidebar('staff');?></div>
<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo htmlContactButton2();?></div></div>
</div>

<div class="col-lg-3">
<?php get_sidebar('chronicle');?>
<?php get_sidebar('right');?>
</div>
</div>
</div>
</div>

<?php get_footer();?>