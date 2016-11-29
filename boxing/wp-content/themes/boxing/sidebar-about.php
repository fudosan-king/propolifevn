<div class="col-md-9">
<?php
$lang = $_GET['lang'];
$welcomes = get_field('welcome', 170);

?>
<div class="panel panel-default"><div class="panel-body">
<?php
foreach ($welcomes as $welcome) {
if ($welcome['language'] == $lang){
echo '
<h3 align="left">' . $welcome['welcome_title'] . '</h3>
<p align="justify">' . $welcome['welcome_message'] . '</p>
';
}
}
?>
<div id="map-canvas"></div>
</div></div>
</div>
<div class="col-md-3 center-block">
<div class="list-group">
<a href="#" class="list-group-item inews active"><h4 class="list-group-item-heading">スタッフから</h4></a>
<?php
if ($lang == 'vi'){
    $cat = 58;
} else if ($lang == 'ja') {
    $cat = 52;
} else {
    $cat = 56;
}
$arg = array('cat' => $cat,'post_type' => 'post','orderby' => 'date','order' => 'desc','posts_per_page' =>3);
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<a href="<?php echo get_permalink($post->ID);?>" class="list-group-item"><p class="list-group-item-text"><span class="news-date"><?php echo get_the_date();?></span><br><?php echo getLimitContent($post->ID,100);?></p></a>
<?php endwhile;wp_reset_query(); ?>
</div>

<div class="list-group">
<a href="#" class="list-group-item inews active"><h4 class="list-group-item-heading">インフォメーション</h4></a>
<?php
$arg = array('post_type' => 'news-jp','orderby' => 'date','order' => 'desc','posts_per_page' =>2);
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$url = get_post_meta($post->ID,'web-url',true);
?>
<a href="<?php echo $url;?>" class="list-group-item" target="_blank"><p class="list-group-item-text"><?php the_content();?></p></a>
<?php endwhile;wp_reset_query(); ?>
</div>

<!--<div class="logo-list" align="center">
<a href="http://aodaihousing.com/" target="_blank"><img src="<?php echo $template_directory ?>/images/aodaihousing-onanohito.png" class="img-responsive" /></a>
</div>-->
</div>