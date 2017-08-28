<?php global $lienhe;?>
<nav class="navbar">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<h1 style="margin:0px;">
<a href="<?php echo home_url();?>" class="navbar-brand logo hidden-lg available-xs"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-tablet.png" class="img-responsive"></a>
<a href="<?php echo home_url();?>" class="navbar-brand logo hidden-md hidden-sm hidden-xs">
<img width="316" height="54" src="<?php bloginfo( 'template_directory' );?>/images/logo-toppage.png" class="img-responsive wp-post-image" alt="logo-propolife" title="logo-propolife" srcset="<?php bloginfo( 'template_directory' );?>/images/logo-toppage.png" sizes="(max-width: 316px) 100vw, 316px">
<?php
// $imgInfo = get_post( get_post_thumbnail_id(1));
// $caption=nl2br(str_replace(' ', '&nbsp;',$imgInfo->post_excerpt));
// $imgTitle = $imgInfo->post_title;
// $imgAlt = get_post_meta(get_post_thumbnail_id(1), '_wp_attachment_image_alt', true);
// echo get_the_post_thumbnail(1,'full',array('class'=>'img-responsive','alt'=>$imgAlt,'title'=>$imgTitle));
?>
</a>
</h1>
<a href="tel:+842838275068" class="call-sp hidden-lg available-xs"><img src="<?php bloginfo( 'template_directory' );?>/images/call.png" class="img-responsive" alt="Call"></a>
</div>

<div class="collapse navbar-collapse navbar-right" id="navbar-collapse">
<ul class="nav navbar-nav">
<li><a href="<?php echo home_url();?>">ホーム</a></li>

<li class="<?php echo get_post(4)->post_name;?>"><a href="#" class="hidden-xs"><?php echo get_the_title(4);?></a>
    <ul>
        <li class="<?php echo get_post(4)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('about'));?>"><?php echo get_the_title(4);?></a></li>
        <li class="<?php echo get_post(1466)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('recruitment'));?>"><?php echo get_the_title(1466);?></a></li>
    </ul>
</li>

<li class="<?php echo get_post(11)->post_name;?>">
<a href="#" class="hidden-xs"><?php echo get_the_title(11);?></a>
<ul>
<?php
$arg = array('post_type' => 'support','orderby' => 'menu_order','order' => 'desc','posts_per_page' =>-1,'post__not_in'=>array(273,274,275,277),'status' => array('publish','private'));
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$smlink = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(get_permalink($post->ID)));
$smlink = html_entity_decode($smlink,null,'UTF-8');
?>
<li><a href="<?php echo $smlink;?>"><?php the_title();?></a></li>
<?php endwhile;wp_reset_query();?>
</ul>
</li>
<li class="<?php echo get_post(73)->post_name;?>"><a href="#" class="hidden-xs"><?php echo get_the_title(73);?></a>
<ul><?php echo wp_list_categories('taxonomy=cat-chronicle&title_li=&hide_empty=0&orderby=ID&order=asc&exclude=7,11'); ?></ul>
</li>
<li class="<?php echo get_post(13)->post_name; ?> <?php echo get_post(370)->post_name;?> <?php echo get_post(454)->post_name;?>"><a href="#" class="hidden-xs">WEBサービス</a>
<ul>
<li><a href="<?php echo get_permalink(get_page_by_path('web-step'));?>">WEBサービスについて</a></li>
<li><a href="<?php echo get_permalink(get_page_by_path('web'));?>">WEBサイト制作</a></li>
<li><a href="<?php echo get_permalink(get_page_by_path('development'));?>">WEB広告支援</a></li>
</ul>
</li>
<li><a href="#" class="hidden-xs">不動産賃貸仲介</a>
<ul>
<li><a href="<?php echo get_permalink(get_page_by_path('aodaihousing-support'));?>"><?php echo get_the_title(1583);?></a></li>
<li><a href="http://aodaihousing.com/" target="_blank">アパート検索</a></li>
<li><a href="http://office-vn.com/" target="_blank">オフィス検索</a></li>
</ul>
</li>
<li class="<?php echo get_post(311)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('news'));?>"><?php echo get_the_title(311);?></a></li>
<li class="<?php echo get_post(1)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('contact'));?>"><?php echo get_the_title(1);?></a></li>
<li>
<address class="visible-xs">
<div class="socials">
<a class="fa fa-facebook" href="<?php echo $lienhe['facebook'];?>" target="_blank"></a>
<a class="fa fa-twitter" href="<?php echo $lienhe['twitter'];?>" target="_blank"></a>
<a class="fa fa-google-plus" href="<?php echo $lienhe['gplus'];?>" target="_blank"></a>
</div>
<?php echo $lienhe['diachigmap'];?>
</address>
</li>
</ul>
</div>
</nav>
