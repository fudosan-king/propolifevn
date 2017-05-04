<?php get_header();global $lienhe;$hl = explode(';',$lienhe['hotline']);$style = 'style="padding-top:120px;"';?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<?php if($post->ID==264 || $post->ID==267 || $post->ID==266 || $post->ID==407 || $post->ID==1530){?><div align="center" class="slidermain"><?php get_sidebar('banner');?></div><?php $style = 'style="padding-top:15px;"'; }?>
<div class="effect">
<div class="container" <?php echo $style;?>>
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
<div class="lotus-banner" style="margin-bottom:15px"><img src="<?php bloginfo( 'template_directory' );?>/images/lotus_banner.png" class="img-responsive" alt=""/></div>
<div class="panel panel-default">
<?php if($post->ID==264){?><div class="panel-heading" style="background-color:#ffffff"><h4>幣サービスについて</h4></div><?php } ?>
<div class="panel-body">
<?php
$term_id = wp_get_post_terms($post->ID, 'cat-support', array("fields" => "ids"));
$attachID = get_tax_meta($term_id[0],'tax_thumbnail',true);
$thumbUrl = wp_get_attachment_image_src($attachID,'full');
?>
<div align="center" class="logo-inside"><img src="<?php echo $thumbUrl[0];?>" class="img-responsive" alt="<?php echo get_the_title($post->ID);?>"></div>
<?php
while ( have_posts() ) : the_post();
if(has_post_thumbnail()){the_post_thumbnail('full',array('class'=>'img-responsive lotus-featured'));}
the_content();
endwhile;
if($post->ID==267){echo htmlContactButton5();}
if($post->ID==268){echo htmlContactButton4();}
if($post->ID!=267 && ($post->ID!=268)){echo htmlContactButton3();}
?>
</div>
<div class="panel-footer" align="center"><h4>TEL <?php echo $hl[2];?></h4></div>
</div>

<?php if($post->ID==264){?>
<div class="row lotus"><?php get_sidebar('top-support');?></div>
<?php echo htmlContactButton3();?>
<?php } ?>
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><?php get_sidebar('right');?></div>
</div>
</div>
</div>
<?php get_footer();?>
