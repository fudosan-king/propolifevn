<?php 
$option = array(0=>'Main', 1=>'Special'); 
$data_opt = array(1=>'Houses', 2=>'Offices');
?>
<input type="hidden" value="<?=$start?>" id="start" />
<div class="content_table">
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<th class="th_no_cursor" width="40">No.</th>
			<th class="th_left" onclick="sort('name')"><div id="title" class="sort icon_no_sort">Name</div></th>
            <th class="th_left" onclick="sort('district')"><div id="title" class="sort icon_no_sort">District</div></th>
            <th width="70" onclick="sort('status')"><div id="status" class="sort icon_no_sort">Status</div></th>
            <th width="70" onclick="sort('order_in_map')"><div id="order" class="sort icon_no_sort">Order</div></th>
		</tr>
		<?php
			if($result){
				$ci =& get_instance();
				$ci->load->model('area/area_model');
				$i=0;
				foreach($result as $k=>$v){
		?>
		<tr class="item_row<?=$i?> <?php ($k%2==0) ? print 'row1' : print 'row2' ?>">
			<td class="td_center"><?=$k+1+$start?></td>
			<td class="th_left td_action">
				<div class="td_relative">
                    <div class="action" style='width: 20px;'><a href="<?=PATH_URL.'admincp/'.$module.'/update/'.$v->id?>">
                    	<img class="action_first" alt="Edit item" src="<?=PATH_URL.'static/images/admin/icons/edit.png'?>" /></a>
                    </div>
                    <?=vcp_printf($v->name, 'jp'); ?>
                </div>
            </td>
            <td class="td_action td_center">
            	<?php
            		$infor_district = $ci->area_model->getDetailManagement($v->district);
        			if ($infor_district[0]) {
        				echo vcp_printf($infor_district[0]->name, 'jp');
        			}
            	?>
        	</td>
            <td class="td_center" id="loadStatusID_<?=$v->id?>">
            	<img alt="Checked item" src="<?=PATH_URL.'static/images/admin/icons/'?><?php ($v->status==0) ? print 'uncheck_16x16.png' : print 'check_16x16.png' ?>" />
            </td>
            <td class="td_action center"><?php if(isset($v->order_in_map)){ echo $v->order_in_map;}?></td>
		</tr>
		<?php $i++;}}else{ ?>
		<tr class="row1">
			<td class="th_last td_center" colspan="50" style="font-size: 20px; padding: 50px 0">No data</td>
		</tr>
		<?php } ?>
	</table>
</div>

<?php if($result){ ?>
<div class="footer_table">
	<div class="item_per_page">Items per page:</div>
	<div class="select_per_page">
		<select id="per_page" onchange="searchContent(<?=$start?>,this.value)">
			<option <?php ($per_page==10) ? print 'selected="selected"' : print '' ?> value="10">10</option>
			<option <?php ($per_page==25) ? print 'selected="selected"' : print '' ?> value="25">25</option>
			<option <?php ($per_page==50) ? print 'selected="selected"' : print '' ?> value="50">50</option>
			<option <?php ($per_page==100) ? print 'selected="selected"' : print '' ?> value="100">100</option>
		</select>
	</div>
	
	<div class="pagination"><?=$this->adminpagination->create_links();?></div>
</div>
<div class="clearAll"></div>
<?php } ?>