<?php get_header();global $lienhe;$hl = explode(';',$lienhe['hotline']);?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div align="center" class="sildermain"></div>
<div class="effect">
<div class="container" style="margin-top:30px;">
<div class="row">
<div class="col-md-9">
<div class="panel panel-default">
<div class="panel-heading" style="background-color:#ffffff"><h4><?php the_title();?></h4></div>
<div class="panel-body">
<?php
while ( have_posts() ) : the_post();
if(has_post_thumbnail()){the_post_thumbnail('full',array('class'=>'img-responsive lotus-featured'));}
the_content();
endwhile;
echo htmlContactButton6();
?>
</div>
<div class="panel-footer" align="center"><h4>TEL <?php echo $hl[0];?></h4></div>
</div>
<?php get_sidebar('step-aodaihousing-support');?>
</div>
<div class="col-lg-3"><?php get_sidebar('menu-web');?></div>
</div>
</div>
</div>
<?php get_footer();?>
