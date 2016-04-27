<div class="container">
<div class="row">

<?php
$arg = array('post_type' => 'chronicle','orderby' => 'date','order' => 'desc','post__not_in' =>array(29,30,31,32),'posts_per_page' =>-1,'status' => array('publish','private'),'taxonomy'=>'cat-chronicle','term'=>'reform-office');
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$f_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="thumbnail">
<a href="<?php echo $f_url;?>" class="fancybox-buttons" data-fancybox-group="button">
<div class="view"><?php the_post_thumbnail('full',array('class'=>'img-responsive'));?></div>
</a>
</div>
</div>
<?php endwhile;wp_reset_query();?>

</div>
</div>