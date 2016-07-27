<?php
$arg = array('post_type' => 'business','orderby' =>'menu_order','order' =>'asc','posts_per_page' =>2,'post__not_in' =>array(8),'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
<a href="<?php echo get_permalink(get_page_by_path('business')).'#'.$post->ID;?>">
<div class="bus"><?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?><h3 style="text-transform:uppercase;color:#fff"><?php the_title();?></h3></div>
<div style="margin-top:15px;text-align: justify;">
<?php the_excerpt();?>
</div>
</a>
</div>
<?php endwhile;wp_reset_query();?>