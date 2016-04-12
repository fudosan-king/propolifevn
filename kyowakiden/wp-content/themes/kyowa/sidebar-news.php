<div class="col-lg-12">
<div class="bgtopnews">
<div class="row">
<div class="col-lg-2 hidden-xs">
<div style="text-align:center;margin-top: 43px; margin-left:30px;"><i class="fa fa-newspaper-o fa-5x"></i></div>
</div>

<div class="col-lg-10 col-xs-12">
<dl class="dl-horizontal topnews">

<?php
$arg = array('post_type' => 'news','orderby' => 'date','order' => 'desc','posts_per_page' =>3,'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<dt><a href="<?php echo get_permalink($post->ID);?>"><?php echo get_the_date();?></a></dt>
<dd><a href="<?php echo get_permalink($post->ID);?>"><?php the_title();?></a></dd>
<?php endwhile;wp_reset_query();?>
</dl>
</div>

</dl>
</div>
<div class="clearfix"></div>
</div>
</div>