<?php get_header();?>
<header class="header" role="masthead"><?php get_sidebar('main-menu');?></header>
<div class="show-body">
<div class="container">
<div class="row">
<div class="col-md-1 hidden-xs">&nbsp;</div>
<div class="col-md-10 col-xs-12">
<h2 id="top" align="center" style="font-size:40px;font-weight:bold"><?php echo __('Thiết kế hệ thống xử lý nước','theme');?></h2>
<div class="about"><?php while ( have_posts() ) : the_post();the_content();endwhile;?></div>
</div>
<div class="col-md-1 hidden-xs">&nbsp;</div>
</div>

<div class="row">
<div class="col-md-1 hidden-xs">&nbsp;</div>
<div class="col-md-10 col-xs-12">
<div class="row">
<?php
$arg = array('post_type' => 'business','orderby' =>'menu_order','order' =>'asc','posts_per_page' =>-1,'post__not_in' =>array(8),'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
<a href="<?php echo get_permalink(get_page_by_path('business')).'#'.$post->ID;?>">
<div class="bus"><?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?><h3 style="text-transform:uppercase;color:#fff"><?php the_title();?></h3></div>

</a>
</div>
<?php endwhile;?>
</div>
<div class="col-md-1 hidden-xs">&nbsp;</div>
</div>
</div>
</div>

<hr>

<div class="container">
<div class="row">
<div class="col-md-1 hidden-xs">&nbsp;</div>
<div class="col-md-10 col-xs-12">
<?php
global $temp;$temp=0;
$arg = array('post_type' => 'business','orderby' =>'menu_order','order' =>'asc','posts_per_page' =>-1,'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();?>
<?php if($post->ID!=8){?>
<div class="row" align="center"><div class="col-md-12"><h2 id="<?php echo $post->ID;?>"><?php the_title();?></h2></div></div>
<?php }?>
<div class="row"><div class="grid-business" id="business-<?php echo $post->ID;?>"><?php get_template_part('content','business');?></div></div>
<?php $temp++;endwhile;wp_reset_query();?>
</div>
<div class="col-md-1 hidden-xs">&nbsp;</div>
</div>
</div>

</div>
<?php get_footer();?>