<?php get_header();global $lienhe;$hl = explode(';',$lienhe['hotline']);?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div class="effect">
<div class="container align-top">
<div class="row">
<div class="col-md-9">
<div class="panel panel-default">
<div class="panel-body">
<h4 style="margin-bottom:30px"><?php the_title();?></h4>
<?php
while ( have_posts() ) : the_post();
if(has_post_thumbnail()){the_post_thumbnail('full',array('class'=>'img-responsive lotus-featured'));}
the_content();
endwhile;
?>
</div>
</div>
<?php
echo htmlContactButton6();
?>
</div>
<div class="col-lg-3"><?php get_sidebar('right');?></div>
</div>
</div>
</div>
<?php get_footer();?>