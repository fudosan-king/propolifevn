<?php get_header();?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div align="center" class="sildermain"><?php get_sidebar('banner');?></div>
<div class="effect">
<div class="parttern">
<div class="container" align="center">
<?php $term = get_term_by('slug',get_query_var('cat-chronicle'),'cat-chronicle');?>
<h3 align="center"><?php echo $term->name; ?></h3>
<h4>クロニクルリフォームの外観内装パース制作</h4>
<h3 align="center" style="margin-top: 0px;">日本国内からでも注文可能・スケジュール通りの納期・品質の確保をしながらのコストダウン</h3>
<div class="row">

<?php
$arg = array('post_type' => 'chronicle','orderby' => 'date','order' => 'asc','posts_per_page' =>-1,'taxonomy'=>'cat-chronicle','term'=>'perth-design');
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="thumbnail" align="center">
<?php the_post_thumbnail('full',array('class'=>'img-responsive resize','onload'=>'imgLoaded(this)'));?>
<div class="web-description" style="min-height:60px;"><?php the_content();?></div>
</div>
</div>

<?php endwhile;wp_reset_query();?>
<div class="clearfix"></div>

<?php echo htmlContactButton6();?>
<div class="col-md-12" align="center"><h3 align="center">カラーバリエーションを変えていただくこともできます。</h3></div>

</div>
</div>
</div>
</div>
<div><h3 align="center" style="margin-top:0px">DESIGN</h3></div>
<div><h3 align="center" style="margin-top: 0px;font-size: 40px;font-weight: bold;"><?php echo $term->name;?></h3></div>
<a href="<?php echo get_permalink(get_page_by_path('contact'));?>"><div align="center" style="margin-top:15px;"><img src="<?php bloginfo( 'template_directory' );?>/images/phoi-canh.jpg" class="img-responsive"  alt="ご利用料金"/></div></a>
<hr>

<div class="effect"><div class="container">
<div class="row">
<div class="col-lg-9">
<div class="panel panel-default">
<div class="panel-body" align="center">
<div align="center" style="margin-bottom:15px;"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-chronicle1.png" class="img-responsive"></div>
<h3 align="center" style="margin-top:0px;margin-bottom:15px;"><?php echo $term->name;?></h3>
<?php echo nl2br($term->description); ?>
<div style="margin-top:30px;margin-bottom:15px">
<a href="<?php echo get_permalink(get_page_by_path('contact'));?>" class="btn btn-success btn-lg btn-big">制作について相談する<i class="fa fa-chevron-circle-right" style="margin:0px 0px 0px 10px;color:#ffffff"></i></a></div>
</div>
</div>
</div>
<div class="col-lg-3"><?php get_sidebar('chronicle');?><?php get_sidebar('right');?></div>
</div>
</div></div>
<?php get_footer();?>