<?php get_header();
$term_list = wp_get_post_terms($post->ID, 'cat-manga', array("fields" => "ids"));
?>
<body>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>

<div class="bg-default" style="padding:30px 0px">
<div class="container">
<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg-4" align="center"><?php the_post_thumbnail($post->ID,array('class'=>'img-responsive'));?></div>
<div class="col-lg-4">
<h3><?php the_title();?></h3>
<strong>Thể loại: 探偵小説</strong>
<p align="justify">
Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
</p>
</div>
<div class="col-lg-2"></div>
</div>
</div></div>

<div class="container">
<div align="center" class="row"><div class="col-lg-12"><h3 align="center" style="text-transform:uppercase">MANGA BOOKS STORE</h3></div></div>
<div class="row"><?php get_sidebar('cat-manga');?></div>
</div>

<div class="blockgallery"><?php get_sidebar('gallery-food-drink');?></div>
<?php get_footer();?>