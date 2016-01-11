<?php get_header();?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>

<div class="effect">
<div class="container" style="padding-top:120px;">
<div class="row">
<div class="col-md-9">
<div class="panel panel-default">
<div class="panel-heading"><h4><?php the_title();?></h4></div>
<div class="panel-body">
<?php while ( have_posts() ) : the_post();the_content();endwhile;?>
</div>
<div class="panel-footer"><h4>ＴＥＬ ＋84‐8‐3824‐1418（ロータスサービス代表）	<a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" style="color: #04978D;">
<i class="fa fa-envelope" style="margin-right:10px;"></i><span class="hidden-xs">WEBからの お問い合わせ</span>
</a></h4></div>
</div>
</div>
<div class="col-lg-3"><?php get_sidebar('right-lotus');?></div>
</div>
</div>
</div>

<?php get_footer();?>