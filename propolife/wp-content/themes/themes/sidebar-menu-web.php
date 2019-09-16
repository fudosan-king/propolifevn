<?php global $lienhe;$dienthoai = explode(';',$lienhe['dienthoai']);$dt=explode('(',$dienthoai[1]);$listmail = explode(';',$lienhe['mail']);?>
<!-- <div class="list-group list-web" align="left">
<a href="#" class="list-group-item active">WEB DESIGN</a>
<a href="<?php //echo get_permalink(370);?>" class="list-group-item">WEBサービスについて</a>
<a href="<?php //echo get_permalink(13);?>" class="list-group-item">WEBサイト制作</a>
<a href="<?php //echo get_permalink(454);?>" class="list-group-item">WEB広告</a>
</div> -->

<div class="list-group">
<a href="#" class="list-group-item active"><h4 class="list-group-item-heading">メニュー</h4></a>
<a href="<?php echo get_permalink(get_page_by_path('about'));?>" class="list-group-item"><span class="list_num">01.</span><?php echo get_the_title(4);?></a>
<a href="<?php echo get_permalink(264);?>" class="list-group-item"><span class="list_num">02.</span><?php echo get_the_title(11);?></a>
<a href="/cat-chronicle/内装サービスについて" class="list-group-item"><span class="list_num">03.</span><?php echo get_the_title(73);?></a>
<!-- <a href="<?php //echo get_permalink(370);?>" class="list-group-item"><span class="list_num">04.</span><?php //echo get_the_title(13);?></a> -->
<a href="<?php echo get_permalink(get_page_by_path('aodaihousing-support'));?>" target="_blank" class="list-group-item"><span class="list_num">04.</span>不動産サービス</a>
<a href="<?php echo get_permalink(get_page_by_path('contact'));?>" class="list-group-item"><span class="list_num">05.</span><?php echo get_the_title(1);?></a>
</div>

<?php if(!is_page('web')){?>
<?php include('contact-right.php');?>
<?php }?>
