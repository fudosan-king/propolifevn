<?php get_header();global $lienhe;$hl = explode(';',$lienhe['hotline']);?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div class="effect">
<div class="container" style="padding-top:120px;">
<div class="row">
<div class="col-md-9">
<div class="panel panel-default">
<div class="panel-heading" style="background-color:#ffffff"><h4><?php the_title();?></h4></div>
<div class="panel-body">
<?php
$term_id = wp_get_post_terms($post->ID, 'cat-support', array("fields" => "ids"));
$attachID = get_tax_meta($term_id[0],'tax_thumbnail',true);
$thumbUrl = wp_get_attachment_image_src($attachID,'full');
?>
<?php
while ( have_posts() ) : the_post();
if(has_post_thumbnail()){the_post_thumbnail('full',array('class'=>'img-responsive lotus-featured'));}
the_content();
endwhile;
echo htmlContactButton6();
?>
</div>
<div class="panel-footer" align="center">
	<h4>ベトナム国内028 3827 5068</h4>
	<h4>日本海外から+84 28 3827 5068（日本語）</h4>
</div>
</div>
<?php get_sidebar('step-web');?>
</div>
<div class="col-lg-3"><?php get_sidebar('menu-web');?></div>
</div>
</div>
</div>
<?php get_footer();?>