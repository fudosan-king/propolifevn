<nav class="navbar navbar-default navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>      
<a class="navbar-brand" href="<?php echo home_url();?>"><img src="<?php bloginfo( 'template_directory' );?>/images/top-logo.png" class="img-responsive"></a>
</div>

<div class="collapse navbar-collapse" id="navbar-collapse">
<ul class="nav navbar-nav navbar-right">
<li class="home"><a href="<?php echo home_url();?>">HOME</a></li>
<li class="<?php echo get_post(3)->post_name;?>"><a href="<?php echo get_permalink(3);?>"><?php echo get_the_title(3);?></a></li>
<li class="<?php echo get_post(5)->post_name;?>"><a href="<?php echo get_permalink(5);?>"><?php echo get_the_title(5);?></a></li>   
<li class="<?php echo get_post(7)->post_name;?>"><a href="<?php echo get_permalink(7);?>"><?php echo get_the_title(7);?></a></li>
<li class="<?php echo get_post(11)->post_name;?>"><a href="<?php echo get_permalink(11);?>"><?php echo get_the_title(11);?></a></li>       
<li class="<?php echo get_post(1)->post_name;?>"><a href="<?php echo get_permalink(1);?>"><?php echo get_the_title(1);?></a></li> 
<li><a href="<?php echo get_permalink(get_page_by_path('shop'));?>"><i class="fa fa-shopping-bag fa-2x"></i><span class="badge active" id="block-cart" style="position: absolute;left: 30px;top: 25px;background-color: #f20;"><?php echo ($_SESSION['tongsp']?$_SESSION['tongsp']:0); ?></span></a></li>
</ul>
</div>
</div>
</nav>