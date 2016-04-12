<div class="list-group">
<a href="#" class="list-group-item active"><h4 class="list-group-item-heading">NEWS</h4></a>
<?php
$arg = array('post_type' => 'news','orderby' => 'date','order' => 'desc','posts_per_page' =>-1,'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$smlink = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(get_permalink($post->ID))); 
$smlink = html_entity_decode($smlink,null,'UTF-8');
?>
<a href="<?php echo $smlink;?>" class="list-group-item">
<div class="newsdate"><?php echo get_the_date();?></div>
<?php the_title();?>
</a>
<?php endwhile;wp_reset_query();?>
</div>