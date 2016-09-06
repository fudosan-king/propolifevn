<?php global $lienhe;?>
<div class="col-lg-2"></div>
<div class="col-lg-8">

<div class="listMenu">
<div class="bg-default">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
<a  href="<?php echo get_permalink(get_page_by_path('manga'))?>">
<div class="caption" align="center">
<h3>MANGA BOOKS</h3>
<img src="<?php bloginfo( 'template_directory' );?>/images/about.jpg" class="img-responsive">
<div class="scroll">
<section>
<div class="content mCustomScrollbar" data-mcs-theme="minimal">
<p><?php echo getExcerptByID(11);?></p>
</div>
</section>
</div>
</div>
</a>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">

<div class="caption" align="center">
<h3 align="center" style="color: #4a3636;">CONTACT EM'S CAFE</h3>
<dl class="dl-horizontal dl-contact">
<dt>OPENING:</dt><dd><?php echo $lienhe['open'];?></dd>
<dt>Tel:</dt><dd><?php echo $lienhe['hotline'];?></dd>
<dt>Mail:</dt><dd><?php echo $lienhe['mail'];?></dd>
<dt>Address:</dt><dd><?php echo $lienhe['diachigmap'];?></dd>
</dl>                
</div>
<div><img src="<?php bloginfo( 'template_directory' );?>/images/bt-body.png"></div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
<div class="col-lg-2"></div>