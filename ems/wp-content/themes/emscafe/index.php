<?php get_header();?>
<body class="body-pt">
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>

<div align="center"><?php get_sidebar('banner');?></div>

<div class="container"><div class="row topic"><?php get_sidebar('top-info');?></div></div>

<div align="center" class="hidden-xs"><h2 class="heading">menu Drink</h2></div>
<div class="container"><div class="row show-grid products-grid"><?php get_sidebar('menu-drink');?></div></div>
<div align="center" class="hidden-xs"><h2 class="heading">japanese Food</h2></div>
<div class="bg_food" style="padding:60px 0px">
<div class="container">
<div class="row show-grid">
<div class="col-md-12"><div style="background-color:#a74949"><?php get_sidebar('menu-food');?></div></div>
</div>
</div>
</div>

<div class="container">
<div class="row"><div class="col-md-3">&nbsp;</div><div class="col-md-6" align="center"><?php get_sidebar('about');?></div><div class="col-md-3">&nbsp;</div></div>
</div>

<div class="blockgallery"><?php get_sidebar('gallery-food-drink');?></div>
<?php get_footer();?>