<?php get_header();?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div class="effect">
<div class="container align-top">
<div class="row">
<div class="col-md-9 col-sm-9 col-xs-12">
<?php while ( have_posts() ) : the_post(); the_content(); endwhile;?>
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><?php get_sidebar('right');?></div>
</div>
</div>
</div>
<?php get_footer();?>
