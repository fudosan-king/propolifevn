<?php global $lienhe; get_header();?>
<body>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>
<?php
if(isset($_REQUEST['muahang'])){include('order-sendmail-content.php');}
if(isset($_SESSION['tongsp'])){$tongsp=$_SESSION['tongsp'];}
else{$tongsp=0;}
?>
<div class="container">
<div class="row" style="margin-top:30px;">
<div class="col-lg-12" align="center">
<table class="table table-bordered table-striped">
<thead style="background-color:#ffffff">
<tr>
<th class="col-md-2"><?php echo __('画像','ems'); ?></th>
<th class="col-md-3"><?php echo __('製品名','ems'); ?></th>
<th class="col-md-2"><?php echo __('製品コード','ems'); ?></th>
<th class="col-md-2"><?php echo __('数量','ems'); ?></th>
<th class="col-md-2" style="text-align:right"><?php echo __('価格/ 1 SẢN PHẨM','ems'); ?></th>
<th class="col-md-1" align="center" style="text-align:center"><?php echo __('削除します','ems'); ?></th>
</tr>
</thead>
<tbody>
<?php
if($tongsp != 0){
$san_pham_chon=get_total_price();
if(is_array($san_pham_chon)){
foreach($san_pham_chon as $result){
?>
<tr id="giohang_<?php echo $result['id'];?>" class="giohang">
<td class="images"><img src="<?php echo $result["images"];?>" alt="<?php echo ($result["title"])?>" width="60" height="auto" /></td>
<td><?php echo ($result["title"])?></td>
<td><?php echo ($result["ma-sp"])?></td>
<td>

<div class="form-group soluong">
<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-plus" id="plus_cart" onclick="plus_num_cart('<?php echo $result['id'];?>','<?php echo get_page_ID_by_slug('ajax-total-cart');?>');"></i></div>
<input type="text" class="form-control input-sm" style="text-align:center" id="numcount_<?php echo $result['id'];?>" value="<?php echo $result["soluong"];?>" readonly />
<div class="input-group-addon"><i class="fa fa-minus" id="des_cart" onclick="des_num_cart('<?php echo $result['id'];?>','<?php echo get_page_ID_by_slug('ajax-total-cart');?>');"></i></div>
</div>
</div>

</td>
<td style="text-align:right"><?php echo $result["price"];?> VND</td>
<td style="text-align:center"><a href="javascript:void(null);" onclick="ajax_remove_cart('<?php echo get_page_ID_by_slug('ajax-total-cart');?>','<?php echo get_page_ID_by_slug('ajax-cart');?>','<?php echo $result['id']?>');"><i class="fa fa-trash-o fa-2x"></i></a></td>
</tr>
<?php
}
}
}
else{$html=alertDialog(17);?><script>jQuery(function($){$('#messageDialog').modal('show').html('<?php echo $html;?>');});</script><?php }?>
</tbody>
<tfoot>
<tr id="total-cart">
<td colspan="4" align="right"><strong><?php echo __('合計','ems'); ?></strong></td>
<td align="right"><strong id="totalcart"><?php echo number_format($_SESSION['tong']);?></strong> VND</td>
<td>&nbsp;</td>
</tr>
</tfoot>
</table>

<div align="right" style="margin-bottom:30px;">
<a href="<?php echo get_permalink(get_page_by_path('san-pham'));?>" class="btn btn-default" style="margin-right:10px;margin-bottom:0px"><?php echo __('持続する','ems'); ?></a>
<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal" style="margin-bottom:0px"><?php echo __('支払い','ems'); ?></a>
</div>
<form method="post" data-toggle="validator" role="form"><?php include('order-form-content.php');?></form>
</div>
</div>
</div>
<?php get_footer();?>