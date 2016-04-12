<?php get_header();global $lienhe;$hl = explode(';',$lienhe['hotline']);?>
<header class="header" role="masthead"><?php get_sidebar('main-menu');?></header>
<div class="show-body">
<div class="container">
<div class="row">

<div class="col-md-12">
<div class="show-grid">

<div class="row">
<?php
for($i=0;$i<5;$i++){
$arg = array('post_type' => 'news','orderby' => 'date','order' => 'desc','posts_per_page' =>-1);
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<div class="col-md-3">
<div class="media"><div class="media-left">
<a href="<?php echo get_permalink($post->ID);?>">
<?php if(has_post_thumbnail()){?>
<?php the_post_thumbnail('thumbnail',array('class'=>'media-object','style'=>'width: 64px; height: 64px;'));?>
<?php }else{?>
<i class="fa fa-picture-o fa-3x" style="width: 64px; height: 64px;background-color: #ddd;padding-top: 10px;text-align:center;color: #fff;"></i>
<?php }?>
</a>
</div>
<div class="media-body">
<a href="<?php echo get_permalink($post->ID);?>">
<h4 class="media-heading"><?php the_title();?></h4>
<span class="newsdate"><?php echo get_the_date();?></span>
</a>
</div>
</div>
</div>
<?php endwhile;wp_reset_query();} ?>
</div>

</div>
</div>
</div>

<div class="row">
<div class="col-lg-12" align="center">
<div class="show-grid" style="margin-bottom:20px;">
<nav> <ul class="pagination"> <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li> <li><a href="#">1</a></li> <li><a href="#">2</a></li> <li><a href="#">3</a></li> <li><a href="#">4</a></li> <li><a href="#">5</a></li> <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li> </ul> </nav>

</div>
</div>

</div>

</div>
</div>
<?php get_footer();?>