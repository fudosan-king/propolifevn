<?php get_header();?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div align="center" class="sildermain">
<div id="slider1_container" style="position: relative; width:2000px;height:700px; overflow: hidden;">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;"></div> 
<div style="position: absolute; display: block; background: url(<?php bloginfo( 'template_directory' );?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div> 
</div> 

<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:2000px; height:700px;overflow: hidden;">
<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/1.jpg" />
<div u=caption t="CLIP|LR" du="1500" style="position:absolute; left:55%; top:115px; width:700px;font-size:30px;text-align:right;color:#ffffff;text-shadow: rgba(0, 0, 0, 0.39) 1px 1px 5px;">
<span class="title-slide">「働き方」を施工する</span><br>We always make design and construct<br>comfortable residence.
</div>
<div u="caption" t="ZMF|10" d=-1300 class="captionOrange" style="left:59%;top:315px;">Design</div>
<div u="caption" t="CLIP|L" d=-300 class="captionBlack" style="left:65.5%;top:315px;text-align: center;">Interior</div>
<a class="captionOrange" u="caption" t="CLIP|L" d=-300 href="#" style="left:72%;top:315px;">Artchive</a>
<div u="caption" t="CLIP|L" d=-300 class="captionBlack" style="left:79.3%;top:315px;text-align: center;">Lotus Service</div>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/2.jpg" />
<div u=caption t="CLIP|LR" du="1500" style="position:absolute; left:24%; top:425px;text-align:right;text-shadow: rgba(0, 0, 0, 0.39) 1px 1px 5px;"><span class="title-slide">「働き方」を施工する</span></div>
<div u="caption" t="MCLIP|T" t2="T" class="captionOrange" d=-450 style="left:505px;top:40px;">Reform office & Home</div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:505px;top:90px;">Lotus Service</div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:505px;top:140px;">Web advertisement HP</div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:505px;top:190px;">Interior & Artchive</div>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/3.jpg" />
<div u=caption t="T" t2=NO style="position: absolute; left:150px; top:30px;color: #fff;text-align:left;font-size:30px;text-shadow: rgba(0, 0, 0, 0.39) 1px 1px 5px;">
<span class="title-slide">「働き方」を施工する</span><br>We always make design and construct<br>comfortable residence.
</div>
<div u=caption t="L" d=-750 class="captionOrange" style="left:150px; top: 300px;">Reform Office</div>
<div u=caption t="CLIP|L" t2=B d=-450 class="captionBlack" style="left:370px; top: 300px;">and</div>
<div u=caption t="DDG|TR" t2="TORTUOUS|VB" d=-750 class="captionOrange" style="left:460px; top: 300px;">Reform Home</div>
<div u=caption t="TORTUOUS|VB" d=-750 class="captionOrange" style="left:690px; top:300px;">Lotus Service</div>
<div u=caption t="T" d=-450 class="captionOrange" style="left:915px; top:300px;">Web advertisement</div>
</div>

<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/4.jpg" />
<div u=caption t="RTTS|T" d=-300 t2="B" style="position:absolute; left:150px; top: 330px;font-size:30px;text-shadow: rgba(0, 0, 0, 0.39) 1px 1px 5px;color:#FFFFFF">
<span class="title-slide">「働き方」を施工する</span><br>We always make design and construct<br>comfortable residence.
</div>
<div u=caption t="T|IB" t2="T" d=-300 class="captionOrange"  style="position:absolute; left:150px; top: 100px;">Reform Office</div>
<div u=caption t="T|IB" t2=L d=-900 class="captionBlack"  style="position:absolute; left:150px; top: 170px;">Reform Home</div>
<div u="caption" t="LISTH|R" t2="CLIP|TB" d=-600 class="captionOrange" style="position: absolute; top:170px; left:390px;text-align: left;">Interior & Artchive</div>
<div u=caption t="LISTH|R"  t2=R d=-900 class="captionBlack" style="left:670px; top:170px;">Lotus Service</div>
<div u=caption t="LISTH|R" t2=R d=-900 class="captionBlack" style="left:900px; top: 170px;">Web advertisement</div>
</div>       
</div> 

<div u="navigator" class="jssorb03" style="bottom: 16px; right: 6px;"><div u="prototype"><div u="numbertemplate"></div></div></div>
<span u="arrowleft" class="jssora20l" style="left:81%;"><i class="fa fa-angle-left fa-5x"></i></span>
<span u="arrowright" class="jssora20r" style="right:10%;"><i class="fa fa-angle-right fa-5x"></i></span>
</div> 
</div>

<div class="effect">
<div class="container bgColor">
<h3 align="center">無料でご提供する４つのサービス</h3>
<div class="row"><?php get_sidebar('top-office');?></div>
</div>
</div>

<div class="effect">
<div class="container" align="center">
<div class="row">
<div class="col-lg-12">

<?php
$term = get_term_by('slug',get_query_var('cat-chronicle'),'cat-chronicle');
echo '<h3 align="center">'.$term->name.'</h3>';
echo '<h4>Furniture & Interior</h4>';
echo '<p>'.$term->description.'</p>';
?>

</div>
</div>
</div>
</div>

<div class="effect">
<div class="gallery bg-pt-3" data-stellar-background-ratio="0.5">
<div class="container">
<div class="row">

<?php
$arg = array(
'post_type' => 'chronicle',
'orderby' => 'date',
'order' => 'desc',
'post__not_in' =>array(29,30,31,32),
'posts_per_page' =>-1,
'status' => array('publish','private'),
'taxonomy'=>'cat-chronicle',
'term'=>'reform-office'
);
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$f_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="thumbnail">
<a href="<?php echo $f_url;?>" class="fancybox-buttons" data-fancybox-group="button">
<div class="view"><?php the_post_thumbnail('full',array('class'=>'img-responsive'));?></div>
</a>
</div>
</div>
<?php endwhile;wp_reset_query();?>

</div>
</div>
</div>
</div>

<div class="effect">
<div class="bg-pt-2">
<div class="container">
<div class="row">
<div class="col-lg-12" align="center">
<h3 align="center">無料アフターサービス</h3>
<i class="fa fa-quote-left"></i>
<p>
クロニクルリフォームはアフターサービス付き。 経験豊
富な現地スタッフと、日本人管理者があなたのオフィスの品質を確かなものにキープします。 ホーチミン最長のアフター期間を設けており、万が一不具合が発生した場合は迅速に対応させて頂いております。 安心してご依頼くだ
さいませ。※電球等の消耗品の交換は除きます。
</p>
<hr>
</div>
</div>

<div class="row staff"><?php get_sidebar('staff');?></div>
</div>
<div align="center"><?php echo htmlContactButton();?></div>
</div>
</div>

<div class="effect"><div class="container blockabout"><div class="row"><?php get_sidebar('about');?></div></div></div>
<?php get_footer();?>