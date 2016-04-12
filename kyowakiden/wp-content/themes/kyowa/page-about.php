<?php get_header();global $lienhe;?>
<header class="header" role="masthead"><?php get_sidebar('main-menu');?></header>
<div class="show-body">
<div class="container">
<div class="row">
<div class="col-md-2">&nbsp;</div>
<div class="col-md-8">
<div class="thumbview">
<?php
$imgInfo = get_post( get_post_thumbnail_id(2));
$caption=nl2br(str_replace(' ', '&nbsp;',$imgInfo->post_excerpt));
$imgTitle = $imgInfo->post_title;
$imgAlt = get_post_meta(get_post_thumbnail_id(2), '_wp_attachment_image_alt', true);
?>
<figure><?php the_post_thumbnail('thumbnail');?><figcaption><?php echo $caption; ?></figcaption></figure>
<div class="excerpt clearfix"><?php the_excerpt();?></div>
</div>
<?php while ( have_posts() ) : the_post();the_content();endwhile;?>
</div>
<div class="col-md-2">&nbsp;</div>
</div>
</div>
</div>
<?php get_footer();?>