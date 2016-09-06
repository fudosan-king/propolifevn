<?php if(is_home()){ ?>
<span class="heading" style="margin-top:30px;display: block;">About Ems</span>
<div class="listMenu" style="margin:0px 0px 30px 0px">
<a href="<?php echo get_post_permalink(3);?>">
<div class="bg-default"><p><?php echo getExcerptByID(3);?></p></div>
</a>
</div>
<?php
}else{
	$args   = array( 'child_of' =>3);
	$pages  = get_pages( $args );	
	$icons = array(0=>'<i class="fa fa-check" style="color: #E21C24;"></i>',1=>'<i class="fa fa-motorcycle" style=" color: #29AB2C;"></i>',2=>'<i class="fa fa-thumbs-up" style="color: #337ab7;"></i>');
	$color = array(0=>'E21C24',1=>'29AB2C',2=>'337ab7');
	$dem=0;
	foreach ( $pages as $page ){ 
?>
<div class="col-lg-4" align="center">
<div style="width: 80px;height: 80px;border-radius: 50%;border: solid 1px #<?php echo $color[$dem];?>;text-align: center;line-height: 80px;font-size: 35px;">
<?php echo $icons[$dem]; ?>
</div>
<h3 style="font-size:16px"><?php echo $page->post_title;?></h3>
<?php echo $page->post_content;?>
</div>
<?php $dem++; }}?>