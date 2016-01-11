<?php get_header();?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<div align="center" style="padding-top:73px">
<div id="slider1_container" style="position: relative; width:2000px;height:700px; overflow: hidden;">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;"></div> 
<div style="position: absolute; display: block; background: url(<?php bloginfo( 'template_directory' );?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div> 
</div> 

<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:2000px; height:700px;overflow: hidden;">
<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/home/1.jpg" />
<div u=caption t="CLIP|LR" du="1500" style="position:absolute; left:55%; top:115px; width:700px;font-size:30px;text-align:right;color:#ffffff;text-shadow: rgba(0, 0, 0, 0.39) 1px 1px 5px;">
<span class="title-slide">「働き方」を施工する</span><br>We always make design and construct<br>comfortable residence.
</div>
<div u="caption" t="ZMF|10" d=-1300 class="captionOrange" style="left:69%;top:315px;">Design</div>
<div u="caption" t="CLIP|L" d=-300 class="captionBlack" style="left:76%;top:315px;text-align: center;">Interior</div>
<a class="captionOrange" u="caption" t="CLIP|L" d=-300 href="#" style="left:83%;top:315px;">Artchive</a>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/home/2.jpg" />
<div u=caption t="CLIP|LR" du="1500" style="position:absolute; left:24%; top:425px;text-align:right;text-shadow: rgba(0, 0, 0, 0.39) 1px 1px 5px;"><span class="title-slide">「働き方」を施工する</span></div>
<div u="caption" t="MCLIP|T" t2="T" class="captionOrange" d=-450 style="left:505px;top:40px;">Reform office & Home</div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:505px;top:90px;">Lotus Service</div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:505px;top:140px;">Web advertisement HP</div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:505px;top:190px;">Interior & Artchive</div>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/home/3.jpg" />
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
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/home/4.jpg" />
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
<div class="container" align="center">
<h3 align="center">施工事例WORK</h3>
<div class="row">

<?php
$arg = array(
'post_type' => 'chronicle',
'orderby' => 'date',
'order' => 'desc',
'posts_per_page' =>-1,
'status' => array('publish','private'),
'taxonomy'=>'cat-chronicle',
'term'=>'reform-home'
);
$the_query = new WP_Query($arg);
while ( $the_query->have_posts()):$the_query->the_post();
?>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="view-work">
<div class="imgLoad">
<div class="spin"><div class="half left"><div class="band"></div></div><div class="half right"><div class="band"></div></div></div>
<?php the_post_thumbnail('full',array('class'=>'img-responsive','onload'=>'imgLoaded(this)'));?>
</div>
<div class="mask">
<h2><?php the_title();?></h2>
<div class="description"><?php the_excerpt();?></div>
<a href="#" class="btn btn-info">View Gallery</a>
</div>
</div>
</div>
<?php endwhile;wp_reset_query();?>

</div>

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
<div class="b-web" data-stellar-background-ratio="0.5">
<div class="container">
<div class="row">
<div class="col-lg-12" align="center">
<i class="fa fa-quote-left"></i>
<p>数多のインテリアから、あなたのお部屋に ぴったりな家具もご提案。リラックスして頂ける快適なプライベート空間をローコストで仕上げます。</p>
<?php echo htmlContactButton();?>
</div>
</div>
</div>
</div>
</div>

<div class="effect"><div class="container blockabout"><div class="row"><?php get_sidebar('about');?></div></div></div>
<?php get_footer();?>