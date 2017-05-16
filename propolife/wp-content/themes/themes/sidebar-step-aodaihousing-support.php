<div class="lotus">
<?php
$args   = array( 'child_of' =>1583);
    $pages  = get_pages( $args );
    $dem=0;
    foreach ( $pages as $page ){
?>
<div class="title"><span class="badge"><?php echo $page->post_title;?></span></div>
<div class="detail"><?php echo $page->post_content;?></div>
<?php if($dem==0){?>
<div align="left" style="margin-bottom:15px;"><a href="/contact.html" class="btn btn-success">制作について相談する<i class="fa fa-chevron-circle-right" style="margin:0px 0px 0px 10px;color:#ffffff"></i></a></div>
<div class="clearfix"></div>
<?php }?>
<?php $dem++; }?>

<div align="left" style="margin-bottom:15px;"><a href="/contact.html" class="btn btn-success">制作について相談する<i class="fa fa-chevron-circle-right" style="margin:0px 0px 0px 10px;color:#ffffff"></i></a></div>
<div class="clearfix"></div>
</div>
