<div class="container">
<div class="row">
<div class="col-lg-12" align="center">
<?php
$term = get_term_by('slug','contract','cat-chronicle');
echo '<h3 align="center">'.$term->name.'</h3>';
?>
</div>
<div class="clearfix"></div>
<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
<div class="row">
<?php
$dem=1;
$arg = array('post_type' => 'chronicle','orderby' => 'date','order' => 'asc','posts_per_page' =>-1,'status' => array('publish','private'),'taxonomy'=>'cat-chronicle','term'=>'contract');
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$f_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" align="center">
<div class="thumbnail" style="background-color:#000000;color:#ffffff">
<div class="caption" style="color:#ffffff;font-size:21px;padding:40px 30px"><h4 style="color: #41BDCE;font-size:24px;font-weight:bold"><?php echo $dem;?>.<?php the_title();?></h4><?php the_content();?></div>
</div>
</div>
<?php $dem++;endwhile;wp_reset_query();?>
</div>
</div>
<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
</div>
</div>