<?php get_header();?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div align="center" class="sildermain"><?php get_sidebar('banner');?></div>
<div class="effect">
<div class="parttern">
<div class="container" align="center">
<h3 align="center">オリジナルWEBサイト・テンプレートWEBサイト<br>作成事例</h3>
<div class="row">

<?php
$arg = array('post_type' => 'web','orderby' => 'date','order' => 'asc','posts_per_page' =>-1,'post__not_in'=>array(85),'status' => array('publish','private'));
$the_query = new WP_Query($arg);
$dem=0;
while ( $the_query->have_posts() ) : $the_query->the_post();
$weburl = get_post_meta($post->ID,'web-url',true);
$newtemp = get_post_meta($post->ID,'new-temp',true);

if ($dem > 3){
    echo '</div><div class="row">';
    $dem = 0;
}

?>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="thumbnail" align="center">
<a href="<?php echo $weburl;?>" target="_blank">
<div class="imgLoad">
<?php if($newtemp!=''){?>
<div class="new"><img src="<?php bloginfo( 'template_directory' );?>/images/new.png" /></div>
<?php }?>
<div class="spin"><div class="half left"><div class="band"></div></div><div class="half right"><div class="band"></div></div></div>
<?php the_post_thumbnail('web-thumb',array('class'=>'img-responsive resize','onload'=>'imgLoaded(this)'));?>
</div>
<div class="caption" style="text-transform:uppercase"><?php the_title();?></div>
<div class="web-description"><?php the_content();?></div>
</a>
</div>
</div>

<?php $dem++; endwhile;wp_reset_query();?>
<div class="clearfix"></div>

</div>

<div class="row">
    <?php echo htmlContactButton6();?>
    <div class="col-md-12" align="center"><h3 align="center">オリジナルWEBサイトはお打ち合わせ後お見積もりを出させて頂いております。テンプレートWEBサイトの価格はこちらになります。</h3></div>
</div>

</div>
</div>
</div>
<div><h3 align="center" style="margin-top:0px">PRICE</h3></div>
<div><h3 align="center" style="margin-top: 0px;font-size: 40px;font-weight: bold;">ご利用料金</h3></div>
<div align="center" style="margin-bottom:30px"><img src="<?php bloginfo( 'template_directory' );?>/images/price.jpg" class="img-responsive"  alt="ご利用料金"/></div>
<hr>

<div class="effect"><div class="container">
<div class="row">
<div class="col-lg-9">
<?php
if(has_post_thumbnail()){the_post_thumbnail('full',array('class'=>'img-responsive lotus-featured'));}
the_content();
?>
<?php echo htmlContactButton6();?>
</div>
<div class="col-lg-3"><?php get_sidebar('menu-web');?></div>
</div>
</div></div>
<?php get_footer();?>
