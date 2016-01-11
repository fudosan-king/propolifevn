<nav class="navbar">

<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<?php if(is_page('lotus')){?>
<a href="<?php echo home_url();?>" class="navbar-brand logo"><img src="<?php bloginfo( 'template_directory' );?>/images/lotus.png" class="img-responsive" height="54" width="auto"></a>
<?php }else{?>
<a href="<?php echo home_url();?>" class="navbar-brand logo hidden-lg hidden-xs"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-tablet.png" class="img-responsive"></a>
<a href="<?php echo home_url();?>" class="navbar-brand logo hidden-md hidden-sm"><img src="<?php bloginfo( 'template_directory' );?>/images/logo-propolife.png" class="img-responsive"></a>
<?php }?>
</div>
<div class="collapse navbar-collapse navbar-right" id="navbar-collapse">
<ul class="nav navbar-nav">
<li><a href="<?php echo home_url();?>">HOME</a></li>
<li class="<?php echo get_post(4)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('about'));?>"><?php echo get_the_title(4);?></a></li>
<li class="<?php echo get_post(73)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('chronicle'));?>"><?php echo get_the_title(73);?></a>
<ul><?php echo wp_list_categories('taxonomy=cat-chronicle&title_li=&hide_empty=1&orderby=name&order=ASC'); ?></ul>
</li>   

<li class="<?php echo get_post(11)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('lotus'));?>"><?php echo get_the_title(11);?></a></li>
<li class="<?php echo get_post(13)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('web'));?>"><?php echo get_the_title(13);?></a></li>  
<li><a href="http://aodaihousing.com/" target="_blank">AODAIHOUSING</a></li>
<li class="<?php echo get_post(1)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('contact'));?>"><?php echo get_the_title(1);?></a></li> 
</ul>
<address class="visible-xs">
<div class="socials">
<a class="fa fa-facebook" href="#" target="_blank"></a>
<a class="fa fa-twitter" href="#" target="_blank"></a>
<a class="fa fa-google-plus" href="#" target="_blank"></a>
</div>
Unit1904 19Floor CJ BUILDING(旧GEMADEPT TOWER), 6 Le Thanh Ton, District1,HCMC, Vietnam.
</address>
</div>

</nav>