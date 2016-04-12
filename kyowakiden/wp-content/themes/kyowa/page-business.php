<?php get_header();?>
<header class="header" role="masthead"><?php get_sidebar('main-menu');?></header>
<div class="show-body">
<div class="container">
<div class="row">
<div class="col-md-1 hidden-xs">&nbsp;</div>
<div class="col-md-10 col-xs-12">
<h2 id="top" align="center" style="font-size:40px;font-weight:bold">水処理システム・設計について</h2>
<p style="font-size: 18px;">既設設備改修や新規設備の計画ご提案などのエンジニアリングから、システム・プラント設計、
機器の設計製作を行います。また施工も行い全国各地での実績がございます。
ワンストップソリューションの中でお客様のご要望に沿い最適なシステム、製品をご提供いた
します。ぜひご相談下さい。</p>
</div>
<div class="col-md-1 hidden-xs">&nbsp;</div>
</div>

<div class="row">
<div class="col-md-1 hidden-xs">&nbsp;</div>
<div class="col-md-10 col-xs-12">
<div class="row">
<?php
$arg = array('post_type' => 'business','orderby' =>'date','order' =>'desc','posts_per_page' =>3,'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
<a href="<?php echo get_permalink(get_page_by_path('business')).'#'.$post->ID;?>">
<div class="bus"><?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?></div>
<div align="center">
<h3 style="text-transform:uppercase;color:#337AB7"><?php the_title();?></h3>
</div>
</a>
</div>
<?php endwhile;?>
</div>
<div class="col-md-1 hidden-xs">&nbsp;</div>
</div>
</div>
</div>

<hr>

<div class="container">
<div class="row">
<div class="col-md-1 hidden-xs">&nbsp;</div>
<div class="col-md-10 col-xs-12">
<?php
global $temp;$temp=0;
while ( $the_query->have_posts() ) : $the_query->the_post();?>
<div class="row"><div class="grid-business" id="business-<?php echo $post->ID;?>"><?php get_template_part('content','business');?></div></div>
<?php $temp++;endwhile;wp_reset_query();?>
</div>
<div class="col-md-1 hidden-xs">&nbsp;</div>
</div>
</div>

</div>
<?php get_footer();?>