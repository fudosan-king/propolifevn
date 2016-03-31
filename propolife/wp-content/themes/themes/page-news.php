<?php get_header();global $lienhe;$hl = explode(';',$lienhe['hotline']);?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div class="effect">
<div class="container align-top">
<div class="row">
<div class="col-md-9">
<div class="panel panel-default">
<div class="panel-heading"><?php the_title();?></div>
<div class="panel-body">
<dl class="dl-horizontal">
<?php
$arg = array('post_type' => 'news','orderby' => 'date','order' => 'desc','posts_per_page' =>30,'paged' =>( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged'),'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$smlink = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(get_permalink($post->ID))); 
$smlink = html_entity_decode($smlink,null,'UTF-8');
?>
<dt><a href="<?php echo $smlink;?>"><?php echo get_the_date();?></a></dt>
<dd><a href="<?php echo $smlink;?>"><?php the_title();?></a></dd>
<?php endwhile;?>
</dl>
<nav>
<?php include("nav-main.php");?>
<?php wp_reset_query();?>
</nav>
</div>
</div>
</div>
<div class="col-lg-3"><?php get_sidebar('right');?></div>
</div>
</div>
</div>
<?php get_footer();?>