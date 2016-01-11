<?php get_header();?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div align="center" style="padding-top:94px" class="effect">
<div class="map"><div id="map-canvas"></div></div>
</div>

<div class="effect">
<div class="container">
<div class="row">
<div class="col-md-12"><h3 align="center">プロポライフベトナム 会社概要</h3></div>
<div class="col-md-12"><?php while ( have_posts() ) : the_post(); the_content(); endwhile;?></div>
</div>
</div>
</div>

<div class="container blockabout" style="margin-top:15px;"><div class="row"><?php get_sidebar('about');?></div></div>
<?php get_footer();?>