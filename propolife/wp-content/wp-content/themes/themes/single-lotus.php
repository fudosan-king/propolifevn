<?php get_header();global $lienhe;$hl = explode(';',$lienhe['hotline']);?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div class="effect">
<div class="container" style="padding-top:120px;">
<div class="row">
<div class="col-md-9">
<div class="panel panel-default">
<div class="panel-body">
<div align="center" style="margin-bottom:15px;"><img src="<?php bloginfo( 'template_directory' );?>/images/r-lotus.png" class="img-responive"></div>
<?php while ( have_posts() ) : the_post();the_content();endwhile;?>
<?php echo htmlContactButton3();?>
</div>
<div class="panel-footer" align="center">
	<h4>ベトナム国内028 3824 1418</h4>
	<h4>日本海外から+84(0)28 3824 1418(ロータスサービス直通・日本語)</h4>
</div>
</div>
</div>
<div class="col-lg-3"><?php get_sidebar('right');?></div>
</div>
</div>
</div>
<?php get_footer();?>