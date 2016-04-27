<div class="thumbnail orange news" style="min-height:170px;color:#FFFFFF">
<dl class="dl-horizontal" style="margin:0px;">
<dd><h2 class="title" style="color:#000000;font-weight: bold;">NEWS</h2></dd>
<?php
$arg = array('post_type' => 'news','orderby' => 'date','order' => 'desc','posts_per_page' =>3,'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$smlink = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(get_permalink($post->ID))); 
$smlink = html_entity_decode($smlink,null,'UTF-8');
?>
<dt><a href="<?php echo $smlink;?>"><?php echo get_the_date();?></a></dt>
<dd><a href="<?php echo $smlink;?>"><?php the_title();?></a></dd>
<?php endwhile;wp_reset_query();?>
</dl>
</div>