<?php get_header();global $lienhe;?>
<header class="header" role="masthead"><?php get_sidebar('main-menu');?></header>
<div class="show-body">
<div class="container">
<div class="row">
<div class="col-md-2">&nbsp;</div>
<div class="col-md-8">
<?php
$arg = array('post_type' => 'group','orderby' => 'menu_order','order' => 'asc','posts_per_page' =>-1,'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<div class="title-table">
<h3><?php the_title();?><small>詳細</small></h3>
<?php the_content();?>
</div>
<?php endwhile;wp_reset_query();?>
</div>
<div class="col-md-2">&nbsp;</div>
</div>
</div>
</div>
<?php get_footer();?>