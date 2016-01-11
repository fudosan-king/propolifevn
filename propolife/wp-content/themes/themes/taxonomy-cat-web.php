<?php get_header();?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>

<div class="show-thumb">
<div align="center"><img src="<?php bloginfo( 'template_directory' );?>/images/slides/temps/4.jpg" class="img-responsive"></div>
<div class="container" align="center">
<div class="row" align="center">
<div class="col-lg-12">
<i class="fa fa-quote-left"></i>
<p style="font-size:25px;" align="center">スマートフォンやタブレットでも見やすく表示される「レスポンシブウェブデザイン」のホームページをお求めやすいお値段で提供しております。</p>
</div>
</div>

<div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-6">
<section id="search">
<label for="search-input"><i class="fa fa-search"></i></label>
<input id="search-input" class="form-control input-lg" placeholder="Search templates" autocomplete="off" spellcheck="false" autocorrect="off" tabindex="1">
<a id="search-clear" href="#" class="fa fa-times-circle hide"></a>
</section>
</div>
<div class="col-lg-3"></div>
</div>
</div>

<div class="effect">
<div style="background-color:#dddddd;padding:0px 0px 30px 0px;margin-top:30px;">
<div align="center"><img src="<?php bloginfo( 'template_directory' );?>/images/r-down.png" ></div>
<div class="container" align="center">
<h3 align="center">CATALOGUE</h3>
<div class="row"><?php get_sidebar('cat-web');?></div>
</div>
</div>
</div>

<div class="effect">
<div class="parttern">
<div class="container" align="center">
<h3 align="center">WEB TEMPLATES<br>最短2週間で納品いたします</h3>
<div class="row">

<?php
$arg = array(
'post_type' => 'web',
'orderby' => 'date',
'order' => 'asc',
'posts_per_page' =>-1,
'status' => array('publish','private')
);
$the_query = new WP_Query($arg);
$dem=0;
while ( $the_query->have_posts() ) : $the_query->the_post();
?>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="thumbnail" align="center">
<a href="<?php echo get_permalink();?>">
<div class="imgLoad">
<div class="new"><img src="<?php bloginfo( 'template_directory' );?>/images/new.png" /></div>
<div class="spin"><div class="half left"><div class="band"></div></div><div class="half right"><div class="band"></div></div></div>
<img src="<?php bloginfo( 'template_directory' );?>/images/temps/1.png" class="img-responsive resize" onload="imgLoaded(this)" />
</div>
<div class="caption">#Temp0001</div>
</a>
</div>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="thumbnail" align="center">
<a href="<?php echo get_permalink();?>">
<div class="imgLoad">
<div class="new"><img src="<?php bloginfo( 'template_directory' );?>/images/new.png" /></div>
<div class="spin"><div class="half left"><div class="band"></div></div><div class="half right"><div class="band"></div></div></div>
<img src="<?php bloginfo( 'template_directory' );?>/images/temps/2.png" class="img-responsive resize" onload="imgLoaded(this)" />
</div>
<div class="caption">#Temp0002</div>
</a>
</div>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="thumbnail" align="center">
<a href="<?php echo get_permalink();?>">
<div class="imgLoad">
<div class="new"><img src="<?php bloginfo( 'template_directory' );?>/images/new.png" /></div>
<div class="spin"><div class="half left"><div class="band"></div></div><div class="half right"><div class="band"></div></div></div>
<img src="<?php bloginfo( 'template_directory' );?>/images/temps/3.png" class="img-responsive resize" onload="imgLoaded(this)" />
</div>
<div class="caption">#Temp0003</div>
</a>
</div>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="thumbnail" align="center">
<a href="<?php echo get_permalink();?>">
<div class="imgLoad">
<div class="new"><img src="<?php bloginfo( 'template_directory' );?>/images/new.png" /></div>
<div class="spin"><div class="half left"><div class="band"></div></div><div class="half right"><div class="band"></div></div></div>
<img src="<?php bloginfo( 'template_directory' );?>/images/temps/4.png" class="img-responsive resize" onload="imgLoaded(this)" />
</div>
<div class="caption">#Temp0004</div>
</a>
</div>
</div>

<?php endwhile;wp_reset_query();?>
<div class="clearfix"></div>
<div class="col-md-12" align="center"><h3 align="center">カラーバリエーションを変えていただくこともできます。</h3></div>

</div>
</div>
</div>
</div>

<div class="effect">
<div class="b-web" data-stellar-background-ratio="0.5">
<div class="container">
<div class="row">
<div class="col-lg-12" align="center">
<i class="fa fa-quote-left"></i>
<p>上記のテンプレート以外にも、お客様のご要望に応じたレスポンシブウェブデザインのホームページをご提案・提供しております。お気軽にお問い合わせください。</p>
<?php echo htmlContactButton();?>
</div>
</div>
</div>
</div>
</div>

<div><h3 align="center">PRICE</h3></div>
<div><h3 align="center" style="margin-top: 0px;font-size: 40px;font-weight: bold;">ご利用料金</h3></div>
<div align="center"><img src="<?php bloginfo( 'template_directory' );?>/images/price.jpg" class="img-responsive"  alt="ご利用料金"/></div>
<hr>

<div class="effect"><div class="container blockabout"><div class="row"><?php get_sidebar('about');?></div></div></div>
<?php get_footer();?>