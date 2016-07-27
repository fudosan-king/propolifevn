<?php get_header();global $lienhe;?>
<header class="header" role="masthead"><?php get_sidebar('main-menu');?></header>
<div class="show-body">
<div class="container">
<div class="row">
<div class="col-lg-2 hidden-md hidden-sm hiddex-xs">&nbsp;</div>
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<div class="thumbview center-block" align="center">
<?php
$imgInfo = get_post( get_post_thumbnail_id(5));
$caption=nl2br(str_replace(' ', '&nbsp;',$imgInfo->post_excerpt));
$imgTitle = $imgInfo->post_title;
$imgAlt = get_post_meta(get_post_thumbnail_id(5), '_wp_attachment_image_alt', true);
?>
<figure>
<?php the_post_thumbnail('full',array('class'=>'img-responsive'));?>
<figcaption><?php echo __('CÔNG TY CỔ PHẦN CÔNG NGHIỆP KYOWAKIDEN','theme');?><br><?php echo __('<span>Giám Đốc đại diện</span><br>HIDEYUKI SAKAI','theme');?></figcaption>
</figure>
</div>
<?php while ( have_posts() ) : the_post();the_content();endwhile;?>
</div>
<div class="col-lg-2 hidden-md hidden-sm hiddex-xs">&nbsp;</div>
</div>
</div>
</div>
<?php get_footer();?>