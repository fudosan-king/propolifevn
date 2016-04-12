<?php
$arg = array('post_type' => 'business','orderby' =>'date','order' =>'desc','posts_per_page' =>3,'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
<a href="<?php echo get_permalink(get_page_by_path('business')).'#'.$post->ID;?>">
<div class="bus"><?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?></div>
<div align="center">
<h3 style="text-transform:uppercase"><?php the_title();?></h3>
<?php the_excerpt();?>
</div>
</a>
</div>
<?php endwhile;wp_reset_query();?>