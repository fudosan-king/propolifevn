<?php
$color = array(
"1" => "4dd0e4",
"2" => "4eb8ae",
"3" => "81C683",
"4" => "AED582"
);
$arg = array(
'post_type' => 'lotus',
'orderby' => 'date',
'order' => 'asc',
'posts_per_page' =>4,
'post__in'=>array(37,39,40,41),
'status' => array('publish','private')
);
$the_query = new WP_Query($arg);
$dem=0;
while ( $the_query->have_posts() ) : $the_query->the_post();
$dem++;
?>
<div class="col-lg-3 toggle">
<div class="stepNum" align="center" style="border-color: #<?php echo $color[$dem];?>;">0<?php echo $dem?></div>
<div class="view" align="center"><?php the_post_thumbnail('full',array('class'=>'img-responsive'));?></div>
<div class="caption" align="center" style="background-color:#<?php echo $color[$dem];?>;">
<div class="title"><?php the_title();?></div>
<div align="justify" class="excerpt"><?php the_excerpt();?></div>
<div class="detail collapse"><?php the_content();?></div>
</div>
<div align="center" class="clickable panel-collapsed"><i class="fa fa-plus-circle fa-3x" style="color: #<?php echo $color[$dem];?>;"></i></div>
</div>
<?php endwhile;wp_reset_query();?>