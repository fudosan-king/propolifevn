<?php get_header();global $lienhe;$hl = explode(';',$lienhe['hotline']);?>
<header class="header" role="masthead"><?php get_sidebar('main-menu');?></header>
<div class="show-body">
<div class="container">
<div class="row">
<div class="col-md-9">
<div class="panel panel-default">
<div class="panel-body">
<h4 style="margin-bottom:30px"><?php the_title();?></h4>
<?php
while ( have_posts() ) : the_post();
the_content();
endwhile;
?>
</div>
</div>
</div>
<div class="col-lg-3"><?php get_sidebar('right');?></div>
</div>
</div>
</div>
<?php get_footer();?>