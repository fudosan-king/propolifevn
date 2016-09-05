<?php
$arg = array(
'post_type' => 'menu',
'orderby' => 'date',
'order' => 'asc',
'posts_per_page' =>4,
'taxonomy'=>'cat-menu',
'term' =>'drink'
);
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$price = number_format(get_post_meta($post->ID,'price',true));
?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="listMenu">
<a href="<?php echo get_permalink($post->ID);?>"><?php the_post_thumbnail('medium',array('class'=>'img-responsive'));?>
<div class="caption" align="center">
<h4><?php the_title();?></h4>
<span>Price:<?php echo $price;?> VND</span>
<p>Gentlemen and women class can come for.</p>
<div class="btn btn-danger">View menu</div>
</div>
</a>
</div>
</div>
<?php endwhile;wp_reset_query();?>