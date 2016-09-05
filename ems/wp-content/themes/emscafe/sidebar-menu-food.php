<?php
$arg = array(
'post_type' => 'menu',
'orderby' => 'date',
'order' => 'desc',
'posts_per_page' =>4,
'taxonomy'=>'cat-menu',
'term' =>'japanese-food'
);
$dem=0;
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
if($dem<2){
?>
<div class="listFood" align="center">
<i class="fa fa-caret-left right-ar"></i>
<div class="view" align="center"><a href="<?php echo get_permalink($post->ID);?>"><?php the_post_thumbnail('medium',array('class'=>'img-responsive'));?></a></div>
</div>

<div class="listFood" align="center">
<a class="caption" href="<?php echo get_permalink($post->ID);?>">
<h2><?php the_title();?></h2>
<div style="font-size:26px;color: #fff4e3;">&hellip;</div>
<?php the_excerpt(); ?>
<span href="">View menu</span>
</a>
</div>
<?php }else{if($dem==2){echo '<div class="clearfix"></div>';} ?>
<div class="listFood" align="center">
<a class="caption" href="<?php echo get_permalink($post->ID);?>">
<h2>Menu 3</h2>
<div style="font-size:26px;color: #fff4e3;">&hellip;</div>
<?php the_excerpt(); ?>
<span href="">View menu</span>
</a>
</div>

<div class="listFood" align="center">
<i class="fa fa-caret-right left-ar"></i>
<div class="view" align="center"><a href="<?php echo get_permalink($post->ID);?>"><img class="img-responsive" src="<?php bloginfo( 'template_directory' );?>/images/mn3.jpg"></a></div>
</div>
<?php } $dem++; endwhile;wp_reset_query();?>