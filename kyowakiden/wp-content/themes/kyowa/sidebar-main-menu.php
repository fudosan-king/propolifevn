<?php global $lienhe;?>
<nav class="navbar navbar-default" id="navbar">
<div class="container">
<div class="row">
<div class="col-lg-3 hidden-xs"><a href="<?php echo home_url();?>" style="background: #ffffff;padding:10px 10px;display: block;"><img src="<?php bloginfo( 'template_directory' );?>/images/top-logo.png" class="img-responsive"></a></div>
<div class="col-lg-9 col-xs-12">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand visible-xs" href="index.html"><img src="<?php bloginfo( 'template_directory' );?>/images/mb-logo.png" class="visible-xs" height="20" width="auto"></a>
</div>

<div class="collapse navbar-collapse" id="navbar-collapse">
<ul class="nav navbar-nav">
<li class="home"><a href="index.html"><?php echo __('TRANG CHỦ','theme'); ?></a></li>
<li class="<?php echo get_post(4)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('business'))?>"><?php echo get_the_title(4);?></a></li>       
<li class="<?php echo get_post(5)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('head-office'))?>"><?php echo get_the_title(5);?></a></li>
<li class="<?php echo get_post(2)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('about'))?>"><?php echo get_the_title(2);?></a></li>
<li class="<?php echo get_post(3)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('group'))?>"><?php echo get_the_title(3);?></a></li>
<li class="<?php echo get_post(6)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('news'))?>"><?php echo get_the_title(6);?></a></li>
<li class="<?php echo get_post(1)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('contact'))?>"><?php echo get_the_title(1);?></a></li>         
</ul>
</div>
<div class="navbar-nav navbar-right"><?php echo qtrans_generateLanguageSelectCode('image'); ?></div>
</div>
</div>
</div>
</nav>