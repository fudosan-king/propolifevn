<?php global $lienhe;$dienthoai = explode(';',$lienhe['dienthoai']);$dt=explode('(',$dienthoai[1]);$listmail = explode(';',$lienhe['mail']);?>
<?php if(is_page('about')){$dt=explode('(',$dienthoai[0]);}?>
<?php if(is_page('news') || is_singular('news')){$dt=explode('(',$dienthoai[2]);}?>
<?php if(is_tax('cat-chronicle') || is_singular('chronicle')){$dt=explode('(',$dienthoai[1]);}?>
<?php if(is_page('support') || is_singular('support')){$dt=explode('(',$dienthoai[2]);?>
<div class="list-group">
<a href="#" class="list-group-item active"><h4 class="list-group-item-heading">ロータスサービス</h4></a>
<?php
$arg = array('post_type' => 'support','orderby' => 'menu_order','order' => 'desc','posts_per_page' =>-1,'status' => array('publish','private'),'taxonomy'=>'cat-support','term'=>'lotus');
$the_query = new WP_Query($arg);
$dem=0;
while ( $the_query->have_posts() ) : $the_query->the_post();
$smlink = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(get_permalink($post->ID)));
$smlink = html_entity_decode($smlink,null,'UTF-8');
$dem++;
?>
<a href="<?php echo $smlink;?>" class="list-group-item"><span class="list_num">0<?php echo $dem;?>.</span><?php the_title();?></a>
<?php endwhile;wp_reset_query();?>
</div>
<?php } ?>

<?php if(is_singular('news')){?>
<div class="list-group">
<a href="#" class="list-group-item active"><h4 class="list-group-item-heading">NEWS</h4></a>
<?php
$arg = array('post_type' => 'news','orderby' => 'date','order' => 'desc','posts_per_page' =>-1,'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$smlink = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(get_permalink($post->ID)));
$smlink = html_entity_decode($smlink,null,'UTF-8');
?>
<a href="<?php echo $smlink;?>" class="list-group-item">
<div class="news-date"><?php echo get_the_date();?></div>
<?php the_title();?>
</a>
<?php endwhile;wp_reset_query();?>
</div>
<?php }?>

<div class="list-group">
<a href="#" class="list-group-item active"><h4 class="list-group-item-heading">メニュー</h4></a>
<a href="<?php echo get_permalink(get_page_by_path('about'));?>" class="list-group-item"><span class="list_num">01.</span><?php echo get_the_title(4);?></a>
<?php
$smlink = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(get_permalink(264)));
$smlink = html_entity_decode($smlink,null,'UTF-8');
?>
<a href="<?php echo $smlink;?>" class="list-group-item"><span class="list_num">02.</span><?php echo get_the_title(11);?></a>
<a href="/cat-chronicle/オフィスの内装工事" class="list-group-item"><span class="list_num">03.</span><?php echo get_the_title(73);?></a>
<a href="<?php echo get_permalink(370);?>" class="list-group-item"><span class="list_num">04.</span><?php echo get_the_title(13);?></a>
<a href="http://aodaihousing.com" target="_blank" class="list-group-item"><span class="list_num">05.</span>不動産賃貸仲介</a>
<a href="<?php echo get_permalink(get_page_by_path('contact'));?>" class="list-group-item"><span class="list_num">06.</span><?php echo get_the_title(1);?></a>
</div>
<?php   include('contact-right.php');?>
<?php   include('aodaihousing-right.php');?>
