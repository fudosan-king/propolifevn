<?php get_header();?>
<body>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div align="center"><?php get_sidebar('banner');?></div>
<div class="container">

<div class="row topic">
<div class="col-lg-4" align="center">&nbsp;</div>
<div class="col-lg-4" align="center"><div style="background-color:#ffffff;padding: 35px;margin-bottom:35px;"><h3 align="center" style="text-transform:uppercase;margin:0px">探偵小説</h3></div></div>
<div class="col-lg-4" align="center">&nbsp;</div>
</div>

<div class="row">
<?php
$arg = array(
'post_type' => 'manga',
'orderby' => 'date',
'order' => 'asc',
'posts_per_page' =>1,
'paged'=>get_query_var('page')?get_query_var('page'):1,
'taxonomy'=>'cat-manga',
'term'=>get_query_var('cat-manga')
);
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$new = get_post_meta($post->ID,'new',true);
?>
<div class="col-lg-2" align="center">
<a class="thumbnail catMenu" href="<?php echo get_permalink($post->ID);?>">
<?php the_post_thumbnail($post->ID,array('class'=>'img-responsive'));?>
<div class="caption">
<h4><?php the_title();?></h4>
<?php the_excerpt();?>
</div>
<?php if($new!=''){?>
<span class="product_badge new"><span>New</span></span>
<?php }?>
<div class="viewdetail">VIEW DETAIL</div>
</a>
</div>
<?php endwhile;echo'<div class="clearfix"></div>';include("nav-main.php");wp_reset_query();?>
</div>

</div>

<div class="blockgallery"><?php get_sidebar('gallery-food-drink');?></div>
<?php get_footer();?>