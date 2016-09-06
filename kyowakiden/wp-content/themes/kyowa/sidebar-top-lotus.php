<?php
$color = array("1" => "4dd0e4","2" => "4eb8ae","3" => "81C683","4" => "AED582");
$arg = array('post_type' => 'lotus','orderby' => 'date','order' => 'asc','posts_per_page' =>4,'post__in'=>array(37,39,40,41),'status' => array('publish','private'));
$the_query = new WP_Query($arg);
$dem=0;
while ( $the_query->have_posts() ) : $the_query->the_post();
$dem++;
?>

<div class="col-lg-3">
<div class="view" align="left"><?php the_post_thumbnail('full',array('class'=>'img-responsive'));?></div>
</div>

<div class="col-lg-9">
<div class="title"><span class="badge">0<?php echo $dem?>. <?php the_title();?></span></div>
<div align="justify" class="excerpt"><?php the_excerpt();?></div>
<div class="detail"><?php the_content();?></div>
<?php if($dem==1){?>
<div align="left"><a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-success">進出について相談する<i class="fa fa-chevron-circle-right" style="margin:0px 0px 0px 10px;color:#ffffff"></i></a></div>
<?php }?>
</div>
<div class="clearfix"></div>
<div class="col-lg-12"><hr></div>

<?php endwhile;wp_reset_query();?>