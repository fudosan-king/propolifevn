<?php get_header();?>
<body class="body-pt">
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>

<div align="center" class="hidden-xs"><h2 class="heading">menu Drink</h2></div>

<div class="container">
<div class="row show-grid">
<?php
$arg = array(
'post_type' => 'menu',
'orderby' => 'date',
'order' => 'asc',
'posts_per_page' =>4,
'taxonomy'=>'cat-menu',
'term' =>'drink'
);
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$price = number_format(get_post_meta($post->ID,'price',true));
?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="listDrink">
<a href="<?php echo get_permalink($post->ID);?>"><?php the_post_thumbnail('medium',array('class'=>'img-responsive'));?>
<div class="caption" align="center">
<h4><?php the_title();?></h4>
<span>Price:<?php echo $price;?> VND</span>
<div><?php the_excerpt();?></div>
<div class="btn btn-danger">View menu</div>
</div>
</a>
</div>
</div>
<?php endwhile;wp_reset_query();?>
</div>

</div>

<div align="center" class="hidden-xs"><h2 class="heading">japanese Food</h2></div>

<div style="padding:0px 0px 30px 0px">
<div class="container">
<div class="row show-grid">
<?php
$arg = array(
'post_type' => 'menu',
'orderby' => 'date',
'order' => 'asc',
'posts_per_page' =>4,
'taxonomy'=>'cat-menu',
'term' =>'japanese-food'
);
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<div class="col-lg-3" align="center">
<a class="thumbnail catMenu" href="<?php echo get_permalink($post->ID);?>">
<?php the_post_thumbnail($post->ID,array('class'=>'img-responsive'));?>
<div class="caption">
<h4><?php the_title();?></h4>
<?php the_excerpt();?>
</div>
<span class="btn btn-default" style="margin-bottom:25px;">VIEW MENU</span>
</a>
</div>
<?php endwhile;wp_reset_query();?>
</div>
<div class="row"><div class="col-lg-12" align="center"><a href="" class="btn btn-lg btn-danger">VIEW MORE</a></div></div>
</div>
</div>

<div class="blockgallery"><?php get_sidebar('gallery-food-drink');?></div>
<?php get_footer();?>