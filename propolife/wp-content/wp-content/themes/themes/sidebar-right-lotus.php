<div class="list-group">
<a href="#" class="list-group-item active"><h4 class="list-group-item-heading">LOTUS SERVICES</h4></a>
<?php
$arg = array(
'post_type' => 'lotus',
'orderby' => 'date',
'order' => 'asc',
'posts_per_page' =>-1,
'post__not_in'=>array(37,39,40,41),
'status' => array('publish','private')
);
$the_query = new WP_Query($arg);
$dem=0;
while ( $the_query->have_posts() ) : $the_query->the_post();
$dem++;
?>
<a href="<?php echo get_permalink($post->ID);?>" class="list-group-item"><span class="list_num">0<?php echo $dem;?>.</span><?php the_title();?></a>
<?php endwhile;wp_reset_query();?>
</div>

<div style="background-color: #F1FBFD;" align="center">
<img src="<?php bloginfo( 'template_directory' );?>/images/s1.png">
<div class="caption" align="center" style="background-color:#4dd0e4;">
<div class="title">お問い合わせ</div>
<div align="justify" class="excerpt"><p>お問い合わせフォームからか、info@propolifevietnam.com又はお電話で無料相談のご予約、お問い合わせ下さい。</p>
</div>
<div class="detail collapse" style="display: block;"><p>無料相談フォームはこちら無料相談フォームはこちら<br>
ＴＥＬ ＋84‐8‐3824‐1418（ロータスサービス代表）</p>
</div>
</div>
</div>

<h2>DESIGN & SOLUTIONS</h2>
<ul class="list">
<li><a href="<?php echo get_permalink(get_page_by_path('office'));?>"><span class="list_num">02.</span>chronicle reform for office</a></li>
<li><a href="<?php echo get_permalink(get_page_by_path('home'));?>"><span class="list_num">03.</span>chronicle reform for home</a></li>
<li><a href="<?php echo get_permalink(get_page_by_path('web'));?>"><span class="list_num">04.</span>WEB advertisement HP</a></li>
<li class="list-last"><a href="http://aodaihousing.com" target="_blank"><span class="list_num">05.</span>AODAIHOUSING HP</a></li>
</ul>

