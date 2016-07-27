<?php get_header();?>
<header class="header" role="masthead"><?php get_sidebar('main-menu');?></header>
<div align="center" class="top-video">
<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/GB5kD0Eq3x0?version=3&rel=0&loop=1&autoplay=1&showinfo=0&controls=0&playlist=GB5kD0Eq3x0"></iframe>
</div>
<div class="video-caption"><small><?php echo __('Từ xử lý nước và thiết bị điện,','theme');?></small><br><?php echo __('Chúng tôi sẽ đề xuất cải tạo môi trường.','theme');?></div>
</div>

<div class="container">
<div class="row">
<div class="col-lg-1"></div>
<div class="col-lg-10">
<div class="row" style="margin-bottom:15px;"><?php get_sidebar('news');?></div>
<div class="row"><?php get_sidebar('business');?></div>

</div>
<div class="col-lg-1"></div>
</div>
</div>

<div class="block-company">
<div class="container">
<div class="row">
<div class="col-md-6 col-sm-6" align="right">
<div class="block-1">
<a href="<?php echo get_permalink(get_page_by_path('head-office'))?>">
<div><img src="<?php bloginfo( 'template_directory' );?>/images/pic02.gif" width="66" height="66"></div>
<h3 style="margin-top:0px;text-transform:uppercase"><?php echo get_the_title(5);?></h3>
</a>
<?php echo getExcerptByID(5);?>

</div>
</div>
<div class="col-md-6 col-sm-6" align="left">
<div class="block-2">
<a href="<?php echo get_permalink(get_page_by_path('about'))?>">
<div><img src="<?php bloginfo( 'template_directory' );?>/images/pic03.jpg" width="66" height="66"></div>
<h3 style="margin-top:0px;text-transform:uppercase"><?php echo get_the_title(2);?></h3>
</a>
<?php echo getExcerptByID(2);?>

</div>
</div>
</div>
</div>
</div>

<?php get_footer();?>