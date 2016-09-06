<?php get_header();?>
<body>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div align="center"><?php get_sidebar('banner');?></div>
<div class="container">
<div class="row show-grid topic">
<div class="col-lg-2" align="center">&nbsp;</div>
<div class="col-lg-8" align="center">
<div class="listMenu">
<div class="bg-default">
<div align="center"><span align="center" class="heading"><?php the_title();?></span></div>
<?php while ( have_posts() ) : the_post();the_content();endwhile;?>
<div><img src="<?php bloginfo( 'template_directory' );?>/images/bt-body.png"></div>
</div>
</div>
</div>
<div class="col-lg-2" align="center">&nbsp;</div>
</div>

</div>

<div align="center"><?php echo htmlContactButton();?></div>

<div class="blockgallery">
<?php get_sidebar('gallery-food-drink');?>
</div>
<?php get_footer();?>